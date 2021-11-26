@extends('layouts.ownerapp')

@section('content')

<style>
    #heading{
        color: #222944;
        font-weight: bold;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Vehicle Categories</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / Category List</a>
    </div>

    <div class="row mb-2 justify-content-end">
        <div style="padding-right: 15px">
            <button type="button" class="btn btn-primary" id="addcategory" >Add Category</button>
        </div>
    </div>

    <div class="row-mb-2">
        @if (count($categories) == 0)
            <div class="alert alert-success" role="alert" style="width: 100%; padding-top: 10px">
                No any vehicle categories
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Some problems with your input.
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if(session('successmsg'))
            <div class="alert alert-success" role="alert" style="width: 100%">
                {{ session('successmsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row-mb-2" id="addcategorypanel" style="display: none">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Add New Category</h5>
                    <hr style="border: 0.5px solid #222944">
                    <form action="{{ route('savecategory') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h5  style="color: #222944">Category Code</h5>
                                    {{-- <input type="text" class="form-control" name="category_code">
                                    <small>use standed category code</small> --}}
                                    <select id="category" class="form-control" name="category_code">
                                        <option value="A">A</option>
                                        <option value="B1">B1</option>
                                        <option value="C1">C1</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                                {{-- <h5 style="color: #222944;">This category save as</h5> --}}
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="base_type" value="light_vehicle" checked>
                                    <label class="form-check-label">
                                        Light Vehicles
                                    </label>
                                </div> --}}
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="base_type"  value="heavy_vehicle">
                                    <label class="form-check-label">
                                        Heavy Vehicles
                                    </label>
                                </div> --}}
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h5 style="color: #222944">Category Name</h5>
                                    {{-- <input type="text" class="form-control" name="category_name"> --}}
                                    <select id="category" class="form-control" name="category_name">
                                        <option value="bike">Bike</option>
                                        <option value="threeweel">Three Wheel</option>
                                        <option value="dualpurposes">Car, Van, Dual Purpose</option>
                                        <option value="heavyvehical">Heavy Vehical</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h5 style="color: #222944">Transmission</h5>
                                    {{-- <input type="text" class="form-control" name="category_name"> --}}
                                    <select id="category" class="form-control" name="transmission">
                                        <option value="automanual">Auto/Manual Both</option>
                                        <option value="manual">Manual Only</option>
                                    </select>
                                    <small class="text-danger">*If it has only manual transmission mark as <B>Manual</B></small>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4">
                                <h5 style="color: #222944">Session Days</h5>
                                <div class="form-group">
                                    <label>Theory Sessions</label>
                                    <input type="number" class="form-control" name="theory_session">
                                </div>
                                <div class="form-group">
                                    <label>Practicle Sessions</label>
                                    <input type="number" class="form-control" name="practicle_session">
                                </div>
                            </div> --}}
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-sm-4">
                    <div id="card">
                        <div class="card">
                            <div class="card-body">
                                <h5><span id="heading">Category Code : </span>{{ $category->category_code}}</h5>
                                <h5><span id="heading">Category Name : </span>{{ $category->name}}</h5>
                                <h5><span id="heading">Main Category : </span>{{ $category->transmission}}</h5>
                                <h5>
                                    {{-- <span id="heading">Session Days</span> --}}
                                    <table class="table table-bordered">
                                        {{-- <tbody>
                                            @foreach($category->sessionhours as $hours)
                                                <tr>
                                                    <td>{{ $hours->session_type }}</td>
                                                    <td>{{ $hours->total_days }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody> --}}
                                    </table>
                                </h5>
                                <div class="row justify-content-end">
                                    <div style="display: inline-block; padding-right: 10px">
                                        <a href="{{ route('editcategory', $category->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div style="display: inline-block; padding-right: 14px">
                                        <form method="POST" action="{{ route('deletecategory', $category->id) }}" id="delete-form-{{ $category->id }}" style="display: none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $category->id }}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" href="" class="btn btn-primary" style="background-color: #FA1B39;">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    $('#addcategory').click(function(){
        $('#addcategorypanel').toggle();
    });
</script>

<script>
    $(document).ready(function(){
        $('aside ul .category').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
