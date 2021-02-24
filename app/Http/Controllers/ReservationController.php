<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;
use App\Mail\Contact;
use App\Mail\Reserv;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation');
    }

    public function show()
    {
    }

    public function create()
    {
    }

    public function store()
    {
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

        return redirect('/valide');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy(Reservation $reservation)
    {
        dd('JE DETRUIT');
    }
}
