<?php get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

<?php

$sidebar_position = vp_metabox('_page_sidebar.sidebar_position');
$main_classes     = 'main';
$aside_classes    = 'aside';
if (!empty($sidebar_position)) {
	$opp            = (($sidebar_position == 'left') ? 'right' : 'left');
	$main_classes  .= " grid-9 $opp";
	$aside_classes .= " grid-3 $sidebar_position";
}

?>

<section id="content"<?php echo qualia_build_class(array("content", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div<?php echo (!empty($sidebar_position)) ? ' class="grids"' : ''; ?>>
				<div class="<?php echo $main_classes; ?>">
					<article id="page-<?php the_ID(); ?>" <?php post_class('original-content'); ?>>
						<?php the_content(); ?>
					</article>
					<div class="page-comments">
						<?php comments_template(); ?>
					</div>
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>