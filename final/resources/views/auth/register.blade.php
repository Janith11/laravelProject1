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
    .mycategoryrow:hover{
        background-color: blue;
    }
    .tab{
        display: none;
    }
    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #350ac0;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #0ba83f;
    }
    /* input.invalid {
        border: 2px solid red;
    } */
    /* .step.finish {
        background-color: #04AA6D;
    } */
</style>
<div class="container col-md-8 col-sm-12">
    <div class="row">
        <div>
            <div class="card" style="background-color:#57739b2f ">
             <div class="card-body">
                    <h2 class="mt-5 px-2">{{ __('Sign Up') }}</h2>
                    <h4 class="px-2 text-muted mb-2">Create your Driving Account</h4>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- first tab  --}}
                        <div class="tab">
                            {{-- first row  --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                <label for="firstname" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Firstname') }}</label>                      
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"  autocomplete="off" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="middlename" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Middleame') }}</label>
                                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}"  autocomplete="off" autofocus>

                                    @error('middlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- second row  --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="lastname" class="col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Lastname') }}</label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="off" autofocus>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="email" class="col-form-label text-md-right"><span class="text-danger">*</span>{{ __('E-Mail Address') }}</label>
                                    <input id="email" onkeyup="checkEmail()" type="email" class="form-control"  name="email" value="{{ old('email') }}"  autocomplete="off" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6">
                                    <label for="nicnumber" class="ol-form-label text-md-right"><span class="text-danger">*</span>{{ __('Nic Number') }}</label>
                                    <input id="nicnumber" onkeyup="checkNic()" type="text" class="form-control" name="nicnumber" value="{{ old('nicnumber') }}"  autocomplete="off">

                                    @error('nicnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Third Row  --}}
                            <div class="form-group row">
                                {{-- <div class="col-md-6">
                                    <label for="nicnumber" class="ol-form-label text-md-right"><span class="text-danger">*</span>{{ __('Nic Number') }}</label>
                                    <input id="nicnumber" onkeyup="checkNic()" type="text" class="form-control" name="nicnumber" value="{{ old('nicnumber') }}"  autocomplete="off">

                                    @error('nicnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6">
                                    <label for="gender" class= "col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Gender') }}</label><br>
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="male" id="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="female" id="female" checked>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- tab two  --}}
                        <div class="tab">
                            {{-- fourth row  --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="addressno" class="col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Address No') }}</label>
                                    <input id="addressno" type="text" class="form-control @error('addressno') is-invalid @enderror" name="addressno" value="{{ old('addressno') }}"  autocomplete="addressno" autofocus>

                                    @error('addressno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="addresslineone" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('City') }}</label>
                                    <input id="addresslineone" type="text" class="form-control @error('addresslineone') is-invalid @enderror" name="addresslineone" value="{{ old('addresslineone') }}"  autocomplete="addresslineone" autofocus>
                                    @error('addresslineone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Fifth Row  --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="addresslinetwo" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Street') }}</label>
                                    <input id="addresslinetwo" type="text" class="form-control @error('addresslinetwo') is-invalid @enderror" name="addresslinetwo" value="{{ old('addresslinetwo') }}"  autocomplete="addresslinetwo" autofocus>
                                    @error('addresslinetwo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contactno" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Contact No') }}</label>
                                    <input id="contactno" onkeyup="checkContact()" type="text" class="form-control @error('contactno') is-invalid @enderror" name="contactno" value="{{ old('contactno') }}" autocomplete="contactno" autofocus>
                                    @error('contactno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Sixth row  --}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="birthday" class=" col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Birthday') }}</label>
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" autocomplete="birthday" autofocus>

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- tab three  --}}
                        <div class="tab">
                            {{-- Eigth Row      --}}
                            <div class="form-group">  
                                <small class="text-muted mb-2"><span class="text-danger">*</span>Choose categories of your selection. You can select a vehicle category training with our instructors or you can get our service by without training and select relevent vehicle transmisssion of each category.</small>

                                @foreach ($vehicalcategory as $vehicle) 
                                <div class="row border bg-light my-2 mycategoryrow">
                                    <div class="col-md-4" id="{{ $vehicle->category_code }}A">
                                        <input type="checkbox" class="form-check-input btn-check categoryselector" name="vehicle_category[]" value="{{ $vehicle->category_code }}" id="{{ $vehicle->category_code }}-category" onclick="categoryCheckBox('{{ $vehicle->category_code }}')">
                                        @if ($vehicle->name == 'bike')
                                            <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}-category" class="col-form-label text-md-right">Bike</label>                                            
                                        @elseif ($vehicle->name == 'threeweel')
                                            <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}-category" class="col-form-label text-md-right">Three Wheel</label>                                            
                                        @elseif ($vehicle->name == 'dualpurposes')
                                            <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}-category" class="col-form-label text-md-right">Car,Van & Dual Purposes</label>                                            
                                        @elseif ($vehicle->name == 'heavyvehical')
                                            <label class="btn btn-outline-primary btn-block" for="{{ $vehicle->category_code }}-category" class="col-form-label text-md-right">Heavy Vehicle</label>                                            
                                        @endif
                                    </div>
                                    <div class="col-md-4 text-center mytraining" id="{{ $vehicle->category_code }}-training"> 
                                        <div class="btn-group" id="{{ $vehicle->category_code }}B">                       
                                            <input type="radio" class="btn-check" name="{{ $vehicle->category_code }}" value="Training" id="{{ $vehicle->id }}1" autocomplete="off" checked />
                                            <label class="btn btn-outline-success" for="{{ $vehicle->id }}1">Training</label>
                                        
                                            <input type="radio" class="btn-check" name="{{ $vehicle->category_code }}" value="Without Training" id="{{ $vehicle->id }}2" autocomplete="off" />
                                            <label class="btn btn-outline-danger" for="{{ $vehicle->id }}2">Without Training</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mytransmission" id="{{ $vehicle->category_code }}-transmission">
                                    @if( $vehicle->transmission == 'automanual')
                                    
                                        <div class="btn-group">                       
                                            <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Auto" id="{{ $vehicle->id }}3" autocomplete="off" checked />
                                            <label class="btn btn-outline-success" for="{{ $vehicle->id }}3">Auto</label>
                                        
                                            <input type="radio" class="btn-check" name="trans{{ $vehicle->category_code }}" value="Manual" id="{{ $vehicle->id }}4" autocomplete="off" />
                                            <label class="btn btn-outline-danger" for="{{ $vehicle->id }}4">Manual</label>
                                        </div>
                                     
                                    @endif
                                    </div>                 
                                   
                                </div>          
                                @endforeach   
                                {{-- <small class="text-danger">*If you</small> --}}
                            </div> 
                            <p class="text-danger mycategoryerror"  style="display: none">*You have to choose at least one Category</p>
                        </div>
                        {{-- tab four  --}}
                        <div class="tab">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label text-md-right"><span class="text-danger">*</span>{{ __('Password') }}</label>
                                    <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" onkeyup="checkPassword()">
                                    <p id="passworderror" class="text-danger"></p>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" onkeyup="confirmPassword()">
                                <p id="passwordconfirmerror" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right px-5">
                              <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                              <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var currentTab=0;
    showTab(currentTab);

    function showTab(n){
        var x =document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if(n==0){
            document.getElementById("prevBtn").style.display = "none";
        }else{
            document.getElementById("prevBtn").style.display = "inline";
        }
        if(n== x.length - 1){
            document.getElementById("nextBtn").style.display = "none";
        }else{
            document.getElementById("nextBtn").style.innerHTML ="Next";
        }
    fixStepIndicator(n)
    }

    function nextPrev(n){
        var x = document.getElementsByClassName("tab");
        if(n==1 && !validateForm())  return false;
           
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        //some code here
        if(currentTab >= x.length){
            //some code ...
        }
        showTab(currentTab);
    }

    function validateForm(){
        var x,y,i,valid = true;
        x=document.getElementsByClassName("tab");
        y=x[currentTab].getElementsByTagName("input");

        for(i=0; i < y.length; i++){
            if(y[i].value == ""){
                y[i].className+= " is-invalid";
                valid = false;
            }
        }
        if(valid){
            document.getElementsByClassName("step")[currentTab].className += "finish";
        }
        return valid;
    }

    function fixStepIndicator(n){
        var i, x=document.getElementsByClassName("step");
        for(i=0; i< x.length; i++){
            x[i].className = x[i].className.replace("active", "");
        }
        x[n].className += " active";
    }
 </script>
{{-- Email check  --}}
<script>
    const email = document.querySelector("#email");
    let regExp= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    function checkEmail(){
        if(!email.value.match(regExp)){
            $('#email').addClass('is-invalid');
            $("#email").removeClass('is-valid');
        }else{
            $('#email').addClass('is-valid');
            $("#email").removeClass('is-invalid');
        }
    }
</script>
{{-- NIc Check  --}}
<script>
    const nicNumber = document.querySelector("#nicnumber");
    let old_nic = /^[0-9+]{9}[vV|xX]$/;
    let new_nic = /^[0-9+]{12}$/;
    function checkNic(){
        if (nicNumber.value.length == 10 && nicNumber.value.match(old_nic)) {
            $('#nicnumber').addClass('is-valid');
            $("#nicnumber").removeClass('is-invalid');
        }
        else if (nicNumber.value.length == 12 && nicNumber.value.match(new_nic)) {
            $('#nicnumber').addClass('is-valid');
            $("#nicnumber").removeClass('is-invalid');
        }else{
            $('#nicnumber').addClass('is-invalid');
            $("#nicnumber").removeClass('is-valid');
        }
    }
</script>

{{-- check contact  --}}
<script>
    const contactNo =document.querySelector("#contactno");
    let contNo = /^[0-9+]{10}$/;
    function checkContact(){
        if (contactNo.value.length == 10 && contactNo.value.match(contNo)) {
            $('#contactno').addClass('is-valid');
            $("#contactno").removeClass('is-invalid');
        }
        else{
            $('#contactno').addClass('is-invalid');
            $("#contactno").removeClass('is-valid');
        }
    }
</script>

{{-- check category  --}}
<script>
    
    var y1 = document.querySelectorAll(".mytraining");
    var y2 = document.querySelectorAll(".mytransmission");
    for (var i = 0; i < y1.length; i++) {
        y1[i].style.display = "none";
    }
    for (var i = 0; i < y2.length; i++) {
        y2[i].style.display = "none";
    }
    function categoryCheckBox(n){
        var x = '#'+n+'-category';
        var train = '#'+n+'-training';
        var trans = '#'+n+'-transmission';
        if($(x).is(":checked")) {
            document.querySelector(train).style.display ="block";
            document.querySelector(trans).style.display ="block";
                        
        }else{
            document.querySelector(train).style.display ="none";
            document.querySelector(trans).style.display ="none";
        }
    }
    var c1 = document.querySelectorAll(".categoryselector");
        c1[0].checked = true;
        y1[0].style.display = "block";
        y2[0].style.display = "block";
        
        $(document).ready(function(){
            setInterval(function(){
                var okay = "one";
                for(var i=0; i<c1.length; i++){
                if(c1[i].checked) {
                    okay='two';
                    break;
                    }
                }
                if(okay == 'one'){
                    document.querySelector(".mycategoryerror").style.display = "block";
                } 
                else{
                    document.querySelector(".mycategoryerror").style.display = "none";
                } 
            },50);    
        });
        
        
</script>

{{-- password check  --}}
<script>
    var y1 = document.getElementById("password");
    var y2 = document.getElementById("password-confirm");
    function checkPassword(){
        if(y1.value.length < 8){
            $('#password').addClass(' is-invalid');
            $('#password').removeClass(' is-valid');
            $("#passworderror").text("At least 8 characters are required!");
        }else{
            $('#password').addClass(' is-valid');
            $('#password').removeClass(' is-invalid');
            $("#passworderror").text("");
        }
    }
    function confirmPassword(){
        if(y1.value == y2.value){
            $('#password-confirm').addClass(' is-valid');
            $('#password-confirm').removeClass(' is-invalid');
            $("#passwordconfirmerror").text("");
        }else{
            $('#password-confirm').addClass(' is-invalid');
            $('#password-confirm').removeClass(' is-valid');
            $("#passwordconfirmerror").text("Password does not match!");
        }

    }
</script>

@endsection

