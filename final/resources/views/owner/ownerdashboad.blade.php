@extends('layouts.ownerapp')

<style>
    .iconbackground{
        margin: 5px;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .quickaccess{
        margin: 7px;
        border-radius: 5px;
        padding: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Dashboard</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex">
                                <div style="display: inline-block">
                                    <div class="iconbackground" style="background-color: #27FC78">
                                        <a href="{{ route('studentslist') }}">
                                            <i class="fas fa-user-graduate" style="font-size: 30px; color: white; padding-top: 15px; padding-left: 17px"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="display: inline-block; padding-left: 10px">
                                    <h1 style="color: #030A25">{{ $totalstudent }}</h1>
                                    <small>Total Students</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex">
                                <div style="display: inline-block">
                                    <div class="iconbackground" style="background-color: #070236">
                                        <a href="{{ route('instructors') }}">
                                            <i class="fas fa-user-secret" style="font-size: 30px; color: white; padding-top: 15px; padding-left: 17px"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="display: inline-block; padding-left: 10px">
                                    <h1 style="color: #030A25">{{ $totalinstructors }}</h1>
                                    <small>Total Instructors</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex">
                                <div style="display: inline-block">
                                    <div class="iconbackground" style="background-color: #FC203D">
                                        <a href="{{ route('ownershedulelist') }}">
                                            <i class="fas fa-list-alt" style="font-size: 30px; color: white; padding-top: 15px; padding-left: 15px"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="display: inline-block; padding-left: 10px">
                                    <h1 style="color: #030A25">{{ $totalshedules }}</h1>
                                    <small>Today Shedules</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex">
                                <div style="display: inline-block">
                                    <div class="iconbackground" style="background-color: #FF9E1F">
                                        <a href="{{ route('viewalert') }}">
                                            <i class="fa fa-paper-plane" style="font-size: 30px; color: white; padding-top: 15px; padding-left:13px"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="display: inline-block; padding-left: 10px">
                                    <h1 style="color: #030A25">{{ $totalrequests }}</h1>
                                    <small>Requests</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 style="color: #030A25">New Students (Last six Month)</h6>
                            </div>
                            <div style="height: 172px">
                                <canvas id="studentschart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 style="color: #070236; font-weight: bold">Quick Access</h5>
                            </div>
                            <div id="card" class="text-center">
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('calendar') }}">
                                        <img src="/uploadimages/other/ownerdashboard/medical-report.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('calendar') }}">
                                        <img src="/uploadimages/other/ownerdashboard/calendar.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('payments') }}">
                                        <img src="/uploadimages/other/ownerdashboard/credit-card.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('todayattendance') }}">
                                        <img src="/uploadimages/other/ownerdashboard/approve.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                            </div>
                            <div id="card" class="text-center">
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('addinstructor') }}">
                                        <img src="/uploadimages/other/ownerdashboard/lecturer.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('addstudent') }}">
                                        <img src="/uploadimages/other/ownerdashboard/student.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('createpost') }}">
                                        <img src="/uploadimages/other/ownerdashboard/poster.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                                <div style="display: inline-block" class="quickaccess">
                                    <a href="{{ route('timetable') }}">
                                        <img src="/uploadimages/other/ownerdashboard/timetable.png" alt="Add Shedule" style="width: 50px; height: auto">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-header text-center">
                    Invoice
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="card-title"><span class="text-success"><i class="fas fa-circle"></i></span> debit<span class="text-warning">&nbsp;&nbsp;<i class="fas fa-circle"></i></span>credit</h6>
                    </div>
                    <div style="width: 100%">
                        <canvas id="myChart2" style="width:100%;max-width:1000px; height: 300px;"></canvas>
                    </div>
                </div>
                <div class="card-footer text-center">
                    last year
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var labels = @json($months);
    var values = @json($students);

    var myChart = new Chart('studentschart',{
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'new students',
                backgroundColor: 'rgba(41, 241, 195, 0.2)',
                borderColor: 'rgba(42, 187, 155, 1)',
                data: values,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            }
        }
    });

    var mony = @json($income);
    var expence = @json($expences);
    var xValues = @json($monymonths);

    new Chart("myChart2", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: mony,
                borderColor: "green",
                backgroundColor: 'rgba(41, 241, 195, 0.2)',
                },{
                data: expence,
                borderColor: "rgba(128,0,128, 1)",
                backgroundColor: 'rgba(128,0,128, 0.2)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            }
        }
    });

    $(document).ready(function(){
        $('aside ul .dashboard').css('border-left', '5px solid #00bcd4');
    })

</script>

@endsection
