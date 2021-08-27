@extends('layouts.instructorapp')
@section('content')
{{-- csrf token added janith --}}
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<script src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
  <div id="app">
    <div class="card bg-light">
      <div class="card-body bg-dark">
        <p class="card-text"></p>
        <chat-instructor :user="{{ Auth::user() }}"><chat-instructor/>
      </div>
    </div>
  </div>
</div>


@endsection