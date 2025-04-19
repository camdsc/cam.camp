    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <?php
            printf(
                esc_html__('© %1$s %2$s', 'cams-monologue'),
                date('Y'),
                get_bloginfo('name')
            );
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html> 