@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 200px;
        height: auto;
        border-radius: 50%;
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
        background-color: #46E977;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('attendanceslist') }}"> / Attendances list</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Attendances Details</a>
    </div>

    <div class="row-mb-2">

        <div class="row">

            <div class="col-sm-3">
                @foreach($users as $user)
                    <div id="card" class="text-center">
                        <img src="/uploadimages/owner_profile/{{ $user->user->profile_img }}" alt="Profile Image" id="img">
                        <h5 style="color: #222944; font-weight: bold; padding-top: 10px">
                            {{ $user->user->f_name }} {{ $user->user->l_name }}
                        </h5>
                    </div>
                    @php
                        $user_id = $user->user->id;
                    @endphp


                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #1FDFDF !important">

                            <div>

                                <div style="display: inline-block">
                                    <h3 style="color: #222944; font-weight: bold">
                                        {{ $pending_leaves }}
                                    </h3>
                                    <small style="color: #222944; font-weight: bold">Peniding Request</small>
                                </div>

                                <div class="float-right" style="display: inline-block">
                                    <a href="{{ route('leaverequest') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-hourglass-split" viewBox="0 0 16 16" id="pending">
                                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                        </svg>
                                    </a>
                                    <script>
                                        var value = {{ $pending_leaves }};

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
                    </div>
                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #E71B4E">
                            <div>

                                <div style="display: inline-block">
                                    <h3 style="color: #222944; font-weight: bold">
                                        {{ $total_leaves }}
                                    </h3>
                                    <small style="color: #222944; font-weight: bold">Total leaves</small>
                                </div>

                                <div class="float-right" style="display: inline-block">
                                    <a href="{{ route('leavedetails',$user->user->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#222944" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="col-sm-9">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold">Attendance Calendar</h5>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    var user_id = '@php echo $user_id; @endphp';

    var url = "{{ route('instructorattendancedetails', ':id') }}";
    url = url.replace(":id",user_id);

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: {
                url: url
            },

        });
        calendar.render();
        calendar.setOption('height', 'auto');
    });

</script>

<script>
    $(document).ready(function(){
        $('aside ul .hrms').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
