@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/stylewish.css?v={{ time() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/frontend/style_quiz.css?v={{ time() }}">
<style>

</style>
@endsection
@section('content')
    <div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-body">
                <div class="wrapper">
                    <div class="text-center">
                        <br>
                        <h1>Chamily Quiz!<img src="/img_champooart/champoo_student.png" width="90" height="90"></img></h1>
                    </div>
                    <br>
                    <!-- start Quiz button -->
                    <div class="text-center">
                    </div>
                    <div class="start_btn"><button>เริ่ม!</button></div>
                </div>

                <!-- Info Box -->
                <div class="info_box text-start">
                    <div class="info-title"><span>- กฎกติกาก่อนเริ่มเล่น -</span></div>
                    <div class="info-list">
                        <div class="info">1. คุณจะมีเวลา <span>15 วินาที</span> ต่อคำถาม</div>
                        <div class="info">2. เมื่อหมดเวลาจะไม่สามารถเลือกคำตอบได้</div>
                        <div class="info">3. เลือกคำตอบแล้วจะถือว่าตอบเลยเปลี่ยนไม่ได้</div>
                        <div class="info">4. คุณไม่สามารถออก <span>Quiz</span> ในขณะที่เล่นอยู่ได้</div>
                        <div class="info">5. คุณจะได้รับคะแนนตามคำตอบที่ตอบถูกต้อง</div>
                    </div>
                    <div class="buttons">
                        <button class="quit">ทำใจก่อน</button>
                        <button class="restart">เริ่มกันเลย!</button>
                    </div>
                </div>

                <!-- Quiz Box -->
                <div class="quiz_box">
                    <header>
                        <div class="title">Chamily Quiz</div>
                        <div class="timer">
                            <div class="time_left_txt">เวลาที่เหลือ</div>
                            <div class="timer_sec">15</div>
                        </div>
                        <div class="time_line"></div>
                    </header>
                    <section>
                        <div class="que_text">
                            <!-- Here I've inserted question from JavaScript -->
                        </div>
                        <div class="option_list">
                            <!-- Here I've inserted options from JavaScript -->
                        </div>
                    </section>

                    <!-- footer of Quiz Box -->
                    <footer>
                        <div class="total_que">
                            <!-- Here I've inserted Question Count Number from JavaScript -->
                        </div>
                        <button class="next_btn">ต่อไป</button>
                    </footer>
                </div>


                <!-- Result Box -->
                <div class="result_box">
                    <div class="icon" style="text-align: center;">
                        <!-- <i class="fas fa-crown"></i> -->
                        <img src="/img_champooart/capybara.png" width="25%" height="25%" />
                        <img src="/img_champooart/mumu.png" width="25%" height="25%" />
                        <img src="/img_champooart/dino.png" width="25%" height="25%" />
                    </div>
                    <div class="complete_text">คุณทำ <span>Quiz</span> เสร็จแล้ว!</div>
                    <div class="score_text text-center">
                        <!-- Here I've inserted Score Result from JavaScript -->
                    </div>
                    <div class="buttons">
                        <button class="restart">ขอแก้มือ!</button>
                        <button class="quit">พอใจแล้ว</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function generateUniqueRandomNumber(min, max, array) {
        let randomNumber;
        do {
            randomNumber = getRandomNumber(min, max);
        } while (array.includes(randomNumber));

        return randomNumber;
    }
    // creating an array and passing the number, questions, options, and answers
let questions = [
    {
        numb: 1,
        question: "งาน Concert magical chu chu chu แชมพูร้องเพลง ลา ลา รัก กับใคร?",
        answer: "จิงจิง",
        options: [
        "นานา",
        "จิงจิง",
        "แองเจิ้ล",
        "สิตา"
        ]
    },
        {
        numb: 2,
        question: "บ้านเกิดแชมพูอยู่ที่จังหวัดอะไร?",
        answer: "ลำปาง",
        options: [
        "กรุงเทพ",
        "เชียงใหม่",
        "เชียงราย",
        "ลำปาง"
        ]
    },
        {
        numb: 3,
        question: "อันดับเลือกตั้ง General election ครั้งที่ 3 แชมพูติดอันดับที่เท่าไหร่?",
        answer: "23",
        options: [
        "21",
        "22",
        "23",
        "24"
        ]
    },
        {
        numb: 4,
        question: "อันดับเลือกตั้ง General election ครั้งที่ 4 แชมพูติดอันดับที่เท่าไหร่?",
        answer: "10",
        options: [
        "7",
        "8",
        "9",
        "10"
        ]
    },
        {
        numb: 5,
        question: "ชื่อจริงของแชมพู",
        answer: "กชพร ลีละทีป",
        options: [
        "กชพร ลีละทีป",
        "กชพร ลีลทีป",
        "กชพร ลีละทีบ",
        "กชพร พรโชคชัย"
        ]
    },
        {
        numb: 6,
        question: "งาน CGM48 Fanmeet ครั้งแรกแชมพูอยู่บูธอะไร?",
        answer: "ทำอาหาร",
        options: [
        "เล่นเกม",
        "ทำอาหาร",
        "ศิลปะ",
        "กีฬา"
        ]
    },
        {
        numb: 7,
        question: "งานกีฬาสีอนุบาลหนูน้อย 48 แชมพูอยู่สีอะไร?",
        answer: "เขียว",
        options: [
        "แดง",
        "เหลือง",
        "เขียว",
        "ฟ้า"
        ]
    },
        {
        numb: 8,
        question: "แชมพูเกิด วัน/เดือน/ปี อะไร?",
        answer: "10/10/2548",
        options: [
        "10/10/2546",
        "10/10/2547",
        "10/10/2548",
        "10/10/2549"
        ]
    },
        {
        numb: 9,
        question: "แชมพูได้เป็น Center ครั้งแรกในเพลงอะไร?",
        answer: "Eien Pressure",
        options: [
        "ลา ลา รัก",
        "Eien Pressure",
        "Sayonara Crawl",
        "รถไฟสายรุ้ง"
        ]
    },
    {
        numb: 10,
        question: "ตุ๊กตาที่อยู่ข้างกายแชมพูมาตั้งแต่เด็กชื่ออะไร?",
        answer: "มูมู่",
        options: [
        "มูมู่",
        "มีมี่",
        "ออเรนจิ",
        "โมโม่"
        ]
    },
    {
        numb: 11,
        question: "แมว CGM48 ประจำตัวแชมพูชื่อว่าอะไร?",
        answer: "หอมนวล",
        options: [
        "คิระคิระ",
        "พะโล้",
        "ปริ้นเซส",
        "หอมนวล"
        ]
    },
    {
        numb: 12,
        question: "ไลฟ์ที่นานที่สุดของแชมพูใน IAM วันที่เท่าไหร่?",
        answer: "16/03/2563",
        options: [
        "17/01/2563",
        "15/02/2563",
        "16/03/2563",
        "26/04/2563"
        ]
    },
    {
        numb: 13,
        question: "เพลงหลักเพลงแรกที่แชมพูติดเซ็มบัตสึคือเพลงอะไร?",
        answer: "มะลิ",
        options: [
        "เชียงใหม่ 106",
        "Melon Juice",
        "มะลิ",
        "Eien Pressure"
        ]
    },
    {
        numb: 14,
        question: "เพลงประกอบภาพยนตร์ Cheese Sister ที่แชมพูร้องชื่อเพลงอะไร?",
        answer: "ลาลารัก",
        options: [
        "ลาลารัก",
        "bye bye",
        "ชีสพาย",
        "ข้างๆ"
        ]
    },

    {
        numb: 15,
        question: "บูธงานมัตรสึริของแชมพู ปี 2567 ชื่อ บูธอะไร?",
        answer: "baby gangster",
        options: [
        "So-pan",
        "baby gangster",
        "i mou to camping",
        "maid my day"
        ]
    },

    {
        numb: 16,
        question: "ไลฟ์แรกของแชมพูวันที่เท่าไร?",
        answer: "25/12/2562",
        options: [
        "25/12/2562",
        "26/12/2562",
        "27/12/2562",
        "28/12/2562"
        ]
    },

    {
        numb: 17,
        question: "เพลงรองที่แชมพูเป็น double Center คู่กับคนิ้งมีชื่อภาษาญี่ปุ่นว่าอะไร?",
        answer: "Niji no ressha",
        options: [
        "Niji no ressha",
        "Maeshika Mukanee",
        "Sansei Kawaii",
        "Otona e no Michi"
        ]
    },
    {
        numb: 18,
        question: "ประเทศแรกที่แชมพูได้ไปต่างประเทศ คือประเทศอะไร?",
        answer: "เกาหลี",
        options: [
        "จีน",
        "เกาหลี",
        "ญี่ปุ่น",
        "ไต้หวัน"
        ]
    },
    {
        numb: 19,
        question: "ตุ๊กตาตัวโปรดที่แชมพูชอบพกไปต่างจังหวัดเสมอ มีชื่อว่าอะไร?",
        answer: "มูมู่",
        options: [
        "ออเรนจิ",
        "มูมู่",
        "โมโม่",
        "คิระ"
        ]
    },
    {
        numb: 20,
        question: "คุกกี้ประจำตัวในแอพ IAM ของแชมพู มีชื่อว่าอะไร?",
        answer: "เหลืองอ๋อย",
        options: [
        "น้องเห็ด",
        "เปาเปา",
        "สายรุ้ง",
        "เหลืองอ๋อย"
        ]
    },
    {
        numb: 21,
        question: "ภาพยนต์เรื่องแรกที่มีแชมพูร่วมแสดง มีชื่อเรื่องว่าอะไร?",
        answer: "ห้าวเป้งจ๋า อย่าแกงน้อง",
        options: [
        "cheese sister",
        "ห้าวเป้งจ๋า อย่าแกงน้อง",
        "One take",
        "girl don't cry"
        ]
    }
];

//selecting all required elements
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// if startQuiz button clicked
start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); //show info box
}

// if exitQuiz button clicked
exit_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
}

// if continueQuiz button clicked
continue_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box
    let newRandomNumber = generateUniqueRandomNumber(0, (questions.length-1), ans_ques);
    ans_ques.push(newRandomNumber);
    showQuetions(newRandomNumber); //calling showQestions function
    queCounter(1); //passing 1 parameter to queCounter
    startTimer(15); //calling startTimer function
    startTimerLine(0); //calling startTimerLine function
}

let timeValue =  15;
let que_count = 0;
let que_final = 10;
let ans_ques = [];
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");

// if restartQuiz button clicked
restart_quiz.onclick = ()=>{
    quiz_box.classList.add("activeQuiz"); //show quiz box
    result_box.classList.remove("activeResult"); //hide result box
    timeValue = 15; 
    que_count = 0;
    que_final = 10;
    ans_ques = [];
    que_numb = 1;
    userScore = 0;
    widthValue = 0;
    let newRandomNumber = generateUniqueRandomNumber(0, (questions.length-1), ans_ques);
    ans_ques.push(newRandomNumber);
    showQuetions(newRandomNumber); //calling showQestions function
    queCounter(que_numb); //passing que_numb value to queCounter
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    startTimer(timeValue); //calling startTimer function
    startTimerLine(widthValue); //calling startTimerLine function
    timeText.textContent = "Time Left"; //change the text of timeText to Time Left
    next_btn.classList.remove("show"); //hide the next button
}

// if quitQuiz button clicked
quit_quiz.onclick = ()=>{
    window.location.reload(); //reload the current window
}

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

// if Next Que button clicked
next_btn.onclick = ()=>{
    if(que_count < que_final - 1){ //if question count is less than total question length
        que_count++; //increment the que_count value
        que_numb++; //increment the que_numb value
        let newRandomNumber = generateUniqueRandomNumber(0, (questions.length-1), ans_ques);
        ans_ques.push(newRandomNumber);
        showQuetions(newRandomNumber); //calling showQestions function
        queCounter(que_numb); //passing que_numb value to queCounter
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        startTimer(timeValue); //calling startTimer function
        startTimerLine(widthValue); //calling startTimerLine function
        timeText.textContent = "Time Left"; //change the timeText to Time Left
        next_btn.classList.remove("show"); //hide the next button
    }else{
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        showResult(); //calling showResult function
    }
}

// getting questions and options from array
function showQuetions(index){
    const que_text = document.querySelector(".que_text");
    //creating a new span and div tag for question and option and passing the value using array index
    let que_tag = '<span>'+ (que_count+1) + ". " + questions[index].question +'</span>';
    let option_tag = '<div class="option"><span>'+ questions[index].options[0] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[1] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[2] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[3] +'</span></div>';
    que_text.innerHTML = que_tag; //adding new span tag inside que_tag
    option_list.innerHTML = option_tag; //adding new div tag inside option_tag
    
    const option = option_list.querySelectorAll(".option");

    // set onclick attribute to all available options
    for(i=0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
}
// creating the new div tags which for icons
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected(answer){
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    let userAns = answer.textContent; //getting user selected option
    let lastIndex = ans_ques.length - 1;
    let correcAns = questions[ans_ques[lastIndex]].answer; //getting correct answer from array
    const allOptions = option_list.children.length; //getting all option items
    
    if(userAns == correcAns){ //if user selected option is equal to array's correct answer
        userScore += 1; //upgrading score value with 1
        answer.classList.add("correct"); //adding green color to correct selected option
        answer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to correct selected option
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore);
    }else{
        answer.classList.add("incorrect"); //adding red color to correct selected option
        answer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to correct selected option
        console.log("Wrong Answer");

        for(i=0; i < allOptions; i++){
            if(option_list.children[i].textContent == correcAns){ //if there is an option which is matched to an array answer 
                option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                console.log("Auto selected correct answer.");
            }
        }
    }
    for(i=0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
    }
    next_btn.classList.add("show"); //show the next button if user selected any option
}

function showResult(){
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.remove("activeQuiz"); //hide quiz box
    result_box.classList.add("activeResult"); //show result box
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3){ // if user scored more than 3
        //creating a new span tag and passing the user score number and total question number
        let scoreTag = '<span>ยินดีด้วย!🎊<br>คุณทำได้ '+ userScore +' คะแนน<br>จาก '+ que_final +' ข้อ</span>';
        scoreText.innerHTML = scoreTag;  //adding new span tag inside score_Text
    }
    else if(userScore > 1){ // if user scored more than 1
        let scoreTag = '<span>ทำได้ดี!😎<br>คุณทำได้ '+ userScore +' คะแนน<br>จาก '+ que_final +' ข้อ</span>';
        scoreText.innerHTML = scoreTag;
    }
    else{ // if user scored less than 1
        let scoreTag = '<span>เสียใจด้วย😐<br>คุณทำได้ '+ userScore +' คะแนน<br>จาก '+ que_final +' ข้อ</span>';
        scoreText.innerHTML = scoreTag;
    }
}

function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        timeCount.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if(time < 9){ //if timer is less than 9
            let addZero = timeCount.textContent; 
            timeCount.textContent = "0" + addZero; //add a 0 before time value
        }
        if(time < 0){ //if timer is less than 0
            clearInterval(counter); //clear counter
            timeText.textContent = "Time Off"; //change the time text to time off
            const allOptions = option_list.children.length; //getting all option items
            let correcAns = questions[que_count].answer; //getting correct answer from array
            for(i=0; i < allOptions; i++){
                if(option_list.children[i].textContent == correcAns){ //if there is an option which is matched to an array answer
                    option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn.classList.add("show"); //show the next button if user selected any option
        }
    }
}

function startTimerLine(time){
    counterLine = setInterval(timer, 29);
    function timer(){
        time += 1; //upgrading time value with 1
        time_line.style.width = time + "px"; //increasing width of time_line with px by time value
        if(time > 549){ //if time value is greater than 549
            clearInterval(counterLine); //clear counterLine
        }
    }
}

function queCounter(index){
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ que_final +'</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
}
</script>
@endsection