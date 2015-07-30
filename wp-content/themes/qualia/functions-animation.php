<?php

/**
 * Vafpress Animation Supports
 */

if( class_exists( 'VP_Animation' ) ):

	add_filter('meta_content', array('VP_Animation','format_shortcodes'));

	// load script and styles
	function qualia_vp_an_shortcode_used($post, $found) {

		$use_pb = vp_metabox('_page_builder.use_page_builder', false, $post->ID);
		if( $use_pb )
		{
			$found    = false;
			$sections = vp_metabox('_page_builder.sections', '', $post->ID);
			$sections = VP_Util_Array::deep_values($sections, 'content');
			$sections = implode(' ', $sections);
			if ( stripos($sections, '[animation') !== false ){
				$found = true;
			}
		}
		
		return $found;
	}
	add_filter( 'vp_an_is_shortcode_used', 'qualia_vp_an_shortcode_used', 10, 2 );

endif;


/**
 * EOF
 */