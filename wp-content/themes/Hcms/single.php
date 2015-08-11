<?php get_header(); ?>
<div id="wrapper" class="clearfix">
	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php bloginfo('home'); ?>" title="返回首页">home</a></strong>
			<?php the_category(' ', 'multiple'); ?>
			<a><?php the_title(); ?></a>
		</div>
	</div>
	<div id="art_container clearfix">
		<div id="art_main1" class="art_white_bg fl">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="art_title clearfix">
					<h1><?php the_title(); ?></h1>
					<p class="info">
						<small><?php _e('[:zh]栏目:[:en]Categories:'); ?></small><?php the_category(',') ?>
						<small><?php _e('[:zh]发布时间:[:en]Published:'); ?></small><?php the_time('Y-m-d'); ?>
						<small><?php _e('[:zh]编辑:[:en]Editor:'); ?></small><?php the_author(); ?>
						<small><?php _e('[:zh]浏览次数:[:en]View:'); ?></small><?php post_views('', ''); ?>
						<?php edit_post_link(); ?>
					</p><!-- /info -->
				</div>
				<div class="article_content">
					<div class="article-tag">
						<?php the_tags('<p><strong>本文标签</strong>： ', ' , ','</p>' ); ?>
					</div>
					<?php if (get_option('swt_adr') == 'Hide') { ?>
					<?php { echo ''; } ?>
					<?php } else { include(TEMPLATEPATH . '/includes/adr.php'); } ?>
					<div class="clear"></div>
					<?php the_content(); ?>
					<?php if (get_option('swt_adt') == 'Hide') { ?>
					<?php { echo ''; } ?>
					<?php } else { include(TEMPLATEPATH . '/includes/adt.php'); } ?>
					<div class="clear"></div>
				</div><!--正文-->
				<div class="con_pretext clearfix">
					<ul>
						<li class="first">
							上一篇：
						<?php
							$adjLink = get_adjacent_post(true, '', true);
							if(!$adjLink):
						?>
							没有了
						<?php else: ?>
							<?php previous_post_link('%link'); ?>
						<?php endif; ?>
						</li>
						<li class="last">
							下一篇：
						<?php
							$adjLink = get_adjacent_post(true, '', false);
							if(!$adjLink):
						?>
							没有了
						<?php else: ?>
							<?php next_post_link('%link'); ?>
						<?php endif; ?>
						</li>
					</ul>
				</div><!--上一页 下一页-->
				<?php if (comments_open()) comments_template( '', true ); ?>
				<?php if (get_option('swt_adc') == 'Hide') { ?>
				<?php { echo ''; } ?>
				<?php } else { include(TEMPLATEPATH . '/includes/ad_c.php'); } ?>
				<div class="clear"></div>
			<?php endwhile; ?>
		</div><!--内容-->
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>