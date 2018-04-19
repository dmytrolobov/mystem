<?php
	/**
		* the header element and the opening of the main content elements
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	$title = get_bloginfo( 'name' );
	$tagline = get_bloginfo( 'description ' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php echo get_bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		
		<div class="header-area full">
			<header id="masthead" class="site-header main inner" role="banner">
				<div class="header-elements">
					<span class="site-title">
						<?php if ( has_custom_logo() ) {
							the_custom_logo();
						} 
						else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $title ); ?>">
							<?php echo esc_attr( $title ); ?>
						</a>
						<?php } ?>
					</span>
					<?php if ( ! get_theme_mod( 'stem_header_menu' ) ) : ?>
					<nav id="header-navigation" class="header-menu" role="navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'header',
							'fallback_cb' => 'stem_menu_fallback',
						) ); ?>
						</nav>
					<?php endif; ?>
				</div>
			</header>
			<?php if ( ! get_theme_mod( 'stem_primary_menu' ) ) : ?>
			<div class="main-menu-container">
				<nav id="site-navigation" class="main main-navigation clear" role="navigation">
					<span class="menu-toggle"><?php echo '<i class="fas fa-bars"></i> ' . esc_attr_e( 'Menu', 'mystem' ); ?></span>
					<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'mystem' );?></a>
					
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'fallback_cb' => 'stem_menu_fallback',
					) ); ?>
					
					<div class="search-form">
						<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label>
								<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'mystem' ); ?></span>
								<input type="search" class="search-field"
								placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'mystem' ); ?>"
								value="<?php echo esc_html( get_search_query() ); ?>" name="s"
								title="<?php echo esc_attr_x( 'Search for:', 'label', 'mystem' ); ?>" />
							</label>
							<button type="submit" class="search-submit">
								<span class="font-awesome-search"></span>
								<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'mystem' ); ?></span>
							</button>
						</form>
					</div>	
				</nav>
			</div>
			<?php endif; ?>
		</div>
		
		<div class="main-content-area full">
			<div class="main">
				<div id="content" class="site-content inner">
