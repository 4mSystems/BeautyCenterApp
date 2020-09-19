<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Reservation;
use App\User;

class ReservationController extends Controller
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
    public function user_reservation(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',            
            'customer_id' => 'required',
            
            ]);
            if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){

            $customer_id = $request->input('customer_id');
            $salon_id = $request->input('salon_id');
            
            $product_reservation =Reservation::where('type','product')
            ->where('customer_id',$customer_id)
            ->where('status','pending')
            ->with('getService')
            ->with('getProduct')
            ->with('getUser')
            ->with('getSalon')
            ->get();

            $service_reservation =Reservation::where('type','service')
            ->where('customer_id',$customer_id)
            ->where('status','pending')            
            ->with('getService')
            ->with('getProduct')
            ->with('getUser')
            ->with('getSalon')
            ->get();

            if(count($product_reservation_status)&&count($service_reservation_status) >0){
            return $this->sendResponse(200, ' تم  اظهار الطلبات الخاصة بالمستخدم',
              array('product_reservation' => $product_reservation ,
            'service_reservation' => $service_reservation));
        }else{
            return $this->sendResponse(403, 'لا يوجد طلبات ',null);
        }
        }else{
            return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
        }
    }else {
        return $this->sendResponse(403, $validate, null);
    }

    }
    
    public function reservation_with_status(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',            
            'customer_id' => 'required',
            'status' => 'required',
            
            ]);
            if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){

            $customer_id = $request->input('customer_id');
            $status = $request->input('status');
            
            $product_reservation_status =Reservation::where('type','product')
            ->where('customer_id',$customer_id)
            ->where('status',$status)
            ->with('getService')
            ->with('getProduct')
            ->with('getUser')
            ->with('getSalon')
            ->get();

            $service_reservation_status =Reservation::where('type','service')
            ->where('customer_id',$customer_id)
            ->where('status',$status)            
            ->with('getService')
            ->with('getProduct')
            ->with('getUser')
            ->with('getSalon')
            ->get();

           if(count($product_reservation_status)&&count($service_reservation_status) >0){
            return $this->sendResponse(200, ' تم  اظهار الطلبات الخاصة بالمستخدم',
              array('product_reservation' => $product_reservation_status ,
            'service_reservation' => $service_reservation_status));
        }else{
            return $this->sendResponse(403, 'لا يوجد طلبات ',null);
        }

        }else{
            return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
        }
    }else {
        return $this->sendResponse(403, $validate, null);
    }

    }
}
