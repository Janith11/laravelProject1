@extends('layouts.instructorapp')

@section('content')

<style>
    td{
        color: #222944;
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
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('monthleavedetails') }}"> / This Month Leave Details</a>
        <a style="padding-top: 6px; padding-left: 10px"> / All Leave Details</a>
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
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">All Leave Details</h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <th>Reson</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($leaves as $leave)
                                    <tr id="row-{{ $leave->id }}">
                                        <td>{{ $leave->reson }}</td>
                                        <td>{{ $leave->start_date }}</td>
                                        <td>{{ $leave->end_date }}</td>
                                        <td>
                                            @if($leave->status == 1)
                                                <h5 style="color: #1DCF4A">Active</h5>
                                            @elseif($leave->status == 1)
                                                <h5 style="color: #EB0B56">Cancel</h5>
                                            @else
                                                <h5 style="color: #EBDD19">Pending</h5>
                                            @endif
                                        </td>
                                    </tr>
                                    <script>
                                        var letters = '0123456789ABCDEF';
                                        var color = '#';
                                        for (var i = 0; i < 6; i++) {
                                            color += letters[Math.floor(Math.random() * 16)];
                                        }
                                        document.getElementById('row-{{ $leave->id }}').style.borderLeft = '15px solid '+color;

                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
