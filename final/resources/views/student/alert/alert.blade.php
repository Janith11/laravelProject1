@extends('layouts.student')

@section('content')

<style>
    .image{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Notifications</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Notifications</a>
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5> Wooops ! Some input with errors</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold; padding-bottom: 10px">All Notifications</h5>

                    <h6 style=" width: 100%;border-bottom: 1px solid #000; line-height: 0.1em;
                    margin: 10px 0 20px; "><span style="background:#fff; padding:0 10px; ">Unread Messages</span></h6>

                    <div class="table-responsive">
                        <table class="table">
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($values as $value)
                                @if($value['type'] == 0)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>
                                            <div>
                                                <p>{{ $value['message'] }}</p>
                                            </div>
                                            <div>
                                                <small>{{ $value['time']->diffForHumans() }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($instructors as $instructor)
                                                @if($instructor->user_id == $value['instructor'])
                                                <div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="image">
                                                    </div>
                                                    <div style="display: inline-block; padding-left: 10px">
                                                        {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                    </div>
                                                </div>

                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $value['session'] }}
                                        </td>
                                        <td>
                                            @if($value['status'] == 0)
                                                Cancel
                                            @elseif($value['status'] == 1)
                                                Pending
                                            @elseif($value['status'] == 2)
                                                Complete
                                            @elseif($value['status'] == 3)
                                                Incomplete
                                            @else
                                                Requested Session
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('studentmarkasread') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="alert_id" value="{{ $value['id'] }}">
                                                <button type="submit" style=" background-color: rgb(79, 233, 130); padding: 5px; border-radius: 50px; color: rgb(2, 0, 26); border: 0px" class="btn">Mark as Read</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $count += 1;
                                    @endphp
                                @endif
                            @endforeach
                        </table>
                    </div>

                    <h6 style=" width: 100%;border-bottom: 1px solid #000; line-height: 0.1em;
                    margin: 10px 0 20px; "><span style="background:#fff; padding:0 10px; ">Previous Messages</span></h6>

                    <div class="table-responsive">
                        <table class="table">
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($values as $value)
                                @if($value['type'] == 1)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>
                                            <div>
                                                <p>{{ $value['message'] }}</p>
                                            </div>
                                            <div>
                                                <small>{{ $value['time']->diffForHumans() }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($instructors as $instructor)
                                                @if($instructor->user_id == $value['instructor'])
                                                <div>
                                                    <div style="display: inline-block">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="image">
                                                    </div>
                                                    <div style="display: inline-block; padding-left: 10px">
                                                        {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                    </div>
                                                </div>

                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $value['session'] }}
                                        </td>
                                        <td>
                                            @if($value['status'] == 0)
                                                Cancel
                                            @elseif($value['status'] == 1)
                                                Pending
                                            @elseif($value['status'] == 2)
                                                Complete
                                            @elseif($value['status'] == 3)
                                                Incomplete
                                            @else
                                                Requested Session
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $count += 1;
                                    @endphp
                                @endif
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
