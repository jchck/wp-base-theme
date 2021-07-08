<!-- <p>page.php</p> -->
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="wysiwyg--content">
        <?php get_template_part('templates/content', 'page'); ?>
    </div>
<?php endwhile; ?>