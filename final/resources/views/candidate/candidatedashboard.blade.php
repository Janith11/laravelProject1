 @extends('layouts.candidate')  
 @section('content')
  <style>
    #demo{
      text-align: center;
      font-size: 3rem;
      margin-top: 0px;
    }
    body{
      font-family: 'Noto Sans TC', sans-serif;
    }
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
  {{-- status 3 deleted students
    status 4 dfeleted instructor --}}
  <body>
    <div> 
      @if (auth()->user()->status == '1')
        {{-- countdown  --}}
        <div class="mt-5">
          <p class="mt-4 text-center" style="color: rgb(4, 121, 53); font-size: 1.5rem;">Time Remaining</p>
          <div class="card mt-2 mb-4" style="background-color: #333333;color: white; border-radius: 1.9rem">
            <p id="demo"></p>     
          </div>
          <div class="">
            <h1 class="text-center mb-4" style="color: rgb(219, 10, 10)">Congratulation!</h1>
            <div class="card shadow" style="border-radius: 2rem">
              <div class="card-body">
                <p><i class="fas fa-check-circle fa-lg text-success"></i> Now your request has been sent to the administration.</p>
                <p><i class="fas fa-check-circle fa-lg text-success"></i> You have to wait maximum two working days.</p>
                <p><i class="fas fa-check-circle fa-lg text-success"></i> If your request has accepted by the administration, you can log in to the system.</p>
                <p><i class="fas fa-check-circle fa-lg text-success"></i> If your request hasn't accepted in within two working days, you can contact us via the given contact us link.</p>
                <p><i class="fas fa-check-circle fa-lg text-success"></i> Sorry for any inconvenience this may cause.</p>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="{{ route('firstpage') }}" class="btn btn-primary btn-sm"><i class="far fa-address-card p-1 fa-lg"></i>Contact Us</a>
              </div>
            </div>  
          </div>   
        </div>
      @endif

      @if (auth()->user()->status == '0')
        <div class="mt-5">
          <div class="card shadow-lg p-1" style="border-radius: 3rem;">
            <div class="card-body mt-1 mb-3">
              <h3 class="text-info">Sorry, {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h3>
              <h3 class="text-danger">Your request has beed declined by the administration.</h3>
              <p>It may be,</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i> You have not give the correct infotmations.</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i> You primary requiments to get the driving license is not completed.</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i> You can inform the administration by using the given contact us page.</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i> Sorry for any inconvenience this may cause.</p>
            </div>
            <div class="card-footer text-muted text-center">
              <a href="{{ route('firstpage') }}" class="btn btn-primary btn-sm"><i class="far fa-address-card p-1 fa-lg"></i>Contact Us</a>
            </div>
          </div>
        </div>
      @endif

      @if (auth()->user()->status == '3')
        <div class="mt-5">
          <div class="card shadow-lg p-1" style="border-radius: 3rem;">
            <div class="card-body mt-1 mb-3">
              <h3 class="text-info">Sorry, {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h3>
              <h3 class="text-danger">Your account has been deleted by the administration.</h3>
              <p>It may be,</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i><span class="text-success"> Congratulations!</span> You done your training programe successfully. <span class="text-muted">If it is you can ignore this and your account will be deleted completely as soon.</p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> The administration identify you did not allow the terms and conditions of the company.</span></p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> If you did not agree with the above statements you can contact us via below link.</p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> Sorry for any inconvenience this may cause.</p>
            </div>
            <div class="card-footer text-muted text-center">
              <a href="{{ route('firstpage') }}" class="btn btn-primary btn-sm"><i class="far fa-address-card p-1 fa-lg"></i>Contact Us</a>
            </div>
          </div>
        </div>
      @endif
      @if (auth()->user()->status == '4')
        <div class="mt-5">
          <div class="card shadow-lg p-1" style="border-radius: 3rem;">
            <div class="card-body mt-1 mb-3">
              <h3 class="text-info">Sorry, {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h3>
              <h3 class="text-danger">Your account has been removed by the administration.</h3>
              <p>It may be,</p>
              <p><i class="fas fa-check-circle fa-lg text-success"></i><span class="text-success"> Retirement Congratulations!  </span>It’s time to follow dreams long set aside and enjoy the rewards of work done well. Wishing you the best, CEO!<span class="text-muted">Now this is a tempory account. Your account will be deleted as soon as possible.</p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> Your resignation letter is accepted by the administration. Thank you for being work with us. Good Luck!</span></p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> The administration identify you did not allow the terms and conditions of the company.</span></p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> If you did not agree with the above statements you can contact us via below link.</p>
              <p class="text-muted"><i class="fas fa-check-circle fa-lg text-success"></i> Sorry for any inconvenience this may cause.</p>
            </div>
            <div class="card-footer text-muted text-center">
              <a href="{{ route('firstpage') }}" class="btn btn-primary btn-sm"><i class="far fa-address-card p-1 fa-lg"></i>Contact Us</a>
            </div>
          </div>
        </div>
      @endif
    </div>
  
      @if (auth()->user()->status == '1')
      <div class="modal mt-4" tabindex="-1" role="dialog" id="myModal">
          <div class="modal-dialog " role="document">
            <div class="modal-content ">
              <div class="modal-header">
                <h5 class="modal-title">Congratulation!</h5>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="/images/candidate/trophy.gif" alt="candidate" class="img-fluid">
                <h3 class="mt-3 mb-2 text-center text-success">Congratulations!</h3>
                <p class="text-center"> <span class="text-info">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</span> ,you have been personally reviewd and selected by the administration.</p>
                <p class="text-center"><b>Good Luck!</b></p>
              </div>
              <div class="modal-footer mx-auto">
                <button type="button" class="btn btn-success" data-dismiss="modal">Continue</button>
              </div>
            </div>
          </div>
      </div>
      @endif
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>
   
    <script>
        var x="{{ Auth::user()->created_at }}";
        var eventDate = new Date(x);
        var countDownDate1 =eventDate.getTime();
        var countDownDate=countDownDate1+48*60*60*1000;
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }
      , 1000);
    </script>
@endsection
