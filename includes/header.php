<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' : ''; ?>Beep Beep Driving School</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 
                        'primary': ['Poppins', 'sans-serif'] 
                    },
                    colors: {
                        'brand': '#FF6B00',
                        'brand-dark': '#E05A00',
                        'dark': '#1A1A2E',
                        'dark-card': '#16213E',
                    },
                },
            },
        }
    </script>
    
    <style>
        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        * {
            box-sizing: border-box;
        }
        
        .nav__link--active {
            color: #FF6B00;
            font-weight: 600;
        }
    </style>
    
    <?php if (isset($additionalCSS)): ?>
        <?php echo $additionalCSS; ?>
    <?php endif; ?>
</head>

<body class="font-primary text-gray-800 antialiased bg-dark min-h-screen">
    <!-- Navigation -->
    <header class="fixed top-0 left-0 w-full bg-dark/95 backdrop-blur-sm shadow-lg z-[300]">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="index.php" class="inline-flex items-center space-x-2">
                    <div class="w-10 h-10 bg-brand rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">Beep<span class="text-brand">Beep</span></span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="index.php" class="text-white hover:text-brand transition-colors nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'nav__link--active' : ''; ?>">Home</a>
                    <a href="about.php" class="text-white hover:text-brand transition-colors nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'nav__link--active' : ''; ?>">About</a>
                    <a href="lessons.php" class="text-white hover:text-brand transition-colors nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'lessons.php' ? 'nav__link--active' : ''; ?>">Lessons</a>
                    <a href="prices.php" class="text-white hover:text-brand transition-colors nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'prices.php' ? 'nav__link--active' : ''; ?>">Prices</a>
                    <a href="contact.php" class="text-white hover:text-brand transition-colors nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'nav__link--active' : ''; ?>">Contact</a>
                    <a href="book-now.php" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-semibold rounded-md transition-colors">Book Now</a>
                </div>

                <!-- Mobile Menu Toggle -->
                <button id="nav-toggle" class="md:hidden text-white focus:outline-none">
                    <div class="flex flex-col gap-1.5">
                        <span class="w-8 h-0.5 bg-white transition-all nav__toggle-bar"></span>
                        <span class="w-8 h-0.5 bg-white transition-all nav__toggle-bar"></span>
                        <span class="w-8 h-0.5 bg-white transition-all nav__toggle-bar"></span>
                    </div>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="nav-menu" class="md:hidden hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="index.php" class="text-white hover:text-brand transition-colors py-2">Home</a>
                    <a href="about.php" class="text-white hover:text-brand transition-colors py-2">About</a>
                    <a href="lessons.php" class="text-white hover:text-brand transition-colors py-2">Lessons</a>
                    <a href="prices.php" class="text-white hover:text-brand transition-colors py-2">Prices</a>
                    <a href="contact.php" class="text-white hover:text-brand transition-colors py-2">Contact</a>
                    <a href="book-now.php" class="px-6 py-3 bg-brand hover:bg-brand-dark text-white font-semibold rounded-md transition-colors text-center">Book Now</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="pt-20">
