<?php
session_start();
require_once 'config/database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();

$user_id = $_SESSION['user_id'];
$success = '';
$error = '';

// Fetch user data
$query = "SELECT * FROM users WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch user statistics
$statsQuery = "SELECT 
                    COUNT(DISTINCT e.course_id) as enrolled_courses,
                    COUNT(DISTINCT CASE WHEN e.completed_at IS NOT NULL THEN e.course_id END) as completed_courses,
                    SUM(CASE WHEN up.is_completed = 1 THEN 1 ELSE 0 END) as completed_lessons,
                    (SELECT COUNT(*) FROM user_achievements WHERE user_id = :user_id) as achievements_earned
                FROM users u
                LEFT JOIN enrollments e ON u.id = e.user_id
                LEFT JOIN user_progress up ON up.user_id = u.id AND up.is_completed = 1
                WHERE u.id = :user_id2
                GROUP BY u.id";
$statsStmt = $db->prepare($statsQuery);
$statsStmt->bindParam(':user_id', $user_id);
$statsStmt->bindParam(':user_id2', $user_id);
$statsStmt->execute();
$stats = $statsStmt->fetch(PDO::FETCH_ASSOC);

if (!$stats) {
    $stats = ['enrolled_courses' => 0, 'completed_courses' => 0, 'completed_lessons' => 0, 'achievements_earned' => 0];
}

// Handle Profile Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $name = trim($_POST['name']);
    $bio = trim($_POST['bio']);
    $skills = trim($_POST['skills']);
    $interests = trim($_POST['interests']);
    $learning_goal = trim($_POST['learning_goal']);
    
    if (empty($name)) {
        $error = "Name is required";
    } else {
        $updateQuery = "UPDATE users SET 
                        name = :name, 
                        bio = :bio, 
                        skills = :skills, 
                        interests = :interests, 
                        learning_goal = :learning_goal,
                        updated_at = NOW()
                        WHERE id = :id";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':name', $name);
        $updateStmt->bindParam(':bio', $bio);
        $updateStmt->bindParam(':skills', $skills);
        $updateStmt->bindParam(':interests', $interests);
        $updateStmt->bindParam(':learning_goal', $learning_goal);
        $updateStmt->bindParam(':id', $user_id);
        
        if ($updateStmt->execute()) {
            $_SESSION['user_name'] = $name;
            $success = "Profile updated successfully!";
            // Refresh user data
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $error = "Failed to update profile";
        }
    }
}

// Handle Password Change
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Verify current password
    if (password_verify($current_password, $user['password'])) {
        if (strlen($new_password) < 6) {
            $error = "New password must be at least 6 characters";
        } elseif ($new_password !== $confirm_password) {
            $error = "New passwords do not match";
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE users SET password = :password WHERE id = :id";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindParam(':password', $hashed_password);
            $updateStmt->bindParam(':id', $user_id);
            
            if ($updateStmt->execute()) {
                $success = "Password changed successfully!";
            } else {
                $error = "Failed to change password";
            }
        }
    } else {
        $error = "Current password is incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .profile-container {
            max-width: 1000px;
            margin: 48px auto;
            padding: 0 20px;
        }
        
        .profile-header {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 40px;
            text-align: center;
            margin-bottom: 32px;
            box-shadow: var(--shadow-sm);
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .profile-avatar i {
            font-size: 3rem;
            color: white;
        }
        
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }
        
        .stat-box {
            background: var(--surface);
            padding: 20px;
            border-radius: var(--radius);
            text-align: center;
            box-shadow: var(--shadow-sm);
        }
        
        .stat-box i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .stat-box .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .stat-box .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .alert-error {
            background: #FEE2E2;
            color: #DC2626;
            border: 1px solid #FECACA;
        }
        
        .alert-success {
            background: #D1FAE5;
            color: #059669;
            border: 1px solid #A7F3D0;
        }
        
        .profile-tabs {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--border);
        }
        
        .profile-tab {
            padding: 12px 24px;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            font-family: inherit;
        }
        
        .profile-tab.active {
            color: var(--primary);
            border-bottom: 2px solid var(--primary);
        }
        
        .profile-content {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 32px;
            box-shadow: var(--shadow-sm);
        }
        
        .tab-pane {
            display: none;
        }
        
        .tab-pane.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 1rem;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .btn-save {
            background: var(--primary);
            color: white;
            padding: 12px 32px;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
        }
        
        .btn-save:hover {
            background: var(--primary-dark);
        }
        
        hr {
            margin: 30px 0;
            border-color: var(--border);
        }
        
        @media (max-width: 768px) {
            .profile-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .profile-tab {
                padding: 12px 16px;
                font-size: 0.875rem;
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
                <a href="profile.php" class="active">Profile</a>
                <a href="logout.php" class="btn-login">Sign Out</a>
            </div>
        </div>
    </nav>

    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h2><?php echo htmlspecialchars($user['name']); ?></h2>
            <p><?php echo htmlspecialchars($user['email']); ?></p>
            <p><small>Member since <?php echo date('F Y', strtotime($user['created_at'])); ?></small></p>
        </div>
        
        <!-- Stats Section -->
        <div class="profile-stats">
            <div class="stat-box">
                <i class="fas fa-book-open"></i>
                <div class="stat-number"><?php echo $stats['enrolled_courses']; ?></div>
                <div class="stat-label">Enrolled Courses</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-check-circle"></i>
                <div class="stat-number"><?php echo $stats['completed_courses']; ?></div>
                <div class="stat-label">Completed Courses</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-play-circle"></i>
                <div class="stat-number"><?php echo $stats['completed_lessons']; ?></div>
                <div class="stat-label">Lessons Completed</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-trophy"></i>
                <div class="stat-number"><?php echo $stats['achievements_earned']; ?></div>
                <div class="stat-label">Achievements</div>
            </div>
        </div>
        
        <!-- Alert Messages -->
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <button class="profile-tab active" data-tab="edit-profile">Edit Profile</button>
            <button class="profile-tab" data-tab="change-password">Change Password</button>
            <button class="profile-tab" data-tab="account-settings">Account Settings</button>
        </div>
        
        <div class="profile-content">
            <!-- Edit Profile Tab -->
            <div class="tab-pane active" id="edit-profile">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" rows="4" placeholder="Tell us about yourself..."><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Skills (comma separated)</label>
                        <input type="text" name="skills" value="<?php echo htmlspecialchars($user['skills'] ?? ''); ?>" placeholder="Python, Machine Learning, Data Analysis">
                    </div>
                    
                    <div class="form-group">
                        <label>Interests</label>
                        <input type="text" name="interests" value="<?php echo htmlspecialchars($user['interests'] ?? ''); ?>" placeholder="AI, Web Development, Cloud Computing">
                    </div>
                    
                    <div class="form-group">
                        <label>Learning Goal</label>
                        <textarea name="learning_goal" rows="3" placeholder="What do you want to achieve?"><?php echo htmlspecialchars($user['learning_goal'] ?? ''); ?></textarea>
                    </div>
                    
                    <button type="submit" name="update_profile" class="btn-save">Save Changes</button>
                </form>
            </div>
            
            <!-- Change Password Tab -->
            <div class="tab-pane" id="change-password">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" required>
                        <small>Password must be at least 6 characters</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirm_password" required>
                    </div>
                    
                    <button type="submit" name="change_password" class="btn-save">Change Password</button>
                </form>
            </div>
            
            <!-- Account Settings Tab -->
            <div class="tab-pane" id="account-settings">
                <h3>Account Information</h3>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                    <small>Email cannot be changed. Contact support for assistance.</small>
                </div>
                
                <div class="form-group">
                    <label>Account Status</label>
                    <input type="text" value="<?php echo $user['email_verified'] ? 'Verified' : 'Unverified'; ?>" disabled>
                </div>
                
                <hr>
                
                <h3>Danger Zone</h3>
                <p style="color: var(--text-secondary); margin-bottom: 20px;">Once you delete your account, there is no going back. Please be certain.</p>
                <button class="btn-save" style="background: #DC2626;" onclick="confirmDelete()">Delete Account</button>
            </div>
        </div>
    </div>
    
    <footer class="footer" style="margin-top: 60px;">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2025 AI Learning Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.profile-tab');
        const panes = document.querySelectorAll('.tab-pane');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Show appropriate pane
                panes.forEach(pane => {
                    pane.classList.remove('active');
                    if (pane.id === tabName) {
                        pane.classList.add('active');
                    }
                });
            });
        });
        
        function confirmDelete() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                if (confirm('Type "DELETE" to confirm your account deletion.')) {
                    window.location.href = 'delete_account.php';
                }
            }
        }
    </script>
</body>
</html>