<?php get_header(); ?>
	<div id="wrapper" class="clearfix">
		<?php if (get_option('swt_slidershow') == 'Display') { ?>
		<?php include(TEMPLATEPATH.'/includes/slider.php'); ?>
		<?php } else {echo ''; } ?>

		<?php if (get_option('swt_new_p') == 'Display') { ?>
		<?php include(TEMPLATEPATH.'/includes/new_post.php'); ?>
		<?php } else { echo ''; } ?>

 		<div id="art_container clearfix">
 			<div id="art_main" class="fl">
					<?php include(TEMPLATEPATH.'/includes/column.php'); ?>

			</div><!-- art_main end-->
		</div>
	</div>
<?php get_footer(); ?>