<?php

define( 'QUALIA_ADMIN_URI', trailingslashit(get_template_directory_uri()) . 'admin' );

/**
 * Include Vafpress Framework
 */
require_once 'vafpress-framework/bootstrap.php';

/**
 * Include Custom Data Sources
 */
require_once 'admin/data-sources.php';
if ( class_exists( 'Woocommerce' ) ) {
	require_once 'admin/data-sources-woocommerce.php';
}

/**
 * =====================================
 * Qualia Custom Vafpress Control Field
 * =====================================
 */

// REGISTER VIEWS AND CLASSES DIR
$vpfs = VP_FileSystem::instance();
$vpfs->add_directories('views', QUALIA_ADMIN_DIR . '/views');
VP_AutoLoader::add_directories(QUALIA_ADMIN_DIR . '/classes', 'VP_');

// EXTENSION
add_filter( 'vp_dependencies_array', 'qualia_bb_add_resources', null, 1 );

function qualia_bb_add_resources($dependencies)
{
	$dependencies['scripts']['paths']['qualia-bb'] = array(
		'path'     => QUALIA_ADMIN_URI . '/public/binding-button.js',
		'deps'     => array('jquery'),
		'ver'      => '1',
		'override' => false,
	);
	$dependencies['rules']['bindingbutton'] = array(
		'js'  => array('qualia-bb'),
		'css' => array(),
	);
	return $dependencies;
}

/**
 * Qualia Option
 */
if (!function_exists('qualia_option')) {

	function qualia_option($key, $default = null) {
		return vp_option(QUALIA_OPTION_KEY . '.' . $key, $default);
	}
}
if (!function_exists('qualia_woocommerce_option')) {

	function qualia_woocommerce_option($key, $default = null) {
		return vp_option(QUALIA_WOOCOMMERCE_OPTION_KEY . '.' . $key, $default);
	}
}
if (!function_exists('qualia_section')) {

	function qualia_section($i, $key, $default = null) {
		return vp_metabox('_page_builder.sections.' . $i . '.' . $key, $default);
	}
}
if (!function_exists('qualia_vp_pf_option')) {
	function qualia_vp_pf_option($key, $default = null)
	{
		if( !function_exists( 'vp_pf_option' ) )
			return $default;

		return vp_pf_option( $key, $default );
	}
}

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */

/**
 * Create instance of Options
 */
$qualia_tmpl_opt = get_template_directory() . '/admin/option/option.php';
global $qualia_opt;
$qualia_opt = new VP_Option(array(
	'is_dev_mode'           => false,
	'option_key'            => QUALIA_OPTION_KEY,
	'page_slug'             => QUALIA_OPTION_KEY,
	'template'              => $qualia_tmpl_opt,
	'menu_page'             => 'themes.php',
	'use_auto_group_naming' => true,
	'use_exim_menu'         => true,
	'minimum_role'          => 'edit_theme_options',
	'layout'                => 'fixed',
	'page_title'            => __('Theme Options', 'qualia_td'),
	'menu_label'            => __('Theme Options', 'qualia_td'),
));

if ( class_exists( 'Woocommerce' ) ) {

	$qualia_woocommerce_tmpl_opt = get_template_directory() . '/admin/option/option-woocommerce.php';
	global $qualia_woocommerce_opt;
	$qualia_woocommerce_opt = new VP_Option(array(
		'is_dev_mode'           => false,
		'option_key'            => QUALIA_WOOCOMMERCE_OPTION_KEY,
		'page_slug'             => QUALIA_WOOCOMMERCE_OPTION_KEY,
		'template'              => $qualia_woocommerce_tmpl_opt,
		'menu_page'             => 'woocommerce',
		'use_auto_group_naming' => true,
		'use_exim_menu'         => true,
		'minimum_role'          => 'edit_theme_options',
		'layout'                => 'fixed',
		'page_title'            => __('Qualia WooCommerce Options', 'qualia_td'),
		'menu_label'            => __('Settings (Qualia)', 'qualia_td'),
	));
}

/**
 * Create instances of Metaboxes
 */
$qualia_tmpl_mbs = glob(QUALIA_ADMIN_DIR . '/metabox/{*.php}', GLOB_BRACE);
foreach ($qualia_tmpl_mbs as $tmpl_mb) {
	new VP_Metabox($tmpl_mb);
}

/**
 * Qualia Migration
 */
require_once 'admin/migrator.php';

/*
 * EOF
 */