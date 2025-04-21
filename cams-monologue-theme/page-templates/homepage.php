<?php
/**
 * Template Name: Homepage
 * Description: Custom homepage template
 */

get_header('homepage');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php
                // Start the loop to get page content
                while (have_posts()) :
                    the_post();
                    
                    // Get the page content
                    the_content();
                    
                endwhile;
                ?>
                
                <!-- Additional Homepage Content -->
                <div class="additional-content">
                    <!-- You can add any additional homepage-specific content here -->
                </div>
            </div>
        </article>
    </main>
</div>

<?php
get_footer();
?> 