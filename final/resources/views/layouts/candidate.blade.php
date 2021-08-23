<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learner</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/newfavicon.png') }}" rel="icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<style>
    .mybackground{
        background-color: #18EE80;
        /* width: 50vw;
        height: 100vh; */
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: -9999;
        clip-path: circle(600px at left 500px);
    }
    @media(min-width:1200px){
        .myimage{
            width: 31rem;
        }
        .mybackground{
            clip-path: circle(700px at left 400px);
        }
    }
    @media(max-width:1200px){
        .myimage{
            width: 26.9rem;
        }
        .mybackground{
            clip-path: circle(520px at left 400px);
        }
    }
    @media(max-width:1100px){
        .myimage{
            width: 24.7rem;
            /* padding-top: 0px; */
        }
        .mybackground{
            clip-path: circle(520px at left 400px);
        }
        p{
            font-size: 0.7rem;
        }
    }
    @media(max-width:992px){
        .myimage{
            width: 25rem;
            padding-top: 2.5rem;
        }
        .mybackground{
            clip-path: circle(600px at left 200px);
            height: 110vh;
        }
        p{
            font-size: 0.8rem;
        }
    }
    @media(max-width:768px){
        .myimage{
            width: 24.2rem;
            padding-top: 3.6rem;
        }
        .mybackground{
            clip-path: circle(700px at left 100px);
        }
    }
    @media(max-width:510px){
        .myimage{
            width: 21rem;
            padding-top: 3.6rem;
        }
        .mybackground{
            clip-path: circle(1000px at left -390px);
        }
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="link">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>
          </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>
    </nav>
    <div class="mybackground">

    </div>
    <div class="container-fluid">
        <div class="col-md-6 col-sm-12 float-left">
            <img src="/images/candidate/girl.png" alt="girl" style="height: auto; margin-top: 0px; margin-left: 0px;" class=" myimage">
        </div>
        <div class="col-md-6 col-sm-12 float-right ">
            @yield('content')
        </div>
    </div>
</body>
</html>
