@extends('layouts.student')

@section('content')

<style>
    #card{
        padding: 10px;
    }

    .progress{
        width: 150px;
        height: 150px;
        line-height: 150px;
        background: none;
        margin: 0 auto;
        box-shadow: none;
        position: relative;
    }

    .progress:after{
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 15px solid #f2f5f5;
        position: absolute;
        top: 0;
        left: 0;
    }

    .progress > span{
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .progress .progress-left{
        left: 0;
    }

    .progress .progress-bar{
        width: 100%;
        height: 100%;
        background: none;
        border-width: 15px;
        border-style: solid;
        position: absolute;
        top: 0;
    }

    .progress .progress-left .progress-bar{
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }

    .progress .progress-right{
        right: 0;
    }

    .progress .progress-right .progress-bar{
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
        animation: loading-1 1.8s linear forwards;
    }

    .progress .progress-value{
        width: 100%;
        height: 100%;
        font-size: 24px;
        color: rgb(250, 245, 245);
        text-align: center;
        position: absolute;
    }

    .progress.yellow .progress-bar{
        border-color: #21E278;
    }

    .progress.yellow .progress-left .progress-bar{
        animation: loading-3
         1s linear forwards 1.8s;
    }

    @keyframes loading-1{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }

    @keyframes loading-2{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }
    }

    @keyframes loading-3{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    }

    @keyframes loading-4{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg);
        }
    }

    @keyframes loading-5{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(126deg);
            transform: rotate(126deg);
        }
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
    </div>

    <div class="row justify-content-end">
        <div id="card">
            <a class="btn btn-primary" type="button" style="color: white;" href="{{ route('studentallshedules', Auth::user()->id) }}">Request Slot</a>
        </div>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Shedule Calender</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Your Progress</h5>
                        <hr style="border-top: 1px solid #222944">

                        <div class="col-md-3 col-sm-6">
                            <div class="progress yellow">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value" style="color: #222944">90%</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var user_id = '@php echo Auth::user()->id; @endphp';

    var url = "{{ route('studentallshedules', ':id') }}";
    url = url.replace(":id",user_id);

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                    var url = '{{ route("checkdate", ["date" => ":date"]) }}';
                    url = url.replace(':date', date);
                    document.location.href=url;
                });
            },
            events: {
                url: url
            },
        });
        calendar.render();
        calendar.setOption('height', 'auto');
    });

</script>

@endsection
