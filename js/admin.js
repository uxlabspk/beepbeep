/**
 * Admin functionality for Beep Beep Driving School
 * Static login credentials and image management
 */

// Static credentials (for demo purposes only)
const ADMIN_CREDENTIALS = {
    username: 'admin',
    password: 'beepbeep2024'
};

// Session storage key
const AUTH_KEY = 'beepbeep_admin_auth';

// Image storage key
const IMAGES_KEY = 'beepbeep_images';

/**
 * Check if user is authenticated
 */
function isAuthenticated() {
    return sessionStorage.getItem(AUTH_KEY) === 'true';
}

/**
 * Set authentication status
 */
function setAuthenticated(status) {
    if (status) {
        sessionStorage.setItem(AUTH_KEY, 'true');
    } else {
        sessionStorage.removeItem(AUTH_KEY);
    }
}

/**
 * Get stored images
 */
function getStoredImages() {
    const images = localStorage.getItem(IMAGES_KEY);
    return images ? JSON.parse(images) : [];
}

/**
 * Save images to storage
 */
function saveImages(images) {
    localStorage.setItem(IMAGES_KEY, JSON.stringify(images));
}

/**
 * Initialize login page
 */
function initLoginPage() {
    // If already authenticated, redirect to dashboard
    if (isAuthenticated()) {
        window.location.href = 'admin-dashboard.html';
        return;
    }

    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('errorMessage');
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (!loginForm) return;

    // Toggle password visibility
    togglePassword?.addEventListener('click', () => {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        // Update icon
        const eyeIcon = document.getElementById('eyeIcon');
        if (type === 'text') {
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
            `;
        } else {
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            `;
        }
    });

    // Handle login form submission
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;

        // Validate credentials
        if (username === ADMIN_CREDENTIALS.username && password === ADMIN_CREDENTIALS.password) {
            setAuthenticated(true);
            window.location.href = 'admin-dashboard.html';
        } else {
            errorMessage.classList.remove('hidden');
            // Shake animation
            loginForm.classList.add('animate-shake');
            setTimeout(() => loginForm.classList.remove('animate-shake'), 500);
        }
    });

    // Hide error message when user starts typing
    document.getElementById('username')?.addEventListener('input', () => {
        errorMessage.classList.add('hidden');
    });

    document.getElementById('password')?.addEventListener('input', () => {
        errorMessage.classList.add('hidden');
    });
}

/**
 * Initialize dashboard page
 */
function initDashboardPage() {
    // Check authentication
    if (!isAuthenticated()) {
        window.location.href = 'admin-login.html';
        return;
    }

    const logoutBtn = document.getElementById('logoutBtn');
    const uploadForm = document.getElementById('uploadForm');
    const dropZone = document.getElementById('dropZone');
    const imageFile = document.getElementById('imageFile');
    const filterCategory = document.getElementById('filterCategory');

    // Logout functionality
    logoutBtn?.addEventListener('click', () => {
        setAuthenticated(false);
        window.location.href = 'admin-login.html';
    });

    // Initialize file upload
    initFileUpload(dropZone, imageFile);

    // Handle form submission
    uploadForm?.addEventListener('submit', handleImageUpload);

    // Handle category filter
    filterCategory?.addEventListener('change', () => {
        renderImages(filterCategory.value);
    });

    // Initial render
    renderImages('all');
    updateStats();
}

/**
 * Initialize file upload with drag and drop
 */
function initFileUpload(dropZone, fileInput) {
    if (!dropZone || !fileInput) return;

    // Click to upload
    dropZone.addEventListener('click', () => fileInput.click());

    // Drag and drop events
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-brand', 'bg-brand/5');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-brand', 'bg-brand/5');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-brand', 'bg-brand/5');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            previewFile(files[0]);
        }
    });

    // File input change
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            previewFile(fileInput.files[0]);
        }
    });

    // Remove file button
    document.getElementById('removeFile')?.addEventListener('click', (e) => {
        e.stopPropagation();
        clearFilePreview();
    });
}

/**
 * Preview selected file
 */
function previewFile(file) {
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const filePreview = document.getElementById('filePreview');
    const previewImage = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');

    if (!file.type.startsWith('image/')) {
        showToast('Please select an image file', 'error');
        return;
    }

    if (file.size > 5 * 1024 * 1024) {
        showToast('File size must be less than 5MB', 'error');
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        previewImage.src = e.target.result;
        fileName.textContent = file.name;
        uploadPlaceholder.classList.add('hidden');
        filePreview.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

/**
 * Clear file preview
 */
function clearFilePreview() {
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const filePreview = document.getElementById('filePreview');
    const imageFile = document.getElementById('imageFile');

    uploadPlaceholder.classList.remove('hidden');
    filePreview.classList.add('hidden');
    imageFile.value = '';
}

/**
 * Handle image upload
 */
function handleImageUpload(e) {
    e.preventDefault();

    const category = document.getElementById('imageCategory').value;
    const title = document.getElementById('imageTitle').value.trim();
    const alt = document.getElementById('imageAlt').value.trim();
    const fileInput = document.getElementById('imageFile');
    const file = fileInput.files[0];

    if (!file) {
        showToast('Please select an image file', 'error');
        return;
    }

    // Read file as base64
    const reader = new FileReader();
    reader.onload = (event) => {
        const imageData = {
            id: Date.now(),
            category,
            title,
            alt,
            fileName: file.name,
            size: file.size,
            data: event.target.result,
            uploadedAt: new Date().toISOString()
        };

        // Save to storage
        const images = getStoredImages();
        images.push(imageData);
        saveImages(images);

        // Reset form
        e.target.reset();
        clearFilePreview();

        // Update UI
        renderImages(document.getElementById('filterCategory').value);
        updateStats();
        showToast('Image uploaded successfully!');
    };
    reader.readAsDataURL(file);
}

/**
 * Render images grid
 */
function renderImages(filter = 'all') {
    const imagesGrid = document.getElementById('imagesGrid');
    const emptyState = document.getElementById('emptyState');
    const images = getStoredImages();

    // Filter images
    const filteredImages = filter === 'all'
        ? images
        : images.filter(img => img.category === filter);

    // Clear grid (except empty state)
    const imageCards = imagesGrid.querySelectorAll('.image-card');
    imageCards.forEach(card => card.remove());

    if (filteredImages.length === 0) {
        emptyState.classList.remove('hidden');
        return;
    }

    emptyState.classList.add('hidden');

    // Render image cards
    filteredImages.forEach(image => {
        const card = createImageCard(image);
        imagesGrid.appendChild(card);
    });
}

/**
 * Create image card element
 */
function createImageCard(image) {
    const card = document.createElement('div');
    card.className = 'image-card group relative bg-dark rounded-lg overflow-hidden border border-gray-700 hover:border-brand transition-colors';

    card.innerHTML = `
        <div class="aspect-square overflow-hidden">
            <img src="${image.data}" alt="${image.alt}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
        <div class="p-3">
            <h3 class="text-white font-medium text-sm truncate">${image.title}</h3>
            <p class="text-gray-500 text-xs mt-1 capitalize">${image.category}</p>
        </div>
        <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="delete-btn bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg" data-id="${image.id}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </div>
    `;

    // Delete button handler
    card.querySelector('.delete-btn').addEventListener('click', () => {
        deleteImage(image.id);
    });

    return card;
}

/**
 * Delete image
 */
function deleteImage(id) {
    if (!confirm('Are you sure you want to delete this image?')) return;

    const images = getStoredImages().filter(img => img.id !== id);
    saveImages(images);

    renderImages(document.getElementById('filterCategory').value);
    updateStats();
    showToast('Image deleted successfully!');
}

/**
 * Update dashboard stats
 */
function updateStats() {
    const images = getStoredImages();
    const totalImages = document.getElementById('totalImages');
    const storageUsed = document.getElementById('storageUsed');

    if (totalImages) {
        totalImages.textContent = images.length;
    }

    if (storageUsed) {
        const totalSize = images.reduce((acc, img) => acc + img.size, 0);
        const sizeMB = (totalSize / (1024 * 1024)).toFixed(2);
        storageUsed.textContent = `${sizeMB} MB`;
    }
}

/**
 * Show toast notification
 */
function showToast(message, type = 'success') {
    const toast = document.getElementById('successToast');
    const toastMessage = document.getElementById('toastMessage');

    if (!toast) return;

    toastMessage.textContent = message;

    // Set color based on type
    toast.className = toast.className.replace(/bg-\w+-500/, type === 'error' ? 'bg-red-500' : 'bg-green-500');

    // Show toast
    toast.classList.remove('translate-y-full', 'opacity-0');

    // Hide after 3 seconds
    setTimeout(() => {
        toast.classList.add('translate-y-full', 'opacity-0');
    }, 3000);
}

/**
 * Initialize based on current page
 */
document.addEventListener('DOMContentLoaded', () => {
    const currentPage = window.location.pathname;

    if (currentPage.includes('admin-login')) {
        initLoginPage();
    } else if (currentPage.includes('admin-dashboard')) {
        initDashboardPage();
    }
});
