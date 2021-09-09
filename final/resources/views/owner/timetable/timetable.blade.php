@extends('layouts.ownerapp')
@section('content')
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
<style>
/*
        @media (min-width: 576px) {
            .card-columns {
                column-count: 1;
            }
        }

        @media (min-width: 768px) {
            .card-columns {
                column-count: 2;
            }
        }

        @media (min-width: 992px) {
            .card-columns {
                column-count: 2;
            }
        }

        @media (min-width: 1200px) {
            .card-columns {
                column-count: 2;
            }
        } */

        ul.ks-cboxtags {
            list-style: none;
            /* padding: 20px; */
            padding: 0px;
            margin-bottom: 0px;
            margin-right: 0px;
            margin-left: 0px;
            display: inline;
            }
        ul.ks-cboxtags li{
            display: inline;
            }
        ul.ks-cboxtags li label{
            display: inline-block;
            background-color: rgba(255, 255, 255, .9);
            border: 2px solid rgba(139, 139, 139, .3);
            color: #adadad;
            border-radius: 25px;
            white-space: nowrap;
            margin: 3px 0px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            transition: all .2s;
            }
        ul.ks-cboxtags li label {
            padding: 8px 12px;
            cursor: pointer;

        }
        ul.ks-cboxtags li label::before {
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 12px;
            padding: 2px 6px 2px 2px;
            content: "\f067";
            transition: transform .3s ease-in-out;
        }
        ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
            content: "\f00c";
            /* transform: rotate(360deg); */
            /* transform: rotate(-360deg); */
            transition: transform .3s ease-in-out;
        }
        ul.ks-cboxtags li input[type="checkbox"]:checked + label {
            border: 2px solid #1bdbf8;
            background-color: #12bbd4;
            color: #fff;
            transition: all .2s;
        }
        ul.ks-cboxtags li input[type="checkbox"] {
            display: absolute;
        }
        ul.ks-cboxtags li input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }
        ul.ks-cboxtags li input[type="checkbox"]:focus + label {
            border: 2px solid #e9a1ff;
        }

        /* my radio button  */
        .myradiobutton input[type="radio"]{
            display: none;
        }
        .myradiobutton label:hover{
            background-color: #2b9ace;
            color: white;
        }
        .myradiobutton input[type="radio"]:checked +label {
            background-color: #122e7c;
            color: white;
        }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
    </div>

    <div class="row mb-2">
        @if (count($errors) > 0)
            @foreach ($errors as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        @endif
    </div>

    <div class="row mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success" role="alert" style="width: 100%">
                {{ session('successmsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{-- card columns --}}
    <div class="row-mb-2" style="padding-top: 10px">

        <div class="card" style="width: 100%; border-radius: 10px">

            <div class="card-body">

                <h5 class="card-title" style="color: #222944; font-weight: bold">Time Table</h5>

                <hr style="border: 0.5px solid #222944">

                <div class="card">

                    @foreach ($timetable as $tbl)
                    <div class="card border-primary mb-2" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #222944; font-weight: bold">{{ $tbl->day_name }}</h5>
                            <hr style="border: 0.3px solid #222944">
                            <div class="row">
                                @if(count($tbl->timeslots) == 0)
                                    <div class="alert alert-info" role="alert" style="width: 100%">
                                        <h5>You haven't create time any slots for {{ $tbl->day_name }} </h5>
                                    </div>
                                @else
                                    <h6 style="padding-left: 10px">Time Table</h6>
                                    <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                                        <table class="table table-hover table-sm">
                                            <thead class="thead bg-dark text-white">
                                                <tr>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Instructor</th>
                                                    <th scope="col">Session Type</th>
                                                    <th scope="col">Vehicle Category</th>
                                                    <th scope="col">Transmission</th>
                                                    <th scope="col">Delete</th>
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
                                                                none
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($timeslot->transmission == 'Auto' || $timeslot->transmission == '3')
                                                                Manual
                                                            @elseif ($timeslot->transmission == 'Manual')
                                                                Manual
                                                            @else
                                                                none
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ route('deletetimeslot', $timeslot->id) }}" id="delete-form-{{ $timeslot->id }}" style="display: none">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                            <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $timeslot->id }}').submit();
                                                            }else{
                                                                event.preventDefault();
                                                            }" href="" class="btn btn-primary" style="background: transparent; border: none; background-repeat:no-repeat;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" onclick="createpanel('{{ $tbl->day_name }}')" style="font-size: 20px; border-radius: 50%; background-color: #122e7c;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="row justify-content-center" >
                                <div id="{{ $tbl->day_name }}" style="display: none; padding-top: 10px" class="w-100">
                                    <div class="card border-success">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2" style="color: #222944">Add New Slot</h6>
                                            <form method="POST" action="{{ route('addtimeslot') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="id" name="date_id" value="{{ $tbl->id }}">
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="name">Session Name</label>
                                                            <input type="text" class="form-control" id="name" name="slot_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="monday">Start Time</label>
                                                            <input type="time" class="form-control" id="time" name="slot_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="monday">Session Type</label><br>
                                                            <div class="form-check form-check-inline myradiobutton">
                                                                <input class="form-check-input" type="radio" name="exam_type" id="{{ $tbl->id}}-theory" value="Theory" onclick="myTheory('{{ $tbl->id}}')">
                                                                <label class="form-check-label p-2 px-2 border border-secondary rounded" for="{{ $tbl->id}}-theory">Theory</label>
                                                            </div>
                                                            <div class="form-check form-check-inline myradiobutton">
                                                                <input class="form-check-input" type="radio" name="exam_type" id="{{ $tbl->id}}-practical" value="Practical" onclick="mypracticalradio('{{ $tbl->id}}')">
                                                                <label class="form-check-label p-2 px-2 border border-secondary rounded" for="{{ $tbl->id}}-practical" >Practical</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row" id="{{ $tbl->id }}-divpractical1">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="result">Vehicle Category</label>
                                                            <select  class="form-control" name="category" id="{{ $tbl->id }}-vehicleCategory">
                                                                @foreach ($VehicleCategories as $category)
                                                                    @if ($category->name == 'bike')
                                                                        <option value= "A">Bike</option>
                                                                    @elseif ($category->name == 'threeweel')
                                                                        <option value= "B1">Three Wheel</option>
                                                                    @elseif ($category->name == 'dualpurposes')
                                                                        <option value= "C1">Car, Van & Dual Purposes</option>
                                                                    @else
                                                                        <option value= "C">Heavy Vehicle</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="result">Transmission Type</label>
                                                            <select  class="form-control" name="transmission" id="{{ $tbl->id }}-transmission" onchange="myTransmission({{ $tbl->id }})">
                                                                <option value= "3">Manual Transmission Only</option>
                                                                <option value= "Auto">Auto</option>
                                                                <option value= "Manual">Manual</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mx-2" id="{{ $tbl->id }}-divpractical2">
                                                    <div class="form-group">
                                                        <label for="monday">Select Instructors</label><br>
                                                        <div>
                                                            <ul class="ks-cboxtags" id="{{ $tbl->id }}-PracticalInstructors">

                                                                {{-- Come from AJAX  --}}

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- for the theory users  --}}
                                                <div class="row mx-2" id="{{ $tbl->id }}-divtheory1">
                                                    <div class="form-group">
                                                        <label for="monday">Select Instructors</label><br>
                                                            <div>
                                                                @foreach ($instructor as $i)
                                                                <ul class="ks-cboxtags">
                                                                    <li>
                                                                        <input type="checkbox" id="{{ $i->id }}{{ $tbl->id }}" name="instructor_id[]" value="{{ $i->user_id }}">
                                                                        <label for="{{ $i->id }}{{ $tbl->id }}">{{ $i->user->f_name }} {{ $i->user->l_name }}</label>
                                                                    </li>
                                                                </ul>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-primary" style="color: white">Add Slot</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
        function createpanel(name) {
            var x = document.getElementById(name);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>



<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
    })
</script>


<script>
    function myTransmission(id){
        var selectedOption = id+'-transmission';
        var vehicleCategory = id+'-vehicleCategory';
        var PracticalInstructors = '#'+id+'-PracticalInstructors';
        var Tvalue= document.getElementById(selectedOption).value;
        var Cvalue= document.getElementById(vehicleCategory).value;

        $.ajax({
                    type: 'get',
                    url: '/timetable/loadinstructor'+'/'+Cvalue+'/'+Tvalue,
                    success: function (data) {
                        if (!$.trim(data)){
                            alert("Please select other option. This option doesn't have instructors: " + data);
                        }
                        // alert(data);
                            $(PracticalInstructors).find('label').remove();
                            for(var i=0; i<data.length;i++){

                                var test = $('<li><input type="checkbox" id="'+data[i].f_name+'" name="instructor_id[]" value="'+data[i].id+'"><label for="'+data[i].f_name+'">'+data[i].l_name+' '+data[i].f_name+'</label></li>') ;
                                $(PracticalInstructors).append(test);
                            }

                    },
                    error: function (error) {
                        alert("Choose relevent category");
                    }
                });

    }

    // $(document).ready(function(){
    //     $('#mytransmission').change(function(){
    //         var category = $('#ins_category option:selected').val();
    //         var trasmission = $('#mytransmission option:selected').val();

            // e.preventDefault();

    //         $.ajax({
    //                 type: 'get',
    //                 url: '/timetable/loadinstructor'+'/'+category+'/'+trasmission,
    //                 success: function (data) {
    //                     if (!$.trim(data)){
    //                         alert("Please select other option. This option doesn't have instructors: " + data);
    //                     }
    //                         $('#myinstructors').find('label').remove();
    //                         for(var i=0; i<data.length;i++){

    //                             var test = $('<li><input type="checkbox" id="'+data[i].f_name+'" name="instructor_id[]" value="'+data[i].id+'"><label for="'+data[i].f_name+'">'+data[i].l_name+' '+data[i].f_name+'</label></li>') ;
    //                             $('#myinstructors').append(test);
    //                         }

    //                 },
    //                 error: function (error) {
    //                     alert("Choose relevent category");
    //                 }
    //             });

    //     });
    // });

</script>

<script>
    function myTheory(id){
        var x = '#'+id+'-theory';
        var y1 = id+'-divpractical1';
        var y2 = id+'-divpractical2';
        var y3 = id+'-divtheory1';

        if($(x).is(":checked")) {
             document.getElementById(y1).style.display ="none";
             document.getElementById(y2).style.display ="none";
             document.getElementById(y3).style.display ="block";
        }

    }
    function mypracticalradio(id){
        var x = '#'+id+'-practical';
        var y1 = id+'-divpractical1';
        var y2 = id+'-divpractical2';
        var y3 = id+'-divtheory1';

        if($(x).is(":checked")) {
             document.getElementById(y1).style.display ="block";
             document.getElementById(y2).style.display ="block";
             document.getElementById(y3).style.display ="none";
        }
    }
</script>

@endsection
