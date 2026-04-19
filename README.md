# Beep Beep Driving School Website Template

A clean, modern, and responsive driving school website template built with **PHP**, **HTML5**, and **Tailwind CSS**. Perfect for quickly launching a professional driving school website.

## 🚀 Technologies Used

- **PHP 8+** - Simple server-side scripting
- **HTML5** - Semantic markup
- **Tailwind CSS** (CDN) - Utility-first CSS framework
- **Vanilla JavaScript** - Lightweight interactivity
- **Google Fonts** - Poppins font family

## 📁 Simple Structure

```
beepbeep/
├── index.php            # Homepage
├── about.php            # About Us page
├── lessons.php         # Courses & Lessons
├── contact.php         # Contact page
├── book-now.php         # Booking form
├── coming-soon.php      # Placeholder page
├── .htaccess            # Basic web server config
├── assets/              # CSS, JS, images
├── uploads/             # File uploads directory
└── includes/             # Reusable components
    ├── header.php       # Site header & navigation
    ├── footer.php       # Site footer
    ├── config.php       # Basic site settings
    └── functions.php    # Helper functions
```

## 🛠️ Quick Setup

### Requirements
- PHP 8.0+
- Any web server (Apache, Nginx, or PHP built-in server)

### Installation

1. **Download or clone** the template
2. **Configure** your site by editing `includes/config.php`:
   - `SITE_NAME` - Your driving school name
   - `SITE_URL` - Your domain (e.g., 'https://yourdomain.com')
   - `SITE_EMAIL` - Contact email
   - `SITE_PHONE` - Contact phone
   - `SITE_ADDRESS` - Business address

3. **Start developing**

### Development Server

```bash
# Start PHP built-in server (for development only)
php -S localhost:8000

# Visit: http://localhost:8000
```

### Production Setup

Point your web server to the project root:

**Apache:**
```apache
DocumentRoot "/path/to/beepbeep"
<Directory "/path/to/beepbeep">
    AllowOverride All
    Require all granted
</Directory>
```

**Nginx:**
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
        include fastcgi_params;
    }
}
```

## 🎨 Design & Customization

### Color Scheme
- **Primary Orange**: `#FF6B00` (brand color)
- **Primary Dark**: `#E05A00` (hover states)
- **Dark Background**: `#1A1A2E`
- **Card Background**: `#16213E`

### Key Features
1. **Responsive Design** - Mobile-friendly layout
2. **Modern UI** - Clean, professional design
3. **Course Listings** - Display driving packages
4. **Booking System** - Online booking form
5. **Contact Form** - Easy inquiry system
6. **Testimonials** - Student reviews section
7. **Statistics** - Animated counters

### Customization Tips
- Replace placeholder images in `assets/images/`
- Update contact information in `includes/config.php`
- Modify colors by changing Tailwind classes
- Add your own pages by copying existing templates

## 📱 Browser Support

Works in all modern browsers:
- Chrome/Edge (latest versions)
- Firefox (latest versions)
- Safari (latest versions)

## 📝 Next Steps

1. **Add your content**
   - Replace placeholder text and images
   - Update contact information
   - Add your course details

2. **Enhance functionality** (optional)
   - Add form validation
   - Implement booking confirmation emails
   - Add payment integration

3. **Deploy**
   - Upload to your web hosting
   - Set up SSL certificate
   - Launch your website!

## 🔧 Helper Functions

The template includes useful functions in `includes/functions.php`:
- `initSession()` - Basic session management
- `e($string)` - Safe HTML output escaping
- `redirect($url)` - Page redirection
- `buildUrl($path)` - URL building
- `sanitize($input)` - Input cleaning
- `formatPhone($phone)` - UK phone formatting
- `calculateAge($dob)` - Age calculation

## 📄 License

This is a website template - use it freely for your driving school business!

---

**Ready to launch your driving school website!** 🚗💨

Just add your content, configure the settings, and you're good to go!