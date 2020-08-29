<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Product;
use App\Category;
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
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
        
        
            $cat_service =Category::where('salon_id', $salon_id)->where('type','service')->get();
            $cat_product =Category::where('salon_id', $salon_id)->where('type','product')->get();

            $products =Product::where('salon_id', $salon_id)->with('category')->get();
            $services =Service::where('salon_id', $salon_id)->with('category')->get();

            $product_offers =Product::where('salon_id', $salon_id)->where('price_after','!=',null)->with('category')->get();
            $service_offers =Service::where('salon_id', $salon_id)->where('price_after','!=',null)->with('category')->get();

            $offers['product_offers'] = $product_offers;
            $offers['service_offers'] = $service_offers;

             return $this->sendResponse(200, 'تم اظهار المعلومات', array('services' => $services ,'products' => $products ,
           'cat_service' => $cat_service ,'cat_product' => $cat_product,
           'offers' => $offers));         
        }

    }

    public function selectedSalon(Request $request)
    {
        // dd('here');
        $rules = [
            'salon_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            $salon =User::where('id', $salon_id)->get();
            
            return $this->sendResponse(200, 'تم اظهار معلومات الصالون', $salon);
         
        }

    }


}
