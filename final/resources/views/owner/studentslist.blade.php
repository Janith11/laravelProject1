@extends('layouts.ownerapp')
@section('content')
<style>
    img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .setwidth{
        max-width: 100px;
    }
</style>

<div class="container">
<h6>Students Lists</h6>
    <div class="row mt-4 mb-2 p-3">
      <div class="col-10">
        <h4 id="search-bar-head">All Students</h4>
        <input class="form-control mr-sm-2" id="search-bar" type="search" placeholder="student name" aria-label="Search" style="display: none">
      </div>
      <div class="col-2">
       <a href="" class="SearchIcon"><span><i class="fas fa-search"></i></span> </a>
      </div>

      {{-- start tabel  --}}
      <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col ">
                <input type="checkbox">
            </th>
            <th scope="col ">Name</th>
            <th scope="col ">NIC</th>
            <th scope="col">Id</th>
            <th scope="col">Batch</th>
            <th scope="col">Balance</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td scope="row "><input type="checkbox"></td>
            <td class="setwidth">
                <div class="row">
                    <div class="col-4 m-n1 p-0 ">
                        <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="avatar">
                    </div>
                    <div class="col-8 m-n1 p-0 ">
                        <h6>{{$student->user->f_name }} {{$student->user->l_name}}</h6>
                        <p>{{ $student->user->email}}</p>
                    </div>
                </div>
            </td>
            <td>{{ $student->user->nic_number}}</td>
            <td>{{ $student->user_id}}</td>
            <td>{{ $student->group_number}}</td>
            <td>{{ $student->amount}}</td>
            <td><a href=""><i class="fas fa-pencil-alt"></i></a></td>
            <td><a href="{{ route('viewstudent', $student->user_id) }}"><i class="fas fa-angle-double-right"></i></a></td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{-- end table  --}}
    </div>
    
    <div clas='row mb-2>
        <a href='{{ route('testinsert') }}'>Check Insert Student</a>
    <div>
    
</div>


{{-- toggle search when press search icon  --}}
<script>
     $(document).ready(function(){
         $(".SearchIcon").click(function(){
             $("#search-bar").display("block");
         });
     });
</script>
@endsection
