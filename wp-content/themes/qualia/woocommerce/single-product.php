<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing;

$sidebar_position = qualia_woocommerce_option('product_single_sidebar_position');
$main_classes     = 'main';
$aside_classes    = 'aside';
if (!empty($sidebar_position)) {
	$opp            = (($sidebar_position == 'left') ? 'right' : 'left');
	$main_classes  .= " grid-9 $opp";
	$aside_classes .= " grid-3 $sidebar_position";
}?>

<section id="content"<?php echo qualia_build_class(array("content", "content-woocoomerce", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

		<div class="product-single<?php echo (!empty($sidebar_position)) ? ' grids' : ''; ?>">
			<div class="<?php echo $main_classes; ?>">

				<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action('woocommerce_after_main_content'); ?>
			</div>

			<?php if (!empty($sidebar_position)) : ?>
			<div class="<?php echo $aside_classes; ?>">
				<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action('woocommerce_sidebar'); ?>
			</div>
			<?php endif; ?>
		</div>


		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer('shop'); ?>