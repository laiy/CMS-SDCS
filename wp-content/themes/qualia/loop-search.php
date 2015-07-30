<?php if (have_posts()) :

// logic
$logic = "perpage:$posts_per_page";

// there is more
$next_link = get_next_posts_link();
$next_url  = '';
if (!empty($next_link)) {
	preg_match_all('/href="([^\s"]+)/', $next_link, $match);
	$next_url = $match[1][0];
}

// html class
$class = ( ( isset($class) and $class !== '' ) ? $class : "" );
?>

<div<?php echo qualia_build_class(array("search-result", "pagination-$pagination", (($pagination === 'load-more') ? "js-search-result-load-more " : ""), $class)); ?>
		data-perpage=<?php echo $posts_per_page; ?> data-logic="<?php echo $logic; ?>"
		data-paged="<?php echo $paged; ?>" data-next="<?php echo (!empty($next_url) ? $next_url : "false"); ?>">

	<!-- Begin Loop -->
	<div<?php echo qualia_build_class(array("search-result-loop", "clear-float")); ?>>
		<?php while (have_posts()) : the_post();

		global $post;

		if($post->post_type === 'post')
		{
			$post->post_content = qualia_strip_shortcode( 'blog', $post->post_content );
		}
		
		setup_postdata($post); ?>

		<article id="search-result-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			
			<?php ob_start(); ?>
			<span><?php $obj = get_post_type_object(get_post_type()); echo $obj->labels->singular_name; ?></span>
			<span class="sep">/</span>
			<span><?php echo get_the_date(); ?></span>
			<span class="sep">/</span>
			<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
			<?php $meta = ob_get_clean(); ?>

			<?php echo qualia_meta(array(), $meta); ?>
		</article>
		
		<?php endwhile; ?>
	</div>
	<!-- End Loop -->

	<div class="search-result-pagination clear-float">
	<?php if ($pagination == 'load-more') :
		if (!empty($next_url)) : ?>
		<div class="load-more pagination">
			<?php echo qualia_button(array(
				'href'             => $next_url,
				'background_color' => 'subtle',
				'color'            => 'text',
				'size'             => 'medium',
				'class'            => 'js-load-more full-width align-center',
			), '<i class="fa fa-refresh"></i><span class="label"> ' . __('Load More Results', 'qualia_td') . '</span>'); ?>
		</div>
		<?php endif; ?>
	
	<?php elseif ($pagination == 'page') : ?>
		<div class="prev pagination left"><?php echo previous_posts_link('<i class="fa fa-angle-left"></i><span class="label"> ' . __('Previous Page', 'qualia_td') . '</span>'); ?></div>
		<div class="next pagination right"><?php echo next_posts_link('<span class="label">' . __('Next Page', 'qualia_td') . ' </span><i class="fa fa-angle-right"></i>'); ?></div>
	<?php endif; ?>
	</div>
</div>

<?php endif; ?>