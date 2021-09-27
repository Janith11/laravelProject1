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
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding-left: 0px
        }

        td{
            vertical-align: middle !important;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
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
            {{-- <a style="padding-top: 6px; padding-left: 10px" href="{{ route('attendanceslist') }}"> / Attendances list</a> --}}
            <a style="padding-top: 6px; padding-left: 10px"> / Notification Lists</a>
        </div>

        <div class="row-mb-2">
            @if(session('successmsg'))
                <div class="alert alert-success" role="alert">
                    {{ session('successmsg') }}
                </div>
            @endif
        </div>

        <div class="card mt-4">
            <div class="card-body">
                @if(count($notifications)==0)
                    <div class="alert alert-info" role="alert">
                        <h5>Student requests empty!</h5>
                    </div>
                @endif
                <table class="table borderless table-hover">
                    <tbody>
                        {{-- from request alert controller --}}

                    @foreach ($notifications as $n)
                      @if($n->status == '0')
                      <tr onclick="window.location='{{ route('loadrequestalerts',[$n->user_id,$n->description,$n->id]) }}'" >
                      @else
                      <tr class="text-muted" style="cursor:not-allowed; background-color: rgba(128, 128, 128, 0.246);">
                      @endif
                            <th scope="row">
                                @if ($n->description == '1')
                                    <span class="p-2 rounded-circle" style="background-color: #27A745; color:white"><i class="fas fa-address-book fa-lg "></i></span>
                                {{-- @elseif ($n->description == '2')
                                    <span class="p-2 rounded-circle" style="background-color: #6732C3; color:white"><i class="fas fa-clipboard-list fa-lg "></i></span> --}}
                                @endif
                            </th>
                            <td>
                                @if ($n->description == '1')
                                    <h5>New Student Registered! Waiting for your review</h5>
                                {{-- @elseif ($n->description == '2')
                                    <h5>Student has been schedule for a new lessson. Accept the request!</h5> --}}
                                @endif
                            </td>
                            <td><p>{{ $n->created_at }}</p></td>
                      </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        @if(count($shedulerequests) == 0)
                            <div class="alert alert-info" role="alert">
                                <h5>No Shedule Requests</h5>
                            </div>
                        @else
                            <h5 style="color: #222944; font-weight: bold">@php
                                echo count($shedulerequests)
                            @endphp Shedule Requests</h5>
                            <hr style="border-top: 1px solid #222944">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach ($shedulerequests as $request)
                                            <tr>
                                                <td>
                                                    @foreach ($students as $student)
                                                        @if($student->user_id == $request->user_id)
                                                        <div>
                                                            <div style="display: inline-block">
                                                                <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="" id="img">
                                                            </div>
                                                            <div style="display: inline-block; padding-left: 10px; color: #222944">
                                                                {{ $student->user->f_name }} {{ $student->user->l_name }}
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $request->shedules->lesson_type }}</td>
                                                <td>{{ $request->shedules->date }}</td>
                                                <td>{{ $request->shedules->time }}</td>
                                                <td><a href="{{ route('shedulerequestdetails', [$request->shedules->date, $request->id, $request->user_id ]) }}" class="btn btn-success" type="button">Details</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="card mt-2 mb-4">
            <div class="card-header"><h5>Contact us messages</h5></div>
            <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table borderless table-hover table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Contact No</th>
                              <th scope="col">Town</th>
                              <th scope="col">Message</th>
                            </tr>
                          </thead>
                        <tbody>
                            @foreach ($contactus as $detail)
                                {{-- @if ($n->description == 3)                     --}}
                                <tr>
                                    <td scope="row">
                                        {{ $detail->id }}
                                    </td>
                                    <td>
                                        {{ $detail->name }}
                                    </td>
                                    <td>
                                        {{ $detail->email }}
                                    </td>
                                    <td>
                                        {{ $detail->contactno }}
                                    </td>
                                    <td>
                                        {{ $detail->hometown }}
                                    </td>
                                    <td>
                                        {{ $detail->message }}
                                    </td>
                                    {{-- <td>
                                        {{ $detail->created_at }}
                                    </td> --}}
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped text-center">
                    <thead>
                      <tr>
                        <th scope="col">Student Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($outer_Messages as $m)                 
                        <tr>
                            <th scope="row">{{ $m->uid }}</th>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->message }}</td>
                        </tr>
                      @endforeach  
                      </tbody>
                  </table>
            </div>
        </div>

        <div style="background-color: #040124"></div>

    </div>

    <script>
        $(document).ready(function(){
        $('aside ul .notification').css('border-left', '5px solid #00bcd4');
    });
    </script>
@endsection
