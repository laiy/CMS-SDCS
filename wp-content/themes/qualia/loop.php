<?php if (have_posts()) :

// data
$data = array();
$data['perpage']     = $posts_per_page;
$data['archivemode'] = $mode;

$icon['audio'] = 'fa-music';
$icon['gallery'] = 'fa-picture-o';
$icon['link'] = 'fa-external-link';
$icon['quote'] = 'fa-quote-left';
$icon['video'] = 'fa-film';
$icon['0'] = 'fa-file';

// logic
$logic = array();
foreach ($data as $key => $value) $logic[] = "$key:$value";
$logic = implode('|', $logic);

// page navi supports
if( function_exists( 'wp_pagenavi' ) and $pagination === 'page' and $mode !== 'timeline' )
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

// html class
$class = ( ( isset($class) and $class !== '' ) ? $class : "" );
$loop_class = ( ( $mode === 'masonry' ) ? "js-isotope" : "");
?>

<div<?php echo qualia_build_class(array("blog-archive", "mode-$mode", "pagination-$pagination", (($pagination === 'load-more') ? "js-blog-archive-load-more " : ""), $class)); ?>
		<?php foreach ($data as $key => $value) : ?>data-<?php echo $key; ?>="<?php echo $value; ?>" <?php endforeach; ?>
		data-logic="<?php echo $logic; ?>" data-paged="<?php echo $paged; ?>" data-next="<?php echo (!empty($next_url) ? $next_url : "false"); ?>">

	<!-- Begin Loop -->
	<div<?php echo qualia_build_class(array("blog-loop", "clear-float", $loop_class)); ?>>
		<?php while (have_posts()) : the_post();

		global $post;

		if($post->post_type === 'post')
		{
			$post->post_content = qualia_strip_shortcode( array('blog', 'animation'), $post->post_content );
		}

		if ($mode === 'masonry')
		{
			global $shortcode_tags;
			$st_backup          = $shortcode_tags;
			unset($shortcode_tags['gallery']);

			$post->post_content = strip_tags($post->post_content);
			$post->post_content = strip_shortcodes($post->post_content);
			$shortcode_tags     = $st_backup;
		}

		// Word Limit
		if ($word_limit > -1) {
			$words = explode(' ', $post->post_content);
			$words = array_slice($words, 0, $word_limit);
			$post->post_content = implode(' ', $words);
		}
		
		setup_postdata($post);

		$template = locate_template('content-' . get_post_format() . '.php');
		if ($template == '')
		{
			$template = locate_template('content.php');
		}
		include($template);
		
		endwhile; ?>
	</div>
	<!-- End Loop -->

	<div class="blog-pagination clear-float">
	<?php if ($pagination == 'load-more') : ?>

		<div class="begin pagination"><span><i class="fa fa-file-text-o"></i><span class="label"> <?php _e('Begin', 'qualia_td'); ?></span></span></div>
		
		<?php // load more in classic archive mode should be displayed as a button
		$additional_classes = ($mode == 'timeline') ? '' : 'full-width align-center';
		if (!empty($next_url)) : ?>
		
		<div class="load-more pagination">
			<?php if ($mode == 'timeline') : ?>
			
			<a href="<?php echo $next_url; ?>" class="js-load-more">
				<i class="fa fa-refresh"></i><span class="label"><?php _e('Load More Posts', 'qualia_td'); ?></span>
			</a>
			
			<?php else : ?>

			<?php echo qualia_button(array(
				'href'             => $next_url,
				'background_color' => 'subtle',
				'color'            => 'text',
				'size'             => 'medium',
				'class'            => "js-load-more $additional_classes",
			), '<i class="fa fa-refresh"></i><span class="label"> ' . __('Load More Posts', 'qualia_td') . '</span>'); ?>

			<?php endif; ?>
		</div>

		<?php endif; ?>

		<div class="end pagination"<?php echo ($next_url) ? ' style="display: none;"' : ''; ?>><span><i class="fa fa-ellipsis-horizontal"></i><span class="label"> <?php _e('End', 'qualia_td'); ?></span></span></div>

	<?php elseif ($pagination == 'page') : ?>

		<?php // if has previous page
		$prev_page = get_previous_posts_link(); if (!empty($prev_page)) :
		// determine what icon to use depends on archive mode
		$prev_icon = ($mode == 'timeline') ? 'fa-angle-up': 'fa-angle-double-left'; ?>
		<div class="prev pagination"><?php previous_posts_link("<i class=\"fa $prev_icon\"></i><span class=\"label\"> " . __('Newer Posts', 'qualia_td') . "</span>"); ?></div>
		<?php else : ?>
		<div class="begin pagination"><span><i class="fa fa-file-text-o"></i><span class="label"> <?php _e('Begin', 'qualia_td'); ?></span></span></div>
		<?php endif; ?>

		<?php // if has next page
		$next_page = get_next_posts_link(); if (!empty($next_page)) :
		// determine what icon to use depends on archive mode
		$next_icon = ($mode == 'timeline') ? 'fa-angle-down' : 'fa-angle-double-right'; ?>
		<div class="next pagination"><?php next_posts_link("<span class=\"label\">" . __('Older Posts', 'qualia_td') . " </span><i class=\"fa $next_icon\"></i>"); ?></div>
		<?php else : ?>
		<div class="end pagination"><span><i class="fa fa-ellipsis-horizontal"></i><span class="label"> <?php _e('End', 'qualia_td'); ?></span></span></div>
		<?php endif; ?>

	<?php elseif ($pagination == 'wp-pagenavi') : ?>

		<?php wp_pagenavi(); ?>

	<?php elseif ($pagination == 'disabled') : ?>

		<div class="begin pagination"><span><i class="fa fa-file-text-o"></i><span class="label"> <?php _e('Begin', 'qualia_td'); ?></span></span></div>
		<div class="end pagination"><span><i class="fa fa-ellipsis-horizontal"></i><span class="label"> <?php _e('End', 'qualia_td'); ?></span></span></div>

	<?php endif; ?>
	</div>
</div>

<?php endif; ?>