@extends('layouts.ownerapp')

@section('content')

<div class="container">

    <!-- start first row  -->
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Student</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentslist') }}"> / Students List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Edit Student</a>
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

    @if(session('error'))
        <div class="alert alert-danger">
            <h5>{{ session('error') }}</h5>
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

    <div class="row justify-content-md-center">
        <div class="container mt-3" >
            <div class="card">
            <div class="card-body">
            <h3 class="card-title">Edit a Student</h3>
            <hr/>
            @foreach ($student as $estu)
            <form action="{{ route('updatestudent', $estu->user_id) }}" method="POST">

                {{ csrf_field() }}

                <div class="row">

                    <div class="col-sm-4" id="register_form_item">
                        <div class="form-group">
                            <label for="fristname">Frist Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Frist name ..." value="{{ $estu->user->f_name }}">
                        </div>
                    </div>

                    <div class="col-sm-4" id="register_form_item">
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle name ..." value="{{ $estu->user->m_name }}">
                        </div>
                    </div>
                    <div class="col-sm-4" id="register_form_item">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last name ..." value="{{ $estu->user->l_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4" id="register_form_item">
                        <div class="form-group">
                            <label for="nicnumber">NIC Number</label>
                            <input type="text" name="nicnumber" class="form-control" id="nicnumber" placeholder="Enter Nic Number ..." value="{{ $estu->user->nic_number }}">
                        </div>
                    </div>

                    <div class="col-sm-4" id="register_form_item">

                        <label for="gender">Gender</label>
                        <div class="row">
                            <div class="col" id="register_form_item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $estu->user->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                            </div>

                            <div class="col" id="register_form_item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $estu->user->gender == 'female' ? 'checked' : '' }}>
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
                            <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="Enter Contact Number ..." value="{{ $estu->user->contact_number}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Address no</label>
                        <input type="text" name="addressnumber" class="form-control" id="addresslineone" placeholder="Address No ..." value="{{ $estu->user->address_no}}">
                    </div>
                    <div class="col-sm-4">
                        <label>Address Line One</label>
                        <input type="text" name="addressstreatname" class="form-control" id="addresslineone" placeholder="Address line one" value="{{ $estu->user->address_lineone}}">
                    </div>
                    <div class="col-sm-4">
                        <label>Address Line Two</label>
                        <input type="text" name="addresscity" class="form-control" id="addresslineone" placeholder="Address line two" value="{{ $estu->user->address_linetwo}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4" id="register_form_item">
                        <div class="form-group">
                            <label for="bithday">Birthday</label>
                            <input type="date" class="form-control" id="bithday" name="birthday" value="{{ $estu->user->dob}}">
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-sm 4" id="register_form_item">
                        <button type="submit" class="btn btn-primary">Update</button>
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
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
