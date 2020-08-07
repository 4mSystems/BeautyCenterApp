<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Sponsered_ads;
use App\User;
use Illuminate\Http\Request;

class SponseredAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status="waiting";
        $ads = Sponsered_ads::where('status',$status)->get();
//        dd($ads);
        return view('managers.ads.sponserd_ads', \compact('ads'));

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
        $ads = Sponsered_ads::where('id',$id)->first();
        if($ads->status == "accepted"){
            $ads->status = "rejected";
            $ads->save();
        }else{
            $ads->status = "accepted";
            $ads->save();

        }
        session()->flash('success', trans('admin.statuschanged'));

        return redirect(url('sponsered'));
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
