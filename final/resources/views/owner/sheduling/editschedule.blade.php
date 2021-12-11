@extends('layouts.ownerapp')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .img{
        width: 60px;
        height: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .std-label{
        border: 1px solid #010A30;
        border-radius: 5px;
        padding: 0px 5px 0px 5px;
        cursor: pointer;
    }

    .student-ckeck{
        display: none;
    }

    .student-ckeck:checked + .std-label{
        background-color: #FAFD2E;
    }

    .student-ckeck:checked + .std-label i{
        color: #0A024D;
    }

    .extra-ins-click{
        display: none;
    }

    .extra-ins-label{
        border: 1px solid #010A30;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
    }

    .extra-ins-click:checked + .extra-ins-label{
        background-color: #FAFD2E;
    }

    .morestdlbl{
        cursor: pointer;
    }

    .addmorestd:checked + .morestdlbl .morecheck i{
        color: #2EEFFD;
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
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('ownershedulelist') }}"> / Sessions List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Edit Session</a>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #010A30; font-weight: bold">Edit Session</h5>
                    <hr style="border-top: 1px solid #010A30">
                    @foreach ($shedule as $result)
                        <div class="row" style="margin-top: 20px">
                            <h5 style="color: #A8A5A0; font-weight: bold; margin: 10px">Session Details</h5>
                        </div>
                        <div class="row row-cols-1">
                            <div class="col-sm-3">
                                <div class="card h-100">
                                    <div class="card-body" style="border-left: 10px solid #2EFD6C">
                                        <div>
                                            <h5 style="color: #010A30; font-weight: bold">Session ID & Title</h5>
                                        </div>
                                        <div>
                                            <h6 style="color: #010A30"><span class="badge badge-pill badge-warning">{{ $result->id }}</span> {{ ucwords($result->title) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card h-100">
                                    <div class="card-body" style="border-left: 10px solid #FD9C2E">
                                        <div>
                                            <h5 style="color: #010A30; font-weight: bold">Date</h5>
                                        </div>
                                        <div>
                                            <h6 style="color: #010A30">{{ $result->date }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card h-100">
                                    <div class="card-body" style="border-left: 10px solid #2EEFFD">
                                        <div>
                                            <h5 style="color: #010A30; font-weight: bold">Time</h5>
                                        </div>
                                        <div>
                                            <h6 style="color: #010A30">{{ $result->time }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card h-100">
                                    <div class="card-body" style="border-left: 10px solid #FAFD2E">
                                        <div>
                                            <h5 style="color: #010A30; font-weight: bold">Session Type</h5>
                                        </div>
                                        <div>
                                            <h6 style="color: #010A30">{{ ucwords($result->lesson_type) }}</h6>
                                            @php
                                                $text = '';
                                                foreach ($categories as $cat) {
                                                    if($cat->category_code == $result->vahicle_category){
                                                        $text = ucwords($cat->name);
                                                    }
                                                }
                                                $text = $text.' ';
                                            @endphp
                                            @if($result->lesson_type = 'practicle')
                                                <h6>{{ $text }}<span class="badge badge-pill badge-success">{{ ucwords($result->transmission) }}</span></h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <h5 style="color: #A8A5A0; font-weight: bold; margin: 10px">Instructor Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        @foreach ($instructor as $ins)
                                            @if($ins->user_id == $result->instructor)
                                                <div style="display: inline-block">
                                                    <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="img">
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    @php
                                                        $name = '';
                                                        if($ins->user->gender == 'male'){
                                                            $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                        }else {
                                                            $name = 'Mrs. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->l_name);
                                                        }
                                                    @endphp
                                                    <h5 style="color: #010A30; font-weight: bold">{{ $name }}</h5>
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    <button class="btn btn-success" id="instructor_change_btn">Chnage Instructor</button>
                                                </div>
                                            @endif
                                        @endforeach
                                        <input type="hidden" id="schedule_date" value="{{ $result->date  }}">
                                        <div id="extra-ins" style="display: none">
                                            <h6 style="color: #010A30; font-weight: bold; margin-top: 20px">Select an Instructor</h6>
                                            <div id="ins-alert"></div>
                                            <div id="ins-panel">
                                                {{-- data came from ajax --}}
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-success" id="set-instructor">Set Instructor</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <h5 style="color: #A8A5A0; font-weight: bold; margin: 10px">Students Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 align-self-end">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-danger" id="btn-remove" disabled>Remove</button>
                                        <button class="btn btn-warning" id="btn-add">Add</button>
                                        <div class="pt-2">
                                            @if(session('addmoreerror'))
                                                <div class="alert alert-danger">
                                                    <h6><b>{{ session('addmoreerror') }}</b></h6>
                                                </div>
                                            @endif
                                        </div>
                                        <div id="more-student-panel" style="display: none">
                                            <h6 class="text-muted pt-3">Select Students for Add</h6>
                                            <div class="more-students"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="notify_div"></div>
                                        <form action="" id="students-list">
                                            @csrf
                                            <input type="hidden" id="shedule_id" value="{{$result->id}}">
                                            <table class="table table-hover">
                                                <tbody id="students-list-panel">
                                                    @foreach ($result->sheduledstudents as $student)
                                                        @foreach ($students as $std)
                                                            @if($std->user_id == $student->student_id)
                                                                <tr>
                                                                    <td style="vertical-align: middle">
                                                                        <input type="checkbox" id="check-{{ $std->user_id }}" value="{{ $std->user_id }}" name="checkstd[]" class="student-ckeck">
                                                                        <label for="check-{{ $std->user_id }}" class="std-label">
                                                                            <div>
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <div style="display: inline-block">
                                                                            <img src="/uploadimages/students_profiles/{{ $std->user->profile_img }}" alt="Student Profile" class="img">
                                                                        </div>
                                                                        <div style="display: inline-block; padding-left: 10px">
                                                                            <h5>{{ ucwords($std->user->f_name) }} {{ ucwords($std->user->l_name) }}</h5>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    });

    $('.student-ckeck').on('change', function(){
        var students = [];
        $('input[name="checkstd[]"]:checked').each(function(){
            students.push($(this).val());
        });
        console.log('change '+students.length);
        if(students.length == 0){
            $('#btn-remove').attr('disabled', true);
        }else{
            $('#btn-remove').attr('disabled', false);
        }
    });

    $('#btn-remove').click(function(){
        console.log('remove button click');
        var students = [];
        $('input[name="checkstd[]"]:checked').each(function(){
            students.push($(this).val());
        });
        var students = new Array(students);
        console.log(students);
        var res = confirm('Are you sure want to remove selected students ?');
        console.log('result '+res);
        if(res == true){
            var id = $('#shedule_id').val();
            console.log('true');
            $.ajax({
                // data: $('#students-list').serialize(),
                type: 'delete',
                url: '/removestudents/'+students+'/'+id,
                // dataType: 'json',
                success:function(data){
                    console.log('success');
                    console.log(data.message);
                    $('#notify_div').empty();
                    $('#notify_div').append('<div class="alert alert-success" role="alert">'+data.message+'</div>');
                    displaytable(id);
                },
                error:function(){
                    console.log('error');
                }
            });
        }else{
            event.preventDefault();
        }
    });

    function displaytable(shedule_id){
        console.log(shedule_id);
        $.ajax({
            type: 'get',
            url: '/getsheduledstudents/'+shedule_id,
            success:function(data){
                console.log(data);
                $('#students-list-panel').empty();
                data.forEach(function(row){
                    text = '<tr><td style="vertical-align: middle"><input type="checkbox" id="check-'+row.student_id+'" value="'+row.student_id+'" name="checkstd[]" class="student-ckeck"><label for="check-'+row.student_id+'" class="std-label"><div><i class="fa fa-check" aria-hidden="true"></i></div></label></td><td>'+ReturnStudent(row.student_id)+'</td></tr>';
                    $('#students-list-panel').append(text);
                });
                $('#notify_div').empty();
            },
            error:function(){
                console.log('error found');
            }
        });
    }

    $('#instructor_change_btn').click(function(){
        var result = confirm('Are You Sure want to change instructor ? ');
        var instructors = @json($instructor);
        console.log('instructor change function '+result);
        if(result == true){
            var date = $('#schedule_date').val();
            console.log(date);
            $.ajax({
                type: 'get',
                url: '/custometime/'+date,
                success:function(data){
                    $('#extra-ins').show();
                    $('#ins-panel').empty();
                    console.log(data);
                    data.forEach(function(row){
                        instructors.forEach(function(ins){
                            if(ins.user_id == row.user_id){
                                console.log('come here');
                                if(row.status == 1){
                                    var text = '<input type="radio" class="extra-ins-click" id="extra-ins-'+ins.user_id+'" name="extra_instructors" value="'+ins.user_id+'"><label for="extra-ins-'+ins.user_id+'" class="extra-ins-label"><div class="text-center"><img src="/uploadimages/instructors_profiles/'+ins.user.profile_img+'" class="img"></div><div><h6 style="color:#05103F">'+capitalizeFirstLetter(ins.user.f_name)+' '+capitalizeFirstLetter(ins.user.l_name)+'</h6></div><div>'+workinghours(row.working_times)+'</div></label>';
                                }else{
                                    var text = '<input type="radio" class="extra-ins-click" id="extra-ins-'+ins.user_id+'" name="extra_instructors" disabled><label for="extra-ins-'+ins.user_id+'" class="extra-ins-label"><div class="text-center"><img src="/uploadimages/instructors_profiles/'+ins.user.profile_img+'" class="img"></div><div><h6 style="color:#05103F">'+capitalizeFirstLetter(ins.user.f_name)+' '+capitalizeFirstLetter(ins.user.l_name)+'</h6><small class="text-center">( Leave )</small></div></label>';
                                }
                                $('#ins-panel').append(text);
                            }
                        });
                    });
                },
                error:function(){
                    console.log('error');
                }
            });
        }else{
            event.preventDefault();
        }
    });

    function workinghours(hours){
        console.log(hours.length);
        text = '';
        if(hours.length == 0){
            console.log('hours empty');
            text = "<h6>I'm free</h6>";
            return text;
        }else{
            console.log('hours '+hours.length);
            text = '<h6>Working Times</h6><ul style="list-style-type: none">';
            hours.forEach(function(row){
                text += '<li>'+row+'</li>';
            });
            text += '</ul>';
            return text;
        }

    }

    function ReturnStudent(userid){
        var students = @json($students);
        var text = '';
        students.forEach(function(std){
            if(std.user_id == userid){
                text = '<div style="display: inline-block"><img src="/uploadimages/students_profiles/'+std.user.profile_img+'" alt="Student Profile" class="img"></div><div style="display: inline-block; padding-left: 10px"><h5>'+capitalizeFirstLetter(std.user.f_name)+' '+capitalizeFirstLetter(std.user.l_name)+'</h5></div>';
            }
        });
        return text;
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    $('#set-instructor').click(function(){
        var extra_ins = $('input[name="extra_instructors"]:checked').val();
        var shedule_id = $('#shedule_id').val();
        console.log('extra inst '+extra_ins);
        if (extra_ins == undefined) {
            $('#ins-alert').empty();
            $('#ins-alert').append('<div class="alert alert-danger">Please Select an Instructor</div>');
        }else{
            $('#ins-alert').empty();
            $.ajax({
                type: 'get',
                url: '/chnageinstructor/'+extra_ins+'/'+shedule_id,
                success:function(data){
                    console.log(data.message);
                    location.reload();
                    $('#extra-ins').hide();
                },
                error:function(){
                    console.log('error');
                }
            });
        }
    });

    $('#btn-add').click(function(){
        $('#more-student-panel').toggle();
        console.log('add btn clicked');
        const shedule = @json($shedule);
        var sessionTitle;
        var time;
        var id;
        var date;
        var session_type;
        var category = '';
        var transmission = '';
        shedule.forEach(function(row){
            sessionTitle = row.title;
            time = row.time;
            id = row.id;
            date = row.date;
            session_type = row.lesson_type;
            category = row.vahicle_category;
            transmission = row.transmission;
        });
        let url = '{{ route("getmorestudentsforsession", [":date", ":session", ":category", ":transmission"]) }}';
        url = url.replace(':date', date);
        url = url.replace(':session', session_type);
        url = url.replace(':category', category);
        url = url.replace(':transmission', transmission);
        $.ajax({
            type: 'get',
            url: url,
            success:function(data){
                if (!$.trim(data)){
                    $('.more-students').empty();
                    $('.more-students').append('<div class="alert alert-info">No match students</div>');
                }else{
                    var text = '<div class="row"><form action="/shedulelist/addmorestudents" method="POST">@csrf<input type="hidden" name="sessionID" value="'+id+'"><input type="hidden" name="sessionTitle" value="'+sessionTitle+'"><input type="hidden" name="date" value="'+date+'"><input type="hidden" name="time" value="'+time+'">';
                    data.forEach(function(row){
                        console.log(row);
                        text += '<div class="row mt-2"><div class="col-sm-2"><div class="form-check"><input class="form-check-input addmorestd d-none" type="checkbox" value="'+row.user_id+'" id="user-'+row.user_id+'" name="addmorestudents[]"><label for="user-'+row.user_id+'" class="morestdlbl" style="width:100%"><div class="d-flex"><div class="d-inline-block p-3 morecheck"><i class="fa fa-check" aria-hidden="true"></i></div><div class="d-inline-block pr-3 "><img src="/uploadimages/students_profiles/'+row.user.profile_img+'" alt="Student Profile" class="img"></div><div class="d-inline-block"><h5 style="color: #222944; font-weight:bold">'+capitalizeFirstLetter(row.user.f_name)+' '+capitalizeFirstLetter(row.user.l_name)+'</h5></div></div></label></div</div></div>';
                    });
                    text += '<button type="submit" class="btn btn-primary m-3">Add Selected Students</button></form></div>';
                    $('.more-students').empty();
                    $('.more-students').append(text);
                }
            },
            error:function(){
                console.log('Eorror Found');
            }
        });
    });

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>

@endsection
