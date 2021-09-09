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
            <a href="{{ route('vehicles') }}" style="padding-top: 6px; padding-left: 10px"> / Vehicle List</a>
            <a style="padding-top: 6px; padding-left: 10px"> / Edit Vehicle</a>
        </div>

        <div class="row mb-2">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="color: #222944; font-weight: bold">Edit Vehicle</h5>
                    <hr>

                    {{-- @if(count($errors) > 0)
                        <div class="row mb-2">
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Some problems with your input.
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif --}}

                        <div class="row">

                            <div class="col-lg-6">
                                <div style="text-align: center" id="edit_image">
                                    <img src="/uploadimages/vehicles/{{ $editvehicle->image }}" class="img-thumbnail" width="100%" height="auto" style="border-radius: 10px">
                                    <div class="middle">
                                        <div class="btn">
                                            <button class="btn" onclick=display()>Change Image</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <form action="{{ route('updatevehicle', $editvehicle->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" id="chooseimage" style="display: none">
                                        <label for="name" style="color: #222944">Choose New Vehicle</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="vehiclename">Vehicle Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="vehiclename" placeholder="Vehicle Name..." name="name" value="{{ $editvehicle->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label for="vehiclename">Vehicle Category</label>
                                        <select class="custom-select" name="category">
                                            {{-- <option selected>Select  a vehicle category</option> --}}
                                            <option value="Bike" {{ 'Bike' == $editvehicle->category ? 'selected' : ''}}>Bike</option>
                                            <option value="Three Wheel" {{ 'Three Wheel' == $editvehicle->category ? 'selected' : ''}}>Three Wheel</option>
                                            <option value="Car, Van & Dual Purposes" {{ 'Car, Van & Dual Purposes' == $editvehicle->category ? 'selected' : ''}}>Car, Van & Dual Purposes</option>
                                            <option value="Heavy Vehicle" {{ 'Heavy Vehicle' == $editvehicle->category ? 'selected' : ''}}>Heavy Vehicle</option>
                                          </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="vehiclename">Vehicle Transmission</label>
                                        <select class="custom-select" name="transmission">
                                            {{-- <option selected>Select the type of Vehicle Transmission</option> --}}
                                            <option value="Auto" {{ 'Auto' == $editvehicle->transmission ? 'selected' : ''}}>Auto</option>
                                            <option value="Manual" {{ 'Manual' == $editvehicle->transmission ? 'selected' : ''}}>Manual</option>
                                          </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="vehiclename">Vehicle Condition</label>
                                        <select class="custom-select" name="condition">
                                            {{-- <option selected>Select the condition of the vehicle</option> --}}
                                            <option value="Excellent" {{ 'Excellent' == $editvehicle->condition ? 'selected' : ''}}>Excellent</option>
                                            <option value="Very Good" {{ 'Very Good' == $editvehicle->condition ? 'selected' : ''}}>Very Good</option>
                                            <option value="Good" {{ 'Good' == $editvehicle->condition ? 'selected' : ''}}>Good</option>
                                            <option value="Fair" {{ 'Fair' == $editvehicle->condition ? 'selected' : ''}}>Fair</option>
                                        </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="vehiclename">Mileage (km)</label>
                                        <input type="number" class="form-control @error('mileage') is-invalid @enderror"  placeholder="Mileage in kilometers" name="mileage" value="{{ $editvehicle->mileage }}">
                                        @error('mileage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>

        <script>
            function display(){
                document.getElementById('chooseimage').style = 'block';
            }
        </script>

    </div>

    <script>
        $(document).ready(function(){
            $('aside ul .vehicle').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
