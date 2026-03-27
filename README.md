# Beep Beep Driving School Website - PHP Version

A modern, responsive driving school website built with **Vanilla PHP** and **Tailwind CSS**.

## 🚀 Technologies Used

- **PHP 7.4+** - Server-side scripting
- **MySQL** - Database management
- **Tailwind CSS** (CDN) - Utility-first CSS framework
- **Vanilla JavaScript** - Interactive features
- **Google Fonts** - Poppins font family

## 📁 Project Structure

```
beepbeep/
├── config/
│   └── database.php          # Database configuration
├── includes/
│   ├── header.php            # Common header
│   ├── footer.php            # Common footer
│   └── auth.php              # Authentication check
├── admin/
│   ├── dashboard.php         # Admin dashboard
│   └── logout.php            # Logout handler
├── database/
│   └── schema.sql            # Database schema
├── js/
│   └── main.js               # JavaScript functionality
├── images/                   # Image assets (create this folder)
├── .htaccess                 # Security & URL rewriting
├── index.php                 # Homepage
├── about.php                 # About page
├── lessons.php               # Lessons page
├── prices.php                # Pricing page
├── contact.php               # Contact page
├── book-now.php              # Booking page
├── coming-soon.php           # Coming soon page
├── 404.php                   # 404 error page
└── admin-login.php           # Admin login page
```

## 🛠️ Installation & Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server with mod_rewrite enabled
- phpMyAdmin (optional, for database management)

### Step 1: Install XAMPP/WAMP (if not already installed)

For Linux users, you can use LAMP stack:
```bash
# Install Apache, MySQL, and PHP
sudo apt update
sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql
```

### Step 2: Setup Database

1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click "Import" tab
3. Choose file: `database/schema.sql`
4. Click "Go" to import

Or run via command line:
```bash
mysql -u root -p < database/schema.sql
```

### Step 3: Configure Database Connection

Edit `config/database.php` if needed:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Your MySQL password
define('DB_NAME', 'beepbeep_driving');
```

### Step 4: Setup Apache

1. Enable mod_rewrite:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

2. Move project to web directory:
```bash
# For Linux
sudo cp -r /path/to/beepbeep /var/www/html/

# Or create a symbolic link
sudo ln -s /path/to/beepbeep /var/www/html/beepbeep
```

3. Update `.htaccess` if your folder name is different from `/beepbeep/`

### Step 5: Set Permissions

```bash
# Navigate to your web directory
cd /var/www/html/beepbeep

# Set proper permissions
sudo chown -R www-data:www-data .
sudo chmod -R 755 .
```

### Step 6: Access the Website

- **Website**: http://localhost/beepbeep/
- **Admin Login**: http://localhost/beepbeep/admin-login.php
- **Admin Dashboard**: http://localhost/beepbeep/admin/dashboard.php

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`

⚠️ **IMPORTANT**: Change the admin password immediately after first login!

## 🔒 Security Features

The `.htaccess` file provides:
- Protection against directory browsing
- Secured sensitive files (database.php, config files)
- Custom 404 error page
- GZIP compression
- Browser caching
- Security headers (X-Frame-Options, XSS-Protection, etc.)
- Protected `/includes/` and `/config/` folders

## 🎨 Color Scheme

- **Brand Orange**: `#FF6B00` - Main brand color
- **Brand Dark**: `#E05A00` - Hover states
- **Dark**: `#1A1A2E` - Background
- **Dark Card**: `#16213E` - Card backgrounds

## ✨ Features

### Frontend
1. **Responsive Design** - Mobile-friendly layout
2. **Modular Structure** - Reusable header/footer components
3. **Dynamic Content** - PHP-powered pages
4. **Custom 404 Page** - User-friendly error handling
5. **Coming Soon Pages** - Placeholder for future content

### Backend (Admin Panel)
1. **Secure Login** - Session-based authentication
2. **Dashboard** - Overview of statistics
3. **Database Integration** - Ready for CRUD operations
4. **User Management** - Student and instructor management

## 📝 Database Tables

- `admins` - Administrator accounts
- `students` - Student/customer records
- `instructors` - Driving instructor profiles
- `packages` - Lesson packages/pricing
- `bookings` - Booking reservations
- `lessons` - Individual lesson records
- `contact_messages` - Contact form submissions
- `testimonials` - Student reviews
- `payments` - Payment transactions

## 🐛 Troubleshooting

### Issue: 403 Forbidden Error
**Solution**: Check `.htaccess` permissions and ensure Apache has `AllowOverride All` enabled.

### Issue: Database Connection Failed
**Solution**: 
1. Verify MySQL is running: `sudo systemctl status mysql`
2. Check database credentials in `config/database.php`
3. Ensure database exists: `mysql -u root -p -e "SHOW DATABASES;"`

### Issue: Pages Not Loading
**Solution**: 
1. Enable mod_rewrite: `sudo a2enmod rewrite`
2. Restart Apache: `sudo systemctl restart apache2`
3. Check file permissions: `sudo chmod 644 *.php`

### Issue: Session Errors
**Solution**: 
1. Check PHP session directory exists
2. Set proper permissions: `sudo chown -R www-data:www-data /var/lib/php/sessions`

## 🔧 Development Tips

### Adding New Pages

1. Create new PHP file in root directory
2. Include header and footer:
```php
<?php
$pageTitle = "Your Page Title";
include 'includes/header.php';
?>

<!-- Your content here -->

<?php include 'includes/footer.php'; ?>
```

### Connecting to Database

```php
require_once 'config/database.php';
$conn = getDbConnection();

// Run queries
$result = $conn->query("SELECT * FROM students");
```

## 📞 Support

For questions or issues:
- Check PHP documentation: https://www.php.net/docs.php
- MySQL documentation: https://dev.mysql.com/doc/
- Tailwind CSS: https://tailwindcss.com/docs

## 🎯 Next Steps

1. ✅ Import database schema
2. ✅ Test admin login
3. ⬜ Customize content and images
4. ⬜ Add more admin features (CRUD operations)
5. ⬜ Implement booking system
6. ⬜ Add contact form functionality
7. ⬜ Set up email notifications
8. ⬜ Add payment integration

---

**Ready to launch!** 🚀
