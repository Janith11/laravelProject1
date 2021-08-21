@extends('layouts.landingpage')
@section('content')
<style>
    .card {
       transition: transform 0.2s ease;
       box-shadow: 6px 6px 12px 6px rgba(27, 27, 29, 0.18);
       border-radius:30px;
       border: 0;
       margin-bottom: 1.5em;
       padding: 30px;
   }
   .card:hover {
       transform: scale(1.02);
   }
   body{
        background-color: aliceblue;
   }
</style>

<div class="container" >
    <div class="row mb-2 mt-5">
        <a href="{{route('roadsigns')}}">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Road Signs</h5>
        </a>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / Route Number Signs</a>
    </div>

    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Route Number Signs</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Routenumbersigns/1.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Left Turn</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Routenumbersigns/2.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Right Turn</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Routenumbersigns/3.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Straight</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection