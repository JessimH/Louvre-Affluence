<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reserv extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        //
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.contact')
                    ->subject('Visite au musée du Louvre, Réservation')
                    ->with('reservation', $this->reservation);;
    }
}
