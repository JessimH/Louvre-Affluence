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
        $reservationAnnulation = Reservation::where('uniqueId', $token)->get();

        if(count($reservationAnnulation)>0){
            return view('annulation', compact('token', 'title', 'reservationAnnulation')); 
        }
        else{
            return redirect('/')->with('error','Aucune réservation trouvée.');
        } 
    }

    public function destroy($token)
    {
        $reservationAnnulation = Reservation::where('uniqueId', $token)->get();
        if(count($reservationAnnulation)>0){
            Reservation::where('uniqueId', $token )->delete();

            return redirect('/')->with('success','Votre réservation a bien été annulée');
        }
        else{
            return redirect('/')->with('error','Aucune réservation trouvée.');
        } 
        
    }
}
