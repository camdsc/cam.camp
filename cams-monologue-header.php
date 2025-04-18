<?php
/**
 * Plugin Name: Cam's Monologue Header
 * Plugin URI: https://cam.camp
 * Description: Adds a custom header with snowflake animation to your WordPress site
 * Version: 1.0
 * Author: Cam
 * Author URI: https://cam.camp
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cams-monologue-header
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Debug function
function cams_monologue_debug($message) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Cam\'s Monologue Header: ' . $message);
    }
}

// Add Google Font
function cams_monologue_enqueue_fonts() {
    wp_enqueue_style('oxygen-mono', 'https://fonts.googleapis.com/css2?family=Oxygen+Mono&display=swap', array(), null);
    cams_monologue_debug('Fonts enqueued');
}
add_action('wp_enqueue_scripts', 'cams_monologue_enqueue_fonts');

// Add custom styles
function cams_monologue_header_styles() {
    ?>
    <style>
    /* Header Styles */
    .title-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        margin-bottom: 30px;
        position: relative;
    }

    .monologue {
        font-family: 'Oxygen Mono', monospace;
        font-size: 24px;
        font-weight: 400;
        margin: 0;
    }

    .snowflake {
        position: absolute;
        top: 25px;
        left: calc(50% + 120px);
        font-size: 24px;
        font-weight: 400;
        z-index: 1000;
        transition: transform 0.7s cubic-bezier(0.42, 0, 0.58, 1);
    }

    .snowflake:hover {
        transform: rotate(360deg);
    }

    #menu {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
        transition: all 0.3s ease;
    }

    #menu a {
        font-family: 'Oxygen Mono', monospace;
        text-decoration: none;
        color: #000;
        font-size: 16px;
        transition: opacity 0.3s ease;
    }

    #menu a:hover {
        opacity: 0.7;
    }

    #menu.fixed {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        padding: 15px 20px;
        background-color: #f9f9f9;
        z-index: 999;
        margin: 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Add padding to body when menu is fixed to prevent content jump */
    body.menu-fixed {
        padding-top: 60px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .snowflake {
            left: calc(50% + 80px);
        }
    }
    </style>
    <?php
    cams_monologue_debug('Styles added to head');
}
add_action('wp_head', 'cams_monologue_header_styles');

// Add header HTML
function cams_monologue_header_html() {
    ?>
    <div class="title-container">
        <h1 class="monologue">cam's monologue</h1>
        <span class="snowflake">❄️</span>
    </div>

    <div id="menu">
        <a href="<?php echo esc_url(home_url('/locate')); ?>" class="locate">LOCATE</a>
        <a href="<?php echo esc_url(home_url('/examine')); ?>" class="examine">EXAMINE</a>
    </div>
    <?php
    cams_monologue_debug('Header HTML output');
}

// Add JavaScript for scroll functionality
function cams_monologue_enqueue_scripts() {
    ?>
    <script>
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
                document.body.classList.add('menu-fixed');
            } else {
                menu.classList.remove('fixed');
                document.body.classList.remove('menu-fixed');
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
    </script>
    <?php
}
add_action('wp_footer', 'cams_monologue_enqueue_scripts');

// Add header to the site
function cams_monologue_add_header() {
    // Check if we're on the homepage or if the header should be shown everywhere
    if (is_front_page() || is_home()) {
        cams_monologue_header_html();
        cams_monologue_debug('Header added to page');
    }
}

// Use a higher priority to ensure our header is added after theme's header
add_action('wp_body_open', 'cams_monologue_add_header', 20);

// Add activation hook
register_activation_hook(__FILE__, 'cams_monologue_activate');
function cams_monologue_activate() {
    cams_monologue_debug('Plugin activated');
}

// Add deactivation hook
register_deactivation_hook(__FILE__, 'cams_monologue_deactivate');
function cams_monologue_deactivate() {
    cams_monologue_debug('Plugin deactivated');
} 