@extends('layouts.landingpage')
@section('content')
    <style>
                body{
            /* background-image: url("images/services.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center; */
            background: rgb(34,191,168);
            background: linear-gradient(90deg, rgba(34,191,168,0.969625350140056) 0%, rgba(17,70,185,1) 52%, rgba(32,210,208,1) 100%);
            
        }


                /* .content {
            position: relative;
            width: 90%;
            max-width: 400px;
            margin: auto;
            overflow: hidden
        } */

        .content .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            height: 99%;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s
        }

        .content:hover .content-overlay {
            opacity: 1
        }

        .content-image {
            width: 100%
        }

        img {
            box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
            border-radius: 5px
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1
        }

        .content-details h3 {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase
        }

        .content-details p {
            color: #fff;
            font-size: 0.8em
        }

        .fadeIn-bottom {
            top: 80%
        }
    </style>

           <!-- start the main part  -->
           <div id="main">
            <!-- <img src="images/services.png" class="img-fluid" alt="Responsive image" style="width: 100%; height: auto;"> -->
              <div class="container mt-5">

                <h1 class="text-center">Our Sevices</h1>
                 
                <div class="card-deck mt-3 mb-3">
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Motor Bike Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Three wheel Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/manual_gear.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Manual Car/Van Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                </div>

                <div class="card-deck mt-3 mb-3">
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Auto Car Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Prime Mover Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Heavy Vehical Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                </div>

                <div class="card-deck mt-3 mb-3">
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Home Visit Training</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Online Scheduling</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Theory Lesson Individual Classes</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                </div> 

                <div class="card-deck mt-3 mb-3">
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Individual practrical lessons</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">Messaging system</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                  
                  <div class="card content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="/images/landingpage/car.jpg" alt="Card image cap">
                    <div class="card-body content-details fadeIn-bottom">
                      <h5 class="card-title content-title text-light">THeory Lesson Individual Classes</h5>
                      <p class="card-text content-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <!-- <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div> -->
                  </div>
                </div> 

               

              </div>
          </div>
          
      <!-- end of the main part  -->
@endsection