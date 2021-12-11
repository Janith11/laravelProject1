@extends('layouts.ownerapp')

@section('content')

<style>
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0 !important;
        background-color: transparent;
    }

    #img{
        padding-left: 0px !important;
        width: 50px !important;
        height:auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .checkuser{
        display: none;
    }

    .attend-label{
        cursor: pointer;
    }

    .attend-icon{
        border: 1px solid #020B30;
        border-radius: 5px;
        padding: 0px 5px 0px 5px;
        margin: 10px;
    }

    .checkuser:checked + .attend-label .attend-icon{
        background-color: #3CF56A
    }

    .checkuser:checked + .attend-label .attend-icon i{
        color: #020B30;
    }

    .instructor-label{
        cursor: pointer;
    }

    .checkinstructor{
        display: none
    }

    .instructor-check-icon{
        border: 1px solid #020B30;
        border-radius: 5px;
        padding: 0px 5px 0px 5px;
        margin: 10px;
    }

    .checkinstructor:checked + .instructor-label .instructor-check-icon{
        background-color: #3CF56A;
    }

    .checkinstructor:checked + .instructor-label .instructor-check-icon i{
        color: #020B30;
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
        <a href="{{ route('todayshedules') }}" style="padding-top: 6px; padding-left: 10px"> / Today List</a>
        <a style="padding-top: 6px; padding-left: 10px">/ Mark as Complete</a>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger">
                <h5>{{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #020B30; font-weight: bold">Session Details</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="thead-dark">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Session Type</th>
                                <th>Category</th>
                                <th>Transmission</th>
                            </thead>
                            <tbody>
                                @foreach ($shedule as $sh)
                                    <tr>
                                        <td><h6 class="badge badge-warning">{{ $sh->id }}</h6></td>
                                        <td>{{ ucwords($sh->title) }}</td>
                                        <td>{{ $sh->date }}</td>
                                        <td>{{ $sh->time }}</td>
                                        <td>{{ ucwords($sh->lesson_type) }}</td>
                                        <td>
                                            @foreach ($categories as $cat)
                                                @if($cat->category_code == $sh->vahicle_category)
                                                    {{ ucwords($cat->name) }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ ucwords($sh->transmission) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('saveascomplete') }}" method="POST">
        @csrf

        @foreach($shedule as $sdl)
            <input type="hidden" value="{{ $sdl->id }}" name="id">
        @endforeach

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="padding-top: 10px; padding-left:10px; color: #222944; font-weight: bold">Instructor</h5>
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($instructor_details as $instructor)
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: middle">
                                                <input type="checkbox" name="instructor[]"  class="checkinstructor" value="{{ $instructor->user->id }}" id="instructor-{{ $instructor->user->user_id }}">
                                                <label for="instructor-{{ $instructor->user->user_id }}" class="instructor-label">
                                                    <div style="display: inline-block" class="instructor-check-icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="profile image" id="img">
                                                    </div>
                                                    <div style="display: inline-block; margin: 10px">
                                                        <h5>{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                                    </div>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="instructor-{{ $instructor->user->user_id }}">
                                                    <h5>{{ $instructor->user->contact_number }}</h5>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2 justify-content-between">
                            <h5 style="padding-left:20px; color: #222944; font-weight: bold">Students</h5>
                            <div style="margin-right: 10px">
                                <button type="button" class="checkall btn btn-primary">Select all</button>
                                <button type="button" class="btn btn-danger" id="delete-btn">Remove from History</button>
                            </div>
                        </div>
                        @if(count($attendids) != 0)
                            <div class="alert alert-info" role="alert">
                                <h5>Instructor has reported attendance</h5>
                            </div>
                        @endif
                        @if($checkallabsent > 0)
                            <div class="alert alert-danger" role="alert">
                                <h5>All students didn't attend</h5>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($students_details as $student)
                                    <tbody>
                                        <tr id="row-{{ $student->user_id }}">
                                            <td style="vertical-align: middle">
                                                <input type="checkbox" name="students[]"  class="checkuser" value="{{ $student->user->id }}" id="student-attend-{{ $student->user_id }}">
                                                <label for="student-attend-{{ $student->user_id }}" class="attend-label">
                                                    <div class="attend-icon" style="display: inline-block">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image" id="img">
                                                    </div>
                                                    <div style="display: inline-block; margin: 10px">
                                                        <h5>{{ $student->user->f_name }} {{ $student->user->l_name }}
                                                        @php
                                                            if(in_array($student->user_id, $attendids)){
                                                                echo '<span class="badge badge-success">Attend</span>';
                                                            }
                                                        @endphp
                                                        </h5>
                                                    </div>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="student-attend-{{ $student->user_id }}" class="attend-label">
                                                    <h5>{{ $student->user->contact_number }}</h5>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div class="text-center" style="padding-top: 10px">
                <button type="submit" class="btn btn-success">Complete</button>
            </div>
        </div>

    </form>

</div>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var clicked = false;
    $(".checkall").on("click", function() {
        $(".checkuser").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect' : 'Select all';
    });

    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');

        var ids = @json($attendids);
        if(ids.length > 0){
            $('#delete-btn').prop('disabled', true);
        }

    });

    $('#delete-btn').click(function(){
        var shedule = @json($shedule);
        var schedule_id;

        shedule.forEach(function(data){
            schedule_id = data.id;
        });

        $.ajax({
            url: '/removefromhistory/'+schedule_id,
            type: 'DELETE',
            success:function(){
                console.log('success');
            },
            complete:function(){
                console.log('complete');
                window.location.href = '{{ route("todayshedules") }}';
            },
            error:function(){
                console.log('error');
            }
        });
    });


</script>

@endsection
