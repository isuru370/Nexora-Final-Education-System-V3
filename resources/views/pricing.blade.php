<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing - NEXORA Education System</title>

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

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0c10;
            color: #e6edf3;
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
        }

        .nav-link:hover {
            color: #10b981;
        }

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

        /* Main Container */
        .main-container {
            padding-top: 80px;
        }

        /* Hero Section */
        .pricing-hero {
            padding: 4rem 2rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #8b949e;
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        /* Section Title */
        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 3rem;
        }

        /* Offer Banner */
        .offer-banner {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(59, 130, 246, 0.15));
            border-radius: 24px;
            padding: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            border: 1px solid rgba(16, 185, 129, 0.3);
            position: relative;
            overflow: hidden;
        }

        .offer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .offer-icon {
            width: 70px;
            height: 70px;
            background: rgba(16, 185, 129, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .offer-icon i {
            font-size: 2rem;
            color: #10b981;
        }

        .offer-text {
            flex: 1;
        }

        .offer-text h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .offer-text p {
            color: #8b949e;
            line-height: 1.5;
        }

        /* Pricing Grid */
        .pricing-section {
            padding: 4rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            border-color: rgba(16, 185, 129, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .pricing-card.popular {
            border-color: #10b981;
            transform: scale(1.02);
        }

        .pricing-card.popular:hover {
            transform: scale(1.02) translateY(-5px);
        }

        .popular-badge {
            position: absolute;
            top: 15px;
            right: -30px;
            background: #10b981;
            color: white;
            padding: 0.3rem 3rem;
            font-size: 0.7rem;
            font-weight: 600;
            transform: rotate(45deg);
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .plan-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .plan-desc {
            color: #8b949e;
            font-size: 0.85rem;
        }

        .price {
            margin-top: 1rem;
        }

        .price-amount {
            font-size: 2.5rem;
            font-weight: 800;
            color: #10b981;
        }

        .price-period {
            color: #8b949e;
            font-size: 0.9rem;
        }

        .price-note {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 10px;
            padding: 0.5rem;
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #10b981;
        }

        /* Features List */
        .features-list {
            margin-bottom: 2rem;
        }

        .features-list h4 {
            font-size: 0.9rem;
            margin-bottom: 1rem;
            color: #e6edf3;
        }

        .features-list ul {
            list-style: none;
        }

        .features-list li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #8b949e;
            font-size: 0.85rem;
        }

        .features-list li i {
            color: #10b981;
            font-size: 0.8rem;
            width: 20px;
        }

        .feature-highlight {
            background: rgba(16, 185, 129, 0.05);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            border-left: 3px solid #10b981;
        }

        .feature-highlight p {
            font-size: 0.8rem;
            color: #8b949e;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
            width: 100%;
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

        .btn-outline {
            background: transparent;
            border: 1px solid #10b981;
            color: #10b981;
        }

        .btn-outline:hover {
            background: rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
        }

        .btn-whatsapp:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.3);
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: auto;
        }

        /* Comparison Table */
        .comparison-section {
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.02);
        }

        .comparison-table-container {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: auto;
        }

        .comparison-table {
            width: 100%;
            border-collapse: collapse;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .comparison-table th {
            background: rgba(255, 255, 255, 0.03);
            font-weight: 600;
            color: #e6edf3;
        }

        .comparison-table td:first-child {
            text-align: left;
            font-weight: 500;
            color: #8b949e;
        }

        .check {
            color: #10b981;
            font-size: 1.1rem;
        }

        .cross {
            color: #ef4444;
            font-size: 1.1rem;
        }

        /* FAQ Section */
        .faq-section {
            padding: 4rem 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            overflow: hidden;
        }

        .faq-question {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .faq-question:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .faq-question h4 {
            font-size: 1rem;
            font-weight: 600;
        }

        .faq-question i {
            color: #10b981;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            color: #8b949e;
            line-height: 1.6;
            font-size: 0.9rem;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 24px;
            padding: 3rem;
            max-width: 1200px;
            margin: 4rem auto;
            text-align: center;
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

        .demo-credentials {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
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
        }

        /* Utility Classes */
        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .text-center {
            text-align: center;
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
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .offer-content {
                flex-direction: column;
                text-align: center;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-5px);
            }

            .comparison-table {
                font-size: 0.8rem;
            }

            .comparison-table th,
            .comparison-table td {
                padding: 0.75rem;
            }

            .cta-section {
                margin: 2rem 1rem;
                padding: 2rem;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 1.4rem;
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
            <a href="{{ route('web-platform') }}" class="nav-link">Web Platform</a>
            <a href="{{ route('pricing') }}" class="nav-link active">Pricing</a>
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
            <a href="{{ route('pricing') }}" class="mobile-nav-link active">Pricing</a>
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
        <section class="pricing-hero">
            <h1 class="hero-title">Simple, <span class="gradient-text">Transparent</span> Pricing</h1>
            <p class="hero-subtitle">
                Get the complete NEXORA Education System for FREE! Pay only for Student ID Cards.
                Perfect for educational institutions of all sizes.
            </p>
            <div class="flex-between" style="justify-content: center; gap: 1rem;">
                <a href="#plans" class="btn btn-secondary">
                    <i class="fas fa-tags"></i> View Plans
                </a>
                <button onclick="sendToWhatsApp('General Inquiry', 'Free System')" class="btn btn-secondary">
                    <i class="fab fa-whatsapp"></i> Get Free System
                </button>
            </div>
        </section>

        <!-- Offer Banner -->
        <section class="offer-banner">
            <div class="offer-content">
                <div class="offer-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <div class="offer-text">
                    <h3>🎉 Special Launch Offer!</h3>
                    <p>
                        Get the <strong>complete NEXORA Education System for FREE</strong>!
                        Pay only for Student ID Cards at a flat rate of
                        <strong>LKR 350 per student</strong>.
                    </p>
                </div>
                <button onclick="sendToWhatsApp('Special Offer', 'Free System + ID Cards')" class="btn btn-whatsapp">
                    <i class="fab fa-whatsapp"></i> Get This Offer
                </button>
            </div>
        </section>

        <!-- Pricing Plans -->
        <section class="pricing-section" id="plans">
            <h2 class="section-title">Choose Your <span class="gradient-text">Plan</span></h2>

            <div class="pricing-grid">
                <!-- Professional Plan - FREE -->
                <div class="pricing-card popular">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3 class="plan-name">Professional</h3>
                        <p class="plan-desc">Complete Education System</p>
                        <div class="price">
                            <span class="price-amount">FREE</span>
                            <span class="price-period">/ System Setup</span>
                            <div class="price-note">
                                <i class="fas fa-id-card"></i> Only pay for ID Cards - LKR 350/student
                            </div>
                        </div>
                    </div>

                    <div class="features-list">
                        <h4>Complete Package Includes:</h4>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> <strong>Complete NEXORA System - FREE</strong></li>
                            <li><i class="fas fa-check-circle"></i> Student ID Cards - LKR 350 per student</li>
                            <li><i class="fas fa-check-circle"></i> Unlimited Teacher Accounts</li>
                            <li><i class="fas fa-check-circle"></i> Advanced Mobile App Access</li>
                            <li><i class="fas fa-check-circle"></i> Attendance & Payment System</li>
                            <li><i class="fas fa-check-circle"></i> Unlimited Student Management</li>
                            <li><i class="fas fa-check-circle"></i> Priority Support & Updates</li>
                        </ul>
                        <div class="feature-highlight">
                            <p><i class="fas fa-info-circle"></i> System is completely FREE. You only pay for Student ID
                                Cards at LKR 350 per student.</p>
                        </div>
                    </div>

                    <div class="button-group">
                        <button onclick="sendToWhatsApp('Professional FREE Plan', 'Free System + ID Cards')"
                            class="btn btn-primary">
                            <i class="fab fa-whatsapp"></i> Get Free System
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-outline">
                            <i class="fas fa-rocket"></i> Start Free Setup
                        </a>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">Enterprise</h3>
                        <p class="plan-desc">For large institutions & chains</p>
                        <div class="price">
                            <span class="price-amount">Custom</span>
                            <div class="price-note">
                                <i class="fas fa-crown"></i> Tailored Pricing
                            </div>
                        </div>
                    </div>

                    <div class="features-list">
                        <h4>Everything in Professional, plus:</h4>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Multi-branch Management</li>
                            <li><i class="fas fa-check-circle"></i> Custom Development</li>
                            <li><i class="fas fa-check-circle"></i> Dedicated Support Team (24/7)</li>
                            <li><i class="fas fa-check-circle"></i> API Access</li>
                            <li><i class="fas fa-check-circle"></i> White-label Solution</li>
                            <li><i class="fas fa-check-circle"></i> On-premise Deployment</li>
                            <li><i class="fas fa-check-circle"></i> Training & Onboarding</li>
                        </ul>
                    </div>

                    <div class="button-group">
                        <button onclick="sendToWhatsApp('Enterprise Plan', 'Custom Pricing')" class="btn btn-primary">
                            <i class="fab fa-whatsapp"></i> Contact Sales
                        </button>
                        <button class="btn btn-outline">
                            <i class="fas fa-headset"></i> Request Demo
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Comparison Table -->
        <section class="comparison-section">
            <h2 class="section-title">Feature <span class="gradient-text">Comparison</span></h2>
            <div class="comparison-table-container">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Professional</th>
                            <th>Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>System Access</td>
                            <td><span class="check">✓</span> FREE</td>
                            <td><span class="check">✓</span> FREE</td>
                        </tr>
                        <tr>
                            <td>Student ID Cards</td>
                            <td><strong>LKR 350/student</strong></td>
                            <td>Custom Pricing</td>
                        </tr>
                        <tr>
                            <td>Student Management</td>
                            <td><span class="check">✓</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Teacher Management</td>
                            <td><span class="check">✓</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Payment System</td>
                            <td><span class="check">✓</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Attendance System</td>
                            <td><span class="check">✓</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Mobile App</td>
                            <td><span class="check">✓</span> Advanced</td>
                            <td><span class="check">✓</span> Full Access</td>
                        </tr>
                        <tr>
                            <td>Multi-branch Management</td>
                            <td><span class="cross">✗</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>API Access</td>
                            <td><span class="cross">✗</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Custom Development</td>
                            <td><span class="cross">✗</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                        <tr>
                            <td>24/7 Priority Support</td>
                            <td><span class="cross">✗</span></td>
                            <td><span class="check">✓</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <h2 class="section-title">Frequently Asked <span class="gradient-text">Questions</span></h2>
            <div class="faq-grid">
                <div class="faq-item active">
                    <div class="faq-question">
                        <h4>Is the system really FREE?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <strong>Yes, absolutely FREE!</strong> The complete NEXORA Education System including all
                        features is completely FREE. You only pay for Student ID Cards at LKR 350 per student.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What are the ID Card pricing details?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><strong>Student ID Card Pricing:</strong> LKR 350 per student including full-color printing,
                            lamination, and unique student identification.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What happens after I get the FREE system?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Once you get the FREE system, you can:</p>
                        <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                            <li>Add unlimited teachers and staff</li>
                            <li>Set up your class structure</li>
                            <li>Configure payment plans</li>
                            <li>Access all features immediately</li>
                            <li>Start using the mobile app</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Do I need to pay maintenance fees?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><strong>No additional maintenance fees!</strong> All regular updates, security patches, and
                            basic technical support are included with your FREE system.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Can I get a sample ID Card?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        Absolutely! We provide sample ID Cards for review before you place your order. Contact us via
                        WhatsApp to request samples.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How long does setup take?</h4>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        System setup typically takes <strong>24-48 hours</strong>. Once setup is complete, you'll
                        receive login credentials and can start using the system immediately.
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Ready to Get Your <span class="gradient-text">FREE System</span>?</h2>
            <p>Get the complete NEXORA Education System for FREE today! Pay only for Student ID Cards at LKR 350 per
                student.</p>
            <div class="flex-between" style="justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <button onclick="sendToWhatsApp('Professional FREE Plan', 'Free System')" class="btn btn-primary">
                    <i class="fab fa-whatsapp"></i> Get FREE System
                </button>
                <a href="{{ url('/') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>

            <div class="demo-credentials">
                <div class="text-center">
                    <i class="fas fa-key" style="color: #10b981;"></i>
                    <span style="font-weight: 600;"> Demo Login:</span>
                </div>
                <div class="flex-between"
                    style="justify-content: center; gap: 1rem; margin-top: 0.5rem; flex-wrap: wrap;">
                    <code
                        style="background: rgba(255,255,255,0.1); padding: 0.25rem 0.75rem; border-radius: 6px;">admin@nexora.com</code>
                    <code
                        style="background: rgba(255,255,255,0.1); padding: 0.25rem 0.75rem; border-radius: 6px;">nexora</code>
                </div>
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
        // WhatsApp sharing function
        function sendToWhatsApp(planName, price) {
            const phoneNumber = '768971213';
            const message = `Hello NEXORA Team!\n\nI'm interested in the *${planName}* (${price}).\n\nPlease send me more details about:\n1. Getting the FREE system\n2. Student ID Card pricing (LKR 350 per student)\n3. Setup process\n4. System features\n\nThank you!\n\n*Name:* \n*Institute:* \n*Number of Students:* \n*Contact Number:* `;

            const encodedMessage = encodeURIComponent(message);
            const whatsappURL = `https://wa.me/94${phoneNumber}?text=${encodedMessage}`;
            window.open(whatsappURL, '_blank');
        }

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

        // FAQ toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
            });
        });
    </script>
</body>

</html>