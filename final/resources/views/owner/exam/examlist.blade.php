@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Exam lists</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>

    <div class="row mb-2">
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
    </div>
    
    <div class="row-mb-2">
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


    <div class="card" >
        <h5 class="card-header">Exam Results</h5>
        <div id="card">
        <div class="card-body" >
            <table class="table">
                {{-- <caption>List of users</caption> --}}
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Result</th>
                    <th scope="col">Attempt</th>
                    
                  </tr>
                </thead>
                <tbody>
                   @foreach ($students as $student)
                   @foreach ($student->exams as $exam )
                  <tr>
                    <th scope="row">{{ $student->user_id}}</th>
                    <td>{{ $exam->type}}</td>
                    <td>{{ $exam->date}}</td>
                    <td>{{ $exam->result}}</td>
                    <td>{{ $exam->attempt}}</td>
                    <td><a href="{{ route('editexamlist', $student->user_id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
                  </tr>
                  @endforeach
                  @endforeach 
                </tbody>
            </table>
        </div>
        </div>
      </div>

</div>


@endsection