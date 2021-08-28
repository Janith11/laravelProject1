<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Learners Managment System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/newfavicon.png') }}" rel="icon">
    {{-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}} " rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <div class="logo float-left">
                {{-- <h1 class="text-light"><a href="index.html"><span>Mamba</span></a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{'/'}}"><img src="/uploadimages/company_logo/{{ $logo->logo }}" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{'/'}}">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#team">Galary</a></li>
                    <li class="drop-down"><a href="">More</a>
                        <ul>
                            <li><a href="{{ route('rmvregulations') }}">RMV Regulations</a></li>
                            <li><a href="{{ route('roadsigns') }}">Road Sings</a></li>
                            <li><a href="{{ route('onlinepaper') }}">Past Papers</a></li>
                            <li><a href="{{ route('prices') }}">Prices</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0" style="padding-left: 1-px">
                    @if (Route::has('login'))
                    <button style="display: inline" class="btn btn-sm btn-outline-success my-2 my-sm-0 login_btn" type="submit"><a class="nav-link" href="{{ route('login') }}" style="color: rgb(38, 192, 11) !important">Login</span></a></button>
                    @endif
                    {{-- @if (Route::has('register'))
                        <button style="display: inline" class="btn btn-sm btn-outline-success my-2 my-sm-0 login_btn" type="submit"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></button>  
                     @endif --}}
                </form>
            </nav><!-- .nav-menu -->
        </div>
    </header>

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color: #05022B !important">
        <div class="footer-top" style="background-color: #05022B !important; border-top: 0px; border-bottom: 0px">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-info">
                        @foreach ($companydetailfooter as $cdetail)
                            <h3>{{ $cdetail->company_name }}</h3>
                            <p>{{ $cdetail->address_no }}, {{ $cdetail->address_lineone }}</p>
                            <p>{{ $cdetail->address_linetwo }}, Sri Lanka</p>
                            <p><Strong>Phone:</Strong> {{ $cdetail->contact_number }}</p>
                            <p><Strong>Email:</Strong> {{ $cdetail->email }}</p>
                        @endforeach
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">All Vehicle category training</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Online lesson schedule</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Consulting</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Quick responses</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Trusted Instructors</a></li>
                        </ul>
                    </div>

                    {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                          <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div> --}}

                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Learners Management System</span></strong>. All Rights Reserved
            </div> --}}
            {{-- <div class="credits">
                Designed by <a href="">Group Six</a>
            </div> --}}
        {{-- </div> --}}
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
