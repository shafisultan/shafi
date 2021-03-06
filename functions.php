<?php
/**
 * shafi functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shafi
 */

if ( ! function_exists( 'shafi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shafi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shafi, use a find and replace
	 * to change 'shafi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shafi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumb', 600, 600, true ); //600 by 600 pixels and the 'true' is to adjus the cropping of the feature images to ratio of the image

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'shafi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shafi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'shafi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shafi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shafi_content_width', 640 );
}
add_action( 'after_setup_theme', 'shafi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shafi_widgets_init() { // sidebar that I'm getting to appear in my footer.
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shafi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shafi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shafi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shafi_scripts() {
	wp_enqueue_style( 'shafi-style', get_stylesheet_uri() );

	// Enqueue Google fonts to use for my website.
	wp_enqueue_style( 'indie-fonts','https://fonts.googleapis.com/css?family=Indie+Flower|Monoton' );
	wp_enqueue_style( 'monoton-font', 'https://fonts.googleapis.com/css?family=Monoton' );
	wp_enqueue_style( 'raleway-font', 'https://fonts.googleapis.com/css?family=Raleway' );
	wp_enqueue_style( 'londrina-font', 'https://fonts.googleapis.com/css?family=Londrina+Outline' );
	wp_enqueue_style( 'amatic-font', 'https://fonts.googleapis.com/css?family=Amatic+SC' );

	wp_enqueue_script( 'shafi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shafi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/font/css/font-awesome.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shafi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
	* Secondary socail media menu that appear in the footer
	*/
	register_nav_menus( array( // Regitering the social media menu
	 'social' => __( 'Social Menu', 'Social Menu' ),
	) );

	require get_stylesheet_directory() . '/inc/options.php'; // registering the options file here to work with my WP theme
