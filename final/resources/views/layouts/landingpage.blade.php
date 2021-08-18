<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Learners Managment System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0 login_btn" type="submit"><a class="nav-link" href="{{ route('login') }}" style="color: rgb(38, 192, 11) !important">Login</span></a></button>
                    @endif
                </form>
            </nav><!-- .nav-menu -->
        </div>
    </header>
    <!-- End Header -->

        {{-- <div class="logo">
            <a href="{{'/'}}">
                <img src="/uploadimages/company_logo/{{ $logo->logo }}" alt="" style="width: 150px; height: auto;">
            </a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">

            <div class="container">

                <a class="navbar-brand" href="{{'/'}}" id="name" style="display: none">Shan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto" style="padding-right: 100px">
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
                        @if (Route::has('login'))
                        <button class="btn btn-sm btn-outline-success my-2 my-sm-0 login_btn" type="submit"> <a class="nav-link" href="{{ route('login') }}" style="color: rgb(236, 232, 0) !important">Login</span></a></button>
                        @endif
                    </form>

                </div>
            </div>
        </nav> --}}

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color: #05022B !important">
        <div class="footer-top" style="background-color: #05022B !important; border-top: 0px; border-bottom: 0px">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Mamba</h3>
                        <p>
                          A108 Adam Street <br>
                          NY 535022, USA<br><br>
                          <strong>Phone:</strong> +1 5589 55488 55<br>
                          <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                          <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="">Group Six</a>
            </div>
        </div>
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
