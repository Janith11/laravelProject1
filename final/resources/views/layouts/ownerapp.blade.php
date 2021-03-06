<!-- this is my own one  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learners</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/newfavicon.png') }}" rel="icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    {{-- fontawesome icon link --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{-- fullcalender links --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

    {{-- csrf token added janith --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: #FCFCFC;
            font-weight: 400;
            color: #696769;
            font-size: 14px;
            overflow-x: hidden;
        }

        a{
            text-decoration: none;
        }

        aside{
            background-color: #fff !important;
            width: 250px;
            height: 100%;
            position: fixed;
            float: left;
            z-index: 99;
            border-right: 1px solid #D4D9DD;
            -webkit-transition: all 0.9s ease;
            -moz-transition: all 0.9s ease;
            -o-transition: all 0.9s ease;
            transition: all 0.9s ease;
        }

        aside ul {
            padding-left: 0;
        }

        aside li {
            list-style: none;
        }

        aside i {
            font-size: 22px;
            margin-right: 15px;
            vertical-align: middle;
        }

        aside span.text {
            margin-top: 8px;
            position: absolute;
            font-size: 10px;
        }

        aside span.bubble {
            float: right;
            margin-top: 7px;
            width: 25px;
            height: 25px;
            padding-top: 8px;
            text-align: center;
        }

        aside label.menu-icon {
            width: 40px;
        }

        aside li a {
            display: block;
            font-size: 10px;
            color: #696769;
            padding: 7px !important;
        }

        aside li a span {
            margin-top: 6px;
        }

        aside li.menu-label {
            font-size: 11px;
            color: #A9ABB3;
            margin-left: 44px;
            margin-top: 33px;
            text-transform: uppercase;
        }

        /*.navbar-nav {
            background: #fff !important;
             height: 70px;
            padding: 15px;
            position: fixed;
            width: 100%;
            z-index: 98;
            -webkit-box-shadow: 0 0 45px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 0 45px 0 rgba(0, 0, 0, 0.12);
        }*/

        .header-right {
            float: right;
        }

        .header-links>li {
            display: inline-block;
            margin-left: 20px;
        }

        header .nav > li > a {
            padding: 0 !important;
        }

        header .nav > li > a.btn {
            padding: 6px 20px !important;
        }

        .header-left {
            float: left;
            margin-left: 245px;
            -webkit-transition: all 0.9s ease;
            -moz-transition: all 0.9s ease;
            -o-transition: all 0.9s ease;
            transition: all 0.9s ease;
        }

        header .nav > li > a.btn.btn-icon {
            padding-left: 40px !important;
        }

        .header-links>li.humbager, .header-links>li.header-logo {
            display: none;
        }

        .main-content {
            margin: 0 0 0 250px;
            padding: 30px;
            /* padding-top: 90px; */
            -webkit-transition: all 0.9s ease;
            -moz-transition: all 0.9s ease;
            -o-transition: all 0.9s ease;
            transition: all 0.9s ease;
        }

        a.close-aside {
            position: absolute;
            top: 11px;
            left: 162px;
            color: #A9ABB3;
            display: none;
        }

        .side-branding img {
            width: 170px;
            -webkit-transition: all 0.9s ease;
            -moz-transition: all 0.9s ease;
            -o-transition: all 0.9s ease;
            transition: all 0.9s ease;
        }

        .slimscroll-menu {
            padding: 45px 0px 30px 20px;
            padding-top: 45px;
        }

        .header-branding img {
            max-width: 125px;
            max-height: 50px;
            margin-right: 65px;
            margin-top: -6px;
        }

        .card-body{
            box-shadow: 0 4px 4px 0 rgba(0,0,0,0.1);
            border: none;
            background-color: white !important;
        }

        @media (max-width: 1100px) {
            aside {
                width: 200px;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            .slimscroll-menu {
                padding-left: 15px;
            }
            .main-content, footer {
                margin: 0 0 0 200px;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            footer {
                margin: 35px 15px 0 230px;
            }
            .side-branding img {
                max-width: 91%;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            .header-left {
                margin-left: 196px;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            /* start rane */
            .dropdown-menu{
                left: 0 !important;
                right: 0 !important;
                left: -50px !important;
            }
            /* end rane */
        }

        @media (max-width: 992px) {
            aside {
                margin-left: -200px;
                width: 200px;
                height: 100%;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            .main-content, footer {
                margin: 0 0 0 0px;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            footer {
                margin: 35px 15px 0 15px;
            }
            .humbager {
                margin-left: 0px;
                -webkit-transition: all 0.9s ease;
                -moz-transition: all 0.9s ease;
                -o-transition: all 0.9s ease;
                transition: all 0.9s ease;
            }
            .header-left {
                margin-left: 0px;
            }
            .header-links>li.humbager, .header-links>li.header-logo {
                display: inline-block;
            }
            .open-menu {
                margin-left: 0px;
                box-shadow: 0 10px 48px rgba(0, 0, 174, 0.5), 0 1px 1px rgba(255, 248, 254, 0.61);
                height: 100%;
            }
            a.close-aside {
                display: block;
            }
            .widget-title h1 {
                font-size: 38px;
            }
            .page-rightbar {
                width: 100%;
                position: relative !important;
                top: 0;
                margin-bottom: 30px;
            }
            .halfpage-content {
                padding-right: 0px;
                width: 100%;
            }
            /* start rane */
            .dropdown-menu{
                left: 0 !important;
                right: 0 !important;
                left: -50px !important;
            }
            /* end rane */
        }

        @media (max-width: 768px) {
            .header-links>li.scheduling-link {
                display: none !important;
            }
            .header-branding img {
                max-width: 125px;
                max-height: 50px;
                margin-right: 0;
            }
            .notification-date {
                float: none;
                margin-top: -7px;
            }
            .modal-dialog {
                width: 100% !important;
            }
            /* start rane */
            .dropdown-menu{
                left: 0 !important;
                right: 0 !important;
                left: -50px !important;
            }
            /* end rane */
        }

        @media (max-width: 510px) {
            .user-name{
                display: none;
            }
            .profile-name span {
                display: none;
            }

            /* start rane */
            .navbar-nav>li.humbager {
                margin-left: 0;
                float: left;
                display: inline-block;
            }
            .navbar-nav>li.header-logo{
                float: right;
                display: inline-block;
            }
            .dropdown-menu{
                left: 0 !important;
                right: 0 !important;
                left: -170px !important;
            }
            /* end rane */

            .header-links>li.humbager {
                margin-left: 0;
            }
            header .notify {
                margin-right: 0;
            }
            .auth-card {
                width: 80%;
            }
        }

        #sidebar{
            background-color: #222944 !important;
            background-image: url('upload/thunder.png');
        }

        #nav-item:hover{
            background-color: #ffffff10;
            border-radius: 5px 0px 0px 5px;
        }

        #nav-item:hover #item{
            padding-left: 2px;
            transition-duration: 0.5s;
        }

        #item{
            color: white;
            padding: 0px;
            position: relative;
            transition-duration: 0.5s;
            font-size: 15px;
        }

        .header{
            background-color: #1A1A1D;
        }

        .dropdoun{
            background-color: #222944;
        }

        #dropdown_item{
            background-color: #172222;
            color: #fff;
            border-radius: 15px;
        }

        #dropdown_item:hover{
            background-color: #3AAFA9;
        }

        #dropdown_item:hover #svg{
            background-color: #15DB95;
        }

        .item_div{
            padding-top: 10px;
            margin-left: 10px;
            margin-right: 10px;
            display: flex;
        }

        #svg{
            width: 35px;
            height: 35px;
            fill: #696769;
        }

        #svg:hover{
            fill: #15DB95;
        }

        .link{
            padding-left: 10px;
        }

        #img{
            padding-left: 10px;
            width: 40px;
            height: 40px;
            border-radius: 50px;
        }

        #submit_btn:hover{
            padding-left: 20%;
            padding-right: 20%;
            transition-duration: 0.5s;
        }

        #submit_btn{
            padding-left: 0px;
            padding-right: 0px;
            position: relative;
            transition-duration: 0.5s;
        }

        #dash_icon{
            fill: #4791DB;
            width: 12px;
            height: 12px;
        }

        #statics_cards{
            width: 14rem;
            background-color: #FFFFFF;
            box-shadow: 0px 0px 5px #E7E7E7;
            padding-top: 10px;
            margin-top: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #dash_text{
            color: #34314C;
            font-weight:bold;
        }

        .gradient{
            background-color: #155DAF; /* For browsers that do not support gradients */
            background-image: linear-gradient(#155DAF, #00254F);
            margin-bottom: 20px;
        }

        #image{
            margin-bottom: 20px;
        }

        #icon_background{
            background-color: #222A45;
        }

        #card{
            border-radius: 100px;
        }

        #page_header{
            color: #24292E;
            padding-left: 20px;
        }

        #register_form_item{
            padding-top: 10px;
        }

        #imagebtn{
            height: 35px;
            width: 35px;
            background-color: white;
            border-radius: 50%;
            display: inline-block;
        }

        #imageicon{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        /* image hover effect in vehicle page */
        #edit:hover{
            background-color: gray;
        }

        #figure {
            background: #000000;
            border-radius: 10px 10px 0px 0px;
        }

        #figure img {
            opacity: 1;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        #figure:hover img {
            opacity: .5;
        }

        #edit_image{
            background: #000000;
            border-radius: 10px;
        }

        #edit_image img {
            opacity: 1;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        #edit_image:hover img {
            opacity: .5;
        }

        /* edit image button */
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        #edit_image:hover .middle {
            opacity: 1;
        }

        /* ======================= dropdown menu style ===================== */
        .dropdown-container {
            display: none;
            padding-left: 50px;
            padding-bottom: 15px
        }
        .dropdownitem{
            color: white;
            font-size: 15px;
            text-decoration: none !important;
        }

        .dropdown-container ul li{
            list-style-type: disc !important;
        }

        .dropdown-container ul li a:hover{
            color: rgb(36, 247, 159) !important;
        }

        #card{
            padding-top: 10px;
        }

        .card{
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .card-body{
            border-radius: 10px;
        }

        .btn{
            border-radius: 50px !important;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        /* scrollbar styles */
        .scrollbar-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-deep-purple::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-deep-purple::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #512da8;
        }

        .scrollbar-deep-purple {
            scrollbar-color: #512da8 #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-cyan::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #00bcd4; }
            .scrollbar-cyan {
            scrollbar-color: #00bcd4 #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
            background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        }

        .bordered-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #512da8;
        }

        .bordered-deep-purple::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .bordered-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #00bcd4;
        }

        .bordered-cyan::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .square::-webkit-scrollbar-track {
            border-radius: 0 !important;
        }

        .square::-webkit-scrollbar-thumb {
            border-radius: 0 !important;
        }

        .thin::-webkit-scrollbar {
            width: 6px;
        }

        .example-1 {
            position: relative;
            overflow-y: scroll;
            height: 100vh;
        }

        .toggle.ios, .toggle-on.ios, .toggle-off.ios {
            border-radius: 20rem;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20rem;
        }

        /* start rane */
        .dropdown-toggle::after {
            display: none;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }

        .dropdown-menu{
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            position: absolute !important;
        }

    </style>

</head>

<body style="background-color: #FCFCFC;">

    <div>
       <!-- slidebar -->
        <aside>
            <div class="slimscroll-menu example-1 scrollbar-deep-blue bordered-deep-purple thin" id='sidebar'>
                <!-- close the menu  -->
                <a href="#" class="close-aside"><i class="fa fa-times" aria-hidden="true"></i></a>
                <!-- Branding -->

                <div class="side-branding text-center">
                    <a href="{{ url('/') }}">
                        {{-- commentd {{ $logo }} --}}
                        <img src="/uploadimages/company_logo/{{ $logo->logo }}" class="img-responsive" style="height: 100px; width: auto; padding-right: 9px !important">
                    </a>
                </div>

                <!-- navigation -->
                <ul style="padding-top: 40px">

                    {{-- <li class="menu-label">Main</li>
                    <div class="dropdown-divider"></div> --}}

                    <!-- margin botton mb-5 added for the scroll testing -->
                    <li class="nav-item  mb-3 dashboard" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/dashboard.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href="{{ route('owner.ownerdashboad') }}">
                                    <span class="menu-title " id="item">Dashboard</span>
                                </a>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item  mb-3 instructor" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/instructor.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href="{{ route('instructors') }}">
                                    <span class="menu-title" id="item">Instructors</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mb-2 students" id="nav-item">
                        <div class="dropdown-btn" style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/students.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block; width: 80%">
                                <a type="button">
                                    <div style=" width: 100%">
                                        <div style="display: inline-block">
                                            <span class="menu-title" id="item">Students</span>
                                        </div>
                                        <div style="display: inline-block" class="float-right">
                                            <i class="fa fa-angle-down fa-2x" style="padding-left: 10px; color: white"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown-container">
                            <ul style="list-style-type:disc !important;">
                                <li>
                                    <a href="{{ route('studentslist') }}" class="dropdownitem" >Student List</a>
                                </li>
                                <li>
                                    <a href="{{ route('addstudent') }}" class="dropdownitem">Add Student</a>
                                </li>
                                <li>
                                    <a href="{{ route('studentgroups') }}" class="dropdownitem">Student Groups</a>
                                </li>
                                <li>
                                    <a href="{{ route('ownerexamdates') }}" class="dropdownitem">Exam Dates</a>
                                </li>
                                <li>
                                    <a href="{{ route('ownerexamresult') }}" class="dropdownitem">Exam Results</a>
                                </li>
                                <li>
                                    <a href="{{ route('payments') }}" class="dropdownitem">Payments</a>
                                </li>
                                <li>
                                    <a href="{{ route('completedstudents') }}" class="dropdownitem">Completed Students</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- <li class="nav-item mb-3 chat" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/chat.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href="{{ route('ownerchat') }}">
                                    <span class="menu-title" id="item">Chat</span>
                                </a>
                            </div>
                        </div>
                    </li> --}}

                    <li class="nav-item mb-2 shedulings" id="nav-item">
                        <div class="dropdown-btn" style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/shedules.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block; width: 80%">
                                <a type="button">
                                    <div style=" width: 100%">
                                        <div style="display: inline-block">
                                            <span class="menu-title" id="item">Sessions</span>
                                        </div>
                                        <div style="display: inline-block" class="float-right">
                                            <i class="fa fa-angle-down fa-2x" style="padding-left: 10px; color: white"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-container">
                            <ul style="list-style-type:disc !important;">
                                <li>
                                    <a href="{{ route('ownershedulelist') }}" class="dropdownitem" >Sessions List</a>
                                </li>
                                @if($type->type == 1)
                                    <li>
                                        <a href="{{ route('owneraddschedule') }}" class="dropdownitem">Add Session</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('calendar') }}" class="dropdownitem">Calender</a>
                                </li>
                                <li>
                                    <a href="{{ route('timetable') }}" class="dropdownitem">Time Slots</a>
                                </li>
                                <li>
                                    <a href="{{ route('todayshedules') }}" class="dropdownitem">Today Sessions</a>
                                </li>
                                <li>
                                    <a href="{{ route('allshedules') }}" class="dropdownitem">All Sessions</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item mb-3 requests" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/request.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href="{{ route('viewrequest') }}">
                                    <span class="menu-title" id="item">Request</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mb-3 vehicle" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/vehicles.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href=" {{ route('vehicles') }} ">
                                    <span class="menu-title" id="item">Vehicles</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mb-3 category" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/vehicle_category.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href=" {{ route('vehiclecategory') }}">
                                    <span class="menu-title" id="item">Category</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mb-3 post" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/posts.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href=" {{ route('allposts') }}">
                                    <span class="menu-title" id="item">Posts</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mb-3 hrms" id="nav-item">
                        <div class="dropdown-btn" style="padding-left: 10px; width: 100%">
                            <div style="display: inline-block;">
                                <img src="/uploadimages/other/dashboardicons/hrm.png" alt="" style="width: 20px; height: auto; padding-bottom: 7px;">
                            </div>
                            <div style="display: inline-block; width: 80%">
                                <a type="button">
                                    <div style=" width: 100%">
                                        <div style="display: inline-block">
                                            <span class="menu-title" id="item">HRMS</span>
                                        </div>
                                        <div style="display: inline-block" class="float-right">
                                            <i class="fa fa-angle-down fa-2x" style="padding-left: 10px; color: white;"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-container" style="padding-left: 50px">
                            <ul>
                                <li>
                                    <a href="{{ route('attendanceslist') }}" class="dropdownitem" >Attendances</a>
                                </li>
                                <li>
                                    <a href="{{ route('salary') }}" class="dropdownitem">Payroll</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item mb-3 settings" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/settings.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href=" {{ route('settings') }}">
                                    <span class="menu-title" id="item">Settings</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-3 notification" id="nav-item">
                        <div style="padding-left: 10px">
                            <div style="display: inline-block">
                                <img src="/uploadimages/other/dashboardicons/notification.png" alt="" style="width: 20px; height: auto; padding-bottom: 5px;">
                            </div>
                            <div style="display: inline-block">
                                <a class="nav-link" href=" {{ route('viewalert') }} ">
                                    <span class="menu-title" id="item">Notifications</span>
                                </a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </aside>

        <!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important; box-shadow: 0 0 45px 0 rgba(0, 0, 0, 0.12); !important">

            {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}

                <ul class="navbar-nav" id="btn_logo">
                    <div>
                        <div style="display: inline-block">
                            <li class="humbager">
                                <a href="" class="btn btn-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </a>
                            </li>
                        </div>
                        <div style="display: inline-block; padding-left: 10px">
                            <li class="header-logo">
                                <a href="{{ url('/') }}" class="header-branding"><img src="/uploadimages/company_logo/{{ $logo->logo }}" class="img-responsive" style="height: 50px; width: auto"> </a>
                            </li>
                        </div>
                    </div>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div>
                            <div style="display: inline-block;">
                                <li class="nav-item active">
                                    <a class="nav-link "href=" {{ route('viewalert') }} ">
                                        <i class="fa fa-bell" aria-hidden="true"><span class="badge badge-pill badge-danger">{{ $shedulealerts + $requestalerts +count($expandrequests)}}</span></i>
                                    </a>
                                </li>
                            </div>
                            <div style="display: inline-block">
                                <li class="nav-item dropdown pull-left">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                        {{-- data-toggle="dropdown --}}
                                        <div>
                                            <div style="display: inline-block;">
                                                <h5 class="user-name" style="padding-right:10px; color: #222944">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h5>
                                                <span class="caret"></span>
                                            </div>
                                            <div style="display: inline-block; float:right">
                                                <img src="/uploadimages/owner_profile/{{ Auth::user()->profile_img }}" alt="Profile Image" class="rounded-circle border border-dark" style="width: 30px; height: auto;" >
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left pull-left" aria-labelledby="navbarDropdownMenuLink" style="left: -50px" id="target">
                                        <a class="dropdown-item" href="#">
                                            <div>
                                                <div style="display: inline-block">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    Edit Profile
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div>
                                                <div style="display: inline-block">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    Setting & Privacy
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div>
                                                <div style="display: inline-block">
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    Help & Support
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div>
                                                <div style="display: inline-block">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                </div>
                                                <div style="display: inline-block; padding-left: 10px">
                                                    {{ __('Logout') }}
                                                </div>
                                            </div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>
                        </div>
                    @endguest
                </ul>
            {{-- </div> --}}
        </nav>
        <!--/.Navbar -->

        <!-- main content -->
        <div class="main-content">
            @yield('content')
        </div>

        <div style="float: right; z-index: 10; ">
            <span class="badge badge-danger" style="z-index: 100;  position: fixed; bottom: 50px; right: 4.9%;font-size: 0.9rem;">{{ count($newmessages) }}</span>
            <a type="button" class="btn" style="background-color: #222944 ;padding: 20px; position: fixed; bottom: 20px; right: 5%;width: 50px; height: 50px;" id="chat-icon" href="{{ route('ownerchat') }}">

                <div style="padding-top: 5px; padding-left: 4px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16" style="left: 50%; margin-right: -50%; transform: translate(-50%, -50%)">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>

</body>

<script>
    // Jquery start
    $(document).ready(function() {

        $('#toggle').hide();

        $('aside a').each(function() {
            if ($(this).attr('href') == window.location.pathname) {
                $(this).addClass('active');
            }
        });

        // close humbager
        $(".main-content").click(function() {
            if ($("aside").hasClass("open-menu")) {
                $("aside").removeClass("open-menu");
            }
        });
        $(".close-aside").click(function(event) {
            event.preventDefault();
            $("aside").removeClass("open-menu");
        });

        // humbager
        $(".humbager").click(function(event) {
            event.preventDefault();
            if ($("aside").hasClass("open-menu")) {
                $("aside").removeClass("open-menu");
            } else {
                $("aside").addClass("open-menu");
            }
        });
    });

    // $('#logout').click(function(){
    //     $('#toggle').toggle();
    // });

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    // script for display side dropdown
    $('#navbarDropdownMenuLink').click(function(){
        $('#target').toggle();
    });
</script>

</html>
