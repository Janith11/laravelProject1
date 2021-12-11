@extends('layouts.ownerapp')

@section('content')

<style>
    .switchbtn{
        border: 0px;
        padding: 10px;
        cursor: pointer;
    }
    .switchbtn:focus{
        outline: 0px;
    }
    .switchbtnclick{
        border-bottom: 4px solid #222944;
    }
    .btnbasedetail{
        padding: 5px;
        cursor: pointer;
        border: 0px;
        border-radius: 10px;
        margin: 5px;
        width: 100%;
    }
    .btnbasedetail:focus{
        outline: 0px;
    }
    .btnbasedetailclick{
        border-left: 4px solid #0FF841;
        border-radius: 0px 10px 10px 0px;
    }
    .img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sessions</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('ownershedulelist') }}"> / Session List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Session Details</a>
    </div>

    <div class="row-mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    @php
                        $text = '';
                        switch($type){
                            case 'lastmonth':
                                $text = 'Last Month';
                                break;
                            case 'sixmonth':
                                $text = 'Last Six Month';
                                break;
                            case 'year':
                                $text = 'Last Year';
                                break;
                            default:
                                break;
                        }
                    @endphp
                    <div class="d-inline-block">
                        <h5 style="color: #010C36; font-weight: bold; padding-left: 10px">Session details about {{ $text }}</h5>
                    </div>
                    {{-- <div class="d-inline-block mr-2">
                        <select class="form-control" onchange="statistics_type()" id="stat_type" name="stat_type">
                            <option value="lastmonth" {{old('stat_type',$type)=="lastmonth"? 'selected':''}}>Last Month</option>
                            <option value="sixmonth" {{old('stat_type',$type)=="sixmonth"? 'selected':''}}>Last Six Month</option>
                            <option value="year" {{old('stat_type',$type)=="year"? 'selected':''}}>Last Year</option>
                        </select>
                    </div> --}}
                </div>
                <hr style="border-top: 2px solid #010C36">
                <div class="row ml-1">
                    <button class="switchbtn switchbtnclick" id="tot" value="tot">Total</button>
                    <button class="switchbtn" id="comp" value="comp">Complete</button>
                    <button class="switchbtn" id="cancel" value="cancel">Cancel</button>
                    <button class="switchbtn" id="incomp" value="incomp">Incomplete</button>
                </div>
                <div class="row">
                    <div id="totalSession" style="width: 100%" class="p-2">
                        @if(count($sessions) == 0)
                            <div class="alert alert-info" role="alert">
                                <h6>No sessions on {{ $text }}</h6>
                            </div>
                        @else
                            <div class="row">
                                <div class="col" id="basic_details" style="border-right: 3px solid #010C36">
                                    @foreach ($sessions as $session)
                                        <button class="btnbasedetail" onclick="displaymore({{ $session->id }})" id="button-{{ $session->id }}">
                                            <div>
                                                <h5 style="color: #010C36; text-align: left"><b>{{ ucfirst($session->title) }}</b> - <small>session number <span class="badge badge-warning">{{ $session->id }}</span></small></h5>
                                            </div>
                                            <div class="text-left">
                                                <div class="d-inline-block">
                                                    <div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                        <i class="fa fa-calendar text-light" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block pr-3">
                                                    <h6 class="text-muted pl-2">{{ $session->date }}</h6>
                                                </div>
                                                <div class="d-inline-block">
                                                    <div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                        <i class="fa fa-clock text-light" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="text-muted pl-2">{{ $session->time }}</h6>
                                                </div>
                                                <div class="d-inline-block pl-3">
                                                    <div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle">
                                                        <i class="fa fa-book text-light" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block">
                                                    <h6 class="text-muted pl-2">{{ ucfirst($session->lesson_type) }}
                                                        @if($session->lesson_type == 'practicle')
                                                            @foreach ($categories as $cat)
                                                                @if($cat->category_code == $session->vahicle_category)
                                                                    <span class="badge badge-warning">{{ ucwords($cat->name) }} - {{ $session->transmission }} </span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                                <div class="col">
                                    <div id="detailsmorepanel" class="bg-muted pl-3">

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .shedulings').css('border-left', '5px solid #00bcd4');
        $('.switchbtn').click(function(){
            $('.switchbtn').removeClass('switchbtnclick');
            $(this).addClass('switchbtnclick');
            console.log($(this).val());
            changebasicdetails($(this).val());
        });
        $('.btnbasedetail').click(function(){
            $('.btnbasedetail').removeClass('btnbasedetailclick');
            $(this).addClass('btnbasedetailclick');
        });
    });

    function changebasicdetails(type){
        const sessions = @json($sessions);
        $('#basic_details').empty();
        $('#detailsmorepanel').empty();
        var stat_type = '';
        switch (type) {
            case 'tot':
                stat_type = 'Total'
                var text = buttonlist(sessions, stat_type);
                $('#basic_details').append(text);
                break;
            case 'comp':
                stat_type = 'Complate';
                let comparray = [];
                sessions.forEach(function(row){
                    if(row.shedule_status == 2){
                        comparray.push(row);
                    }
                });
                var text = buttonlist(comparray, stat_type);
                $('#basic_details').append(text);
                break;
            case 'cancel':
                stat_type = 'Cancel';
                let cancelarray = [];
                sessions.forEach(function(row){
                    if(row.shedule_status == 3){
                        cancelarray.push(row);
                    }
                });
                var text = buttonlist(cancelarray, stat_type);
                $('#basic_details').append(text);
                break;
            case 'incomp':
                stat_type = 'Incomplete';
                let incomparray = [];
                sessions.forEach(function(row){
                    if(row.shedule_status == 4){
                        incomparray.push(row);
                    }
                });
                var text = buttonlist(incomparray, stat_type);
                $('#basic_details').append(text);
                break;
            default:
                break;
        }
    }

    function buttonlist(list, type){
        var text = '';
        if(list.length == 0){
            console.log('empty');
            text = "<div class='alert alert-info'>No "+type+" Sessions</div>";
        }else{
            list.forEach(function(row){
                sub = '<button id="button-'+row.id+'" class="btnbasedetail" onclick="displaymore('+row.id+',this.id)"><div><h5 style="color: #010C36; text-align: left"><b>'+capitalizeFirstLetter(row.title)+'</b> - <small>session number <span class="badge badge-warning">'+row.id+'</span></small></h5></div><div class="text-left"><div class="d-inline-block"><div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle"><i class="fa fa-calendar text-light" aria-hidden="true"></i></div></div><div class="d-inline-block pr-3"><h6 class="text-muted pl-2">'+row.date+'</h6></div><div class="d-inline-block"><div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle"><i class="fa fa-clock text-light" aria-hidden="true"></i></div></div><div class="d-inline-block"><h6 class="text-muted pl-2">'+row.time+'</h6></div><div class="d-inline-block pl-3"><div class="bg-dark pl-2 pr-2 pt-1 pb-1 rounded-circle"><i class="fa fa-book text-light" aria-hidden="true"></i></div></div><div class="d-inline-block"><h6 class="text-muted pl-2">'+capitalizeFirstLetter(row.lesson_type)+' '+trainngcategory(row.lesson_type, row.vahicle_category, row.transmission)+'</h5></div></div></button>';
                text += sub;
            });
        }
        return text;
    }

    function trainngcategory(type, category, trans){
        let categories = @json($categories);
        var text = '';
        if(type == 'practicle'){
            categories.forEach(function(row){
                if(row.category_code == category){
                    text += '<span class="badge badge-warning">'+capitalizeFirstLetter(row.name)+' - '+capitalizeFirstLetter(trans)+'</span>';
                }
            });
            return text;
        }else{
            return text;
        }

    }

    function displaymore(id, btn){
        // console.log(id);
        var session = @json($sessions);
        var text = '';
        session.forEach(function(row){
            if(row.id == id){
                text = "<div><h5 style='color:#222944; font-weight:bold'>Instructor Details</h5></div><div class='bg-light p-2'>"+instructor(row.instructor)+"</div><div class='pt-3'><h5 style='color:#222944; font-weight:bold'>Students Details</h5></div><div>"+students(row.sheduledstudents)+"</div>";
            }
        });
        $('#detailsmorepanel').empty();
        $('#detailsmorepanel').append(text);
        $('.btnbasedetail').removeClass('btnbasedetailclick');
        $('#'+btn).addClass('btnbasedetailclick');
    }

    function instructor(id){
        var instructors = @json($instructors);
        var instructor = '';
        instructors.forEach(function(row){
            if(row.user_id == id){
                instructor = "<div class='d-inline-block'><img src='/uploadimages/instructors_profiles/"+row.user.profile_img+"' alt='Instructor Profile' class='img'></div><div class='d-inline-block pl-3'><h5 style='color:#222944'>"+name(row.user.gender)+' '+capitalizeFirstLetter(row.user.f_name)+' '+capitalizeFirstLetter(row.user.l_name)+"</h5></div>";
            }
        });
        return instructor;
    }

    function students(list){
        var students = @json($students);
        const ids = [];
        var students_list = '';
        list.forEach(function(row){
            ids.push(row.student_id);
        });
        ids.forEach(function(id){
            var child = '';
            students.forEach(function(std){
                if(id == std.user_id){
                    child = "<div class='p-2 bg-light m-2'><div class='d-inline-block'><img src='/uploadimages/students_profiles/"+std.user.profile_img+"' alt='Student Profile' class='img'></div><div class='d-inline-block pl-2'><h5 style='color:#222944; font-weight:bold'>"+capitalizeFirstLetter(std.user.f_name)+' '+capitalizeFirstLetter(std.user.l_name)+"</h5></div></div>";
                }
            });
            students_list += child;
        });
        return students_list;
    }

    // returnn instructor name with gender
    function name(gender){
        if(gender == 'Male'){
            return 'Mrs. ';
        }else{
            return 'Mr. ';
        }
    }

    // get first letter capital
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>

@endsection
