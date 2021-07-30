@extends('layouts.ownerapp')

@section('content')
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

<div class="container">

        <!-- start first row  -->
    <div class="row">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h3 class="text-left"  id="page_header">Edit Student</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="container" style="margin-top: 30px; padding:20px 20px 20px 20px; border-radius: 15px;">
            <h3 class="card-title">Edit a Student</h3>
            <hr/>
            @foreach ($student as $estu)
            <form action="{{ route('updatestudent', $estu->user_id) }}" method="POST">

                {{ csrf_field() }}

                <div class="row">


                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="fristname">Frist Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Frist name ..." value="{{ $estu->user->f_name }}">
                        </div>
                    </div>

                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle name ..." value="{{ $estu->user->m_name }}">
                        </div>
                    </div>
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last name ..." value="{{ $estu->user->l_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="nicnumber">NIC Number</label>
                            <input type="text" name="nicnumber" class="form-control" id="nicnumber" placeholder="Enter Nic Number ..." value="{{ $estu->user->nic_number }}">
                        </div>
                    </div>

                    {{-- <div class="col-sm-7" id="register_form_item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div> --}}
                </div>

                <div class="row">

                    <div class="col-sm-3" id="register_form_item">

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
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $estu->user->gender == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6" id="register_form_item">
                        <div class="form-group">
                            <label for="contactnumber">Contact Number</label>
                            <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="Enter Contact Number ..." value="{{ $estu->user->contact_number}}">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label>Address</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="addressnumber" class="form-control" id="addresslineone" placeholder="Address No ..." value="{{ $estu->user->address_no}}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="addressstreatname" class="form-control" id="addresslinetwo" placeholder="Street ..." value="{{ $estu->user->address_lineone}}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="addresscity" class="form-control" id="addresslinethree" placeholder="city ..." value="{{ $estu->user->address_linetwo}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="category">Vehicle Category</label>
                            <select id="category" class="form-control" name="vehiclecategory">
                                {{-- <option value="">Choose Category</option> --}}
                                <option value="smallvahicle" selected name="vehicalcategory" >light Vehicles</option>
                                <option value="longvehicle" name="vehicalcategory" >Heavy Vehicles</option>
                                <option value="smallvahicle" name="vehicalcategory" >Vehicles</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
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

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
