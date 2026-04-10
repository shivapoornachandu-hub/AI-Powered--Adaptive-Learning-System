 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - AI Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #EEF2FF 0%, #F8FAFC 100%);
        }
        
        .auth-card {
            background: var(--surface);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            max-width: 480px;
            width: 100%;
            padding: 48px;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .auth-header h1 {
            font-size: 1.75rem;
            margin-bottom: 8px;
        }
        
        .auth-header p {
            color: var(--text-secondary);
        }
        
        .auth-tabs {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
            border-bottom: 2px solid var(--border);
        }
        
        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            font-family: inherit;
        }
        
        .auth-tab.active {
            color: var(--primary);
            border-bottom: 2px solid var(--primary);
            margin-bottom: -2px;
        }
        
        .auth-form {
            display: none;
        }
        
        .auth-form.active {
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
        
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.2s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .btn-auth {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
            font-family: inherit;
        }
        
        .btn-auth:hover {
            background: var(--primary-dark);
        }
        
        .social-login {
            margin-top: 32px;
            text-align: center;
        }
        
        .social-login p {
            color: var(--text-secondary);
            margin-bottom: 16px;
            position: relative;
        }
        
        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: var(--border);
        }
        
        .social-login p::before {
            left: 0;
        }
        
        .social-login p::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
        }
        
        .social-btn {
            flex: 1;
            padding: 10px;
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.2s ease;
            font-family: inherit;
        }
        
        .social-btn:hover {
            background: var(--background);
        }
        
        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        @media (max-width: 768px) {
            .auth-card {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <i class="fas fa-robot" style="font-size: 2.5rem; color: var(--primary); margin-bottom: 16px;"></i>
                <h1>Welcome to AI Learning Platform</h1>
                <p>Sign in to continue your learning journey</p>
            </div>
            
            <div class="auth-tabs">
                <button class="auth-tab active" data-tab="login">Sign In</button>
                <button class="auth-tab" data-tab="signup">Create Account</button>
            </div>
            
            <!-- Login Form -->
            <div class="auth-form active" id="login-form">
                <form id="login-form-element">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="you@example.com" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter your password" required>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn-auth">Sign In</button>
                </form>
                
                <div class="social-login">
                    <p>Or continue with</p>
                    <div class="social-buttons">
                        <button class="social-btn"><i class="fab fa-google"></i> Google</button>
                        <button class="social-btn"><i class="fab fa-github"></i> GitHub</button>
                    </div>
                </div>
            </div>
            
            <!-- Signup Form -->
            <div class="auth-form" id="signup-form">
                <form id="signup-form-element">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="you@example.com" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Create a password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn-auth">Create Account</button>
                </form>
                
                <div class="social-login">
                    <p>Or sign up with</p>
                    <div class="social-buttons">
                        <button class="social-btn"><i class="fab fa-google"></i> Google</button>
                        <button class="social-btn"><i class="fab fa-github"></i> GitHub</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.auth-tab');
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Show appropriate form
                if (tabName === 'login') {
                    loginForm.classList.add('active');
                    signupForm.classList.remove('active');
                } else {
                    loginForm.classList.remove('active');
                    signupForm.classList.add('active');
                }
            });
        });
        
        // Login form submission
        const loginFormElement = document.getElementById('login-form-element');
        if (loginFormElement) {
            loginFormElement.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Demo: Sign in successful! Redirecting to dashboard...');
                window.location.href = 'dashboard.php';
            });
        }
        
        // Signup form submission
        const signupFormElement = document.getElementById('signup-form-element');
        if (signupFormElement) {
            signupFormElement.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Demo: Account created successfully! Please sign in.');
                // Switch to login tab
                document.querySelector('[data-tab="login"]').click();
            });
        }
        
        // Social buttons demo
        const socialBtns = document.querySelectorAll('.social-btn');
        socialBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Demo: Social authentication would be integrated here.');
            });
        });
    </script>
</body>
</html>