<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Product;
use App\Category;
use Validator;

class productApiController extends Controller
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

    public function products_offers(Request $request)
    {
        $rules = [
            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
     
            $product_offers =Product::where('salon_id', $salon_id)->where('price_after','!=',null)->with('category')->get();
           

            return $this->sendResponse(200, 'تم اظهار عروض المنتجات', $product_offers);
         
        }

    }

    public function products_offers_withCat(Request $request)
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
            
            $product_offers_withCat =Product::where('salon_id', $salon_id)->where('price_after','!=',null)
            ->where('cat_id', $cat_id)->with('category')->get();
           
            return $this->sendResponse(200, 'تم اظهار عروض المنتجات', $product_offers_withCat);
         
        }

    }
   
    public function allProducts(Request $request)
    {
        $rules = [

            'salon_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {
            $salon_id = $request->input('salon_id');

            $products =Product::where('salon_id', $salon_id)->with('category')->get();
            $CategoryProduct =Category::where('salon_id', $salon_id)->where('type', 'product')->get();

           return $this->sendResponse(200, 'تم اظهار المعلومات', array('products' => $products ,'CategoryProduct' => $CategoryProduct));
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
            

            $productsWithCat =Product::where('salon_id', $salon_id)->where('cat_id', $cat_id)->with('category')->get();

            return $this->sendResponse(200, 'تم اظهار المنتجات بالتصنيف', $productsWithCat);
              
            
        }

    }

    public function CategoryProduct(Request $request)
    {
        $rules = [
            'salon_id' => 'required',
           
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            

            $CategoryProduct =Category::where('salon_id', $salon_id)->where('type', 'product')->get();

            return $this->sendResponse(200, 'تم اظهار تصنيفات المنتجات', $CategoryProduct);
              
            
        }

    }

    public function products_with_Name(Request $request)
    {
        $rules = [
            'salon_id' => 'required',
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(401, 'يرجى تسجيل الدخول ', null);
        } else {

            $salon_id = $request->input('salon_id');
            $product_name = $request->input('name');
            
            $product_withname =Product::where('salon_id', $salon_id)
            ->where('name','like','%' .$product_name. '%')->with('category')->get();
           
            return $this->sendResponse(200, 'تم اظهار بحث المنتجات', $product_withname);
         
        }

    }
}
