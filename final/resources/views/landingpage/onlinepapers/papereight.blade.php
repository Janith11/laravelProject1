@extends('layouts.landingpage')
@section('content')
<div class="mb-3">
    <img class="image-fluid p-0 m-0" src="/images/landingpage/examcover.png" alt="Card image cap" style="width: 100%; height: auto;">
</div>
<div class="container mb-5">
    <div class="row mb-2 mt-5">
        <a href="{{route('onlinepaper')}}">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">All Papers</h5>
        </a>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 08</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 08</h1>
    </div>

</div>
@endsection