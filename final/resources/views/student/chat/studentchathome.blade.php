@extends('layouts.student')
@section('content')

<script src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
    <div id="app" id="card" style="height: 100vh">
        <div class="card">
            <h5 class="card-header">Student chat test</h5>
            <div class="card-body">
              <p class="card-text">test1</p>
              <chat-student :user="{{ Auth::user() }}"></chat-student>  
            </div>
          </div>
    </div>
</div>

@endsection