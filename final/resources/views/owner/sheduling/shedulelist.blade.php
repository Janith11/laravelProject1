@extends('layouts.ownerapp')

@section('content')
<style>
    .popover-body {
        padding: 0px;
        color: #212529;
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 0 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.125);
    }

</style>

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

    <div class="row mb-2 justify-content-end">
        <div style="display: inline-block">
            <div style="display: inline-block">
                <select class="form-control" onchange="statistics_type()" id="stat_type">
                    <option value="lastmonth">Last Month</option>
                    <option value="sixmonth">Last Six Month</option>
                    <option value="year">Last Year</option>
                </select>
            </div>
            <div style="display: inline-block">
                <a href="{{ route('calendar') }}" type="button" class="btn btn-primary">Add New</a>
            </div>
            <div style="display: inline-block">
                <a type="button" class="btn btn-primary" href="{{ route('timetable') }}">Daily Time Table</a>
            </div>
        </div>
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

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #151B33 !important">
                            <h3 id="total" style="color: white">{{ count($totalshedules_lastmonth) }}</h3>
                            <small style="color: white">total</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #1BEC49 !important">
                            <h3 id="complete" style="color: #222944">{{ count($complateshedules_lastmonth) }}</h3>
                            <small style="color: #222944">complete</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #520505 !important">
                            <h3 id="cancel" style="color: white">{{ count($canceledshedules_lastmonth) }}</h3>
                            <small style="color: white">cancel</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="background-color: #E47C06 !important">
                            <h3 id="uncomplete" style="color: white">{{ count($uncompleteshedules_lastmonth) }}</h3>
                            <small style="color: white">incomplete</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-8">

                <div class="row">

                    <div class="col-sm-6">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div style="display: inline-block">
                                            <div style="padding-left: 20px; padding-right: 10px; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                </svg>
                                            </div>
                                            <div style="display: inline-block; ">
                                                <h3 style="margin-bottom: 3px">{{ $totalshedules }}</h3>
                                                <small>all shedules</small>
                                            </div>
                                        </div>
                                        <div style="padding-right: 10px; padding-top: 17px">
                                            <a href="{{ route('allshedules') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
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
                                    <div class="row justify-content-between">
                                        <div style="display: inline-block">
                                            <div style="padding-left: 20px; padding-right: 10px; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                    <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                </svg>
                                            </div>
                                            <div style="display: inline-block; ">
                                                <h3 style="margin-bottom: 3px">{{ $today_shedules }}</h3>
                                                <small>today shedules</small>
                                            </div>
                                        </div>
                                        <div style="padding-right: 10px; padding-top: 17px">
                                            <a href="{{ route('todayshedules') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-12">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div style="padding-left: 10px">
                                            <h5 style="color: #222944">On Next Seven days</h5>
                                        </div>
                                        <div style="padding-right: 10px">
                                            <h5>total: {{ count($next_shedules) }}</h5>
                                        </div>
                                    </div>
                                    <hr style="border: 0.5px solid #222944">
                                    @if (count($next_shedules) == 0)
                                        <h5>Yoou Dont have any Shedule in nexrt seven days</h5>
                                    @else
                                        @foreach ($next_shedules as $next_shedule)
                                            <div id="card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                {{ $next_shedule->title }}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                {{ $next_shedule->date }}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                {{ $next_shedule->time }}
                                                            </div>
                                                            <div class="col-sm-3 text-right">
                                                                <a tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus"  data-placement="left"  data-content='<ul class="list-group"><li  class="list-group-item list-group-item-action"><a href="{{ route('viewdetails', $next_shedule->id) }}" class="btn" type="button">details</a></li><li class="list-group-item list-group-item-action"><a class="btn" type="button" href="{{ route('cancel', $next_shedule->id) }}">cancel</a></li><li class="list-group-item list-group-item-action"><a class="btn" type="button">postpond</a></li></ul>'>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-sm-4">

                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="font-weight: bold; color: #222944">Statistics about</h5>
                            <h6 id="stat_title">last 30 days</h6>
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'focus',
            });
        });
    </script>

    <script>
        var xValues = ["Total", "Complete", "Cancel", "Incomplete"];
        var yValues = [{{ count($totalshedules_month) }}, {{ count($complateshedules_month) }}, {{ count($canceledshedules_month) }}, {{ count($uncompleteshedules_month) }}];
        var barColors = [
            "#201D52",
            "#1BEC49",
            "#520505",
            "#E47C06",
        ];

        new Chart("myChart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                }
            },
        });
    </script>

<script>

    function statistics_type(){

        var total = document.getElementById('total');
        var complete = document.getElementById('complete');
        var cancel = document.getElementById('cancel');
        var uncomplete = document.getElementById('uncomplete');

        var val = document.getElementById("stat_type").value;

        if(val == 'lastmonth') {

            total.innerHTML = "{{ count($totalshedules_lastmonth) }}";
            complete.innerHTML = "{{ count($complateshedules_lastmonth) }}";
            cancel.innerHTML = "{{ count($canceledshedules_lastmonth) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_lastmonth) }}";

        } else if( val == 'sixmonth') {

            total.innerHTML = "{{ count($totalshedules_sixmonth) }}";
            complete.innerHTML = "{{ count($complateshedules_sixmonth) }}";
            cancel.innerHTML = "{{ count($canceledshedules_sixmonth) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_sixmonth) }}";

        } else {

            total.innerHTML = "{{ count($totalshedules_year) }}";
            complete.innerHTML = "{{ count($complateshedules_year) }}";
            cancel.innerHTML = "{{ count($canceledshedules_year) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_year) }}";

        }
    }
</script>

</div>
@endsection
