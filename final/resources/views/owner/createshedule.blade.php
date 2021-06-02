@extends('layouts.ownerapp')

@section('content')
<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> > Shedule List</a>
        <a href="{{ route('owneraddshedule') }}" style="padding-top: 6px; padding-left: 10px"> > Calender</a>
    </div>

    <div class="row mb-2">
        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card">
                <div class="card-body">
                {{-- <div class="row"> --}}
                    {{-- <div class="col-lg-3"> --}}
                    <h5 style="color: #222944; font-weight: bold">Selected Date  <br>{{ $date }}</h5>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Selected Time  <br>{{ $time }}</h5>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Selected Lesson Type </h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1" style="color: #222944;">Theory</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2" style="color: #222944;">Practicle</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="padding-top: 10px">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        {{-- <label style="color: #222944; font-size: 20px; font-weight: bold">Shedule Name :</label> --}}
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Shedule name">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Select Instructor</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Instructor name" style="border-radius: 50px">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary" style="border: 0px; border-radius: 50%; background-color: lightgray">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border: 0.5px solid #222944">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Vehicle Types</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="{{ $instructor->id }}" >
                                        </div>
                                    </th>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <img class="card-img-top img-fluid rounded-circle w-50 mb-3 shadow mx-auto d-block m-3" src="https://avatarfiles.alphacoders.com/979/thumb-97920.png" alt="Card image cap">
                                            </div>
                                            <div class="col">
                                                <h4>{{ $instructor->username }}</h4>
                                                <br>
                                                <h4>{{ $instructor->email }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>contact number here</td>
                                    <td>
                                        <ul>
                                            {{-- @foreach (vehicletypes as vehicletype)
                                                <li>{{ vehicletype }}</li>
                                            @endforeach --}}
                                        </ul>
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

    <div class="row mb-2">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="card-title" style="color: #222944; font-weight: bold">Select Students</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputstudent" placeholder="student name" style="border-radius: 50px">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary" style="border: 0px; border-radius: 50%; background-color: lightgray">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#222944" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border: 0.5px solid #222944">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Contact Number</th>
                                    {{-- <th scope="col">Handle</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student )
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="{{ $student->id }}" >
                                        </div>
                                    </th>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <img class="card-img-top img-fluid rounded-circle w-50 mb-3 shadow mx-auto d-block m-3" src="https://avatarfiles.alphacoders.com/979/thumb-97920.png" alt="Card image cap">
                                            </div>
                                            <div class="col">
                                                <h4>{{ $student->username }}</h4>
                                                <br>
                                                <h4>{{ $student->email }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Contact Number Here</td>
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
