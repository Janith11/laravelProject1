@extends('layouts.landingpage')
@section('content')

<style>
    .option{
        transition-duration: 0.2s;
    }
    .option:hover{
        background-color: rgba(21, 11, 168, 0.198);
        transition-duration: 0.3s;
    }
    .option_list .option.disabled{
        pointer-events: none;
    }
    
</style>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="mb-3">
    <img class="image-fluid p-0 m-0" src="/images/landingpage/examcover.png" alt="Card image cap" style="width: 100%; height: auto;">
</div>
<div class="container mb-5" style="height: 90vh">
    <div class="row">
        <a href="{{route('onlinepaper')}}">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">All Papers</h5>
        </a>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 09</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 09</h1>
    </div>

    <div class="card w-100 border border-primary ">

        {{-- display one  --}}
        <div class="card-body firstdiv">
            <div class="div text-center mt-5 mb-5 pt-3 pb-3 start_btn">
                <button class="btn btn-lg btn-primary">Start Quiz</button>
            </div>
        </div>

        {{-- display two  --}}
        <div class="info_box" style="display: none">
            <div class="card-header">Rules & Regulations of this question paper</div>
            <div class="card-body">
                <ol>
                    <li>You will have only 20 seconds per each question.</li>
                    <li>Once you select a answer you can't reselect it.</li>
                    <li>You have to answer the questions within the given time.</li>
                    <li>If you can't answer the within given time, your answer will be displayed.</li>
                    <li>Try your best in answer the questions. Good Luck!</li>
                </ol>
                <div class="text-right buttons">
                    <button class="btn btn-danger quit">Exit</button>
                    <button class="btn btn-primary restart">Continue</button>
                </div>
            </div>
        </div>

        {{-- display three  --}}
        <div class="thirddiv" style="display: none">
            <div class="card-header d-flex justify-content-between">
                <div class="align-self-start que_text">
                    {{-- <h5 style="font-size: 25px;font-weight: 450">මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?</h5> --}}
                </div>
                <div class="align-self-end">
                    <h5>Time Left<span class=" p-2 bg-dark text-light ml-3 rounded timer_sec">20</span></h5>
                </div>
            </div>
            <div class="progress" style="height: 7px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            {{-- <div class="time_line bg-primary" style="height: 4px;"> --}}
                {{-- time line here  --}}
            {{-- </div> --}}
            <div class="card-body">
                <div class="row">

                    <div class="paper_img">
                        {{-- <img src="/images/onlinepaper/1.jpg" alt="" style="max-width: 200px;"> --}}
                    </div>

                    <div class="option_list col-md-12 col-sm-12 col-xs-12">
                       {{-- four options here  --}}
                    </div>
                </div>
                {{-- footer  --}}
                <div class="row mt-3 ">
                    <div class="col total_que">
                        {{-- <p>2 of 10 Questions</p> --}}
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary next_btn">Next Question <i class="fas fa-arrow-alt-circle-right"></i></button>
                    </div>
                </div>

            </div>
        </div>

        {{-- display four  --}}
        <div class="fourthdiv" style="display: none;">
            <div class="card-body alert-success border border-primary">
                <div class="row">
                    <div class="col text-center mt-2 p-5">
                        <i class="fas fa-trophy fa-5x text-warning"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        {{-- <h4 class="text-success">Congratulations! You just complete the Quiz!</h4> --}}
                        <div class="result_text">
                            {{-- <h4>Sorry, You have only <span>2</span> out of <span>10</span> </h4> --}}
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right pr-5">
                        <button class="btn btn-success restart_quiz">Replay Quiz</button>
                        <button class="btn btn-danger quit_quiz">Exit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- end  --}}
</div>

<script>
    const start_btn = document.querySelector(".start_btn button");
    const firstdiv = document.querySelector(".firstdiv");
    const thirddiv = document.querySelector(".thirddiv");
    const info_box = document.querySelector(".info_box");
    const exit_btn = document.querySelector(".buttons .quit");
    const restart_btn = document.querySelector(".buttons .restart");
    const next_btn = document.querySelector(".next_btn");
    const option_list = document.querySelector(".option_list");
    const timeCount=document.querySelector(".timer_sec");
    const timeLine =document.querySelector(".progress-bar");
    const result_box =document.querySelector(".fourthdiv");
    const restart_quiz =document.querySelector(".restart_quiz");
    const quit_quit =document.querySelector(".quit_quiz");

    // question array
    let questions = [
        {
            numb: 1,
            question: "ඉදිරියෙන් යන වාහනය ඉස්සර කිරීමට ඔබට අවශ්‍ය නම්?",
            answer: "මහා මාර්ගය හොඳින් නිරීක්ෂණය කර ඉස්සර කිරීමට හැකි දැයි පරික්ෂා කර තීරණය කළ යුතුය",
            imgSrc: "/images/onlinepaper/1.jpg",
            options: [
                "ඉදිරි වාහනය රියදුරු ඉස්සර  කිරීමට සංඥා කළ විට එය කිරීම අවශ්‍ය නැත",
                "ඉදිරි මාර්ගය පැහැදිලිව පෙනෙන්නේ දැයි පරික්ෂා කළ යුතුය",
                "මහා මාර්ගය ඉඩ තිබෙන ස්ථානයක ද පරික්ෂා කළ යුතුය",
                "මහා මාර්ගය හොඳින් නිරීක්ෂණය කර ඉස්සර කිරීමට හැකි දැයි පරික්ෂා කර තීරණය කළ යුතුය"
            ]
        },
        {
            numb: 2,
            question: "ඔබ ඉදිරියේදී වම් පැත්තෙ නතර කළ යුතු බව දන්නේ නම් වාහනය ගමන්කරවිය යුත්තේ?",
            answer: "මාර්ගයේ වම් පස තීරුවේය",
            imgSrc: "/images/onlinepaper/2.png",
            options: [
                "මාර්ගයේ වම් පස තීරුවේය",
                "මං තීරු භාවිතා කිරීමට අවශ්‍ය නැත",
                "මාර්ගය මැද තීරුවේය",
                "මාර්ගය දකුණු පැත්තේ ය"
            ]
        },
        {
            numb: 3,
            question: "අතුරු මාර්ගයකින් ප්‍රධාන මාර්ගයට ඔබ පිවිසෙන විට?",
            answer: "මාර්ගය දෙපසම සාර්ථක නිරීක්ෂණය කිරීමෙන් පසු මාර්ගයට ගැනීම සුදුසුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ප්‍රධාන පාරේ වාහන තදබදයක් නොමැතිනම් වමෙන් ඇතුළු විය හැක",
                "දකුණු පැත්ත බලා වාහන නොමැති නම් මාර්ගයට ගැනීමට සුදුසු ය",
                "වම් පැත්ත බල වාහන නොමැති නම් මාර්ගයට ගැනීමට සුදුසු ය",
                "මාර්ගය දෙපසම සාර්ථක නිරීක්ෂණය කිරීමෙන් පසු මාර්ගයට ගැනීම සුදුසුය"
            ]
        },
        {
            numb: 4,
            question: "ඔබට පසුපසින් පැමිණෙන වාහනය ඔබව ඉස්සර කිරීමට අවශ්‍ය බව හැඟී ගියහොත් ඔබ විසින් කළ යුතු වන්නේ?",
            answer: "වාහනයේ වේගය අඩු කර වම් පසින් ධාවනය කර ඉස්සර කිරීමට ඉඩ දීමයි",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "පසුපසින් එන වාහන ගැන සැලකිලිමත් වීම අවශ්‍ය නැත",
                "වාහනයේ වේගය අඩු කර වම් පසින් ධාවනය කර ඉස්සර කිරීමට ඉඩ දීමයි",
                "වම් පස සිග්නල්  ලාම්පු දල්වා ඔහුට යන ලෙස දැන් වීමයි",
                "වාහනය තවත් පාර මැද්දට ගෙන ඔහුට ඉස්සර වීමට අවශ්‍ය ඉඩ නොදී ගමන් කිරීමයි"
            ]
        },
        {
            numb: 5,
            question: "ඔබ වාහනය පදවාගෙන අවස්ථාවකදී ඔබගේ ජංගම දුරකතනය නාද වුවහොත්?",
            answer: "දුරකථනයට ප්‍රතිචාර දැක්වීමට අවශ්‍ය නම් වාහනය අයින් කර නවතා තබා දුරකතයට ප්‍රතිචාර දැක්විය යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "නාගරික ප්‍රදේශවල දී පමණක් දුරකථනය ගැන ප්‍රතිචාර දැක්විය නොහැක",
                "එක් අතකින් සුක්කානම  හසුරුවා ගෙන අනිත් අතින් දුරකථන ගෙන ප්‍රතිචාර දැක්විය යුතුය",
                "දුරකථනයට ප්‍රතිචාර දැක්වීමට අවශ්‍ය නම් වාහනය අයින් කර නවතා තබා දුරකතයට ප්‍රතිචාර දැක්විය යුතුය",
                "ජංගම දුරකථන රැගෙන යාම නොකළ යුතුය"
            ]
        },
        {
            numb: 6,
            question: "ඔබ වාහනය පදවන්න අවස්ථාවකදී මාර්ගයේ ඉදිරියේ බාධකයක් නිසා වාහන පේළියක් එක් වාහනයක් පසුපස එක් එක් වාහන නතර කර තිබෙන විට ඔබ කළ යුතු වන්නේ?",
            answer: "මාර්ගයේ නතර වී ඇති අවසාන වාහනයට පසුපසින් නතර කර සිටීම",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "විරුද්ධ දිශාවෙන් වාහන නොමැති නම් දකුණු මාර්ගයේ පැත්තෙන් ගමන් කළ හැක",
                "සියලුම වාහන ඉස්සර කරගෙන ගොස් බාධකයේ ඇති තැනට පිවිසීම",
                "මාර්ගයේ නතර වී ඇති අවසාන වාහනයට පසුපසින් නතර කර සිටීම",
                "නලාව ශබ්ද කර තමාට ඉක්මනින් යා යුතු බව දැන් වීමයි"
            ]
        },
        {
            numb: 7,
            question: "ඔබ වාහනය පදවාගෙන අවස්ථාවක ඉදිරියේ මාර්ගය අයිනේ බස් රථයක් නතර කර මගින් බසිමින් සිටී නම් ඔබ කළ යුත්තේ?",
            answer: "මගීන් මාරු වේ යයි බලාපොරොත්තුවෙන් නතර කර ගැනීමට හැකිවන සේ වේගය අඩු කර ධාවනය කිරීමයි",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "නතර කරපු වාහන ගෙන සැලකිලිමත් වීම අවශ්‍ය නැත",
                "මගින් පාර මාරු වීමට ප්‍රථම හැකි ඉක්මනින් බස් රථයේ ඉස්සර කර යාමයි",
                "බස් රථයට පසුපසින් ඔබ ද නතර කර සිටීම",
                "මගීන් මාරු වේ යයි බලාපොරොත්තුවෙන් නතර කර ගැනීමට හැකිවන සේ වේගය අඩු කර ධාවනය කිරීමයි"
            ]
        },
        {
            numb: 8,
            question: "ඔබ වාහනය පදවාගෙන අවස්ථාවකදී ඉදිරියේ රථ වාහන ආලෝක සංඥා සහිත මන්සන්ධියක් ඇති බව දැන ගත් විට?",
            answer: "සෑම අවස්ථාවකදීම සංඥා ලාම්පු වලට අවනතව ධාවනය කළ යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "වේගය වැඩි කර හැකි ඉක්මනින් මංසන්දිය පසු කළ යුතුය",
                "සෑම අවස්ථාවකදීම සංඥා ලාම්පු වලට අවනතව ධාවනය කළ යුතුය",
                "පෙනීම සීමා සහිත බැවින් වඩාත් සුපරීක්ෂාකාරීව ධාවනය කළ යුතුය",
                "ප්‍රධාන පහන් හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත"
            ]
        },
        {
            numb: 9,
            question: "රාත්‍රී කාලයේදී වාහනයක් ධාවනය කිරීමේදී?",
            answer: "පෙනීම සීමාසහිත බැවින් වඩාත් සුපරීක්ෂාකාරීව ධාවනය කළ යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "වාහනයේ නලාව හැකි පමණ පාවිච්චි කළ යුතුය",
                "වාහන තදබදය අඩු නිසා වේගයෙන් ධාවනය කළ හැකිය",
                "පෙනීම සීමාසහිත බැවින් වඩාත් සුපරීක්ෂාකාරීව ධාවනය කළ යුතුය",
                "ප්‍රධාන පහන් හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත"
            ]
        },
        {
            numb: 10,
            question: "සංඥා එළි සහිත මං සන්ධියක දී පොලිස් නිලධාරීන් වාහන පාලනය කරයි නම් ඔබ ක්‍රියාකළ යුත්තේ?",
            answer: "පොලිස් නිලධාරි මහතාගේ අණ අනුවය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "දකුණට හැරවීමේදී පමණක් පොලිස් නිලධාරියාගේ අණට අවනත විය යුතුය",
                "පොලිස් නිලධාරි මහතාගේ අණ අනුවය",
                "සංඥා එළියෙන් දැක්වෙන අණ පරිදිය",
                "ඔබට රිසි පරිදිය"
            ]
        }

    ];

    start_btn.onclick = () =>{
        firstdiv.style.display = "none";
        info_box.style.display = "block";
    }

    exit_btn.onclick = () =>{
        firstdiv.style.display = "block";
        info_box.style.display = "none";
    }

    restart_btn.onclick = () =>{
        thirddiv.style.display = "block";
        info_box.style.display = "none";
        showQuestions(0);
        queCounter(1);
        startTimer(20);
        startTimerLine(0);
        next_btn.style.display ="none";
    }

    quit_quit.onclick = ()=>{
        window.location.href = "{{ route('onlinepaper')}}";
    }
    restart_quiz.onclick= ()=>{
        window.location.reload();
    }

    let que_count = 0;
    let queNumber = 1;
    let counter;
    let timeValue = 20;
    let widthValue = 0;
    let userScore = 0;

    //when press next btn
    next_btn.onclick = () =>{
        if(que_count < questions.length - 1 ){
            que_count++;
            queNumber++;
            showQuestions(que_count);
            queCounter(queNumber);
            clearInterval(counter);
            startTimer(timeValue);
            clearInterval(counterLine);
            startTimerLine(widthValue);
        }else{
            console.log("Questions over");
            showResultBox();
        }
    }



    function showQuestions(index){
        const que_text = document.querySelector(".que_text");
        const paper_img =document.querySelector(".paper_img");

        let img_tag = '<img src='+questions[index].imgSrc +' alt="" style="max-width: 200px;">';
        // paper_img.innerHTML = img_tag;
        let que_tag = '<h5 style="font-size: 25px;font-weight: 450">'+questions[index].numb+". "+questions[index].question+'</h5>';
      
        let option_tag = '<div class="option border rounded mb-2 p-1"><div class="col-10 d-inline"><span style="font-size: 20px;">'+questions[index].options[0]+'</span></div></div>'
                        +'<div class="option border rounded mb-2 p-1"><div class="col-10 d-inline"><span style="font-size: 20px;">'+questions[index].options[1]+'</span></div></div>'
                        +'<div class="option border rounded mb-2 p-1"><div class="col-10 d-inline"><span style="font-size: 20px;">'+questions[index].options[2]+'</span></div></div>'
                        +'<div class="option border rounded mb-2 p-1"><div class="col-10 d-inline"><span style="font-size: 20px;">'+questions[index].options[3]+'</span></div></div>';


        que_text.innerHTML = que_tag;
        option_list.innerHTML=option_tag;
        const option = option_list.querySelectorAll(".option");
        for(let i = 0; i< option.length; i++){
            option[i].setAttribute("onclick", "optionSelected(this)");
        }
    }
    let tickIcon ='<div class="myicon text-success d-inline px-5 py-1 float-right"><i class="far fa-check-circle fa-lg"></i></div>';
    let crossIcon ='<div class="myicon text-danger d-inline px-5 py-1 float-right"><i class="far fa-times-circle fa-lg"></i></div>';

    function optionSelected(answer){
        clearInterval(counter);
        clearInterval(counterLine);
        var userAns = answer.textContent;
        var correctAns = questions[que_count].answer;
        let allOptions = option_list.children.length;
        if(correctAns.replace(/ /g,'')==userAns.replace(/ /g,'')){
            userScore+=1;
            answer.classList.add("alert-success");
            answer.classList.add("border-success");
            answer.classList.add("text-success");
            answer.insertAdjacentHTML("beforeend",tickIcon);
            console.log("Answer is correct");
            
        }else{
            answer.classList.add("alert-danger");
            answer.classList.add("border-danger");
            answer.classList.add("text-danger");
            answer.insertAdjacentHTML("beforeend",crossIcon);
            console.log("Answer is wrong");  
            //if answer is incorrect automatic display corect answer
            for(let i = 0; i<allOptions; i++){
                if(option_list.children[i].textContent.replace(/ /g,'') == correctAns.replace(/ /g,'')){
                    option_list.children[i].setAttribute("class", "alert-success border-success text-success border rounded mb-2");
                    option_list.children[i].insertAdjacentHTML("beforeend",tickIcon);                   
                }
                
            }
        }

        //when user select a option disable other options
        for (let i= 0;  i<allOptions;i++) {
            option_list.children[i].classList.add("disabled");
            
        }
        next_btn.style.display="block";

    }

    function showResultBox(){
        result_box.style.display = "block";
        thirddiv.style.display = "none";
        const scoreText=document.querySelector(".result_text");
        if(userScore>7){
            let scoreTag = '<h4>Congratulations!, you got <span>'+userScore +'</span> out of <span>'+questions.length+'</span> </h4>';
            scoreText.innerHTML = scoreTag;
        }else if(userScore>5){
            let scoreTag = '<h4>Congratulations!, You have only <span>'+userScore +'</span> out of <span>'+questions.length+'</span> </h4>';
            scoreText.innerHTML = scoreTag;
        }else if(userScore>0){
            let scoreTag = '<h4>Sorry, You have only <span>'+userScore +'</span> out of <span>'+questions.length+'</span> </h4>';
            scoreText.innerHTML = scoreTag;
        }else{
            let scoreTag = '<h4>Do not give up, Try again. Your Score <span>'+userScore +'</span> out of <span>'+questions.length+'</span> </h4>';
            scoreText.innerHTML = scoreTag;
        }
    }

    function queCounter(index){
        //question number bottom
        const total_que= document.querySelector(".total_que");
        let totalQuestionTag = '<p><span>'+index+'</span> of 10 Questions</p>';
        total_que.innerHTML = totalQuestionTag;
    }

    function startTimer(time){
        counter =setInterval(timer,1000);
        function timer(){
            timeCount.textContent=time;
            time--;
            if(time <9){
                let addZero = timeCount.textContent;
                timeCount.textContent = "0"+addZero;
            }
            if(time < 0){
                clearInterval(counter);
                timeCount.textContent="00";

                var correctAns = questions[que_count].answer;
                let allOptions = option_list.children.length;

                for(let i = 0; i<allOptions; i++){
                if(option_list.children[i].textContent.replace(/ /g,'') == correctAns.replace(/ /g,'')){
                    option_list.children[i].setAttribute("class", "alert-success border-success text-success border rounded mb-2");
                    option_list.children[i].insertAdjacentHTML("beforeend",tickIcon);                   
                    }
                
                }
                for (let i= 0;  i<allOptions;i++) {
                    option_list.children[i].classList.add("disabled");
                }
                    next_btn.style.display="block";
                }
        }
    }

    function startTimerLine(time){
        counterLine =setInterval(timer,210); 
        function timer(){
            time+=1;
            timeLine.style.width = time + "%";
            // timeLine.innerHTML = time + "%";
            if(time > 100){
                clearInterval(counterLine);
            }
        }
    }



</script>
@endsection
