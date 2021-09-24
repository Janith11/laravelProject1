@extends('layouts.ownerapp')

@section('content')

<style>

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Groups</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Group List</a>
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

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div style="display: inline-block">
                            <h5 style="color: #020C33; font-weight: bold">Students Groups</h5>
                        </div>
                        <div style="display: inline-block; float:right">
                            <h6 style="color: #020C33">Total Groups <span class="badge badge-warning">{{ count($studentswithgroups) }}</span></h6>
                        </div>
                        <hr style="border-top: 1px solid #020C33">
                    </div>
                    @foreach ($studentswithgroups as $res)
                        <div class="row" style="margin: 10px; cursor: pointer;" onclick="groupefect({{ $res['group_number'] }})">
                            <div style="display: flex">
                                <div style="background-color: #4E4E4E; width: 30px; height: 30px; border-radius: 50%; color: white; text-align: center; padding-top: 5px">{{ $res['group_number'] }}</div>
                                <h5 style="color: #020C33; padding-top: 5px; padding-left: 10px">Group Number : {{ $res['group_number'] }}</h5>
                            </div>
                        </div>
                        <div class="row details-panel" style="border-left: 1px solid #020C33; margin-left: 25px" id="group-panel-{{ $res['group_number'] }}">
                            <div class="col col-sm-6">
                                <div style="margin-left: 20px; margin-top: 20px">
                                    <h6 style="color: #020C33; font-weight: bold">About Categories</h6>
                                </div>
                                <div style="margin-left: 20px; margin-top: 20px">
                                    <canvas id="about-category-{{ $res['group_number'] }}" style="height: 350px"></canvas>
                                    <script>
                                        var group_number = {{ $res['group_number'] }};
                                        new Chart("about-category-"+group_number, {
                                            type: "bar",
                                            data: {
                                                labels: ['Bike', 'Threeweel', 'Dualperpose', 'Hevy Vehicles'],
                                                datasets: [{
                                                    data: [{{ $res['bick_trainers'] }}, {{$res['threeweel_traineres']}}, {{ $res['dualperposes_trainers'] }}, {{ $res['hevyvehicle_trainers'] }}],
                                                    backgroundColor: ['#003049' ,'#F77F00','#00F73E','#30C1EC'],
                                                    }
                                                ]
                                            },
                                            options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                legend: {
                                                    display: false
                                                },
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div style="margin: 15px">
                                    <h6 style="color: #020C33; font-weight: bold">Total Students <span class="badge badge-pill badge-info">{{ $res['total_studnets'] }}</span></h6>
                                </div>
                                <div style="margin: 15px">
                                    <h6 style="color: #020C33; font-weight: bold; margin-bottom: 0px;"><span class="badge badge-pill badge-warning">+</span> Course Progress</h6>
                                    <div style="width: 70%; margin-left: 10%">
                                        <small style="color: #029E43">Completed</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #020C33" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="complete-{{ $res['group_number'] }}"><span id="comp-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                        <small style="color: #F72525">Not Completed</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #F0E549" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="incomplete-{{ $res['group_number'] }}"><span id="notcomp-{{ $res['group_number'] }}" style="color: #020C33"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 15px">
                                    <h6 style="color: #020C33; font-weight: bold; margin-bottom: 0px;"><span class="badge badge-pill badge-success">+</span> Theory Progress</h6>
                                    <div style="width: 70%; margin-left: 10%">
                                        <small style="color: #022C9E">Pass</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #35B6D6" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="tpass-{{ $res['group_number'] }}"><span id="tpassval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                        <small style="color: #EE1D7F">Fail</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #D10909" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="tfail-{{ $res['group_number'] }}"><span id="tfailval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 15px">
                                    <h6 style="color: #020C33; font-weight: bold; margin-bottom: 0px;"><span class="badge badge-pill badge-info">+</span> Practicle Progress</h6>
                                    <div style="width: 70%; margin-left: 10%">
                                        <small style="color: #022C9E">Pass</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #CEC435" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="ppass-{{ $res['group_number'] }}"><span id="ppassval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                        <small style="color: #EE1D7F">Fail</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #B30000" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="pfail-{{ $res['group_number'] }}"><span id="pfailval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 15px">
                                    <h6 style="color: #020C33; font-weight: bold; margin-bottom: 0px;"><span class="badge badge-pill badge-dark">+</span> About to face the examination</h6>
                                    <div style="width: 70%; margin-left: 10%">
                                        <small style="color: #051747">Theory</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #3EE1F7" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="texam-{{ $res['group_number'] }}"><span id="texamval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                        <small style="color: #1DEE9E">Practicle</small>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #41E291" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="pexam-{{ $res['group_number'] }}"><span id="pexamval-{{ $res['group_number'] }}"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var total = {{ $res['total_studnets'] }};
                                    var comp = {{ $res['complete_studnets'] }};
                                    var incomp = {{ $res['still_training'] }};
                                    var tpass = {{ $res['theory_pass'] }};
                                    var tfail = {{ $res['theory_fail'] }};
                                    var ppass = {{ $res['practicle_pass'] }};
                                    var pfail = {{ $res['practicle_fail'] }}
                                    var texam = {{ $res['faceto_theory'] }};
                                    var pexam = {{ $res['faceto_practicle'] }};
                                    var id = {{ $res['group_number'] }};

                                    var compwidth = (comp / total) * 100;
                                    var incompwidth = (incomp / total) * 100;
                                    var tpasswidth = (tpass / total) * 100;
                                    var tfailwidth = (tfail / total) * 100;
                                    var ppasswidth = (ppass / total) * 100;
                                    var pfailwidth = (pfail / total) * 100;
                                    var texamface = (texam / total) * 100;
                                    var pexamface = (pexam / total) * 100;

                                    $('#complete-'+id).css('width', compwidth+'%');
                                    $('#comp-'+id).empty();
                                    $('#comp-'+id).append(Math.round(compwidth)+'%');

                                    $('#incomplete-'+id).css('width', incompwidth+'%');
                                    $('#notcomp-'+id).empty();
                                    $('#notcomp-'+id).append(Math.round(incompwidth)+'%');

                                    $('#tpass-'+id).css('width', tpasswidth+'%');
                                    $('#tpassval-'+id).empty();
                                    $('#tpassval-'+id).append(Math.round(tpasswidth)+'%');

                                    $('#tfail-'+id).css('width', tfailwidth+'%');
                                    $('#tfailval-'+id).empty();
                                    $('#tfailval-'+id).append(Math.round(tfailwidth)+'%');

                                    $('#ppass-'+id).css('width', ppasswidth+'%');
                                    $('#ppassval-'+id).empty();
                                    $('#ppassval-'+id).append(Math.round(ppasswidth)+'%');

                                    $('#pfail-'+id).css('width', pfailwidth+'%');
                                    $('#pfailval-'+id).empty();
                                    $('#pfailval-'+id).append(Math.round(pfailwidth)+'%');

                                    $('#texam-'+id).css('width', texamface+'%');
                                    $('#texamval-'+id).empty();
                                    $('#texamval-'+id).append(Math.round(texamface)+'%');

                                    $('#pexam-'+id).css('width', pexamface+'%');
                                    $('#pexamval-'+id).empty();
                                    $('#pexamval-'+id).append(Math.round(pexamface)+'%');
                                </script>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    function groupefect(number){
        console.log('group efect '+number);
        $('#group-panel-'+number).toggle('slow');
    }

    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
        var panels = document.getElementsByClassName('details-panel');
        for(var i = 1; i<=(panels.length -1); i++){
            console.log(i);
            panels[i].style.display = "none";
        }
    });
</script>

@endsection
