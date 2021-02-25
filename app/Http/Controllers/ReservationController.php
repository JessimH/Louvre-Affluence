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
        $userMail = request('email');


        $reservationExistantesDate = Reservation::where('date', $dateChoisis)->get();

        $reservationExistantesUser = Reservation::where('email', $userMail)->get();

        $nbrReservationsDate = count($reservationExistantesDate);

        $reservationsArr = [];

        $checkEmailArr = [];

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

        if( count($reservationsArr)<2){
            // dd('Reservation Ok');
            for($i = 0; $i < $nbrReservationsDate ; $i++){
            
                if($reservationExistantesDate[$i]['email'] === $userMail){
                    array_push($checkEmailArr, $reservationExistantesDate[$i]['email']);
                }
            }
            if(count($checkEmailArr)>0){
                $reservationsArr = [];
                $checkEmailArr = [];
                return redirect('/reservation')
                ->with('warning','Vous avez déjà réservé un créneau pour ce jour');
            }
            else{
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
                $checkEmailArr = [];
                return redirect('/')
                ->with('success','Votre réservation à bien été pris en compte, un mail vous à été envoyé.');
            }
        }
        else{
            // dd('deja 2 reservatino a cette h ');
            $reservationsArr = [];
            $checkEmailArr = [];
            return redirect('/reservation')
            ->with('warning','il n\'y a plus de places disponible pour ce créneau horaire.');
        }
    }

}
