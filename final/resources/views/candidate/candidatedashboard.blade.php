<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congratulations!!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        #bgcolour{
            width: 100%; 
            height: 100vh;
            /* color: #fff; */
            background: linear-gradient(-45deg,#EE7752,#E73C7E,#23A6D5,#23D5AB);
            background-size: 4000% 4000%; 
            position: relative; 
            animation: change 15s ease-in-out infinite;
        }
        @keyframes change{
            0%{
                background-position: 0 50%;
            }50%{
                background-position: 100% 50%;
            }100%{
                background-position: 0 50%;
            }
        }
        .card { 
          background-color: rgba(245, 245, 245, 0.6);
          box-shadow: 6 6px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s; 
        }
        
    </style>
</head>
<body id="bgcolour">
    <div class="container-fluid ">
        <div class="container">
            <div class="card mt-5 rounded">
              <div class="card-body">
                @if (auth()->user()->status == '1')
                <table class="table table-borderless mt-5 ">
                    <thead>
                      <tr class="text-center">
                        <th scope="col" id="days" class="display-3">00</th>
                        <th scope="col" id="hours" class="display-3">24</th>
                        <th scope="col" id="minutes" class="display-3">12</th>
                        <th scope="col" id="seconds" class="display-3">36</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td scope="row">Days</td>
                        <td>Hours</td>
                        <td>Minutes</td>
                        <td>Seconds</td>
                      </tr>
                   </tbody>
                  </table>
                  <h1 class="display-3">Congratulation</h1>
                  <h5>Now your request has been sent to the administration.</h5>
                  <h5>You have to wait maximum two working days.</h5>
                  <h5>If your request has accepted by the administration, you can log in to the system.</h5>
                  <h5>If your request hasn't accepted in within two working days, you can contact the administration by the  given contact numbes or email.</h5>
                  <h5>Sorry for any inconvenience this may cause.</h5>
                  @endif
                  @if (auth()->user()->status == '0')
                  <h1 class="display-3">Sorry, {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h1>
                  <h1 class="display-5">Your request has beed declined by the administration.</h1>
                  <h5>It may be,</h5>
                  <p>You have not give the correct infotmations.</p>
                  <p>You primary requiments to get the driving license is not completed.</p>
                  <p>You can inform the administration by using email or contact number given in the coutact us page.</p>
                  @endif
                  {{-- <p>{{ Auth::user()->created_at }}</p> --}}
                </div>  
            </div>
            
        </div>    
    </div>  
    
    @if (auth()->user()->status == '1')
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog " role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title">Congratulation!</h5>
              <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- <p>Modal body text goes here.</p> --}}
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
      function countdown(){
          var now = new Date();
          var x="{{ Auth::user()->created_at }}";
          var eventDate = new Date(x);
          var currentTime =now.getTime();
          var eventTime1 =eventDate.getTime();
          var eventTime=eventTime1+24*60*60*1000;
          var remainTime=eventTime-currentTime;
          var s= Math.floor(remainTime/1000);
          var m= Math.floor(s/60);
          var h= Math.floor(m/60);
          var d= Math.floor(h/24);

          h%=24;
          m%=60;
          s%=60;

          h =(h<10) ? "0"+ h:h;
          m =(h<10) ? "0"+ m:m;
          s =(h<10) ? "0"+ s:s;

          document.getElementById("days").textContent =d;
          document.getElementById("days").innerText =d;
          document.getElementById("hours").textContent =h;
          document.getElementById("minutes").textContent =m;
          document.getElementById("seconds").textContent =s;
          setTimeout(countdown,1000);
        }
        countdown();
    </script>
</body>
</html>