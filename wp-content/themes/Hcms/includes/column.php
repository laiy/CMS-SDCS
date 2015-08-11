<?php $display_categories = explode(',', get_option('swt_cat') ); $i = 1; foreach ($display_categories as $category) { ?>
	<div class="con_box fl resouse_artile qd_aritle" id="cat-<?php echo $i; ?>"  >
		<?php query_posts("cat=$category")?>
		<h2><span><a class="more fr" rel="nofollow" href="<?php echo get_category_link($category);?>">more</a></span><?php single_cat_title(); ?></h2>
		<div>
			<ul class="index_resourse_list qd_list clearfix">
			<?php
				// 先查询置顶的文章
				$sticky_query = new WP_Query(array(
					'posts_per_page' => get_option('swt_column_post'),
					'cat' => $category,
					'post__in' => get_option('sticky_posts'),
					));
				while($sticky_query -> have_posts()): $sticky_query -> the_post();
			?>
				<li> <span class="fr"><strong><?php _e('[:zh]置顶[:en]TOP'); ?></strong> <?php the_time('m-d'); ?></span>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo cut_str($post -> post_title, 50); ?></a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php
				$remain = get_option('swt_column_post') - $sticky_query -> found_posts;
				if($remain > 0):
			?>
			<?php
				// 查询其它文章
				$normal_query = new WP_Query(array(
					'posts_per_page' => $remain,		// 减去置顶数量
					'cat' => $category,
					'post__not_in' => get_option('sticky_posts')
					));
			?>
			<?php while ($normal_query -> have_posts()) : $normal_query -> the_post(); ?>
				<li> <span class="fr"><?php the_time('m-d'); ?></span>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo cut_str($post -> post_title, 50); ?></a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			</ul>
		</div>
	</div>
	<?php $i++; ?>
<?php } ?>
