@extends('layouts.instructorapp')

@section('content')

<style>

    td{
        color: #222944;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedule list</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('instructorshedulelist') }}"> / List </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Last six month </a>
    </div>

    <div class="row-mb-2">
        <div class="row">
            @foreach($lastsix_month as $shedule)
                <div class="col-sm-3">
                    <div id="card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div style="color: #222944; padding-left: 10px">
                                        <h6>{{ $shedule->title }}</h6>
                                    </div>
                                    <div style="padding-right: 10px">
                                        <a href="{{ route('instructortodayshedulesdetails', $shedule->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td>Date : </td>
                                                <td>{{ $shedule->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Time : </td>
                                                <td>{{ $shedule->time }}</td>
                                            </tr>
                                            <tr>
                                                <td>Session Type : </td>
                                                <td>{{ $shedule->lesson_type }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .shedules').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
