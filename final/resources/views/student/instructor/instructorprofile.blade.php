@extends('layouts.student')

@section('content')

<style>
    .col{
        padding-right: 0px !important;
    }

    /* instructor profile style */
    .instructorprofile{
        width: 80%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Instructors</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentinstructorsdetails') }}"> / Instructors List</a>
        <a style="padding-top: 6px; padding-left: 10px;"> / Instructor Profile</a>
    </div>

    @foreach ($instructor as $ins)

    <div class="row-mb-2">
        <div class="row row-cols-1">
            <div class="col col-sm-4" style="padding-top: 10px">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="text-center" style="position: relative">
                            <img src="/uploadimages/instructors_profiles/{{ $ins->user->profile_img }}" alt="Instructor Profile" class="instructorprofile">
                        </div>
                        <div style="padding-top: 20px">
                            @php
                                if($ins->user->gender == 'male'){
                                    $name = 'Mr. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->m_name).' '.ucwords($ins->user->l_name);
                                }else{
                                    $name = 'Mrs. '.ucwords($ins->user->f_name).' '.ucwords($ins->user->m_name).' '.ucwords($ins->user->l_name);
                                }
                            @endphp
                            <h5 style="color: #020C33; font-weight: bold">{{ $name }}</h5>
                            <h6 style="color: #020C33">{{ $ins->user->email }}</h6>
                            <h6 style="color: #DD6605; font-weight: bold; padding-top: 20px; margin-bottom: 0px" >Training Categories</h6>
                            <hr style="border-top: 1px solid #020C33; margin-top: 0px; top: -2px">
                            @foreach ($ins->categories as $category)
                                @foreach ($vehiclecaategories as $vehicle)
                                    @if($category->category == $vehicle->category_code)
                                        <div style="background-color: #71FF90; color: #030D33; border-radius: 5px; padding: 5px">
                                            <h6 style="margin: 10px">{{ ucwords($vehicle->name) }} ({{ $category->category }})
                                                <span style="float: right; background-color: #030D33; color: white; padding: 5px 10px 5px 10px; border-radius: 50px; margin-top: -1px; font-size: 10px">
                                                    @php
                                                        if($category->transmission == 3){
                                                            $transmission = 'Manual';
                                                        }else {
                                                            $transmission = ucwords($category->transmission);
                                                        }
                                                    @endphp
                                                    {{ $transmission }}
                                                </span>
                                            </h6>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            @endforeach
                            <h6 style="color: #DD6605; font-weight: bold; padding-top: 20px; margin-bottom: 0px" >Working History</h6>
                            <hr style="border-top: 1px solid #020C33; margin-top: 0px; top: -2px">
                            <p>Join with us on {{ $ins->user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-sm-8" style="padding-top: 10px">
                <div class="card h-100">
                    <div class="card-body">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

    <script>

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            responsive: true,
            type: 'line',
            data: {
                labels: ['one', 'two', 'three'],
                datasets: [{
                    label: 'Attend',
                    data: [10, 5, 6],
                    backgroundColor: [
                        'rgba(41, 241, 195, 0.2)',
                    ],
                    borderColor: [
                        'rgba(42, 187, 155, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                tooltips: {

                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                bodyFontColor: '#0E173B',
            }
        });

        $(document).ready(function(){
            $('aside ul .instructor').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
