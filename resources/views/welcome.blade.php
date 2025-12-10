<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Rumah Makan Jati BSD - Restoran dengan cita rasa autentik Indonesia">
  <meta name="keywords" content="rumah makan, restoran indonesia, BSD, Tangerang Selatan">
  <title>RUMAH MAKAN JATI - Cita Rasa Autentik Indonesia</title>

  <!-- Favicon / Logo -->
  <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/png"/>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Outfit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <style>
    * {
      font-family: 'Outfit', sans-serif;
      scroll-behavior: smooth;
    }
    
    .font-serif {
      font-family: 'Playfair Display', serif;
    }
    
    body {
      overflow-x: hidden;
    }

    /* Loading Screen */
    .loading-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #683017 0%, #A0522D 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    .loading-screen.hidden {
      opacity: 0;
      visibility: hidden;
    }

    .loader {
      width: 60px;
      height: 60px;
      border: 4px solid rgba(234, 179, 8, 0.3);
      border-top-color: #EAB308;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Scroll Progress Bar */
    .scroll-progress {
      position: fixed;
      top: 0;
      left: 0;
      width: 0%;
      height: 4px;
      background: linear-gradient(90deg, #EAB308, #F59E0B);
      z-index: 9999;
      transition: width 0.1s ease;
    }
    
    .navbar-blur {
      background: rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-bottom: none;
    }

    /* Back to Top Button */
    .back-to-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #EAB308, #F59E0B);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 1000;
      box-shadow: 0 4px 15px rgba(234, 179, 8, 0.4);
    }

    .back-to-top.show {
      opacity: 1;
      visibility: visible;
    }

    .back-to-top:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(234, 179, 8, 0.6);
    }

    .back-to-top svg {
      width: 24px;
      height: 24px;
      color: white;
    }

    /* Hero Section Styles */
    .hero-overlay {
      background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.7) 100%);
    }

    .hero-parallax {
      transition: transform 0.1s ease-out;
    }

    /* Fade in animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in-up {
      animation: fadeInUp 1s ease-out forwards;
    }

    .animate-fade-in-down {
      animation: fadeInDown 1s ease-out forwards;
    }

    /* Scroll animations */
    .scroll-animate {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate.active {
      opacity: 1;
      transform: translateY(0);
    }

    /* Image hover effects */
    .image-hover-zoom {
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .image-hover-zoom img {
      transition: transform 0.6s ease;
    }

    .image-hover-zoom:hover img {
      transform: scale(1.0);
    }

    /* Brewing Station Image Hover Effect */
    .brewing-image-container {
      overflow: hidden;
      position: relative;
    }

    .brewing-image {
      transition: transform 0.7s ease-out;
      transform-origin: center center;
    }

    .brewing-image-container:hover .brewing-image {
      transform: scale(1.15);
    }

    /* Mobile Menu */
    .mobile-menu {
      transform: translateX(100%);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      overflow-y: auto;
      -webkit-overflow-scrolling: touch;
    }

    .mobile-menu.active {
      transform: translateX(0);
      box-shadow: -10px 0 30px rgba(0, 0, 0, 0.5);
    }

    .mobile-menu nav {
      animation: fadeInRight 0.5s ease-out;
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(20px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .mobile-menu-link {
      display: block;
      position: relative;
    }

    .mobile-menu-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #EAB308;
      transition: width 0.3s ease;
    }

    .mobile-menu-link:hover::after {
      width: 100%;
    }

    .hamburger {
      display: flex;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: 8px;
      border-radius: 8px;
      transition: background 0.3s ease;
    }

    .hamburger:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .hamburger span {
      display: block;
      width: 28px;
      height: 3px;
      background: white;
      border-radius: 3px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(8px, 8px);
      background: #EAB308;
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
      transform: translateX(-20px);
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -7px);
      background: #EAB308;
    }

    /* Decorative line */
    .decorative-line {
      width: 60px;
      height: 2px;
      background: #EAB308;
      margin: 0 auto;
    }

    /* Button hover effect */
    .btn-primary {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }

    .btn-primary:hover::before {
      width: 300px;
      height: 300px;
    }

    /* Smooth Transitions */
    a, button, input, textarea {
      transition: all 0.3s ease;
    }

    /* Card Improvements */
    .card-hover {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    /* Menu Card with better overlay */
    .menu-card {
      position: relative;
      overflow: hidden;
      border-radius: 0;
    }

    .menu-card img {
      transform-origin: center center;
      will-change: transform;
    }

    .menu-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.4s ease;
      z-index: 1;
    }

    .menu-card:hover::before {
      opacity: 1;
    }

    .menu-card-title {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 1.5rem;
      transform: translateY(100%);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 2;
    }

    .menu-card:hover .menu-card-title {
      transform: translateY(0);
    }

    /* Contact Card Enhancement */
    .contact-card {
      background: rgba(0, 0, 0, 0.2);
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 1.5rem 0 1.5rem 0;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .contact-card:hover {
      border-color: rgba(234, 179, 8, 0.5);
      background: rgba(0, 0, 0, 0.3);
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(234, 179, 8, 0.2);
    }

    /* Button Glow Effect */
    .btn-glow {
      position: relative;
      overflow: visible;
    }

    .btn-glow::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      background: inherit;
      border-radius: inherit;
      transform: translate(-50%, -50%);
      filter: blur(20px);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: -1;
    }

    .btn-glow:hover::after {
      opacity: 0.6;
    }

    /* Improved Form Inputs */
    .form-input {
      background: rgba(255, 255, 255, 0.1);
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }

    .form-input:focus {
      background: rgba(255, 255, 255, 0.15);
      border-color: #EAB308;
      box-shadow: 0 0 0 4px rgba(234, 179, 8, 0.1);
      transform: translateY(-2px);
    }

    .form-input:hover {
      border-color: rgba(255, 255, 255, 0.5);
    }

    /* Section Divider */
    .section-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent, #EAB308, transparent);
      margin: 2rem auto;
      max-width: 200px;
    }

    /* Pulse Animation for CTA */
    @keyframes pulse-glow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(234, 179, 8, 0.4);
      }
      50% {
        box-shadow: 0 0 40px rgba(234, 179, 8, 0.8);
      }
    }

    .pulse-glow {
      animation: pulse-glow 2s ease-in-out infinite;
    }

    /* Mobile Menu Overlay */
    #mobileMenuOverlay {
      transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    #mobileMenuOverlay.visible {
      visibility: visible;
      opacity: 1;
    }

    #mobileMenuOverlay.invisible {
      visibility: hidden;
      opacity: 0;
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {
      .back-to-top {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
      }

      .hero-parallax {
        transform: none !important;
      }

      .decorative-line {
        width: 50px;
      }

      .menu-card-title {
        transform: translateY(0);
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
      }

      .contact-card {
        border-radius: 1rem 0 1rem 0;
      }

      .mobile-menu {
        width: 100%;
      }

      .mobile-menu nav {
        max-height: calc(100vh - 100px);
        overflow-y: auto;
      }
    }

    /* Tablet Optimizations */
    @media (min-width: 640px) and (max-width: 1023px) {
      .mobile-menu {
        width: 400px;
      }
    }

    /* Smooth entrance for cards */
    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .slide-in-up {
      animation: slideInUp 0.6s ease-out forwards;
    }
  </style>
</head>
<body class="bg-white text-gray-900">

<!-- Loading Screen -->
<div class="loading-screen" id="loadingScreen">
  <div class="loader"></div>
</div>

<!-- Scroll Progress Bar -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Back to Top Button -->
<div class="back-to-top" id="backToTop">
  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
  </svg>
</div>

<!-- Mobile Menu Overlay -->
<div id="mobileMenuOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-30 opacity-0 invisible transition-all duration-300"></div>

<!-- Navbar -->
<header id="navbar" class="fixed top-0 left-0 right-0 navbar-blur z-50 transition-transform duration-300">
  <div class="max-w-7xl mx-auto flex justify-between items-center px-4 md:px-8 lg:px-12 py-4 md:py-5">
    <a href="#home" class="flex items-center gap-2 md:gap-3 shrink-0">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Logo RUMAH MAKAN JATI" class="w-10 h-10 md:w-12 md:h-12 object-contain">
      <h1 class="text-lg md:text-xl font-bold text-white font-serif tracking-wider">
        RUMAH MAKAN JATI
      </h1>
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:flex items-center gap-8 text-base font-light">
      <a href="#home" class="text-white hover:text-yellow-400 transition-colors">Home</a>
      <a href="https://drive.google.com/file/d/1p3e6N0my2smstN89swwJdJja6VPgl1vj/view" class="text-white hover:text-yellow-400 transition-colors">Menu</a>
      <a href="#about" class="text-white hover:text-yellow-400 transition-colors">Tentang</a>
      <a href="#gallery" class="text-white hover:text-yellow-400 transition-colors">Galeri</a>
      <a href="#gallery" class="text-white hover:text-yellow-400 transition-colors">Event & catering</a>
      <a href="#contact" class="text-white hover:text-yellow-400 transition-colors">Kontak</a>
    </nav>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="lg:hidden hamburger z-50" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 w-full sm:w-80 h-screen bg-black/95 backdrop-blur-lg lg:hidden z-40">
    <nav class="flex flex-col gap-6 p-8 mt-20">
      <a href="#home" class="mobile-menu-link text-white text-2xl font-light hover:text-yellow-400 transition-colors border-b border-white/20 pb-4">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          Home
        </div>
      </a>
      <a href="https://drive.google.com/file/d/1p3e6N0my2smstN89swwJdJja6VPgl1vj/view" target="_blank" rel="noopener noreferrer" class="mobile-menu-link text-white text-2xl font-light hover:text-yellow-400 transition-colors border-b border-white/20 pb-4">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
          Menu
        </div>
      </a>
      <a href="#about" class="mobile-menu-link text-white text-2xl font-light hover:text-yellow-400 transition-colors border-b border-white/20 pb-4">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          Tentang
        </div>
      </a>
      <a href="#gallery" class="mobile-menu-link text-white text-2xl font-light hover:text-yellow-400 transition-colors border-b border-white/20 pb-4">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          Galeri
        </div>
      </a>
      <a href="#contact" class="mobile-menu-link text-white text-2xl font-light hover:text-yellow-400 transition-colors border-b border-white/20 pb-4">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
          Kontak
        </div>
      </a>
      
      <!-- WhatsApp Button in Mobile Menu -->
      <a href="https://wa.me/6285213452474" target="_blank" rel="noopener noreferrer" class="mt-4 flex items-center justify-center gap-3 px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold text-lg rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        Chat WhatsApp
      </a>
    </nav>
  </div>
</header>

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center text-white overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0">
    <img src="assets/images/bg.png" alt="Rumah Makan Jati" class="w-full h-full object-cover object-bottom">
    <div class="absolute inset-0 hero-overlay"></div>
  </div>

  <div class="relative z-10 text-center px-4 sm:px-6 max-w-4xl mx-auto">
    <h2 class="font-serif text-4xl xs:text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold mb-4 sm:mb-6 animate-fade-in-down tracking-wide leading-tight">
      RUMAH MAKAN JATI
    </h2>
    <div class="decorative-line mb-4 sm:mb-6"></div>
    <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-8 sm:mb-12 font-light tracking-wide animate-fade-in-up px-2" style="animation-delay: 0.3s;">
      Restoran dengan cita rasa autentik Indonesia
    </p>
    <a href="https://wa.me/6285213452474" class="btn-primary btn-glow pulse-glow inline-flex items-center gap-3 px-8 sm:px-12 py-4 sm:py-5 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 font-bold text-base sm:text-lg tracking-wide rounded-full hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-110 animate-fade-in-up shadow-2xl" style="animation-delay: 0.6s;">
      <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
      </svg>
      Reservasi Sekarang
    </a>
  </div>

  <!-- Scroll indicator -->
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
    </svg>
  </div>
</section>

<!-- About Section -->
<div class="w-full">
<section id="about" class="min-h-screen py-20 md:py-32 px-4 w-full flex items-center" style="background: linear-gradient(to bottom, #683017, #A0522D);">
  <div class="w-full mx-auto">
    <div class="text-center mb-16 scroll-animate">
      <p class="text-yellow-400 text-sm tracking-widest mb-4">TENTANG KAMI</p>
      <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
        RUMAH MAKAN JATI
      </h2>
      <div class="decorative-line mb-8"></div>
    </div>

    <div class="scroll-animate w-full px-6 sm:px-8 md:px-16 lg:px-32 xl:px-40">
      <div class="max-w-4xl mx-auto">
        <!-- Story Card -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 md:p-10 border border-white/10 mb-8">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-yellow-400/20 rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
              </svg>
            </div>
            <h3 class="text-yellow-400 font-bold text-xl">Cerita Kami</h3>
          </div>
          <p class="text-white text-sm sm:text-base md:text-lg leading-relaxed mb-4">
            Rumah Makan Jati BSD adalah sebuah restoran yang berdiri dengan tujuan menghadirkan cita rasa masakan khas Indonesia yang autentik dan menggugah selera. Berawal dari kecintaan terhadap kuliner nusantara, restoran ini didirikan pada tahun <span class="text-yellow-400 font-semibold">2012</span> di BSD, Tangerang Selatan.
          </p>
          <p class="text-white/90 text-sm sm:text-base leading-relaxed">
            Dengan suasana yang nyaman dan nuansa tradisional, Rumah Makan Jati BSD menjadi tempat yang cocok untuk menikmati hidangan khas dengan resep turun-temurun.
          </p>
        </div>

        <!-- Mission Card -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 md:p-10 border border-white/10">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-yellow-400/20 rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-yellow-400 font-bold text-xl">Komitmen Kami</h3>
          </div>
          <p class="text-white text-sm sm:text-base md:text-lg leading-relaxed">
            Menjadi restoran pilihan utama yang menyajikan masakan Indonesia berkualitas dengan cita rasa otentik, serta memberikan pengalaman bersantap yang nyaman dan berkesan bagi setiap pelanggan.
          </p>
        </div>
      </div>
    </div>

    <!-- Stats Section -->
    <div class="max-w-6xl mx-auto mt-16 px-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        <!-- Stat 1 -->
        <div class="scroll-animate card-hover bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20">
          <div class="text-yellow-400 text-3xl md:text-4xl font-bold mb-2">13+</div>
          <div class="text-white text-xs md:text-sm font-light">Tahun Berpengalaman</div>
        </div>
        
        <!-- Stat 2 -->
        <div class="scroll-animate card-hover bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20" style="animation-delay: 0.1s;">
          <div class="text-yellow-400 text-3xl md:text-4xl font-bold mb-2">50+</div>
          <div class="text-white text-xs md:text-sm font-light">Menu Pilihan</div>
        </div>
        
        <!-- Stat 3 -->
        <div class="scroll-animate card-hover bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20" style="animation-delay: 0.2s;">
          <div class="text-yellow-400 text-3xl md:text-4xl font-bold mb-2">1000+</div>
          <div class="text-white text-xs md:text-sm font-light">Pelanggan Puas</div>
        </div>
        
        <!-- Stat 4 -->
        <div class="scroll-animate card-hover bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20" style="animation-delay: 0.3s;">
          <div class="text-yellow-400 text-3xl md:text-4xl font-bold mb-2">4.8★</div>
          <div class="text-white text-xs md:text-sm font-light">Rating Pelanggan</div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!-- Menu Favorit Section -->
<section id="gallery" class="py-20 md:py-32 w-full" style="background-color: #683017;">
  <div class="w-full px-0">
    <div class="text-center mb-16 scroll-animate px-4">
      <p class="text-yellow-400 text-sm tracking-widest mb-4">PILIHAN TERBAIK</p>
      <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
        MENU FAVORIT
      </h2>
      <div class="decorative-line mb-8"></div>
    </div>

    <!-- Menu Favorit Grid 2x3 -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-2">
      <!-- Menu Item 1 - Gurame Sup Kuning -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer">
        <img src="{{ asset('assets/images/favMenu/gurame.JPG') }}" alt="Gurame Sup Kuning" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Gurame Sup Kuning</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Signature Dish</p>
        </div>
      </div>
      
      <!-- Menu Item 2 - Ayam Penyet Jati -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer" style="animation-delay: 0.1s;">
        <img src="{{ asset('assets/images/favMenu/ayam-penyet.JPG') }}" alt="Ayam Penyet Jati" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Ayam Penyet Jati</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Best Seller</p>
        </div>
      </div>
      
      <!-- Menu Item 3 - Gurame Rujak Kecombrang -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer" style="animation-delay: 0.2s;">
        <img src="{{ asset('assets/images/favMenu/gurame-rujak.JPG') }}" alt="Gurame Rujak Kecombrang" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Gurame Rujak Kecombrang</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Spicy & Fresh</p>
        </div>
      </div>

      <!-- Menu Item 4 - Es Cincau Hitam -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer" style="animation-delay: 0.3s;">
        <img src="{{ asset('assets/images/favMenu/es-cincau.png') }}" alt="Es Cincau Hitam" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Es Cincau Hitam</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Refreshing</p>
        </div>
      </div>
      
      <!-- Menu Item 5 - Es Kelapa Muda -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer" style="animation-delay: 0.4s;">
        <img src="{{ asset('assets/images/favMenu/es-kelapa.png') }}" alt="Es Kelapa Muda" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Es Kelapa Muda</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Natural & Fresh</p>
        </div>
      </div>
      
      <!-- Menu Item 6 - Es Mangga Serut -->
      <div class="scroll-animate menu-card aspect-square group cursor-pointer" style="animation-delay: 0.5s;">
        <img src="{{ asset('assets/images/favMenu/es-kelapa-jeruk.png') }}" alt="Es Kelapa jeruk" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
        <div class="menu-card-title">
          <h4 class="text-white text-base md:text-xl font-bold mb-1">Es kelapa Jeruk</h4>
          <p class="text-yellow-400 text-xs md:text-sm font-light">Sweet & Tangy</p>
        </div>
      </div>
    </div>
    
    <!-- Menu Button -->
    <div class="scroll-animate text-center mt-12 px-4" style="animation-delay: 0.6s;">
      <div class="relative inline-block">
        <!-- Glow effect -->
        <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 animate-pulse"></div>
        
        <!-- Button -->
        <a href="https://drive.google.com/file/d/1p3e6N0my2smstN89swwJdJja6VPgl1vj/view" class="group relative inline-flex items-center gap-3 px-12 py-5 bg-gradient-to-br from-white/90 to-white/70 backdrop-blur-sm text-gray-900 font-bold text-lg md:text-xl rounded-3xl shadow-2xl hover:shadow-yellow-500/50 transform hover:scale-110 transition-all duration-300 border-2 border-white/50">
          <!-- Icon -->
          <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full group-hover:rotate-180 transition-transform duration-500">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
          </span>
          
          <!-- Text -->
          <span class="relative">
            <span class="block group-hover:scale-110 transition-transform duration-300">Lihat Menu Lengkap</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-400 to-orange-500 group-hover:w-full transition-all duration-500"></span>
          </span>
          
          <!-- Arrow -->
          <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Brewing Station Section -->
<section class="bg-[#683017] py-0 border-t-4 border-b-4 border-yellow-500">
  <div class="max-w-full mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 items-stretch min-h-screen md:min-h-[700px]">
      <!-- Image -->
      <div class="overflow-hidden order-2 md:order-1 h-[500px] md:h-auto brewing-image-container">
        <img src="{{ asset('assets/images/minuman.jpg') }}" alt="minuman" class="w-full h-full object-cover brewing-image transition-transform duration-700 ease-out" loading="lazy">
      </div>
      
      <!-- Content -->
      <div class="scroll-animate order-1 md:order-2 flex items-center px-6 md:px-12 lg:px-16 py-16 md:py-20">
        <div class="max-w-xl">
          <div class="inline-block px-4 py-2 bg-yellow-400/20 rounded-full mb-6">
            <span class="text-yellow-400 text-sm font-semibold tracking-wider">MINUMAN SPESIAL</span>
          </div>
          
          <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
            BREWING STATION
          </h2>
          <div class="section-divider mb-8" style="margin-left: 0;"></div>
          
          <div class="space-y-4 mb-8">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 bg-yellow-400/20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <p class="text-white text-sm md:text-base leading-relaxed">
                Setiap botol diracik dengan <span class="text-yellow-400 font-semibold">ketelitian</span> dan rasa yang seimbang menggunakan bahan-bahan berkualitas premium.
              </p>
            </div>
            
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 bg-yellow-400/20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <p class="text-white text-sm md:text-base leading-relaxed">
                Formula yang diuji berulang kali untuk mencapai rasa yang <span class="text-yellow-400 font-semibold">stabil dan nikmat</span>.
              </p>
            </div>
            
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 bg-yellow-400/20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <p class="text-white text-sm md:text-base leading-relaxed">
                Dari cokelat pekat, karamel gurih, hingga racikan kopi khas dalam <span class="text-yellow-400 font-semibold">botol praktis</span>.
              </p>
            </div>
          </div>
          
          <!-- Button -->
          <a href="https://drive.google.com/file/d/1jQwXhy53cv_6pHb1ByNhNjE1JmZdY-sw/view" class="group relative inline-flex items-center gap-3 px-12 py-5 bg-gradient-to-br from-white/90 to-white/70 backdrop-blur-sm text-gray-900 font-bold text-lg md:text-xl rounded-3xl shadow-2xl hover:shadow-yellow-500/50 transform hover:scale-110 transition-all duration-300 border-2 border-white/50">
            <!-- icon -->
            <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full group-hover:rotate-180 transition-transform duration-500">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M5 3h14a1 1 0 011 1v2a1 1 0 01-1 1h-1v13a2 2 0 01-2 2H8a2 2 0 01-2-2V7H5a1 1 0 01-1-1V4a1 1 0 011-1zm3 4v13h8V7H8zm2-4v2h4V3h-4z"/>
            </svg>
            </span>
            
            <!-- Text -->
            <span class="relative">
              <span class="block group-hover:scale-110 transition-transform duration-300">Lihat Minuman Lengkap</span>
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-400 to-orange-500 group-hover:w-full transition-all duration-500"></span>
            </span>
            
            <!-- Arrow -->
            <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Event & Catering Section -->
<section class="relative min-h-screen flex items-center justify-center text-white overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0">
    <img src="assets/images/event.jpeg" alt="Event & Catering" class="w-full h-full object-cover object-bottom">
    <div class="absolute inset-0 bg-black/60"></div>
  </div>

  <!-- Content -->
  <div class="relative z-10 text-center px-4 max-w-4xl mx-auto scroll-animate">
    <h2 class="font-serif text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold mb-8 tracking-wide">
      EVENT<br>
      <span class="text-4xl sm:text-5xl md:text-6xl">&</span><br>
      CATERING
    </h2>
    
    <div class="flex items-center justify-center gap-8 mb-12">
      <div class="hidden sm:block w-16 md:w-24 h-0.5 bg-white"></div>
      <div class="w-2 h-2 bg-white rotate-45"></div>
      <div class="hidden sm:block w-16 md:w-24 h-0.5 bg-white"></div>
    </div>

    <p class="text-lg sm:text-xl md:text-2xl mb-12 font-light leading-relaxed max-w-2xl mx-auto">
      Jadikan momen spesial Anda tak terlupakan dengan layanan katering dan paket Event kami.
    </p>

    <!-- Pricelist Button -->
    <a href="https://drive.google.com/file/d/1jrm_TiXaWiE0MHKh0sYmO7kzxRk-aKT4/view" class="inline-block px-12 py-4 border-2 border-white text-white font-light text-lg tracking-wider hover:bg-white hover:text-black transition-all duration-300 relative overflow-hidden group">
      <span class="relative z-10">Event</span>
      <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
    </a>
    <a href="https://drive.google.com/file/d/1WBUhh5gqOiIOfwCt9u4BE_SVuWZcKeOt/view" class="inline-block px-12 py-4 border-2 border-white text-white font-light text-lg tracking-wider hover:bg-white hover:text-black transition-all duration-300 relative overflow-hidden group">
      <span class="relative z-10">Catering</span>
      <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
    </a>
  </div>

  <!-- Decorative Elements -->
  <div class="absolute top-10 left-10 w-20 h-20 border-t-2 border-l-2 border-white/30"></div>
  <div class="absolute bottom-10 right-10 w-20 h-20 border-b-2 border-r-2 border-white/30"></div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 md:py-32 px-4" style="background-color: #A0522D;">
  <div class="max-w-4xl mx-auto text-center">
    <div class="scroll-animate">
      <p class="text-yellow-400 text-sm tracking-widest mb-4">HUBUNGI KAMI</p>
      <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8">
        KONTAK
      </h2>
      <div class="decorative-line mb-12"></div>
      
      <p class="text-white text-lg md:text-xl mb-12">
        Telepon: +62 852‑1345‑2474
      </p>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
        <div class="p-8 rounded-tl-3xl" style="background-color: rgba(0,0,0,0.2); border: 2px solid rgba(255, 255, 255, 0.3);">
          <h3 class="text-yellow-400 font-semibold mb-4 text-lg">ALAMAT</h3>
          <p class="text-white leading-relaxed">
            Jl. Ciater Raya No.2,<br>
            Rw. Mekar Jaya, Kec. Serpong,<br>
            Kota Tangerang Selatan, Banten 15310
          </p>
        </div>
        
        <div class="p-8 rounded-tl-3xl" style="background-color: rgba(0,0,0,0.2); border: 2px solid rgba(255, 255, 255, 0.3);">
          <h3 class="text-yellow-400 font-semibold mb-4 text-lg">JAM OPERASIONAL</h3>
          <p class="text-white leading-relaxed">
            <span class="text-yellow-400">Buka Setiap Hari :</span><br>
            Monday	10.00 am–9.00 pm<br>
            Tuesday	10.00 am–9.00 pm<br>
            Wednesday	10.00 am–9.00 pm<br>
            Thursday	10.00 am–9.00 pm<br>
            Friday	10.00 am–9.00 pm<br>
            <span class="text-yellow-400">Weekend :</span><br>
            Saturday	10.00 am–10.00 pm<br>
            Sunday	10.00 am–10.00 pm<br>
          </p>
        </div>
      </div>
      
      <!-- Google Maps -->
      <div class="mt-12">
        <h3 class="text-yellow-400 font-semibold mb-6 text-xl text-center">LOKASI KAMI</h3>
        <div class="rounded-lg overflow-hidden shadow-2xl border-4 border-yellow-500/30 hover:border-yellow-500/60 transition-all duration-300">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9876543210!2d106.6890978!3d-6.3128396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5305c376549%3A0x713136277b32d8ca!2sRumah%20Makan%20Jati!5e0!3m2!1sen!2sid!4v1733875200000!5m2!1sen!2sid" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="w-full"
          ></iframe>
        </div>
        <div class="text-center mt-4">
          <a 
            href="https://www.google.com/maps/place/Rumah+Makan+Jati/@-6.3129628,106.6890978,18.01z/data=!4m6!3m5!1s0x2e69e5305c376549:0x713136277b32d8ca!8m2!3d-6.3128396!4d106.6915488!16s%2Fg%2F1hm1vrws1?entry=ttu" 
            target="_blank"
            class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-400 text-gray-900 font-semibold rounded-lg hover:bg-yellow-500 transition-all duration-300 transform hover:scale-105 shadow-lg"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            Buka di Google Maps
          </a>
        </div>
      </div>
      
      <!-- Feedback Form -->
      <div class="mt-16 max-w-2xl mx-auto">
        <div class="p-8 rounded-lg" style="background-color: rgba(0,0,0,0.2); border: 2px solid rgba(255, 255, 255, 0.3);">
          <h3 class="text-yellow-400 font-semibold mb-6 text-xl text-center">KIRIM FEEDBACK</h3>
          
          <form id="feedbackForm" class="space-y-4">
            <!-- Email Input -->
            <div class="text-left">
              <label for="email" class="block text-white text-sm font-medium mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Email
              </label>
              <input 
                type="email" 
                id="email" 
                name="email" 
                required 
                placeholder="nama@email.com"
                class="form-input w-full px-4 py-3 text-white placeholder-white/50 focus:outline-none"
              >
            </div>

            <!-- Subject Input -->
            <div class="text-left">
              <label for="subject" class="block text-white text-sm font-medium mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                Subjek
              </label>
              <input 
                type="text" 
                id="subject" 
                name="subject" 
                required 
                placeholder="Masukkan subjek pesan"
                class="form-input w-full px-4 py-3 text-white placeholder-white/50 focus:outline-none"
              >
            </div>

            <!-- Message Textarea -->
            <div class="text-left">
              <label for="message" class="block text-white text-sm font-medium mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Pesan
              </label>
              <textarea 
                id="message" 
                name="message" 
                required 
                rows="5"
                placeholder="Tulis pesan atau feedback Anda di sini..."
                class="form-input w-full px-4 py-3 text-white placeholder-white/50 focus:outline-none resize-none"
              ></textarea>
            </div>

            <!-- Submit Button -->
            <button 
              type="submit" 
              class="btn-glow w-full px-10 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 font-bold text-lg rounded-xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-2"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
              </svg>
              Kirim Feedback
            </button>

            <!-- Status Message -->
            <div id="formStatus" class="text-center text-sm mt-4 hidden"></div>
          </form>
        </div>
      </div>

      <div class="mt-12 scroll-animate" style="animation-delay: 0.3s;">
        <a href="https://wa.me/6285213452474" target="_blank" rel="noopener noreferrer" class="btn-glow inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold text-lg tracking-wide rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-110 shadow-2xl">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          Chat via WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white py-8" style="background-color: #6B3410;">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <div class="flex items-center justify-center gap-3 mb-4">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8">
      <p class="font-serif text-xl tracking-wider">RUMAH MAKAN JATI</p>
    </div>
    <p class="text-gray-400 text-sm mb-4">© {{ date('Y') }} Rumah Makan Jati — Cita Rasa Autentik Indonesia</p>
    <div class="flex justify-center gap-6">
      <a href="https://www.instagram.com/rumahmakanjati.bsd/?hl=en" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors" aria-label="Instagram">
        <img src="{{ asset('assets/images/ig.png') }}" alt="Instagram" class="w-6 h-6 opacity-70 hover:opacity-100">
      </a>
      <a href="https://wa.me/6285213452474" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors" aria-label="WhatsApp">
        <img src="{{ asset('assets/images/wa.png') }}" alt="WhatsApp" class="w-6 h-6 opacity-70 hover:opacity-100">
      </a>
      <a href="https://www.tiktok.com/@rmjatibsd?ug_source=op.auth&ug_term=Linktr.ee&utm_source=awyc6vc625ejxp86&utm_campaign=tt4d_profile_link&_r=1" target="_blank" rel="noopener noreferrer" class="hover:text-yellow-400 transition-colors" aria-label="TikTok">
        <img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok" class="w-6 h-6 opacity-70 hover:opacity-100">
      </a>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script>
  // 1. Loading Screen
  window.addEventListener('load', () => {
    const loadingScreen = document.getElementById('loadingScreen');
    setTimeout(() => {
      loadingScreen.classList.add('hidden');
    }, 500);
  });

  // 2. Scroll Progress Bar
  window.addEventListener('scroll', () => {
    const scrollProgress = document.getElementById('scrollProgress');
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercentage = (scrollTop / scrollHeight) * 100;
    scrollProgress.style.width = scrollPercentage + '%';
  }, { passive: true });

  // 3. Back to Top Button
  const backToTop = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
      backToTop.classList.add('show');
    } else {
      backToTop.classList.remove('show');
    }
  }, { passive: true });

  backToTop.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // 4. Parallax Effect on Hero Section
  window.addEventListener('scroll', () => {
    const heroParallax = document.querySelector('.hero-parallax');
    if (heroParallax && window.innerWidth > 768) {
      const scrolled = window.pageYOffset;
      heroParallax.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
  }, { passive: true });

  // 5. Navbar scroll hide/show
  (function () {
    const header = document.getElementById('navbar');
    if (!header) return;
    let lastY = window.pageYOffset || document.documentElement.scrollTop || 0;
    let ticking = false;
    const threshold = 20;
    
    function update() {
      const currentY = window.pageYOffset || document.documentElement.scrollTop || 0;
      if (currentY > lastY && currentY > threshold) {
        header.classList.add('-translate-y-full');
      } else {
        header.classList.remove('-translate-y-full');
      }
      lastY = currentY;
      ticking = false;
    }

    window.addEventListener('scroll', () => {
      if (!ticking) {
        window.requestAnimationFrame(update);
        ticking = true;
      }
    }, { passive: true });
  })();

  // 6. Mobile Menu
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
  const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

  if (mobileMenuBtn && mobileMenu && mobileMenuOverlay) {
    // Toggle menu
    mobileMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isActive = mobileMenu.classList.contains('active');
      
      mobileMenuBtn.classList.toggle('active');
      mobileMenu.classList.toggle('active');
      document.body.style.overflow = !isActive ? 'hidden' : '';
      
      // Toggle overlay
      if (!isActive) {
        mobileMenuOverlay.classList.remove('invisible', 'opacity-0');
        mobileMenuOverlay.classList.add('visible', 'opacity-100');
      } else {
        mobileMenuOverlay.classList.add('invisible', 'opacity-0');
        mobileMenuOverlay.classList.remove('visible', 'opacity-100');
      }
    });

    // Function to close menu
    const closeMenu = () => {
      mobileMenuBtn.classList.remove('active');
      mobileMenu.classList.remove('active');
      mobileMenuOverlay.classList.add('invisible', 'opacity-0');
      mobileMenuOverlay.classList.remove('visible', 'opacity-100');
      document.body.style.overflow = '';
    };

    // Handle menu links
    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        
        // Handle internal links
        if (href && href.startsWith('#') && href !== '#') {
          e.preventDefault();
          closeMenu();
          
          setTimeout(() => {
            const target = document.querySelector(href);
            if (target) {
              const offsetTop = target.offsetTop - 80;
              window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
              });
            }
          }, 300);
        } else {
          // For external links, just close menu
          closeMenu();
        }
      });
    });

    // Close menu when clicking overlay
    mobileMenuOverlay.addEventListener('click', closeMenu);

    // Close menu when clicking outside
    mobileMenu.addEventListener('click', (e) => {
      if (e.target === mobileMenu) {
        closeMenu();
      }
    });

    // Close menu on window resize to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
        closeMenu();
      }
    });
  }

  // 7. Smooth scroll for all anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href.length > 1) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          const offsetTop = target.offsetTop - 80;
          window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
          });
        }
      }
    });
  });

  // 8. Scroll animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('active');
        }, index * 100);
      }
    });
  }, observerOptions);

  document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.scroll-animate');
    animatedElements.forEach(el => observer.observe(el));
  });

  // 9. Image hover effects - Disabled to prevent overflow
  // document.querySelectorAll('.image-hover-zoom').forEach(item => {
  //   item.addEventListener('mouseenter', function() {
  //     this.style.transform = 'scale(1.02)';
  //   });
  //   item.addEventListener('mouseleave', function() {
  //     this.style.transform = 'scale(1)';
  //   });
  // });

  // 10. Feedback Form Handler
  const feedbackForm = document.getElementById('feedbackForm');
  const formStatus = document.getElementById('formStatus');
  const scriptURL = 'https://script.google.com/macros/s/AKfycbww61MGGyFOaOobqZ-Tp27K_0eGUY43x10IN82pLogMUgDjd6B8PkhocOtRaIwhkMI1/exec';

  const formInputs = feedbackForm.querySelectorAll('input, textarea');
  formInputs.forEach(input => {
    input.addEventListener('focus', function() {
      this.style.borderColor = '#EAB308';
      this.style.boxShadow = '0 0 0 3px rgba(234, 179, 8, 0.1)';
    });
    
    input.addEventListener('blur', function() {
      if (this.value.trim() === '') {
        this.style.borderColor = 'rgba(255, 255, 255, 0.3)';
        this.style.boxShadow = 'none';
      }
    });

    input.addEventListener('input', function() {
      if (this.validity.valid) {
        this.style.borderColor = '#10B981';
      } else if (this.value.length > 0) {
        this.style.borderColor = '#EF4444';
      }
    });
  });

  feedbackForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const submitBtn = feedbackForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Mengirim...';
    submitBtn.style.opacity = '0.7';
    
    const formData = new FormData(feedbackForm);
    
    try {
      const response = await fetch(scriptURL, {
        method: 'POST',
        body: formData
      });
      
      const result = await response.text();
      
      if (result.includes('Success')) {
        formStatus.textContent = '✓ Feedback berhasil dikirim! Terima kasih.';
        formStatus.className = 'text-center text-sm mt-4 text-green-400 font-semibold animate-fade-in-up';
        formStatus.classList.remove('hidden');
        
        feedbackForm.reset();
        formInputs.forEach(input => {
          input.style.borderColor = 'rgba(255, 255, 255, 0.3)';
          input.style.boxShadow = 'none';
        });
        
        setTimeout(() => {
          formStatus.classList.add('hidden');
        }, 5000);
      } else {
        throw new Error('Failed to send');
      }
    } catch (error) {
      formStatus.textContent = '✗ Gagal mengirim feedback. Silakan coba lagi.';
      formStatus.className = 'text-center text-sm mt-4 text-red-400 font-semibold animate-fade-in-up';
      formStatus.classList.remove('hidden');
      
      setTimeout(() => {
        formStatus.classList.add('hidden');
      }, 5000);
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
      submitBtn.style.opacity = '1';
    }
  });

  // 11. Keyboard Accessibility
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const mobileMenu = document.getElementById('mobileMenu');
      const mobileMenuBtn = document.getElementById('mobileMenuBtn');
      const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
      
      if (mobileMenu && mobileMenu.classList.contains('active')) {
        mobileMenuBtn.classList.remove('active');
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.add('invisible', 'opacity-0');
        mobileMenuOverlay.classList.remove('visible', 'opacity-100');
        document.body.style.overflow = '';
      }
    }
  });

  // Console message
  console.log('%c🍽️ RUMAH MAKAN JATI', 'color: #EAB308; font-size: 20px; font-weight: bold;');
  console.log('%cWebsite loaded successfully!', 'color: #10B981; font-size: 14px;');
</script>

</body>
</html>
