document.addEventListener('DOMContentLoaded', function() {
    // Basic navigation script for non-homepage pages
    // Can be used for any page-specific functionality
    
    // Example: Handle mobile menu toggle if needed
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });
    }
}); 