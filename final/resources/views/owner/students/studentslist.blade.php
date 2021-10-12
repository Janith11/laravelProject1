@extends('layouts.ownerapp')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>

    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px
    }

    .setwidth{
        max-width: 100px;
    }

    #h{
        margin-bottom: 0;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }
    .active-cyan-4 input[type=text] {
        border: 1px solid #4dd0e1;
        box-shadow: 0 0 0 1px #4dd0e1;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Students</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Students List</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div style="padding-right: 15px">
                <a type="button" class="btn btn-primary" style="color: white" href="{{ route('addstudent') }}">Add Student</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block">
                                    <h3 id="h">{{ count($students) }}</h3>
                                    <small>all students</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block">
                                    <h3 id="h">{{ $requst_students }}</h3>
                                    <small>student requests</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block">
                                    <h3 id="h">{{ $complete_students }}</h3>
                                    <small>finish course</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#222944" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                    </svg>
                                </div>
                                <div style="display: inline-block">
                                    <h3 id="h">{{ count($students) - $complete_students }}</h3>
                                    <small>in progress</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- success Messages  --}}
    <div class="row">
        <div class="col-sm-12">
            @if(session('successmsg'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <h5>
                        {{ session('successmsg') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    {{-- start tabel  --}}
    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">All Students</h5>
                    <hr style="border: 0.5px solid #222944">
                    <div class="row">
                        <div class="active-cyan-4 mb-4 col-12">
                            <input class="form-control" type="text" placeholder="Student Search ..." aria-label="Search" onkeyup="myFunction()" id="myInput">
                        </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col ">
                                    <input type="checkbox">
                                </th>
                                <th scope="col ">Name</th>
                                <th scope="col ">NIC</th>
                                <th scope="col">Id</th>
                                <th scope="col">Batch</th>
                                <th scope="col">Balance</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td scope="row "><input type="checkbox"></td>
                                <td>
                                    <div class="row">
                                        <div style="display: inline-block">
                                            {{-- /uploadimages/students_profiles/default_image.jpg --}}
                                            <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image" id="img">
                                        </div>
                                        <div style="display: inline-block; padding-left: 10px; vertical-align: middle">
                                            <h6>{{$student->user->f_name }} {{$student->user->l_name}}</h6>
                                            <p>{{ $student->user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $student->user->nic_number}}</td>
                                <td>{{ $student->user_id}}</td>
                                <td>{{ $student->group_number}}</td>
                                <td>{{ $student->amount}}</td>
                                <td><a class="btn btn-primary" href="{{ route('editstudent', $student->user_id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td><a class="btn btn-info" href="{{ route('viewstudent', $student->user_id) }}"><i class="fas fa-angle-double-right"></i></a></td>
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


{{-- toggle search when press search icon  --}}
<script>
     $(document).ready(function(){
         $(".SearchIcon").click(function(){
             $("#search-bar").display("block");
         });
     });
</script>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

{{-- search bar script  --}}
<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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

@endsection
