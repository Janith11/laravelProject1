@extends('layouts.student')

@section('content')

    <meta name="_token" content="{{ csrf_token() }}">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<style>
    #img{
        width: 80%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }

    #header{
        color: #222944;
    }

    #center {
        margin-left: auto;
        margin-right: auto;
    }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Profile</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('student.studentdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentprofile') }}"> / Profile details</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Change Password</a>
    </div>

    <div class="row-mb-2">
        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Wooops!! some errors with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                {{ session('errormsg') }}
            </div>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="row justify-content-center">
                <div class="card" style="width: 500px">
                    <div class="card-body">
                        <h5 id="header" style="font-weight: bold; text-align: center">Change Password</h5>
                        <hr style="border-top: 1px solid #222944">

                        <form action="{{ route('studentupdatepasswordupdate') }}" method="POST" onsubmit="checkpassword()">

                            @csrf

                            <table id="center">

                                <tr>
                                    <td>
                                        <h5 id="header">New password</h5>
                                    </td>
                                    <td>
                                        <div class="form-group" style="padding-left: 10px">
                                            <input type="password" class="form-control" name="new_password" id="password" placeholder="New password" onkeyup="password1()">
                                            <small id="passwordHelp" class="text-danger"></small>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 id="header">Confirm Password</h5>
                                    </td>
                                    <td>
                                        <div class="form-group" style="padding-left: 10px">
                                            <input type="password" class="form-control" id="confirmPassword1" name="confirm_password" placeholder="Confirm Password" onkeyup="confirmPassword2()" >
                                            <small id="confirmpasswordHelp" class="text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <small class="text-muted">Now you can change your password.</small>
                            <div id="card" class="text-center">
                                <button class="btn btn-success" type="submit">Change Password</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script>
        function password1(){
            var pass = document.getElementById("password").value;
            if(pass.length >= 8){
                $('#password').addClass('is-valid');
                $("#password").removeClass('is-invalid');
                $('#passwordHelp').html("");
            }else{
                $('#password').addClass('is-invalid');
                $("#password").removeClass('is-valid');
                $('#passwordHelp').html("*At least 8 characters.");
            }
        }
        function confirmPassword2(){
            var pass = document.getElementById("password").value;
            var compass = document.getElementById("confirmPassword1").value;
            if(pass == compass){
                $('#confirmPassword1').addClass('is-valid');
                $("#confirmPassword1").removeClass('is-invalid');
                $('#confirmpasswordHelp').html("");
            }else{
                $('#confirmPassword1').addClass('is-invalid');
                $("#confirmPassword1").removeClass('is-valid');
                $('#confirmpasswordHelp').html("*Password doesn't match.");
            }
        }
        function checkPassword(){
            var password = document.querySelector("#password").value;
            var confirmpassword = document.querySelector("#confirmPassword1").value;
            if(password.length >= 8 && confirmpassword==password){
               return true;
            }else{
               return false;
            }
        }  
    </script>

    <script>
        $(document).ready(function(){
            $('aside ul .profile').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
