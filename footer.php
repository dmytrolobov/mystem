<?php
/**
 * the closing of the main content elements and the footer element
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */
?>

			</div>
		</div>
	</div>

	<div class="footer-area full">
		<div class="main">	
			<footer id="colophon" class="site-footer inner" role="contentinfo">
			<?php
			$footer_widget = get_theme_mod( 'stem_footer_widget' );
			if ( empty( $footer_widget ) ) : ?>
				<div class="footer-sidebar">
					<div class="footer-sidebar-1">
						<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
					</div>
					<div class="footer-sidebar-2">
						<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
					</div>
					<div class="footer-sidebar-3">
						<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
					</div>				
				</div>
				<?php endif; ?>
				<span class="site-info">
					<?php
					$site_info = get_bloginfo( 'description' ) . ' - ' . get_bloginfo( 'name' ) . ' &copy; ' . date( 'Y' );
					$credits_copyright = get_theme_mod( 'stem_credits_copyright' );
					if ( ! empty( $credits_copyright ) ) :
						echo esc_attr( $credits_copyright );
					else :
						echo esc_attr( $site_info );
					endif;
					?>
				</span>
			</footer>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
