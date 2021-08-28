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
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Schedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Schedule List</a>
        <a href="{{ route('calendar') }}" style="padding-top: 6px; padding-left: 10px"> /  Calendar</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Create Schedule</a>
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
                                    <h5 style="color: #030C30">{{ $date }}</h5>
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
                                    <h5 style="color: #030C30">{{ $time }}</h5>
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
                                @if($ins->user_id == $instructor)
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

    <form action="{{ route('savecreateshedule') }}" method="post">
        @csrf

        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="time" value="{{ $time }}">
        <input type="hidden" name="instructor" value="{{ $instructor }}">

        <div class="row-mb-2">
            <div class="row">
                <div class="col-sm-6">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div style="display: inline-block; padding-right: 20px">
                                        <h5 style="color: #030C30">Session Type</h5>
                                    </div>
                                    <div style="display: inline-block" class="session">
                                        <input type="radio" name="session_type" id="practicle" value="practicle" style="display: none">
                                        <label for="practicle" class="type">
                                            <div style="display: inline-block; padding-right: 10px;">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div style="display: inline-block">
                                                <h5>Practicle</h5>
                                            </div>
                                        </label>
                                        <input type="radio" name="session_type" id="theory" value="theory" style="display: none">
                                        <label for="theory" class="type">
                                            <div style="display: inline-block; padding-right: 10px;">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div style="display: inline-block">
                                                <h5>Theory</h5>
                                            </div>
                                        </label>
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
                                <div>
                                    <div style="display: inline-block; padding-right: 20px">
                                        <h5 style="color: #020230">Session Name</h5>
                                    </div>
                                    <div style="display: inline-block">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="session_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <button type="submit" class="btn btn-success">Create Schedule</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <script>
        $(document).ready(function(){
            $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
        });
    </script>
    <script>
        $(function () {

            $('form').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: '/addshedule/calender123/save',
                    data: $('form').serialize(),
                    success: function () {
                        window.location.href = "{{ route('calendar') }}";
                    },
                    error: function (error) {
                        document.getElementById('alert').style.display = 'block';
                        // alert('error; ' + eval(error));
                    }
                });

            });

        });
    </script>

</div>

@endsection
