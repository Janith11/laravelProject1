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
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 03</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 03</h1>
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

                    <div class="col-md-5 col-sm-5 col-xs-4 text-center p-4 paper_img">
                        {{-- <img src="/images/onlinepaper/1.jpg" alt="" style="max-width: 200px;"> --}}
                    </div>

                    <div class="option_list col-md-7 col-sm-7 col-xs-8">
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
            question: "මාර්ගය මත සලකුණු කර ඇති මෙම මාර්ග සළකුණෙන් දැක්වෙන්නේ,",
            answer: "මාර්ගය හරහා ගමන් කිරීම තහනම් කිරීමේ ආයත රේඛාව",
            imgSrc: "/images/onlinepaper/21.png",
            options: [
                "ධාවන තීරු සලකුණු",
                "මධ්‍ය රේඛාව",
                "දකුණට හැරීම හැර , හරහා යෑම තහනම් කරන ආයත රේඛාව",
                "මාර්ගය හරහා ගමන් කිරීම තහනම් කිරීමේ ආයත රේඛාව"
            ]
        },
        {
            numb: 2,
            question: "වාහන ආලෝක සංඥා තිබෙන මෙම ම්ංසන්ධියේ දී?",
            answer: "වෑන් රථය අනිවාර්යෙන් දකුණට හැරවිය යුතුය",
            imgSrc: "/images/onlinepaper/22.png",
            options: [
                "වෑන් රථයට අවශ්‍ය නම්   වමට  හැර විය හැක",
                "වෑන් රථය අනිවාර්යෙන් දකුණට හැරවිය යුතුය",
                "මෝටර් කාරය ට අවශ්‍ය නම් දකුණට හැරවිය හැක",
                "මෝටර් රථයට  අවශ්‍ය නම්  වමට හැර විය හැක"
            ]
        },
        {
            numb: 3,
            question: "මාර්ගය මත හරස් අතට සළකුණු කර ඇති මෙම සළකුණෙන් අදහස් කරන්නේ?",
            answer: "වට රවුමක පිහිටු වන මාර්ගය ඉඩ දෙනු රේඛාව",
            imgSrc: "/images/onlinepaper/23.png",
            options: [
                "මාර්ගය ඉඩ දෙනු රේඛාව",
                "මාර්ගයේ බෙදී යන ස්ථානයක පිහිටුවන නැවතුම් රේඛාව",
                "නවතිනු සංඥාවේ හි පිහිටුවන නැවතුම් රේඛාව",
                "වට රවුමක පිහිටු වන මාර්ගය ඉඩ දෙනු රේඛාව"
            ]
        },
        {
            numb: 4,
            question: "රූපයේ පෙන්වා තිබෙන T හැඩයේ මංසන්ධියට ඇතුළුවන මෙම රියදුරා තම වාහනය,",
            answer: "අනිවාර්යෙන් නතර කළ යුතුය",
            imgSrc: "/images/onlinepaper/24.png",
            options: [
                "ප්‍රධාන මාර්ගයේ වාහන නොමැතිනම් නතර කළ යුතු නැත",
                "අනිවාර්යෙන් නතර කළ යුතුය",
                "දකුණට හර වන්නේ නම් පමණක් නතර කළ යුතුය",
                "වම ට හැරවීමේ දී නතර කළ යුතු නැත"
            ]
        },
        {
            numb: 5,
            question: "මාර්ගය මත හරස් අතට සළකුණු කර ඇති මෙම සළකුණෙන් අදහස් කරන්නේ?",
            answer: "රථ වාහන සංඥා එළියක දී හෝ පොලිසියෙන් පාලනය වන අන්තර් ජේදනය කදී නැවතීමේ රේඛාව",
            imgSrc: "/images/onlinepaper/25.png",
            options: [
                "මාර්ගය ඉඩ දෙනු රේඛාව",
                "රථ වාහන සංඥා එළියක දී හෝ පොලිසියෙන් පාලනය වන අන්තර් ජේදනය කදී නැවතීමේ රේඛාව",
                "නවතිනු සංඥාවේ පිහිටුවන නැවතුම් රේඛාව",
                "වට රවුමක පිහිටුවනු ලබන මාර්ගය ඉඩ දෙනු රේඛාව"
            ]
        },
        {
            numb: 6,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය",
            imgSrc: "/images/onlinepaper/26.png",
            options: [
                "ඉදිරියෙන් මාර්ගය වසා ඇත",
                "දුම්රිය හරස් මාර්ගය ඉදිරියෙනි",
                "ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය",
                "ආරක්ෂා කර නොමැති දුම්රිය හරස් මාර්ගය ඉදිරියෙනි"
            ]
        },
        {
            numb: 7,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "මාර්ගය වසා ඇත",
            imgSrc: "/images/onlinepaper/27.png",
            options: [
                "අනිවාර්යය වට රවුම",
                "ඇතුල් වීම තහනම්",
                "බස් හා ලොරි රථ සඳහා පාර වසා ඇත",
                "මාර්ගය වසා ඇත"
            ]
        },
        {
            numb: 8,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "ලිස්සන සුලු මාර්ගය ඉදිරියෙනි",
            imgSrc: "/images/onlinepaper/28.png",
            options: [
                "ලිස්සන සුලු මාර්ගය ඉදිරියෙනි",
                "වංගු සහිත මාර්ගය ඉදිරියෙනි",
                "අනතුරු දායක මං සන්දිය ඉදිරියෙනි",
                "ඉදිරියෙන් මාර්ගය පටුය"
            ]
        },
        {
            numb: 9,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "ද්විත්ව රථ  මාර්ගයේ අවසානය ඉදිරියෙනි",
            imgSrc: "/images/onlinepaper/29.png",
            options: [
                "Y හැඩය මංසන්ධියෙන් ඉදිරියෙනි",
                "ඉදිරියෙන් මාර්ගය පටුය",
                "ද්විත්ව රථ  මාර්ගයේ අවසානය ඉදිරියෙනි",
                "පටු පාලම ඉදිරියෙනි"
            ]
        },
        {
            numb: 10,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "වට රවුම",
            imgSrc: "/images/onlinepaper/30.png",
            options: [
                "අනිවාර්යෙන් වටරවුම ඉදිරියෙනි",
                "අනිවාර්ය වට රවුම",
                "වට රවුම ඉදිරියෙනි",
                "වට රවුම"
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
        paper_img.innerHTML = img_tag;
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
