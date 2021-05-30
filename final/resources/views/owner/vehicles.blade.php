@extends('layouts.ownerapp')

@section('content')
    <div class="container">

        <div class="row mb-2">
            <div class="card" style="width: 100%;">
                <h4 id="page_header" style="color: #222944; padding: 13px 0px 7px 25px;">Vehicles</h4>
            </div>
        </div>

        <div class="row mb-2 justify-content-end">
            <div class="form-inline">
                <div class="col align-self-end" style="display: flex;">
                    <div class="col" style="padding-right: 0px;">
                        <a type="button" class="btn btn-primary" href="{{ route('addvehicles') }}" style="color: #222944; background-color: #FFAF38;;">Add New</a>
                    </div>
                    
                    <div class="col" style="display: none; padding-left: 0px; padding-right: 0px;" id="searchvehicle">
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Vahicle Name" name="searchname">
                    </div>
                    
                    <div class="col" style="padding-left: 0px;">
                        <button type="button" class="btn btn-dark" style="color: white; background-color: #222944;" onclick="showbar()">Search</button>
                    </div>
                </div>
            </div>
        </div>

        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-center">
            @foreach($vehicles as $vehicle)
            <div class="col col-lg-4">
                <div class="card" style=" border-radius: 10px; margin-top: 10px;">
                    <figure id="figure">
                        <img class="card-img-top" src="/uploadimages/vehicles/{{ $vehicle->image }}" style="border-radius: 10px 10px 0px 0px;" id="vehicle_image">
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold;">{{ $vehicle->name }}</h5>
                        <p class="card-text" style="color: #222944;">{{ $vehicle->description }}</p>
                        <a href="#" class="btn btn-primary" style="background-color: #222944;">Edit</a>
                        <a href="#" class="btn btn-primary" style="background-color: #FA1B39;">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <script>
            function showbar(){
                var x = document.getElementById("searchvehicle");
                if (x.style.display == "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>        

    </div>
@endsection