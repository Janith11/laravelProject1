@extends('layouts.ownerapp')
@section('content')
<style>
    td,th{
        font-size: 20px;
    }
</style>
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Instructor</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('instructors') }}"> / Instructor List</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Update Category</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div class="mr-3">
                <a type="button" class="btn btn-primary" href="#" id="addcategory">Add A Category</a>
            </div>
        </div>
    </div>

    <div class="row" id="categoryset" style="display: none">
        <div class="card mx-auto">
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Auto/Manual</th>
                        <th scope="col">Update</th>
                     </tr>
                    </thead>

                    <tbody>

                        <form action="{{ route('addnewinstructorcategory') }}" method="POST">
                            @csrf
                            @foreach ($category as $c1)
                            <tr>
                                <td style="display: none"> <input type="text" name="userid" value="{{ $c1->user_id }}">
                                </td>
                            @endforeach
                            @foreach ($notcategory as $n)
                            <td>
                                <div class="form-group">
                                    <input type="text" name="category_code" value="{{ $n->category_code }}" style="display: none">
                                    {{ $n->category_code }}
                                </div>
                            </td>
                            <td style="display: none">
                                <div class="form-group">
                                    <select  class="form-control" name="tstatus">
                                        <option value= "Training"  selected>Training</option>
                                        <option value= "Without Training" >Without Training</option>
                                    </select>
                                </div>
                            </td>
                            @if( $n->transmission  == 'manual')
                                <input type="text" value="3" style="display: none" name="transmission">
                                <td><small class="text-danger" >Only Manual Transmission</small></td>
                            @else
                            <td>
                                <div class="form-group">
                                    <select  class="form-control" name="transmission">
                                        <option value= "Auto" >Auto</option>
                                        <option value= "Manual" selected >Manual</option>
                                    </select>
                                </div>
                            </td>
                            @endif
                            <td><button type="submit" class="btn btn-success">Add Category</button>  </td>
                        </form>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
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

    <div class="card mt-5">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Auto/Manual</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($category as $c)
                    <form action="{{ route('updateinstructorcategory',[$c->id, $c->user_id]) }}" method="POST">
                        @csrf
                        <tr>
                            <td style="display: none"> <input type="text" name="cid" value="{{ $c->id }}">
                            </td>
                        <td>
                            <div class="form-group">
                                <select  class="form-control" name="category">
                                    <option value= "A" {{ 'A' == $c->category ? 'selected' : ''}} >Bike</option>
                                    <option value= "B1" {{ 'B1' == $c->category ? 'selected' : ''}} >Three Weel</option>
                                    <option value= "C1" {{ 'C1' == $c->category ? 'selected' : ''}} >Car,Van, Dual Purposes</option>
                                    <option value= "C" {{ 'C' == $c->category ? 'selected' : ''}} >Heavy Vehicle</option>
                                </select>
                            </div>
                        </td>
                        <td style="display: none">
                            <div class="form-group">
                                <select  class="form-control" name="tstatus">
                                    <option value= "Training" {{ 'Training' == $c->tstatus ? 'selected' : ''}} >Training</option>
                                    <option value= "Without Training" {{ 'Without Training' == $c->tstatus ? 'selected' : ''}} >Without Training</option>
                                </select>
                            </div>
                        </td>
                        @if( $c->transmission  == '3')
                            <input type="text" value="3" style="display: none">
                            <td><small class="text-danger" >Only Manual Transmission</small></td>
                        @else
                        <td>
                            <div class="form-group">
                                <select  class="form-control" name="transmission">
                                    <option value= "Auto" {{ 'Auto' == $c->transmission ? 'selected' : ''}} >Auto</option>
                                    <option value= "Manual" {{ 'Manual' == $c->transmission ? 'selected' : ''}} >Manual</option>
                                </select>
                            </div>
                        </td>
                        @endif
                        <td><button type="submit" class="btn btn-success">Update</button>  </td>
                    </form>
                        <td>
                            <form method="POST" action="{{ route('deleteinstructorvehiclecategory', [$c->id, $c->user_id]) }}" id="delete-form-{{ $c->id }}" style="display: none">
                                @csrf
                                @method('delete')
                            </form>
                            <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $c->id }}').submit();
                            }else{
                                event.preventDefault();
                            }" href="" class="btn btn-danger" >Delete
                            </button>
                        </td>
                    </tr>

                @endforeach
                </tbody>
              </table>
        </div>
      </div>
</div>
<script>
    $('#addcategory').click(function(){
        $('#categoryset').toggle();
    });
</script>
@endsection

