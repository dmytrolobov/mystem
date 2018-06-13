<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package MyStem WordPress theme
 */

function mystem_tgmpa_register() {

	// Get array of recommended plugins
	$plugins = array(
		
		array(
			'name'				=> 'Modal Window',
			'slug'				=> 'modal-window', 
			'required'			=> false,
			'force_activation'	=> false,
		),
		
		array(
			'name'				=> 'Float menu',
			'slug'				=> 'float-menu', 
			'required'			=> false,
			'force_activation'	=> false,
		),
		
		array(
			'name'				=> 'Fake Notification',
			'slug'				=> 'mwp-herd-effect', 
			'required'			=> false,
			'force_activation'	=> false,
		),
		
		array(
			'name'				=> 'MyStem Extra',
			'slug'				=> 'mystem-extra', 
			'required'			=> true,
			'force_activation'	=> false,
		),
		
	);
	
	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'mystem_theme',
		'domain'       => 'mystem',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'mystem_tgmpa_register' );