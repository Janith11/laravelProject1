@extends('layouts.ownerapp')

@section('content')
<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Payments</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Payments lists</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div style="padding-right: 10px">
                <div class="form-group">
                    <input type="text" class="form-control" id="student_name" placeholder="Student Name" style="border-radius: 50px">
                </div>
            </div>
            <div style="padding-right: 15px">
                <a type="button" class="btn btn-primary" style="color: white" href="">Make Payments</a>
            </div>
        </div>
    </div>
    @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-striped table-sm table-hover">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Transition Description</th>
                    <th scope="col">Amount</th>
                    {{-- amount means the paid price now  --}}
                    <th scope="col">Total Paid</th>
                    <th scope="col">Total Fee</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($studentslist as $slist)
                  <tr>
                    <th scope="row">{{ $slist->created_at }}</th>
                    <td>{{ $slist->user_id }}</td>
                    <td>{{ $slist->user->f_name }} {{ $slist->user->l_name }}</td>
                    <td>{{ $slist->type }}</td>
                    <td>{{ $slist->description }}</td>
                    <td>{{ $slist->amount }}</td>
                    <td>{{ $slist->student->paid_amount }}</td>
                    {{-- amount column means total-paid money --}}
                    <td>{{ $slist->student->total_fee }}</td>
                    <td><a href="{{ route('viewstudent', $slist->user_id) }}"><i class="fa fa-info text-secondary" data-toggle="tooltip" data-placement="bottom" title="View Student" aria-hidden="true"></i></a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>
@endsection
