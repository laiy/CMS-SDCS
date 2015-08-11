<?php get_header(); ?>
	<div id="wrapper" class="clearfix">
	<?php
		wp_reset_query();
		if (!is_home()) :
	?>
	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php bloginfo('url'); ?>" title="<?php _e('[:zh]回到首页[:en]Back to homepage'); ?>">home</a></strong>
		<?php if ( get_category($cat)->category_parent ) : ?>
			<?php
				//echo '<a>'; the_category('</a>', 'multiple');
				echo get_category_parents( $cat, true , '');
			?>
		<?php elseif ( is_tag() ): ?>
			<a><?php _e('[:zh]包含标签 "[:en]Post with tag "'); ?><?php single_cat_title(); ?><?php _e('[:zh]" 的文章[:en]"'); ?></a>
		<?php else : ?>
			<a><?php single_cat_title(); ?></a>
		<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
 		<div id="art_container clearfix">
 			<div id="art_main" class="fl">
				<?php include(TEMPLATEPATH . '/includes/title_list.php');?>
            </div><!--内容-->
        </div>
    </div>
<?php get_footer(); ?>