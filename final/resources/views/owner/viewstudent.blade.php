@extends('layouts.ownerapp')
@section('content')

  <style>
    td,th{
      font-size: 16px;
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

      <div class="tab mt-4 mb-0">
        <button class="btn btn-lg tablinks btn-secondary" onclick="openCity(event, 'profile')" id="defaultOpen">Profile</button>
        <button class="btn btn-lg tablinks btn-secondary" onclick="openCity(event, 'Invoices')">Invoices</button>
        {{-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> --}}
      </div>

      <div id="profile" class="tabcontent">
        <div class="mydiv1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="card-deck">
              <div class="card">


                <img class="card-img-top img-fluid rounded-circle w-50 mb-3 shadow mx-auto d-block m-3" src="https://avatarfiles.alphacoders.com/979/thumb-97920.png" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title text-center">{{ $user_id }} {{ $user_id}}</h4>
                  <table class="table mt-5">
                      <tbody>
                        <tr>
                          <td scope="row">ID</td>
                          <td>{{ $user_id }}</td>
                        </tr>
                        <tr>
                          <td scope="row">Catagory</td>
                          <td>{{ $user_id }}</td>
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

      <div id="Invoices" class="tabcontent">
        <div class="mydiv1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

          <table class="table">
            <div class="row">
              <h3 class="mt-2 mb-2 p-3">Billing</h3>
            </div>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
                <th scope="col">Method</th>
                <th scope="col">Total</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">100</th>
                <td>01/06/2021  &nbsp<small>2:53 PM</small></td>
                <td>Student pay</td>
                <td>Cash</td>
                <td>15,000</td>
              </tr>
              <tr>
                <th scope="row">100</th>
                <td>01/06/2021  &nbsp<small>2:53 PM</small></td>
                <td>Student pay</td>
                <td>Cash</td>
                <td>15,000</td>
              </tr>
              <tr>
                <th scope="row">100</th>
                <td>01/06/2021  &nbsp<small>2:53 PM</small></td>
                <td>Student pay</td>
                <td>Cash</td>
                <td>15,000</td>
              </tr>
            </tbody>
          </table>
      </div>

      {{-- <div id="Tokyo" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
      </div> --}}

        {{-- <div class="main mt-5 mb-2">

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
              </div>
        </div> --}}

    </div>

    <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
      </script>


@endsection
