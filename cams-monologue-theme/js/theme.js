document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('menu');
    const snowflake = document.querySelector('.snowflake');
    const titleContainer = document.querySelector('.title-container');
    let lastScrollTop = 0;

    // Function to handle scroll
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Handle menu fixed position
        if (scrollTop > 100) {
            menu.classList.add('fixed');
        } else {
            menu.classList.remove('fixed');
        }

        // Handle snowflake position
        if (snowflake && titleContainer) {
            const titleRect = titleContainer.getBoundingClientRect();
            const titleCenter = titleRect.left + (titleRect.width / 2);
            const snowflakeOffset = window.innerWidth > 768 ? 120 : 80;
            
            // Calculate snowflake position based on scroll
            const snowflakeTop = Math.max(25, 25 - scrollTop);
            snowflake.style.top = `${snowflakeTop}px`;
            snowflake.style.left = `${titleCenter + snowflakeOffset}px`;
        }

        lastScrollTop = scrollTop;
    }

    // Function to handle resize
    function handleResize() {
        if (snowflake && titleContainer) {
            const titleRect = titleContainer.getBoundingClientRect();
            const titleCenter = titleRect.left + (titleRect.width / 2);
            const snowflakeOffset = window.innerWidth > 768 ? 120 : 80;
            snowflake.style.left = `${titleCenter + snowflakeOffset}px`;
        }
    }

    // Initial setup
    handleScroll();
    handleResize();

    // Add event listeners
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleResize);
}); 