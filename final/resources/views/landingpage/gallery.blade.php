@extends('layouts.landingpage')
@section('content')

<style>
    img{
        -webkit-transition: all 0.4s ease-in-out;
    }
    img:hover{
        transform: scale(1.2);
        
    }
</style>

<div class="container">
        <!-- Gallery -->
<div class="row ">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
      <img
        src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      <img
        src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </div>
  
    <div class="col-lg-4 mb-4 mb-lg-0">
      <img
        src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      <img
        src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </div>
  
    <div class="col-lg-4 mb-4 mb-lg-0">
      <img
        src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      <img
        src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </div>
  </div>
  <!-- Gallery -->

</div>

@endsection