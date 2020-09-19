<?php

namespace App\Http\Controllers\API;

use App\Address;
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
                $rule['user_id'] = $user->id;
                $rule['product_id'] = $request->product_id;
                $rule['service_id'] = $request->service_id;
                $rule['salon_id'] = $request->salon_id;


                // $product_details=null;
                // $service_details=null;
                $cart = null;

                if ($request->product_id != null) {
                    $cart = Cart::where('product_id', $request->product_id)->where('user_id', $user->id)->first();
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
                        // $rule['date'] = $request->date;
                        // $rule['time'] = $request->time;
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

    public function cartcount(Request $request)
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


            $total = 0;
            $carts_services = Cart::where('user_id', $user->id)->where('product_id', null)->count();
            $carts_products = Cart::where('user_id', $user->id)->where('service_id', null)->get();
            foreach ($carts_products as $carts_product) {
                $total = $total + $carts_product->count;
            }
            $total = $total + $carts_services;

            return $this->sendResponse(200, 'تم عرض عدد  الخدمات والمنتجات فى السلة', $total);
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

            $cart_Services_id = Cart::where('user_id', $user->id)->where('service_id', '!=', null)->pluck('service_id');

            $service_time = Service::whereIn('id', $cart_Services_id)->sum('time');
            // $service_time = $service_data->time;
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

            return $this->sendResponse(200, 'تم عرض الاوقات المتاحه ', $available_times);
        }
    }


    public function checkout(Request $request)
    {
        $rules = [

            'api_token' => 'required',
            'payment' => 'required|in:cash,online',
            'type' => 'required|in:service,product',
            'date' => '',
            'time' => '',
        ];
        $user = null;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى التأكد من البيانات اوﻻ', null);
        } else {
            $api_token = $request->input('api_token');
            $user = User::where('api_token', $api_token)->first();

            if (empty($user)) {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }


            $carts = null;
            $type = $request->type;
            if ($type == 'service') {
                $carts = Cart::where('user_id', $user->id)->where('service_id', '!=', null)->get();
            } else {
                $carts = Cart::where('user_id', $user->id)->where('product_id', '!=', null)->get();
            }
            $data = null;
            $reservation = null;
            if ($carts->isEmpty()) {
                return $this->sendResponse(401, ' لا يوجد منتجات او خدمات فى السله', null);
            } else {
                foreach ($carts as $key => $cart) {
                    if ($cart->product_id != null) {


                        $data['product_id'] = $cart->product_id;
                        $data['customer_id'] = $cart->user_id;
                        $data['salon_id'] = $request->salon_id;
                        $data['quantity'] = $cart->count;
                        $data['date'] = Carbon::now();
                        $data['payment'] = $request->payment;
                        $data['type'] = 'product';
                        $product = Product::where('id', $cart->product_id)->first();
                        if ($cart->count > $product->stock) {
                            return $this->sendResponse(200, 'الكميه المطلوبة لا تكفى', $product->name);
                        }
                        $rules = [

                            'government' => 'required',
                            'region' => 'required',
                            'piece' => 'required',
                            'street' => 'required',
                            'house_number' => 'required',
                            'boulevard' => 'required'

                        ];
                        $validator = Validator::make($request->all(), $rules);
                        if ($validator->fails()) {
                            return $this->sendResponse(401, 'يرجى التأكد من البيانات العنوان', null);
                        } else {

                            $address['user_id'] = $user->id;
                            $address['government'] = $request->government;
                            $address['region'] = $request->region;
                            $address['piece'] = $request->piece;
                            $address['street'] = $request->street;
                            $address['house_number'] = $request->house_number;
                            $address['boulevard'] = $request->boulevard;

                            $old_address = Address::where('user_id', $user->id)->delete();
                            Address::create($address);
                        }
                        $d['stock'] = $product->stock - $cart->count;
                        $product->update($d);
                    } else {
                        $service_previous_time = $request->time;
                        if ($key == 0) {
                            $service_previous_time = $request->time;
                        } else {
                            $service_previous_time = (new Carbon($service_previous_time));
                            $ser_time = Service::where('id', $carts[$key - 1]->service_id)->first('time');

                            $service_previous_time = $service_previous_time->addMinutes($ser_time->time);
                            $service_previous_time = $service_previous_time->toTimeString();
                        }

                        $data['service_id'] = $cart->service_id;
                        $data['customer_id'] = $cart->user_id;
                        $data['salon_id'] = $request->salon_id;
                        $data['date'] = $request->date;
                        $data['time'] = $service_previous_time;
                        $data['payment'] = $request->payment;
                        $data['type'] = 'service';

                        // if ($cart->date == null || $cart->time == null) {
                        //     return $this->sendResponse(200, 'يرجى اختيار الوقت والتاريخ للخدمه المطلوبه', null);
                        // }
                    }

                    $reservation = Reservation::create($data);
                    $data = null;
                }
                if ($type == 'service') {
                    $reservations = Reservation::where('customer_id', $user->id)
                        ->where('service_id', '!=', null)->get();

                    $cart_delete = Cart::where('user_id', $user->id)->where('service_id', '!=', null)->get();
                    foreach ($cart_delete as $value) {
                        $value->delete();
                    }
                } else {
                    $reservations = Reservation::where('customer_id', $user->id)
                        ->where('product_id', '!=', null)->get();

                    $cart_delete = Cart::where('user_id', $user->id)->where('product_id', '!=', null)->get();
                    foreach ($cart_delete as $value) {
                        $value->delete();
                    }
                }


                return $this->sendResponse(200, 'تم الحجز بنجاح', $reservations);
            }
        }
    }


    public function reservation(Request $request)
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
            //getService
            //getProduct
            $reservations = Reservation::where('customer_id', $user->id)->with('getService')->with('getProduct')->get();

            return $this->sendResponse(200, 'تم عرض حجوزات العميل  ', $reservations);
        }
    }

    public function addcount(Request $request)
    {
        $rules = [

            'api_token' => 'required',
            'cart_id' => 'required',

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


            $carts = Cart::where('id', $request->cart_id)->first();

            $data['count'] = $carts->count + 1;
            $product = Product::where('id', $carts->product_id)->first();

            if ($data['count'] > $product->stock) {
                return $this->sendResponse(200, 'الكميه المطلوبة لا تكفى', null);
            }
            Cart::where('id', $request->cart_id)->update($data);


            return $this->sendResponse(200, 'تم زياده عدد المنتج المطلوب', $data);
        }
    }

    public function minuscount(Request $request)
    {
        $rules = [

            'api_token' => 'required',
            'cart_id' => 'required',

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


            $carts = Cart::where('id', $request->cart_id)->first();

            $data['count'] = $carts->count - 1;
            if ($data['count'] > 0) {
                Cart::where('id', $request->cart_id)->update($data);
            } else {
                return $this->sendResponse(400, 'لا يمكن ان يقل عن واحد', $carts->count);
            }


            return $this->sendResponse(200, 'تم تقليل عدد المنتج المطلوب', $data);
        }
    }

    public function editServiceCart(Request $request)
    {
        $rules = [
            'api_token' => 'required',
            'date' => 'required ',
            'time' => 'required',
            'cart_id' => 'required'


        ];
        //        after_or_equal:now
        //ToDo  date validations
        $user = null;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, '', null);
        } else {
            $api_token = $request->input('api_token');
            $user = User::where('api_token', $api_token)->first();

            if (empty($user)) {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }


            $cart = Cart::where('id', $request->cart_id)->first();
            if ($cart->product_id != null) {
                return $this->sendResponse(403, 'لا يمكن تعديل تاريح ووقت لمنتج', null);
            } else {
                $data['time'] = $request->time;
                $data['date'] = $request->date;
                $cart->update($data);
            }

            return $this->sendResponse(200, 'تم   تعديل بيانات الخدمه', $cart);
        }
    }


    public function deleteCart(Request $request)
    {
        $rules = [
            'api_token' => 'required',
            'cart_id' => 'required'
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


            $cart = Cart::where('id', $request->cart_id)->first();
            if ($cart == null) {
                return $this->sendResponse(401, 'الخدمه او المنتج غير موجود بالسله', null);
            } else {
                $cart->delete();
            }

            return $this->sendResponse(200, 'تم الحذف', null);
        }
    }


    public function cancelReservation(Request $request)
    {
        $rules = [

            'api_token' => 'required',
            'reservation_id' => 'required|exists:reservations,id'
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

            $input['status'] = "canceled";

            $reservation = Reservation::where('id', $request->reservation_id)->first();
            if ($reservation->product_id != null) {
                $reservation->update($input);
                $reservation->save();
            } else {
                $today_date = Carbon::now();
                $today_string = $today_date->toDateString();
                if ($today_string == $reservation->date) {
                    $time = date('H:i:s', strtotime($reservation->time));
                    $time = (new Carbon($time))->toDateTime();
                    $delay = $time->diff($today_date);
                    $delay = $delay->format('%H:%i');
                    $cancelTime = "02:00";
                    $cancelTime = date('H:i:s', strtotime($cancelTime));
                    $cancelTime = (new Carbon($cancelTime))->toDateTime();
                    $cancelTime = $cancelTime->diff((new Carbon("00:00:00")));
                    $cancelTime = $cancelTime->format('%H:%i');
                    if ($delay >= $cancelTime) {
                        $reservation->update($input);
                        $reservation->save();
                    } else {
                        return $this->sendResponse(401, 'لا يمكن الغاء لانه تعدى الوقت المتاح للالغاء', null);
                    }
                    //
                } elseif ($today_string <= $reservation->date) {
                    $reservation->update($input);
                    $reservation->save();
                } else {
                    return $this->sendResponse(401, 'لا يمكن الغاء لانه تعدى الوقت المتاح للالغاء', null);
                }
            }

            return $this->sendResponse(200, ' تم الغاء الحجز', null);
        }
    }
}
