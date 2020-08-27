<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'API\AuthController@login');
Route::post('logout','API\AuthController@logout');

Route::post('register','API\UserApiController@store');
Route::post('salonHome','API\HomeApiController@index');

Route::post('products','API\HomeApiController@allProducts');

Route::post('services','API\HomeApiController@allServices');

Route::post('servicesWithCat','API\HomeApiController@servicesWithCat');
Route::post('productsWithCat','API\HomeApiController@productsWithCat');



