@extends('layouts.ownerapp')
@section('content')
<style>
    td,th{
        font-size: 15px;
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
        <a style="padding-top: 6px; padding-left: 10px"> / Students requests/ Deleted Requests</a>
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
    <div class="row mt-5">
        @foreach ($deleterequests as $d)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{ $d->f_name }} {{ $d->m_name }} {{ $d->l_name }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{ $d->email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">NIC</th>
                            <td>{{ $d->nic_number}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Contact Number</th>
                            <td>{{ $d->contact_number}}</td>
                          </tr>
                        <form action="{{ route('restorestudentrequests',$d->id) }}" method="POST">
                            @csrf
                          <tr>
                            <td><button class="btn btn-success">Restore</button></td>
                        </form>
                        <form action="{{ route('deletestudentrequests',$d->id) }}" id="delete-form-{{ $d->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <td><button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $d->id }}').submit();
                                }else{
                                    event.preventDefault();
                                }" href="" class="btn btn-danger" >Delete
                                </button>
                            </td>
                        </form>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .requests').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
