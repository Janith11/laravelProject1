@extends('layouts.ownerapp')

@section('content')
<div class="container">
        
        <!-- start first row  -->
    <div class="row">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h3 class="text-left"  id="page_header">Add Instructor</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card" style="margin-top: 30px; padding:20px 20px 20px 20px; border-radius: 15px;">
            <h3 class="card-title">Add new Instructor</h3>
            <hr/>
            
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

            <form action="{{ route('insertinstructor') }}" method="POST">

                {{ csrf_field() }}

                <div class="row">
                    
                    <div class="col-sm 3" id="register_form_item">
                        <div class="form-group">
                            <label for="firstname">Frist Name</label>
                            <input type="text" name="firstname" class="form-control" id="fristname" placeholder="Enter Frist name ...">
                        </div>
                    </div>

                    <div class="col-sm 3" id="register_form_item">
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle name ...">
                        </div>
                    </div>

                    <div class="col-sm 3" id="register_form_item">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last name ...">
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="nicnumber">Nic Number</label>
                            <input type="text" name="nicnumber" class="form-control" id="nicnumber" placeholder="Enter Nic Number ...">
                        </div>
                    </div>

                    <div class="col-sm-9" id="register_form_item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-sm 3" id="register_form_item">
                        
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

                    <div class="col-sm 3" id="register_form_item">
                        <div class="form-group">
                            <label for="contactnumber">Contact Number</label>
                            <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="Enter Contact Number ...">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm 3">
                        <label>Address</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm 3">
                        <div class="form-group">
                            <input type="text" name="addressnumber" class="form-control" id="addresslineone" placeholder="Address No ...">
                        </div>
                    </div>

                    <div class="col-sm 3">
                        <div class="form-group">
                            <input type="text" name="addressstreatname" class="form-control" id="addresslinetwo" placeholder="Street ...">
                        </div>
                    </div>

                    <div class="col-sm 3">
                        <div class="form-group">
                            <input type="text" name="addresscity" class="form-control" id="addresslinethree" placeholder="city ...">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="category">Vehicle Category</label>
                            <select id="category" class="form-control" name="vehiclecategory">
                                <option value="">Choose Category</option>
                                <option value="longvehicle">Long Vehicles</option>
                                <option value="smallvahicle">Small Vehicles</option>
                            </select>
                        </div>
                    </div>

                    {{-- <div class="col-sm 3" id="register_form_item">
                        <div class="form-group">
                            <label for="languages">Languages</label>
                            <select id="languages" class="form-control" name="language">
                                <option value="">Select Language</option>
                                <option value="english">English</option>
                                <option value="sinhala">Sinhala</option>
                                <option value="tamil">Tamil</option>
                            </select>
                        </div>
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-sm-3" id="register_form_item">
                        <div class="form-group">
                            <label for="bithday">Birthday</label>
                            <input type="date" class="form-control" id="bithday" name="birthday">
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

@endsection