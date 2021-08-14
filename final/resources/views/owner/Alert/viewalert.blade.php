@extends('layouts.ownerapp')
@section('content')

    <style>
        .hoverrow:hover{
            background-color: rgba(25, 33, 143, 0.205);
            padding: 0px;
            margin-top: 0px;
        }
        .borderless td, .borderless th {
            border: none;
        }  
        tr{
            cursor: pointer;
        } 
        
    </style>

    <div class="container">
        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Notifications</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            {{-- <a style="padding-top: 6px; padding-left: 10px" href="{{ route('attendanceslist') }}"> / Attendances list</a> --}}
            <a style="padding-top: 6px; padding-left: 10px"> / Notification Lists</a>
        </div>
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table borderless table-hover">
                    <tbody>
                        {{-- from request alert controller --}}
                    @foreach ($notifications as $n)   
                      @if($n->status == '0')                   
                      <tr onclick="window.location='{{ route('loadrequestalerts',[$n->user_id,$n->description,$n->id]) }}'" >
                      @else
                      <tr class="text-muted" style="cursor:not-allowed; background-color: rgba(128, 128, 128, 0.246);">
                      @endif
                            <th scope="row">
                                @if ($n->description == '1')
                                    <span class="p-2 rounded-circle" style="background-color: #27A745; color:white"><i class="fas fa-address-book fa-lg "></i></span>
                                @elseif ($n->description == '2')
                                    <span class="p-2 rounded-circle" style="background-color: #6732C3; color:white"><i class="fas fa-clipboard-list fa-lg "></i></span>
                                @endif
                            </th>
                            <td>
                                @if ($n->description == '1')
                                    <h5>New Student Registered! Waiting for your review</h5>
                                @elseif ($n->description == '2')
                                    <h5>Student has been schedule for a new lessson. Accept the request!</h5>
                                @endif
                            </td>
                            <td><p>{{ $n->created_at }}</p></td>                 
                      </tr>
                    
                    @endforeach  
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
@endsection