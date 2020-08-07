<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salons = User::where('type', 'salon')->get();
        return view('managers.salons.salons', \compact('salons'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.salons.create_new_salon');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());

        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:users',
                'phone' => 'numeric|required|unique:users',
                'address' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8',
                'package_id'=>'required|exists:packages,id',

            ]);

        $data['password'] = Hash::make(request('password'));
        $data['type'] = "salon";
        $user = User::create($data);
        $user->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('salons'));


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
       $user = User::where('id',$id)->first();
       if($user->status == "active"){
           $user->status = "deactive";
           $user->save();
       }else{
           $user->status = "active";
           $user->save();

       }
       session()->flash('success', trans('admin.statuschanged'));

        return redirect(url('salons'));

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
