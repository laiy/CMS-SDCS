<?php get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section id="content"<?php echo qualia_build_class(array("content", "content-portfolio", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div class="portfolio-single">
			<?php if (have_posts()) : the_post(); ?>
				<div class="portfolio-content">
					<?php get_template_part('portfolio'); ?>
				</div>

				<div class="portfolio-pagination clear-float">
					<?php $prev_post = get_previous_post(); if (!empty($prev_post)) : ?>
					<div class="prev pagination left"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> &nbsp; ' . __('Previous', 'qualia_td')); ?></div>
					<?php endif; ?>
					
					<?php $next_post = get_next_post(); if (!empty($next_post)) : ?>
					<div class="next pagination right"><?php next_post_link('%link', __('Next', 'qualia_td') . ' &nbsp; <i class="fa fa-angle-right"></i>'); ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			</div>

		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer(); ?>