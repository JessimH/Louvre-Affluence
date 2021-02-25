<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;


use App\Models\Reservation;


class AnnulationController extends Controller
{
    //
    public function show($token){
        $title = Config::get('configuration.title');
        return view('annulation', compact('token', 'title'));   
    }

    public function destroy($token)
    {
        Reservation::where('uniqueId', $token )->delete();

        return redirect('/')->with('success','Votre réservation a bien été annulée');
    }
}
