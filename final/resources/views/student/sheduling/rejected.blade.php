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
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Rijected List</a>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #060D2B; font-weight: bold">Rijected Shedules</h5>
                    <hr style="border-top: 1px solid #060D2B">
                    @if(count($rejectedlists) == 0)
                        <div class="alert alert-info" role="alert">
                            <h5>No any Canceled requests !!</h5>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Session</th>
                                    <th>Instructor</th>
                                    <th>Vehicle Category</th>
                                    <th>Transmission</th>
                                    <th>Session ID</th>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedlists as $list)
                                        <tr>
                                            <td>{{ $list->shedules->date }}</td>
                                            <td>{{ $list->shedules->time }}</td>
                                            <td>{{ ucwords($list->shedules->lesson_type) }}</td>
                                            <td>
                                                <div>
                                                    @foreach ($instructors as $instructor)
                                                        @if($instructor->user_id == $list->shedules->instructor)
                                                            <div style="display: inline-block">
                                                                <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="img">
                                                            </div>
                                                            <div style="display: inline-block; padding-left: 10px">
                                                                @php
                                                                    if($instructor->user->gender = 'male'){
                                                                        $name = 'Mr. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                    }else{
                                                                        $name = 'Mrs. '.$instructor->user->f_name.' '.$instructor->user->l_name;
                                                                    }
                                                                @endphp
                                                                {{ $name }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($categories as $cat)
                                                    @if($cat->category_code == $list->shedules->vahicle_category)
                                                        {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $list->shedules->transmission }}
                                            </td>
                                            <td>{{ $list->shedules->id }}</td>
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

</div>

<script>
    $(document).ready(function(){
        $('aside ul .completesessions').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
