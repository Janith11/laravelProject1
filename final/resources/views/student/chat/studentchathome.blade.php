@extends('layouts.student')
@section('content')

<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container">
  <div id="app">
    <div class="card bg-light">
      <div class="card-body bg-dark">
        <p class="card-text"></p>
        <chat-student :user="{{ Auth::user() }}"><chat-student/>
      </div>
    </div>
  </div>
</div>

@endsection