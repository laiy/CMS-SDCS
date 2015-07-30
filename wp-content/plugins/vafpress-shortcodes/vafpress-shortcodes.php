<?php
/*
Plugin Name: Vafpress Shortcodes
Plugin URI: http://vafpress.com/plugins/vafpress-shortcodes
Description: Universal and Simple Shortcodes Generator with Cross Themes Capability
Version: 0.2
Author: Vafpress
Author URI: http://vafpress.com
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

// Constant
define('VP_SC_DIR', plugin_dir_path(__FILE__));
define('VP_SC_URL', plugin_dir_url(__FILE__));
define('VP_SC_SCHEME_URL', VP_SC_DIR . 'inc/scheme.php');

// Include all required files
require_once(VP_SC_DIR . 'inc/color.php');
require_once(VP_SC_DIR . 'inc/utility.php');
require_once(VP_SC_DIR . 'inc/sources.php');
require_once(VP_SC_DIR . 'inc/shortcodes.php');

/**
 * TGMPA
 */
require_once(VP_SC_DIR . 'inc/tgm-plugin-activation/class-tgm-plugin-activation.php');

function vp_sc_tgmpa() {

	$plugins = array(
		array(
			'name'     => 'Vafpress Framework Plugin',
			'slug'     => 'vafpress-framework-plugin',
			'source'   => 'https://github.com/vafour/vafpress-framework-plugin/releases/download/1.0-RC1/vafpress-framework-plugin.zip',
			'required' => true,
		),
	);

	$config = array(
		'domain'		   => 'vp_sc_td',
		'parent_menu_slug' => 'plugins.php',
		'parent_url_slug'  => 'plugins.php',
		'strings'		   => array(
			'menu_title'   => __('Required Plugins', 'vp_sc_td'),
		)
	);

	tgmpa($plugins, $config);
}

// Strip Shortcode
function vp_sc_strip_shortcode($code, $content)
{
	global $shortcode_tags;

	$backup         = $shortcode_tags;
	$shortcode_tags = array($code => 1);
	$content        = strip_shortcodes($content);
	$shortcode_tags = $backup;

	return $content;
}


/**
 * Plugin Class
 */
class VP_Shortcodes {

	/**
	 * Plugin Version
	 * @var string
	 */
	protected $version = '0.2';

	/**
	 * Instance of this class
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Object of VP_ShortcodeGenerator
	 * @var VP_ShortcodeGenerator
	 */
	protected static $sc = null;

	/**
	 * Initialize the plugin
	 */
	private function __construct() {

		// Load plugin text domain
		add_action('init', array($this, 'load_plugin_textdomain'));

		// Load public-facing style sheet and JavaScript.
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

		// Format Shortcodes in the post
		add_filter('the_content', array($this, 'format_shortcodes'));

		// Initialize The Shortcode Generator
		$default_config = array(
			'name'           => 'vafpress_shortcodes',
			'template'       => VP_SC_SCHEME_URL,
			'modal_title'    => __('Vafpress Shortcodes', 'vp_sc_td'),
			'button_title'   => __('Vafpress Shortcodes', 'vp_sc_td'),
			'main_image'     => VP_SC_URL . '/img/main_image.png',
			'sprite_image'   => VP_SC_URL . '/img/sprite_image.png',
		);
		$user_config = array(
			'types'          => array('*'),
			'included_pages' => array(),
		);
		$config = array_merge($default_config, apply_filters('vp_sc_user_config', $user_config));
		self::$sc = new VP_ShortcodeGenerator($config);
	}

	/**
	 * Return an instance of this class
	 * @return object A single instance of this class
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function load_plugin_textdomain() {

		$domain = 'vp_sc_td';
		$locale = apply_filters('plugin_locale', get_locale(), $domain);

		load_textdomain($domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo');
		load_plugin_textdomain($domain, FALSE, VP_SC_DIR . '/lang/');
	}

	/**
	 * Enqueue CSS files
	 */
	public function enqueue_styles() {
		wp_register_style('font-awesome', VP_PUBLIC_URL . '/css/vendor/font-awesome.min.css');
		wp_register_style('font-awesome-ie7', VP_PUBLIC_URL . '/css/vendor/font-awesome-ie7.min.css');
		wp_register_style('vp-sc-default-style', VP_SC_URL . 'css/shortcodes.css', array('font-awesome', 'font-awesome-ie7'), $this->version);
		wp_register_style('vp-sc-default-style-responsive', VP_SC_URL . 'css/shortcodes-responsive.css', array(), $this->version);
		wp_enqueue_style('vp-sc-default-style');
		wp_enqueue_style('vp-sc-default-style-responsive');

		do_action('vp_sc_after_enqueue_styles');
	}

	/**
	 * Enqueue JS files
	 */
	public function enqueue_scripts() {
		wp_register_script('jquery-inview', VP_SC_URL . 'js/jquery.inview.min.js', array('jquery'));
		wp_register_script('jquery-knob', VP_SC_URL . 'js/jquery.knob.js', array('jquery'));
		wp_register_script('google-maps', 'https://maps.googleapis.com/maps/api/js?sensor=true');
		wp_register_script('vp-sc-default-script', VP_SC_URL . 'js/shortcodes.js', array('jquery-inview'), $this->version);
		wp_enqueue_script('vp-sc-default-script');

		do_action('vp_sc_after_enqueue_scripts');
	}

	/**
	 * Format Shortcodes
	 */
	public static function format_shortcodes($content) {

		// inline shortcodes
		$inline = array(
			'dropcap',
			'font_awesome',
			'shout',
			'meta',
			'highlight',
			'button',
			'span',
			'span_2',
			'span_3',
			'span_4',
			'span_5',
		);

		$tags = self::$sc->get_shortcode_tags();
		for ($i = 2; $i <= 5; $i++) {
			$tags[] = "row_$i";
			$tags[] = "column_$i";
			$tags[] = "div_$i";
			$tags[] = "span_$i";
		}
		$tags = array_diff($tags, $inline);

		// block shortcodes
		$tags = join('|', $tags);
		// opening tag
		$content = preg_replace("/(<p>)?\[($tags)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content);
		// closing tag
		$content = preg_replace("/(<p>)?\[\/($tags)](<\/p>|<br \/>)?/", "[/$2]", $content);

		return $content;
	}
}

function vp_sc_instance() {

	if (class_exists('VP_ShortcodeGenerator')) {
		// Vafpress Framework is already loaded
		VP_Shortcodes::get_instance();
	} else {
		// Vafpress Framework not found, requires Vafpress Framework Plugin version
		add_action('tgmpa_register', 'vp_sc_tgmpa');
	}
}
add_action('after_setup_theme', 'vp_sc_instance');