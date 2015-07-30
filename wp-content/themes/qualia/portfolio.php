<?php if (is_single()) : ?>

<?php
$detail_mode    = qualia_override_option(vp_metabox('_vp_portfolio_options.is_override_display'), vp_metabox('_vp_portfolio_options.detail_mode'), vp_pf_option('qualia_single_detail_mode'));
$image_mode     = qualia_override_option(vp_metabox('_vp_portfolio_options.is_override_display'), vp_metabox('_vp_portfolio_options.image_mode'), vp_pf_option('qualia_single_image_mode'));
$main_classes   = 'main clear-float';
$aside_classes  = 'aside clear-float';
$thumbnail_mode = '';

// getting portfolio media
if( class_exists('VP_PF_Portfolio') ) {
	$media  = VP_PF_Portfolio::instance()->get_media();
} else {
	$medias = get_post_meta($post->ID, '_vp_portfolio_images', true);
	$medias = $medias['image'];
	$media  = array(
		'mode'  => 'image',
		'media' => $medias
	);
}

switch ($detail_mode) {
	case 'bottom':
		$thumbnail_mode = 'full-width';
		break;
	default:
		$thumbnail_mode = "content-width";
		$opp = (($detail_mode == 'left') ? 'right' : 'left');
		$main_classes  .= " grid-8 $opp";
		$aside_classes .= " grid-4 $detail_mode";
		break;
}

?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class("images-{$image_mode}"); ?>>

	<div<?php echo ($detail_mode != 'bottom') ? ' class="grids"' : ''; ?>>

		<div class="<?php echo $main_classes; ?>">

			<?php if( $media['mode'] === 'image' ): ?>
				
				<?php
					// preparing images
					$images = $media['media'];
					if (count($images) <= 1 and $image_mode === 'slider') {
						$image_mode = 'default';
					}
				?>
				<?php if (count($images) > 0) :  ?>
				<?php if ($image_mode === 'slider'): ?>
				<div class="images flexslider js-flexslider">
					<ul class="slides">
						<?php foreach($images as $image) : 
						global $wpdb;
						$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '$image[src]'";
						$id = $wpdb->get_var($query); ?>
						<li><?php echo wp_get_attachment_image($id, 'featured-' . $thumbnail_mode); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php else: ?>
				<div class="images">
					<ul>
						<?php foreach($images as $image) : 
						global $wpdb;
						$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '$image[src]'";
						$id = $wpdb->get_var($query); ?>
						<li><?php echo wp_get_attachment_image($id, $thumbnail_mode); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php endif; ?>

			<?php elseif ( $media['mode'] === 'video' ) : ?>
			
				<?php $video = $media['media'][0]; ?>

				<div class="video">
					<div class="video-wrapper <?php echo $video['mode']; ?>">
						<?php if ($video['mode'] === 'external') : ?>
							<?php echo do_shortcode($video['external']); ?>
						<?php elseif ($video['mode'] === 'internal') : ?>
							<video controls="controls" preload="metadata" src="<?php echo $video['internal']; ?>" poster="<?php echo $video['internal_poster']; ?>"></video>
						<?php endif; ?>
					</div>
				</div>

			<?php endif; ?>

			<?php $tags = get_the_terms(get_the_ID(), 'portfolio_tag');
			
			if (!empty($tags)) : ?>
			<div class="portfolio-tags tags tagcloud">
				<label><?php _e('Tags:', 'qualia_td'); ?></label><?php the_terms(get_the_ID(), 'portfolio_tag', '', '', ''); ?>
			</div>

			<?php endif; ?>
		</div>

		<div class="<?php echo $aside_classes; ?>">

			<?php
			$description_classes = 'description main';
			$info_classes        = 'info aside';

			if ($detail_mode == 'bottom') {
				$description_classes .= ' grid-8 left';
				$info_classes        .= ' grid-4 right';
			} ?>

			<div<?php echo ($detail_mode == 'bottom') ? ' class="grids"': ''; ?>>
				<div class="<?php echo $description_classes; ?>">
					<?php echo qualia_divider(array('mode' => "bold"), __('Description', 'qualia_td') . ' &nbsp; '); ?>
					<?php if (get_the_content() !== '') : ?>
					<?php the_content(); ?>
					<?php else : ?>
					<p><?php _e('No description provided', 'qualia_td'); ?></p>
					<?php endif; ?>
				</div>
				
				<?php if (count(vp_metabox('_vp_portfolio_info.info')) > 0) : ?>
				<div class="<?php echo $info_classes; ?>">
					<?php echo qualia_divider(array('mode' => "bold"), __('Portfolio Details', 'qualia_td') . ' &nbsp; '); ?>
					<ul>
						<?php foreach (vp_metabox('_vp_portfolio_info.info') as $info) : ?>
						<li>
							<div class="key"><?php echo $info['title']; ?></div>
							<div class="value"><?php echo apply_filters('meta_content', $info['content']); ?></div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</article>

<?php else: ?>

<?php

$the_terms_slug = array();
$the_terms_name = array();
$types = get_the_terms(get_the_ID(), 'portfolio_category');
if ($types) foreach (get_the_terms(get_the_ID(), 'portfolio_category') as $i => $term) {
	$the_terms_slug[] = $term->slug;
	$the_terms_name[] = $term->name;
} ?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class( (($pagination !== 'carousel') ? 'col ' : '') . implode(' ', $the_terms_slug)); ?>>
	<a href="<?php the_permalink(); ?>" class="portfolio-wrapper">
		<div class="thumbnail"><?php the_post_thumbnail("portfolio-thumbnail"); ?></div>
		<div class="info">
			<div class="info-wrapper">
				<h5><?php the_title(); ?></h5>
				<div class="portfolio-meta"><?php echo implode(', ', $the_terms_name); ?></div>
			</div>
		</div>
	</a>
</article>

<?php endif; ?>