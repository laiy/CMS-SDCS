<div class="cat_list">
<ul>
<?php if(is_archive()): ?>
<?php
	$current_page = max(1, get_query_var('paged'));
	$posts_per_page = get_option('posts_per_page');
	$sticky_query = new WP_Query(array(
		'cat' => $cat,
		'post__in' => get_option('sticky_posts'),
		));
	$sticky_count = $sticky_query -> found_posts;
	$last_sticky = $sticky_count % $posts_per_page;
	if($last_sticky == 0) $last_sticky = $posts_per_page;
	if($current_page < ceil($sticky_count / $posts_per_page))
	{
		// 都是置顶
		$sticky_query = new WP_Query(array(
			'posts_per_page' => $posts_per_page,
			'cat' => $cat,
			'post__in' => get_option('sticky_posts'),
			'offset' => $posts_per_page * ($current_page - 1)
			));
	}
	else if($current_page == ceil($sticky_count / $posts_per_page))
	{
		// 置顶与普通交界
		$sticky_query = new WP_Query(array(
			'posts_per_page' => $posts_per_page,
			'cat' => $cat,
			'post__in' => get_option('sticky_posts'),
			'offset' => $posts_per_page * ($current_page - 1)
			));
		if($last_sticky < $posts_per_page)
		{
			$normal_query = new WP_Query(array(
				'posts_per_page' => $posts_per_page - $last_sticky,
				'cat' => $cat,
				'post__not_in' => get_option('sticky_posts')
				));
		}
	}
	else
	{
		// 都是普通
		unset($sticky_query);
		$normal_query = new WP_Query(array(
			'posts_per_page' => $posts_per_page,
			'cat' => $cat,
			'post__not_in' => get_option('sticky_posts'),
			'offset' => $posts_per_page - ($last_sticky) + (($current_page - ceil($sticky_count / $posts_per_page) - 1) * $posts_per_page)
			));
	}
	$isEmpty = true;
?>
<?php if(isset($sticky_query)): ?>
<?php while($sticky_query -> have_posts()): $isEmpty = false; ?>
<?php $sticky_query -> the_post(); ?>
<li>
<h2>
	<span class="date fr">
		<strong><?php _e('[:zh]置顶[:en]TOP'); ?></strong>
		<?php the_time('Y-m-d'); ?>
	</span>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php echo cut_str($post->post_title, 80); ?>
	</a>
</h2>
</li>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php if(isset($normal_query)): ?>
<?php while($normal_query -> have_posts()): $isEmpty = false; ?>
<?php $normal_query -> the_post(); ?>
<li>
<h2>
	<span class="date fr">
		<?php the_time('Y-m-d'); ?>
	</span>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php echo cut_str($post->post_title, 80); ?>
	</a>
</h2>
</li>
<?php endwhile; ?>
<?php endif; ?>
</ul>
<?php if($isEmpty): ?>
<h3><?php _e('[:zh]什么也找不到！[:en]Not found!'); ?></h3>
<p><?php _e('[:zh]当前没有该分类的文章。[:en]No such post right now.'); ?></p>
<?php endif; ?>
<div class="page_navi"><?php par_pagenavi(9); ?></div>
</div>
<?php else: ?>
	<ul>
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<li>
			<h2><span class="date fr"><?php the_time('Y-m-d'); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo cut_str($post->post_title,80); ?></a>
			</h2>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php else : ?>
	<h3><?php _e('[:zh]什么也找不到！[:en]Not found!'); ?></h3>
	<p><?php _e('[:zh]当前没有该分类的文章。[:en]No such post right now.'); ?></p>
	<?php endif; ?>
	<div class="page_navi"><?php par_pagenavi(9); ?></div>
	</div>
<?php endif; ?>