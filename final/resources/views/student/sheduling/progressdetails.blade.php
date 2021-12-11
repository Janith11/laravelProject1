@extends('layouts.student')

@section('content')

<style>
    .img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
        <a style="padding-top: 6px; padding-left: 10px;"> / Completed Sessions</a>
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

    <div id="card">
        <div class="card">
            <div class="card-body">
                <h5 style="color: #222944; font-weight: bold">Completed Session</h5>
                <hr style="border-top: 1px solid #222944">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Session</th>
                            <th>Instructor</th>
                            <th>Vehicle Category</th>
                            <th>Transmission</th>
                            <th>Session ID</th>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($shedules as $shedule)
                                <tr>
                                    <td class='text-center'>
                                        <div style='background-color:rgb(25, 12, 59); color:white; padding:5x; border-radius: 5px'>{{$count}}</div>
                                    </td>
                                    <td>{{$shedule->date}}</td>
                                    <td>{{$shedule->time}}</td>
                                    <td>{{ucwords($shedule->lesson_type)}}</td>
                                    <td>
                                        @foreach($instructors as $ins)
                                            @if($ins->user_id == $shedule->instructor)
                                                <div>
                                                    <div style="display: inline-block; padding-right: 10px">
                                                        <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="img">
                                                    </div>
                                                    <div style="display: inline-block">
                                                        @php
                                                            if($ins->user->gender = 'male'){
                                                                $name = 'Mr. '.$ins->user->f_name.' '.$ins->user->l_name;
                                                            }else{
                                                                $name = 'Mrs. '.$ins->user->f_name.' '.$ins->user->l_name;
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
                                            @if($cat->category_code == $shedule->vahicle_category)
                                                {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $shedule->transmission }}</td>
                                    <td>{{$shedule->id}}</td>
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

    <script>
        $(document).ready(function(){
            $('aside ul .completesessions').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
