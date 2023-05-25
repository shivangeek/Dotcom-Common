<?php

/**
 * oakmont functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oakmont
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('oakmont_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oakmont_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oakmont, use a find and replace
		 * to change 'oakmont' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('oakmont', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Primary', 'oakmont'),
				'footer-menu' => esc_html__('Footer Menu', 'oakmont'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'oakmont_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'oakmont_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oakmont_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('oakmont_content_width', 640);
}
add_action('after_setup_theme', 'oakmont_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oakmont_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'oakmont'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'oakmont'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'oakmont_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function oakmont_scripts()
{

	wp_enqueue_style('oakmont-bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '20151215');
	wp_enqueue_style('oakmont-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '20151215');
	wp_enqueue_style('oakmont-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '20151215');
	wp_enqueue_style('oakmont-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '20151215');
	wp_enqueue_style('oakmont-fancybox-min', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), '20151215');
	wp_enqueue_style('oakmont-simplebar-css', get_template_directory_uri() . '/assets/css/simplebar.css', array(), '20151215');
	wp_enqueue_style('oakmont-sticky', get_template_directory_uri() . '/assets/css/sticky.css', array(), '20151215');

	wp_enqueue_style('oakmont-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('jquery');
	wp_style_add_data('oakmont-style', 'rtl', 'replace');

	wp_enqueue_script('oakmont-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-simplebar-js', get_template_directory_uri() . '/assets/js/simplebar.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-fancybox-min', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-font-awesome-min', get_template_directory_uri() . '/assets/js/font-awesome.min.js', array(), '20151215', true);
	wp_enqueue_script('oakmont-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), rand(1000, 10000), true);
	wp_localize_script('oakmont-custom', 'custom_call', ['ajaxurl' => admin_url('admin-ajax.php'), 'homeurl' => home_url()]);

	wp_enqueue_script('oakmont-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'oakmont_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function custom_testimonials_post()
{
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add New', 'testimonial'),
		'add_new_item' => __('Add New Testimonials'),
		'edit_item' => __('Edit Testimonial'),
		'new_item' => __('New Testimonial'),
		'all_items' => __('All Testimonials'),
		'view_item' => __('View Testimonial'),
		'search_items' => __('Search Testimonials'),
		'not_found' => __('No testimonial found'),
		'not_found_in_trash' => __('No testimonial found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Testimonials'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Holds testimonials and testimonial specific data',
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive' => true,
		'menu_icon' => 'dashicons-editor-quote',
	);
	register_post_type('testimonials', $args);
}
add_action('init', 'custom_testimonials_post');

// Filter the output of logo to fix Googles Error about itemprop logo
add_filter('get_custom_logo', 'change_html_custom_logo');
function change_html_custom_logo()
{
	$custom_logo_id = get_theme_mod('custom_logo');
	$site_name = get_bloginfo('name');
	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home" title="' . $site_name . '" itemprop="url">%2$s</a>',
		esc_url(home_url('/')),
		wp_get_attachment_image($custom_logo_id, 'full', false, array(
			'class'    => 'custom-logo',
			"data-no-lazy" => "1",
		))
	);
	return $html;
}


/**
 * Add custom taxonomies
 */
function add_custom_taxonomies()
{
	// Add new "Locations" taxonomy to Posts
	register_taxonomy('location', 'post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x('Locations', 'taxonomy general name'),
			'singular_name' => _x('Location', 'taxonomy singular name'),
			'search_items' =>  __('Search Locations'),
			'all_items' => __('All Locations'),
			'parent_item' => __('Parent Location'),
			'parent_item_colon' => __('Parent Location:'),
			'edit_item' => __('Edit Location'),
			'update_item' => __('Update Location'),
			'add_new_item' => __('Add New Location'),
			'new_item_name' => __('New Location Name'),
			'menu_name' => __('Locations'),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'locations', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action('init', 'add_custom_taxonomies', 0);

/**
 * Send AJAX response
 */
add_action('wp_ajax_gallery_tabbing', 'gallery_image_tabbing');
add_action('wp_ajax_nopriv_gallery_tabbing', 'gallery_image_tabbing');

function gallery_image_tabbing()
{

	wp_die();
}
if (function_exists('acf_add_options_page')) {

	acf_add_options_page();
}
