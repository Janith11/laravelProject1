@extends('layouts.student')

@section('content')

    <meta name="_token" content="{{ csrf_token() }}">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<style>
    #img{
        width: 80%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }

    #header{
        color: #222944;
        font-weight: bold;
    }

    .cropimg {
		display: block;
		max-width: 100%;
	}

	.preview {
		overflow: hidden;
		width: 160px;
		height: 160px;
		margin: 10px;
		border: 1px solid red;
	}

	.modal-lg{
		max-width: 500px !important;
	}

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Profile</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Profile details</a>
    </div>

    <div class="row-mb-2">
        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Wooops!! some errors with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @if(session('successmsg'))
        <div class="row-mb-2">
            <div class="alert alert-success">
                {{ session('successmsg') }}
            </div>
        </div>
    @endif

    <div class="row-mb-2">

        @foreach($student as $result)

            <div class="row">

                <div class="col-sm-4">

                    <div id="card">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="/uploadimages/students_profiles/{{ $result->user->profile_img }}" alt="Profile image" id="img">
                                <div id="card">
                                    <button class="btn btn-primary" id="change_profile">Chage Profile</button>
                                </div>
                                <div id="card" class="input_image" style="display: none">
                                    <input type="file" name="image" class="image">
                                </div>
                                <div id="card">
                                    <h5 id="header">{{ $result->user->f_name }} {{ $result->user->m_name }} {{ $result->user->l_name }}</h5>
                                </div>
                                <div id="card">
                                    {{ $result->user->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="card" class="text-center">
                        <a type="button" class="btn btn-primary" href="{{ route('studentchangepassword') }}">Change Password</a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('updatestudentprofile') }}">

                                    @csrf

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <h5 id="header">General Information</h5>
                                            <hr style="border-top: 1px solid #222944">

                                            <div class="form-group">
                                                <label>Frist name</label>
                                                <input type="text" class="form-control" value="{{ $result->user->f_name }}" name="first_name">
                                            </div>

                                            <div class="form-group">
                                                <label>Middle name</label>
                                                <input type="text" class="form-control" value="{{ $result->user->m_name }}" name="middle_name">
                                            </div>

                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" class="form-control" value="{{ $result->user->l_name }}" name="last_name">
                                            </div>

                                            <div class="form-group">
                                                <label>NIC Number</label>
                                                <input type="text" class="form-control" value="{{ $result->user->nic_number }}" name="nic_number">
                                            </div>

                                            <h6>Gender</h6>
                                            <div>
                                                <div class="form-group" style="display: inline-block">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $result->user->gender === 'male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="male">
                                                        Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: inline-block; padding-left: 10px">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $result->user->gender === 'female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="date" class="form-control" value="{{ $result->user->dob }}" name="date_of_birth">
                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <h5 id="header">Contact details</h5>
                                            <hr style="border-top: 1px solid #222944">

                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="{{ $result->user->contact_number }}" name="mobile_number">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="{{ $result->user->email }}" name="email">
                                            </div>

                                            <div class="form-group">

                                                <h6>Address</h6>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $result->user->address_no }}" name="address_no">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $result->user->address_lineone }}" name="address_line_one">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $result->user->address_linetwo }}" name="address_line_two">
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div id="card" style="padding-left: 15px">
                                            <button class="btn btn-success" type="submit">Save Changes</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Image for your Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="img-container">
                    <!-- <div class="row"> -->

                        <div>
                            <img id="image" class="cropimg" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>

                        <!-- <div class="col-md-4"> -->
                            <div class="preview" style="display:none;"></div>
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>

        </div>
    </div>
</div>

<script>

    $('#change_profile').click(function(){
        $('.input_image').toggle();
    });

    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 250,
            height: 250,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/studentprofile/updateprofileimage",
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                    success: function(data){
                        console.log(data);
                        $modal.modal('hide');
                        // alert("Crop image successfully uploaded");
                        location.reload();
                    }
                });
            }
        });
    })

</script>

@endsection
