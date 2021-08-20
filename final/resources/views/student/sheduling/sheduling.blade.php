@extends('layouts.student')

@section('content')

<style>
    span#procent {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        font-size: 50px;
        transform: translate(-50%, -50%);
        color: #270C53;
    }

    span#procent::after {
        content: '%';
    }

    .canvas-wrap {
        position: relative;
        width: 200px;
        height: 200px;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
    </div>

    {{-- <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px">
                <a class="btn btn-primary" type="button" style="color: white;" href="">Pending Request</a>
            </div>
    </div> --}}

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('succesmsg'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('succesmsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5>Wooops!! some wrong with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row">

        <div class="col-sm-3">

            @if($total_session->total_session != $completed_session->completed_session)
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div style="display: inline-block">
                                    <h5 style="color: #060333; font-weight: bold">Pending Request</h5>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; vertical-align: middle">
                                    <a href="{{ route('studentpendingrequests') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#1EE939" class="bi bi-clock-history" viewBox="0 0 16 16">
                                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div style="display: inline-block">
                                <h5 style="color: #060333; font-weight: bold">Rejected Request</h5>
                            </div>
                            <div style="display: inline-block; padding-left: 10px; vertical-align: middle">
                                <a href="{{ route('rejectedshedules') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FC2A35" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                                        <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"/>
                                      </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div style="display: inline-block">
                                <h5 style="color: #060333; font-weight: bold">Your Progress</h5>
                            </div>
                            <div style="display: inline-block" class="float-right">
                                <a href="{{ route('history') }}">
                                    <i class="fa fa-history" aria-hidden="true" style="color: #42B3C5; font-size: 20px"></i>
                                </a>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #222944">
                        <div>
                            <div class="text-center">
                                <canvas id="canvas" width="180" height="180"></canvas>
                                <span id="procent" style="padding-top: 30px"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('studentcompletedshedules') }}" style="text-decoration: none !important">
                                <div style="background-color: #88004F; padding: 5px; border-radius: 5px;">
                                    <h6 style="color: #f2f5f5; margin-bottom: 0px !important; ">{{ $completed_session->completed_session }}/{{ $total_session->total_session }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            @if($total_session->total_session == $completed_session->completed_session)
                @if(count($requestdetails) > 0)
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                @foreach($requestdetails as $details)
                                    <div>
                                        <div style="display: inline-block">
                                            <h5 style="color: #41B883">You Already send Session Expand request </h5>
                                            <h6 style="color: #303133">Number of requested Sessions : {{ $details->number }}</h6>
                                            <h6 style="color: #303133">Choosed Categories</h6>
                                            <ul>
                                                @foreach($details->requestcategories as $category)
                                                    @foreach($categorydetails as $detail)
                                                        @if($category->category_code == $detail->category_code)
                                                            <li>{{ $detail->name }}</li>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div style="display: inline-block">
                                            <div class="float-left">
                                                {{-- <img src="/uploadimages/other/paper_rocket.jpg" alt="Paper-rocket" style="width: 20%; height: auto"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <form method="POST" action="{{ route('deleterequests', $details->id) }}" id="delete-form-{{ $details->id }}" style="display: none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $details->id }}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" href="" class="btn btn-danger" style="background-color: #FA1B39;">Cancel
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="/uploadimages/other/car.gif" alt="candidate" class="img-fluid" style="width: auto;height: 100px">
                            </div>
                            <h3 class="mt-3 mb-2 text-center text-success">Congratulations!</h3>

                            <p class="text-center"> <span class="text-info">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</span> ,you have been successfuly complete practicle and theory sessions.</p>
                            <p class="text-center"><b>Good Luck!</b></p>
                            <div id="card">
                                <div id="card" class="text-center">
                                    <a type="button" class="btn btn-success" style="color: white" href="{{ route('studentcomment') }}">Leave a comment</a>
                                </div>
                                <p class="text-center">If you want more training session please <span id="request" style="text-decoration: underline; color: #42B3C5; cursor: pointer;"><a href="{{ route('expandrequests') }}">request</a></span></p>
                                <div class="text-center" id="extrasessions" style="display: none">
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #FAD51B !important;">
                            <h5 style="color: #222944; font-weight: bold">Today Shedule</h5>
                            <hr style="border-top: 1px solid #222944">

                            @if(count($today_sessions) == 0)
                                <div class="alert alert-info" role="alert">
                                    <h6>No any session on this day</h6>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table" id="todaysessions">
                                        <thead style="display: none">
                                            <th>sdfg</th>
                                            <th>fgh</th>
                                            <th>gjhg</th>
                                            <th>gjhg</th>
                                            <th>gjfghj</th>
                                        </thead>
                                        @foreach($today_sessions as $session)
                                            <tr>
                                                <td>Session Number</td>
                                                <td style="display: none">{{ $session->date }} {{ $session->time }}</td>
                                                <td>{{ $session->time }}</td>
                                                <td>{{ $session->lesson_type }}</td>
                                                @if ($session->shedule_status == 2)
                                                    <td>Completed</td>
                                                @else
                                                    <td id="countdown"></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold">Shedule Calender</h5>
                            <hr style="border-top: 1px solid #222944">
                            <div class="text-center">
                                <div style="display: inline-block">
                                    <div style="background-color: #0FD8F3; width: 15px; height: 15px; border-radius: 50%"></div>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h6>Pending</h6>
                                </div>
                                <div style="display: inline-block">
                                    <div style="background-color: #35FF35; width: 15px; height: 15px; border-radius: 50%"></div>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h6>Active</h6>
                                </div>
                                <div style="display: inline-block">
                                    <div style="background-color: #03011F; width: 15px; height: 15px; border-radius: 50%"></div>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h6>Complete</h6>
                                </div>
                                <div style="display: inline-block">
                                    <div style="background-color: #FF2957; width: 15px; height: 15px; border-radius: 50%"></div>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h6>Cancel</h6>
                                </div>
                                <div style="display: inline-block">
                                    <div style="background-color: #FF891A; width: 15px; height: 15px; border-radius: 50%"></div>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h6>Incomplete</h6>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

</div>

<script>

    var user_id = '@php echo Auth::user()->id; @endphp';

    var shedulingtype = {{ $type }};

    var url = "{{ route('studentallshedules', ':id') }}";
    url = url.replace(":id",user_id);

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                    if(shedulingtype != 1){
                        var url = '{{ route("checkdate", ["date" => ":date"]) }}';
                        url = url.replace(':date', date);
                        document.location.href=url;
                    }else{
                        alert("This function blocked by owner");
                    }
                });
            },
            events: {
                url: url
            },
        });
        calendar.render();
        calendar.setOption('height', 'auto');
        calendar.setOption('width', 'auto');
    });

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
                c.strokeStyle = '#84E992';
                c.lineWidth = '10';
                c.stroke();

                c.beginPath();
                c.strokeStyle = '#009933';
                c.lineWidth = '10';
                c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
                c.stroke();
                if( deegres >= result ) clearInterval(acrInterval);
            }, fps);
        }
    };

    // script for request etra session
    // $('#request').click(function(){
    //     $('#extrasessions').toggle();
    // });
</script>

<script>

    var table = document.getElementById("todaysessions");
    var x = setInterval(
    function () {

        for (var i = 1, row; row = table.rows[i]; i++) {
            //iterate through rows
            //rows would be accessed using the "row" variable assigned in the for loop

            var endDate = row.cells[1];
            countDownDate = new Date(endDate.innerHTML.replace(/-/g, "/")).getTime();
            var countDown = row.cells[4];
            // Update the count down every 1 second

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element
            countDown.innerHTML = (hours + " : "
                + minutes + " : " + seconds);

            //If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                countDown.innerHTML = "Expired Shedule";
            }
        }
    }, 1000);

    $(document).ready(function(){
        $('aside ul .shedule').css('border-left', '5px solid #00bcd4');
    })

</script>

@endsection
