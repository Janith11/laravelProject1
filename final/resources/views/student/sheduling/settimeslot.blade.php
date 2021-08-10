@extends('layouts.student')

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px; color:white"> / Select Time</a>
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5> Wooops ! Some input with errors</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <form action="{{ route('requestslot') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-4">

                <div id="card">
                    <div class="card" style="border-radius: 10px; border: 1px solid #FFD700 !important">
                        <div class="card-body" style="background-color: #080529 !important; border-radius: 10px; border: 1px solid #FFD700 !important">
                            <div>
                                <div style="display: inline-block; padding-right: 10px;;l">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#F13955" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block; vertical-align: middle">
                                    <h5 style="color: #FFD700; font-weight: bold; vertical-align: middle">Request a Special Time</h5>
                                </div>
                            </div>
                            <div class="form-group" id="card">
                                <input type="time" class="form-control" name="special_time">
                            </div>
                            <div id="card" class="text-center">
                                <button class="btn" type="submit" style="border-radius: 50px; background-color: #FFD700; color: #080529">Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-6">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div style="display: inline-block">
                                            <h5 style="color: #222944; font-weight: bold">Choosed Date</h5>
                                            <h5>{{ $select_date }}</h5>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" value="{{ $select_date }}" name="date" >
                                            </div>
                                        </div>
                                        <div style="display: inline-block;" class="float-right">
                                            <a href="{{ route('studentsheduling') }}" class="btn" type="button">
                                                <i class="fa fa-calendar" aria-hidden="true" style="float: left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color: #222944; font-weight: bold">Session Type</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sessiontype" id="practicle" value="practicle" checked>
                                        <label class="form-check-label" for="practicle">
                                            Practicle
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sessiontype" id="thoery" value="thoery">
                                        <label class="form-check-label" for="thoery">
                                            Theory
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold">@php
                                echo date('l', strtotime($select_date));
                            @endphp Time Table</h5>
                            <hr style="border-top: 1px solid #222944">
                            @if(count($time_table) == 0)
                                <div class="alert alert-info" role="alert">
                                    No any defined time slots on this day
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <th></th>
                                            <th>Slot Name</th>
                                            <th>Time</th>
                                            <th>Trainers</th>
                                        </thead>
                                        <tbody>
                                            @foreach($time_table as $time)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="timeslot" value="{{ $time->time_slot }}">
                                                        </div>
                                                    </td>
                                                    <td>{{ $time->slot_name }}</td>
                                                    <td>{{ $time->time_slot }}</td>
                                                    <td>
                                                        @foreach($final_counts as $key => $count)
                                                            @if($key == $time->time_slot)
                                                                <div>
                                                                    <h5 style="background-color: #12C74E; color: white; padding: 5px; display: inline; border-radius: 5px">
                                                                        {{ $count }}
                                                                    </h5>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div id="card">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Request</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
