@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Edit exam lists</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>

    {{-- <div class="row mb-2 justify-content-end">
        <div style="display: inline-block">
            @foreach ($student as $s)  
            <div style="display: inline-block">
                <a href="{{ route('addnewexamresult',$s->user_id) }}" type="button" class="btn btn-primary">Add New</a>
            </div>
            <div style="display: inline-block">
                <a type="button" class="btn btn-primary" href="{{ route('viewstudent', $s->user_id) }}">View Student</a>
            </div>
            @endforeach
        </div>
    </div> --}}

    {{-- <div class="row-mb-2">
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
    </div>

    <div class="row-mb-2">
        @if(session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('categoryerror'))
            <div class="alert alert-danger">
                <h5>{{ session('categoryerror') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="col-mb-2">
        @if(count($errors) > 0)
            <div class="container">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div> --}}

    <div class="row-mb-2">
        <div id="card" >
            <div class="card" id="card" >
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold"> Result sheet</h5>
                    <hr style="border: 0.5px solid #222944">
                    <form >
                 @csrf

                        <div class="row">
                            @foreach ($users as $s) 
                           <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <p>{{ $s->user->f_name }} {{ $s->user->l_name }}</p>
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="nic">NIC</label>
                                    <p>{{ $s->user->nic_number }}</p>
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="contact number">Contact number</label>
                                    <p>{{ $s->user->contact_number }}</p>
                                </div>
                            </div>
                        </div>
                    </form>
                        @endforeach
                    
                        
                        @foreach ($examdetails as $examdetail)
                        @foreach ($examdetail->exams as $exam)
                        <form action="{{ route('saveexamlist',$exam->id) }}" method="POST"> 
                        @csrf
                       
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Exam type
                              <span class=" badge-pill">{{ $exam->type }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Exam date
                              <span class="badge-pill">{{ $exam->type }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Result
                              <span class="badge badge-primary badge-pill">{{ $exam->result }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Attempt
                                <span class=" badge-pill">{{ $exam->attempt }}</span>
                              </li>                            
                          </ul>             
                    </form>
                    <hr style="border: 0.5px solid #222944">
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    

</div>
@endsection

