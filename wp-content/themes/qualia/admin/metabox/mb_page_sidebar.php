<?php

return array(
	'id'          => '_page_sidebar',
	'types'       => array('page'),
	'title'       => __('Sidebar Settings', 'qualia_td'),
	'context'     => 'side',
	'template'    => array(

		array(
			'type'        => 'select',
			'name'        => 'sidebar_position',
			'label'       => __('Sidebar Mode', 'qualia_td'),
			'description' => __('This options only affect when Page Template is set to "Default Template"', 'qualia_td'),
			'items'       => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'qualia_source_sidebar_position',
					),
				),
			),
			'default'     => array(
				'',
			),
		),
	),
	'exclude_template' => array('page-template-multi-sections.php', 'page-template-one-page.php'),
);