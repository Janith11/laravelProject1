@extends('layouts.ownerapp')

@section('content')

<style>
    .img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .img2{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Details</a>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #081135; font-weight: bold">Request Details</h5>

                    <div class="table-responsive">
                        @foreach ($shedule as $value)
                            <div style="padding: 10px">
                                <hr style="border-top: 1px solid #081135">
                                @foreach ($students as $student)
                                    @if($student->user_id == $value->user_id)
                                        <div style="display: flex">
                                            <div style="display: inline-block">
                                                <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="Student Profile" class="img">
                                            </div>
                                            <div style="display: inline-block; padding-left: 10px">
                                                <h5 style="color: #081135; font-weight: bold">{{ $student->user->f_name }} {{ $student->user->l_name }}</h5>
                                                <h5>{{ $student->user->email }}</h5>
                                                <h5>{{ $student->user->contact_number }}</h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <table>
                                <tr>
                                    <td><h5>Date</h5></td>
                                    <td><h5 style="padding-left: 30px">{{ $value->shedules->date }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Time</h5></td>
                                    <td><h5 style="padding-left: 30px">{{ $value->shedules->time }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Status</h5></td>
                                    <td>
                                        @if($value->shedule_status == 0)
                                            <h5 style="color: #7BF12C; padding-left: 30px">Pending Request</h5>
                                        @elseif ($value->shedule_status == 1)
                                            <h5 style="color: #081135; padding-left: 30px">Confirmed Request</h5>
                                        @else
                                            <h5 style="color: #DF1B25; padding-left: 30px">Canceled Request</h5>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5>Session</h5></td>
                                    <td><h5 style="padding-left: 30px">{{ $value->shedules->lesson_type }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Instructor</h5></td>
                                    <td>
                                        @foreach ($instructors as $instructor)
                                            @if($instructor->user_id == $value->shedules->instructor)
                                                <div style="padding-left: 30px">
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="img2">
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <h5>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                            {{-- <div id="card" style="padding: 20px">
                                @if($value->shedule_status == 0)
                                    <a href="" class="btn btn-success" type="button">Confirm Request</a>
                                @endif
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
