@extends('layouts.student')

@section('content')
<div class="container" >
    
    <div class="card-deck">
        <div class="card" style="border: none; background-color: transparent !important;">
          <img class="card-img-top mx-auto d-block" src="https://cdn.pixabay.com/photo/2021/01/04/10/41/icon-5887126_1280.png" alt="Card image cap" style="width: 50%; height:auto;">
          <div class="card-body text-center">
            <h5 class="card-title">{{ $user->f_name }} {{ $user->l_name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <table class="table table-borderless table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card" style="border: none; background-color: transparent !important;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card" style="border: none; background-color: transparent !important;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <p>dhsgfbiyhsdgfsieyfg</p>
          </div>
        </div>
      </div>
</div>
{{-- <div class="" style="background-color: green">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! {{ Auth::user()->f_name }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection