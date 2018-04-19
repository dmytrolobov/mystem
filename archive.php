<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( is_category() ) :
						single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* translators: %s is author */
							printf( __( 'Author: %s', 'mystem' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							/* translators: %s is date */
							printf( __( 'Day: %s', 'mystem' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							/* translators: %s is monthly archives date format*/
							printf( __( 'Month: %s', 'mystem' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'mystem' ) ) . '</span>' );

						elseif ( is_year() ) :
							/* translators: %s is yearly archives date format*/
							printf( __( 'Year: %s', 'mystem' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'mystem' ) ) . '</span>' );

						else :
							__( 'Archives', 'mystem' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
				if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php stem_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content/content', 'none' ); ?>

		<?php endif; ?>

		</main>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
