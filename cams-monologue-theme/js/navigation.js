document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header');
    const menu = document.querySelector('.main-navigation');
    const snowflake = document.getElementById('snowflake');
    let lastScrollTop = 0;

    // Handle sticky header and snowflake visibility
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            header.classList.add('header-fixed');
            menu.classList.add('fixed');
        } else {
            header.classList.remove('header-fixed');
            menu.classList.remove('fixed');
        }

        lastScrollTop = scrollTop;
    });

    // Handle snowflake click for menu toggle
    if (snowflake) {
        snowflake.addEventListener('click', function(e) {
            e.preventDefault();
            menu.classList.toggle('expanded');
        });
    }

    // Close expanded menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!menu.contains(event.target) && !snowflake.contains(event.target)) {
            menu.classList.remove('expanded');
        }
    });
}); 