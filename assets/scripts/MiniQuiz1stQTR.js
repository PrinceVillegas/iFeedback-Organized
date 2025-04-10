
const questions = [
    {
        question: "What is the main purpose of feedback?",
        answers: [
            { text: "To criticize someone's work", correct: false },
            { text: "To highlight both strengths and areas for improvement", correct: true },
            { text: "To make people feel bad about their efforts", correct: false },
            { text: "To avoid communication", correct: false },
        ],
    },
    {
        question: " What makes feedback effective?",
        answers: [
            { text: "Being delivered in a timely, respectful, and constructive way", correct: true },
            { text: "Avoiding honest opinions to spare feelings", correct: false },
            { text: "Focusing only on the negatives", correct: false },
            { text: "Being overly formal and rigid", correct: false },
        ],
    },
    {
        question: "What type of evaluation is conducted at the end of a project or program to assess its overall success?",
        answers: [
            { text: "Formative evaluation ", correct: false },
            { text: "Summative evaluation", correct: true },
            { text: "Process evaluation  ", correct: false },
            { text: "Developmental evaluation", correct: false },
        ],
    },
    {
        question: "What should feedback ideally focus on?",
        answers: [
            { text: "A person’s weaknesses only", correct: false },
            { text: "General comments without specific examples", correct: false },
            { text: "Both achievements and areas for growth", correct: true },
            { text: "Only positive remarks", correct: false },
        ],
    },
    {
        question: " Why is feedback important in a learning environment?",
        answers: [
            { text: "It reinforces the idea that failure is final", correct: false },
            { text: " It creates confusion about the learning process", correct: false },
            { text: "It guides students on how to improve and succeed", correct: true },
            { text: "It prevents students from asking questions", correct: false },
        ],
    }
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1; 
    questionElement.innerHTML = questionNo + ". " + currentQuestion.
    question;
     
    currentQuestion.answers.forEach((answer) => {
        const button = document.createElement("button");
        button.classList.add("btn");
        button.classList.add("answer-btn");
        button.style.border = "1px solid black";
        button.innerHTML = answer.text;
        answerButtons.appendChild(button); 
        if (answer.correct) {
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click", selectAnswer);
    });
    
}
nextButton.style.display = "block";
nextButton.disabled = true;

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
        Array.from(answerButtons.children).forEach(button => {
            if (button !== selectedBtn) {
                button.disabled = true;
            }
        });
    } else {
        selectedBtn.classList.add("incorrect");
        Array.from(answerButtons.children).forEach(button => {
            if (button.dataset.correct === "true") {
                button.classList.add("correct");
            }
            if (button !== selectedBtn && button.dataset.correct !== "true") {
                button.disabled = true;
            }
        });
    }
    nextButton.disabled = false;
}
function resetState() {
    nextButton.style.display = "block";
    nextButton.disabled = true;
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function showNextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
    } else {
        resetState();
        questionElement.innerHTML = ` Your scored ${score} out of ${questions.length}`;
    }
}

let badgeAwardShown = false;

function showScore() {
  resetState();
  questionElement.innerHTML = `Quiz over! Your score is ${score} out of ${questions.length}!`;
  questionElement.style.paddingTop = "20px";
  questionElement.style.paddingBottom = "20px";
  nextButton.innerHTML = "finish";
  nextButton.classList.add("finish");
  nextButton.disabled = false;
  nextButton.style.display = "block";
  const newIcon = document.createElement("img");
  newIcon.src = "assets/svg/Mini Quiz Trophy Icon.svg";
  newIcon.id = "newQuizIcon";
  document.getElementById("quizIcon").style.display = "none"; // hide the original icon
  questionElement.appendChild(newIcon); // add the new icon
  nextButton.addEventListener("click", () => {
    document.getElementById("pop-up-miniQuiz1stQrt").close();
    if (!badgeAwardShown) {
      setTimeout(() => {
        document.getElementById("Mini-quiz1stQrtBadgeAward").showModal();
      }, 500);
      badgeAwardShown = true;
    }
  });
}
function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    }else{
        showScore();
    }
}
nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
        closeQuiz();
    }
});

startQuiz();