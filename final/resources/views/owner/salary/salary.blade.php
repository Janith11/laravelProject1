@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
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
        <a style="padding-top: 6px; padding-left: 10px"> / All </a>
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
            <div class="alert alert-danger">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px">
                <a href="{{ route('history') }}" class="btn btn-primary" type="button" style="color: white;">History</a>
            </div>
        </div>
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
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #30EE49">
                            <h5 style="color: #222944; font-weight: bold">Rs. 5756.90</h5>
                            <small>Total Income on this month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body" style="border-left: 10px solid #3092EE">
                            <h5 style="color: #222944; font-weight: bold">Rs. {{ $expense }}</h5>
                            <small>Total Expense on this month</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-8">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <th>Employee</th>
                                        <th>Total Attendance</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($instructors as $instructor)
                                            <tr id="row-{{ $instructor->id }}">
                                                <td style="vertical-align: middle">
                                                    <div>
                                                        <div style="display: inline-block">
                                                            <img src="/uploadimages/instructors_profiles/{{ $instructor->user->profile_img }}" alt="Profile Image" id="img">
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <h5 style="color: #222944; font-weight: bold">{{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    @foreach($attendance_count as $count)
                                                        @if($instructor->user_id == $count->user_id)
                                                            <h5 style="color: #222944; font-weight: bold">{{ $count->count }}</h5>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="display: inline-block">
                                                    <a type="button" class="btn btn-success" style="color: white" href="{{ route('calculatesalary',$instructor->user_id) }}">Genarate Salary</a>
                                                </td>
                                            </tr>
                                            <script>
                                                var number = {{ $instructor->id }};
                                                var row = document.getElementById('row-'+number);
                                                function generateRandomColor()
                                                {
                                                    var randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);
                                                    return randomColor;
                                                    //random color will be freshly served
                                                }
                                                var color = generateRandomColor() // -> #e1ac94
                                                row.style.borderLeft = '15px solid '+color;
                                            </script>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5 style="color: #222944; font-weight: bold">Make pay</h5>
                            </div>
                            <div>
                                <form action="{{ route('addexpense') }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label for="reson" style="color: #222944">Reson</label>
                                            <textarea class="form-control" id="reson" rows="2" name="reson"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="amount" style="color: #222944">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount">
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit">Add Pay</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    $(document).ready(function(){
        $('aside ul .hrms').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
