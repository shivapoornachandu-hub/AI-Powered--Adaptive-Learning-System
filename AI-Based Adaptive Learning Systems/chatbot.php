<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot Assistant - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .chatbot-page {
            min-height: calc(100vh - 140px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #EEF2FF 0%, #F8FAFC 100%);
        }
        
        .chatbot-container {
            max-width: 900px;
            width: 100%;
            background: var(--surface);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            overflow: hidden;
        }
        
        .chatbot-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 24px 32px;
        }
        
        .chatbot-header h1 {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .chatbot-header p {
            opacity: 0.9;
            font-size: 0.875rem;
        }
        
        .chat-messages-area {
            height: 500px;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background: #F9FAFB;
        }
        
        .message {
            display: flex;
            gap: 12px;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .message.bot {
            justify-content: flex-start;
        }
        
        .message.user {
            justify-content: flex-end;
        }
        
        .message-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
        }
        
        .message.user .message-avatar {
            background: var(--secondary);
        }
        
        .message-content {
            max-width: 70%;
        }
        
        .message-bubble {
            padding: 12px 18px;
            border-radius: 18px;
            font-size: 0.9375rem;
            line-height: 1.5;
        }
        
        .message.bot .message-bubble {
            background: white;
            color: var(--text-primary);
            border-top-left-radius: 4px;
            box-shadow: var(--shadow-sm);
        }
        
        .message.user .message-bubble {
            background: var(--primary);
            color: white;
            border-top-right-radius: 4px;
        }
        
        .message-time {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 4px;
            margin-left: 8px;
        }
        
        .suggestions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            padding: 16px 24px;
            background: white;
            border-top: 1px solid var(--border);
        }
        
        .suggestion-chip {
            padding: 8px 16px;
            background: var(--background);
            border-radius: 25px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .suggestion-chip:hover {
            background: var(--primary);
            color: white;
        }
        
        .chat-input-area {
            display: flex;
            padding: 20px 24px;
            gap: 12px;
            border-top: 1px solid var(--border);
            background: white;
        }
        
        .chat-input-area input {
            flex: 1;
            padding: 12px 18px;
            border: 1px solid var(--border);
            border-radius: 30px;
            font-family: inherit;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease;
        }
        
        .chat-input-area input:focus {
            border-color: var(--primary);
        }
        
        .chat-input-area button {
            width: 48px;
            height: 48px;
            background: var(--primary);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        
        .chat-input-area button:hover {
            background: var(--primary-dark);
        }
        
        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 12px 18px;
            background: white;
            border-radius: 18px;
            width: fit-content;
        }
        
        .typing-indicator span {
            width: 8px;
            height: 8px;
            background: var(--text-muted);
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }
        
        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.4;
            }
            30% {
                transform: translateY(-8px);
                opacity: 1;
            }
        }
        
        @media (max-width: 768px) {
            .message-content {
                max-width: 85%;
            }
            
            .suggestions {
                overflow-x: auto;
            }
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
                <a href="chatbot.php" class="active">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="chatbot-page">
        <div class="chatbot-container">
            <div class="chatbot-header">
                <h1><i class="fas fa-robot"></i> AI Learning Assistant</h1>
                <p>Your 24/7 intelligent tutor. Ask me anything about your courses, concepts, or study plans.</p>
            </div>
            
            <div class="chat-messages-area" id="chatMessages">
                <div class="message bot">
                    <div class="message-avatar"><i class="fas fa-robot"></i></div>
                    <div class="message-content">
                        <div class="message-bubble">Hello! I'm your AI learning assistant. I can help you with course recommendations, explain concepts, create study plans, and answer your questions. What would you like to learn today?</div>
                        <div class="message-time">Just now</div>
                    </div>
                </div>
            </div>
            
            <div class="suggestions">
                <div class="suggestion-chip" data-question="What courses do you recommend for beginners?">Beginner courses</div>
                <div class="suggestion-chip" data-question="Explain machine learning in simple terms">Explain ML simply</div>
                <div class="suggestion-chip" data-question="Create a study plan for AI">Study plan for AI</div>
                <div class="suggestion-chip" data-question="How to track my progress?">Track progress</div>
            </div>
            
            <div class="chat-input-area">
                <input type="text" id="chatInput" placeholder="Type your question here...">
                <button id="sendBtn"><i class="fas fa-paper-plane"></i></button>
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
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        
        function getTimestamp() {
            const now = new Date();
            return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }
        
        function addMessage(message, isUser) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            avatar.innerHTML = isUser ? '<i class="fas fa-user"></i>' : '<i class="fas fa-robot"></i>';
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const bubble = document.createElement('div');
            bubble.className = 'message-bubble';
            bubble.textContent = message;
            
            const time = document.createElement('div');
            time.className = 'message-time';
            time.textContent = getTimestamp();
            
            contentDiv.appendChild(bubble);
            contentDiv.appendChild(time);
            messageDiv.appendChild(avatar);
            messageDiv.appendChild(contentDiv);
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'message bot';
            typingDiv.id = 'typingIndicator';
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            avatar.innerHTML = '<i class="fas fa-robot"></i>';
            
            const indicator = document.createElement('div');
            indicator.className = 'typing-indicator';
            indicator.innerHTML = '<span></span><span></span><span></span>';
            
            typingDiv.appendChild(avatar);
            typingDiv.appendChild(indicator);
            chatMessages.appendChild(typingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function removeTypingIndicator() {
            const indicator = document.getElementById('typingIndicator');
            if (indicator) indicator.remove();
        }
        
        function getAIResponse(userMessage) {
            const lowerMsg = userMessage.toLowerCase();
            
            if (lowerMsg.includes('beginner') || lowerMsg.includes('start') || lowerMsg.includes('recommend')) {
                return "For beginners, I recommend starting with 'AI Fundamentals' course. It covers Python basics, introduction to machine learning, and neural networks. Would you like me to create a personalized learning path for you?";
            } else if (lowerMsg.includes('machine learning') && lowerMsg.includes('explain')) {
                return "Machine Learning is a subset of AI where computers learn from data without being explicitly programmed. Think of it like teaching a child to recognize cats by showing many pictures. The more examples, the better it gets!";
            } else if (lowerMsg.includes('study plan')) {
                return "Here's a suggested 3-month study plan for AI:\n\nMonth 1: Python Programming + Math Basics\nMonth 2: Machine Learning Fundamentals\nMonth 3: Deep Learning + Projects\n\nWould you like me to break this down week by week?";
            } else if (lowerMsg.includes('progress') || lowerMsg.includes('track')) {
                return "You can track your progress in the Progress page. It shows completed lessons, quiz scores, time spent, and certificates earned. Each course also has its own progress bar.";
            } else if (lowerMsg.includes('quiz')) {
                return "We have interactive quizzes after each module. They help reinforce learning. You can find quizzes in each course page or visit the Quiz section from your dashboard.";
            } else if (lowerMsg.includes('python')) {
                return "Python is the most popular language for AI. We have a comprehensive Python course covering data types, functions, OOP, and libraries like NumPy and Pandas.";
            } else {
                return "That's an excellent question! To give you the best answer, could you please specify which course or topic you're referring to? I'm here to help with AI, Machine Learning, Data Science, Python, and study strategies.";
            }
        }
        
        async function sendMessage() {
            const message = chatInput.value.trim();
            if (!message) return;
            
            addMessage(message, true);
            chatInput.value = '';
            
            showTypingIndicator();
            
            setTimeout(() => {
                removeTypingIndicator();
                const response = getAIResponse(message);
                addMessage(response, false);
            }, 1000);
        }
        
        sendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
        
        document.querySelectorAll('.suggestion-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                const question = chip.getAttribute('data-question');
                chatInput.value = question;
                sendMessage();
            });
        });
    </script>
</body>
</html>