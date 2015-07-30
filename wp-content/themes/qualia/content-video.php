<?php
$mb = (vp_metabox('_post_format_options.format_video_embed.0.mode') === 'external') ? vp_metabox('_post_format_options.format_video_embed.0.external') : vp_metabox('_post_format_options.format_video_embed.0.internal');
$_format_video_embed = (get_post_meta($post->ID, '_format_video_embed', true) == '') ? null : get_post_meta($post->ID, '_format_video_embed', true);
$format_video_embed = qualia_override_option(true, $_format_video_embed, $mb); ?>


<?php if (is_single()) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-wrapper<?php echo (has_post_thumbnail()) ? ' has-thumbnail' : ''; ?>">

		<div class="post-image video">
			<div class="video-wrapper <?php echo (filter_var($format_video_embed, FILTER_VALIDATE_URL)) ? 'internal': 'external'; ?>">
				<?php if (filter_var($format_video_embed, FILTER_VALIDATE_URL)) : ?>
				<video controls="controls" preload="metadata" src="<?php echo $format_video_embed; ?>" poster="<?php echo vp_metabox('_post_format_options.format_video_embed.0.internal_poster'); ?>"></video>
				<?php else : ?>
				<?php echo do_shortcode($format_video_embed); ?>
				<?php endif; ?>
			</div>
		</div>

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

		<div class="post-image video">
			<i class="fa <?php echo $icon[get_post_format()]; ?>"></i>
			<?php if ($mode !== 'mini') : ?>
			<div class="video-wrapper <?php echo (filter_var($format_video_embed, FILTER_VALIDATE_URL)) ? 'internal': 'external'; ?>">
				<?php if (filter_var($format_video_embed, FILTER_VALIDATE_URL)) : ?>
				<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
				<video preload="metadata" src="<?php echo $format_video_embed; ?>" poster="<?php echo vp_metabox('_post_format_options.format_video_embed.0.internal_poster'); ?>" controls></video>
				<?php else : ?>
				<?php echo do_shortcode($format_video_embed); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>

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