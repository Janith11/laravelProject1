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
    <div style="">
      <div class="row-mb-2">
        
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
      </div>
  
      <div class="row mb-2">
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
                            <a href="{{ route('login') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Let's Drive</a>
                        </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url('/images/landingpage/carosal2.png');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Are you busy with works?</h2>
                                <p class="animate__animated animate__fadeInUp">Don't worry... This is the best driving school which can schedule with your free time</p>
                                <a href="{{ route('login') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Let's Drive</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url('/images/landingpage/carosal3.png');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Want to be a good driver?</h2>
                                <p class="animate__animated animate__fadeInUp">With our trusted instructors and good service compnay.let's come with us to join unreliable driving school experience</p>
                                <a href="{{ route('login') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Let's Drive</a>
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
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
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
        {{-- <div class="row no-gutters"> --}}
          
          {{-- <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" >
            <span>01</span>
            <h4>Lorem Ipsum</h4>
            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span>02</span>
            <h4>Repellat Nihil</h4>
            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span>03</span>
            <h4> Ad ad velit qui</h4>
            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span>04</span>
            <h4>Repellendus molestiae</h4>
            <p>Inventore quo sint a sint rerum. Distinctio blanditiis deserunt quod soluta quod nam mider lando casa</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span>05</span>
            <h4>Sapiente Magnam</h4>
            <p>Vitae dolorem in deleniti ipsum omnis tempore voluptatem. Qui possimus est repellendus est quibusdam</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span>06</span>
            <h4>Facilis Impedit</h4>
            <p>Quis eum numquam veniam ea voluptatibus voluptas. Excepturi aut nostrum repudiandae voluptatibus corporis sequi</p>
          </div> --}}
          {{-- <div class="col-md-4" data-aos="fade-up">
            <img src="https://images.unsplash.com/photo-1550355291-bbee04a92027?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y2FyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="gallery">
          </div>
          
        </div> --}}
        <div class="card-group">
          <div class="card">
            <img class="card-img-top hover-shadow" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
            
          </div>
          <div class="card">
            <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
            
          </div>
        </div>

       <div class="row">
        <div class="col-md-4">
           <div class="card">
             <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
           </div>
        </div>
        <div class="col-md-4">
         <div class="card">
           <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
         </div>
       </div>
       <div class="col-md-4">
         <div class="card">
         <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
         </div>
       </div>
      </div>

      <div class="row">
        <div class="col-md-4">
           <div class="card">
             <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
           </div>
        </div>
        <div class="col-md-4">
         <div class="card">
           <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
         </div>
       </div>
       <div class="col-md-4">
         <div class="card">
         <img class="card-img-top" src="https://www.focus2move.com/wp-content/uploads/2020/08/Tesla-Roadster-2020-1024-03.jpg" alt="Card image cap">
         </div>
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
              <i class="icofont-simple-smile" style="color: #20b38e;"></i>
              <span data-toggle="counter-up">232</span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-document-folder" style="color: #c042ff;"></i>
              <span data-toggle="counter-up">521</span>
              <p>Projects</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-live-support" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up">1,463</span>
              <p>Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
              <span data-toggle="counter-up">15</span>
              <p>Hard Workers</p>
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

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                    <div class="card">
                      <img class="card-img-top" src="https://dps.mn.gov/blog/PublishingImages/advanced-rider-course-715.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-computer"></i></div>
                            <h4 class="title"><a href="">Motor Bike Training</a></h4>
                            <p class="description">You can choose Auto or Manual transmission. This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                      <img class="card-img-top" src="http://www.dailynews.lk/sites/default/files/news/2018/04/19/z_pviii-Abans.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
                            <h4 class="title"><a href="">Threewheel Training</a></h4>
                            <p class="description">This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                      <img class="card-img-top" src="https://www.rospa.com/getmedia/9934013b-7316-4664-a0d2-e76eef0c92e7/online-driver-safety-shop-large_1.jpg?width=790&height=640&ext=.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-earth"></i></div>
                            <h4 class="title"><a href="">Dual Purpose vehicle Training</a></h4>
                            <p class="description">This category has Car, Van and SUV as well as Auto and Manual Transmission.  All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.All our vehicles are new and fully air conditioned.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                      <img class="card-img-top" src="https://www.datocms-assets.com/992/1507164309-istock-517377953.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-image"></i></div>
                            <h4 class="title"><a href="">Heavy vehicle Training</a></h4>
                            <p class="description">This category has only Manual transmission. All instructors are professionally qualified and well experienced trainers with fluent in English and Sinhala languages.You have minimun two year experience with light weight vehicle.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                      <img class="card-img-top" src="https://financesonline.com/uploads/2017/06/app.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-settings"></i></div>
                            <h4 class="title"><a href="">Online scheduling lessons</a></h4>
                            <p class="description">You can schedule your lessons via online relevent time table or you can request a new time table for you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                      <img class="card-img-top" src="https://www.scuoleditaliano.it/wp-content/uploads/2018/05/individuali.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Individual theory/practrical lesson</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                      <img class="card-img-top" src="https://techengage.com/wp-content/uploads/2019/04/best-messaging-apps.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Messaging</a></h4>
                            <p class="description">You can directly message with the admistration and discuss your requirements very easily.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                      <img class="card-img-top" src="https://media.istockphoto.com/photos/hand-arranging-wood-block-stacking-as-step-stair-on-paper-pink-picture-id1169974807?k=6&m=1169974807&s=612x612&w=0&h=cZUtqtxFYfv6xbQteqR7rtts57kIMU7yuKJqZlrSGZ0=" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Progress tracking</a></h4>
                            <p class="description">You can see get idea about your progress displayed on your dashboard.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                      <img class="card-img-top" src="https://st.depositphotos.com/1092019/3271/i/950/depositphotos_32714967-stock-photo-keyboard-with-customize-orange-button.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Customizable profile</a></h4>
                            <p class="description">You can customize your profile, lessons, details, add more training category etc.</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Individual practrical lessons</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Messaging system</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon"><i class="icofont-tasks-alt"></i></div>
                            <h4 class="title"><a href="">Theory Lesson Individual Classes</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Our Portfolio Section ======= -->
    {{-- <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Our Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> --}}
    <!-- End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>

        <div class="row">

          @foreach ($instructors as $instructor)        
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="/uploadimages/instructors_profiles/{{ $instructor->profile_img }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                {{-- <h4>Walter White</h4> --}}
                <h4>{{ $instructor->f_name }} {{ $instructor->l_name }}</h4>
                <span>Senior Instructor</span>
                {{-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> --}}
              </div>
            </div>
          </div>
          @endforeach

          {{-- <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    {{-- <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section> --}}
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Us Section ======= -->
{{-- <div class="container">
  <div class="row">
    <div class="col-md-12 mb-4">
      <div class="card card-image" style="background-image: url('/images/landingpage/openinghours.png');">
          <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
              <div>
                  <h6 class="purple-text"><i class="fas fa-plane"></i><strong> Travel</strong></h6>
                  <h3 class="card-title py-3 font-weight-bold"><strong>This is the card title</strong></h3>
                  <p class="pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                      optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                      Odit sed qui, dolorum!</p>
                  <a class="btn btn-secondary btn-rounded"><i class="far fa-clone left"></i> View project</a>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>    --}}
<div class="container">
  <div class="row mb-2" style="justify-content: center;padding-top: 20px;">
            
    <div class="card" style="width: 100%; height: 95%;" >
                
        <img class="image-fluid" src="/images/landingpage/openinghours.png" alt="Card image cap">

        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px 20px 20px 20px; border-radius: 10px; width: 50%; background: rgba(255, 255, 255, .8);" id="worktimes">
          {{-- <div class="mt-0" style="z-index:2000 "> --}}
            <h5 class="card-title text-center openhourh5" style="color: #34314C; font-weight: bold;">Office Hours</h5>
            @foreach ($openhours as $openhour)
              @if ($openhour->weekday_id == 1)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Monday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 2)
                <p class="d-flex justify-content-center openhour" style="color: #34314C;">Tuesday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 3)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Wednesday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 4)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Thursday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 5)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Friday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 6)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Saturday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
              @if ($openhour->weekday_id == 7)
                <p class="d-flex justify-content-center openhour" style="color: #34314C; ">Sunday {{ $openhour->from }}am - {{ $openhour->to }}pm</p>  
              @endif
            @endforeach
            
            
            <small class="openhour"><span class="text-danger">*</span> Closed on public holidays and every Monday</small>
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
              <h3>Email Us</h3>
              <p>{{ $companydetails->email }}</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box rounded" style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); background-color: rgb(255, 255, 255)">
              <i class="bx bx-phone-call" style="background-color: white"></i>
              <h3>Call Us</h3>
              <p>{{ $companydetails->contact_number }}</p>
            </div>
          </div>

          {{-- <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300" style="box-shadow:0px 2px 21px -1px rgba(36, 62, 180, 0.329); background-color: rgba(87, 54, 231, 0.192)">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row form-group">
                <div class="col-lg-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> --}}
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
                      <input type="text" class="form-control" name="contactnumber" placeholder="0771234567" pattern="[0-9]{10}" required required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="">Home town</label>
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


    <!-- start carosal -->
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="/images/landingpage/carosal1.png" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Want to be a good driver</h1>
                        <p>Learn good instructoers with your future drivind skills.</p>
                        <p><a class="btn btn-lg btn-danger" href="{{ route('login') }}" role="button">Let's Drive</a></p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="second-slide"
                    src="/images/landingpage/carosal2.png"
                    alt="Second slide">
                <div class="container">

                </div>
            </div>

            <div class="carousel-item">
                <img class="third-slide"
                    src="/images/landingpage/carosal3.png"
                    alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>Want to be a good driver</h1>
                        <p>With our trusted instructors and good service compnay.let's come with us to join unreliable driving school experience</p>
                        <p><a class="btn btn-lg btn-danger" href="#" role="button">Let's get started!</a></p>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div> --}}
  <!-- end the carosal -->

  <!-- description about the company  -->
    {{-- <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-4">
                <div id="card" class="text-center">
                    <div>
                        <div style="" class="img_div">
                            <img src="/uploadimages/other/landingpage/progress.png" alt="" style="width: 150px; height: auto; margin: 25px; margin-top: 25px">
                        </div>
                    </div>
                    <div class="card content" style="margin-top: 100px; height: 400px; z-index: 10">
                        <div class="card-body" style="margin-top: 100px">
                            <h2 style="color: #020224">Track your progress</h2>
                            <p style="margin-top: 20px">Through our unique student record card and feedback from your instructor, you’ll see where you’re up to and what skills you need to achieve to become a safe and competent driver.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div id="card" class="text-center">
                    <div>
                        <div style="" class="img_div">
                            <img src="/uploadimages/other/landingpage/progress.png" alt="" style="width: 150px; height: auto; margin: 25px; margin-top: 25px">
                        </div>
                    </div>
                    <div class="card content" style="margin-top: 100px; height: 400px;z-index: 10">
                        <div class="card-body" style="margin-top: 100px">
                            <h2 style="color: #020224">Schedule your time on your free time</h2>
                            <p style="margin-top: 20px">you can schedule your time with your free time and you can get new updates</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div id="card" class="text-center">
                    <div>
                        <div style="" class="img_div">
                            <img src="/uploadimages/other/landingpage/progress.png" alt="" style="width: 150px; height: auto; margin: 25px; margin-top: 25px">
                        </div>
                    </div>
                    <div class="card content" style="margin-top: 100px; height: 400px; z-index: 10">
                        <div class="card-body" style="margin-top: 100px">
                            <h2 style="color: #020224">Schedule your time on your free time</h2>
                            <p style="margin-top: 20px">you can schedule your time with your free time and you can get new updates</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background-color:#FFDE25; z-index: 5; position: absolute; width: 400px; height: 400px; border-radius: 50%; left: 5%; margin-top: 20%"></div>

        </div>
    </div>

    <div class="container mb-5">

        <div class="row">
            <br/>
            <div class="col text-center mt-5">
                <h2>Our Strengths</h2>
                <p>Last five years our progress</p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col">
                <div class="counter">
                    <i class="fa fa-code fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
                    <p class="count-text ">Our Customer</p>
                </div>
            </div>

            <div class="col">
                <div class="counter">
                    <i class="fa fa-coffee fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
                    <p class="count-text ">Happy Clients</p>
                </div>
            </div>

            <div class="col">
                <div class="counter">
                    <i class="fa fa-lightbulb-o fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                    <p class="count-text ">Project Complete</p>
                </div>
            </div>

            <div class="col">
                <div class="counter">
                    <i class="fa fa-bug fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
                    <p class="count-text ">Coffee With Clients</p>
                </div>
            </div>
        </div>
    </div> --}}
<!-- end countdown  -->

<!-- gallery views for who already pass the exam or something  -->

{{-- <div class="album py-5 bg-light">
  <div class="container">
      <h2>First ride</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="http://firstride.com.au/wp-content/uploads/2018/09/wel1.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="http://firstride.com.au/wp-content/uploads/2018/09/wel1.jpg" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="http://firstride.com.au/wp-content/uploads/2018/09/wel1.jpg" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div> --}}



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
