@extends('layouts.ownerapp')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bona+Nova&display=swap" rel="stylesheet">

<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }
    #header{
        color: #222944;
        font-weight: bold;
    }
    .dot {
        height: 15px;
        width: 15px;
        background-color: #4CF592;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #date{
        font-family: 'Bona Nova', serif;
        color: #114C6E;
        font-size: 40px;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendances</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Attendances list</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px">
                <a href="{{ route('todayattendance') }}" type="button" class="btn btn-primary">Today</a>
                {{-- <a href="{{ route('leaverequest') }}" type="button" class="btn btn-primary" >Leave Request</a> --}}
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        @if (session('successmsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('successmsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    {{-- <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div> --}}

    <div class="row-mb-2">
        <div class="row">

            <div class="col-sm-4">
                <div id="card">
                    <div class="card border-dark mb-3">
                        <div class="card-body" >
                            {{-- background-image: linear-gradient(red, yellow); --}}
                            <div>
                                <div style="display: inline-block">
                                    <div>
                                        <h5 style="color: #222944; font-weight: bold">Today is,</h5>
                                    </div>
                                    <div>
                                        @php
                                            echo "<h5 id='date'>".date('Y-m-d')."</h5>"
                                        @endphp
                                    </div>
                                </div>
                                <div style="display: inline-block" class="float-right">
                                    <img src="/uploadimages/other/final_f.png" alt="Flower Vask" style="width: 100px; height: auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #14CDE6 !important">
                            <div>
                                <div style="display: inline-block">
                                    <h5 style="color: #222944; font-weight: bold">Pending Leaves : {{ $leave_count }}</h5>
                                </div>
                                <div style="display: inline-block" class="float-right">
                                    <a href="{{ route('leaverequest') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-hourglass-split" viewBox="0 0 16 16" id="pending">
                                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <script>
                                var value = {{ $leave_count }};

                                function blink(selector){
                                    $(selector).fadeOut('slow', function(){
                                        $(this).fadeIn('slow', function(){
                                            blink(this);
                                        });
                                    });
                                }

                                if (value > 0) {
                                    blink('#pending');
                                }
                            </script>
                        </div>
                    </div>
                </div>
                @if($unmarked_attendances != 0)
                    <div id="card">
                        <div class="card">
                            <div class="card-body" style="background-color: #EAF54C !important">
                                <div>
                                    <div style="display: inline-block">
                                        <h5 style="color: #222944; font-weight: bold">Unmarked Attendance : {{ $unmarked_attendances }}</h5>
                                    </div>
                                    <div style="display: inline-block" class="float-right">
                                        <a href="{{ route('unmarkedattendance') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#222944" class="bi bi-bookmark-x" viewBox="0 0 16 16" id="unmarked">
                                                <path fill-rule="evenodd" d="M6.146 5.146a.5.5 0 0 1 .708 0L8 6.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 7l1.147 1.146a.5.5 0 0 1-.708.708L8 7.707 6.854 8.854a.5.5 0 1 1-.708-.708L7.293 7 6.146 5.854a.5.5 0 0 1 0-.708z"/>
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <script>
                                    var value = {{ $unmarked_attendances }};

                                    function blink(selector){
                                        $(selector).fadeOut('slow', function(){
                                            $(this).fadeIn('slow', function(){
                                                blink(this);
                                            });
                                        });
                                    }

                                    if (value > 0) {
                                        blink('#unmarked');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div style="display: inline-block">
                                    <h5 id="header">Instructors<small>   (only this month attendance)</small></h5>
                                </div>
                                <div style="display: inline-block" class="float-right">
                                    <div style="display: inline-flex">
                                        <div class="dot"></div>
                                        <h6 style="padding-left: 10px;padding-right: 10px">Prasent</h6>
                                    </div>
                                    <div style="display: inline-flex">
                                        <div class="dot" style="background-color: #E22D54; "></div>
                                        <h6 style="padding-left: 10px">Leave</h6>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #222944">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                <div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $employee->user->profile_img }}" alt="profile image" id="img">
                                                    </div>
                                                    <div style="display: inline-block; padding-left: 10px">
                                                        <h5>
                                                            {{ $employee->user->f_name }} {{ $employee->user->l_name }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center">
                                                <div style="background-color: #4CF592; color: #222944; padding: 5px 5px 5px 5px; border-radius: 50%; width: 50px; height: 50px" class="btn">
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->user_id == $employee->user_id)
                                                            <h5 style="padding-top: 7px">
                                                                {{ $attendance->count }}
                                                            </h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center">
                                                <div style="background-color: #E22D54; color: #222944; padding: 5px 5px 5px 5px; border-radius: 50%; width: 50px; height: 50px" class="btn">
                                                    @foreach($leaves as $leave)
                                                        @if($leave->user_id == $employee->user_id)
                                                            <h5 style="padding-top: 7px">{{ $attendance->count }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <div style="text-align: center; background-color: #E3E7F5; padding: 5px 5px 5px 5px; width: 50px; height: 50px; border-radius: 50%" class="btn">
                                                    <div style="padding-top: 8px">
                                                        <a href="{{ route('attendancedetails', $employee->user_id) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
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

        </div>
    </div>

</div>

@endsection

{{-- nvmv --}}
