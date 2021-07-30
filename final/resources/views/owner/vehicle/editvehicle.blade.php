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

                    @if(count($errors) > 0)
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
                    @endif

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
                                        <label for="name" style="color: #222944">Vehicle Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="name" value="{{ $editvehicle->name }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"  style="color: #222944">Desription</label>
                                        <textarea class="form-control" id="description" placeholder="details" name="description">{{ $editvehicle->description }}</textarea>
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
