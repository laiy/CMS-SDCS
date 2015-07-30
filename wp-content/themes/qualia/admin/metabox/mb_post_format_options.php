<?php

return array(
	'id'            => '_post_format_options',
	'types'         => array('post'),
	'title'         => __('Post Format Options', 'qualia_td'),
	'priority'      => 'high',
	'template'      => array(
		array(
			'type' => 'notebox',
			'name' => 'note_save_first',
			'label' => __('Please Save Your Changes First', 'qualia_td'),
			'description' => __('After you made changes to post format, please Save this post first otherwise the options below will still regard the last chosen post format', 'qualia_td'),
		),
		array(
			'type' => 'textbox',
			'name' => 'format_url',
			'label' => __('Format URL', 'qualia_td'),
			'validation' => 'url',
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_url',
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'format_link_url',
			'label' => __('Link URL', 'qualia_td'),
			'validation' => 'url',
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_link_url',
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'format_quote_source_url',
			'label' => __('Source URL', 'qualia_td'),
			'validation' => 'url',
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_quote_source_url',
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'format_quote_source_name',
			'label' => __('Source Name', 'qualia_td'),
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_quote_source_name',
			),
		),
		array(
			'type' => 'upload',
			'name' => 'format_image',
			'label' => __('Image', 'qualia_td'),
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_image',
			),
		),
		array(
			'type' => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'format_audio_embed',
			'title'     => __('Audio Embed', 'qualia_td'),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'mode',
					'label' => __('Embed Mode', 'qualia_td'),
					'items' => array(
						array(
							'label' => 'External',
							'value' => 'external',
						),
						array(
							'label' => 'Internal',
							'value' => 'internal',
						),
					),
				),
				array(
					'type' => 'textarea',
					'name' => 'external',
					'label' => __('Audio Embed Code', 'qualia_td'),
					'dependency' => array(
						'field' => 'mode',
						'function' => 'qualia_dep_post_format_audio_embed_external',
					),
				),
				array(
					'type' => 'upload',
					'name' => 'internal',
					'label' => __('Choose Audio', 'qualia_td'),
					'dependency' => array(
						'field' => 'mode',
						'function' => 'qualia_dep_post_format_audio_embed_internal',
					),
				),
			),
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_audio_embed',
			),
		),
		array(
			'type' => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'format_video_embed',
			'title'     => __('Video Embed', 'qualia_td'),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'mode',
					'label' => __('Embed Mode', 'qualia_td'),
					'items' => array(
						array(
							'label' => 'External',
							'value' => 'external',
						),
						array(
							'label' => 'Internal',
							'value' => 'internal',
						),
					),
				),
				array(
					'type' => 'textarea',
					'name' => 'external',
					'label' => __('Video Embed Code', 'qualia_td'),
					'dependency' => array(
						'field' => 'mode',
						'function' => 'qualia_dep_post_format_video_embed_external',
					),
				),
				array(
					'type' => 'upload',
					'name' => 'internal',
					'label' => __('Choose Video', 'qualia_td'),
					'dependency' => array(
						'field' => 'mode',
						'function' => 'qualia_dep_post_format_video_embed_internal',
					),
				),
				array(
					'type' => 'upload',
					'name' => 'internal_poster',
					'label' => __('Poster', 'qualia_td'),
					'description' => __('Optional. Define specific poster image to replace the default from the video', 'qualia_td'),
					'dependency' => array(
						'field' => 'mode',
						'function' => 'qualia_dep_post_format_video_embed_internal',
					),
				),
			),
			'dependency' => array(
				'field' => '',
				'function' => 'qualia_dep_post_format_video_embed',
			),
		),
	),
);