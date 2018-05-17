<?php
	/**
		* The free plugins from Dmytro Lobov
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>
<style>
	.height_screen{height:270px; background:#fff;}
	.height_screen img{max-width:100%;}
	.height_screen span{padding: 10px; font-size:16px; font-weight:500; display:block;}
	.height_screen a{color:#000; text-decoration:none;}
	.themes {overflow:hidden;}
</style>
<h3>The MyStem is good for using with the next plugins</h3>
<div class="wrap">
	<div class="theme-browser">
		<div class="themes">			
			<?php mystem_add_get_feed(); ?>			
		</div>
	</div>
</div>


<?php
	function mystem_add_get_feed() {			
		$image = get_template_directory_uri().'/admin/image/';		
		$plugins = array(
		0 => array('WPBakery Page Builder for WordPress (formerly Visual Composer)', 'WPBakery WordPress Page Builder Plugin with Frontend and Backend Editor.', 'visual-composer', 'https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=wow-company'),
		
		1 => array('Float menu - awesome floating side menu', 'Easily create floating menus of varying complexity. Use its capabilities to place unique navigation on the site.', 'float-menu', 'https://wow-estore.com/item/float-menu-pro/'),
		
		2 => array('Modal Window - create popup modal window ', 'Modal Window - WordPress plugin for creating popup modal window with any kind of content and settings. Simple popup modal window builder plugin.', 'modal-window', 'https://wow-estore.com/item/wow-modal-windows-pro/'),		
		
		3 => array('Herd Effects - fake notifications to motivate users to take action ', 'Create and show fictitious notifications to motivate users to take action on your site! Create a queue effect!', 'mwp-herd-effect', 'https://wow-estore.com/item/wow-herd-effects-pro/'),			
		
		4 => array('Wow Countdowns - create any counter, timer and coundown', 'Create timers & countdowns. Increase your sales & conversions with scarcity & urgency effects!', 'mwp-countdown', 'https://wow-estore.com/item/wow-countdowns-pro/'),	
				
		5 => array('Side Menu - add fixed side buttons', 'Easily create floating menus of varying complexity. Use its capabilities to place unique navigation on the site.', 'side-menu', 'https://wow-estore.com/item/side-menu-pro/'),
		
		6 => array('Bubble Menu - awesome custom circle menu', 'Easily create a custom floating circle menu with an icons.', 'bubble-menu', 'https://wow-estore.com/item/bubble-menu-pro/'),
		
		
		);	
		foreach ($plugins as $key => $value) { ?>
		
		<div class="theme">
			<div class="height_screen">
				<a target="_blank" href="<?php echo esc_url( $value[3] ); ?>" target="_blank"><img src="<?php echo esc_url( $image.$value[2] ) . '.jpg' ?>" />
					<span><?php echo esc_attr( $value[1] ); ?></span>
				</a>
			</div>
			<div class="theme-author"></div>
			<h2 class="theme-name"><span><?php echo esc_attr( $value[0] ); ?></span></h2>	
		</div>
		<?php } 
	}
?>
