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

//Route::resource('Home', 'Admin\homeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([ 'middleware'=>['auth','manager'] ],
    function(){
        Route::get('managers','Manager\ManagerController@index');
    });
