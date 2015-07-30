<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;

if ( $product->call_for_price === 'yes' ) : ?>
	<div class="cart">
		<?php if ( qualia_woocommerce_option( 'call_for_price_action' ) === 'link-to-page' && qualia_woocommerce_option( 'call_for_price_page' ) ) : ?>
		<a class="vp-button vp-background-accent vp-color-base vp-button-medium" href="<?php echo get_permalink( qualia_woocommerce_option( 'call_for_price_page' ) ); ?>">
			<?php echo qualia_woocommerce_option( 'call_for_price_text' ); ?>
		</a>
		<?php else : ?>
		<span class="vp-shout">
			<?php echo qualia_woocommerce_option( 'call_for_price_text' ); ?>
		</span>
		<?php endif; ?>
	</div>

<?php else : ?>

	<?php // Availability
	$availability = $product->get_availability();

	if ( $availability['availability'] )
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] ); ?>

	<?php if ( $product->is_in_stock() ) : ?>

		<?php do_action('woocommerce_before_add_to_cart_form'); ?>

		<form class="cart" method="post" enctype='multipart/form-data'>

		 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		 	<?php if ( ! $product->is_sold_individually() )
			woocommerce_quantity_input( array(
				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
			) ); ?>

		 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

		 	<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		 	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

		</form>

		<?php do_action('woocommerce_after_add_to_cart_form'); ?>

	<?php endif; ?>

<?php endif; ?>