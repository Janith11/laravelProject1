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
    <section class="about-lists" id="about-lists">
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
            <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
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
                      <input type="text" class="form-control" name="contactnumber" placeholder="07XXXXXXXX" pattern="[0-9]{10}" required>
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
