<?php

// black, white, info, warning, success, error, normal
$color_standard = array('rgba(0,0,0,1)', 'rgba(255,255,255,1)', 'rgba(17,140,184,1)', 'rgba(207,157,0,1)', 'rgba(129,164,50,1)', 'rgba(188,52,9,1)', 'rgba(153,153,153,1)');

// background, base, subtle, text, strong, accent
$color_set_1    = array('rgba(249,249,249,1)', 'rgba(255,255,255,1)', 'rgba(217,217,217,1)', 'rgba(119,119,119,1)', 'rgba(68,68,68,1)', 'rgba(26,188,156,1)');
$color_set_2    = array('rgba(255,255,255,1)', 'rgba(255,255,255,1)', 'rgba(221,221,221,1)', 'rgba(119,119,119,1)', 'rgba(68,68,68,1)', 'rgba(26,188,156,1)');
$color_set_3    = array('rgba(243,243,243,1)', 'rgba(255,255,255,1)', 'rgba(204,204,204,1)', 'rgba(119,119,119,1)', 'rgba(68,68,68,1)', 'rgba(26,188,156,1)');
$color_set_4    = array('rgba(26,188,156,1)', 'rgba(6,168,136,1)', 'rgba(46,208,176,1)', 'rgba(230,255,240,1)', 'rgba(255,255,255,1)', 'rgba(50,215,237,1)');
$color_set_5    = array('rgba(37,43,52,1)', 'rgba(17,23,32,1)', 'rgba(87,93,102,1)', 'rgba(204,210,216,1)', 'rgba(255,255,255,1)', 'rgba(26,188,156,1)');
$color_set_6    = array('rgba(27,43,52,1)', 'rgba(7,13,22,1)', 'rgba(77,83,92,1)', 'rgba(204,210,216,1)', 'rgba(255,255,255,1)', 'rgba(26,188,156,1)');
$color_set_7    = array('rgba(247,245,242,1)', 'rgba(255,255,255,1)', 'rgba(0,0,0,0.1)', 'rgba(119,119,119,1)', 'rgba(68,68,68,1)', 'rgba(26,188,156,1)');
$color_set_8    = array('rgba(247,245,242,1)', 'rgba(255,255,255,1)', 'rgba(227,225,222,1)', 'rgba(139,143,147,1)', 'rgba(69,73,77,1)', 'rgba(26,188,156,1)');
$color_set_9    = array('rgba(37,43,52,1)', 'rgba(17,23,32,1)', 'rgba(87,93,102,1)', 'rgba(204,210,216,1)', 'rgba(255,255,255,1)', 'rgba(26,188,156,1)');
$color_set_10   = array('rgba(27,33,42,1)', 'rgba(7,13,22,1)', 'rgba(77,83,92,1)', 'rgba(154,160,166,1)', 'rgba(184,190,196,1)', 'rgba(26,188,156,1)');

// face, style, weight, transform, size, height, spacing
$body           = array('Lato', 'normal', 'normal', array ( 0 => 'latin', ), 'none', '14', '24', '0');
$nav            = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'uppercase', '12', '22', '0');
$button         = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'uppercase', '12', '22', '0');
$blockquote     = array('Lato', 'italic', 'normal', array ( 0 => 'latin', ), 'none', '16', '26', '0');
$h1             = array('Lato', 'normal', '900', array ( 0 => 'latin', ), 'uppercase', '36', '44', '-0.5');
$h2             = array('Lato', 'normal', 'normal', array ( 0 => 'latin', ), 'none', '25', '33', '0');
$h3             = array('Lato', 'normal', 'normal', array ( 0 => 'latin', ), 'none', '19', '29', '0');
$h4             = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'uppercase', '15', '25', '0.5');
$h5             = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'none', '17', '27', '0');
$h6             = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'none', '15', '25', '0');
$title          = array('Lato', 'normal', '900', array ( 0 => 'latin', ), 'uppercase', '24', '32', '0');
$divider        = array('Lato', 'normal', '700', array ( 0 => 'latin', ), 'uppercase', '16', '26', '0');

// Generate SocMed
function qualia_generate_socmed_fields() {
	$fields = array();

	foreach (qualia_get_social_medias() as $i => $socmed) {
		switch ($socmed['value']) {
			case 'skype':
				$validation = '';
				$socmed['label'] .= __(' (username)', 'qualia_td');
				break;
			case 'email':
				$validation = 'email';
				break;
			default:
				$validation = 'url';
				break;
		}

		$fields[] = array(
			'type' => 'textbox',
			'name' => 'socmed_' . $socmed['value'],
			'label' => $socmed['label'],
			'validation' => $validation,
		);
	}

	return $fields;
}

return array(
	'title' => __('Qualia Theme Options', 'qualia_td'),
	'logo' => QUALIA_IMAGES . '/qualia-logo.png',
	'menus' => array(
		array(
			'title' => __('Site', 'qualia_td'),
			'name' => 'menu_site',
			'icon' => 'font-awesome:fa-globe',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Site Logo', 'qualia_td'),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'logo',
							'label' => __('Logo Image', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'logo_retina',
							'label' => __('Logo Image (Retina Version)', 'qualia_td'),
							'description' => __('Please name your file following the normal version (e.g. logo.png) with a suffix @2x (e.g. logo@2x.png)', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'logo_alt',
							'label' => __('Alternative Logo Image', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'logo_alt_retina',
							'label' => __('Alternative Logo Image (Retina Version)', 'qualia_td'),
							'description' => __('Please name your file following the  (e.g. logo-alt.png) with a suffix @2x (e.g. logo-alt@2x.png)', 'qualia_td'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Site Favicon', 'qualia_td'),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'favicon',
							'description' => __('Recommended: .ICO 64x64px size', 'qualia_td'),
							'label' => __('General Site Icon', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'favicon_iphone',
							'description' => __('Recommended: .PNG 60x60px size', 'qualia_td'),
							'label' => __('Icon for iPhone', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'favicon_iphone_retina',
							'description' => __('Recommended: .PNG 120x120px size', 'qualia_td'),
							'label' => __('Icon for iPhone Retina', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'favicon_ipad',
							'description' => __('Recommended: .PNG 76x76px size', 'qualia_td'),
							'label' => __('Icon for iPad', 'qualia_td'),
						),
						array(
							'type' => 'upload',
							'name' => 'favicon_ipad_retina',
							'description' => __('Recommended: .PNG 152x152px size', 'qualia_td'),
							'label' => __('Icon for iPad Retina', 'qualia_td'),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Page Title Labels', 'qualia_td'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'author_archive_title',
							'description' => __('%s is for the author name', 'qualia_td'),
							'label' => __('Author Archive Title', 'qualia_td'),
							'default' => 'Blog Posts by %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_category_archive_title',
							'description' => __('%s is for the category name', 'qualia_td'),
							'label' => __('Post Category Archive Title', 'qualia_td'),
							'default' => '%s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_tag_archive_title',
							'description' => __('%s is for the tag name', 'qualia_td'),
							'label' => __('Post Tag Archive Title', 'qualia_td'),
							'default' => 'Blog Posts Tagged Under: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_taxonomy_archive_title',
							'description' => __('%s is for the taxonomy name', 'qualia_td'),
							'label' => __('Other Taxonomy Archive Title', 'qualia_td'),
							'default' => 'Blogger: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_year_archive_title',
							'description' => __('%s is for the year', 'qualia_td'),
							'label' => __('Yearly Archive Title', 'qualia_td'),
							'default' => '%s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_month_archive_title',
							'description' => __('%s is for the month', 'qualia_td'),
							'label' => __('Monthly Archive Title', 'qualia_td'),
							'default' => 'Blog Posts on: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_day_archive_title',
							'description' => __('%s is for the day', 'qualia_td'),
							'label' => __('Daily Archive Title', 'qualia_td'),
							'default' => 'Blog Posts on: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'search_result_title',
							'description' => __('First %s is for total results found, the second %s is for the query', 'qualia_td'),
							'label' => __('Search Result Title', 'qualia_td'),
							'default' => '%s Search Results for: %s',
						),
						array(
							'type' => 'textbox',
							'name' => '404_title',
							'label' => __('Page Not Found Title', 'qualia_td'),
							'default' => 'Page Not Found',
						),
					),
				),
			),
		),
		array(
			'title' => __('Layout', 'qualia_td'),
			'name' => 'menu_layout',
			'icon' => 'font-awesome:fa-th-large',
			'menus' => array(
				array(
					'title' => __('Body', 'qualia_td'),
					'name' => 'submenu_layout_body',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'radioimage',
							'name' => 'body_layout',
							'label' => __('Body Layout', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_body_layout',
									),
								),
							),
							'default' => array(
								'wide',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_responsive',
							'label' => __('Enable Responsive', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'checkbox',
							'name' => 'responsive_breakpoints',
							'label' => __('Responsive Breakpoints', 'qualia_td'),
							'description' => __('980px breakpoint is default and will always be selected', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_reponsive_breakpoints',
									),
								),
							),
							'default' => array(
								'wide-screen', 'tablet', 'mobile',
							),
						),
						array(
							'type' => 'color',
							'name' => 'body_background_color',
							'label' => __('Background Color', 'qualia_td'),
							'default' => 'rgba(243,243,243,1)',
							'format' => 'rgba',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_background_image_mode',
							'label' => __('Background Image Mode', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_body_background_image_mode',
									),
								),
							),
							'default' => array(
								'',
							),
						),
						array(
							'type' => 'radioimage',
							'name' => 'body_background_image_package',
							'label' => __('Background Image', 'qualia_td'),
							'item_max_height' => '80',
							'item_max_width' => '80',
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_package',
							),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_background_image_package',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),
						array(
							'type' => 'upload',
							'name' => 'body_background_image_custom_src',
							'label' => __('Custom Background Image', 'qualia_td'),
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
						array(
							'type' => 'select',
							'name' => 'body_background_image_custom_position',
							'label' => __('Background Position', 'qualia_td'),
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_background_position',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'body_background_image_custom_attachment',
							'label' => __('Background Attachment', 'qualia_td'),
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_background_attachment',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'body_background_image_custom_repeat',
							'label' => __('Background Repeat', 'qualia_td'),
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_background_repeat',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'body_background_image_custom_size',
							'label' => __('Background Size', 'qualia_td'),
							'dependency' => array(
								'field' => 'body_background_image_mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_background_size',
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Top Header', 'qualia_td'),
					'name' => 'submenu_layout_top_header',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_top_header',
							'label' => __('Enable Top Header', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'top_header_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'1',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'top_header_text',
							'label' => __('Top Header Text', 'qualia_td'),
							'default' => 'Contact us at 1234-567890 | example@address.com',
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_top_header_navigation',
							'label' => __('Enable Navigation', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_top_header_social_links',
							'label' => __('Enable Social Links', 'qualia_td'),
							'default' => '1',
						),
					),
				),
				array(
					'title' => __('Header', 'qualia_td'),
					'name' => 'submenu_layout_header',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'header_mode',
							'label' => __('Header Mode', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_header_mode',
									),
								),
							),
							'default' => array(
								'default',
							),
						),
						array(
							'type' => 'select',
							'name' => 'header_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'2',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_attachment',
							'label' => __('Header Attachment', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_header_attachment',
									),
								),
							),
							'default' => array(
								'normal',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'header_separator',
							'label' => __('Separator', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_section_separator_style',
									),
								),
							),
							'default' => array(
								'single-border',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_floating_header',
							'label' => __('Floating Header', 'qualia_td'),
							'description' => __('Header section will be floating at the top when the viewport leaves header', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_search_widget_on_header',
							'label' => __('Enable Search Widget', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'slider',
							'name' => 'header_height',
							'label' => __('Header Height', 'qualia_td'),
							'description' => __('Height in px. Only affects on One Page Template actived page', 'qualia_td'),
							'min' => '40',
							'max' => '400',
							'default' => '80',
						),
						array(
							'type' => 'slider',
							'name' => 'header_floating_height',
							'label' => __('Header Floating Height', 'qualia_td'),
							'description' => __('Height in px. Only affects on One Page Template actived page', 'qualia_td'),
							'min' => '40',
							'max' => '400',
							'default' => '50',
						),
					),
				),
				array(
					'title' => __('Sub Header', 'qualia_td'),
					'name' => 'submenu_layout_sub_header',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_sub_header',
							'label' => __('Enable Sub Header', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'sub_header_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'5',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'sub_header_separator',
							'label' => __('Separator', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_section_separator_style',
									),
								),
							),
							'default' => array(
								'pressed-shadow'
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'sub_header_mode',
							'label' => __('Sub Header Mode', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_sub_header_mode',
									),
								),
							),
							'default' => array(
								'centered',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_breadcrumb',
							'label' => __('Enable Breadcrumb', 'qualia_td'),
							'description' => __('Please make sure you installed Breadcrumb NavXT plugin', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type'    => 'slider',
							'name'    => 'sub_header_top_spacing',
							'label'   => __('Top Spacing (px)', 'qualia_td'),
							'min'     => '0',
							'max'     => '500',
							'default' => '60',
						),
						array(
							'type'    => 'slider',
							'name'    => 'sub_header_bottom_spacing',
							'label'   => __('Bottom Spacing (px)', 'qualia_td'),
							'min'     => '0',
							'max'     => '500',
							'default' => '60',
						),
						array(
							'type' => 'section',
							'title' => __('Background Image', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'upload',
									'name' => 'sub_header_background_image',
									'label' => __('Sub Header Image', 'qualia_td'),
								),
								array(
									'type' => 'select',
									'name' => 'sub_header_background_position',
									'label' => __('Sub Header Position', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_background_position',
											),
										),
									),
									'default' => array(
										'center bottom'
									),
								),
								array(
									'type' => 'select',
									'name' => 'sub_header_background_attachment',
									'label' => __('Sub Header Attachment', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_background_attachment',
											),
										),
									),
									'default' => array(
										'fixed'
									),
								),
								array(
									'type' => 'select',
									'name' => 'sub_header_background_repeat',
									'label' => __('Sub Header Repeat', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_background_repeat',
											),
										),
									),
									'default' => array(
										'no-repeat'
									),
								),
								array(
									'type' => 'select',
									'name' => 'sub_header_background_size',
									'label' => __('Sub Header Size', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_background_size',
											),
										),
									),
									'default' => array(
										'cover'
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Content', 'qualia_td'),
					'name' => 'submenu_layout_content',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'content_separator',
							'label' => __('Separator', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_section_separator_style',
									),
								),
							),
							'default' => array(
								'triangle-in',
							),
						),
						array(
							'type'    => 'slider',
							'name'    => 'content_top_spacing',
							'label'   => __('Top Spacing (px)', 'qualia_td'),
							'min'     => '0',
							'max'     => '500',
							'default' => '60',
						),
						array(
							'type'    => 'slider',
							'name'    => 'content_bottom_spacing',
							'label'   => __('Bottom Spacing (px)', 'qualia_td'),
							'min'     => '0',
							'max'     => '500',
							'default' => '60',
						),
					),
				),
				array(
					'title' => __('Footer', 'qualia_td'),
					'name' => 'submenu_layout_footer',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_footer',
							'label' => __('Enable Footer', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'footer_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'validation' => 'required',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'9',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'footer_separator',
							'label' => __('Separator', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_section_separator_style',
									),
								),
							),
							'default' => array(
								'none',
							),
						),
						array(
							'type' => 'slider',
							'name' => 'footer_number_of_columns',
							'label' => __('Number of Columns', 'qualia_td'),
							'min' => '1',
							'max' => '6',
							'default' => '3',
						),
						array(
							'type' => 'notebox',
							'name' => 'note_footer',
							'label' => __('How to Use Footer Columns', 'qualia_td'),
							'description' => __('You can set each column\'s width and offset. Please keep in mind that the total columns grid is 12. So if you chose to have 3 columns in the footer, make sure that the total of your 3 columns\' width is not more than 12 grids.', 'qualia_td'),
							'status' => 'info',
						),
						array(
							'type' => 'section',
							'title' => __('Column 1', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_1',
									'label' => __('Grid of Column 1', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '3',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_1',
									'label' => __('Offset of Column 1', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '0',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Column 2', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_2',
									'label' => __('Grid of Column 2', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '3',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_2',
									'label' => __('Offset of Column 2', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '0',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Column 3', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_3',
									'label' => __('Grid of Column 3', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '5',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_3',
									'label' => __('Offset of Column 3', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '1',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Column 4', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_4',
									'label' => __('Grid of Column 4', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '3',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_4',
									'label' => __('Offset of Column 4', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '0',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Column 5', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_5',
									'label' => __('Grid of Column 5', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '3',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_5',
									'label' => __('Offset of Column 5', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '0',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Column 6', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'footer_grid_column_6',
									'label' => __('Grid of Column 6', 'qualia_td'),
									'min' => '1',
									'max' => '12',
									'default' => '3',
								),
								array(
									'type' => 'slider',
									'name' => 'footer_offset_column_6',
									'label' => __('Offset of Column 6', 'qualia_td'),
									'min' => '0',
									'max' => '11',
									'default' => '0',
								),
							),
						),
					),
				),
				array(
					'title' => __('Copyright', 'qualia_td'),
					'name' => 'submenu_layout_copyright',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_copyright',
							'label' => __('Enable Copyright', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'copyright_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'validation' => 'required',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'10',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'copyright_separator',
							'label' => __('Separator', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_section_separator_style',
									),
								),
							),
							'default' => array(
								'none',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'copyright_text',
							'label' => __('Copyright Text', 'qualia_td'),
							'default' => 'Copyright &copy; 2014, All Right Reserved',
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_copyright_navigation',
							'label' => __('Enable Copyright Navigation', 'qualia_td'),
							'description' => 'Please assign a menu under "copyright menu" in the "Menus" page',
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'enable_copyright_social_links',
							'label' => __('Enable Social Links', 'qualia_td'),
							'default' => '1',
						),
					),
				),
			),
		),
		array(
			'title' => __('Pages', 'qualia_td'),
			'name' => 'menu_page',
			'icon' => 'font-awesome:fa-file-text-o',
			'menus' => array(
				array(
					'title' => __('Blog', 'qualia_td'),
					'name' => 'submenu_page_blog',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Index / Archive', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'radiobutton',
									'name' => 'blog_archive_mode',
									'label' => __('Archive Mode', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'qualia_source_blog_mode',
											),
										),
									),
									'default' => array(
										'default',
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'blog_archive_pagination',
									'label' => __('Pagination', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'qualia_source_blog_pagination',
											),
										),
									),
									'default' => array(
										'page',
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'blog_archive_word_limit',
									'label' => __('Word Limit', 'qualia_td'),
									'validation' => 'required|numeric',
									'default' => 40,
								),
								array(
									'name'    => 'ignore_sticky',
									'type'    => 'toggle',
									'label'   => __('Ignore Sticky', 'qualia_td'),
									'default' => 0,
								),
								array(
									'type' => 'radiobutton',
									'name' => 'blog_archive_sidebar_position',
									'label' => __('Sidebar Position', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'qualia_source_sidebar_position',
											),
										),
									),
									'default' => array(
										'right',
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'blog_archive_sticky_label',
									'label' => __('Sticky Label', 'qualia_td'),
									'description' => __('Maximum **10** characters', 'qualia_td'),
									'validation' => 'required|maxlength[10]',
									'default' => 'Featured',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Single Page', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'blog_single_shows_featured_image',
									'label' => __('Shows Featured Image at the beginning of Post', 'qualia_td'),
									'default' => '1',
								),
								array(
									'type' => 'toggle',
									'name' => 'enable_blog_author_box',
									'label' => __('Enable Author Box', 'qualia_td'),
									'default' => '1',
								),
								array(
									'type' => 'radiobutton',
									'name' => 'blog_single_sidebar_position',
									'label' => __('Sidebar Position', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'qualia_source_sidebar_position',
											),
										),
									),
									'default' => array(
										'right',
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Search Result', 'qualia_td'),
					'name' => 'submenu_page_search',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'textbox',
							'name' => 'search_result_posts_per_page',
							'label' => __('Posts per Page', 'qualia_td'),
							'description' => __('Input -1 to show all in one page', 'qualia_td'),
							'validation' => 'numeric|required',
							'default' => '10',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'search_result_pagination',
							'label' => __('Pagination', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_search_result_pagination',
									),
								),
							),
							'default' => array(
								'page',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'search_result_sidebar_position',
							'label' => __('Sidebar Position', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_sidebar_position',
									),
								),
							),
							'default' => array(
								'right',
							),
						),
					),
				),
				array(
					'title' => __('One Page Template', 'qualia_td'),
					'name' => 'submenu_page_one_page',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_one_page_preloader',
							'label' => __('Enable One Page PreLoader', 'qualia_td'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'one_page_preloader_color_set',
							'label' => __('Color Set', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'qualia_source_color_palette',
									),
								),
							),
							'default' => array(
								'5',
							),
							'dependency' => array(
								'field' => 'enable_one_page_preloader',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'section',
							'title' => __('One Page Header', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'hide_one_page_header',
									'label' => __('Hide One Page Header', 'qualia_td'),
									'default' => '1',
								),
								array(
									'type' => 'slider',
									'name' => 'one_page_header_height',
									'label' => __('One Page Header Height', 'qualia_td'),
									'description' => __('Height in px. Only affects on One Page Template actived page', 'qualia_td'),
									'min' => '40',
									'max' => '400',
									'default' => '40',
								),
								array(
									'type' => 'slider',
									'name' => 'one_page_header_floating_height',
									'label' => __('One Page Header Floating Height', 'qualia_td'),
									'description' => __('Height in px. Only affects on One Page Template actived page', 'qualia_td'),
									'min' => '40',
									'max' => '400',
									'default' => '60',
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Assets', 'qualia_td'),
			'name' => 'menu_assets',
			'icon' => 'font-awesome:fa-folder-open',
			'menus' => array(
				array(
					'name' => 'submenu_color',
					'title' => __('Colors', 'qualia_td'),
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Standard Colors', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_standard_preview',
									'binding' => array(
										'field'    => 'color_standard_generate_preview',
										'function' => 'qualia_bind_color_standard_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_standard_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_standard)
								),
								array(
									'type' => 'color',
									'name' => 'color_black',
									'label' => __('Black Color', 'qualia_td'),
									'default' => $color_standard[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_white',
									'label' => __('White Color', 'qualia_td'),
									'default' => $color_standard[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_info',
									'label' => __('Info Color', 'qualia_td'),
									'default' => $color_standard[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_warning',
									'label' => __('Warning Color', 'qualia_td'),
									'default' => $color_standard[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_success',
									'label' => __('Success Color', 'qualia_td'),
									'default' => $color_standard[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_error',
									'label' => __('Error Color', 'qualia_td'),
									'default' => $color_standard[5],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_normal',
									'label' => __('Normal Color', 'qualia_td'),
									'default' => $color_standard[6],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'notebox',
							'name' => 'note_color',
							'label' => __('Color Definitions', 'qualia_td'),
							'description' => __(
'A short guideline for setting up your color:<br><br>

<strong>Background:</strong> Used for section\'s background color<br>
<strong>Base:</strong> Used for base background color in any element like box, accordion, form inputs, tabs, etc<br>
<strong>Subtle:</strong> Used for horizontal line, borders, etc<br>
<strong>Text:</strong> Used for normal text color<br>
<strong>Strong:</strong> Used for stronger text color, e.g. heading color<br>
<strong>Accent:</strong> Used for contrasted text color, e.g. links, button background
', 'qualia_td'),
							'status' => 'info',							
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 1 (PRIMARY)', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_1_preview',
									'binding' => array(
										'field'    => 'color_1_generate_preview',
										'function' => 'qualia_bind_color_1_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_1_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_1)
								),
								array(
									'type' => 'color',
									'name' => 'color_1_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_1[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_1_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_1[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_1_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_1[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_1_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_1[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_1_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_1[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_1_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_1[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 2', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_2_preview',
									'binding' => array(
										'field'    => 'color_2_generate_preview',
										'function' => 'qualia_bind_color_2_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_2_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_2)
								),
								array(
									'type' => 'color',
									'name' => 'color_2_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_2[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_2_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_2[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_2_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_2[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_2_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_2[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_2_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_2[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_2_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_2[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 3', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_3_preview',
									'binding' => array(
										'field'    => 'color_3_generate_preview',
										'function' => 'qualia_bind_color_3_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_3_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_3)
								),
								array(
									'type' => 'color',
									'name' => 'color_3_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_3[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_3_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_3[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_3_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_3[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_3_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_3[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_3_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_3[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_3_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_3[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 4', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_4_preview',
									'binding' => array(
										'field'    => 'color_4_generate_preview',
										'function' => 'qualia_bind_color_4_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_4_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_4)
								),
								array(
									'type' => 'color',
									'name' => 'color_4_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_4[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_4_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_4[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_4_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_4[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_4_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_4[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_4_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_4[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_4_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_4[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 5', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_5_preview',
									'binding' => array(
										'field'    => 'color_5_generate_preview',
										'function' => 'qualia_bind_color_5_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_5_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_5)
								),
								array(
									'type' => 'color',
									'name' => 'color_5_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_5[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_5_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_5[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_5_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_5[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_5_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_5[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_5_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_5[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_5_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_5[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 6', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_6_preview',
									'binding' => array(
										'field'    => 'color_6_generate_preview',
										'function' => 'qualia_bind_color_6_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_6_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_6)
								),
								array(
									'type' => 'color',
									'name' => 'color_6_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_6[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_6_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_6[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_6_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_6[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_6_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_6[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_6_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_6[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_6_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_6[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 7', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_7_preview',
									'binding' => array(
										'field'    => 'color_7_generate_preview',
										'function' => 'qualia_bind_color_7_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_7_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_7)
								),
								array(
									'type' => 'color',
									'name' => 'color_7_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_7[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_7_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_7[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_7_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_7[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_7_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_7[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_7_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_7[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_7_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_7[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 8', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_8_preview',
									'binding' => array(
										'field'    => 'color_8_generate_preview',
										'function' => 'qualia_bind_color_8_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_8_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_8)
								),
								array(
									'type' => 'color',
									'name' => 'color_8_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_8[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_8_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_8[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_8_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_8[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_8_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_8[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_8_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_8[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_8_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_8[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 9', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_9_preview',
									'binding' => array(
										'field'    => 'color_9_generate_preview',
										'function' => 'qualia_bind_color_9_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_9_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_9)
								),
								array(
									'type' => 'color',
									'name' => 'color_9_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_9[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_9_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_9[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_9_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_9[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_9_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_9[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_9_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_9[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_9_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_9[5],
									'format' => 'rgba',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Color Set 10', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'color_10_preview',
									'binding' => array(
										'field'    => 'color_10_generate_preview',
										'function' => 'qualia_bind_color_10_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'color_10_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($color_set_10)
								),
								array(
									'type' => 'color',
									'name' => 'color_10_background',
									'label' => __('Background Color', 'qualia_td'),
									'default' => $color_set_10[0],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_10_base',
									'label' => __('Base Color', 'qualia_td'),
									'default' => $color_set_10[1],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_10_subtle',
									'label' => __('Subtle Color', 'qualia_td'),
									'default' => $color_set_10[2],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_10_text',
									'label' => __('Text Color', 'qualia_td'),
									'default' => $color_set_10[3],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_10_strong',
									'label' => __('Strong Color', 'qualia_td'),
									'default' => $color_set_10[4],
									'format' => 'rgba',
								),
								array(
									'type' => 'color',
									'name' => 'color_10_accent',
									'label' => __('Accent Color', 'qualia_td'),
									'default' => $color_set_10[5],
									'format' => 'rgba',
								),
							),
						),
					),
				),
				array(
					'title' => __('Custom Fonts', 'qualia_td'),
					'name' => 'submenu_custom_fonts',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'notebox',
							'name' => 'note_custom_font',
							'label' => __('Use Custom Font in Typography Settings', 'qualia_td'),
							'description' => __('After you upload your own custom fonts, please remember to save changes and then refresh this option page. Otherwise, the added custom fonts won\'t show up in the Typography Settings', 'qualia_td'),
							'status' => 'info',							
						),
						array(
							'type' => 'section',
							'title' => __('Custom Font 1', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'custom_font_1_name',
									'label' => __('Name', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_1_file_eot',
									'label' => __('File .eot', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_1_file_woff',
									'label' => __('File .woff', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_1_file_ttf',
									'label' => __('File .ttf', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_1_file_svg',
									'label' => __('File .svg', 'qualia_td'),
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Custom Font 2', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'custom_font_2_name',
									'label' => __('Name', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_2_file_eot',
									'label' => __('File .eot', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_2_file_woff',
									'label' => __('File .woff', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_2_file_ttf',
									'label' => __('File .ttf', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_2_file_svg',
									'label' => __('File .svg', 'qualia_td'),
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Custom Font 3', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'custom_font_3_name',
									'label' => __('Name', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_3_file_eot',
									'label' => __('File .eot', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_3_file_woff',
									'label' => __('File .woff', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_3_file_ttf',
									'label' => __('File .ttf', 'qualia_td'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_font_3_file_svg',
									'label' => __('File .svg', 'qualia_td'),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Typography', 'qualia_td'),
			'name' => 'menu_typography',
			'icon' => 'font-awesome:fa-text-width',
			'menus' => array(
				array(
					'name' => 'submenu_body_typography',
					'title' => __('Body', 'qualia_td'),
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Body', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'body_font_preview',
									'binding' => array(
										'field'    => 'body_font_generate_preview',
										'function' => 'qualia_bind_body_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'body_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($body)
								),
								array(
									'type' => 'select',
									'name' => 'body_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$body[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'body_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'body_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$body[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'body_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'body_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$body[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'body_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'body_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $body[3],
								),
								array(
									'type' => 'select',
									'name' => 'body_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$body[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'body_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $body[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'body_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $body[6],
								),
								array(
									'type' => 'slider',
									'name' => 'body_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $body[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Header Navigation Link', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'nav_font_preview',
									'binding' => array(
										'field'    => 'nav_font_generate_preview',
										'function' => 'qualia_bind_nav_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'nav_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($nav)
								),
								array(
									'type' => 'select',
									'name' => 'nav_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$nav[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'nav_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'nav_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$nav[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'nav_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'nav_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$nav[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'nav_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'nav_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $nav[3],
								),
								array(
									'type' => 'select',
									'name' => 'nav_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$nav[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'nav_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $nav[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'nav_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $nav[6],
								),
								array(
									'type' => 'slider',
									'name' => 'nav_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $nav[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Button', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'button_font_preview',
									'binding' => array(
										'field'    => 'button_font_generate_preview',
										'function' => 'qualia_bind_button_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'button_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($button)
								),
								array(
									'type' => 'select',
									'name' => 'button_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$button[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'button_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'button_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$button[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'button_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'button_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$button[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'button_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'button_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $button[3],
								),
								array(
									'type' => 'select',
									'name' => 'button_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$button[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'button_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $button[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'button_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $button[6],
								),
								array(
									'type' => 'slider',
									'name' => 'button_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $button[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Blockquote', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'blockquote_font_preview',
									'binding' => array(
										'field'    => 'blockquote_font_generate_preview',
										'function' => 'qualia_bind_blockquote_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'blockquote_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($blockquote)
								),
								array(
									'type' => 'select',
									'name' => 'blockquote_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$blockquote[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'blockquote_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'blockquote_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$blockquote[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'blockquote_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'blockquote_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$blockquote[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'blockquote_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'blockquote_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $blockquote[3],
								),
								array(
									'type' => 'select',
									'name' => 'blockquote_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$blockquote[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'blockquote_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $blockquote[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'blockquote_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $blockquote[6],
								),
								array(
									'type' => 'slider',
									'name' => 'blockquote_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $blockquote[7],
								),
							),
						),
					),
				),
				array(
					'name' => 'submenu_heading_typography',
					'title' => __('Heading', 'qualia_td'),
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Heading 1', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h1_font_preview',
									'binding' => array(
										'field'    => 'h1_font_generate_preview',
										'function' => 'qualia_bind_h1_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h1_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h1)
								),
								array(
									'type' => 'select',
									'name' => 'h1_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h1[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h1_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h1_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h1[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h1_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h1_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h1[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h1_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h1_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h1[3],
								),
								array(
									'type' => 'select',
									'name' => 'h1_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h1[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h1_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h1[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h1_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h1[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h1_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h1[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Heading 2', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h2_font_preview',
									'binding' => array(
										'field'    => 'h2_font_generate_preview',
										'function' => 'qualia_bind_h2_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h2_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h2)
								),
								array(
									'type' => 'select',
									'name' => 'h2_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h2[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h2_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h2_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h2[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h2_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h2_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h2[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h2_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h2_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h2[3],
								),
								array(
									'type' => 'select',
									'name' => 'h2_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h2[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h2_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h2[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h2_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h2[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h2_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h2[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Heading 3', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h3_font_preview',
									'binding' => array(
										'field'    => 'h3_font_generate_preview',
										'function' => 'qualia_bind_h3_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h3_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h3)
								),
								array(
									'type' => 'select',
									'name' => 'h3_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h3[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h3_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h3_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h3[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h3_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h3_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h3[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h3_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h3_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h3[3],
								),
								array(
									'type' => 'select',
									'name' => 'h3_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h3[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h3_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h3[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h3_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h3[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h3_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h3[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Heading 4', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h4_font_preview',
									'binding' => array(
										'field'    => 'h4_font_generate_preview',
										'function' => 'qualia_bind_h4_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h4_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h4)
								),
								array(
									'type' => 'select',
									'name' => 'h4_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h4[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h4_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h4_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h4[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h4_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h4_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h4[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h4_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h4_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h4[3],
								),
								array(
									'type' => 'select',
									'name' => 'h4_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h4[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h4_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h4[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h4_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h4[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h4_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h4[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Heading 5', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h5_font_preview',
									'binding' => array(
										'field'    => 'h5_font_generate_preview',
										'function' => 'qualia_bind_h5_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h5_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h5)
								),
								array(
									'type' => 'select',
									'name' => 'h5_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h5[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h5_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h5_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h5[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h5_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h5_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h5[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h5_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h5_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h5[3],
								),
								array(
									'type' => 'select',
									'name' => 'h5_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h5[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h5_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h5[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h5_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h5[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h5_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h5[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Heading 6', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'h6_font_preview',
									'binding' => array(
										'field'    => 'h6_font_generate_preview',
										'function' => 'qualia_bind_h6_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'h6_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($h6)
								),
								array(
									'type' => 'select',
									'name' => 'h6_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$h6[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'h6_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h6_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$h6[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'h6_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h6_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$h6[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'h6_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'h6_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $h6[3],
								),
								array(
									'type' => 'select',
									'name' => 'h6_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$h6[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'h6_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h6[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'h6_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $h6[6],
								),
								array(
									'type' => 'slider',
									'name' => 'h6_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $h6[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Sub Header Title', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'title_font_preview',
									'binding' => array(
										'field'    => 'title_font_generate_preview',
										'function' => 'qualia_bind_title_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'title_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($title)
								),
								array(
									'type' => 'select',
									'name' => 'title_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$title[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'title_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'title_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$title[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'title_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'title_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$title[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'title_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'title_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $title[3],
								),
								array(
									'type' => 'select',
									'name' => 'title_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$title[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'title_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $title[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'title_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $title[6],
								),
								array(
									'type' => 'slider',
									'name' => 'title_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $title[7],
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Divider Title', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'html',
									'name' => 'divider_font_preview',
									'binding' => array(
										'field'    => 'divider_font_generate_preview',
										'function' => 'qualia_bind_divider_typography_preview',
									),
								),
								array(
									'type' => 'bindingbutton',
									'name' => 'divider_font_generate_preview',
									'label' => __('Generate Preview', 'qualia_td'),
									'default' => json_encode($divider)
								),
								array(
									'type' => 'select',
									'name' => 'divider_font_face',
									'label' => __('Font Face', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_regular_font',
											),
											array(
												'source' => 'function',
												'value' => 'qualia_source_custom_font',
											),
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
									'default' => array(
										$divider[0],
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'divider_font_style',
									'label' => __('Font Style', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'divider_font_face',
												'value' => 'qualia_source_binding_font_style',
											),
										),
									),
									'default' => array(
										$divider[1],
									),
								),
								array(
									'type' => 'select',
									'name' => 'divider_font_weight',
									'label' => __('Font Weight', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'divider_font_face',
												'value' => 'qualia_source_binding_font_weight',
											),
										),
									),
									'default' => array(
										$divider[2],
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'divider_font_subset',
									'label' => __('Font Subset', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'divider_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => $divider[3],
								),
								array(
									'type' => 'select',
									'name' => 'divider_font_transform',
									'label' => __('Text Transform', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'qualia_source_text_transform',
											),
										),
									),
									'default' => array(
										$divider[4],
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'divider_font_size',
									'label' => __('Font Size', 'qualia_td'),
									'description' => __('Font Size in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $divider[5],
								),
								array(
									'type' => 'textbox',
									'name' => 'divider_line_height',
									'label' => __('Line Height', 'qualia_td'),
									'description' => __('Line height in px', 'qualia_td'),
									'validation' => 'numeric',
									'default' => $divider[6],
								),
								array(
									'type' => 'slider',
									'name' => 'divider_letter_spacing',
									'label' => __('Letter Spacing', 'qualia_td'),
									'description' => __('Letter Space in px', 'qualia_td'),
									'step' => '0.5',
									'min' => '-20',
									'max' => '20',
									'default' => $divider[7],
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Social Media', 'qualia_td'),
			'name' => 'menu_socmed',
			'icon' => 'font-awesome:fa-twitter',
			'controls' => array(
				array(
					'type' => 'sorter',
					'name' => 'socmed_set',
					'label' => __('Social Media Set', 'qualia_td'),
					'description' => __('Select and sort your Social Media links', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value' => 'qualia_get_social_medias',
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Social Media URL', 'qualia_td'),
					'fields' => qualia_generate_socmed_fields(),
				),
			),
		),
		array(
			'title' => __('Custom Scripts', 'qualia_td'),
			'name' => 'menu_scripts',
			'icon' => 'font-awesome:fa-code',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Document Scripts', 'qualia_td'),
					'fields' => array(
						array(
							'type' => 'codeeditor',
							'name' => 'head_script',
							'label' => __('Head Script', 'qualia_td'),
							'mode' => 'html',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'foot_script',
							'label' => __('Foot Script', 'qualia_td'),
							'mode' => 'html',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Custom CSS', 'qualia_td'),
					'fields' => array(
						array(
							'type' => 'codeeditor',
							'name' => 'custom_css',
							'label' => __('Custom CSS', 'qualia_td'),
							'mode' => 'css',
						),
					),
				),
			),
		),
	)
);

/**
 *EOF
 */