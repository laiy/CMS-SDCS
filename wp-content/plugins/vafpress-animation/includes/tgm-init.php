<?php

function vp_an_tgmpa() {

	$plugins = array(
		array(
			'name'     => 'Vafpress Framework Plugin',
			'slug'     => 'vafpress-framework-plugin',
			'source'   => 'https://github.com/vafour/vafpress-framework-plugin/releases/download/1.0-RC1/vafpress-framework-plugin.zip',
			'required' => true,
		),
	);

	$config = array(
		'domain'		   => 'vp_animation',
		'parent_menu_slug' => 'plugins.php',
		'parent_url_slug'  => 'plugins.php',
		'strings'		   => array(
			'menu_title'   => __('Required Plugins', 'vp_an_td'),
		)
	);

	tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'vp_an_tgmpa');

/**
 * EOF
 */