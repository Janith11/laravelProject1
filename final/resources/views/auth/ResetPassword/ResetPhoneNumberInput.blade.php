@extends('layouts.landingpage')
@section('content')
<style>
    /* .card{
        box-shadow: 2px 1px 12px 1px;
        border-radius: 45px;
        border: 0px;
        background: rgb(139,211,217);
        background: linear-gradient(90deg, rgba(139,211,217,1) 0%, rgba(108,98,198,1) 47%, rgba(22,64,247,1) 100%);
    } */
    .myshadow{
        box-shadow: 1px 1px 20px 1px rgba(0, 0, 255, 0.452);
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="container mt-5 py-5" style="height: 100vh;">
        <div class="row">
            <div class="col-md-6 mx-auto ">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center py-3">Forgot Your Password?</h3>
                        {{-- error message  --}}
                        <div class="row">
                            <div class="col">
                                @if (session('errormsg'))
                                <div class="alert alert-danger">
                                    <h6>
                                        {{ session('errormsg') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </h6>
                                </div>
                            @endif
                            </div>
                        </div>
                        <p class="text-muted">Enter Your phone number and we will send youa OTP to reset your password.</p>
                        <form action="{{ route('ResetMyPasswordSendingOTP') }}" method="POST" onsubmit="return checkNumber()">
                            @csrf
                            <div class="form-group">
                              <label for="phonenumber">Phone Number</label>
                              <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your phone number">
                              <small  id="phoneHelp" class="form-text text-danger"></small>
                              <small class="form-text text-muted">Enter your verified phone number.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Send my OTP</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkNumber(){
            let contNo = /^[0-9+]{10}$/;
            var number = document.querySelector("#phonenumber").value;
            if(number.length == 10 && number.match(contNo)){
                $('#phonenumber').addClass('is-valid');
                $("#phonenumber").removeClass('is-invalid');
                $('#phoneHelp').html("");
                return true;
            }else{
                $('#phonenumber').addClass('is-invalid');
                $("#phonenumber").removeClass('is-valid');
                $('#phoneHelp').html("*Please Enter Valid Phone Number");
                return false;
            }
        }    
      
    </script>

@endsection