@extends('layouts.instructorapp')

@section('content')

<style>
    #card{
        padding-top: 10px;
    }

    .card{
        border-radius: 10px;
    }

    .card-body{
        border-radius: 10px;
    }

    #title{
        color: #222944;
    }

    #value{
        color: white;
    }

    #svg{
        padding-right: 20px;
        padding-left: 10px;
    }

    td{
        color: #222944;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Details</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Shedule Details</a>
    </div>

    <div class="row mb-2">
        @foreach($result as $shedule)
            <div class="col-sm-2">

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #B2D8D8 !important">
                            <div class="row">
                                <div id="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </div>
                                <h5 class="card-title" id="title">Name</h5>
                            </div>
                            <h5 id="value">{{ $shedule->title }}</h5>
                        </div>
                    </div>
                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #66B2B2 !important">
                            <div class="row">
                                <div id="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </div>
                                <h5 class="card-title" id="title">Date</h5>
                            </div>
                            <h5 id="value">{{ $shedule->date }}</h5>
                        </div>
                    </div>
                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #008080 !important">
                            <div class="row">
                                <div id="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    </svg>
                                </div>
                                <h5 class="card-title"  id="title">Time </h5>
                            </div>
                            <h5 id="value"> {{ $shedule->time }}</h5>
                        </div>
                    </div>
                </div>

                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #006666 !important">
                            <div class="row">
                                <div id="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </svg>
                                </div>
                                <h5 class="card-title" id="value">Status</h5>
                            </div>
                            @if ($shedule->shedule_status == 1)
                                <h5 style="color: #33DA3C">Active</h5>
                            @elseif($shedule->shedule_status == 0)
                                <h5 style="color: #FAEB1C">Canceled</h5>
                            @elseif($shedule->shedule_status == 2)
                                <h5 style="color: #78E9F1">Complete</h5>
                            @else
                                <h5 style="color: #E61717">Incomplete</h5>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-10">

                <div class="row">

                    <div class="col-sm-6">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div id="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                        </div>
                                        <h5 id="title">Instuctor</h5>
                                    </div>
                                    @foreach($instructor_details as $instructor)
                                        <h5>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="card">
                                    <div class="card">
                                        <div class="card-body" style="background-color: #F3EB3A !important">
                                            <div class="row ">
                                                <div id="svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                                    </svg>
                                                </div>
                                                <h5>Total Students</h5>
                                            </div>
                                            <h5 style="text-align: center">{{ count($students_details) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="card">
                                    <div class="card">
                                        <div class="card-body" style="background-color: #441225 !important">
                                            <h5 style="color: white">Response</h5>
                                            <h5 style="color: white; text-align: center">{{ $read_alert }}/{{ $total_alert }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div id="card">
                    <div class="card">
                        <div class="card-body"  style="background-color: #DFECEC !important">
                            <h5 id="title">Students List</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Read / Unread</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students_details as $student)
                                            <tr>
                                                <td>{{ $student->user->f_name }} {{ $student->user->l_name }}</td>
                                                <td>{{ $student->user->contact_number }}</td>
                                                <td>
                                                    @foreach($student->alertforstudents as $alert)
                                                        @if ($alert->alert_status == 0)
                                                            Unread
                                                        @else
                                                            Read
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
@endsection
