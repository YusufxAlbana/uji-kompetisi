/* ===================================
   RUMAH MAKAN JATI - Main JavaScript
   =================================== */

// ============================================
// 1. LOADING SCREEN
// ============================================
window.addEventListener('load', () => {
  const loadingScreen = document.getElementById('loadingScreen');
  setTimeout(() => {
    loadingScreen.classList.add('hidden');
  }, 500);
});

// ============================================
// 2. SCROLL PROGRESS BAR
// ============================================
window.addEventListener('scroll', () => {
  const scrollProgress = document.getElementById('scrollProgress');
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  const scrollPercentage = (scrollTop / scrollHeight) * 100;
  scrollProgress.style.width = scrollPercentage + '%';
}, { passive: true });

// ============================================
// 3. BACK TO TOP BUTTON
// ============================================
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

// ============================================
// 4. PARALLAX EFFECT ON HERO SECTION
// ============================================
window.addEventListener('scroll', () => {
  const heroParallax = document.querySelector('.hero-parallax');
  if (heroParallax && window.innerWidth > 768) {
    const scrolled = window.pageYOffset;
    heroParallax.style.transform = `translateY(${scrolled * 0.5}px)`;
  }
}, { passive: true });

// ============================================
// 5. LAZY LOADING IMAGES
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  const lazyImages = document.querySelectorAll('img[data-src]');
  
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.classList.add('loaded');
        img.removeAttribute('data-src');
        observer.unobserve(img);
      }
    });
  });

  lazyImages.forEach(img => imageObserver.observe(img));
});

// ============================================
// 6. NAVBAR SCROLL HIDE/SHOW
// ============================================
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

// ============================================
// 7. MOBILE MENU
// ============================================
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

mobileMenuBtn.addEventListener('click', () => {
  mobileMenuBtn.classList.toggle('active');
  mobileMenu.classList.toggle('active');
  document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
});

mobileMenuLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    // Close menu
    mobileMenuBtn.classList.remove('active');
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
    
    // Smooth scroll to section
    const href = link.getAttribute('href');
    if (href.startsWith('#')) {
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

// Close mobile menu when clicking outside
mobileMenu.addEventListener('click', (e) => {
  if (e.target === mobileMenu) {
    mobileMenuBtn.classList.remove('active');
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
  }
});

// ============================================
// 8. SMOOTH SCROLL FOR ALL ANCHOR LINKS
// ============================================
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

// ============================================
// 9. SCROLL ANIMATIONS WITH STAGGER EFFECT
// ============================================
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      // Add stagger delay for multiple elements
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

// ============================================
// 10. IMAGE HOVER EFFECTS
// ============================================
document.querySelectorAll('.image-hover-zoom').forEach(item => {
  item.addEventListener('mouseenter', function() {
    this.style.transform = 'scale(1.02)';
  });
  item.addEventListener('mouseleave', function() {
    this.style.transform = 'scale(1)';
  });
});

// ============================================
// 11. FEEDBACK FORM HANDLER
// ============================================
const feedbackForm = document.getElementById('feedbackForm');
const formStatus = document.getElementById('formStatus');
const scriptURL = 'https://script.google.com/macros/s/AKfycbww61MGGyFOaOobqZ-Tp27K_0eGUY43x10IN82pLogMUgDjd6B8PkhocOtRaIwhkMI1/exec';

// Add input validation feedback
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
  
  // Disable submit button
  const submitBtn = feedbackForm.querySelector('button[type="submit"]');
  const originalText = submitBtn.textContent;
  submitBtn.disabled = true;
  submitBtn.textContent = 'Mengirim...';
  submitBtn.style.opacity = '0.7';
  
  // Get form data
  const formData = new FormData(feedbackForm);
  
  try {
    const response = await fetch(scriptURL, {
      method: 'POST',
      body: formData
    });
    
    const result = await response.text();
    
    if (result.includes('Success')) {
      // Success message with animation
      formStatus.textContent = '✓ Feedback berhasil dikirim! Terima kasih.';
      formStatus.className = 'text-center text-sm mt-4 text-green-400 font-semibold animate-fade-in-up';
      formStatus.classList.remove('hidden');
      
      // Reset form
      feedbackForm.reset();
      formInputs.forEach(input => {
        input.style.borderColor = 'rgba(255, 255, 255, 0.3)';
        input.style.boxShadow = 'none';
      });
      
      // Hide success message after 5 seconds
      setTimeout(() => {
        formStatus.classList.add('hidden');
      }, 5000);
    } else {
      throw new Error('Failed to send');
    }
  } catch (error) {
    // Error message with animation
    formStatus.textContent = '✗ Gagal mengirim feedback. Silakan coba lagi.';
    formStatus.className = 'text-center text-sm mt-4 text-red-400 font-semibold animate-fade-in-up';
    formStatus.classList.remove('hidden');
    
    setTimeout(() => {
      formStatus.classList.add('hidden');
    }, 5000);
  } finally {
    // Re-enable submit button
    submitBtn.disabled = false;
    submitBtn.textContent = originalText;
    submitBtn.style.opacity = '1';
  }
});

// ============================================
// 12. PERFORMANCE OPTIMIZATION
// ============================================
// Debounce function for scroll events
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

// ============================================
// 13. KEYBOARD ACCESSIBILITY
// ============================================
document.addEventListener('keydown', (e) => {
  // ESC key closes mobile menu
  if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
    mobileMenuBtn.classList.remove('active');
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
  }
});

// ============================================
// 14. CONSOLE MESSAGE
// ============================================
console.log('%c🍽️ RUMAH MAKAN JATI', 'color: #EAB308; font-size: 20px; font-weight: bold;');
console.log('%cWebsite loaded successfully!', 'color: #10B981; font-size: 14px;');
