<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
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

        return view($this->folderView.'user_profile');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:users,name,' . $id,
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'phone' => 'numeric|required|unique:users,phone,'.$id,
                'address' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'password' => 'sometimes|nullable',
                'open_from' => '',
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

        if($request['password'] != null){

            $pass= Hash::make(request('password'));
            $data['password'] = $pass;

        }else
        {
            unset($data['password']);
        }
        User::where('id', $id)->update($data);

        return redirect()->route('salon_profile.index')->with('success',trans('admin.updatSuccess'));
    }

    public function destroy($id)
    {
        //
    }
}
