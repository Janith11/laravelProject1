@extends('layouts.student')

@section('content')

<style>
    #card{
        padding: 10px;
    }
    .card{
        border-radius: 10px;
    }
    .card-body{
        border-radius: 10px;
    }

    /* style for progress bar */
    span#procent {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        font-size: 50px;
        transform: translate(-50%, -50%);
        color: #41B883;
    }

    span#procent::after {
        content: '%';
    }

    .canvas-wrap {
        position: relative;
        width: 200px;
        height: 200px;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Sessions List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Session History</a>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('succesmsg'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('succesmsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5>Wooops!! some wrong with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Session History</h5>
                    <hr style="border-top: 1px solid #222944">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <th></th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Session</th>
                                <th>Instructor</th>
                                <th>Vehicle category</th>
                                <th>Transmission</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($history as $detail)
                                    <tr>
                                        <td style="vertical-align: middle">
                                            <div style="background-color: #41B883; width: 30px; height: 30px; border-radius: 50%; text-align: center; padding-top: 5px; color: white">
                                                {{$count}}
                                            </div>
                                        </td>
                                        <td>{{$detail->shedule->date}}</td>
                                        <td>{{$detail->shedule->time}}</td>
                                        <td>{{ ucwords($detail->shedule->lesson_type) }}</td>
                                        <td>
                                            @foreach($instructors as $instructor)
                                                @if($instructor->user_id == $detail->shedule->instructor)
                                                <div>
                                                    <div style="display: inline-block; padding-right: 10px">
                                                        <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor profile" style="width: 30px; height: auto; border-radius: 50%">
                                                    </div>
                                                    <div style="display: inline-block">
                                                        @php
                                                            if ($instructor->user->gender == 'male'){
                                                                $name = 'Mr. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                            }else{
                                                                $name = 'Mrs. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                            }
                                                        @endphp
                                                        {{ $name }}
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($categories as $cat)
                                                @if ($cat->category_code == $detail->shedule->vahicle_category)
                                                    {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $detail->shedule->transmission }}</td>
                                        <td>
                                            @if($detail->shedule->shedule_status == 0)
                                                Cancel
                                            @elseif($detail->shedule->shedule_status == 1)
                                                Upcomming
                                            @elseif($detail->shedule->shedule_status == 2)
                                                Complete
                                            @elseif($detail->shedule->shedule_status == 3)
                                                Incomplete
                                            @else
                                                Pending
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $count += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script>
        $(document).ready(function(){
            $('aside ul .shedule').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection

{{-- comment --}}
{{-- id, user_id, comment, star_number --}}
