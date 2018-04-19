<?php
	/**
		* Functions and definitions
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/	
	
	if ( ! function_exists( 'stem_setup' ) ) :
	/**
		* Sets up theme defaults and registers support for various WordPress features.
		*
		* Note that this function is hooked into the after_setup_theme hook, which
		* runs before the init hook. The init hook is too late for some features, such
		* as indicating support for post thumbnails.
	*/
	
	function stem_setup() {
		// keep the media in check
		if ( ! isset( $content_width ) ) {
			$content_width = 762;
		}
		
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'mystem', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
		add_editor_style( array( 'inc/assets/css/editor-style.css', get_template_directory() ) );
		
		// Enable support for Custom Logo for site.
		add_theme_support( 'custom-logo' );
		
		/*
			* Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support( 'post-thumbnails' );
		
		// add a hard cropped (for uniformity) image sizes for the products and posts
		add_image_size( 'mystem-featured-img', 762, 450, true );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mystem' ),
		'header'  => __( 'Header Menu (no drop-downs)', 'mystem' ),
		) );
		
		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		) );
	}
	endif; // stem_setup
	add_action( 'after_setup_theme', 'stem_setup' );
	
	
	function stem_add_menu_page() {
		add_theme_page( 'About MyStem', 'About MyStem', 'edit_theme_options', 'mystem', 'stem_options_page' );
	}
	add_action( 'admin_menu', 'stem_add_menu_page' );
	
	
	if ( ! function_exists( 'stem_options_page' ) ) {
		function stem_options_page() {
			load_template( dirname( __FILE__ ) . '/admin/index.php' );
			wp_enqueue_style( 'stem-admin', get_template_directory_uri() . '/inc/assets/css/admin.css');
		}
	}
	
	/**
		* Register widgetized area and update sidebar with default widgets.
	*/
	
	function stem_widgets_init() {
		register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'mystem' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 1', 'mystem' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 2', 'mystem' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 3', 'mystem' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );
		
	}
	add_action( 'widgets_init', 'stem_widgets_init' );
	
	
	/**
		* Enqueue scripts and styles.
	*/
	
	function stem_scripts() {
		// main stylesheet
		wp_enqueue_style( 'stem-style', get_stylesheet_uri() );
		
		wp_add_inline_style( 'stem-style', stem_color_scheme_css() );
		
		// font awesome stylesheet
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/assets/fonts/font-awesome/css/fontawesome-all.min.css', null, '5.0.6' );
		
		// Google fonts - Pacifico & Quicksand
		wp_enqueue_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Pacifico|Quicksand:400italic,700italic,400,700' );
		
		// theme assets
		wp_enqueue_script( 'stem-navigation', get_template_directory_uri() . '/inc/assets/js/navigation.js' );
		
		wp_enqueue_script( 'stem-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js' );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'stem_scripts' );
	
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
	
	/** ===============
		* Adjust excerpt length
	*/
	
	if ( ! function_exists( 'stem_custom_excerpt_length' ) ) {
		function stem_custom_excerpt_length( $length ) {
			if ( is_admin() ) {
				return $length;
			}
			return 35;
		}
	}
	add_filter( 'excerpt_length', 'stem_custom_excerpt_length', 999 );
	
	
	/** ===============
		* Replace excerpt ellipses with new ellipses and link to full article
	*/
	if ( ! function_exists( 'stem_excerpt_more' ) ) {
		function stem_excerpt_more( $more ) {
			return '...</p> <div class="continue-reading"><a class="more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html( get_theme_mod( 'stem_read_more', __( 'Read More', 'mystem' ) ) ) . ' <i class="fas fa-angle-double-right"></i></a></div>';
		}
	}
	add_filter( 'excerpt_more', 'stem_excerpt_more' );
	
	
	/** ===============
		* Add .top class to the first post in a loop
	*/
	if ( ! function_exists( 'stem_first_post_class' ) ) {
		function stem_first_post_class( $classes ) {
			global $wp_query;
			if ( 0 == $wp_query->current_post ) {
				$classes[] = 'top';
			}
			return $classes;
		}
	}
	add_filter( 'post_class', 'stem_first_post_class' );
	
	
	/**
		* Change the Tag Cloud's Font Sizes.
		*
		* @since 1.0.
		*
		* @param array $args
		*
		* @return array
	*/
	if ( ! function_exists( 'stem_change_tag_cloud_font_sizes' ) ) {
		function stem_change_tag_cloud_font_sizes( array $args ) {
			$args['smallest'] = '8';
			$args['largest'] = '8';
			return $args;
		}
	}
	add_filter( 'widget_tag_cloud_args', 'stem_change_tag_cloud_font_sizes' );
	
	if ( ! function_exists( 'stem_tiny_mce_buttons' ) ) {
		function stem_tiny_mce_buttons( $buttons_array ){
			if ( !in_array( 'underline', $buttons_array ) && in_array( 'italic', $buttons_array ) ){
				$key = array_search( 'italic', $buttons_array );
				$inserted = array( 'underline' );
				array_splice( $buttons_array, $key + 1, 0, $inserted );
			}
			if ( !in_array( 'alignjustify', $buttons_array ) && in_array( 'alignright', $buttons_array ) ){
				$key = array_search( 'alignright', $buttons_array );
				$inserted = array( 'alignjustify' );
				array_splice( $buttons_array, $key + 1, 0, $inserted );
			}
			return $buttons_array;
		}
	}
	
	add_filter( 'mce_buttons', 'stem_tiny_mce_buttons', 5 );
