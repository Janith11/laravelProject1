@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Exam Dates</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ route('ownerexamdates') }}" style="padding-top: 6px; padding-left: 10px"> / Calender</a>
        <a style="padding-top: 6px; padding-left: 10px">/ Student List </a>
    </div>


    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('categoryerror'))
            <div class="alert alert-danger">
                <h5>{{ session('categoryerror') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="col-mb-2">
        @if(count($errors) > 0)
            <div class="container">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        <div id="card">
            <div class="card-body">
                <h5 style="color: #222944; font-weight: bold">Student request on exam date 2021-12-12</h5>
                <hr style="border: 0.5px solid #222944">
                {{-- table  --}}
                <div class="mt-2 mb-2">
                    <table class="table striped table-hover table-sm mt-4">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>1</td>
                            <td>Maleesha dkjd</td>
                            <td><a href="" class="btn btn-success btn-sm mr-2">Accept</a>
                                <a href="" class="btn btn-danger btn-sm ml-2">Reject</a>
                            </td>
                        </tbody>
                      </table>
                </div>

                {{-- form  --}}
                <div>
                    {{-- <h5 style="color: #222944; font-weight: bold" class="mt-4">Add new Exam Dates</h5> --}}
                      
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
