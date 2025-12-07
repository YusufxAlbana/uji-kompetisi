# 🍽️ Rumah Makan Jati - Fitur Responsif & Interaktif

## ✨ Fitur yang Ditambahkan

### 1. **Loading Screen**
- Animasi loading saat halaman pertama kali dibuka
- Smooth fade out setelah halaman selesai dimuat
- Gradient background dengan spinner animasi

### 2. **Scroll Progress Bar**
- Progress bar di bagian atas halaman
- Menunjukkan seberapa jauh user sudah scroll
- Gradient kuning-orange yang menarik

### 3. **Back to Top Button**
- Tombol floating untuk kembali ke atas
- Muncul otomatis setelah scroll 300px
- Smooth scroll animation
- Hover effect dengan shadow

### 4. **Parallax Effect**
- Hero section dengan parallax effect
- Background bergerak lebih lambat saat scroll
- Hanya aktif di desktop (>768px)

### 5. **Navbar Auto Hide/Show**
- Navbar otomatis tersembunyi saat scroll ke bawah
- Muncul kembali saat scroll ke atas
- Smooth transition dengan backdrop blur

### 6. **Mobile Menu Enhancement**
- Hamburger menu dengan animasi smooth
- Full screen overlay di mobile
- Smooth scroll ke section saat klik menu
- Close dengan ESC key atau klik di luar menu

### 7. **Scroll Animations**
- Fade in animation untuk setiap section
- Stagger effect untuk multiple elements
- Intersection Observer untuk performa optimal

### 8. **Image Hover Effects**
- Zoom effect saat hover di gambar menu
- Smooth transition 0.6s
- Overlay gradient dengan nama menu

### 9. **Form Validation**
- Real-time validation feedback
- Border color berubah sesuai status (valid/invalid)
- Focus state dengan shadow kuning
- Loading state saat submit

### 10. **Lazy Loading Images**
- Gambar dimuat saat masuk viewport
- Blur effect saat loading
- Performa loading lebih cepat

### 11. **Responsive Design**
- Mobile first approach
- Breakpoints: xs, sm, md, lg, xl
- Touch-friendly button sizes di mobile
- Optimized typography untuk semua device

### 12. **Accessibility**
- Keyboard navigation support
- ARIA labels untuk button
- Focus states yang jelas
- Reduced motion support

## 🚀 Cara Menjalankan

### 1. Install Dependencies
```bash
npm install
```

### 2. Build Assets (Development)
```bash
npm run dev
```

### 3. Build Assets (Production)
```bash
npm run build
```

### 4. Jalankan Laravel Server
```bash
php artisan serve
```

## 📁 Struktur File

```
resources/
├── css/
│   └── app.css          # Custom CSS dengan Tailwind
├── js/
│   ├── app.js           # Main JavaScript
│   └── bootstrap.js     # Axios setup
└── views/
    └── welcome.blade.php # Homepage

public/
└── assets/
    └── images/          # Semua gambar
```

## 🎨 Teknologi yang Digunakan

- **Laravel 11** - PHP Framework
- **Vite** - Build tool & asset bundler
- **Tailwind CSS 4** - Utility-first CSS framework
- **Vanilla JavaScript** - No jQuery, pure JS
- **Intersection Observer API** - Scroll animations
- **Fetch API** - Form submission

## 📱 Responsive Breakpoints

- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

## ⚡ Performance Optimizations

1. **Lazy Loading** - Gambar dimuat on-demand
2. **Passive Event Listeners** - Scroll performance
3. **RequestAnimationFrame** - Smooth animations
4. **CSS Transitions** - Hardware accelerated
5. **Vite Code Splitting** - Faster initial load

## 🎯 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📝 Notes

- Semua animasi respect `prefers-reduced-motion`
- Images menggunakan `loading="lazy"` attribute
- External links menggunakan `rel="noopener noreferrer"`
- Form submission menggunakan Google Apps Script

## 🔧 Customization

### Mengubah Warna Tema
Edit file `resources/css/app.css`:
```css
/* Ganti warna kuning */
#EAB308 -> warna baru

/* Ganti warna coklat */
#683017 -> warna baru
```

### Mengubah Animasi Speed
Edit file `resources/css/app.css`:
```css
.scroll-animate {
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  /* Ubah 0.8s ke durasi yang diinginkan */
}
```

### Mengubah Parallax Speed
Edit file `resources/js/app.js`:
```javascript
heroParallax.style.transform = `translateY(${scrolled * 0.5}px)`;
// Ubah 0.5 ke nilai yang diinginkan (0.1 - 1.0)
```

## 🐛 Troubleshooting

### Assets tidak muncul
```bash
npm run build
php artisan optimize:clear
```

### Vite error
```bash
rm -rf node_modules
npm install
npm run dev
```

### Images tidak muncul
Pastikan folder `public/assets/images/` ada dan berisi gambar yang benar.

## 📞 Support

Jika ada pertanyaan atau issue, silakan hubungi developer.

---

**Dibuat dengan ❤️ untuk Rumah Makan Jati BSD**
