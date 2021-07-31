@extends('layouts.ownerapp')

@section('content')

<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 46px;
      height: 20px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 12px;
      width: 12px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
        <a href="{{ route('calendar') }}" style="padding-top: 6px; padding-left: 10px"> /  Calendar</a>
    </div>

    <div class="row mb-2">
        @if(session('errormessage'))
            <div class="alert alert-danger" role="alert" style="width: 100%">
                {{ session('errormessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row mb-2" style="padding-top: 10px">
        <div class="col-sm-3">
            <div class="card" style="width: 100%; border-radius: 10px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('calendar') }}" type="button" class="btn" style="background-color: lightgray; border: none; border-radius: 50%">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-calendar-event" viewBox="0 0 16 16" >
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <h5 style=" padding-left: 10px; padding-top: 7px; color: #222944">{{ $date }}</h5>
                            <small style=" padding-left: 10px;">your choose date</small>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-top: 10px; padding-bottom: 10px">
                <div class="card" style="border-radius: 10px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Already Alocated Times</h5>
                        @if(count($shedules) == 0)
                            <h5>There are not any shedule on this day</h5>
                        @else
                        <table class="table">
                            <tbody>
                                @foreach ($shedules as $shedule)
                                <tr>
                                    <td>
                                        <h5>{{ $shedule->time }}</h5>
                                    </td>
                                    <td style="text-align: center">
                                        <h5 style="background-color: #4B053F; color: white; border-radius: 2px">{{ $shedule->sheduled_students_count }}</h5>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card" style="width: 100%; border-radius: 10px">
                <div class="card-body">
                    <h5 class="card-title" style="color: #222944; font-weight: bold">Choose Time Slot</h5>
                    <hr style="border: 0.5px solid #222944">
                    <div class="row">
                        <div class="col-sm-6">
                            @foreach ($timeslotscount as $slotcount)
                            <form action="{{ route('setsheduletime') }}" method="POST">
                                @csrf
                                @if ($slotcount->timeslots_count == 0)
                                    <h5 style="color: #222944">You have not define any time slot for {{ $slotcount->day_name }}, <a href="{{ route('timetable') }}">create</a></h5>
                                @else
                                    @foreach ($timeslots as $timeslot)
                                        <h5 style="color: #222944">Choose time slots on {{ $timeslot->day_name }} </h5>
                                        <table class="table table-hover">
                                            <tbody>
                                                @foreach ($timeslot->timeslots as $time)
                                                <tr>
                                                    <th>{{ $time->slot_name }}</th>
                                                    <td>{{ $time->time_slot }}</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="slottime[]" id="radios" value="{{ $time->time_slot }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <h5 style="color: #222944; padding-right: 10px">Define Custome Slot</h5>
                                <label class="switch">
                                    <input type="checkbox" id="customslot" name="slotdivider" onclick="customeslot()">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="row">
                                <div id="custome_slot" >
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="date" name="date" value="{{ $date }}" hidden>
                                    </div>
                                    <div class="form-group">
                                          <label for="time">Time</label>
                                          <input type="time" name="custometime" class="form-control" id="custometime" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <button class="btn btn-primary" type="submit">Confirm Time Slot</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function customeslot() {
            var checkBox = document.getElementById("customslot");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                document.getElementById('custometime').disabled = false;
                $('input[name="slottime"]').attr('disabled', 'disabled');
            } else {
                document.getElementById('custometime').disabled = true;
                $('input[name="slottime"]').removeAttr('disabled');
            }
        }
    </script>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
