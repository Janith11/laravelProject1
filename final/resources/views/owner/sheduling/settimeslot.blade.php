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
        <a href="{{ route('owneraddshedule') }}" style="padding-top: 6px; padding-left: 10px"> >  Calendar</a>
    </div>

    <div class="row mb-2" style="padding-top: 10px">
        <div class="col-sm-3">
            <div class="col">
                <div class="card" style="width: 100%; border-radius: 10px">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title" style="color: #222944; font-weight: bold">Choose Time Slot</h5>
                            <hr style="border: 0.5px solid #222944">
                            <h5>Your Date : {{ $date }}</h5>
                        </div>
                        <div class="text-center">
                            <a type="button" class="btn btn-primary" href="{{ route('owneraddshedule') }}
                            ">Change Date</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card" style="width: 100%; border-radius: 10px">
                <div class="card-body">
                    <h5 class="card-title" style="color: #222944; font-weight: bold">Choose Time Slot</h5>
                    <hr style="border: 0.5px solid #222944">
                </h5>
            </div>
        </div>
    </div>

</div>
@endsection
