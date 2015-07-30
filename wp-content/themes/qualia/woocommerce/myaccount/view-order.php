<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page 
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version   2.0.15
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo qualia_alert( array( 'status' => 'info' ), sprintf( __( 'Order <mark class="order-number">%s</mark> was placed on <mark class="order-date">%s</mark> and is currently <mark class="order-status">%s</mark>.', 'woocommerce' ), $order->get_order_number(), date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ), __( $status->name, 'woocommerce' ) ) );

$notes = $order->get_customer_order_notes();
if ( $notes ) :
	?>
	<?php echo qualia_divider( array( 'mode' => 'bold' ), __( 'Order Updates', 'woocommerce' ) . ' &nbsp; ' ); ?>

	<div class="comments-list">
		<ol class="commentlist notes">
			<?php foreach ( $notes as $note ) : ?>
			<li class="comment note">
				<div class="comment_container">
					<div class="comment-text">
						<div class="description">
							<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
						</div>
						<div class="vp-meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></div>
					</div>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
	</div>
	<?php
endif;

do_action( 'woocommerce_view_order', $order_id );