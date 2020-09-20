<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\UserDettails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class salonProfileController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(User $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.';
        $this->flash = 'Category Data Has Been ';

    }
    public function index()
    {
        $details = UserDettails::where('user_id',Auth::user()->id)->first();
        // dd($details);
        return view($this->folderView.'user_profile',\compact('details'));
    }

    public function show($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:users,name,' . $id,
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'phone' => 'numeric|required|unique:users,phone,'.$id,
                'address' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'lat'=>'sometimes|nullable',
                'lng'=>'sometimes|nullable',
                'password' => 'sometimes|nullable|confirmed|min:6',
                'open_from' => '',
                'description' => '',
                'open_to' => 'after:open_from',
            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/users'), $fileNewName);

            $data['image'] = $fileNewName;
        }

        if($request['password'] != null  && $request['password_confirmation'] != null ){


            $pass= Hash::make(request('password'));
            $data['password'] = $pass;

//            auth()->logout();

        }else
        {
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        $user =User::where('id', $id)->update($data);
        


        $dataDetails['facebook'] = $request['facebook'];
        $dataDetails['twitter'] = $request['twitter'];
        $dataDetails['whatsapp'] = $request['whatsapp'];
        $dataDetails['instgram'] = $request['instgram'];
        $dataDetails['start_working'] = $request['start_working'];
        $dataDetails['end_working'] = $request['end_working'];
        UserDettails::where('user_id', $id)->update($dataDetails);

        return redirect()->route('salon_profile.index')->with('success',trans('admin.updatSuccess'));
    }

    public function destroy($id)
    {
        //
    }
}
