<div class="post-meta">
	<?php ob_start(); ?>
		<?php _e('Posted by ', 'qualia_td'); the_author_posts_link(); ?><span class="sep">/</span>
		<?php echo get_the_date(); ?><span class="sep">/</span>
		<?php the_terms(get_the_ID(), 'category', '', ', ', ''); ?><span class="sep">/</span>
		<?php comments_number(__('0 Comment', 'qualia_td'), __('1 Comment', 'qualia_td'), __('% Comments', 'qualia_td')); ?>
	<?php $meta = ob_get_clean();
	echo qualia_meta(array('class' => 'meta-list'), $meta); ?>
</div>