@extends('layouts.instructorapp')

@section('content')

<style>
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0 !important;
        background-color: transparent;
    }

    #img{
        padding-left: 0px !important;
        width: 50px !important;
        height:auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .student-label{
        cursor: pointer;
    }

    .icon{
        display: inline-block;
        margin: 10px;
        border: 1px solid #010C35;
        padding: 0px 5px 0px 5px;
        border-radius: 5px
    }

    .checkuser{
        display: none;
    }

    .checkuser:checked + .student-label .icon{
        background-color: #6AFF6A;
    }

    .checkuser:checked + .student-label .icon i{
        color: #03073D;
    }

    .absent-icon{
        border: 1px solid #010C35;
        padding: 0px 5px 0px 5px;
        margin: 10px;
        border-radius: 5px;
    }

    .allabsent{
        display: none;
    }

    .allabsent-label{
        cursor: pointer;
    }

    .allabsent:checked + .allabsent-label .absent-icon{
        background-color: #BB184E;
    }

    .allabsent:checked + .allabsent-label .absent-icon i{
        color: #FFFFFF;
    }

    .allabsent:checked + .allabsent-label .absent-text h5{
        color: #BB184E;
        font-weight: bold;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendance</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Report attendance</a>
    </div>

    <div class="row mb-2 justify-content-end">
        <button type="button" class="checkall btn btn-primary">Select all</button>
    </div>

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                <h5>
                    <strong>Wooops !!</strong> {{ session('errormsg') }}
                </h5>
            </div>
        </div>
    @endif

    <div class="row-mb-2" id="error-div"></div>

    <form action="{{ route('informattendance') }}" method="POST" id="report-form">
        @csrf
        @foreach($shedule as $sdl)
            <input type="hidden" value="{{ $sdl->id }}" name="id">
        @endforeach

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #010C35; font-weight: bold">Students List</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Attendance</th>
                                    <th>Student</th>
                                    <th>Session progress</th>
                                </thead>
                                <tbody>
                                    @foreach($students_details as $student)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="students[]"  class="checkuser" value="{{ $student->user->id }}" id="student-{{ $student->user_id }}">
                                                <label for="student-{{ $student->user_id }}" class="student-label">
                                                    <div class="icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="student-{{ $student->user_id }}" class="student-label">
                                                    <div style="display: inline-block; padding-right: 10px">
                                                        <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image" id="img">
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <h5 style="color: #222944">{{ $student->user->f_name }} {{ $student->user->l_name }}</h5>
                                                    </div>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="grade-{{ $student->user_id }}" name="session-grade-{{ $student->user_id }}">
                                                        <option value="0">Select Level</option>
                                                        <option value="1">Week</option>
                                                        <option value="2">Average</option>
                                                        <option value="3">Good</option>
                                                        <option value="4">Very Good</option>
                                                    </select>
                                                </div>
                                                <span id="grade-error-{{ $student->user_id }}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="checkbox" name="empty[]" value="1" id="empty-student" class="allabsent">
                            <label for="empty-student" class="allabsent-label">
                                <div style="display: inline-block" class="absent-icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                                <div style="display: inline-block" class="absent-text">
                                    <h5>No enyone attend</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <button type="button" class="btn btn-success" id="submit_button">Submit</button>
            </div>
        </div>

    </form>

</div>

<script>
    var clicked = false;
    $(".checkall").on("click", function() {
        $(".checkuser").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect' : 'Select all';
    });

    $(document).ready(function(){
        $('aside ul .shedules').css('border-left', '5px solid #00bcd4');
    });

    // onchange functions
    $("input:checkbox[class=checkuser]").on('change', function(){
        $('#error-div').empty();
        $('input:checkbox[class=allabsent]').each(function () { $(this).prop('checked', false); });
    });

    $("input:checkbox[class=allabsent]").on('change', function(){
        $('#error-div').empty();
        $('input:checkbox[class=checkuser]').each(function () { $(this).prop('checked', false); });
    });

    // submit button function
    $('#submit_button').click(function(){

        var students = [];
        $("input:checkbox[class=checkuser]:checked").each(function(){
            students.push($(this).val());
        });

        var allabsent = [];
        $("input:checkbox[class=allabsent]:checked").each(function(){
            allabsent.push($(this).val());
        });

        if((students.length == 0) && (allabsent.length == 0)){
            $('#error-div').empty();
            $('#error-div').append('<div class="alert alert-danger">Please select students !!</div>');
        }else{
            var student_count = students.length;
            var absent_count = allabsent.length;
            if (student_count > 0) {
                var err_count = 0;
                students.forEach(function(data){
                    var variable = 'grade-'+data;
                    var grade = $('#'+variable).val();
                    console.log('student '+variable+' grade '+grade);
                    if(grade == 0){
                        err_count++;
                        var err = 'grade-error-'+data;
                        document.getElementById(err).innerHTML = '<h6 style="color:red; text-align:center">fill this field</h6>';
                    }else{
                        var err = 'grade-error-'+data;
                        document.getElementById(err).innerHTML = '';
                    }
                });
                if(err_count == 0){
                    console.log('fine');
                    $('#report-form').submit();
                }
            }
            if(absent_count > 0){
                console.log('all absent');
                $('#report-form').submit();
            }
        }
    });

</script>

@endsection
