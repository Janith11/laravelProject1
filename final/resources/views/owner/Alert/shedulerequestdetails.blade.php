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
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Request Details</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="row">
                            <div class="col-sm-4">
                                <div style="padding-top: 20px">
                                    @foreach ($student as $std)
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <img src="/uploadimages/students_profiles/{{ $std->user->profile_img }}" alt="Student Profile" id="studentprofile">
                                            </div>
                                            <div class="col">
                                                <h5 style="color: #02071D">{{ $std->user->f_name }} {{ $std->user->l_name }}</h5>
                                                <p>{{ $std->user->email }}<br>{{ $std->user->contact_number }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div style="padding-top: 20px;">
                                    <div>
                                        <div style="display: inline-block">
                                            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #02071D; padding: 0px 0px 0px 5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#FFFFFF" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div style="display: inline-block">
                                            <h6 style="color: #0FC7AE; margin-bottom: 0px; background-color: white;">About sessions</h6>
                                            <hr style="margin-top: -1px; border-top: 1px solid #02071D;">
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 20px">
                                        <canvas id="progress"></canvas>
                                    </div>
                                    <div>
                                        <div style="display: inline-block">
                                            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #02071D; padding: 0px 0px 0px 5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#FFFFFF" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                                                    <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div style="display: inline-block">
                                            <h6 style="color: #0FC7AE; margin-bottom: 0px; background-color: white;">About Category</h6>
                                            <hr style="margin-top: -1px; border-top: 1px solid #02071D;">
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th style="color: #02071D">Request category</th>
                                                    <td>
                                                        @foreach ($categories as $cat)
                                                            @if ($cat->category_code == $category)
                                                                {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="color: #02071D">Total sessions</th>
                                                    <td>{{ $sessioncount }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="table-responsive" style="padding-top: 10px">
                                    <table class="table table-hover">
                                        @foreach($result as $res)
                                            <tr>
                                                <th style="color: #02071D">Title</th>
                                                <td>{{ ucwords($res->shedules->title) }}</td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Date</th>
                                                <td>{{ $res->shedules->date }}</td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Time</th>
                                                <td>{{ $res->shedules->time }}</td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Session</th>
                                                <td>{{ ucwords($res->shedules->lesson_type) }}</td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Vehicle category</th>
                                                <td>
                                                    @foreach ($categories as $cat)
                                                        @if ($cat->category_code == $res->shedules->vahicle_category)
                                                            <h6>{{ ucwords($cat->name).' ('.$cat->category_code.')' }} </h6>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Transmission</th>
                                                <td>{{ $res->shedules->transmission }}</td>
                                            </tr>
                                            <tr>
                                                <th style="color: #02071D">Instructor</th>
                                                <td>
                                                    @foreach ($instructors as $instructor)
                                                        @if($instructor->user_id == $res->shedules->instructor)
                                                            <div>
                                                                <div style="display: inline-block">
                                                                    <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" id="img">
                                                                </div>
                                                                <div style="display: inline-block">
                                                                    @php
                                                                            if($instructor->user->gender == 'male'){
                                                                                $name = 'Mr. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                            }else{
                                                                                $name = 'Mrs. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                            }
                                                                        @endphp
                                                                    {{ $name }}
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
                                            <input type="text" name="date" value="{{ $res->shedules->date }}">
                                            <input type="text" name="time" value="{{ $res->shedules->time }}">
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
                                        <input type="text" name="instructor_id" value="{{ $res->shedules->instructor }}">
                                        <input type="text" name="date" value="{{ $res->shedules->date }}">
                                        <input type="text" name="time" value="{{ $res->shedules->time }}">
                                    @endforeach
                                </form>
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
                        <h5 style="color: #222944; font-weight: bold">Other schedules on this day</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark" >
                                    <th>Title</th>
                                    <th>Time</th>
                                    <th>Session</th>
                                    <th>Instructor</th>
                                    <th>Vehicle Category</th>
                                    <th>Transmission</th>
                                    <th>Total Students</th>
                                </thead>
                                <tbody>
                                    @foreach ($othershedules as $shedules)
                                        <tr>
                                            <td style="color: #02071D">{{ ucwords($shedules->title) }}</td>
                                            <td style="color: #02071D">{{ $shedules->time }}</td>
                                            <td style="color: #02071D">{{ ucwords($shedules->lesson_type) }}</td>
                                            <td style="color: #02071D">
                                                @foreach ($instructors as $instructor)
                                                    @if($instructor->user_id == $shedules->instructor)
                                                        <div>
                                                            <div style="display: inline-block">
                                                                <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" id="img">
                                                            </div>
                                                            <div style="display: inline-block">
                                                                @php
                                                                    if($instructor->user->gender == 'male'){
                                                                        $name = 'Mr. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                    }else{
                                                                        $name = 'Mrs. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                    }
                                                                @endphp
                                                                {{ $name }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td style="color: #02071D">
                                                @foreach ($categories as $cat)
                                                    @if ($cat->category_code == $shedules->vahicle_category)
                                                        {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td style="color: #02071D">{{ ucwords($shedules->transmission) }}</td>
                                            <td style="color: #02071D">{{ $shedules->sheduledstudents_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        });

        function ignore(){
            var reson = document.getElementById('reson').value;
            document.getElementById('form_reson').value = reson;
            var form = document.getElementById('ignore_form');
            form.submit();
        };

        $(document).ready(function(){

            var student = @json($student);
            var tot, cmp = 0;

            for(var i = 0; i<student.length; i++){
                tot = student[i].total_session;
                cmp = student[i].completed_session;
            }

            new Chart("progress", {
                type: "bar",
                data: {
                    labels: ['Total Sessions', 'Completed Sessions'],
                    datasets: [
                        {
                        data: [tot, cmp],
                        backgroundColor: ['#42FF71', '#031138'],
                        }
                    ],
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
        });
    </script>

@endsection
