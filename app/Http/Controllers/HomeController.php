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
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Registrar as Charts;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $salon_id = auth()->user()->id;

        // Data For Manager
        $salons = User::where('type', 'salon')->get();
        $managers = User::where('type', 'manager')->get();
        $packages = package::all();
        $status = "waiting";
        $ads = Sponsered_ads::where('status', $status)->get();

        // Data For Salon
        $salonProducts = Product::where('salon_id', $salon_id)->get();
        $salonCategories = Category::where('salon_id', $salon_id)->get();
        $salonServices = Service::where('salon_id', $salon_id)->get();
        $salonReservation = Reservation::where('salon_id', $salon_id)->get();

        $data['managers'] = $managers;
        $data['ads'] = $ads;
        $data['packages'] = $packages;

        $data['salonProducts'] = $salonProducts;
        $data['salonCategories'] = $salonCategories;
        $data['salonServices'] = $salonServices;
//        $users = User::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
//            ->groupBy('year', 'month')
//            ->get();
//        $chart = [];
//        foreach ($users as $user) {
////            $count_array[] = $user->count;
////            $month_array[] = $user->month;
//            $chart [] = [$user->month => $user->count];
//        }
         return view('Home', compact('salons', 'data', 'salonReservation'));
    }
}
