@extends('layouts.instructorapp')

@section('content')

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
        <a style="padding-top: 6px; padding-left: 10px"> / Request a leave</a>
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
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Submit Leave Request</h5>
                    <hr style="border-top: 1px solid #222944">

                    <div>
                        <div style="display: inline-block">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="leave_type" value="1" onchange="myfunction(1)" checked>
                                <label class="form-check-label">
                                    One Day
                                </label>
                            </div>
                        </div>
                        <div style="display: inline-block; padding-left: 10px">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="leave_type" value="2"  onchange="myfunction(2)">
                                <label class="form-check-label" >
                                    More
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="card">
                        <form method="POST" action="{{ route('requestleave') }}">
                            @csrf
                            <div class="form-group">
                                <label id="l_start_date">Date</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>

                            <div id="more" style="display: none">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Reson</label>
                                <textarea class="form-control" rows="3" name="reson"></textarea>
                            </div>

                            <div id="card">
                                <button type="submit" class="btn btn-primary">Submit request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    function myfunction(val){
        var more = document.getElementById('more');
        var label = document.getElementById('l_start_date');
        if (val == 1) {
            more.style.display = 'none';
            label.innerText = 'Date';
        }else{
            more.style.display = 'block';
            label.innerText = 'Start Date';
        }
    }

</script>

@endsection
