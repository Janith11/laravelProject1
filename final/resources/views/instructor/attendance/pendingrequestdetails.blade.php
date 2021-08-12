@extends('layouts.instructorapp')

@section('content')

<style>
    #countdown{
        background-color: #222944;
        color: #F5F23A;
        font-weight: bold;
        font-family: 'Open Sans Condensed', sans-serif;
        border-radius: 10px;
    }

    td{
        color: #222944;
        font-size: 20px;
        text-align: center;
        vertical-align: middle;
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
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('instructorattendancelist') }}"> / Attendance list</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Pending requests</a>
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <h5>Wooops !! some errors with your input !!</h5>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('errormsg'))
        <div class="alert alert-danger">
            {{ session('errormsg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('successmsg'))
        <div class="alert alert-danger">
            {{ session('successmsg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            @if(count($pending_requests) == 0)
                <div class="alert alert-info" role="alert">
                    <h5>No any pending requets</h5>
                </div>
            @else
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Pending Requests List</h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="table-responsive">
                        <table class="table" id="requests">
                            <thead class="thead-dark">
                                <th>Reson</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($pending_requests as $request)
                                    <tr id="row-{{ $request->id }}">
                                        <td>{{ $request->reson }}</td>
                                        <td>{{ $request->start_date }}</td>
                                        <td>{{ $request->end_date }}</td>
                                        <td id="countdown"></td>
                                        <td>
                                            <form method="POST" action="{{ route('cancel', $request->id) }}" id="delete-form-{{ $request->id }}" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button onclick="if(confirm('Are You Sure Want to Cancel this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $request->id }}').submit();
                                            }else{
                                                event.preventDefault();
                                            }" href="" class="btn btn-danger">Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <script>
                                        var id = @php $request->id; @endphp;
                                        var letters = '0123456789ABCDEF';
                                        var color = '#';
                                        for (var i = 0; i < 6; i++) {
                                            color += letters[Math.floor(Math.random() * 16)];
                                        }
                                        document.getElementsByTagName('tr'+id).style.borderLeft = '5px solid '+color;

                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>

<script>

    var table = document.getElementById("requests");

    var x = setInterval(
        function () {

            for (var i = 1, row; row = table.rows[i]; i++) {
                //iterate through rows
                //rows would be accessed using the "row" variable assigned in the for loop

                var endDate = row.cells[1];
                countDownDate = new Date(endDate.innerHTML.replace(/-/g, "/")).getTime();
                var countDown = row.cells[3];
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
                countDown.innerHTML = (days + " : " + hours + " : "
                    + minutes + " : " + seconds);

                //If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    countDown.innerHTML = "Expired Request";
                }
            }
        }, 1000
    );

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: 'focus',
        });
    });

    function cancel(id){
        var element = document.getElementById('cacel'+id);
        alert(element);
    }

    $(document).ready(function(){
        $('aside ul .attendance').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
