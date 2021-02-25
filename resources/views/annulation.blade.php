@extends('layout')

@section('content')
<section class="showcase p-5">
<div class="container-fluid p-0">
      <div class="col no-gutters text-center">
        <h1>Annulation de réservation</h1>
        <a class="btn btn-danger" href="http://127.0.0.1:8000/reservation/annulation/{{$token}}/destroy">Annuler la reservation</a>
      </div>
</div>
    
</section>
@endsection