@extends('layouts.ownerapp')

@section('content')

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 46px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 12px;
        width: 12px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    /* custome instructor */
    .ins_leave{
        cursor: pointer;
        color: #040920;
        border: 1px solid #222944;
        padding: 10px;
        border-radius: 10px;
        background-color: rgb(182, 182, 182);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .insbtn{
        display: none;
    }

    .ins{
        cursor: pointer;
        color: #040920;
        border: 1px solid #222944;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .test{
        background: hsla(150, 75%, 50%, 1);
        color: hsla(215, 0%, 100%, 1);
        box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
    }

    .insdeff{
        width: 100% !important;
        border: 1px solid #040920;
        border-radius: 10px;
        padding: 10px;
        color: #040920;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .radiodeff{
        display: none;
    }

    .insdeff-active{
        width: 100% !important;
        border: 1px solid #040920;
        border-radius: 10px;
        padding: 10px;
        color: #040920;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .deff-slot-name{
        padding: 10px;
        color: #040920;
        border: 1px solid #040920;
        border-radius: 5px;
        width: 100%;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .deff-slot-name-active{
        background-color: #FFEA2F;
    }

    .session{
        border: 1px solid #040920;
        border-radius: 5px;
        padding: 5px 10px 0px 10px;
        color: #040920;
    }

    .session:hover{
        cursor: pointer;
    }

    .session_click{
        display: none;
    }

    .session_click:checked + .session{
        background-color: #040920;
        color: white;
    }

    /* instructor profile */
    .insprofile{
        margin-left: 5px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .name{
        padding: 5px 5px 5px 5px;
        width: 100%;
        border: 2px solid #EB9413;
        border-radius: 5px;
        cursor: pointer;
    }
    .icondiv{
        border: 1px solid #FFD700;
        padding: 0px 5px 0px 5px;
        border-radius: 5px;
        margin-top: 4px;
        margin-right: 4px;
    }
    .icondiv i{
        color: #15F1E615;
    }
    .nameclick{
        display: none;
    }
    .nameclick:checked + .name{
        background-color: #F5C276;
        color: rgb(87, 43, 2);
    }
    .nameclick:checked + .name .icondiv{
        background-color: #080529;
    }
    .nameclick:checked + .name .icondiv i{
        color: #EB9413;
        transform: rotate(360deg);
        transition: 1s;
    }

    .sessionclick{
        display: none;
    }
    .session{
        cursor: pointer;
    }
    .sessionclick:checked + .session .icon{
        background-color: #080529;
        color: #12C74E
    }
    .slotclick{
        display: none;
    }
    .slot{
        cursor: pointer;
    }
    .slotclick:checked + .slot .icon{
        background-color: #080529;
        color: #15F1E6
    }

    /* table row hover */
    .scheduletr:hover{
        background-color: #FFF1B1
    }

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

    /* time slot buttons */
    .slotbtn{
        border: 1px solid #080529;
        cursor: pointer;
        padding: 5px;
        border-radius: 5px 5px 0px 0px;
        color: #080529;
    }
    .slotbtn:focus{
        outline: 0;
    }
    .slotbtnclick{
        border-bottom: 1px solid white;
        background-color: white;
    }
    .slotbtnnotclick{
        background-color: rgb(177, 177, 177);
        border: 1px solid #080529;
    }

    /* specila requests */
    .specialinslabel{
        border: 1px solid #020142;
        border-radius: 5px;
        padding: 5px;
        background-color: #FFE551;
        cursor: pointer;
    }
    .specialinsclick{
        display: none;
    }
    .specialinsclick:checked + .specialinslabel{
        background-color: #EB9413;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Schedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Schedule List</a>
        <a href="{{ route('calendar') }}" style="padding-top: 6px; padding-left: 10px"> /  Calendar</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Set Schedule Time</a>
    </div>

    <div class="row mb-2">
        @if(session('errormessage'))
            <div class="alert alert-danger" role="alert" style="width: 100%">
                {{ session('errormessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div id="errordiv"></div>

    <form action="{{ route('checkinputtimeslot') }}" method="POST">
        @csrf

        {{-- date --}}
        <input type="hidden" value="{{ $date }}" name="date">

        <div class="row row-cols-1">
            <div class="col-sm-3" style="padding-top: 10px">
                <div class="card h-100" style="width: 100%; border-radius: 10px">
                    <div class="card-body">
                        <div style="display: flex">
                            <div style="display: inline-block">
                                <a href="{{ route('calendar') }}" type="button" class="btn" style="background-color: lightgray; border: none; border-radius: 50%">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-calendar-event" viewBox="0 0 16 16" >
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                </a>
                            </div>
                            <div style="display: inline-block">
                                <h5 style=" padding-left: 10px; padding-top: 7px; color: #222944">{{ $date }}</h5>
                                <small style=" padding-left: 10px;">your choosed date</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" style="padding-top: 10px">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Other Sessions</h5>
                        @if(count($shedules) == 0)
                            <div class="alert alert-info">
                                <h6>No Shedules on this day</h6>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach ($shedules as $shedule)
                                        <tr>
                                            <td style="vertical-align: middle">
                                                <h5>{{ $shedule->time }}</h5>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle">
                                                <h5 style="background-color: #4B053F; color: white; border-radius: 2px">{{ $shedule->sheduled_students_count }}</h5>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <div style="background-color: #ccc; border-radius: 50%; padding: 5px 5px 5px 5px; width: 30px; height: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <a href="{{ route('updateexistschedule', [$shedule->id, $shedule->date]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#040D31" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Choose a session time</h5>
                        <hr style="border: 0.5px solid #222944">
                        <div>
                            @if(count($timeslots) == 0)
                                <div class="alert alert-info" role="alert">
                                    <h5 style="color: #222944">You hadn't defined time slots for {{ $selectdayname }}, <a href="{{ route('timetable') }}">create</a></h5>
                                </div>
                            @else
                                <h6 style="color: #040920; font-weight: bold">Choose session type</h6>
                                <div style="display: inline-block">
                                    <div class="form-check">
                                        <input class="form-check-input session_click" type="radio" name="session_type" id="theory" value="theory">
                                        <label class="form-check-label session" for="theory">
                                            <h5>Theory</h5>
                                        </label>
                                    </div>
                                </div>
                                <div style="display: inline-block">
                                    <div class="form-check">
                                        <input class="form-check-input session_click" type="radio" name="session_type" id="practicle" value="practicle">
                                        <label class="form-check-label session" for="practicle">
                                            <h5>Practicle</h5>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none; padding-top: 20px" id="categorypanel">
                                    <h6 style="color: #040920; font-weight: bold">Choose vehicle category</h6>
                                    <select class="form-control" id="category" name="category[]">
                                        <option value="select">Select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->category_code }}">{{ ucwords($cat->name).' ('.$cat->category_code.')' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="transmission-panel" style="display: none; padding-top: 10px">
                                    <h6 style="color: #040920; font-weight: bold">Choose transmission</h6>
                                    <div style="display: inline-block">
                                        <div class="form-check">
                                            <input class="form-check-input trans_click" type="radio" name="transmission" id="auto" value="auto">
                                            <label class="form-check-label trans" for="auto">
                                                <h5>Auto</h5>
                                            </label>
                                        </div>
                                    </div>
                                    <div style="display: inline-block">
                                        <div class="form-check">
                                            <input class="form-check-input trans_click" type="radio" name="transmission" id="manual" value="auto">
                                            <label class="form-check-label trans" for="manual">
                                                <h5>Manual</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive" style="padding: 10px">
                                    <h5 style="color: #010824; padding: 10px; font-weight: bold; display: none" id="heading">Sessions on {{ $selectdayname }} </h5>
                                    <table class="table table-hover">
                                        <tbody id='inslist'>
                                            {{-- @foreach ($timeslots as $slot)
                                            <tr>
                                                <td style="vertical-align: middle">
                                                    <input class="form-check-input" type="radio" name="slottime[]" id="radio-{{ $slot->id }}" value="{{ $slot->time_slot }}" style="display: none">
                                                    <label for="radio-{{ $slot->id }}" class="deff-slot-name">
                                                        <h5>{{ $slot->slot_name }}</h5>
                                                    </label>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <h5 style="color: #040920">{{ $slot->time_slot }}</h5>
                                                </td>
                                                <td>
                                                    @foreach ($slot->instructor_working_time_slot as $instructor)
                                                        @foreach ($instructors as $ins)
                                                            @if($ins->user_id == $instructor->instructor_uid)
                                                                <div class="form-check">
                                                                    @if(in_array($ins->user_id, $absent_ids))
                                                                        <input type="radio" class="form-check-input radiodeff" name="{{ $slot->time_slot }}-select[]" value="{{ $ins->user_id }}" id="{{ $slot->time_slot }}-{{ $ins->user_id }}" disabled >
                                                                        <label class="insdeff" for="{{ $slot->time_slot }}-{{ $ins->user_id }}">
                                                                            <div>
                                                                                <div style="display: inline-block">
                                                                                    <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="img">
                                                                                </div>
                                                                                <div style="display: inline-block">
                                                                                    <h6>
                                                                                        {{ $ins->user->f_name }} {{ $ins->user->l_name }}
                                                                                        (Leave)
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    @else
                                                                        <input type="radio" class="form-check-input radiodeff" id="{{ $slot->time_slot }}-{{ $ins->user_id }}" name="{{ $slot->time_slot }}-select[]" value="{{ $ins->user_id }}">
                                                                        <label class="insdeff-active" for="{{ $slot->time_slot }}-{{ $ins->user_id }}">
                                                                            <div>
                                                                                <div style="display: inline-block">
                                                                                    <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="img">
                                                                                </div>
                                                                                <div style="display: inline-block">
                                                                                    <h6>
                                                                                        {{ $ins->user->f_name }} {{ $ins->user->l_name }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                    <div id="infoalert" class="alert alert-info">select session type and vehicle category</div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div id="card">
                                <div>
                                    <div style="display: inline-block">
                                        <h5 style="color: #222944; padding: 10px">Define Custome Slot</h5>
                                    </div>
                                    <div style="display: inline-block">
                                        <label class="switch">
                                            <input type="checkbox" id="customslot" name="slotdivider" onclick="customeslot()">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="card">
                                <div id="custome_slot">
                                    <div class="form-group">
                                        <div  style="display: inline-block !important; padding-left: 10px">
                                            <label for="time">Time</label>
                                        </div>
                                        <div style="display: inline-block !important; padding-left: 10px">
                                            <input type="time" name="custometime" class="form-control" id="custometime" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding: 10px">
                                    <div>
                                        <label>Select Instructor</label>
                                    </div>
                                    @foreach ($instructors as $instructor)
                                        @if(in_array($instructor->user_id, $absent_ids))
                                            <div style="display: inline-block">
                                                <div class="text-center">
                                                    <input type="radio" name="customeinstructor[]" value="{{ $instructor->user_id }}" class="insbtn" id="{{ $instructor->user_id }}" disabled>
                                                </div>
                                                <label class="ins_leave" for="{{ $instructor->user_id }}">
                                                    <div class="text-center">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="img">
                                                    </div>
                                                    <h6>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h6>
                                                    @if(count($instructor-> shedules) == 0)
                                                        I'm Leave
                                                    @else
                                                        <small>Work Hours</small>
                                                        <ul style="list-style-type: none">
                                                            @foreach ($instructor->shedules as $shedule)
                                                                <li>{{ $shedule->time }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </label>
                                            </div>
                                        @else
                                            <div style="display: inline-block">
                                                <div class="text-center">
                                                    <input type="radio" name="customeinstructor[]" value="{{ $instructor->user_id }}" class="insbtn" id="{{ $instructor->user_id }}">
                                                </div>
                                                <label class="ins" for="{{ $instructor->user_id }}">
                                                    <div class="text-center">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="img">
                                                    </div>
                                                    <h6>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h6>
                                                    @if(count($instructor->shedules) == 0)
                                                        I'm free
                                                    @else
                                                        <small>Work Hours</small>
                                                        <ul style="list-style-type: none">
                                                            @foreach ($instructor->shedules as $shedule)
                                                                <li>{{ $shedule->time }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <button class="btn btn-primary" type="submit">Confirm Time Slot</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function customeslot() {
            var checkBox = document.getElementById("customslot");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                document.getElementById('custometime').disabled = false;
                $('input[name="slottime"]').attr('disabled', 'disabled');
            } else {
                document.getElementById('custometime').disabled = true;
                $('input[name="slottime"]').removeAttr('disabled');
            }
        }

        $('.ins').click(function(){
            $('.ins').removeClass('test');
            $(this).addClass("test");
        });

        $('.insdeff-active').click(function(){
            $('.insdeff-active').removeClass('test');
            $(this).addClass("test");
        });

        $('.deff-slot-name').click(function(){
            $('.deff-slot-name').removeClass('deff-slot-name-active');
            $(this).addClass('deff-slot-name-active');
        });

        $(document).ready(function(){
            $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
        });

        $('input[name="session_type"]').on('change', function(){
            var session = $('input[name="session_type"]:checked').val();
            var day = {{ $dayid }};
            if(session == 'theory'){
                $('#categorypanel').hide();
                $('#transmission-panel').hide();
                $.ajax({
                    type: 'get',
                    url: '/gettheorysessions/'+day,
                    success:function(data){
                        if (!$.trim(data)){
                            $('#errordiv').empty();
                            $('#inslist').empty();
                            $('#errordiv').append('<div class="alert alert-info">Please Choose an another date or you can make special session</div>');
                        }else{
                            console.log(data);
                            $('#inslist').empty();
                            data.forEach(function(row){
                                var tablerow = '<tr><td style="vertical-align:middle"><div class="form-check"><input class="form-check-input slotclick" type="radio" name="timeslot" value="'+row.id+'" id="'+row.time_slot+'"><label for="'+row.time_slot+'" class="slot"><div style="display: inline-block; border: 1px solid #080529; border-radius: 5px; padding: 0px 5px 0px 5px" class="icon"><i class="fa fa-check" aria-hidden="true"></i></div><div style="display: inline-block; padding-left:10px"><h6>'+capitalizeFirstLetter(row.slot_name)+'</h6></div></label></div></td><td style="vertical-align: middle"><h5 style="color: #080529; font-weight: bold">'+row.time_slot+'</h5></td><td>'+instructorslist(row.instructor_working_time_slot)+'</td></td></tr>';
                                $('#inslist').append(tablerow);
                            });
                            $('#infoalert').hide();
                            $('#heading').show();
                            $('#errordiv').empty();
                        }
                    },
                    error:function(){
                        $('#errordiv').empty();
                        $('#inslist').empty();
                        $('#infoalert').show();
                        $('#heading').hide();
                        $('#errordiv').append('<div class="alert alert-danger">Please Select session type !!</div>');
                    }
                });
            }else{
                $('#categorypanel').show();
                $('#transmission-panel').show();
                $('#errordiv').empty();
                $('#inslist').empty();
                $('#infoalert').show();
                $('#heading').hide();
            }
        });

        $('select').on('change', function(){
            var cat = document.getElementById('category').value;
            console.log('change '+cat);
            var day = {{ $dayid }};

            $.ajax({
                type: 'get',
                url: '/getpracticlesessions/'+day+'/'+cat,
                success:function(data){
                    if (!$.trim(data)){
                        console.log('empty');
                        $('#errordiv').empty();
                        $('#inslist').empty();
                        $('#heading').hide();
                        $('#infoalert').show();
                        $('#errordiv').append('<div class="alert alert-info">Please Choose an another category or another date</div>');
                    }else{
                        console.log('success');
                        $('#inslist').empty();
                        data.forEach(function(row){
                            var tablerow = '<tr><td style="vertical-align:middle"><div class="form-check"><input class="form-check-input slotclick" type="radio" name="timeslot" value="'+row.id+'" id="'+row.time_slot+'"><label for="'+row.time_slot+'" class="slot"><div style="display: inline-block; border: 1px solid #080529; border-radius: 5px; padding: 0px 5px 0px 5px" class="icon"><i class="fa fa-check" aria-hidden="true"></i></div><div style="display: inline-block; padding-left:10px"><h6>'+capitalizeFirstLetter(row.slot_name)+'</h6></div></label></div></td><td style="vertical-align: middle"><h5 style="color: #080529; font-weight: bold">'+row.time_slot+'</h5></td><td>'+instructorslist(row.instructor_working_time_slot)+'</td></td></tr>';
                            $('#inslist').append(tablerow);
                        });
                        $('#infoalert').hide();
                        $('#heading').show();
                        $('#errordiv').empty();
                    }
                },
                error:function(err){
                    console.log('fail');
                    $('#errordiv').empty();
                    $('#inslist').empty();
                    $('#infoalert').show();
                    $('#heading').hide();
                    $('#errordiv').append('<div class="alert alert-danger">Please Select a vehicle category !!</div>');
                }
            });

        });

        function instructorslist(array){

            var instructorslist = '<ul style="list-style-type: none; margin-left: 0px; margin-bottom: 0px">';
            var instructors = @json($instructors);
            const absents = @json($absent_ids);

            for(var i = 0; i<array.length ; i++){
                for(var j=0; j<instructors.length; j++){
                    if(array[i].instructor_uid == instructors[j].user_id){
                        if(absents.includes(instructors[j].user_id)){
                            // console.log('no');
                            instructorslist = instructorslist+'<li><input type="radio" id="'+array[i].time_slot_id+'-'+instructors[j].user_id+'" name="'+array[i].time_slot_id+'-instructor_id" value="'+instructors[j].user_id+'" class="nameclick" ><label class="name" for="'+array[i].time_slot_id+'-'+instructors[j].user_id+'"><div style="vertical-align: middle"><div style="display: inline-block; padding-right: 10px"><img src="/uploadimages/instructors_profiles/'+instructors[j].user.profile_img+'" alt="Instructor Profile" class="insprofile"></div><div style="display: inline-block"><h5 style="margin-bottom: 0px">'+checkgenger(instructors[j].user.gender)+capitalizeFirstLetter(instructors[j].user.f_name)+' '+capitalizeFirstLetter(instructors[j].user.l_name)+'</h5></div><div class="float-right icondiv" style="display: inline-block;"><i class="fa fa-check" aria-hidden="true"></i></div></div></li>';
                        }else{
                            // console.log('yes'+array[i].time_slot_id+'-instructor_id');
                            var url = '{{ route("studentinstructordetails", ":id") }}';
                            url = url.replace(':id', instructors[j].user_id);
                            instructorslist = instructorslist+'<li><input type="radio" id="'+array[i].time_slot_id+'-'+instructors[j].user_id+'" name="'+array[i].time_slot_id+'-instructor_id" value="'+instructors[j].user_id+'" class="nameclick" ><label class="name" for="'+array[i].time_slot_id+'-'+instructors[j].user_id+'"><div style="vertical-align: middle"><div style="display: inline-block; padding-right: 10px"><img src="/uploadimages/instructors_profiles/'+instructors[j].user.profile_img+'" alt="Instructor Profile" class="insprofile"></div><div style="display: inline-block"><h5 style="margin-bottom: 0px">'+checkgenger(instructors[j].user.gender)+capitalizeFirstLetter(instructors[j].user.f_name)+' '+capitalizeFirstLetter(instructors[j].user.l_name)+'</h5></div><div class="float-right icondiv" style="display: inline-block;"><i class="fa fa-check" aria-hidden="true"></i></div><div style="display: inline-block; padding-left:10px"><a class="viewprofile" href="'+url+'">view profile</a></div></div></li>';
                        }
                    }
                }
            }
            return instructorslist+'</ul>';
        }

        function checkgenger(gender){
            var value = 'Mr ';
            if(gender == 'female'){
                value = 'Mrs. ';
            }
            return value;
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

    </script>

</div>

<script>

</script>

@endsection
