@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Musée du Louvre ⚜️</h1>
    <h2 class="text-center">Réservation</h2>
    <p class="text-center">Réserver une place pour une heure <em>(2 places par heure disponibles)</em>.</p>

  @include('flash-message')

    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/reservation">
                        @csrf
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="" min="{{$today}}" required>
                        
                        <div style="display: none;">
                            <label for="uniqueId" class="form-label">UniqueId</label>
                            <input type="text" class="form-control" id="uniqueId" name="uniqueId" value="{{md5(uniqid(true))}}" required>
                        </div>

                        <div class="my-3">
                            <label for="hour" class="form-label">Heure</label>
                            <input type="time" id="hour" class="form-control" name="hour" min="09:00" max="17:00" step="3600" required>
                        </div>

                        <div class="my-3">
                            <label for="email" class="form-label">Votre adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="cgu" name="cgu" required>
                            <label class="form-check-label" for="cgu">
                                J'ai lu et accepté les <a href="#">conditions d'utilisation</a>
                            </label>
                        </div>

                        <div class=" d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Réserver</button>
                            <a href="/" class="btn btn-light" type="button">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection