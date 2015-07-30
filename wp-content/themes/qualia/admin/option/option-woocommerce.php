<?php

return array(
	'title' => __('Qualia WooCommerce Options', 'qualia_td'),
	'logo' => QUALIA_IMAGES . '/qualia-logo.png',
	'menus' => array(
		array(
			'title' => __('General', 'qualia_td'),
			'name' => 'menu_site',
			'icon' => 'font-awesome:fa-cog',
			'controls' => array(
				array(
					'type' => 'slider',
					'name' => 'thumbnail_image_height_ratio',
					'label' => __('Image Height Ratio', 'qualia_td'),
					'description' => __('Percentage relative to Image width. Example if you set it to 0.75 that means your thumbnail will have 4:3 ratio size', 'qualia_td'),
					'min' => '0.5',
					'max' => '2',
					'step' => '0.25',
					'default' => '0.75',
				),
				array(
					'type' => 'notebox',
					'label' => __('Making changes to Thumbnail Height Ratio', 'qualia_td'),
					'status' => 'warning',
					'description' => __('After you made changes on the thumbnail height ratio value, please regenerate your thumbnails using the included plugins "Force Regenerate Thumbnails".', 'qualia_td'),
				),
				array(
					'type' => 'upload',
					'name' => 'thumbnail_image_placeholder',
					'label' => __('Product Image Placeholder', 'qualia_td'),
				),
				array(
					'type' => 'textbox',
					'name' => 'product_sale_label',
					'label' => __('Product Sale Label', 'qualia_td'),
					'description' => __('Maximum **10** characters', 'qualia_td'),
					'validation' => 'required|maxlength[10]',
					'default' => __('Sale!', 'qualia_td'),
				),
				array(
					'type' => 'toggle',
					'name' => 'enable_cart_widget_on_header',
					'label' => __('Enable Cart Widget on Header', 'qualia_td'),
					'default' => '1',
				),
			),
		),
		array(
			'title' => __('Pages', 'qualia_td'),
			'name' => 'menu_site',
			'icon' => 'font-awesome:fa-file-text-o',
			'menus' => array(
				array(
					'title' => __('Catalog', 'qualia_td'),
					'name' => 'submenu_display_catalog',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'product_archive_sidebar_position',
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
							'type' => 'slider',
							'name' => 'product_archive_columns',
							'label' => __('Number of columns', 'qualia_td'),
							'min' => '2',
							'max' => '5',
							'default' => '4',
						),
						array(
							'type' => 'textbox',
							'name' => 'product_archive_posts_per_page',
							'label' => __('Posts per Page', 'qualia_td'),
							'description' => __('Input -1 to show all in one page', 'qualia_td'),
							'validation' => 'numeric|required',
							'default' => '10',
						),
						array(
							'type' => 'textbox',
							'name' => 'product_archive_title',
							'label' => __('Catalog Title', 'qualia_td'),
							'default' => __('Our Products', 'qualia_td'),
						),
						array(
							'type' => 'textbox',
							'name' => 'product_category_title',
							'description' => __('%s is for the category name', 'qualia_td'),
							'label' => __('Products Category Title', 'qualia_td'),
							'default' => 'Products Under: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'product_tag_title',
							'description' => __('%s is for the tag name', 'qualia_td'),
							'label' => __('Products Tag Title', 'qualia_td'),
							'default' => 'Products Tagged: %s',
						),
					),
				),
				array(
					'title' => __('Single Product', 'qualia_td'),
					'name' => 'submenu_display_single_product',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'radiobutton',
							'name' => 'product_single_sidebar_position',
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
							'type' => 'radiobutton',
							'name' => 'product_single_images_mode',
							'label' => __('Product Images Mode', 'qualia_td'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'qualia_woocommerce_source_product_single_images_mode',
									),
								),
							),
							'default' => array(
								'slider',
							),
						),
						array(
							'type' => 'section',
							'title' => __('Up-Sells', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'product_single_upsells_columns',
									'label' => __('Up-Sells columns', 'qualia_td'),
									'min' => '2',
									'max' => '5',
									'default' => '3',
								),
								array(
									'type' => 'textbox',
									'name' => 'product_single_upsells_posts_per_page',
									'label' => __('Up-Sells Posts per Page', 'qualia_td'),
									'description' => __('Input -1 to show all in one page', 'qualia_td'),
									'validation' => 'numeric|required',
									'default' => '3',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Related Products', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'enable_product_single_related',
									'label' => __('Show Related Posts', 'qualia_td'),
									'default' => '1',
								),
								array(
									'type' => 'slider',
									'name' => 'product_single_related_columns',
									'label' => __('Related Posts columns', 'qualia_td'),
									'min' => '2',
									'max' => '5',
									'default' => '3',
								),
								array(
									'type' => 'textbox',
									'name' => 'product_single_related_posts_per_page',
									'label' => __('Related Posts Posts per Page', 'qualia_td'),
									'description' => __('Input -1 to show all in one page', 'qualia_td'),
									'validation' => 'numeric|required',
									'default' => '3',
								),
								
							),
						),
						array(
							'type' => 'section',
							'title' => __('Call for Price', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'call_for_price_text',
									'label' => __('Call for Price Text', 'qualia_td'),
									'default' => 'Call for Price',
								),
								array(
									'type' => 'radiobutton',
									'name' => 'call_for_price_action',
									'label' => __('Call for Price Action', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'qualia_woocommerce_source_call_for_price_action',
											),
										),
									),
									'default' => 'contact-form',
								),
								array(
									'type' => 'select',
									'name' => 'call_for_price_page',
									'label' => __('Call for Price Page', 'qualia_td'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'vp_get_pages',
											),
										),
									),
									'dependency' => array(
										'field' => 'call_for_price_action',
										'function' => 'qualia_woocommerce_dep_call_for_price_contact_form',
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Cart', 'qualia_td'),
					'name' => 'submenu_display_cart',
					'icon' => 'font-awesome:fa-angle-right',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Related Products', 'qualia_td'),
							'fields' => array(
								array(
									'type' => 'slider',
									'name' => 'cross_sells_columns',
									'label' => __('Number of columns', 'qualia_td'),
									'min' => '2',
									'max' => '5',
									'default' => '3',
								),
								array(
									'type' => 'textbox',
									'name' => 'cross_sells_posts_per_page',
									'label' => __('Posts per Page', 'qualia_td'),
									'description' => __('Input -1 to show all in one page', 'qualia_td'),
									'validation' => 'numeric|required',
									'default' => '3',
								),
							),
						),
					),
				),
			),
		),
	),
);