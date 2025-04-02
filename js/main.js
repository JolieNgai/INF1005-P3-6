
document.addEventListener("DOMContentLoaded", function() {
    registerEventListeners();
});



function activateMenu() {
    const navLinks = document.querySelectorAll('nav a'); 
    const currentPath = window.location.pathname; 

    navLinks.forEach(link => {
 
        if (link.href.includes(currentPath)) {
            const linkHref = link.getAttribute('href'); 
            
            if (linkHref === currentPath) {
                link.classList.add('active');
            } else if (linkHref === currentPath && window.location.hash === "") {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        } else {
            link.classList.remove('active'); 
        }
    });
}

window.onload = activateMenu;

window.addEventListener('hashchange', activateMenu);

// Quiz code
document.addEventListener("DOMContentLoaded", function() {
    registerQuiz1EventListeners();
});

function registerQuiz1EventListeners() {
    const startQuizButton = document.getElementById("startQuiz1Btn");
    const retryQuizButton = document.getElementById("retryQuiz1Btn");

    startQuizButton.addEventListener("click", startQuiz1);
    retryQuizButton.addEventListener("click", retryQuiz1);
}

// Quiz 1 Questions and Answers
const quiz1Questions = [
    {
        question: "What is a food shortage?",
        answers: ["A lack of food", "Overproduction of food", "A natural disaster", "Climate change"],
        correct: 0 // Correct answer is the first option
    },
    {
        question: "Which of the following is a cause of food shortage?",
        answers: ["Natural disasters", "Overproduction", "Technological advancements", "Water abundance"],
        correct: 0 // Correct answer is "Natural disasters"
    },
    {
        question: "What can be disrupted by a food shortage?",
        answers: ["Food production", "Health care", "Education", "Technology"],
        correct: 0 // Correct answer is "Food production"
    }
];

let currentQuestionIndex = 0;
let score = 0;

// Start Quiz 1
function startQuiz1() {
    document.getElementById("quiz1Modal").style.display = "flex"; // Show the modal
    loadQuiz1Question(); // Load the first question
    addCloseModalListener(); // Add the close listener only when the modal is shown
}

// Load Quiz 1 Question
function loadQuiz1Question() {
    const questionText = document.getElementById("questionText");
    const answerButtons = document.getElementById("answerButtons");

    if (currentQuestionIndex < quiz1Questions.length) {
        const currentQuestion = quiz1Questions[currentQuestionIndex];
        questionText.textContent = currentQuestion.question; // Set the question text

        answerButtons.innerHTML = ""; // Clear previous answer buttons
        currentQuestion.answers.forEach((answer, index) => {
            const button = document.createElement("button");
            button.textContent = answer;
            button.classList.add("answer-btn");
            button.addEventListener("click", () => handleQuiz1Answer(index)); // Handle answer click
            answerButtons.appendChild(button);
        });
    } else {
        showQuiz1Results(); // If all questions are answered, show results
    }
}

// Handle Answer for Quiz 1
function handleQuiz1Answer(selectedIndex) {
    const currentQuestion = quiz1Questions[currentQuestionIndex];

    const answerButtons = document.getElementById("answerButtons");
    const feedbackMessage = document.createElement("div");
    feedbackMessage.classList.add("feedback-message");

    if (selectedIndex === currentQuestion.correct) {
        score++; // Correct answer
        feedbackMessage.textContent = "Correct!"; // Show correct message
        feedbackMessage.style.color = "green"; // Green for correct
    } else {
        feedbackMessage.textContent = "Wrong!"; // Show wrong message
        feedbackMessage.style.color = "red"; // Red for wrong
    }

    // Add the feedback message to the DOM
    answerButtons.appendChild(feedbackMessage);

    // Disable all buttons to prevent multiple clicks
    const buttons = answerButtons.querySelectorAll("button");
    buttons.forEach(button => button.disabled = true);

    // Move to the next question after 1 second
    setTimeout(() => {
        currentQuestionIndex++; // Move to the next question
        loadQuiz1Question(); // Load the next question
    }, 1000); // Delay before moving to the next question
}

// Show Results for Quiz 1
function showQuiz1Results() {
    const quiz1Container = document.getElementById("quiz1Container");
    const quiz1Result = document.getElementById("quiz1Result");

    quiz1Container.style.display = "none"; // Hide questions
    quiz1Result.style.display = "block"; // Show results

    document.getElementById("quiz1Score").textContent = score;
    document.getElementById("quiz1TotalQuestions").textContent = quiz1Questions.length;
}

// Retry Quiz 1
function retryQuiz1() {
    score = 0;
    currentQuestionIndex = 0;
    document.getElementById("quiz1Result").style.display = "none"; // Hide results
    document.getElementById("quiz1Container").style.display = "block"; // Show quiz again
    loadQuiz1Question(); // Load the first question
}

// Close Quiz Modal
function addCloseModalListener() {
    const closeButton = document.querySelector(".close-btn");
    closeButton.addEventListener("click", function() {
        document.getElementById("quiz1Modal").style.display = "none"; // Close modal
    });
}

// Quiz 2 Questions and Answers

document.addEventListener("DOMContentLoaded", function() {
    registerQuiz2EventListeners();
});

function registerQuiz2EventListeners() {
    const startQuizButton = document.getElementById("startQuiz2Btn");
    const retryQuizButton = document.getElementById("retryQuiz2Btn");

    startQuizButton.addEventListener("click", startQuiz2);
    retryQuizButton.addEventListener("click", retryQuiz2);
}

const quiz2Questions = [
    {
        question: "What is one way to reduce food waste at the household level?",
        answers: ["Donate food to shelters", "Compost food scraps", "Buy food in bulk", "Increase food production"],
        correct: 1 // Correct answer is "Compost food scraps"
    },
    {
        question: "How can we help reduce food waste in the supply chain?",
        answers: ["Increase food packaging", "Improve storage and transportation infrastructure", "Buy more packaged food", "Increase water consumption"],
        correct: 1 // Correct answer is "Improve storage and transportation infrastructure"
    },
    {
        question: "What is an example of supporting sustainable agriculture?",
        answers: ["Choosing organic or sustainably grown products", "Overfarming land", "Using chemical fertilizers", "Growing monocultures"],
        correct: 0 // Correct answer is "Choosing organic or sustainably grown products"
    },
    {
        question: "Why is it important to buy locally and seasonally?",
        answers: ["It reduces food miles and promotes sustainable farming practices", "It supports industrial agriculture", "It increases water consumption", "It promotes transportation waste"],
        correct: 0 // Correct answer is "It reduces food miles and promotes sustainable farming practices"
    }
];

let currentQuestionIndex2 = 0;
let score2 = 0;

// Start Quiz 2
function startQuiz2() {
    document.getElementById("quiz2Modal").style.display = "flex"; // Show the modal
    loadQuiz2Question(); // Load the first question
}

// Load Quiz 2 Question
function loadQuiz2Question() {
    const questionText2 = document.getElementById("questionText2");
    const answerButtons2 = document.getElementById("answerButtons2");

    // Clear the previous feedback message
    const feedback = document.getElementById("feedbackMessage");
    if (feedback) {
        feedback.remove();
    }

    if (currentQuestionIndex2 < quiz2Questions.length) {
        const currentQuestion = quiz2Questions[currentQuestionIndex2];
        questionText2.textContent = currentQuestion.question; // Set the question text

        answerButtons2.innerHTML = ""; // Clear previous answer buttons
        currentQuestion.answers.forEach((answer, index) => {
            const button = document.createElement("button");
            button.textContent = answer;
            button.classList.add("answer-btn");
            button.addEventListener("click", () => handleQuiz2Answer(index)); // Handle answer click
            answerButtons2.appendChild(button);
        });
    } else {
        showQuiz2Results(); // If all questions are answered, show results
    }
}

// Handle Answer for Quiz 2
function handleQuiz2Answer(selectedIndex) {
    const currentQuestion = quiz2Questions[currentQuestionIndex2];
    const answerButtons2 = document.getElementById("answerButtons2");

    // Show feedback for the answer (correct or incorrect)
    const feedback = document.createElement("p");
    feedback.id = "feedbackMessage";
    if (selectedIndex === currentQuestion.correct) {
        feedback.textContent = "Correct!"; // Correct answer
        feedback.style.color = "green";
        score2++;
    } else {
        feedback.textContent = "Incorrect!"; // Incorrect answer
        feedback.style.color = "red";
    }

    // Add the feedback message to the page
    answerButtons2.appendChild(feedback);

    // Disable buttons after answer is selected
    const buttons = answerButtons2.querySelectorAll("button");
    buttons.forEach(button => button.disabled = true);

    currentQuestionIndex2++; // Move to the next question
    setTimeout(loadQuiz2Question, 1000); // Wait for 1 second before loading the next question
}

// Show Results for Quiz 2
function showQuiz2Results() {
    const quiz2Container = document.getElementById("quiz2Container");
    const quiz2Result = document.getElementById("quiz2Result");

    quiz2Container.style.display = "none"; // Hide questions
    quiz2Result.style.display = "block"; // Show results

    document.getElementById("quiz2Score").textContent = score2;
    document.getElementById("quiz2TotalQuestions").textContent = quiz2Questions.length;
}

// Retry Quiz 2
function retryQuiz2() {
    score2 = 0; // Reset Quiz 2 score
    currentQuestionIndex2 = 0; // Reset Quiz 2 question index
    document.getElementById("quiz2Result").style.display = "none"; // Hide results
    document.getElementById("quiz2Container").style.display = "block"; // Show quiz again
    loadQuiz2Question(); // Load the first question
}


// Close Quiz Modal
document.querySelectorAll(".close-btn").forEach(closeBtn => {
    closeBtn.addEventListener("click", function() {
        document.getElementById("quiz2Modal").style.display = "none"; // Close modal
    });
});

// Register the "Start Quiz 2" button event listener after DOM content is loaded
document.addEventListener("DOMContentLoaded", function() {
    const startQuizButton2 = document.getElementById("startQuiz2Btn");
    startQuizButton2.addEventListener("click", startQuiz2); // Add event listener for Quiz 2 button
});


document.addEventListener("DOMContentLoaded", function() {
 // Progress Bar on Scroll
 window.onscroll = function() {updateProgressBar()};

 function updateProgressBar() {
     const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
     const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
     const scrolled = (winScroll / height) * 100;
     document.getElementById("progressBar").style.width = scrolled + "%";
 }

 // Animation on Scroll
 const fadeElements = document.querySelectorAll('.fade-in');

 function checkFade() {
     fadeElements.forEach(element => {
         const elementTop = element.getBoundingClientRect().top;
         const elementVisible = 150;
         if (elementTop < window.innerHeight - elementVisible) {
             element.classList.add('visible');
         }
     });
 }

 window.addEventListener('scroll', checkFade);
 checkFade(); // Initial check on page load

 // Animated Counter
 const counters = document.querySelectorAll('.count');
 const speed = 200;

 const counterSection = document.querySelector('.counter-section');
 let counterActivated = false;

 window.addEventListener('scroll', () => {
     if (counterSection.getBoundingClientRect().top < window.innerHeight - 100 && !counterActivated) {
         counterActivated = true;
         
         counters.forEach(counter => {
             const updateCount = () => {
                 const target = parseInt(counter.getAttribute('data-count'));
                 const count = parseInt(counter.innerText);
                 const increment = target / speed;

                 if (count < target) {
                     counter.innerText = Math.ceil(count + increment);
                     setTimeout(updateCount, 10);
                 } else {
                     counter.innerText = target;
                 }
             };
             updateCount();
         });
     }
 });

 // Smooth scrolling for anchor links
 document.querySelectorAll('a[href^="#"]').forEach(anchor => {
     anchor.addEventListener('click', function (e) {
         e.preventDefault();

         const targetId = this.getAttribute('href');
         const targetElement = document.querySelector(targetId);

         if (targetElement) {
             window.scrollTo({
                 top: targetElement.offsetTop - 70,
                 behavior: 'smooth'
             });
         }
     });
 });

 // Navbar Shrink on Scroll
 window.addEventListener('scroll', function() {
     const navbar = document.querySelector('.navbar');
     if (window.scrollY > 50) {
         navbar.style.padding = '10px 0';
     } else {
         navbar.style.padding = '15px 0';
     }
 });
});