@extends('layouts.ownerapp')

@section('content')
<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> > Shedule List</a>
    </div>

    <div class="row mb-2">
        <div class="col">
            <h4>Your calender</h4>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>


  <!-- Modal -->
    <div class="modal fade" id="settimemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #222944">Set Start Time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" id="gettime">
                        <input type="time" name="time" id="time" value="00:00">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="check()">Set Time</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                dateClick: function(info) {
                    // alert('Date: ' + info.dateStr);
                    // alert('Resource ID: ' + info.resource.id);
                    // get selected date
                    date = info.dateStr;
                    $(document).ready(function(){
                        $("#settimemodal").modal();
                    });
                }
            });
            calendar.render();
        });

        function check(){
            var modal = document.getElementById('exampleModalCenter');
            var time = document.getElementById('time').value;
            if(time != '00:00'){
                var url = '{{ route("checkinput", ["date" => ":date", "time" => ":time"]) }}';
                url = url.replace(':date', date);
                url = url.replace(':time', time);
                document.location.href=url;

                $('#exampleModalCenter').modal('hide');
            }
        }

    </script>

</div>
@endsection
