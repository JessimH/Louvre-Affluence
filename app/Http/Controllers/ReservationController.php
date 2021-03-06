<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

use App\Models\Reservation;
use App\Mail\Reserv;

class ReservationController extends Controller
{
    public function index()
    {
        $title = Config::get('informations.title');
        $durée_reservation_seconde = Config::get('informations.durée_reservation_seconde');
        $limite_reservation_max = Config::get('informations.limite_reservation_max');
        $today = \Carbon\Carbon::now()->format('Y-m-d');

        return view('reservation', compact('today','title','durée_reservation_seconde', 'limite_reservation_max'));   
    }

    public function store()
    {
        request()->validate([
            'email' => 'required|email',
            'hour' => 'required',
            'date' => 'required|date',
            'cgu' => 'required|accepted'
        ]);

        $limite_reservation_max = Config::get('informations.limite_reservation_max');
        
        $hourChoisis =  request('hour');
        $dateChoisis =  request('date');
        $userMail = request('email');

        $reservationExistantesDate = Reservation::where('date', $dateChoisis)->get();

        $nbrReservationsDate = count($reservationExistantesDate);

        $reservationsArr = [];

        $checkEmailArr = [];

        $dateChoisisCarbon = \Carbon\Carbon::parse($dateChoisis);

        if($dateChoisisCarbon->isWeekend()){
            return redirect('/reservation')
            ->with('error','Le musée est fermé les week-end, désolé!')
            ->withInput();
        }

        for($i = 0; $i < $nbrReservationsDate ; $i++){
            
            if($reservationExistantesDate[$i]['hour'] === $hourChoisis){
                array_push($reservationsArr, $reservationExistantesDate[$i]['hour']);
            }
        }

        if( count($reservationsArr)<$limite_reservation_max){
            for($i = 0; $i < $nbrReservationsDate ; $i++){
            
                if($reservationExistantesDate[$i]['email'] === $userMail){
                    array_push($checkEmailArr, $reservationExistantesDate[$i]['email']);
                }
            }

            if(count($checkEmailArr)>0){
                $reservationsArr = [];
                $checkEmailArr = [];
                return redirect('/reservation')
                ->with('warning','Vous avez déjà réservé un créneau pour ce jour')
                ->withInput();
            }
            else{
                Reservation::create($validatedAttributes = request()->validate([
                    'email' => 'required|email',
                    'date'=> 'required|date',
                    'hour' => 'required',
                    'uniqueId' => 'required',
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
            $reservationsArr = [];
            $checkEmailArr = [];
            return redirect('/reservation')
            ->with('warning','il n\'y a plus de places disponible pour ce créneau horaire.')
            ->withInput();
        }
    }
}
