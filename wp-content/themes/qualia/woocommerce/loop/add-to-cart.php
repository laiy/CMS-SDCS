<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

$icon = '';
switch ( $product->product_type ) {
	case "variable" :
		$icon = 'fa-caret-square-o-down';
	break;
	case "grouped" :
		$icon = 'fa-folder';
	break;
	case "external" :
		$icon = 'fa-external-link-square';
	break;
	default :
		$icon = 'fa-shopping-cart';
	break;
}

if ( $product->call_for_price === 'yes' ) {
	$icon = 'fa-tag';
} ?>

<span class="add-to-cart">

	<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( $product->id ),
			esc_attr( $product->get_sku() ),
			$product->is_purchasable() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type ),
			'<i class="fa ' . $icon . '"></i>' . ( ( $product->call_for_price === 'yes' ) ? qualia_woocommerce_option( 'call_for_price_text' ) : esc_html( $product->add_to_cart_text() ) )
		),
	$product ); ?>

	<i class="icon-loading fa fa-spinner fa-spin"></i>
	<i class="icon-added fa fa-check-circle"></i>
</span>
