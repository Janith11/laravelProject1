@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Payment</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studenentpaymentlogsview') }}"> / Payment Logs</a>
     </div>

     @foreach ($studentdetails as $student)
     <div class="row-mb-2">
        <div class="row">
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <i class="fas fa-shopping-cart fa-3x p-1 text-info"></i>
                                </div>
                                <div style="display: inline-block">
                                    <h3 class="mb-0">Rs.{{ $student->total_fee}}</h3>
                                    <small class="ml-1">Total Fee</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <i class="fas fa-file-invoice-dollar fa-3x p-1 text-danger"></i>
                                </div>
                                <div style="display: inline-block">
                                    <h3 class="mb-0">Rs.{{ $student->paid_amount}}</h3>
                                    <small class="ml-1">Paid</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <i class="fas fa-money-check-alt fa-3x p-1 text-warning"></i>
                                </div>
                                <div style="display: inline-block">
                                    <h3 class="mb-0">Rs.{{ $student->total_fee - $student->paid_amount}}</h3>
                                    <small class="ml-1">Balance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-3">
                <div id="card">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block">
                                <div style="display: inline-block; padding-right: 10px">
                                    <i class="far fa-check-circle fa-3x p-1 text-success"></i>
                                </div>
                                <div style="display: inline-block">
                                    @foreach ($lastpayment as $lpay)                          
                                    <h3 class="mb-0">Rs.{{ $lpay->amount}}</h3>
                                    {{-- <p class="mb-0" style="font-size: 0.8rem;">{{ $lpay->created_at->diffForHumans() }}</p> --}}
                                    @break
                                    @endforeach
                                    <small class="ml-1">last payment</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-striped table-sm table-hover table-responsive w-100 d-block d-md-table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    {{-- amount means the paid price now  --}}
                    <th scope="col">Total Paid</th>
                    <th scope="col">Total Fee</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($lastpayment as $slist)
                  <tr>
                    <th scope="row">{{ $slist->created_at->diffForHumans() }}</th>
                    <td>{{ $slist->type }}</td>
                    <td>{{ $slist->description }}</td>
                    <td>Rs.{{ $slist->amount }}</td>
                    <td>Rs.{{ $slist->student->paid_amount }}</td>
                    {{-- amount column means total-paid money --}}
                    <td>Rs.{{ $slist->student->total_fee }}</td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
        </div>
    </div>


</div>
<script>
    $(document).ready(function(){
        $('aside ul .payments').css('border-left', '5px solid #00bcd4');
    })
</script>
@endsection