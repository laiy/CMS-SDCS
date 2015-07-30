<?php
$sidebar_position = qualia_option('search_result_sidebar_position');
$pagination       = qualia_option('search_result_pagination');
$posts_per_page   = qualia_option('search_result_posts_per_page');

$main_classes     = 'main';
$aside_classes    = 'aside';
if (!empty($sidebar_position)) {
	$opp            = (($sidebar_position == 'left') ? 'right' : 'left');
	$main_classes  .= " grid-9 $opp";
	$aside_classes .= " grid-3 $sidebar_position";
}

get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section id="content"<?php echo qualia_build_class(array("content", "content-search-result", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div<?php echo (!empty($sidebar_position)) ? ' class="grids"' : ''; ?>>
				<div class="<?php echo $main_classes; ?>">

					<form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						<h4 class="hidden"><?php _e('Search in this site', 'qualia_td'); ?></h4>
						<div class="search-form-inner">
							<input class="search-form-input vp-input-medium" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Enter keywords', 'qualia_td'); ?>" />
							<button class="search-form-submit vp-button vp-background-accent vp-button-medium" type="submit" id="search-form-submit">
								<i class="fa fa-search"></i>
								<span> <?php _e('Search', 'qualia_td'); ?></span>
							</button>
						</div>
					</form>

					<?php
					$_paged = ($paged ? $paged : 1);
					$_offset = (($_paged - 1) * $posts_per_page) + 1;
					$_end = $_offset + $wp_query->post_count - 1;
					?>

					<h3><?php printf(__('Showing results %s%s of %s total results found (Page %s / %s) &nbsp; ', 'qualia_td'), $_offset, (($_offset === $_end) ? "" : " - $_end"), $wp_query->found_posts, $_paged, $wp_query->max_num_pages); ?></h3>
					
					<?php echo qualia_spacer(array('size' => '3rem')); ?>

					<?php include( locate_template( 'loop-search.php' ) ); ?>

				</div>

				<?php if (!empty($sidebar_position)) : ?>
				<div class="<?php echo $aside_classes; ?>">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
			</div>


		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer(); ?>