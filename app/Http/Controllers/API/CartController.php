<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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


    public function __construct(User $model){
        $this->objectName = $model;

    }
    public function sendResponse($code=null,$msg=null, $data = null)
    {

        return response(
            [
                'code' => $code,
                'msg'=>$msg,
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

 




    public function addToCart(Request $request){
        $rules = [

            'api_token'=>'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ',null);
        }
        else
        {
            $api_token =$request->input('api_token');
            $user = User::where('api_token',$api_token)->first();

            if(empty($user)){
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
            }

            $rule = [

                'user_id'=>'required',
                'product_id'=>'sometimes|nullable',
                'service_id'=>'sometimes|nullable',
                'salon_id'=>'required'
    
            ];

            if($validator->fails())
            {
                return $this->sendResponse(401, 'يرجى ارسال رقم  تعريف العميل',null);
            }else{
                $rule['user_id']=$request->user_id;
                $rule['product_id']=$request->product_id;
                $rule['service_id']=$request->service_id;
                $rule['salon_id']=$request->salon_id;
                         
                $product_details=null;
                $service_details=null;
                $cart=null;

                 if($request->product_id != null){
                  $cart =  Cart::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
                      if($cart != null){
                        $cart->count =  $cart->count +1;
                        $cart->save();
                     }else{
                         $rule['count'] = 1;
                         Cart::create($rule);
                     }
                  $product_details =   Product::where('id',$request->product_id)->first();
                  $product_details['count'] = $cart->count;
                //   $product_details =   $product_details ;

                 }else{
                    $cart =  Cart::where('service_id',$request->service_id)->where('user_id',$request->user_id)->first();
                    if($cart != null){
                        return $this->sendResponse(400, ' الخدمه موجوده بالفعل فى السلة ',$cart);

                   }else{
                       Cart::create($rule);
                   }
                    $service_details =   Service::where('id',$request->service_id)->first();

                 }
                 $carts = Cart::where('user_id',$request->user_id)->get();
               return $this->sendResponse(200, 'تم الاضافه الى السلة ',
               array('product_details' => $product_details  ,'service_details' => $service_details ,'carts' => $carts ));
           

            }

            
        }
    }





}
