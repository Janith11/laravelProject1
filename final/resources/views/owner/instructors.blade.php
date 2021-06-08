@extends('layouts.ownerapp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="text-left">
                            <h3 class="text-left"  id="page_header">Instructors</h3>
                        </div>
                        <div class="ml-auto" style="margin-right: 20px;">
                            <a href="{{ route('addinstructor') }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i> Add Instructor</a>
                            <button type="button" class="btn btn-sm btn-success toggle-search"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- end of the first row  --> 
            <!-- start hidden filter  -->
            <div class="form search-filter mt-2" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter the name..">
                </div>
            </div>
            <script>
                // toogle search
                $(".toggle-search").click(function(){
                    $(".search-filter").slideToggle();
                });
            </script>
            <!-- end of the hidden filter  -->

            <!-- alert section -->
            @if(session('successmsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h3>
                        {{ session('successmsg') }}
                    </h3>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- end alert section -->
            
            <!-- start the card of the instructors  -->
            <div class="row mt-5">
                @foreach($instructors as $instructor)
                    <div class="col-sm-3 mb-2">
                        <div class="card text-center">
                            <div class="gradient">
                                <img src="https://image.flaticon.com/icons/png/512/147/147144.png" style="max-width: 100px; height: auto;" class="card-img-top mx-auto rounded-circle mt-3" alt="" id="image">
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">Name : {{ $instructor->user->f_name }} {{ $instructor->user->l_name }}</h5>
                            <h5 class="card-title">ID : {{ $instructor->user->id }}</h5>
                            <h5 class="card-title">Email : {{ $instructor->user->email }}</h5>
                            <h5 class="card-title">Contact : </h5>
                            <a href="{{ route('editinstructor', $instructor->user_id) }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Remove</a>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">since 2018</small>
                          </div>
                        </div>
                      </div>
                @endforeach
            </div>
    </div>
@endsection