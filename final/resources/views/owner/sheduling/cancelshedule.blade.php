@extends('layouts.ownerapp')

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Shedules</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownershedulelist') }}" style="padding-top: 6px; padding-left: 10px"> / Shedule List</a>
        <a style="padding-top: 6px; padding-left: 10px">/ Cancel </a>
    </div>

    <div class="row-mb-2">
        @if (session('errors'))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <h5>{{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
            @endforeach
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <div>
                        @foreach ($shedule as $result)
                            <h5 style="color: #222944; font-weight: bold">You are going to cancel {{ $result->title }} shedule !!</h5>
                        @endforeach
                    </div>
                    <form action="{{ route('updateascancel') }}" method="POST">
                        @csrf
                        @foreach ($shedule as $result)
                            <input type="hidden" name="id" value="{{ $result->id }}">
                        @endforeach
                        <div class="form-group">
                            <label for="reson" style="color: #222944">Give a Reson, why do you cancel this shedule</label>
                            <br>
                            <div style="padding-bottom: 10px; color: white">
                                <a type="button" class="btn btn-info" onclick="examplereson(1)">Unable to attend today's program due to an urgent need</a>
                            </div>
                            <div style="padding-bottom: 10px; color: white">
                                <a type="button"  class="btn btn-info" onclick="examplereson(2)">Unable to attend today's program due to my privet reson</a>
                            </div>
                            <div style="padding-bottom: 10px; color: white">
                                <a type="button"  class="btn btn-info" onclick="examplereson(3)">Unable to attend today's program due to a training vehicle was repaired</a>
                            </div>
                            <textarea class="form-control" id="reson" rows="3" name="reson" ></textarea>
                        </div>
                        <div>
                            <button class="btn btn-danger" type="submit">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

    <script>
        function examplereson(number){
            if (number == '1') {
                document.getElementById('reson').innerHTML = "Unable to attend today's program due to an urgent need";
            }else if(number == '2'){
                document.getElementById('reson').innerHTML = "Unable to attend today's program due to my privet reson";
            }else{
                document.getElementById('reson').innerHTML = "Unable to attend today's program due to a training vehicle was repaired";
            }
        }
    </script>

@endsection
