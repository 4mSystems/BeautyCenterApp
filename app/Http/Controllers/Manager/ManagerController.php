<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $managers = User::where('type', 'manager')->get();
        return view('managers.manager.index', \compact('managers'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.manager.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:users',
                'phone' => 'numeric|required|unique:users',
                'address' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8'

            ]);

//        dd($request->all());
        $data['password'] = Hash::make(request('password'));
        $data['type'] = "manager";
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
        $user = User::create($data);
        $user->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('managers'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = User::where('id', $id)->first();
        return view('managers.manager.update_manger', \compact('user_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:users,name,' . $id,
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'phone' => 'numeric|required|unique:users,phone,'.$id,
                'address' => 'required',
                'email' => 'required|unique:users,email,'.$id,


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

        User::where('id', $id)->update($data);
        session()->flash('success', trans('admin.addedsuccess'));

        return redirect(url('managers'));

    }
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('managers'));
    }
}
