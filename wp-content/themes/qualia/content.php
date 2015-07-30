<?php if (is_single()) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-wrapper<?php echo (has_post_thumbnail()) ? ' has-thumbnail' : ''; ?>">
		
		<?php if (has_post_thumbnail() and $shows_featured) : ?>
		<div class="post-image thumbnail">
			<?php if( empty($sidebar_position) ): ?>
				<?php the_post_thumbnail('featured-full-width'); ?>
			<?php else: ?>
				<?php the_post_thumbnail('featured-content-width'); ?>
			<?php endif; ?>
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

	<div class="post-wrapper<?php echo (has_post_thumbnail()) ? ' has-thumbnail' : ''; ?>">

		<?php if (has_post_thumbnail()) : ?>
		<div class="post-image thumbnail">
			<i class="fa <?php echo $icon[get_post_format()]; ?>"></i>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('blog-thumbnail-' . $mode); ?></a>
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