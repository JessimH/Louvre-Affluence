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
Route::get('/','App\Http\Controllers\WelcomeController@index');

Route::get('/reservation', 'App\Http\Controllers\ReservationController@index');

Route::post('/reservation', 'App\Http\Controllers\ReservationController@store');

Route::get('reservation/annulation/{token}', 'App\Http\Controllers\AnnulationController@show');

Route::get('reservation/annulation/{token}/destroy', 'App\Http\Controllers\AnnulationController@destroy');






