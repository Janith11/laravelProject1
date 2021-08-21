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
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / Informative Signs</a>
    </div>

    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Informative Signs</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/1.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Pedestrian Crossing</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/2.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Pedestrian Underpass</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/3.png" alt="Card image cap" style="height: 300px; width: auto"></a>
                <div class="card-body">
                    <h3 class="card-text">Pedestrian Overpass</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/4.png" alt="Card image cap" style="height: 290px;width: auto"></a>
                <div class="card-body">
                    <h3 class="card-text">Bus Stop</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/5.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Bus only Lane begins or continue</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/6.png" alt="Card image cap" ></a>
                <div class="card-body">
                    <h3 class="card-text">Bus only Lane ends</h3>
                </div>
            </div>
        </div>    
    </div> 

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/7.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Street for Pedestrians only</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/8.png" alt="Card image cap" style="height: 300px;width: auto"></a>
                <div class="card-body">
                    <h3 class="card-text">Parking</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/9.png" alt="Card image cap" style="height: 300px;width: auto"></a>
                <div class="card-body">
                    <h3 class="card-text">Expressway</h3>
                </div>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Informativesigns/10.png" alt="Card image cap" style="height: 300px;width: auto"></a>
                <div class="card-body">
                    <h3 class="card-text">End of Expressway</h3>
                </div>
            </div>
        </div>
    </div> 
 
</div>
@endsection