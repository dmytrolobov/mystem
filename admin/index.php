<?php
	/**
		* The Admin Page
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$query['return'] = admin_url();
$link_with_return = add_query_arg( $query, admin_url( 'customize.php' ) );
?>
<div class="wrap about-wrap stem-wrap">
	<h1>MyStem <small><em>(version 1.0)</em></small></h1>
	
	<div class="stem-about">
		<?php esc_attr_e( 'MyStem is now installed and ready to use! Get ready to build something unique & beautiful. Go to Customizer to make Your Website Legendary', 'mystem' ); ?>
		
		<?php
			/* translators: %s is url to Customizer */
		printf( __( '<a href="%s">Go to Customizer</a> to make <b>Your Website Legendary</b>.', 'mystem' ), esc_url( $link_with_return ) ); ?>
		
		<p style=""><?php esc_attr_e( 'We hope you enjoy it!', 'mystem' ); ?> </p>
	</div>
	
	<?php
		$current = ( isset( $_GET['tab'] ) ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'plugins';
		$tabs = array(			
			'plugins' => __( 'Plugins', 'mystem' ),
		);		
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab === $current ) ? ' nav-tab-active' : '';
			echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=stem&tab=' . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
		}
		echo '</h2>';
		echo '<div class="stem-content">';
		get_template_part( 'admin/'.$current );
		echo '</div>';
	?>
	
	<div class="stem-thanks">
		<?php esc_attr_e( 'Thank you for choosing stem. We hope that making your experience perfect.', 'mystem' ); ?>
	</div>
</div>
