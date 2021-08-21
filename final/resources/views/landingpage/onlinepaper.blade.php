@extends('layouts.landingpage')
@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    .alert-primary:hover {
       transform: scale(1.02);
   }
</style>
<div class="mb-3">
    <img class="image-fluid p-0 m-0" src="/images/landingpage/examcover.png" alt="Card image cap" style="width: 100%; height: auto;">
</div>
<div class="container">
   
    <div class="card mt-2 mb-5">
        <div class="card-body">
            <div class="row mt-2 mb-4">
                <div class="col">
                    <a href="{{ route('onlinepaperone') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 01</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('onlinepapertwo') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 02</h5> 
                            </div>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <a href="{{ route('onlinepaperthree') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 03</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('onlinepaperfour') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 04</h5> 
                            </div>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <a href="{{ route('onlinepaperfive') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 05</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('onlinepapersix') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 06</h5> 
                            </div>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <a href="{{ route('onlinepaperseven') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 07</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('onlinepapereight') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 08</h5> 
                            </div>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <a href="{{ route('onlinepapernine') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 09</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('onlinepaperten') }}">
                        <div class="card alert-primary">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="far fa-paper-plane text-success"></i> Paper 10</h5> 
                            </div>
                        </div>
                    </a>    
                </div>
            </div>
        </div>
    </div>

</div> 

@endsection