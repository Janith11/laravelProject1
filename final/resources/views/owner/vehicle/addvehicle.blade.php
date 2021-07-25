@extends('layouts.ownerapp')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">

        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Vehicles</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a href="{{ route('vehicles') }}" style="padding-top: 3px; padding-left: 10px"> / Vehicle List</a>
            <a style="padding-top: 3px; padding-left: 10px"> / Add Vehicle</a>
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

                        <div class="col">
                            <form method="POST" action="{{ route('addvehicle') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="imageFile">Choose Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
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

                        <div class="col-6">
                            <div class="col" id="one" style="text-align: center; vertical-align: middle;">
                                <div class="col">
                                    <div id="upload-demo"></div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success upload-image">Crop & Save</button>
                                </div>
                            </div>

                            <div class="col" id="two" style="display: none; text-align: center; vertical-align: middle; justify-content: center; margin: auto;">
                                <div id="preview-crop-image" style="background:#E9E8E8;width:300px;padding:10px 10px; height:300px; border-radius: 10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 200,
                height: 200,
                type: 'square' //square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#image').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.upload-image').on('click', function (ev) {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $.ajax({
                    type: "POST",
                    data: {"image":img},
                    success: function (data) {
                        html = '<img src="' + img + '" />';
                        $("#preview-crop-image").html(html);
                        document. getElementById("two"). style. display = "block";
                        document. getElementById("one"). style. display = "none";
                    }
                });
            });
        });

    </script>

@endsection
