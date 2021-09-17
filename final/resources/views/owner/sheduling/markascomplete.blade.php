@extends('layouts.ownerapp')

@section('content')

<style>
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0 !important;
        background-color: transparent;
    }

    #img{
        padding-left: 0px !important;
        width: 50px !important;
        height:auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Schedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Schedule List</a>
        <a href="{{ route('todayshedules') }}" style="padding-top: 6px; padding-left: 10px"> / Today List</a>
        <a style="padding-top: 6px; padding-left: 10px">/ Mark as Complete</a>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger">
                <h5>{{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row mb-2 justify-content-end">
        <button type="button" class="checkall btn btn-primary">Select all</button>
    </div>

    @if(count($reports) != 0)
        <div class="alert alert-info" role="alert">
            <h5>Instructor has report attendance</h5>
            <ul style="list-style-type: disc">
                @foreach($reports as $report)
                    <li>
                        @foreach($students_details as $student)
                            @if($student->user_id == $report->user_id)
                                {{$student->user->f_name}} is attend.
                            @endif
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('saveascomplete') }}" method="POST">
        @csrf
        @foreach($shedule as $sdl)
            <input type="hidden" value="{{ $sdl->id }}" name="id">
        @endforeach
        <div class="row-mb-2">
            <h5 style="padding-top: 10px; padding-left:10px; color: #222944; font-weight: bold">Instructor</h5>
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($instructor_details as $instructor)
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: middle">
                                                <input type="checkbox" name="instructor[]"  class="checkuser" value="{{ $instructor->user->id }}">
                                            </td>
                                            <td>
                                                <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="profile image" id="img">
                                            </td>
                                            <td>
                                                <h5>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                            </td>
                                            <td>
                                                @foreach ($shedule as $sdl)
                                                    <h5>{{ $sdl->lesson_type }} session</h5>
                                                @endforeach
                                            </td>
                                            <td>
                                                <h5>{{ $instructor->user->contact_number }}</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <h5 style="padding-top: 10px; padding-left:10px; color: #222944; font-weight: bold">Students</h5>
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($students_details as $student)
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: middle">
                                                <input type="checkbox" name="students[]"  class="checkuser" value="{{ $student->user->id }}">
                                            </td>
                                            <td>
                                                <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image" id="img">
                                            </td>
                                            <td>
                                                <h5>{{ $student->user->f_name }} {{ $student->user->l_name }}</h5>
                                            </td>
                                            <td>
                                                @foreach ($shedule as $sdl)
                                                    <h5>{{ $sdl->lesson_type }} session</h5>
                                                @endforeach
                                            </td>
                                            <td>
                                                <h5>{{ $student->user->contact_number }}</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div class="text-center" style="padding-top: 10px">
                <button type="submit" class="btn btn-success">Complete</button>
            </div>
        </div>

    </form>

</div>

<script>
    var clicked = false;
    $(".checkall").on("click", function() {
        $(".checkuser").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect' : 'Select all';
    });
</script>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
