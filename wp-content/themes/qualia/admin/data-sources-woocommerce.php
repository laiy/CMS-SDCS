<?php

VP_Security::instance()->whitelist_function('qualia_woocommerce_source_product_single_images_mode');
function qualia_woocommerce_source_product_single_images_mode() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => ''),
		array('label' => __('slider', 'qualia_td'), 'value' => 'slider'),
	);
}

VP_Security::instance()->whitelist_function('qualia_woocommerce_source_call_for_price_action');
function qualia_woocommerce_source_call_for_price_action() {
	return array(
		array('label' => __('no action', 'qualia_td'), 'value' => ''),
		array('label' => __('link to page', 'qualia_td'), 'value' => 'link-to-page'),
	);
}

VP_Security::instance()->whitelist_function('qualia_woocommerce_dep_call_for_price_contact_form');
function qualia_woocommerce_dep_call_for_price_contact_form($value) {
	if ($value === 'link-to-page') return true;
	else return false;
}