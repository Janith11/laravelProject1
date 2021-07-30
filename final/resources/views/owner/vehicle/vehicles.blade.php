@extends('layouts.ownerapp')

@section('content')
    <div class="container">

        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Vehicles</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a style="padding-top: 6px; padding-left: 10px"> / Vehicle list</a>
        </div>

        <div class="row mb-2">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="float-left" style="padding-left: 10px">
                            <h5 style="color: #222944">Total Vehicle : {{ $vehicle_count }}</h5>
                        </div>
                        <div class="float-right">
                            <div style="display: inline-block">
                                <a href="{{ route('addvehicles') }}" type="button" class="btn btn-success" style="color: #222944; background-color: #FFAF38">Add New</a>
                            </div>
                            <div style="display: inline-block">
                                <form method="post" action="{{ route('searchvehicle') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="test" class="form-control" id="searchvehicle" aria-describedby="emailHelp" placeholder="Enter Vehicle Name" name="searchvehicle" style="width: 100%">
                                    </div>
                            </div>
                            <div style="display: inline-block">
                                    <button type="submit" class="btn" style="background-color: #0B7714; color: white">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5><strong>Wooops!1</strong>Enter Vehicle Name to Search</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('searcherror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('searcherror') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('emptymsg'))
            <div class="alert alert-alert-info alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('emptymsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
            @if($vehicle_count > 0)
            @foreach($vehicles as $vehicle)
            <div class="col col-lg-4">
                <div class="card" style=" border-radius: 10px; margin-top: 10px;">
                    <figure id="figure">
                        <img class="card-img-top" src="/uploadimages/vehicles/{{ $vehicle->image }}" style="border-radius: 10px 10px 0px 0px;" id="vehicle_image">
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold;">{{ $vehicle->name }}</h5>
                        <p class="card-text" style="color: #222944;">{{ $vehicle->description }}</p>
                        <a href="{{ route('editvehicle', $vehicle->id) }}" class="btn btn-primary" style="background-color: #222944;">Edit</a>
                        <form method="POST" action="{{ route('deletevehicles', $vehicle->id) }}" id="delete-form-{{ $vehicle->id }}" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $vehicle->id }}').submit();
                        }else{
                            event.preventDefault();
                        }" href="" class="btn btn-primary" style="background-color: #FA1B39;">Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('aside ul .vehicle').css('border-left', '5px solid #00bcd4');
        })
    </script>
@endsection
