@extends('layouts.ownerapp')
@section('content')
    <div class="container">
        <div class="row mb-2">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Instructors</h5>
            <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
            <a href="{{ route('owner.ownerdashboad') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a style="padding-top: 6px; padding-left: 10px" href="{{ route('instructors') }}"> / Instructors list</a>
            <a style="padding-top: 6px; padding-left: 10px"> / Instructors list</a>
        </div>

        @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h3>
                    {{ session('successmsg') }}
                </h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(count($instructors) == 0)
            <div class="alert alert-info" role="alert">
                No removed instructors
            </div>
        @else
            <table class="table table-sm table-hover mt-5 mb-5">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">NIC Number</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Birth Day</th>
                    <th scope="col">Restore</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($instructors as $i)
                <tr>
                    <th scope="row"><img src="/uploadimages/instructors_profiles/{{ $i->profile_img }}" alt="profile image" class="rounded-circle p-1" style="max-width: 30px;height: auto;"></th>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->f_name }} {{ $i->l_name }}</td>
                    <td>{{ $i->email }}</td>
                    <td>{{ $i->nic_number }}</td>
                    <td>{{ $i->contact_number }}</td>
                    <td>{{ $i->dob }}</td>
                    <td><form method="POST" action="{{ route('restoreinstructor',$i->id) }}" id="delete-form-{{ $i->id }}" style="display: none">
                            @csrf
                        </form>
                        <button onclick="if(confirm('Are You Sure Want to Restore this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $i->id }}').submit();
                        }else{
                            event.preventDefault();
                        }" href="" class="btn btn-success btn-sm" >Restore
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
