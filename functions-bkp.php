<?php
/**
 * Challenger functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Challenger
 */å
if ( ! function_exists( 'challenger_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function challenger_setup() {
		/*
		 * Make theme available for translatioån.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Challenger, use a find and replace
		 * to change 'challenger' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'challenger', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'challenger' ),
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
		add_theme_support( 'custom-background', apply_filters( 'challenger_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'challenger_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function challenger_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'challenger_content_width', 640 );
}
add_action( 'after_setup_theme', 'challenger_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function challenger_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'challenger' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'challenger' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'challenger_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 



/**
* Bootstrap
*/


function wp_bootstrap_4_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );
	wp_enqueue_script( 'bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_4_scripts' );


function challenger_scripts() {
	wp_enqueue_style( 'challenger-style', get_stylesheet_uri() );
	wp_enqueue_script( 'scripts', '//platform-api.sharethis.com/js/sharethis.js#property=5c92ea05509e7f0011eae0c9&product=social-ab');
	wp_enqueue_script( 'scripts', 'https://static.addtoany.com/menu/page.js');
	wp_enqueue_script( 'challenger-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_bootstrap_4_scripts();
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700|Raleway:500,500i,700,800' );
// 	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/scj5uzz.css' );
	
	wp_enqueue_script( 'challenger-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/script.js');	
	
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/less/style.less' );

}


add_action( 'wp_enqueue_scripts', 'challenger_scripts' );




/**
 * Remove Admin Bar For Subscribers
 */
 
add_action('set_current_user', 'cc_hide_admin_bar');
function cc_hide_admin_bar() {
	if (!current_user_can('edit_posts')) {
		show_admin_bar(false);
	}
}


/* Add Widget Area For News */


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'News Sidebar',
		'id'            => 'news_right_1',
		'before_widget' => '<div class="widget_text widget news-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header class="section-header"><h3 class="d-inline-flex border-title top-right">',
		'after_title'   => '</h3></header>',
	) );
}

add_action( 'widgets_init', 'arphabet_widgets_init' );



/* Add Widget Area For News */


function news_widget_2() {

	register_sidebar( array(
		'name'          => 'News Sidebar 2',
		'id'            => 'news_right_2',
		'before_widget' => '<div class="widget_text widget news-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header class="section-header"><h3 class="d-inline-flex border-title top-right">',
		'after_title'   => '</h3></header>',
	) );

}
add_action( 'widgets_init', 'news_widget_2' );




/**
 * SVG to media gallery.
 */
 
/*
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
*/




/* Change Tab Index
*/

add_filter( 'gform_tabindex', 'change_tabindex' , 10, 2 );

function change_tabindex( $tabindex, $form ) {
    return 21;
}



/**
 * Register Footer Menu.
 */

function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );



/**
 * Excerpt Custom Length
 */
 
add_filter( 'excerpt_length', function($length) {
	return 20;
} );



/**
 * Options Page
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
	

/**
 * Custom Login Page
 */
 
 
function ck_custom_admin_logo() {
    echo '<style type="text/css">
        body {
            background-color:#f3f3f3 !important;
        }
        
        h1 a {
            background-image:url(' . get_stylesheet_directory_uri() . '/assets/media/logo.png)!important;
            height: 78px !important;
			width: 180px !important;
			background-size: 180px 78px !important;
			background-repeat: no-repeat;
        }
    </style>';
}
add_action( 'login_head', 'ck_custom_admin_logo' );

// Add Shortcode capabilities to widgets
add_filter( 'widget_text', 'do_shortcode' );



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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
