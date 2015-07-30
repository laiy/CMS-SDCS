<?php

/**
 * DEFAULT SOURCES
 * ========================================================================
 */

function vp_sc_source_standard_background_color() {
	$ret = array(
		array('label' => __('transparent', 'vp_sc_td'), 'value' => 'transparent', 'img' => VP_SC_URL . 'img/color-transparent.jpg'),
		array('label' => __('inherit', 'vp_sc_td'), 'value' => 'inherit', 'img' => VP_SC_URL . 'img/color-inherit.jpg'),
		array('label' => __('black', 'vp_sc_td'), 'value' => 'black', 'img' => VP_SC_URL . 'img/color-black.jpg'),
		array('label' => __('white', 'vp_sc_td'), 'value' => 'white', 'img' => VP_SC_URL . 'img/color-white.jpg'),
		array('label' => __('info', 'vp_sc_td'), 'value' => 'info', 'img' => VP_SC_URL . 'img/color-info.jpg'),
		array('label' => __('warning', 'vp_sc_td'), 'value' => 'warning', 'img' => VP_SC_URL . 'img/color-warning.jpg'),
		array('label' => __('success', 'vp_sc_td'), 'value' => 'success', 'img' => VP_SC_URL . 'img/color-success.jpg'),
		array('label' => __('error', 'vp_sc_td'), 'value' => 'error', 'img' => VP_SC_URL . 'img/color-error.jpg'),
	);
	return apply_filters('vp_sc_source_standard_background_color', $ret);
}

function vp_sc_source_standard_foreground_color() {
	$ret = array(
		array('label' => __('inherit', 'vp_sc_td'), 'value' => 'inherit', 'img' => VP_SC_URL . 'img/color-inherit.jpg'),
		array('label' => __('black', 'vp_sc_td'), 'value' => 'black', 'img' => VP_SC_URL . 'img/color-black.jpg'),
		array('label' => __('white', 'vp_sc_td'), 'value' => 'white', 'img' => VP_SC_URL . 'img/color-white.jpg'),
		array('label' => __('info', 'vp_sc_td'), 'value' => 'info', 'img' => VP_SC_URL . 'img/color-info.jpg'),
		array('label' => __('warning', 'vp_sc_td'), 'value' => 'warning', 'img' => VP_SC_URL . 'img/color-warning.jpg'),
		array('label' => __('success', 'vp_sc_td'), 'value' => 'success', 'img' => VP_SC_URL . 'img/color-success.jpg'),
		array('label' => __('error', 'vp_sc_td'), 'value' => 'error', 'img' => VP_SC_URL . 'img/color-error.jpg'),
	);
	return apply_filters('vp_sc_source_standard_foreground_color', $ret);
}

/**
 * FIXED SOURCES
 * ========================================================================
 */

function vp_sc_source_background_position() {
	$ret = array(
		array('label' => __('left top', 'vp_sc_td'), 'value' => 'left top', 'img' => VP_SC_URL . 'img/left-top.jpg'),
		array('label' => __('center top', 'vp_sc_td'), 'value' => 'center top', 'img' => VP_SC_URL . 'img/center-top.jpg'),
		array('label' => __('right top', 'vp_sc_td'), 'value' => 'right top', 'img' => VP_SC_URL . 'img/right-top.jpg'),
		array('label' => __('left center', 'vp_sc_td'), 'value' => 'left center', 'img' => VP_SC_URL . 'img/left-center.jpg'),
		array('label' => __('center center', 'vp_sc_td'), 'value' => 'center center', 'img' => VP_SC_URL . 'img/center-center.jpg'),
		array('label' => __('right center', 'vp_sc_td'), 'value' => 'right center', 'img' => VP_SC_URL . 'img/right-center.jpg'),
		array('label' => __('left bottom', 'vp_sc_td'), 'value' => 'left bottom', 'img' => VP_SC_URL . 'img/left-bottom.jpg'),
		array('label' => __('center bottom', 'vp_sc_td'), 'value' => 'center bottom', 'img' => VP_SC_URL . 'img/center-bottom.jpg'),
		array('label' => __('right bottom', 'vp_sc_td'), 'value' => 'right bottom', 'img' => VP_SC_URL . 'img/right-bottom.jpg'),
	);
	return $ret;
}

function vp_sc_source_background_attachment() {
	$ret = array(
		array('label' => __('scroll', 'vp_sc_td'), 'value' => 'scroll'),
		array('label' => __('fixed', 'vp_sc_td'), 'value' => 'fixed'),
	);
	return $ret;
}

function vp_sc_source_background_repeat() {
	$ret = array(
		array('label' => __('repeat', 'vp_sc_td'), 'value' => 'repeat'),
		array('label' => __('no-repeat', 'vp_sc_td'), 'value' => 'no-repeat'),
		array('label' => __('repeat-x', 'vp_sc_td'), 'value' => 'repeat-x'),
		array('label' => __('repeat-y', 'vp_sc_td'), 'value' => 'repeat-y'),
	);
	return $ret;
}

function vp_sc_source_background_size() {
	$ret = array(
		array('label' => __('auto', 'vp_sc_td'), 'value' => 'auto'),
		array('label' => __('cover', 'vp_sc_td'), 'value' => 'cover'),
		array('label' => __('contain', 'vp_sc_td'), 'value' => 'contain'),
	);
	return $ret;
}

/**
 * OVERRIDABLE SOURCES
 * ========================================================================
 */

// Modes

function vp_sc_source_box_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_box_mode', $ret);
}

function vp_sc_source_spacer_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_spacer_mode', $ret);
}

function vp_sc_source_accordion_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_accordion_mode', $ret);
}

function vp_sc_source_sidebar_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_sidebar_mode', $ret);
}

function vp_sc_source_tabs_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_tabs_mode', $ret);
}

function vp_sc_source_blog_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_blog_mode', $ret);
}

function vp_sc_source_google_maps_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_google_maps_mode', $ret);
}

function vp_sc_source_point_block_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_point_block_mode', $ret);
}

function vp_sc_source_pricing_table_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_pricing_table_mode', $ret);
}

function vp_sc_source_progress_bar_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_progress_bar_mode', $ret);
}

function vp_sc_source_progress_ring_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_progress_ring_mode', $ret);
}

function vp_sc_source_counter_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_counter_mode', $ret);
}

function vp_sc_source_table_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_table_mode', $ret);
}

function vp_sc_source_testimonial_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_testimonial_mode', $ret);
}

function vp_sc_source_alert_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_alert_mode', $ret);
}

function vp_sc_source_button_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_button_mode', $ret);
}

function vp_sc_source_divider_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_divider_mode', $ret);
}

function vp_sc_source_dropcap_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_dropcap_mode', $ret);
}

function vp_sc_source_font_awesome_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_font_awesome_mode', $ret);
}

function vp_sc_source_icon_list_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_icon_list_mode', $ret);
}

function vp_sc_source_icon_list_item_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_icon_list_item_mode', $ret);
}

function vp_sc_source_meta_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_meta_mode', $ret);
}

function vp_sc_source_shout_mode() {
	$ret = array(
		array('label' => __('default', 'vp_sc_td'), 'value' => ''),
	);
	return apply_filters('vp_sc_source_shout_mode', $ret);
}

// Background Color

function vp_sc_source_section_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_section_background_color', $ret);
}

function vp_sc_source_box_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_box_background_color', $ret);
}

function vp_sc_source_accordion_pane_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_accordion_pane_background_color', $ret);
}

function vp_sc_source_pricing_table_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_pricing_table_background_color', $ret);
}

function vp_sc_source_pricing_column_accent_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_pricing_column_accent_background_color', $ret);
}

function vp_sc_source_progress_bar_track_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_progress_bar_track_color', $ret);
}

function vp_sc_source_progress_bar_fill_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_progress_bar_fill_color', $ret);
}

function vp_sc_source_progress_ring_track_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_progress_ring_track_color', $ret);
}

function vp_sc_source_progress_ring_fill_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_progress_ring_fill_color', $ret);
}

function vp_sc_source_button_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_button_background_color', $ret);
}

function vp_sc_source_highlight_background_color() {
	$ret = vp_sc_source_standard_background_color();
	return apply_filters('vp_sc_source_highlight_background_color', $ret);
}

// Text Color

function vp_sc_source_section_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_section_color', $ret);
}

function vp_sc_source_box_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_box_color', $ret);
}

function vp_sc_source_accordion_pane_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_accordion_pane_color', $ret);
}

function vp_sc_source_pricing_table_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_pricing_column_color', $ret);
}

function vp_sc_source_pricing_column_accent_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_pricing_column_accent_color', $ret);
}

function vp_sc_source_progress_bar_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_progress_bar_color', $ret);
}

function vp_sc_source_progress_ring_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_progress_ring_color', $ret);
}

function vp_sc_source_counter_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_counter_color', $ret);
}

function vp_sc_source_button_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_button_color', $ret);
}

function vp_sc_source_font_awesome_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_font_awesome_color', $ret);
}

function vp_sc_source_highlight_color() {
	$ret = vp_sc_source_standard_foreground_color();
	return apply_filters('vp_sc_source_highlight_color', $ret);
}

// Others

function vp_sc_source_sidebar_name() {
	global $wp_registered_sidebars;

	$ret = array();
	foreach ($wp_registered_sidebars as $key => $sidebar) {
		$ret[] = array('label' => __($sidebar['name'], 'qualia_td'), 'value' => $sidebar['id']);
	}
	return $ret;
}

function vp_sc_source_tabs_nav_position() {
	$ret = array(
		array('label' => __('top', 'vp_sc_td'), 'value' => 'top'),
		array('label' => __('left', 'vp_sc_td'), 'value' => 'left'),
	);
	return apply_filters('vp_sc_source_tabs_nav_position', $ret);
}

function vp_sc_source_blog_pagination() {
	$ret = array(
		array('label' => __('disabled', 'vp_sc_td'), 'value' => 'disabled'),
		array('label' => __('page', 'vp_sc_td'), 'value' => 'page'),
	);
	return apply_filters('vp_sc_source_blog_pagination', $ret);
}

function vp_sc_source_progress_bar_label() {
	$ret = array(
		array('label' => __('none', 'vp_sc_td'), 'value' => 'none'),
		array('label' => __('value', 'vp_sc_td'), 'value' => 'value'),
		array('label' => __('percent', 'vp_sc_td'), 'value' => 'percent'),
	);
	return apply_filters('vp_sc_source_progress_bar_label', $ret);
}

function vp_sc_source_progress_ring_label() {
	$ret = array(
		array('label' => __('none', 'vp_sc_td'), 'value' => 'none'),
		array('label' => __('value', 'vp_sc_td'), 'value' => 'value'),
		array('label' => __('percent', 'vp_sc_td'), 'value' => 'percent'),
	);
	return apply_filters('vp_sc_source_progress_ring_label', $ret);
}

function vp_sc_source_alert_status() {
	$ret = array(
		array('label' => __('normal', 'vp_sc_td'), 'value' => 'normal'),
		array('label' => __('info', 'vp_sc_td'), 'value' => 'info'),
		array('label' => __('warning', 'vp_sc_td'), 'value' => 'warning'),
		array('label' => __('success', 'vp_sc_td'), 'value' => 'success'),
		array('label' => __('error', 'vp_sc_td'), 'value' => 'error'),
	);
	return apply_filters('vp_sc_source_alert_status', $ret);
}

function vp_sc_source_button_size() {
	$ret = array(
		array('label' => __('small', 'vp_sc_td'), 'value' => 'small'),
		array('label' => __('medium', 'vp_sc_td'), 'value' => 'medium'),
		array('label' => __('large', 'vp_sc_td'), 'value' => 'large'),
	);
	return apply_filters('vp_sc_source_button_size', $ret);
}

function vp_sc_source_divider_align() {
	$ret = array(
		array('label' => __('left', 'vp_sc_td'), 'value' => 'left'),
		array('label' => __('center', 'vp_sc_td'), 'value' => 'center'),
		array('label' => __('right', 'vp_sc_td'), 'value' => 'right'),
	);
	return apply_filters('vp_sc_source_divider_align', $ret);
}

function vp_sc_source_font_awesome_size() {
	$ret = array(
		array('label' => __('1x', 'vp_sc_td'), 'value' => '1x'),
		array('label' => __('2x', 'vp_sc_td'), 'value' => '2x'),
		array('label' => __('3x', 'vp_sc_td'), 'value' => '3x'),
		array('label' => __('4x', 'vp_sc_td'), 'value' => '4x'),
		array('label' => __('5x', 'vp_sc_td'), 'value' => '5x'),
	);
	return apply_filters('vp_sc_source_font_awesome_size', $ret);
}

function vp_sc_source_font_awesome_fill() {
	$ret = array(
		array('label' => __('none', 'vp_sc_td'), 'value' => 'none'),
		array('label' => __('block circle', 'vp_sc_td'), 'value' => 'block-circle'),
	);
	return apply_filters('vp_sc_source_font_awesome_fill', $ret);
}