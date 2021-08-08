@extends('layouts.student')

@section('content')

<style>

    #card{
        padding: 10px;
    }

    .card{
        border-radius: 10px;
        border: 0px !important;
    }

    .card-body{
        border-radius: 10px;
    }

    @keyframes move_wave {
        0% {
            transform: translateX(0) translateZ(0) scaleY(1)
        }
        50% {
            transform: translateX(-25%) translateZ(0) scaleY(0.55)
        }
        100% {
            transform: translateX(-50%) translateZ(0) scaleY(1)
        }
    }

    .waveWrapper {
        overflow: hidden;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        margin: auto;
        z-index:-1
    }

    .waveWrapperInner {
        position: absolute;
        width: 100%;
        overflow: hidden;
        height: 100%;
        bottom: -1px;
        background-image: linear-gradient(to top, #86377b 20%, #27273c 80%);
    }

.bgTop {
    z-index: 15;
    opacity: 0.5;
}
.bgMiddle {
    z-index: 10;
    opacity: 0.75;
}
.bgBottom {
    z-index: 5;
}
.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}
.waveTop {
    background-size: 50% 100px;
}
.waveAnimation .waveTop {
  animation: move-wave 3s;
   -webkit-animation: move-wave 3s;
   -webkit-animation-delay: 1s;
   animation-delay: 1s;
}
.waveMiddle {
    background-size: 50% 120px;
}
.waveAnimation .waveMiddle {
    animation: move_wave 10s linear infinite;
}
.waveBottom {
    background-size: 50% 100px;
}
.waveAnimation .waveBottom {
    animation: move_wave 15s linear infinite;
}
#countdown{
       background-color: #222944;
       color: #F5F23A;
       font-weight: bold;
       font-family: 'Open Sans Condensed', sans-serif;
       text-align: center;
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
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px; color:white"> / Pending Request</a>
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

    <div id="card">
        <div class="card">
            <div class="card-body">
                <h5 style="color: #222944; font-weight: bold">Pending requests</h5>
                <hr style="border-top: 1px solid #222944">
                @if(count($shedules) == 0)
                    <div class="alert alert-info" role="alert">
                        <h5>No any pending requests</h5>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table" id="pendingrequests">
                            <thead class="thead-dark">
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Session</th>
                                <th class="text-center">D : H : M : S</th>
                                <th class="text-center">Session ID</th>
                            </thead>
                            <tbody>
                                @foreach($shedules as $shedule)
                                    @php
                                        $count = 1;
                                        echo "<tr><td class='text-center'><div style='background-color:rgb(25, 12, 59); color:white; padding:5x; border-radius: 5px'>$count</div></td><td>$shedule->date</td><td>$shedule->time</td><td>$shedule->lesson_type</td><td  id='countdown'></td><td class='text-center'>$shedule->id</td></tr>";
                                        $count += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

<script>

    var table = document.getElementById("pendingrequests");
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
            countDown.innerHTML = (days + " : "+ hours + " : "
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
