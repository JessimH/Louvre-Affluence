@component('mail::message')
# Votre réservation pour à bien été enregistré



Nous vous donnons rendez-vous le {{\Carbon\Carbon::parse($reservation->date)->format('d/m/Y')}} à {{$reservation->hour}}h pour effectuer votre visite! 
<br>
<br>
À très vite!

Vous ne pouvez plus participer à la visite?
@component('mail::button', ['url' => "", 'color' => 'error'])
Annuler ma réservation
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
