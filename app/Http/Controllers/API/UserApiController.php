<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $input = $request->all();

        $validate = $this->makeValidate($input,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|unique:users',
                'address' => 'required',
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
            $file->move(public_path('uploads/Register_images'), $fileNewName);

            $input['image'] = $fileNewName;
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
