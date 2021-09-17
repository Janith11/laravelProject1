@extends('layouts.ownerapp')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    label{
        color: #222944;
        font-weight: bold
    }
    .dropdown-toggle::after {
        display: none !important;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-bottom: 0;
        border-left: .3em solid transparent;
    }
</style>

<div class="container">

    <!-- start first row  -->
    <div class="row mb-2">
        <div class="col-12">
            <div style="display: inline-block">
                <h5 style="color: #222944; font-weight: bold; border-right: 2px solid #222944">Instructor&nbsp;&nbsp;</h5>
            </div>
            <div style="display: inline-block">
                <a href="{{ route('owner.ownerdashboad') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </a>
            </div>
            <div style="display: inline-block">
                <a style="padding-top: 6px; padding-left: 10px; text-decoration: none" href="{{ route('instructors') }}"> / Instructor List</a>
                <a style="padding-top: 6px; padding-left: 10px"> / Add New Instructor</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
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

            @if(count($errors) > 0)
            <div class="container">
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
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Add new Instructor</h5>
                    <hr style="border: 0.5px solid #222944">
                    <form action="{{ route('insertinstructor') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="fristname">Frist Name</label>
                                    <input type="text" name="firstname" class="form-control" id="fristname" placeholder="Enter Frist name ...">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle name ...">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last name ...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="nicnumber">NIC Number</label>
                                    <input type="text" name="nicnumber" class="form-control" id="nicnumber" placeholder="Enter Nic Number ...">
                                </div>
                            </div>

                            {{-- <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div> --}}
                            <div class="col-sm-4" id="register_form_item">
                                <label for="gender">Gender</label>
                                <div class="row">
                                    <div class="col" id="register_form_item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col" id="register_form_item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" checked>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="contactnumber">Contact Number</label>
                                    <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="Enter Contact Number ...">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="bithday">Birthday</label>
                                    <input type="date" class="form-control" id="bithday" name="birthday">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label style="padding-left: 15px; padding-top: 10px">Address No</label>
                                    <input type="text" name="addressnumber" class="form-control" id="addresslineone" placeholder="Address No ...">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label style="padding-left: 15px; padding-top: 10px">Address Line One</label>
                                    <input type="text" name="addressstreatname" class="form-control" id="addresslinetwo" placeholder="Street ...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label style="padding-left: 15px; padding-top: 10px">Address Line Two</label>
                                    <input type="text" name="addresscity" class="form-control" id="addresslinethree" placeholder="city ...">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            @foreach ($vehicalcategory as $vehicle)
                            <div class="row">
                            <div class="col-md-4 mt-2" id="{{ $vehicle->category_code }}A">
                                <input type="checkbox" class="form-check-input btn-check" name="vehicle_category[]" value="{{ $vehicle->category_code }}" id="{{ $vehicle->category_code }}1">
                                <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}1" class="col-form-label text-md-right">{{ $vehicle->name }}</label>
                            </div>
                        {{-- <div id="{{ $vehicle->category_code }}B"> --}}
                            <div class="col-md-4 mt-2" style="display: none">
                                <div class="btn-group" id="{{ $vehicle->category_code }}B">
                                    <input type="radio" class="btn-check " name="{{ $vehicle->category_code }}" value="Training" id="{{ $vehicle->id }}1" autocomplete="off" checked/>
                                    <label class="btn btn-outline-success mr-2" for="{{ $vehicle->id }}1">Training</label>

                                    <input type="radio" class="btn-check" name="{{ $vehicle->category_code }}" value="Without Training" id="{{ $vehicle->id }}2" autocomplete="off" />
                                    <label class="btn btn-outline-danger" for="{{ $vehicle->id }}2">Without Training</label>
                                  </div>
                            </div>
                            @if( $vehicle->transmission == 'automanual')
                            <div class="col-md-4 mt-2" id="{{ $vehicle->category_code }}B">
                                <div class="btn-group">
                                    <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Auto" id="{{ $vehicle->id }}3" autocomplete="off"/>
                                    <label class="btn btn-outline-success mr-2" for="{{ $vehicle->id }}3">Auto Transmission</label>

                                    <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Manual" id="{{ $vehicle->id }}4" autocomplete="off" />
                                    <label class="btn btn-outline-danger" for="{{ $vehicle->id }}4">Manual Transmission</label>
                                  </div>
                            </div>
                        {{-- </div>  --}}
                             @endif
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="groupnumber">Default Password</label>
                                <input type="text" name="groupnumber" class="form-control is-valid " id="groupnumber" placeholder="Group Number" value="Instructor@2021" disabled>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm 4" id="register_form_item">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .instructor').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
