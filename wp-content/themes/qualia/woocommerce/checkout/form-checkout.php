<?php
/**
 * Overriding WooCommerce Template: checkout/form-checkout
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce; ?>

<div class="order-checkout">

	<?php wc_print_notices(); ?>

	<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

	<?php // If checkout registration is disabled and not logged in, the user cannot checkout
	if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
		echo qualia_alert( array(
			'mode'   => 'default',
			'status' => 'warning',
			'class'  => 'woocommerce-message',
		), apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
		return;
	}

	// filter hook for include new pages inside the payment method
	$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

	<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

		<div class="grids">
			<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
			<div class="grid-8">

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div id="customer_details" class="customer-details box">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php echo qualia_spacer( array( 'size' => '3rem' ) ); ?>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			</div>
			<?php endif; ?>
			
			<div class="grid-4">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</div>

	</form>

</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>