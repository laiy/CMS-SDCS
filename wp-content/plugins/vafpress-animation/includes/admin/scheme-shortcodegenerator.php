<?php

return array(

	'Shortcode' => array(
		'elements' => array(

			'animation' => array(
				'title'      => __('Animation', 'vp_animation'),
				'code'       => '[animation]Put elements you want to animate here[/animation]',
				'attributes' => array(
					array(
						'name'    => 'effect',
						'type'    => 'select',
						'label'   => __('Effect', 'vp_animation'),
						'items'   => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'vp_an_sc_source_animation',
								),
							),
						),
						'default' => 'fade-in',
					),
					array(
						'name'    => 'duration',
						'type'    => 'textbox',
						'label'   => __('Duration in seconds', 'vp_animation'),
						'default' => '1s',
					),
					array(
						'name'    => 'trigger',
						'type'    => 'select',
						'label'   => __('Trigger to Start', 'vp_animation'),
						'items'   => array(
							array(
								'label' => __('loaded', 'vp_animation'),
								'value' => 'loaded',
							),
							array(
								'label' => __('inview', 'vp_animation'),
								'value' => 'inview',
							),
							array(
								'label' => __('toggle hover', 'vp_animation'),
								'value' => 'togglehover',
							),
							array(
								'label' => __('hovered', 'vp_animation'),
								'value' => 'hovered',
							),
							array(
								'label' => __('toggle click', 'vp_animation'),
								'value' => 'toggle-click',
							),
							array(
								'label' => __('clicked', 'vp_animation'),
								'value' => 'clicked',
							),
						),
					),
					array(
						'name'    => 'delay',
						'type'    => 'textbox',
						'label'   => __('Delay', 'vp_animation'),
						'default' => '0s',
					),
					array(
						'name'    => 'iteration',
						'type'    => 'textbox',
						'label'   => __('Iteration (n or infinite)', 'vp_animation'),
						'default' => '1',
					),
					array(
						'name'    => 'full_container',
						'type'    => 'toggle',
						'label'   => __('Full Container?', 'vp_animation'),
						'default' => 0
					),
					array(
						'name'    => 'timing',
						'type'    => 'radiobutton',
						'label'   => __('Timing Function Preset', 'vp_animation'),
						'items'   => array(
							array(
								'label' => __('linear', 'vp_animation'),
								'value' => 'linear',
							),
							array(
								'label' => __('ease', 'vp_animation'),
								'value' => 'ease',
							),
							array(
								'label' => __('ease-in', 'vp_animation'),
								'value' => 'ease-in',
							),
							array(
								'label' => __('ease-out', 'vp_animation'),
								'value' => 'ease-out',
							),
							array(
								'label' => __('ease-in-out', 'vp_animation'),
								'value' => 'ease-in-out',
							),
						),
						'default' => 'ease',
					),
					array(
						'name'    => 'timing',
						'type'    => 'textbox',
						'label'   => __('Custom Timing Function Cubic Bezier (n,n,n,n)', 'vp_animation'),
					),
					array(
						'name'    => 'direction',
						'type'    => 'radiobutton',
						'label'   => __('Direction', 'vp_animation'),
						'items'   => array(
							array(
								'label' => __('normal', 'vp_animation'),
								'value' => '',
							),
							array(
								'label' => __('reverse', 'vp_animation'),
								'value' => 'reverse',
							),
							array(
								'label' => __('alternate', 'vp_animation'),
								'value' => 'alternate',
							),
							array(
								'label' => __('alternate-reverse', 'vp_animation'),
								'value' => 'alternate-reverse',
							),
						),
						'default' => array(
							'',
						),
					),
					array(
						'name'    => 'fill_mode',
						'type'    => 'radiobutton',
						'label'   => __('Fill Mode', 'vp_animation'),
						'items'   => array(
							array(
								'label' => __('none', 'vp_animation'),
								'value' => '',
							),
							array(
								'label' => __('forwards', 'vp_animation'),
								'value' => 'forwards',
							),
							array(
								'label' => __('backwards', 'vp_animation'),
								'value' => 'backwards',
							),
							array(
								'label' => __('both', 'vp_animation'),
								'value' => 'both',
							),
						),
						'default' => array(
							'forwards',
						),
					),
				),
			),
		),
	),

);

/**
 * EOF
 */