<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;
use App\Mail\Reserv;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation');   
    }

    public function store()
    {

        
        $hourChoisis =  request('hour');
        $dateChoisis =  request('date');


        $reservationExistantesDate = Reservation::where('date', $dateChoisis)->get();

        $nbrReservationsDate = count($reservationExistantesDate);

        $reservationsArr = [];

        $dateChoisisCarbon = \Carbon\Carbon::parse($dateChoisis);

        if($dateChoisisCarbon->isWeekend()){
            return redirect('/reservation')
            ->with('error','Le musée est fermé les week-end, désolé!');
        }

        for($i = 0; $i < $nbrReservationsDate ; $i++){
            
            if($reservationExistantesDate[$i]['hour'] === $hourChoisis){
                array_push($reservationsArr, $reservationExistantesDate[$i]['hour']);
            }
        }
        //  dd($reservationsArr);

        if( count($reservationsArr)<2){            // dd('Reservation Ok');
            request()->validate(['email' => 'required|email']);

            Reservation::create($validatedAttributes = request()->validate([
                'email' => 'required|email',
                'date'=> 'required|date',
                'hour' => 'required',
                'uniqueId' => 'required'
            ]));
    
            $lastReservation = Reservation::latest()->first();
    
            Mail::to(request('email'))
                ->send(new Reserv($lastReservation));
            $reservationsArr = [];
            return redirect('/')
            ->with('success','Votre réservation à bien été pris en compte, un mail vous à été envoyé.');

           
        }
        else{
            // dd('deja 2 reservatino a cette h ');
            $reservationsArr = [];
            return redirect('/reservation')
            ->with('error','il n\'y a plus de places disponible pour ce créneau horaire.');
        }
    }

}
