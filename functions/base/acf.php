<?php

/**
 * Base uses Advanced Custom Fields - a plugin.
 * How can make the plugin a dependency of the theme?
 * @see https://www.advancedcustomfields.com/resources/
 */

// Hide the settings page
// https://www.advancedcustomfields.com/resources/how-to-hide-acf-menu-from-clients/
if (WP_ENV === 'production') {
  add_filter('acf/settings/show_admin', '__return_false');
}

// Add options page to dashboard
// https://www.advancedcustomfields.com/resources/options-page/
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title' => 'Theme Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-settings',
      'capability' => 'edit_posts',
      'redirect' => false
    ));
  };