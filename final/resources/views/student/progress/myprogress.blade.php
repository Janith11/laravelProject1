@extends('layouts.student')

@section('content')
<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Progress</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / My Progress</a>
    </div>

    <div class="row row-cols-1">

        <div class="col col-sm-4" style="padding-top: 10px">
            <div class="card h-100">
                <div class="card-body">
                    <h5 style="color: #020C35; font-weight: bold;">About Sessions</h5>
                    <div style="margin: 10px">
                        <canvas id="session-count" style="width: 500px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-sm-4" style="padding-top: 10px">
            <div class="card h-100">
                <div class="card-body">
                    <h5 style="color: #020C35; font-weight: bold;">About Categories</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: #0FD8F3; color: white">
                                <th>Category</th>
                                <th>Sessions</th>
                            </thead>
                            @foreach ($trainingcounts as $count)
                                <tr>
                                    <th>
                                        @foreach ($vcategories as $cat)
                                            @if($cat->category_code == $count['category'])
                                                {{ ucwords($cat->name).' ('.$cat->category_code.')' }}
                                            @endif
                                        @endforeach
                                    </th>
                                    <td>{{ $count['count'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-sm-4" style="padding-top: 10px">
            <div class="card h-100">
                <div class="card-body">
                    <h5 style="color: #020C35; font-weight: bold;">Summery of Progress</h5>
                    <div style="margin: 10px">
                        <canvas id="summery"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row-mb-2">

        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #020C35; font-weight: bold">Summery Progress of Categories</h5>
                    <div>
                        <canvas id="category"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .myprogress').css('border-left', '5px solid #00bcd4');
    });

    var xValues = ["Weak", "Average", "Good", "Very Good"];
    var yValues = @json($yValues);
    var barColors = [
        "#35FF35",
        "#03011F",
        "#FF2957",
        "#FF891A",
    ];

    new Chart("summery", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
            }
        },
    });

    var dataset = @json($dataset);

    new Chart("category", {
        type: "line",
        data: {
            labels: ['Weak', 'Average', 'Good', 'Very Good'],
            datasets: dataset,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    var tot = {{ $total_session->total_session }};
    var cmp = {{ $completed_session->completed_session }};

    new Chart("session-count", {
        type: "bar",
        data: {
            labels: ['Total', 'Completed'],
            datasets: [
                {
                data: [tot, cmp],
                backgroundColor: ['#42FF71', '#031138'],
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>

@endsection
