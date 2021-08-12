@extends('layouts.instructorapp')

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

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendance</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Report attendance</a>
    </div>

    <div class="row mb-2 justify-content-end">
        <button type="button" class="checkall btn btn-primary">Select all</button>
    </div>

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                <h5>
                    <strong>Wooops !!</strong> {{ session('errormsg') }}
                </h5>
            </div>
        </div>
    @endif

    <form action="{{ route('informattendance') }}" method="POST">
        @csrf
        @foreach($shedule as $sdl)
            <input type="hidden" value="{{ $sdl->id }}" name="id">
        @endforeach

        <div class="row-mb-2">
            <div class="row">
                @foreach($students_details as $student)
                    <div class="col-sm-6">
                        <div id="card">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div style="display: inline-block; padding-right: 10px">
                                            <input type="checkbox" name="students[]"  class="checkuser" value="{{ $student->user->id }}">
                                        </div>
                                        <div style="display: inline-block; padding-right: 10px">
                                            <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image" id="img">
                                        </div>
                                        <div style="display: inline-block">
                                            <h5 style="color: #222944">{{ $student->user->f_name }} {{ $student->user->l_name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div style="display: inline-block">
                                <input type="checkbox" name="empty[]" value="1" class="checkuser">
                            </div>
                            <div style="display: inline-block">
                                <h5 style="color: red">No enyone attend</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row-mb-2">
            <div id="card">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>

</div>

<script>
    var clicked = false;
    $(".checkall").on("click", function() {
        $(".checkuser").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect' : 'Select all';
    });

    $(document).ready(function(){
        $('aside ul .shedules').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
