<?php

define( 'VP_AN_ADMIN_DIR' , VP_AN_DIR . '/includes/admin' );
define( 'VP_AN_ADMIN_URI' , VP_AN_URL . '/includes/admin' );

// INIT SHORTCODE GENERATOR
new VP_ShortcodeGenerator(array(
	'name'           => 'vp_an_shortcodegenerator',
	'template'       => VP_AN_ADMIN_DIR . '/scheme-shortcodegenerator.php',
	'modal_title'    => __( 'Vafpress Animation Shortcode', 'vp_animation'),
	'button_title'   => __( 'Vafpress Animation Shortcode', 'vp_animation'),
	'types'          => array( '*' ),
	'main_image'     => VP_AN_ADMIN_URI . '/public/vp_an_sc_icon.png',
	'sprite_image'   => VP_AN_ADMIN_URI . '/public/vp_an_sc_icon_sprite.png',
));

/**
 * EOF
 */