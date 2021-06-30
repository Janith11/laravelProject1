@extends('layouts.ownerapp')

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Vehicle Categories</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('vehiclecategory') }}"> / Category List</a>
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Some problems with your input.
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Edit Category</h5>
                    <hr style="border: 0.5px solid #222944">
                    @foreach($results as $result)
                        <form action="{{ route('updatecategory') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $result->id }}" name="id">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5  style="color: #222944">Category Code</h5>
                                        <input type="text" class="form-control" name="category_code" value="{{ $result->category_code }}">
                                        <small>use standed category code</small>
                                    </div>
                                    <h5 style="color: #222944;">This category save as</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="base_type" value="light_vehicle" checked>
                                        <label class="form-check-label">
                                            Light Vehicles
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="base_type"  value="heavy_vehicle">
                                        <label class="form-check-label">
                                            Heavy Vehicles
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 style="color: #222944">Category Name</h5>
                                        <input type="text" class="form-control" name="category_name" value="{{ $result->name }}">
                                        <small>give short name</small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h5 style="color: #222944">Session Days</h5>
                                    @foreach($result->sessionhours as $session_day)
                                        @if ($session_day->session_type == 'theory')
                                            <div class="form-group">
                                                <label>Theory Sessions</label>
                                                <input type="number" class="form-control" name="theory_session" value="{{ $session_day->total_days }}">
                                            </div>
                                        @endif
                                        @if($session_day->session_type == 'practicle')
                                            <div class="form-group">
                                                <label>Practicle Sessions</label>
                                                <input type="number" class="form-control" name="practicle_session" value="{{ $session_day->total_days }}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
