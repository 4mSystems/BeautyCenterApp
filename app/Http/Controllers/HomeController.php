<?php

namespace App\Http\Controllers;

use App\package;
use App\Sponsered_ads;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salons = User::where('type', 'salon')->get();
        $managers = User::where('type', 'manager')->get();
        $packages = package::all();

        $status="waiting";
        $ads = Sponsered_ads::where('status',$status)->get();


        $data['managers']= $managers;
        $data['ads']= $ads;
        $data['packages']= $packages;

        return view('Home', compact('salons','data'));
    }
}
