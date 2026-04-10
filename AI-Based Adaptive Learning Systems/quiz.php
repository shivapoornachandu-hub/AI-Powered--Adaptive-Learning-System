<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - AI Fundamentals | AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .quiz-container {
            max-width: 800px;
            margin: 48px auto;
            padding: 0 20px;
        }
        
        .quiz-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: var(--shadow-lg);
        }
        
        .quiz-header {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .question-text {
            font-size: 1.25rem;
            margin-bottom: 24px;
            font-weight: 500;
        }
        
        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 32px;
        }
        
        .option {
            display: flex;
            align-items: center;
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .option:hover {
            border-color: var(--primary);
            background: var(--background);
        }
        
        .option.selected {
            border-color: var(--primary);
            background: #EEF2FF;
        }
        
        .option input {
            margin-right: 12px;
        }
        
        .quiz-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .result-container {
            text-align: center;
        }
        
        .score-circle {
            width: 150px;
            height: 150px;
            margin: 20px auto;
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <i class="fas fa-robot" style="color: var(--primary); margin-right: 8px;"></i>
                <span>AI Learning Platform</span>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links" id="navLinks">
                <a href="index.php">Home</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="courses.php">Courses</a>
                <a href="chatbot.pho">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="quiz-container">
        <div class="quiz-card" id="quizCard">
            <div class="quiz-header">
                <h2>AI Fundamentals - Module 1 Quiz</h2>
                <p>Test your knowledge on Introduction to AI</p>
                <div style="margin-top: 16px;">
                    <span class="course-badge">Question 1 of 5</span>
                </div>
            </div>
            
            <div id="questionContainer">
                <div class="question-text" id="questionText"></div>
                <div class="options" id="optionsContainer"></div>
            </div>
            
            <div class="quiz-footer">
                <span id="questionCounter">Question 1 / 5</span>
                <button class="btn btn-primary" id="nextBtn">Next Question →</button>
            </div>
        </div>
        
        <div class="quiz-card hidden" id="resultCard">
            <div class="result-container">
                <i class="fas fa-trophy" style="font-size: 3rem; color: var(--warning);"></i>
                <h2>Quiz Completed!</h2>
                <div class="score-circle">
                    <svg width="150" height="150">
                        <circle cx="75" cy="75" r="65" fill="none" stroke="#E2E8F0" stroke-width="8"/>
                        <circle cx="75" cy="75" r="65" fill="none" stroke="#10B981" stroke-width="8" stroke-dasharray="408" stroke-dashoffset="163" stroke-linecap="round"/>
                    </svg>
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <div style="font-size: 2rem; font-weight: 700;" id="scorePercentage">0%</div>
                        <div style="font-size: 0.75rem;">Score</div>
                    </div>
                </div>
                <p id="resultMessage" style="margin: 20px 0;"></p>
                <div style="display: flex; gap: 16px; justify-content: center;">
                    <button class="btn btn-primary" onclick="location.reload()">Retake Quiz</button>
                    <button class="btn btn-outline" onclick="window.location.href='courses.html'">Back to Courses</button>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p> 2025 AI Learning Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        const questions = [
            {
                text: "What does AI stand for?",
                options: ["Artificial Intelligence", "Automated Interface", "Algorithmic Input", "Advanced Integration"],
                correct: 0
            },
            {
                text: "Which of the following is a subfield of AI?",
                options: ["Machine Learning", "Web Development", "Database Management", "Network Security"],
                correct: 0
            },
            {
                text: "What is the main goal of Artificial Intelligence?",
                options: ["Replace humans completely", "Create machines that can think and learn", "Build faster computers", "Develop video games"],
                correct: 1
            },
            {
                text: "Which programming language is most commonly used for AI development?",
                options: ["Java", "C++", "Python", "JavaScript"],
                correct: 2
            },
            {
                text: "What is machine learning?",
                options: ["A type of computer hardware", "A subset of AI that enables systems to learn from data", "A programming language", "A database system"],
                correct: 1
            }
        ];
        
        let currentQuestion = 0;
        let userAnswers = new Array(questions.length).fill(null);
        
        const quizCard = document.getElementById('quizCard');
        const resultCard = document.getElementById('resultCard');
        const questionText = document.getElementById('questionText');
        const optionsContainer = document.getElementById('optionsContainer');
        const nextBtn = document.getElementById('nextBtn');
        const questionCounter = document.getElementById('questionCounter');
        
        function loadQuestion() {
            const q = questions[currentQuestion];
            questionText.textContent = q.text;
            questionCounter.textContent = `Question ${currentQuestion + 1} / ${questions.length}`;
            
            optionsContainer.innerHTML = '';
            q.options.forEach((option, index) => {
                const optionDiv = document.createElement('div');
                optionDiv.className = `option ${userAnswers[currentQuestion] === index ? 'selected' : ''}`;
                optionDiv.innerHTML = `
                    <input type="radio" name="question" value="${index}" ${userAnswers[currentQuestion] === index ? 'checked' : ''}>
                    <span>${option}</span>
                `;
                optionDiv.addEventListener('click', () => {
                    document.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
                    optionDiv.classList.add('selected');
                    const radio = optionDiv.querySelector('input');
                    radio.checked = true;
                    userAnswers[currentQuestion] = index;
                });
                optionsContainer.appendChild(optionDiv);
            });
            
            if (currentQuestion === questions.length - 1) {
                nextBtn.textContent = 'Submit Quiz';
            } else {
                nextBtn.textContent = 'Next Question →';
            }
        }
        
        function calculateScore() {
            let correct = 0;
            questions.forEach((q, idx) => {
                if (userAnswers[idx] === q.correct) correct++;
            });
            return (correct / questions.length) * 100;
        }
        
        function showResults() {
            const score = calculateScore();
            const scorePercentage = document.getElementById('scorePercentage');
            const resultMessage = document.getElementById('resultMessage');
            
            scorePercentage.textContent = `${Math.round(score)}%`;
            
            const svgCircle = document.querySelector('#resultCard svg circle:last-child');
            const circumference = 408;
            const offset = circumference - (score / 100) * circumference;
            svgCircle.style.strokeDashoffset = offset;
            
            if (score >= 80) {
                resultMessage.innerHTML = '<i class="fas fa-star" style="color: #F59E0B;"></i> Excellent work! You have mastered the material.';
            } else if (score >= 60) {
                resultMessage.innerHTML = '<i class="fas fa-thumbs-up"></i> Good job! Review the topics you missed to improve further.';
            } else {
                resultMessage.innerHTML = '<i class="fas fa-book-open"></i> Keep learning! Review the module and try again.';
            }
            
            quizCard.classList.add('hidden');
            resultCard.classList.remove('hidden');
        }
        
        nextBtn.addEventListener('click', () => {
            if (userAnswers[currentQuestion] === null) {
                alert('Please select an answer before continuing.');
                return;
            }
            
            if (currentQuestion === questions.length - 1) {
                showResults();
            } else {
                currentQuestion++;
                loadQuestion();
            }
        });
        
        loadQuestion();
    </script>
</body>
</html>