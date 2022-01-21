@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Edit exam lists</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
    </div>
   {{-- View exam dates  --}}
   <div class="mb-3  row">
       <div class="ml-auto">
            <a href="{{ route('examdatesrequest') }}" type="button" class="btn btn-primary">Upcoming Exam Dates</a>
        </div>
   </div>
    <div class="card">
        <div class="card-body">
            <h5 style="color: #222944; font-weight: bold"> Exam Results</h5>
            <hr style="border: 0.5px solid #222944">
            <div class="mt-5">
                <div class="row">
                    @foreach ($examdetails as $examdetail)
                        @foreach ($examdetail->exams as $exam)
                            <div class="col-md-6 bg-light">
                                <table class="table table-sm table-hover">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">Exam Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Result</th>
                                        <th scope="col">Attempt</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        @if ($exam->type == 'theory')
                                            <th scope="row">Theory</th>    
                                        @elseif ($exam->type == 'practical')
                                            <th scope="row">Practical</th>    
                                        @else
                                            <th scope="row">Error</th>    
                                        @endif
                                            <td>{{ $exam->date }}</td>
                                        @if ($exam->result == 'pass')
                                            <td class="bg-success text-center px-1"><span class="text-light"><i class="far fa-check-circle fa-lg"></i></span> Pass</td>    
                                        @else
                                            <td class="bg-danger text-center px-1"><span class="text-light"><i class="far fa-times-circle fa-lg"></i></span> Fail</td>    
                                        @endif
                                            <td class="text-center">{{ $exam->attempt }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

   
</div>

    <script>
        $(document).ready(function(){
            $('aside ul .examresults').css('border-left', '5px solid #00bcd4');
        })
    </script>
@endsection

