<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<div class="product-information">

	<?php ob_start(); foreach($tabs as $key => $tab) : ?>
	<li class="vp-accordion-pane panel<?php echo ($tab === reset($tabs)) ? ' vp-active' : ''; ?>">
		<div class="vp-accordion-pane-heading">
			<a href="#">
				<span><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></span>
				<i class="fa fa-plus"></i><i class="fa fa-minus"></i>
			</a>
		</div>
		<div class="vp-accordion-pane-core"><?php call_user_func( $tab['callback'], $key, $tab ) ?></div>
	</li>
	<?php endforeach; $content = ob_get_clean(); ?>

	<?php echo qualia_accordion(array(
		'mode'          => 'outline',
		'open_multiple' => 'false',
		'class'         => '',
	), $content); ?>
</div>

<?php endif; ?>