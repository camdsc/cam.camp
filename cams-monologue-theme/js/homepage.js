document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('menu');
    const snowflake = document.querySelector('.snowflake');
    const expandedMenu = document.getElementById('expanded-menu');
    const titleContainer = document.querySelector('.title-container');
    let isExpanded = false;
    
    console.log('Homepage JS loaded');
    
    // Initial snowflake position - absolute to scroll with title
    if (snowflake) {
        snowflake.style.position = 'absolute';
        snowflake.style.top = '22px';
        snowflake.style.left = 'calc(50% + 130px)';
        snowflake.style.zIndex = '1000';
        
        // Handle snowflake click for expanded menu
        snowflake.addEventListener('click', function() {
            console.log('Snowflake clicked');
            isExpanded = !isExpanded;
            
            // Toggle the expanded menu visibility
            if (isExpanded) {
                console.log('Expanding menu');
                expandedMenu.style.display = 'flex'; // First make it visible
                // Use setTimeout to ensure display: flex takes effect before adding active class
                setTimeout(() => {
                    expandedMenu.classList.add('active');
                }, 10);
            } else {
                console.log('Collapsing menu');
                expandedMenu.classList.remove('active');
                // Wait for transition to complete before hiding
                setTimeout(() => {
                    expandedMenu.style.display = 'none';
                }, 300); // Match transition duration
            }
            
            // Add spin animation to snowflake
            const animationClass = isExpanded ? 'spin-clockwise' : 'spin-counterclockwise';
            snowflake.classList.add(animationClass);
            
            // Remove animation class after animation ends
            setTimeout(() => {
                snowflake.classList.remove(animationClass);
            }, 700);
        });
    }
    
    // Scrolling behavior for menu and snowflake
    if (menu) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Handle snowflake position on scroll
            if (snowflake) {
                const snowflakeRect = snowflake.getBoundingClientRect();
                
                // Snowflake becomes fixed when it reaches 10px from top
                if (snowflakeRect.top <= 10) {
                    snowflake.style.position = 'fixed';
                    snowflake.style.top = '16px';
                    snowflake.classList.add('snowflake-fixed');
                } else {
                    snowflake.style.position = 'absolute';
                    snowflake.style.top = '22px';
                    snowflake.classList.remove('snowflake-fixed');
                }
            }
            
            const menuRect = menu.getBoundingClientRect();
            
            // Menu becomes fixed when it reaches 10px from top
            if (menuRect.top <= 10) {
                menu.classList.add('fixed');
                menu.style.backgroundColor = '#f9f9f9';
                
                // Center the menu within the full width container
                const twoColumnMenu = menu.querySelector('.two-column-menu');
                if (twoColumnMenu) {
                    twoColumnMenu.style.margin = '0 auto';
                    twoColumnMenu.style.maxWidth = '800px';
                    twoColumnMenu.style.padding = '0 20px';
                }
            } else {
                menu.classList.remove('fixed');
                menu.style.backgroundColor = 'transparent';
                
                // Reset menu styles
                const twoColumnMenu = menu.querySelector('.two-column-menu');
                if (twoColumnMenu) {
                    twoColumnMenu.style.margin = '';
                    twoColumnMenu.style.maxWidth = '';
                    twoColumnMenu.style.padding = '';
                }
            }
        });
    }
    
    // Ensure snowflake position is updated on window resize
    const setSnowflakePosition = () => {
        if (!snowflake) return;
        
        if (window.innerWidth <= 768) {
            snowflake.style.left = 'auto';
            snowflake.style.right = '20px';
        } else {
            snowflake.style.left = 'calc(50% + 120px)';
            snowflake.style.right = 'auto';
        }
    };
    
    window.addEventListener('resize', setSnowflakePosition);
    
    // Set initial positions on page load
    setSnowflakePosition();
}); 