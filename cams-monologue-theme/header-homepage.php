<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Cache buster: v<?php echo _S_VERSION; ?> -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <style>
    /* Force two-column layout - Version: <?php echo _S_VERSION; ?> */
    .two-column-menu {
        display: flex !important;
        flex-direction: row !important;
        justify-content: center !important;
        width: 100% !important;
        max-width: 800px !important;
        margin: 0 auto !important;
    }
    .menu-column {
        width: 50% !important;
        display: flex !important;
        align-items: center !important;
    }
    .left-column {
        justify-content: flex-end !important;
        padding-right: 10px !important;
    }
    .right-column {
        justify-content: flex-start !important;
        padding-left: 10px !important;
    }
    .text-right {
        text-align: right !important;
        width: 100% !important;
    }
    .text-left {
        text-align: left !important;
        width: 100% !important;
    }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header homepage-header">
        <div class="title-container">
            <h1 class="monologue"><?php bloginfo('name'); ?></h1>
            <div class="snowflake-wrapper">
                <div class="snowflake" title="Toggle menu">
                    ❄️
                </div>
            </div>
        </div>

        <!-- Main Menu: First row - LOCATE and EXAMINE -->
        <div id="menu" class="two-column-menu">
            <!-- Left Column -->
            <div class="menu-column left-column">
                <ul class="menu-items text-right">
                    <li><a href="<?php echo esc_url(home_url('/locate')); ?>">LOCATE</a></li>
                </ul>
            </div>
            
            <!-- Right Column -->
            <div class="menu-column right-column">
                <ul class="menu-items text-left">
                    <li><a href="<?php echo esc_url(home_url('/examine')); ?>">EXAMINE</a></li>
                </ul>
            </div>
        </div>

        <!-- Expanded Menu: Second row - CHRONOLOGY and VIEW PROJECTS (only shown when toggled) -->
        <div id="expanded-menu" class="two-column-menu">
            <!-- Left Column -->
            <div class="menu-column left-column">
                <ul class="menu-items text-right">
                    <li><a href="<?php echo esc_url(home_url('/chronology')); ?>">CHRONOLOGY</a></li>
                </ul>
            </div>
            
            <!-- Right Column -->
            <div class="menu-column right-column">
                <ul class="menu-items text-left">
                    <li><a href="<?php echo esc_url(home_url('/projects')); ?>">VIEW PROJECTS</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div id="content" class="site-content"> 