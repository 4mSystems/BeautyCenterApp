<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\User;

class UserApiController extends Controller
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
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

     public function store(Request $request)
    {
        \App::setLocale('ar');
        $input = $request->all();
        $validate = $this->makeValidate($input,
            [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|unique:users',
                // 'image' => 'required',
                'password' => 'required|min:6',
                'salon_id' => 'required|exists:users,id'
            ]);

        if (!is_array($validate)) {

     if(request('image') != null){
            // This is Image Information ...
            $file	 = $request->file('image');
            $name    = $file->getClientOriginalName();
            $ext 	 = $file->getClientOriginalExtension();
            $size 	 = $file->getSize();
            $path 	 = $file->getRealPath();
            $mime 	 = $file->getMimeType();

            // Move Image To Folder ..
            $fileNewName = 'img_'.time().'.'.$ext;
            $file->move(public_path('uploads/users'), $fileNewName);

            $input['image'] = $fileNewName;

     }else{
           $input['image'] = 'Default.png';
     }


            $input['password'] = bcrypt(request('password'));
            $input['added_by'] = request('salon_id');
            $input['type'] = 'customer';

            $user = User::create($input);


            $user->api_token = Str::random(60);

            $api_token = $user->api_token;
            $user->save();

            return $this->sendResponse(200, 'تم الاضافه بنجاح', $user);
        } else {
              return $this->sendResponse(403, $validate, null);
        }

    }

     public function updateProfil(Request $request)
    {
        $input = $request->all();

        $user = User::where('api_token',$request->api_token)->first();
        $id = $user->id;
//        $salon_image = $request->image;


        if(request('password') != null){
        $validate  =   $this->makeValidate($input,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'phone' => 'numeric|required|unique:users,phone,'.$id,
                'address' => 'required',
                'password' => 'min:6',
                'api_token' => 'required'
            ]);
            }else{
                $validate  =   $this->makeValidate($input,
                [
                    'name' => 'required',
                    'email' => 'required|unique:users,email,'.$id,
                    'phone' => 'numeric|required|unique:users,phone,'.$id,
                    'address' => 'required',
                    'api_token' => 'required'
                ]);
            }
        if (!is_array($validate))
        {
            if(request('image') != null){
                // This is Image Information ...
                $file	 = $request->file('image');
                $name    = $file->getClientOriginalName();
                $ext 	 = $file->getClientOriginalExtension();
                $size 	 = $file->getSize();
                $path 	 = $file->getRealPath();
                $mime 	 = $file->getMimeType();

                // Move Image To Folder ..
                $fileNewName = 'img_'.time().'.'.$ext;
                $file->move(public_path('uploads/Register_images'), $fileNewName);

                $input['image'] = $fileNewName;

         }else{
            unset($input['image']);
         }

         if(request('password') != null){
            $input['password'] = bcrypt(request('password'));
         }else{
            unset($input['password']);
         }

            $User = User::find(intval($id))->update($input);

            return $this->sendResponse(200, 'تم التعديل  بنجاح' ,$User);
        }
        else
        {
            return $this->sendResponse(403, $validate ,null);
        }

    }

    public function changePass(Request $request)
    {
        $input = $request->all();
        $id = $request->input('user_id');
       

            $validate = $this->makeValidate($input,
            [
                
               
                'api_token' => 'required',
                'user_id' => 'required',
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ]);


            if (!is_array($validate)) {

            $api_token = $request->input('api_token');
          
            $user = User::where('api_token',$api_token)->first();
            if($user != null){

                if($request->input('old_password') != null  && $request->input('confirm_password')!= null ){

                    try {
                        if ((Hash::check(request('old_password'), $user->password)) == false) {
                            return $this->sendResponse(403, 'الرقم السرى القديم خطأ', null);

                        } else if ((Hash::check(request('new_password'),  $user->password)) == true) {
                            return $this->sendResponse(403, 'ادخل رقم سرى جديد غير الموجود مسبقا', null);

                        } else {
                            $User= User::where('id', $id)->update(['password' => Hash::make($input['new_password'])]);
                            return $this->sendResponse(200, ' تم تغير الرقم السرى بنجاح', $User);
                        }
                    } catch (\Exception $ex) {
                        if (isset($ex->errorInfo[2])) {
                            $msg = $ex->errorInfo[2];
                        } else {
                            $msg = $ex->getMessage();
                        }
                        $arr = array("status" => 400, "message" => $msg, "data" => array());
                    }
                }else
                {
                    return $this->sendResponse(200, 'يجب ملئ الحقول', $User);
                }
                // $User = User::where('id', $id)->update($data);

     
        }else{
            return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
        }
       
        }else {
            return $this->sendResponse(403, $validate, null);
        }
    }

    public function update_logo(Request $request)
    {
        $input = $request->all();
        $id = $request->user_id;
   
        $validate  =   $this->makeValidate($input,
            [
                'api_token' => 'required',
                'user_id' => 'required',
                'image' => 'required',
            ]);
     
        if (!is_array($validate))
        {
            if(request('image') != null){
                // This is Image Information ...
                $file	 = $request->file('image');
                $name    = $file->getClientOriginalName();
                $ext 	 = $file->getClientOriginalExtension();
                $size 	 = $file->getSize();
                $path 	 = $file->getRealPath();
                $mime 	 = $file->getMimeType();
    
                // Move Image To Folder ..
                $fileNewName = 'img_'.time().'.'.$ext;
                $file->move(public_path('uploads/Register_images'), $fileNewName);
    
                $input['image'] = $fileNewName;
         $User = User::find(intval($id))->update($input);
         return $this->sendResponse(200, 'تم تعديل الصورة الشخصية بنجاح' ,$User);
         
         }else{
            return $this->sendResponse(403, 'You should Choose Images' ,null);
         }
           
        }
        else
        {
            return $this->sendResponse(403, $validate ,null);
        }

    }
  
}
