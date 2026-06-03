<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Platform - NEXORA Education System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-purple: #8b5cf6;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0c10;
            color: #e6edf3;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1d24;
        }

        ::-webkit-scrollbar-thumb {
            background: #2d313a;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3d4250;
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(10, 12, 16, 0.95);
            backdrop-filter: blur(15px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10b981, #3b82f6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon i {
            font-size: 1.2rem;
            color: white;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: #8b949e;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #10b981;
        }

        .nav-cta {
            background: linear-gradient(135deg, #10b981, #0da271);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.3);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            width: 100%;
            background: rgba(10, 12, 16, 0.98);
            backdrop-filter: blur(20px);
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 999;
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .mobile-nav-link {
            color: #8b949e;
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .mobile-nav-link:hover,
        .mobile-nav-link.active {
            background: rgba(255, 255, 255, 0.05);
            color: #10b981;
        }

        /* Background Animation */
        .background-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            animation: float 15s infinite linear;
        }

        .grid-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(30, 64, 175, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 64, 175, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 2;
        }

        /* Main Content */
        .main-container {
            position: relative;
            z-index: 10;
            width: 100%;
            min-height: 100vh;
            padding-top: 80px;
        }

        /* Hero Section */
        .platform-hero {
            padding: 4rem 2rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #8b949e;
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        /* Section Title */
        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #10b981;
            border-radius: 2px;
        }

        /* Dashboard Stats */
        .dashboard-section {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }

        @media (max-width: 1024px) {
            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #10b981;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .stat-icon i {
            color: #10b981;
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: #8b949e;
            font-size: 0.8rem;
        }

        /* Video Guides */
        .video-guides-section {
            padding: 4rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .video-grid {
                grid-template-columns: 1fr;
            }
        }

        .video-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .video-card:hover {
            transform: translateY(-5px);
            border-color: #10b981;
        }

        .video-thumbnail {
            position: relative;
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #1a1d24, #2d313a);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .video-thumbnail::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .play-button {
            width: 60px;
            height: 60px;
            background: rgba(16, 185, 129, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
            transition: all 0.3s;
        }

        .play-button i {
            color: white;
            font-size: 1.5rem;
            margin-left: 3px;
        }

        .video-card:hover .play-button {
            transform: scale(1.1);
            background: #10b981;
        }

        .video-info {
            padding: 1.2rem;
        }

        .video-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .video-duration {
            color: #8b949e;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .video-description {
            color: #8b949e;
            font-size: 0.8rem;
            line-height: 1.5;
        }

        /* Walkthrough Steps */
        .walkthrough-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .walkthrough-steps {
            display: flex;
            flex-direction: column;
            gap: 3rem;
            margin-top: 2rem;
        }

        .walkthrough-step {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .walkthrough-step {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #10b981, #0da271);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .step-content h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .step-content p {
            color: #8b949e;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .step-features {
            list-style: none;
        }

        .step-features li {
            padding: 0.4rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #8b949e;
            font-size: 0.85rem;
        }

        .step-features li i {
            color: #10b981;
            font-size: 0.8rem;
        }

        .step-preview {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
        }

        /* Video Modal */
        .video-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .video-modal.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            width: 90%;
            max-width: 1000px;
            background: #0a0c10;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-header {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .close-modal {
            background: none;
            border: none;
            color: #8b949e;
            font-size: 1.2rem;
            cursor: pointer;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .close-modal:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .modal-body {
            padding: 0;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 24px;
            padding: 3rem;
            max-width: 1200px;
            margin: 2rem auto;
            text-align: center;
        }

        .cta-title {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .cta-text {
            color: #8b949e;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #10b981, #0da271);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Demo Credentials */
        .demo-credentials {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .demo-credentials code {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.8rem;
        }

        /* Footer */
        .footer {
            padding: 2rem;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #8b949e;
            margin-top: 2rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: #8b949e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: #10b981;
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -50px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }

            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .cta-section {
                padding: 2rem;
                margin: 1rem;
            }

            .cta-title {
                font-size: 1.3rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo-container">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <span class="logo-text">NEXORA<span class="gradient-text">EDU</span></span>
        </a>

        <div class="nav-links">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="{{ route('mobile-app') }}" class="nav-link">Mobile App</a>
            <a href="{{ route('web-platform') }}" class="nav-link active">Web Platform</a>
            <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
            <a href="{{ route('login') }}" class="nav-cta">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-nav-links">
            <a href="{{ url('/') }}" class="mobile-nav-link">Home</a>
            <a href="{{ route('mobile-app') }}" class="mobile-nav-link">Mobile App</a>
            <a href="{{ route('web-platform') }}" class="mobile-nav-link active">Web Platform</a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link">Pricing</a>
            <a href="{{ route('login') }}" class="mobile-nav-link">Login</a>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="video-modal" id="videoModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Video Guide</h3>
                <button class="close-modal" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="video-container" id="videoContainer">
                    <!-- YouTube video will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Background Animation -->
    <div class="background-animation" id="particles"></div>
    <div class="grid-overlay"></div>

    <!-- Main Content -->
    <div class="main-container">

        <!-- Hero Section -->
        <section class="platform-hero">
            <h1 class="hero-title">Complete <span class="gradient-text">Institute Management</span> Platform</h1>
            <p class="hero-subtitle">
                Manage your entire educational institution from one powerful web dashboard.
                From student enrollment to financial management, everything you need is here.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Access Web Platform
                </a>
                <a href="#videos" class="btn btn-secondary">
                    <i class="fas fa-play-circle"></i> Watch Tutorials
                </a>
            </div>
        </section>

        <!-- Dashboard Stats Preview -->
        <section class="dashboard-section">
            <h2 class="section-title">Platform <span class="gradient-text">Overview</span></h2>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                    <div class="stat-number">2,500+</div>
                    <div class="stat-label">Active Students</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-chalkboard-user"></i></div>
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Teachers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
                    <div class="stat-number">LKR 3.2M</div>
                    <div class="stat-label">Monthly Revenue</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="stat-number">96%</div>
                    <div class="stat-label">Attendance Rate</div>
                </div>
            </div>
        </section>

        <!-- Video Guides -->
        <section class="video-guides-section" id="videos">
            <h2 class="section-title">Step-by-Step <span class="gradient-text">Video Guides</span></h2>
            <div class="video-grid">
                <!-- Video 1 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Login & Dashboard Navigation">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Login & Dashboard Navigation</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 3:45 min</div>
                        <p class="video-description">Learn how to log in and navigate the main dashboard efficiently.
                        </p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Student Management">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Student Enrollment & Management</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 5:20 min</div>
                        <p class="video-description">Complete guide to adding and managing student records.</p>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Payment Management">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Fee Collection & Payment Management</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 6:15 min</div>
                        <p class="video-description">How to process payments and manage financial transactions.</p>
                    </div>
                </div>

                <!-- Video 4 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Teacher Salary">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Teacher Salary Processing</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 4:30 min</div>
                        <p class="video-description">Manage teacher salaries, advances, and generate salary slips.</p>
                    </div>
                </div>

                <!-- Video 5 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Attendance System">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Attendance Management</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 3:50 min</div>
                        <p class="video-description">Mark attendance and generate attendance reports.</p>
                    </div>
                </div>

                <!-- Video 6 -->
                <div class="video-card" data-video-id="dQw4w9WgXcQ" data-video-title="Reports & Analytics">
                    <div class="video-thumbnail">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">Reports & Analytics</h3>
                        <div class="video-duration"><i class="fas fa-clock"></i> 5:00 min</div>
                        <p class="video-description">Generate financial and performance reports.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Walkthrough Steps -->
        <section class="walkthrough-section">
            <h2 class="section-title">Complete <span class="gradient-text">Workflow</span></h2>
            <div class="walkthrough-steps">
                <!-- Step 1 -->
                <div class="walkthrough-step">
                    <div class="step-content">
                        <div class="step-number">1</div>
                        <h3>Login & System Setup</h3>
                        <p>Access the web platform with your credentials. Configure your institute settings.</p>
                        <ul class="step-features">
                            <li><i class="fas fa-check-circle"></i> Secure login with role-based access</li>
                            <li><i class="fas fa-check-circle"></i> Institute profile setup</li>
                            <li><i class="fas fa-check-circle"></i> User role configuration</li>
                        </ul>
                    </div>
                    <div class="step-preview">
                        <i class="fas fa-sign-in-alt" style="font-size: 3rem; color: #10b981;"></i>
                        <p style="margin-top: 1rem;">Login Interface</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="walkthrough-step">
                    <div class="step-preview">
                        <i class="fas fa-user-plus" style="font-size: 3rem; color: #10b981;"></i>
                        <p style="margin-top: 1rem;">Student Enrollment</p>
                    </div>
                    <div class="step-content">
                        <div class="step-number">2</div>
                        <h3>Student Enrollment</h3>
                        <p>Add new students, assign classes, and manage student profiles.</p>
                        <ul class="step-features">
                            <li><i class="fas fa-check-circle"></i> Bulk student registration</li>
                            <li><i class="fas fa-check-circle"></i> Class assignment</li>
                            <li><i class="fas fa-check-circle"></i> Student profile management</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="walkthrough-step">
                    <div class="step-content">
                        <div class="step-number">3</div>
                        <h3>Financial Management</h3>
                        <p>Complete financial control including fee collection and salary processing.</p>
                        <ul class="step-features">
                            <li><i class="fas fa-check-circle"></i> Fee collection & receipts</li>
                            <li><i class="fas fa-check-circle"></i> Teacher salary processing</li>
                            <li><i class="fas fa-check-circle"></i> Financial reports</li>
                        </ul>
                    </div>
                    <div class="step-preview">
                        <i class="fas fa-chart-line" style="font-size: 3rem; color: #10b981;"></i>
                        <p style="margin-top: 1rem;">Financial Dashboard</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2 class="cta-title">Ready to <span class="gradient-text">Streamline</span> Your Institute?</h2>
            <p class="cta-text">Join hundreds of institutes already using our web platform.</p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Access Web Platform
                </a>
                <a href="{{ route('pricing') }}" class="btn btn-secondary">
                    <i class="fas fa-tags"></i> View Pricing
                </a>
            </div>

            <div class="demo-credentials">
                <div><i class="fas fa-key" style="color: #10b981;"></i> Demo Login:</div>
                <div style="margin-top: 0.5rem;">
                    <code>admin@nexora.com</code> / <code>nexora</code>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-links">
                <a href="{{ url('/') }}" class="footer-link">Home</a>
                <a href="{{ route('mobile-app') }}" class="footer-link">Mobile App</a>
                <a href="{{ route('web-platform') }}" class="footer-link">Web Platform</a>
                <a href="{{ route('pricing') }}" class="footer-link">Pricing</a>
            </div>
            <p>&copy; 2025 NEXORA Education System. All rights reserved.</p>
            <p style="margin-top: 0.5rem; font-size: 0.75rem;">"Bringing You Next" in Education Technology</p>
        </footer>
    </div>

    <script>
        // Create background particles
        function createParticles() {
            const container = document.getElementById('particles');
            if (!container) return;

            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.random() * 60 + 20;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.animationDelay = `${Math.random() * 10}s`;
                particle.style.animationDuration = `${Math.random() * 10 + 10}s`;
                container.appendChild(particle);
            }
        }

        // Video Modal Functionality
        const videoModal = document.getElementById('videoModal');
        const videoContainer = document.getElementById('videoContainer');
        const modalTitle = document.getElementById('modalTitle');
        const closeModal = document.getElementById('closeModal');

        let currentIframe = null;

        function openVideo(videoId, title) {
            modalTitle.textContent = title;

            // Clear previous video
            if (currentIframe) {
                currentIframe.remove();
            }

            // Create new iframe
            const iframe = document.createElement('iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;

            videoContainer.appendChild(iframe);
            currentIframe = iframe;

            videoModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            videoModal.classList.remove('active');
            document.body.style.overflow = 'auto';

            // Clear video to stop playback
            if (currentIframe) {
                currentIframe.remove();
                currentIframe = null;
            }
        }

        // Add click handlers to video cards
        document.querySelectorAll('.video-card').forEach(card => {
            card.addEventListener('click', () => {
                const videoId = card.dataset.videoId;
                const videoTitle = card.dataset.videoTitle;
                if (videoId) {
                    openVideo(videoId, videoTitle);
                }
            });
        });

        // Close modal events
        closeModal.addEventListener('click', closeVideoModal);
        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) {
                closeVideoModal();
            }
        });

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && videoModal.classList.contains('active')) {
                closeVideoModal();
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
                mobileMenuBtn.innerHTML = mobileMenu.classList.contains('active')
                    ? '<i class="fas fa-times"></i>'
                    : '<i class="fas fa-bars"></i>';
            });

            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    mobileMenu.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
        });
    </script>
</body>

</html>