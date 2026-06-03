<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Mobile App - NEXORA Education System</title>

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
            --card-bg: rgba(255, 255, 255, 0.05);
            --border-color: rgba(255, 255, 255, 0.1);
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
            border-bottom: 1px solid var(--border-color);
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
            z-index: 999;
            border-bottom: 1px solid var(--border-color);
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
            padding: 0.75rem;
            border-radius: 8px;
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
        .app-hero {
            padding: 2rem 2rem 1rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #8b949e;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Features */
        .features-section {
            padding: 1rem 2rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .feature-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #10b981;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .feature-icon i {
            color: #10b981;
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-description {
            color: #8b949e;
            font-size: 0.8rem;
        }

        /* Screenshot Grid */
        .showcase-section {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
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

        .screenshot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .screenshot-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
            cursor: pointer;
        }

        .screenshot-card:hover {
            transform: translateY(-8px);
            border-color: #10b981;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .screenshot-image {
            width: 100%;
            height: 450px;
            overflow: hidden;
            background: #1a1d24;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .screenshot-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .screenshot-card:hover .screenshot-image img {
            transform: scale(1.05);
        }

        .screenshot-info {
            padding: 1rem 1.2rem 1.2rem;
        }

        .screenshot-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .screenshot-description {
            color: #8b949e;
            font-size: 0.75rem;
            line-height: 1.4;
        }

        /* Full Screen Modal */
        .fullscreen-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.98);
            backdrop-filter: blur(20px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .fullscreen-modal.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-image-container img {
            max-width: 90%;
            max-height: 90%;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s;
            cursor: zoom-in;
        }

        .modal-image-container img.zoomed {
            transform: scale(1.8);
            cursor: zoom-out;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            z-index: 10;
        }

        .modal-close:hover {
            background: #10b981;
            transform: rotate(90deg);
        }

        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            z-index: 10;
        }

        .modal-nav:hover {
            background: #10b981;
            transform: translateY(-50%) scale(1.1);
        }

        .modal-nav.prev {
            left: 20px;
        }

        .modal-nav.next {
            right: 20px;
        }

        .modal-counter {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(16, 185, 129, 0.2);
            backdrop-filter: blur(10px);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 10;
        }

        .modal-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95), transparent);
            padding: 1.5rem 2rem;
            text-align: center;
        }

        .modal-info h3 {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }

        .modal-info p {
            color: #8b949e;
            font-size: 0.85rem;
        }

        /* Download Section */
        .download-section {
            padding: 3rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            margin: 2rem auto;
            border-radius: 24px;
            max-width: 1000px;
        }

        .download-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .download-text {
            color: #8b949e;
        }

        .download-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .download-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            padding: 0.8rem 1.8rem;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .download-btn:hover {
            background: rgba(16, 185, 129, 0.1);
            border-color: #10b981;
            transform: translateY(-3px);
        }

        .download-btn i {
            font-size: 1.5rem;
            color: #10b981;
        }

        /* Footer */
        .footer {
            padding: 2rem;
            text-align: center;
            border-top: 1px solid var(--border-color);
            color: #8b949e;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: #8b949e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: #10b981;
        }

        /* Image Counter */
        .image-counter {
            text-align: center;
            color: #8b949e;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(30px, -30px) rotate(120deg);
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

            .screenshot-image {
                height: 350px;
            }

            .screenshot-grid {
                grid-template-columns: 1fr;
            }

            .modal-nav {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .modal-nav.prev {
                left: 10px;
            }

            .modal-nav.next {
                right: 10px;
            }

            .modal-close {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .modal-info h3 {
                font-size: 1rem;
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
            <a href="{{ route('mobile-app') }}" class="nav-link active">Mobile App</a>
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
            <a href="{{ route('mobile-app') }}" class="mobile-nav-link active">Mobile App</a>
            <a href="{{ route('web-platform') }}" class="mobile-nav-link">Web Platform</a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link">Pricing</a>
            <a href="{{ route('login') }}" class="mobile-nav-link">Login</a>
        </div>
    </div>

    <!-- Full Screen Modal -->
    <div class="fullscreen-modal" id="fullscreenModal">
        <div class="modal-content">
            <div class="modal-counter" id="modalCounter"></div>
            <button class="modal-close" id="closeModal"><i class="fas fa-times"></i></button>
            <button class="modal-nav prev" id="prevImage"><i class="fas fa-chevron-left"></i></button>
            <button class="modal-nav next" id="nextImage"><i class="fas fa-chevron-right"></i></button>

            <div class="modal-image-container" id="modalImageContainer">
                <img src="" alt="App Screenshot" id="modalImage">
            </div>

            <div class="modal-info" id="modalInfo">
                <h3 id="modalTitle"></h3>
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>

    <!-- Background Animation -->
    <div class="background-animation" id="particles"></div>
    <div class="grid-overlay"></div>

    <!-- Main Content -->
    <div class="main-container">

        <!-- Hero Section -->
        <section class="app-hero">
            <h1 class="hero-title">NEXORA <span class="gradient-text">Mobile App</span></h1>
            <p class="hero-subtitle">
                Complete institute management in your pocket. Student management, attendance, payments and more.
            </p>
        </section>

        <!-- Features -->
        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-user-graduate"></i></div>
                    <h3 class="feature-title">Student Management</h3>
                    <p class="feature-description">Full student profiles with ID, grades, contacts</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-camera"></i></div>
                    <h3 class="feature-title">Capture Image</h3>
                    <p class="feature-description">Take and store student photos</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-qrcode"></i></div>
                    <h3 class="feature-title">QR Attendance</h3>
                    <p class="feature-description">Temporary & Activated QR codes</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-wallet"></i></div>
                    <h3 class="feature-title">Payments</h3>
                    <p class="feature-description">Fee collection & tracking</p>
                </div>
            </div>
        </section>

        <!-- Screenshot Grid -->
        <section class="showcase-section">
            <h2 class="section-title">App <span class="gradient-text">Screenshots</span></h2>
            <p class="image-counter" id="imageCounter">Loading screenshots...</p>

            <div class="screenshot-grid" id="screenshotGrid">
                <!-- Images will be loaded here -->
            </div>
        </section>

        <!-- Download Section -->
        <section class="download-section">
            <h2 class="download-title">Download <span class="gradient-text">NEXORA Mobile App</span></h2>
            <p class="download-text">Available for Android devices</p>
            <div class="download-buttons">
                <a href="#" class="download-btn" id="downloadLink">
                    <i class="fab fa-google-play"></i>
                    <div>
                        <small>GET IT ON</small><br>
                        <strong>Google Play</strong>
                    </div>
                </a>
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
        </footer>
    </div>

    <script>
        // Mobile app images data - Using correct storage path: storage/app/public/uploads/mobile/
        // For public access: /storage/uploads/mobile/
        const appImages = [
            { id: 1, src: '/storage/mobile/1.png', title: 'Splash Screen', description: 'NEXORA mobile app splash screen featuring logo and smooth loading animation.' },
            { id: 2, src: '/storage/mobile/2.png', title: 'Sign In Screen', description: 'Secure user login screen with email and password fields.' },
            { id: 3, src: '/storage/mobile/3.png', title: 'Side Menu', description: 'Main navigation menu providing access to all app features.' },
            { id: 4, src: '/storage/mobile/4.png', title: 'All Students View', description: 'Comprehensive list of all enrolled students with search and filter options.' },
            { id: 5, src: '/storage/mobile/5.png', title: 'Student Details View', description: 'Complete student profile with personal and academic information.' },
            { id: 6, src: '/storage/mobile/6.png', title: 'Student Classes View', description: 'Overview of all classes where the student is enrolled.' },
            { id: 7, src: '/storage/mobile/7.png', title: 'Payment History', description: 'Complete payment records with transaction history.' },
            { id: 8, src: '/storage/mobile/8.png', title: 'Attendance History', description: 'Detailed attendance records and percentage tracking.' },
            { id: 9, src: '/storage/mobile/9.png', title: 'Dashboard', description: 'Main dashboard with daily collection and class overview.' },
            { id: 10, src: '/storage/mobile/10.png', title: 'Attendance Summary', description: 'View lists of students who attended and were absent.' },
            { id: 11, src: '/storage/mobile/11.png', title: 'Mark Attendance', description: 'Quick attendance marking for today\'s classes.' },
            { id: 12, src: '/storage/mobile/12.png', title: 'Student Custom ID', description: 'Manage custom ID numbers and QR codes for students.' },
            { id: 13, src: '/storage/mobile/13.png', title: 'Mark Payment', description: 'Process payments for tuition and other fees.' },
            { id: 14, src: '/storage/mobile/14.png', title: 'Quick Image Capture', description: 'Capture student photos before registration.' },
            { id: 15, src: '/storage/mobile/15.png', title: 'Temporary QR Code', description: 'Generate time-limited QR codes for quick attendance.' },
            { id: 16, src: '/storage/mobile/16.png', title: 'Pay Class Fees', description: 'Monthly fee collection with receipt generation.' }
        ];

        // DOM Elements
        const screenshotGrid = document.getElementById('screenshotGrid');
        const modal = document.getElementById('fullscreenModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        const modalCounter = document.getElementById('modalCounter');
        const closeModal = document.getElementById('closeModal');
        const prevBtn = document.getElementById('prevImage');
        const nextBtn = document.getElementById('nextImage');
        const imageCounterSpan = document.getElementById('imageCounter');
        const downloadLink = document.getElementById('downloadLink');

        let currentIndex = 0;
        let isZoomed = false;

        // Load screenshot grid
        function loadScreenshots() {
            if (!screenshotGrid) return;
            screenshotGrid.innerHTML = '';

            let loadedCount = 0;

            appImages.forEach((image, index) => {
                const card = document.createElement('div');
                card.className = 'screenshot-card';
                card.dataset.index = index;

                card.innerHTML = `
                    <div class="screenshot-image">
                        <img src="${image.src}" alt="${image.title}" loading="lazy" 
                             onload="this.style.opacity='1'"
                             onerror="this.src='https://via.placeholder.com/300x450?text=Image+Not+Found&bg=1a1d24&color=10b981'">
                    </div>
                    <div class="screenshot-info">
                        <h3 class="screenshot-title">${escapeHtml(image.title)}</h3>
                        <p class="screenshot-description">${escapeHtml(image.description)}</p>
                    </div>
                `;

                card.addEventListener('click', () => openModal(index));
                screenshotGrid.appendChild(card);
            });

            if (imageCounterSpan) {
                imageCounterSpan.textContent = `Showing ${appImages.length} app screenshots`;
            }
        }

        // Escape HTML to prevent XSS
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Open modal
        function openModal(index) {
            currentIndex = index;
            updateModalContent();
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            isZoomed = false;
            modalImage.classList.remove('zoomed');
        }

        // Close modal
        function closeModalFunc() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Update modal content
        function updateModalContent() {
            const image = appImages[currentIndex];
            modalImage.src = image.src;
            modalTitle.textContent = image.title;
            modalDescription.textContent = image.description;
            modalCounter.textContent = `${currentIndex + 1} / ${appImages.length}`;
        }

        // Previous image
        function prevImage() {
            currentIndex = (currentIndex - 1 + appImages.length) % appImages.length;
            updateModalContent();
            if (isZoomed) {
                isZoomed = false;
                modalImage.classList.remove('zoomed');
            }
        }

        // Next image
        function nextImage() {
            currentIndex = (currentIndex + 1) % appImages.length;
            updateModalContent();
            if (isZoomed) {
                isZoomed = false;
                modalImage.classList.remove('zoomed');
            }
        }

        // Toggle zoom
        function toggleZoom(e) {
            e.stopPropagation();
            isZoomed = !isZoomed;
            if (isZoomed) {
                modalImage.classList.add('zoomed');
            } else {
                modalImage.classList.remove('zoomed');
            }
        }

        // Handle download click
        if (downloadLink) {
            downloadLink.addEventListener('click', (e) => {
                e.preventDefault();
                alert('App download link will be available soon. Please contact us for the APK file.');
            });
        }

        // Create particles
        function createParticles() {
            const container = document.getElementById('particles');
            if (!container) return;

            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
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

        // Event Listeners
        if (closeModal) closeModal.addEventListener('click', closeModalFunc);
        if (prevBtn) prevBtn.addEventListener('click', prevImage);
        if (nextBtn) nextBtn.addEventListener('click', nextImage);
        if (modalImage) modalImage.addEventListener('click', toggleZoom);

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('active')) return;

            switch (e.key) {
                case 'Escape':
                    closeModalFunc();
                    break;
                case 'ArrowLeft':
                    prevImage();
                    break;
                case 'ArrowRight':
                    nextImage();
                    break;
            }
        });

        // Click outside to close modal
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModalFunc();
                }
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            loadScreenshots();
        });
    </script>
</body>

</html>