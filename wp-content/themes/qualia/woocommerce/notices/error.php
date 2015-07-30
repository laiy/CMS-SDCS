<?php
/**
 * Overriding WooCommerce Template: notices/error
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return; ?>

<?php foreach ( $messages as $message ) : ?>

	<?php ob_start(); ?>
	<ul class="woocommerce-error">
		<?php foreach ( $messages as $message ) : ?>
			<li><?php echo wp_kses_post( $message ); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php $content = ob_get_clean(); ?>

	<?php echo qualia_alert( array(
		'mode'   => 'default',
		'status' => 'error',
	), $content ); ?>

<?php endforeach; ?>