<?php
/**
 * Register base function files here and palce in functions/base/
 * Nothing here should be theme or site specific
 */
$base_includes = [
    'base/setup',
    'base/acf',
    'base/cleanup',
    'base/jquery',
    'base/sidebar',
    'base/titles',
    'base/woocommerce',
    'base/wrapper',
    'base/filters',
    // add theme specific functions here
    // put them in `./functions/theme/`
    'theme/acf-options',
];

foreach($base_includes as $file) {
    if (! $filepath = locate_template($file = "functions/{$file}.php", true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'base'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset( $file, $filepath );
