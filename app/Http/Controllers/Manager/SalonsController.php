<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalonsController extends Controller
{

    public function index()
    {
        $salons = User::where('type', 'salon')->get();
        return view('managers.salons.salons', \compact('salons'));

    }

    public function create()
    {
        return view('managers.salons.create_new_salon');

    }

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
                'salon_payment_status'=>'required',

            ]);

        $data['password'] = Hash::make(request('password'));
        $data['type'] = "salon";
        $user = User::create($data);
        $user->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('salons'));


    }

    public function show($id)
    {
        //
    }


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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
