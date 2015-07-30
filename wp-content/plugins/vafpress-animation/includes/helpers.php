<?php

// Data Sources

function vp_an_sc_source_pagination_mode()
{
	$source = array(
		array(
			'label' => __('disabled', 'vp_animation'),
			'value' => __('disabled', 'vp_animation')
		),
		array(
			'label' => __('page', 'vp_animation'),
			'value' => __('page', 'vp_animation')
		),
	);
	return apply_filters( 'vp_an_sc_source_pagination_mode', $source );
}

function vp_an_sc_source_mode()
{
	$source = array(
		array(
			'label' => __('default', 'vp_animation'),
			'value' => __('default', 'vp_animation')
		),
	);
	return apply_filters( 'vp_an_sc_source_mode', $source );
}

function vp_an_sc_source_animation()
{
	$ret        = array();
	$directions = array('left', 'right', 'top', 'bottom');
	$angles     = array('90', '180', '270', '360', '-90', '-180', '-270', '-360');
	$anchors    = array('top-left', 'top-center', 'top-right', 'middle-left', 'middle-center', 'middle-right', 'bottom-left', 'bottom-center', 'bottom-right');

	// Scale
	$ret[] = array('label' => 'scale in', 'value' => 'scale-in');
	$ret[] = array('label' => 'scale out', 'value' => 'scale-out');
	$ret[] = array('label' => 'scale in out', 'value' => 'scale-in-out');

	// Fade
	$ret[] = array('label' => 'fade in', 'value' => 'fade-in');
	$ret[] = array('label' => 'fade out', 'value' => 'fade-out');
	$ret[] = array('label' => 'fade in out', 'value' => 'fade-in-out');
	
	// fade short
	foreach (array('in-short-from', 'out-short-to') as $type) {
		foreach ($directions as $direction) {
			$label_type = str_replace('-', ' ', $type);
			$ret[] = array('label' => "fade $label_type $direction", 'value' => "fade-$type-$direction");
		}
	}

	// rotate
	foreach (array('to', 'from') as $type) {
		foreach ($angles as $angle) {
			foreach ($anchors as $anchor) {
				$label_anchor = str_replace('-', ' ', $anchor);
				$ret[] = array('label' => "rotate $type {$angle}&deg; anchor $label_anchor", 'value' => "rotate-$type-{$angle}deg-anchor-$anchor");
			}
		}
	}
	
	return $ret;
}

/**
 * EOF
 */