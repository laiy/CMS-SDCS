<?php if (have_posts()) : ?>
<ul class="widget-post-list">
	<?php while(have_posts()) : the_post(); ?>
	<li>
		<?php $icon = ''; switch (get_post_format()) {
			case 'audio'  : $icon = 'fa-music'; break;
			case 'gallery': $icon = 'fa-picture-o'; break;
			case 'link'   : $icon = 'fa-external-link'; break;
			case 'quote'  : $icon = 'fa-quote-left'; break;
			case 'video'  : $icon = 'fa-film'; break;
			default       : $icon = 'fa-file'; break;
		} ?>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="widget-post-list-item-image"><i class="fa <?php echo $icon; ?>"></i><?php the_post_thumbnail('thumbnail'); ?></a>
		<h6 class="widget-post-list-item-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if (get_the_title()) the_title(); else the_ID(); ?></a></h6>
		<?php echo qualia_meta(array('class' => 'widget-post-list-item-date'), get_the_date()); ?>
	</li>
	<?php endwhile; ?>
</ul>

<?php else : ?>
<p><em><?php _e('No Posts Found', 'qualia_td'); ?></em></p>

<?php endif; ?>