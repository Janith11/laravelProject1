@extends('layouts.student')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Georama&display=swap" rel="stylesheet">

<style>
  .card{
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
    font-family: 'Georama', sans-serif;
  }
  #img{
      width: 50px;
      height: auto;
      border-radius: 50px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding-left: 0px;
  }
</style>
<div class="container" >
      <div class="row">
          <div class="col-md-4">
            <div class="card mb-1">
              @foreach ($student as $s)             
              <div class="card-body">
                <div class="row d-flex justify-content-center">
                  <img class="rounded-circle border border-success " src="/uploadimages/students_profiles/{{ $s->user->profile_img }}" alt="profile image" >
                </div>
                <div class="mt-4 text-center">
                  <h3>{{ $s->user->f_name }} {{ $s->user->m_name }}</h3>
                  <p class="mt-1 mb-0">{{ $s->user->email }}</p>
                  <p class="">Group No.: {{ $s->group_number}}</p>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card mb-1">
              <div class="card-body">
                <h5 class="text-center mb-2">Training Category</h5>
                @foreach ($studentcategory as $category)              
                <div class="row mb-1">                
                  <div class="card w-100 text-center" style="background-color: rgb(226, 14, 162); color:white">
                    @if ($category->category == 'A')
                      <small>Bike</small>  
                    @elseif (($category->category == 'B1'))
                      <small>Three Weel</small>
                    @elseif (($category->category == 'C1'))
                      <small>Car, Van, Dual Purpose Vehicle</small>
                    @elseif (($category->category == 'C'))
                      <small>Heavy Vehicle</small>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card mb-1">
              <div class="card-body ">     
                <h3 class="mb-3 text-center">Upcoming Schedule</h3> 
                  <div class="row">
                    <div class="card w-100 mt-2 mb-1" style="background-color: rgba(123, 32, 151, 0.466)">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-4">
                            <h6>Title</h6>
                          </div>
                          <div class="col-8">
                            <h6>Theory Lession</h6>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                            <h6>Date</h6>
                          </div>
                          <div class="col-8">
                            <h6>2021/08/30 At 4.00 pm</h6>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="card w-100 mt-2 mb-1" style="background-color: rgba(123, 32, 151, 0.466)">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-4">
                            <h6>Title</h6>
                          </div>
                          <div class="col-8">
                            <h6>Theory Lession</h6>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                            <h6>Date</h6>
                          </div>
                          <div class="col-8">
                            <h6>2021/08/30 At 4.00 pm</h6>
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="card w-100 mt-2 mb-1" style="background-color: rgba(123, 32, 151, 0.466)">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-4">
                            <h6>Title</h6>
                          </div>
                          <div class="col-8">
                            <h6>Theory Lession</h6>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                            <h6>Date</h6>
                          </div>
                          <div class="col-8">
                            <h6>2021/08/30 At 4.00 pm</h6>
                          </div>
                        </div>
                      </div>
                    </div> 

                  </div>               
              </div>
            </div>

            <div class="card mb-2">
              <div class="card-body">
                <h3 class="text-center mt-2">Payments</h3>
                @foreach ($student as $s)  
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h6>Paid Amount</h6>
                      </div>
                      <div class="col">
                        <h6>Rs. {{ $s->paid_amount }}</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <h5>Total Amount</h5>
                      </div>
                      <div class="col">
                        <h5>Rs. {{ $s->total_fee }}</h5>
                      </div>
                    </div>
                  </div>  
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-2 bg-dark">
              <div class="card-body" style="color: white">
                <h3 class="mb-3 text-center">New Notice</h3> 
                @foreach ($posts as $post)                
                <div class="card mb-1">
                  <div class="card-header" style="background-color: #222944 !important; color: white; border-radius: 10px 10px 0px 0px">
                    <div>
                      <div style="display: inline-block">
                          <img class="rounded-circle" src="/uploadimages/owner_profile/{{ $post->user->profile_img }}" alt="profile image" id="img">
                      </div>
                      <div style="display: inline-block;padding-left: 10px">
                          <h5> {{ $post->user->f_name }} {{ $post->user->l_name }} <small>
                                  @if($post->user->role_id == 1)
                                      ( owner )
                                  @else
                                      ( instructor )
                                  @endif
                              </small>
                          </h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body" style="color: black">
                    <div id="post">{!! $post->message !!}</div>
                  </div>              
                </div>
                @endforeach
              </div>
            </div>
          </div>
        
      </div>

    </div>  
@endsection
