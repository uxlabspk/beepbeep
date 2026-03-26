# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Beep Beep Driving School is a static HTML website for a UK driving school. No build process is needed.

## Development

**Run locally:**
```bash
python3 -m http.server 8000
# Then visit: http://localhost:8000
```

Or simply open any `.html` file directly in a browser.

## Architecture

**Static Site Structure:**
- All pages are standalone HTML files with no templating
- Tailwind CSS is loaded via CDN (`cdn.tailwindcss.com`) - no build step
- Inline Tailwind config in each HTML `<head>` defines custom colors/fonts

**Shared Components Pattern:**
- Header, footer, mobile menu, and top bar are duplicated in every HTML file
- When modifying navigation or footer, update ALL HTML files to keep them in sync:
  - `index.html`, `about.html`, `lessons.html`, `prices.html`, `contact.html`, `book-now.html`, `coming-soon.html`

**Custom Theme (defined in each HTML's Tailwind config):**
- `brand`: `#FF6B00` - Primary orange
- `brand-dark`: `#E05A00` - Hover state
- `dark`: `#1A1A2E` - Dark backgrounds
- `dark-card`: `#16213E` - Card backgrounds
- Font: Poppins via Google Fonts

**JavaScript (`js/main.js`):**
- Mobile navigation toggle
- Sticky header shadow on scroll
- Smooth scroll for anchor links
- Counter animation for statistics (uses `data-target` attribute)
- Scroll reveal animations for cards
