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

    <div class="row justify-content-end">
        @if($total_session->total_session != $completed_session->completed_session)
            <div id="card" style="padding-right: 15px">
                <a class="btn btn-primary" type="button" style="color: white;" href="{{ route('studentpendingrequests') }}">Pending Request</a>
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
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div style="display: inline-block">
                                <h5 style="color: #060333; font-weight: bold">Your Progress</h5>
                            </div>
                            <div style="display: inline-block" class="float-right">
                                <a href="{{ route('history') }}">
                                    <i class="fa fa-history" aria-hidden="true" style="color: #42B3C5"></i>
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
                    var url = '{{ route("checkdate", ["date" => ":date"]) }}';
                    url = url.replace(':date', date);
                    document.location.href=url;
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

</script>

@endsection
