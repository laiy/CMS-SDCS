<?php
$_format_quote_source_name = (get_post_meta($post->ID, '_format_quote_source_name', true) === '') ? null : get_post_meta($post->ID, '_format_quote_source_name', true);
$_format_quote_source_url = (get_post_meta($post->ID, '_format_quote_source_url', true) === '') ? null : get_post_meta($post->ID, '_format_quote_source_url', true);
$format_quote_source_name = qualia_override_option(true, $_format_quote_source_name, vp_metabox('_post_format_options.format_quote_source_name'));
$format_quote_source_url = qualia_override_option(true, $_format_quote_source_url, vp_metabox('_post_format_options.format_quote_source_url'));

if (!strpos($post->post_content, '<blockquote>')) $post->post_content = '<blockquote>' . $post->post_content . '</blockquote>';
setup_postdata($post); ?>


<?php if (is_single()) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-wrapper<?php echo (has_post_thumbnail() and $shows_featured) ? ' has-thumbnail' : ''; ?>">

		<?php if (has_post_thumbnail() and $shows_featured) : ?>
			<?php if( empty($sidebar_position) ): ?>
				<?php the_post_thumbnail('featured-full-width'); ?>
			<?php else: ?>
				<?php the_post_thumbnail('featured-content-width'); ?>
			<?php endif; ?>
		<?php endif; ?>

		<div class="post-core">

			<div class="post-content">
				<div class="blurb"><?php the_content(); ?></div>
				<?php if (!empty($format_quote_source_name)) : ?>
				<cite class="source meta">
					<a href="<?php echo (!empty($format_quote_source_url)) ? $format_quote_source_url : '#'; ?>"><?php echo $format_quote_source_name; ?></a>
				</cite>
				<?php endif; ?>
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
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('blog-thumbnail-' . $mode); ?></a>
		</div>
		<?php endif; ?>

		<div class="post-core">

			<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_title(); ?></a></h2>
			<div class="post-content clear-float">
				<div class="blurb"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_content(); ?></a></div>
				<?php if (!empty($format_quote_source_name)) : ?>
				<cite class="source meta"><a href="<?php echo $format_quote_source_url; ?>" title="<?php echo esc_attr($format_quote_source_name); ?>"><?php echo $format_quote_source_name; ?></a></cite>
				<?php endif; ?>
			</div>

			<?php get_template_part('content', 'meta'); ?>

		</div>
	</div>

	<?php if (is_sticky() and $paged <= 1) : ?>
	<span class="ribbon"><span><?php echo qualia_option('blog_archive_sticky_label'); ?></span></span>
	<?php endif; ?>

</article>

<?php endif; ?>