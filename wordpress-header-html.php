<?php
function custom_header_html() {
    ?>
    <div class="title-container">
        <h1 class="monologue">cam's monologue</h1>
        <span class="snowflake">❄️</span>
    </div>

    <div id="menu">
        <a href="<?php echo home_url('/locate'); ?>" class="locate">LOCATE</a>
        <a href="<?php echo home_url('/examine'); ?>" class="examine">EXAMINE</a>
    </div>
    <?php
}
?> 