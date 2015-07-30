<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>

<?php if ( $product->call_for_price === 'yes' ) : ?>
	<span class="price"><span class="call-for-price"><?php echo qualia_woocommerce_option( 'call_for_price_text' ); ?></span></span>
<?php elseif ( $price_html = $product->get_price_html() ) : ?>
	<span class="price"><?php echo $price_html; ?></span>
<?php endif; ?>