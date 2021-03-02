<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

use App\Models\Reservation;
use App\Mail\Reserv;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informations = Config::get('informations');

        return $informations; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
            return response()->json('Le musée est fermé les week-end, désolé!', 400);
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
                return response()->json('Vous avez déjà réservé un créneau pour ce jour', 400);
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

                return response()->json('Votre réservation à bien été pris en compte, un mail vous à été envoyé.', 201);
            }
        }
        else{
            $reservationsArr = [];
            $checkEmailArr = [];
            return response()->json('il n\'y a plus de places disponible pour ce créneau horaire.', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($token)
    {
        //
        $reservationAnnulation = Reservation::where('uniqueId', $token)->get();

        if(count($reservationAnnulation)>0){
            return response()->json('Votre réservation a bien été annulée', 200);

            Reservation::where('uniqueId', $token )->delete();
        }
        else{
            return response()->json('Aucune réservation trouvée.', 404) ;
        } 
        
    }
}
