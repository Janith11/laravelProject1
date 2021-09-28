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
                        <h3 class="text-center py-3">Change Your Password</h3>              
                        {{-- <p class="text-muted">Now you ca</p> --}}
                        <form action="{{ route('ResetMyPasswordFinal') }}" method="POST" onsubmit="return checkPassword()">
                            @csrf
                            <div class="form-group">
                              <label for="password">New Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password" onkeyup="checkPassword1()">
                              <small  id="passwordWrong" class="form-text text-danger"></small>
                              
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm new Password" onkeyup="checkPassword2()">
                                <small  id="confirmpasswordWrong" class="form-text text-danger"></small>
                                {{-- <small class="form-text text-muted">At least 8 character long.</small> --}}
                            </div>
                            <input type="text" name="phonenumber" value="{{ $user_details->contact_number }}" style="display: none">
                              <button type="submit" class="btn btn-primary">Change Password</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkPassword(){
            var password = document.querySelector("#password").value;
            var confirmpassword = document.querySelector("#confirmpassword").value;
            if(password.length >= 8 && confirmpassword==password){
               return true;
            }else{
               return false;
            }
        }  
        function checkPassword1(){
            var password = document.querySelector("#password").value;
            if(password.length >= 8){
                $('#password').addClass('is-valid');
                $("#password").removeClass('is-invalid');
                $('#passwordWrong').html("");
            }else{
                $('#password').addClass('is-invalid');
                $("#password").removeClass('is-valid');
                $('#passwordWrong').html("*Al least 8 characters");
            }
        }  
        function checkPassword2(){
            var password = document.querySelector("#password").value;
            var confirmpassword = document.querySelector("#confirmpassword").value;

            if(confirmpassword == password){
                $('#confirmpassword').addClass('is-valid');
                $("#confirmpassword").removeClass('is-invalid');
                $('#confirmpasswordWrong').html("");
            }else{
                $('#confirmpassword').addClass('is-invalid');
                $("#confirmpassword").removeClass('is-valid');
                $('#confirmpasswordWrong').html("*Password doesn't match");
            }
        }
      
    </script>

@endsection