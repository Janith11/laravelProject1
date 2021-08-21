@extends('layouts.landingpage')
@section('content')
    <style>
                body{
            /* background-image: url("images/services.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center; */
            /* background: rgb(82,171,158);
            background: linear-gradient(90deg, rgba(82,171,158,1) 0%, rgba(235,138,221,1) 35%, rgba(22,155,247,1) 100%); */
            
        }
        
                /* .content {
            position: relative;
            width: 90%;
            max-width: 400px;
            margin: auto;
            overflow: hidden
        } */
        .card{
          padding: 30px;
        }
        .content{
            /* border-radius: 20px; */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .content .content-overlay {
            background: rgba(15, 1, 141, 0.507);
            /* border-radius: 20px; */
            position: absolute;
            /* height: 99%; */
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

                <h1 class="text-center mb-5">Road Signs</h1>
                 
            <div class="card-deck mt-3 mb-3">

                <div class="card content">
                    <a href="{{ route('dangerwarning') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/2.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Danger Warning Signs</h3>                       
                        </div>
                    </a>
                </div>
                  
                <div class="card content">
                    <a href="{{ route('prohibitorysigns') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/Prohibitorysigns/1.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Prohibitory Signs</h3>
                        </div>
                    </a>
                </div>
                  
                <div class="card content">
                    <a href="{{ route('mandatorysigns') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/Mandatorysigns/8.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Mandatory Signs</h3>
                        </div>
                    </a>
                </div>
            </div>    

            <div class="card-deck mt-3 mb-3">

                <div class="card content">
                    <a href="{{route('prioritysigns') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/Prioritysigns/2.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Priority Signs</h3>
                        </div>
                    </a>
                </div>
                  
                <div class="card content">
                    <a href="{{ route('informativesigns') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/Informativesigns/7.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Informative Signs</h3>
                        </div>
                    </a>
                </div>
                  
                <div class="card content">
                    <a href="{{ route('routenumbersign') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image mt-5" src="/images/roadsigns/Routenumbersigns/2.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Route Number Signs</h3>
                        </div>
                    </a>
                </div>
            </div>   

            <div class="mt-3 mb-3">

                <div class="card content col-4 mr-5">
                    <a href="{{ route('trafficlightsignals') }}">
                        <div class="content-overlay"></div>
                        <img class="card-img-top content-image" src="/images/roadsigns/Trafficlightsignals/5.png" alt="Card image cap">
                        <div class="card-body content-details fadeIn-bottom">
                          <h3 class="card-title content-title text-light">Traffic Light Signals</h3>
                        </div>
                    </a>
                </div>              
               
            </div>    

            
               

              </div>
          </div>
          
      <!-- end of the main part  -->
@endsection