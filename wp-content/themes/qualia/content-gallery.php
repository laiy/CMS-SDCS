<?php
preg_match('/\[gallery.*ids=.(.*).\]/', $post->post_content, $ids);
$gal_ids = explode(',', str_replace(' ', '', $ids[1]));
$post->post_content = preg_replace('/(^([\r\n]))*(\[gallery.*?\])([\r\n])*/m', '', $post->post_content);
setup_postdata($post); ?>


<?php if (is_single()) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-wrapper<?php echo (has_post_thumbnail() and $shows_featured) ? ' has-thumbnail' : ''; ?>">
		
		<?php if (count($gal_ids) > 0) : ?>
		<div class="post-image gallery flexslider js-flexslider">
			<ul class="slides">
				<?php foreach ($gal_ids as $gal_id) : ?>
					<?php if( empty($sidebar_position) ): ?>
						<li><?php echo wp_get_attachment_image($gal_id, 'featured-full-width'); ?></li>
					<?php else: ?>
						<li><?php echo wp_get_attachment_image($gal_id, 'featured-content-width'); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<div class="post-core">

			<div class="post-content"><?php the_content(); ?></div>

			<?php get_template_part('content', 'footer'); ?>
			<?php get_template_part('content', 'meta'); ?>

		</div>
	</div>

</article>

<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>

	<div class="post-wrapper has-thumbnail">

		<?php if (count($gal_ids) > 0) : ?>
		<div class="post-image gallery">
			<i class="fa <?php echo $icon[get_post_format()]; ?>"></i>
			<div class="flexslider js-flexslider">
				<ul class="slides">
					<?php foreach ($gal_ids as $gal_id) : ?>
					<li><?php echo wp_get_attachment_image($gal_id, 'blog-thumbnail-' . ($mode == 'masonry' ? 'default' : $mode)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>

		<div class="post-core">

			<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_title(); ?></a></h2>
			<div class="post-content text"><?php the_content(''); ?></div>

			<div class="read-more">
				<?php echo qualia_button(array(
					'href'             => get_permalink(),
					'background_color' => 'accent',
					'color'            => 'base',
					'size'             => 'small',
				), __('Continue Reading', 'qualia_td')); ?>
			</div>
			
			<?php get_template_part('content', 'meta'); ?>

		</div>
	</div>

	<?php if (is_sticky() and $paged <= 1) : ?>
	<span class="ribbon"><span><?php echo qualia_option('blog_archive_sticky_label'); ?></span></span>
	<?php endif; ?>

</article>

<?php endif; ?>