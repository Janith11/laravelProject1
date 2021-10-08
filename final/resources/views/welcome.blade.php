@extends('layouts.landingpage')
{{-- fontawesome cdn   --}}
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
    .img_div{
        background-color: #FFFFFF;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        z-index: 50000;
        position: absolute;
        padding-top: 25px;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        left: 25%
    }
    .mysuccessmsg{
      position: absolute;
      z-index: 99999999;
      width: 100%;
    }

    .content{
        transition: transform 1s;
    }

    .content:hover{
        transform: scale(1.05);
    }
    @media (max-width: 992px){
      .openhour{
        font-size: 11px;
        padding: 2px;
        margin: 0px;
      }
      .openhourh5{
        font-size: 22px;
      }
    }
    @media (max-width: 768px){
      .openhour{
        font-size: 9px;
        padding: 2px;
        margin: 0px;
      }
      .openhourh5{
        font-size: 15px;
      }
    }
    @media (max-width: 600px){
      .openhour{
        font-size: 8px;
        padding: 2px;
        margin: 0px;
      }
      .openhourh5{
        font-size: 14px;
      }
    }
    @media (max-width: 510px){
      .openhour{
        font-size: 7px;
        padding: 2px;
        margin: 0px;
      }
      .openhourh5{
        font-size: 12px;
      }
    }
    @media (max-width: 434px){
      .openhour{
        font-size: 6px;
        padding: 1px;
        margin: 0px;
      }
      .openhourh5{
        font-size: 10px;
      }
    }
</style>

@section('content')

  

    <!-- ======= Hero Section ======= -->
    <div>
      <div class="row mysuccessmsg">
        
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
      </div>
  
      <div class="row">
        @if (count($errors) > 0)
          @foreach ($errors as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        @endif
    </div>


    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url('/images/landingpage/carosal1.png');">
                        <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Shan</span> Learners</h2>
                            <p class="animate__animated animate__fadeInUp">Are you hoping to be a good driver? This is the the place you are searching...</p>
                            <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto"><h6>Sign Up Now</h6></a>
                        </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url('/images/landingpage/carosal2.png');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Are you busy with works?</h2>
                                <p class="animate__animated animate__fadeInUp">Don't worry... This is the best driving school which can schedule with your free time</p>
                                <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto"><h6>Let's Drive</h6></a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url('/images/landingpage/carosal3.png');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Want to be a good driver?</h2>
                                <p class="animate__animated animate__fadeInUp">With our trusted instructors and good service compnay.let's come with us to join unreliable driving school experience</p>
                                <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto"><h6>Sign Up Now</h6></a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="/images/landingpage/aboutus.png" class="img-fluid" alt="">
            {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Who we are</h2>
              <p>Since we opened ou driving school, we have been helpingstudent and adult drivers build the skilsand confidence they need to be safe on the road. We do this through personalized instruction, working hand-in-hand with the students in order to understand their needs allowing us to provide them the most efficient learning.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-taxi"></i></div>
              <h4 class="title"><a href="">Best Learners School</a></h4>
              <p class="description">This is the most popular and good maintain school in this area. We have well trained instructors and management. Don't worry about your future.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-calendar-week"></i></div>
              <h4 class="title"><a href="">Online Schedule</a></h4>
              <p class="description">You won't waiting to schudule a time table with complex methods. This is the first ever system you can schedule your lessons via online. In this COVID-19 pandemic you don't need to come to the office. All function on your finger tips.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
      <div class="container">
        <h2 class="text-center mb-3">Gallery</h2>
  
        <div class="card-group">
          <div class="card">
            <img class="card-img-top hover-shadow" src="/images/landingpage/gallery/1.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/landingpage/gallery/2.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/landingpage/gallery/3.jpg" alt="Card image cap">
            
          </div>
        </div>

        <div class="card-group">
          <div class="card">
            <img class="card-img-top hover-shadow" src="/images/landingpage/gallery/4.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/landingpage/gallery/5.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/landingpage/gallery/6.jpg" alt="Card image cap">
            
          </div>
        </div>

        <div class="card-group">
          <div class="card">
            <img class="card-img-top hover-shadow" src="/images/landingpage/gallery/7.jpg" alt="Card image cap">
            
          </div>
          <div class="card ">
            <img class="card-img-top" src="/images/landingpage/gallery/8.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top hover-overlay" src="/images/landingpage/gallery/9.jpg" alt="Card image cap">
            
          </div>
        </div>

       

      </div>
    </section>
    <!-- End About Lists Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="fas fa-users" style="color: #20b38e;"></i>
              <span data-toggle="counter-up">400</span>
              <p>Total Students</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="fas fa-user-secret" style="color: #c042ff;"></i>
              <span data-toggle="counter-up">5</span>
              <p>Instructors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="fas fa-car-side" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up">17</span>
              <p>Vehicles</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="far fa-building" style="color: #ffb459;"></i>
              <span data-toggle="counter-up">4</span>
              <p>Branches</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
  
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="card-deck mb-3">
          <div class="card">
            <img class="card-img-top" src="https://dps.mn.gov/blog/PublishingImages/advanced-rider-course-715.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Motor Bike Training</a></h4>
              <p class="description">You can choose Auto or Manual transmission. This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="http://www.dailynews.lk/sites/default/files/news/2018/04/19/z_pviii-Abans.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Threewheel Training</a></h4>
              <p class="description">This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="https://www.rospa.com/getmedia/9934013b-7316-4664-a0d2-e76eef0c92e7/online-driver-safety-shop-large_1.jpg?width=790&height=640&ext=.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Dual Purpose vehicle Training</a></h4>
              <p class="description">This category has Car, Van and SUV as well as Auto and Manual Transmission.  All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.All our vehicles are new and fully air conditioned.</p>
            </div>
          </div>
        </div>
        <div class="card-deck mt-3 mb-3">
          <div class="card">
            <img class="card-img-top" src="https://www.datocms-assets.com/992/1507164309-istock-517377953.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Heavy vehicle Training</a></h4>
              <p class="description">This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.You have minimun two year experience with light weight vehicle.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="https://financesonline.com/uploads/2017/06/app.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Online scheduling lessons</a></h4>
              <p class="description">You can schedule your lessons via online relevent time table or you can request a new time table for you.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="https://www.scuoleditaliano.it/wp-content/uploads/2018/05/individuali.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title"><a href="">Individual theory/practrical lesson</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>
        <div class="card-deck mt-3 mb-3">
          <div class="card">
            <img class="card-img-top" src="https://techengage.com/wp-content/uploads/2019/04/best-messaging-apps.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Messaging</a></h4>
              <p class="description">You can directly message with the admistration and discuss your requirements very easily.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="https://media.istockphoto.com/photos/hand-arranging-wood-block-stacking-as-step-stair-on-paper-pink-picture-id1169974807?k=6&m=1169974807&s=612x612&w=0&h=cZUtqtxFYfv6xbQteqR7rtts57kIMU7yuKJqZlrSGZ0=" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Progress tracking</a></h4>
              <p class="description">You can see get idea about your progress displayed on your dashboard.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="https://st.depositphotos.com/1092019/3271/i/950/depositphotos_32714967-stock-photo-keyboard-with-customize-orange-button.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="title text-center"><a href="">Customizable profile</a></h4>
              <p class="description">You can customize your profile, lessons, details, add more training category etc.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

  

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>The most expereinced and talented instructors in this area.</p>
        </div>

        <div class="row">

          @foreach ($instructors as $instructor)        
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="/uploadimages/instructors_profiles/{{ $instructor->profile_img }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                
                <h4>{{ $instructor->f_name }} {{ $instructor->l_name }}</h4>
                <span>Senior Instructor</span>
               
              </div>
            </div>
          </div>
          @endforeach



        </div>

      </div>
    </section><!-- End Our Team Section -->

   
<div class="container">
  <div class="row mb-2" style="justify-content: center;padding-top: 20px;">
            
    <div class="card" style="width: 100%; height: 95%;" >
                
        <img class="image-fluid" src="/images/landingpage/openinghours.png" alt="Card image cap">

        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px 20px 20px 20px; border-radius: 10px; width: 50%; background: rgba(255, 255, 255, .8);" id="worktimes">
          {{-- <div class="mt-0" style="z-index:2000 "> --}}
            <h5 class="card-title text-center openhourh5" style="color: #34314C; font-weight: bold;">Office Hours</h5>
            @foreach ($openhours as $openhour)
              @if ($openhour->weekday_id == 1)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Monday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 2)
                <p class="d-flex justify-content-center openhour" style="color: #34314C;">Tuesday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 3)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Wednesday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 4)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Thursday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 5)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Friday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 6)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Saturday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
              @if ($openhour->weekday_id == 7)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Sunday {{ substr($openhour->from ,0,-3) }} am - {{ substr($openhour->to,0,-3) }} pm</p>  
              @endif
            @endforeach
            
            
            <small class="openhour text-danger">* Closed on every public holidays</small>
          {{-- </div> --}}
        </div>
    </div>

</div>
</div>


    <section id="contact" class="contact" style="background-color: #adcbff3f;">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box rounded" style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); background-color: rgb(255, 255, 255)">
              <i class="bx bx-map" style="background-color: white"></i>
              <h3>Address</h3>
              <p>{{ $companydetails->company_name}}<br/>{{ $companydetails->address_no }}, {{ $companydetails->address_lineone }}, {{ $companydetails->address_linetwo }}</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box rounded" style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); background-color: rgb(255, 255, 255)">
              <i class="bx bx-envelope" style="background-color: white"></i>
              <h3>Email Address</h3>
              <p>{{ $companydetails->email }}</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box rounded" style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); background-color: rgb(255, 255, 255)">
              <i class="bx bx-phone-call" style="background-color: white"></i>
              <h3>Contact Number</h3>
              <p>{{ $companydetails->contact_number }}</p>
            </div>
          </div>

          <div class="card"  style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); width: 100%">
            <div class="card-body">
              <h3 class="mb-4 mt-2 text-center">Drop a Message</h3>
              <form action="{{ route('contactusmessage') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter your name..." required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter email..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="">Contact Number</label>
                      <input type="text" class="form-control" name="contactnumber" placeholder="0771234567" pattern="[0-9]{10}" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="">City</label>
                      <input type="text" class="form-control" name="hometown" placeholder="Enter your home twon..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea class="form-control" name="message" rows="3" placeholder="Enter your message..." required></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>   
            </div>
          </div>

      </div>
    </section>
    <!-- End Contact Us Section -->

  </main><!-- End #main -->




</body>


<!-- carosal script  -->
<script>
  $('.carousel').carousel({
  interval: 4000
  })
</script>
<!-- end of carosal script -->

<!-- script for countdown  -->
<script>
(function ($) {
$.fn.countTo = function (options) {
options = options || {};

return $(this).each(function () {
// set options for current element
var settings = $.extend({}, $.fn.countTo.defaults, {
  from:            $(this).data('from'),
  to:              $(this).data('to'),
  speed:           $(this).data('speed'),
  refreshInterval: $(this).data('refresh-interval'),
  decimals:        $(this).data('decimals')
}, options);

// how many times to update the value, and how much to increment the value on each update
var loops = Math.ceil(settings.speed / settings.refreshInterval),
  increment = (settings.to - settings.from) / loops;

// references & variables that will change with each update
var self = this,
  $self = $(this),
  loopCount = 0,
  value = settings.from,
  data = $self.data('countTo') || {};

$self.data('countTo', data);

// if an existing interval can be found, clear it first
if (data.interval) {
  clearInterval(data.interval);
}
data.interval = setInterval(updateTimer, settings.refreshInterval);

// initialize the element with the starting value
render(value);

function updateTimer() {
  value += increment;
  loopCount++;

  render(value);

  if (typeof(settings.onUpdate) == 'function') {
    settings.onUpdate.call(self, value);
  }

  if (loopCount >= loops) {
    // remove the interval
    $self.removeData('countTo');
    clearInterval(data.interval);
    value = settings.to;

    if (typeof(settings.onComplete) == 'function') {
      settings.onComplete.call(self, value);
    }
  }
}

function render(value) {
  var formattedValue = settings.formatter.call(self, value, settings);
  $self.html(formattedValue);
}
});
};

$.fn.countTo.defaults = {
from: 0,               // the number the element should start at
to: 0,                 // the number the element should end at
speed: 1000,           // how long it should take to count between the target numbers
refreshInterval: 100,  // how often the element should be updated
decimals: 0,           // the number of decimal places to show
formatter: formatter,  // handler for formatting the value before rendering
onUpdate: null,        // callback method for every time the element is updated
onComplete: null       // callback method for when the element finishes updating
};

function formatter(value, settings) {
return value.toFixed(settings.decimals);
}
}(jQuery));

jQuery(function ($) {
// custom formatting example
$('.count-number').data('countToOptions', {
formatter: function (value, options) {
return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
}
});

// start all the timers
$('.timer').each(count);

function count(options) {
var $this = $(this);
options = $.extend({}, options || {}, $this.data('countToOptions') || {});
$this.countTo(options);
}
});

</script>
<!-- script end for countdown -->
@endsection
