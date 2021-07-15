@extends('layouts.ownerapp')

@section('content')

<style>
    img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    #header{
        color: #222944;
        font-weight: bold;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendances</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Attendances list</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div id="card">
                <a href="{{ route('todayattendance') }}" type="button" class="btn btn-primary">Today</a>
                <a href="{{ route('leaverequest') }}" type="button" class="btn btn-primary">Leave Request</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        @if (session('successmsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('successmsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div class="row">

            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 id="header">Instructors<small>   (only this month attendance)</small></h5>
                            <hr style="border-top: 1px solid #222944">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                <div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $employee->user->profile_img }}" alt="profile image">
                                                    </div>
                                                    <div style="display: inline-block; padding-left: 10px">
                                                        <h5>
                                                            {{ $employee->user->f_name }} {{ $employee->user->l_name }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Otto</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4"></div>

        </div>
    </div>

</div>

@endsection
