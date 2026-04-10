<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning - AI Fundamentals | AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .learning-container {
            display: flex;
            min-height: calc(100vh - 70px);
        }
        
        .sidebar {
            width: 320px;
            background: var(--surface);
            border-right: 1px solid var(--border);
            overflow-y: auto;
            position: fixed;
            top: 70px;
            bottom: 0;
        }
        
        .main-content {
            flex: 1;
            margin-left: 320px;
            padding: 32px;
        }
        
        .video-container {
            background: #0F172A;
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 32px;
        }
        
        .video-placeholder {
            aspect-ratio: 16 / 9;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1E293B, #0F172A);
            color: white;
        }
        
        .video-placeholder i {
            font-size: 4rem;
            opacity: 0.5;
        }
        
        .lesson-title {
            font-size: 1.5rem;
            margin-bottom: 16px;
        }
        
        .lesson-description {
            color: var(--text-secondary);
            margin-bottom: 24px;
            line-height: 1.6;
        }
        
        .action-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
        }
        
        .module-list {
            list-style: none;
        }
        
        .module-item {
            border-bottom: 1px solid var(--border);
        }
        
        .module-header {
            padding: 16px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }
        
        .module-header:hover {
            background: var(--background);
        }
        
        .lesson-list {
            list-style: none;
            padding-left: 40px;
            display: none;
        }
        
        .lesson-list.active {
            display: block;
        }
        
        .lesson-item {
            padding: 12px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background 0.2s ease;
        }
        
        .lesson-item:hover,
        .lesson-item.active {
            background: var(--background);
            color: var(--primary);
        }
        
        .lesson-item.completed {
            color: var(--success);
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
            font-size: 1.125rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 999;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-btn {
                display: block;
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
                <a href="chatbot.php">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="learning-container">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-book"></i> AI Fundamentals
            </div>
            <ul class="module-list">
                <li class="module-item">
                    <div class="module-header">
                        <span>Module 1: Introduction to AI</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list active">
                        <li class="lesson-item active"><i class="fas fa-play-circle"></i> What is Artificial Intelligence?</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> History of AI</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Types of AI Systems</li>
                    </ul>
                </li>
                <li class="module-item">
                    <div class="module-header">
                        <span>Module 2: Machine Learning Basics</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list">
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Supervised Learning</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Unsupervised Learning</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Reinforcement Learning</li>
                    </ul>
                </li>
                <li class="module-item">
                    <div class="module-header">
                        <span>Module 3: Neural Networks</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list">
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Perceptrons</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Deep Neural Networks</li>
                        <li class="lesson-item"><i class="fas fa-play-circle"></i> Backpropagation</li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="video-container">
                <div class="video-placeholder">
                    <i class="fas fa-play-circle"></i>
                    <span style="margin-left: 16px;">Video Player - What is Artificial Intelligence?</span>
                </div>
            </div>
            
            <h1 class="lesson-title">What is Artificial Intelligence?</h1>
            <p class="lesson-description">Artificial Intelligence (AI) refers to the simulation of human intelligence in machines that are programmed to think and learn. This lesson covers the fundamental concepts, applications, and future of AI technology.</p>
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="markCompleteBtn">Mark as Complete</button>
                <button class="btn btn-outline">Next Lesson →</button>
            </div>
            
            <div class="dashboard-card">
                <h3><i class="fas fa-lightbulb"></i> Key Takeaways</h3>
                <ul style="margin-top: 16px; list-style-position: inside; color: var(--text-secondary);">
                    <li>AI enables machines to perform tasks that typically require human intelligence</li>
                    <li>Key subfields include machine learning, natural language processing, and computer vision</li>
                    <li>AI applications range from virtual assistants to autonomous vehicles</li>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelectorAll('.module-header').forEach(header => {
            header.addEventListener('click', () => {
                const lessonList = header.nextElementSibling;
                lessonList.classList.toggle('active');
                const icon = header.querySelector('i:last-child');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });
        
        document.getElementById('markCompleteBtn')?.addEventListener('click', function() {
            alert('Lesson marked as complete! Progress saved.');
            const activeLesson = document.querySelector('.lesson-item.active');
            if (activeLesson) {
                activeLesson.classList.add('completed');
                activeLesson.querySelector('i').classList.remove('fa-play-circle');
                activeLesson.querySelector('i').classList.add('fa-check-circle');
            }
        });
    </script>
</body>
</html>