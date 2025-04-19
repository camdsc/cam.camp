<?php
/**
 * Cam's Monologue Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function cams_monologue_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'cams_monologue_setup');

/**
 * Register navigation menus
 */
function cams_monologue_menus() {
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu (Left Column)', 'cams-monologue'),
            'secondary' => esc_html__('Secondary Menu (Right Column)', 'cams-monologue'),
        )
    );
}
add_action('init', 'cams_monologue_menus');

/**
 * Enqueue scripts and styles
 */
function cams_monologue_scripts() {
    // Enqueue Google Font
    wp_enqueue_style('oxygen-mono', 'https://fonts.googleapis.com/css2?family=Oxygen+Mono&display=swap', array(), null);

    // Enqueue theme stylesheet
    wp_enqueue_style('cams-monologue-style', get_stylesheet_uri(), array(), _S_VERSION);

    // Add inline styles for consistent styling across all pages
    $custom_css = "
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Oxygen Mono', monospace;
            line-height: 1.6;
            color: #000;
            background: #f9f9f9;
            margin: 0 20%;
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Links */
        a {
            color: #000;
            text-decoration: none;
            border-bottom: 1px dashed #000;
        }

        a:hover {
            border-bottom-style: solid;
        }

        /* Buttons */
        .button {
            padding: 0.75em 1.5em;
            border: none;
            background: #f0f0f0;
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: bold;
            border-radius: 8px;
            font-family: inherit;
        }

        .button-primary {
            background: #000;
            color: #fff;
        }

        .button-secondary {
            background: #585141;
            color: #fff;
        }

        /* Form elements */
        input[type='text']:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        input[type='checkbox']:checked,
        input[type='radio']:checked {
            accent-color: #000;
        }

        select option:hover {
            background: #f0f0f0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                margin: 0 7%;
            }
        }
    ";
    wp_add_inline_style('cams-monologue-style', $custom_css);

    // Add the appropriate script based on the page
    if (is_front_page()) {
        // Homepage-specific script
        wp_enqueue_script('cams-monologue-homepage', get_template_directory_uri() . '/js/homepage.js', array(), _S_VERSION, true);
    } else {
        // Basic navigation script for other pages
        wp_enqueue_script('cams-monologue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'cams_monologue_scripts'); 