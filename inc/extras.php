<?php
/**
 * menu fallback
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */
function stem_menu_fallback() {
	?>
	
		<ul>
			<li>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>"><?php esc_attr_e( 'Home', 'mystem' ); ?></a>
			</li>
		</ul>
	
	<?php
}





/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function stem_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_theme_mod( 'stem_layout' ) == 'sc' ) {
		$classes[] = 'sidebar-content';
	}

	return $classes;
}
add_filter( 'body_class', 'stem_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function stem_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		/* translators: %s is page number in title */
		$title .= " $sep " . sprintf( __( 'Page %s', 'mystem' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'stem_wp_title', 10, 2 );



