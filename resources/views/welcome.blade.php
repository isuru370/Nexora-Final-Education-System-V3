<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEXORA - Bringing You Next | Complete Education Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0c10;
            color: #e6edf3;
            overflow-x: hidden;
            position: relative;
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

        /* Navbar */
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
            transition: all 0.3s;
            position: relative;
        }

        .nav-link:hover {
            color: #10b981;
        }

        .nav-link.active {
            color: #10b981;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #10b981;
            border-radius: 2px;
        }

        .nav-cta {
            background: linear-gradient(135deg, #10b981, #0da271);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        .mobile-nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #10b981;
        }

        /* Main Container */
        .main-container {
            padding-top: 80px;
        }

        /* Hero Section */
        .hero-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
            align-items: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 50px;
            padding: 0.4rem 1rem;
            margin-bottom: 1.5rem;
        }

        .badge i {
            color: #10b981;
            font-size: 0.8rem;
        }

        .badge span {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .main-heading {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .tagline {
            font-size: 1.2rem;
            color: #8b949e;
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 500px;
        }

        /* Feature Grid */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 1rem;
            transition: all 0.3s;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .feature-icon i {
            color: #10b981;
            font-size: 1.2rem;
        }

        .feature-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .feature-desc {
            font-size: 0.75rem;
            color: #8b949e;
        }

        /* CTA Buttons */
        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #10b981, #0da271);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Right Section - Video */
        .video-card {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 24px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .video-wrapper {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
        }

        .video-wrapper video {
            width: 100%;
            display: block;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .video-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .play-btn {
            width: 70px;
            height: 70px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .play-btn i {
            font-size: 1.5rem;
            color: white;
            margin-left: 5px;
        }

        .video-overlay:hover .play-btn {
            transform: scale(1.1);
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #10b981;
        }

        .stat-item p {
            font-size: 0.75rem;
            color: #8b949e;
        }

        /* Section Styles */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .section-header p {
            color: #8b949e;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Features Scroller */
        .features-scroller {
            overflow: hidden;
            position: relative;
            padding: 2rem 0;
        }

        .features-track {
            display: flex;
            gap: 1.5rem;
            animation: scroll 60s linear infinite;
            width: fit-content;
        }

        .features-track:hover {
            animation-play-state: paused;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .feature-card {
            min-width: 280px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.3s;
        }

        .feature-card:hover {
            border-color: rgba(16, 185, 129, 0.3);
            transform: translateY(-5px);
        }

        .feature-card-icon {
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .feature-card-icon i {
            font-size: 1.5rem;
            color: #10b981;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.8rem;
            color: #8b949e;
            margin-bottom: 1rem;
        }

        .feature-card ul {
            list-style: none;
        }

        .feature-card ul li {
            font-size: 0.75rem;
            color: #8b949e;
            padding: 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-card ul li i {
            color: #10b981;
            font-size: 0.7rem;
        }

        /* Platform Cards */
        .platform-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .platform-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s;
        }

        .platform-card:hover {
            transform: translateY(-5px);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .platform-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .platform-icon {
            width: 60px;
            height: 60px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .platform-icon i {
            font-size: 1.8rem;
            color: #10b981;
        }

        .platform-header h3 {
            font-size: 1.3rem;
        }

        .platform-header p {
            font-size: 0.8rem;
            color: #8b949e;
        }

        .platform-features {
            list-style: none;
            margin: 1.5rem 0;
        }

        .platform-features li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #8b949e;
            font-size: 0.85rem;
        }

        .platform-features li i {
            color: #10b981;
        }

        /* Clients Grid */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .client-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .client-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #10b981, #3b82f6);
        }

        .client-card:hover {
            transform: translateY(-5px);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .client-logo {
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .client-logo i {
            font-size: 1.5rem;
            color: #10b981;
        }

        .client-card h4 {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .client-location {
            font-size: 0.75rem;
            color: #8b949e;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .client-stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .client-stat {
            text-align: center;
        }

        .client-stat .number {
            font-size: 1.2rem;
            font-weight: 700;
            color: #10b981;
        }

        .client-stat .label {
            font-size: 0.65rem;
            color: #8b949e;
        }

        .testimonial {
            font-size: 0.8rem;
            color: #8b949e;
            font-style: italic;
            position: relative;
            padding-left: 1rem;
            border-left: 2px solid #10b981;
        }

        /* Stats Banner */
        .stats-banner {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 24px;
            padding: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stats-banner-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .stats-banner-item .number {
            font-size: 2rem;
            font-weight: 800;
            color: #10b981;
        }

        .stats-banner-item .label {
            font-size: 0.8rem;
            color: #8b949e;
        }

        /* Feedback Grid */
        .feedback-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .feedback-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
        }

        .feedback-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .feedback-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #10b981, #3b82f6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .feedback-info h4 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .feedback-role {
            font-size: 0.7rem;
            color: #8b949e;
        }

        .feedback-text {
            font-size: 0.85rem;
            color: #8b949e;
            line-height: 1.5;
            font-style: italic;
        }

        .feedback-rating {
            margin-top: 1rem;
        }

        .feedback-rating i {
            color: #f59e0b;
            font-size: 0.8rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 24px;
            padding: 3rem;
            max-width: 1200px;
            margin: 2rem auto;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            color: #8b949e;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        /* Footer */
        .footer {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 3rem 2rem 2rem;
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .footer-links a {
            color: #8b949e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #10b981;
        }

        .footer-contact {
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
            color: #8b949e;
        }

        .footer-contact i {
            margin-right: 0.5rem;
        }

        /* WhatsApp Float */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: all 0.3s;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-section {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .tagline {
                margin-left: auto;
                margin-right: auto;
            }

            .feature-grid {
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
            }

            .cta-buttons {
                justify-content: center;
            }

            .platform-grid {
                grid-template-columns: 1fr;
            }

            .stats-banner-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .main-heading {
                font-size: 2.5rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .stats-section {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .clients-grid {
                padding: 1rem;
            }

            .feedback-grid {
                padding: 1rem;
            }

            .stats-banner-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .cta-section {
                margin: 1rem;
                padding: 2rem;
            }

            .cta-section h2 {
                font-size: 1.5rem;
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
            <a href="{{ url('/') }}" class="nav-link active">Home</a>
            <a href="{{ route('mobile-app') }}" class="nav-link">Mobile App</a>
            <a href="{{ route('web-platform') }}" class="nav-link">Web Platform</a>
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
            <a href="{{ route('web-platform') }}" class="mobile-nav-link">Web Platform</a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link">Pricing</a>
            <a href="{{ route('login') }}" class="mobile-nav-link">Login</a>
        </div>
    </div>

    <!-- WhatsApp Float -->
    <a href="https://wa.me/94768971213" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Main Content -->
    <div class="main-container">

        <!-- Hero Section -->
        <section class="hero-section">
            <div>
                <div class="badge">
                    <i class="fas fa-rocket"></i>
                    <span>COMPLETE EDUCATION SOLUTION</span>
                </div>

                <h1 class="main-heading">
                    Welcome to <span class="gradient-text">NEXORA</span>
                </h1>

                <p class="tagline">
                    Revolutionizing education management with cutting-edge technology.
                    From student enrollment to teacher payroll, we provide a complete
                    ecosystem for modern educational institutions.
                </p>

                <div class="feature-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4 class="feature-title">Mobile App</h4>
                        <p class="feature-desc">Student payments, attendance & learning</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4 class="feature-title">Web Platform</h4>
                        <p class="feature-desc">Institute management & administration</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h4 class="feature-title">Flexible Pricing</h4>
                        <p class="feature-desc">Affordable plans for all institutions</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4 class="feature-title">24/7 Support</h4>
                        <p class="feature-desc">Dedicated customer support</p>
                    </div>
                </div>

                <div class="cta-buttons">
                    <a href="{{ route('login') }}" class="btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Access Portal
                    </a>
                    <a href="{{ route('pricing') }}" class="btn-secondary">
                        <i class="fas fa-tags"></i> View Pricing
                    </a>
                </div>
            </div>

            <div>
                <div class="video-card">
                    <div class="video-wrapper" id="videoWrapper">
                        <video id="systemDemoVideo" preload="metadata">
                            <source src="{{ asset('uploads/videos/system.mp4') }}" type="video/mp4">
                        </video>
                        <div class="video-overlay" id="videoOverlay">
                            <div class="play-btn">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stats-section">
                        <div class="stat-item">
                            <h3 id="studentsCount">0</h3>
                            <p>Active Students</p>
                        </div>
                        <div class="stat-item">
                            <h3 id="teachersCount">0</h3>
                            <p>Teachers</p>
                        </div>
                        <div class="stat-item">
                            <h3 id="successRate">0%</h3>
                            <p>Success Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Scroller -->
        <section style="padding: 4rem 2rem;">
            <div class="section-header">
                <h2>Our <span class="gradient-text">Comprehensive</span> Features</h2>
                <p>Everything you need to manage your educational institution efficiently</p>
            </div>
            <div class="features-scroller">
                <div class="features-track" id="featuresTrack"></div>
            </div>
        </section>

        <!-- Platform Comparison -->
        <section style="padding: 2rem;">
            <div class="section-header">
                <h2>Dual <span class="gradient-text">Platform</span> Solution</h2>
                <p>Perfect solutions for both students and administrators</p>
            </div>
            <div class="platform-grid">
                <div class="platform-card">
                    <div class="platform-header">
                        <div class="platform-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div>
                            <h3>Mobile App</h3>
                            <p>For Students & Parents</p>
                        </div>
                    </div>
                    <ul class="platform-features">
                        <li><i class="fas fa-check-circle"></i> Student Payment Processing</li>
                        <li><i class="fas fa-check-circle"></i> Attendance Marking System</li>
                        <li><i class="fas fa-check-circle"></i> Progress Tracking Dashboard</li>
                        <li><i class="fas fa-check-circle"></i> Exam Results & Timetable</li>
                        <li><i class="fas fa-check-circle"></i> Push Notifications</li>
                    </ul>
                    <a href="{{ route('mobile-app') }}" class="btn-primary"
                        style="display: inline-flex; width: 100%; justify-content: center;">
                        <i class="fas fa-external-link-alt"></i> Explore Mobile App
                    </a>
                </div>

                <div class="platform-card">
                    <div class="platform-header">
                        <div class="platform-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <div>
                            <h3>Web Platform</h3>
                            <p>For Institutes & Administrators</p>
                        </div>
                    </div>
                    <ul class="platform-features">
                        <li><i class="fas fa-check-circle"></i> Teacher Salary Management</li>
                        <li><i class="fas fa-check-circle"></i> Institute Financial Tracking</li>
                        <li><i class="fas fa-check-circle"></i> Student Enrollment System</li>
                        <li><i class="fas fa-check-circle"></i> Advanced Analytics & Reports</li>
                        <li><i class="fas fa-check-circle"></i> Bulk Operations</li>
                    </ul>
                    <a href="{{ route('web-platform') }}" class="btn-primary"
                        style="display: inline-flex; width: 100%; justify-content: center;">
                        <i class="fas fa-external-link-alt"></i> Explore Web Platform
                    </a>
                </div>
            </div>
        </section>

        <!-- Clients Section -->
        <section style="padding: 2rem;">
            <div class="section-header">
                <h2>Trusted by <span class="gradient-text">Leading Institutions</span></h2>
                <p>Join 20+ educational institutions already using NEXORA</p>
            </div>
            <div class="clients-grid">
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-school"></i>
                    </div>
                    <h4>Success Academy</h4>
                    <p class="client-location"><i class="fas fa-map-marker-alt"></i> Padavi Parakramapura</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <div class="number">1,250+</div>
                            <div class="label">Students</div>
                        </div>
                        <div class="client-stat">
                            <div class="number">20+</div>
                            <div class="label">Teachers</div>
                        </div>
                    </div>
                    <div class="testimonial">"NEXORA revolutionized our fee management system"</div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    <h4>Savidya Education Institute</h4>
                    <p class="client-location"><i class="fas fa-map-marker-alt"></i> Mirigama</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <div class="number">1,020+</div>
                            <div class="label">Students</div>
                        </div>
                        <div class="client-stat">
                            <div class="number">20+</div>
                            <div class="label">Teachers</div>
                        </div>
                    </div>
                    <div class="testimonial">"Attendance tracking became 90% faster"</div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Minipalasa Education Center</h4>
                    <p class="client-location"><i class="fas fa-map-marker-alt"></i> Mirigama</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <div class="number">150+</div>
                            <div class="label">Students</div>
                        </div>
                        <div class="client-stat">
                            <div class="number">10+</div>
                            <div class="label">Teachers</div>
                        </div>
                    </div>
                    <div class="testimonial">"Teacher payroll processing is now automated"</div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>CO-OP Education Institute</h4>
                    <p class="client-location"><i class="fas fa-map-marker-alt"></i> Padavi Parakramapura</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <div class="number">850+</div>
                            <div class="label">Students</div>
                        </div>
                        <div class="client-stat">
                            <div class="number">10+</div>
                            <div class="label">Teachers</div>
                        </div>
                    </div>
                    <div class="testimonial">"Complete management solution for our institute"</div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Shakya Education Institute</h4>
                    <p class="client-location"><i class="fas fa-map-marker-alt"></i>Yagoda, Sri Lanka</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <div class="number">200+</div>
                            <div class="label">Students</div>
                        </div>
                        <div class="client-stat">
                            <div class="number">12+</div>
                            <div class="label">Teachers</div>
                        </div>
                    </div>
                    <div class="testimonial">"Complete management solution for our institute"</div>
                </div>
            </div>

            <!-- Stats Banner -->
            <div class="stats-banner">
                <div class="stats-banner-grid">
                    <div class="stats-banner-item">
                        <div class="number">20+</div>
                        <div class="label">Educational Institutions</div>
                    </div>
                    <div class="stats-banner-item">
                        <div class="number">25,000+</div>
                        <div class="label">Students Managed</div>
                    </div>
                    <div class="stats-banner-item">
                        <div class="number">1,500+</div>
                        <div class="label">Teachers Supported</div>
                    </div>
                    <div class="stats-banner-item">
                        <div class="number">99%</div>
                        <div class="label">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feedback Section -->
        <section style="padding: 2rem;">
            <div class="section-header">
                <h2>What Our <span class="gradient-text">Users Say</span></h2>
                <p>Real feedback from real users</p>
            </div>
            <div class="feedback-grid">
                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">SR</div>
                        <div class="feedback-info">
                            <h4>Sandun Rajapakse</h4>
                            <p class="feedback-role">Institute Director</p>
                        </div>
                    </div>
                    <p class="feedback-text">"NEXORA transformed our institute's management. The payment tracking and
                        teacher salary system saved us countless hours of manual work."</p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">MI</div>
                        <div class="feedback-info">
                            <h4>Madushani Iroshani</h4>
                            <p class="feedback-role">Senior Teacher</p>
                        </div>
                    </div>
                    <p class="feedback-text">"The mobile app makes attendance marking so easy. I can track student
                        progress and communicate with parents seamlessly."</p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">KR</div>
                        <div class="feedback-info">
                            <h4>Kavindu Ranasinghe</h4>
                            <p class="feedback-role">Student</p>
                        </div>
                    </div>
                    <p class="feedback-text">"Paying fees through the app is super convenient. I can also access study
                        materials and check my attendance anytime."</p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Ready to Transform Your Institute?</h2>
            <p>Join hundreds of educational institutions already using NEXORA to streamline their operations, improve
                efficiency, and enhance the learning experience.</p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Access Portal
                </a>
                <a href="{{ route('pricing') }}" class="btn-secondary">
                    <i class="fas fa-tags"></i> View Pricing
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('mobile-app') }}">Mobile App</a>
                <a href="{{ route('web-platform') }}">Web Platform</a>
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('login') }}">Login</a>
            </div>
            <div class="footer-contact">
                <p><i class="fas fa-map-marker-alt"></i> Mirigama, Sri Lanka</p>
                <p><i class="fas fa-phone"></i> +94 76 897 12 13</p>
                <p><i class="fas fa-envelope"></i> info@nexora.edu.lk</p>
            </div>
            <p>&copy; 2024 NEXORA Education System. All rights reserved.</p>
            <p style="margin-top: 0.5rem; font-size: 0.75rem; color: #64748b;">"Bringing You Next" in Education
                Technology</p>
        </footer>
    </div>

    <script>
        // System Features Data
        const systemFeatures = [
            { icon: 'fas fa-user-graduate', title: 'Student Management', desc: 'Complete student lifecycle management', features: ['Enrollment System', 'Student Profiles', 'Progress Tracking', 'Attendance Records'] },
            { icon: 'fas fa-chalkboard-teacher', title: 'Teacher Management', desc: 'Efficient teacher administration', features: ['Salary Processing', 'Class Allocation', 'Performance Tracking', 'Payment History'] },
            { icon: 'fas fa-money-check-alt', title: 'Payment System', desc: 'Comprehensive financial management', features: ['Student Fees', 'Teacher Salaries', 'Expense Tracking', 'Financial Reports'] },
            { icon: 'fas fa-calendar-check', title: 'Attendance System', desc: 'Automated attendance tracking', features: ['Daily Attendance', 'Class-wise Reports', 'Parent Notifications', 'Analytics'] },
            { icon: 'fas fa-chart-bar', title: 'Analytics & Reports', desc: 'Data-driven insights', features: ['Performance Analytics', 'Financial Reports', 'Attendance Reports', 'Custom Dashboards'] },
            { icon: 'fas fa-id-card', title: 'ID Card Generation', desc: 'Professional student ID cards', features: ['Automatic Generation', 'Bulk Printing', 'Custom Designs', 'QR Code Integration'] },
            { icon: 'fas fa-file-invoice-dollar', title: 'Receipt Management', desc: 'Automated receipt system', features: ['Digital Receipts', 'Print Options', 'Payment History', 'Tax Compliance'] },
            { icon: 'fas fa-building', title: 'Institute Management', desc: 'Multi-branch administration', features: ['Branch Management', 'User Roles', 'System Settings', 'Backup & Security'] },
            { icon: 'fas fa-envelope', title: 'Communication', desc: 'Seamless communication tools', features: ['Email Integration', 'Push Notifications', 'Announcements', 'Parent Communication'] },
            { icon: 'fas fa-mobile-alt', title: 'Mobile Access', desc: 'On-the-go management', features: ['Android App', 'Mobile Payments', 'Real-time Updates'] }
        ];

        // Generate features scroller
        function generateFeaturesScroller() {
            const track = document.getElementById('featuresTrack');
            if (!track) return;

            // Duplicate for infinite scroll
            const allFeatures = [...systemFeatures, ...systemFeatures];

            allFeatures.forEach(feature => {
                const card = document.createElement('div');
                card.className = 'feature-card';
                card.innerHTML = `
                    <div class="feature-card-icon">
                        <i class="${feature.icon}"></i>
                    </div>
                    <h3>${feature.title}</h3>
                    <p>${feature.desc}</p>
                    <ul>
                        ${feature.features.map(f => `<li><i class="fas fa-check-circle"></i> ${f}</li>`).join('')}
                    </ul>
                `;
                track.appendChild(card);
            });
        }

        // Animate statistics
        function animateStatistics() {
            const studentsTarget = 25000;
            const teachersTarget = 1500;
            const rateTarget = 100;

            let students = 0;
            let teachers = 0;
            let rate = 0;

            const studentsInterval = setInterval(() => {
                students += Math.ceil(studentsTarget / 100);
                if (students >= studentsTarget) {
                    students = studentsTarget;
                    clearInterval(studentsInterval);
                }
                document.getElementById('studentsCount').textContent = students.toLocaleString();
            }, 20);

            const teachersInterval = setInterval(() => {
                teachers += Math.ceil(teachersTarget / 100);
                if (teachers >= teachersTarget) {
                    teachers = teachersTarget;
                    clearInterval(teachersInterval);
                }
                document.getElementById('teachersCount').textContent = teachers.toLocaleString();
            }, 30);

            const rateInterval = setInterval(() => {
                rate += Math.ceil(rateTarget / 100);
                if (rate >= rateTarget) {
                    rate = rateTarget;
                    clearInterval(rateInterval);
                }
                document.getElementById('successRate').textContent = `${rate}%`;
            }, 40);
        }

        // Setup video player
        function setupVideoPlayer() {
            const video = document.getElementById('systemDemoVideo');
            const overlay = document.getElementById('videoOverlay');
            const wrapper = document.getElementById('videoWrapper');

            if (!video || !overlay) return;

            overlay.addEventListener('click', () => {
                video.play().catch(e => console.log('Video play error:', e));
                overlay.classList.add('hidden');
            });

            video.addEventListener('ended', () => {
                overlay.classList.remove('hidden');
            });

            video.addEventListener('pause', () => {
                if (!video.ended) overlay.classList.remove('hidden');
            });

            video.addEventListener('play', () => {
                overlay.classList.add('hidden');
            });
        }

        // Mobile menu
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
            generateFeaturesScroller();
            animateStatistics();
            setupVideoPlayer();
        });
    </script>
</body>

</html>