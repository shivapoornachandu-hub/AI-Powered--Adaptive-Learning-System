/* ============================================
   AI LEARNING PLATFORM - MAIN JAVASCRIPT
   Interactive features, mobile menu, chatbot demo
   ============================================ */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // MOBILE MENU TOGGLE
    // ============================================
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking on a link
    const allNavLinks = document.querySelectorAll('.nav-links a');
    allNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navLinks) {
                navLinks.classList.remove('active');
            }
        });
    });
    
    // ============================================
    // CHATBOT DEMO FUNCTIONALITY (on homepage)
    // ============================================
    const chatInput = document.querySelector('.chat-input input');
    const chatSendBtn = document.querySelector('.chat-input button');
    const chatMessages = document.querySelector('.chat-messages');
    
    // Predefined AI responses
    const aiResponses = {
        default: "That's a great question! I'd recommend checking out our AI Fundamentals course for a solid foundation. Would you like me to share more details?",
        python: "Python is an excellent language for AI and machine learning. We have a Python for Data Science course that covers everything from basics to advanced concepts.",
        machine: "Machine learning is a subset of AI that enables systems to learn from data. Our ML course covers supervised learning, unsupervised learning, and neural networks.",
        start: "To start your AI journey, I recommend: 1) Learn Python basics, 2) Take our AI Fundamentals course, 3) Practice with real projects. Shall I create a personalized study plan for you?",
        quiz: "You can test your knowledge by visiting the Quiz section. We have quizzes for every course to help reinforce your learning.",
        progress: "Your progress is tracked automatically. Visit the Progress page to see detailed analytics, completed lessons, and certificates earned.",
        course: "We offer over 200 courses covering AI, Machine Learning, Data Science, Deep Learning, and more. Check out the Courses page to explore all options."
    };
    
    function getAIResponse(userMessage) {
        const lowerMsg = userMessage.toLowerCase();
        
        if (lowerMsg.includes('python')) {
            return aiResponses.python;
        } else if (lowerMsg.includes('machine learning') || lowerMsg.includes('ml')) {
            return aiResponses.machine;
        } else if (lowerMsg.includes('start') || lowerMsg.includes('begin') || lowerMsg.includes('where to start')) {
            return aiResponses.start;
        } else if (lowerMsg.includes('quiz') || lowerMsg.includes('test')) {
            return aiResponses.quiz;
        } else if (lowerMsg.includes('progress') || lowerMsg.includes('track')) {
            return aiResponses.progress;
        } else if (lowerMsg.includes('course') || lowerMsg.includes('learn')) {
            return aiResponses.course;
        } else {
            return aiResponses.default;
        }
    }
    
    function addMessage(message, isUser) {
        if (!chatMessages) return;
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
        
        const bubble = document.createElement('div');
        bubble.className = 'message-bubble';
        bubble.textContent = message;
        
        messageDiv.appendChild(bubble);
        chatMessages.appendChild(messageDiv);
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function sendChatMessage() {
        if (!chatInput || !chatMessages) return;
        
        const userMessage = chatInput.value.trim();
        if (userMessage === '') return;
        
        // Add user message
        addMessage(userMessage, true);
        
        // Clear input
        chatInput.value = '';
        
        // Simulate AI thinking with slight delay
        setTimeout(() => {
            const aiResponse = getAIResponse(userMessage);
            addMessage(aiResponse, false);
        }, 500);
    }
    
    if (chatSendBtn && chatInput) {
        chatSendBtn.addEventListener('click', sendChatMessage);
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendChatMessage();
            }
        });
    }
    
    // ============================================
    // ANIMATE PROGRESS BARS ON SCROLL
    // ============================================
    const progressBars = document.querySelectorAll('.progress-fill');
    
    function animateProgressBars() {
        progressBars.forEach(bar => {
            const width = bar.style.width;
            if (width && !bar.hasAttribute('data-animated')) {
                bar.style.width = '0%';
                bar.setAttribute('data-animated', 'true');
                
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            }
        });
    }
    
    // Intersection Observer for progress bars
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bars = entry.target.querySelectorAll('.progress-fill');
                bars.forEach(bar => {
                    const width = bar.style.width;
                    if (width && !bar.hasAttribute('data-animated')) {
                        bar.style.width = '0%';
                        bar.setAttribute('data-animated', 'true');
                        
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 100);
                    }
                });
            }
        });
    }, observerOptions);
    
    // Observe all course cards that contain progress bars
    const courseCards = document.querySelectorAll('.course-card');
    courseCards.forEach(card => {
        observer.observe(card);
    });
    
    // ============================================
    // NEWSLETTER FORM SUBMISSION
    // ============================================
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = this.querySelector('input[type="email"]');
            if (emailInput && emailInput.value.trim()) {
                alert('Thank you for subscribing! You will receive updates on new courses and features.');
                emailInput.value = '';
            } else {
                alert('Please enter a valid email address.');
            }
        });
    }
    
    // ============================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#' && targetId !== '') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
    // ============================================
    // ADD HOVER EFFECTS FOR COURSE CARDS
    // ============================================
    const allCourseCards = document.querySelectorAll('.course-card');
    allCourseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
    });
    
    // ============================================
    // STATIC DATA FOR FUTURE PAGES (Mock Data)
    // ============================================
    window.userData = {
        name: 'Alex Johnson',
        email: 'alex@example.com',
        enrolledCourses: 4,
        completedLessons: 28,
        totalLessons: 95,
        streakDays: 12,
        certificates: 2
    };
    
    window.coursesData = [
        { id: 1, title: 'AI Fundamentals', progress: 65, category: 'AI' },
        { id: 2, title: 'Machine Learning A-Z', progress: 40, category: 'ML' },
        { id: 3, title: 'Deep Learning with TensorFlow', progress: 25, category: 'Deep Learning' },
        { id: 4, title: 'Data Science Bootcamp', progress: 80, category: 'Data Science' }
    ];
    
    console.log('AI Learning Platform - JavaScript Loaded Successfully');
});