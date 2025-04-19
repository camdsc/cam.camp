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
            <h1 class="monologue">
                <?php 
                if (is_front_page()) {
                    echo "cam's monologue";
                } else {
                    echo get_the_title();
                }
                ?>
            </h1>
            <div class="snowflake" id="snowflake">❄</div>
        </div>

        <?php if (is_front_page()): ?>
        <nav id="menu" class="main-navigation is-home">
            <div class="menu-row">
                <ul id="primary-menu" class="menu-items">
                    <li class="menu-item menu-examine"><a href="#examine">examine</a></li>
                    <li class="menu-item menu-locate"><a href="#locate">locate</a></li>
                </ul>
            </div>
        </nav>
        <?php endif; ?>
    </header>

    <div id="content" class="site-content"> 