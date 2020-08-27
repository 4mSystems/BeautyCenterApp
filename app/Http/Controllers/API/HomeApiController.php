<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Product;
use Validator;

class HomeApiController extends Controller
{
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

    public function makeValidate($inputs, $rules)
    {

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return $this->validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }

    public function index(Request $request)
    {
        $rules = [
            'api_token' => 'required',
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $salon_id = $request->input('salon_id');
            $user = User::where('api_token', $api_token)->first();
            $services =Service::where('salon_id', $salon_id)->get();
            $products =Product::where('salon_id', $salon_id)->get();

            $product_offers =Product::where('salon_id', $salon_id)->where('price_after','!=',null)->get();
            $service_offers =Service::where('salon_id', $salon_id)->where('price_after','!=',null)->get();

            if ($user != null) {
           
            // $data[] = $services;
        //    $data['products'] = $products;
            $offers['product_offers'] = $product_offers;
            $offers['service_offers'] = $service_offers;

            return $this->sendResponse(200, 'تم اظهار المعلومات', array('services' => $services,'products' => $products,'offers' => $offers));
              
            } else {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }
        }

    }
    public function allProducts(Request $request)
    {
        $rules = [
            'api_token' => 'required',
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $salon_id = $request->input('salon_id');
            $user = User::where('api_token', $api_token)->first();
            $products =Product::where('salon_id', $salon_id)->get();

            if ($user != null) {

            return $this->sendResponse(200, 'تم اظهار المعلومات',$products);
              
            } else {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }
        }

    }

    public function allServices(Request $request)
    {
        $rules = [
            'api_token' => 'required',
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $api_token = $request->input('api_token');
            $salon_id = $request->input('salon_id');
            $user = User::where('api_token', $api_token)->first();
            $services =Service::where('salon_id', $salon_id)->get();

            if ($user != null) {

            return $this->sendResponse(200, 'تم اظهار المعلومات', $services);
              
            } else {
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ', null);
            }
        }

    }

    public function servicesWithCat(Request $request)
    {
        $rules = [
            'salon_id' => 'required',
            'cat_id' => 'required',            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            $cat_id = $request->input('cat_id');
            

            $servicesWithCat =Service::where('salon_id', $salon_id)->where('cat_id', $cat_id)->get();

            return $this->sendResponse(200, 'تم اظهار الخدمات بالتصنيف', $servicesWithCat);
              
            
        }

    }

    public function productsWithCat(Request $request)
    {
        $rules = [
            'salon_id' => 'required',
            'cat_id' => 'required',            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            $cat_id = $request->input('cat_id');
            

            $productsWithCat =Product::where('salon_id', $salon_id)->where('cat_id', $cat_id)->get();

            return $this->sendResponse(200, 'تم اظهار المنتجات بالتصنيف', $productsWithCat);
              
            
        }

    }
}
