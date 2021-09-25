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

     <div class="row mb-1">
        <div class="col">
            @if (session('succmsg'))
                <div class="alert alert-success">
                    <h5>
                        {{ session('succmsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
            @endif
        </div>
    </div>

    <div class="row mb-1">
        <div class="col">
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

    <div class="card-group py-4">
        
            <div class="card mx-2">
                <div class="card-body">
                    <h4>Pay Online</h4>
                    <form  action="{{ route("paypal") }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="onlinepay">Amount</label>
                          <input type="text" class="form-control" id="onlinepay" placeholder="Enter the amount in Sri Lankan rupee.." onkeyup="convetCurrency();" value="1" name="slvalue" required>
                          <input type="text" id="hiddenUSD" name="amount" style="display: none">
                          <input type="text" name="uid" value="{{ Auth::user()->id }}" style="display: none">
                          <small class="form-text text-muted">Check the your input before submitting.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                      </form>
                </div>
            </div>
        
        
            <div class="card mx-2">
                <div class="card-body ">
                    <p>Paypal is not supporting Sri Lnakan currency. If you are using online payment, your input convert to USD.</p>
                    <h5 class="mt-2">Your payment is USD : <span id="convertedusd"></span></h5>
                    <!-- PayPal Logo --><table border="0"  cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table><!-- PayPal Logo -->
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
{{-- Change currency using fixer api io--}}
<script>
    function convetCurrency(){
        var apikey = '{{ env('CURRENCY_API_KEY') }}';
        var slr =document.getElementById("onlinepay").value;
        var usd =document.getElementById("convertedusd");
        var hiddenusd =document.getElementById("hiddenUSD");
        var xmlhttp = new XMLHttpRequest();
        var url = "http://data.fixer.io/api/latest?access_key="+apikey+"&symbols=USD,LKR";
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var result   = xmlhttp.responseText;
                var jsResult = JSON.parse(result);
                // console.log(jsResult);
                var oneUnit = jsResult.rates.LKR/jsResult.rates.USD;
                var SLinUSDlong =slr/oneUnit;
                var SLinUSD =SLinUSDlong.toFixed(2);
                usd.innerHTML = SLinUSD;
                hiddenusd.value= SLinUSD;
            }
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('aside ul .payments').css('border-left', '5px solid #00bcd4');
    })
</script>
@endsection