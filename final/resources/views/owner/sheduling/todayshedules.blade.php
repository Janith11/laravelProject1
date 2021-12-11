@extends('layouts.ownerapp')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">

<style>
    td{
        color: #222944;
        font-size: 25px;
        text-align: center;
    }

    th{
        text-align: center;
    }

    #countdown{
        background-color: #222944;
        color: #F5F23A;
        font-weight: bold;
        font-family: 'Open Sans Condensed', sans-serif;
    }

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0rem;
        background-color: transparent;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Today Sessions List</a>
    </div>

    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success">
                <h5>{{ session('successmsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if (count($today_shedules) == 0)
            <div class="alert alert-info" role="alert">
                <h5>You don't have any shedules on today
                </h5>
            </div>
        @else
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="width: 100%" id="todayshedules" class="table">
                                <thead class="thead-dark">
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
                                            @if ($today_shedule->shedule_status == 1)
                                                <td>{{ $today_shedule->title }}</td>
                                                <td>{{ $today_shedule->date }}</td>
                                                <td>{{ $today_shedule->time }}</td>
                                                <td style="display: none">
                                                    {{ $today_shedule->date }} {{ $today_shedule->time }}
                                                </td>
                                                <td id="countdown"></td>
                                                <td>
                                                    <a href="{{ route('markascomplete', $today_shedule->id) }}" class="btn" type="button">Mark as Complete</a>
                                                </td>
                                            @elseif ($today_shedule->shedule_status == 2)
                                                <td style="background-color: #37D0FF">{{ $today_shedule->title }}</td>
                                                <td style="background-color: #37D0FF">{{ $today_shedule->date }}</td>
                                                <td style="background-color: #37D0FF">{{ $today_shedule->time }}</td>
                                                <td style="display: none">
                                                    {{ $today_shedule->date }} {{ $today_shedule->time }}
                                                </td>
                                                <td id="countdown"></td>
                                                <td style="background-color: #37D0FF">
                                                    <a href="{{ route('viewdetails', $today_shedule->id) }}" class="btn" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            @elseif ($today_shedule->shedule_status == 0)
                                                <td style="background-color: #EC0A4E">{{ $today_shedule->title }}</td>
                                                <td style="background-color: #EC0A4E">{{ $today_shedule->date }}</td>
                                                <td style="background-color: #EC0A4E">{{ $today_shedule->time }}</td>
                                                <td style="display: none">
                                                    {{ $today_shedule->date }} {{ $today_shedule->time }}
                                                </td>
                                                <td id="countdown"></td>
                                                <td style="background-color: #EC0A4E">
                                                    <a href="{{ route('viewdetails', $today_shedule->id) }}" class="btn" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
</script>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
