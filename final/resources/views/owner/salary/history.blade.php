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
        <a style="padding-top: 6px; padding-left: 10px"> / History </a>
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
        <button class="btn btn-primary" id="income">Income</button>
        <button class="btn btn-primary" id="salary">Salary</button>
        <button class="btn btn-primary" id="expense">Expense</button>
    </div>

    <div class="row-mb-2">

        <div id="display_income">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Income Details</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Date</th>
                                    <th>Student</th>
                                    <th>Amount</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="display_salary" style="display: none">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Salary Details</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Date</th>
                                    <th>Instructor</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    @foreach($salarys as $salary)
                                        <tr>
                                            <td>{{ $salary->date }}</td>
                                            <td>
                                                @foreach($instructors as $instructor)
                                                    @if($instructor->user_id == $salary->user_id)
                                                        {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $salary->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="display_expense" style="display: none">
            <div id="card">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: #222944; font-weight: bold">Expenses Details</h5>
                        <hr style="border-top: 1px solid #222944">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Date</th>
                                    <th>Reson</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->reson }}</td>
                                            <td>{{ $expense->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    $('#income').click(function(){
        $('#display_income').show();
        $('#display_salary').hide();
        $('#display_expense').hide();
    });

    $('#salary').click(function(){
        $('#display_income').hide();
        $('#display_salary').show();
        $('#display_expense').hide();
    });

    $('#expense').click(function(){
        $('#display_income').hide();
        $('#display_salary').hide();
        $('#display_expense').show();
    });

</script>

@endsection
