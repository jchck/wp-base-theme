<article <?php post_class(); ?>>
  <a class="db pv4 no-underline black dim link" href="<?php the_permalink(); ?>">
    <h2 class="entry-title"><?php the_title(); ?></h2>
    <?php get_template_part('templates/components/entry-meta'); ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </a>
</article>
