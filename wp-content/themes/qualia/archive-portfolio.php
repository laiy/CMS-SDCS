<?php

$pagination     = vp_pf_option('qualia_pagination', 'load-more');
$mode           = vp_pf_option('qualia_mode', 'flip');
$enable_filters = vp_pf_option('qualia_enable_filters', 1) ? 'true' : 'false';
$columns        = vp_pf_option('qualia_columns', 4);
$posts_per_page = vp_pf_option('qualia_posts_per_page', 12);

global $paged;

get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section<?php echo qualia_build_class(array("content", "content-portfolio", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<?php include( locate_template( 'loop-portfolio.php' ) ); ?>

		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer(); ?>