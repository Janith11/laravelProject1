@extends('layouts.student')

@section('content')

<style>
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
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Scheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Schedule List</a>
        <a style="padding-top: 6px; padding-left: 10px;"> / Select Time</a>
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5> Wooops ! Some input with errors</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2" id="errordiv"></div>

    <div class="row-mb-2">
        <div class="row row-cols-1">
            <div class="col-sm-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div>
                            <div style="display: inline-block">
                                <h5 style="color: #222944; font-weight: bold">Choosed Date</h5>
                                <div class="form-group">
                                    <h5 style="color: #12C74E">{{ $select_date }}</h5>
                                </div>
                            </div>
                            <div style="display: inline-block;" class="float-right">
                                <div style="width: 50px; height: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 50%; text-align: center; padding-top: 30%">
                                    <a href="{{ route('studentsheduling') }}" type="button">
                                        <i class="fa fa-calendar" aria-hidden="true" style="float: left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#011E31" fill-opacity="1" d="M0,160L48,133.3C96,107,192,53,288,42.7C384,32,480,64,576,90.7C672,117,768,139,864,160C960,181,1056,203,1152,213.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                {{-- <div id="card"> --}}
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 style="color: #080529; font-weight: bold">Training Schedules on {{ $select_date }}</h5>
                            <hr style="border-top: 1px solid #080529">
                            @if(count($dayschedules) == 0)
                                <div class="alert alert-info" role="alert">
                                    <h6>No sessions on {{ $select_date }}</h6>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead style="background-color: #12C74E; color: white">
                                            <th>Time</th>
                                            <th>Instructors</th>
                                            <th>Lesson</th>
                                            <th>Trainers</th>
                                            <th>Details</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($dayschedules as $schedule)
                                                <tr>
                                                    <td>
                                                        <h5 style="color: #080529; font-weight: bold">{{ $schedule->time }}</h5>
                                                    </td>
                                                    <td>
                                                        @foreach ($instructors as $instructor)
                                                            @if($schedule->instructor == $instructor->user_id)
                                                                <div>
                                                                    <div style="display: inline-block">
                                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="insprofile">
                                                                    </div>
                                                                    <div style="display: inline-block; padding-left: 10px">
                                                                        @php
                                                                            if($instructor->user->gender == 'male'){
                                                                                $name = 'Mr. '.ucwords($instructor->user->f_name).' '.ucwords($instructor->user->l_name);
                                                                            }else{
                                                                                $name = 'Mrs. '.ucwords($instructor->user->f_name).' '.ucwords($instructor->user->l_name);
                                                                            }
                                                                        @endphp
                                                                        <h5>
                                                                            {{ $name }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <h5 style="color: #020142">
                                                            {{ ucwords($schedule->lesson_type) }}
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h5 style="background-color: #020142; color: white; padding: 5px; display: inline; border-radius: 5px">
                                                                {{ $schedule->sheduledstudents_count }}
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="" class="viewprofile">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                {{-- </div> --}}
            </div>

        </div>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <button class="slotbtn btnone" onclick="btnone()">Choose a Daily Schedule</button>
                        <button class="slotbtn btntwo" onclick="btntwo()">Request a Special Schedule</button>
                        <hr style="border-top: 1px solid #080529; margin-top: -1px">
                    </div>
                    <form action="{{ route('studentrequestslot') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $session_type }}" name="lesson_type">
                        <input type="hidden" value="{{ $select_date }}" name="date">

                        <div id="exist">
                            @php
                                $date = date('l', strtotime($select_date));
                                $text = "Choose a Time Slot ( $date time table )";
                            @endphp
                            <h5 style="color: #222944; font-weight: bold">{{ $text }}</h5>
                            <hr style="border-top: 1px solid #222944">
                            @if(count($time_table) == 0)
                                <div class="alert alert-info" role="alert">
                                    No defined time slots on this day
                                </div>
                            @else
                                @if($tresult == 'pass')
                                    <div class="form-group">
                                        <label for="categories">Choose a Category</label>
                                        <select class="form-control" id="categories" name="category[]">
                                            <option value="select">Select Category</option>
                                            @foreach($trainingcategories as $tcat)
                                                @foreach ($categories as $cat)
                                                    @if($tcat->category == $cat->category_code)
                                                        <option value="{{ $tcat->category }}">{{ ucwords($cat->name) }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="background-color: #F5A105 !important; color: rgb(11, 3, 59)">
                                                <th style="text-align: center">Slot Name</th>
                                                <th style="text-align: center">Time</th>
                                                <th style="text-align: center">Instructors</th>
                                            </thead>
                                            <tbody id="inslist">
                                                {{-- data came from ajax --}}
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="alert alert-info" id="infoalert">
                                        <h5>After select a category table data will display</h5>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="background-color: #F5A105 !important; color: rgb(11, 3, 59)">
                                                <th style="text-align: center">Slot Name</th>
                                                <th style="text-align: center">Time</th>
                                                <th style="text-align: center">Instructors</th>
                                            </thead>
                                            <tbody>
                                                @foreach($time_table as $time)
                                                    <tr class="scheduletr">
                                                        <td style="vertical-align: middle">
                                                            <div class="form-check">
                                                                <input class="form-check-input slotclick" type="radio" name="timeslot" value="{{ $time->time_slot }}" id="{{ $time->time_slot }}">
                                                                <label for="{{ $time->time_slot }}" class="slot">
                                                                    <div style="display: inline-block; border: 1px solid #080529; border-radius: 5px; padding: 0px 5px 0px 5px" class="icon">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div style="display: inline-block">
                                                                        <h6>
                                                                            @php
                                                                                echo ucwords("$time->slot_name");
                                                                            @endphp
                                                                        </h6>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align: middle">
                                                            <h5 style="color: #080529; font-weight: bold">
                                                                {{ $time->time_slot }}
                                                            </h5>
                                                        </td>
                                                        <td style="vertical-align: middle">
                                                            <ul style="list-style-type: none; margin-left: 0px; margin-bottom: 0px">
                                                                @foreach ($time->instructor_working_time_slot as $instructor)
                                                                    @foreach ($instructors as $ins)
                                                                        @if($instructor->instructor_uid == $ins->user_id)
                                                                            <li>
                                                                                @if(in_array( $ins->user_id, $absent_ids))
                                                                                    <input type="radio" id="{{ $time->time_slot }}-{{ $ins->id }}" name="{{ $time->time_slot }}-instructor_id" value="{{ $ins->user_id }}" class="nameclick" disabled>
                                                                                    <label class="name" for="{{ $time->time_slot }}-{{ $ins->id }}">
                                                                                        @php
                                                                                            if ($ins->user->gender == 'male') {
                                                                                                $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name).' (Leave)';
                                                                                            }else{
                                                                                                $name = 'Mrs. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name).' (Leave)';
                                                                                            }
                                                                                        @endphp
                                                                                        <div style="vertical-align: middle">
                                                                                            <div style="display: inline-block; padding-right: 10px">
                                                                                                <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="insprofile">
                                                                                            </div>
                                                                                            <div style="display: inline-block">
                                                                                                <h5 style="margin-bottom: 0px">{{ $name }}</h5>
                                                                                            </div>
                                                                                            <div class="float-right icondiv" style="display: inline-block;">
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </label>
                                                                                @else
                                                                                    <input type="radio" id="{{ $time->time_slot }}-{{ $ins->id }}" name="{{ $time->time_slot }}-instructor_id" value="{{ $ins->user_id }}" class="nameclick">
                                                                                    <label class="name" for="{{ $time->time_slot }}-{{ $ins->id }}">
                                                                                        @php
                                                                                            if ($ins->user->gender == 'male') {
                                                                                                $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                                                            }else{
                                                                                                $name = 'Mrs. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                                                            }
                                                                                        @endphp
                                                                                        <div style="vertical-align: middle">
                                                                                            <div style="display: inline-block; padding-right: 10px">
                                                                                                <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="insprofile">
                                                                                            </div>
                                                                                            <div style="display: inline-block; padding-right: 10px">
                                                                                                <h5 style="margin-bottom: 0px">{{ $name }}</h5>
                                                                                            </div>
                                                                                            <div style="display: inline-block">
                                                                                                <a class="viewprofile" href="{{ route('studentinstructordetails', $ins->user_id) }}">view profile</a>
                                                                                            </div>
                                                                                            <div class="float-right icondiv" style="display: inline-block;">
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </label>
                                                                                @endif
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                <div id="card">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Request</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                    {{-- special --}}
                    <div id="special" style="display: none">

                        <div class="form-group">
                            <label for="time">Enter Time</label>
                            <input type="time" class="form-control" id="time">
                        </div>

                        <div>
                            @foreach ($instructors as $ins)
                                <div class="form-check" style="display: inline-block">
                                    @if( in_array($ins->user_id, $absent_ids) )
                                        <input class="form-check-input specialinsclick" type="radio" name="specialins" id="{{ $ins->user_id }}" value="{{ $ins->user_id }}" disabled>
                                        <label class="form-check-label specialinslabel" for="{{ $ins->user_id }}">
                                            <div class="text-center">
                                                <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="insprofile">
                                            </div>
                                            <div style="padding-top: 10px" class="text-center">
                                                @php
                                                    if($ins->user->gender == 'male'){
                                                        $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                    }else{
                                                        $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                    }
                                                @endphp
                                                <h6 style="color: #020142">
                                                    {{ $name }} (Leave)
                                                </h5>
                                            </div>
                                        </label>
                                    @else
                                        <input class="form-check-input specialinsclick" type="radio" name="specialins" id="{{ $ins->user_id }}" value="{{ $ins->user_id }}">
                                        <label class="form-check-label specialinslabel" for="{{ $ins->user_id }}">
                                            <div class="text-center">
                                                <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="insprofile">
                                            </div>
                                            <div style="padding-top: 10px" class="text-center">
                                                @php
                                                    if($ins->user->gender == 'male'){
                                                        $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                    }else{
                                                        $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                    }
                                                @endphp
                                                <h6 style="color: #020142">
                                                    {{ $name }}
                                                </h5>
                                            </div>
                                        </label>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center" id="card">
                            <button class="btn btn-success" type="submit">Request</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

    <script>

        $('#categories').on('change', function(){

            var value = document.getElementById('categories').value;
            var id = {{ $weekday_id }};

            $.ajax({
                type: 'get',
                url: '/studentshedule/getdate/getinstructordetails/'+value+'/'+id,
                success: function(data){
                    if (!$.trim(data)){
                        $('#errordiv').empty();
                        $('#inslist').empty();
                        $('#errordiv').append('<div class="alert alert-info">Please Choose an another date or you can request a special session</div>');
                    }else{
                        $('#inslist').empty();
                        data.forEach(function(row){
                            var tablerow = '<tr><td style="vertical-align:middle"><div class="form-check"><input class="form-check-input slotclick" type="radio" name="timeslot" value="'+row.id+'" id="'+row.time_slot+'"><label for="'+row.time_slot+'" class="slot"><div style="display: inline-block; border: 1px solid #080529; border-radius: 5px; padding: 0px 5px 0px 5px" class="icon"><i class="fa fa-check" aria-hidden="true"></i></div><div style="display: inline-block; padding-left:10px"><h6>'+capitalizeFirstLetter(row.slot_name)+'</h6></div></label></div></td><td style="vertical-align: middle"><h5 style="color: #080529; font-weight: bold">'+row.time_slot+'</h5></td><td>'+instructorslist(row.instructor_working_time_slot)+'</td></td></tr>';
                            $('#inslist').append(tablerow);
                        });
                        $('#infoalert').hide();
                    }
                },
                error: function(err){
                    var error = document.getElementById('errordiv');
                    $('#errordiv').empty();
                    $('#inslist').empty();
                    $('#infoalert').show();
                    $('#errordiv').append('<div class="alert alert-danger">Please Select a Category !!</div>');
                },
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

        $('.btnone').click(function(){
            $('.btnone').removeClass('slotbtnnotclick');
            $('.btnone').addClass('slotbtnclick');
            $('.btntwo').removeClass('slotbtnclick');
            $('.btntwo').addClass('slotbtnnotclick');
            document.getElementById('exist').style.display = 'block';
            document.getElementById('special').style.display = 'none';
        });

        $('.btntwo').click(function(){
            $('.btnone').removeClass('slotbtnclick');
            $('.btnone').addClass('slotbtnnotclick');
            $('.btntwo').removeClass('slotbtnnotclick');
            $('.btntwo').addClass('slotbtnclick');
            document.getElementById('exist').style.display = 'none';
            document.getElementById('special').style.display = 'block';
        });

        $(document).ready(function(){
            $('.btnone').addClass('slotbtnclick');
            $('.btntwo').addClass('slotbtnnotclick');
            $('aside ul .shedule').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
