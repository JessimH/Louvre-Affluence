@extends('layout')

@section('content')
<section class="showcase p-5">
  <div class="container-fluid p-0">
        <div class="col no-gutters text-center">
          <h1>Annulation de réservation</h1>
          <p>Vous souhaitez annuler votre réservation du {{ \Carbon\Carbon::parse($reservationAnnulation[0]['date'])->format('d/m/Y')}} à {{$reservationAnnulation[0]['hour']}} h ? appuyez sur le bouton ! 👇</p>
          <a class="btn btn-danger" href="http://laravel-reservation.herokuapp.com/reservation/annulation/{{$token}}/destroy">Annuler la reservation</a>
        </div>
  </div>
</section>
@endsection