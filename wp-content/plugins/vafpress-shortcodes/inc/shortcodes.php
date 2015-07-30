<?php

/**
 * LAYOUT
 * ========================================================================
 */

add_shortcode('section', 'vp_sc_render_section');
function vp_sc_render_section($atts, $content = null) {
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
	), $atts));

	$background_color_class = vp_sc_grant_class($background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_section_background_color(), 'value'));
	$color_class            = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_section_color(), 'value'));
	$style = vp_sc_build_inline_style(array(
		((empty($background_color_class)) ? "background-color: " . VP_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		((!empty($background_image)) ? "background-image: url(" . $background_image . ");" : ""),
		((!empty($background_position)) ? "background-position: " . $background_position . ";" : ""),
		((!empty($background_attachment)) ? "background-attachment: " . $background_attachment . ";" : ""),
		((!empty($background_repeat)) ? "background-repeat: " . $background_repeat . ";" : ""),
		((!empty($background_size)) ? "background-size: " . $background_size . ";" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<section <?php echo vp_sc_build_class(array("vp-section", "content", $class)); echo $style; ?>>
		<div class="section-inner">
			<?php echo do_shortcode($content); ?>
		</div>
	</section>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_section', $html, $atts, $content);
}

add_shortcode('row', 'vp_sc_render_row');
for ($i = 2; $i <= 5; $i++) add_shortcode("row_{$i}", 'vp_sc_render_row');
function vp_sc_render_row($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array('vp-grids', $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render
	
	return apply_filters('vp_sc_render_row', $html, $atts, $content);
}

add_shortcode('column', 'vp_sc_render_column');
for ($i = 2; $i <= 5; $i++) add_shortcode("column_{$i}", 'vp_sc_render_column');
function vp_sc_render_column($atts, $content = null) {
	extract(shortcode_atts(array(
		'grid'   => 12,
		'offset' => 0,
		'class'  => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-grid-$grid", "vp-offset-$offset", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_column', $html, $atts, $content);
}

add_shortcode('box', 'vp_sc_render_box');
function vp_sc_render_box($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'                  => 'default',
		'background_color'      => 'transparent',
		'color'                 => 'inherit',
		'class'                 => '',
	), $atts));

	$background_color_class = vp_sc_grant_class($background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_box_background_color(), 'value'));
	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_box_color(), 'value'));
	$style = vp_sc_build_inline_style(array(
		((empty($background_color_class)) ? "background-color: " . VP_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-box", $background_color_class, $color_class, "vp-mode-$mode", $class)); echo $style; ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_box', $html, $atts, $content);
}

add_shortcode('spacer', 'vp_sc_render_spacer');
function vp_sc_render_spacer($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'size'  => 0,
		'class' => '',
	), $atts));

	$size = vp_sc_grant_default_unit($size, 'px');

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-spacer", "vp-mode-$mode", $class)); ?> style="padding-top: <?php echo $size; ?>;"></div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_spacer', $html, $atts, $content);
}

add_shortcode('div', 'vp_sc_render_div');
for ($i = 2; $i <= 5; $i++) add_shortcode("div_{$i}", 'vp_sc_render_div');
function vp_sc_render_div($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div class="<?php echo $class; ?>">
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_div', $html, $atts, $content);
}

add_shortcode('span', 'vp_sc_render_span');
for ($i = 2; $i <= 5; $i++) add_shortcode("span_{$i}", 'vp_sc_render_span');
function vp_sc_render_span($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<span class="<?php echo $class; ?>">
		<?php echo do_shortcode($content); ?>
	</span>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_span', $html, $atts, $content);
}


/**
 * PANELS
 * ========================================================================
 */

add_shortcode('accordion', 'vp_sc_render_accordion');
function vp_sc_render_accordion($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'          => 'default',
		'open_multiple' => 'false',
		'class'         => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<ul<?php echo vp_sc_build_class(array("vp-accordion", "vp-js-accordion", "vp-mode-$mode", $class)); ?> data-openmultiple="<?php echo $open_multiple; ?>">
		<?php echo do_shortcode($content); ?>
	</ul>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_accordion', $html, $atts, $content);
}

add_shortcode('accordion_pane', 'vp_sc_render_accordion_pane');
function vp_sc_render_accordion_pane($atts, $content = null) {
	extract(shortcode_atts(array(
		'heading' => '',
		'default' => 'false',
		'class'   => '',
	), $atts));

	$default_class = ($default === 'true') ? 'vp-active' : '';

	// Begin Render
	ob_start(); ?>
	<li<?php echo vp_sc_build_class(array("vp-accordion-pane", $default_class, $class)); ?>>
		<div class="vp-accordion-pane-heading">
			<a href="#">
				<span><?php echo do_shortcode($heading); ?></span>
				<i class="fa fa-plus"></i><i class="fa fa-minus"></i>
			</a>
		</div>
		<div class="vp-accordion-pane-core"><?php echo do_shortcode($content); ?></div>
	</li>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_accordion_pane', $html, $atts, $content);
}

add_shortcode('sidebar', 'vp_sc_render_sidebar');
function vp_sc_render_sidebar($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'name'  => '',
		'class' => '',
	), $atts));

	if (!current_theme_supports('widgets')) {
		add_theme_support('widgets');
	}

	// Begin Render
	ob_start(); ?>
	<aside<?php echo vp_sc_build_class(array("vp-sidebar", "vp-mode-$mode", $class)); ?>>
		<?php dynamic_sidebar($name); ?>
	</aside>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_sidebar', $html, $atts, $content);
}

add_shortcode('tabs', 'vp_sc_render_tabs');
function vp_sc_render_tabs($atts, $content = null) {
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
			<li><a href="#" data-index="<?php echo $i + 1; ?>"><?php echo trim($n['heading']); ?></a></li>
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

add_shortcode('tab', 'vp_sc_render_tab');
function vp_sc_render_tab($atts, $content = null) {
	extract(shortcode_atts(array(
		'heading' => '',
		'class'   => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-tab", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_tab', $html, $atts, $content);
}


/**
 * DATA PRESENTATION
 * ========================================================================
 */

add_shortcode('blog', 'vp_sc_render_blog');
function vp_sc_render_blog($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'           => 'default',
		'posts_per_page' => 10,
		'pagination'     => 'page',
		'class'          => '',
	), $atts));

	// Temporary replace the global WP Query
	global $wp_query, $paged, $more;
	$temp_query = $wp_query;
	$temp_more = $more; $more = 0;
	$wp_query = new WP_Query(array(
		'post_type'      => 'post',
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
	));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-blog", "vp-mode-$mode", $class)); ?>>

		<?php if (have_posts()) : ?>
		<div class="vp-blog-loop">
		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class("vp-blog-post vp-clear"); ?>>
				<?php if (has_post_thumbnail()) : ?>
				<div class="vp-blog-post-thumbnail vp-left">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
				<?php endif; ?>
				
				<div class="vp-blog-post-summary vp-fill-rest">
					<h2 class="vp-blog-post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="vp-blog-post-meta vp-meta">
					</div>
					<div class="vp-blog-post-excerpt">
						<?php echo do_shortcode(vp_sc_strip_shortcode('blog', get_the_content(__('Read More...', 'vp_sc_td')))); ?>
					</div>
					<div class="vp-blog-post-meta vp-meta">
						<?php printf(__('Posted on %s, by %s, under %s, %s comment(s)', 'vp_sc_td'),
							get_the_time('F j, Y'),
							get_the_author_link(),
							get_the_term_list(get_the_ID(), 'category', '', ', ', ''),
							get_the_term_list(get_the_ID(), 'post_tag', '', ', ', ''),
							get_comments_number()); ?>
						 | <?php comments_number(__('No Comments', 'vp_sc_td'), __('1 Comment', 'vp_sc_td'), __('% Comments', 'vp_sc_td')); ?>
						<br/>
						<?php the_terms(get_the_ID(), 'post_tag', __('Tags: ', 'vp_sc_td'), ', ', ''); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php endif; ?>

		<?php if ($pagination == 'page') : ?>
		<div class="vp-blog-pagination vp-clear">
			<div class="vp-left"><?php previous_posts_link(); ?></div>
			<div class="vp-right"><?php next_posts_link(); ?></div>
		</div>
		<?php endif; ?>

	</div>
	<?php $wp_query = $temp_query; wp_reset_postdata(); $more = $temp_more;
	$html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_blog', $html, $atts, $content);
}

add_shortcode('google_maps', 'vp_sc_render_google_maps');
function vp_sc_render_google_maps($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'      => 'default',
		'address'   => '',
		'latlng'    => '',
		'zoom'      => 16,
		'height'    => '200px',
		'width'     => '100%',
		'icon'      => '',
		'class'     => '',
	), $atts));

	$height = vp_sc_grant_default_unit($height, 'px');
	$width = vp_sc_grant_default_unit($width, 'px');

	wp_enqueue_script('google-maps');

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-google-maps", "vp-js-google-maps", "vp-mode-$mode", $class)); ?>
			style="min-height: <?php echo $height; ?>; width: <?php echo $width; ?>"
			data-latlng="<?php echo $latlng; ?>" data-address="<?php echo $address; ?>"
			data-zoom="<?php echo $zoom; ?>" data-icon="<?php echo $icon; ?>">
		<div class="vp-map">
			<div class="vp-map-canvas"></div>
		</div>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_google_maps', $html, $atts, $content);
}

add_shortcode('point_block', 'vp_sc_render_point_block');
function vp_sc_render_point_block($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'       => 'default',
		'icon'       => '',
		'icon_color' => 'inherit',
		'image'      => '',
		'title'      => '',
		'class'      => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-point-block", "vp-mode-$mode", $class)); ?>>
		<div class="vp-point-block-image">
			<?php if (!empty($image)) : ?>
			<img src="<?php echo $image; ?>" />
			<?php else : ?>
			<?php echo vp_sc_render_font_awesome(array(
				'icon'       => $icon,
				'size'       => '3x',
				'color'      => $icon_color,
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
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_point_block', $html, $atts, $content);
}

add_shortcode('point_block_image', 'vp_sc_render_point_block_image');
function vp_sc_render_point_block_image($atts, $content = null) {

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-point-block-image", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_point_block_image', $html, $atts, $content);
}

add_shortcode('pricing_table', 'vp_sc_render_pricing_table');
function vp_sc_render_pricing_table($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-pricing-table", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_pricing_table', $html, $atts, $content);
}

add_shortcode('pricing_column', 'vp_sc_render_pricing_column');
function vp_sc_render_pricing_column($atts, $content = null) {
	extract(shortcode_atts(array(
		'name'                      => '',
		'currency'                  => '',
		'nominal'                   => '',
		'period'                    => '',
		'action_button'             => '',
		'action_url'                => '',
		'action_text'               => '',
		'accent_background_color'   => 'info',
		'accent_color'              => 'white',
		'featured'                  => 'false',
		'featured_text'             => '',
		'class'                     => '',
	), $atts));

	$featured_class = ($featured === 'true') ? 'vp-featured' : '';

	$accent_background_color_class = vp_sc_grant_class($accent_background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_pricing_column_accent_background_color(), 'value'));
	$accent_color_class = vp_sc_grant_class($accent_color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_pricing_column_accent_color(), 'value'));
	$accent_style = vp_sc_build_inline_style(array(
		((empty($accent_background_color_class)) ? "background-color: " . VP_Color::parse($accent_background_color, 'rgb') . "; background-color: $accent_background_color;" : ""),
		((empty($accent_color_class)) ? "color: " . VP_Color::parse($accent_color, 'rgb') . "; color: $accent_color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-pricing-column", $featured_class, $class)); ?>>
		<?php if (!empty($featured_text)) : ?>
		<span<?php echo vp_sc_build_class(array("vp-pricing-column-featured")); echo $featured_style; ?>>
			<?php echo $featured_text; ?>
		</span>
		<?php endif; ?>
		<div<?php echo vp_sc_build_class(array("vp-pricing-column-name", $accent_background_color_class, $accent_color_class)); echo $accent_style; ?>>
			<?php echo $name; ?>
		</div>
		<div class="vp-pricing-column-price">
			<span class="vp-pricing-column-price-currency"><?php echo $currency; ?></span>
			<span class="vp-pricing-column-price-nominal"><?php echo $nominal; ?></span>
			<span class="vp-pricing-column-price-period"><?php echo $period; ?></span>
		</div>
		<?php echo str_replace('<ul', '<ul class="vp-pricing-column-details"', do_shortcode($content)); ?>
		<?php if ($action_button === 'true') : ?>
		<div class="vp-pricing-column-action">
			<?php echo vp_sc_render_button(array(
				'mode'             => 'default',
				'href'             => $action_url,
				'background_color' => $accent_background_color,
				'color'            => $accent_color,
				'size'             => 'medium',
				'class'            => '',
			), $action_text); ?>
		</div>
		<?php endif; ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_pricing_column', $html, $atts, $content);
}

add_shortcode('progress_bar', 'vp_sc_render_progress_bar');
function vp_sc_render_progress_bar($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'             => 'default',
		'min'              => 0,
		'max'              => 100,
		'value'            => 100,
		'caption'          => '',
		'label'            => 'value',
		'featured'         => 'false',
		'animated'         => 'true',
		'width'            => '100%',
		'track_color'      => 'transparent',
		'fill_color'       => 'info',
		'color'            => 'white',
		'class'            => '',
	), $atts));

	$width = vp_sc_grant_default_unit($width, 'px');
	$percent = vp_sc_calculate_percentage($min, $max, $value, 2);

	$label_value = '';
	switch ($label) {
		case 'percent': $label_value = $percent; break;
		case 'value': $label_value = $value; break;
	}

	$featured_class = ($featured === 'true') ? 'vp-featured' : '';

	$fill_color_class = vp_sc_grant_class($fill_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_progress_bar_fill_color(), 'value'));
	$track_color_class = vp_sc_grant_class($track_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_progress_bar_track_color(), 'value'));
	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_progress_bar_color(), 'value'));
	$track_style = vp_sc_build_inline_style(array(
		((empty($track_color_class)) ? "background-color: " . VP_Color::parse($track_color, 'rgb') . "; background-color: $track_color;" : ""),
	));
	$thumb_style = vp_sc_build_inline_style(array(
		((empty($fill_color_class)) ? "background-color: " . VP_Color::parse($fill_color, 'rgb') . "; background-color: $fill_color;" : ""),
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
		"width: $percent;",
	));

	// Begin Render
	ob_start(); ?>
	<figure<?php echo vp_sc_build_class(array("vp-progress-bar", "vp-js-progress-bar", $featured_class, "vp-mode-$mode", $class)); ?>
			data-value="<?php echo $value; ?>" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>"
			data-label="<?php echo $label; ?>" data-animated="<?php echo $animated; ?>" style="width: <?php echo $width; ?>">
		<div<?php echo vp_sc_build_class(array("vp-progress-bar-track", $track_color_class)); echo $track_style; ?>>
			<div<?php echo vp_sc_build_class(array("vp-progress-bar-thumb", $fill_color_class, $color_class)); echo $thumb_style; ?>>
				<?php if (!empty($caption)) : ?>
				<figcaption class="vp-progress-bar-caption" title="<?php echo $caption; ?>"><?php echo $caption; ?></figcaption>
				<?php else : ?>
				<div class="vp-progress-bar-caption"></div>
				<?php endif; ?>
				<span class="vp-progress-bar-label"><?php echo $label_value; ?></span>
			</div>
		</div>
	</figure>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_progress_bar', $html, $atts, $content);
}

add_shortcode('progress_ring', 'vp_sc_render_progress_ring');
function vp_sc_render_progress_ring($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'             => 'default',
		'min'              => 0,
		'max'              => 100,
		'value'            => 100,
		'caption'          => '',
		'label'            => 'value',
		'animated'         => 'true',
		'diameter'         => '100%',
		'thickness'        => 0.2,
		'track_color'      => 'transparent',
		'fill_color'       => 'info',
		'color'            => 'white',
		'class'            => '',
	), $atts));

	wp_enqueue_script('jquery-knob');

	$diameter = vp_sc_grant_default_unit($diameter, 'px');
	$percent = vp_sc_calculate_percentage($min, $max, $value, 2);

	switch ($label) {
		case 'percent': $label_value = $percent; break;
		case 'value': $label_value = $value; break;
		default: $label_value = ''; break;
	}

	$fill_color_class = vp_sc_grant_class($fill_color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_progress_ring_fill_color(), 'value'));
	$fill_color_style = vp_sc_build_inline_style(array(
		((empty($fill_color_class)) ? "color: " . VP_Color::parse($fill_color, 'rgb') . "; color: $fill_color;" : ""),
	));

	$track_color_class = vp_sc_grant_class($track_color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_progress_ring_track_color(), 'value'));
	$track_color_style = vp_sc_build_inline_style(array(
		((empty($track_color_class)) ? "color: " . VP_Color::parse($track_color, 'rgb') . "; color: $track_color;" : ""),
	));

	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_progress_ring_color(), 'value'));
	$color_style = vp_sc_build_inline_style(array(
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<figure<?php echo vp_sc_build_class(array("vp-progress-ring", "vp-js-progress-ring", "vp-mode-$mode", $class)); ?>
			data-value="<?php echo $value; ?>" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>"
			data-label="<?php echo $label; ?>" data-animated="<?php echo $animated; ?>" data-thickness="<?php echo $thickness; ?>"
			data-trackcolor="<?php echo $track_color; ?>" data-backgroundcolor="<?php echo $fill_color; ?>" data-color="<?php echo $color; ?>"
			style="width: <?php echo $diameter; ?>;">
		<div class="vp-progress-ring-canvas">
			<input value="<?php echo $value; ?>" readonly type="text" autocomplete="off">
		</div>
		<div<?php echo vp_sc_build_class(array("vp-dummy-background-color", $fill_color_class)); echo $fill_color_style; ?>></div>
		<div<?php echo vp_sc_build_class(array("vp-dummy-track-color", $track_color_class)); echo $track_color_style; ?>></div>
		<div<?php echo vp_sc_build_class(array("vp-dummy-color", $color_class)); echo $color_style; ?>></div>
		<?php if (!empty($caption)) : ?>
		<figcaption class="vp-progress-ring-caption">
			<?php echo $caption; ?>
		</figcaption>
		<?php endif; ?>
	</figure>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_progress_ring', $html, $atts, $content);
}

add_shortcode('counter', 'vp_sc_render_counter');
function vp_sc_render_counter($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'             => 'default',
		'begin'            => 0,
		'end'              => 9999,
		'caption'          => '',
		'width'            => '100%',
		'color'            => 'strong',
		'class'            => '',
	), $atts));

	$width       = vp_sc_grant_default_unit($width, 'px');
	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_counter_color(), 'value'));
	$color_style = vp_sc_build_inline_style(array(
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-counter", "vp-js-counter", "vp-mode-$mode", $class)); ?>
			data-begin="<?php echo $begin; ?>" data-end="<?php echo $end; ?>" style="width: <?php echo $width; ?>">
		<div<?php echo vp_sc_build_class(array("vp-counter-value", $color_class)); echo $color_style; ?>>
			<?php echo $begin; ?>
		</div>
		<?php if (!empty($caption)) : ?>
		<div class="vp-counter-caption">
			<?php echo $caption; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_counter', $html, $atts, $content);
}

add_shortcode('table', 'vp_sc_render_table');
function vp_sc_render_table($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-table", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_table', $html, $atts, $content);
}

add_shortcode('testimonial', 'vp_sc_render_testimonial');
function vp_sc_render_testimonial($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'    => 'default',
		'name'    => '',
		'company' => '',
		'photo'   => '',
		'class'   => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-testimonial", "vp-mode-$mode", $class)); ?>>
		<div class="vp-testimonial-photo">
			<img src="<?php echo $photo; ?>" alt="<?php echo $name; ?>" />
		</div>
		
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
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_testimonial', $html, $atts, $content);
}


/**
 * TYPOGRAPHY
 * ========================================================================
 */

add_shortcode('alert', 'vp_sc_render_alert');
function vp_sc_render_alert($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'   => 'default',
		'status' => 'normal',
		'class'  => '',
	), $atts));

	$icon = '';
	switch ($status) {
		case 'info'   : $icon = 'fa-info-circle'; break;
		case 'warning': $icon = 'fa-exclamation-circle'; break;
		case 'error'  : $icon = 'fa-times-circle'; break;
		case 'success': $icon = 'fa-check-circle'; break;
		default       : $icon = 'fa-flag'; break;
	}

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-alert", "vp-alert-$status", "vp-mode-$mode", $class)); ?>>
		<i<?php echo vp_sc_build_class(array("fa", $icon, "vp-alert-icon")); ?>></i>
		<a href="#"<?php echo vp_sc_build_class(array("vp-alert-close", "vp-js-alert-close")); ?>><i class="fa fa-times"></i></a>
		<div class="vp-alert-content">
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_alert', $html, $atts, $content);
}

add_shortcode('button', 'vp_sc_render_button');
function vp_sc_render_button($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'             => 'default',
		'href'             => '',
		'background_color' => 'info',
		'color'            => 'white',
		'size'             => 'small',
		'class'            => '',
	), $atts));

	$background_color_class = vp_sc_grant_class($background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_button_background_color(), 'value'));
	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_button_color(), 'value'));
	$style = vp_sc_build_inline_style(array(
		((empty($background_color_class)) ? "background-color: " . VP_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<a href="<?php echo $href; ?>"<?php echo vp_sc_build_class(array("vp-button", "vp-button-$size", $background_color_class, $color_class, "vp-mode-$mode", $class)); echo $style; ?>>
		<?php echo do_shortcode($content); ?>
	</a>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_button', $html, $atts, $content);
}

add_shortcode('divider', 'vp_sc_render_divider');
function vp_sc_render_divider($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'align' => 'center',
		'width' => '100%',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<div<?php echo vp_sc_build_class(array("vp-divider", "vp-clear", "vp-mode-$mode", $class)); ?>>
		<hr class="<?php echo "vp-$align"; ?>" style="width: <?php echo $width; ?>" />
	</div>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_divider', $html, $atts, $content);
}

add_shortcode('dropcap', 'vp_sc_render_dropcap');
function vp_sc_render_dropcap($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<span<?php echo vp_sc_build_class(array("vp-dropcap", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</span>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_dropcap', $html, $atts, $content);
}

add_shortcode('font_awesome', 'vp_sc_render_font_awesome');
function vp_sc_render_font_awesome($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'       => 'default',
		'icon'       => '',
		'size'       => '1x',
		'color'      => 'inherit',
		'class'      => '',
	), $atts));

	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_font_awesome_color(), 'value'));
	$color_style = vp_sc_build_inline_style(array(
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));
	// Begin Render
	ob_start(); ?>
	<i<?php echo vp_sc_build_class(array("vp-font-awesome", "fa", $icon, "fa-$size", $color_class, "vp-mode-$mode", $class)); echo $color_style; ?>></i>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_font_awesome', $html, $atts, $content);
}

add_shortcode('highlight', 'vp_sc_render_highlight');
function vp_sc_render_highlight($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'             => 'default',
		'background_color' => 'info',
		'color'            => 'white',
		'class'            => '',
	), $atts));

	$background_color_class = vp_sc_grant_class($background_color, 'vp-background-%', vp_sc_deep_values(vp_sc_source_highlight_background_color(), 'value'));
	$color_class = vp_sc_grant_class($color, 'vp-color-%', vp_sc_deep_values(vp_sc_source_highlight_color(), 'value'));
	$style = vp_sc_build_inline_style(array(
		((empty($background_color_class)) ? "background-color: " . VP_Color::parse($background_color, 'rgb') . "; background-color: $background_color;" : ""),
		((empty($color_class)) ? "color: " . VP_Color::parse($color, 'rgb') . "; color: $color;" : ""),
	));

	// Begin Render
	ob_start(); ?>
	<span<?php echo vp_sc_build_class(array("vp-highlight", $background_color_class, $color_class, "vp-mode-$mode", $class)); echo $style; ?>>
		<?php echo do_shortcode($content); ?>
	</span>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_highlight', $html, $atts, $content);
}

add_shortcode('icon_list', 'vp_sc_render_icon_list');
function vp_sc_render_icon_list($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<ul<?php echo vp_sc_build_class(array("vp-icon-list", "fa-ul", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</ul>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_icon_list', $html, $atts, $content);
}

add_shortcode('icon_list_item', 'vp_sc_render_icon_list_item');
function vp_sc_render_icon_list_item($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'       => 'default',
		'icon'       => '',
		'color'      => 'inherit',
		'class'      => '',
	), $atts));

	$_atts = $atts;
	unset($_atts['mode']);
	unset($_atts['class']);
	$_atts['class'] = 'fa-li';
	
	// Begin Render
	ob_start(); ?>
	<li<?php echo vp_sc_build_class(array("vp-icon-list-item", "vp-mode-$mode", $class)); ?>>

		<?php echo vp_sc_render_font_awesome($_atts); ?>

		<?php echo do_shortcode($content); ?>
	</li>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_icon_list_item', $html, $atts, $content);
}

add_shortcode('meta', 'vp_sc_render_meta');
function vp_sc_render_meta($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<span<?php echo vp_sc_build_class(array("vp-meta", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</span>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_meta', $html, $atts, $content);
}

add_shortcode('shout', 'vp_sc_render_shout');
function vp_sc_render_shout($atts, $content = null) {
	extract(shortcode_atts(array(
		'mode'  => 'default',
		'class' => '',
	), $atts));

	// Begin Render
	ob_start(); ?>
	<span<?php echo vp_sc_build_class(array("vp-shout", "vp-mode-$mode", $class)); ?>>
		<?php echo do_shortcode($content); ?>
	</span>
	<?php $html = ob_get_clean();
	// End Render

	return apply_filters('vp_sc_render_shout', $html, $atts, $content);
}