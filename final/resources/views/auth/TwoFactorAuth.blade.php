@extends('layouts.landingpage')
@section('content')

<div class="container" style="height:100vh">
    <div class="row mt-5 py-5">
        <div class="col-md-6 mx-auto">
            <div class="card p-4">
                <form action="{{ route('TwoFactorAuthCode') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <p for="myotp" class="my-3">You will receive a <span class="text-primary">6 digit </span> code to verify your contact number.</p>
                    <input type="text" class="form-control" id="myotp"  placeholder="Enter OTP" name="otp">
                    <small id="myotp" class="form-text text-muted mt-3">Didn't recieve Code?.</small>
                    <a href="{{ route('ResendOTPRegistration',$id) }}"><p class="text-primary ">Resend OTP</p></a>
                    </div>
                    <input type="text" name="uid" value="{{$id}}" style="display: none">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>
            @if(session()->has('errormsg'))
                <div class="alert alert-danger mt-3">
                    {{ session()->get('errormsg') }}
                </div>
            @endif
            @if(session()->has('successmsg'))
                <div class="alert alert-success mt-3">
                    {{ session()->get('successmsg') }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection