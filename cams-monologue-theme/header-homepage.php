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
    <header id="masthead" class="site-header homepage-header">
        <div class="title-container">
            <h1 class="monologue"><?php bloginfo('name'); ?></h1>
            <span class="snowflake">❄️</span>
        </div>

        <div id="menu">
            <?php
            // Display primary menu (or fallback to static links if no menu is set)
            if (has_nav_menu('primary')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'menu-items',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    )
                );
            } else {
                // Fallback static menu
                echo '<ul class="menu-items">';
                echo '<li><a href="' . esc_url(home_url('/locate')) . '">LOCATE</a></li>';
                echo '<li><a href="' . esc_url(home_url('/examine')) . '">EXAMINE</a></li>';
                echo '</ul>';
            }
            ?>
        </div>

        <div id="expanded-menu">
            <?php
            // Display secondary menu (or fallback to static links if no menu is set)
            if (has_nav_menu('secondary')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                        'menu_id'        => 'secondary-menu',
                        'container'      => false,
                        'menu_class'     => 'menu-items',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    )
                );
            } else {
                // Fallback static menu
                echo '<ul class="menu-items">';
                echo '<li><a href="' . esc_url(home_url('/chronology')) . '">CHRONOLOGY</a></li>';
                echo '<li><a href="' . esc_url(home_url('/projects')) . '">VIEW PROJECTS</a></li>';
                echo '</ul>';
            }
            ?>
        </div>
    </header>

    <div id="content" class="site-content"> 