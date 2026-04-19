# Beep Beep Driving School Website Template

A modern, responsive driving school website template built with **PHP**, **HTML5**, and **Tailwind CSS**. This template provides a clean and professional design for driving schools, with all the essential pages and features.

## 🚀 Technologies Used

- **PHP 8+** - Server-side scripting
- **HTML5** - Semantic markup
- **Tailwind CSS** (CDN) - Utility-first CSS framework
- **Vanilla JavaScript** - Interactive features
- **Google Fonts** - Poppins font family

## 📁 Project Structure

```
beepbeep/
├── index.php                 # Homepage
├── about.php                 # About Us
├── lessons.php               # Courses/Lessons
├── contact.php               # Contact page
├── book-now.php              # Booking page
├── coming-soon.php           # Placeholder page
├── .htaccess                 # Apache config
├── assets/                   # Static assets
├── uploads/                  # User uploads (license photos, etc.)
├── includes/                  # 🔧 Reusable PHP partials
│   ├── header.php            # Site header + navigation
│   ├── footer.php            # Site footer
│   ├── config.php            # Basic site settings (name, URL)
│   └── functions.php         # Essential helper functions
│
├── api/                       # 📡 AJAX endpoints (optional)
│   ├── contact-submit.php    # Contact form submission
│   └── booking-submit.php    # Booking form submission
│
│   └── schema.sql            # Database structure + seed data
│

│   ├── booking-confirmation.php
│   └── password-reset.php
│
└── README.md
```

## 🛠️ Setup Instructions

### 1. Prerequisites

- PHP 8.0+
- Apache or Nginx web server

### 2. Configuration

**Configuration:**

Edit `includes/config.php` to update your site settings:

- `SITE_NAME` — your driving school name
- `SITE_URL` — your live domain URL (e.g., 'https://yourdomain.com')
- `SITE_EMAIL` — your contact email
- `SITE_PHONE` — your contact phone number
- `SITE_ADDRESS` — your business address
- `DEBUG_MODE` — set to `false` on production

### 4. Web Server Configuration

**Point your web server's document root to the project root directory.**

#### Apache (httpd.conf or virtual host):

```apache
DocumentRoot "/path/to/beepbeep"
<Directory "/path/to/beepbeep">
    AllowOverride All
    Require all granted
</Directory>
```

#### Nginx:

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/beepbeep;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 5. Quick Start (Development)

```bash
# From the project root
php -S localhost:8000

# Visit: http://localhost:8000
```

> ⚠️ **Note:** The built-in PHP server is for development only. Use Apache/Nginx for production.

## 🎨 Color Scheme

- **Primary Orange**: `#FF6B00` - Main brand color
- **Primary Dark**: `#E05A00` - Hover states
- **Dark**: `#1A1A2E` - Dark backgrounds
- **Dark Card**: `#16213E` - Card backgrounds

## ✨ Features

1. **Responsive Navigation** - Mobile-friendly hamburger menu
2. **Hero Section** - Eye-catching header with call-to-action
3. **Course Search** - Quick course finder
4. **Services Grid** - Service cards with images
5. **Statistics Counter** - Animated numbers
6. **Testimonials** - Student reviews with ratings
7. **Booking System** - Online lesson booking
8. **Contact Form** - Inquiry form with validation

## 📝 Next Steps

### Immediate (Week 1):

- [ ] Add real images to `assets/images/`
- [ ] Implement CSRF protection on all forms
- [ ] Add form validation feedback (AJAX)

### Mid-term (Week 2):

- [ ] Implement booking calendar/scheduler
- [ ] Add payment integration (Stripe)


### Final (Week 3):

- [ ] SEO optimization (meta tags, sitemap, Open Graph)
- [ ] Performance optimization (image compression, caching)
- [ ] Security hardening (rate limiting, input sanitization)
- [ ] Deploy to production server
- [ ] Set up SSL certificate

## 🔒 Security Checklist

- [x] CSRF token generation/verification
- [x] Password hashing (`password_hash`)
- [x] Prepared statements (SQL injection prevention)
- [x] Input sanitization (`htmlspecialchars`)
- [x] Session security
- [ ] Rate limiting on forms
- [ ] reCAPTCHA on contact/booking forms
- [ ] File upload validation
- [ ] HTTPS enforcement

## 📱 Responsive Breakpoints

- **Mobile**: Default (no prefix)
- **Tablet**: `md:` (768px+)
- **Desktop**: `lg:` (1024px+)
- **Large Desktop**: `xl:` (1280px+)

## 🐛 Browser Support

Works in all modern browsers:

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)

## 📞 Support

For questions or issues with the code, check:

- Tailwind CSS Docs: https://tailwindcss.com/docs
- PHP Manual: https://www.php.net/manual/
- MDN Web Docs: https://developer.mozilla.org

---

**Ready to develop!** 🎉

Point your server to the project root and start building.
