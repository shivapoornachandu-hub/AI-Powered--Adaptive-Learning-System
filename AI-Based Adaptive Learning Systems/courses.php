<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 16px;
        }
        
        .filters {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 8px 20px;
            background: rgba(255,255,255,0.2);
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.2s ease;
        }
        
        .filter-btn.active,
        .filter-btn:hover {
            background: white;
            color: var(--primary);
        }
        
        .courses-section {
            padding: 60px 0;
        }
        
        .search-bar {
            max-width: 500px;
            margin: 0 auto 40px;
        }
        
        .search-bar input {
            width: 100%;
            padding: 14px 20px;
            border: 1px solid var(--border);
            border-radius: 50px;
            font-family: inherit;
            font-size: 1rem;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 32px;
        }
        
        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .page-header h1 {
                font-size: 1.75rem;
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
                <a href="courses.php" class="active">Courses</a>
                <a href="chatbot.php">AI Chatbot</a>
                <a href="progress.php">Progress</a>
                <a href="profile.php">Profile</a>
                <a href="login.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>
    
    <div class="page-header">
        <div class="container">
            <h1>Explore Our Courses</h1>
            <p>Master AI, Machine Learning, Data Science and more with expert-led courses</p>
            <div class="filters" id="filters">
                <button class="filter-btn active" data-category="all">All</button>
                <button class="filter-btn" data-category="ai">Artificial Intelligence</button>
                <button class="filter-btn" data-category="ml">Machine Learning</button>
                <button class="filter-btn" data-category="data">Data Science</button>
                <button class="filter-btn" data-category="deep">Deep Learning</button>
            </div>
        </div>
    </div>
    
    <div class="courses-section">
        <div class="container">
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search courses by title or instructor...">
            </div>
            <div class="courses-grid" id="coursesGrid">
                <!-- Courses will be populated by JavaScript -->
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
    <script>
        const coursesData = [
            { id: 1, title: "AI Fundamentals & Machine Learning", category: "ai", instructor: "Dr. Sarah Johnson", duration: "12 hours", rating: 4.9, students: 12450, image: "https://placehold.co/400x250/6366F1/FFFFFF?text=AI+Fundamentals", popularity: 92 },
            { id: 2, title: "Machine Learning A-Z", category: "ml", instructor: "Prof. Michael Chen", duration: "18 hours", rating: 4.8, students: 9870, image: "https://placehold.co/400x250/4F46E5/FFFFFF?text=ML+A-Z", popularity: 88 },
            { id: 3, title: "Data Science Bootcamp", category: "data", instructor: "Emily Rodriguez", duration: "24 hours", rating: 4.7, students: 15600, image: "https://placehold.co/400x250/06B6D4/FFFFFF?text=Data+Science", popularity: 85 },
            { id: 4, title: "Deep Learning with TensorFlow", category: "deep", instructor: "Dr. James Wilson", duration: "16 hours", rating: 4.9, students: 8760, image: "https://placehold.co/400x250/10B981/FFFFFF?text=Deep+Learning", popularity: 90 },
            { id: 5, title: "Natural Language Processing", category: "ai", instructor: "Prof. Lisa Wang", duration: "14 hours", rating: 4.8, students: 6540, image: "https://placehold.co/400x250/F59E0B/FFFFFF?text=NLP", popularity: 86 },
            { id: 6, title: "Computer Vision", category: "deep", instructor: "Dr. Robert Taylor", duration: "15 hours", rating: 4.7, students: 5430, image: "https://placehold.co/400x250/EF4444/FFFFFF?text=Computer+Vision", popularity: 82 }
        ];
        
        function renderCourses(courses) {
            const grid = document.getElementById('coursesGrid');
            if (!grid) return;
            
            grid.innerHTML = courses.map(course => `
                <div class="course-card" data-category="${course.category}">
                    <div class="course-image">
                        <img src="${course.image}" alt="${course.title}">
                        <span class="course-badge">${course.rating} ★</span>
                    </div>
                    <div class="course-content">
                        <h3>${course.title}</h3>
                        <p>By ${course.instructor}</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> ${course.duration}</span>
                            <span><i class="fas fa-users"></i> ${(course.students/1000).toFixed(1)}k students</span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-label">Popularity</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: ${course.popularity}%;"></div>
                            </div>
                        </div>
                        <a href="learning.html" class="btn-enroll">Enroll Now →</a>
                    </div>
                </div>
            `).join('');
        }
        
        function filterAndSearch() {
            const activeFilter = document.querySelector('.filter-btn.active');
            const category = activeFilter ? activeFilter.getAttribute('data-category') : 'all';
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            let filtered = coursesData;
            
            if (category !== 'all') {
                filtered = filtered.filter(c => c.category === category);
            }
            
            if (searchTerm) {
                filtered = filtered.filter(c => 
                    c.title.toLowerCase().includes(searchTerm) || 
                    c.instructor.toLowerCase().includes(searchTerm)
                );
            }
            
            renderCourses(filtered);
        }
        
        // Filter buttons
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                filterAndSearch();
            });
        });
        
        // Search input
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', filterAndSearch);
        }
        
        // Initial render
        renderCourses(coursesData);
    </script>
</body>
</html>