@extends('layouts.student')

@section('content')

<style>
    #card{
        padding: 10px;
    }
    .card{
        border-radius: 10px;
    }
    .card-body{
        border-radius: 10px;
    }

    /* style for progress bar */
    span#procent {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        font-size: 50px;
        transform: translate(-50%, -50%);
        color: #41B883;
    }

    span#procent::after {
        content: '%';
    }

    .canvas-wrap {
        position: relative;
        width: 200px;
        height: 200px;
    }


</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Sheduling</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentsheduling') }}"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Expand More Sessions</a>
    </div>

    <div class="row-mb-2">
        @if(session('errormsg'))
            <div class="alert alert-danger" role="alert">
                <h5><strong>Wooops !!</strong> {{ session('errormsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('succesmsg'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('succesmsg') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <h5>Wooops!! some wrong with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
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
                    <h5 style="color: #222944; font-weight: bold">Request More Sessions</h5>
                    <hr style="border-top: 1px solid #222944">
                    <form method="POST" action="{{ route('requestmore') }}">
                        @csrf
                        <div class="form-group">
                            <label style="color: #222944">Number of Sessions</label>
                            <input type="number" class="form-control" name="number">
                        </div>
                        <label style="color: #222944">Select Category</label>
                        <div>
                            @foreach($values as $value)
                                <div style="display: inline-block; padding-right: 10px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $value['category_code'] }}" name="categories[]" >
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{ $value['category_name'] }}
                                            <br>
                                            ( {{ $value['training_type'] }}
                                            , {{ $value['transmission'] }} )
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- @if(count($unselect_category) > 0)
                            <label>Select Another</label>
                            <div>
                                <table>
                                    @foreach($unselect_category as $unselect)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" value="{{ $unselect['category_code'] }}" name="unselect[]">
                                            <label for="">{{ $unselect['category_name'] }}</label>
                                        </td>
                                        <td>
                                            <div class="form-check" style="display: inline-block">
                                                <input class="form-check-input" type="radio" name="exampleRadios"  value="training" checked>
                                                <label class="form-check-label" >
                                                    Training
                                                </label>
                                            </div>
                                            <div class="form-check" style="display: inline-block">
                                                <input class="form-check-input" type="radio" name="exampleRadios"  value="without_training" checked>
                                                <label class="form-check-label" >
                                                    Without Training
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            @if(($unselect['category_code'] != 'C') || ($unselect['category_code'] != 'B1'))
                                                <div class="form-check" style="display: inline-block">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"  value="training" checked>
                                                    <label class="form-check-label" >
                                                        Auto
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"  value="without_training" checked>
                                                    <label class="form-check-label" >
                                                        Manual
                                                    </label>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif --}}
                        <div id="card" class="text-center">
                            <button type="submit" class="btn btn-success">Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
