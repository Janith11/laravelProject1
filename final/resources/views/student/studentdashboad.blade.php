@extends('layouts.student')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Georama&display=swap" rel="stylesheet">

<style>

    #card{
        padding: 10px;
    }

    .card{
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Georama', sans-serif;
    }

    #img{
        width: 50px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }

    #profileimg{
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    /* style for progress bar */
    span#procent {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        font-size: 50px;
        transform: translate(-50%, -50%);
        color: #164463;
    }

    span#procent::after {
        content: '%';
    }

    .canvas-wrap {
        position: relative;
        width: 200px;
        height: 200px;
        /* left: 50% !important;
        top: 50% !important;
        margin-right: -50% !important;
        transform: translate(-50%, -50%) !important; */
        /* transform: translate(-50%, -50%); */
    }

    /* scrollbar style */
    .notices {
        height: 250px;
        overflow-y: scroll;
    }

        /* width */
    .notices::-webkit-scrollbar {
        width: 10px;
    }

        /* Track */
    .notices::-webkit-scrollbar-track {
        background: #BBE1EC;
        border-radius: 10px;
    }

        /* Handle */
    .notices::-webkit-scrollbar-thumb {
        background: rgb(5, 17, 51);
        border-radius: 10px;
    }

        /* Handle on hover */
    .notices::-webkit-scrollbar-thumb:hover {
        background: rgb(5, 17, 51);
        border-radius: 10px;
    }

    .bot{
        width: auto;
        height: 50px;
        margin-left: 12px;
        margin-top: -3px;
    }

</style>

<div class="container" >

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Dashboard</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>

    <div class="row-mb-2" style="display: none" id="bot">
        <div class="alert alert-info" role="alert" id="alert">
            <div style="display: inline-block; width: 60px; height: 60px; border-radius: 50%; background-color: #FFFFFF; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <img src="/uploadimages/other/chatbot.png" alt="" class="bot">
            </div>
            <div style="display: inline-block; padding-left: 20px">
                <h5>{!! $botmsg !!}</h5>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-4">
                @foreach($student as $s)
                    <div id="card">
                        <div class="text-center">
                            <div id="card">
                                <img src="/uploadimages/students_profiles/{{ $s->user->profile_img }}" alt="Profile Image" id="profileimg">
                            </div>
                            <div id="card">
                                <h3 style="font-family: 'Georama', sans-serif; color: #3ABD7B">{{ $s->user->f_name }} {{ $s->user->m_name }}</h3>
                                <p class="mt-1 mb-0" style="font-family: 'Georama', sans-serif;">{{ $s->user->email }}</p>
                                <p class="mt-1 mb-0" style="font-family: 'Georama', sans-serif;">Group No.: {{ $s->group_number}}</p>
                            </div>
                            <div id="card">
                                <a href="{{ route('studentprofile') }}" style="text-decoration: none;">
                                    <div style="background-color: #F3EB79; border-radius: 50%; width: 50px; height: 50px; display: inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#CA113F" class="bi bi-pencil-square" viewBox="0 0 16 16" style="margin-top: 25%">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </div>
                                </a>
                                <a href="" style="text-decoration: none">
                                    <div style="background-color: #57F8A8; border-radius: 50%; width: 50px; height: 50px; display: inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0C163F" class="bi bi-calendar3" viewBox="0 0 16 16" style="margin-top: 25%">
                                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                    </div>
                                </a>
                                <a style="text-decoration: none; cursor: pointer;" id="botbtn">
                                    <div style="background-color: #7A7A7A; border-radius: 50%; width: 50px; height: 50px; display: inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFFFFF" class="bi bi-question" viewBox="0 0 16 16"  style="margin-top: 25%">
                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div style="background-color: #FFEAEA; border-radius: 50%; width: 50px; height: 50px; display: inline-block">
                                        <i class="fa fa-car" aria-hidden="true" style="color: #FC950F; font-size: 40px; padding-left: 5px; padding-top: 5px"></i>
                                    </div>
                                    <div style="display: inline-block; padding-left: 10px;">
                                        <h5 style="color: #222944; font-weight: bold; ">Training Categories</h5>
                                    </div>
                                </div>
                                <div style="padding-left: 10px" id="card">
                                    @foreach ($studentcategory as $category)
                                        @if ($category->category == 'A')
                                            <h6 style="padding-left: 10px">Bike</h6>
                                        @elseif (($category->category == 'B1'))
                                            <h6 style="padding-left: 10px">Three Weel</h6>
                                        @elseif (($category->category == 'C1'))
                                            <h6 style="padding-left: 10px">Car, Van, Dual Purpose Vehicle</h6>
                                        @elseif (($category->category == 'C'))
                                            <h6 style="padding-left: 10px">Heavy Vehicle</h6>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div style="display: inline-block; background-color: #CA113F; border-radius: 50px; width: 50px; height: 50px">
                                            <i class="fa fa-bell" aria-hidden="true" style="margin: 5px; font-size: 30px; padding-top: 6px; padding-left: 7px; color: white"></i>
                                        </div>
                                        <div style="display: inline-block">
                                            <h5 style="color: #222944; font-weight: bold">Today Session</h5>
                                            <hr style="border-top: 1px solid #24053D">
                                        </div>
                                        <div style="display: inline-block" class="float-right">
                                            <h6 style="color: #24053D">Total Session : {{ $session_count }}</h6>
                                        </div>
                                    </div>
                                    <div id="card" class="table-responsive">
                                        @if(count($todayshedules) == 0)
                                            <h5 style="color: #FC950F; font-weight: bold">No any sessions on this day !!</h5>
                                        @else
                                            <table class="table">
                                                @foreach ($todayshedules as $shedule)
                                                    <tr>
                                                        <td style="border-left: 3px solid #3ABD7B">
                                                            <h5 style="color: #24053D; font-weight: bold">{{ $session_count + 1 }}</h5>
                                                        </td>
                                                        <td>
                                                            <h5>{{ $shedule->lesson_type }}</h5>
                                                        </td>
                                                        <td>
                                                            <h5>{{ $shedule->time }}</h5>
                                                        </td>
                                                        <td>
                                                            @if($shedule->shedule_status == 1)
                                                                <h5 style="color: #3ABD7B; font-weight: bold">Pending</h5>
                                                            @elseif($shedule->shedule_status == 2)
                                                                <h5 style="color: #24053D; font-weight: bold">Complete</h5>
                                                            @elseif($shedule->shedule_status == 3)
                                                                <h5 style="color: #FC950F; font-weight: bold">Incomplete</h5>
                                                            @elseif($shedule->shedule_status == 0)
                                                                <h5 style="color: #CA113F; font-weight: bold">Cancel</h5>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div id="card">
                            <div class="card">
                                <div class="card-body" style="height: 280px">
                                    <div class="text-center">
                                        <h5 style="color: #222944; font-weight: bold">Your Progress</h5>
                                        <canvas id="canvas" width="150" height="150" style="padding-top: 25px"></canvas>
                                        <span id="procent" style="padding-top: 30px; font-size: 30px"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 style="color: #222944; font-weight: bold">Attendance</h5>
                                        <canvas id="myChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div style="display: inline-block; border-radius: 50px; width: 50px; height: 50px; background-color: #FC950F">
                                            <i class="fa fa-bullhorn" aria-hidden="true" style="margin: 5px; font-size: 30px; padding-top: 6px; padding-left: 3px; color: #24053D"></i>
                                        </div>
                                        <div style="display: inline-block; padding-left: 10px">
                                            <h5 style="color: #CA113F; font-weight: bold">Notices</h5>
                                            <hr style="border-top: 1px solid #24053D">
                                        </div>
                                    </div>
                                    <div class="notices">
                                        @foreach ($posts as $post)
                                            <div class="card mb-1">
                                                <div class="card-header" style="background-color: #222944 !important; color: white; border-radius: 10px 10px 0px 0px">
                                                    <div>
                                                        <div style="display: inline-block">
                                                            <img class="rounded-circle" src="/uploadimages/owner_profile/{{ $post->user->profile_img }}" alt="profile image" id="img">
                                                        </div>
                                                        <div style="display: inline-block;padding-left: 10px">
                                                            <h5> {{ $post->user->f_name }} {{ $post->user->l_name }} <small>
                                                                    @if($post->user->role_id == 1)
                                                                        ( owner )
                                                                    @else
                                                                        ( instructor )
                                                                    @endif
                                                                </small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body" style="color: black">
                                                    <div id="post">{!! $post->message !!}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="card">
                            <div class="card">
                                <div class="card-body" style="height: 365px !important">
                                    <div>
                                        <div style="background-color: #739AD4; border-radius: 50%; width: 50px; height: 50px; display: inline-block">
                                            <div style="vertical-align: middle; padding-left: 12px; padding-top: 13px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0A146D" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div style="display: inline-block; padding-left: 10px">
                                            <h5 style="color: #222944; font-weight: bold">Payment</h5>
                                            <hr style="border-top: 1px solid #24053D">
                                        </div>
                                    </div>
                                    <div id="card" class="row">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 style="color: #3ABD7B">Paid Amount</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>Rs. {{ $s->paid_amount }}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 style="color: #24053D">Total Amount</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>Rs. {{ $s->total_fee }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

    <script>
        // script for progressbar
        window.onload = function() {

            var progress = {{ $progress }};

            var can = document.getElementById('canvas'),
                spanProcent = document.getElementById('procent'),
                c = can.getContext('2d');

            var posX = can.width / 2,
                posY = can.height / 2,
                fps = 1000 / 200,
                procent = 0,
                oneProcent = 360 / 100,
                result = oneProcent * progress;

            c.lineCap = 'round';
            arcMove();

            function arcMove(){
                var deegres = 0;
                var acrInterval = setInterval (function() {
                    deegres += 1;
                    c.clearRect( 0, 0, can.width, can.height );
                    procent = deegres / oneProcent;

                    spanProcent.innerHTML = procent.toFixed();

                    c.beginPath();
                    c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
                    c.strokeStyle = '#C9F3BE';
                    c.lineWidth = '10';
                    c.stroke();

                    c.beginPath();
                    c.strokeStyle = '#3CFA5C';
                    c.lineWidth = '10';
                    c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
                    c.stroke();
                    if( deegres >= result ) clearInterval(acrInterval);
                }, fps);
            }
        };

        // script for attendance graph
        var labels = @json($months);
        var present = @json($presents);
        var absent = @json($absents);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            responsive: true,
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Attend',
                    data: present,
                    backgroundColor: [
                        'rgba(41, 241, 195, 0.2)',
                    ],
                    borderColor: [
                        'rgba(42, 187, 155, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'Absent',
                    data: absent,
                    backgroundColor: [
                        'rgba(128,0,128, 0.2)',
                    ],
                    borderColor: [
                        'rgba(128,0,128, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                tooltips: {

                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                bodyFontColor: '#0E173B',
            }
        });

        $('#botbtn').click(function(){
            $('#bot').toggle();
        });

        $(document).ready(function(){
            $('aside ul .dashboard').css('border-left', '5px solid #00bcd4');
        })

    </script>

@endsection
