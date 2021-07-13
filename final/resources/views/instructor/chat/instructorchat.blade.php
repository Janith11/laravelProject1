@extends('layouts.instructorapp')
@section('content')
{{-- csrf token added janith --}}
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<script src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
    <div id="app" id="card" style="height: 100vh">
        <div class="card">
            <h5 class="card-header">All Chat</h5>
            <div class="card-body">
              <p class="card-text">test1</p>
              <chat-instructor :user="{{ Auth::user() }}"></chat-instructor>  
            </div>
          </div>
    </div>
</div>


@endsection