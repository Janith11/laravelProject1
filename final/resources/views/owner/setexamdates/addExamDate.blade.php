@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Exam Dates</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownerexamdates') }}" style="padding-top: 6px; padding-left: 10px"> / Calender</a>
        <a style="padding-top: 6px; padding-left: 10px">/ Add new Date </a>
    </div>


    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('categoryerror'))
            <div class="alert alert-danger">
                <h5>{{ session('categoryerror') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="col-mb-2">
        @if(count($errors) > 0)
            <div class="container">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card-body">
                <h5 style="color: #222944; font-weight: bold">Exam Dates</h5>
                <hr style="border: 0.5px solid #222944">
                {{-- table  --}}
                <div class="mt-2 mb-2">
                    <h5>@php echo $date; @endphp Other Exam Dates</h5>
                    <table class="table striped table-hover table-sm mt-4">
                        <thead>
                          <tr>
                            <th scope="col">Exam Type</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Type</th>
                            <th scope="col">Vehicle Category</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($otherExamDates as $item)
                            @php
                                $category='-';
                                if($item->vehicle_category == 'A'){
                                    $category = 'Motor Bicycle';
                                }elseif ($item->vehicle_category == 'B') {
                                    $category = 'Three Weel';
                                }elseif ($item->vehicle_category == 'C1') {
                                    $category = 'Car, Van and Dual Purpose Vehicle';
                                }elseif ($item->vehicle_category == 'C') {
                                    $category = 'Heavy Vehicle';
                                }else {
                                    $category='-';
                                }
                            @endphp
                        <tr>
                            <th scope="row">{{ $item->exam_type }}</th>
                            <td>{{ $item->exam_start_time }}</td>
                            <td>{{ $item->exam_end_time }}</td>
                            <td>
                                @php
                                    echo $category;
                                @endphp
                            </td>
                          </tr>    
                        @endforeach
                        </tbody>
                      </table>
                </div>

                {{-- form  --}}
                <div>
                    <h5 style="color: #222944; font-weight: bold" class="mt-4">Add new Exam Dates</h5>
                    <form action="{{ route('saveexamdate') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="examdate">Exam Date</label>
                                <input type="date" name="examdate" class="form-control" id="examdate"  value="@php echo $date; @endphp" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="examtype">Exam Type</label>
                                <select name="examtype" id="examtype" class="form-control" onchange="myfunction1()">
                                    <option selected value="Theory" id="optheory">Theory</option>
                                    <option value="Practical" id="oppractical" >Practical</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="allvehiclecategories" style="display: none;">
                                <label for="endtime">Vehicle Category</label>
                                <select name="vehiclecategory" id="vehicleCategory1" class="form-control">
                                    <option selected value="A">Motor Bicycle</option>
                                    <option value="B">Three Wheel</option>
                                    <option value="C1">Car, Van and Dual Purpose Vehicle</option>
                                    <option value="C">Heavy Vehicle</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="starttime">Start Time</label>
                                <input type="time" name="starttime" class="form-control" id="starttime" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="endtime">End Time</label>
                                <input type="time" name="endtime" class="form-control" id="endtime" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Exam Date</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

<script>
    function myfunction1(){
        var x1 = '#'+'optheory';
        var x2 = '#'+'oppractical';
        var y1 = 'allvehiclecategories';
       
        if($(x1).is(":checked")) {
             document.getElementById(y1).style.display ="none";
        }if($(x2).is(":checked")) {
             document.getElementById(y1).style.display ="block";
        }

    }
</script>

@endsection
