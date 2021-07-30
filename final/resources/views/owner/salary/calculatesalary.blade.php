@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 200px;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }
    td{
        vertical-align: middle;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Payroll</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('salary') }}"> / All </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Calculate Salary </a>
    </div>

    <div class="row-mb-2">
        @if (session('successmsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('successmsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if (session('errormsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <h5><strong>Wooops!!</strong> Somthing wrong with your input !!</h5>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Calculate Salary</h5>
                    <hr style="border-top: 1px solid #222944">
                    @foreach($instructors as $instructor)
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Profile Image" id="img">
                                <div id="card">
                                    <h5 style="color: #222944; font-weight: bold">{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                    <h6>{{ $instructor->user->email }}</h6>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h5 style="color: #222944; font-weight: bold" class="text-center">Total Attend Days on this month : <span id="total_days">{{ $attendance }}</span></h5>
                                <div id="card" class="text-center">
                                    <table>
                                        <tr>
                                            <td>
                                                <h5 style="color: #222944">Day Payment</h5>
                                            </td>
                                            <td>
                                                <div class="form-group" style="padding-left: 10px">
                                                    <input type="text" class="form-control" id="daypayment">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 style="color: #222944">Other</h5>
                                            </td>
                                            <td>
                                                <div class="form-group" style="padding-left: 10px">
                                                    <input type="text" class="form-control" id="otherpayment">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="text-center" id="card">
                                        <button class="btn btn-success" id="calculate" onclick="calculate()">Calculate Salary</button>
                                    </div>
                                    <div class="text-center" id="card">
                                        <h5 style="color: #222944; font-weight: bold">Total Salary : <span id="display_salary"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('savesalary') }}" method="POST" style="display: none" id="form_salary" >
                            @csrf
                            <input type="text" name="id" value="{{ $instructor->user_id }}">
                            <input type="text" name="salary" id="salary">
                        </form>
                    @endforeach
                    <div class="text-center">
                        <button class="btn btn-success" name="submit" onclick="addsalary()">Add Salary</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    function calculate(){
        var daypayment = document.getElementById('daypayment').value;
        var other = document.getElementById('otherpayment').value;
        var days = document.getElementById('total_days').innerText;

        if (!isNaN(daypayment)) {
            var basic = daypayment * days;
            var total = parseFloat(basic) + parseFloat(other);
            document.getElementById('display_salary').innerText = total;
            document.getElementById('salary').value = total;
        }else{
            alert('Check Your Input Values !!');
        }
    }

    function addsalary(){
        document.getElementById('form_salary').submit();
    }
</script>

<script>
    $(document).ready(function(){
        $('aside ul .hrms').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
