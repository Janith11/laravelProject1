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
    <div class="row-mb-2">
        <div id="card" >   
          <div class="card-body">
            <div class="card mt-2">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold"> Result sheet</h5>
                    <hr style="border: 0.5px solid #222944">    
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
                        @endforeach
                </div>
            </div>                       
            @foreach ($examdetails as $examdetail)
            @foreach ($examdetail->exams as $exam)
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="row">
                                <div class="col">
                                    <p>Exam Type</p>
                                </div>
                                <div class="col">
                                    {{ $exam->type }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Exam Date
                                </div>
                                <div class="col">
                                    date                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Result
                                </div>
                                <div class="col">
                                    {{ $exam->result }}                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Attempt</p>
                                </div>
                                <div class="col">
                                    {{ $exam->attempt }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    {{-- <hr style="border: 0.5px solid #222944"> --}}
                </div>
            </div>
            @endforeach
            @endforeach
          </div>    
        </div> 
    </div> 
@endsection

