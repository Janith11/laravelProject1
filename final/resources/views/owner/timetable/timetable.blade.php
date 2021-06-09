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
        @if (count($errors) > 0)
            @foreach ($errors as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        @endif
    </div>

    <div class="row mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success" role="alert" style="width: 100%">
                {{ session('successmsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{-- card columns --}}
    <div class="row-mb-2" style="padding-top: 10px">

        <div class="card" style="width: 100%; border-radius: 10px">

            <div class="card-body">

                <h5 class="card-title" style="color: #222944; font-weight: bold">Time Slots</h5>

                <hr style="border: 0.5px solid #222944">

                <div class="card-columns">

                    @foreach ($timetable as $tbl)
                    <div class="card border-secondary" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #222944; font-weight: bold">{{ $tbl->day_name }}</h5>
                            <hr style="border: 0.3px solid #222944">
                            <div class="row">
                                @if(count($tbl->timeslots) == 0)
                                    <div class="alert alert-info" role="alert" style="width: 100%">
                                        <h5>You haven't create time any slots for {{ $tbl->day_name }} </h5>
                                    </div>
                                @else
                                    <h6 style="padding-left: 10px">time slots</h6>
                                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                                        <table class="table table-hover">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tbl->timeslots as $timeslot)
                                                    <tr>
                                                        <td>
                                                            {{ $timeslot->time_slot }}
                                                        </td>
                                                        <td>
                                                            {{ $timeslot->slot_name }}
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ route('deletetimeslot', $timeslot->id) }}" id="delete-form-{{ $timeslot->id }}" style="display: none">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                            <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $timeslot->id }}').submit();
                                                            }else{
                                                                event.preventDefault();
                                                            }" href="" class="btn btn-primary" style="background: transparent; border: none; background-repeat:no-repeat;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" onclick="createpanel('{{ $tbl->day_name }}')" style="font-size: 20px; border-radius: 50%; background-color: #E9E65A">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="row justify-content-center">
                                <div id="{{ $tbl->day_name }}" style="display: none; padding-top: 10px">
                                    <div class="card border-secondary" style="width: 100%;">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2" style="color: #222944">Add New Slot</h6>
                                            <form method="POST" action="{{ route('addtimeslot') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="id" name="date_id" value="{{ $tbl->id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Slot Name</label>
                                                    <input type="text" class="form-control" id="name" name="slot_name" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="monday">Start Time</label>
                                                    <input type="time" class="form-control" id="time" name="slot_time">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" style="color: white">Add Slot</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script>
        function createpanel(name) {
            var x = document.getElementById(name);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

</div>

@endsection
