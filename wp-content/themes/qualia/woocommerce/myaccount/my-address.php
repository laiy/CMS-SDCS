<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$customer_id = get_current_user_id();

if ( get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing Address', 'woocommerce' )
	), $customer_id );
} ?>

<?php echo qualia_divider( array( 'mode' => 'bold' ), $page_title . ' &nbsp; ' ); ?>

<p class="myaccount_address">
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); ?>
</p>

<?php echo qualia_spacer( array( 'size' => '1rem') ); ?>

<div class="grids">
	<?php foreach ( $get_addresses as $name => $title ) : ?>

	<div class="grid-6">
		<div class="box">

			<h4><?php echo $title; ?></h4>
			
			<address>
				<?php
					$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
						'first_name' 	=> get_user_meta( $customer_id, $name . '_first_name', true ),
						'last_name'		=> get_user_meta( $customer_id, $name . '_last_name', true ),
						'company'		=> get_user_meta( $customer_id, $name . '_company', true ),
						'address_1'		=> get_user_meta( $customer_id, $name . '_address_1', true ),
						'address_2'		=> get_user_meta( $customer_id, $name . '_address_2', true ),
						'city'			=> get_user_meta( $customer_id, $name . '_city', true ),
						'state'			=> get_user_meta( $customer_id, $name . '_state', true ),
						'postcode'		=> get_user_meta( $customer_id, $name . '_postcode', true ),
						'country'		=> get_user_meta( $customer_id, $name . '_country', true )
					), $customer_id, $name );

					$formatted_address = WC()->countries->get_formatted_address( $address );

					if ( ! $formatted_address )
						_e( 'You have not set up this type of address yet.', 'woocommerce' );
					else
						echo $formatted_address;
				?>
			</address>
			<p>
				<a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="edit"><?php _e( 'Edit', 'woocommerce' ); ?></a>
			</p>
		</div>
	</div>

	<?php endforeach; ?>
</div>
