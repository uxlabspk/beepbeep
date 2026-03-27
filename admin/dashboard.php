<?php
require_once '../includes/auth.php';
require_once '../config/database.php';

$pageTitle = "Admin Dashboard";
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | Beep Beep Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'primary': ['Poppins', 'sans-serif'] },
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
</head>
<body class="font-primary bg-dark min-h-screen">
    <!-- Top Navigation -->
    <nav class="bg-dark-card border-b border-gray-800">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">Admin Panel</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-gray-400 text-sm">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                    <a href="../index.php" class="text-brand hover:text-brand-dark text-sm">View Site</a>
                    <a href="logout.php" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-colors">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white mb-2">Dashboard</h1>
            <p class="text-gray-400">Welcome to the Beep Beep Driving School admin panel</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-dark-card rounded-xl p-6 border border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-400 text-sm font-medium">Total Students</h3>
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">0</p>
                <p class="text-green-500 text-xs mt-2">+0% from last month</p>
            </div>

            <div class="bg-dark-card rounded-xl p-6 border border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-400 text-sm font-medium">Active Bookings</h3>
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">0</p>
                <p class="text-yellow-500 text-xs mt-2">0 pending</p>
            </div>

            <div class="bg-dark-card rounded-xl p-6 border border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-400 text-sm font-medium">Instructors</h3>
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">0</p>
                <p class="text-gray-500 text-xs mt-2">Active instructors</p>
            </div>

            <div class="bg-dark-card rounded-xl p-6 border border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-400 text-sm font-medium">Revenue (Monthly)</h3>
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">£0</p>
                <p class="text-gray-500 text-xs mt-2">This month</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-dark-card rounded-xl p-6 border border-gray-800">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="block px-4 py-2 bg-brand hover:bg-brand-dark text-white rounded-lg text-sm transition-colors text-center">New Booking</a>
                    <a href="#" class="block px-4 py-2 bg-dark hover:bg-gray-800 text-white rounded-lg text-sm transition-colors text-center border border-gray-700">Add Student</a>
                    <a href="#" class="block px-4 py-2 bg-dark hover:bg-gray-800 text-white rounded-lg text-sm transition-colors text-center border border-gray-700">View Reports</a>
                </div>
            </div>

            <div class="bg-dark-card rounded-xl p-6 border border-gray-800 md:col-span-2">
                <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-dark rounded-lg">
                        <div>
                            <p class="text-white text-sm font-medium">No recent activity</p>
                            <p class="text-gray-500 text-xs">Activity will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="#" class="bg-dark-card rounded-xl p-6 border border-gray-800 hover:border-brand transition-all group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-brand/20 rounded-lg flex items-center justify-center group-hover:bg-brand/30 transition-colors">
                        <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Students</h3>
                        <p class="text-gray-400 text-sm">Manage students</p>
                    </div>
                </div>
            </a>

            <a href="#" class="bg-dark-card rounded-xl p-6 border border-gray-800 hover:border-brand transition-all group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-brand/20 rounded-lg flex items-center justify-center group-hover:bg-brand/30 transition-colors">
                        <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Bookings</h3>
                        <p class="text-gray-400 text-sm">View all bookings</p>
                    </div>
                </div>
            </a>

            <a href="#" class="bg-dark-card rounded-xl p-6 border border-gray-800 hover:border-brand transition-all group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-brand/20 rounded-lg flex items-center justify-center group-hover:bg-brand/30 transition-colors">
                        <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Packages</h3>
                        <p class="text-gray-400 text-sm">Lesson packages</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
