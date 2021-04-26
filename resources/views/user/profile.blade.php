<style>
    .card_profile {
        background-color: lightcyan;
        border-radius: 20px;
        border: solid 2px;
        font-family: 'Oleo Script', cursive;
    }
    .formulaire_profile {
        font-family: 'Oleo Script', cursive;
    }
    body {
        background-image: url("{{ backgroundForPage('user.profile', 'storage/assets/uploads/profil.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm">
<div class="card-body text-center">
    <div class="card_profile">

    @if(Auth::user()->lastname ==NULL && Auth::user()->firstname ==NULL)
        <h2>Bonjour !</h2>
        <br>
        @else
        <span><h2>Bonjour {{Auth::user()->firstname}}
         {{Auth::user()->lastname}} !</h2></span>
        <br>
    @endif

    <span><h5><b>Pseudo:</b> {{Auth::user()->name}}</h5></span>
    <br>
    <span><h5><b>Email:</b> {{Auth::user()->email}}</h5></span>
    <br>


{{-- @if("isset" ) --}}

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Modifiez votre Profil
  </button>
</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <form class="formulaire_profile" method="POST" action="{{ @route('user.sendProfile') }}" enctype="multipart/form-data">
        @if($errors->any()) {{-- si il y a une erreur...--}}
            @foreach($errors->all() as $e) {{-- --}}
                <h3 class="red-text">{{ $e }}</h3>
            @endforeach
        @endif
        @csrf

        <label for="file" class="col-md-4 col-form-label text-md-right">Séléctionnez votre avatar! </label>
        <input type="file" name="avatar"  id="file">
        <br>
        <label for="name" class="col-md-4 col-form-label text-md-right">Entrez un nouveau pseudo: </label>
        <input type="text" name="name" id="name" value="{{Auth::user()->name}}">
        <br>
        <label for="email" class="col-md-4 col-form-label text-md-right">Entrez votre email: </label>
        <input type="text" name="email" id="email" value="{{Auth::user()->email}}">
        <br>
        <label for="firstname" class="col-md-4 col-form-label text-md-right">Entrez votre prénom: </label>
        <input type="text" name="firstname" id="firstname" placeholder="prénom">
        <br>
        <label for="lastname" class="col-md-4 col-form-label text-md-right">Entrez votre nom: </label>
        <input type="text" name="lastname" id="lastname" placeholder="nom">
        <br>
        <label for="password" class="col-md-4 col-form-label text-md-right">Entrez un nouveau mot de passe: </label>
        <input type="password" name="password" id="password" placeholder="mot de passe">
        <br>
        <label for="password" class="col-md-4 col-form-label text-md-right">Confirmez mot de passe: </label>
        <input type="password" name="password" id="password" placeholder="mot de passe">
        <br><br>
        <input class="btn btn-success" type="submit" value="Valider">

        <a class="btn btn-outline-danger" href="{{ route('change_background') }}">Change Background</a>
    </form>
  </div>
    </div>
</div>
    </div>
</div>

@endsection

