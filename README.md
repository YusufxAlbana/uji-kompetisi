# Rumah Makan Jati - Restaurant Landing Page

A modern, responsive landing page for Rumah Makan Jati, an authentic Indonesian restaurant located in BSD, Tangerang Selatan. This project is built using Laravel as the framework foundation, but primarily focuses on frontend presentation.

## About This Project

This is a **frontend-focused** restaurant website showcasing Rumah Makan Jati's menu, ambiance, and services. While built on Laravel's framework structure, the main implementation is a single-page application with rich visual content and interactive elements.

## Features

Based on the `welcome.blade.php` implementation, this landing page includes:

### 🎨 Visual Components
- **Hero Section** - Full-screen hero with restaurant branding and call-to-action
- **About Section** - Restaurant history and mission statement
- **Menu Showcase** - Grid display of favorite dishes with hover effects
- **Brewing Station** - Dedicated section for beverage offerings
- **Contact Section** - Business hours, location, and contact information
- **Feedback Form** - Integrated Google Sheets form for customer feedback

### 🍽️ Menu Highlights
The page showcases signature dishes including:
- Gurame Sup Kuning
- Ayam Penyet Jati
- Gurame Rujak Kecombrang
- Es Cincau Hitam
- Es Kelapa Muda
- Es Mangga Serut

### 📱 Interactive Features
- Responsive navigation with mobile hamburger menu
- Smooth scroll animations and fade-in effects
- Image hover zoom effects
- Auto-hide navbar on scroll
- WhatsApp integration for reservations
- Google Drive menu links
- Feedback form with Google Apps Script integration

### 🎯 External Integrations
- **WhatsApp**: Direct reservation link (+62 852-1345-2474)
- **Google Drive**: Full menu PDF access
- **Google Sheets**: Feedback form submission
- **Social Media**: Instagram, TikTok, and WhatsApp links

### 🎨 Design & Styling
- Custom color scheme (brown/sienna tones: #683017, #A0522D)
- Tailwind CSS for responsive design
- Custom fonts: Playfair Display (serif) and Outfit (sans-serif)
- Smooth animations and transitions
- Backdrop blur effects on navigation

## Tech Stack

- **Framework**: Laravel 11.x
- **Frontend**: Blade templating engine
- **CSS**: Tailwind CSS (CDN)
- **JavaScript**: Vanilla JS for interactions
- **Form Backend**: Google Apps Script

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd rumah-makan-jati
```

2. Install dependencies
```bash
composer install
```

3. Configure environment
```bash
copy .env.example .env
php artisan key:generate
```

4. Serve the application
```bash
php artisan serve
```

5. Visit `http://localhost:8000` in your browser

## Project Structure

```
├── resources/views/
│   └── welcome.blade.php    # Main landing page
├── public/assets/
│   └── images/              # Restaurant images and logos
├── routes/
│   └── web.php              # Route definitions
└── config/                  # Laravel configuration files
```

## Contact Information

**Rumah Makan Jati**
- Address: Jl. Ciater Raya No.2, Rw. Mekar Jaya, Kec. Serpong, Kota Tangerang Selatan, Banten 15310
- Phone: +62 852-1345-2474
- Hours: 10:00 AM - 9:00 PM (Mon-Fri), 10:00 AM - 10:00 PM (Sat-Sun)

## Social Media

- Instagram: [@rumahmakanjati.bsd](https://www.instagram.com/rumahmakanjati.bsd/)
- TikTok: [@rmjatibsd](https://www.tiktok.com/@rmjatibsd)

## License

This project is proprietary software for Rumah Makan Jati. All rights reserved.
