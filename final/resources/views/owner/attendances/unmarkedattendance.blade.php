@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0rem;
        background-color: transparent;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Unmarked Attendance</a>
    </div>

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                <h5><strong>Wooops !!</strong>
                    {{ session('errormsg') }}
                </h5>
            </div>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Mark Late Attendance</h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Instructor</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($unmarked_attendances_list as $attendance)
                                    <tr>
                                        <form action="{{ route('saveunmarkedattendance') }}" method="POST">
                                            @csrf
                                            <td style="vertical-align: middle">
                                                <input type="text" value="{{ $attendance->id }}" name="row_id" style="display: none">
                                                <h5 style="color: #222944">{{ $attendance->date }}</h5>
                                            </td>
                                            <td>
                                                <div>
                                                    @foreach($instructors as $instructor)
                                                        @if($instructor->user->id == $attendance->user_id)
                                                        <div style="display: inline-block">
                                                            <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="profile image" id="img">
                                                        </div>
                                                        <div style="display: inline-block; padding-left: 10px">
                                                            <h5 style="color: #222944">
                                                                {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                            </h5>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" value="attend" checked onchange="display({{ $attendance->id }})">
                                                    <label class="form-check-label" style="color: #222944">
                                                        Attend
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" value="absent" onchange="hide({{ $attendance->id }})">
                                                    <label class="form-check-label" style="color: #222944">
                                                        Absent
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="float-right">
                                                    <div style="display: inline-block">
                                                        <div class="form-group">
                                                            <label style="color: #222944">CheckIn</label>
                                                            <input type="time" class="form-control" name="checkin" id="display-checkin-{{ $attendance->id }}">
                                                        </div>
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <div class="form-group">
                                                            <label style="color: #222944">CheckOut</label>
                                                            <input type="time" class="form-control" name="checkout" id="display-checkout-{{ $attendance->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <button class="btn btn-success" type="submit">Mark</button>
                                            </td>
                                        </form>
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

<script>
    function display(id){
        var checkin = document.getElementById('display-checkin-'+id).disabled = false;
        var checkout = document.getElementById('display-checkout-'+id).disabled = false;
    }
    function hide(id){
        var checkin = document.getElementById('display-checkin-'+id).disabled = true;
        var checkout = document.getElementById('display-checkout-'+id).disabled = true;
    }
</script>

@endsection
