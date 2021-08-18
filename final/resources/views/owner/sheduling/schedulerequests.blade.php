@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('viewalert') }}" style="padding-top: 6px; padding-left: 10px"> / Notifications</a>
        <a href="" style="padding-top: 6px; padding-left: 10px"> / Schedule Requests</a>
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

    <div class="card mt-5">
        <div class="card-body">
            <table class="table table-light table-sm table-hover">
                <thead>
                  <tr>
                    <th scope="col">Image</th>  
                    <th scope="col">ID</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Type</th>
                    <th scope="col">Accepet</th>
                    <th scope="col">Delete</th>
                    <th scope="col">More</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($requestdetails as $req) 
                  <tr>
                    @foreach ($req->sheduledstudents as $schedule )                 
                        @foreach ($userdetails as $user)
                            @if($schedule->student_id == $user->id)
                            <td><img src="/uploadimages/students_profiles/{{ $user->profile_img }}" alt="profile image" class="rounded-circle" style="max-width: 25px;height:auto"></td>
                            <td>{{ $user->id }}</td>
                            @endif       
                        @endforeach        
                    @endforeach
                    @foreach ($userdetails as $user)
                        @if ($req->instructor == $user->id)
                            <td>{{ $user->f_name }} {{ $user->l_name }}</td>
                        @endif            
                    @endforeach                              
                    <td>{{ $req->date }}</td>
                    <td>{{ $req->time }}</td>
                    <td>{{ $req->lesson_type }}</td>
                    <td><a href="{{ route('studentschedulerequestaccepet', $req->id ) }}" class="btn btn-success btn-sm">Accepet</a></td>
                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                    <td><a href="" class="btn btn-info btn-sm">More</a></td>
                  </tr>
                @endforeach      
                </tbody>
              </table>
        </div>
    </div>



</div>
@endsection