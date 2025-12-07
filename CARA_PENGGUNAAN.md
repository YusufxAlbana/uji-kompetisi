# 🚀 Cara Menjalankan Website Rumah Makan Jati

## Langkah-langkah Setup

### 1. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 2. Setup Environment

```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Build Assets

**Untuk Development (dengan hot reload):**
```bash
npm run dev
```

**Untuk Production:**
```bash
npm run build
```

### 4. Jalankan Server

```bash
php artisan serve
```

Website akan berjalan di: `http://localhost:8000`

## 🎯 Fitur Utama yang Sudah Ditambahkan

### ✅ Responsif
- Mobile-first design
- Breakpoints untuk semua device
- Touch-friendly buttons
- Optimized images

### ✅ Interaktif
- Loading screen animation
- Scroll progress bar
- Back to top button
- Parallax hero section
- Auto hide/show navbar
- Smooth scroll navigation
- Mobile menu dengan animasi
- Scroll animations
- Image hover effects
- Form validation real-time
- Lazy loading images

### ✅ Performance
- Vite untuk fast build
- Lazy loading images
- Optimized animations
- Code splitting
- Passive event listeners

### ✅ Accessibility
- Keyboard navigation
- ARIA labels
- Focus states
- Reduced motion support

## 📱 Testing di Device

### Desktop
1. Buka `http://localhost:8000`
2. Test semua fitur interaktif
3. Test responsive dengan resize browser

### Mobile
1. Jalankan server: `php artisan serve --host=0.0.0.0`
2. Cek IP komputer: `ipconfig` (Windows) atau `ifconfig` (Mac/Linux)
3. Buka di mobile: `http://[IP-KOMPUTER]:8000`

### Browser DevTools
1. Buka DevTools (F12)
2. Toggle device toolbar (Ctrl+Shift+M)
3. Test berbagai device sizes

## 🔧 Troubleshooting

### Error: "Vite manifest not found"
```bash
npm run build
php artisan optimize:clear
```

### Assets tidak muncul
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Rebuild assets
npm run build
```

### Port 8000 sudah digunakan
```bash
php artisan serve --port=8001
```

### Hot reload tidak jalan
```bash
# Stop npm run dev
# Hapus node_modules
rm -rf node_modules
npm install
npm run dev
```

## 📂 File Penting

- `resources/views/welcome.blade.php` - Homepage
- `resources/css/app.css` - Custom CSS
- `resources/js/app.js` - JavaScript interaktif
- `vite.config.js` - Vite configuration
- `tailwind.config.js` - Tailwind configuration

## 🎨 Customization

### Mengubah Warna
Edit `resources/css/app.css` dan cari warna yang ingin diubah:
- `#EAB308` - Kuning/Gold
- `#683017` - Coklat Tua
- `#A0522D` - Coklat Muda

### Mengubah Font
Edit `resources/views/welcome.blade.php` di bagian `<head>`:
```html
<link href="https://fonts.googleapis.com/css2?family=FONT-BARU&display=swap" rel="stylesheet">
```

### Mengubah Konten
Edit `resources/views/welcome.blade.php` dan ubah teks sesuai kebutuhan.

## 📞 Bantuan

Jika ada masalah, cek:
1. Console browser (F12) untuk error JavaScript
2. Terminal untuk error Laravel/Vite
3. Network tab untuk error loading assets

---

**Happy Coding! 🎉**
