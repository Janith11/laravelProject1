@extends('layouts.student')

@section('content')

<style>

    #countdown{
       background-color: #222944;
       color: #F5F23A;
       font-weight: bold;
       font-family: 'Open Sans Condensed', sans-serif;
       text-align: center;
    }

    .img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Scheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Schedule List</a>
        <a style="padding-top: 6px; padding-left: 10px;"> / Pending Request</a>
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
                                <th>Instructor</th>
                                <th>Vehicle Category</th>
                                <th>Transmission</th>
                                <th class="text-center">D : H : M : S</th>
                                <th class="text-center">Session ID</th>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($shedules as $shedule)
                                    <tr>
                                        <td class='text-center'>
                                            <div style='background-color:rgb(25, 12, 59); color:white; padding:5x; border-radius: 5px'>{{ $count }}</div>
                                        </td>
                                        <td>
                                            {{ $shedule->shedules->date }}
                                        </td>
                                        <td>
                                            {{ $shedule->shedules->time }}
                                        </td>
                                        <td>
                                            {{ ucwords($shedule->shedules->lesson_type) }}
                                        </td>
                                        <td>
                                            @foreach($instructors as $ins)
                                                @if($ins->user_id == $shedule->shedules->instructor)
                                                    <div>
                                                        <div style="display: inline-block; padding-right: 10px">
                                                            <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="img">
                                                        </div>
                                                        <div style="display: inline-block">
                                                            @php
                                                                if($ins->user->gender = 'male'){
                                                                    $name = 'Mr. '.$ins->user->f_name.' '.$ins->user->l_name;
                                                                }else{
                                                                    $name = 'Mrs. '.$ins->user->f_name.' '.$ins->user->l_name;
                                                                }
                                                            @endphp
                                                            {{ $name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($categories as $cat)
                                                @if($cat->category_code == $shedule->shedules->vahicle_category)
                                                    {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $shedule->shedules->transmission }}
                                        </td>
                                        <td id='countdown'></td>
                                        <td class='text-center'>
                                            {{ $shedule->shedule_id }}
                                        </td>
                                    </tr>
                                    @php
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
            var countDown = row.cells[7];
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

    $(document).ready(function(){
        $('aside ul .shedule').css('border-left', '5px solid #00bcd4');
    })

</script>

@endsection
