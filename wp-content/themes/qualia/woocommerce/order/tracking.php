<?php
/**
 * Order tracking
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<div class="order-tracking">
<?php
	$status = get_term_by( 'slug', $order->status, 'shop_order_status' );

	$order_status_text = sprintf( __( 'Order %s which was made %s has the status &ldquo;%s&rdquo;', 'woocommerce' ), $order->get_order_number(), human_time_diff( strtotime( $order->order_date ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'woocommerce' ), __( $status->name, 'woocommerce' ) );

	if ( $order->status === 'completed' ) $order_status_text .= ' ' . __( 'and was completed', 'woocommerce' ) . ' ' . human_time_diff( strtotime( $order->completed_date ), current_time( 'timestamp' ) ) . __( ' ago', 'woocommerce' );

	$order_status_text .= '.';

	echo wpautop( esc_attr( apply_filters( 'woocommerce_order_tracking_status', $order_status_text, $order ) ) );
?>

<?php
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
?>
</div>