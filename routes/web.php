<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'manager']],
    function () {
        Route::resource('managers', 'Manager\ManagerController');
        Route::get('managers/{id}/delete', 'Manager\ManagerController@destroy');

        Route::resource('subscribers', 'Admin\subscribersController');
        Route::get('subscribers/{id}/delete', 'Admin\subscribersController@destroy');
        Route::get('subscribers/{id}/details', 'Admin\subscribersController@details');

        Route::resource('DetailSubscriber', 'Manager\DetailedSubscriber');
        Route::get('Detail/{id}/delete', 'Manager\DetailedSubscriber@destroy');

        Route::resource('salons', 'Manager\SalonsController');

        Route::resource('sponsered', 'Manager\SponseredAdsController');


    });


Route::group(['middleware' => ['auth', 'salon']],
    function () {


//        category routes
        Route::resource('categories', 'Salons\CategoryController');
        Route::get('categories/{id}/delete', 'Salons\CategoryController@destroy');
//         Service Page
        Route::resource('services', 'Salons\serviceController');
        Route::get('services/{id}/delete', 'Salons\serviceController@destroy');
//         Product Page
        Route::resource('products', 'Salons\productsController');
        Route::get('products/{id}/delete', 'Salons\productsController@destroy');
        Route::get('sponser/{id}/{type}/SetAds', 'Salons\SponserAdsSalonController@show');
        Route::post('sponser/{id}/{type}/storeSponser', 'Salons\SponserAdsSalonController@store');
        //         Reservation Page


        Route::resource('reservations', 'Salons\ReservationController');
        Route::get('reservations/{id}/{status}', 'Salons\ReservationController@edit');
        Route::get('reservation/{status}', 'Salons\ReservationController@getReservationByStatus');



        Route::resource('productreservations', 'Salons\productReservationController');
        Route::get('productreservations/{id}/{status}', 'Salons\productReservationController@edit');
        Route::get('productreservation/{status}', 'Salons\productReservationController@getReservationByStatus');




        // Reviews Page
        Route::resource('reviews', 'Salons\ReviewsController');
        Route::get('product_images/{id}', 'Salons\productsController@showProductImage');
        Route::post('Add_product_images/{id}', 'Salons\productsController@storeProductImage');
        Route::post('destroy_Product_images', 'Salons\productsController@destroyProductImage');

        Route::resource('salon_profile', 'Salons\salonProfileController');

//        sponser_ads
        Route::resource('sponser_ads', 'Salons\SponserAdsSalonController');
        Route::get('sponser_ads/{id}/delete', 'Salons\SponserAdsSalonController@destroy');

//Offers
        Route::resource('offers', 'Salons\OffersController');
        Route::get('offers/{id}/{type}', 'Salons\OffersController@update');



//Delivery times
        Route::resource('deliverytimes', 'Salons\deliveryTime');
        Route::get('deliverytimes/{id}/delete', 'Salons\deliveryTime@destroy');


    });


Route::group(['middleware' => ['auth']],
    function () {


    });


Route::get('lang/{lang}', function ($lang) {

    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'ar') {
        session()->put('lang', 'ar');
    } else {
        session()->put('lang', 'en');

    }

    return back();


});
