<?php

add_action( 'admin_init', 'qualia_update' );

function qualia_update()
{
	// include envato toolkit
	include QUALIA_LIBS_DIR . 'envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php';

	if( qualia_option('tf_username', '') != '' )
	{
		$upgrader = new Envato_WordPress_Theme_Upgrader( qualia_option('tf_username'), qualia_option('tf_apikey') );
		$test = $upgrader->check_for_theme_update();
		var_dump($test);
		// $upgrader->upgrade_theme();
	}
}

/**
 * EOF
 */