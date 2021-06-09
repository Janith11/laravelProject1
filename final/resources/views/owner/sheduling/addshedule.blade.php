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
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert" style="width: 100%">
                {{ session('errormsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row mb-2">
        <div class="card" style="width: 100%; border-radius: 10px">
            <div class="card-header">
                <div class="row justify-content-md-center">
                    <div style="height: 15px; width: 15px; background-color: #90EE90; border-radius: 50%; display: inline-block;padding-left: 10px;"></div>
                    <h6 style="padding-left: 10px; padding-right: 10px">Upcomming</h6>
                    <div style="height: 15px; width: 15px; background-color: #3853EC; border-radius: 50%; display: inline-block;padding-left: 10px"></div>
                    <h6 style="padding-left: 10px; padding-right: 10px">Complete</h6>
                    <div style="height: 15px; width: 15px; background-color: #FF6D68; border-radius: 50%; display: inline-block;padding-left: 10px"></div>
                    <h6 style="padding-left: 10px; padding-right: 10px">Uncomplete</h6>
                </div>
            </div>
            <div class="card-body">
                <div id='calendar'></div>
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
                    date = info.dateStr;
                    $(document).ready(function(){
                        var url = '{{ route("checkinput", ["date" => ":date"]) }}';
                        url = url.replace(':date', date);
                        document.location.href=url;
                    });
                },
                events: "{{ route('allevents') }}",
            });
            calendar.render();
        });

    </script>

</div>
@endsection
