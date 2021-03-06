@extends('layouts.ownerapp')
@section('content')
 {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}


 <script src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
  <div id="app">
    <div class="card bg-light">
      <div class="card-body bg-dark">
        <p class="card-text"></p>
        <chat-app   :user="{{ Auth::user() }}"><chat-app/>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('aside ul .chat').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
