@extends('layouts.ownerapp')

@section('content')
    <div class="container">

        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Instructors</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a style="padding-top: 6px; padding-left: 10px"> / Instructors list</a>
        </div>

        <div class="row mb-2">
            <div class="ml-auto" style="margin-right: 20px;">
                <a href="{{ route('addinstructor') }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i> Add Instructor</a>
                {{-- <button type="button" class="btn btn-sm btn-warning toggle-search"><i class="fas fa-trash-alt"></i> Removed Instructors</button> --}}
                <a href="{{ route('viewremovedinstructors') }}" class="btn btn-sm btn-warning">Removed Instructors</a>
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
                    <div class="col-sm-4 mb-2">
                        <div class="card rounded">
                            <div class="gradient text-center p-2">
                                <img class="rounded-circle border border-success" style="max-width: 200px" src="/uploadimages/instructors_profiles/{{ $instructor->profile_img }}" alt="profile image">
                            </div>
                            <div class="card-body shadow table-responsive">
                                <table class="table table-sm">
                                    <tbody>
                                      <tr>
                                        <td scope="row"><h5 class="card-title">Name</h5></td>
                                        <td><h5>{{ $instructor->f_name }} {{ $instructor->l_name }}</h5></td>
                                      </tr>
                                      <tr>
                                        <td ><h5 class="card-title">ID</h5></td>
                                        <td><h5>{{ $instructor->id }}</h5></td>
                                      </tr>
                                      <tr>
                                        <td ><h5 class="card-title">Categories</h5></td>
                                        @foreach ($categories as $c)                                        
                                          @if($c->user_id == $instructor->id)
                                                @if ($c->category == "A")
                                                <td><p class="badge badge-warning">Bike</p></td>    
                                                @endif
                                                @if ($c->category == "B")
                                                <td><p class="badge badge-warning">Three Wheel</p></td>    
                                                @endif
                                                @if ($c->category == "C1")
                                                <td><p class="badge badge-warning ">Dual Purposes</p></td>    
                                                @endif
                                                @if ($c->category == "C")
                                                <td><p class="badge badge-warning ">Heavy Vehicle</p></td>    
                                                @endif
                                          @endif      
                                        @endforeach
                                      </tr>
                                      <tr>
                                        <td ><h5 class="card-title">Contact</h5></td>
                                        <td><h5>{{ $instructor->contact_number }}</h5></td>
                                      </tr>
                                      <tr>
                                        <td ><a href="{{ route('editinstructor', $instructor->id) }}" class="btn btn-warning">Edit</a></td>
                                            <form method="POST" action="{{ route('removeinstructor',$instructor->id) }}" id="delete-form-{{ $instructor->id }}" style="display: none">
                                              @csrf
                                            </form>
                                            <td><button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $instructor->id }}').submit();
                                            }else{
                                                event.preventDefault();
                                            }" href="" class="btn btn-danger" >Remove
                                            </button>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                          </div>
                        </div>
                      </div>
                @endforeach
            </div>
    </div>

    <script>
        $(document).ready(function(){
            $('aside ul .instructor').css('border-left', '5px solid #00bcd4');
        })
    </script>

@endsection
