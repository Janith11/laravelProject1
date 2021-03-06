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

    #modelbtn{
        text-decoration: none !important;
        margin-top: 10px !important;
    }

    #modelitem{
        padding: 10px;
        text-align: center;
    }

    /* scrollbar style */
    .nextsevendays {
        height: 300px;
        overflow-y: scroll;
    }

        /* width */
    .nextsevendays::-webkit-scrollbar {
        width: 10px;
    }

        /* Track */
    .nextsevendays::-webkit-scrollbar-track {
        background: #BBE1EC;
        border-radius: 10px;
    }

        /* Handle */
    .nextsevendays::-webkit-scrollbar-thumb {
        background: rgb(5, 17, 51);
        border-radius: 10px;
    }

        /* Handle on hover */
    .nextsevendays::-webkit-scrollbar-thumb:hover {
        background: rgb(5, 17, 51);
        border-radius: 10px;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Sessions List</a>
    </div>

    <div class="row mb-2 justify-content-end">
        <div style="display: inline-block">
            <div style="display: inline-block">
                @if($type == 1)
                    <a href="{{ route('owneraddschedule') }}" type="button" class="btn btn-primary">Add session</a>
                @endif
            </div>
            <div style="display: inline-block">
                <a type="button" class="btn btn-primary" href="{{ route('timetable') }}">Daily Time Table</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        @if($type != 1)
            <div class="alert alert-info" role="alert">
                <small>You have given access for students to request sessions, if you want to get schuduling access change your setting
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </small>
            </div>
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

    {{-- session count details --}}
    <div class="row-mb-2">
        <div class="card pt-1">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="d-inline-block pl-3">
                        <h5 class="pt-0" style="color: #03011F; font-weight: bold">Session count of <span id="stat_name">Last Month</span></h5>
                    </div>
                    <div class="d-inline-block pr-3">
                        <select class="form-control" onchange="statistics_type()" id="stat_type">
                            <option value="lastmonth">Last Month</option>
                            <option value="sixmonth">Last Six Month</option>
                            <option value="year">Last Year</option>
                        </select>
                    </div>
                </div>
                <hr style="border-top: 2px solid #03011F">
                <div class="row">
                    <div class="col-sm-3 pt-1">
                        <div class="card" style="border: 0px !important">
                            <div class="card-body" style="padding: 0px !important; border-left: 50px solid #35FF35">
                                <div class="d-inline-block">
                                    <div style="z-index: 10; position: relative; left: -35px; bottom: 18px">
                                        <i class="fa fa-archive text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </div>
                                </div>
                                <div class="d-inline-block p-1">
                                    <div>
                                        <h2 id="total" style="color: rgb(4, 1, 46); margin-bottom: 0px">{{ count($totalshedules_lastmonth) }}</h2>
                                    </div>
                                    <div>
                                        <small class="text-muted">Total</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-1">
                        <div class="card">
                            <div class="card-body" style="padding: 0px !important; border-left: 50px solid #03011F">
                                <div class="d-inline-block">
                                    <div style="z-index: 10; position: relative; left: -35px; bottom: 18px">
                                        <i class="fa fa-check-circle text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </div>
                                </div>
                                <div class="d-inline-block p-1">
                                    <div>
                                        <h2 id="complete" style="color: rgb(4, 1, 46);  margin-bottom: 0px">{{ count($complateshedules_lastmonth) }}</h2>
                                    </div>
                                    <div>
                                        <small class="text-muted">Completed</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-1">
                        <div class="card">
                            <div class="card-body" style="padding: 0px !important; border-left: 50px solid #FF2957">
                                <div class="d-inline-block">
                                    <div style="z-index: 10; position: relative; left: -35px; bottom: 18px">
                                        <i class="fa fa-times-circle text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </div>
                                </div>
                                <div class="d-inline-block p-1">
                                    <div>
                                        <h2 id="cancel" style="color: rgb(4, 1, 46); margin-bottom: 0px">{{ count($canceledshedules_lastmonth) }}</h2>
                                    </div>
                                    <div>
                                        <small class="text-muted">Canceled</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-1">
                        <div class="card">
                            <div class="card-body" style="padding: 0px !important; border-left: 50px solid #FF891A">
                                <div class="d-inline-block">
                                    <div style="z-index: 10; position: relative; left: -35px; bottom: 18px">
                                        <i class="fa fa-exclamation-circle text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </div>
                                </div>
                                <div class="d-inline-block p-1">
                                    <div>
                                        <h2 id="uncomplete" style="color: rgb(4, 1, 46); margin-bottom: 0px">{{ count($uncompleteshedules_lastmonth) }}</h2>
                                    </div>
                                    <div>
                                        <small class="text-muted">Incompleted</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="pt-3 pr-3">
                        <button type="button" class="btn btn-secondary text-light"  id="more_info">More Info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-4">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="d-inline-block">
                                <div style="padding-left: 20px; padding-right: 10px; display: inline-block;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block; ">
                                    <h3 style="margin-bottom: 3px">{{ $totalshedules }}</h3>
                                    <small>all sessions</small>
                                </div>
                            </div>
                            <div class="d-inline-block" style="border-left: 2px solid #03011F">
                                <div class="bg-warning pt-2 pl-2 pr-2 pb-1 m-2 rounded-circle">
                                    <a href="{{ route('allshedules') }}" style="margin-bottom: 0px !important">
                                        <i class="fa fa-arrow-circle-right text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </a>
                                </div>
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
                                    <small>today sessions</small>
                                </div>
                            </div>
                            <div class="d-inline-block" style="border-left: 2px solid #03011F">
                                <div class="bg-success pt-2 pl-2 pr-2 pb-1 m-2 rounded-circle">
                                    <a href="{{ route('todayshedules') }}">
                                        <i class="fa fa-arrow-circle-right text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </a>
                                </div>
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
                        <div class="row justify-content-between">
                            <div style="display: inline-block">
                                <div style="padding-left: 20px; padding-right: 10px; display: inline-block;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                                        <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                      </svg>
                                </div>
                                <div style="display: inline-block; ">
                                    <h3 style="margin-bottom: 3px">{{ $upcoming_sessions }}</h3>
                                    <small>upcoming sessions</small>
                                </div>
                            </div>
                            <div class="d-inline-block" style="border-left: 2px solid #03011F">
                                <div class="bg-danger pt-2 pl-2 pr-2 pb-1 m-2 rounded-circle">
                                    <a href="{{ route('ownerupcomingsessions') }}">
                                        <i class="fa fa-arrow-circle-right text-light" aria-hidden="true" style="font-size: 20px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-8">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div style="padding-left: 10px">
                                <h5 style="color: #222944">Sessions On Next Seven days</h5>
                            </div>
                            <div style="padding-right: 10px">
                                <h5 class="text-muted">Total : <span class="badge badge-success">{{ count($next_shedules) }}</span></h5>
                            </div>
                        </div>
                        <hr style="border: 0.5px solid #222944">
                        <div class="nextsevendays">
                            @if (count($next_shedules) == 0)
                                <h5>You Dont have any Shedule in nexrt seven days</h5>
                            @else
                                @foreach ($next_shedules as $next_shedule)
                                    <div id="card">
                                        <div class="card m-2">
                                            <div class="card-body p-2" style="border-top: 30px solid #03011F">
                                                <div style="z-index: 10; position: absolute; top: -1px">
                                                    <div class="d-inline-block ml-3">
                                                        <h5 class="text-light">
                                                            {{ ucwords( $next_shedule->title) }} - <small class="text-muted">Session </small> <span class="badge badge-warning"> {{$next_shedule->id }} </span>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="d-inline-block pl-3">
                                                        <div class="row">
                                                            <div class="col-md-auto">
                                                                <div class="d-inline-block bg-success pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                                    <i class="fa fa-calendar text-light" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <b>{{ $next_shedule->date }}</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-auto">
                                                                <div class="d-inline-block bg-success pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                                    <i class="fa fa-clock text-light" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <b>{{ $next_shedule->time }}</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-auto">
                                                                <div class="d-inline-block bg-success pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                                    <i class="fa fa-book text-light" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <b>{{ ucwords($next_shedule->lesson_type) }}</b>
                                                                    @if($next_shedule->lesson_type == 'practicle')
                                                                        @foreach ($categories as $cat)
                                                                            @if($cat->category_code == $next_shedule->vahicle_category)
                                                                                <span class="badge badge-warning">{{ ucwords($cat->name) }} - {{ $next_shedule->transmission  }}</span>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-inline-block pr-3">
                                                        <div class="bg-danger pt-2 pl-2 pr-2 pb-1 m-2 rounded-circle" style="cursor:pointer">
                                                            <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"  data-placement="left"  data-content='<ul class="list-group"><li  class="list-group-item list-group-item-action" id="modelitem"><a href="{{ route('viewdetails', $next_shedule->id) }}" type="button" id="modelbtn">details</a></li><li class="list-group-item list-group-item-action" id="modelitem"><a type="button" href="{{ route('cancelshedule', $next_shedule->id) }}" id="modelbtn">cancel</a></li><li class="list-group-item list-group-item-action" id="modelitem"><a type="button" id="modelbtn" href="{{ route('ownereditschedule', $next_shedule->id) }}">edit</a></li></ul>'>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
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

        <div class="col-sm-4">

            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="font-weight: bold; color: #222944">Session Summery</h5>
                        <h6 id="stat_title">last 30 days</h6>
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
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
            "#35FF35",
            "#03011F",
            "#FF2957",
            "#FF891A",
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
        var text = document.getElementById('stat_name');

        var val = document.getElementById("stat_type").value;

        if(val == 'lastmonth') {

            total.innerHTML = "{{ count($totalshedules_lastmonth) }}";
            complete.innerHTML = "{{ count($complateshedules_lastmonth) }}";
            cancel.innerHTML = "{{ count($canceledshedules_lastmonth) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_lastmonth) }}";
            text.innerHTML = "Last Month";

        } else if( val == 'sixmonth') {

            total.innerHTML = "{{ count($totalshedules_sixmonth) }}";
            complete.innerHTML = "{{ count($complateshedules_sixmonth) }}";
            cancel.innerHTML = "{{ count($canceledshedules_sixmonth) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_sixmonth) }}";
            text.innerHTML = "Last Six Month";

        } else {

            total.innerHTML = "{{ count($totalshedules_year) }}";
            complete.innerHTML = "{{ count($complateshedules_year) }}";
            cancel.innerHTML = "{{ count($canceledshedules_year) }}";
            uncomplete.innerHTML = "{{ count($uncompleteshedules_year) }}";
            text.innerHTML = "Last Year";

        }
    }
</script>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    });

    $('#more_info').click(function(){
        var select = $('select').val();
        console.log("select value : "+select);
        let url = "{{ route('ownersessionstat', ':type') }}";
        url = url.replace(':type', select);
        document.location.href=url;
    });
</script>

@endsection
