@extends('layouts.ownerapp')

@section('content')

<style>
    img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .setwidth{
        max-width: 100px;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> > Shedule List</a>
        <a href="{{ route('owneraddshedule') }}" style="padding-top: 6px; padding-left: 10px"> > Calender</a>
    </div>

    <div class="row mb-2">
        @if(session('instructorerror'))
        <div class="alert alert-danger" role="alert">
            {{ session('instructorerror') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <script>
                document.getElementById('instructor_card').className = 'card border-danger';
            </script>
        </div>
        @endif
    </div>

    <div class="row mb-2">
        @if(session('studenterror'))
        <div class="alert alert-danger" role="alert">
            {{ session('studenterror') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <script>
                document.getElementById('instructor_card').className = 'card border-danger';
            </script>
        </div>
        @endif
    </div>

    <div class="row mb-2">
        @if(session('chooseerror'))
            <div class="alert alert-danger" role="alert">
                {{ session('chooseerror') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <form action="{{ route('saveshedule') }}" method="POST">
        @csrf

    <div class="row mb-2">
        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card" style="border-radius: 10px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3E3F44" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <h5 style="color: #222944; font-weight: bold; padding-left: 10px">Selected Date</h5>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $date }}" disabled>
                            <input type="hidden" class="form-control" id="sheduledate" name="date" value="{{ $date }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card" style="border-radius: 10px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3E3F44" class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                          </svg>
                        <h5 style="color: #222944; font-weight: bold; padding-left: 10px">Selected Time</h5>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $time }}" disabled>
                            <input type="hidden" class="form-control" id="sheduletime" name="time" value="{{ $time }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card" style="border-radius: 10px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3E3F44" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                        <h5 style="color: #222944; font-weight: bold; padding-left: 10px">Session Type</h5>
                    </div>
                    <div class="row justify-content-center" style="padding-bottom: 23px; padding-top: 10px">
                        <div class="form-check" style="padding-right: 10px">
                            <input class="form-check-input" type="radio" name="lessontype" id="theory" value="theory" checked>
                            <label class="form-check-label" for="exampleRadios1">Theory</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lessontype" id="practicle" value="practicle">
                            <label class="form-check-label" for="exampleRadios2">Practicle</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card" style="border-radius: 10px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3E3F44" class="bi bi-tags-fill" viewBox="0 0 16 16">
                            <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                        </svg>
                        <h5 style="color: #222944; font-weight: bold; padding-left: 10px">Shedule Name</h5>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="text" class="form-control" id="shedulename" name="shedulename" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- instructor table --}}
    <div class="row mb-2">
        <div class="card" style="width: 100%; border-radius: 10px" id="instructor_card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Select Instructor</h5>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search for name" style="border-radius: 50px" id="instructorInput" onkeyup="instructorsearchfunction()" >
                        </div>
                    </div>
                </div>
                <hr style="border: 0.5px solid #222944">
                <div class="row">
                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                        <table class="table"  id="instructorTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Vehicle Types</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                <tr>
                                    <th scope="row"  style="text-align: center; vertical-align: middle">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" type="checkbox" value="{{ $instructor->user_id }}" name="instructor[]">
                                        </div>
                                    </th>
                                    <td class="setwidth">
                                        <div class="row">
                                            <div class="col-4 m-n1 p-0 ">
                                                <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="avatar">
                                            </div>
                                            <div class="col-sm">
                                                <h6>{{$instructor->user->f_name }} {{$instructor->user->l_name}}</h6>
                                                <p>{{ $instructor->user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $instructor->user->contact_number }}</td>
                                    <td>
                                        <ul>
                                            {{-- @foreach (vehicletypes as vehicletype)
                                                <li>{{ vehicletype }}</li>
                                            @endforeach --}}
                                        </ul>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle">
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="vertical-align: middle">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- student table --}}
    <div class="row mb-2">
        <div class="card" style="width: 100%; border-radius: 10px">
            <div class="card-body">
                <div class="row  justify-content-between">
                    <div class="col-sm-6">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Select Students</h5>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" id="all">
                            <input type="text" class="form-control" id="studentInput" placeholder="Search for name" style="border-radius: 50px" onkeyup="studentsearchfunction()">
                        </div>
                        {{-- <div class="form-group" style="display: none"  id="group">
                            <input type="text" class="form-control" id="groupInput" placeholder="Search for group id" style="border-radius: 50px" onkeyup="groupsearchfunction()">
                        </div> --}}
                    </div>
                </div>
                <hr style="border: 0.5px solid #222944">
                {{-- <div class="row justify-content-start" style="padding-top: 10px; padding-bottom: 10px">
                    <div class="col-sm-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Display Student By
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button class="btn" class="dropdown-item" style="width: 100%; background-color: white; color: #222944; text-align: left" onclick="displayallstudent()">All Students</button>
                                <br>
                                <button class="btn" class="dropdown-item" style="width: 100%; background-color: white; color: #222944; text-align: left" onclick="displaystudentsgroups()">Student Groups</button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- all student table --}}
                <div class="row" id="allstudents">
                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                        <table class="table" id="studentTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Mountly Attendence</th>
                                    <th scope="col"></th>
                                    {{-- <th scope="col">Handle</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student )
                                <tr>
                                    <td scope="row" style="text-align: center; vertical-align: middle">
                                        <input class="form-check-input position-static" type="checkbox" value="{{ $student->user_id }}" name="students[]">
                                    </td>
                                    <td class="setwidth">
                                        <div class="row">
                                            <div class="col-4 m-n1 p-0 ">
                                                <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="avatar">
                                            </div>
                                            <div class="col-sm">
                                                <h6>{{$student->user->f_name }} {{$student->user->l_name}}</h6>
                                                <p>{{ $student->user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $student->user->contact_number}}</td>
                                    <td>attendence here</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="vertical-align: middle">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- student groups table --}}
                {{-- <div class="row" id="studentgroups" style="display: none">
                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                        <table class="table" id="groupTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Group ID</th>
                                    <th scope="col">Total Students</th> --}}
                                    {{-- <th scope="col">Handle</th> --}}
                                {{-- </tr>
                            </thead>
                            <tbody> --}}
                                {{-- @foreach (studentgroups as studentgroup ) --}}
                                {{-- <tr>
                                    <td scope="row" style="vertical-align: center">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="" >
                                        </div>
                                    </td>
                                    <td> --}}
                                        {{-- {{ studentgroup->id }} --}}
                                    {{-- </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                {{ totalstudents }}
                                            </div>
                                            <div class="col">
                                                <button class="btn" style="background: lightgray; border-radius: 50%; border: none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#222944" class="bi bi-three-dots" viewBox="0 0 16 16" >
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                      </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}
                                {{-- @endforeach --}}
                            {{-- </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row mb-2 justify-content-center" style="padding-top: 10px; padding-bottom: 20px">
        <div>
            <button type="submit" class="btn btn-success">Submit Shedule</button>
        </div>
    </div>

    </form>

    <script>

        // instruvtor filter function
        function instructorsearchfunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("instructorInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("instructorTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i <script tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
    // student filter function
        function studentsearchfunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("studentInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>

<script>
        // display all student
        function displayallstudent(){
            var allstd = document.getElementById('allstudents');
            var stdgroup = document.getElementById('studentgroups');
            var all_serach = document.getElementById('all');
            var group_search = document.getElementById('group');
            allstd.style.display = 'block';
            stdgroup.style.display = 'none';
            all_serach.style.display = 'block';
            group_search.style.display = 'none';

        }

        // display student groups
        function displaystudentsgroups(){
            var allstd = document.getElementById('allstudents');
            var stdgroup = document.getElementById('studentgroups');
            var all_serach = document.getElementById('all');
            var group_search = document.getElementById('group');
            allstd.style.display = 'none';
            stdgroup.style.display = 'block';
            all_serach.style.display = 'none';
            group_search.style.display = 'block';

        }

    </script>

</div>
@endsection
