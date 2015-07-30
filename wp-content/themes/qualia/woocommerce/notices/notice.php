<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return; ?>

<?php foreach ( $messages as $message ) : ?>

	<?php ob_start(); ?>
	<div class="woocommerce-info"><?php echo wp_kses_post( $message ); ?></div>
	<?php $content = ob_get_clean(); ?>

	<?php echo qualia_alert( array(
		'mode'   => 'default',
		'status' => 'info',
	), $content ); ?>

<?php endforeach; ?>