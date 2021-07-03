@extends('layouts.ownerapp')
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

    <div class="row mb-2 justify-content-end">
        <div style="display: inline-block">
            @foreach ($student as $s)  
            <div style="display: inline-block">
                <a href="{{ route('addnewexamresult',$s->user_id) }}" type="button" class="btn btn-primary">Add New</a>
            </div>
            <div style="display: inline-block">
                {{-- <a type="button" class="btn btn-primary" href="{{ route('timetable') }}">View Student</a> --}}
            </div>
            @endforeach
        </div>
    </div>

    <div class="row-mb-2">
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
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Student result sheet</h5>
                    <hr style="border: 0.5px solid #222944">
                    <form >

                        

                        <div class="row">
                            @foreach ($student as $s) 
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
                       
                        <div class="row">
                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="attempt">Attempt</label>
                                    <input type="text" name="attempt" class="form-control"  placeholder="Enter the attempt..." value="{{ $exam->attempt }}">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="result">Result</label>
                                    <select  class="form-control" name="result">
                                        <option value= "pass" {{ 'pass' == $exam->result ? 'selected' : ''}} >Pass</option>
                                        <option value= "fail" {{ 'fail' == $exam->result ? 'selected' : ''}}>Fail</option>
                                        <option value= "none" {{ 'none' == $exam->result ? 'selected' : ''}}" >None</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select  class="form-control" name="type">
                                        <option value= "theory" {{ 'theory' == $exam->type ? 'selected' : ''}} >Theory</option>
                                        <option value= "practical" {{ 'practical' == $exam->type ? 'selected' : ''}} >Practical</option>
                                        <option value= "none" {{ 'none' == $exam->type ? 'selected' : ''}} >None</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4" id="register_form_item">
                                <div class="form-group">
                                    <label for="bithday">Exam date</label>
                                    <input type="date" class="form-control" id="bithday" name="date" value="{{ $exam->date }}">
                                </div>
                            </div>

                        </div>                   
                           
                        
                        <div class="row">
                            <div class="col-sm 4" id="register_form_item">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

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