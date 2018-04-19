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
<div class="wrap">
	<div class="theme-browser">
		<div class="themes">
			
			<?php echo stem_add_get_feed(); ?>
			
		</div>
	</div>
</div>


<?php
	function stem_add_get_feed() {
		$wordpress = 'https://wordpress.org/plugins/';	
		$image = get_template_directory_uri().'/admin/image/';		
		$plugins = array(
		0 => array('Float menu - awesome floating side menu', 'Easily create floating menus of varying complexity. Use its capabilities to place unique navigation on the site.', 'float-menu', 'float-menu-pro'),
		1 => array('Modal Window - create popup modal window ', 'Modal Window - Wordpress plugin for creating popup modal window with any kind of content and settings. Simple popup modal window builder plugin.', 'modal-window', 'wow-modal-windows-pro'),		
		
		2 => array('Herd Effects - fake notifications to motivate users to take action ', 'Create and show fictitious notifications to motivate users to take action on your site! Create a queue effect!', 'mwp-herd-effect', 'wow-herd-effects-pro'),
		3 => array('Wow Forms - create any form with custom style ', 'Create a any forms: email optin form, contact form, sign up form, inquiry form, feedback form, order form, phone call request form!', 'mwp-forms', 'wow-forms-pro'),
		
		4 => array('Wow Login - WordPress login plugin via email or social network ', 'WordPress login plugin using email login or social login. Your users can sign in using only email or via social network', 'wow-login', 'wow-login-pro'),
		
		5 => array('Wow Facebook Login', 'Highly customizable Facebook login button. Let visitors easily authorize on your wordpress website with their facebook account', 'wow-facebook-login', 'wow-facebook-login-pro'),		
		6 => array('Wow Google Login', 'Highly customizable Facebook login button. Let visitors easily authorize on your wordpress website with their google account', 'wow-google-login', 'wow-google-login-pro'),	
		
		
		7 => array('Wow Icons ', 'Easily insert and customize icon in post, page and menu. More then 2500 icons.', 'wow-icons', 'wow-icons-pro'),	
		
		8 => array('Wow Countdowns - create any counter, timer and coundown', 'Create timers & countdowns. Increase your sales & conversions with scarcity & urgency effects!', 'mwp-countdown', 'wow-countdowns-pro'),	
		
		
		9 => array('Side Menu - add fixed side buttons', 'Easily create floating menus of varying complexity. Use its capabilities to place unique navigation on the site.', 'side-menu', 'side-menu-pro'),
		
		10 => array('Bubble Menu - awesome custom circle menu', 'Easily create a custom floating circle menu with an icons.', 'bubble-menu', 'bubble-menu-pro'),
		
		
		);	
		foreach ($plugins as $key => $value) { ?>
		
		<div class="theme">
			<div class="height_screen">
				<a target="_blank" href="<?php echo $wordpress.$value[2]; ?>" target="_blank"><img src="<?php echo $image.$value[2].'.jpg' ?>" />
					<span><?php echo $value[1]; ?></span>
				</a>
			</div>
			<div class="theme-author"></div>
			<h2 class="theme-name"><span><?php echo $value[0]; ?></span></h2>	
		</div>
		<?php } 
	}
?>
