@extends('layouts.ownerapp')

@section('content')

<style>
    #img{
        width: 80%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }

    #header{
        color: #222944;
    }

    #center {
        margin-left: auto;
        margin-right: auto;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Settings</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('settings') }}"> / Settings</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Change Password</a>
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

    <div class="row-mb-2">
        <div id="card">
            <div class="row justify-content-center">
                <div class="card" style="width: 500px">
                    <div class="card-body">
                        <h5 id="header" style="font-weight: bold; text-align: center">Change Password</h5>
                        <hr style="border-top: 1px solid #222944">

                        <form action="{{ route('saveownerpassword') }}" method="POST">

                            @csrf

                            <table id="center">

                                <tr>
                                    <td>
                                        <h5 id="header">Current password</h5>
                                    </td>
                                    <td>
                                        <div class="form-group" style="padding-left: 10px">
                                            <input type="text" class="form-control" name="current_password">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 id="header">New password</h5>
                                    </td>
                                    <td>
                                        <div class="form-group" style="padding-left: 10px">
                                            <input type="text" class="form-control" name="new_password">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 id="header">Re-Enter password</h5>
                                    </td>
                                    <td>
                                        <div class="form-group" style="padding-left: 10px">
                                            <input type="text" class="form-control" name="re_enter_password">
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <div id="card" class="text-center">
                                <button class="btn btn-success" type="submit">Change</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
