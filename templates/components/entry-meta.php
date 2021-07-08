<div class="flex flex-wrap">
    <p class="mv0 mr2"><?= __('By:', 'base'); ?> <?= get_the_author(); ?></p>    
    <time class="" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
</div>