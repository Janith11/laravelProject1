@extends('layouts.ownerapp')
@section('content')
<style>
    .mybadge{
        font-size: 14px;
    }
</style>
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Exam Results</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px; text-decoration: none !important" href="{{ route('studentslist') }}"> / Students List</a>
        <a style="padding-top: 6px; padding-left: 10px; text-decoration: none !important"> / Exam Results</a>
    </div>

    <div class="row-mb-2 mt-2">
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="row-mb-2">
        @if(session('grouperror'))
            <div class="alert alert-danger">
                <h5>{{ session('grouperror') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row mt-3 mb-0 px-3">
        <div class="justify-content-start">
            <h5>Set Exam Date</h5>
        </div>
        <div class="ml-auto" style="display: inline-flex">
            <h5 class="badge badge-secondary mx-2 mybadge">Last Group <span class="badge badge-danger">{{ $lastgroupnumber->group_number }}</span></h5>
            <h5 class="badge badge-secondary mx-2 mybadge">Student <span class="badge badge-danger">{{ $studentcount }}</span></h5>
        </div>
    </div>
    
    <div class="card bg-light mb-4">
        <div class="card-body">
            <form action="{{ route('setexamdate') }}" method="POST">
            @csrf
                <div class="row w-100">
                    <div class="col">
                        <div class="form-group">
                            <label for="groupnum">Group Number</label>
                            <input type="number" name="groupnumber" class="form-control" id="groupnum" placeholder="Enter group number" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="result">Result</label>
                        <select  class="form-control" name="result" required>
                            <option value= "none">None</option>
                            <option value= "pass">Pass</option>
                            <option value= "fail">Fail</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="examdate">Exam Date</label>
                        <input type="date" name="date" class="form-control" id="examdate" placeholder="Enter group number" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="examtype">Exam Type</label>
                            <select  class="form-control" name="examtype" required>
                                <option value= "theory">Theory</option>
                                <option value= "practical">Practical</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="examdate"></label>
                        <input type="submit" class="form-control btn btn-success mt-2" id="submit" placeholder="Enter group number" value="Set Exam Date">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <div class="row mb-3 px-3">
        <input class="form-control" list="datalistOptions" id="myInput" onkeyup="myFunction()" placeholder="Search by Student ID...">
    </div>

    <div class="card" >
        <h5 class="card-header">Exam Results</h5>
        <div id="card">
        <div class="card-body" >
            <table class="table table-sm table-hover table-striped" id="myTable">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Group No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Result</th>
                    <th scope="col">Attempt</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($students as $student)
                   @foreach ($student->exams as $exam )
                  <tr>
                    <td scope="row">{{ $student->group_number}}</td>
                    <td scope="row">{{ $student->user_id}}</td>
                    <td>{{ $exam->type}}</td>
                    <td>{{ $exam->date}}</td>
                    <td>{{ $exam->result}}</td>
                    <td>{{ $exam->attempt}}</td>
                    <td><a href="{{ route('editexamlist', $student->user_id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><a href="{{ route('viewstudent', $student->user_id) }}"><i class="fas fa-angle-double-right"></i></a></td>
                  </tr>
                  @endforeach
                  @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-2 mx-auto">
                    <p>{{ $students->links() }}</p>
                </div>
            </div>
        </div>
        </div>
      </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

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
