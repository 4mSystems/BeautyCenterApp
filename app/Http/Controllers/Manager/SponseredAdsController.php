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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
