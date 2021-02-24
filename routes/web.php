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

Route::get('/reservation', function(){
    return view('reservation');
});

Route::post('/reservation', 'App\Http\Controllers\ReservationController@store');

Route::get('/valide', function(){
    return view('valide');
});

// Route::post('/reservation/annulation/{reservation}', 'App\Http\Controllers\ContactController@destroy');






