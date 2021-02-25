<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Reservation;


class AnnulationController extends Controller
{
    //
    public function destroy($token)
    {
        Reservation::where('uniqueId', $token )->delete();

        return redirect('/annulation');
    }
}
