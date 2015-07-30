<?php

$nl = "</p><p>";
$ol = "<p>";
$cl = "</p>";

return array(

	'Layout' => array(
		'elements' => array(

			'section' => array(
				'title'      => __('Section', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_section', $ol.'[section]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/section]'),
				'attributes' => apply_filters('vp_sc_attributes_section', array(
					'background_color' => array(
						'name'    => 'background_color',
						'type'    => 'radioimage',
						'label'   => __('Background Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_section_background_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_section_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'background_image' => array(
						'name'    => 'background_image',
						'type'    => 'upload',
						'label'   => __('Background Image', 'vp_sc_td'),
					),
					'background_position' => array(
						'name'    => 'background_position',
						'type'    => 'select',
						'label'   => __('Background Position', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_background_position',
								),
							),
						),
					),
					'background_attachment' => array(
						'name'    => 'background_attachment',
						'type'    => 'select',
						'label'   => __('Background Attachment', 'vp_sc_td'),
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
						'label'   => __('Background Repeat', 'vp_sc_td'),
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
						'label'   => __('Background Size', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_background_size',
								),
							),
						),
					),
					'id' => array(
						'name'    => 'id',
						'type'    => 'textbox',
						'label'   => __('Section ID', 'vp_sc_td'),
					),
				)),
			),

			'row' => array(
				'title'      => __('Row', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_row', $ol.'[row]'.$nl.'[column grid="12" offset="0"]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/column]'.$nl.'[/row]'),
				'attributes' => apply_filters('vp_sc_attributes_row', array()),
			),

			'column' => array(
				'title'      => __('Column', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_column', $ol.'[column]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/column]'),
				'attributes' => apply_filters('vp_sc_attributes_column', array(
					'grid' => array(
						'name'    => 'grid',
						'type'    => 'slider',
						'label'   => __('Grid', 'vp_sc_td'),
						'min'     => 1,
						'max'     => 12,
						'default' => 12,
					),
					'offset' => array(
						'name'    => 'offset',
						'type'    => 'slider',
						'label'   => __('Offset', 'vp_sc_td'),
						'min'     => 0,
						'max'     => 11,
						'default' => 0,
					),
				)),
			),

			'box' => array(
				'title'      => __('Box', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_box', $ol.'[box]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/box]'),
				'attributes' => apply_filters('vp_sc_attributes_box', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_box_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'background_color' => array(
						'name'    => 'background_color',
						'type'    => 'radioimage',
						'label'   => __('Background Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_box_background_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_box_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'divider' => array(
				'title'      => __('Divider', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_divider', $ol.'[divider]'),
				'attributes' => apply_filters('vp_sc_attributes_divider', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_divider_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'align' => array(
						'name'    => 'align',
						'type'    => 'radiobutton',
						'label'   => __('Align', 'vp_sc_td'),
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
					'width' => array(
						'name'    => 'width',
						'type'    => 'textbox',
						'label'   => __('Width (px / %)', 'vp_sc_td'),
						'default' => '100%',
					),
				)),
			),

			'spacer' => array(
				'title'      => __('Inner Spacer', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_spacer', $ol.'[spacer]'),
				'attributes' => apply_filters('vp_sc_attributes_spacer', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_spacer_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'size' => array(
						'name'    => 'size',
						'type'    => 'textbox',
						'label'   => __('Size', 'vp_sc_td'),
						'default' => '0px',
					),
				)),
			),

			'div' => array(
				'title'   => __('HTML DIV', 'vp_sc_td'),
				'code'    => $ol.'[div]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/div]',
			),

			'span' => array(
				'title'   => __('HTML SPAN', 'vp_sc_td'),
				'code'    => '[span][/span]',
			),

		),
	),

	'Panels' => array(
		'elements' => array(

			'accordion' => array(
				'title'      => __('Accordion', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_accordion', $ol.'[accordion]'.$nl.'[accordion_pane heading="Accordion Pane 1 Heading" default="true" background_color="transparent" color="inherit"]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/accordion_pane]'.$nl.'[/accordion]'),
				'attributes' => apply_filters('vp_sc_attributes_accordion', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_accordion_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'open_multiple' => array(
						'name'    => 'open_multiple',
						'type'    => 'toggle',
						'label'   => __('Open Multiple', 'vp_sc_td'),
						'default' => 0,
					),
				)),
			),

			'accordion_pane' => array(
				'title'      => __('Accordion Pane', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_accordion_pane', $ol.'[accordion_pane]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/accordion_pane]'),
				'attributes' => apply_filters('vp_sc_attributes_accordion_pane', array(
					'heading' => array(
						'name'    => 'heading',
						'type'    => 'textbox',
						'label'   => __('Heading', 'vp_sc_td'),
						'default' => 'Accordion Pane Heading',
					),
					'default' => array(
						'name'    => 'default',
						'type'    => 'toggle',
						'label'   => __('Default?', 'vp_sc_td'),
						'default' => 0,
					),
				)),
			),

			'sidebar' => array(
				'title'      => __('Sidebar', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_sidebar', $ol.'[sidebar]'),
				'attributes' => apply_filters('vp_sc_attributes_sidebar', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_sidebar_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'name' => array(
						'name'    => 'name',
						'type'    => 'select',
						'label'   => __('Sidebar Name', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_sidebar_name',
								),
							),
						),
					),
				)),
			),

			'tabs' => array(
				'title'      => __('Tabs', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_tabs', $ol.'[tabs]'.$nl.'[tab heading="Tab 1 Heading"]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/tab]'.$nl.'[/tabs]'),
				'attributes' => apply_filters('vp_sc_attributes_tabs', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_tabs_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'nav_position' => array(
						'name'    => 'nav_position',
						'type'    => 'radiobutton',
						'label'   => __('Nav Position', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_tabs_nav_position',
								),
							),
						),
						'default' => array(
							'top',
						),
					),
					'default_tab' => array(
						'name'    => 'default_tab',
						'type'    => 'textbox',
						'label'   => __('Default Index (first is 0)', 'vp_sc_td'),
						'default' => '0',
					),
				)),
			),

			'tab' => array(
				'title'      => __('Tab', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_tab', $ol.'[tab]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/tab]'),
				'attributes' => apply_filters('vp_sc_attributes_tab', array(
					'heading' => array(
						'name'    => 'heading',
						'type'    => 'textbox',
						'label'   => __('Heading', 'vp_sc_td'),
						'default' => 'Tab Heading',
					),
				)),
			),
		),
	),

	'Data Presentation' => array(
		'elements' => array(

			'blog' => array(
				'title'      => __('Blog', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_blog', $ol.'[blog]'),
				'attributes' => apply_filters('vp_sc_attributes_blog', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_blog_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'posts_per_page' => array(
						'name'    => 'posts_per_page',
						'type'    => 'textbox',
						'label'   => __('Posts per Page', 'vp_sc_td'),
						'default' => 10,
					),
					'pagination' => array(
						'name'    => 'pagination',
						'type'    => 'radiobutton',
						'label'   => __('Pagination', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_blog_pagination',
								),
							),
						),
						'default' => array(
							'page',
						),
					),
				)),
			),

			'google_maps' => array(
				'title'      => __('Google Maps', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_google_maps', '[google_maps]'),
				'attributes' => apply_filters('vp_sc_attributes_google_maps', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_google_maps_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'address' => array(
						'name'    => 'address',
						'type'    => 'textbox',
						'label'   => __('Address', 'vp_sc_td'),
					),
					'latlng' => array(
						'name'    => 'latlng',
						'type'    => 'textbox',
						'label'   => __('Latitude / Longitude', 'vp_sc_td'),
					),
					'zoom' => array(
						'name'    => 'zoom',
						'type'    => 'slider',
						'label'   => __('Zoom Level', 'vp_sc_td'),
						'min'     => 0,
						'max'     => 18,
						'default' => 16,
					),
					'height' => array(
						'name'    => 'height',
						'type'    => 'textbox',
						'label'   => __('Height (px)', 'vp_sc_td'),
						'default' => '200px',
					),
					'width' => array(
						'name'    => 'width',
						'type'    => 'textbox',
						'label'   => __('Width (px)', 'vp_sc_td'),
						'default' => '100%',
					),
					'icon' => array(
						'name'    => 'icon',
						'type'    => 'upload',
						'label'   => __('Marker', 'vp_sc_td'),
					),
				)),
			),

			'point_block' => array(
				'title'      => __('Point Block', 'qualia_td'),
				'code'       => apply_filters('vp_sc_code_point_block', $ol.'[point_block]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/point_block]'),
				'attributes' => apply_filters('vp_sc_attributes_point_block', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_point_block_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'image' => array(
						'name'    => 'image',
						'type'    => 'upload',
						'label'   => __('Image', 'vp_sc_td'),
					),
					'icon' => array(
						'name'    => 'icon',
						'type'    => 'fontawesome',
						'label'   => __('Icon', 'vp_sc_td'),
					),
					'icon_color' => array(
						'name'    => 'icon_color',
						'type'    => 'radioimage',
						'label'   => __('Icon Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_font_awesome_color',
								),
							),
						),
						'default' => array(
							'inherit',
						),
					),
					'icon_color_custom' => array(
						'name'    => 'icon_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'vp_sc_td'),
					),
				)),
			),

			'pricing_table' => array(
				'title'      => __('Pricing Table', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_pricing_table', $ol.'[pricing_table]'.$nl.'[pricing_column name="Package Name" currency="$" nominal="21" period="per month" action_button="true" action_url="#" action_text="Purchase Now" accent_background_color="info" accent_color="white" featured="true" featured="Featured"]'.$nl.'<ul><li>Item 1</li><li>Item 2</li><li>Item 3</li></ul>'.$nl.'[/pricing_column]'.$nl.'[/pricing_table]'),
				'attributes' => apply_filters('vp_sc_attributes_pricing_table', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_pricing_table_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),

			'pricing_column' => array(
				'title'      => __('Pricing Column', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_pricing_column', $ol.'[pricing_column]'.$nl.'<ul><li>Item 1</li><li>Item 2</li></ul>'.$nl.'[/pricing_column]'),
				'attributes' => apply_filters('vp_sc_attributes_pricing_column', array(
					'name' => array(
						'name'    => 'name',
						'type'    => 'textbox',
						'label'   => __('Package Name', 'vp_sc_td'),
						'default' => 'Package Name',
					),
					'currency' => array(
						'name'    => 'currency',
						'type'    => 'textbox',
						'label'   => __('Currency', 'vp_sc_td'),
						'default' => '$',
					),
					'nominal' => array(
						'name'    => 'nominal',
						'type'    => 'textbox',
						'label'   => __('Nominal', 'vp_sc_td'),
						'default' => 21,
					),
					'period' => array(
						'name'    => 'period',
						'type'    => 'textbox',
						'label'   => __('Period', 'vp_sc_td'),
						'default' => 'per month',
					),
					'action_button' => array(
						'name'    => 'action_button',
						'type'    => 'toggle',
						'label'   => __('Action Button', 'vp_sc_td'),
						'default' => 1,
					),
					'action_url' => array(
						'name'    => 'action_url',
						'type'    => 'textbox',
						'label'   => __('Action URL', 'vp_sc_td'),
						'default' => '#',
					),
					'action_text' => array(
						'name'    => 'action_text',
						'type'    => 'textbox',
						'label'   => __('Action Text', 'vp_sc_td'),
						'default' => 'Purchase Now',
					),
					'accent_background_color' => array(
						'name'    => 'accent_background_color',
						'type'    => 'radioimage',
						'label'   => __('Accent Background Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_pricing_column_accent_background_color',
								),
							),
						),
						'default' => array(
							'transparent',
						),
					),
					'accent_background_color_custom' => array(
						'name'    => 'accent_background_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'accent_color' => array(
						'name'    => 'accent_color',
						'type'    => 'radioimage',
						'label'   => __('Accent Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_pricing_column_accent_color',
								),
							),
						),
						'default' => array(
							'inherit',
						),
					),
					'accent_color_custom' => array(
						'name'    => 'accent_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'featured' => array(
						'name'    => 'featured',
						'type'    => 'toggle',
						'label'   => __('Featured?', 'vp_sc_td'),
						'default' => 0,
					),
					'featured_text' => array(
						'name'    => 'featured_text',
						'type'    => 'textbox',
						'label'   => __('Featured Text', 'vp_sc_td'),
					),
				)),
			),

			'progress_bar' => array(
				'title'      => __('Progress Bar', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_progress_bar', $ol.'[progress_bar]'),
				'attributes' => apply_filters('vp_sc_attributes_progress_bar', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_bar_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'min' => array(
						'name'    => 'min',
						'type'    => 'textbox',
						'label'   => __('Min', 'vp_sc_td'),
						'default' => 0,
					),
					'max' => array(
						'name'    => 'max',
						'type'    => 'textbox',
						'label'   => __('Max', 'vp_sc_td'),
						'default' => 100,
					),
					'value' => array(
						'name'    => 'value',
						'type'    => 'textbox',
						'label'   => __('Value', 'vp_sc_td'),
						'default' => 100,
					),
					'caption' => array(
						'name'    => 'caption',
						'type'    => 'textbox',
						'label'   => __('Caption', 'vp_sc_td'),
					),
					'label' => array(
						'name'    => 'label',
						'type'    => 'radiobutton',
						'label'   => __('Display', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_bar_label',
								),
							),
						),
						'default' => array(
							'value',
						),
					),
					'featured' => array(
						'name'    => 'featured',
						'type'    => 'toggle',
						'label'   => __('Featured?', 'vp_sc_td'),
						'default' => 0,
					),
					'animated' => array(
						'name'    => 'animated',
						'type'    => 'toggle',
						'label'   => __('Animated?', 'vp_sc_td'),
						'default' => 1,
					),
					'width' => array(
						'name'    => 'width',
						'type'    => 'textbox',
						'label'   => __('Width (px / %)', 'vp_sc_td'),
						'default' => '100%',
					),
					'track_color' => array(
						'name'    => 'track_color',
						'type'    => 'radioimage',
						'label'   => __('Track Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_bar_track_color',
								),
							),
						),
						'default' => array(
							'transparent',
						),
					),
					'track_color_custom' => array(
						'name'    => 'track_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'fill_color' => array(
						'name'    => 'fill_color',
						'type'    => 'radioimage',
						'label'   => __('Fill Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_bar_fill_color',
								),
							),
						),
						'default' => array(
							'info',
						),
					),
					'fill_color_custom' => array(
						'name'    => 'fill_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_bar_color',
								),
							),
						),
						'default' => array(
							'white',
						),
					),
					'color_custom' => array(
						'name'    => 'color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'progress_ring' => array(
				'title'      => __('Progress Ring', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_progress_ring', $ol.'[progress_ring]'),
				'attributes' => apply_filters('vp_sc_attributes_progress_ring', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_ring_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'min' => array(
						'name'    => 'min',
						'type'    => 'textbox',
						'label'   => __('Min', 'vp_sc_td'),
						'default' => 0,
					),
					'max' => array(
						'name'    => 'max',
						'type'    => 'textbox',
						'label'   => __('Max', 'vp_sc_td'),
						'default' => 100,
					),
					'value' => array(
						'name'    => 'value',
						'type'    => 'textbox',
						'label'   => __('Value', 'vp_sc_td'),
						'default' => 100,
					),
					'caption' => array(
						'name'    => 'caption',
						'type'    => 'textbox',
						'label'   => __('Caption', 'vp_sc_td'),
					),
					'label' => array(
						'name'    => 'label',
						'type'    => 'radiobutton',
						'label'   => __('Display', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_ring_label',
								),
							),
						),
						'default' => 'value',
					),
					'animated' => array(
						'name'    => 'animated',
						'type'    => 'toggle',
						'label'   => __('Animated?', 'vp_sc_td'),
						'default' => 1,
					),
					'diameter' => array(
						'name'    => 'diameter',
						'type'    => 'textbox',
						'label'   => __('Diameter (px / %)', 'vp_sc_td'),
						'default' => '100%',
					),
					'thickness' => array(
						'name'    => 'thickness',
						'type'    => 'slider',
						'label'   => __('Ring Thickness', 'vp_sc_td'),
						'step'    => 0.05,
						'min'     => 0.05,
						'max'     => 0.5,
						'default' => 0.2,
					),
					'track_color' => array(
						'name'    => 'track_color',
						'type'    => 'radioimage',
						'label'   => __('Track Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_ring_track_color',
								),
							),
						),
						'default' => array(
							'transparent',
						),
					),
					'track_color_custom' => array(
						'name'    => 'track_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'fill_color' => array(
						'name'    => 'fill_color',
						'type'    => 'radioimage',
						'label'   => __('Fill Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_ring_fill_color',
								),
							),
						),
						'default' => array(
							'info',
						),
					),
					'fill_color_custom' => array(
						'name'    => 'fill_color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_progress_ring_color',
								),
							),
						),
						'default' => array(
							'white',
						),
					),
					'color_custom' => array(
						'name'    => 'color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'counter' => array(
				'title'      => __('Counter', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_counter', $ol.'[counter]'),
				'attributes' => apply_filters('vp_sc_attributes_counter', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_counter_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'begin' => array(
						'name'    => 'begin',
						'type'    => 'textbox',
						'label'   => __('Begin', 'vp_sc_td'),
						'default' => 0,
					),
					'end' => array(
						'name'    => 'end',
						'type'    => 'textbox',
						'label'   => __('End', 'vp_sc_td'),
						'default' => 9999,
					),
					'caption' => array(
						'name'    => 'caption',
						'type'    => 'textbox',
						'label'   => __('Caption', 'vp_sc_td'),
					),
					'width' => array(
						'name'    => 'width',
						'type'    => 'textbox',
						'label'   => __('Width (px / %)', 'vp_sc_td'),
						'default' => '100%',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_counter_color',
								),
							),
						),
						'default' => array(
							'strong',
						),
					),
					'color_custom' => array(
						'name'    => 'color',
						'type'    => 'color',
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'table' => array(
				'title'      => __('Table', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_table', $ol.'[table]'.$nl.'<table><tr><td>Cell 1</td><td>Cell 2</td></tr></table>'.$nl.'[/table]'),
				'attributes' => apply_filters('vp_sc_attributes_table', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_table_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),

			'tetimonial' => array(
				'title'     => __('Testimonial', 'qualia_td'),
				'code'       => apply_filters('vp_sc_code_testimonial', $ol.'[testimonial]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/testimonial]'),
				'attributes' => apply_filters('vp_sc_attributes_testimonial', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_testimonial_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'name' => array(
						'name'    => 'name',
						'type'    => 'textbox',
						'label'   => __('Name', 'vp_sc_td'),
					),
					'company' => array(
						'name'    => 'company',
						'type'    => 'textbox',
						'label'   => __('Company', 'vp_sc_td'),
					),
					'photo' => array(
						'name'    => 'photo',
						'type'    => 'upload',
						'label'   => __('Photo', 'vp_sc_td'),
					),
				)),
			),
		),
	),

	'Typography' => array(
		'elements' => array(

			'alert' => array(
				'title'      => __('Alert', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_alert', $ol.'[alert]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/alert]'),
				'attributes' => apply_filters('vp_sc_attributes_alert', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_alert_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'status' => array(
						'name'    => 'status',
						'type'    => 'select',
						'label'   => __('Status', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_alert_status',
								),
							),
						),
						'default' => array(
							'normal'
						),
					),
				)),
			),

			'button' => array(
				'title'      => __('Button', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_button', '[button]Anchor Text[/button]'),
				'attributes' => apply_filters('vp_sc_attributes_button', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_button_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'href' => array(
						'name'    => 'href',
						'type'    => 'textbox',
						'label'   => __('Target URL', 'vp_sc_td'),
						'default' => '#',
					),
					'background_color' => array(
						'name'    => 'background_color',
						'type'    => 'radioimage',
						'label'   => __('Background Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_button_background_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_button_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'size' => array(
						'name'    => 'size',
						'type'    => 'radiobutton',
						'label'   => __('Size', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_button_size',
								),
							),
						),
						'default' => array(
							'small',
						),
					),
				)),
			),

			'dropcap' => array(
				'title'      => __('Dropcap', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_dropcap', '[dropcap][/dropcap]'),
				'attributes' => apply_filters('vp_sc_attributes_dropcap', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_dropcap_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),

			'font_awesome' => array(
				'title'      => __('Font Awesome', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_font_awesome', '[font_awesome]'),
				'attributes' => apply_filters('vp_sc_attributes_font_awesome', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_font_awesome_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'icon' => array(
						'name'    => 'icon',
						'type'    => 'fontawesome',
						'label'   => __('Icon', 'vp_sc_td'),
					),
					'size' => array(
						'name'    => 'size',
						'type'    => 'radiobutton',
						'label'   => __('Size', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_font_awesome_size',
								),
							),
						),
						'default' => array(
							'1x',
						),
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Icon Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_font_awesome_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'highlight' => array(
				'title'      => __('Highlight', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_highlight', '[highlight][/highlight]'),
				'attributes' => apply_filters('vp_sc_attributes_highlight', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_dropcap_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'background_color' => array(
						'name'    => 'background_color',
						'type'    => 'radioimage',
						'label'   => __('Background Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_highlight_background_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Text Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_highlight_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'icon_list' => array(
				'title'      => __('Icon List', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_icon_list', $ol.'[icon_list]'.$nl.'Put "icon_list_item" here'.$nl.'[/icon_list]'),
				'attributes' => apply_filters('vp_sc_attributes_icon_list', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_dropcap_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),

			'icon_list_item' => array(
				'title'      => __('Icon List Item', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_icon_list_item', $ol.'[icon_list_item]'.$nl.__('Your content here', 'vp_sc_td').$nl.'[/icon_list_item]'),
				'attributes' => apply_filters('vp_sc_attributes_icon_list_item', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_icon_list_item_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
					'icon' => array(
						'name'    => 'icon',
						'type'    => 'fontawesome',
						'label'   => __('Icon', 'vp_sc_td'),
					),
					'color' => array(
						'name'    => 'color',
						'type'    => 'radioimage',
						'label'   => __('Icon Color', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_sc_source_font_awesome_color',
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
						'label'   => __('', 'vp_sc_td'),
						'format'  => 'rgba',
					),
				)),
			),

			'meta' => array(
				'title'      => __('Meta', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_meta', '[meta][/meta]'),
				'attributes' => apply_filters('vp_sc_attributes_meta', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_meta_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),

			'shout' => array(
				'title'      => __('Shout', 'vp_sc_td'),
				'code'       => apply_filters('vp_sc_code_shout', '[shout][/shout]'),
				'attributes' => apply_filters('vp_sc_attributes_shout', array(
					'mode' => array(
						'name'    => 'mode',
						'type'    => 'select',
						'label'   => __('Mode', 'vp_sc_td'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_sc_source_shout_mode',
								),
							),
						),
						'default' => array(
							'',
						),
					),
				)),
			),
		),
	),
);

/**
 * EOF
 */