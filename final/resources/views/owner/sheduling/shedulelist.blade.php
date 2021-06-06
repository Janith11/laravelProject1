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
    </div>

    <div class="row mb-2">
        <div class="col">
            <a href="{{ route('owneraddshedule') }}" type="button" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <div class="row mb-2">
        @foreach ($shedules as $shedule)
        <div class="card">
            <div class="card-body">
                <h4>Shedule name : {{ $shedule->shedule_name }}</h4>
                <h4>Shedule Date : {{ $shedule->date }}</h4>
                <h4>Shedule Time : {{ $shedule->time }}</h4>
                <h4>Lession Type : {{ $shedule->lesson_type }}</h4>
                <h4>Instuctor name : {{ $shedule->instructor }}</h4>
                <h4>Students</h4>
                    <ul>
                    @foreach ($shedule->sheduledstudents as $student)
                        <li>{{ $student->student_id }}</li>
                    @endforeach
                    </ul>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
