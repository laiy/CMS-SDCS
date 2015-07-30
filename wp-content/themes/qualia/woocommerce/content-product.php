<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++; ?>
<li <?php post_class( 'col' ); ?>>

	<div class="product-wrapper">
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook
		 */
		do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

		<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>

		<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook
		 *
		 * REMOVED @hooked woocommerce_template_loop_price - 10
		 * REMOVED @hooked woocommerce_template_loop_rating - 5
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

		<?php
		/**
		 * woocommerce_after_shop_loop_item hook
		 * 
		 * REMOVED @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>

</li>