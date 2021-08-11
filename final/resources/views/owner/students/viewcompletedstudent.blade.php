@extends('layouts.ownerapp')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Settings</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href=""> / Completed Students</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div style="padding-right: 15px">
                <a type="button" class="btn btn-primary" style="color: white" href="{{ route('viewstudentrecyclebin') }}">Deleted Students</a>
            </div>
        </div>
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
    @if(session('successmsg'))
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                <h5>
                    {{ session('successmsg') }}
                </h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

    @if(session('errormsg'))
        <div class="row-mb-2">
            <div class="alert alert-danger">
                {{ session('errormsg') }}
            </div>
        </div>
    @endif
    {{-- start the main part  --}}
    <div class="card mt-5" style="width: 100%">
        <div class="card-body">
            <table class="table table-bordered table-sm table-hover">
                <thead class="text-center">
                  <tr>
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Final Result</th>
                    <th scope="col">Exam Date</th>
                    <th scope="col">Delete</th>
                    <td scope="col">i</td>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach ($students as $student)
                  @if ($student->total_session <= $student->completed_session and $student->user->role_id == 3)         
                  <tr>
                    <th scope="row">{{ $student->user->nic_number }}</th>
                    <td>{{ $student->user->f_name }} {{ $student->user->l_name }}</td>
                    <td>
                        @foreach ($categories as $category)
                            @if ($student->user_id == $category->user_id)
                                {{ $category->category.', ' }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($student->total_fee - $student->paid_amount < 0)
                            <span class="text-success">Paid Totally</span>
                        @else
                            {{ $student->total_fee - $student->paid_amount }}
                        @endif
                    </td>
                    <td>
                        @foreach ($exams as $exam )   
                            @foreach ($exam->practicalexam as $value)
                                @php $count=0 @endphp
                                @if($student->user_id == $exam->user_id and $value->type == "practical" and $count == 0)
                                    @php $count++ @endphp
                                    {{$value->result  }}                          
                                @endif
                                @break
                            @endforeach                         
                            @php $count=0 @endphp
                        @endforeach
                        
                    </td>
                    <td>2021-02-02</td>
                <form action="{{ route('temporystudentdelete',$student->user_id) }}" id="delete-form-{{ $student->id }}" method="POST">
                    @csrf
                    <td><button onclick="if(confirm('Are You Sure Want to Delete this Student?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $student->id }}').submit();
                        }else{
                            event.preventDefault();
                        }" href="" class="btn btn-danger btn-sm py-0" >Delete
                        </button>
                    </td>
                </form>
                    <td><a href="{{ route('viewstudent',$student->user_id) }}">i</a></td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
              </table>
        </div>
    </div>



</div>
<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>
@endsection

