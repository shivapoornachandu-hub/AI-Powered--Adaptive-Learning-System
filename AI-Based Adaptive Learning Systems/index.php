<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Learning Platform - Master Future Skills</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Section 1: Navigation Bar -->
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
                <a href="index.php" class="active">Home</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="courses.php">Courses</a>
                <a href="chatbot.php">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign In</a>
            </div>
        </div>
    </nav>

    <!-- Section 2: Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <h1>Master AI & Future Skills with Personalized Learning</h1>
                    <p>Learn artificial intelligence, machine learning, data science, and more with our AI-powered adaptive platform. Get real-time feedback and track your progress.</p>
                    <div class="hero-buttons">
                        <a href="courses.html" class="btn btn-primary">Start Learning Now</a>
                        <a href="#features" class="btn btn-outline">Explore Features</a>
                    </div>
                    <div class="hero-stats">
                        <div><span>50K+</span> Active Students</div>
                        <div><span>200+</span> Expert Courses</div>
                        <div><span>95%</span> Success Rate</div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://placehold.co/600x500/6366F1/FFFFFF?text=AI+Learning+Illustration" alt="AI Learning Platform Hero Illustration">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Our AI Learning Platform</h2>
                <p>Cutting-edge features designed to accelerate your learning journey</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>AI-Powered Tutor</h3>
                    <p>Get personalized guidance and answers to your questions 24/7 from our intelligent assistant.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-user"></i>
                    </div>
                    <h3>Personalized Learning Paths</h3>
                    <p>Courses adapt to your skill level and learning pace for maximum efficiency.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3>Interactive Quizzes</h3>
                    <p>Test your knowledge with AI-generated quizzes that reinforce key concepts.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Detailed Progress Analytics</h3>
                    <p>Track your improvement with comprehensive metrics and visual reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Popular Courses Section -->
    <section class="popular-courses">
        <div class="container">
            <div class="section-header">
                <h2>Most Popular Courses</h2>
                <p>Join thousands of students learning the most in-demand skills</p>
            </div>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-image">
                        <img src="https://placehold.co/400x250/4F46E5/FFFFFF?text=AI+Fundamentals" alt="AI Fundamentals Course">
                        <span class="course-badge">Best Seller</span>
                    </div>
                    <div class="course-content">
                        <h3>AI Fundamentals & Machine Learning</h3>
                        <p>Master the core concepts of artificial intelligence and neural networks.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 12 hours</span>
                            <span><i class="fas fa-star" style="color: #F59E0B;"></i> 4.9</span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-label">Popularity</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 92%;"></div>
                            </div>
                        </div>
                        <a href="learning.html" class="btn-enroll">Enroll Now →</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image">
                        <img src="https://placehold.co/400x250/06B6D4/FFFFFF?text=Data+Science" alt="Data Science Course">
                    </div>
                    <div class="course-content">
                        <h3>Data Science Bootcamp</h3>
                        <p>Learn data analysis, visualization, and real-world problem solving.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 24 hours</span>
                            <span><i class="fas fa-star" style="color: #F59E0B;"></i> 4.8</span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-label">Popularity</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 88%;"></div>
                            </div>
                        </div>
                        <a href="learning.html" class="btn-enroll">Enroll Now →</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image">
                        <img src="https://placehold.co/400x250/10B981/FFFFFF?text=Deep+Learning" alt="Deep Learning Course">
                        <span class="course-badge">Trending</span>
                    </div>
                    <div class="course-content">
                        <h3>Deep Learning with TensorFlow</h3>
                        <p>Build neural networks and deploy AI models in production.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 18 hours</span>
                            <span><i class="fas fa-star" style="color: #F59E0B;"></i> 4.7</span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-label">Popularity</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 85%;"></div>
                            </div>
                        </div>
                        <a href="learning.html" class="btn-enroll">Enroll Now →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: AI Chatbot Preview Section -->
    <section class="chatbot-preview">
        <div class="container">
            <div class="chatbot-preview-content">
                <div class="chatbot-info">
                    <h2>Your Personal AI Learning Assistant</h2>
                    <p>Get instant answers, explanations, and study tips from our intelligent chatbot. Available 24/7 to support your learning journey.</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Instant answers to coding questions</li>
                        <li><i class="fas fa-check-circle"></i> Concept explanations and examples</li>
                        <li><i class="fas fa-check-circle"></i> Study plan recommendations</li>
                        <li><i class="fas fa-check-circle"></i> Practice problem generation</li>
                    </ul>
                    <a href="chatbot.html" class="btn btn-primary">Try AI Assistant Now</a>
                </div>
                <div class="chatbot-demo">
                    <div class="chat-window">
                        <div class="chat-header">
                            <i class="fas fa-robot"></i>
                            <span>AI Tutor Online</span>
                        </div>
                        <div class="chat-messages">
                            <div class="message bot">
                                <div class="message-bubble">Hello! I'm your AI learning assistant. Ask me anything about your courses!</div>
                            </div>
                            <div class="message user">
                                <div class="message-bubble">How do I start with machine learning?</div>
                            </div>
                            <div class="message bot">
                                <div class="message-bubble">Great question! I recommend starting with Python basics, then linear algebra, followed by our AI Fundamentals course. Would you like a personalized study plan?</div>
                            </div>
                        </div>
                        <div class="chat-input">
                            <input type="text" placeholder="Ask me anything...">
                            <button><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Students Say</h2>
                <p>Join thousands of successful learners who transformed their careers</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"The AI-powered tutor helped me understand complex concepts quickly. I landed my first data science job within 3 months of completing the program!"</p>
                    <div class="testimonial-author">
                        <img src="https://placehold.co/50x50/6366F1/FFFFFF?text=JD" alt="Student Avatar">
                        <div>
                            <h4>Jessica Davis</h4>
                            <span>Data Scientist at TechCorp</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"The interactive quizzes and progress tracking kept me motivated throughout. The personalized learning path saved me months of trial and error."</p>
                    <div class="testimonial-author">
                        <img src="https://placehold.co/50x50/06B6D4/FFFFFF?text=MC" alt="Student Avatar">
                        <div>
                            <h4>Michael Chen</h4>
                            <span>AI Engineer at InnovateAI</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>"Best investment in my career. The community support and AI chatbot made learning enjoyable and effective. Highly recommended for beginners."</p>
                    <div class="testimonial-author">
                        <img src="https://placehold.co/50x50/10B981/FFFFFF?text=SP" alt="Student Avatar">
                        <div>
                            <h4>Sarah Patel</h4>
                            <span>ML Specialist at DataFlow</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">Active Students</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Expert Courses</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1,500+</div>
                    <div class="stat-label">Certificates Issued</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">25+</div>
                    <div class="stat-label">Industry Partners</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 8: Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>AI Learning Platform</h3>
                    <p>Empowering learners worldwide with AI-driven education. Master future skills at your own pace.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Platform</h4>
                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="courses.html">Courses</a></li>
                        <li><a href="chatbot.html">AI Chatbot</a></li>
                        <li><a href="progress.html">Progress</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">API Documentation</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h4>Stay Updated</h4>
                    <p>Get the latest updates on new courses and features.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p> 2025 AI Learning Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>