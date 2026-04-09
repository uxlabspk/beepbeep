# Beep Beep Driving School Website

A modern, responsive driving school website built with **PHP**, **HTML5**, and **Tailwind CSS**.

## 🚀 Technologies Used

- **PHP 8+** - Server-side scripting
- **MySQL** - Database
- **HTML5** - Semantic markup
- **Tailwind CSS** (CDN) - Utility-first CSS framework
- **Vanilla JavaScript** - Interactive features
- **Google Fonts** - Poppins font family

## 📁 Project Structure

```
beepbeep/
├── public/                    # 🌐 Web root (point your server here)
│   ├── index.php             # Homepage
│   ├── about.php             # About Us
│   ├── lessons.php           # Courses/Lessons
│   ├── contact.php           # Contact page
│   ├── book-now.php          # Booking page
│   ├── dashboard.php         # Student dashboard
│   ├── login.php             # Login page
│   ├── signup.php            # Registration page
│   ├── forgot-password.php   # Password reset request
│   ├── change-password.php   # Password change
│   ├── verify-email.php      # Email verification
│   ├── coming-soon.php       # Placeholder page
│   ├── .htaccess             # Apache config
│   ├── assets/
│   │   ├── css/              # Custom CSS (if needed)
│   │   ├── js/
│   │   │   └── main.js       # Main JavaScript
│   │   └── images/           # Static images/logos
│   └── uploads/              # User uploads (license photos, etc.)
│
├── includes/                  # 🔧 Reusable PHP partials
│   ├── header.php            # Site header + navigation
│   ├── footer.php            # Site footer
│   ├── config.php            # Site-wide settings
│   └── functions.php         # Helper functions
│
├── auth/                      # 🔐 Authentication logic
│   ├── login-handler.php     # Process login
│   ├── signup-handler.php    # Process registration
│   ├── logout.php            # Destroy session
│   └── middleware.php        # Auth guards (requireAuth, requireAdmin)
│
├── api/                       # 📡 AJAX endpoints
│   ├── contact-submit.php    # Contact form submission
│   └── booking-submit.php    # Booking form submission
│
├── database/                  # 🗄️ Database files
│   ├── db.php                # PDO connection singleton
│   └── schema.sql            # Database structure + seed data
│
├── emails/                    # 📧 Email templates
│   ├── welcome.php           # Welcome / verification email
│   ├── booking-confirmation.php
│   └── password-reset.php
│
└── README.md
```

## 🛠️ Setup Instructions

### 1. Prerequisites

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.3+
- Apache or Nginx web server

### 2. Database Setup

```sql
-- Create the database
CREATE DATABASE beepbeep_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Import the schema (includes seed data)
mysql -u root -p beepbeep_db < database/schema.sql
```

### 3. Configuration

Edit `includes/config.php` and update:

- `SITE_URL` — your live domain URL
- `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS` — your database credentials
- `DEBUG_MODE` — set to `false` on production

### 4. Web Server Configuration

**Point your web server's document root to the `public/` directory.**

#### Apache (httpd.conf or virtual host):

```apache
DocumentRoot "/path/to/beepbeep/public"
<Directory "/path/to/beepbeep/public">
    AllowOverride All
    Require all granted
</Directory>
```

#### Nginx:

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/beepbeep/public;
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
cd public
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
8. **Student Dashboard** - Track progress and bookings
9. **Authentication** - Login, signup, password reset, email verification
10. **Contact Form** - Inquiry form with validation

## 📝 Next Steps

### Immediate (Week 1):

- [ ] Add real images to `public/assets/images/`
- [ ] Test all forms with database connected
- [ ] Implement CSRF protection on all forms
- [ ] Add form validation feedback (AJAX)

### Mid-term (Week 2):

- [ ] Build admin panel (`admin/` folder)
- [ ] Implement booking calendar/scheduler
- [ ] Add payment integration (Stripe)
- [ ] Set up email sending (PHPMailer / SendGrid)

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

Point your server to `public/` and start building.
