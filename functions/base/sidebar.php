<?php

namespace Base\Sidebar;

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_home(),
    is_page([
      'free-case-evaluations',
      'discrimination-employee-rights-case-evaluation',
      'criminal-defense-dwi-case-evaluation',
      'personal-injury-free-case-evaluation',
      'contact'
    ])
  ]);

  return apply_filters('display_sidebar', $display);
}

/**
 * .main classes
 * 
 * This toggles the classes on the <main> element depending on whether sidebar is displaying
 */
function main_class() {
  if (display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'w-80 pr4-ns';
  } else {
    // Classes on full width pages
    $class = 'w-100';
  }

  return $class;
}