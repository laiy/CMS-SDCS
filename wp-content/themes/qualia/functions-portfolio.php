<?php

/**
 * Vafpress Portfolio Supports
 */

if( class_exists( 'VP_Portfolio' ) ):

	// load script and styles
	function qualia_vp_pf_shortcode_scripts($posts) {
		if ( empty($posts) )
			return $posts;
		if ( is_admin() )
			return $posts;

		$found = false;
		foreach ($posts as $post) {
			$use_pb = 1;
			$use_pb = vp_metabox('_page_builder.use_page_builder', false, $post->ID);
			if( ! $use_pb )
			{
				if ( stripos($post->post_content, '[portfolio') !== false ){
					$found = true;
					break;
				}
			}
			else
			{
				$sections = vp_metabox('_page_builder.sections', '', $post->ID);
				$sections = VP_Util_Array::deep_values($sections, 'content');
				$sections = implode(' ', $sections);
				if ( stripos($sections, '[portfolio') !== false ){
					$found = true;
				}
			}
		}

		if ($found){
			wp_enqueue_style( 'idangerous-swiper', QUALIA_CSS . 'idangerous.swiper.css' );
			wp_enqueue_script( 'idangerous-swiper', QUALIA_JS . 'idangerous.swiper-2.2.min.js', array('jquery'), '2.2' );
		}
		return $posts;
	}
	add_action('the_posts', 'qualia_vp_pf_shortcode_scripts');

	function qualia_sc_portfolio($atts, $content)
	{
		extract(shortcode_atts(array(
			'columns'         => 4,
			'posts_per_page'  => 12,
			'enable_filters'  => 'true',
			'mode'            => 'default',
			'pagination'      => '',
			'class'           => '',
			'category'        => '',
		), $atts));

		global $wp_query, $paged; $temp = $wp_query;

		$wp_query = new WP_Query(array_merge(
			array(
				'post_type'      => 'portfolio',
				'posts_per_page' => $posts_per_page,
				'paged'          => $paged,
				'portfolio_category'  => get_query_var('portfolio_category'),
			),
			(empty($category)) ? array() : array(
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'portfolio_category',
						'field'    => 'id',
						'terms'    => explode(',', $category),
						'operator' => 'IN'
					)
				)
			)
		));

		ob_start(); ?>
		<?php include( locate_template( 'loop-portfolio.php' ) ); ?>
		<?php $wp_query = $temp; wp_reset_postdata(); ?>
		<?php return ob_get_clean();
	}

	remove_shortcode( 'portfolio' );
	add_shortcode( 'portfolio', 'qualia_sc_portfolio' );

	add_filter( 'vp_pf_sc_attributes_portfolio', 'qualia_portfolio_sc_attributes' );

	function qualia_portfolio_sc_attributes($attributes)
	{
		$attribs     = array(
			array(
				'name'    => 'columns',
				'type'    => 'slider',
				'label'   => 'Columns',
				'default' => 4,
				'min'     => 2,
				'max'     => 5,
			),
			array(
				'name'    => 'enable_filters',
				'type'    => 'toggle',
				'label'   => 'Enable Filters',
				'default' => 1,
			),
		);
		$attributes = array_merge( $attribs, $attributes );

		return $attributes;
	}

	add_filter( 'vp_pf_sc_source_mode', 'qualia_source_portfolio_mode' );
	add_filter( 'vp_pf_sc_source_pagination_mode', 'qualia_source_portfolio_pagination' );

	function qualia_portfolio_per_page( $query ) {
		if ( $query->is_main_query() and $query->get('post_type') === 'portfolio' and !is_admin() )
		{
			$per_page = vp_pf_option('qualia_posts_per_page', 12);
			$query->set( 'posts_per_page', $per_page );
		}
	}
	add_action( 'pre_get_posts', 'qualia_portfolio_per_page' );

	add_filter( 'vp_pf_options_array', 'qualia_portolio_options' );

	function qualia_portolio_options($options)
	{
		$sections = array(
			array(
				'type' => 'section',
				'title' => __('Qualia Portfolio Archive', 'qualia_td'),
				'fields' => array(
					array(
						'type' => 'slider',
						'name' => 'qualia_columns',
						'label' => __('Portfolio columns', 'qualia_td'),
						'min' => '2',
						'max' => '5',
						'default' => '4',
					),
					array(
						'type' => 'textbox',
						'name' => 'qualia_posts_per_page',
						'label' => __('Posts per Page', 'qualia_td'),
						'description' => __('Input -1 to show all in one page', 'qualia_td'),
						'validation' => 'numeric|required',
						'default' => '12',
					),
					array(
						'type' => 'toggle',
						'name' => 'qualia_enable_filters',
						'label' => __('Enable Filters', 'qualia_td'),
						'default' => '1',
					),
					array(
						'type' => 'radiobutton',
						'name' => 'qualia_pagination',
						'label' => __('Pagination Mode', 'qualia_td'),
						'items' => array(
							array(
								'value' => '0',
								'label' => __('disabled', 'qualia_td'),
							),
							array(
								'value' => 'load-more',
								'label' => __('load more', 'qualia_td'),
							),
							array(
								'value' => 'page',
								'label' => __('page', 'qualia_td'),
							),
						),
						'default' => array(
							'load-more',
						),
					),
					array(
						'type' => 'radiobutton',
						'name' => 'qualia_mode',
						'label' => __('Item Info Mode', 'qualia_td'),
						'items' => array(
							array(
								'value' => 'default',
								'label' => __('Default', 'qualia_td'),
							),
							array(
								'value' => 'invisible',
								'label' => __('Invisible', 'qualia_td'),
							),
							array(
								'value' => 'overlay',
								'label' => __('Overlay', 'qualia_td'),
							),
							array(
								'value' => 'flip',
								'label' => __('Flip', 'qualia_td'),
							),
						),
						'default' => array(
							'flip',
						),
					),
					array(
						'type' => 'slider',
						'name' => 'qualia_grid_gap',
						'label' => __('Grid Gap', 'qualia_td'),
						'description' => __('Gap in px', 'qualia_td'),
						'min' => '0',
						'max' => '40',
						'step' => '2',
						'default' => '2',
					),
					array(
						'type' => 'notebox',
						'label' => __('Making changes to Grid Gap', 'qualia_td'),
						'status' => 'warning',
						'description' => __('After you made changes on the grid gap value, please do save on your theme options, otherwise, the new grid gap won\'t affect in the front end.', 'qualia_td'),
					),
					array(
						'type' => 'textbox',
						'name' => 'qualia_home_title',
						'label' => __('Home Title', 'qualia_td'),
						'default' => 'Our Portfolios',
						'validation' => 'required',
					),
					array(
						'type' => 'textbox',
						'name' => 'qualia_category_title',
						'label' => __('Portfolio Category Archive Title', 'qualia_td'),
						'description' => __('The first &quot;%s&quot; inserted will be replaced with the current term archive', 'qualia_td'),
						'default' => 'Our Portfolios Under %s:',
						'validation' => 'required',
					),
					array(
						'type' => 'textbox',
						'name' => 'qualia_tag_title',
						'label' => __('Portfolio Tag Archive Title', 'qualia_td'),
						'description' => __('The first &quot;%s&quot; inserted will be replaced with the current term archive', 'qualia_td'),
						'default' => 'Our Portfolio Tagged Under: %s',
						'validation' => 'required',
					),
				),
			),
			array(
				'type' => 'section',
				'title' => __('Qualia Portfolio Single Page', 'qualia_td'),
				'fields' => array(
					array(
						'type'       => 'radiobutton',
						'name'       => 'qualia_single_detail_mode',
						'label'      => __('Detail Section Mode', 'qualia_td'),
						'items'      => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'qualia_source_portfolio_single_detail',
								),
							),
						),
						'default'    => array(
							'left',
						),
					),
					array(
						'type'       => 'radiobutton',
						'name'       => 'qualia_single_image_mode',
						'label'      => __('Image Section Mode', 'qualia_td'),
						'items'      => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'qualia_source_portfolio_single_image',
								),
							),
						),
						'default'    => array(
							'default',
						),
					),
				),
			),
		);
		$menu     = array(
			'name'     => 'qualia_display',
			'title'    => __('Qualia Display', 'qualia_td'),
			'icon'     => 'font-awesome:fa-eye',
			'controls' => $sections,
		);
		array_unshift($options['menus'], $menu);
		return $options;
	}

	// Options Metabox

	add_action( 'after_setup_theme', 'qualia_portfolio_metabox' );

	function qualia_portfolio_metabox()
	{
		$options_mb_template = array(
			array(
				'type' => 'toggle',
				'name' => 'is_override_display',
				'label' => 'Override',
				'default' => 0,
			),
			array(
				'type'       => 'radiobutton',
				'name'       => 'detail_mode',
				'label'      => __('Detail Section Mode', 'qualia_td'),
				'items'      => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_source_portfolio_single_detail',
						),
					),
				),
				'dependency' => array(
					'field'    => 'is_override_display',
					'function' => 'vp_dep_boolean',
				),
			),
			array(
				'type'       => 'radiobutton',
				'name'       => 'image_mode',
				'label'      => __('Images Display Mode', 'qualia_td'),
				'items'      => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'qualia_source_portfolio_single_image',
						),
					),
				),
				'dependency' => array(
					'field'    => 'is_override_display',
					'function' => 'vp_dep_boolean',
				),
			),
		);
		new VP_Metabox(array(
			'id'          => '_vp_portfolio_options',
			'types'       => array('portfolio'),
			'title'       => __('Portfolio Options', 'qualia_td'),
			'template'    => $options_mb_template,
		));
	}

endif;


/**
 * EOF
 */