@extends('layouts.instructorapp')

@section('content')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> --}}
    <link rel="stylesheet" href="{{ asset('secondtest/dist/simple-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('secondtest/assets/demo.css') }}">

<style>

     #countdown{
        background-color: #222944;
        color: #F5F23A;
        font-weight: bold;
        font-family: 'Open Sans Condensed', sans-serif;
    }
/*
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0rem;
        background-color: transparent;
    } */

     td{
        color: #222944;
        font-size: 20px;
        text-align: center;
        vertical-align: middle;
    }
/*
    th{
        text-align: center;
    } */

    .popover-body {
        padding: 0px;
        color: #212529;
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 0 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.125);
    }

    .fc .fc-toolbar {
        display:block !important;
        justify-content: space-between;
        align-items: center;
    }

    .fc th {
        text-align: center;
        font-size: 10px !important;
    }

    .fc .fc-toolbar-title {
        font-size: 20px !important;
        font-weight: bold !important;
        margin: 0;
    }

    .fc-daygrid-day{
        height: 10% !important;
    }

    td {
        color: #222944;
        font-size: 15px !important;
        text-align: center;
        vertical-align: middle;
    }

    table.fc-scrollgrid-sync-table tbody tr{
        height: 50px !important;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Dashboard</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div style="display: inline-block; padding-left: 10px">
                                    <h5 style="color: #222944; font-weight: bold">Today training list</h5>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <h5 style="color: #222944; font-weight: bold">Total : {{ count($today_shedules) }}</h5>
                                </div>
                            </div>
                            <hr style="color: #222944; border-top: 1px solid #222944">
                            <div class="table-responsive">
                                <table style="width: 100%" id="todayshedules" class="table">
                                    <thead class="thead-dark" style="display: none">
                                        <tr>
                                            <th>Shedule Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Time Left</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($today_shedules as $today_shedule)
                                            <tr>
                                                <td>{{ $today_shedule->title }}</td>
                                                <td>{{ $today_shedule->date }}</td>
                                                <td>{{ $today_shedule->time }}</td>
                                                <td style="display: none">
                                                    {{ $today_shedule->date }} {{ $today_shedule->time }}
                                                </td>
                                                <td id="countdown"></td>
                                                <td>
                                                    <a tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus"  data-placement="left"  data-content='<ul class="list-group"><li class="list-group-item list-group-item-action"><a href="{{ route('instructortodayshedulesdetails', $today_shedule->id ) }}" class="btn" type="button">details</a></li><li class="list-group-item list-group-item-action"><a class="btn" type="button" href="{{ route('reportattendance', $today_shedule->id ) }}">report attendance</a></li></ul>'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </a>
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

            <div class="col-sm-4">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div style="display: inline-block; padding-left: 10px">
                                    <h5 style="color: #222944; font-weight: bold">About Seven days</h5>
                                </div>
                                <div style="display: inline-block; padding-right: 10px">
                                    <a href="{{ route('instructorcalendar') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-calendar3" viewBox="0 0 16 16">
                                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #222944">
                            @if(count($instructor_shedules) == 0)
                                <div class="aler alert-info">
                                    Yo don't have any shedules in next seven days yet
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">time</th>
                                                <th scope="col">title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($instructor_shedules as $shedules)
                                                <tr>
                                                    <td>{{ $shedules->date }}</td>
                                                    <td>{{ $shedules->time }}</td>
                                                    <td>{{ $shedules->title }}</td>
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

        </div>
    </div>

    <div class="row-mb-2">
        {{-- <div id="card">
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div> --}}
    </div>

</div>

<script>

    var table = document.getElementById("todayshedules");

    var x = setInterval(
        function () {

            for (var i = 1, row; row = table.rows[i]; i++) {
                //iterate through rows
                //rows would be accessed using the "row" variable assigned in the for loop

                var endDate = row.cells[3];
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
                countDown.innerHTML = ( hours + " : "
                    + minutes + " : " + seconds);

                //If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    countDown.innerHTML = "Expired Shedule";
                }
            }
        }, 1000);

        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'focus',
            });
        });

</script>

{{-- scripts for calendar --}}
<script>

    var shedules = {{ $instructor_shedules }}

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        // dateClick: function(info) {
        //     date = info.dateStr;
        //     $(document).ready(function(){
        //         var url = '{{ route("checkinput", ["date" => ":date"]) }}';
        //         url = url.replace(':date', date);
        //         document.location.href=url;
        //     });
        // },
        events: shedules,
    });
    calendar.render();
    calendar.setOption('contentHeight', 'auto');
    calendar.setOption('height', 'auto');
    calendar.setOption('aspectRatio', 2);
});
</script>

@endsection
