@extends('layouts.app')


@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
    .card{
        box-shadow: 6px 6px 20px 6px;
        border-radius: 45px;
        /* background: rgb(139,211,217); */
        /* background: linear-gradient(90deg, rgba(139,211,217,1) 0%, rgba(108,98,198,1) 47%, rgba(22,64,247,1) 100%); */
    }
</style>
<div class="container col-12">
    <div class="row ">
        <div >
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                    <h3 class="mt-1 mb-4">{{ __('Register') }}</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="firstname" class=" col-form-label text-md-right">{{ __('Firstname') }}</label>                      
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"  autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="middlename" class=" col-form-label text-md-right">{{ __('Middleame') }}</label>
                                <input id="middlename" type="text" class="form-control @error('nmiddlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}"  autocomplete="middlename" autofocus>

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="lastname" class="col-form-label text-md-right">{{ __('Lastname') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
                                

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="nicnumber" class="ol-form-label text-md-right">{{ __('Nic_number') }}</label>
                                <input id="nicnumber" type="text" class="form-control @error('nicnumber') is-invalid @enderror" name="nicnumber" value="{{ old('nicnumber') }}"  autocomplete="nicnumber" autofocus>

                                @error('nicnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="gender" class= "col-form-label text-md-right">{{ __('Gender') }}</label>
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input" type="radio" name="gender" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female" checked>
                                    <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="contactno" class=" col-form-label text-md-right">{{ __('Contact_no') }}</label>
                                <input id="contactno" type="text" class="form-control @error('contactno') is-invalid @enderror" name="contactno" value="{{ old('contactno') }}" autocomplete="contactno" autofocus>

                                @error('contactno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="birthday" class=" col-form-label text-md-right">{{ __('Birthday') }}</label>
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" autocomplete="birthday" autofocus>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group">  
                            @foreach ($vehicalcategory as $vehicle) 
                            <div class="row">
                            <div class="col-md-4 mt-2" id="{{ $vehicle->category_code }}A">
                                <input type="checkbox" class="form-check-input btn-check" name="vehicle_category[]" value="{{ $vehicle->category_code }}" id="{{ $vehicle->category_code }}1">
                                <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}1" class="col-form-label text-md-right">{{ $vehicle->name }}</label>
                            </div>
                        {{-- <div id="{{ $vehicle->category_code }}B"> --}}
                            <div class="col-md-4" > 
                                <div class="btn-group" id="{{ $vehicle->category_code }}B">                       
                                    <input type="radio" class="btn-check" name="{{ $vehicle->category_code }}" value="Training" id="{{ $vehicle->id }}1" autocomplete="off" />
                                    <label class="btn btn-outline-success" for="{{ $vehicle->id }}1">Training</label>
                                  
                                    <input type="radio" class="btn-check" name="{{ $vehicle->category_code }}" value="Without Training" id="{{ $vehicle->id }}2" autocomplete="off" />
                                    <label class="btn btn-outline-danger" for="{{ $vehicle->id }}2">Without Training</label>
                                  </div>
                            </div>
                            @if( $vehicle->transmission == 'automanual')
                            <div class="col-md-4" id="{{ $vehicle->category_code }}B">
                                <div class="btn-group">                       
                                    <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Auto" id="{{ $vehicle->id }}3" autocomplete="off"/>
                                    <label class="btn btn-outline-success" for="{{ $vehicle->id }}3">Auto Transmission</label>
                                  
                                    <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Manual" id="{{ $vehicle->id }}4" autocomplete="off" />
                                    <label class="btn btn-outline-danger" for="{{ $vehicle->id }}4">Manual Transmission</label>
                                  </div>
                            </div> 
                        {{-- </div>  --}}
                             @endif
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>          
                        @endforeach   
                    </div> 
                    

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="addressno" class="col-form-label text-md-right">{{ __('Address No') }}</label>
                                <input id="addressno" type="text" class="form-control @error('addressno') is-invalid @enderror" name="addressno" value="{{ old('addressno') }}"  autocomplete="addressno" autofocus>

                                @error('addressno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="addresslineone" class=" col-form-label text-md-right">{{ __('City') }}</label>
                                <input id="addresslineone" type="text" class="form-control @error('addresslineone') is-invalid @enderror" name="addresslineone" value="{{ old('addresslineone') }}"  autocomplete="addresslineone" autofocus>
                                @error('addresslineone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="addresslinetwo" class=" col-form-label text-md-right">{{ __('Street') }}</label>
                                <input id="addresslinetwo" type="text" class="form-control @error('addresslinetwo') is-invalid @enderror" name="addresslinetwo" value="{{ old('addresslinetwo') }}"  autocomplete="addresslinetwo" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    $('#A1').click(function(){
        $('#AB').toggle();
    });
</script> --}}
@endsection

