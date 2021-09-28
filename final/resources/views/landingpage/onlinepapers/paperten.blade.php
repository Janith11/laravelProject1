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
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 10</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 10</h1>
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

                    <div class=" paper_img">
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
            question: "ඔබ පදවන වාහනය අතරමගදී ආපදාවට ලක් වුවහොත් ඔබ කළ යුත්තේ?",
            answer: "හැකි උපරිම මට්ටමින් මාර්ගය අවහිර නොවන පරිදි වාහන නතර කිරීමය",
            imgSrc: "/images/onlinepaper/1.jpg",
            options: [
                "හැකි උපරිම මට්ටමින් මාර්ගය අවහිර නොවන පරිදි වාහන නතර කිරීමය",
                "වාහනයේ පහන් දල්වා නතර කළ හැක",
                "ආපදාවට ලක් වූ තැනම නතර කිරීමයි",
                "හැකිතාක් දුරට වාහනය ධාවනය කර යෑමය"
            ]
        },
        {
            numb: 2,
            question: "වැසි සහිත කාලගුණයක් ඇති අවස්ථාවක වාහනය පදවන විට දී සෑම විටම කළ යුත්තේ?",
            answer: "අඩු ගියරයක හෙමින් පැදවීමය",
            imgSrc: "/images/onlinepaper/2.png",
            options: [
                "වාහනය ටයර හොඳින් ඇති විට සැලකිලිමත් වීම අවශ්‍ය නැත",
                "අඩු ගියරයක හෙමින් පැදවීමය",
                "වැඩි ගියරයේ ක වේගයෙන් පැදවීම ය",
                "වැඩි ගියරක  හෙමින් පැදවීම ය"
            ]
        },
        {
            numb: 3,
            question: "බෑවුම් සහිත මාර්ගයක වාහනය ධාවනය කිරීමේ දී?",
            answer: "අඩු ගියරයක පැදවිය යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "හැකි තරම් වේගයෙන් පැදවිය යුතුය",
                "අඩු ගියරයක පැදවිය යුතුය",
                "වැඩි ගියරයක පැදවිය යුතුය",
                "ගියර් නොමැතිව (නියුටල්) තත්වයේ පැදවිය යුතුය "
            ]
        },
        {
            numb: 4,
            question: "තැනිතලා බිමක වාහන නවතා තැබීමේ දී ඔබ කළ යුතු වැදගත් කාරණයක් වනුයේ?",
            answer: "නවතා තැබීමේ තිරිංග නිසි පරිදි යෙදීමයි",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "දොර අගුළු හොඳින් වසා තැබීමයි",
                "නවතා තැබීමේ තිරිංග නිසි පරිදි යෙදීමයි",
                "දිවා කාලයේදී වුවද නැවතුම් පහන් දල්වා තැබීමයි",
                "ඉදිරි රෝද දකුණට හරවා නවතා තැබීමයි"
            ]
        },
        {
            numb: 5,
            question: "අවදානම් හැඟවීමේ පහන් දැල්විය යුතු වනුයේ?",
            answer: "මහා මාර්ගයේ ආපදාවකට ලක්වූ වාහනයක් නවතා තබන විටදීය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "වාහනයක රෝගී පුද්ගලයන් ගෙන යන අවස්ථාවකදී",
                "හතර මං සන්ධියක දී ඉදිරියට ගමන් කරන විටය",
                "අවදානම් ස්ථානයකදී වාහනයකට ඉස්සර කරන විටය",
                "මහා මාර්ගයේ ආපදාවකට ලක්වූ වාහනයක් නවතා තබන විටදීය"
            ]
        },
        {
            numb: 6,
            question: "මෝටර් වාහනයකට ඉන්ධන පිරවීමේදී?",
            answer: "ඉන්ධන පුරවන අවස්ථාවේදී එන්ජිම නවතා තැබිය යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඉන්ධන ලබා ගැනීමේදී එන්ජිම ගැන සැලකිලිමත් වීම අවශ්‍ය නැත",
                "වාහනයේ එන්ජිම පණ ගන්වා තිබියදී ඉන්ධන පිරවිය යුතුය",
                "ඉන්ධන පුරවන අවස්ථාවේදී එන්ජිම නවතා තැබිය යුතුය",
                "එන්ජිමේ තෙල් නියමිත ප්‍රමාණයට ඇත්දැයි අනිවාර්යෙන් පරීක්ෂාකල යුතුය"
            ]
        },
        {
            numb: 7,
            question: "ඔබ රාත්‍රී කාලයේ දී වාහනයක් පදවාගෙන යන විට වෙනත් වාහනයක් ඉදිරියෙන් පැමිණෙන අවස්ථාවකදී ඔබ විසින් කළ යුතු වන්නේ?",
            answer: "වාහනයේ ප්‍රධාන පහන් අවපාත කිරීමය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඉදිරි වාහනයේ පහන් අවපාත කළහොත් පමණක් පහන් අවපාත කළ යුතුය",
                "වාහනයේ ප්‍රධාන පහන් අවපාත කිරීමය",
                "වාහනයේ ප්‍රධාන පහන් නිවා දැමීමය",
                "වාහනයේ නලාව ක්‍රියා කරවීමය"
            ]
        },
        {
            numb: 8,
            question: "වාහනයක් ඉස්සර කිරීමේදී අනුගමනය කළ යුත්තේ?",
            answer: "3,4 වැනි වැඩි ජියරයක් තෝරා ගැනීම මගින් වැඩි වේගයක් ලබා දීම",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "3,4 වැනි වැඩි  ජියරයක් තෝරාගැනීම මඟින් වැඩි බලයක් ලබා දීම",
                "3,4 වැනි වැඩි ජියරයක් තෝරා ගැනීම මගින් වැඩි වේගයක් ලබා දීම",
                "1,2 වැනි අඩු ජියරයක් තෝරා ගැනීම මගින් වැඩි බලයක් ලබා දීම",
                "1,2 වැනි අඩු ජියරයක් තෝරා ගැනීම මගින් අඩු බලයක් ලබා දීම"
            ]
        },
        {
            numb: 9,
            question: "ධාවන තීරු 3 කින් යුතු මාර්ගයක තුන්වන තීරුව භාවිතා කළ යුත්තේ?",
            answer: "වෙනත් වාහනයක් පසුකර යෑමට හෝ දකුණට හැරවීමට හෝ අනතුරක්  වලක්වා ගැනීමටය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "දකුණට හැරවීමට",
                "අධික වේගයෙන් ධාවනය කිරීම සඳහාය",
                "වෙනත් වාහනයක් පසුකර යෑමට",
                "වෙනත් වාහනයක් පසුකර යෑමට හෝ දකුණට හැරවීමට හෝ අනතුරක්  වලක්වා ගැනීමටය"
            ]
        },
        {
            numb: 10,
            question: "මහා මාර්ගෝපදේශ  සංග්‍රහයේ අනතුරු හැඟවීමේ සංඥා වල  වර්ණය වනුයේ?",
            answer: "කහ පසුතලයේ කළු පැහැය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "රතු ,සුදු  හා කළු පැහැය",
                "රතු, සුදු හා නිල් පැහැය",
                "සුදු පසුතලයේ රතු පැහැය",
                "කහ පසුතලයේ කළු පැහැය"
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
