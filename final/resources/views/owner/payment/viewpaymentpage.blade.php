@extends('layouts.ownerapp')
@section('content')
<style>
    .card{
        color: #1b1b22
    }
</style>
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Payments</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentslist') }}"> / Processing</a>
    </div>
    @if(session('error'))
        <div class="alert alert-danger">
            <h5>{{ session('error') }}</h5>
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="container">
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Some problems with your input.
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="row p-2">
                <div class="card w-100">
                    @foreach ($studentdetails as $s)                   
                    <div class="card-body">
                        <h4 class="mb-4">Payment Information</h4>
                        <h6 class="mb-0">{{ $s->user->f_name }} {{ $s->user->m_name }} {{ $s->user->l_name }}, {{ $s->user->contact_number }}</h6>
                        <p class="mb-0">Student ID: {{ $s->user->id }}</p>
                        <p class="mb-0">{{ $s->user->email }}</p>
                        <p class="mb-0">Group No: {{ $s->group_number }}</p>
                        
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row p-2">
                <div class="card w-100">
                    <div class="card-body ">
                        <h4 class="mb-4">Payment Methods</h4>
                        <select class="form-control w-50" id="exampleFormControlSelect1">
                            <option>Cache</option>
                            <option class="" disabled>Cheque</option>
                            <option disabled>Online Payments</option>
                            {{-- <option>4</option>
                            <option>5</option> --}}
                          </select>
                        <p></p>
                    </div>
                </div>
            </div>
    <form action="{{ route('paystudentpatment') }}" method="POST">
        @csrf
        @foreach ($studentdetails as $s)     
        <input type="text" name="sid" value="{{ $s->user_id }}" style="display: none">
        @endforeach
            <div class="row p-2">
                <div class="card w-100">
                    <div class="card-body ">
                        <h4 class="mb-3">Price</h4>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><h6>Amount</h6></label>
                                    <input type="text" name="amount" class="form-control is-valid" id="myInput" oninput="myFunction()" placeholder="price" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><h6>Description</h6></label>
                                    <input type="text" name="description" class="form-control is-valid" id="exampleFormControlInput1" placeholder="Type the payment description" value="Total payment for the course" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row p-2">
                <div class="card w-100">
                    <div class="card-body">
                       <h4 class="mb-4">Order Summery</h4>
                       {{-- <div class="row">
                            <div class="col">
                                <p class="mb-0">Amount</p>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <p class="mb-0" id="demo">Rs.2000</p>
                            </div> 
                       </div> --}}
                       <hr class="my-4">
                       <div class="row">
                            <div class="col align-self-center">
                                <p class="mb-0" >Total</p>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h3 class="mb-0" id="demo"></h3>
                            </div> 
                        </div>
                        <div class="row ">
                            <button type="submit" class="btn btn-danger btn-block mt-4">Pay Now</button>
                            <small class="mt-3 mb-1 px-2" style="color: gray">Upon clicking "Pay Now", I confirm I have read and acknowledge all <u>term and policies.</u></small>
                        </div>
                    </div>
                </div>
            </div>
    </form>
            <div class="row p-2">
                <div class="card w-100">
                    <div class="card-body">
                        <center><b class="float-left">Payment Options</b><br><a href="https://www.payhere.lk?utm_source=logo" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="280"/></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- test  --}}
    



</div>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>
<script>
    function myFunction() {
      var x = document.getElementById("myInput").value;
      document.getElementById("demo").innerHTML = "Rs. " + x;
    }
    </script>
@endsection
