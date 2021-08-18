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
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / Prohibitory Signs</a>
    </div>

    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Prohibitory Signs</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/1.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Entry</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/15.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Left Turn</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/16.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Right Turning</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/18.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No U-Turn </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/14.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Horning</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/2.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for All Vehicles</h3>
                </div>
            </div>
        </div>    
    </div> 
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/7.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for All Buses</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/13.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Lorries</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/11.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Cars and Motor Cycles</h3>
                </div>
            </div>
        </div> 
    </div>   
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/12.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Pedestrains</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/9.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Cyclists</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/10.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Motor Cyclists</h3>
                </div>
            </div>
        </div>  
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/8.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Road Closed for Cars</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/19.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Parking</h3>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/17.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">No Parking and Standing</h3>
                </div>
            </div>
        </div>  
    </div>  
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href=""><img class="card-img-top" src="/images/roadsigns/Prohibitorysigns/4.png" alt="Card image cap"></a>
                <div class="card-body">
                    <h3 class="card-text">Speed Limit</h3>
                </div>
            </div>
        </div>  
    </div>  

</div>
@endsection