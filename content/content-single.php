<?php
	/**
		* The template used for displaying single post content in single.php
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<?php
// display featured image
$featured_image = get_theme_mod( 'stem_single_featured_image' );
if ( has_post_thumbnail() && ! empty( $featured_image ) ) {
	the_post_thumbnail( 'featured-img', array(
		'class' => 'featured-img',
	) );
}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php if ( 'post' == get_post_type() && get_theme_mod( 'stem_single_meta' ) == 1 ) : ?>
		<div class="entry-meta">
			<?php stem_posted_on(); ?>
		</div>
		<?php endif;?>
		
	</header>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mystem' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	
	<?php if ( get_theme_mod( 'stem_post_footer' ) == 1 ) : ?>
	<footer class="entry-meta">
		
		
		<div class="share-block">
			<p class="text-share">Share this:</p>
			<ul class="share-links">
				<li><a href="#" class="fb" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false;"></a></li>
				<li><a href="#" class="tw" onclick="window.open('http://twitter.com/intent/tweet?url=<?php the_permalink();?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false;"></a></li>
				<li><a href="#" class="gl" onclick="window.open('http://plus.google.com/share?url=<?php the_permalink();?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false;"></a></li>	
				<li><a href="#" class="in" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false;"></a></li>
			</ul>
			
		</div>
		<?php echo get_the_tag_list( '<div class="tag-list">',' ','</div>' ); ?>
		
	</footer>
	<?php endif; ?>
</article>



<?php if ( get_theme_mod( 'stem_post_related_posts' ) == 1 ) : ?>
	<div id="related-posts" class="related-posts clearfix">
	<h4><?php echo esc_attr_e( 'Related posts', 'mystem' );?></h4>
		<?php stem_related_posts(); ?>
	</div>

<?php endif; ?>

<?php if ( get_theme_mod( 'stem_post_author' ) == 1 ) : ?>
<div class="single-post-footer clear">
	<div class="post-footer-author">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 90, '', get_the_author_meta( 'display_name' ) ); ?>
	</div>
	<div class="post-footer-author-bio">
		<h5 class="author-name"><?php echo esc_attr_e( 'About ', 'mystem' ) .  get_the_author_meta( 'display_name' ) ; ?></h5>
		<p><?php echo get_the_author_meta( 'description' ) ; ?></p>
	</div>
</div>
<?php endif; ?>
