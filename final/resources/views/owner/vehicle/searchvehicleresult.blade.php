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
            <a href="{{ route('vehicles') }}" style="padding-top: 6px; padding-left: 10px"> > Vehicle List</a>
        </div>

        <div class="row justify-content-center">
            @foreach ($searchvehicle as $result)
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Vehicle Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col col-lg-6" >
                                <img class="img-thumbnail" src="/uploadimages/vehicles/{{ $result->image }}" style="width: 100%">
                            </div>
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <label style="color: #222944; font-size: 20px; font-weight: bold">Vehicle name : </label>
                                    <label style="color: #222944; font-size: 20px">{{ $result->name }}</label>
                                </div>
                                <div class="form-group">
                                    <label style="color: #222944; font-size: 20px; font-weight: bold">About Vehicle : </label>
                                    <label style="color: #222944; font-size: 20px">{{ $result->description }}</label>
                                </div>
                                <div class="form-group">
                                    <a type="button" class="btn" style="color: white; background-color: #222944" href="{{ route('editvehicle', $result->id) }}">Edit</a>
                                    <form method="POST" action="{{ route('deletevehicles', $result->id) }}" id="delete-form-{{ $result->id }}" style="display: none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $result->id }}').submit();
                                    }else{
                                        event.preventDefault();
                                    }" href="" class="btn btn-primary" style="background-color: #FA1B39;">Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('aside ul .vehicle').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
