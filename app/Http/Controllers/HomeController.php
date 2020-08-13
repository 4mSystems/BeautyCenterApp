<?php

namespace App\Http\Controllers;

use App\package;
use App\Product;
use App\Category;
use App\Service;
use App\Reservation;
use App\Sponsered_ads;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $salon_id =auth()->user()->id;

        // Data For Manager
        $salons = User::where('type', 'salon')->get();
        $managers = User::where('type', 'manager')->get();
        $packages = package::all();
        $status="waiting";
        $ads = Sponsered_ads::where('status',$status)->get();

        // Data For Salon
        $salonProducts = Product::where('salon_id', $salon_id)->get();
        $salonCategories = Category::where('salon_id', $salon_id)->get();
        $salonServices = Service::where('salon_id', $salon_id)->get();
        $salonReservation = Reservation::where('salon_id', $salon_id)->get();

        $data['managers']= $managers;
        $data['ads']= $ads;
        $data['packages']= $packages;

        $data['salonProducts']= $salonProducts;
        $data['salonCategories']= $salonCategories;
        $data['salonServices']= $salonServices;

        return view('Home', compact('salons','data','salonReservation'));
    }
}
