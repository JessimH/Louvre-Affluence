<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        
        $title = Config::get('configuration.title');
        $lundi = Config::get('configuration.lundi');
        $mardi = Config::get('configuration.mardi');
        $mercredi = Config::get('configuration.mercredi');
        $jeudi = Config::get('configuration.jeudi');
        $vendredi = Config::get('configuration.vendredi');
        $samedi = Config::get('configuration.samedi');
        $dimanche = Config::get('configuration.dimanche');
        $durée_reservation_seconde = Config::get('configuration.durée_reservation_seconde');
        $limite_reservation_max = Config::get('configuration.title');

        return view('welcome', compact('title', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche', 'durée_reservation_seconde', 'limite_reservation_max'));   
    }
}
