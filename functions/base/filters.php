<?php

namespace Base\Filters;

use Base\Sidebar;

/**
 * Add <body> classes
 * @see https://github.com/roots/sage/blob/8.6.0/lib/extras.php
 */
function body_class($classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
        $classes[] = basename(get_permalink());
        }
    }

    // Add class if sidebar is active
    if (Sidebar\display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
    return '<span class="db mt2">Continue Reading</span>';
    // return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'base') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Add <article> classes
 * @see https://developer.wordpress.org/reference/hooks/post_class/
 */
function post_class($classes) {
    if (is_home()) { // when static front-page is set, this is the blog archive page
        $classes[] = 'bt b--black-10';
    }
    return $classes;
}
add_filter( 'post_class', __NAMESPACE__ . '\\post_class');
