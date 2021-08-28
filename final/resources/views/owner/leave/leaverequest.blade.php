@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Leaves</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('attendanceslist') }}"> / Attendance List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Leave Requests</a>
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
        @if (session('errormsg'))
            <div class="alert alert-danger">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    @if(count($pending_requests) == 0)
                        <div class="alert alert-info" role="alert">
                            <h5>No any pending leaves yet</h5>
                        </div>
                    @else
                    <h5 style="color: #222944; font-weight: bold">Manage Leave Request</h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach($pending_requests as $request)
                                <tr id="row-{{ $request->id }}">
                                    <td>
                                        <div class="text-center">
                                            <img src="/uploadimages/instructors_profiles/{{ $request->user->profile_img }}" alt="Profile Image" id="img">
                                            <h6 style="color: #222944">
                                                {{ $request->user->f_name }} {{ $request->user->l_name }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 style="color: #222944">Reson</h6>
                                        {{ $request->reson }}
                                    </td>
                                    <td>
                                        <h6 style="color: #222944">Total Leaves in this month</h6>
                                        @foreach($users_lives as $key => $users_leave)
                                            @if($key == $request->user->id)
                                                {{ $users_leave }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="float-right">
                                        <button class="btn btn-danger" id="btn_ignore">Ignore</button>
                                        <button class="btn btn-success" id="btn_accept">Accept</button>
                                    </td>
                                    <td style="display: none">
                                        <form action="{{ route('acceptleaverequest') }}" method="POST" id="accept">
                                            @csrf
                                            <input type="text" name="request_id" value="{{ $request->id }}">
                                        </form>
                                    </td>
                                    <td style="display: none">
                                        <form action="{{ route('ignorerequest') }}" method="POST" id="ignore">
                                            @csrf
                                            <input type="text" name="request_id" value="{{ $request->id }}">
                                        </form>
                                    </td>
                                </tr>
                                <script>
                                    var letters = '0123456789ABCDEF';
                                    var color = '#';
                                    for (var i = 0; i < 6; i++) {
                                        color += letters[Math.floor(Math.random() * 16)];
                                    }
                                    document.getElementById('row-{{ $request->id }}').style.borderLeft = '10px solid '+color;
                                </script>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('#btn_accept').click(function(){
        $('#accept').submit();
    });

    $('#btn_ignore').click(function(){
        $('#ignore').submit();
    });
</script>

<script>
    $(document).ready(function(){
        $('aside ul .hrms').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
