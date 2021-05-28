@extends('layouts.landingpage')

@section('content')
    <!-- start the main part -->
    <div class="container " id="maincontainer">
            
        <div class="row d-flex justify-content-center">
            <h1>Contact Us</h1>
        </div>
    
        <!-- first container start  -->
        <div class="row mt-5">
            <!-- start the left side  -->
            <div class="col-md-6">
                
                <h2 class="text-center lead text-muted ">Send Us A Email</h2>
                
                <form>
                    
                    <small><span class="text-danger">*</span>Required</small>
                    <div class="form-group">
                      <label class="text-danger">*</label>
                      <input type="text" class="form-control"  placeholder="Your Name">
                    </div>
                    
                    <div class="form-group">
                        <label class="text-danger">*</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="text-danger">*</label>
                        <input type="text" class="form-control" placeholder="Contact Number">
                    </div>
                    
                    <div class="form-group">
                        <label class="text-danger">*</label>
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    
                    <div class="form-group">
                        <label class="text-danger">*</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-block">Send Mail</button>
                </form>
            
            </div>
            <!-- end of the left side  -->
            <!-- start the left side  -->
            <div class="col-md-6 ">
                <h2 class="d-flex justify-content-center lead text-muted "> Have a Questtion?</h2>
                <p class="d-flex justify-content-center">WE are here to help you with your enquiry.</p>
                <p class="d-flex justify-content-center">If you have any question, please feel free to speak to our team.</p>
                <div class="col text-center">
                    <h1 class="mt-4 mb-4">077-1234567</h1>
                    <button class="btn btn-success btn-lg"><i class="fas fa-phone-alt"></i> Call Us</button>
                    
                  </div>
                
                    <h2 class="d-flex justify-content-center mt-5"><i class="fas fa-map-marker-alt"></i> Address</h2>
                    <p class="lead text-muted d-flex justify-content-center">Dummy Address</p> 
                    <p class="lead text-muted d-flex justify-content-center">Lorem Ipsum Sit Amet</p> 
                    <p class="lead text-muted d-flex justify-content-center">Dummy Pin</p> 
                    <p class="lead text-muted d-flex justify-content-center">Dummy place</p> 
                 
                </div>
            </div>
        </div>

        <!-- <div class="container mt-5 mb-5"> -->
        <div class="row mb-2" style="justify-content: center;padding-top: 20px;">
            
            <div class="card" style="width: 72%;">
                        
                <img class="card-img-top" src="https://www.ceosuite.com/wp-content/uploads/2017/10/Hanoi-Lotte-Center-Serviced-Office-1.jpg?x27776" alt="Card image cap">

                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px 20px 20px 20px; border-radius: 10px; width: 50%; background: rgba(255, 255, 255, .8);" id="worktimes">
                    <h5 class="card-title text-center" style="color: #34314C; font-weight: bold;">Office Hours</h5>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Tuesday 8:30am - 5.30pm</p>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Wednesday 8:30am - 5.30pm</p>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Thursday 8:30am - 5.30pm</p>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Friday 8:30am - 5.30pm</p>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Saturday 8:30am - 3.30pm</p>
                    <p class="d-flex justify-content-center" style="color: #34314C;">Sunday 8:30am - 5.30pm</p>
                    <small><span class="text-danger">*</span> Closed on public holidays and every Monday</small>
                </div>
            </div>

        </div>

    </div>
@endsection