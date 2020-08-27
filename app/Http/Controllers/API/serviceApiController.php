<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Product;
use App\Category;
use Validator;


class serviceApiController extends Controller
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

    public function service_offers(Request $request)
    {
   
        $rules = [
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
  
            $service_offers =Service::where('salon_id', $salon_id)->where('price_after','!=',null)->with('category')->get();


            return $this->sendResponse(200, 'تم اظهار عروض الخدمات', $service_offers);
         
        }

    }

    public function allServices(Request $request)
    {
        $rules = [
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            $services =Service::where('salon_id', $salon_id)->with('category')->get();

            return $this->sendResponse(200, 'تم اظهار المعلومات', $services);
           
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
            

            $servicesWithCat =Service::where('salon_id', $salon_id)->where('cat_id', $cat_id)->with('category')->get();

            return $this->sendResponse(200, 'تم اظهار الخدمات بالتصنيف', $servicesWithCat);
              
            
        }

    }

    public function CategoryService(Request $request)
    {
        $rules = [
            'salon_id' => 'required',
           
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            

            $CategoryService =Category::where('salon_id', $salon_id)->where('type', 'service')->get();

            return $this->sendResponse(200, 'تم اظهار تصنيفات الخدمات', $CategoryService);
              
            
        }

    }
}
