<?php
function add_custom_header_styles() {
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .snowflake {
            left: calc(50% + 80px);
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'add_custom_header_styles');
?> 