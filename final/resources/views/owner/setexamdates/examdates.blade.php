@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Exam Dates</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>


    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('categoryerror'))
            <div class="alert alert-danger">
                <h5>{{ session('categoryerror') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="col-mb-2">
        @if(count($errors) > 0)
            <div class="container">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card-body">
                <h5 style="color: #222944; font-weight: bold">Choose a date to add new exam date</h5>
                <hr style="border: 0.5px solid #222944">
                <div class="table-responsive">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var url = "{{ route('loadexamdates') }}";
        // url = url.replace(":id",user_id);

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                        var url = '{{ route("addexamdates", ["date" => ":date"]) }}';
                        url = url.replace(':date', date);
                        document.location.href=url;
                    
                });
            },
            eventClick: function(info) {
                var Stringdate = info.event.start;
                var date = new Date(Stringdate);
                var fDate =  date.getFullYear() + '-' + Number(date.getMonth() + 1) + '-' + date.getDate();
                var dateStrng  = fDate.toString();
                // alert(dateStrng);
                // alert(fDate);
                myid = info.event.id;
                $(document).ready(function(){
                        var url = '{{ route("specificexamevent", ["date" => ":date", "id" => ":id"]) }}';
                        url = url.replace(':date',fDate);
                        url = url.replace(':id',myid);
                        document.location.href=url;
                    
                });
            },
            events: {
                url: url
            },
      });
        calendar.render();
        calendar.setOption('height', 'auto');
        calendar.setOption('width', 'auto');
    });

  </script>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
