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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group([ 'middleware'=>['auth','manager'] ],
    function(){
        Route::resource('managers','Manager\ManagerController');
        Route::get('managers/{id}/delete','Manager\ManagerController@destroy');

        Route::resource('subscribers', 'Admin\subscribersController');

        Route::get('subscribers/{id}/delete','Admin\subscribersController@destroy');
        Route::get('subscribers/{id}/details','Admin\subscribersController@details');

        Route::resource('DetailSubscriber','Manager\DetailedSubscriber');
        Route::get('Detail/{id}/delete','Manager\DetailedSubscriber@destroy');

        Route::resource('salons', 'Manager\SalonsController');

        Route::resource('sponsered', 'Manager\SponseredAdsController');



    });



Route::group([ 'middleware'=>['auth'] ],
    function(){
//lang
Route::get('lang/{lang}',function($lang){

    if(session()->has('lang')){
        session()->forget('lang');
    }
    if($lang =='ar'){
        session()->put('lang','ar');
    }else{
        session()->put('lang','en');

    }

    return back();


});

    });

