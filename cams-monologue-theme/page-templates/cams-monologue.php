<?php
/**
 * Template Name: Cam's Monologue
 * Description: Custom homepage template for cam's monologue
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Centered Title with Snowflake -->
    <div class="title-container">
        <h1 class="monologue"><?php bloginfo('name'); ?></h1>
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

<?php
get_footer();
?> 