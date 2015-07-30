<?php
/**
 * Plugin Name: Vafpress Animation
 * Plugin URI: http://vafpress.com
 * Description: Animation Shortcode Plugin to animate every element.
 * Author: Vafpress
 * Author URI: http://vafpress.com
 * Version: 0.2
 * Text Domain: vp_animation
 * Domain Path: lang
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

defined( 'VP_AN_VERSION' ) or define( 'VP_AN_VERSION', '0.2' );
defined( 'VP_AN_URL' )     or define( 'VP_AN_URL'    , plugin_dir_url( __FILE__ ) );
defined( 'VP_AN_DIR' )     or define( 'VP_AN_DIR'    , plugin_dir_path( __FILE__ ) );
defined( 'VP_AN_FILE' )    or define( 'VP_AN_FILE'   , __FILE__ );

require_once 'includes/helpers.php';
require_once 'includes/shortcodes.php';
require_once 'libs/class-tgm-plugin-activation.php';
require_once 'libs/mobiledetect.php';
require_once 'includes/tgm-init.php';

if ( ! class_exists( 'VP_Animation' ) ) :

class VP_Animation
{

	public function __construct()
	{
		// init options
		add_action( 'after_setup_theme', array( $this, 'init_options' ) );

		// enable only in non mobile device
		if( ! Mobile_Detect::is_mobile_or_tablet() )
			add_filter( 'the_posts', array( $this, 'enqueue_dependencies' ), 9 );

		// format shortcodes
		add_filter( 'the_content', array( $this, 'format_shortcodes' ) );
	}

	public function init_options()
	{
		if( class_exists( 'VP_Option' ) )
			require VP_AN_DIR . '/includes/admin/admin.php';
	}

	public function enqueue_dependencies($posts) {

		if ( !is_main_query() || empty($posts) || is_admin() ) {
			return $posts;
		}

		$found = false;
		foreach ($posts as $post)
		{
			if ( stripos($post->post_content, '[animation') !== false )
			{
				$found = true;
			}
			$found = apply_filters('vp_an_is_shortcode_used', $post, $found);
			if( $found ) break;
		}

		if ($found){
			$this->register_dependencies();
			wp_enqueue_style ( 'vp-animation-css' );
			wp_enqueue_script( 'vp-animation-js' );
			wp_enqueue_script( 'modernizr.css-animations' );
		}
		return $posts;
	}

	public function register_dependencies()
	{
		wp_register_script('jquery-inview', VP_AN_URL . 'public/js/jquery.inview.min.js', array('jquery'));
		wp_register_script('imagesloaded', VP_AN_URL . 'public/js/imagesloaded.pkgd.min.js', array('jquery'));
		wp_register_script('modernizr.css-animations', VP_AN_URL . 'public/js/modernizr.css-animations.js', array());
		wp_register_style('vp-animation-css', VP_AN_URL . 'public/css/animation.css');
		wp_register_script('vp-animation-js', VP_AN_URL . 'public/js/script.js', array('jquery-inview', 'imagesloaded'));
	}

	public static function format_shortcodes($content)
	{
		// block shortcodes
		$tags    = 'animation';
		// opening tag
		$content = preg_replace("/(<p>)?\[($tags)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content);
		// closing tag
		$content = preg_replace("/(<p>)?\[\/($tags)](<\/p>|<br \/>)?/", "[/$2]", $content);

		return $content;
	}

}

endif;

$anim = new VP_Animation();