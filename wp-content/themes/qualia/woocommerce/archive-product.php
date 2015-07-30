<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing;

$sidebar_position = qualia_woocommerce_option('product_archive_sidebar_position');
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

			<div class="product-archive<?php echo (!empty($sidebar_position)) ? ' grids' : ''; ?>">
				<div class="<?php echo $main_classes; ?>">

					<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' ); ?>

					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

					<?php endif; ?>

					<?php
					/**
					 * woocommerce_archive_description hook
					 */
					do_action( 'woocommerce_archive_description' ); ?>

					<?php if ( have_posts() ) : ?>

						<div class="woocommerce-before-loop clear-float">
							<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' ); ?>
						</div>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' ); ?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

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