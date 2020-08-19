<?php

namespace App\Http\Controllers\Salons;

use App\DeliveryTimes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class deliveryTime extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = DeliveryTimes::where('salon_id',Auth::user()->id)->simplePaginate(10);
//
        return view('salon.deliverytimes.deliverytimes',\compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salon.deliverytimes.createdeliverytimes');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'delivery_time' => 'required',

            ]);


        $Salon_id = Auth::user()->id;
        $data['salon_id'] = $Salon_id;

        DeliveryTimes::create($data);

        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('deliverytimes'));
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
        $user_data = DeliveryTimes::where('id', $id)->first();
        return view('salon.deliverytimes.editdeliverytimes', \compact('user_data'));


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
        $data = $this->validate(\request(),
            [
                'delivery_time' => 'required',

            ]);

        DeliveryTimes::where('id',$id)->update($data);

        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('deliverytimes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = DeliveryTimes::where('id', $id)->first();
        $pro->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('deliverytimes'));
    }
}
