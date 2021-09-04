@extends('layouts.student')

@section('content')

<style>

    /* style for insructor profile image */
    .instructor-profiles{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        z-index: 10;
        position: absolute;
        right: 60%;
    }

    .profilesvg{
        margin-top: 50px;
    }

    /* view profile button */
    .viewprofile{
        text-decoration: none;
        background-color: #00AA25;
        color: white !important;
        padding: 5px 10px 5px 10px;
        border-radius: 50px;
        z-index: 10;
        position: absolute;
        right: 10%;
        top: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .viewprofile:hover{
        text-decoration: none !important;
    }

    @media(max-width: 510px){
        .viewprofile{
            top: 40%;
        }
    }

    .col{
        padding-right: 0px !important;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Instructors List</a>
    </div>

    <div class="row-mb-2">
        <div class="row row-cols-1">

            @foreach ($instructors as $instructor)
                <div class="col col-sm-4" style="padding-top: 10px">
                    <div class="card h-100">
                        <div class="card-body">
                            <div style="position: relative">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="profilesvg"><path fill="#010742" fill-opacity="1" d="M0,192L60,160C120,128,240,64,360,42.7C480,21,600,43,720,74.7C840,107,960,149,1080,144C1200,139,1320,85,1380,58.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                                </svg>
                                <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Instructor Profile" class="instructor-profiles">
                                <a href="{{ route('studentinstructordetails', $instructor->user_id) }}" class="viewprofile">more info</a>
                            </div>
                            <div style="padding-top: 20px">
                                <h5 style="color: #030D33; font-weight: bold">
                                    @php
                                        if($instructor->user->gender == 'male'){
                                            $name = 'Mr. '.ucwords($instructor->user->f_name).' '.ucwords($instructor->user->l_name);
                                        }
                                    @endphp
                                    {{ $name }}
                                </h5>
                                <h6>{{ $instructor->user->email }}</h6>
                            </div>
                            <div>
                                <h6 style="color: #DD6605; font-weight: bold; padding-top: 20px" >Training Categories</h6>
                                @foreach ($instructor->categories as $category)
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .instructor').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
