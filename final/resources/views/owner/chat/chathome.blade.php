@extends('layouts.ownerapp')
@section('content')


 

 {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}


 <script src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
    <div id="app" id="card" style="height: 100vh">
        <div class="card">
            <h5 class="card-header">All Chat</h5>
            <div class="card-body">
              <p class="card-text"></p>
              <chat-app :user="{{ Auth::user() }}"><chat-app/>   
              
            </div>
          </div>
    </div>
</div>
@endsection