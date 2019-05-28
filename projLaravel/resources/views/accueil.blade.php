@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@section('content')
<h1>Bienvenue</h1> 

<div class="container">
    <a href="statistique">
    <span  style="font-size:3000%; color: tomato;">
        <i class="fas fa-chart-area"></i>
    </span>
    </a>
    
    <a href="ronde">
        <span  style="font-size:2500%; color: #0066cc;">
        <i class="fas fa-map-marked-alt"></i>
    </span>
    </a>
</div>
@endsection




