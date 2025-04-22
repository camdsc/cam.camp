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

    // Non-homepage navigation script
    const header = document.querySelector('.site-header');
    const snowflake = document.querySelector('.snowflake');
    const titleContainer = document.querySelector('.title-container');
    
    console.log('Regular page navigation JS loaded');
    
    if (header) {
        // Create a placeholder to prevent content jump when header becomes fixed
        const headerHeight = header.offsetHeight;
        const placeholder = document.createElement('div');
        placeholder.style.height = `${headerHeight}px`;
        placeholder.style.display = 'none';
        placeholder.className = 'header-placeholder';
        header.parentNode.insertBefore(placeholder, header);
        
        // Handle scroll behavior
        window.addEventListener('scroll', function() {
            const scrollY = window.scrollY || window.pageYOffset;
            
            // Make header fixed after scrolling a bit
            if (scrollY > 100) {
                header.classList.add('fixed');
                placeholder.style.display = 'block';
                // Center the title container within the full width header
                if (titleContainer) {
                    titleContainer.style.maxWidth = '800px';
                    titleContainer.style.margin = '0 auto';
                    titleContainer.style.padding = '0 20px';
                }
                
                // Adjust snowflake position when fixed
                if (snowflake) {
                    snowflake.classList.add('snowflake-fixed');
                    snowflake.style.top = '16px';
                }
            } else {
                header.classList.remove('fixed');
                placeholder.style.display = 'none';
                // Reset title container styles
                if (titleContainer) {
                    titleContainer.style.maxWidth = '';
                    titleContainer.style.margin = '';
                    titleContainer.style.padding = '';
                }
                
                // Reset snowflake position
                if (snowflake) {
                    snowflake.classList.remove('snowflake-fixed');
                    snowflake.style.top = '-8px';
                }
            }
        });
    }
    
    if (snowflake) {
        // Snowflake hover effect - now handled in CSS
        
        // Snowflake click - navigate to homepage
        snowflake.addEventListener('click', function() {
            console.log('Snowflake clicked on regular page');
            window.location.href = document.querySelector('a.home-link') ? 
                document.querySelector('a.home-link').href : '/';
        });
    }
    
    // Handle toggle buttons
    const toggleButtons = document.querySelectorAll('.toggle-button');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);
            
            if (targetContent) {
                targetContent.classList.toggle('active');
                this.textContent = targetContent.classList.contains('active') ? 
                    'Hide Content' : 'Toggle Content';
            }
        });
    });
    
    // Initialize any toggle buttons that should start expanded
    document.querySelectorAll('.toggle-content.initial-open').forEach(content => {
        const id = content.getAttribute('id');
        const button = document.querySelector(`.toggle-button[data-target="${id}"]`);
        if (button) {
            button.textContent = 'Hide Content';
        }
    });
}); 