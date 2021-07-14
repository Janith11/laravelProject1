@extends('layouts.instructorapp')

@section('content')

<style>
    img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
        <a style="padding-top: 6px; padding-left: 10px"> / Students List</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div style="padding-right: 15px">
                <div class="form-group">
                    <input type="text"  class="form-control" style="border-radius: 50px">
                </div>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">All Students</h5>
                    <hr style="border: 0.5px solid #222944">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col ">Name</th>
                                <th scope="col ">NIC</th>
                                <th scope="col">Id</th>
                                <th scope="col">Training Categories</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div style="display: inline-block; padding-left: 10px">
                                            <img src="/uploadimages/students_profiles/{{ $student->user->profile_img }}" alt="profile image">
                                        </div>
                                        <div style="display: inline-block; padding-left: 10px; vertical-align: middle">
                                            <h6>{{$student->user->f_name }} {{$student->user->l_name}}</h6>
                                            <p>{{ $student->user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $student->user->nic_number}}</td>
                                <td>{{ $student->user_id}}</td>
                                <td>
                                    <ul>
                                        @foreach($student->trainingvahiclecategorys as $trainingcategory)
                                            <li>
                                                {{ $trainingcategory->vehiclecategory->name }} / {{ $trainingcategory->vehiclecategory->category_code }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('instructorstudentsdetails', $student->user_id) }}">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
