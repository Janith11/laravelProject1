@extends('layouts.ownerapp')

@section('content')
    <div class="container">
        
    <!-- start first row  -->
        <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="text-left">
                            <h3 class="text-left"  id="page_header">Students</h3>
                        </div>
                        <div class="ml-auto" style="margin-right: 20px;">
                            <a href="{{ route('addstudent') }}" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i> Add Student</a>
                            <button type="button" class="btn btn-sm btn-success toggle-search">Filter</button>
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
            
    <!-- start the card of the instructors  -->
        <div class="row mt-5">
            <!-- student table -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->email }}</td>
                        <td>edit || delete</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                <!-- Modal -->
                <div class="modal fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    
                        <div class="modal-content">
                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="modelTitle">Add New Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    
                            <div class="modal-body">
                                <form>
                                    
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="emal" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" pattern=".{10}" class="form-control" id="contact" placeholder="Mobile number">
                                    </div>
                                    
                                    <!-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> -->
                                    
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </form>
                            </div>
                    
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        
                        </div>
                    </div>
                </div>
@endsection