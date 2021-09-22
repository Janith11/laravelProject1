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
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 07</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 07</h1>
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

    // question array 67
    let questions = [
        {
            numb: 1,
            question: "ශ්‍රී ලංකාවේ මාර්ග නීති සංග්‍රහයේ අනතුරු හැඟවීමේ සංඥා දක්වා ඇත්තේ?",
            answer: "කහ පසුබිමෙහි කළු වර්ණයෙනි",
            imgSrc: "/images/onlinepaper/1.jpg",
            options: [
                "නිල් පසුබිමේ සුදු වර්ණයෙනි",
                "රතු පසුබිමෙහි සුදු වර්ණයෙනි",
                "කහ පසුබිමෙහි කළු වර්ණයෙනි",
                "සුදු පසුබිමේ රතු වර්ණයෙනි"
            ]
        },
        {
            numb: 2,
            question: "වට රවුමක මූලික නීතිය වනුයේ?",
            answer: "ඔබට දකුණෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි",
            imgSrc: "/images/onlinepaper/2.png",
            options: [
                "ඔබට දකුණෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි",
                "ඔබට වම් පසින් හෝ ආසන්ව පැමිණෙන  රථවාහන වලට ඉඩ දිය යුතුයි",
                "අධික රථවාහන තදබදය සහිත දිශාවෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි",
                "ඔබට ඔහොම බසින් හෝ ආසන්නව දකුණෙන් පැමිණෙන රථ වාහන වලට ඉඩ දිය යුතුයි"
            ]
        },
        {
            numb: 3,
            question: "එක් දිශාවකට මන්තීරු තුනක් සහිත මාර්ගයක ඔබගේ වාහනය ඉදිරියට ගමන් කරන අවස්ථාවක දී ඔබ විසින් තෝරාගත යුතු මන්තීරු  වනුයේ?",
            answer: "මාර්ගය මැද මංතීරුවය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "මාර්ගයේ මැද තීරුව හෝ දකුණු පස මං තීරුවය",
                "මාර්ගයේ දකුණු පස මංතීරුවය",
                "මාර්ගයේ වම්පස මන්තීරුවය",
                "මාර්ගය මැද මංතීරුවය"
            ]
        },
        {
            numb: 4,
            question: "ඔබගේ වාහනය හා ඔබට ඉදිරියෙන් ධාවනය වන වාහන අතර ප්‍රමාණවත් දුරක් තබා ගත යුත්තේ?",
            answer: "ඔබට ඉදිරියෙන් ධාවනය වන වාහනයේ රියදුරු හදිසියේ නතර කලහොත් ඔබට ඔබගේ වාහනය ආරක්ෂාකාරී ලෙස නතර කර ගැනීමට හැකි වන නිසාය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඔබට ඉදිරියෙන් ධාවනය වන වාහන වාහනයේ රියදුරු තැන හදිසියේ නතර කළහොත් එම වාහනය පසු කර යෑමට ඔබට වැඩි වෙලාවක් ලැබෙන නිසාය",
                "ඔබට ඉදිරියෙන් ධාවනය වන වාහනයේ රියදුරු හදිසියේ නතර කලහොත් ඔබට ඔබගේ වාහනය ආරක්ෂාකාරී ලෙස නතර කර ගැනීමට හැකි වන නිසාය",
                "ඔබට ඉදිරියෙන් ධාවනය වන වාහනයට ඉස්සර කිරීමට වැඩි  ඉඩක් ලැබෙන නිසාය",
                "ඔබට ඉදිරියෙන් ධාවනය වන වාහනය පසුපසින් ධාවනය කිරීමට වඩාත් පහසු වන නිසාය"
            ]
        },
        {
            numb: 5,
            question: "වාහනේක අවදානම හැඟීම් ඒ ලාම්පු පාවිච්චි කිරීම කළ යුත්තේ?",
            answer: "වාහනය අබල තත්ත්වයකට පත්වන අමතා තිබේ දී පමණි",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "වාහනය අබල තත්ත්වයකට පත්වන අමතා තිබේ දී පමණි",
                "වාහනයක් හදිසි තත්වයක් නිසා ධාවනය කරන බව දැක්වීම සඳහාය",
                "හන්දියකදී  වාහනයක් කෙලින්ම ධාවනය කිරීමට අදහස් කරන අවස්ථාවේදීය",
                "ප්‍රමුඛතාව ලබා ගැනීමටය"
            ]
        },
        {
            numb: 6,
            question: "වෙනත් වාහනයක්  විසින් ඔබගේ වාහනය පත්තු කරන අවස්ථාවකදී?",
            answer: "ඔබගේ වාහන වේගය වැඩි නොකර පසු කරන්නාට  ඔබගේ වාහනය පසුකර යාමට ඉඩ දිය යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඔබ පසු කර යාමට ඉඩ දීමට කැමැත්තක් නොදක්වන්නේ  නම් ඔබගේ වාහනය දකුණුපස සංඥා දැල්විය යුතුය",
                "ඔබගේ වාහනය අඩු ගියරයකට යොදා නතර කිරීමට සූදානම් විය යුතුය",
                "ඔබගේ වාහන වේගය වැඩි නොකර පසු කරන්නාට  ඔබගේ වාහනය පසුකර යාමට ඉඩ දිය යුතුය",
                "ඔබ පසුකර යාමට ඉඩ දීමට කැමැත්තක් නොදක්වන නම් උඹට වාහනය වේගය වැඩි කළ හැකිය"
            ]
        },
        {
            numb: 7,
            question: "මංසන්ධි කොටුව සලකුණු කර ඇති  ස්ථානයකදී?",
            answer: "දකුණට හැරවීමේදී හැර පිටවීමට ඇති මාර්ගය අවහිර නම් මංසන්ධි කොටුව තුලට ඇතුළු නො විය යුතුය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඔබ කෙලින්ම ඉදිරියට ගමන් කරන්නේ නම් ඔබට මංසන්ධි කොටුව තුළට ඇතුළු  විය හැක",
                "දකුණට හැරවීමේදී හැර පිටවීමට ඇති මාර්ගය අවහිර නම් මංසන්ධි කොටුව තුලට ඇතුළු නො විය යුතුය",
                "දකුණට හැරවීමට හැර ඕනෑම අවස්ථාවකදී ඔබට මංසන්ධි  කොටුව තුළට ඇතුළු විය හැක",
                "ඕනෑම අවස්ථාවක ඔබට මංසන්ධි කොටුව තුළට ඇතුළු විය  හැකිය"
            ]
        },
        {
            numb: 8,
            question: "වාහනයක් නතර කර තැබිය හැකි ස්ථානයක් වන්නේ?",
            answer: "මං සන්ධියක සිට මීටර 25 ක සීමාවෙන් පිටතය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "මං සන්ධියක සිට මීටර 25 ක සීමාවෙන් පිටතය",
                "බස්රථ නැවතුමක සිට මීටර 20 ක සීමාවෙන් පිටතය",
                "පා ගාමින් මාරු වන ස්ථානයක දඟර ප්‍රදේශයක හෝ එහි සිට මීටර් 10 ක  සීමාවෙන් පිටතය",
                "ගිනි නිවන ජලනළයක සිට මීටර දහයක සීමාවෙන් පිටය"
            ]
        },
        {
            numb: 9,
            question: "ඔබ වෙනත් වාහනයකට ඉස්සර නො කළ යුත්තේ?",
            answer: "පදික මාරුවකදී හෝ එයට ලඟා වන අවස්ථාවකදීය",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ආරෝග්‍ය ශාලාවක් ඉදිරියේ හෝ එයට ලඟා වන අවස්ථාවකදීය",
                "උසාවියක් ඉදිරියේ හෝ එයට ලඟා වන අවස්ථාවකදීය",
                "මාර්ගය මත පිහිටා ඇති කඩ ඉරි නොකැපෙන සේය",
                "පදික මාරුවකදී හෝ එයට ලඟා වන අවස්ථාවකදීය"
            ]
        },
        {
            numb: 10,
            question: "ඔබගේ වාහනය මාර්ග අනතුරකට භාජනය වුවහොත්?",
            answer: "වාහනේ පිහිටීම මාර්ගය මත සලකුණු කර අනතුරට පත් පුද්ගලයන් රැගෙන ඒම සඳහා වාහනය පාවිච්චි කළ හැක",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "අනතුරට පත් වාහනය කඩිනමින් මාර්ගයෙන් ඉවත් කර පොලිසියට වාර්තා කළ යුතුය",
                "වාහනේ පිහිටීම මාර්ගය මත සලකුණු කර අනතුරට පත් පුද්ගලයන් රැගෙන ඒම සඳහා වාහනය පාවිච්චි කළ හැක",
                "අනතුරට පත් වාහන පොලිස් නිලධාරියකු පැමිණෙන තෙක් ඉවත් නොකළ යුතුය",
                "හැකි විගස වාහනය මාර්ගයෙන් ඉවතට ගෙන එහි කාර්මික දෝෂ තිබේදැයි පරික්ෂා කළ යුතුය"
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
        window.location.reload();
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
