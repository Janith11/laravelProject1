@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    
    .card{
        box-shadow: 2px 1px 12px 1px;
        border-radius: 45px;
        /* background: rgb(139,211,217); */
        background: linear-gradient(90deg, rgba(139,211,217,1) 0%, rgba(108,98,198,1) 47%, rgba(22,64,247,1) 100%);
    }
</style>

<div class="container">
    {{-- <div class="row"> --}}
        <div class="card ">
            {{-- <div class="card-header">{{ __('Login') }}</div> --}}
             <div class="card-body">
                 <div class="row">
                    <div class="col p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 style="color: #2d42b9">Login</h1>
                            <div class="form-group row ">
                                    <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>                        
                                    <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror          
                            </div>

                            <div class="form-group row">
                                <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                {{-- <div class="col-md-6 offset-md-4"> --}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row mb-0">
                                {{-- <div class="col-md-8 offset-md-4"> --}}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                    <div class="col p-5 rightcard">
                        <h1 style="color: white">Welcome Back !</h1>
                        <p style="color: white">Sign into get the newest updates with the new schedules, requests and messages for designed specific for you.</p>
                        <p style="color: white">Please login to continue.</p>
                        <div class="row bg-light p-2 rounded shadow text-center">
                            <!-- Facebook -->
                            <div class="col p-1 ">
                                <a style="color: #3b5998;" href="#!" role="button" class=""><i class="fab fa-facebook-f fa-lg "></i></a>            
                            </div>
                            <div class="col p-1 btn">
                            <!-- Twitter -->
                                <a style="color: #55acee;" href="#!" role="button"><i class="fab fa-twitter fa-lg"></i></a> 
                            </div>
                            <div class="col p-1 btn">
                            <!-- Google -->
                                <a style="color: #dd4b39;" href="#!" role="button"><i class="fab fa-google fa-lg"></i></a>                  
                            </div>
                            <div class="col p-1 btn">
                            <!-- Instagram -->
                                <a style="color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram fa-lg"></i></a>                       
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
