@extends('layouts.ownerapp')

<style>
    .uploadimage{
        width: 400px;
        height: auto;
        border-radius: 10px;
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }

    .imgdiv{
        padding: 10px;
        width: 420px;
        background-color: #FFFFFF;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

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
            <a style="padding-top: 6px; padding-left: 10px"> / Add Vehicle</a>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif

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

        <div class="row mb-2">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="color:#222944;"><b>Add New Vehicle</b></h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="row">

                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('addvehicle') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="imageFile">Choose Image</label>
                                    <input type="file" class="form-control" id="image" name="image" onchange="uploadfile(event)">
                                </div>

                                <div class="form-group">
                                    <label for="vehiclename">Name</label>
                                    <input type="text" class="form-control" id="vehiclename" placeholder="Vehicle Name" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="vehicledescription" name="description" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Vehicle</button>
                            </form>
                        </div>

                        <div class="col-sm-6">
                            <div id="card">
                                <h5 style="color: #050E33">Uploaded Image</h5>
                                <div class="imgdiv">
                                    <img id="uploadimage" class="uploadimage"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<script>

    function uploadfile(event){
        var output = document.getElementById('uploadimage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    $(document).ready(function(){
        $('aside ul .vehicle').css('border-left', '5px solid #00bcd4');
    });

</script>

@endsection
