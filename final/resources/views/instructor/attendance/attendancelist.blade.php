@extends('layouts.instructorapp')

@section('content')

<style>
    .blink {
  -webkit-animation: blink 700ms infinite alternate;
  -moz-animation: blink 700ms infinite alternate;
  -o-animation: blink 700ms infinite alternate;
  animation: blink 700ms infinite alternate;
}

@-webkit-keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

@-o-keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

@-moz-keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

@keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

.fc .fc-toolbar {
    display: inline;
    justify-content: space-between;
    align-items: center;
}

#date{
    width: 40px;
}

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendance</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Attendance list</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px; padding-bottom: 10px">
                <a type="button" class="btn btn-primary" href="{{ route('instructorleaverequestdetails') }}" >Request Leave</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        @if (session('successmsg'))
            <div class="alert alert-success" style="padding-top: 10px">
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
            <div class="alert alert-success" style="padding-top: 10px">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">

        {{-- <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px">
                <div class="form-group">
                    <select class="form-control" onchange="stat()" id="stat">
                        <option value="0">This Month</option>
                        <option value="1">Last Month</option>
                        <option value="2">Last Six Month</option>
                        <option value="3">Last Year</option>
                    </select>
                </div>
            </div>
        </div> --}}

        <div class="row">

            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color:#21CBE9 !important;">
                            <div>
                                <div style="display: inline-block; vertical-align: middle; padding-left: 10px">
                                    <h4 style="color: #222944">{{ $pending_leave }}</h4>
                                    <small style="color: #222944">Pending Request</small>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; padding-top: 5px" class="float-right">
                                    <a href="{{ route('instructorpendingrequests') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-hourglass-split" viewBox="0 0 16 16" id="pending">
                                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                        </svg>
                                    </a>
                                    <script>
                                        var value = {{ $pending_leave }};

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
            </div>

            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #EB0B56">
                            <div>
                                <div style="display: inline-block; vertical-align: middle; padding-left: 10px">
                                    <h4 style="color: #222944"  id="leave">{{ $month_leave_count }}</h4>
                                    <small>leave days</small>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; padding-top: 5px" class="float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#EB0B56" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #1DCF4A">
                            <div>
                                <div style="display: inline-block; vertical-align: middle; padding-left: 10px">
                                    <h4 style="color: #222944">{{ $work_days }}</h4>
                                    <small>work days</small>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; padding-top: 5px" class="float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#1DCF4A" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #222944">
                            <div>
                                <div style="display: inline-block; vertical-align: middle; padding-left: 10px">
                                    <h4 style="color: #222944">{{ $total_days }}</h4>
                                    <small>Total days</small>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; padding-top: 5px" class="float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#222944" class="bi bi-calendar3" viewBox="0 0 16 16">
                                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row-mb-2">

        <div class="row">

            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold">Overview</h5>
                            <hr style="border-top: 1px solid #222944">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="height: 600px">
                            <div>
                                <div style="display: inline-block;">
                                    <h5 style="color: #EB0B56; font-weight: bold">Leave Details</h5>
                                </div>
                                <div style="display: inline-block; padding-left: 10px; padding-right: 10px;" class="float-right">
                                    <a href="{{ route('monthleavedetails') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <hr style="border-top: 1px solid #222944">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td style="text-align: center; width: auto">
                                                    @php
                                                        $date = substr($leave->start_date,-2);
                                                        if (($leave->end_date) != '') {
                                                            $to = substr($leave->end_date, -2);
                                                        }
                                                    @endphp
                                                    <div id="date" style="color: #222944;background-color: #E2E611; padding: 5px 5px 5px 5px; border-radius: 50px; vertical-align: middle; display: inline-block">
                                                        <h5 style="vertical-align: middle; font-weight: bold">{{ $date }}</h5>

                                                    </div>
                                                    @if(($leave->end_date) != '')
                                                        - <div id="date" style="color: #222944;background-color: #E2E611; padding: 5px 5px 5px 5px; border-radius: 50px; vertical-align: middle; display: inline-block">
                                                            <h5 style="vertical-align: middle; font-weight: bold">{{ $to }}</h5>

                                                        </div>
                                                    @endif
                                                </td>
                                                <td style="color: #222944">
                                                    {{ $leave->reson }}
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

        </div>

    </div>

</div>

<script>

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: "{{ route('instructorattendancecalendar') }}",
        });
        calendar.render();
        calendar.setOption('height', 'auto');
    });

</script>

<script>
    $('#stat').change(function(){

        var value = $(this).val();
        if(value){

        // alert('change'+value);
            $.ajax({
                type: "get",
                url: "{{ url('/leaverequestdetails/month') }}",
                successs:function(result){
                    if (result) {
                        alert('success');
                    }
                }
            });
        }
    });
</script>

@endsection
