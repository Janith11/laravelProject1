@extends('layouts.landingpage')
@section('content')
<div>
       

  <!-- start carosal -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="first-slide"
                   src="/images/landingpage/carosal1.png"
                   alt="First slide">
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
  </div>
  <!-- end the carosal -->

  <!-- description about the company  -->
      <div class="container">
          <div class="row mb-5">
              <div class="col-md-7">
                  <h1>Track your progress</h1>
                  <p class="lead">Through our unique student record card and feedback from your instructor, you’ll see where you’re up to and what skills you need to achieve to become a safe and competent driver.</p>
              </div>
              <div class="col-md-5">
                  <img class="img-fluid mx-auto" src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80" alt="Generic placeholder image">
                       
              </div>
          </div>
          <div class="row mt-5">
              <div class="col-md-5">
                  <img class="img-fluid mx-auto" src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80" alt="Generic placeholder image">
                       
              </div>
              <div class="col-md-7">
                  <h1>Schedule your time on your free time</h1>
                  <p class="lead">you can schedule your time with your free time and you can get new updates</p>
              </div>
              
          </div>
          </div>
      </div>
  <!-- end of the dexcription  -->

</div> 
<!-- up is main tag -->

<!-- start countdown  -->
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
  </div></div>
            <div class="col">
            <div class="counter">
    <i class="fa fa-bug fa-2x"></i>
    <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
    <p class="count-text ">Coffee With Clients</p>
  </div>
            </div>
       </div>
</div>
<!-- end countdown  -->

<!-- gallery views for who already pass the exam or something  -->

<div class="album py-5 bg-light">
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
</div>
<!-- end of the gallery  -->

<!-- what the students say about the this company start  -->
{{-- <div class="container ">
  <div class="text-center mt-5 mb-5">
      <h1>What Our Students Say About US.</h1>
      <p>We value the experience of our students. Here’s what they have to say.</p>
  </div>
</div> --}}

<div class="container">
{{-- <div class="row">
  <h2>Carousel Reviews</h2>
</div>
</div>
<div class="carousel-reviews broun-block">
  <div class="container">
      <div class="row">
          <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
          
              <div class="carousel-inner">
                  <div class="item active">
                    <div class="col-md-4 col-sm-6">
                  <div class="block-text rel zmin">
                  <a title="" href="#">Hercules</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>Never before has there been a good film portrayal of ancient Greece's favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn't enough to dissuade ...</p>
                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
            <div class="person-text rel">
                      <img src="" alt="">
              <a title="" href="#">Anna</a>
              <i>from Glasgow, Scotland</i>
            </div>
          </div>
                <div class="col-md-4 col-sm-6 hidden-xs">
              <div class="block-text rel zmin">
                  <a title="" href="#">The Purge: Anarchy</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>The 2013 movie "The Purge" left a bad taste in all of our mouths as nothing more than a pseudo-slasher with a hamfisted plot, poor pacing, and a desperate attempt at "horror." Upon seeing the first trailer for "The Purge: Anarchy," my first and most immediate thought was "we really don't need another one of these."  </p>
                    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                  </div>
            <div class="person-text rel">
                  <img src="" alt="">       
              
                  <a title="" href="#">Ella Mentree</a>
              <i>United States</i>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
            <div class="block-text rel zmin">
              <a title="" href="#">Planes: Fire & Rescue</a>
              <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
                <p>What a funny and entertaining film! I did not know what to expect, this is the fourth film in this vehicle's universe with the two Cars movies and then the first Planes movie. I was wondering if maybe Disney pushed it a little bit. However, Planes: Fire and Rescue is an entertaining film that is a fantastic sequel in this magical franchise. </p>
              <ins class="ab zmin sprite sprite-i-triangle block"></ins>
            </div>
            <div class="person-text rel">
              <img src="" alt="">
              
              <a title="" href="#">Rannynm</a>
              <i>Indonesia</i>
            </div>
          </div>
                  </div>
                  <div class="item">
                      <div class="col-md-4 col-sm-6">
                  <div class="block-text rel zmin">
                  <a title="" href="#">Hercules</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>Never before has there been a good film portrayal of ancient Greece's favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn't enough to dissuade ...</p>
                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img13.png">
              <a title="" href="#">Anna</a>
              <i>from Glasgow, Scotland</i>
            </div>
          </div>
                <div class="col-md-4 col-sm-6 hidden-xs">
              <div class="block-text rel zmin">
                  <a title="" href="#">The Purge: Anarchy</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>The 2013 movie "The Purge" left a bad taste in all of our mouths as nothing more than a pseudo-slasher with a hamfisted plot, poor pacing, and a desperate attempt at "horror." Upon seeing the first trailer for "The Purge: Anarchy," my first and most immediate thought was "we really don't need another one of these."  </p>
                    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                  </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img14.png">
                  <a title="" href="#">Ella Mentree</a>
              <i>United States</i>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
            <div class="block-text rel zmin">
              <a title="" href="#">Planes: Fire & Rescue</a>
              <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
                <p>What a funny and entertaining film! I did not know what to expect, this is the fourth film in this vehicle's universe with the two Cars movies and then the first Planes movie. I was wondering if maybe Disney pushed it a little bit. However, Planes: Fire and Rescue is an entertaining film that is a fantastic sequel in this magical franchise. </p>
              <ins class="ab zmin sprite sprite-i-triangle block"></ins>
            </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img15.png">
              <a title="" href="#">Rannynm</a>
              <i>Indonesia</i>
            </div>
          </div>
                  </div>
                  <div class="item">
                      <div class="col-md-4 col-sm-6">
                  <div class="block-text rel zmin">
                  <a title="" href="#">Hercules</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>Never before has there been a good film portrayal of ancient Greece's favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn't enough to dissuade ...</p>
                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img13.png">
              <a title="" href="#">Anna</a>
              <i>from Glasgow, Scotland</i>
            </div>
          </div>
                <div class="col-md-4 col-sm-6 hidden-xs">
              <div class="block-text rel zmin">
                  <a title="" href="#">The Purge: Anarchy</a>
                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                  <p>The 2013 movie "The Purge" left a bad taste in all of our mouths as nothing more than a pseudo-slasher with a hamfisted plot, poor pacing, and a desperate attempt at "horror." Upon seeing the first trailer for "The Purge: Anarchy," my first and most immediate thought was "we really don't need another one of these."  </p>
                    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                  </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img14.png">
                  <a title="" href="#">Ella Mentree</a>
              <i>United States</i>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
            <div class="block-text rel zmin">
              <a title="" href="#">Planes: Fire & Rescue</a>
              <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
                <p>What a funny and entertaining film! I did not know what to expect, this is the fourth film in this vehicle's universe with the two Cars movies and then the first Planes movie. I was wondering if maybe Disney pushed it a little bit. However, Planes: Fire and Rescue is an entertaining film that is a fantastic sequel in this magical franchise. </p>
              <ins class="ab zmin sprite sprite-i-triangle block"></ins>
            </div>
            <div class="person-text rel">
              <img alt="" src="http://myinstantcms.ru/images/img15.png">
              <a title="" href="#">Rannynm</a>
              <i>Indonesia</i>
            </div>
          </div>
                  </div>                    
              </div>
              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
          </div>
      </div>
  </div>
</div> --}}
<!-- what the students say about the this company end  -->


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