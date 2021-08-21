@extends('layouts.landingpage')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<div class="mb-3">
    <img class="image-fluid p-0 m-0" src="/images/landingpage/examcover.png" alt="Card image cap" style="width: 100%; height: auto;">
</div>
<div class="container mb-5">
    <div class="row mb-2 mt-5">
        <a href="{{route('onlinepaper')}}">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">All Papers</h5>
        </a>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 01</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 01</h1>
    </div>

     {{-- toast --}}
     <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="..." class="rounded mr-2" alt="...">
          <strong class="mr-auto">Bootstrap</strong>
          <small>11 mins ago</small>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          Hello, world! This is a toast message.
        </div>
      </div>

    <!-- question 01  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 01. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/1.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1" id="correct1"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම් </p>
                        <p><input type="radio" name="question1" > 2.ඔත්තේ දිනවල වාහන ඇතුළු වීම  තහනම් </p>
                        <p><input type="radio" name="question1" > 3.ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම් </p>
                        <p><input type="radio" name="question1" > 4.ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 02  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 02. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/2.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question3"> 1.ඉදිරියෙන් නවතිනු </p>
                        <p><input type="radio" name="question3" id="correct2"> 2.එකිනෙක හරහා ගමන් කරන මාර්ගය ඉදිරියෙනි</p>
                        <p><input type="radio" name="question3"> 3.අනිවාර්‍ය වට රවුම ඉදිරියෙනි </p>
                        <p><input type="radio" name="question3"> 4.වට රවුම ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 03  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 03. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/3.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question3"> 1.මාර්ගය ඉඩ දෙනු  </p>
                        <p><input type="radio" name="question3" id="correct3"> 2.අනිවාර්යෙන් ත්‍රිකෝණාකාර මංසන්ධිය</p>
                        <p><input type="radio" name="question3"> 3.ඉදිරියෙන් මාර්ගය ඉඩ දෙනු </p>
                        <p><input type="radio" name="question3"> 4.ප්‍රධාන මාර්ගය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 04  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 04. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/4.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question4">  1.සතුන්ගේ අභය භූමිය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question4" id="correct4"> 2.ගවයන් ඇති කරන ගොවිපල ඉදිරියෙනි</p>
                        <p><input type="radio" name="question4"> 3. ගවයන් හෝ වෙනත් සතුන් මාර්ගය හරහා ගමන් කිරීමට ඉඩ ඇති ස්ථානය  ඉදිරියෙනි </p>
                        <p><input type="radio" name="question4"> 4.ගවයන් සඳහා මාර්ගය මාරුවීමට වෙන් කළ  ස්ථානය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 05  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 05. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/5.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question5"> 1.දකුණු පැත්තට ද්විත්ව වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question5" id="correct5"> 2.U හැඩයට හැරවිය හැකි ස්ථානය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question5"> 3.දකුණු පැත්තට වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question5"> 4.දකුණු පැත්තට වැලමිට වංගුව ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 06  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 06. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/6.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question6"> 1.ඉදිරියෙන් හතරමං හන්දිය </p>
                        <p><input type="radio" name="question6" id="correct6"> 2.ප්‍රමුඛතා මාර්ග ය </p>
                        <p><input type="radio" name="question6"> 3. ප්‍රමුඛතා මාර්ගය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question6"> 4.මංසන්ධි කොටුව</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 07  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 07. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/7.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question7"> 1.වම් පැත්තෙන් රථවාහන ප්‍රධාන මාර්ගයට එක් වන සන්දිය ඉදිරියෙනි</p>
                        <p><input type="radio" name="question7" id="correct7"> 2.පළමුවෙන් වම් පැත්තට විහිදෙන විෂම විසම සන්දිය ඉදිරියෙනි</p>
                        <p><input type="radio" name="question7"> 3.වම් පැත්තෙන් එන රථ වාහන සඳහා ප්‍රමුඛතාව දෙනු </p>
                        <p><input type="radio" name="question7"> 4.Y හැඩය මංසන්ධිය ඉදිරියෙනි </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 08  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 08. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/8.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question8">1.ලමයි මාරු වන ස්ථානය </p>
                        <p><input type="radio" name="question8" id="correct8">2.අන්ධ මිනිසුන් මාරුවන ස්ථානය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question8">3.ලමයින් මාරුවන ස්තානය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question8">4.පාසල ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 09  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 09. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/9.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question9"> 1.පදිකයින් මාරු වන ස්ථානය </p>
                        <p><input type="radio" name="question9" id="correct9"> 2.පොලිස් ස්ථානය </p>
                        <p><input type="radio" name="question9"> 3.ඉන්ධන පිරවුම් හල  </p>
                        <p><input type="radio" name="question9"> 4.වාහන නවත්වන ස්ථානය</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- question 10  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 10. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="/images/onlinepaper/10.png" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question10"> 1.දකුණු පැත්තට ද්විත්ව වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question10" id="correct10"> 2.ඉදිරියෙන් දකුණට හරවනු </p>
                        <p><input type="radio" name="question10"> 3.දකුණු පැත්තට වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question10"> 4.දකුණු පැත්තට වැලමිට වංගුව ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="button" class="btn btn-primary mb-5 mt-5" value="Submit" onclick="check()">





</div>

<script>
    function check(){
        var score=0;
        var result="";
         if(document.getElementById("correct1").checked){
            score++;
         }
         if(document.getElementById("correct2").checked){
            score++;
         }
         if(document.getElementById("correct3").checked){
            score++;
         }
         if(document.getElementById("correct4").checked){
            score++;
         }
         if(document.getElementById("correct5").checked){
            score++;
         }
         if(document.getElementById("correct6").checked){
            score++;
         }
         if(document.getElementById("correct7").checked){
            score++;
         }
         if(document.getElementById("correct8").checked){
            score++;
         }
         if(document.getElementById("correct9").checked){
            score++;
         }
         if(document.getElementById("correct10").checked){
            score++;
         }
        if(score=="10"){
            result = "Congratulations!, You got 10 Out of 10";
        }else if(score > "5"){
            result = "Not Bad";
        }else if(score >0){
            result = "poor";
        }else{
            result = "You got 0 marks!";
        }
        alert(result+""+score);
    }
</script>
@endsection