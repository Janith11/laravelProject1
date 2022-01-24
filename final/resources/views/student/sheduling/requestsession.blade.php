@extends('layouts.student')

@section('content')

<style>
    span#procent {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        font-size: 50px;
        transform: translate(-50%, -50%);
        color: #270C53;
    }

    span#procent::after {
        content: '%';
    }

    .canvas-wrap {
        position: relative;
        width: 200px;
        height: 200px;
    }

    .img{
        width: 25px;
        height: 25px;
        border-radius: 50%;
    }

    .fc-event-time{
        display : none;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Session List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Request a Session</a>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert" style="background-color: rgba(255, 0, 0, 0.1)">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('succesmsg'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('succesmsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5>Wooops!! some wrong with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="card">
                <div class="card ">
                    <div class="card-body">
                        <div>
                            @if($res == "none" || $res == "fail")
                                <div class="d-inline-block">
                                    <h5>You can't request practicle sessions before take your theory examination. <button class="btn btn-success" id="get-theory-sessons">Click</button> here to get theory session days</h5>
                                </div>
                            @else
                                <div class="d-inline-block">
                                    <h5>Choose Vehicle category for get available dates</h5>
                                </div>
                                <div class="d-inline-block float-right">
                                    <div class="form-group mb-0">
                                        <select class="form-control" id="vahiclecat">
                                            <option value="empty">select a category</option>
                                            @foreach($categories as $cat)
                                                @foreach($tcategories as $tcat)
                                                    @if($tcat->category == $cat->category_code)
                                                        <option value="{{ $cat->category_code }}">{{ ucwords($cat->name) }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
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
                        <h5 style="color: #222944; font-weight: bold">Session Calender</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="text-center">
                            <div style="display: inline-block">
                                <div style="background-color: #0FD8F3; width: 15px; height: 15px; border-radius: 50%"></div>
                            </div>
                            <div style="display: inline-block; padding-right: 10px">
                                <h6>Pending</h6>
                            </div>
                            <div style="display: inline-block">
                                <div style="background-color: #35FF35; width: 15px; height: 15px; border-radius: 50%"></div>
                            </div>
                            <div style="display: inline-block; padding-right: 10px">
                                <h6>Active</h6>
                            </div>
                            <div style="display: inline-block">
                                <div style="background-color: #03011F; width: 15px; height: 15px; border-radius: 50%"></div>
                            </div>
                            <div style="display: inline-block; padding-right: 10px">
                                <h6>Complete</h6>
                            </div>
                            <div style="display: inline-block">
                                <div style="background-color: #FF2957; width: 15px; height: 15px; border-radius: 50%"></div>
                            </div>
                            <div style="display: inline-block; padding-right: 10px">
                                <h6>Cancel</h6>
                            </div>
                            <div style="display: inline-block">
                                <div style="background-color: #FF891A; width: 15px; height: 15px; border-radius: 50%"></div>
                            </div>
                            <div style="display: inline-block; padding-right: 10px">
                                <h6>Incomplete</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    $(document).ready(function(){
        $('aside ul .shedule').css('border-left', '5px solid #00bcd4');
    });

    var user_id = '@php echo Auth::user()->id; @endphp';

    var url = "{{ route('studentallshedules', ':id') }}";
    url = url.replace(":id", user_id);

    var date = 0;

    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                    var url = '{{ route("checkdate", ["date" => ":date", "category" => ":category"]) }}';
                    url = url.replace(':date', date);
                    url = url.replace(':category', "");
                    document.location.href=url;
                });
            },
            events: {
                url: url
            },
        });

        calendar.render();
        calendar.setOption('height', 'auto');
        calendar.setOption('width', 'auto');

    });

    $('#vahiclecat').change(function(){
        var category = $('#vahiclecat').val();
        if(category != 'empty'){
            displayavailable(category);
        }
    });

    $('#get-theory-sessons').click(function(){
        displayavailable('theory');
    });

    function displayavailable(category){
        var user_id = '@php echo Auth::user()->id; @endphp';
        var url = "{{ route('studentallshedules', ':id') }}";
        url = url.replace(":id", user_id);
        var date = 0;
        var url1 = '';
        if (category == 'theory') {
            url1 = "{{ route('getalltheorysessons') }}";
        }else{
            url1 = "{{ route('studentcatavailable', ':category') }}";
            url1 = url1.replace(":category", category);
        }
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            dateClick: function(info) {
                date = info.dateStr;
                $(document).ready(function(){
                    var url = '{{ route("checkdate", ["date" => ":date", "category" => ":category"]) }}';
                    url = url.replace(':date', date);
                    url = url.replace(':category', category);
                    document.location.href=url;
                });
            },
            eventSources: [
                url1,
                url
            ],
        });

        calendar.render();
    }

</script>

@endsection
