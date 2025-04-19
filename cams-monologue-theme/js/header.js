document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('masthead');
    const snowflake = document.getElementById('snowflake');
    const firstRow = document.querySelector('.menu-row.first-row');
    const secondRow = document.querySelector('.menu-row.second-row');
    let isSticky = false;

    // Handle scroll
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const triggerHeight = header.offsetTop + header.offsetHeight - 100; // Adjust trigger point

        if (scrollTop > triggerHeight && !isSticky) {
            document.body.classList.add('header-fixed');
            isSticky = true;
        } else if (scrollTop <= triggerHeight && isSticky) {
            document.body.classList.remove('header-fixed');
            isSticky = false;
        }
    }

    // Handle snowflake click
    function handleSnowflakeClick() {
        const isExpanded = header.classList.contains('expanded');
        
        if (isExpanded) {
            header.classList.remove('expanded');
            if (secondRow) {
                secondRow.style.display = 'none';
            }
        } else {
            header.classList.add('expanded');
            if (secondRow) {
                secondRow.style.display = 'flex';
            }
        }

        // Add rotation animation on click
        snowflake.style.transform = isExpanded ? '' : 'rotate(360deg)';
        snowflake.style.transition = 'transform 0.7s cubic-bezier(0.42, 0, 0.58, 1)';
    }

    // Initialize
    window.addEventListener('scroll', handleScroll);
    snowflake.addEventListener('click', handleSnowflakeClick);

    // Hide second row initially if not on homepage
    if (!document.body.classList.contains('home') && secondRow) {
        secondRow.style.display = 'none';
    }
}); 