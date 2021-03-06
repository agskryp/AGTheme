<?php
/**
 * AG_Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AG_Theme
 */

if ( ! function_exists( 'agtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function agtheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AG_Theme, use a find and replace
	 * to change 'agtheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'agtheme', get_template_directory() . '/languages' );

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
        //Default post thumbnail size || featured image size
//        set_post_thumbnail_size( 828, 360, true ); //Edit size to fit your theme, then regenerate
//        //thumbnails
        
        //If you need a custom image size
        //Note wordpress backend comes with thumbnail, medium, and large options
        add_image_size( 'agtheme-small-thumb', 300, 150, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'agtheme' ),
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
	add_theme_support( 'custom-background', apply_filters( 'agtheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
        
        // Add editor styles
        add_editor_style( array( 
            'inc/editor-style.css', 
            'https://fonts.googleapis.com/css?family=Lato:100,900|Muli:300,300i,400,400i', 
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' 
        ) );
        
        
}
endif;
add_action( 'after_setup_theme', 'agtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'agtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function agtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area', 'agtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'agtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'agtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function agtheme_scripts() {
	wp_enqueue_style( 'agtheme-style', get_stylesheet_uri() );

        //Add Google Fonts:
        wp_enqueue_style( 'agtheme-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:100,900|Muli:300,300i,400,400i|Yrsa:300,400,500,600,700' );
        
        //Add Font Awesome:
        wp_enqueue_style( 'agtheme-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        
        //Add custom function script:
        wp_enqueue_script( 'agtheme-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151215', true );
        
	wp_enqueue_script( 'agtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );
        wp_localize_script( 'agtheme-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'agtheme' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'agtheme' ) . '</span>',
	) );

	wp_enqueue_script( 'agtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'agtheme_scripts' );

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
 * Load Portfolio post types.
 */
require get_template_directory() . '/inc/posttypes.php';


/**
 * Sets the number of images to display on the portfolio page
 */
function projects_per_page( $query ) {
    if( ! is_admin() && $query->is_main_query() )
        if ( $query->is_post_type_archive('portfolio') ) {
            $query->set( 'posts_per_page', 30 );
    }
}
add_action( 'pre_get_posts', 'projects_per_page' );