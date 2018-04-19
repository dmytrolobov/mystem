<?php
/**
 * Theme Customizer
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */
function stem_customize_register( $wp_customize ) {

	/** ===============
	* Site Title (Logo) & Tagline
	*/
	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title (Logo) & Tagline', 'mystem' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;

	//site title
	$wp_customize->get_control( 'blogname' )->priority = 10;
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// tagline
	$wp_customize->get_control( 'blogdescription' )->priority = 30;
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/** ===============
	 * Layout Options
	 */
	$wp_customize->add_section( 'stem_layout_design', array(
		'title'       => __( 'Layout & Design', 'mystem' ),
		'description' => __( 'Control the column configuration and color scheme of your site.', 'mystem' ),
		'priority'   => 15,
	) );
	$wp_customize->add_setting( 'stem_layout', array(
		'default' => 'cs',
		'sanitize_callback' => 'stem_sanitize_layout',
	) );
	$wp_customize->add_control( 'stem_layout', array(
		'type' => 'select',
		'label' => __( 'Choose a layout:', 'mystem' ),
		'section' => 'stem_layout_design',
		'choices' => array(
			'cs'	=> 'Content - Sidebar',
			'sc'	=> 'Sidebar - Content',
		),
	) );

	$wp_customize->add_setting('stem_color', array(
		'default'           => '#02C285',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'stem_color', array(
		'label'    => __( 'Stem Color', 'mystem' ),
		'section'  => 'stem_layout_design',
	)));

	$wp_customize->add_setting('stem_second_color', array(
		'default'           => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'stem_second_color', array(
		'label'    => __( 'stem Second Color', 'mystem' ),
		'section'  => 'stem_layout_design',
	)));

	$wp_customize->add_setting('stem_background_color', array(
		'default'           => '#d9dfe5',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'stem_background_color', array(
		'label'    => __( 'Background Color', 'mystem' ),
		'section'  => 'stem_layout_design',
	)));

	$wp_customize->add_setting('stem_blocks_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'stem_blocks_color', array(
		'label'    => __( 'Blocks Background Color', 'mystem' ),
		'section'  => 'stem_layout_design',
	)));

	$wp_customize->add_setting('stem_text_color', array(
		'default'           => '#363636',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'stem_text_color', array(
		'label'    => __( 'Text Color', 'mystem' ),
		'section'  => 'stem_layout_design',
	)));

	$wp_customize->add_setting( 'stem_border', array(
		'default' => '4',
		'sanitize_callback' => 'stem_sanitize_integer',
	) );
	$wp_customize->add_control( 'stem_border', array(
		'type' => 'number',
		'label' => __( 'Border Radius (px):', 'mystem' ),
		'section' => 'stem_layout_design',
	) );
	// Hide header menu?
	$wp_customize->add_setting( 'stem_header_menu', array(
		'default' => 0,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_header_menu', array(
		'label'		=> __( 'Hide Header menu?', 'mystem' ),
		'section'	=> 'stem_layout_design',
		'type'    => 'checkbox',
	) );
	// Hide Primary menu?
	$wp_customize->add_setting( 'stem_primary_menu', array(
		'default' => 0,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_primary_menu', array(
		'label'		=> __( 'Hide Primary menu?', 'mystem' ),
		'section'	=> 'stem_layout_design',
		'type'    => 'checkbox',
	) );
	// Hide Footer widget block?
	$wp_customize->add_setting( 'stem_footer_widget', array(
		'default' => 0,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_footer_widget', array(
		'label'		=> __( 'Hide Footer widget block?', 'mystem' ),
		'section'	=> 'stem_layout_design',
		'type'    => 'checkbox',
	) );

	/** ===============
	 * Content Options
	 */
	$wp_customize->add_section( 'stem_content_section', array(
		'title'       	=> __( 'Content Options', 'mystem' ),
		'description' 	=> __( 'Adjust the display of content on your website. All options have a default value that can be left as-is but you are free to customize.', 'mystem' ),
		'priority'   	=> 20,
	) );

	// post content
	$wp_customize->add_setting( 'stem_post_content', array(
		'default' => 'full_content',
		'sanitize_callback' => 'stem_sanitize_radio',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'stem_post_content', array(
		'label'		=> __( 'Post Feed Content', 'mystem' ),
		'section'	=> 'stem_content_section',
		'settings'	=> 'stem_post_content',
		'priority'	=> 20,
		'type'      => 'radio',
		'choices'   => array(
			'excerpt'		=> 'Excerpt',
			'full_content'	=> 'Full Content',
		),
	) ) );
	// read more link
	$wp_customize->add_setting( 'stem_read_more', array(
		'default' => __( 'Read More', 'mystem' ),
		'sanitize_callback' => 'stem_sanitize_text',
	) );
	$wp_customize->get_setting( 'stem_read_more' )->transport = 'postMessage';
	$wp_customize->add_control( 'stem_read_more', array(
		'label' => __( 'Excerpt & More Link Text', 'mystem' ),
		'section' => 'stem_content_section',
		'settings' => 'stem_read_more',
		'priority' => 25,
	) );
	// show featured images on feed?
	$wp_customize->add_setting( 'stem_featured_image', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_featured_image', array(
		'label'		=> __( 'Show Featured Images in post listings?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 30,
		'type'      => 'checkbox',
	) );
	// show featured images on posts?
	$wp_customize->add_setting( 'stem_single_featured_image', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_single_featured_image', array(
		'label'		=> __( 'Show Featured Images on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 40,
		'type'      => 'checkbox',
	) );
	// show meta on posts?
	$wp_customize->add_setting( 'stem_single_meta', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_single_meta', array(
		'label'		=> __( 'Show Meta on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 40,
		'type'      => 'checkbox',
	) );
	// show single content footer?
	$wp_customize->add_setting( 'stem_post_footer', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_post_footer', array(
		'label'		=> __( 'Show Content Footer on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// show related posts block on single post?
	$wp_customize->add_setting( 'stem_post_related_posts', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_post_related_posts', array(
		'label'		=> __( 'Show Related posts on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// Number Of Related Posts
	$wp_customize->add_setting( 'stem_post_related_posts_number', array(
		'default' => '5',
		'sanitize_callback' => 'stem_sanitize_integer',
	) );
	$wp_customize->add_control( 'stem_post_related_posts_number', array(
		'type' => 'number',
		'label' => __( 'Number Of Related Posts:', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 50,
	) );
	// show author block on single post?
	$wp_customize->add_setting( 'stem_post_author', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_post_author', array(
		'label'		=> __( 'Show Author block on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// show navigation block on single post?
	$wp_customize->add_setting( 'stem_post_navigation', array(
		'default' => 1,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_post_navigation', array(
		'label'		=> __( 'Show Navigation block on Single Posts?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// comments on pages?
	$wp_customize->add_setting( 'stem_page_comments', array(
		'default' => 0,
		'sanitize_callback' => 'stem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'stem_page_comments', array(
		'label'		=> __( 'Display Comments on Standard Pages?', 'mystem' ),
		'section'	=> 'stem_content_section',
		'priority'	=> 60,
		'type'      => 'checkbox',
	) );
	// credits & copyright
	$wp_customize->add_setting( 'stem_credits_copyright', array(
		'default' => null,
		'sanitize_callback' => 'stem_sanitize_link_text',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'stem_credits_copyright', array(
		'label'   => __( 'Footer Credits & Copyright', 'mystem' ),
		'section' => 'stem_content_section',
		'settings' => 'stem_credits_copyright',
		'priority' => 70,
	) );

	$wp_customize->selective_refresh->add_partial( 'stem_credits_copyright', array(
		'selector' => '.site-info',
		'container_inclusive' => false,
	) );
}
add_action( 'customize_register', 'stem_customize_register' );


/** ===============
 * Sanitize checkbox options
 */
function stem_sanitize_checkbox( $input ) {
	if ( 1 == $input  ) {
		return 1;
	} else {
		return 0;
	}
}


/** ===============
 * Sanitize radio options
 */
function stem_sanitize_radio( $input ) {
	$valid = array(
		'excerpt'		=> 'Excerpt',
		'full_content'	=> 'Full Content',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/** ===============
 * Sanitize text input
 */
function stem_sanitize_text( $input ) {
	return strip_tags( stripslashes( $input ) );
}


/** ===============
 * Sanitize text input to allow anchors
 */
function stem_sanitize_link_text( $input ) {
	return strip_tags( stripslashes( $input ), '<a>' );
}


/** ===============
 * Sanitize the layout option
 */
function stem_sanitize_layout( $input ) {
	$valid = array(
		'sc' => 'Sidebar - Content',
		'cs' => 'Content - Sidebar',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return 'sc';
	}
}


/** ===============
 * Sanitize integer input
 */
function stem_sanitize_integer( $input ) {
	return absint( $input );
}


/** ===============
 * Sanitize file input
 */
function stem_sanitize_file( $file, $setting ) {
	//allowed file types
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
	);

	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );

	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}



// Custom main color of stem

function stem_color_scheme_css() {
	$color = get_theme_mod( 'stem_color', '#02C285' );
	$second_color = get_theme_mod( 'stem_second_color', '#cccccc' );
	$background_color = get_theme_mod( 'stem_background_color', '#d9dfe5' );
	$blocks_color = get_theme_mod( 'stem_blocks_color', '#ffffff' );
	$text_color = get_theme_mod( 'stem_text_color', '#363636' );
	$border = get_theme_mod( 'stem_border', '4' );
	$search_border = ( 0 == $border ) ? '0' : '25';

	$css = '
		body
		{
			background: ' . $background_color . ';
			color: ' . $text_color . ';
		}
		.main-navigation a,
		.navigation a:hover,
		.comment-navigation a:hover,
		.entry-header a,
		footer.entry-meta a,
		.comment-author a:hover,
		.comment-metadata a:hover,
		.bypostauthor .comment-metadata a:hover,
		.bypostauthor .comment-meta a.url:hover,
		.widget a:hover,
		.related-posts a:hover
		{
			color: ' . $text_color . ';
		}

		.footer-area {
			background: ' . $text_color . ';
		}

		/* Second color*/
		.entry-header .entry-title a:hover,
		.navigation a,
		.comment-navigation a,
		.author-social-links i,
		.comment-author a,
		.comment-metadata a,
		.widget li:before
		{
			color: ' . $second_color . ';
		}

		.main-navigation ul ul, .search-form .search-field, .entry-header, footer .tag-list a, footer .share-block, .comment-reply-title, .comments-title, .comment-list .parent, .widget-title, .tagcloud a, .widget_search .search-field, .page_search .search-field, .main-menu-container, .related-posts h4  {
			border-color: ' . $second_color . ';
		}
		.sub-menu:before {
			border-color: transparent transparent ' . $second_color . ' transparent;
		}

		.main-menu-container, .main-navigation ul li:hover > ul, .navigation.post-navigation, .hentry, .page-header, .single-post-footer, #respond, .comments-list-area, .no-comments, .widget, .paging-navigation, .related-posts {
			background: ' . $blocks_color . ';
		}

		/* Border Radius*/

		.main-navigation .menu > li > .sub-menu,
		.main-navigation .menu > li > .sub-menu > li:last-child a:hover,
		.main-navigation .menu > li > .sub-menu .sub-menu> li:last-child a:hover
		{	
			border-radius: 0 0 ' . $border . 'px ' . $border . 'px;
		}
		.featured-img {
			border-radius: ' . $border . 'px ' . $border . 'px 0 0;
		}

		.navigation.post-navigation, .hentry, .page-header, .single-post-footer, #respond, .comments-list-area, .no-comments, .widget, .tagcloud a, footer .tag-list a, .paging-navigation, .related-posts {
			-webkit-border-radius: ' . $border . 'px;
			border-radius: ' . $border . 'px;
			
		}

		blockquote {
			border-color: ' . $color . ';
		}			
		.main-navigation .menu li > a:after, .main-navigation .menu li li > a:after, .paging-navigation i, .page-title span, .author-social-links i:hover, .comment-reply-link, .tagcloud a,
		.alert-bar .alert-message .fa:first-child,
		.entry-meta,
		a,
		.entry-header a:hover,
		.comment-reply-link:hover,
		.widget:hover .widget-title:before,
		.product-title:hover,
		.view-details:hover,
		.navigation.post-navigation .far
		{
			color: ' . $color . ';
		}
		.header-area,.search-form .search-submit, footer .tag-list a:hover, .tagcloud a:hover, .widget_search .search-submit, .page_search .search-submit,
		input[type="submit"],
		input[type="submit"]:hover,
		input[type="button"],
		input[type="button"]:hover,
		.more-link,
		.bypostauthor .comment-author
		{
			background:' . $color . ';
		}
		.widget_search .search-field, .page_search .search-field, .search-form .search-field {
			border-radius: ' . $search_border . 'px;
		}
		.search-form .search-submit, .widget_search .search-submit, .page_search .search-submit {
			border-radius:0 ' . $search_border . 'px ' . $search_border . 'px 0;
		}
		@media screen and (max-width: 768px) {
			.main-navigation .menu a:hover {
				background: ' . $color . ';
			}
		}';
		$css = trim( preg_replace( '~\s+~s', ' ', $css ) );

		return $css;

}


	/** ===============
 * Add Customizer UI styles to the <head> only on Customizer page
 */
function stem_customizer_styles() {
	?>
	<style type="text/css">	
		<?php echo esc_html( stem_color_scheme_css() ); ?>
	</style>
<?php
}
add_action( 'customize_controls_print_styles', 'stem_customizer_styles' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function stem_customize_preview_js() {
	wp_enqueue_script( 'stem_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'stem_customize_preview_js' );
