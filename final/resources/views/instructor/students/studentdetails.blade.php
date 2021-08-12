@extends('layouts.instructorapp')

@section('content')

<style>
    #img{
        width: 250px;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }

    #header{
        color: #222944;
        font-weight: bold;
    }

    td{
        padding-top: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        color: #222944;
    }

    th{
        color: #222944;
    }

    #types{
        color: #222944;
        padding-top: 10px;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Students</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('instructorstudentslist') }}"> / Students List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Details</a>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    @foreach($student as $result)
                        <div class="row">

                            <div class="col-sm-4 text-center">
                                <img src="/uploadimages/students_profiles/{{ $result->user->profile_img }}" alt="Profile image" id="img">
                                <div id="card" >
                                    <h5 style="color: #222944; font-weight: bold">
                                        {{ $result->user->f_name }} {{ $result->user->m_name }} {{ $result->user->l_name }}
                                    </h5>

                                    <h5>
                                        {{ $result->user->email }}
                                    </h5>
                                </div>
                            </div>

                            <div class="col-sm-4" style="border-left: 2px solid black">
                                <h5 id="header">Other Information</h5>
                                <table>
                                    <tr>
                                        <th>
                                            Student ID
                                        </th>
                                        <td>
                                            {{ $result->user_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            NiC number
                                        </th>
                                        <td>
                                            {{ $result->user->nic_number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            DOB
                                        </th>
                                        <td>
                                            {{ $result->user->dob }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Gender
                                        </th>
                                        <td>
                                            {{ $result->user->gender }}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-sm-4" style="border-left: 2px solid black">
                                <h5 id="header">Training Information</h5>
                                <ul style="list-style-type: none">
                                    @foreach($result->studentcategories as $trainingcategory)
                                        <li id="types">
                                            {{ $trainingcategory->vehiclecategory->name }} / {{ $trainingcategory->vehiclecategory->category_code }}
                                        </li>
                                    @endforeach
                                </ul>
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
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
