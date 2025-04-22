<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="title-container">
            <h2 class="page-title">
                <?php echo get_the_title(); ?>
            </h2>
            <div class="snowflake-wrapper">
                <div class="snowflake" title="Return to homepage">
                    ❄️
                </div>
            </div>
        </div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="home-link screen-reader-text"><?php bloginfo('name'); ?></a>
    </header>

    <div id="content" class="site-content"> 