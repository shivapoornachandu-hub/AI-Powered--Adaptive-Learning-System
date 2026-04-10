<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .progress-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 48px 0;
            text-align: center;
        }
        
        .overall-progress {
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            padding: 32px;
            margin-top: 32px;
        }
        
        .circular-progress {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            position: relative;
        }
        
        .circular-progress svg {
            transform: rotate(-90deg);
        }
        
        .progress-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin: 48px 0;
        }
        
        .progress-card {
            background: var(--surface);
            padding: 24px;
            border-radius: var(--radius);
            text-align: center;
        }
        
        .course-progress-item {
            margin-bottom: 24px;
        }
        
        .course-progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .certificate-card {
            background: linear-gradient(135deg, #FEF3C7, #FDE68A);
            padding: 20px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        @media (max-width: 768px) {
            .progress-stats {
                grid-template-columns: repeat(2, 1fr);
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
                <a href="progress.php" class="active">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="progress-header">
        <div class="container">
            <h1>Your Learning Progress</h1>
            <p>Track your achievements and continue your learning journey</p>
            <div class="overall-progress">
                <div class="circular-progress">
                    <svg width="150" height="150">
                        <circle cx="75" cy="75" r="65" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="8"/>
                        <circle cx="75" cy="75" r="65" fill="none" stroke="white" stroke-width="8" stroke-dasharray="408" stroke-dashoffset="163" stroke-linecap="round"/>
                    </svg>
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <div style="font-size: 2rem; font-weight: 700;">60%</div>
                        <div style="font-size: 0.75rem;">Complete</div>
                    </div>
                </div>
                <p style="text-align: center;">Overall Course Completion</p>
            </div>
        </div>
    </div>
    
    <div class="container" style="padding: 60px 0;">
        <div class="progress-stats">
            <div class="progress-card">
                <i class="fas fa-clock" style="font-size: 2rem; color: var(--primary);"></i>
                <div class="stat-number" style="font-size: 1.75rem;">28</div>
                <div class="stat-label">Hours Learned</div>
            </div>
            <div class="progress-card">
                <i class="fas fa-check-double" style="font-size: 2rem; color: var(--primary);"></i>
                <div class="stat-number" style="font-size: 1.75rem;">42</div>
                <div class="stat-label">Lessons Completed</div>
            </div>
            <div class="progress-card">
                <i class="fas fa-trophy" style="font-size: 2rem; color: var(--primary);"></i>
                <div class="stat-number" style="font-size: 1.75rem;">89%</div>
                <div class="stat-label">Quiz Average</div>
            </div>
            <div class="progress-card">
                <i class="fas fa-fire" style="font-size: 2rem; color: var(--primary);"></i>
                <div class="stat-number" style="font-size: 1.75rem;">12</div>
                <div class="stat-label">Day Streak</div>
            </div>
        </div>
        
        <div class="dashboard-card" style="margin-bottom: 32px;">
            <h3><i class="fas fa-chalkboard"></i> Course Progress</h3>
            <div class="course-progress-item">
                <div class="course-progress-header">
                    <span>AI Fundamentals</span>
                    <span>65%</span>
                </div>
                <div class="progress-bar"><div class="progress-fill" style="width: 65%;"></div></div>
            </div>
            <div class="course-progress-item">
                <div class="course-progress-header">
                    <span>Machine Learning A-Z</span>
                    <span>40%</span>
                </div>
                <div class="progress-bar"><div class="progress-fill" style="width: 40%;"></div></div>
            </div>
            <div class="course-progress-item">
                <div class="course-progress-header">
                    <span>Deep Learning with TensorFlow</span>
                    <span>25%</span>
                </div>
                <div class="progress-bar"><div class="progress-fill" style="width: 25%;"></div></div>
            </div>
        </div>
        
        <div class="dashboard-card">
            <h3><i class="fas fa-certificate"></i> Earned Certificates</h3>
            <div class="certificate-card" style="margin-bottom: 16px;">
                <div>
                    <i class="fas fa-certificate" style="font-size: 2rem; color: var(--warning);"></i>
                    <strong style="margin-left: 12px;">Python Programming Essentials</strong>
                </div>
                <span>Issued Jan 2025</span>
            </div>
            <div class="certificate-card">
                <div>
                    <i class="fas fa-certificate" style="font-size: 2rem; color: var(--warning);"></i>
                    <strong style="margin-left: 12px;">AI Fundamentals</strong>
                </div>
                <span>Issued Feb 2025</span>
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
    
    <script src="js/main.js"></script>
</body>
</html>