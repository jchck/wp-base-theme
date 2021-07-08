<?php

namespace Base\Cleanup;

/**
 * Cleanup the Dashboard by removing metaboxes
 * @see https://developer.wordpress.org/reference/functions/remove_meta_box/
 */
function dashboard() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
}

if (WP_ENV === 'production') {
    add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\\dashboard' );
}

function no_adminbar() {
    show_admin_bar(false);
}

if (WP_ENV === 'development') {
    add_action( 'after_setup_theme', __NAMESPACE__ .  '\\no_adminbar' );
}