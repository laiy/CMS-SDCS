<?php

$sidebar_position = qualia_option('blog_archive_sidebar_position');
$mode             = qualia_option('blog_archive_mode') === '' ? 'default' : qualia_option('blog_archive_mode');
$pagination       = qualia_option('blog_archive_pagination');
$posts_per_page   = get_query_var('posts_per_page');
$word_limit       = qualia_option('blog_archive_word_limit');

$main_classes     = 'main';
$aside_classes    = 'aside';
if (!empty($sidebar_position)) {
	$opp            = (($sidebar_position == 'left') ? 'right' : 'left');
	$main_classes  .= " grid-9 $opp";
	$aside_classes .= " grid-3 $sidebar_position";
}
$loop_class = '';

if ($mode === 'grid') $loop_class = ' js-isotope';

global $paged, $wp_query;
$wp_query->set('ignore_sticky_posts', 1);

get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section id="content"<?php echo qualia_build_class(array("content", "content-blog", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div<?php echo (!empty($sidebar_position)) ? ' class="grids"' : ''; ?>>
				<div class="<?php echo $main_classes; ?>">

					<?php include( locate_template( 'loop.php' ) ); ?>

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