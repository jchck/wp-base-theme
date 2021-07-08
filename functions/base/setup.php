<?php

namespace Base\Setup;
/**
 * Define WP enviroment
 * While developing, add `define('WP_ENV', 'development');` to `wp-config.php` at the WP root
 */
if (!defined('WP_ENV')) {
	define('WP_ENV', 'production');  // acf.php, cleanup.php checks for values 'production' or 'development'
  }

/**
 * Default theme setup function, based largely on that found in twentytwentyone and Sage v8
 */
function setup() {

	/**
	 * Enable features from Soil when plugin is activated
	 * @link https://roots.io/plugins/soil/
	 * @link https://github.com/roots/soil
	 */
	add_theme_support('soil', [
		/**
		 * Clean up WordPress
		 */
		'clean-up' => [
			/**
			 * Obscure and suppress WordPress information.
			 */
			'wp_obscurity',

			/**
			 * Disable WordPress emojis.
			 */
			'disable_emojis',

			/**
			 * Disable Gutenberg block library CSS.
			 */
			'disable_gutenberg_block_css',

			/**
			 * Disable extra RSS feeds.
			 */
			'disable_extra_rss',

			/**
			 * Disable recent comments CSS.
			 */
			'disable_recent_comments_css',

			/**
			 * Disable gallery CSS.
			 */
			'disable_gallery_css',

			/**
			 * Clean HTML5 markup.
			 */
			'clean_html5_markup',
		],

		/**
		 * Disable WordPress REST API
		 */
		// 'disable-rest-api',

		/**
		 * Remove version query string from all styles and scripts
		 */
		'disable-asset-versioning',

		/**
		 * Disables trackbacks/pingbacks
		 */
		'disable-trackbacks',

		/**
		 * Google Analytics
		 */
		// 'google-analytics' => [
		// 	/**
		// 	 * This is to go live with GA.
		// 	 *
		// 	 * This should probably be false in non-production.
		// 	 */
		// 	'should_load' => false,

		// 	/**
		// 	 * Google Analytics ID
		// 	 *
		// 	 * This is also known as your "property ID" or "measurement ID"
		// 	 *
		// 	 * Format: UA-XXXXX-Y
		// 	 */
		// 	'google_analytics_id' => null,

		// 	/**
		// 	 * Optimize container ID
		// 	 *
		// 	 * Format: OPT-A1B2CD (previously: GTM-A1B2CD)
		// 	 *
		// 	 * @link https://support.google.com/optimize/answer/6262084
		// 	 */
		// 	'optimize_id' => null,

		// 	/**
		// 	 * Anonymize user IP addresses.
		// 	 *
		// 	 * This might be required depending on region.
		// 	 *
		// 	 * @link https://github.com/roots/soil/pull/206
		// 	 */
		// 	'anonymize_ip',
		// ],

		/**
		 * Moves all scripts to wp_footer action
		 */
		'js-to-footer',

		/**
		 * Cleaner walker for wp_nav_menu()
		 */
		'nav-walker',

		/**
		 * Redirects search results from /?s=query to /search/query/, converts %20 to +
		 *
		 * @link http://txfx.net/wordpress-plugins/nice-search/
		 */
		'nice-search',

		/**
		 * Convert absolute URLs to relative URLs
		 *
		 * Inspired by {@link http://www.456bereastreet.com/archive/201010/how_to_make_wordpress_urls_root_relative/}
		 */
		'relative-urls',
	]);

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support('title-tag');

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus([
		'primary_navigation' => __('Primary Navigation', 'base')
	]);

	// Enable post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support('post-thumbnails');

	// Enable post formats
	// http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

	// Enable HTML5 markup support
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'style', 'script', 'navigation-widgets']);

	// Use main stylesheet for visual editor
	// To add custom styles edit /assets/styles/layouts/_tinymce.scss
	// add_editor_style(Assets\asset_path('styles/main.css'));

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );

	// Add support for experimental link color control.
	add_theme_support( 'experimental-link-color' );

	// Add support for experimental cover block spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for custom units.
	// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
	add_theme_support( 'custom-units' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register Widgets
 */
function register_widgets() {

	register_sidebar([
		'name'          => __('Primary', 'base'),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	]);

	register_sidebar([
		'name'          => __('Footer', 'base'),
		'id'            => 'sidebar-footer',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
}
add_action( 'widgets_init', __NAMESPACE__ . '\\register_widgets' );

/**
 * Front-end CSS & JS
 */
function assets() {
	// new css
	wp_enqueue_style( 'base/css', get_template_directory_uri() . '/dist/css/index.css', false, null) ;

	// conditionally load as needed for comments
	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script( 'comment-reply' );
	}

	// new js
	wp_enqueue_script( 'base/js', get_template_directory_uri() . '/dist/js/index.js', ['jquery'], null, true );
	// put new js file here...
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100 );