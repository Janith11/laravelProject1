@extends('layouts.ownerapp')

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('ownershedulelist') }}"> / Sessions List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Upcoming Sessions</a>

    </div>

    <div class="row-mb-2">
        @if(count($sessions) == 0)
            <div class="alert alert-info" role="alert">
                <h5>No upcoming sessions</h5>
            </div>
        @else
            @foreach ($sessions as $shedule)
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h5>{{ $shedule->id }}. {{ $shedule->title }}</h5>
                                </div>
                                <div class="col-sm-2">
                                    <h5>{{ $shedule->date }}</h5>
                                </div>
                                <div class="col-sm-2">
                                    <h5>{{ $shedule->time }}</h5>
                                </div>
                                <div class="col-sm-2">
                                    <h5>{{ $shedule->lesson_type }}</h5>
                                </div>
                                <div class="col-sm-2">
                                    @if ($shedule->shedule_status == 0)
                                        <h5>Cancel</h5>
                                    @elseif ($shedule->shedule_status == 1)
                                        <h5>Active</h5>
                                    @elseif ($shedule->shedule_status == 2)
                                        <h5>Complate</h5>
                                    @else
                                        <h5>Incomplate</h5>
                                    @endif
                                </div>
                                <div class="col-sm-2 text-right">
                                    <a href="{{ route('viewdetails', $shedule->id) }}" class="btn" type="button">
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

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
