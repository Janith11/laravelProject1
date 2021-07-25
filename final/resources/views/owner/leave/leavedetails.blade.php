@extends('layouts.ownerapp')

@section('content')

<style>
    td{
        color: #222944;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Attendances</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('attendanceslist') }}"> / Attendances list</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Leave Details</a>
    </div>

    <div class="row-mb-2">

        <div id="card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-dark" style="color: white">
                                <tr>
                                    <th>Reson</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{ $detail->reson }}</td>
                                        <td>{{ $detail->start_date }}</td>
                                        <td>
                                            @if($detail->end_date != '')
                                                {{ $detail->end_date }}
                                            @else
                                                <h5></h5>
                                            @endif
                                        </td>
                                        <td>
                                            @if($detail->status == 1)
                                                <h6>Confirmed</h6>
                                            @elseif($detail->status == 2)
                                                <h6>Canceled</h6>
                                            @else
                                                <h6>Pending</h6>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
