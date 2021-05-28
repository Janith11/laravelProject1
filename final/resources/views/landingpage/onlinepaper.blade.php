@extends('layouts.landingpage')
@section('content')

<div class="container">

    <div class="row  justify-content-center mb-3">
       <img src="https://www.csn.edu/__data/assets/image/0022/20677/college_student_studying_banner.jpg" alt="">
    </div>

    <!-- question 01  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 01. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම් </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඔත්තේ දිනවල වාහන ඇතුළු වීම  තහනම් </p>
                        <p><input type="radio" name="question1"> 3.ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම් </p>
                        <p><input type="radio" name="question1"> 4.ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්</p>
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question3"> 1.ඉදිරියෙන් නවතිනු </p>
                        <p><input type="radio" name="question3" id="correct3"> 2.එකිනෙක හරහා ගමන් කරන මාර්ගය ඉදිරියෙනි</p>
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
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




   

    <!-- question 11  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 11. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තහනම් සංඥාවකි </p>
                        <p><input type="radio" name="question1" id="correct1">2.සීමාකාරී සංඥාවකි   </p>
                        <p><input type="radio" name="question1">3.විධාන සංඥාවකි </p>
                        <p><input type="radio" name="question1">4.අනතුරු හැඟවීමේ සංඥා වකි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 12 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 12. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.සියලුම වාහන සඳහා පාර වසා ඇත</p>
                        <p><input type="radio" name="question1" id="correct1">2. ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්   </p>
                        <p><input type="radio" name="question1"> 3.නැවතීම හා පැටවීම තහනම් </p>
                        <p><input type="radio" name="question1"> 4.වාහන නැවැත්වීම තහනම්</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 13  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 13. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඇක්සලයක්  මත පැටවිය හැකි බර සීමාව </p>
                        <p><input type="radio" name="question1" id="correct1">2.වේග සීමාවේ අවසානය   </p>
                        <p><input type="radio" name="question1"> 3.වේග සීමාවේ ආරම්බය</p>
                        <p><input type="radio" name="question1"> 4. වේග සීමා ව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 14  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 14. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පදිකයන් සදහා වෙන් කළ මාර්ගයේ ආරම්භය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.පදිකයින් සදහා ඉඩ දෙන්න  </p>
                        <p><input type="radio" name="question1"> 3.පදිකයින් මාරු වන ස්ථානය </p>
                        <p><input type="radio" name="question1">4.පදික මාරුව ඉදිරියෙනි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 15  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 15. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගය ලිස්සන සුළු ස්ථානය  ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉහලට අවදානම් බැවුම ඉදිරියෙනි   </p>
                        <p><input type="radio" name="question1">3.කාර් රථ ලිස්සන සුළු ස්ථානය  ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1">4.පහතට අවදානම් බෑවුම ඉදිරියෙනි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 16  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 16. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.Yහඩය මංසන්ධිය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරියේදී මාර්ගයේ පටු ය   </p>
                        <p><input type="radio" name="question1">3.ප්‍රධාන මාර්ගයට දෙපසින් රථ වාහන පිවිසෙන මංසන්ධිය  ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4.ද්විත්ව රථ මාර්ගයේ ආරම්භය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 17  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 17. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මෝටර් කාරය අනිවාර්යෙන්ම ඉදිරියට යා යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.ත්‍රීරෝද රථයට කෙලින්ම ඉදිරියට යා හැකිය  </p>
                        <p><input type="radio" name="question1">3.ත්‍රිරෝද රථයට දකුණට හැරවීමට හෝ කෙලින්ම ඉදිරියට යා හැක  </p>
                        <p><input type="radio" name="question1"> 4.මෝටර් කාරයට කෙලින්ම ඉදිරියට යාමට ඔහු දකුණු ට හැර විය හැක</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 18  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 18. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තීරණය, සංඥා කිරීම සහ ක්‍රියා කිරීම </p>
                        <p><input type="radio" name="question1" id="correct1">2.නිරීක්ෂණය, තීරණය කිරීම හා ක්‍රියා කිරීම   </p>
                        <p><input type="radio" name="question1"> 3.සංඥා කිරීම ,තීරණය කිරීම සහ ක්‍රියා කිරීම </p>
                        <p><input type="radio" name="question1">4.ඉහත සියල්ල නිවැරදි ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 19  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 19. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රතු හා කහ</p>
                        <p><input type="radio" name="question1" id="correct1">2. රතු   </p>
                        <p><input type="radio" name="question1"> 3.කොළ හා කහ </p>
                        <p><input type="radio" name="question1">4.කොල </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 20  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 20. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් හා පසුපසින් පැමිණෙන වාහන නවතිනු </p>
                        <p><input type="radio" name="question1" id="correct1">2.පසුපසින් පැමිණෙන වාහන නවතිනු   </p>
                        <p><input type="radio" name="question1">3.නවතිනු  </p>
                        <p><input type="radio" name="question1"> 4.ඉදිරියෙන් පැමිණෙන වාහන නවතිනු</p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 21  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 21. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ධාවන තීරු සලකුණු </p>
                        <p><input type="radio" name="question1" id="correct1">2.මධ්‍ය රේඛාව   </p>
                        <p><input type="radio" name="question1">3.දකුණට හැරීම හැර , හරහා යෑම තහනම් කරන ආයත රේඛාව  </p>
                        <p><input type="radio" name="question1"> 4.මාර්ගය හරහා ගමන් කිරීම තහනම් කිරීමේ ආයත රේඛාව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 22 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 22. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වෑන් රථයට අවශ්‍ය නම්   වමට  හැර විය හැක </p>
                        <p><input type="radio" name="question1" id="correct1">2.වෑන් රථය අනිවාර්යෙන් දකුණට හැරවිය යුතුය   </p>
                        <p><input type="radio" name="question1">3.මෝටර් කාරය ට අවශ්‍ය නම් දකුණට හැරවිය හැක  </p>
                        <p><input type="radio" name="question1">4.මෝටර් රථයට  අවශ්‍ය නම්  වමට හැර විය හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 23  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 23. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගය ඉඩ දෙනු රේඛාව </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මාර්ගයේ බෙදී යන ස්ථානයක පිහිටුවන නැවතුම් රේඛාව  </p>
                        <p><input type="radio" name="question1"> 3.නවතිනු සංඥාවේ හි පිහිටුවන නැවතුම් රේඛාව </p>
                        <p><input type="radio" name="question1">4.වට රවුමක පිහිටු වන මාර්ගය ඉඩ දෙනු රේඛාව </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 24  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 24. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ප්‍රධාන මාර්ගයේ වාහන නොමැතිනම් නතර කළ යුතු නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2.අනිවාර්යෙන් නතර කළ යුතුය   </p>
                        <p><input type="radio" name="question1">3.දකුණට හර වන්නේ නම් පමණක් නතර කළ යුතුය  </p>
                        <p><input type="radio" name="question1"> 4.මම ට හැරවීමේ දී නතර කළ යුතු නැත</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 25  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 25. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගය ඉඩ දෙනු රේඛාව </p>
                        <p><input type="radio" name="question1" id="correct1">2.රථ වාහන සංඥා එළියක දී හෝ පොලිසියෙන් පාලනය වන අන්තර් ජේදනය කදී නැවතීමේ රේඛාව   </p>
                        <p><input type="radio" name="question1">3.නවතිනු සංඥාවේ පිහිටුවන නැවතුම් රේඛාව  </p>
                        <p><input type="radio" name="question1"> 4.වට රවුමක පිහිටුවනු ලබන මාර්ගය ඉඩ දෙනු රේඛාව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 26  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 26. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් මාර්ගය වසා ඇත </p>
                        <p><input type="radio" name="question1" id="correct1">2.දුම්රිය හරස් මාර්ගය ඉදිරියෙන් යි   </p>
                        <p><input type="radio" name="question1"> 3.ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය</p>
                        <p><input type="radio" name="question1"> 4.ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 27  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 27. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අනිවාර්යය වට රවුම </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඇතුල් වීම තහනම්   </p>
                        <p><input type="radio" name="question1"> 3.බස් හා ලොරි රථ සඳහා පාර වසා ඇත </p>
                        <p><input type="radio" name="question1">4.මාර්ගය වසා ඇත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 28  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 28. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ලිස්සන සුලු මාර්ගය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.වංගු සහිත මාර්ගය ඉදිරියෙනි   </p>
                        <p><input type="radio" name="question1">3.අනතුරු දායක මං සන්දිය ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4.ඉදිරියෙන් මාර්ගය පටුය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 29  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 29. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.Y හැඩය මංසන්ධියෙන් ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඉදිරියෙන් මාර්ගය පටුය  </p>
                        <p><input type="radio" name="question1"> 3.ද්විත්ව රථ  මාර්ගයේ අවසානය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1">4.පටු පාලම ඉදිරියෙනි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 30  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 30. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අනිවාර්යෙන් වටරවුම ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.අනිවාර්ය වට රවුම   </p>
                        <p><input type="radio" name="question1"> 3.වට රවුම ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1">4.වට රවුම </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 31  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 31. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම් පැත්තට හරවා නවත්තන්න </p>
                        <p><input type="radio" name="question1" id="correct1">2. වම් පැත්තට හැර විය යුතුය   </p>
                        <p><input type="radio" name="question1">3.වම් පැත්තට හැරීම සඳහා ප්‍රමුඛතාවය  </p>
                        <p><input type="radio" name="question1"> 4.ඉදිරියෙන් වම් පැත්තට හැර විය යුතුය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 32 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 32. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තොරතුරු සංඥා වකි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.අනතුරු හැඟවීමේ සංඥා වකි  </p>
                        <p><input type="radio" name="question1"> 3.තහනම් සංඥාවකි </p>
                        <p><input type="radio" name="question1">4.විධාන සංඥාවකි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 33  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 33. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම් පැත්තට  ද්විත්ව වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.වම් පැත්තට වැලමිටි වංගුව ඉදිරියෙනි   </p>
                        <p><input type="radio" name="question1">3.වම් පැත්තට වංගුව ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4.U හැඩයට හැරවිය හැකි ස්ථානය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 34  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 34. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.සියලුම වාහන සඳහා මාර්ගය වසා ඇත</p>
                        <p><input type="radio" name="question1" id="correct1"> 2. මාර්ගය වසා ඇත  </p>
                        <p><input type="radio" name="question1">3.කාර් සහ යතුරු පැදි සඳහා මාර්ගය වසා ඇත  </p>
                        <p><input type="radio" name="question1">4.කාර් සහ යතුරුපැදි ඇතුල්වීම තහනම් </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 35  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 35. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වට රවුම් ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.රථ වාහන නවත්වන ස්ථානය   </p>
                        <p><input type="radio" name="question1">3. නවතිනු  </p>
                        <p><input type="radio" name="question1">4.ඉදිරියෙන් නවතිනු </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 36  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 36. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ද්විත්ව රථ මාර්ගය ආරම්භය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2. ඉදිරියේ දී මාර්ගයේ පටු ය   </p>
                        <p><input type="radio" name="question1">3.ද්විත්ව රතු මාර්ගය අවසානය ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4.පටු පාලම ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 37  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 37. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වේග සීමාව </p>
                        <p><input type="radio" name="question1" id="correct1">2. සාමාන්‍ය වේගය   </p>
                        <p><input type="radio" name="question1">3. අවම වේගය </p>
                        <p><input type="radio" name="question1"> 4.නගර සීමාව තුළ වේග සීමාව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 38  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 38. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් මංසන්ධියක් </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඔත්තේ දිනවල නැවැත් වීම  හා පැටවීම තහනම්  </p>
                        <p><input type="radio" name="question1">3.ඉරට්ටේ දිනවල නැවැත් වීම හා පැටවීම තහනම්  </p>
                        <p><input type="radio" name="question1"> 4.නැවත ඒ මහා පැටවීම තහනම්</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 39  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 39. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1"1.කොළ></p>
                        <p><input type="radio" name="question1" id="correct1">2. කහ  </p>
                        <p><input type="radio" name="question1">3. රතු සහ කහ  </p>
                        <p><input type="radio" name="question1"> 4කහ සහ කොළ</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 40  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 40. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් එන වාහන වලට ප්‍රමුඛතාවය  අවසන් </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඇතුල් වීම තහනම්   </p>
                        <p><input type="radio" name="question1">3.වාහන ඉස්සර කිරීම තහනම්  </p>
                        <p><input type="radio" name="question1">4ඉරට්ටේ දිනවල නැවත්වීම තහනම් </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 41  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 41. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ප්‍රධාන මාර්ගය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරියෙන් මාර්ගය ඉඩ දෙනු   </p>
                        <p><input type="radio" name="question1">3.ත්‍රිකෝණාකාර මංසන්ධිය ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1">4මාර්ගය ඉඩ දෙනු </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 42-->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 42. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.කළුගල් කඩන ස්ථානය ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1" id="correct1">2. අවදානම් බෑවුම ඉදිරියෙනි   </p>
                        <p><input type="radio" name="question1">3.මාර්ගයේ අලුත්වැඩියා කරන ස්ථානය ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4ගල් පර්වත කැබලි වැටෙන ස්තානය ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 43  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 43. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉරට්ටේ දිනවල වාහන ඇතුල් වීම තහනම් </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉරට්ටේ දින වල ඒ දිනවල වාහන නැවැත්වීම තහනම්   </p>
                        <p><input type="radio" name="question1">3.ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්  </p>
                        <p><input type="radio" name="question1">4ඔත්තේ දිනවල වාහන ඇතුලුවීම තහනම් </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 44  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 44. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පසුපසින් පැමිණෙන වාහන නවතිනු </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරියෙන් හා පසුපසින් පැමිණෙන වාහන නවතිනු   </p>
                        <p><input type="radio" name="question1">3.ඉදිරියට එනු  </p>
                        <p><input type="radio" name="question1"> 4.නවතින</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 45  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 45. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉඩ දීමේ රේඛාව </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.රථ වාහන සංඥා ආලෝක සංඥා හෝ පොලිසියෙන් පාලනය වන මාර්ගයේ බෙදී යන ස්ථානයක පිහිටුවන නැවතුම් රේඛාව  </p>
                        <p><input type="radio" name="question1"> 3.නැවතීමේ සංඥා අසල  නැවතීමේ රේඛාව </p>
                        <p><input type="radio" name="question1">4.වට වංගුව අසල ඉඩ දී මේ රේඛාව </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 46  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 46. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගයේ බෙදී යන ස්ථානයක පිහිටුවන නැවතුම් රේඛාව </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වට රවුමක පිහිටු වන මාර්ගය ඉඩ දෙනු රේඛාව  </p>
                        <p><input type="radio" name="question1">3.පවතින  සංඥාවේ පිහිටුවන නැවතීමේ රේඛාව  </p>
                        <p><input type="radio" name="question1"> 4.මාර්ගය ඉඩ දෙනු රේඛාව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 47  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 47. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මංතීරු සලකුණ </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මාර්ගය හරහා ගමන් කිරීම තහනම් කිරීමේ ආයත රේඛාව  </p>
                        <p><input type="radio" name="question1">3.දකුණට හැරවීම හැර හරහා යෑම තහනම් කිරීමේ ආයත රේඛාව  </p>
                        <p><input type="radio" name="question1"> 4.මධ්‍ය රේඛාව</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 48  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 48. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ද්විත්ව මාර්ගය   ඉදිරියෙන් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.පටු පාලමකි  </p>
                        <p><input type="radio" name="question1"> 3. ඉදිරියේ මාර්ගය පටු බව යි </p>
                        <p><input type="radio" name="question1">4.පටු පාලම ඉදිරියෙන් ඇති බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

    <!-- question 49  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 49. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1"></p>
                        <p><input type="radio" name="question1" id="correct1">1.පදිකයින් මාරු වන ස්ථානය ඉදිරියෙන් ඇති බවයි   </p>
                        <p><input type="radio" name="question1">2.පදික මාරුව ඉදිරියෙන් ඇති බවයි  </p>
                        <p><input type="radio" name="question1">3.මගින් මාරුවන ස්ථානයක් ඉදිරියෙන් ඇති බවයි  </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 50  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 50. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1"> 1.ඔත්තේ දිනවල ඇතුළුවීම තහනම් බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඔත්තේ දිනවල නැවත ඒම තහනම් බවයි   </p>
                        <p><input type="radio" name="question1"> 3.ඇතුල් විම තහනම් බවයි </p>
                        <p><input type="radio" name="question1">4.විරුද්ධ දිශාවෙන් වාහන පැමිණිය නො හැකි බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 51  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 51. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ප්‍රධාන පාරඉදිරියෙන් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2. ත්‍රිකෝණාකාර  මං සන්ධිය ඉදිරියෙන් ඇති බවයි   </p>
                        <p><input type="radio" name="question1">3.ඉදිරියෙන් ඉඩදෙනු යන අදහස යි  </p>
                        <p><input type="radio" name="question1"> 4.මාර්ගය ඉඩ දෙනු යන අදහසයි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 52  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 52. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහන ඇතුළු වීම සීමා කර ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරියෙන් ඉඩ දෙනු යන අදහසයි   </p>
                        <p><input type="radio" name="question1"> 3.ප්‍රමුඛතා මාර්ගය බවයි </p>
                        <p><input type="radio" name="question1">4.ප්‍රමුඛතා මාර්ගයේ අවසානය බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 53  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 53. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් ප්‍රධාන මාර්ගයට ඇතුළු වන බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරියෙන් එන වාහන වලට ප්‍රමුඛතාවය යුතු බවයි   </p>
                        <p><input type="radio" name="question1"> 3. ඉදිරියට යන වාහන වලට ප්‍රමුඛතාව දිය යුතු බවයි </p>
                        <p><input type="radio" name="question1">4.ඉදිරියෙන් පැමිණෙන වාහනය ප්‍රවේශම් වන්න යන අදහසයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 54  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 54. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දුම් රිය ඉදිරියෙන් පැමිණිය හැකි බැවින් ප්‍රවේශම් වන්න යන්නයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.දුම් රියෙන් ප්‍රවේශම් විය යුතු බවයි   </p>
                        <p><input type="radio" name="question1">3.ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගයක් බව යි  </p>
                        <p><input type="radio" name="question1">4.ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය ඉදිරියෙන් බව </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

    </div>

    <!-- question 55  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 55. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් මාර්ගය අවසානය බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.වැලමිට වංගුව ඉදිරියෙන් ඇති බවයි   </p>
                        <p><input type="radio" name="question1">3.U හැඩයට සිටින සේ හැරවීම තහනම් යන අදහසයි </p>
                        <p><input type="radio" name="question1">4.දකුණු පැත්තට හැරවීම තහනම් යන අදහසයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 56  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 56. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වට රවුම ඉදිරියෙන් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.විදුලි ආලෝක සංඥා ව යන අදහසයි   </p>
                        <p><input type="radio" name="question1"> 3.නවතිනු යන අදහස </p>
                        <p><input type="radio" name="question1">4.ඉඩදෙනු යන අදහසයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 57  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 57. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">
                            1.නාගරික ප්‍රදේශයකට ඇතුළු වන බව යි </p>
                        <p><input type="radio" name="question1" id="correct1">  2.එම ප්‍රදේශය තුළ පැදවිය හැකි උපරිම වේගය බවයි </p>
                        <p><input type="radio" name="question1"> 3.එම ප්‍රදේශය තුළ පැදවිය හැකි සාමාන්‍ය වේගය බවයි </p>
                        <p><input type="radio" name="question1">4.සඳහන් වේග සීමා වේ අවසානය බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

    <!-- question 58  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 58. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තහනම් සංඥාවකි </p>
                        <p><input type="radio" name="question1" id="correct1">2.අනතුරු ඇඟවීමේ සංඥාවකි  </p>
                        <p><input type="radio" name="question1">3.පාලක සංඥාවකි  </p>
                        <p><input type="radio" name="question1">4.තොරතුරු සංඥාවකිs </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

    <!-- question 59  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 59. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දුම්රිය මාර්ගය ඉදිරියෙන් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.රෝහලක් ඉදිරියෙන් ඇති බවයි  </p>
                        <p><input type="radio" name="question1">3.පල්ලියක් ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1"> 4.එකිනෙකා රහ ගමන් කරන මාර්ග ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 60  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 60. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දකුණට හැර විය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.වමට වංගුව ඉදිරියෙනි   </p>
                        <p><input type="radio" name="question1"> 3.දකුණට වංගුව ඉදිරියෙනි </p>
                        <p><input type="radio" name="question1">4.වමට හැර විය යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 61  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 61. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.Yහැඩයට මං සන්ධිය ඉදිරියෙන් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2. ඉදිරියෙන් ප්‍රධාන මාර්ගයේ ඇති බවයි  </p>
                        <p><input type="radio" name="question1">3.වම් පැත්තෙන් යන වාහන වලට ප්‍රමුඛතාව දෙන ලෙස දැනුම් දීමකි  </p>
                        <p><input type="radio" name="question1">4.වම් පැත්තෙන් ඉන්න රථවාහන ප්‍රධාන මාර්ගයට එක්වන සන්දිය ඉදිරියෙනි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 62  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 62. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් දකුණට හැර විය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.දකුණු පැත්තට වැලමිට වංගුව ඉදිරියෙනි  </p>
                        <p><input type="radio" name="question1">3.ඉදිරියෙන් Uහැඩයට  හැර විය හැක  </p>
                        <p><input type="radio" name="question1"> 4.වම් පැත්තට වැලමිටි වංගුව ඉදිරියෙනි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 63  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 63. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම් බවයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මාර්ගය වසා ඇති බවයි  </p>
                        <p><input type="radio" name="question1"> 3.වාහන නැවැත්වීම තහනම් බවයි </p>
                        <p><input type="radio" name="question1">4.ඉදිරියෙන් වට රවුමක් ඇති බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 64  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 64. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">
                            1.ඉරට්ටේ ඒ දිනවල වාහන නැවැත්වීම තහනම් බවයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වාහන ඇතුල් වීම තහනම් බවයි  </p>
                        <p><input type="radio" name="question1"> 3.වාහන නැවැත්වීම තහනම් බවයි </p>
                        <p><input type="radio" name="question1">4.වාහන නැවත්වීම සහ පැටවීම තහනම් බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

    </div>

    <!-- question 65  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 65. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">
                            1.ඉදිරියෙන් ආපසු හරවන්න </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වම් පැත්තට හරවන්න  </p>
                        <p><input type="radio" name="question1"> 3.මේ පැත්තෙන් පසු කර යන්න </p>
                        <p><input type="radio" name="question1"> 4.ඉදිරියෙන් වම් පැත්තට හරවන්න</p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 66  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 66. මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">
                            1.ඉදිරියෙන් දකුණු පැත්තට හැර විය යුතුයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහන නවතා තැබීමට පුළුවන් බව යි   </p>
                        <p><input type="radio" name="question1"> 
                            3.ඉදිරියෙන් ක් අනතුරක් ඇති බැවින් හෙමින් ධාවනය කරන්න යන්නයි</p>
                        <p><input type="radio" name="question1"> 4.නවතිනු සංඥාවයි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 67  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 67. ශ්‍රී ලංකාවේ මාර්ග නීති සංග්‍රහයේ අනතුරු හැඟවීමේ සංඥා දක්වා ඇත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නිල් පසුබිමේ සුදු වර්ණයෙනි</p>
                        <p><input type="radio" name="question1" id="correct1">2.රතු පසුබිමෙහි සුදු වර්ණයෙනි  </p>
                        <p><input type="radio" name="question1">3.කහ පසුබිමෙහි කළු වර්ණයෙනි </p>
                        <p><input type="radio" name="question1">4.සුදු පසුබිමේ රතු වර්ණයෙනි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 68  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 68.වට රවුමක මූලික නීතිය වනුයේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔබට දකුණෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඔබට වම් පසින් හෝ ආසන්ව පැමිණෙන  රථවාහන වලට ඉඩ දිය යුතුයි   </p>
                        <p><input type="radio" name="question1">3.අධික රථවාහන තදබදය සහිත දිශාවෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතු යි  </p>
                        <p><input type="radio" name="question1">4.ඔබට ඔහොම බසින් හෝ ආසන්නව දකුණෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 69  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 69. එක් දිශාවකට මන්තීරු තුනක් සහිත මාර්ගයක ඔබගේ වාහනය ඉදිරියට ගමන් කරන අවස්ථාවක දී ඔබ විසින් තෝරාගත යුතු මන්තීරු  වනුයේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගයේ මැද තීරුව හෝ දකුණු පස මං තීරුවය</p>
                        <p><input type="radio" name="question1" id="correct1">2.මාර්ගයේ දකුණු පස මංතීරුවය  </p>
                        <p><input type="radio" name="question1">3.මාර්ගයේ වම්පස මන්තීරුවය  </p>
                        <p><input type="radio" name="question1">4.මාර්ගය මැද මංතීරුව ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 70  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 70. ඔබගේ වාහනය හා ඔබට ඉදිරියෙන් ධාවනය වන වාහන අතර ප්‍රමාණවත් දුරක් තබා ගත යුත්තේ  </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔබට ඉදිරියෙන් ධාවනය වන වාහන වාහනයේ රියදුරු තැන හදිසියේ නතර කළහොත් එම වාහනය පසු කර යෑමට ඔබට වැඩි වෙලාවක් ලැබෙන නිසාය </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඔබට ඉදිරියෙන් ධාවනය වන වාහනයේ රියදුරු තැන ුන හදිසියේ නතර කලහොත් ඔබට ඔබගේ වාහනය ආරක්ෂාකාරී ලෙස නතර කර ගැනීමට හැකි වන නිසාය   </p>
                        <p><input type="radio" name="question1">3.ඔබට ඉදිරියෙන් ධාවනය වන වාහනයට ඉස්සර කිරීමට වැඩි  ඉඩක් ලැබෙන නිසාය  </p>
                        <p><input type="radio" name="question1">4. ඔබට ඉදිරියෙන් ධාවනය වන වාහනය පසුපසින් ධාවනය කිරීමට වඩාත් පහසු වන නිසාය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 71  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 71. වාහනේක අවදානම හැඟීම් ඒ ලාම්පු පාවිච්චි කිරීම කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය අබල තත්ත්වයකට පත්වන අමතා තිබේ දී පමණි </p>
                        <p><input type="radio" name="question1" id="correct1">2. වාහනයක් හදිසි තත්වයක් නිසා ධාවනය කරන බව දැක්වීම සඳහාය   </p>
                        <p><input type="radio" name="question1">3.හන්දියකදී  වාහනයක් කෙලින්ම ධාවනය කිරීමට අදහස් කරන අවස්ථාවේදී ය  </p>
                        <p><input type="radio" name="question1">4. ප්‍රමුඛතාව ලබා ගැනීමට ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 72 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 72. වෙනත් වාහනයක්  විසින් ඔබගේ වාහනය පත්තු කරන අවස්ථාවකදී</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔබ පසු කර යාමට ඉඩ දීමට කැමැත්තක් නොදක්වන්නේ  නම් ඔබගේ වාහනය දකුණුපස සංඥා දැල්විය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඔබගේ වාහනය අඩු ගියරයකට යොදා නතර කිරීමට සූදානම් විය යුතුය   </p>
                        <p><input type="radio" name="question1">3.ඔබගේ වාහන වේගය වැඩි නොකර පසු කරන්නාට  ඔබගේ වාහනය පසුකර යාමට ඉඩ දිය යුතුය  </p>
                        <p><input type="radio" name="question1">4. ඔබ පසුකර යාමට ඉඩ දීමට කැමැත්තක් නොදක්වන නම් උඹට වාහනය වේගය වැඩි කළ හැකිය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 73  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 73. මංසන්ධි කොටුව සලකුණු කර ඇති  ස්ථානයකදී</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔබ කෙලින්ම ඉදිරියට ගමන් කරන්නේ නම් ඔබට මංසන්ධි කොටුව තුළට ඇතුළු  විය හැක </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.දකුණට හැරවීමේදී හැර පිටවීමට ඇති මාර්ගය අවහිර නම් මංසන්ධි කොටුව තුලට ඇතුළු නො විය යුතු ය  </p>
                        <p><input type="radio" name="question1">3.දකුණට හැරවීමට හැර ඕනෑම අවස්ථාවකදී ඔබට මංසන්ධි  කොටුව තුළට ඇතුළු විය හැක  </p>
                        <p><input type="radio" name="question1">4. ඕනෑම අවස්ථාවක ඔබට මංසන්ධි කොටුව තුළට ඇතුළු විය  හැකිය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 74  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question74. වාහනයක් නතර කර තැබිය හැකි ස්ථානයක් වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මං සන්ධියක සිට මීටර 25 ක සීමාවෙන් පිටත ය </p>
                        <p><input type="radio" name="question1" id="correct1">2.බස්රථ නැවතුමක සිට මීටර 20 ක සීමාවෙන් පිටත ය   </p>
                        <p><input type="radio" name="question1">3.පා ගාමින් මාරු වන ස්ථානයක දඟර ප්‍රදේශයක හෝ එහි සිට මීටර් 10 ක  සීමාවෙන් පිටත ය  </p>
                        <p><input type="radio" name="question1">4.ගිනි නිවන ජලනළයක සිට මීටර දහයක සීමාවෙන් පිට ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 75  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 75. ඔබ වෙනත් වාහනයකට ඉස්සර නො කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ආරෝග්‍ය ශාලාවක් ඉදිරියේ හෝ එයට ලඟා වන අවස්ථාවකදීය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.උසාවියක් ඉදිරියේ හෝ එයට ලඟා වන අවස්ථාවකදී ය  </p>
                        <p><input type="radio" name="question1">3.මාර්ගය මත පිහිටා ඇති කඩ ඉරි නොකැපෙන සේ ය  </p>
                        <p><input type="radio" name="question1">4.පදික මාරුවකදී හෝ එයට ලඟා වන අවස්ථාවකදීය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 76  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 76. ඔබගේ වාහනය මාර්ග අනතුරකට භාජනය වුවහොත්</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අනතුරට පත් වාහනය කඩිනමින් මාර්ගයෙන් ඉවත් කර පොලිසියට වාර්තා කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහනේ පිහිටීම මාර්ගය මත සලකුණු කර අනතුරට පත් පුද්ගලයන් රැගෙන ඒම සඳහා වාහනය පාවිච්චි කළ හැක   </p>
                        <p><input type="radio" name="question1">3.අනතුරට පත් වාහන පොලිස්  නිලධාරියකු පැමිණෙන තෙක් ඉවත්  නොකළ යුතු ය  </p>
                        <p><input type="radio" name="question1">4.හැකි විගස වාහනය මාර්ගයෙන් ඉවතට ගෙන එහි කාර්මික දෝෂ තිබේදැයි පරික්ෂා කළ යුතු </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 77  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 77. රාත්‍රි කාලයේදී ඔබ වාහනය සැමියට උන් අතර කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රථ වාහන තදබදය අවම දිශාවකට මුහුණ ලා ය </p>
                        <p><input type="radio" name="question1" id="correct1">2.රථ වාහන ගමනා ගමනයට ප්‍රතිවිරුද්ධ දිශාවට මුහුණලා ය   </p>
                        <p><input type="radio" name="question1">3.රථ වාහන තදබදය අධික දිශාවට මුහුණ ලා ය  </p>
                        <p><input type="radio" name="question1">4.රථවාහන ගමනාගමනය ඇති දිශාවට මුහුණ ලා ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 78  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 78. ඔබට වම් පසින් වාහනය පසු කර යා හැක්කේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඔබ ඉදිරියෙන් ධාවනය වන වාහනය දකුණට හරවන බවට සංඥා  දක්වා ඇති අවස්ථාවකදීය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඔබ ඉදිරියෙන් ධාවනය වන වාහන ඉතා අඩු වේගයකින් ධාවනය කරන අවස්ථාවකදී ය  </p>
                        <p><input type="radio" name="question1">3.දකුණු පසින් ඉස්සර කිරීම ආරක්ෂාකාරී  නොවන බවට ඔබට හැඟී යන අවස්ථාවකදී ය  </p>
                        <p><input type="radio" name="question1">4.ඔබට ප්‍රතිවිරුද්ධ දිශාවෙන් ඉතා අධික වාහන තදබදයක් පවතින අවස්ථාවකදී ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 79  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 79. මත්පැන් හෝ මත්ද්‍රව්‍ය භාවිත කර ඇති විටෙක දී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අනතුරක් වලක්වා ගැනීමට ගත වන කාලය වැඩි වේ </p>
                        <p><input type="radio" name="question1" id="correct1">2.අනතුරක් වලක්වා ගැනීමට ගත වන කාලය අඩුයි   </p>
                        <p><input type="radio" name="question1">3.අනතුරක් වලක්වා ගැනීම කෙරෙහි බලපෑමක් නැත  </p>
                        <p><input type="radio" name="question1">4.අනතුරක් වලක්වා  ගැනීමට ඇති හැකියාව වැඩි කරයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 80  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 80.රථ වාහන නීති පිළිපදින විටදී ප්‍රමුඛත්වය දිය යුතු නිවැරදි ආකාරය වනුයේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පොලිස් සංඥා ,රථ වාහන ආලෝක සංඥා, මාර්ග සංඥා, මාර්ගය මත පිහිටුවන සලකුණු </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මාර්ගය මත පිහිටුවන සංඥා ,පොලිස් සංඥා, රථ වාහන ආලෝක සංඥාා, මාර්ග සංඥා  </p>
                        <p><input type="radio" name="question1">3.මාර්ග සංඥා, මාර්ගය මත පිහිටුවන ඉරි, පොලිස් සංඥා, රථ වාහන ආලෝක සංඥා  </p>
                        <p><input type="radio" name="question1">4. රථ වාහන ආලෝක සංඥා, මාර්ග සංඥා, මාර්ගය මත පිහිටුවන ඉරි ,පොලිස් සංඥා </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 81  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 81. නිවෙන දැල්වෙන  ප්‍රධාන ලාම්පු වලින් හැඳින්වෙන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අන් අය ඔබ ඒ වෙනුවෙන්  නතර වී සිටිය යුතු බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඔබ පැමිණෙන බවයි   </p>
                        <p><input type="radio" name="question1">3.ඔබ ට ප්‍රමුඛත්වය දිය යුතු බවයි  </p>
                        <p><input type="radio" name="question1">4.ඔබ සෙමෙන් ධාවනය වන වාහනයක් ඉස්සර කරන බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 82 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 82. ඔබ වෙනත් වාහනයකට ඉස්සර නො කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.උසාවියක් ඉදිරියේය </p>
                        <p><input type="radio" name="question1" id="correct1">2. මාර්ගයක් මත කඩ ඉරි සළකුණු කර ඇති තැන් වල දී ය   </p>
                        <p><input type="radio" name="question1">3.අවදානම් වංගුවක දී ය  </p>
                        <p><input type="radio" name="question1">4.ආරෝග්‍ය ශාලාවක් ඉදිරියේය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 83  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 83. අධිවේගී මාර්ගය පරිහරණය කිරීම  සඳහා තහනම් කර නොමැති වනුයේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ත්‍රීවිල් රථ සඳහා </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉඩම් වාහන සඳහා   </p>
                        <p><input type="radio" name="question1">3.මෝටර් සයිකල් සඳහා  </p>
                        <p><input type="radio" name="question1">4.ලොරි සඳහා</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 84  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 84. ඔබ වාහන පසුකර යෑමට අදහස් කරනුයේ නම් ගත යුතු පළමු වැනි ක්‍රියා මාර්ගය කුමක්ද</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහන නිවැරදි මන් තීරුවට ගැනීම </p>
                        <p><input type="radio" name="question1" id="correct1">2.සංඥා යෙදීම   </p>
                        <p><input type="radio" name="question1">3.නිරීක්ෂණය කිරීම  </p>
                        <p><input type="radio" name="question1">4.අවස්ථාවට ගැළපෙන පරිදි වේගය පාලනය කිරීම </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 85  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 85. වාහන නතර කිරීමේදී නැවැත්වීමේ දුර ලෙස හඳුන්වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.සිතීමේ දුර සහ තිරිංග යෙදීමෙ දුර යන දෙකින් අඩු දුරයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.සිතීමේ දුරෙහි සහ තිරිංග දුරෙහි  වෙනස   </p>
                        <p><input type="radio" name="question1">3.සිතීමේ දුර සහ තිරිංග යෙදීමෙ දුරෙහි එකතුවයි  </p>
                        <p><input type="radio" name="question1"> 4. සිතීමේ දුර හි සහ තිරිංග යෙදීමෙන් දුර යන දෙකෙන් වැඩි දුරයි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 86  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 86. වාහනය මහා මාර්ගයේ පදවාගෙන යන ඔබ මගින් මාරු වන  ස්ථානයක් ඉදිරියෙන් ඇති බවට මාර්ග සංඥා වත් දුටු විගසම</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මහා මාර්ගය මගේ තදබදයක් නොමැති නම් තමාට රිසි සේ ධාවනය කළ හැක </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉක්මනින් මගින් පැමිණීමට පෙර මගින් මාරු වන ස්ථානය පසුකර යන සඳහා වේගය වැඩි කළ යුතුය   </p>
                        <p><input type="radio" name="question1">3.වාහනයක් නතරකර  ගැනීමට බලාපොරොත්තුවෙන් වේගය පාලනය කර ධාවනය කළ යුතු ය  </p>
                        <p><input type="radio" name="question1">4.නෝනව ශබ්ද කර තමා එන බවට මගීන්ට දන්වා නොනවත්වා ම යා යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 87  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 87. ඉදිරියෙන් යන වාහනය ඉස්සර කිරීමට ඔබට අවශ්‍ය නම්</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරි වාහනය රියදුරු ඉස්සර  කිරීමට සංඥා කළ විට එය කිරීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරි මාර්ගය පැහැදිලිව පෙනෙන්නේ දැයි පරික්ෂා කළ යුතු ය   </p>
                        <p><input type="radio" name="question1">3.මහා මාර්ගය ඉඩ තිබෙන ස්ථානයක ද පරික්ෂා කළ යුතුය </p>
                        <p><input type="radio" name="question1">4.මහා මාර්ගය හොඳින් නිරීක්ෂණය කර ඉස්සර කිරීමට හැකි දැයි පරික්ෂා කර  තීරණය කළ යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 88  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 88. ඔබ ඉදිරියේ දී දකුණට හැරවිය යුතු නම් ගමන් කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තමා  කැමති මංතීරුවක් භාවිතා කළ හැක</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මාර්ගයේ වම්පස තීරුවේය </p>
                        <p><input type="radio" name="question1">3.දකුණු පැත්තට ගෙන යා යුතුයි  </p>
                        <p><input type="radio" name="question1">4.මාර්ගයේ මධ්‍ය රේඛාවට ආසන්නතම ධාවන තීරුවේ ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 89  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 89. ඔබ ඉදිරියේදී වම් පැත්තෙ නතර කළ යුතු බව දන්නේ නම් වාහනය ගමන් කරවිය යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගයේ වම් පස තීරුවේ ය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.මං තීරු භාවිතා කිරීමට අවශ්‍ය නැත  </p>
                        <p><input type="radio" name="question1">3.මාර්ගය මැද තීරුවේ ය  </p>
                        <p><input type="radio" name="question1">4.මාර්ගය දකුණු පැත්තේ ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 90  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 90.අතුරු මාර්ගයකින් ප්‍රධාන මාර්ගයට ඔබ  පිවිසෙන විට</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ප්‍රධාන පාරේ වාහන තදබදයක් නොමැතිනම් වමෙන් ඇතුළු විය හැක </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.දකුණු පැත්ත බලා වාහන නොමැති නම් මාර්ගයට ගැනීමට සුදුසු ය  </p>
                        <p><input type="radio" name="question1">3.වම් පැත්ත බල වාහන නොමැති නම් මාර්ගයට ගැනීමට සුදුසු ය  </p>
                        <p><input type="radio" name="question1">4.මාර්ගය දෙපසම සාර්ථක නිරීක්ෂණය කිරීමෙන් පසු මාර්ගයට ගැනීම සුදුසුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 91  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 91. ඔබට පසුපසින් පැමිණෙන වාහනය ඔබව ඉස්සර කිරීමට අවශ්‍ය බව හැඟී ගියහොත් ඔබ විසින් කළ යුතු වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පසුපසින් එන වාහන ගැන සැලකිලිමත් වීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහනයේ වේගය අඩු කර වම් පසින් ධාවනය කර ඉස්සර කිරීමට ඉඩ දීමයි   </p>
                        <p><input type="radio" name="question1">3.වම් පස සිග්නල්  ලාම්පු දල්වා ඔහුට යන ලෙස දැන් වීමයි  </p>
                        <p><input type="radio" name="question1">4.වාහනය තවත් පාර මැද්දට ගෙන ඔහුට ඉස්සර වීමට අවශ්‍ය ඉඩ නොදී ගමන් කිරීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 92 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 92.ඔබ වාහනය පදවාගෙන අවස්ථාවකදී ඔබගේ ජංගම දුරකතනය නාද වුවහොත්</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නාගරික ප්‍රදේශවල දී පමණක් දුරකථනය ගැන ප්‍රතිචාර දැක්විය නොහැක </p>
                        <p><input type="radio" name="question1" id="correct1">2.එක් අතකින් සුක්කානම  හසුරුවා ගෙන අනිත් අතින් දුරකථන ගෙන ප්‍රතිචාර දැක්විය යුතුය   </p>
                        <p><input type="radio" name="question1">3.දුරකථනයට ප්‍රතිචාර දැක්වීමට අවශ්‍ය නම් වාහනය අයින් කරනවා තබා දුරකතයට ප්‍රතිචාර දැක්විය යුතුය  </p>
                        <p><input type="radio" name="question1">4.ජංගම දුරකථන රැගෙන යාම නොකළ යුතු ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 93  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 93. ඔබ වාහනය පදවන්න අවස්ථාවකදී මාර්ගයේ ඉදිරියේ බාධකයක් නිසා වාහන පේළියක් එක් වාහනයක් පසුපස එක් එක් වාහන නතර කර තිබෙන විට ඔබ කළ යුතු වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.විරුද්ධ දිශාවෙන් වාහන නොමැති නම් දකුණු මාර්ගයේ පැත්තෙන් ගමන් කළ හැක </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.සියලුම වාහන ඉස්සර කරගෙන ගොස් බාධකයේ ඇති තැනට පිවිසීම  </p>
                        <p><input type="radio" name="question1">3.මාර්ගයේ නතර වී ඇති අවසාන වාහනයට පසුපසින් නතර කර සිටීම </p>
                        <p><input type="radio" name="question1">4. නලාව ශබ්ද කර තමාට ඉක්මනින් යා යුතු බව දැන් වීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 94  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 94.ඔබ වාහනය පදවාගෙන අවස්ථාවක ඉදිරියේ මාර්ගය අයිනේ බස් රථයක් නතර කර මගින් බසිමින් සිටී නම් ඔබ කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නතර කරපු වාහන ගෙන සැලකිලිමත් වීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2.මගින් පාර මාරු වීමට ප්‍රථම හැකි ඉක්මනින් බස් රථයේ ඉස්සර කර යාමයි   </p>
                        <p><input type="radio" name="question1">3.බස් රථයට පසුපසින් ඔබ ද  නතර කර සිටීම  </p>
                        <p><input type="radio" name="question1">4.මගීන් මාරු වේ යයි   බලාපොරොත්තුවෙන් නතර කර ගැනීමට හැකිවන සේ වේගය අඩු කර ධාවනය කිරීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 95  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 95. ඔබ වාහනය පදවාගෙන අවස්ථාවකදී ඉදිරියේ රථ වාහන ආලෝක සංඥා සහිත මන්සන්ධියක්  ඇති බව දැන ගත් විට</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වේගය වැඩි කර හැකි ඉක්මනින් මංසන්දිය පසු කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.සෑම අවස්ථාවකදීම සංඥා ලාම්පු වලට අවනත ව  ධාවනය කළ යුතුය   </p>
                        <p><input type="radio" name="question1">3.පෙනීම සීමා සහිත බැවින් වඩාත් සුපරීක්ෂාකාරීව ධාවනය කළ යුතුය  </p>
                        <p><input type="radio" name="question1">4.ප්‍රධාන පහන් හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 96  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 96. රාත්‍රී  කාලයේදී වාහනයක් ධාවනය කිරීමේදී</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1"> 1.වාහනයේ නලාව  හැකි පමණ පාවිච්චි කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහන තදබදය අඩු නිසා වේගයෙන් ධාවනය කළ හැකි ය   </p>
                        <p><input type="radio" name="question1">3.පෙනීම සීමාසහිත බැවින්  වඩාත් සුපරීක්ෂාකාරීව ධාවනය කළ යුතුය </p>
                        <p><input type="radio" name="question1"> 4.ප්‍රධාන පහන් හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 97  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 97. සංඥා එළි සහිත මං සන්ධියක දී පොලිස් නිලධාරීන්  වාහන පාලනය කරයි නම් ඔබ ක්‍රියාකළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දකුණට හැරවීමේදී පමණක් පොලිස් නිලධාරියා ගේ අණට අවනත විය යුතු ය </p>
                        <p><input type="radio" name="question1" id="correct1">2.පොලිස් නිලධාරි මහතාගේ අණ අනුව ය   </p>
                        <p><input type="radio" name="question1">3.සංඥා එළියෙන් දැක්වෙන අණ පරිදි ය  </p>
                        <p><input type="radio" name="question1"> 4.ඔබට රිසි පරිදි ය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 98  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 98. ඔබ පදවන වාහනය අතරමගදී ආපදාවට ලක් වුවහොත්  ඔබ කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.හැකි උපරිම මට්ටමින් මාර්ගය අවහිර නො වන  පරිදි වාහන නතර කිරීමය </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහනයේ පහන් දල්වා නතර කළ හැක   </p>
                        <p><input type="radio" name="question1">3.ආපදාවට ලක් වූ තැනම නතර කිරීමයි  </p>
                        <p><input type="radio" name="question1">4. හැකිතාක් දුරට වාහනය ධාවනය කර යෑමය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 99  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 99. වැසි සහිත කාලගුණයක් ඇති අවස්ථාවක වාහනය පදවන විට දී සෑම විටම කළ යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය ටයර හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2. අඩු ගියරය ක හෙමින් පැද වීම ය   </p>
                        <p><input type="radio" name="question1">3.වැඩි ගියරයේ ක වේගයෙන් පැදවීම ය  </p>
                        <p><input type="radio" name="question1">4.වැඩි ගියරක  හෙමින් පැදවීම ය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 100  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 100. බෑවුම් සහිත මාර්ගයක වාහනය ධාවනය කිරීමේ දී</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.හැකි තරම් වේ</p>
                        <p><input type="radio" name="question1" id="correct1">2. අඩු ගි  </p>
                        <p><input type="radio" name="question1">3.වැඩි ග </p>
                        <p><input type="radio" name="question1">4. ගියර නොමැතිව(නිව්ටල්) තත්ත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>


    <!-- question 101  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 101.තැනිතලා බිමක වාහන නවතා තැබීමේ දී ඔබ කළ යුතු වැදගත් කාරණයක් වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දොර  අගුළු  හොඳින් වසා තැබීමයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.නවතා තැබීමේ තිරිංග නිසි පරිදි යෙදීමයි  </p>
                        <p><input type="radio" name="question1">3.දිවා කාලයේදී වුවද නැවතුම් පහන් දල්වා තැබීමයි  </p>
                        <p><input type="radio" name="question1">4.ඉදිරි රෝද දකුණට හරවා නවතා තැබීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 102 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 102.අවදානම් හැඟවීමේ පහන් දැල්විය යුතු වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයක රෝගී පුද්ගලයන් ගෙන යන අවස්ථාවකදී </p>
                        <p><input type="radio" name="question1" id="correct1">2.හතර මං සන්ධියක දී ඉදිරියට ගමන් කරන විටය   </p>
                        <p><input type="radio" name="question1">3.අවදානම් ස්ථානයකදී වාහනයකට ඉස්සර කරන විටය  </p>
                        <p><input type="radio" name="question1">4.මහා මාර්ගයේ ආපදාවකට ලක්වූ වාහනයක් නවතා තබන විටදීය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 103  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 103.මෝටර් වාහනයකට ඉන්ධන පිරවීමේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉන්ධන ලබා ගැනීමේදී එන්ජිම ගැනසැලකිලිමත් වීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහනයේ එන්ජිම පණ ගන්වා තිබියදී  ඉන්ධන පිරවිය යුතුය  </p>
                        <p><input type="radio" name="question1">3.ඉන්ධන පුරවන අවස්ථාවේදී එන්ජිම නවතා තැබිය යුතුය  </p>
                        <p><input type="radio" name="question1">4.එන්ජිමේ තෙල් නියමිත ප්‍රමාණයට ඇත්දැයි අනිවාර්යෙන් පරීක්ෂාකල යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 104  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 104.නව අංක තහඩු ක්‍රමය යටතේ ලබා දෙනු ලබන වාහන අනන්‍යතා පත්‍රය </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අනන්‍යතා පත්‍රය  පිළිබඳ සැලකිලිමත් වීම අවශ්‍යම නැත</p>
                        <p><input type="radio" name="question1" id="correct1">2.සෑම විටම වාහනය තුළ තබාගත යුතුය   </p>
                        <p><input type="radio" name="question1"> 3.නිවසේ ආරක්ෂිත ස්ථානයක සුරක්ෂිතව තැබිය යුතුය </p>
                        <p><input type="radio" name="question1">4.වාහනය අයිතිකරු ලඟ තබාගත යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 105  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question105.ඔබ රාත්‍රී කාලයේ දී වාහනයක් පදවාගෙන යන විට වෙනත් වාහනයක් ඉදිරියෙන් පැමිණෙන අවස්ථාවකදී ඔබ විසින් කළ යුතු වන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරි වාහනයේ පහන් අවපාත කළහොත් පමණක් පහන් අවපාත කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.වාහනයේ ප්‍රධාන පහන් අවපාත කිරීමය   </p>
                        <p><input type="radio" name="question1">3.වාහනයේ ප්‍රධාන පහන් නිවා දැමීමය </p>
                        <p><input type="radio" name="question1"> 4.වාහනයේ නලාව ක්‍රියා කරවීමය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 106  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 106.වාහනයක් ඉස්සර කිරීමේදී අනුගමනය කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1. 3,4 වැනි වැඩි  ජියරයක් තෝරාගැනීම මඟින් වැඩි බලයක් ලබා දීම </p>
                        <p><input type="radio" name="question1" id="correct1">2. 3,4 වැනි වැඩි ජියරයක්   තෝරා ගැනීම මගින් වැඩි වේගයක් ලබා දීම    </p>
                        <p><input type="radio" name="question1">3. 1,2 වැනි අඩු ජියරයක් තෝරා ගැනීම මගින් වැඩි බලයක් ලබා දීම  </p>
                        <p><input type="radio" name="question1"> 4. 1,2 වැනි අඩු ජියරයක් තෝරා ගැනීම මගින් අඩු බලයක් ලබා දීම</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 107  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 107.ධාවන තීරු 3 කින් යුතු මාර්ගයක තුන්වන තීරුව භාවිතා කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දකුණට හැරවීමට </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.අධික වේගයෙන් ධාවනය කිරීම සඳහා ය  </p>
                        <p><input type="radio" name="question1">3.වෙනත් වාහනයක් පසුකර යෑමට  </p>
                        <p><input type="radio" name="question1"> 4.වෙනත් වාහනයක් පසුකර යෑමට හෝ දකුණට හැරවීමට හෝ අනතුරක්  වලක්වා ගැනීමටය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 108  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 108.මහා මාර්ගෝපදේශ  සංග්‍රහයේ අනතුරු හැඟවීමේ සංඥා වල  වර්ණය වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රතු ,සුදු  හා කළු පැහැය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.රතු, සුදු හා නිල් පැහැය </p>
                        <p><input type="radio" name="question1"> 3. සුදු පසුතලයේ රතු පැහැය </p>
                        <p><input type="radio" name="question1">4.කහ පසුතලයේ කළු පැහැය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 109  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 109.ප්‍රධාන මාර්ගයට ඇතුළු වීමේදී ඔබ ඉඩ දිය යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වමෙන් එන වාහන වලටය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.දකුණෙන් එන වාහන වලටය  </p>
                        <p><input type="radio" name="question1">3.දකුණෙන් සහ වමෙන් එන වාහන වලටය  </p>
                        <p><input type="radio" name="question1">4.ඉදිරියෙන් එන වාහන වලටය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 110  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 110.රාත්‍රී කාලයේ දී ධාවනයේදී ඉදිරියෙන් එන වාහනයේ ප්‍රධාන පහන් ආලෝකය අඩු(අවපාත ) නොකළ විට ඔබ කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ පහන් නිවා දැමීමයි</p>
                        <p><input type="radio" name="question1" id="correct1">2. වහාම ප්‍රධාන පහන් ආලෝකය වැඩි කර ගැනීමයි  </p>
                        <p><input type="radio" name="question1">3.වාහනයේ  වේගය අඩුකර ගැනීමයි  </p>
                        <p><input type="radio" name="question1">4.වාහනයේ වේගය අඩු කර ගැනීම හෝ නවත්වා ගැනීමට ක්‍රියා කිරීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 111  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 111.සුදු පාට තනි ආයත රේඛාවක් මාර්ගයෙන් මැද සලකුණු කර ඇති විට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉර කපා දකුණට හැරවිය හැක,ඉස්සර කිරීම කල නොහැක </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඉර කපා දකුණට හැරවිය යුතුය  </p>
                        <p><input type="radio" name="question1">3.ඉර  කපා දකුණට හැරවීම හා ඉස්සර කිරීම කළ හැක </p>
                        <p><input type="radio" name="question1">4.ඉර කපා ඉස්සර කිරීම කළ හැක ,දකුණට හැරවිය නොහැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 112 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 112.වාහනයක් පිටුපසට පැදවීමේදී අනුගමනය කලයුතු ක්‍රියා මාර්ගය පිලිවෙලින් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වැඩි ජියරයක්  තෝරා ගැනීම මගින් වැඩි බලයක් ලබා දීම</p>
                        <p><input type="radio" name="question1" id="correct1">2. තමාට රිසි සේ වාහනය පිටුපසට  පැද විය හැක  </p>
                        <p><input type="radio" name="question1">3.වාහනය පාර අයිනට සමාන්තරව නවත්වා අතුරු මාර්ගයේ අවම දුරින් පිටුපසට පැදවීමයි  </p>
                        <p><input type="radio" name="question1">4.වාහනය පාර අයිනට සමාන්තරව නොවන සේ නවත්වා අතුරු මාර්ගයේ අවම දුරින් පිටුපසට පැදවීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 113  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 113.ඉස්සර කිරීම නොකළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පාසලක් ඉදිරියෙන් ඇති අවස්ථාවකය </p>
                        <p><input type="radio" name="question1" id="correct1">2.රෝහලක් ඉදිරියෙන් ඇති අවස්ථාවකය   </p>
                        <p><input type="radio" name="question1"> 3.පාර මැද ඇති සුදු පාට සුදු පාට කඩ ඉර ඇති අවස්ථාවකය </p>
                        <p><input type="radio" name="question1">4.කන්දක් මුදුනින් ඇති අවස්ථාවකය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 114  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 114.පදික මාරුව හඟවන සංඥාව පුවරුව දුටු විට කල යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ග තදබද ඇතිවිට පමණක් සැලකිලිමත් විය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.පදිකයෙකු සිටීදැයි පරීක්ෂා කිරීමයි  </p>
                        <p><input type="radio" name="question1">3. කහ ඉරට මෙපිටින් වාහනය නවත්වා ගැනීමයි </p>
                        <p><input type="radio" name="question1">4.වාහනයේ වේගය අඩුකර ගැනීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 115  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 115.යාමට සුදානම් වීම සඳහා ආලෝක සංඥා වල </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රතුපාට පහන් දැ ල්වේ </p>
                        <p><input type="radio" name="question1" id="correct1">2.කොළපාට පහන් දැල්වේ  </p>
                        <p><input type="radio" name="question1">3. කහපාට පහන් දැල්වේ </p>
                        <p><input type="radio" name="question1">4.කහ පාට සමග රතුපාට පහන් දැල්වේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 116  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 116.වට වංගුවක් කරා එන විට ඉදිරියෙන් කහපැහැ පහන දැල්වූ හොත් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ආලෝක සංඥා මඟින් පාලනය නොකරයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.දකුණින් එන අයට ඉඩ දිය යුතුය   </p>
                        <p><input type="radio" name="question1">3.වමෙන් එන අයට ඉඩ දිය යුතුය  </p>
                        <p><input type="radio" name="question1">4.ආලෝක සංඥා විධානයට අවනත විය යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 117  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 117.වට වංගුවක් කරා එන විට ඉදිරියෙන් කහ පැහැ ආලෝක සංඥාව නිවෙමින් ,දැල්වෙමින් පැවතුණහොත් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වට වංගුව කෙරෙහි ඔබගේ වැඩි අවධානය ලබාදීම සඳහා යොදා ඇත </p>
                        <p><input type="radio" name="question1" id="correct1">2.කෙලින්ම ඉදිරියට යා යුතුය   </p>
                        <p><input type="radio" name="question1">3.වට වංගුවේ නීතිය අනුගමනය කළ යුතුය  </p>
                        <p><input type="radio" name="question1">4.වට වංගුවේ නීතිය එවිට ක්‍රියාත්මක වන්නේ නැත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 118  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 118.වාහන වල අඳුරු පැහැ ගන්වනු ලබන වීදුරු සඳහා දැනට ඇති රෙගුලාසි වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාමුවා හැර අනෙකුත් සියලුම වීදුරු අඳුරු කළ හැක </p>
                        <p><input type="radio" name="question1" id="correct1">2.සියලුම වීදුරු අඳුරු කළ නොහැක   </p>
                        <p><input type="radio" name="question1">3.ඉදිරි දොර දෙකෙහි වීදුරු හා ඉදිරි වාමුවාවේ උසින් පහෙන් හතර පංගුවක් යට කොටසින් අඳුරු කළ නොහැක  </p>
                        <p><input type="radio" name="question1">4.සියලුම වීදුරු අඳුරු කළ හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 119  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 119.රථ වාහන ආලෝක  සංඥා වල කොළ බල්බය  දැල්වේ නම් ඊළඟ අවස්ථාව වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.කොළ නිවී රතු හා කහ එකවර දැල්වීමයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.කොළ තිබියදී කහ පැහැය දැල්වීමයි  </p>
                        <p><input type="radio" name="question1"> 3.කොළ නිවී ගොස් රතු පැහැය දැල්වීමයි </p>
                        <p><input type="radio" name="question1"> 4.කොළ නිවී ගොස් කහ පැහැය දැල්වීමයි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 120  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 120.රථ වාහන ආලෝක සංඥා වල රතු බල්බය දැල්වේ නම් ඊළඟ අවස්ථාව වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රතු නිවී  කොළ හා කහ එකවර දැල්වීමයි </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.රතු නිවී ගොස් කහ බල්බය දැල්වීමයි  </p>
                        <p><input type="radio" name="question1">3.රතු එසේම තිබියදී කහ බල්බය දැල්වීමයි  </p>
                        <p><input type="radio" name="question1">4.රතු නිවී ගොස් කොළ දැල්වීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 121  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 121.රිය අනතුරකින් පොලිස් ස්ථානයට වාර්තා කිරීම සඳහා දී ඇති සහන කාල සීමාවේ උපරිමය </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පැය 36 </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.පැය 12 </p>
                        <p><input type="radio" name="question1"> 3.පැය 24</p>
                        <p><input type="radio" name="question1">4.පැය 48 </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 122 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 122.වාහනයක් මාර්ගයේ අනතුරකට පත් වූ විටක </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.කිසිම හේතුවක් නිසාවත් වාහන ඉවත් කළ නොහැක </p>
                        <p><input type="radio" name="question1" id="correct1">2.එම වාහනය එම ස්ථානයේම තැබිය යුතුය  </p>
                        <p><input type="radio" name="question1">3.අන් වාහන වලට අවහිර වීම වලකා මාර්ගයෙන් අයින් කිරීම සඳහා අවසර ඇත  </p>
                        <p><input type="radio" name="question1">4.එම වාහනයේ පිහිටීම සලකුණු කොට රෝගීන් ප්‍රවාහනය කිරීම සඳහා අවසර ඇත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 123  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 123.වාහනයක් ධාවනයේදී මීටර් පුවරුවේ රතු බල්බයක් දැල් වේ නම් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ආසන්නයේ ඇති ගරාජයට ධාවනය කළ යුතුය</p>
                        <p><input type="radio" name="question1" id="correct1">2. වාහනය ගමනාන්තය දක්වා ප්‍රවේශමෙන් ධාවනය කිරීම සුදුසුය   </p>
                        <p><input type="radio" name="question1">3.විශේෂ අවධානයක් යොමු කිරීම අවශ්‍ය නොවේ  </p>
                        <p><input type="radio" name="question1">4.වාහනය වහාම නතර කර දෝෂය කුමක්දැයි තහවුරු කරගත යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 124  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 124.මහා මාර්ගයේ ධාවනය කිරීමට සුදුසු වාහනයක් යනු </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.එහි සියලුම අංග මනා කාර්මික තත්වයෙන් යුතු බව,රක්ෂණ සහතිකය ආදායම් බලපත්‍රය සමග අවශ්‍ය ලේඛන තිබිය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වලංගු ආදායම් බලපත්‍රය හා රක්ෂණ සහතිකය පමණක් තිබිය යුතුය  </p>
                        <p><input type="radio" name="question1">3.සුක්කානම ,තිරිංග හා ටයර් පමණක් මනා තත්ත්වයෙන් තිබිය යුතුය  </p>
                        <p><input type="radio" name="question1">4.රියදුරාට පාලනය කරගත හැකි නම් කුමන වාහනයක් වුවද ධාවනය කල හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 125  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 125.ආලෝක සංඥා මගින් පාලනය වන මංසන්ධි කොටුව සලකුණු කර ඇත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මංසන්ධියක් නිතරම වාහන තදබද ඇති බව දැන්වීමට </p>
                        <p><input type="radio" name="question1" id="correct1">2.මංසන්ධියෙන් දකුණට හැරවීම හැර ඕනෑම අවස්ථාවක ඇතුළුවීමට   </p>
                        <p><input type="radio" name="question1">3.මංසන්ධිය කෙරෙහි අවධානය වැඩි කිරීමට  </p>
                        <p><input type="radio" name="question1">4.කොළ පැහැති ආලෝකය දැල්වුවත් මංසන්ධි කොටුවෙන් පිට වීමට නොහැකි නම් දකුණට හරවන වාහන හැර අනෙක් කිසිදු වාහනයක් ඇතුළු නොකිරීමට </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 126  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 126.ස්වයංක්‍රීය ජියර් නොවන වාහනයක් තැනිතලා බිමක ගමන් ආරම්භක ක්‍රියාවලියේ අවසාන මොහොතේ දී දෙපා තිබිය යුතු අයුරු</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.දකුණු පාදය තිරිංග පැඩලයේව්හා වම් පාදය බිම් තහඩුවේ </p>
                        <p><input type="radio" name="question1" id="correct1">2. දකුණු පාදය බිම් තහඩුවේ හා වම් පාදය ක්ලච් පැඩලයේ  </p>
                        <p><input type="radio" name="question1">3.දකුණු පාදය ඇක්සලේටරයේ සහ වම් පාදය ක්ලච් පැඩලයේ </p>
                        <p><input type="radio" name="question1">4.දකුණු පාදය තිරිංග පෙඩලයේ සහ වම් පාදය ක්ලව් පැඩලයේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 127  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 127.පහලට බෑවුමක දී  පිටුපසට පදවන ස්වයංක්‍රිය ජියර් නොවන වහනයකදී දෙපා තිබිය යුතු අයුරු </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම් පාදය ක්ලච්  පැඩලයේ  සහ දකුණු පාදය තිරිංග පැඩලයේ </p>
                        <p><input type="radio" name="question1" id="correct1">2.දකුණු පාදය බිම් තහඩුවේ සහ වම්  පාදය ක්ලච් පැඩලයේ   </p>
                        <p><input type="radio" name="question1">3.දකුණු පාදය තිරිංග පැඩලයේ සහ වම් පාදය බිම් තහඩුවේ  </p>
                        <p><input type="radio" name="question1">4.වම්  පාදය ක්ලව් පැඩලයේ  යාන්තමට සහ දකුණු පාදය ඇක්සලේටරයේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 128  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 128.ස්වයංක්‍රීක ජියර්  නොවන වාහනයක් සාමාන්‍යය තැනිතලා නිදහස් මාර්ගයේ ධාවනයේ දී දෙපා තිබිය යුතු අයුරු </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම් පාදය ක්ලච්  පැඩලයේ  හා දකුණු පාදය තිරිංග පැඩලයේ </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වම් පාදය බිම් තහඩුවේ සහ දකුණු පාදය  ඇක්සලේටරයේ </p>
                        <p><input type="radio" name="question1">3.වම් පාදය ක්ලච්  පැඩලයේ  යාන්තමට සහ දකුණු පාදය ඇක්සලේටරයේ </p>
                        <p><input type="radio" name="question1">4.වම් පාදය තිරිංග පැඩලයේ යාන්තමට සහ දකුණු පාදය  ඇක්සලේටරයේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 129  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 129.ස්වයංක්‍රීයක ජියර්  නොවන වාහනයක් මාර්ග තදබදය ඇති අවස්ථාවක ධාවනයේදී දෙපා තිබිය යුතු අයුරු </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම්  පාදය බිම් තහඩුවේ සහ දකුණු පාදයේ තිරිංග පැඩලයේ </p>
                        <p><input type="radio" name="question1" id="correct1">2.වම් පාදය ක්ලච් පැඩලයේ  සහ දකුණු පාදය තිරිංග පැඩලයේ  යාන්තමට   </p>
                        <p><input type="radio" name="question1">3.වම් පාදය බිම් තහඩුවේ සහ දකුණු පාදය ඇක්සලේටරයේ </p>
                        <p><input type="radio" name="question1">4.වම් පාදය ක්ලච්  පැඩලයේ  යාන්තමට සහ දකුණු පාදය ඇක්සලේටරයේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 130  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 130.වාහනයක් පසු ගල යෑමේ දී නිවැරදි ක්‍රමය වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ වේගය අනුව ක්‍රියාවලිය වෙනස් වේ</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.සංඥා යොදා මාර්ගය හොඳින් නිරීක්ෂණය කර වාහනය නිවැරදිව පාලනය කිරීමය  </p>
                        <p><input type="radio" name="question1">3.වාහනයේ වේගය වැඩිකර සංඥා යොදා මාර්ගය හොඳින් නිරීක්ෂණය කර වාහනය නිවැරදිව පාලනය කිරීමය  </p>
                        <p><input type="radio" name="question1">4.මාර්ගය හොඳින් නිරීක්ෂණය කර සංඥා යොදා වාහනය නිවැරදිව පාලනය කිරීමය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 131  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 131.වෙනත් වාහනයකට ඉස්සර කිරීමේ කිරීමේදී මුලින්ම කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය නිවැරදිව මාර්ග තීරුවට ගැනීමය </p>
                        <p><input type="radio" name="question1" id="correct1">2. තමාගේ වේගය නිසි ප්‍රමාණයට සකසා ගැනීමය   </p>
                        <p><input type="radio" name="question1">3.සංඥා දැමීමය </p>
                        <p><input type="radio" name="question1">4.කණ්නාඩියෙන් පිටුපස බැලීමය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 132 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 132.වෙනත් වාහනයකට ඉස්සර කිරීමට සූදානම් වන විට තවත් අයෙක් ඔබට ඉස්සර කිරීමට එන බව හැඟුන හොත් මුලින්ම කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පිටුපසින් එන වාහන ගැන සැලකිලිමත් වීම අවශ්‍ය නැත</p>
                        <p><input type="radio" name="question1" id="correct1">2.වහාම ඉතා පැහැදිලි ලෙස ඔබ ඉස්සර කිරීමට සූදානම් බව හඟවන සංඥා දැමීමයි   </p>
                        <p><input type="radio" name="question1">3.වහාම ඉතා පැහැදිලි ලෙස වේගය අඩුකරන සංඥාව දැමීමයි  </p>
                        <p><input type="radio" name="question1">4.වහාම ඉතා පැහැදිලි ලෙස තමන් වම් අයිනට ඒමට සූදානම් බවක් බව හඟවන සංඥාව දැමීමයි  </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 133  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 133.පදිකවේදිකාව අයිනේ දික් අතට මාර්ගයේ කහ ඉරක් ඇඳ තිබුණහොත් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මහා මාර්ගයේ අයින පෙන්නුම් කරන ආසන්න රේඛාවය </p>
                        <p><input type="radio" name="question1" id="correct1">  2.එම ස්ථානයේ වාහන නවතා තැබිය හැක </p>
                        <p><input type="radio" name="question1">3.එම ස්ථානයේ  වාහන නවතා තැබිය නොහැක  </p>
                        <p><input type="radio" name="question1"> 4.වම්පස රෝද දෙක පදිකවේදිකාව මත සිටින සේ නවතා තැබිය හැක</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 134  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 134.පදිකවේදිකාව අයිනේ දිග අතට සුදු ඉරක් ඇඳ තිබුණහොත් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මහා මාර්ගයේ අයින පෙන්නුම් කරන ආසන්න රේඛාවය </p>
                        <p><input type="radio" name="question1" id="correct1">2.එම ස්ථානයේ වාහන නවතා තැබිය හැක   </p>
                        <p><input type="radio" name="question1">3.එම ස්ථානයේ වාහන නවතා තැබිය නොහැක </p> 
                        <p><input type="radio" name="question1">4.වම්පස රෝද දෙක පදිකවේදිකාව මත සිටින සේ නවතා තැබිය හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 135  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 135.නාගරික සීමාව තුලදී අනුමත උපරිම වේග සීමාවන් </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.සියලුම වාහන පැ.කි.මී.50</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.යතුරු පැදි ,මෝ/ කාර්,ද්වීකාර්ය  ,වෙළඳ වාහන ,ත්‍රිරෝද රථය පිළිවෙලින් පැ. සැ. 50 ,පැ. සැ .50, පැ. සැ. 40  </p>
                        <p><input type="radio" name="question1">3.යතුරු පැදි ,මෝ/ කාර් ද්විකාර්ය පැ. කි. 70 වෙළඳ වාහන පැ. කි. 60, ත්‍රීරෝද රථ පැ. කි.40 </p>
                        <p><input type="radio" name="question1"> 4.යතුරු පැදි මෝ/කාර් ,ද්විකාර්ය පැ. කි.50, වෙළඳ වාහන පැ. කි.50 ,ත්‍රීරෝද රථ පැ. කි. 40</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 136  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 136.පදික මාරුවක් ඇතිවිට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.පදික  මාරුව හරහා පමණක් පදිකයන්ට මාරු විය හැක</p>
                        <p><input type="radio" name="question1" id="correct1">2.මීටර් 25 ක් ඇතුළත ඕනෑම ස්ථානයකින් පදිකයන්ට මාරු විය හැක   </p>
                        <p><input type="radio" name="question1">3.මීටර් 50 ක් ඇතුළත ඕනෑම ස්ථානයකින් පදිකයන්ට මාරු විය නොහැක  </p>
                        <p><input type="radio" name="question1">4.මීටර් 50ක් ඇතුලත   ඕනෑම ස්ථානයකින් පදිකයන්ට මාරු විය හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 137  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 137.රථ වාහන ආලෝක සංඥා වල කහ එළිය පමණක් දැල්වේ නම්</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රතු එළිය වැටීමට ප්‍රථම වේගයෙන් ධාවනය කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඊළඟට කොළපාට එළිය දැල්වෙන බැවින්  යෑමට සූදානම් විය යුතුය  </p>
                        <p><input type="radio" name="question1"> 3.ඊළඟට රතු එළිය දැල්වෙන බැවින් නැවැත්විය යුතුය </p>
                        <p><input type="radio" name="question1">4.ඊළඟට කොළපාට එළිය දැල්වෙන බැවින් ඉදිරියට ගමන් කළ යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 138  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 138. ඔබ ගමන් කරන මාර්ගයේ ඉදිරිය නොපෙනෙන වංගුවක් ඇති විට ඔබ කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය හැමවිටම මාර්ගය මැදින් ගමන් කිරීමය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.පැමිණි වේගයෙන්ම නලාව ශබ්ද කරගෙන යාමය  </p>
                        <p><input type="radio" name="question1">3.නතර කිරීමට බලාපොරොත්තුවෙන් වේගය අඩුකර වරක් නලාව ශබ්ද කරගෙන යාමය  </p>
                        <p><input type="radio" name="question1">4.වාහනයේ නලාව ශබ්ද නොකර වේගයෙන් යාමය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 139  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 139.රූප සටහනට අනුව වාහනයක් හන්දියකදී හැරවීමේදී " අ" ස්ථානයේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහන නැවැත්විය යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">2.සංඥාව දැක්විය යුතුය  </p>
                        <p><input type="radio" name="question1"> 3.කණ්ණාඩිය බැලිය යුතුය </p>
                        <p><input type="radio" name="question1">4.වේගය අඩු කළ යුතුය  </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 140  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 140.රූප සටහනට අනුව වාහනයක් හන්දියකදී  හැරවීමේදී "ආ" ස්ථානයේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නලාව ශබ්ද කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1">  2.කණ්නාඩිය බැලිය යුතුය </p>
                        <p><input type="radio" name="question1">3.සංඥාව දැක්විය යුතුය </p>
                        <p><input type="radio" name="question1"> 4. වේගය  වැඩි කළ යුතුය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 141  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 41.රූප සටහනට අනුව වාහනයක් හන්දියකදී හැරවීමේදී "ඇ"ස්ථානයේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නලාව ශබ්ද කළ යුතුය</p>
                        <p><input type="radio" name="question1" id="correct1">2. කන්ණාඩිය බැලිය යුතුය   </p>
                        <p><input type="radio" name="question1">3.සංඥාව දැක්විය යුතුය  </p>
                        <p><input type="radio" name="question1">4.රථය නියමිත ධාවන තීරුවට හැරවිය යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 142 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 142.රූප සටහන අනුව"A" දැක්වෙන කඩ ඉරෙන් අදහස් කෙරෙන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරියෙන් මංසන්ධියක් ඇති බව දැන්වීමයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.පාර හරහා ගමන් කිරීම තහනම් කළ ආයත රේඛාවයි   </p>
                        <p><input type="radio" name="question1">3.පාරේ මැද සලකුණු කර ඇති මධ්‍යම රේඛාවයි </p>
                        <p><input type="radio" name="question1">4. ධාවන තීරුව සලකුණු කර ඇති රේඛාවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 143  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 143.රූප සටහන අනුව "B"දැක්වෙන කඩ ඉරෙන් අදහස් කෙරෙන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.මාර්ගය බෙදා ඇති රේඛාවයි  </p>
                        <p><input type="radio" name="question1" id="correct1">2."නවතිනු"සංඥාවෙහි  පිහිටුවන නැවතුම් රේඛාවයි   </p>
                        <p><input type="radio" name="question1">3.මාර්ගය ඉඩදෙනු රේඛාවයි </p>
                        <p><input type="radio" name="question1">4. පදිකයන්ට  මාරුවීම සඳහා ඉඩ දෙන රේඛාවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 144  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 144. පාරේ මැද තනි සුදු ඉරක් ඇතිවිට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වංගුවක අවදානම පෙන්වීම සඳහා යොදා ඇත</p>
                        <p><input type="radio" name="question1" id="correct1">2.සුදු ඉර කැපෙන සේ ඉස්සර කිරීම තහනම් ය   </p>
                        <p><input type="radio" name="question1">3.දකුණට හැරවීම තහනම්ය  </p>
                        <p><input type="radio" name="question1">4.මාර්ගය බෙදීමට ඉර යොදා ඇත </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 145  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 145.පාරේ මැද එක ලඟින් වූ සුදු ඉරි  දෙකක් ඇති විට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉරි කැපෙන සේ ඉස්සර කිරීම හෝ දකුණට හැරවීම තහනම්ය </p>
                        <p><input type="radio" name="question1" id="correct1">2.දකුණට හැරවීමට හැකි ය  </p>
                        <p><input type="radio" name="question1">3.ඉස්සර කිරීමට පුළුවන  </p>
                        <p><input type="radio" name="question1">4.දකුණට හැරවීමට හා ඉස්සර කිරීම කළ හැක </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 146  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 146.මෝටර් වාහනය ක ඉදිරිපස බෆරය මත ලෝහමය ආරක්ෂක වැටක් සවි කිරීම </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරිපස බෆරය ගැලවී යාමට ඉඩ ඇත </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.නීත්‍යානුකූල නොවේ  </p>
                        <p><input type="radio" name="question1"> 3.හදිසි අනතුරකදී අනෙක් පාර්ශවයට සිදුවන හානිය වැඩිවේ </p>
                        <p><input type="radio" name="question1">4.රියදුරුගේ දර්ශනයට බාධා ඇතිවේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 147  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 147.රියදුරු විසින් වාහනයක් පදවන සෑම සෑමවිටම තම රියදුරු බලපත්‍රය තමා සන්තකයේ තබා ගැනීම </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.නීතිමය අවශ්‍යතාවයක් නොවේ </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.නීතිමය අවශ්‍යතාවයකි  </p>
                        <p><input type="radio" name="question1">3.ඡායා පිටපතක් තබා තබා ගැනීම ප්‍රමාණවත් වේ  </p>
                        <p><input type="radio" name="question1">4.අවශ්‍ය විටෙක ඉදිරිපත් කිරීමට හැකි වන පරිදි නිවසේ තබා ගැනීම වඩා ආරක්ෂාකාරී වේ </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 148  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 148.තම වාහනයට ඉදිරියෙන් ගමන් කරන වාහනයකට වම්පසින් පසුකර යා හැකි වන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වම්පසින් ඉස්සර කිරීම සම්පූර්ණයෙන්ම තහනම්ය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ඉදිරියෙන් ගමන් කරන වාහනය දකුණට හරවන බවට සංඥා කොට ඇති විටයි </p>
                        <p><input type="radio" name="question1">3. වම්පසින් පසුකර යාම ආරක්ෂා සහිත බව හැඟෙන විටයි  </p>
                        <p><input type="radio" name="question1">4.ඉහත කුමන අවස්ථාවකදී වුවද වම්පසින් යා හැකිය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 149  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 149.වාහන නවතා තැබීමේ දී ඔබ කළ යුතු වැදගත් කාර්යයක් වන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ දොර අගුළු හොඳින් දමා තිබීමයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.නවතා තැබීමේ තිරිංග නිසි පරිදි යෙදීමයි   </p>
                        <p><input type="radio" name="question1"> 3.දිවා කාලයේ වුවද නැවතුම් පහන් දල්වා තැබීම </p>
                        <p><input type="radio" name="question1">4.ඉදිරි රෝද සම්පූර්ණයෙන්ම වමට හරවා තබා නවතා තැබීම  </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 150  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 150.අවදානම් හැඟවීමේ පහන් දැල්විය යුත්තේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රෝගියෙකු ප්‍රවාහනය කරන අවස්ථාවේ දී</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.හතරමං හන්දියක කෙළින් ඉදිරියට ගමන් කරන විටයි </p>
                        <p><input type="radio" name="question1">3. අවදානම් ස්ථානයකදී වාහනයකට ඉස්සර කරන විටයි </p>
                        <p><input type="radio" name="question1">4.මහා මාර්ගයේ ආපදාවකට ලක්වූ වාහනයක් නවතා තබන විටදී පමණකි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 151  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 151.මෝටර් වාහනයකට ඉන්ධන පිරවීමේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ එන්ජිම ගැන සැලකිලිමත් වීම අවශ්‍ය නැත </p>
                        <p><input type="radio" name="question1"> id="correct1"2.වාහනයේ එන්ජිම පණ ගන්වා තිබිය දී ඉන්ධන පිරවිය යුතුය  </p>
                        <p><input type="radio" name="question1">3.ඉන්ධන පුරවන අවස්ථාවේ එන්ජිම නවතා තැබිය යුතුය  </p>
                        <p><input type="radio" name="question1"> 4.එන්ජිමේ තෙල් නියමිත ප්‍රමාණයට ඇත්දැයි අනිවාර්යෙන් පරීක්ෂා කළ යුතුය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 152 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 152.වට රවුමක පිළිපැදිය යුතු නීතිය වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වමෙන් හා දකුණෙන් එන වාහන වලට ඉඩ දීමයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.වම් පසින් එන වාහන වලට ප්‍රමුඛත්වය දීමයි  </p>
                        <p><input type="radio" name="question1">3.පොලිස් නිලධාරියෙකු පාලනය නොකරන්නේ නම් දකුණු පසින් පැමිණෙන වාහන වලට ඉඩ දීමයි  </p>
                        <p><input type="radio" name="question1">4.ඉදිරිපසට හා දකුණට ඉඩ දීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 153  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 153.වාහනයේ ටයර් වල හුලං නියමිත ප්‍රමාණයට වඩා අඩු වූ විට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ටයරයේ තැනින් තැන වේගයෙන් ගෙවී යයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ටයරය  දෙපැත්ත ඉක්මනින් ගෙවී යයි  </p>
                        <p><input type="radio" name="question1">3.ටයරය ඉක්මනින් ගෙවී යයි </p>
                        <p><input type="radio" name="question1">4.ටයරය මැද ඉක්මනින් ගෙවී යයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 154  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 154.වාහනයක ඉන්ධන දහනය අධික වීමට වඩාත් බලපෑ හැක්කේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉහළ ජියර වල ධාවනය</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.දුර්වල සුක්කානම්  පාලනය </p>
                        <p><input type="radio" name="question1"> 3.වංගු වලදී ත්වරණය කිරීම</p>
                        <p><input type="radio" name="question1">4.රළු ලෙස තිරිංග යෙදීම සහ ත්වරණය කිරීම </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 155  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 155.ස්වයංක්‍රීය නොවන ජියර් පෙට්ටියක් ඇති වාහනයක ජියර් මාරු කිරීමේ අපහසුතාවක් ඇත්නම් වඩාත්ම  හේතු වන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ක්ලච් එක නිසි පරිදි ක්‍රියා නොකිරීමයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.ජියර් පෙට්ටියේ ඇති රෝද කැඩී තිබීම  </p>
                        <p><input type="radio" name="question1">3. එන්ජිමේ ක්‍රියාකාරිත්වය  සුමට නොවීම </p>
                        <p><input type="radio" name="question1">4.වාහනයේ ඩිපරන්සරය  දෝෂ සහිත වීම </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 156  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 156.ඔබ පදවන වාහනයේ බැටරිය ආරෝපණය(චාජ් - charge) නොවන බවට දන්වන බල්බය එකවිට දැල්වුනේ නම් ඔබ විසින් මුලින්ම කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.බැටරි වයර් පරීක්ෂා කළ යුතුය </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වාහනයේ බැටරිය පරීක්ෂාකල යුතුය </p>
                        <p><input type="radio" name="question1">  3.ඕල්ටනේටරයේ හෝ ඩයිනමෝව කැරකැවීමට ඇති බෙල්ට් එක පරීක්ෂා කළ යුතුය</p>
                        <p><input type="radio" name="question1">4.වාහනයේ විදුලි පද්ධතිය පරීක්ෂා කළ යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 157  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 157.ඒකාකාරී නොවන හදිසියේ හිරවෙන තිරිංග එක් රෝදයක හෝ රෝද කිහිපයක තිබේ නම් එයින් පෙන්නුම් කෙරෙනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තිරිංග පද්ධතියේ තෙල් කාන්දුවක් තිබීම</p>
                        <p><input type="radio" name="question1" id="correct1">2.බ්‍රේක් ඩ්‍ර්දම් ඩිස්ක්  හෝ ලයිනර් දෝෂ සහිත වීම  </p>
                        <p><input type="radio" name="question1">3.තිරිංග පැඩලයේ  නිදහස් චලනය පමණට වඩා වැඩි වීම </p>
                        <p><input type="radio" name="question1">4.තිරිංග බල පද්ධතිය දෝෂ සහිත වීම  </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 158  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 158.ටයරයක දෙපසට වඩා මැද කොටස අධිකව ගෙවීමෙන් පෙන්නුම් කෙරෙන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.අවලම්භන පද්ධතිය දෝෂ සහිත බවයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.ටයරයේ වායු පීඩනය පමණට වඩා අඩු බවයි  </p>
                        <p><input type="radio" name="question1">3.ටයරයේ වායු පීඩනය පමණට වඩා වැඩි බවයි </p>
                        <p><input type="radio" name="question1">4.සුක්කානම් පද්ධතිය දෝෂ සහිත බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 159  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 159.එන්ජිමකට ලිහිසි තෙල් භාවිතා කරනු ලබන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.එන්ජිම තුල ඇති වායු සංසරණ වේගය වැඩි කිරීම</p>
                        <p><input type="radio" name="question1" id="correct1">2. චලනය වන කොටස් වල ගෙවීම්  අවම කර ගැනීම සඳහා  </p>
                        <p><input type="radio" name="question1">3.ඉන්ධන දහනයේදී එහි කාර්යක්ෂමතාවය වැඩි කිරීමට </p>
                        <p><input type="radio" name="question1">4.එන්ජිමේ  කාර්යක්ෂමතාවය වැඩි කිරීමටය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 160  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 160.ඩිෆරන්සලයේ ක්‍රියාකාරීත්වය කුමක්ද </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය වංගුවක ධාවනය කිරීමේදීරෝද වල වේගය සමාන කිරීමය </p>
                        <p><input type="radio" name="question1" id="correct1">2.ටයර් වලට හානියක් නොවී වැඩි බරක් ගෙන යාම පිණිසය  </p>
                        <p><input type="radio" name="question1">3.ටයර් වල අක්‍රමවත් ගෙවීම අඩු කිරීමය </p>
                        <p><input type="radio" name="question1"> 4.වාහනය වංගුවක ධාවනය කිරීමේදී රෝදවල වේගය වෙනස් කිරීමය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 161  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 161.වාහනයක් ධාවනය කිරීමේදී ඉදිරිපස දෙදරීමට හේතු හේතුවිය හැක්කේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.සුක්කානම් පද්ධතියේ කොටස් ගෙවී තිබීමය</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.වෙනස් නිෂ්පාදන වර්ග වල ටයර සවිකර තිබීම ය </p>
                        <p><input type="radio" name="question1"> 3.ඉදිරි රෝදවල ටයර වායු ප්‍රමාණය වෙනස් අගයන් වීමය</p>
                        <p><input type="radio" name="question1">4.ඉදිරි රෝද ටයර වල කට්ටා මෝස්තර වෙනස් වීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 162 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 162.වාහනයක ජල පොම්පයේ ක්‍රියාකාරීත්වය වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.එන්ජිමේ තෙල් සංසරණය පහසු කිරීමය</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.එන්ජිම තුල ජලය සංසරණය ඇති කිරීමය </p>
                        <p><input type="radio" name="question1"> 3.එන්ජිමේ භාවිතා භාවිතා කරන ජලය සිසිල් කිරීමය</p>
                        <p><input type="radio" name="question1">4.රේඩියේටරය  සිසිල් කිරීමය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   <!-- question 163  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 163.වාහනය පදවාගෙන යන අවස්ථාවක එකවිටම තිරිංග පද්ධතියට සම්බන්ධ පාලන බල්බය  දැල්වුනහොත් ඔබ විසින් කළ යුත්තේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනය ආසන්නයේම ඇති ගරාජයට ගෙනයාමයි</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ගමනාන්තය දක්වා ප්‍රවේශමෙන් ගමන් කිරීමය </p>
                        <p><input type="radio" name="question1">3.වාහනය වහාම නවත්වා තිරිංග තෙල් ඇතිදැයි පරික්ෂා කිරීම </p>
                        <p><input type="radio" name="question1"> 4.කාර්මිකයෙකු ගෙන්වා පරීක්ශා කරන තුරු වාහනය නතර කර තැබීමය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 164  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 164.වාහනයේ ටයර් වල වායු පීඩනය අඩු වූ විට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ටයර් වල එක පැත්තක් පමණක් වැඩියෙන් ගෙවේ</p>
                        <p><input type="radio" name="question1" id="correct1"> 2.ටයර් වල දෙපැත්ත ගෙවී මැද ඉතිරි වේ </p>
                        <p><input type="radio" name="question1">3.ටයර් වල මැද ගෙවී දෙපැත්ත ඉතිරි වේ </p>
                        <p><input type="radio" name="question1"> 4.ටයර් ගෙවීමට හුලං බලපාන්නේ නැත</p>
                    </div>
                </div>
            </div>
          </div>
    </div>
   <!-- question 165  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 165.සුක්කානම් පද්ධතියේ නිදහස් චලනය වැඩි වන්නේ</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ඉදිරි ටයර් ගෙවී ඇති විට</p>
                        <p><input type="radio" name="question1" id="correct1">  2.සුක්කානම් පද්ධතියේ කොටසක් ගෙවී ඇති විට</p>
                        <p><input type="radio" name="question1">3. ඉදිරි රෝදවල වායු පීඩනය වැඩි විට  </p>
                        <p><input type="radio" name="question1"> 4.ඉදිරි රෝදවල වායු පීඩනය අඩු විට</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



   <!-- question 166  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 166.ඔබ පදවාගෙන යන වාහනයේ එන්ජිම අධික ලෙස රත් වීම නිසා වතුර බොයිල් කිරීමක් ඇති වුවහොත් අඩු වතුර පිරවීමේදී </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ එන්ජිම ගැන සැලකිලිමත් වීම අවශ්‍ය නැත</p>
                        <p><input type="radio" name="question1" id="correct1">2.එන්ජිම නවතා වතුර පිරිවිය යුතුය  </p>
                        <p><input type="radio" name="question1"> 3.එන්ජිම ධාවනය වෙමින් තිබියදී වතුර පිර  විය යුතුය </p>
                        <p><input type="radio" name="question1"> 4.ඉහත කරුණු දෙකම නිවැරදිය</p>
                    </div>
                </div>
            </div>
          </div>
    </div>  


   <!-- question 167  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 167.ඔබ  පදවාගෙන යන වාහනයේ විදුලි දෝෂයක් නිසා වයර් පිලිස්සෙන ගඳක් ඇති වුවහොත් වහාම කළ යුතු වන්නේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයේ සියලුම පහන් නිවා දැමීමයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.ප්‍රධාන සුවිචය  ක්‍රියාවිරහිත කිරීමයි   </p>
                        <p><input type="radio" name="question1">3.පියුස් (විලායක )ගැලවීමයි  </p>
                        <p><input type="radio" name="question1">4.බැටරි වයර ගැලවීමයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 168  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 168.වාහනයක් ලිස්සා යන අවස්ථාවේදී අවදානම අඩුකර අඩු කර ගැනීම සඳහා </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ලිස්සා යන අවස්ථාවේ දී අවදානම අඩු කළ නොහැක </p>
                        <p><input type="radio" name="question1" id="correct1"> 2.එකවර තිරිංග යොදා වේගය පාලනය කළ යුතුය  </p>
                        <p><input type="radio" name="question1">3.තිරිංග නොයොදා ලිස්සා යන දිශාවට විරුද්ධ දිශාවටම සුක්කානම හැරවිය යුතුය  </p>
                        <p><input type="radio" name="question1">4.ජියර්  මගින් පාලනය කර ලිස්සා යන දිශාවට ක්‍රමානුකූලව සුක්කානම පාලනය කළ යුතුය </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 169  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question169.තිරිංග තෙල් භාවිතා කරන වාහනයක තිරිංග පැඩලය පහතටම බැසීමක් සිදු වේ නම් ඉන් අදහස් වනුයේ ?</div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.තිරිංග පැඩලයේ  දෝෂයක් ඇති බවයි </p>
                        <p><input type="radio" name="question1" id="correct1">2.බ්‍රේක් බයින්ඩ් (තිරිංග හිරවීමක්) ඇති බවයි   </p>
                        <p><input type="radio" name="question1">3.තිරිංග නිසි පරිදි ක්‍රියා කරන බවයි  </p>
                        <p><input type="radio" name="question1">4.තිරිංග තෙල් කාන්දු වීමක් ඇති බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 170  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 170.වාහනයට තිරිංග යෙදීමේදී වම් පැත්තට ඇදී යන්නේ නම් එයින් අදහස් වනුයේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.රෝදවල වායු පීඩනය එකිනෙකට වෙනස් බවයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.ඉදිරිපස වම් පැත්තේ රෝදයේ තිරිංග තෙල් කාන්දු වීමයි  </p>
                        <p><input type="radio" name="question1">3.ඉදිරිපස දකුණු පැත්තේ රෝදයේ තිරිංග තෙල් කාන්දු වීමයි  </p>
                        <p><input type="radio" name="question1"> 4.පසුපස රෝද වලට තිරිංග නොමැති බවයි</p>
                    </div>
                </div>
            </div>
          </div>
    </div>



    <!-- question 171  -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 171.වාහනයක් ධාවනය කිරීමේදී ජියර්  මාරු කිරීමේ අපහසුතාවයක් ඇත්නම් වඩාත්ම විය හැක්කේ </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.වාහනයෙහි ජියර් ලීවරයේ දෝෂයක් ඇති බවයි</p>
                        <p><input type="radio" name="question1" id="correct1">2.ක්ලච් එක නිසි පරිදි ක්‍රියා නොකිරීමයි   </p>
                        <p><input type="radio" name="question1">3.එන්ජිමේ වේගය නිසි පරිදි නොමැති බවයි  </p>
                        <p><input type="radio" name="question1">4.ජියර් පෙට්ටයේ  දෝෂයක් ඇති බවයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>

   <!-- question 172 -->
    <div class="row  justify-content-center mb-3">
        <div class="card border-primary col-lg-12 col-xs-11" >
            <div class="card-header">Question 172.වාහනයේ ටයර් වල හුලං නියමිත ප්‍රමාණයට වඩා වැඩි වූ විට </div>
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 mb-3 text-left">
                        <img src="images/large.jpg" alt="" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p><input type="radio" name="question1">1.ටයරයේ තැනින් තැන වැඩි වැඩියෙන් ගෙවී යයි</p>
                        <p><input type="radio" name="question1" id="correct1">2. ටයරය ඉක්මනින් ගෙවී යයි   </p>
                        <p><input type="radio" name="question1">3.ටයරය මැද ඉක්මනින් ගෙවී යයි  </p>
                        <p><input type="radio" name="question1">4.ටයරය දෙපැත්ත ඉක්මනින් ගෙවී යයි </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
         
   
  </div>
    <!-- end of question of page 1/4  --> 

    <!-- results -->
    <input type="submit" name="submit" value="submitQuiz" onclick="result()">

    <script type="text/javascript">
        function result(){
            var score=0;
            if(document.getElementById('corrrect1').checked){
                score++;
            }
            if(document.getElementById('corrrect2').checked){
                score++;
            }
            if(document.getElementById('corrrect3').checked){
                score++;
            }
            if(document.getElementById('corrrect4').checked){
                score++;
            }
            if(document.getElementById('corrrect5').checked){
                score++;
            }
            if(document.getElementById('corrrect6').checked){
                score++;
            }
            if(document.getElementById('corrrect7').checked){
                score++;
            }
            if(document.getElementById('corrrect8').checked){
                score++;
            }
            if(document.getElementById('corrrect9').checked){
                score++;
            }
            if(document.getElementById('corrrect10').checked){
                score++;
            }
            document.write("Your score is"+score);

        }
       
    
    
    </script>
    
    <!-- end of results  -->
     
<!-- paginaion start -->
<nav aria-label="Page navigation example ">
<ul class="pagination justify-content-center mt-5">
  <li class="page-item disabled">
    <a class="page-link" href="#" tabindex="-1">Previous</a>
  </li>
  <li class="page-item"><a class="page-link" href="quiz.html">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#">Next</a>
  </li>
</ul>
</nav>
<!-- end of pagination  -->
</div>

@endsection