<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
<style>

@import url("https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&display=swap");

$background: #fffffb;
$accent: #ff6b6c;
$otherAccent: #ffc145;
$darkBackground: #5b5f97;


@import url("https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-family: "Roboto", arial, sans-serif;
  color: #222;
} */

#login-container {

  height: 400px;
  /* width: 350px; */
  padding: 20px;
  border-radius: 5px;
  background: #fffffb;
  position: relative;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
}
#login-container .profile-img {
  height: 100px;
  width: 100px;
  background-image:url("{{asset('storage/assets/uploads/'.Auth::user()->avatar)}}");
  background-size: cover;
  background-position: center;
  position: absolute;
  top: -25px;
  left: -25px;
  border-radius: 50%;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
}
#login-container h1, h2 {
    font-family: 'Permanent Marker', cursive;
  text-align: center;
  margin-bottom: 20px;
  color: #120491;
}
#login-container .description {
    min-width: 800px;
  margin-bottom: 20px;
}
#login-container .social {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: calc(100% - 40px);
  margin: 0 auto;
}

#login-container button {
  width: 80%;
  height: 80px;
  font-size: 2rem;
  margin: 30px 10% 0 10%;
  color: #fffffb;
  border: none;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  background: linear-gradient(45deg, #0511477e, #002fff, #45caff, #280777);
  background-size: 300% 300%;
  outline: none;
  transition: all 200ms ease-in-out;
}
#login-container button:hover {
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
  transform: translateY(2px);
  -webkit-animation: gradientBG 1.5s ease-in-out forwards;
  animation: gradientBG 1.5s ease-in-out forwards;
  cursor: pointer;
}
#login-container button:active {
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
  transform: translateY(4px);
}
#login-container footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #5b5f97;
  color: white;
  width: 100%;
  position: absolute;
  bottom: 0;
  height: 30px;
  padding: 0 20px;
  margin-left: -20px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}
#login-container footer div {
  display: flex;
}
#login-container footer div .fa-heart {
  color: #ff6b6c;
}
#login-container footer div p:first-child {
  margin-right: 10px;
  border-right: 4px solid white;
  padding-right: 10px;
}

@-webkit-keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}
@keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}

    body {
    background-image: url("{{ backgroundForPage('home', 'storage/assets/uploads/bleu.jpg') }}");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;

    }
    .card{
        border-radius: 40px;
        background-color:grey;
    }

    .amaury {
        display: flex;
  justify-content: center;
  align-items: center;
  height: 70vh;
  font-family: 'Big Shoulders Inline Text', cursive;
  color: #222;

    }
</style>

@extends('layouts.app')

@section('content')
<?php
$date = date("d m Y");
$heure = date("H:i");

?>

<div class="amaury">
    <div id="login-container">
    <div class="profile-img"></div>
    <h1>
         Salut la famille, {{ Auth::user()->name }} !
    </h1>
    <div class="description">
        <h2>Pseudo: {{Auth::user()->name}}</h2>
        <br>
        @if(Auth::user()->firstname === NULL)
        @else
        <h2> Prénom: {{Auth::user()->firstname}} </h2>
        <br>
        @endif
        <h2>Email: {{Auth::user()->email}} </h2>
    </div>

   <a href = "{{ @route('user.dashboard') }}"> <button > Mes Tableaux</button> </a>
    <footer>
      <div class="likes">
        <p><i class='fa fa-heart'></i></p>
        <p>{{ $date }}</p>
      </div>
      <div class="projects">
        <p>{{ $heure }}</p>

      </div>
    </footer>
  </div>
</div>





@endsection
