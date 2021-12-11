@extends('layouts.ownerapp')

@section('content')

<style>

    .heading{
        color: #040C2E;
        font-weight: bold;
    }

    /* style for help buttons */
    .help{
        background-color: #505152;
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        text-align: center;
        cursor: pointer;
    }

    /* style for student selecting buttons */
    .student-selecting-label{
        border: 1px solid #040C2E;
        padding: 5px 10px 0px 10px;
        color: #040C2E;
        border-radius: 5px;
        cursor: pointer;
    }

    .student-selecting-checked{
        display: none;
    }

    .student-selecting-checked:checked + .student-selecting-label{
        background-color: #040C2E;
        color: white;
    }

    /* style for help text */
    .help-txt{
        z-index: 10;
        position: absolute;
        background-color: #505152A8;
        color: white;
        width: 200px;
        height: auto;
        padding: 10px;
        border-radius: 10px;
        right: 10px;
        display: none;
    }

    /* style for session type */
    .session{
        border: 1px solid #040920;
        border-radius: 5px;
        padding: 5px 10px 0px 10px;
        color: #040920;
        cursor: pointer;
    }

    .session_click{
        display: none;
    }

    .session_click:checked + .session{
        background-color: #040920;
        color: white;
    }

    /* style for session selection panel */
    .child-panel{
        padding: 10px;
        border-radius: 5px;
    }

    .child-panel:hover{
        background-color: #939597
    }

    /* style for result table */
    .result-panel{
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #EB9413;
    }

    /* auto manual style */
    .trans_click{
        display: none
    }

    .trans{
        border: 1px solid #010824;
        border-radius: 5px;
        padding: 5px 10px 0px 10px;
        color: #010824;
        cursor: pointer;
    }

    .trans_click:checked + .trans{
        background-color: #010824;
        color: white
    }

    /* student view profile */
    .viewprofile{
        text-decoration: none;
        background-color: #090233;
        color: white !important;
        padding: 5px 10px 5px 10px;
        border-radius: 50px;
    }

    .viewprofile:hover{
        text-decoration: none !important;
    }

    /* student profile image */
    .img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    /* check icon */
    .icondiv{
        border: 1px solid #FFD700;
        padding: 0px 5px 0px 5px;
        border-radius: 5px;
        margin-top: 2px;
        margin-right: 4px;
    }

    .icondiv i{
        color: #15F1E615;
    }

    .nameclick{
        display: none;
    }

    .student-name{
        padding: 5px 5px 5px 5px;
        width: 100%;
        border: 2px solid #EB9413;
        border-radius: 5px;
        cursor: pointer;
    }

    .nameclick:checked + .student-name{
        background-color: #F5C276;
        color: rgb(87, 43, 2);
    }

    .nameclick:checked + .student-name .icondiv{
        background-color: #080529;
    }

    .nameclick:checked + .student-name .icondiv i{
        color: #EB9413;
        transform: rotate(360deg);
        transition: 1s;
    }

    /* style for display dates */
    .display-dates{
        padding: 10px;
        border: 2px solid #010824;
        border-radius: 10px;
        height: 100%;
        width: 100%;
        margin-bottom: 0px;
        cursor: pointer;
    }

    .day-click:checked + .display-dates{
        background-color: #F8F18F;
    }

    .col{
        padding-left: 5px !important;
        padding-right:  5px !important;
    }

    .date{
        color: #070849;
        background-color: #0ECFF1;
        padding: 5px;
        border-radius: 5px;
        font-weight: bold;
    }

    /* style for have std button */
    .btn-have-std{
        background-color: transparent;
        border: 0px;
        cursor: pointer;
    }

    .btn-have-std:focus{
        outline: 0;
    }

    /* style for student list panel */
    #std-list-panel{
        background-color: #ADADAD;
        border: 1px solid #505152;
        border-radius: 10px;
    }

    /* style for student panel close btn */
    .close:focus{
        outline: 0;
    }

    /* style for timeslots */
    .time-slot-click{
        display: none;
    }

    .time-slot-label{
        border: 1px solid #010824;
        border-radius: 10px;
        padding: 10px 10px 5px 10px;
        color: #FFFFFF;
        background-color: #636262;
        cursor: pointer;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .slot-radio{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 5px solid white;
    }

    .time-slot-click:checked + .time-slot-label .slot-radio{
        border: 5px solid #25FC5B;
    }

    .time-slot-click:checked + .time-slot-label{
        background-color: #010824
    }

    /* style for instructors list */
    .instructor-label-click{
        display: none
    }

    .instructor-label{
        border: 1px solid #010824;
        padding: 10px;
        background-color: #505152;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
    }

    .instructor-label-click:checked + .instructor-label{
        background-color: #2CDDFC;
    }

    /* style for th, td */
    th, td{
        color: #010824;
    }

    /* style for custome instructors */
    .custome-instructor-click{
        display: none;
    }

    .custome-instructor{
        border: 2px solid #010824;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .custome-instructor-click:checked + .custome-instructor{
        background-color: #3DE267;
    }

    /* style for arrows */
    #pointer {
        width: 200px;
        height: 60px;
        position: relative;
        background: rgb(8, 0, 54);
    }
    #pointer:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 30px solid white;
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
    }
    #pointer:before {
        content: "";
        position: absolute;
        right: -30px;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 30px solid rgb(8, 0, 54);
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
    }

    #pointer-finish {
        width: 200px;
        height: 60px;
        position: relative;
        background: #E0A800;
    }
    #pointer-finish:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 30px solid white;
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
    }
    #pointer-finish:before {
        content: "";
        position: absolute;
        right: -30px;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 30px solid #E0A800;
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
    }

    /* style for navigations */
    .navigation-active{
        border: 4px solid #15F760;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        color: rgb(0, 0, 0);
        margin: auto;
        background-color: white;
    }

    .navigation{
        border: 4px solid #3F3F41;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        color: rgb(0, 0, 0);
        margin: auto;
        background-color: white;
    }

    #step_navigate{
        background-color: #03022C;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Sessions List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Add Session</a>
    </div>

    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success">
                <h6>{{ session('successmsg') }}</h6>
            </div>
        @endif
    </div>

    <form action="{{ route('confirmfinalstep') }}" method="POST" id="confirm-form">
        @csrf

    {{-- step navigation panel --}}
    <div class="row-mb-2" style="padding-top: 20px; margin-bottom: 0px;">
        <hr style="border-top: 3px solid #010824">
        <div class="d-flex justify-content-center" style="z-index: 10; position: relative; top: -40px">
            <div style="display: inline-block;">
                <div class="navigation-active">
                    <h3>1</h3>
                </div>
                <div>
                    <h6 class="heading" style="color: #15F760">Step One</h6>
                </div>
            </div>
            <div style="display: inline-block; margin-left: 30%; margin-right: 30%">
                <div class="navigation" id="step-two">
                    <h3>2</h3>
                </div>
                <div>
                    <h6 class="heading" id="step-two-text">Step Two</h6>
                </div>
            </div>
            <div style="display: inline-block">
                <div class="navigation" id="step-three">
                    <h3>3</h3>
                </div>
                <div>
                    <h6 class="heading" id="step-three-text">Step Three</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- notification div --}}
    <div class="row-mb-2" id="notifydiv"></div>

    {{-- step one --}}
    <div class="row-mb-2" id="step_one">
        <div id="card">
            <div class="card">
                <div class="card-body">

                    {{-- heading part --}}
                    <div>
                        <div style="display: inline-block">
                            <h5 class="heading" style="margin-bottom: 0px">Select Session Type & Students</h5>
                            <small>select students for relevant categories</small>
                        </div>
                        <div id="help-select-students" class="help-txt">
                            You can schedule both instructors and students. please read and follow the steps to add schedules.
                        </div>
                        <div style="display: inline-block; float: right;">
                            <div class="help" id="help-one">
                                ?
                            </div>
                        </div>
                        <hr style="border-top: 2px solid #040C2E">
                    </div>

                    {{-- student selecting type buttons --}}
                    <div class="child-panel">
                        <div style="display: inline-block; padding-right: 10px">
                            <div style="display: inline-block; padding-right:10px">
                                <h4 id="step_navigate" style="text-align: center; color:#FFFFFF">1</h4>
                            </div>
                            <div style="display: inline-block">
                                <h5 class="heading">Filter students from </h5>
                            </div>
                        </div>
                        <input type="radio" name="student-selection-type" value="all" id="all" class="student-selecting-checked" checked>
                        <label for="all" class="student-selecting-label">
                            <h5>All Students</h5>
                        </label>
                        <input type="radio" name="student-selection-type" value="group" id="group" class="student-selecting-checked">
                        <label for="group" class="student-selecting-label">
                            <h5>Student Groups</h5>
                        </label>
                    </div>

                    {{-- session title --}}
                    <div class="child-panel">
                        <div style="display: inline-block; padding-right: 10px">
                            <div style="display: inline-block; padding-right:10px">
                                <h4 id="step_navigate" style="text-align: center; color:#FFFFFF">2</h4>
                            </div>
                            <div style="display: inline-block">
                                <h5 class="heading">Session Title </h5>
                            </div>
                        </div>
                        <div style="display: inline-block; padding-right: 10px">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                    </div>

                    {{-- all students --}}
                    <div id="all-students-panel">

                        {{-- session type panel --}}
                        <div class="child-panel">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right:10px">
                                    <h4 id="step_navigate" style="text-align: center; color:#FFFFFF">3</h4>
                                </div>
                                <div style="display: inline-block">
                                    <h5 class="heading">Select Session Type</h5>
                                </div>
                            </div>
                            <div style="display: inline-block">
                                <div class="form-check">
                                    <input class="session_click" type="radio" name="session_type" id="theory" value="theory">
                                    <label class="session" for="theory">
                                        <h5>Theory</h5>
                                    </label>
                                </div>
                            </div>
                            <div style="display: inline-block">
                                <div class="form-check">
                                    <input class="session_click" type="radio" name="session_type" id="practicle" value="practicle">
                                    <label class="session" for="practicle">
                                        <h5>Practicle</h5>
                                    </label>
                                </div>
                            </div>
                            <div style="display: inline-block" id="session_type_error">
                            </div>
                        </div>

                        {{-- category panel --}}
                        <div class="child-panel" style="display: none" id="cat-panel">
                            <div style="display: inline-block; padding-right: 10px">
                                <div style="display: inline-block; padding-right:10px">
                                    <h4 id="step_navigate" style="text-align: center; color:#FFFFFF">4</h4>
                                </div>
                                <div style="display: inline-block">
                                    <h5 class="heading">Select a Category</h5>
                                </div>
                            </div>
                            <div style="display: inline-block;">
                                <select class="form-control" id="category" name="category[]">
                                    <option value="select">Select</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->category_code }}">{{ ucwords($cat->name).' ('.$cat->category_code.')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="display: inline-block" id="category_error_panel"></div>
                        </div>

                        {{-- transmission panel --}}
                        <div class="child-panel" style="display: none" id="trans-panel">
                            <div style="display: inline-block; padding-right: 10px">
                                <div style="display: inline-block; padding-right:10px">
                                    <h4 id="step_navigate" style="text-align: center; color:#FFFFFF">5</h4>
                                </div>
                                <div style="display: inline-block">
                                    <h5 class="heading">Select Transmission</h5>
                                </div>
                            </div>
                            <div style="display: inline-block">
                                <div style="display: inline-block">
                                    <div class="form-check">
                                        <input class="form-check-input trans_click" type="radio" name="transmission" id="auto" value="Auto">
                                        <label class="form-check-label trans" for="auto">
                                            <h5>Auto</h5>
                                        </label>
                                    </div>
                                </div>
                                <div style="display: inline-block">
                                    <div class="form-check">
                                        <input class="form-check-input trans_click" type="radio" name="transmission" id="manual" value="Manual">
                                        <label class="form-check-label trans" for="manual">
                                            <h5>Manual</h5>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- result table --}}
                        <div id="result-table" class="result-panel">
                            <h5 class="heading">Select Students</h5>
                            <div id="result-info" class="alert alert-info" role="alert">
                                <h5>Students will displayed</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody id="result-body">
                                        {{-- data came from ajax --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    {{-- select student by groups --}}
                    <div id="group-student-panel" style="display: none">
                        <h5>student groups</h5>
                    </div>

                    {{-- next button --}}
                    <div class="text-center" style="padding-top: 20px">
                        <button class="btn btn-success next" type="button">Next</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- step two --}}
    <div class="row-mb-2" id="step_two" style="display: none">
        <div id="card">
            <div class="card">
                <div class="card-body">

                    {{-- heading part --}}
                    <div>
                        <div style="display: inline-block">
                            <h5 class="heading">Select a Date</h5>
                        </div>
                        <div id="help-select-date" class="help-txt">
                            This section is about the select dates for the schedules. You can cahnge upto 21 days. You can only select green color dates if there is no any green color dates, you have free to give a custome date.
                        </div>
                        <div style="display: inline-block" class="float-right">
                            <div class="help" id="help-two">
                                ?
                            </div>
                        </div>
                        <hr style="border-top: 2px solid #040C2E">
                    </div>

                    {{-- color guide --}}
                    <div style="">
                        <div style="display: inline-block; vertical-align: middle">
                            <div style="width: 20px; height: 20px; border-radius: 50%; border: 5px solid #0CD13D"></div>
                        </div>
                        <div style="display: inline-block;">
                            <h6 style=" padding-top: 3px; color: #010824">Available Dates</h6>
                        </div>
                        <div style="display: inline-block" class="float-right">
                            <button class="btn btn-success" id="custome-btn" type="button">Custome Date</button>
                        </div>
                        <div style="display: inline-block; padding-right: 10px" class="float-right">
                            <div class="form-group">
                                <select class="form-control" id="day-limit">
                                    <option value="7">Next 7 days</option>
                                    <option value="14">Next 14 days</option>
                                    <option value="21">Next 21 days</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                    </div>

                    {{-- have schedule students here --}}
                    <div class="row row-cols-1" id="">
                        {{-- data came from onclick fucntion --}}
                    </div>

                    {{-- date display --}}
                    <div class="row">
                        <div class="col" style="margin: 10px">
                            <div class="row row-cols-1" id="days-panel">
                                {{-- data came from ajax --}}
                            </div>
                        </div>
                        <div style="display: none" id="std-list-panel">
                            <div>
                                <div style="display: inline-block; padding-left:30px">
                                    <div class="text-center" style="padding-top: 20px">
                                        <h5 class="heading">Students List</h5>
                                    </div>
                                </div>
                                <div style="display: inline-block; float: right; padding-top: 10px; padding-right: 10px">
                                    <button type="button" class="close" id="std-panel-close" type="button">
                                        <i class="fa fa-times" aria-hidden="true" style="color: white"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="student-list" style="margin: 10px"></div>
                        </div>
                    </div>

                    {{-- next button --}}
                    <div class="text-center" style="padding-top: 20px">
                        <button class="btn btn-success day-next" type="button">Next</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- step three --}}
    <div class="row-mb-2" id="step_three" style="display: none">
        <div id="card">
            <div class="card">
                <div class="card-body">

                    {{-- header part --}}
                    <div>
                        <div>
                            <div style="display: inline-block">
                                <h5 class="heading">Select a Time and Instructor</h5>
                            </div>
                            <div id="help-select-ins" class="help-txt">
                                You can see the available times with relevent instructors for that day. If is not you can give a custome time.
                            </div>
                            <div style="display: inline-block" class="float-right">
                                <div class="help" id="help-three">
                                    ?
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #040C2E">
                        </div>
                    </div>

                    {{-- defined time tables --}}
                    <div id="defined-ins">

                        {{-- buttons --}}
                        <div class="row" style="padding-left: 10px">
                            <button class="btn btn-dark" id="other-session" type="button">Other Sessions</button>
                            <button class="btn btn-warning" id="custome-time" type="button">Custome Time</button>
                        </div>

                        {{-- other sessions --}}
                        <div class="col" style="display: none; border: 1px solid #010824; border-radius: 5px; margin-top: 10px; background-color: #F3EED3" id="other-session-panel">
                            <div>
                                <div style="display: inline-block; padding-left:30px">
                                    <div class="text-center" style="padding-top: 20px">
                                        <h5 class="heading">Other Sessions</h5>
                                    </div>
                                </div>
                                <div style="display: inline-block; float: right; padding-top: 10px; padding-right: 10px">
                                    <button type="button" class="close" id="other-session-panel-close" type="button">
                                        <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="other-sessions-details" style="margin: 10px;" class="row">
                                {{-- data came from ajax --}}
                            </div>
                        </div>

                        {{-- custome time panel --}}
                        <div id="custome-time-create" style="display: none; margin-top: 10px; border: 1px solid #010824; border-radius: 5px; padding: 10px">
                            <div>
                                <h6 class="heading">Make a Custome Time</h6>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="time">Set Time</label>
                                    <input type="time" class="form-control" id="c-time" name="custome_time">
                                </div>
                            </div>
                            <label for="">Select an Instructor</label>
                            <div class="row row-cols-1" style="padding: 10px" id="custome-time-panel">
                                {{-- data came from ajax --}}
                            </div>
                        </div>

                        {{-- data panel --}}
                        <div style="border: 1px solid #010824; border-radius: 5px; padding: 10px; margin-top: 10px" id="card">
                            <div id="card">
                                <h6 class="heading">Available Times</h6>
                            </div>
                            <div id="defined-ins-panel" style="padding-top: 10px">
                                {{-- data come from ajax --}}
                            </div>
                        </div>

                    </div>

                    {{-- confirm button --}}
                    <div class="text-center" id="card">
                        <button class="btn btn-success" id="confirm" type="button">Confirm</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="type" id="type">

    </form>

</div>

<script>

    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');

        // pop over
        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: 'focus',
        });
    });

    // help text for student selection
    $('#help-one').hover(function(){
        $('#help-select-students').show();
    }, function(){
        $('#help-select-students').hide();
    });

    // help text for date selection
    $('#help-two').hover(function(){
        $('#help-select-date').show();
    }, function(){
        $('#help-select-date').hide();
    });

    // help text for nstructor and time selection
    $('#help-three').hover(function(){
        $('#help-select-ins').show();
    }, function(){
        $('#help-select-ins').hide();
    });

    // get action with buttons
    $('input[name="student-selection-type"]').on('change', function(){
        var value = $('input[name="student-selection-type"]:checked').val();
        if( value == 'all' ){
            $('#group-student-panel').hide();
            $('#all-students-panel').show();
        }else{
            $('#all-students-panel').hide();
            $('#group-student-panel').show();
        }
    });

    // session type
    $('input[name="session_type"]').on('change', function(){
        var session_type = $('input[name="session_type"]:checked').val();
        if( session_type == 'practicle' ){
            $('#cat-panel').show();
            $('#result-body').empty();
            $('#result-info').show();
            // $('session_type_error').empty();
        }else{
            $('#cat-panel').hide();
            $('#trans-panel').hide();
            $('#category').val('select');
            $('input[name="transmission"]').each(function () { $(this).prop('checked', false); });
            $.ajax({
                type: 'get',
                url: '/theorystudents',
                success:function(data){
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">All students are passed theory exams</div>');
                        $('#result-info').show();
                        $('#result-body').empty();
                        // $('#session_type_error').append('<div class="alert alert-danger"><h6>All students are passed theory examination</h6></div>');
                        //errorclear('session_type_error');
                    }else{
                        $('#result-info').hide();
                        $('#notifydiv').empty();
                        $('#result-body').empty();
                        // errorclear('session_type_error');
                        data.forEach(function(row){
                            var url = '{{ route("viewstudent", ":id") }}';
                            url = url.replace(':id', row.user_id);
                            var tablerow = '<tr><td><input type="checkbox" id="'+row.user_id+'" name="students[]" class="nameclick" value="'+row.user_id+'"><label for="'+row.user_id+'" class="student-name"><div><div style="display: inline-block; padding-right: 10px"><img src="/uploadimages/students_profiles/'+row.user.profile_img+'" alt="Student Profile" class="img"></div><div style="display: inline-block; padding-right: 10px"><h6 class="heading">'+row.user.f_name+' '+row.user.l_name+'</h6></div><div style="display: inline-block"><a class="viewprofile" href="'+url+'">view profile</a></div><div class="float-right icondiv" style="display: inline-block;"><i class="fa fa-check" aria-hidden="true"></i></div></div></label></td></tr>';
                            $('#result-body').append(tablerow);
                        });
                    }
                },
                error:function(err){
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something with wrong !!</div>');
                    $('#result-info').show();
                    $('#result-body').empty();
                }
            });
        }
    });

    // vehicle category
    $('#category').on('change', function(){
        var category = document.getElementById('category').value;
        $('input[name="transmission"]').each(function () { $(this).prop('checked', false); });
        $('#result-body').empty();
        $('#result-info').show();
        if( (category == 'select') || (category == 'B1') || (category == 'C') ){
            $('#trans-panel').hide();
            // clearall();
            //errorclear('category_error');
            $.ajax({
                type: 'get',
                url: '/manualstudents/'+category,
                success:function(data){
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#result-info').show();
                        $('#result-body').empty();
                        // $('#category_error_panel').append('<div class="alert alert-danger"><h6>No students in this category</h6></div>');
                        //errorclear('category_error');
                    }else{
                        $('#result-info').hide();
                        $('#notifydiv').empty();
                        $('#result-body').empty();
                        //$('#category_error').empty();
                        // clearall();
                        data.forEach(function(row){
                            var url = '{{ route("viewstudent", ":id") }}';
                            url = url.replace(':id', row.user_id);
                            var tablerow = '<tr><td><input type="checkbox" id="'+row.user_id+'" name="students[]" class="nameclick" value="'+row.user_id+'"><label for="'+row.user_id+'" class="student-name"><div><div style="display: inline-block; padding-right: 10px"><img src="/uploadimages/students_profiles/'+row.user.profile_img+'" alt="Student Profile" class="img"></div><div style="display: inline-block; padding-right: 10px"><h6 class="heading">'+row.user.f_name+' '+row.user.l_name+'</h6></div><div style="display: inline-block"><a class="viewprofile" href="'+url+'">view profile</a></div><div class="float-right icondiv" style="display: inline-block;"><i class="fa fa-check" aria-hidden="true"></i></div></div></label></td></tr>';
                            $('#result-body').append(tablerow);
                        });
                    }
                },
                error:function(err){
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something with wrong !!</div>');
                    $('#result-info').show();
                    $('#result-body').empty();
                }
            });
        }else{
            $('#trans-panel').show();
        }
    });

    // transmission
    $('input[name="transmission"]').on('change', function(){
        var trans = $('input[name="transmission"]:checked').val();
        var category = document.getElementById('category').value;
        $.ajax({
            type: 'get',
            url: '/aoutomanualstudents/'+category+'/'+trans,
            success:function(data){
                if (!$.trim(data)){
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                    $('#result-info').show();
                    $('#result-body').empty();
                }else{
                    $('#result-info').hide();
                    $('#notifydiv').empty();
                    $('#result-body').empty();
                    data.forEach(function(row){
                        var url = '{{ route("viewstudent", ":id") }}';
                        url = url.replace(':id', row.user_id);
                        var tablerow = '<tr><td><input type="checkbox" id="'+row.user_id+'" name="students[]" class="nameclick" value="'+row.user_id+'"><label for="'+row.user_id+'" class="student-name"><div><div style="display: inline-block; padding-right: 10px"><img src="/uploadimages/students_profiles/'+row.user.profile_img+'" alt="Student Profile" class="img"></div><div style="display: inline-block; padding-right: 10px"><h6 class="heading">'+row.user.f_name+' '+row.user.l_name+'</h6></div><div style="display: inline-block"><a class="viewprofile" href="'+url+'">view profile</a></div><div class="float-right icondiv" style="display: inline-block;"><i class="fa fa-check" aria-hidden="true"></i></div></div></label></td></tr>';
                        $('#result-body').append(tablerow);
                    });
                }
            },
            error:function(err){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Something with wrong !!</div>');
                $('#result-info').show();
                $('#result-body').empty();
            }
        });
    });

    // checked array lenght next button after student select
    $('.next').click(function(){
        var count = $('.nameclick:checked').length;
        if(count == 0){
            $('#notifydiv').empty();
            $('#notifydiv').append('<div class="alert alert-danger">Please Select students</div>');
        }else{
            var trans = $('input[name="transmission"]:checked').val();
            var category = document.getElementById('category').value;

            // get selected students list
            var students = [];
            $("input:checkbox[class=nameclick]:checked").each(function(){
                students.push($(this).val());
            });

            // call function
            getdefineddates(trans, category, 7, students);

            $('#step-two').removeClass('navigation');
            $('#step-two').addClass('navigation-active');
            $('#step-two-text').css('color' , '#15F760');
        }
    });

    // day limit change dropdown
    $("#day-limit").on('change', function(){
        $('#std-list-panel').hide(1000);

        var daylimit = document.getElementById('day-limit').value;
        var trans = $('input[name="transmission"]:checked').val();
        var category = document.getElementById('category').value;
        // get selected students list
        var students = [];
        $("input:checkbox[class=nameclick]:checked").each(function(){
            students.push($(this).val());
        });

        // call function
        getdefineddates(trans, category, daylimit, students)
    });

    // custome date function button click
    $('#custome-btn').click(function(){
        $('#std-list-panel').hide(1000);

        var trans = $('input[name="transmission"]:checked').val();
        var category = document.getElementById('category').value;
        var daylimit = document.getElementById('day-limit').value;

        // get selected students list
        var students = [];
        $("input:checkbox[class=nameclick]:checked").each(function(){
            students.push($(this).val());
        });
        console.log('custome date Trans: '+trans+' Category: '+category+' Students: '+students+' Day Limit: '+daylimit);

        // call get dates function
        getcustomedates(trans, category, daylimit, students);
    });

    // get defined date function ===============================================
    function getdefineddates(trans, category, daylimit, students){
        if((trans == undefined) && (category == 'select')){
            console.log('theory');
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/theorydays/'+daylimit+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+setinput(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('error');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }else if((trans == undefined) && (category != 'select')){
            console.log('manual only');
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/onlymanualdays/'+daylimit+'/'+category+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+setinput(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('fail');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }else{
            console.log('auto manual '+trans+' '+category);
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/automanualdays/'+daylimit+'/'+category+'/'+trans+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+setinput(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('fail');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }
    }

    // get custome date function ===================================
    function getcustomedates(trans, category, daylimit, students){
        if((trans == undefined) && (category == 'select')){
            console.log('theory');
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/theorydays/'+daylimit+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        console.log('custome date function');
                        console.log(data);
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+customedates(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('error');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }else if((trans == undefined) && (category != 'select')){
            console.log('manual only');
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/onlymanualdays/'+daylimit+'/'+category+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        console.log('custome date function');
                        console.log(data);
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+customedates(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('fail');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }else{
            console.log('auto manual '+trans+' '+category);
            $('#step_one').hide();
            $('#step_two').show();
            $.ajax({
                type: 'get',
                url: '/automanualdays/'+daylimit+'/'+category+'/'+trans+'/'+students,
                success:function(data){
                    console.log(data);
                    if (!$.trim(data)){
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-info">No Students on this category</div>');
                        $('#days-panel').empty();
                    }else{
                        $('#days-panel').empty();
                        console.log('custome date function');
                        console.log(data);
                        data.forEach(function(row){
                            var date = '<div class="col col-sm-3" style="padding-top: 10px"><div class="card h-100">'+customedates(row.session_count, row.date, row.have_session, row.name, row.ui_date, row.have_ids)+'</div></div>';
                            $('#days-panel').append(date);
                        });
                    }
                },
                error:function(err){
                    console.log('fail');
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Something went wrong !!</div>');
                    $('#days-panel').empty();
                }
            });
        }
    }

    // child function of getdefineddates
    function setinput(session, date, studenthave, name, ui_date, haveids){
        var input = '';
        if((session == 0) || (studenthave > 0) ){
            input = '<input type="radio" name="date" id="'+date+'" value="'+date+'" style="display: none" class="day-click" disabled><label for="'+date+'" class="display-dates clicked" style="border: 4px solid #CF0B56"><div class="float-right" style="display:inine-block"><h5 class="date">'+ui_date+'</h5></div><div style="display:inine-block"><h5 class="heading">'+name+'</h5></div><div style="padding-top:10px">'+studenthavesession(studenthave, haveids)+'</div><div>'+havesession(session)+'</div></label>';
        }else{
            input = '<input type="radio" name="date" id="'+date+'" value="'+date+'" style="display: none" class="day-click"><label for="'+date+'" class="display-dates clicked" style="border: 4px solid #0BCF1C"><div class="float-right" style="display:inine-block"><h5 class="date">'+ui_date+'</h5></div><div style="display:inine-block"><h5 class="heading">'+name+'</h5></div><div style="padding-top:10px">'+studenthavesession(studenthave, haveids)+'</div><div>'+havesession(session)+'</div></label>';
        }
        return input;
    }

    // child functionof getcustomedates
    function customedates(session, date, studenthave, name, ui_date, haveids){
        var customedate = '';
        if(studenthave != 0){
            customedate = '<input type="radio" name="date" id="'+date+'" value="'+date+'" style="display: none" class="day-click" disabled><label for="'+date+'" class="display-dates clicked" style="border: 4px solid #CF0B56"><div class="float-right" style="display:inine-block"><h5 class="date">'+ui_date+'</h5></div><div style="display:inine-block"><h5 class="heading">'+name+'</h5></div><div style="padding-top:10px">'+studenthavesession(studenthave, haveids)+'</div><div>'+havesession(session)+'</div></label>';
        }else{
            customedate = '<input type="radio" name="date" id="'+date+'" value="'+date+'" style="display: none" class="day-click"><label for="'+date+'" class="display-dates clicked" style="border: 4px solid #0BCF1C"><div class="float-right" style="display:inine-block"><h5 class="date">'+ui_date+'</h5></div><div style="display:inine-block"><h5 class="heading">'+name+'</h5></div><div style="padding-top:10px">'+studenthavesession(studenthave, haveids)+'</div><div>'+havesession(session)+'</div></label>';
        }
        return customedate;
    }

    // return text for any student have a session
    function studenthavesession(count, haveids){
        var text = '';
        if (count == 0) {
            text = '<h6 style="color:#07123B">All students are free on this day</h6>';
        }else{
            const ids = new Array(haveids);
            text = '<h6 style="color:#07123B"><button type="button" onclick="displayhavestudentids(['+ids+'])" class="btn-have-std"><span style="background-color:#2F0033; color:white; padding:0px 5px 0px 5px; border-radius:5px">'+count+' students</span></button> have another sessions on this day</h6>';
        }
        return text;
    }

    // child function of studenthavesession
    function displayhavestudentids(ids){
        var studentslist = @json($studentslist);
        console.log(' student list '+studentslist);
        $('#student-list').empty();
        studentslist.forEach(function(main){
            ids.forEach(function(id){
                if (id == main.user_id) {
                    var student = '';
                    console.log(main.user.f_name+' '+main.user.l_name);
                    student = '<div id="card"><div class="card"><div class="card-body"><div style="display:inline-block"><img src="/uploadimages/students_profiles/'+main.user.profile_img+'" class="img"></div><div style="display:inline-block"><h6 class="heading">'+capitalizeFirstLetter(main.user.f_name)+' '+capitalizeFirstLetter(main.user.l_name)+'</h6></div></div></div></div>';
                    $('#student-list').append(student);
                }
            });
        });
        $('#std-list-panel').show("slow");
    }

    // teturn text about defined session (has or not)
    function havesession(session){
        var text = '';
        if(session == 0){
            text = '<h6 style="color:#C90C25">No sessions on this day</h6>';
        }else{
            text = '<h6 style="color:#0CC93B">Sessions on this day</h6>';
        }
        return text;
    }

    // hide student details panel
    $('#std-panel-close').click(function(){
        $('#std-list-panel').hide(1000);
    });

    // day next button
    $('.day-next').click(function(){
        var day = $('input[name="date"]:checked').val();
        if(day){
            var trans = $('input[name="transmission"]:checked').val();
            var category = document.getElementById('category').value;
            console.log('Day : '+day+' Transmission : '+trans+' Category : '+category);
            if((trans == undefined) && (category == 'select')){
                console.log('theory session');
                $.ajax({
                    type: 'get',
                    url: '/theorysessionsins/'+day,
                    success:function(data){
                        console.log(data)
                        if (!$.trim(data)){
                            console.log('empty');
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            $('#defined-ins-panel').append('<div class="alert alert-info" role="alert">No defined time slots !!, You can create custome slots</div>');
                            getcustometimes(day);
                        }else{
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            data.forEach(function(row){
                                var text = '<div class="col-md-auto"><input type="radio" value="'+row.time_slot+'" name="timeslots" id="test-'+row.id+'" class="time-slot-click"><label for="test-'+row.id+'" class="time-slot-label"><div style="display:inline-block; padding-right:10px; vertical-align:middle" class="text-center"><div class="slot-radio"></div></div><div style="display:inline-block"><h5 class="slot-name">'+capitalizeFirstLetter(row.slot_name)+'</h5></div><div><h5 style="color:white">Time : '+row.time_slot+'</h5></div><div>'+instructors(row.instructor_working_time_slot,row.time_slot)+'</div></label></div>';
                                $('#defined-ins-panel').append(text);
                            });
                            $('input[name="timeslots"]').click( function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                            $('input[class="instructor-label-click"]').click(function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                        }
                    },error:function(err){
                        console.log('error');
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-danger">Error Found</div>');
                    }
                });
            }else if((trans == undefined) && (category != 'select')){
                console.log('manual only session');
                $.ajax({
                    type: 'get',
                    url: '/manualsessionsins/'+day+'/'+category,
                    success:function(data){
                        console.log(data)
                        if (!$.trim(data)){
                            console.log('empty');
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            $('#defined-ins-panel').append('<div class="alert alert-info" role="alert">No defined time slots !!, You can create custome slots</div>');
                            getcustometimes(day);
                        }else{
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            data.forEach(function(row){
                                var text = '<div class="col-md-auto"><input type="radio" value="'+row.time_slot+'" name="timeslots" id="test-'+row.id+'" class="time-slot-click"><label for="test-'+row.id+'" class="time-slot-label"><div style="display:inline-block; padding-right:10px; vertical-align:middle" class="text-center"><div class="slot-radio"></div></div><div style="display:inline-block"><h5 class="slot-name">'+capitalizeFirstLetter(row.slot_name)+'</h5></div><div><h5 style="color:white">Time : '+row.time_slot+'</h5></div><div>'+instructors(row.instructor_working_time_slot,row.time_slot)+'</div></label></div>';
                                $('#defined-ins-panel').append(text);
                            });
                            $('input[name="timeslots"]').click( function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                            $('input[class="instructor-label-click"]').click(function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                        }
                    },error:function(err){
                        console.log('error');
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-danger">Error Found</div>');
                    }
                });
            }else{
                console.log('auto manual session');
                $.ajax({
                    type: 'get',
                    url: '/automanualsessionsins/'+day+'/'+category+'/'+trans,
                    success:function(data){
                        console.log(data)
                        if (!$.trim(data)){
                            console.log('empty');
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            $('#defined-ins-panel').append('<div class="alert alert-info" role="alert">No defined time slots !!, You can create custome slots</div>');
                            getcustometimes(day);
                        }else{
                            $('#notifydiv').empty();
                            $('#step_two').hide();
                            $('#step_three').show();
                            $('#defined-ins-panel').empty();
                            data.forEach(function(row){
                                var text = '<div class="col-md-auto"><input type="radio" value="'+row.time_slot+'" name="timeslots" id="test-'+row.id+'" class="time-slot-click"><label for="test-'+row.id+'" class="time-slot-label"><div style="display:inline-block; padding-right:10px; vertical-align:middle" class="text-center"><div class="slot-radio"></div></div><div style="display:inline-block"><h5 class="slot-name">'+capitalizeFirstLetter(row.slot_name)+'</h5></div><div><h5 style="color:white">Time : '+row.time_slot+'</h5></div><div>'+instructors(row.instructor_working_time_slot,row.time_slot)+'</div></label></div>';
                                $('#defined-ins-panel').append(text);
                            });
                            $('input[name="timeslots"]').click( function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                            $('input[class="instructor-label-click"]').click(function(){
                                $('#notifydiv').empty();
                                $('input[name="custome_instructors"]').each(function () { $(this).prop('checked', false); });
                                $('#c-time').val('');
                            });
                        }
                    },error:function(err){
                        console.log('error');
                        $('#notifydiv').empty();
                        $('#notifydiv').append('<div class="alert alert-danger">Error Found</div>');
                    }
                });
            }
            $('#step-three').removeClass('navigation');
            $('#step-three').addClass('navigation-active');
            $('#step-three-text').css('color' , '#15F760');
        }else{
            console.log('not clicked');
            $('#notifydiv').empty();
            $('#notifydiv').append('<div class="alert alert-danger">Please select a date</div>');
        }

    });

    // lnstructors for time slots
    function instructors(instructors, time_slot){
        var inslist = @json($instructorslist);
        text = '';
        instructors.forEach(function(instructor){
            inslist.forEach(function(ins){
                if (ins.user_id == instructor.instructor_uid) {
                    text +='<div><input type="radio" value="'+ins.user_id+'" name="instructor-'+time_slot+'" id="'+ins.user_id+'-'+instructor.time_slot_id+'" class="instructor-label-click"><label for="'+ins.user_id+'-'+instructor.time_slot_id+'" class="instructor-label"><div style="display:inline-block; padding-right: 10px"><img src="/uploadimages/instructors_profiles/'+ins.user.profile_img+'" alt="Instructor Profile" class="img"></div><div style="display:inline-block; padding-right:10px"><h6 class="heading">'+name(ins.user.gender)+capitalizeFirstLetter(ins.user.f_name)+' '+capitalizeFirstLetter(ins.user.l_name)+'</h6></div></label></div>';
                }
            });
        });
        return text;
    }

    // other sessions function
    $('#other-session').click(function(){
        var day = $('input[name="date"]:checked').val();
        console.log('other session click '+day);
        $.ajax({
            type: 'get',
            url: '/othersessons/'+day,
            success:function(data){
                $('#other-sessions-details').empty();
                $('#other-session-panel').show("slow");
                console.log(data);
                if (!$.trim(data)){
                    var text = '<div class="alert alert-info" role="alert"><h5>No sessions on this day</h5></div>';
                    $('#other-sessions-details').append(text);
                }else{
                    console.log('have sessions');
                    data.forEach(function(row){
                        var text = '<div class="col-md-auto"><div id="card"><div class="card"><div class="card-body"><table class="table table-hover"><tr><th><h5 class="heading">Time</h5></th><td><h5 class="heading">'+row.time+'</h5></td></tr><tr><th><h5 class="heading">Session</h5></th><td><h5 class="heading">'+capitalizeFirstLetter(row.lesson_type)+'</h5></td></tr><tr><th><h5 class="heading">Trainers</h5></th><td><div style="background-color: #350232; border-radius: 5px; text-align:center"><h5 style="color: white;">'+row.sheduled_students_count+'</h5></div></td></tr><tr><th><h5 class="heading">Instructor</h5></th><td><h5 class="heading">'+instructor(row.instructor)+'</h5></td></tr></table><div class="text-center"><button type="button" class="btn btn-dark">Append Here</button></div></div></div></div></div>';
                        $('#other-sessions-details').append(text);
                    });
                }
            },
            error:function(err){
                $('#other-session-panel').hide(1000);
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Error Found !!</div>');
            }
        });
    });

    // other session panel close function
    $('#other-session-panel-close').click(function(){
        $('#other-session-panel').hide(1000);
    });

    // custome time click
    $('#custome-time').click(function(){
        $('#custome-time-create').toggle();
        var day = $('input[name="date"]:checked').val();
        var defined = $('input[name="timeslots"]:checked').val();
        console.log('custome time click '+defined);
        getcustometimes(day);
    });

    // custome time get function
    function getcustometimes(date){
        $.ajax({
            type: 'get',
            url: '/custometime/'+date,
            success:function(data){
                console.log(data);
                if (!$.trim(data)){
                    $('#notifydiv').empty();
                    $('#notifydiv').append('<div class="alert alert-danger">Error Found</div>');
                }else{
                    $('#custome-time-panel').empty();
                    data.forEach(function(row){
                        if(row.status == 1){
                            console.log('present');
                            var ins = customeinsradioactive(row.user_id, row.working_times);
                            $('#custome-time-panel').append(ins);
                        }else{
                            console.log('leave');
                            var ins = customeinsradiodisabled(row.user_id, row.working_times);
                            $('#custome-time-panel').append(ins);
                        }
                    });
                    $('input[name="custome_instructors"]').click( function(){
                        $('#notifydiv').empty();
                        $('input[name="timeslots"]').each(function () { $(this).prop('checked', false); });
                        $('input[class="instructor-label-click"]').each(function () { $(this).prop('checked', false); });
                    });
                }
            },
            error:function(err){
                console.log('error');
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Error Found</div>');
            }
        })
    }

    // create customer instructor disabled radio buttons
    function customeinsradiodisabled(id, working_time){
        var ins = '';
        ins = '<input type="radio" name="custome_instructors" value="'+id+'" id="'+id+'" disabled class="custome-instructor-click"><label for="'+id+'" class="custome-instructor" ><div class="col-md-auto"><div>'+instructor(id)+'</div><div>'+instructorworkinghours(working_time)+'</div></div></div></label>';
        return ins;
    }

    // create customer instructor active radio buttons
    function customeinsradioactive(id, working_time){
        var ins = '';
        ins = '<input type="radio" name="custome_instructors" value="'+id+'" id="'+id+'" class="custome-instructor-click"><label for="'+id+'" class="custome-instructor"><div>'+instructor(id)+'</div><div>'+instructorworkinghours(working_time)+'</div></label>';
        return ins;
    }

    // instructors working hours
    function instructorworkinghours(working_hours){
        const times = Object.values(working_hours);
        console.log(times);
        if(working_hours.length == 0){
            return "<h6 style='padding:10px; color:#07B61F' class='w_status'>I'm free</h6>";
        }else{
            var hours = '<h6 style="padding:10px; color: #0B217A"  class="w_status">Working Hours</h6><ul style="list-style-type: none;">';
            times.forEach(function(time){
                console.log('jsghsjerhgr '+time);
                hours += '<li><h6 class="heading">'+time+'</h6></li>';
            });
            hours += '</ul>';
            console.log('final '+hours);
            return hours;
        }
    }

    // return instructor
    function instructor(id){
        var instructors = @json($instructorslist);
        var text = '';
        instructors.forEach(function(ins){
            if (id == ins.user_id) {
                text ='<div style="display:inline-block; padding-right:10px"><img src="/uploadimages/instructors_profiles/'+ins.user.profile_img+'" alt="Instructor Profile" class="img"></div><div style="display:inline-block"><h6 class="heading">'+name(ins.user.gender)+capitalizeFirstLetter(ins.user.f_name)+' '+capitalizeFirstLetter(ins.user.l_name)+'</h6></div>';
            }
        });
        return text;
    }

    // returnn instructor name with gender
    function name(gender){
        if(gender == 'Male'){
            return 'Mrs. ';
        }else{
            return 'Mr. ';
        }
    }

    // get first letter capital
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    // custome time on change function
    $('#c-time').on('change', function(){
        $('#notifydiv').empty();
        $('input[name="timeslots"]').each(function () { $(this).prop('checked', false); });
        $('input[class="instructor-label-click"]').each(function () { $(this).prop('checked', false); });
    });

    // final step
    $('#confirm').click(function(){
        var def_time = $('input[name="timeslots"]:checked').val();
        var c_ins = $('input[name="custome_instructors"]:checked').val();
        var c_time = $('#c-time').val();
        var def_ins =$('input[class="instructor-label-click"]:checked').val();
        if ((!def_time) && (!c_ins) && (!c_time) && (!def_ins)) {
            $('#notifydiv').empty();
            $('#notifydiv').append('<div class="alert alert-danger">Please select a custome time or defined time</div>');
        }else{
            if(c_time && (!c_ins)){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Please set a custome instructor</div>');
            }
            else if((!c_time) && (c_ins)){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Please set a custome time</div>');
            }
            else if((!def_time) && (def_ins)){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Please set a defined time</div>');
            }
            else if((def_time) && (!def_ins)){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">Please set a defined instructor</div>');
            }
            else if((def_time) && (c_time)){
                $('#notifydiv').empty();
                $('#notifydiv').append('<div class="alert alert-danger">You can not choose both </div>');
            }
            else{
                console.log('fine');
                if((c_time) && (!def_time)){
                    $('#type').val('custome');
                }
                if((!c_time) && (def_time)){
                    $('#type').val('defined');
                }
                $('#confirm-form').submit();
            }
        }
    });

    function errorclear(error){
        const errors = ['session_type_error', 'category_error_panel'];
        errors.forEach(function(row){
            if(row != error){
                console.log('calll');
                $('#'+row).empty();
            }
        });
    }

    function clearall(){
        console.log('call');
        const errors = ['session_type_error', 'category_error_panel'];
        errors.forEach(function(row){
            $('#'+row).empty();
        });
    }

</script>

@endsection
