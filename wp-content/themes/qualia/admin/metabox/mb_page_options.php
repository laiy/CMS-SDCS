<?php

return array(
	'id'          => '_page_options',
	'types'       => array_merge( array('page', 'post'), (class_exists( 'VP_Portfolio' ) ? array('portfolio') : array()) ),
	'title'       => __('Page Options', 'qualia_td'),
	'priority'    => 'core',
	'template'    => array(
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'body',
			'title'      => __('Overriding Body Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_body_settings',
					'label' => 'Override',
					'default' => 0,
				),
				array(
					'type' => 'radioimage',
					'name' => 'layout',
					'label' => __('Body Layout', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_body_layout',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_body_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'color',
					'name' => 'background_color',
					'label' => __('Background Color', 'qualia_td'),
					'format' => 'rgba',
					'dependency' => array(
						'field'    => 'is_override_body_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'       => 'group',
					'repeating'  => false,
					'length'     => 1,
					'name'       => 'background_image',
					'title'      => __('Background Image', 'qualia_td'),
					'dependency' => array(
						'field'    => 'is_override_body_settings',
						'function' => 'vp_dep_boolean',
					),
					'fields'     => array(
						array(
							'type' => 'radiobutton',
							'name' => 'mode',
							'label' => __('Mode', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_body_background_image_mode',
									),
								),
							),
						),
						array(
							'type' => 'radioimage',
							'name' => 'package',
							'label' => __('Background Image Pattern', 'qualia_td'),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_package',
							),
							'item_max_height' => 80,
							'item_max_width' => 80,
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_image_package',
									),
								),
							),
						),
						array(
							'type' => 'upload',
							'name' => 'custom_src',
							'label' => __('Custom Background Image', 'qualia_td'),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'custom_position',
							'label' => __('Background Position', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_position',
									),
								),
							),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'custom_attachment',
							'label' => __('Background Attachment', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_attachment',
									),
								),
							),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'custom_repeat',
							'label' => __('Background Repeat', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_repeat',
									),
								),
							),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'custom_size',
							'label' => __('Background Size', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_size',
									),
								),
							),
							'dependency' => array(
								'field' => 'mode',
								'function' => 'qualia_dep_body_background_image_mode_custom',
							),
						),
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'top_header',
			'title'      => __('Overriding Top Header Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_top_header_settings',
					'label' => 'Override',
					'default' => 0,
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_top_header',
					'label' => __('Enable Top Header', 'qualia_td'),
					'default' => 1,
					'dependency' => array(
						'field'    => 'is_override_top_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'select',
					'name' => 'color_set',
					'label' => __('Color Set', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_color_palette',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_top_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'header',
			'title'      => __('Overriding Header Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_header_settings',
					'label' => __('Override', 'qualia_td'),
					'default' => 0,
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_floating_header',
					'label' => __('Floating?', 'qualia_td'),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_floating_header',
					'label' => __('Floating?', 'qualia_td'),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'hide_one_page_header',
					'label' => __('Hide One Page Header', 'qualia_td'),
					'default' => '1',
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'radiobutton',
					'name'    => 'separator',
					'label'   => __('Separator', 'qualia_td'),
					'items'   => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_section_separator_style',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'is_using_logo_alt',
					'label' => __('Using Alternative Logo', 'qualia_td'),
					'default' => 0,
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'select',
					'name' => 'color_set',
					'label' => __('Color Set', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_color_palette',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'radiobutton',
					'name' => 'mode',
					'label' => __('Header Mode', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_header_mode',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'radiobutton',
					'name' => 'attachment',
					'label' => __('Header Attachment', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_header_attachment',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'color',
					'name' => 'absolute_background_color',
					'label' => __('Absolute Background Color', 'qualia_td'),
					'format' => 'rgba',
					'binding' => array(
						'field'    => 'color_set',
						'function' => 'qualia_value_binding_header_absolute_background_color',
					),
					'dependency' => array(
						'field'    => 'is_override_header_settings,attachment',
						'function' => 'qualia_dep_absolute_background_color',
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'sub_header',
			'title'      => __('Overriding Sub Header Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_sub_header_settings',
					'label' => 'Override',
					'default' => 0,
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_sub_header',
					'label' => 'Enable Sub Header',
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_breadcrumb',
					'label' => 'Enable Breadcrumb',
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'select',
					'name' => 'color_set',
					'label' => __('Color Set', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_color_palette',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'radiobutton',
					'name'    => 'separator',
					'label'   => __('Separator', 'qualia_td'),
					'items'   => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_section_separator_style',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'  => 'radiobutton',
					'name'  => 'mode',
					'label' => __('Sub Header Mode', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_sub_header_mode',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'slider',
					'name'    => 'top_spacing',
					'label'   => __('Top Spacing (px)', 'qualia_td'),
					'min'     => '0',
					'max'     => '500',
					'default' => '0',
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'slider',
					'name'    => 'bottom_spacing',
					'label'   => __('Bottom Spacing (px)', 'qualia_td'),
					'min'     => '0',
					'max'     => '500',
					'default' => '0',
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'       => 'group',
					'repeating'  => false,
					'length'     => 1,
					'name'       => 'background',
					'title'      => __('Background Image', 'qualia_td'),
					'fields'     => array(
						array(
							'type'    => 'upload',
							'name'    => 'image',
							'label'   => __('Background Image', 'qualia_td'),
						),
						array(
							'type'  => 'select',
							'name'  => 'position',
							'label' => __('Background Position', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_position',
									),
								),
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'attachment',
							'label' => __('Background Attachment', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_attachment',
									),
								),
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'repeat',
							'label' => __('Background Repeat', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_repeat',
									),
								),
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'size',
							'label' => __('Background Size', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_source_background_size',
									),
								),
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_sub_header_settings',
						'function' => 'vp_dep_boolean',
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'content',
			'title'      => __('Overriding Content Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_content_settings',
					'label' => 'Override',
					'description' => __('These settings will only work if you set the Page Template into "Default Template", otherwise it would obey the selected template\'s rules' , 'qualia_td'),
					'default' => 0,
				),
				array(
					'type'    => 'radiobutton',
					'name'    => 'separator',
					'label'   => __('Separator', 'qualia_td'),
					'items'   => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_section_separator_style',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_content_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'slider',
					'name'    => 'top_spacing',
					'label'   => __('Top Spacing (px)', 'qualia_td'),
					'min'     => '0',
					'max'     => '500',
					'default' => '0',
					'dependency' => array(
						'field'    => 'is_override_content_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'slider',
					'name'    => 'bottom_spacing',
					'label'   => __('Bottom Spacing (px)', 'qualia_td'),
					'min'     => '0',
					'max'     => '500',
					'default' => '0',
					'dependency' => array(
						'field'    => 'is_override_content_settings',
						'function' => 'vp_dep_boolean',
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'footer',
			'title'      => __('Overriding Footer Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_footer_settings',
					'label' => 'Override',
					'default' => 0,
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_footer',
					'label' => __('Enable Footer', 'qualia_td'),
					'dependency' => array(
						'field'    => 'is_override_footer_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'radiobutton',
					'name'    => 'separator',
					'label'   => __('Separator', 'qualia_td'),
					'items'   => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_section_separator_style',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_footer_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'select',
					'name' => 'color_set',
					'label' => __('Color Set', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_color_palette',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_footer_settings',
						'function' => 'vp_dep_boolean',
					),
				),
			),
		),
		array(
			'type'       => 'group',
			'repeating'  => false,
			'length'     => 1,
			'name'       => 'copyright',
			'title'      => __('Overriding Copyright Settings', 'qualia_td'),
			'fields'     => array(
				array(
					'type' => 'toggle',
					'name' => 'is_override_copyright_settings',
					'label' => 'Override',
					'default' => 0,
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_copyright',
					'label' => __('Enable Copyright', 'qualia_td'),
					'dependency' => array(
						'field'    => 'is_override_copyright_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type'    => 'radiobutton',
					'name'    => 'separator',
					'label'   => __('Separator', 'qualia_td'),
					'items'   => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_section_separator_style',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_copyright_settings',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'select',
					'name' => 'color_set',
					'label' => __('Color Set', 'qualia_td'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'qualia_source_color_palette',
							),
						),
					),
					'dependency' => array(
						'field'    => 'is_override_copyright_settings',
						'function' => 'vp_dep_boolean',
					),
				),
			),
		),
	),
);