<?php global $multipage, $numpages, $page; ?>
<?php if ($multipage) : ?>
<div class="post-pagination clear-float">
	
	<?php if(function_exists('wp_pagenavi')) : ?>

	<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>

	<?php else: ?>
	
	<?php wp_link_pages(array(
		 'before' => '<p class="wp-link-pages">',
		 'after ' => '</p>',
		 'link_before' => '',
		 'link_after' => '',
		 'next_or_number' => 'next',
		 'nextpagelink' => '<span class="label">' . __('Next Page', 'qualia_td') . ' </span><i class="fa fa-angle-double-right"></i>',
		 'previouspagelink' => '<span class="label"><i class="fa fa-angle-double-left"></i> ' . __('Previous Page', 'qualia_td') . '</span>',
	)); ?>
	
	<?php endif; ?>
</div>
<?php endif; ?>