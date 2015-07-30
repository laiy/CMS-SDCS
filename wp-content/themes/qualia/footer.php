<?php
$enable_footer = qualia_override_option(vp_metabox('_page_options.footer.0.is_override_footer_settings'), vp_metabox('_page_options.footer.0.enable_footer'), qualia_option('enable_footer'));
$footer_separator = qualia_override_option(vp_metabox('_page_options.footer.0.is_override_footer_settings'), vp_metabox('_page_options.footer.0.separator'), qualia_option('footer_separator'));
$footer_color_set = qualia_override_option(vp_metabox('_page_options.footer.0.is_override_footer_settings'), vp_metabox('_page_options.footer.0.color_set'), qualia_option('footer_color_set'));

$enable_copyright = qualia_override_option(vp_metabox('_page_options.copyright.0.is_override_copyright_settings'), vp_metabox('_page_options.copyright.0.enable_copyright'), qualia_option('enable_copyright'));
$copyright_separator = qualia_override_option(vp_metabox('_page_options.copyright.0.is_override_copyright_settings'), vp_metabox('_page_options.copyright.0.separator'), qualia_option('copyright_separator'));
$copyright_color_set = qualia_override_option(vp_metabox('_page_options.copyright.0.is_override_copyright_settings'), vp_metabox('_page_options.copyright.0.color_set'), qualia_option('copyright_color_set'));
?>
			
			<?php if ($enable_footer) : ?>
			<footer id="footer"<?php echo qualia_build_class(array('footer', 'section', "color-palette-{$footer_color_set}", "separator-{$footer_separator}")); ?>>
				<div class="section-inner">
					<?php echo qualia_spacer(array('size' => 5 * qualia_option('body_font_size'))); ?>
					<div class="wrapper">
						<div class="grids">
							<?php $n = qualia_option('footer_number_of_columns');
							for ($i = 1; $i <= $n; $i++) : ?>
							<div class="grid-<?php echo qualia_option('footer_grid_column_' . $i); echo (qualia_option('footer_offset_column_' . $i)) ? ' offset-' . qualia_option('footer_offset_column_' . $i) : ''; ?>">
								<?php if (is_active_sidebar('footer-sidebar-' . $i)) dynamic_sidebar('footer-sidebar-' . $i); ?>
							</div>
							<?php endfor; ?>
						</div>
					</div>
					<?php echo qualia_spacer(array('size' => 5 * qualia_option('body_font_size'))); ?>
				</div>
			</footer>
			<?php endif; ?>

			<?php if ($enable_copyright) : ?>
			<div id="copyright"<?php echo qualia_build_class(array('copyright', 'section', "color-palette-$copyright_color_set", "separator-{$copyright_separator}")); ?>>
				<div class="section-inner">
					<?php echo qualia_spacer(array('size'  => 1.5 * qualia_option('body_font_size'))); ?>
					<div class="wrapper">
						<div class="copyright-text">
							<?php echo wpautop(qualia_option('copyright_text')); ?>
						</div>
						<?php if (qualia_option('enable_copyright_social_links')) : ?>
						<div class="copyright-social">
							<ul class="social-links">
								<?php $socs = qualia_option('socmed_set');
								foreach ($socs as $soc) :
									$link = qualia_option("socmed_{$soc}");
									if (empty($link)) continue; // skip if no link
									if ($soc === 'email') $link = "mailto:$link"; // change link for email
									if ($soc === 'skype') $link = "skype:$link"; // change link for skype
								?>
								<li>
									<a href="<?php echo $link; ?>" class="<?php echo $soc; ?>"><i class="socmed socmed-<?php echo $soc; ?>"></i></a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php if (qualia_option('enable_copyright_navigation')) : ?>
						<div class="copyright-nav">
							<?php wp_nav_menu(array('theme_location' => 'copyright-menu', 'container' => false, 'items_wrap' => '<div class="menu"><ul id="%1$s">%3$s</ul></div>', 'fallback_cb' => 'qualia_no_menu_assigned')); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php echo qualia_spacer(array('size'  => 1.5 * qualia_option('body_font_size'))); ?>
				</div>
			</div>
			<?php endif; ?>

		</div>

		<!-- BEGIN CUSTOM FOOTER SCRIPTS -->
		<?php echo qualia_kses(qualia_option('foot_script')); ?>
		<!-- END CUSTOM FOOTER SCRIPTS -->

		<?php wp_footer(); ?>
	</body>

</html>