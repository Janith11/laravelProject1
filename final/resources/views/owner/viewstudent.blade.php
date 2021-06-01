@extends('layouts.ownerapp')
@section('content')

    <style>
        p,th,td{
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .mydiv1{
            display: none;
        }
        .mydiv2{
            display: block;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h3 class="text-left"  id="page_header">View Student</h3>
                </div>
            </div>
        </div>

        <div class="main mt-5 mb-2">
            <nav class="mb-3">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="tab1" data-toggle="tab" href=" " role="tab" aria-controls="nav-home" aria-selected="true" onclick="myfunction">Details</a>
                  <a class="nav-item nav-link" id="tab2" data-toggle="tab" href="" role="tab" aria-controls="nav-profile" aria-selected="false">Invoices</a>
                </div>
            </nav>

              <div class="tab-content" id="nav-tabContent">
                
                <div class="mydiv1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card-deck">
                        <div class="card">
                          <img class="card-img-top img-fluid rounded-circle w-50 mb-3 shadow mx-auto d-block m-3" src="https://avatarfiles.alphacoders.com/979/thumb-97920.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title text-center">Janith Pramuditha</h4>
                            <table class="table mt-5">
                                <tbody>
                                  <tr>
                                    <td scope="row">ID</td>
                                    <td>10545842</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Catagory</td>
                                    <td>Light vehical</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Email</td>
                                    <td>Janith123456789@gmail.com</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Phone</td>
                                    <td>077-1234567</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Phone</td>
                                    <td>077-1234567</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Address</td>
                                    <td><small>efoj feaikpf apifja adif adsipfjpa adsipofha adsoifha</small></td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Billing</h4>
                            <table class="table mt-5">
                                <tbody>
                                  <tr>
                                    <td scope="row">Total</td>
                                    <td>15,000.00</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Paid</td>
                                    <td>10,000</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Unpaid</td>
                                    <td>5,000</td>
                                  </tr>
                                  <tr>
                                    <td scope="row"><button class="btn btn-primary">Pay</button></td>
                                    </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Classes</h4>
                              <table class="table mt-5">
                                  <tbody>
                                    <tr>
                                      <td scope="row">scheduled</td>
                                      <td><h5><span class="badge badge-primary">5</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row">Participated</td>
                                      <td><h5><span class="badge badge-success">4</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row">not participated</td>
                                      <td><h5><span class="badge badge-danger">1</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row"><button class="btn btn-primary">View Calender</button></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                </div>

                <div class="mydiv2" id="nav-home container2" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card-deck">
                        <div class="card">
                          <img class="card-img-top img-fluid rounded-circle w-50 mb-3 shadow mx-auto d-block m-3" src="https://avatarfiles.alphacoders.com/979/thumb-97920.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title text-center">Janith Pramuditha</h4>
                            <table class="table mt-5">
                                <tbody>
                                  <tr>
                                    <td scope="row">ID</td>
                                    <td>10545842</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Catagory</td>
                                    <td>Light vehical</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Email</td>
                                    <td>Janith123456789@gmail.com</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Phone</td>
                                    <td>077-1234567</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Phone</td>
                                    <td>077-1234567</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Address</td>
                                    <td><small>efoj feaikpf apifja adif adsipfjpa adsipofha adsoifha</small></td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Billing</h4>
                            <table class="table mt-5">
                                <tbody>
                                  <tr>
                                    <td scope="row">Total</td>
                                    <td>15,000.00</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Paid</td>
                                    <td>10,000</td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Unpaid</td>
                                    <td>5,000</td>
                                  </tr>
                                  <tr>
                                    <td scope="row"><button class="btn btn-primary">Pay</button></td>
                                    </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Classes</h4>
                              <table class="table mt-5">
                                  <tbody>
                                    <tr>
                                      <td scope="row">scheduled</td>
                                      <td><h5><span class="badge badge-primary">5</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row">Participated</td>
                                      <td><h5><span class="badge badge-success">4</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row">not participated</td>
                                      <td><h5><span class="badge badge-danger">1</span></h5></td>
                                    </tr>
                                    <tr>
                                      <td scope="row"><button class="btn btn-primary">View Calender</button></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                </div>

              </div>
        </div>

    </div>

    <script>
       function myfunction(){
           var x = document.getElementsByClassName("mydiv1")
           x.style.display = "block";
       }
    </script>
 
@endsection