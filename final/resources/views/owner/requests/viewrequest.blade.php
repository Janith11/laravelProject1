@extends('layouts.ownerapp')
@section('content')
<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .setwidth{
        max-width: 100px;
    }

    #h{
        margin-bottom: 0;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Requests</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Students requests</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div style="padding-right: 15px">
                <a type="button" class="btn btn-info" style="color: white" href="{{ route('addstudent') }}">View Deleted Requests</a>
            </div>
        </div>
    </div>

    {{-- start the loop  --}}
    <div class="mt-4">

        <div class="row">
            @foreach ($requests as $r)
            <div class="col-sm-6 mt-1">
              <div class="card">
                <div class="card-body row m-1">
                        <div class="col-6">
                            <h5 class="card-title">{{ $r->f_name }} {{ $r->l_name }}</h5>
                            <p class="card-text"><b>ID: {{ $r->nic_number}}</b></p>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('reviewrequest', $r->id) }}" class="btn btn-success ">Review</a>
                        </div>
                        <div class="col-3">
                            <a href="#" class="btn btn-danger ">Decline</a>
                        </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('aside ul .requests').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
