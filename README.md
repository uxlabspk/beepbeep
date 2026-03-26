# Beep Beep Driving School Website

A modern, responsive driving school website built with **HTML5** and **Tailwind CSS**.

## 🚀 Technologies Used

- **HTML5** - Semantic markup
- **Tailwind CSS** (CDN) - Utility-first CSS framework
- **Vanilla JavaScript** - Interactive features
- **Google Fonts** - Poppins font family

## 📁 Project Structure

```
beepbeep/
├── index.html          # Homepage
├── css/                # Empty (not using custom CSS)
├── js/
│   └── main.js        # JavaScript functionality
├── images/            # Image assets (create this folder)
│   ├── logo.svg
│   ├── hero-bg.jpg
│   └── ... (other images)
└── README.md
```

## 🎨 Color Scheme

- **Primary Blue**: `#0066CC` - Main brand color
- **Primary Dark**: `#0052A3` - Hover states
- **Secondary Gold**: `#FFD700` - Accents and highlights
- **Secondary Dark**: `#E6C200` - Gold hover states
- **Accent Red**: `#FF6B6B` - Call-to-action elements

## ✨ Features

1. **Responsive Navigation** - Mobile-friendly hamburger menu
2. **Hero Section** - Eye-catching header with call-to-action
3. **Features Grid** - 6 key selling points
4. **Services Section** - 3 service cards with images
5. **Statistics Counter** - Animated numbers
6. **Testimonials** - Student reviews with ratings
7. **Call-to-Action** - Prominent booking section
8. **Footer** - Complete contact information and links

## 🛠️ Setup Instructions

### Option 1: Direct HTML (Recommended for Client Review)

Simply open `index.html` in your browser:

```bash
# On Linux
xdg-open index.html

# Or right-click and "Open with Browser"
```

### Option 2: Using a Local Server

```bash
# If you have Python installed
python3 -m http.server 8000

# Then visit: http://localhost:8000
```

## 📝 Next Steps

### For Client Presentation:
1. ✅ Open `index.html` in a browser to show the design
2. ✅ Replace placeholder images in the `images/` folder
3. ✅ Update phone number, email, and address
4. ✅ Customize any text content as needed

### After Client Approval (PHP Conversion):
The next phase will be converting this to PHP:
- Split into components (header, footer, sections)
- Add dynamic content from database
- Create booking system
- Add contact form with email
- Implement admin panel

## 🖼️ Images Needed

Create an `images/` folder and add these files:

```
images/
├── logo.svg              # Company logo
├── hero-bg.jpg           # Hero background (1920x1080)
├── first-time-drivers.jpg (400x250)
├── refresher-lessons.jpg (400x250)
├── test-preparation.jpg (400x250)
├── testimonial-1.jpg     # Avatar (100x100)
├── testimonial-2.jpg     # Avatar (100x100)
├── testimonial-3.jpg     # Avatar (100x100)
├── dvsa-logo.png         # DVSA approval logo
├── favicon-32x32.png
├── favicon-16x16.png
└── apple-touch-icon.png
```

## 🎯 Key Pages to Create

Based on the navigation, you'll need these additional pages:

1. `about.html` - About Us
2. `lessons.html` - Lessons/Services detail
3. `prices.html` - Pricing packages
4. `testimonials.html` - More reviews
5. `contact.html` - Contact form
6. `book-now.html` - Booking system

## 💡 Tailwind CSS Notes

This project uses Tailwind CSS via CDN for rapid development:

```html
<!-- Already configured in index.html -->
<script src="https://cdn.tailwindcss.com"></script>
```

**Advantages:**
- No build process required
- Fast prototyping
- Easy to customize colors in config
- Responsive utilities built-in

**Customization:**
The Tailwind config is in the `<head>` of `index.html`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'primary': '#0066CC',
                'primary-dark': '#0052A3',
                // ... more colors
            }
        }
    }
}
```

## 🔧 Customization Tips

### Change Colors:
Edit the Tailwind config in `index.html`

### Adjust Spacing:
Tailwind uses a spacing scale:
- `p-4` = 1rem padding
- `m-6` = 1.5rem margin
- `gap-4` = 1rem gap

### Modify Fonts:
Currently using Poppins from Google Fonts. To change:
1. Update the Google Fonts link in `<head>`
2. Change `fontFamily.primary` in Tailwind config

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
- MDN Web Docs: https://developer.mozilla.org

---

**Ready to show your client!** 🎉

Just add your images and customize the content as needed.
