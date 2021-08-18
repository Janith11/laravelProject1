@extends('layouts.ownerapp')
@section('content')

    <style>
        .hoverrow:hover{
            background-color: rgba(25, 33, 143, 0.205);
            padding: 0px;
            margin-top: 0px;
        }
        .borderless td, .borderless th {
            border: none;
        }
        tr{
            cursor: pointer;
        }

        #img{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding-left: 0px
        }

        td{
            vertical-align: middle !important;
        }

        #studentprofile{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding-left: 0px;
        }

    </style>

    <div class="container">
        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Notifications</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a style="padding-top: 6px; padding-left: 10px" href="{{ route('viewalert') }}"> / Notification Lists</a>
            <a style="padding-top: 6px; padding-left: 10px"> / Details</a>
        </div>

        <div class="row-mb-2">
            @if(session('errormsg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('errormsg') }}
                </div>
            @endif
        </div>

        <div class="row-mb-2">
            <div class="row">
                <div class="col-sm-6">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color: #222944; font-weight: bold">Other Shedules on this day</h5>
                                <hr style="border-top: 1px solid #222944">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="tehead-dark">
                                            <th>Title</th>
                                            <th>Time</th>
                                            <th>Session</th>
                                            <th>Instructor</th>
                                            <th>Total Students</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($othershedules as $shedules)
                                                <tr>
                                                    <td>{{ $shedules->title }}</td>
                                                    <td>{{ $shedules->time }}</td>
                                                    <td>{{ $shedules->lesson_type }}</td>
                                                    <td>
                                                        @foreach ($instructors as $instructor)
                                                            @if($instructor->user_id == $shedules->instructor)
                                                                <div>
                                                                    <div style="display: inline-block">
                                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" id="img">
                                                                    </div>
                                                                    <div style="display: inline-block">
                                                                        {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                                    </div>
                                                                </div>            
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $shedules->sheduledstudents_count }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color: #222944; font-weight: bold">Request Details</h5>
                                <hr style="border-top: 1px solid #222944">
                                @foreach ($student as $std)
                                    <div style="display: flex">
                                        <div style="display: inline-block;float: top !important">
                                            <img src="/uploadimages/students_profiles/{{ $std->user->profile_img }}" alt="Student Profile" id="studentprofile">
                                        </div>
                                        <div style="display: inline-block; padding-left: 20px">
                                            <div>
                                                <h5 style="color: #02071D">{{ $std->user->f_name }} {{ $std->user->l_name }}</h5>
                                            </div>
                                            <div>
                                                <h5>{{ $std->user->email }}</h5>
                                            </div>
                                            <div>
                                                <h5>{{ $std->user->contact_number }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="table-responsive" style="padding-top: 10px">
                                    <table class="table">
                                        @foreach($result as $res)
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $res->ownershedules->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ $res->ownershedules->date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Time</th>
                                                <td>{{ $res->ownershedules->time }}</td>
                                            </tr>
                                            <tr>
                                                <th>Session</th>
                                                <td>{{ $res->ownershedules->lesson_type }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instructor</th>
                                                <td>
                                                    @foreach ($instructors as $instructor)
                                                        @if($instructor->user_id == $res->ownershedules->instructor)
                                                            <div>
                                                                <div style="display: inline-block">
                                                                    <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" id="img">
                                                                </div>
                                                                <div style="display: inline-block">
                                                                    {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                                </div>
                                                            </div>            
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </div>
                                </table>
                                <div id="card" class="text-center" style="padding-bottom: 10px">
                                    <button class="btn btn-success" onclick="accept()">Accept</button>
                                    <button class="btn btn-danger" id="ignorebtn">Ignore</button>
                                </div>

                                <div style="display: none" id="ignore_panel" class="card" style="padding: 10px;">
                                    <div class="form-group" style="margin: 10px">
                                        <label style="color: #02071D">Enter Reson for ignore</label>
                                        <textarea class="form-control" rows="3" id="reson"></textarea>
                                    </div>
                                    <div class="text-center" id="card" style="padding-bottom: 10px">
                                        <button class="btn btn-danger" onclick="ignore()">Submit</button>
                                    </div>
                                    {{-- ignore form --}}
                                    <form action="{{ route('ignoreshedulerequest') }}" method="POST" id="ignore_form" style="display: none">
                                        @csrf
                                        <input type="text" name="request_id" value="{{ $id }}">
                                        @foreach ($result as $res)
                                            <input type="text" name="shedule_id" value="{{ $res->shedule_id }}">
                                            <input type="text" name="student_id" value="{{ $res->user_id }}">
                                            <input type="text" name="date" value="{{ $res->ownershedules->date }}">
                                            <input type="text" name="time" value="{{ $res->ownershedules->time }}">
                                            <input type="text" name="reson" id="form_reson">
                                        @endforeach
                                    </form>
                                </div>

                                {{-- accept request form --}}
                                <form action="{{ route('acceptshedulerequest') }}" method="POST" id="accept_form" style="display: none">
                                    @csrf
                                    <input type="text" name="request_id" value="{{ $id }}">
                                    @foreach ($result as $res)
                                        <input type="text" name="shedule_id" value="{{ $res->shedule_id }}">
                                        <input type="text" name="student_id" value="{{ $res->user_id }}">
                                        <input type="text" name="instructor_id" value="{{ $res->ownershedules->instructor }}">
                                        <input type="text" name="date" value="{{ $res->ownershedules->date }}">
                                        <input type="text" name="time" value="{{ $res->ownershedules->time }}">
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function accept(){
            var form = document.getElementById('accept_form');
            form.submit();
        };

        $('#ignorebtn').click(function(){
            $('#ignore_panel').toggle();
        })

        function ignore(){
            var reson = document.getElementById('reson').value;
            document.getElementById('form_reson').value = reson;
            var form = document.getElementById('ignore_form');
            form.submit();
        }
    </script>

@endsection
