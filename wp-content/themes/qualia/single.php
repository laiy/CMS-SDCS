<?php get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section id="content"<?php echo qualia_build_class(array("content", "content-blog", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div class="blog-single">
				
				<?php
				$mode             = qualia_option('blog_archive_mode') === '' ? 'default' : qualia_option('blog_archive_mode');
				$sidebar_position = qualia_option('blog_single_sidebar_position');
				$shows_featured   = qualia_option('blog_single_shows_featured_image');
				$main_classes     = 'main';
				$aside_classes    = 'aside';

				if (!empty($sidebar_position)) {
					$opp = (($sidebar_position == 'left') ? 'right' : 'left');
					$main_classes  .= " grid-9 $opp";
					$aside_classes .= " grid-3 $sidebar_position";
				} ?>

				<div<?php echo (!empty($sidebar_position)) ? ' class="grids"' : ''; ?>>
					<div class="<?php echo $main_classes; ?>">
						
						<?php if (have_posts()) : the_post(); ?>
						<div class="post-content">
							<?php
							$template = locate_template('content-' . get_post_format() . '.php');
							if ($template == '') $template = locate_template('content.php');					
							include($template);
							?>

							<?php $tags = get_the_tags();
							if (!empty($tags)) : ?>
							<div class="post-tags tags tagcloud">
								<label><?php _e('Tags:', 'qualia_td'); ?></label><?php the_tags('', '', ''); ?>
							</div>
							<?php endif; ?>
							
							<?php if (qualia_option('enable_blog_author_box')) : ?>
							<div class="post-author">
								<div class="gravatar"><?php echo get_avatar(get_the_author_meta('ID'), 8 * qualia_option('body_font_size', 13) , '', get_the_author_meta('display_name')); ?></div>
								<h3><?php _e('About ', 'qualia_td'); the_author_posts_link(); ?></h3>
								<div class="text"><?php the_author_meta('description'); ?></div>
								<ul class="social-links clear-float">
									<?php if (get_the_author_meta('facebook')) : ?><li><a href="http://facebook.com/<?php the_author_meta('facebook'); ?>" class="facebook"><i class="socmed socmed-facebook"></i></a></li><?php endif; ?>
									<?php if (get_the_author_meta('twitter')) : ?><li><a href="http://twitter.com/<?php the_author_meta('twitter'); ?>" class="twitter"><i class="socmed socmed-twitter"></i></a></li><?php endif; ?>
									<?php if (get_the_author_meta('googleplus')) : ?><li><a href="http://plus.google.com/<?php the_author_meta('googleplus'); ?>?rel=author" class="googleplus"><i class="socmed socmed-googleplus"></i></a></li><?php endif; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
						<div class="post-comments">
							<?php comments_template(); ?>
						</div>
						<?php endif; ?>

					</div>

					<?php if (!empty($sidebar_position)) : ?>
					<div class="<?php echo $aside_classes; ?>">
						<?php get_sidebar(); ?>
					</div>
					<?php endif; ?>
				</div>


			</div>
			
		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer(); ?>