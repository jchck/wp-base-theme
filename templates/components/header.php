<header class="header wrap">
  <a class="link dim black b f1 f-headline-ns tc db" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="nav nav--header">
      <?php
        if (has_nav_menu( 'primary_navigation' )) :
          wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'list pl0 tc'
          ]);
        endif;
      ?>
    </nav>
</header>