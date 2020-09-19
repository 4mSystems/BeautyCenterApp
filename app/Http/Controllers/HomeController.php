<?php

namespace App\Http\Controllers;

use App\Charts\SalonChart;
use App\package;
use App\Product;
use App\Category;
use App\Service;
use App\Reservation;
use App\Sponsered_ads;
use App\User;
use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $salon_id = auth()->user()->id;

        if (auth()->user()->type == 'manager') {
            // Data For Manager
            $salons = User::where('type', 'salon')->get();
            $managers = User::where('type', 'manager')->get();
            $packages = package::all();
            $status = "waiting";
            $ads = Sponsered_ads::where('status', $status)->get();

            $data['managers'] = $managers;
            $data['ads'] = $ads;
            $data['packages'] = $packages;

            return view('home', compact('salons', 'data'));
        } else {

            $arr = null;
            // Data For Salon
            $booking = Reservation::where('salon_id', $salon_id)->get();
            $salonReservation = Reservation::where('salon_id', $salon_id)->limit(10)->orderBy('created_at', 'asc')->get();
            $data['booking'] = $booking;
            $totalCustomer = User::where('type', 'customer')->where('added_by', Auth::user()->id)->count();
            //             dd($totalCustomer);
            return view('home', compact('data', 'salonReservation', 'totalCustomer'));
        }
    }
}
