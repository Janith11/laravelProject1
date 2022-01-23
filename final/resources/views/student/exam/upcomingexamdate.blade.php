@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Upcoming Exam Dates</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>
   {{-- View exam dates  --}}
   
    <div class="card">
        <div class="card-body">
            <h6 style="color: #222944; font-weight: bold">You can choose a exam date</h6>
            <hr style="border: 0.5px solid #222944">
            <div class="table-responsive">
                <div id='calendar'></div>
            </div>
        </div>
    </div>   
</div>

{{-- model  --}}
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<script>

    var url = "{{ route('viewexamdates') }}";
        // url = url.replace(":id",user_id);

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                    // if(shedulingtype != 1){
                        
                    // }else{
                        // alert("This function blocked by owner");
                    // }
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
                // alert(myid);
                $(document).ready(function(){
                        var url = '{{ route("selecteventdate", ["id" => ":id"]) }}';
                        // url = url.replace(':date',fDate);
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
            $('aside ul .examresults').css('border-left', '5px solid #00bcd4');
        })
    </script>
@endsection

