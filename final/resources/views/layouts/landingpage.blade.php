<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* color: #636b6f; */
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

       {{-- boostrap cdn  --}}
       <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        

        <style>

            .nav-item:hover{
                background-color: #354e50;
                /* transform: scale(1.1); */
                border-radius: 5px;
            }

            /* style for carosal button */
            /* Carousel base class */
            .carousel {
                    margin-bottom: 4rem;
                }
                /* Since positioning the image, we need to help out the caption */
                .carousel-caption {
                    bottom: 3rem;
                    z-index: 10;
                    color: whitesmoke;
                }

                /* Declare heights because of positioning of img element */
                .carousel-item {
                    height: 32rem;
                    background-color: #777;

                }
                .carousel-item > img {
                    /* position:fixed; */
                    top: 0;
                    left: 0;
                    min-width: 100%;
                    height: 32rem;

                }

                /* RESPONSIVE CSS
                -------------------------------------------------- */

                @media (min-width: 768px) {
                    /* Bump up size of carousel content */
                        .carousel-caption p {
                        margin-bottom: 0 px;
                    
                        /* font-size: 10px */
                        /* line-height: 1.4; */
                    }
                    btn-lg{
                        width: 100%;
                    }    
                }

                @media only screen and (max-width: 320px) {
                    #worktimes{
                        width: 100%;
                    }
                }
     /* end the style for caroal btn */

        </style>

    </head>
    <body style="background-color: lightgray;">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{'/'}}">Shan</a>            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ '/' }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('contactus') }}">Contact us</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('roadsigns') }}">Road Signs</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link " href="{{ url('services') }}">Services</a>
                    </li>
                    <li class="nav-item dropdown active">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('rmvregulations') }}">RMV Regulations</a>
                        <a class="dropdown-item" href="{{ route('onlinepaper') }}">Online papers</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('prices') }}">Prices</a>
                      </div>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                    @if (Route::has('login'))
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"> <a class="nav-link" href="{{ route('login') }}">Login</span></a></button>
                      {{-- @auth
                        {{ route('login') }}
                      @endauth --}}
                     @endif
                  </form>
                </div>
            </div>
        </nav>

        <!-- defaut coding part  -->
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a> -->

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    <!-- @endauth
                </div>
            @endif -->
      
          @yield('content')
    </body>
</html>
