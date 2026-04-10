<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 32px;
        }
        
        .dashboard-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }
        
        .dashboard-card-full {
            grid-column: span 3;
        }
        
        .dashboard-card h3 {
            font-size: 1.125rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 40px;
            border-radius: var(--radius);
            margin-top: 32px;
        }
        
        .welcome-section h1 {
            font-size: 1.75rem;
            margin-bottom: 8px;
        }
        
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin: 32px 0;
        }
        
        .stat-card {
            background: var(--surface);
            padding: 24px;
            border-radius: var(--radius);
            text-align: center;
            box-shadow: var(--shadow-sm);
        }
        
        .stat-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 12px;
        }
        
        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
        }
        
        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        .continue-course {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            background: var(--background);
            border-radius: var(--radius-sm);
            margin-bottom: 12px;
        }
        
        .continue-course img {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-sm);
            object-fit: cover;
        }
        
        .continue-course-info {
            flex: 1;
        }
        
        .continue-course-info h4 {
            font-size: 1rem;
            margin-bottom: 8px;
        }
        
        .progress-text {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 6px;
        }
        
        @media (max-width: 1024px) {
            .stat-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-card-full {
                grid-column: span 1;
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
                <a href="dashboard.php" class="active">Dashboard</a>
                <a href="courses.php">Courses</a>
                <a href="chatbot.php">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="welcome-section">
            <h1>Welcome back, Alex</h1>
            <p>Continue your learning journey. You're making great progress!</p>
        </div>
        
        <div class="stat-cards">
            <div class="stat-card">
                <i class="fas fa-book-open"></i>
                <div class="stat-number">4</div>
                <div class="stat-label">Active Courses</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-check-circle"></i>
                <div class="stat-number">28</div>
                <div class="stat-label">Lessons Completed</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-fire"></i>
                <div class="stat-number">12</div>
                <div class="stat-label">Day Streak</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-certificate"></i>
                <div class="stat-number">2</div>
                <div class="stat-label">Certificates</div>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3><i class="fas fa-play-circle"></i> Continue Learning</h3>
                <div class="continue-course">
                    <img src="https://placehold.co/60x60/6366F1/FFFFFF?text=AI" alt="Course">
                    <div class="continue-course-info">
                        <h4>AI Fundamentals</h4>
                        <div class="progress-text">Lesson 8 of 12</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 65%;"></div>
                        </div>
                    </div>
                    <a href="learning.html" class="btn-enroll">Resume</a>
                </div>
                <div class="continue-course">
                    <img src="https://placehold.co/60x60/06B6D4/FFFFFF?text=ML" alt="Course">
                    <div class="continue-course-info">
                        <h4>Machine Learning A-Z</h4>
                        <div class="progress-text">Lesson 5 of 15</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 40%;"></div>
                        </div>
                    </div>
                    <a href="learning.html" class="btn-enroll">Resume</a>
                </div>
            </div>
            
            <div class="dashboard-card">
                <h3><i class="fas fa-calendar-alt"></i> Upcoming Quizzes</h3>
                <div class="continue-course">
                    <div>
                        <strong>AI Fundamentals - Module 3 Quiz</strong>
                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">Due in 2 days</p>
                    </div>
                    <a href="quiz.html" class="btn-enroll">Take Quiz</a>
                </div>
                <div class="continue-course">
                    <div>
                        <strong>Data Science - Week 2 Assessment</strong>
                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">Due in 5 days</p>
                    </div>
                    <a href="quiz.html" class="btn-enroll">Take Quiz</a>
                </div>
            </div>
            
            <div class="dashboard-card">
                <h3><i class="fas fa-trophy"></i> Achievements</h3>
                <div class="continue-course">
                    <i class="fas fa-medal" style="font-size: 2rem; color: var(--warning);"></i>
                    <div>
                        <strong>Quick Learner</strong>
                        <p style="font-size: 0.75rem;">Completed 5 lessons in one day</p>
                    </div>
                </div>
                <div class="continue-course">
                    <i class="fas fa-star" style="font-size: 2rem; color: var(--primary);"></i>
                    <div>
                        <strong>Quiz Master</strong>
                        <p style="font-size: 0.75rem;">Scored 100% on 3 quizzes</p>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-card dashboard-card-full">
                <h3><i class="fas fa-chart-line"></i> Weekly Activity</h3>
                <div style="height: 200px; display: flex; align-items: center; justify-content: center; background: var(--background); border-radius: var(--radius-sm);">
                    <p style="color: var(--text-muted);">Chart: 120 minutes this week, up 15% from last week</p>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer" style="margin-top: 60px;">
        <div class="container">
            <div class="footer-bottom">
                <p> 2025 AI Learning Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="js/main.js"></script>
</body>
</html>