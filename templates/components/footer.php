<footer class="footer pv5 wrap">
    <nav class="nav nav--footer">
        <?php
            if (has_nav_menu( 'primary_navigation' )) :
                wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'list pl0 tc', 'depth' => 1));
            endif;
        ?>
    </nav>
    <div class="sidebar--footer">
        <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
</footer>


