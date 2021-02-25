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
Route::get('/', function(){
    return view('welcome');
});

Route::get('/reservation', 'App\Http\Controllers\ReservationController@index');

Route::post('/reservation', 'App\Http\Controllers\ReservationController@store');

Route::get('/annulation', function(){
    return view('annulation');
});

Route::get('/annulation/{reservation}', 'App\Http\Controllers\AnnulationController@destroy');






