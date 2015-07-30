<?php
$_format_link_url = (get_post_meta($post->ID, '_format_link_url', true) === '') ? null : get_post_meta($post->ID, '_format_link_url', true);
$format_link_url  = qualia_override_option(true, $_format_link_url, vp_metabox('_post_format_options.format_link_url')); ?>


<?php if (is_single()) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-wrapper<?php echo (has_post_thumbnail()) ? ' has-thumbnail' : ''; ?>">
		
		<?php if (has_post_thumbnail() and $shows_featured) : ?>
		<div class="post-image thumbnail">
			<?php if( empty($sidebar_position) ): ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('featured-full-width'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('featured-content-width'); ?></a>
			<?php endif; ?>		</div>
		<?php endif; ?>

		<div class="post-core">

			<div class="post-content">
				<h2 class="post-title"><a href="<?php echo $format_link_url; ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_content(); ?></a></h2>
				<cite class="source meta">
					<a href="<?php echo $format_link_url; ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><i class="fa fa-quote-left"></i><?php echo $format_link_url; ?></a>
				</cite>
			</div>

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
			<?php if ($mode !== 'mini') : ?>
			<a href="<?php echo $format_link_url; ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('blog-thumbnail-' . $mode); ?></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="post-core">

			<h2 class="post-title"><a href="<?php echo $format_link_url; ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_content(); ?></a></h2>
			<div class="post-content">
				<cite class="source meta">
					<a href="<?php echo $format_link_url; ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><i class="fa fa-external-link-square"></i><?php echo $format_link_url; ?></a>
				</cite>
			</div>

			<?php get_template_part('content', 'meta'); ?>

		</div>
	</div>

	<?php if (is_sticky() and $paged <= 1) : ?>
	<span class="ribbon"><span><?php echo qualia_option('blog_archive_sticky_label'); ?></span></span>
	<?php endif; ?>

</article>

<?php endif; ?>