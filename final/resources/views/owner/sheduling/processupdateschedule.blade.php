@extends('layouts.ownerapp')

@section('content')

<style>
    .img{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: auto !important;
    }

    /* style for radio button */
    .type{
        border: 1px solid #030C30;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }
    .session input:checked + label{
        background-color: #020230;
        color: white;
    }
    .session input:checked + label i{
        color: #13E2FD;
        transform: rotate(360deg);
        transition: 1s;
    }

    /* style for checkboxes */
    .check{
        display: none;
    }
    .checklabel{
        border: 1px solid #020230;
        border-radius: 5px;
        cursor: pointer;
    }
    .checklabel i{
        padding: 0px 5px 0px 5px;
    }
    .check:checked + .checklabel{
        background-color: #020230;
    }
    .check:checked + .checklabel i{
        color: #1CCEEE;
        transform: rotate(360deg);
        transition: 1s;
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
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Sessions List</a>
        <a href="{{ route('calendar') }}" style="padding-top: 6px; padding-left: 10px"> /  Calendar</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Update Session</a>
    </div>

    <div class="row mb-2">
        @if(session('errormessage'))
            <div class="alert alert-danger" role="alert" style="width: 100%">
                {{ session('errormessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2" id="alert" style="display: none">
        <div class="alert alert-danger" role="alert">
            <h5>Invalied Input!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </h5>
        </div>
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <h6>{{ $error }}</h6>
                @endforeach
            </div>
        @endif
    </div>

    @foreach ($shedules as $shedule)
        <div class="row-mb-2">
            <div class="row">
                <div class="col-sm-4">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <div style="display: flex">
                                    <div style="display:inline-block; vertical-align: middle">
                                        <div style="background-color: #1CCEEE; padding: 10px 10px 10px 13px; border-radius: 50%; width: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#040C2E" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                                <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display:inline-block; padding-left: 10px">
                                        <h5 style="color: #030C30">{{ $shedule->date }}</h5>
                                        <small style="color: #030C30">Choosed Date</small>
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
                                <div style="display: flex">
                                    <div style="display:inline-block; vertical-align: middle">
                                        <div style="background-color: #7DFD13; padding: 10px 10px 10px 13px; border-radius: 50%; width: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#010A2E" class="bi bi-clock" viewBox="0 0 16 16">
                                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display:inline-block; padding-left: 10px">
                                        <h5 style="color: #030C30">{{ $shedule->time }}</h5>
                                        <small style="color: #030C30">Time Slot</small>
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
                                @foreach($instructors as $ins)
                                    @if($ins->user_id == $shedule->instructor)
                                        <div style="display: flex">
                                            <div style="display: inline-block">
                                                <div style="background-color: #252525; width: 45px; height: 45px; border-radius: 50%; padding: 2.5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instrcutor Profile" class="img" >
                                                </div>
                                            </div>
                                            <div style="display: inline-block; padding-left: 10px">
                                                <h5 style="color: #030C30">{{ $ins->user->f_name }} {{ $ins->user->l_name }}</h5>
                                                <small style="color: #030C30">Instructor</small>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div class="row">
                <div class="col-sm-4">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <div style="display: flex">
                                    <div style="display: inline-block">
                                        <div style="background-color: #F9FD13; padding: 10px 10px 10px 13px; border-radius: 50%; width: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#060F33" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display: inline-block; padding-left: 10px">
                                        <h5 style="color: #020230">{{ $shedule->lesson_type }}</h5>
                                        <small>Session</small>
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
                                <div style="display: flex">
                                    <div style="display: inline-block">
                                        <div style="background-color: #FD1394; padding: 10px 10px 10px 13px; border-radius: 50%; width: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#040D31" class="bi bi-tags" viewBox="0 0 16 16">
                                                <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display: inline-block; padding-left: 10px">
                                        <h5 style="color: #020230">{{ $shedule->title }}</h5>
                                        <small>Title</small>
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
                                <div style="display: flex">
                                    <div style="display: inline-block">
                                        <div style="background-color: #FD7113; padding: 10px 10px 10px 13px; border-radius: 50%; width: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#040E36" class="bi bi-people" viewBox="0 0 16 16">
                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display: inline-block; padding-left: 10px">
                                        <h5 style="color: #020230">{{ $shedule->sheduledstudents_count }}</h5>
                                        <small>Total Students</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('saveupdateschedule') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ $shedule->id }}" name="id">

            <div class="row-mb-2">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #020230; font-weight: bold">Select Students</h5>
                            <hr style="border-top: 1px solid #020230">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="display: none">
                                        <th>checkbox</th>
                                        <th>profile</th>
                                        <th>name</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox" value="{{ $student->user_id }}" id="{{ $student->user_id }}" name="students[]">
                                                        <label class="form-check-label checklabel" for="{{ $student->user_id }}">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <div>
                                                        <div style="display: inline-block; padding-right: 10px">
                                                            <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="Student Profile" class="img" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <h5>
                                                                {{ $student->user->f_name }} {{ $student->user->l_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="card" class="text-center">
                                <button type="submit" class="btn btn-success">Update Schedule</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    @endforeach

    <script>
        $(document).ready(function(){
            $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
        });
    </script>

</div>

@endsection
