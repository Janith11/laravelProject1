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
</style>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="mb-3">
    <img class="image-fluid p-0 m-0" src="/images/landingpage/examcover.png" alt="Card image cap" style="width: 100%; height: auto;">
</div>
<div class="container mb-5">
    <div class="row">
        <a href="{{route('onlinepaper')}}">
            <h5 style="color: #222944; font-weight: bold; padding-top: 3px">All Papers</h5>
        </a>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a style="padding-top: 3px; padding-left: 10px" href="#"> / paper 02</a>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-3">
        <h1 class="mb-5 text-center">Paper 02</h1>
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
            <div class="card-header">Rules of this question paper</div>
            <div class="card-body">
                <ol>
                    <li>You will have only 15 seconds per each question.</li>
                    <li>Once you select a answer you can't reselect it.</li>
                    <li>You have to answer the questions within the given time.</li>
                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit, quaerat..</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure!.</li>
                </ol>
                <div class="text-right buttons">
                    <button class="btn btn-danger quit">Exit</button>
                    <button class="btn btn-primary restart">Contibue</button>
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
                    <h5>Time Left<span class=" p-2 bg-dark text-light ml-3 rounded">15</span></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-5 col-sm-5 col-xs-4 text-center p-4 paper_img">
                        {{-- <img src="/images/onlinepaper/1.jpg" alt="" style="max-width: 200px;"> --}}
                    </div>

                    <div class="option_list col-md-7 col-sm-7 col-xs-8">
                        {{-- option 01  --}}
                        {{-- <div class="option border rounded border-success mb-2 alert-success">
                            <div class="row p-1">
                                <div class="col-10">
                                    <span style="font-size: 20px;"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්</span>
                                </div>
                                <div class="col-2 p-1">
                                    <div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- option 02  --}}
                        {{-- <div class="option border rounded border-danger mb-2 alert-danger">
                            <div class="row p-1">
                                <div class="col-10">
                                    <span style="font-size: 20px;"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්</span>
                                </div>
                                <div class="col-2 p-1">
                                    <div class="myicon text-danger"><i class="far fa-times-circle fa-lg"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- option 03  --}}
                        {{-- <div class="option border rounded border-success mb-2">
                            <div class="row p-1">
                                <div class="col-10">
                                    <span style="font-size: 20px;"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්</span>
                                </div>
                                <div class="col-2 p-1">
                                    <div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- option 04  --}}
                        {{-- <div class="option border rounded border-success mb-2">
                            <div class="row p-1">
                                <div class="col-10">
                                    <span style="font-size: 20px;"> 1.ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්</span>
                                </div>
                                <div class="col-2 p-1">
                                    <div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div>
                                </div>
                            </div>
                        </div> --}}
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
        <div class="" style="display: none">
            <div class="card-body alert-success border border-primary">
                <div class="row">
                    <div class="col text-center mt-2 p-5">
                        <i class="fas fa-trophy fa-5x text-warning"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <h4 class="text-success">Congratulations! You just complete the Quiz!</h4>
                        <h4>Sorry, You have only 2 out of 10</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right pr-5">
                        <button class="btn btn-danger">Exit</button>
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

    // question array
    let questions = [
        {
            numb: 1,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්",
            imgSrc: "/images/onlinepaper/1.jpg",
            options: [
                "ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්",
                "ඔත්තේ දිනවල වාහන ඇතුළු වීම  තහනම්",
                "ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම්",
                "ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්"
            ]
        },
        {
            numb: 2,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?222",
            answer: "ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම්",
            imgSrc: "/images/onlinepaper/2.png",
            options: [
                "ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්222",
                "ඔත්තේ දිනවල වාහන ඇතුළු වීම  තහනම්",
                "ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම්",
                "ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්"
            ]
        },
        {
            numb: 3,
            question: "මෙම මාර්ග ලකුණින් දැක්වෙන්නේ?",
            answer: "ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම්",
            imgSrc: "/images/onlinepaper/3.png",
            options: [
                "ඉරට්ටේ දිනවල වාහන ඇතුලුවීම තහනම්",
                "ඔත්තේ දිනවල වාහන ඇතුළු වීම  තහනම්",
                "ඉරට්ටේ දිනවල වාහන නැවැත්වීම තහනම්",
                "ඔත්තේ දිනවල වාහන නැවැත්වීම තහනම්"
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
    }

    let que_count = 0;
    let queNumber = 1;

    //when press next btn
    next_btn.onclick = () =>{
        if(que_count < questions.length - 1 ){
            que_count++;
            queNumber++;
            showQuestions(que_count);
            queCounter(queNumber);
        }else{
            console.log("Questions over");
        }
    }



    function showQuestions(index){
        const que_text = document.querySelector(".que_text");
        const option_list = document.querySelector(".option_list");
        const paper_img =document.querySelector(".paper_img");

        let img_tag = '<img src='+questions[index].imgSrc +' alt="" style="max-width: 200px;">';
        paper_img.innerHTML = img_tag;
        let que_tag = '<h5 style="font-size: 25px;font-weight: 450">'+questions[index].numb+". "+questions[index].question+'</h5>';
        let option_tag = '<div class="option border rounded border-success mb-2 alert-success"><div class="row      p-1"><div class="col-10"><span style="font-size: 20px;">'+questions[index].options[0]+'</span></div>    <div class="col-2 p-1"><div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div></div></div></div>'
        +'<div class="option border rounded border-success mb-2 alert-success"><div class="row      p-1"><div class="col-10"><span style="font-size: 20px;">'+questions[index].options[1]+'</span></div>    <div class="col-2 p-1"><div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div></div></div></div>'
        +'<div class="option border rounded border-success mb-2 alert-success"><div class="row      p-1"><div class="col-10"><span style="font-size: 20px;">'+questions[index].options[2]+'</span></div>    <div class="col-2 p-1"><div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div></div></div></div>'
        +'<div class="option border rounded border-success mb-2 alert-success"><div class="row      p-1"><div class="col-10"><span style="font-size: 20px;">'+questions[index].options[3]+'</span></div>    <div class="col-2 p-1"><div class="myicon text-success"><i class="far fa-check-circle fa-lg"></i></div></div></div></div>';


        que_text.innerHTML = que_tag;
        option_list.innerHTML=option_tag;
        const option = option_list.querySelectorAll(".option");
        for(let i = 0; i< option.length; i++){
            option[i].setAttribute("onclick", "optionSelected(this)");
        }
    }

    function optionSelected(answer){
        var userAns = answer.textContent;
        var correctAns = questions[que_count].answer;
        console.log(correctAns);
        console.log(userAns);
        if(correctAns==userAns){
            // alert('wrong');
            console.log("Answer is corect");
        }else{
            // alert('correct');
            console.log("Answer is wrong");
        }


    }

    function queCounter(index){
         //question number bottom
         const total_que= document.querySelector(".total_que");
        let totalQuestionTag = '<p><span>'+index+'</span> of 10 Questions</p>';
        total_que.innerHTML = totalQuestionTag;
    }



</script>
@endsection
