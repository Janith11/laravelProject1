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

    /* tablet */
    @media (max-width: 768px) {
        .rate:not(:checked) > label {
            font-size:40px !important;
        }
    }

    /* mobile */
    @media (max-width: 510px) {
        .rate:not(:checked) > label {
            height: 30px !important;
            font-size:25px !important;
        }
    }

    /* style for stars */
    .stars .rate{
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }

    .rate {
        height: 50px;
        padding: 10px 10px 10px 10px;
    }

    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }

    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:50px;
        color:#ccc;
    }

    .rate:not(:checked) > label:before {
        content: '★ ';
    }

    .rate > input:checked ~ label {
        color: #ffc700;
    }

    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }

    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Leave a Comment</a>
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
        <div class="row">
            <div class="col-sm-6">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div style="display: inline-block">
                                    <img src="/uploadimages/other/badge.png" alt="Badge" style="width: 100px; height: auto">
                                </div>
                                <div style="display: inline-block">
                                    <h5 style="color: #0AB852; font-weight: bold">Summery</h5>
                                    <hr style="border-top: 1px solid #222944">
                                </div>
                            </div>
                            <div>
                                @foreach($studentdetails as $studentdetail)

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: #222944; font-weight: bold">If you Satisfied Give a comment</h5>
                            <hr style="border-top: 1px solid #222944">
                            <form method="POST" action="{{ route('savecomment') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comment" rows="3"></textarea>
                                </div>
                                <div class="stars">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                                <div id="card" class="text-center">
                                    <button class="btn btn-success" type="submit">Save Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

{{-- comment --}}
{{-- id, user_id, comment, star_number --}}
