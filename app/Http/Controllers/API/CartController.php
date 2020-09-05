<?php

namespace App\Http\Controllers\API;

use App\Chair;
use App\Http\Controllers\Controller;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Cart;
use App\Service;
use App\Product;
use App\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $objectName;


    public function __construct(User $model)
    {
        $this->objectName = $model;

    }

    public function sendResponse($code = null, $msg = null, $data = null)
    {

        return response(
            [
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ]
        );

    }

    public function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }


    public function addToCart(Request $request)
    {
        $rules = [

            'api_token' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $user = User::where('api_token', $api_token)->first();

            if (empty($user)) {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }

            $rule = [

                'user_id' => 'required',
                'product_id' => 'sometimes|nullable',
                'service_id' => 'sometimes|nullable',
                'salon_id' => 'required'

            ];

            if ($validator->fails()) {
                return $this->sendResponse(401, 'يرجى ارسال رقم  تعريف العميل', null);
            } else {
                $rule['user_id'] = $request->user_id;
                $rule['product_id'] = $request->product_id;
                $rule['service_id'] = $request->service_id;
                $rule['salon_id'] = $request->salon_id;

                // $product_details=null;
                // $service_details=null;
                $cart = null;

                if ($request->product_id != null) {
                    $cart = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
                    //   $product_details['count'] = $cart->count;
                    if ($cart != null) {
                        $cart->count = $cart->count + 1;
                        $cart->save();


                    } else {
                        $rule['count'] = 1;
                        Cart::create($rule);
                    }

                } else {
                    $cart = Cart::where('service_id', $request->service_id)->where('user_id', $request->user_id)->first();
                    if ($cart != null) {

                        return $this->sendResponse(400, 'الخدمه موجوده بالفعل', null);

                    } else {
                        Cart::create($rule);
                    }
                    // $service_details =   Service::where('id',$request->service_id)->first();

                }
                $total = 0;
                $carts_services = Cart::where('user_id', $request->user_id)->where('product_id', null)->count();
                $carts_products = Cart::where('user_id', $request->user_id)->where('service_id', null)->get();
                foreach ($carts_products as $carts_product) {
                    $total = $total + $carts_product->count;
                }
                $total = $total + $carts_services;


                return $this->sendResponse(200, 'تم الاضافه الى السلة ', $total);

            }


        }
    }

    public function allCart(Request $request)
    {
        $rules = [

            'api_token' => 'required',

        ];
        $user = null;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $user = User::where('api_token', $api_token)->first();

            if (empty($user)) {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }


            $carts_services = Cart::where('user_id', $user->id)->where('product_id', null)->with('getService')->get();
            $carts_products = Cart::where('user_id', $user->id)->where('service_id', null)->with('getProduct')->get();
            $carts['carts_services'] = $carts_services;
            $carts['carts_products'] = $carts_products;

            return $this->sendResponse(200, 'تم عرض بيتانات السلة', $carts);

        }


    }

    public function availabletime(Request $request)
    {
        $rules = [

            'api_token' => 'required',

        ];
        $user = null;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $user = User::where('api_token', $api_token)->first();

            if (empty($user)) {
                return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
            }

            $salon_data = User::where('id', $request->salon_id)->first();
            $chairs_num = Chair::where('salon_id', $request->salon_id)->count();
            $open_time = $salon_data->open_from;
            $open_time = Carbon::parse($open_time);
            $close_time = $salon_data->open_to;
            $close_time = Carbon::parse($close_time);

            $service_data = Service::where('id', $request->service_id)->first();
            $service_time = $service_data->time;
            $salon_times = null;
            while ($open_time <= $close_time) {
                $salon_times[] = $open_time->format('H:i');
                $open_time = $open_time->addMinutes($service_time);
            }

            $available_times = null;
            foreach ($salon_times as $value) {
                $reservation_count = Reservation::where('date', $request->date)
                    ->where('time', $value)->where('type', 'service')->where('salon_id', $request->salon_id)
                    ->count();
                    
                    

                if ($reservation_count < $chairs_num) {
                    $available_times[] = $value;

                }


            }

            return $this->sendResponse(200, 'تم عرض بيتانات السلة', $available_times);

        }


    }


}
