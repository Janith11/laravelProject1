@extends('layouts.ownerapp')
@section('content')
<style>
    .borderless td, .borderless th {
        border: none;
    }
</style>

<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Deleted Students</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('completedstudents') }}"> / Completed Students</a>
        <a style="padding-top: 6px; padding-left: 10px" href=""> / Deleted Students</a>
    </div>

    <div class="row-mb-2">
        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Wooops!! some errors with inputs</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                {{ session('errormsg') }}
            </div>
        </div>
    @endif

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

    <div class="card mt-4 bg-primary">
        <div class="card-body ">
            <table class="table table-sm table-hover borderless ">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Profile</th>  
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Restore</th>
                  </tr>
                </thead>
                    <tbody>
                        @foreach ($users as $user)               
                        <tr class="text-center">
                            <th scope="row" class="align-middle"><img src="/uploadimages/students_profiles/{{ $user->profile_img }}" alt="profile image" class="rounded-circle" style="max-width: 40px; height:auto;"></th>
                            <td class="align-middle">{{ $user->nic_number }}</td>
                            <td class="align-middle">{{ $user->f_name }} {{ $user->l_name }}</td>
                            <td class="align-middle">{{ $user->contact_number }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->dob }}</td>
                            <form action="{{ route('restorestudent',$user->id) }}" id="delete-form-{{ $user->id }}" method="POST">
                                @csrf
                                <td class="align-middle"><button onclick="if(confirm('Do you want to restore this student?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                    }else{
                                        event.preventDefault();
                                    }" href="" class="btn btn-success btn-sm py-0" >Restore
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
              </table>
        </div>
    </div>


</div>
@endsection