<?php
  use Base\Sidebar;
  use Base\Wrapper;
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part( 'templates/components/head' ); ?>
  <body <?php body_class(); ?>>
  <!--[if IE]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'base'); ?>
    </div>
  <![endif]-->
  <?php
    do_action( 'get_header' );
    get_template_part( 'templates/components/header' );
  ?>

  <div class="flex flex-wrap wrap" role="document">

    <main class="main <?= Sidebar\main_class(); ?>">
      <?php include Wrapper\template_path(); ?>
    </main><!-- /.main -->

    <?php if (Sidebar\display_sidebar()) : ?>
      <aside class="sidebar--aside w-20">
        <?php include Wrapper\sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>

  </div>

  <?php
    do_action( 'get_footer' );
    get_template_part( 'templates/components/footer' );
    wp_footer();
  ?>

</body>
</html>