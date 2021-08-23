@extends('layouts.ownerapp')
@section('content')
<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .setwidth{
        max-width: 100px;
    }

    #h{
        margin-bottom: 0;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<div class="container">

    <div class="row mb-2">
        <div>
            <div style="display: inline-block">
                <h5 style="color: #222944; font-weight: bold; border-right: 2px solid #222944 !important;">Requests&nbsp;&nbsp;</h5>
            </div>
            <div style="display: inline-block">
                <a href="{{ route('owner.ownerdashboad') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </a>
            </div>
            <div style="display: inline-block">
                <a style="padding-top: 6px; padding-left: 10px; text-decoration: none !important" href="{{ route('viewrequest') }}"> / Students requests</a>
                <a style="padding-top: 6px; padding-left: 10px"> / Review requests</a>
            </div>
        </div>
    </div>



    {{-- start the loop  --}}


    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Review new Student</h5>
                    <hr style="border: 0.5px solid #222944">

                    @foreach ($registration as $r)
                        <form action="{{ route('acceptrequest',$r->id) }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="fristname">Frist Name</label>
                                    <input type="text" name="firstname" class="form-control" id="fristname" placeholder="Enter Frist name ..." value="{{ $r->f_name }}">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle name ..." value="{{ $r->m_name }}">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last name ..." value="{{ $r->l_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="nicnumber">NIC Number</label>
                                    <input type="text" name="nicnumber" class="form-control" id="nicnumber" placeholder="Enter Nic Number ..." value="{{ $r->nic_number }}">
                                </div>
                            </div>

                            <div class="col-sm-8" id="register_form_item">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $r->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4" id="register_form_item">
                                <label for="gender">Gender</label>
                                <div class="row">
                                    <div class="col" id="register_form_item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $r->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col" id="register_form_item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="male" {{ $r->gender == 'female' ? 'checked' : '' }}>
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
                                    <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="Enter Contact Number ..." value="{{ $r->contact_number }}">
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="bithday">Birthday</label>
                                    <input type="date" class="form-control" id="bithday" name="birthday" value="{{ $r->dob }}">
                                </div>
                            </div>

                        </div>

                     <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" name="addressnumber" class="form-control" id="addresslineone" placeholder="Address No ..." value="{{ $r->address_no }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="addresslineone">Address Line One</label>
                                    <input type="text" name="addressstreatname" class="form-control" id="addresslinetwo" placeholder="Street ..." value="{{ $r->address_lineone }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="addresslineone">Address Line Two</label>
                                    <input type="text" name="addresscity" class="form-control" id="addresslinethree" placeholder="city ..." value="{{ $r->address_linetwo }}">
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @foreach ($category as $c)
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="col-md-4 mt-2" id="{{ $c->category_code }}A">
                                        <input type="checkbox" class="form-check-input btn-check" name="vehicle_category[]" value="{{ $c->category }}" id="{{ $c->category }}1" checked required disabled>
                                        <label class="btn btn-outline-dark btn-block" for="{{ $c->category }}1" class="col-form-label text-md-right">{{ $c->category }}</label>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="btn-group " id="{{ $c->category }}B">
                                        <input type="radio" class="btn-check " name="{{ $c->category }}" value="Training" id="{{ $c->id }}1" {{ $c->tstatus == 'Training' ? 'checked' : '' }} / disabled>
                                        <label class="btn btn-outline-success m-1" for="{{ $c->id }}1">Training</label>

                                        <input type="radio" class="btn-check" name="{{ $c->category }}" value="Without Training" id="{{ $c->id }}2" {{ $c->tstatus == 'Without Training' ? 'checked' : '' }}/ disabled>
                                        <label class="btn btn-outline-danger m-1" for="{{ $c->id }}2">Without Training</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    @if( $c->transmission != '3')
                                    <div class="btn-group">
                                        <input type="radio" class="btn-check" name="trans{{ $c->category }}" value="Auto" id="{{ $c->id }}3" {{ $c->transmission == 'Auto' ? 'checked' : '' }}/ disabled>
                                        <label class="btn btn-outline-success m-1" for="{{ $c->id }}3">Auto Transmission</label>

                                        <input type="radio" class="btn-check" name="trans{{ $c->category }}" value="Manual" id="{{ $c->id }}4" {{ $c->transmission == 'Manual' ? 'checked' : '' }}/ disabled>
                                        <label class="btn btn-outline-danger m-1" for="{{ $c->id }}4">Manual Transmission</label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control is-valid" id="price" placeholder="Total Price" value="17500">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="groupnumber">Group Number</label>
                                    <input type="text" name="groupnumber" class="form-control is-valid" id="groupnumber" placeholder="Group Number" value="1">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="groupnumber">Number of Session Days</label>
                                    <input type="text" name="totalsession" class="form-control is-valid" id="groupnumber" placeholder="Total Session days" value="30">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm 4" id="register_form_item">
                                <button type="submit" class="btn btn-success">Reviewed & Register</button>
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
        $('aside ul .requests').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection

