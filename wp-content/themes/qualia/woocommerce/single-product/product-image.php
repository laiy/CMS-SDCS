<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$class = '';
$attributes = '';
if ( qualia_woocommerce_option( 'product_single_images_mode' ) === 'slider' ) {
	$class .= 'mode-slider js-flexslider flexslider';
	$attributes .= ' data-setup="' . esc_attr( json_encode( array( 'controlNav' => 'thumbnails', 'slideshow' => false ) ) ) . '"';
} else {
	$class .= 'mode-default';
} ?>
<div class="images <?php echo $class; ?>"<?php echo $attributes; ?>>

	<ul class="slides">

		<?php if ( has_post_thumbnail() ) :
		$post_thumbnail_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src( $post_thumbnail_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ); ?>
		<li data-thumb="<?php echo $thumb_url[0]; ?>">
			<?php the_post_thumbnail( apply_filters( 'single_product_large_thumbnail_size', 'shop_single') ); ?>
		</li>	
		<?php endif; ?>

		<?php do_action( 'woocommerce_product_thumbnails' ); ?>

	</ul>

</div>
