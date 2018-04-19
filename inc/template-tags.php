<?php
	/**
		* Custom template tags for this theme.
		*
		* Eventually, some of the functionality here could be replaced by core features.
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/

if ( ! function_exists( 'stem_paging_nav' ) ) :
	/**
		* Display navigation to next/previous set of posts when applicable.
		*
		* @return void
	*/
	function stem_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_attr_e( 'Posts navigation', 'mystem' ); ?></h1>
		<div class="nav-links">
			
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<i class="far fa-arrow-alt-circle-left"></i> Older posts', 'mystem' ) ); ?></div>
			<?php endif; ?>
			
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <i class="far fa-arrow-alt-circle-right"></i>', 'mystem' ) ); ?></div>
			<?php endif; ?>
			
		</div>
	</nav>
	<?php
	}
endif;

if ( ! function_exists( 'stem_post_nav' ) ) :
	/**
		* Display navigation to next/previous post when applicable.
		*
		* @return void
	*/
	function stem_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_attr_e( 'Post navigation', 'mystem' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="far fa-arrow-alt-circle-left"></i> %title', 'Previous post link', 'mystem' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title <i class="far fa-arrow-alt-circle-right"></i>', 'Next post link', 'mystem' ) );
			?>
		</div>
	</nav>
	<?php
	}
endif;

if ( ! function_exists( 'stem_posted_on' ) ) :
	/**
		* Prints HTML with meta information for the current post-date/time and author.
	*/
	function stem_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	?>
	<span class="byline">
		<i class="far fa-user"></i>
		<?php
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);
		?>
	</span>
	<span class="posted-on">
		<i class="far fa-clock"></i>
		<?php
			printf( '<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				 $time_string
			);
		?>
	</span>
	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
	<span class="comments-link"><i class="far fa-comment"></i><?php comments_popup_link( __( 'Comments', 'mystem' ), __( '1 comment', 'mystem' ), __( '% comments', 'mystem' ) ); ?></span>
	<?php endif;
	}
endif;

if ( ! function_exists( 'stem_related_posts' ) ) :
	function stem_related_posts() {
		$tags = wp_get_post_tags( get_the_ID() );
		if ( $tags ) {
			$tag_ids = array();
			foreach ( $tags as $individual_tag ) {
				$tag_ids[] = $individual_tag->term_id;
			}
			$args = array(
				'tag__in' => $tag_ids,
				'post__not_in' => array( absint( get_the_ID() ) ),
				'showposts' => get_theme_mod( 'stem_post_related_posts_number', '5' ),
			);
			$my_query = new wp_query( $args );
			if ( $my_query->have_posts() ) {
				echo '<ul>';
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
				?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php the_title();?></a></li>
				<?php
				}
				echo '</ul>';
			}
			wp_reset_query();
		}
	}

endif;
