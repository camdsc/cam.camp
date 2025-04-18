<?php
/**
 * Template Name: Cam's Monologue
 * Description: A template that replicates the original cam.camp homepage
 */

get_header();
?>

<style>
/* Override theme styles */
body.page-template-cams-monologue-template-php {
    background: #fff;
    margin: 0;
    padding: 0;
}

body.page-template-cams-monologue-template-php .site-content {
    padding: 0;
    margin: 0;
    max-width: none;
}

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

#expanded-menu {
    display: none;
}

#expanded-menu.hidden {
    display: none;
}

#content {
    margin-top: 40px;
}

.columns {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.video-placeholder {
    width: 100%;
    height: 200px;
    background-color: #f0f0f0;
    margin-bottom: 20px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .snowflake {
        left: calc(50% + 80px);
    }
}
</style>

<!-- Add Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Oxygen+Mono&display=swap" rel="stylesheet">

<main id="primary" class="site-main">
    <!-- Centered Title with Snowflake -->
    <div class="title-container">
        <h1 class="monologue">cam's monologue</h1>
        <span class="snowflake">❄️</span>
    </div>

    <!-- Menu: LOCATE and EXAMINE -->
    <div id="menu">
        <a href="<?php echo esc_url(home_url('/locate')); ?>" class="locate">LOCATE</a>
        <a href="<?php echo esc_url(home_url('/examine')); ?>" class="examine">EXAMINE</a>
    </div>

    <!-- Hidden second line of text -->
    <div id="expanded-menu" class="hidden">
        <div class="columns">
            <a href="<?php echo esc_url(home_url('/chronology')); ?>" class="chronology">CHRONOLOGY</a>
            <a href="<?php echo esc_url(home_url('/projects')); ?>" class="projects">VIEW PROJECTS</a>
        </div>
    </div>

    <!-- Main Content -->
    <div id="content">
        <div class="columns">
            <a href="<?php echo esc_url(home_url('/chronology')); ?>" class="chronology">CHRONOLOGY</a>
            <a href="<?php echo esc_url(home_url('/projects')); ?>" class="projects">VIEW PROJECTS</a>
        </div>
        
        <!-- Video Placeholders -->
        <div class="video-placeholder"></div>
        <div class="video-placeholder"></div>
        <div class="video-placeholder"></div>
        <div class="video-placeholder"></div>
        <div class="video-placeholder"></div>
    </div>
</main>

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
</script>

<?php
get_footer();
?> 