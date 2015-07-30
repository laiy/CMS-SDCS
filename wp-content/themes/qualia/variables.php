<?php

$qualia['color_transparent'] = 'transparent';
$qualia['color_inherit']     = 'inherit';
$qualia['color_white']       = qualia_option('color_white');
$qualia['color_black']       = qualia_option('color_black');
$qualia['color_info']        = qualia_option('color_info');
$qualia['color_success']     = qualia_option('color_success');
$qualia['color_warning']     = qualia_option('color_warning');
$qualia['color_error']       = qualia_option('color_error');
$qualia['color_normal']      = qualia_option('color_normal');

// Colors
for ($i = 1; $i <= 10; $i++) {
	$qualia['color_background'][$i] = qualia_option('color_' . $i . '_background');
	$qualia['color_base'][$i] = qualia_option('color_' . $i . '_base');
	$qualia['color_subtle'][$i] = qualia_option('color_' . $i . '_subtle');
	$qualia['color_text'][$i] = qualia_option('color_' . $i . '_text');
	$qualia['color_strong'][$i] = qualia_option('color_' . $i . '_strong');
	$qualia['color_accent'][$i] = qualia_option('color_' . $i . '_accent');
}

// Typography
global $qualia_typography_keys;

foreach ($qualia_typography_keys as $i) {
	if (!in_array($i, array('body', 'button')))
		$qualia['font_color'][$i] = qualia_option($i . '_font_color');
	$qualia['font_face'][$i] = "'" . implode("', '", explode(", ", qualia_option($i . "_font_face"))) . "', 'Helvetica', 'Arial'";
	$qualia['font_style'][$i] = qualia_option($i . '_font_style');
	$qualia['font_weight'][$i] = qualia_option($i . '_font_weight');
	$qualia['text_transform'][$i] = qualia_option($i . '_font_transform');
	$qualia['font_size'][$i] = qualia_option($i . '_font_size');
	$qualia['line_height'][$i] = qualia_option($i . '_line_height');
	$qualia['letter_spacing'][$i] = qualia_option($i . '_letter_spacing');
}

// Custom Fonts
for ($i = 1; $i <= 3; $i++) {
	$qualia['custom_font_name'][$i] = qualia_option("custom_font_{$i}_name");
	$qualia['custom_font_file_eot'][$i] = qualia_option("custom_font_{$i}_file_eot");
	$qualia['custom_font_file_woff'][$i] = qualia_option("custom_font_{$i}_file_woff");
	$qualia['custom_font_file_ttf'][$i] = qualia_option("custom_font_{$i}_file_ttf");
	$qualia['custom_font_file_svg'][$i] = qualia_option("custom_font_{$i}_file_svg");
}