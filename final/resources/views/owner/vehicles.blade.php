@extends('layouts.ownerapp')

@section('content')
    <div class="container">

        <div class="row mb-2">
            <div class="card" style="width: 100%;">
                <h4 id="page_header" style="font-family: 'BioRhyme', serif; padding: 13px 0px 7px 25px;">Vehicles</h4>
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
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="color: #222944; font-weight: bold;">All Vehicles</h5>
                    <table class="table" style="padding: 20px 20px 20px 20px;">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <th scope="row">{{ $vehicle->name }}</th>
                                <td>{{ $vehicle->description }}</td>
                                <td><img src=""></td>
                                <td>
                                    <div class="row justify-content-end">
                                        <div class="col-2">
                                            <div style="height: 50px; width: 50px; background-color: #E6E7EB; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-align: center;" id="edit">
                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pencil-fill" viewBox="0 0 16 16" >
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div style="height: 50px; width: 50px; background-color: #E6E7EB; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-align: center;" id="edit">
                                                <a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>    

                <!-- <div class="col-1">
                    <div style="height: 50px; width: 50px; background-color: #222944; border-radius: 50%; display: inline-block; display: flex; align-items: center; justify-content: center; text-align: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-caret-left" viewBox="0 0 16 16">
                            <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="col-10">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-primary">Remove</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-1">
                    <div style="height: 50px; width: 50px; background-color: #222944; border-radius: 50%; display: inline-block; display: flex; align-items: center; justify-content: center; text-align: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                        </svg>
                    </div>
                </div> -->
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

        <!-- Add New Vehicle Modal -->
        

    </div>
@endsection