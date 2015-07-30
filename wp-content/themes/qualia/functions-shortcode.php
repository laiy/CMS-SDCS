<?php

if( class_exists( 'VP_Shortcodes' ) ):

	/**
	 * Dequeue Shortcodes Styles
	 */
	function qualia_vp_sc_after_enqueue_styles() {
		wp_dequeue_style('vp-sc-default-style');
		wp_dequeue_style('vp-sc-default-style-responsive');
	}
	add_action('vp_sc_after_enqueue_styles', 'qualia_vp_sc_after_enqueue_styles');

	/**
	 * ================================================================
	 * FILTERS: CODE
	 * ================================================================
	 */

	// Format Shortcodes
	add_filter('meta_content', array('VP_Shortcodes', 'format_shortcodes'));

	// Modifying [divider] base code
	function qualia_vp_sc_code_divider($code) {
		return str_replace('[divider]', '[divider][/divider]', $code);
	}
	add_filter('vp_sc_code_divider', 'qualia_vp_sc_code_divider');

	// Modifying [google_maps] base code
	function qualia_vp_sc_code_google_maps($code) {
		return str_replace('[google_maps]', '[google_maps]</p><p>Your content here</p><p>[/google_maps]', $code);
	}
	add_filter('vp_sc_code_google_maps', 'qualia_vp_sc_code_google_maps');

	// Modifying [pricing_column] base code
	function qualia_vp_sc_code_pricing_column($code) {
		return '[pricing_column]</p><p></p><p>[/pricing_column]';
	}
	add_filter('vp_sc_code_pricing_column', 'qualia_vp_sc_code_pricing_column');

	/**
	 * ================================================================
	 * FILTERS: ATTRIBUTES
	 * ================================================================
	 */

	// Modifying [section] attributes
	function qualia_vp_sc_attributes_section($attributes) {
		// remove original section attributes
		unset($attributes['background_color']);
		unset($attributes['background_color_custom']);
		unset($attributes['color']);
		unset($attributes['color_custom']);
		
		$attributes = array_merge($attributes, array(
			'color_set' => array(
				'name'    => 'color_set',
				'type'    => 'select',
				'label'   => __('Color Set', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'qualia_source_color_palette',
						),
					),
				),
				'default' => '1',
			),
			'wrapper' => array(
				'name'    => 'wrapper',
				'type'    => 'toggle',
				'label'   => __('Wrapper', 'qualia_td'),
				'default' => 1,
			),
			'separator' => array(
				'name'    => 'separator',
				'type'    => 'radiobutton',
				'label'   => __('Separator', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_source_section_separator_style'
						),
					),
				),
				'default' => array(
					'none',
				),
			),
		));
		return $attributes;
	}
	add_filter('vp_sc_attributes_section', 'qualia_vp_sc_attributes_section');

	// Modifying [divider] attributes
	function qualia_vp_sc_attributes_divider($attributes) {
		$attributes = array_merge($attributes, array(
			'text_align' => array(
				'name'    => 'text_align',
				'type'    => 'radiobutton',
				'label'   => __('Text Align', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vp_sc_source_divider_align',
						),
					),
				),
				'default' => array(
					'left',
				),
			),
		));
		return $attributes;
	}
	add_filter('vp_sc_attributes_divider', 'qualia_vp_sc_attributes_divider');

	// Modifying [box] attributes
	function qualia_vp_sc_attributes_box($attributes) {
		// remove original box attributes
		unset($attributes['background_color']);
		unset($attributes['color']);
		unset($attributes['color_custom']);
		
		$attributes = array_merge(array(
			'color_set' => array(
				'name'    => 'color_set',
				'type'    => 'select',
				'label'   => __('Color Set', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'qualia_source_color_palette',
						),
					),
				),
			),
			'background_image' => array(
				'name'    => 'background_image',
				'type'    => 'upload',
				'label'   => __('Background Image', 'qualia_td'),
			),
			'background_position' => array(
				'name'    => 'background_position',
				'type'    => 'select',
				'label'   => __('Background Position', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'vp_sc_source_background_position',
						),
					),
				),
			),
			'background_attachment' => array(
				'name'    => 'background_attachment',
				'type'    => 'select',
				'label'   => __('Background Attachment', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'vp_sc_source_background_attachment',
						),
					),
				),
			),
			'background_repeat' => array(
				'name'    => 'background_repeat',
				'type'    => 'select',
				'label'   => __('Background Repeat', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'vp_sc_source_background_repeat',
						),
					),
				),
			),
			'background_size' => array(
				'name'    => 'background_size',
				'type'    => 'select',
				'label'   => __('Background Size', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'vp_sc_source_background_size',
						),
					),
				),
			),
		), $attributes);
		return $attributes;
	}
	add_filter('vp_sc_attributes_box', 'qualia_vp_sc_attributes_box');

	// Modifying [blog] attributes
	function qualia_vp_sc_attributes_blog($attributes) {
		$attributes = array_merge($attributes, array(
			'word_limit' => array(
				'name'    => 'word_limit',
				'type'    => 'textbox',
				'label'   => __('Word Limit', 'qualia_td'),
				'default' => 40,
			),
			'ignore_sticky' => array(
				'name'    => 'ignore_sticky',
				'type'    => 'toggle',
				'label'   => __('Ignore Sticky', 'qualia_td'),
				'default' => 0,
			),
			'category' => array(
				'name'    => 'category',
				'type'    => 'multiselect',
				'label'   => __('IN Category', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vp_get_categories',
						),
					),
				),
			),
		)); 
		return $attributes;
	}
	add_filter('vp_sc_attributes_blog', 'qualia_vp_sc_attributes_blog');

	// Modifying [point_block] attributes
	function qualia_vp_sc_attributes_point_block($attributes) {
		// remove original box attributes
		unset($attributes['icon_color']);
		unset($attributes['icon_color_custom']);
		return $attributes;
	}
	add_filter('vp_sc_attributes_point_block', 'qualia_vp_sc_attributes_point_block');

	// Modifying [tab] attributes
	function qualia_vp_sc_attributes_tab($attributes) {
		$attributes = array_merge($attributes, array(
			'icon' => array(
				'name'    => 'icon',
				'type'    => 'fontawesome',
				'label'   => __('Icon', 'qualia_td'),
			),
		)); 
		return $attributes;
	}
	add_filter('vp_sc_attributes_tab', 'qualia_vp_sc_attributes_tab');

	// Modifying [counter] attributes
	function qualia_vp_sc_attributes_counter($attributes) {
		$attributes = array_merge($attributes, array(
			'prefix' => array(
				'name'    => 'prefix',
				'type'    => 'textbox',
				'label'   => __('Prefix', 'qualia_td'),
			),
			'suffix' => array(
				'name'    => 'suffix',
				'type'    => 'textbox',
				'label'   => __('Suffix', 'qualia_td'),
			),
		)); 
		return $attributes;
	}
	add_filter('vp_sc_attributes_counter', 'qualia_vp_sc_attributes_counter');

	// Modifying [pricing_column] attributes
	function qualia_vp_sc_attributes_pricing_column($attributes) {
		$attributes = array_merge($attributes, array(
			'background_color' => array(
				'name'    => 'background_color',
				'type'    => 'radioimage',
				'label'   => __('Background Color', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_vp_sc_source_pricing_column_background_color',
						),
					),
				),
				'default' => array(
					'transparent',
				),
			),
			'background_color_custom' => array(
				'name'    => 'background_color',
				'type'    => 'color',
				'label'   => __(' ', 'qualia_td'),
				'format'  => 'rgba',
			),
			'color' => array(
				'name'    => 'color',
				'type'    => 'radioimage',
				'label'   => __('Text Color', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_vp_sc_source_pricing_column_color',
						),
					),
				),
				'default' => array(
					'inherit',
				),
			),
			'color_custom' => array(
				'name'    => 'color',
				'type'    => 'color',
				'label'   => __(' ', 'qualia_td'),
				'format'  => 'rgba',
			),
			'featured_background_color' => array(
				'name'    => 'featured_background_color',
				'type'    => 'radioimage',
				'label'   => __('Featured Background Color', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_vp_sc_source_pricing_column_featured_background_color',
						),
					),
				),
				'default' => array(
					'warning',
				),
			),
			'featured_background_color_custom' => array(
				'name'    => 'featured_background_color',
				'type'    => 'color',
				'label'   => __(' ', 'qualia_td'),
				'format'  => 'rgba',
			),
			'featured_color' => array(
				'name'    => 'featured_color',
				'type'    => 'radioimage',
				'label'   => __('Featured Text Color', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_vp_sc_source_pricing_column_featured_color',
						),
					),
				),
				'default' => array(
					'black',
				),
			),
			'featured_color_custom' => array(
				'name'    => 'featured_color',
				'type'    => 'color',
				'label'   => __(' ', 'qualia_td'),
				'format'  => 'rgba',
			),
		));
		return $attributes;
	}
	add_filter('vp_sc_attributes_pricing_column', 'qualia_vp_sc_attributes_pricing_column');

	// Modifying [button] attributes
	function qualia_vp_sc_attributes_button($attributes) {
		$attributes = array_merge($attributes, array(
			'target' => array(
				'name'    => 'target',
				'type'    => 'select',
				'label'   => __('Target', 'qualia_td'),
				'items'   => array(
					array('value' => '', 'label' => __('Self', 'qualia_td')),
					array('value' => '_blank', 'label' => __('New Tab', 'qualia_td')),
					array('value' => '_top', 'label' => __('Top', 'qualia_td')),
				),
			),
		)); 
		return $attributes;
	}
	add_filter('vp_sc_attributes_button', 'qualia_vp_sc_attributes_button');

	// Modifying [font_awesome] attributes
	function qualia_vp_sc_attributes_font_awesome($attributes) {

		$attributes = array_merge($attributes, array(
			'fill' => array(
				'name'    => 'fill',
				'type'    => 'radiobutton',
				'label'   => __('Fill', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_vp_sc_source_font_awesome_fill',
						),
					),
				),
				'default' => array(
					'none',
				),
			),
			'fill_color' => array(
				'name'    => 'fill_color',
				'type'    => 'radioimage',
				'label'   => __('Fill Color', 'qualia_td'),
				'items'   => array(
					'data' => array(
						array(
							'source' => 'function',
							'value' => 'qualia_vp_sc_source_font_awesome_fill_color',
						),
					),
				),
				'default' => array(
					'transparent',
				),
			),
			'fill_color_custom' => array(
				'name'    => 'fill_color',
				'type'    => 'color',
				'label'   => __(' ', 'qualia_td'),
				'format'  => 'rgba',
			),
		)); 
		return $attributes;
	}
	add_filter('vp_sc_attributes_font_awesome', 'qualia_vp_sc_attributes_font_awesome');

	/**
	 * ================================================================
	 * FILTERS: OPTIONS
	 * ================================================================
	 */

	// Divider Mode
	function qualia_vp_sc_source_divider_mode($ret) {
		$ret[] = array('label' => __('double', 'qualia_td'), 'value' => 'double');
		$ret[] = array('label' => __('dashed', 'qualia_td'), 'value' => 'dashed');
		$ret[] = array('label' => __('double dashed', 'qualia_td'), 'value' => 'double-dashed');
		$ret[] = array('label' => __('dotted', 'qualia_td'), 'value' => 'dotted');
		$ret[] = array('label' => __('double dotted', 'qualia_td'), 'value' => 'double-dotted');
		$ret[] = array('label' => __('bold', 'qualia_td'), 'value' => 'bold');
		return $ret;
	}
	add_filter('vp_sc_source_divider_mode', 'qualia_vp_sc_source_divider_mode');

	// Point Block Mode
	function qualia_vp_sc_source_point_block_mode($ret) {
		$ret[] = array('label' => __('centered', 'qualia_td'), 'value' => 'centered');
		$ret[] = array('label' => __('centered circled', 'qualia_td'), 'value' => 'centered-circled');
		return $ret;
	}
	add_filter('vp_sc_source_point_block_mode', 'qualia_vp_sc_source_point_block_mode');

	// Accordion
	function qualia_vp_sc_source_accordion_mode($ret) {
		$ret[] = array('label' => __('outline', 'qualia_td'), 'value' => 'outline');
		return $ret;
	}
	add_filter('vp_sc_source_accordion_mode', 'qualia_vp_sc_source_accordion_mode');

	// Blog Mode
	add_filter('vp_sc_source_blog_mode', 'qualia_source_blog_mode');
	add_filter('vp_sc_source_blog_pagination', 'qualia_source_blog_pagination');

	// Google Maps Mode
	function qualia_vp_sc_source_google_maps_mode($ret) {
		$ret[] = array('label' => __('full section', 'qualia_td'), 'value' => 'full-section');
		return $ret;
	}
	add_filter('vp_sc_source_google_maps_mode', 'qualia_vp_sc_source_google_maps_mode');

	// Pricing Column
	function qualia_vp_sc_source_pricing_column_background_color() {
		$ret = vp_sc_source_standard_background_color();
		return apply_filters('qualia_vp_sc_source_pricing_column_background_color', $ret);
	}

	function qualia_vp_sc_source_pricing_column_color() {
		$ret = vp_sc_source_standard_foreground_color();
		return apply_filters('qualia_vp_sc_source_pricing_column_color', $ret);
	}

	function qualia_vp_sc_source_pricing_column_featured_background_color() {
		$ret = vp_sc_source_standard_background_color();
		return apply_filters('qualia_vp_sc_source_pricing_column_featured_background_color', $ret);
	}

	function qualia_vp_sc_source_pricing_column_featured_color() {
		$ret = vp_sc_source_standard_foreground_color();
		return apply_filters('qualia_vp_sc_source_pricing_column_featured_color', $ret);
	}

	// Button Mode
	function qualia_vp_sc_source_button_mode($ret) {
		$ret[] = array('label' => __('outline', 'qualia_td'), 'value' => 'outline');
		return $ret;
	}
	add_filter('vp_sc_source_button_mode', 'qualia_vp_sc_source_button_mode');

	// Icon List Mode
	function qualia_vp_sc_source_icon_list_mode($ret) {
		$ret[] = array('label' => __('separated', 'qualia_td'), 'value' => 'separated');
		$ret[] = array('label' => __('separated with border', 'qualia_td'), 'value' => 'separated with border');
		return $ret;
	}
	add_filter('vp_sc_source_icon_list_mode', 'qualia_vp_sc_source_icon_list_mode');

	// Stylish Table Mode
	function qualia_vp_sc_source_table_mode($ret) {
		$ret[] = array('label' => __('row-with-border', 'qualia_td'), 'value' => 'row-with-border');
		return $ret;
	}
	add_filter('vp_sc_source_table_mode', 'qualia_vp_sc_source_table_mode');

	// Stylish Tabs
	function qualia_vp_sc_source_tabs_mode($ret) {
		$ret[] = array('label' => __('outline', 'qualia_td'), 'value' => 'outline');
		return $ret;
	}
	add_filter('vp_sc_source_tabs_mode', 'qualia_vp_sc_source_tabs_mode');

	// Font Awesome Fill
	function qualia_vp_sc_source_font_awesome_fill($ret) {
		return array(
			array('label' => __('none', 'qualia_td'), 'value' => 'none'),
			array('label' => __('block-circle', 'qualia_td'), 'value' => 'block-circle'),
			array('label' => __('blank-circle', 'qualia_td'), 'value' => 'blank-circle'),
			array('label' => __('block-rounded', 'qualia_td'), 'value' => 'block-rounded'),
			array('label' => __('blank-rounded', 'qualia_td'), 'value' => 'blank-rounded'),
		);
	}
	add_filter('vp_sc_source_font_awesome_fill', 'qualia_vp_sc_source_font_awesome_fill');

	// Font Awesome Fill
	function qualia_vp_sc_source_font_awesome_fill_color() {
		$ret = vp_sc_source_standard_background_color();
		return apply_filters('qualia_vp_sc_source_font_awesome_fill_color', $ret);
	}

	/**
	 * ================================================================
	 * FILTERS: RENDER
	 * ================================================================
	 */

	// Row
	function qualia_vp_sc_render_section($atts, $content = null) {
		extract(shortcode_atts(array(
			'background_color'      => 'transparent',
			'color'                 => 'inherit',
			'class'                 => '',
			'background_image'      => '',
			'background_position'   => '',
			'background_attachment' => '',
			'background_repeat'     => '',
			'background_size'       => '',
			'id'                    => '',
			'color_set'             => '',
			'wrapper'               => '1',
			'separator'             => '',
		), $atts));

		$background_color_class = vp_sc_grant_class($background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_section_background_color(), 'value'));
		$color_class            = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_section_color(), 'value'));
		$style = vp_sc_build_inline_style(array(
			((empty($background_color_class)) ? "background-color: " . Qualia_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
			((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
			((!empty($background_image)) ? "background-image: url($background_image);" : ""),
			((!empty($background_position)) ? "background-position: $background_position;" : ""),
			((!empty($background_attachment)) ? "background-attachment: $background_attachment;" : ""),
			((!empty($background_repeat)) ? "background-repeat: $background_repeat;" : ""),
			((!empty($background_size)) ? "background-size: $background_size;" : ""),
		));

		// Begin Render
		ob_start(); ?>
		<section<?php echo (!empty($id)) ? " id=\"$id\"" : " "; ?> <?php echo vp_sc_build_class(array("section", "content", "color-palette-" . $color_set, "separator-" . $separator, $class)); echo $style; ?>>
			<div class="section-inner">

				<?php if ($wrapper === 'true') : ?>
				<div class="wrapper">
					<?php echo do_shortcode( $content ); ?>
				</div>
				<?php else : ?>
				<?php echo do_shortcode( $content ); ?>
				<?php endif; ?>

			</div>
		</section>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('section');
	add_shortcode('section', 'qualia_vp_sc_render_section');

	// Row
	function qualia_vp_sc_render_row($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'class' => '',
		), $atts));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array('grids', $class)); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('row');
	add_shortcode('row', 'qualia_vp_sc_render_row');
	for ($i = 2; $i <= 5; $i++) {
		remove_shortcode("row_$i");
		add_shortcode("row_$i", 'qualia_vp_sc_render_row');
	}

	// Column
	function qualia_vp_sc_render_column($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'grid'   => 12,
			'offset' => 0,
			'class'  => '',
		), $atts));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("grid-$grid", "offset-$offset", $class)); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('column');
	add_shortcode('column', 'qualia_vp_sc_render_column');
	for ($i = 2; $i <= 5; $i++) {
		remove_shortcode("column_$i");
		add_shortcode("column_$i", 'qualia_vp_sc_render_column');
	}

	// Box
	function qualia_vp_sc_render_box($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'                  => 'default',
			'class'                 => '',
			// additional
			'background_color'      => '',
			// deleted 'color'
			'color_set'             => '1',
			'background_image'      => '',
			'background_position'   => '',
			'background_attachment' => '',
			'background_repeat'     => '',
			'background_size'       => '',
		), $atts));

		$style = qualia_build_inline_style(array(
			((!empty($background_color)) ? "background-color: $background_color;" : ""),
			((!empty($background_image)) ? "background-image: url('$background_image');" : ""),
			((!empty($background_position)) ? "background-position: $background_position;" : ""),
			((!empty($background_attachment)) ? "background-attachment: $background_attachment;" : ""),
			((!empty($background_repeat)) ? "background-repeat: $background_repeat;" : ""),
			((!empty($background_size)) ? "background-size: $background_size;" : ""),
		));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-box", "vp-mode-$mode", "color-palette-$color_set", $class)); echo $style; ?>>
			<?php echo do_shortcode($content); ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('box');
	add_shortcode('box', 'qualia_vp_sc_render_box');

	function qualia_vp_sc_render_divider($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'       => 'default',
			'align'      => 'left',
			'width'      => '100%',
			'class'      => '',
			// additional
			'text_align' => 'left',
		), $atts));

		$left_line_class = '';
		$right_line_class = '';
		switch ($text_align) {
			case 'center':
				$left_line_class = 'half-width';
				$right_line_class = 'half-width';
				break;

			case 'right':
				$left_line_class = 'full-width';
				$right_line_class = 'hidden';
				break;
			
			case 'left': default:
				$left_line_class = 'hidden';
				$right_line_class = 'full-width';
				break;
		}

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-divider", "vp-clear", "vp-mode-$mode", $class)); ?>>
			<div<?php echo qualia_build_class(array("vp-divider-inner", "vp-$align", "align-{$text_align}")); ?> style="width: <?php echo $width; ?>">
				<div class="<?php echo $left_line_class; ?>"><hr/></div>
				<div><?php echo do_shortcode($content); ?></div>
				<div class="<?php echo $right_line_class; ?>"><hr/></div>
			</div>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('divider');
	add_shortcode('divider', 'qualia_vp_sc_render_divider');

	// Spacer
	function qualia_vp_sc_render_spacer($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'  => 'default',
			'size'  => 0,
			'class' => '',
		), $atts));

		$size = qualia_grant_default_unit($size, 'px');
		if (strpos($size, 'rem') !== false) $size = qualia_rempx($size, false);

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-spacer", "vp-mode-$mode", $class)); ?> style="padding-top: <?php echo $size; ?>;"></div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('spacer');
	add_shortcode('spacer', 'qualia_vp_sc_render_spacer');

	// Sidebar
	function qualia_vp_sc_render_sidebar($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'  => 'default',
			'name'  => '',
			'class' => '',
		), $atts));

		if (!current_theme_supports('widgets')) {
			add_theme_support('widgets');
		}

		// mimic page-sidebar render style
		global $wp_registered_sidebars;

		if( array_key_exists($name, $wp_registered_sidebars) )
		{
			$wp_registered_sidebars[$name]['before_widget'] = $wp_registered_sidebars['page-sidebar']['before_widget'];
			$wp_registered_sidebars[$name]['after_widget'] = $wp_registered_sidebars['page-sidebar']['after_widget'];
			$wp_registered_sidebars[$name]['before_title'] = $wp_registered_sidebars['page-sidebar']['before_title'];
			$wp_registered_sidebars[$name]['after_title'] = $wp_registered_sidebars['page-sidebar']['after_title'];

			// Begin Render
			ob_start(); ?>
			<aside<?php echo qualia_build_class(array("vp-sidebar", "vp-mode-$mode", $class)); ?>>
				<?php dynamic_sidebar($name); ?>
			</aside>
			<?php return ob_get_clean();
			// End Render
		}
		return;
	}
	remove_shortcode('sidebar');
	add_shortcode('sidebar', 'qualia_vp_sc_render_sidebar');

	// Pricing Table
	function qualia_vp_sc_render_pricing_table($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'  => 'default',
			'class' => '',
		), $atts));

		// Find Columns
		global $shortcode_tags;

		$temp = $shortcode_tags;
		$shortcode_tags = array('pricing_column' => '');
		preg_match_all('/'. get_shortcode_regex() .'/s', $content, $matches);
		$shortcode_tags = $temp;
		$count = count($matches[0]);

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-pricing-table", "vp-mode-$mode", "columns-of-$count", "clear-float", $class)); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('pricing_table');
	add_shortcode('pricing_table', 'qualia_vp_sc_render_pricing_table');

	function qualia_vp_sc_render_tabs($atts, $content = null) {
		extract(shortcode_atts(array(
			'mode'         => 'default',
			'nav_position' => 'top',
			'default_tab'  => 0,
			'class'        => '',
		), $atts));

		// Find Tabs
		global $shortcode_tags;

		$temp = $shortcode_tags;
		$shortcode_tags = array('tab' => '');
		preg_match_all('/'. get_shortcode_regex() .'/s', $content, $matches);
		$nav = array();
		foreach ($matches[3] as $atts) {
			$nav[] = shortcode_parse_atts($atts);
		}
		$shortcode_tags = $temp;

		// Validate Default Tab
		if (($default_tab > count($matches[2]) - 1) or ($default_tab < 0)) $default_tab = 0;

		// Begin Render
		ob_start(); ?>
		<div<?php echo vp_sc_build_class(array("vp-tabs", "vp-js-tabs", "vp-tabs-nav-position-{$nav_position}", "vp-mode-$mode", "vp-clear", $class)); ?>
				data-defaultindex="<?php echo $default_tab; ?>">
			<ul class="vp-tabs-nav vp-clear">
				<?php foreach ($nav as $i => $n) : ?>
				<li class="vp-tabs-nav-item">
					<a href="#" data-index="<?php echo $i + 1; ?>">
						<?php if (!empty($n['icon'])) : ?>
						<i class="fa <?php echo $n['icon']; ?> fa-lg"></i>
						<?php endif; ?>
						<?php echo trim($n['heading']); ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="vp-tabs-panels">
				<?php echo do_shortcode($content); ?>
			</div>
		</div>
		<?php $html = ob_get_clean();
		// End Render

		return apply_filters('vp_sc_render_tabs', $html, $atts, $content);
	}
	remove_shortcode('tabs');
	add_shortcode('tabs', 'qualia_vp_sc_render_tabs');


	// Pricing Table
	function qualia_vp_sc_render_pricing_column($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'name'                      => '',
			'currency'                  => '',
			'nominal'                   => '',
			'period'                    => '',
			'action_button'             => '',
			'action_url'                => '',
			'action_text'               => '',
			'accent_background_color'   => 'accent',
			'accent_color'              => 'strong',
			'featured'                  => 'false',
			'featured_text'             => '',
			'class'                     => '',
			// additional
			'background_color'          => 'background',
			'color'                     => 'inherit',
			'featured_background_color' => 'transparent',
			'featured_color'            => 'warning',
		), $atts));

		$featured_class = ($featured === 'true' && !empty($featured_text)) ? 'vp-featured' : '';

		$background_color_class = qualia_grant_class($background_color, 'vp-background-%', qualia_deep_values(qualia_vp_sc_source_pricing_column_background_color(), 'value'));
		$color_class = qualia_grant_class($color, 'vp-color-%', qualia_deep_values(qualia_vp_sc_source_pricing_column_color(), 'value'));
		$style = qualia_build_inline_style(array(
			((empty($background_color_class)) ? "background-color: " . Qualia_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
			((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		));

		$accent_background_color_class = qualia_grant_class($accent_background_color, 'vp-background-%', qualia_deep_values(vp_sc_source_pricing_column_accent_background_color(), 'value'));
		$accent_color_class = qualia_grant_class($accent_color, 'vp-color-%', qualia_deep_values(vp_sc_source_pricing_column_accent_color(), 'value'));
		$accent_style = qualia_build_inline_style(array(
			((empty($accent_background_color_class)) ? "background-color: " . Qualia_Color::parse($accent_background_color, 'rgb') . "; background-color: $accent_background_color;" : ""),
			((empty($accent_color_class)) ? "color: " . Qualia_Color::parse($accent_color, 'rgb') . "; color: $accent_color;" : ""),
		));

		$featured_background_color_class = qualia_grant_class($featured_background_color, 'vp-background-%', qualia_deep_values(qualia_vp_sc_source_pricing_column_featured_background_color(), 'value'));
		$featured_color_class = qualia_grant_class($featured_color, 'vp-color-%', qualia_deep_values(qualia_vp_sc_source_pricing_column_featured_color(), 'value'));
		$featured_style = qualia_build_inline_style(array(
			((empty($featured_background_color_class)) ? "background-color: " . Qualia_Color::parse($featured_background_color, 'rgb') . "; background-color: $featured_background_color;" : ""),
			((empty($featured_color_class)) ? "color: " . Qualia_Color::parse($featured_color, 'rgb') . "; color: $featured_color;" : ""),
		));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-pricing-column", "col", $background_color_class, $color_class, $featured_class, $class)); echo $style; ?>>
			
			<?php if ($featured === 'true') : ?>
			<div<?php echo qualia_build_class(array("vp-pricing-column-featured", $featured_background_color_class, $featured_color_class)); echo $featured_style; ?>>
				<span><?php echo $featured_text; ?></span>
			</div>
			<?php endif; ?>

			<div<?php echo qualia_build_class(array("vp-pricing-column-name")); ?>>
				<?php echo $name; ?>
			</div>

			<div class="vp-pricing-column-price">
				<span class="vp-pricing-column-price-currency"><?php echo $currency; ?></span>
				<span class="vp-pricing-column-price-nominal"><?php echo $nominal; ?></span>
				<span class="vp-pricing-column-price-period"><?php echo $period; ?></span>
			</div>

			<div<?php echo qualia_build_class(array("vp-pricing-column-accent", $accent_background_color_class, $accent_color_class)); echo $accent_style; ?>></div>

			<?php echo str_replace('<ul', '<ul class="vp-pricing-column-details"', do_shortcode($content)); ?>

			<?php if ($action_button === 'true') : ?>
			<div class="vp-pricing-column-action">
				<?php echo vp_sc_render_button(array(
					'mode'             => 'default',
					'href'             => $action_url,
					'background_color' => 'accent',
					'color'            => 'base',
					'size'             => 'medium',
					'class'            => 'full-width align-center',
				), $action_text); ?>
			</div>
			<?php endif; ?>

		</div>
		<?php return ob_get_clean();
	}
	remove_shortcode('pricing_column');
	add_shortcode('pricing_column', 'qualia_vp_sc_render_pricing_column');

	// Google Maps
	function qualia_vp_sc_render_google_maps($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'      => 'default',
			'address'   => '',
			'latlng'    => '',
			'zoom'      => 16,
			'height'    => '200px',
			'width'     => '100%',
			'icon'      => '',
			'class'     => '',
		), $atts));

		$height = qualia_grant_default_unit($height, 'px');
		if (strpos($height, 'rem') !== false) $height = qualia_rempx($height, false);
		$width = qualia_grant_default_unit($width, 'px');
		if (strpos($width, 'rem') !== false) $width = qualia_rempx($width, false);

		wp_enqueue_script('google-maps');

		// Begin Render
		ob_start(); ?>
		<?php if ($mode === 'full-section') : ?>
		<div<?php echo qualia_build_class(array("vp-google-maps", "vp-js-google-maps", "vp-mode-$mode", $class)); ?>
				data-latlng="<?php echo $latlng; ?>" data-address="<?php echo $address; ?>"
				data-zoom="<?php echo $zoom; ?>" data-icon="<?php echo $icon; ?>">
			<div class="wrapper" style="min-height: <?php echo $height; ?>;">
				<div class="vp-map">
					<div class="vp-map-canvas"></div>
				</div>
				<?php if (!empty($content)) : ?>
				<div class="vp-map-info vp-box">
					<?php echo do_shortcode($content); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php else: ?>
		<div<?php echo qualia_build_class(array("vp-google-maps", "vp-js-google-maps", "vp-mode-$mode", $class)); ?>
				style="height: <?php echo $height; ?>; width: <?php echo $width; ?>;"
				data-latlng="<?php echo $latlng; ?>" data-address="<?php echo $address; ?>"
				data-zoom="<?php echo $zoom; ?>" data-icon="<?php echo $icon; ?>">
			<div class="vp-map">
				<div class="vp-map-canvas"></div>
			</div>
		</div>
		<?php endif; ?>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('google_maps');
	add_shortcode('google_maps', 'qualia_vp_sc_render_google_maps');

	// Point Block
	add_shortcode('point_block', 'vp_sc_render_point_block');
	function qualia_vp_sc_render_point_block($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'            => 'default',
			'icon'            => '',
			'image'           => '',
			'title'           => '',
			'class'           => '',
		), $atts));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-point-block", "vp-mode-$mode", $class)); ?>>
			<div class="vp-point-block-image">
				<?php if (!empty($image)) : ?>
				<img src="<?php echo $image; ?>" />
				<?php else : ?>
				<?php echo qualia_vp_sc_render_font_awesome(array(
					// original
					'icon'       => $icon,
					'size'       => '1x',
					'color'      => 'accent',
					'class'      => '',
				)); ?>
				<?php endif; ?>
			</div>

			<?php if (!empty($title)) : ?>
			<div class="vp-point-block-title"><h4><?php echo $title; ?></h4></div>
			<?php endif; ?>
			
			<div class="vp-point-block-content">
				<?php echo do_shortcode($content); ?>
			</div>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('point_block');
	add_shortcode('point_block', 'qualia_vp_sc_render_point_block');

	// Blog
	function qualia_vp_sc_render_blog($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'           => 'default',
			'posts_per_page' => 10,
			'pagination'     => 'page',
			'class'          => '',
			// additional
			'word_limit'     => '40',
			'ignore_sticky'  => 'false',
			'category'       => '',
		), $atts));

		global $wp_query, $more, $paged; $temp = $wp_query;
		$more     = 0;
		$wp_query = new WP_Query();
		$wp_query->query(array_merge(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => $posts_per_page,
				'paged'               => $paged,
				'ignore_sticky_posts' => ($ignore_sticky === 'false') ? 0 : 1,
			),
			(empty($category)) ? array() : array(
				'category__in'        => explode( ',', $category ),
			)
		));

		$loop_class = ''; if ($mode === 'grid') $loop_class = ' js-isotope';

		ob_start(); ?>
		<?php include( locate_template( 'loop.php' ) ); ?>
		<?php $wp_query = $temp; wp_reset_postdata(); ?>
		<?php return ob_get_clean();
	}
	remove_shortcode('blog');
	add_shortcode('blog', 'qualia_vp_sc_render_blog');

	// Progress Bar
	function qualia_vp_sc_render_progress_bar($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'        => 'default',
			'min'         => 0,
			'max'         => 100,
			'value'       => 100,
			'caption'     => '',
			'label'       => 'value',
			'featured'    => 'false',
			'animated'    => 'true',
			'width'       => '100%',
			'track_color' => 'transparent',
			'fill_color'  => 'info',
			'color'       => 'white',
			'class'       => '',
		), $atts));

		$width = qualia_grant_default_unit($width, 'px');
		if (strpos($width, 'rem') !== false) $width = qualia_rempx($width, false);
		$percent = qualia_calculate_percentage($min, $max, $value, 2);

		$label_value = '';
		switch ($label) {
			case 'percent': $label_value = $percent; break;
			case 'value': $label_value = $value; break;
		}

		$featured_class = ($featured === 'true') ? 'vp-featured' : '';

		$fill_color_class = qualia_grant_class($fill_color, 'vp-background-%', qualia_deep_values(vp_sc_source_progress_bar_fill_color(), 'value'));
		$track_color_class = qualia_grant_class($track_color, 'vp-background-%', qualia_deep_values(vp_sc_source_progress_bar_track_color(), 'value'));
		$color_class = qualia_grant_class($color, 'vp-color-%', qualia_deep_values(vp_sc_source_progress_bar_color(), 'value'));
		$track_style = qualia_build_inline_style(array(
			((empty($track_color_class)) ? "background-color: " . Qualia_Color::parse($track_color, 'rgb') . "; background-color: $track_color;" : ""),
		));
		$text_style = qualia_build_inline_style(array(
			((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		));
		$thumb_style = qualia_build_inline_style(array(
			((empty($fill_color_class)) ? "background-color: " . Qualia_Color::parse($fill_color, 'rgb') . "; background-color: $fill_color;" : ""),
			"width: $percent;",
		));

		// Begin Render
		ob_start(); ?>
		<figure<?php echo qualia_build_class(array("vp-progress-bar", "vp-js-progress-bar", $featured_class, "vp-mode-$mode", $class)); ?>
				data-value="<?php echo $value; ?>" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>"
				data-label="<?php echo $label; ?>" data-animated="<?php echo $animated; ?>" style="width: <?php echo $width; ?>">
			
			<div<?php echo qualia_build_class(array("vp-progress-bar-text", $color_class)); echo $text_style; ?>>
				<div class="vp-progress-bar-caption">
					<?php if (!empty($caption)) : ?>
					<figcaption><?php echo $caption; ?></figcaption>
					<?php endif; ?>
				</div>

				<span class="vp-progress-bar-label">
					<?php if ($label !== 'none') : ?>
					<?php echo $label_value; ?>
					<?php endif; ?>
				</span>
			</div>

			<div<?php echo qualia_build_class(array("vp-progress-bar-track", $track_color_class)); echo $track_style; ?>>
				<div<?php echo qualia_build_class(array("vp-progress-bar-thumb", $fill_color_class)); echo $thumb_style; ?>></div>
			</div>
		</figure>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('progress_bar');
	add_shortcode('progress_bar', 'qualia_vp_sc_render_progress_bar');

	function qualia_vp_sc_render_counter($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'    => 'default',
			'begin'   => 0,
			'end'     => 9999,
			'caption' => '',
			'width'   => '100%',
			'color'   => 'strong',
			'class'   => '',
			// additional
			'prefix'  => '',
			'suffix'  => '',
		), $atts));

		$width       = qualia_grant_default_unit($width, 'px');
		$color_class = qualia_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_counter_color(), 'value'));
		$color_style = qualia_build_inline_style(array(
			((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-counter", "vp-js-counter", "vp-mode-$mode", $class)); ?>
				data-begin="<?php echo $begin; ?>" data-end="<?php echo $end; ?>" style="width: <?php echo $width; ?>">
			<div<?php echo qualia_build_class(array("vp-counter-number", $color_class)); echo $color_style; ?>>
				<?php if (!empty($prefix)) : ?><span class="vp-counter-prefix"><?php echo $prefix; ?></span><?php endif; ?><span class="vp-counter-value"><?php echo $begin; ?></span><?php if (!empty($suffix)) : ?><span class="vp-counter-suffix"><?php echo $suffix; ?></span><?php endif; ?>
			</div>
			<?php if (!empty($caption)) : ?>
			<div class="vp-counter-caption">
				<?php echo $caption; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('counter');
	add_shortcode('counter', 'qualia_vp_sc_render_counter');

	// Testimonial
	function qualia_vp_sc_render_testimonial($atts, $content = null) {
		extract(shortcode_atts(array(
			'mode'    => 'default',
			'name'    => '',
			'company' => '',
			'photo'   => '',
			'class'   => '',
		), $atts));

		// Begin Render
		ob_start(); ?>
		<div<?php echo qualia_build_class(array("vp-testimonial", "vp-mode-$mode", $class)); ?>>
			
			<?php if (!empty($photo)) : ?>
			<div class="vp-testimonial-photo">
				<img src="<?php echo $photo; ?>" alt="<?php echo $name; ?>" />
			</div>
			<?php endif; ?>
			
			<div class="vp-testimonial-content">
				<?php echo do_shortcode($content); ?>
			</div>

			<?php if (!empty($name)) : ?>
			<strong class="vp-testimonial-name"><?php echo $name; ?></strong>
			<?php endif; ?>

			<?php if (!empty($company)) : ?>
			<span class="vp-testimonial-company vp-meta"><?php echo $company; ?></span>
			<?php endif; ?>
		</div>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('testimonial');
	add_shortcode('testimonial', 'qualia_vp_sc_render_testimonial');

	// Button
	function qualia_vp_sc_render_button($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'             => 'default',
			'href'             => '',
			'background_color' => 'info',
			'color'            => 'white',
			'size'             => 'small',
			'class'            => '',
			// additional
			'target'           => '',
		), $atts));

		if ($mode === 'outline') {
			$background_color_class = qualia_grant_class($background_color, 'vp-border-%', qualia_deep_values(vp_sc_source_button_background_color(), 'value'));
			$color_class = qualia_grant_class($color, 'vp-color-%', qualia_deep_values(vp_sc_source_button_color(), 'value'));
			$style = qualia_build_inline_style(array(
				((empty($background_color_class)) ? "border-color: " . Qualia_Color::parse($background_color, 'rgb') . "; border-color: $background_color;" : ""),
				((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
			));
		} else {
			$background_color_class = qualia_grant_class($background_color, 'vp-background-%', qualia_deep_values(vp_sc_source_button_background_color(), 'value'));
			$color_class = qualia_grant_class($color, 'vp-color-%', qualia_deep_values(vp_sc_source_button_color(), 'value'));
			$style = qualia_build_inline_style(array(
				((empty($background_color_class)) ? "background-color: " . Qualia_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
				((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
			));
		}

		// Begin Render
		ob_start(); ?>
		<a href="<?php echo $href; ?>"<?php echo qualia_build_class(array("vp-button", "vp-button-$size", $background_color_class, $color_class, "vp-mode-$mode", $class)); echo $style; echo (!empty($target)) ? " target=\"$target\"" : ""; ?>>
			<?php echo do_shortcode($content); ?>
		</a>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('button');
	add_shortcode('button', 'qualia_vp_sc_render_button');

	// Font Awesome
	function qualia_vp_sc_render_font_awesome($atts, $content = null) {
		extract(shortcode_atts(array(
			// original
			'mode'       => 'default',
			'icon'       => '',
			'size'       => '1x',
			'color'      => 'inherit',
			'class'      => '',
			// additional
			'fill'       => 'none',
			'fill_color' => 'transparent',
		), $atts));

		$fill_color_class = qualia_grant_class($fill_color, 'vp-color-%', qualia_deep_values(qualia_vp_sc_source_font_awesome_fill_color(), 'value'));
		$color_class = qualia_grant_class($color, 'vp-color-%', qualia_deep_values(vp_sc_source_font_awesome_color(), 'value'));
		$fill_color_style = qualia_build_inline_style(array(
			((empty($fill_color_class)) ? "color: " . Qualia_Color::parse($fill_color, 'rgb') . "; color: $fill_color;" : ""),
		));
		$color_style = qualia_build_inline_style(array(
			((empty($color_class)) ? "color: " . Qualia_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		));

		$icon_base = '';
		switch ($fill) {
			case 'block-circle': $icon_base = 'fa-circle'; break;
			case 'blank-circle': $icon_base = 'fa-circle-o'; break;
			case 'block-rounded': $icon_base = 'fa-square'; break;
			case 'blank-rounded': $icon_base = 'fa-square-o'; break;
		}

		// Begin Render
		ob_start(); ?>
		<?php if ($fill === 'none') : ?>
		<i<?php echo qualia_build_class(array("vp-font-awesome", "fa", $icon, "fa-$size", $color_class, "vp-mode-$mode", $class)); echo $color_style; ?>></i>
		<?php else : ?>
		<span<?php echo qualia_build_class(array("vp-font-awesome", "vp-font-awesome-fill-$fill", "fa-$size", "fa-stack", "vp-mode-$mode", $class)); ?>>
			<i<?php echo qualia_build_class(array("fa-stack-2x", "fa", $icon_base, $fill_color_class)); echo $fill_color_style; ?>></i>
			<i<?php echo qualia_build_class(array("fa-stack-1x", "fa", "$icon", $color_class)); echo $color_style; ?>></i>
		</span>
		<?php endif; ?>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('font_awesome');
	add_shortcode('font_awesome', 'qualia_vp_sc_render_font_awesome');

	// Meta
	function qualia_vp_sc_render_meta($atts, $content = null) {
		extract(shortcode_atts(array(
			'mode'  => 'default',
			'class' => '',
		), $atts));

		// Begin Render
		ob_start(); ?>
		<span<?php echo qualia_build_class(array("vp-meta", "vp-mode-$mode", $class)); ?>>
			<?php echo do_shortcode($content); ?>
		</span>
		<?php return ob_get_clean();
		// End Render
	}
	remove_shortcode('meta');
	add_shortcode('meta', 'qualia_vp_sc_render_meta');

endif;

/**
 * EOF
 */