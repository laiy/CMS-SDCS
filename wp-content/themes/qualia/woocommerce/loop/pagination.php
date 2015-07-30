<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wp_query;

if ( $wp_query->max_num_pages <= 1 )
	return;

$pagination = 'page';
if ( function_exists( 'wp_pagenavi' ) and $pagination === 'page' ) {
	$pagination = 'wp-pagenavi';
} ?>
<div class="woocommerce-pagination">
	<?php if ($pagination == 'page') : ?>

		<?php // if has previous page
		$prev_page = get_previous_posts_link(); if (!empty($prev_page)) : ?>
		<div class="prev pagination"><?php previous_posts_link("<i class=\"fa fa-angle-double-left\"></i><span class=\"label\"> " . __('Newer Posts', 'qualia_td') . "</span>"); ?></div>
		<?php endif; ?>

		<?php // if has next page
		$next_page = get_next_posts_link(); if (!empty($next_page)) : ?>
		<div class="next pagination"><?php next_posts_link("<span class=\"label\">" . __('Older Posts', 'qualia_td') . " </span><i class=\"fa fa-angle-double-right\"></i>"); ?></div>
		<?php endif; ?>

	<?php elseif ($pagination == 'wp-pagenavi') : ?>

		<?php wp_pagenavi(); ?>

	<?php endif; ?>
</div>