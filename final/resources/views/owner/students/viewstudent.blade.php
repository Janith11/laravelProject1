@extends('layouts.ownerapp')
@section('content')

<style>
    td,th{
      font-size: 16px;
    }
</style>

<div class="container">

    <div class="row">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Students</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('studentslist') }}"> / Students List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Students Details</a>
    </div>

    <div class="row">
      <div class="col d-flex justify-content-end">
        <form method="POST" action="{{ route('DeleteStudent') }}" id="delete-form-student" style="display: none">
          @csrf
          @foreach ($student as $stu)
            <input type="text" name="uid" value="{{ $stu->user->id }}">
          @endforeach
        </form>
      <button onclick="if(confirm('Are You Sure to Remove this Student?')){
          event.preventDefault();
          document.getElementById('delete-form-student').submit();
      }else{
          event.preventDefault();
      }" href="" class="btn btn-danger" >Remove Student
      </button>
      </div>
    </div>

      <div class="tab mt-4 mb-2">
        <button class="btn btn-lg tablinks btn-secondary" onclick="openCity(event, 'profile')" id="defaultOpen">Profile</button>
        <button class="btn btn-lg tablinks btn-secondary" onclick="openCity(event, 'Invoices')">Invoices</button>
        {{-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> --}}
      </div>

      @foreach ($student as $s)
      <div id="profile" class="tabcontent">
        <div class="mydiv1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="card-deck">
              <div class="card">

                <img class="rounded-circle border border-success mx-auto mt-4" style="max-width: 200px" src="/uploadimages/students_profiles/{{ $s->user->profile_img }}" alt="profile image">
                <div class="card-body">
                  <h4 class="card-title text-center">{{$s->user->f_name}} {{$s->user->l_name}}</h4>
                  <div class="table-responsive">
                  <table class="table mt-5 table-sm">
                      <tbody>
                        <tr>
                          <td scope="row">ID</td>
                          <td>{{$s->user_id}}</td>
                        </tr>
                        <tr>
                          <td scope="row">Email</td>
                          <td>{{$s->user->email}}</td>
                        </tr>
                        <tr>
                          <td scope="row">Phone</td>
                          <td>{{$s->user->contact_number}}</td>
                        </tr>
                        <tr>
                          <td scope="row">DOB</td>
                          <td>{{$s->user->dob}}</td>
                        </tr>
                        <tr>
                          <td scope="row">Address</td>
                          <td><small>{{$s->user->address_no}}, {{$s->user->address_lineone}}, {{$s->user->address_linetwo}}</small></td>
                        </tr>
                        <tr>
                          <td scope="row">Categories</td>
                          <td>
                            @foreach ($student_categories as $c)
                              @if ($c->category == "A")
                              <p class="badge badge-warning py-1">Bike</p>    
                              @endif
                              @if ($c->category == "B")
                              <p class="badge badge-warning py-1">Three Wheel</p>    
                              @endif
                              @if ($c->category == "C1")
                              <p class="badge badge-warning py-1">Car,Van & Dual Purposes</p>    
                              @endif
                              @if ($c->category == "C")
                              <p class="badge badge-warning py-1">Heavy Vehicle</p>    
                              @endif
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                          {{-- <td>Edit Category</td> --}}
                          <td scope="row"><a href="{{ route('categoryview',$s->user->id) }}" type="button" class="btn btn-success">Edit Category</a></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Billing</h4>
                  <div class="table-responsive">
                  <table class="table mt-5 table-sm">
                      <tbody>
                        <tr>
                          <td scope="row">Total</td>

                          <td>{{ $s->total_fee}}</td>
                        </tr>
                        <tr>
                          <td scope="row">Paid</td>
                          <td>{{ $s->paid_amount}}</td>

                        </tr>
                        <tr>
                          <td scope="row">Unpaid</td>
                          <td>{{$s->total_fee- $s->paid_amount}}</td>
                        </tr>
                        <tr>
                          <td scope="row"><a class="btn btn-primary mt-1" href="{{ route('studentpayments',$s->user->id) }}">Mark Payment</a></td>
                          </tr>
                        </tbody>
                    </table>

                    <h4 class="card-title">Classes</h4>

                    <table class="table mt-3 table-sm">
                        <tbody>
                          <tr>
                            <td scope="row">Total sessions</td>
                            <td><h5><span class="badge badge-primary">{{ $s->total_session }}</span></h5></td>
                          </tr>
                          <tr>
                            <td scope="row">Completed Sessions</td>
                            <td><h5><span class="badge badge-success">{{ $s->completed_session }}</span></h5></td>
                          </tr>
                          <tr>
                            <td scope="row">Not Completed Sessions</td>
                            <td><h5><span class="badge badge-danger">{{ $s->total_session - $s->completed_session }}</span></h5></td>
                          </tr>
                          <tr>
                            <td scope="row"><a href="{{ route('studenteventcalendar', $s->user_id) }}" class="btn btn-primary" type="button" >View Calender</a></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>
              @endforeach
              
              <div class="card mt-4 mb-2">

                <div class="card-body">
                    <h4 class="card-title">Exam Results</h4>
                    <div class="row">
                    @foreach ($examdetails as $examdetail)
                    @foreach ($examdetail->exams as $exam)
                      <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <table class="table mt-5 table-sm">
                              <tbody>
                                <tr>
                                  <td scope="row">Type</td>
                                  <td><h5>{{ $exam->type }}</h5></td>
                                </tr>
                                <tr>
                                  <td scope="row">Exam date</td>
                                  <td><h5>{{ $exam->date }}</h5></td>
                                </tr>
                                <tr>
                                  <td scope="row">Result</td>
                                  <td><h5>{{ $exam->result }}</h5></td>
                                </tr>
                                <tr>
                                  <td scope="row">Attempt</td>
                                  <td><h5>{{ $exam->attempt }}</h5></td>
                                </tr>
                                <tr>
                                  <td scope="row"><a href="{{ route('editexamlist',$exam->user_id) }}" type="button" class="btn btn-primary">Edit Results</a></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>  
                    @endforeach
                    @endforeach
                    </div>
                  </div>
                </div>

              </div>

        </div>
      </div>

      <div id="Invoices" class="tabcontent container">
        <div class="mydiv1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="table-responsive">
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
      </div>




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


<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection

