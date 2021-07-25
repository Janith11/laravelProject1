@extends('layouts.ownerapp')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--==================== CSS ==========-->
    {{-- @push('head') --}}
    <link rel="stylesheet" href="{{ asset('/digital_clock/css/styles.css') }}">
    {{-- @endpush --}}

<style>

    img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    #header{
        color: #222944;
        font-weight: bold;
    }

    iframe>h{
        color: #222944 !important;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Today Attendance</a>
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

    <div class="row-mb-2">
        @if (session('errormsg'))
            <div class="alert alert-danger">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row-mb-2">
        <div class="row">

            <div class="col-sm-3">
                <div id="card">
                    <div class="card" style="color: #ECECF3 !important">
                        <div class="card-body" style="color: #17BDB4 !important">
                            <section class="clock containerr">
                                <div class="clock__container grid">

                                    <div class="clock__content grid">

                                        <div class="clock__circle">
                                            <span class="clock__twelve"></span>
                                            <span class="clock__three"></span>
                                            <span class="clock__six"></span>
                                            <span class="clock__nine"></span>

                                            <div class="clock__rounder"></div>
                                            <div class="clock__hour" id="clock-hour"></div>
                                            <div class="clock__minutes" id="clock-minutes"></div>
                                            <div class="clock__seconds" id="clock-seconds"></div>

                                        </div>

                                        <div>
                                            <div class="clock__text">
                                                <div class="clock__text-hour" id="text-hour"></div>
                                                <div class="clock__text-minutes" id="text-minutes"></div>
                                                <div class="clock__text-ampm" id="text-ampm"></div>
                                            </div>

                                            <div class="clock__date">
                                                <!-- <span id="date-day-week"></span> -->
                                                <span id="date-day"></span>
                                                <span id="date-month"></span>
                                                <span id="date-year"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <script src="{{ asset('/digital_clock/js/main.js') }}"></script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">

                <div class="row">

                    <div class="col-sm-4">
                        <div id="card">
                            <div class="card">
                                <div class="card-body" style="border-left: 10px solid #3EB750">
                                    <h5 style="color: #222944; font-weight: bold; font-size: 30px">{{ $still_working }}</h5>
                                    <h6 style="color: #222944">Still working</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div id="card">
                            <div class="card">
                                <div class="card-body" style="border-left: 10px solid #FCC134">
                                    <h5 style="color: #222944; font-weight: bold; font-size: 30px;">{{ $todayleaves }}</h5>
                                    <h6 style="color: #222944">Leaves</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div id="card">
                            <div class="card">
                                <div class="card-body" style="border-left: 10px solid #E22A38">
                                    <h5 style="color: #222944; font-weight: bold; font-size: 30px">{{ $not_attend }}</h5>
                                    <h6 style="color: #222944">Pending</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold;">Today</h5>
                            <hr style="border-top: 1px solid #222944">
                            {{-- @if(count($instructors) == 0)
                                <h5>All instructors are leave on today !!</h5>
                            @else --}}
                            <div class="table-responsive">
                                <table class="table">
                                    @foreach($instructors as $instructor)
                                        <tr id="details">

                                            <td>
                                                <div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="profile image">
                                                    </div>
                                                    <div style="display: inline-block; padding-left: 10px">
                                                        <h5>
                                                            {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <h5 style="color: #222944" id="time"></h5>
                                            </td>

                                            <td style="padding-left: 10px; vertical-align: middle">
                                                <div>
                                                    @foreach($instructor->employeeatendancess as $attend)
                                                        @if ($attend->status == 0)
                                                            <div style="display: inline-block">
                                                                <button class="btn btn-success"  style="background-color: #F7D000; border: none; color: #222944;" id="checkin">CheckIn</button>
                                                            </div>
                                                            <div style="display: inline-block">
                                                                <button class="btn btn-danger" type="button" style="background-color: #222944; color: white; border: none" id="absent">Absent</button>
                                                            </div>
                                                        @elseif ($attend->status == 2)
                                                            <div style="display: inline-block">
                                                                <button class="btn btn-danger" id="checkout">CheckOut</button>
                                                            </div>
                                                            <script>
                                                                var element = document.getElementById('details');
                                                                element.style.borderLeft = '5px solid #3EB750';
                                                                document.getElementById('time').innerText = "{{ $attend->present_time }}";
                                                            </script>
                                                        @elseif ($attend->status == 1)
                                                            <h5 style="color: #222944">Attend</h5>
                                                            <script>
                                                                var element = document.getElementById('details');
                                                                element.style.borderLeft = '5px solid #222944';
                                                                var start = "{{ $attend->present_time }}";
                                                                var end = "{{ $attend->leave_time }}";
                                                                var timestart = new Date("01/01/2021 "+start).getTime();
                                                                var timeend = new Date("01/01/2021 "+end).getTime();
                                                                var diff = (timeend - timestart)/ 60 /60 / 1000;
                                                                document.getElementById('time').innerText = diff+" hours worked";
                                                            </script>
                                                        @else
                                                            <h5 style="color: #E22A38">Leave</h5>
                                                            <script>
                                                                var element = document.getElementById('details');
                                                                element.style.borderLeft = '5px solid #E22A38';
                                                            </script>
                                                        @endif
                                                    @endforeach

                                                </div>

                                            </td>
                                        </tr>

                                        <tr id="input_checkin" style="display: none">

                                            <td>
                                                <h5 style="color: #222944">Set Checkin Time</h5>
                                            </td>

                                            <td>
                                                <form action="{{ route('savecheckin') }}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <div style="display: inline-block">
                                                            <input type="text" style="display: none" value="{{ $instructor->user->id }}" name="user_id">
                                                            @foreach($instructor->employeeatendancess as $attend)
                                                                <input type="text" style="display: none" value="{{ $attend->id }}" name="id">
                                                            @endforeach
                                                        </div>

                                                        <div style="display: inline-block">
                                                            <input type="time" name="checkin_time">
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <button class="btn btn-success" type="submit">Set</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>

                                        </tr>

                                        <tr id="input_checkout" style="display: none">

                                            <td>
                                                <h5 style="color: #222944">Set Checkout Time</h5>
                                            </td>

                                            <td>
                                                <form action="{{ route('savecheckout') }}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <div style="display: inline-block">
                                                            <input type="text" style="display: none" value="{{ $instructor->user->id }}" name="user_id">
                                                        </div>
                                                        @foreach($instructor->employeeatendancess as $attend)
                                                            <input type="text" style="display: none" value="{{ $attend->present_time }}" name="present_time">
                                                            <input type="text" style="display: none" value="{{ $attend->id }}" name="id">
                                                        @endforeach
                                                        <div style="display: inline-block">
                                                            <input type="time" name="checkout_time">
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <button class="btn btn-success" type="submit">Set</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>

                                        <tr style="display: none">
                                            <td>
                                                <form action="{{ route('saveabsent') }}" method="POST" id="saveabsent">
                                                    @csrf
                                                    @foreach($instructor->employeeatendancess as $attend)
                                                        <input type="text" style="display: none" value="{{ $attend->id }}" name="id">
                                                    @endforeach
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>

                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('#input_checkout').hide();
        $('#input_checkin').hide();
    });

    $('#checkin').click(function(){
        $('#input_checkin').toggle();
    });

    $('#checkout').click(function(){
        $('#input_checkout').toggle();
    });

    $('#absent').click(function(){
        $('#saveabsent').submit();
    });

</script>

@endsection
