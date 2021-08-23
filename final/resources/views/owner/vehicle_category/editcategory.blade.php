@extends('layouts.ownerapp')

@section('content')

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Vehicle Categories</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('vehiclecategory') }}"> / Category List</a>
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
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 style="color: #222944; font-weight: bold">Edit Category</h5>
                    <hr style="border: 0.5px solid #222944">
                    @foreach($results as $result)
                        <form action="{{ route('updatecategory',$result->id) }}" method="POST">
                            @csrf
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">Category Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Transmissiom</th>
                                    <th scope="col">Submit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                  <form action="">
                                    <th scope="row">
                                        <div class="form-group">
                                            <select  class="form-control" name="category_code">
                                                <option value= "A" {{ 'A' == $result->category_code ? 'selected' : ''}} >A</option>
                                                <option value= "B1" {{ 'B1' == $result->category_code ? 'selected' : ''}}>B1</option>
                                                <option value= "C1" {{ 'C1' == $result->category_code ? 'selected' : ''}}" >C1</option>
                                                <option value= "C" {{ 'C' == $result->category_code ? 'selected' : ''}}" >C</option>
                                            </select>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <select  class="form-control" name="name">
                                                <option value= "bike" {{ 'bike' == $result->name ? 'selected' : ''}} >Bike</option>
                                                <option value= "threeweel" {{ 'threeweel' == $result->name ? 'selected' : ''}}>Three Weel</option>
                                                <option value= "dualpurposes" {{ 'dualpurposes' == $result->name ? 'selected' : ''}}" >Car, Van, Dual Purposes</option>
                                                <option value= "heavyvehical" {{ 'heavyvehical' == $result->name ? 'selected' : ''}}" >Heavy Vehicle</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select  class="form-control" name="transmission">
                                                <option value= "automanual" {{ 'A' == $result->transmission ? 'selected' : ''}} >Auto and Manual</option>
                                                <option value= "manual" {{ 'B1' == $result->transmission ? 'selected' : ''}}>Manual Only</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btn-success" value="Update">
                                    </td>
                                  </form>
                                  </tr>
                                </tbody>
                              </table>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .category').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
