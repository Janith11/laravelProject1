@extends('layouts.student')
@section('content')
<div class="container">
    
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Time Table</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('viewtimetable') }}" style="padding-top: 6px; padding-left: 10px"> / All Time Tables</a>
    </div>

    <div class="row-mb-2" style="padding-top: 10px">
        <div class="card" style="width: 100%; border-radius: 10px">
            <div class="card-body">
                <h5 class="card-title" style="color: #222944; font-weight: bold">Time Table <small class="text-muted">(All Time Tables of of Driving School)</small></h5>
                <hr style="border: 0.5px solid #222944">
                <div class="card">
                    @foreach ($timetable as $tbl)
                    <div class="card border-primary mb-3" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #222944; font-weight: bold">{{ ucfirst($tbl->day_name) }}</h5>
                            <hr style="border: 0.3px solid #222944">
                            <div class="row">
                                @if(count($tbl->timeslots) == 0)
                                    <div class="alert alert-info" role="alert" style="width: 100%">
                                        <h5 class="text-center">No Time Table in {{ ucfirst($tbl->day_name) }} </h5>
                                    </div>
                                @else
                                    <h6 style="padding-left: 10px">Time Table</h6>
                                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                                        <table class="table table-striped table-sm table-hover table-responsive w-100 d-block d-md-table">
                                            <thead class="thead bg-dark text-white">
                                                <tr>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Instructor</th>
                                                    <th scope="col">Session Type</th>
                                                    <th scope="col">Vehicle Category</th>
                                                    <th scope="col">Transmission</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tbl->timeslots as $timeslot)
                                                    <tr>
                                                        <td>
                                                            {{ $timeslot->time_slot }}
                                                        </td>
                                                        <td>
                                                            <span class="bg-success p-1" style="color: white; border-radius: 3px;">{{ $timeslot->slot_name }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($instructordetails as $idtl)
                                                                    @if ($timeslot->id == $idtl->time_slot_id)
                                                                    @foreach ($idtl->releventinstructor as $iname)
                                                                        <span class=" p-1">{{ $iname->f_name }} {{ $iname->l_name.', '}}</span>
                                                                    @endforeach
                                                                    @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $timeslot->exam_type }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if($timeslot->vehicle_category == 'A')
                                                                Bike 
                                                            @elseif ($timeslot->vehicle_category == 'B1')
                                                                Three Wheel
                                                            @elseif ($timeslot->vehicle_category == 'C1')
                                                                Car, Van & etc.
                                                            @elseif ($timeslot->vehicle_category == 'C')
                                                                Heavy Vehicle
                                                            @else
                                                                None
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($timeslot->transmission == 'Manual' || $timeslot->transmission == '3')
                                                                Manual
                                                            @elseif ($timeslot->transmission == 'Auto')
                                                                Auto    
                                                            @else
                                                                None
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('aside ul .timetable').css('border-left', '5px solid #00bcd4');
    })
</script>
@endsection