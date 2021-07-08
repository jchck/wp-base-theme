<?php

namespace Base\Woocommerce;

function setup() {
    add_theme_support('woocommerce', array(
        // 'gallery_thumbnail_image_width' => 200,
        // 'thumbnail_image_width'         => 640,
        // 'single_image_width'            => 960,
    ));

    // remove_theme_support( 'wc-product-gallery-zoom' );
    // remove_theme_support( 'wc-product-gallery-lightbox' );
    // remove_theme_support( 'wc-product-gallery-slider' );
}
// setup Woocommerce only if the plugin is available
if (class_exists( 'woocommerce' )) {
    add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
}
