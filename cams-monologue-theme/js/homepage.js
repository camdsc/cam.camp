document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('menu');
    const snowflake = document.querySelector('.snowflake');
    const expandedMenu = document.getElementById('expanded-menu');
    const titleContainer = document.querySelector('.title-container');
    let isExpanded = false;
    
    console.log('Homepage JS loaded');
    console.log('Menu found:', menu);
    console.log('Snowflake found:', snowflake);
    console.log('Expanded menu found:', expandedMenu);
    
    // Initial snowflake position - absolute to scroll with title
    if (snowflake) {
        snowflake.style.position = 'absolute';
        snowflake.style.top = '30px';
        snowflake.style.left = 'calc(50% + 120px)';
        snowflake.style.zIndex = '1000';
        
        // Handle snowflake click for expanded menu
        snowflake.addEventListener('click', function() {
            console.log('Snowflake clicked');
            isExpanded = !isExpanded;
            
            // Toggle the expanded menu visibility
            if (expandedMenu) {
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
                
                // Add spin animation
                const animationClass = isExpanded ? 'spin-clockwise' : 'spin-counterclockwise';
                snowflake.classList.add(animationClass);
                
                // Remove animation class after animation ends
                setTimeout(() => {
                    snowflake.classList.remove(animationClass);
                }, 700);
            }
        });
        
        // Handle snowflake hover
        snowflake.addEventListener('mouseover', function() {
            snowflake.style.transform = 'rotate(360deg)';
        });
        
        snowflake.addEventListener('mouseout', function() {
            snowflake.style.transform = 'rotate(0deg)';
        });
    }
    
    if (menu) {
        // Handle scroll behavior
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (snowflake) {
                const snowflakeRect = snowflake.getBoundingClientRect();
                
                // Snowflake becomes fixed when it reaches 10px from top
                if (snowflakeRect.top <= 10) {
                    snowflake.style.position = 'fixed';
                    snowflake.style.top = '10px';
                } else {
                    snowflake.style.position = 'absolute';
                    snowflake.style.top = '30px';
                }
            }
            
            const menuRect = menu.getBoundingClientRect();
            
            // Menu becomes fixed when it reaches 10px from top
            if (menuRect.top <= 10) {
                menu.classList.add('fixed');
                menu.style.backgroundColor = '#f9f9f9';
                menu.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
            } else {
                menu.classList.remove('fixed');
                menu.style.backgroundColor = 'transparent';
                menu.style.boxShadow = 'none';
            }
        });

        // Create a placeholder for the menu
        const placeholder = document.createElement('div');
        placeholder.className = 'placeholder';
        placeholder.style.height = `${menu.offsetHeight}px`;
        placeholder.style.display = 'none';
        menu.parentNode.insertBefore(placeholder, menu);
        
        // Ensure menu stays fixed and snowflake behaves correctly on scroll
        window.addEventListener('scroll', () => {
            if (snowflake) {
                const snowflakeRect = snowflake.getBoundingClientRect();
                
                if (snowflakeRect.top <= 10) {
                    snowflake.style.position = 'fixed';
                    snowflake.style.top = '10px';
                } else {
                    snowflake.style.position = 'absolute';
                    snowflake.style.top = '30px';
                }
            }
            
            const menuRect = menu.getBoundingClientRect();
            
            if (menuRect.top <= 10) {
                menu.classList.add('fixed');
                placeholder.style.display = 'block';
                menu.style.backgroundColor = '#f9f9f9';
                menu.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
            } else {
                menu.classList.remove('fixed');
                placeholder.style.display = 'none';
                menu.style.backgroundColor = 'transparent';
                menu.style.boxShadow = 'none';
            }
        });
    }
    
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

    // Ensure snowflake position is updated on window resize
    window.addEventListener('resize', setSnowflakePosition);

    // Set initial positions on page load
    setSnowflakePosition();
}); 