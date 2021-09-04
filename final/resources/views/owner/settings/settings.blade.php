@extends('layouts.ownerapp')

@section('content')

    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<style>
    #heding{
        color: #222944;
        font-weight: bold
    }
    #img{
        width: 80%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
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

    /* setting buttons */
    .settingbtn{
        border: 1px solid #080529;
        cursor: pointer;
        padding: 5px;
        border-radius: 5px 5px 0px 0px;
        color: #080529;
    }
    .settingbtn:focus{
        outline: 0;
    }
    .settingbtnclick{
        border-bottom: 1px solid white;
        background-color: white;
    }
    .settingbtnnotclick{
        background-color: rgb(177, 177, 177);
        border: 1px solid #080529;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Settings</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Settings</a>
    </div>

    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success" role="alert" style="width: 100%">
                {{ session('successmsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('error'))
            <div class="alert alert-danger" role="alert" style="width: 100%">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row-mb-2">
        <div>
            <button class="settingbtn btnone">Company Details</button>
            <button class="settingbtn btntwo">Open Hours</button>
            <button class="settingbtn btnthree">Other</button>
            <button class="settingbtn btnfour">Profile</button>
            <hr style="border-top: 1px solid #080529; margin-top: -1px">
        </div>
    </div>

    <div class="row-mb-2">
        {{-- company details --}}
        <div id="company_details">
            <form action="{{ route('savedetails') }}" method="POST">
                @csrf
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 id="heding">Company Details</h5>
                            <hr style="border: 0.5px solid #222944">
                            @foreach($details as $detail)
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="heding">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="c_name" value="{{ $detail->company_name }}" id="details">
                                    </div>
                                    <div class="form-group">
                                        <label id="heding">Company Email</label>
                                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="c_email" value="{{ $detail->email }}" id="details">
                                    </div>
                                    <div class="form-group">
                                        <label id="heding">Contact Numer</label>
                                        <input type="text" class="form-control"  placeholder="Contact Number" name="c_contact_number" value="{{ $detail->contact_number }}" id="details">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="heding">Company Address</label>
                                        <input type="text" class="form-control"  placeholder="Address No." name="address_no" value="{{ $detail->address_no }}" id="details">
                                        <small>address number</small>
                                        <input type="text" class="form-control"  placeholder="Address Line One" name="address_lineone" value="{{ $detail->address_lineone }}" id="details">
                                        <small>address line one</small>
                                        <input type="text" class="form-control"  placeholder="Address Line Two" name="address_linetwo" value="{{ $detail->address_linetwo }}" id="details">
                                        <small>address line two</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row-mb-2">
                                <div id="card">
                                    <div class="text-center" >
                                        <button type="submit" class="btn btn-success" id="save" >Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- open hours --}}
        <div id="open_hours" style="display: none">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('saveopenhours') }}" method="POST">
                            @csrf
                            <h5 id="heding">Open Hours</h5>
                            <hr style="border: 0.5px solid #222944">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($open_hours as $open_hour)
                                            @if($open_hour->weekday_id == 1)
                                                <tr>
                                                    <th scope="col">Monday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="monday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="monday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @elseif ($open_hour->weekday_id == 2)
                                                <tr>
                                                    <th scope="col">Tuesday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="tuesday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="tuesday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @elseif ($open_hour->weekday_id == 3)
                                                <tr>
                                                    <th scope="col">Wednesday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="wednesday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="wednesday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @elseif ($open_hour->weekday_id == 4)
                                                <tr>
                                                    <th scope="col">Thursday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="thursday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="thursday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @elseif ($open_hour->weekday_id == 5)
                                                <tr>
                                                    <th scope="col">Friday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="friday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="friday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @elseif ($open_hour->weekday_id == 6)
                                                <tr>
                                                    <th scope="col">Saturday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="saturday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="saturday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th scope="col">Sunday</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="sunday_from" value="{{ $open_hour->from }}" id="time">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" name="sunday_to" value="{{ $open_hour->to }}" id="time">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row-mb-2">
                                <div id="card">
                                    <div class="text-center" >
                                        <button type="submit" class="btn btn-success" id="time_save">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- other settings --}}
        <div id="others" style="display: none">
            <div class="row">
                <div class="col-sm-6">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5 id="heding">Company Logo</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        @foreach($details as $detail)
                                            <img src="/uploadimages/company_logo/{{$detail->logo}}" alt="company logo" class="img-thumbnail">
                                        @endforeach
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{ route('savelogo') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" name="c_logo">
                                                <small>The logo size should be 540x150</small>
                                            </div>
                                            <div>
                                                <button class="btn btn-success" type="submit">Save Image</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5 id="heding">Sheduling Type</h5>
                                <form action="{{ route('changeshedulingtype') }}" method="POST">
                                    @csrf
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shedule_type" value="1" id="one">
                                        <label class="form-check-label">
                                            By Owner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shedule_type"  value="2" id="two">
                                        <label class="form-check-label">
                                            Only Students
                                        </label>
                                    </div>
                                    <div>
                                        <div id="card">
                                            <button class="btn btn-success" type="submit">Change Type</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- profile settings --}}
        <div id="owner_profile" style="display: none">
            @foreach($owners as $owner)


            <div class="row">

                <div class="col-sm-4">

                    <div id="card">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="/uploadimages/owner_profile/{{ $owner->profile_img }}" alt="Profile image" id="img">
                                <div id="card">
                                    <button class="btn btn-primary" id="change_profile">Chage Profile</button>
                                </div>
                                <div id="card" class="input_image" style="display: none">
                                    <input type="file" name="image" class="image">
                                </div>
                                <div id="card">
                                    <h5 id="header">{{ $owner->f_name }} {{ $owner->m_name }} {{ $owner->l_name }}</h5>
                                </div>
                                <div id="card">
                                    {{ $owner->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="card" class="text-center">
                        <a type="button" class="btn btn-primary" href="{{ route('ownerpassword') }}">Change Password</a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('saveprofiledetails') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5 id="header">General Information</h5>
                                            <hr style="border-top: 1px solid #222944">
                                            <div class="form-group">
                                                <label>Frist name</label>
                                                <input type="text" class="form-control" value="{{ $owner->f_name }}" name="first_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Middle name</label>
                                                <input type="text" class="form-control" value="{{ $owner->m_name }}" name="middle_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" class="form-control" value="{{ $owner->l_name }}" name="last_name">
                                            </div>
                                            <div class="form-group">
                                                <label>NIC Number</label>
                                                <input type="text" class="form-control" value="{{ $owner->nic_number }}" name="nic_number">
                                            </div>
                                            <h6>Gender</h6>
                                            <div>
                                                <div class="form-group" style="display: inline-block">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $owner->gender === 'male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="male">
                                                        Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: inline-block; padding-left: 10px">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $owner->gender === 'female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="date" class="form-control" value="{{ $owner->dob }}" name="date_of_birth">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 id="header">Contact details</h5>
                                            <hr style="border-top: 1px solid #222944">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="{{ $owner->contact_number }}" name="mobile_number">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="{{ $owner->email }}" name="email">
                                            </div>
                                            <div class="form-group">
                                                <h6>Address</h6>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $owner->address_no }}" name="address_no">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $owner->address_lineone }}" name="address_line_one">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $owner->address_linetwo }}" name="address_line_two">
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

    $( document ).ready(function() {
        $('#open_hours').hide();
        $('#others').hide();
        $('#owner_profile').hide();
        $('.btnone').addClass('settingbtnclick');
        $('.btntwo').addClass('settingbtnnotclick');
        $('.btnthree').addClass('settingbtnnotclick');
        $('.btnfour').addClass('settingbtnnotclick');

        if({{ $type }} == 1) {
            $("#one").attr('checked', 'checked');
        } else {
            $("#two").attr('checked', 'checked');
        }

    });

    $('.btnone').click(function(){
        $('#company_details').show();
        $('#open_hours').hide();
        $('#others').hide();
        $('#owner_profile').hide();
        $('.btnone').removeClass('settingbtnnotclick');
        $('.btnone').addClass('settingbtnclick');
        $('.btntwo').removeClass('settingbtnclick');
        $('.btntwo').addClass('settingbtnnotclick');
        $('.btnthree').removeClass('settingbtnclick');
        $('.btnthree').addClass('settingbtnnotclick');
        $('.btnfour').removeClass('settingbtnclick');
        $('.btnfour').addClass('settingbtnnotclick');
    });

    $('.btntwo').click(function(){
        $('#open_hours').show();
        $('#company_details').hide();
        $('#owner_profile').hide();
        $('#others').hide();
        $('.btnone').removeClass('settingbtnclick');
        $('.btnone').addClass('settingbtnnotclick');
        $('.btntwo').removeClass('settingbtnnotclick');
        $('.btntwo').addClass('settingbtnclick');
        $('.btnthree').removeClass('settingbtnclick');
        $('.btnthree').addClass('settingbtnnotclick');
        $('.btnfour').removeClass('settingbtnclick');
        $('.btnfour').addClass('settingbtnnotclick');
    });

    $('.btnthree').click(function(){
        $('#open_hours').hide();
        $('#company_details').hide();
        $('#owner_profile').hide();
        $('#others').show();
        $('.btnone').removeClass('settingbtnclick');
        $('.btnone').addClass('settingbtnnotclick');
        $('.btntwo').removeClass('settingbtnclick');
        $('.btntwo').addClass('settingbtnnotclick');
        $('.btnthree').removeClass('settingbtnnotclick');
        $('.btnthree').addClass('settingbtnclick');
        $('.btnfour').removeClass('settingbtnclick');
        $('.btnfour').addClass('settingbtnnotclick');
    });

    $('.btnfour').click(function(){
        $('#open_hours').hide();
        $('#company_details').hide();
        $('#others').hide();
        $('#owner_profile').show();
        $('.btnone').removeClass('settingbtnclick');
        $('.btnone').addClass('settingbtnnotclick');
        $('.btntwo').removeClass('settingbtnclick');
        $('.btntwo').addClass('settingbtnnotclick');
        $('.btnthree').removeClass('settingbtnclick');
        $('.btnthree').addClass('settingbtnnotclick');
        $('.btnfour').removeClass('settingbtnnotclick');
        $('.btnfour').addClass('settingbtnclick');
    });

</script>

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
                    url: "/settings/savesprofileimage",
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

<script>
    $(document).ready(function(){
        $('aside ul .settings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
