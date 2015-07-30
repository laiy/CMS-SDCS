<?php get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<section id="content"<?php echo qualia_build_class(array("content", "content-404", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div class="error-404 grid-10 center">
				<h1><?php _e('Oops! Page could not be found', 'qualia_td'); ?></h1>
				<p><?php _e('Sorry, the page you are looking for is no longer online or has been moved! Try using our search or just close this page', 'qualia_td'); ?></p>
				<?php echo qualia_spacer(array('size' => '2rem')); ?>
				<form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
					<h4 class="hidden"><?php _e('Search in this site', 'qualia_td'); ?></h4>
					<div class="search-form-inner">
						<input class="search-form-input vp-input-medium" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Enter keywords', 'qualia_td'); ?>" />
						<button class="search-form-submit vp-button vp-background-accent vp-button-medium" type="submit" id="search-form-submit">
							<i class="fa fa-search"></i>
							<span> <?php _e('Search', 'qualia_td'); ?></span>
						</button>
					</div>
				</form>
			</div>

		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php get_footer(); ?>