<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        
        $title = Config::get('informations.title');
        $lundi = Config::get('informations.lundi');
        $mardi = Config::get('informations.mardi');
        $mercredi = Config::get('informations.mercredi');
        $jeudi = Config::get('informations.jeudi');
        $vendredi = Config::get('informations.vendredi');
        $samedi = Config::get('informations.samedi');
        $dimanche = Config::get('informations.dimanche');
        $durée_reservation_seconde = Config::get('informations.durée_reservation_seconde');
        $limite_reservation_max = Config::get('informations.title');

        return view('welcome', compact('title', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche', 'durée_reservation_seconde', 'limite_reservation_max'));   
    }
}
