<?php if (have_posts()) :

// data
$data             = array();
$data['perpage']  = $posts_per_page;
$data['mode']     = $mode;
$data['columns']  = $columns;
$categories       = array();

// selected categories
if( !empty( $category ) ) {
	$categories = explode(',', $category);
}
$categories = get_terms( 'portfolio_category', array('include' => $categories) );

// logic
$logic = array();
foreach ($data as $key => $value) {
	$logic[] = "$key:$value";
}
$logic = implode('|', $logic);

// page navi supports
if( function_exists( 'wp_pagenavi' ) and $pagination === 'page' )
{
	$pagination = 'wp-pagenavi';
}
// next or load more
else
{
	$next_link = get_next_posts_link();
	$next_url  = '';
	if (!empty($next_link)) {
		preg_match_all('/href="([^\s"]+)/', $next_link, $match);
		$next_url = $match[1][0];
	}
}

$anim_class = '';
switch ($mode) {
	case 'flip':
		$anim_class = 'anim-flip';
		break;
	case 'invisible':
	case 'default':
		$anim_class = 'anim-scale';
		break;
}

// html class
$class = ( ( isset($class) and $class !== '' ) ? $class : "" );
?>
	<div<?php echo qualia_build_class(array("portfolio-archive", "mode-$mode", "pagination-$pagination", $anim_class, (($pagination === 'load-more') ? "js-portfolio-archive-load-more" : ""), ($enable_filters === "true" ? "with-filters" : ""), $class)); ?>
			<?php foreach ($data as $key => $value) : ?>data-<?php echo $key; ?>="<?php echo $value; ?>" <?php endforeach; ?>
			data-logic="<?php echo $logic; ?>" data-paged="<?php echo $paged; ?>" data-next="<?php echo (!empty($next_url) ? $next_url : "false"); ?>">

		<?php if($pagination === 'carousel'):?>
			<span class="swiper-left"><i class="vp-font-awesome vp-accent fa fa-angle-left fa-2x"></i></span> 
			<span class="swiper-right"><i class="vp-font-awesome vp-accent fa fa-angle-right fa-2x"></i></span>
			<div class="swiper-container">
				<div class="swiper-wrapper portfolio-loop clear-float">
				<?php while (have_posts()) : the_post(); ?>
					<div class="swiper-slide"> 
					<?php include( locate_template( 'portfolio.php' ) ); ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		<?php else: ?>
			<?php if ($enable_filters == 'true') : ?>
			<ul class="portfolio-filters js-isotope-filters clear-float">
				<li class="active"><a href="#" data-filter="*"><?php _e('All', 'qualia_td'); ?></a></li>
				<?php foreach ($categories as $term) : ?>
				<li><a href="#" data-filter="<?php echo '.' . $term->slug; ?>"><?php echo $term->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<div class="portfolio-loop" style="position: relative; overflow: hidden;">
				<div class="portfolio-isotope js-isotope-portfolio clear-float columns-of-<?php echo $columns ?>">
					<?php while (have_posts()) : the_post();
					include( locate_template( 'portfolio.php' ) ); ?>
					<?php endwhile; ?>
				</div>
			</div>

			<div class="portfolio-pagination clear-float">
			<?php if ($pagination == 'load-more') :
				if (!empty($next_url)) : ?>
				<div class="load-more pagination">
					<?php echo qualia_button(array(
						'href'             => $next_url,
						'background_color' => 'subtle',
						'color'            => 'text',
						'size'             => 'medium',
						'class'            => 'js-load-more full-width align-center',
					), '<i class="fa fa-refresh"></i><span class="label"> ' . __('Load More Portfolios', 'qualia_td') . '</span>'); ?>
				</div>
				<?php endif; ?>
			<?php elseif ($pagination == 'page') : ?>
				<div class="prev pagination left"><?php echo previous_posts_link('<i class="fa fa-angle-left"></i><span class="label"> ' . __('Newer portfolios', 'qualia_td') . '</span>'); ?></div>
				<div class="next pagination right"><?php echo next_posts_link('<span class="label">' . __('Older Portfolios', 'qualia_td') . ' </span><i class="fa fa-angle-right"></i>'); ?></div>
			<?php elseif ($pagination == 'wp-pagenavi') : ?>
				<?php wp_pagenavi(); ?>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>