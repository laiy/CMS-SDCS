<!DOCTYPE html>
<?php $html_class = ''; if (qualia_option('enable_responsive')) {
	$breakpoints = qualia_option('responsive_breakpoints');
	foreach ($breakpoints as &$breakpoint) $breakpoint = "breakpoint-$breakpoint";
	$html_class = implode(' ', $breakpoints);
} ?>
<html <?php language_attributes(); echo qualia_build_class(array($html_class)); ?>>
	
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>
			<?php if (is_front_page()) {
				bloginfo('name'); echo ' | '; bloginfo('description');
			}
			else {
				wp_title('|', true, 'right'); bloginfo('name'); 
			} ?>
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php
		$favicon = qualia_option('favicon');
		$favicon_iphone = qualia_option('favicon_iphone');
		$favicon_ipad = qualia_option('favicon_ipad');
		?>
		<?php if (!empty($favicon)) : ?>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
		<?php endif; ?>
		<?php if (!empty($favicon_iphone)) : ?>
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon_iphone; ?>" />
		<?php endif; ?>
		<?php if (!empty($favicon_iphone_retina)) : ?>
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_iphone_retina; ?>" />
		<?php endif; ?>
		<?php if (!empty($favicon_ipad)) : ?>
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_ipad; ?>" />
		<?php endif; ?>
		<?php if (!empty($favicon_ipad_retina)) : ?>
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_ipad_retina; ?>" />
		<?php endif; ?>
		
		<!-- BEGIN CUSTOM HEADER SCRIPTS -->
		<?php echo qualia_kses(qualia_option('head_script')); ?>
		<!-- END CUSTOM HEADER SCRIPTS -->

		<?php wp_head(); ?>
	</head>

	<?php

	/**
	 * Specific Overriding Page
	 */
	
	$enable_one_page_preloader = qualia_option('enable_one_page_preloader');

	$body_layout = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.layout'), qualia_option('body_layout'));
	$body_color_background = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_color'), qualia_option('body_background_color'));
	$body_background_image_mode = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.mode'), qualia_option('body_background_image_mode'));
	$body_background_image_package = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.package'), qualia_option('body_background_image_package'));
	$body_background_image_custom_src = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.custom_src'), qualia_option('body_background_image_custom_src'));
	$body_background_image_custom_position = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.custom_position'), qualia_option('body_background_image_custom_position'));
	$body_background_image_custom_attachment = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.custom_attachment'), qualia_option('body_background_image_custom_attachment'));
	$body_background_image_custom_repeat = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.custom_repeat'), qualia_option('body_background_image_custom_repeat'));
	$body_background_image_custom_size = qualia_override_option(vp_metabox('_page_options.body.0.is_override_body_settings'), vp_metabox('_page_options.body.0.background_image.0.custom_size'), qualia_option('body_background_image_custom_size'));

	$enable_sub_header = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.enable_sub_header'), qualia_option('enable_sub_header')); 
	$enable_breadcrumb = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.enable_breadcrumb'), qualia_option('enable_breadcrumb')); 
	$sub_header_color_set = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.color_set'), qualia_option('sub_header_color_set'));
	$sub_header_mode = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.mode'), qualia_option('sub_header_mode'));
	$sub_header_top_spacing = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.top_spacing'), qualia_option('sub_header_top_spacing'));
	$sub_header_bottom_spacing = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.bottom_spacing'), qualia_option('sub_header_bottom_spacing'));
	$sub_header_image = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.background.0.image'), qualia_option('sub_header_background_image'));
	$sub_header_image_position = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.background.0.position'), qualia_option('sub_header_background_position'));
	$sub_header_image_attachment = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.background.0.attachment'), qualia_option('sub_header_background_attachment'));
	$sub_header_image_repeat = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.background.0.repeat'), qualia_option('sub_header_background_repeat'));
	$sub_header_image_size = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.background.0.size'), qualia_option('sub_header_background_size'));
	$sub_header_separator = qualia_override_option(vp_metabox('_page_options.sub_header.0.is_override_sub_header_settings'), vp_metabox('_page_options.sub_header.0.separator'), qualia_option('sub_header_separator'));

	$enable_top_header = qualia_override_option(vp_metabox('_page_options.top_header.0.is_override_top_header_settings'), vp_metabox('_page_options.top_header.0.enable_top_header'), qualia_option('enable_top_header'));
	$top_header_color_set = qualia_override_option(vp_metabox('_page_options.top_header.0.is_override_top_header_settings'), vp_metabox('_page_options.top_header.0.color_set'), qualia_option('top_header_color_set'));

	$enable_floating_header = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.enable_floating_header'), qualia_option('enable_floating_header'));
	$header_color_set = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.color_set'), qualia_option('header_color_set'));
	$header_attachment = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.attachment'), qualia_option('header_attachment'));
	$header_mode = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.mode'), qualia_option('header_mode'));
	$header_separator = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.separator'), qualia_option('header_separator'));
	$header_logo = qualia_override_option((vp_metabox('_page_options.header.0.is_override_header_settings') && vp_metabox('_page_options.header.0.is_using_logo_alt')), qualia_option('logo_alt'), qualia_option('logo'));
	$header_absolute_background_color = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.absolute_background_color'), qualia_option('color_' . $header_color_set . '_background'));

	global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing;
	$qualia_content_separator = qualia_override_option(vp_metabox('_page_options.content.0.is_override_content_settings'), vp_metabox('_page_options.content.0.separator'), qualia_option('content_separator'));
	$qualia_content_top_spacing = qualia_override_option(vp_metabox('_page_options.content.0.is_override_content_settings'), vp_metabox('_page_options.content.0.top_spacing'), qualia_option('content_top_spacing'));
	$qualia_content_bottom_spacing = qualia_override_option(vp_metabox('_page_options.content.0.is_override_content_settings'), vp_metabox('_page_options.content.0.bottom_spacing'), qualia_option('content_bottom_spacing'));

	$body_class = $body_layout;
	switch ($body_background_image_mode) :
		case 'package': $body_class .= ' background-image-package background-image-package-' . $body_background_image_package; break;
		case 'custom': $body_class .= ' background-image-custom'; break;
		default: $body_class .= ' no-background-image'; break;
	endswitch;

	if ($enable_one_page_preloader) $body_class .= ' one-page-preloader';

	$body_style = qualia_build_inline_style(array(
		($body_color_background !== qualia_option('body_background_color')) ? "background-color: " . Qualia_Color::parse($body_color_background, 'hex') . "; background-color: $body_color_background;" : "",
		(!empty($body_background_image_custom_src)) ? "background-image: url($body_background_image_custom_src);" : "",
		(!empty($body_background_image_custom_position)) ? "background-position: $body_background_image_custom_position;" : "",
		(!empty($body_background_image_custom_attachment)) ? "background-attachment: $body_background_image_custom_attachment;" : "",
		(!empty($body_background_image_custom_repeat)) ? "background-repeat: $body_background_image_custom_repeat;" : "",
		(!empty($body_background_image_custom_size)) ? "background-size: $body_background_image_custom_size;" : "",
	)); ?>
	
	<body <?php body_class($body_class); echo $body_style; ?>>

		<div id="doc" class="doc">

			<?php if ($enable_top_header) : ?>
			<div id="top-header" class="top-header section color-palette-<?php echo $top_header_color_set; ?>">
				<div class="section-inner">

					<div class="wrapper">
						<div class="top-header-text">
							<?php echo wpautop(qualia_option('top_header_text')); ?>
						</div>
						<?php if (qualia_option('enable_top_header_social_links')) : ?>
						<div class="top-header-social">
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
						<?php if (qualia_option('enable_top_header_navigation')) : ?>
						<div class="top-header-nav">
							<?php wp_nav_menu(array('theme_location' => 'top-header-menu', 'container' => false, 'items_wrap' => '<div class="menu"><ul id="%1$s">%3$s</ul></div>', 'fallback_cb' => 'qualia_no_menu_assigned')); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php $hide_one_page_header = qualia_override_option(vp_metabox('_page_options.header.0.is_override_header_settings'), vp_metabox('_page_options.header.0.hide_one_page_header'), qualia_option('hide_one_page_header'));
			$one_page_header_class = (is_page_template('page-template-one-page.php') && $hide_one_page_header) ? 'hide-one-page-header' : ''; ?>

			<header id="header" class="header section mode-<?php echo $header_mode; ?> header-<?php echo $header_attachment; echo ($enable_floating_header) ? ' header-floating' : '' ; ?> color-palette-<?php echo $header_color_set; ?> separator-<?php echo $header_separator; ?> <?php echo $one_page_header_class; ?>"
				<?php echo ($header_attachment == 'absolute') ? ' style="background-color: ' . Qualia_Color::parse($header_absolute_background_color, 'hex') . '; background-color: ' . $header_absolute_background_color . '"' : ''; ?>>
				<div class="section-inner">
					<div class="wrapper">
						<h1 id="logo" class="logo">
							<a href="<?php echo home_url(); ?>">
							<?php if (qualia_option('logo')) : ?><img src="<?php echo $header_logo; ?>" alt="<?php bloginfo('name'); ?>" />
							<?php else : bloginfo('name'); endif; ?>
							</a>
						</h1>

						<?php if (qualia_option('enable_responsive')) : ?>
						<a href="#main-nav" id="nav-responsive-toggle" class="toggle nav-responsive-toggle right js-nav-responsive-toggle"><i class="fa fa-reorder"></i></a>
						<?php if (qualia_woocommerce_option('enable_cart_widget_on_header') && class_exists('WooCommerce')) :
						global $woocommerce; ?>
						<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="toggle nav-responsive-toggle right"><i class="fa fa-shopping-cart"></i></a>
						<?php endif; ?>
						<?php endif; ?>

						<?php ob_start(); ?>
										<?php if (qualia_woocommerce_option('enable_cart_widget_on_header') && class_exists('WooCommerce') && !is_page_template('page-template-one-page.php')) :
										global $woocommerce; ?>
										<li class="header-cart-container">
											<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="header-cart-link">
												<span class="cart-icon"><b></b><?php echo $woocommerce->cart->cart_contents_count; ?></span>
												<?php _e('Cart', 'qualia_td'); ?> <span class="update-total">(<?php echo $woocommerce->cart->get_cart_total(); ?>)</span>
											</a>
											<ul class="sub-menu header-widget header-cart">
												<?php $wc_cart_args = array(
													'before_widget' => '<li class="widget woocommerce widget_shopping_cart">',
													'after_widget' => '</li>',
													'before_title' => '<h5 class="widget-title">',
													'after_title' => '</h5>',
												);
												the_widget('Qualia_WC_Widget_Cart', array(), $wc_cart_args); ?>
											</ul>
										</li>
										<?php endif; ?>

										<?php if (qualia_option('enable_search_widget_on_header') && !is_page_template('page-template-one-page.php')) : ?>
										<li class="header-search-container">
											<a href="#"><i class="fa fa-search fa-lg"></i></a>
											<ul class="sub-menu header-widget header-search">
												<?php $search_args = array(
													'before_widget' => '<li class="widget widget_search">',
													'after_widget' => '</li>',
													'before_title' => '<h5 class="widget-title">',
													'after_title' => '</h5>',
												);
												the_widget('WP_Widget_Search', array(), $search_args); ?>
											</ul>
										</li>
										<?php endif; ?>
						<?php $header_widgets = trim(ob_get_clean()); ?>

						<div class="nav">
							<nav id="main-nav" class="main-nav">
								<?php if (is_page_template('page-template-one-page.php')) {
									wp_nav_menu(array('theme_location' => 'one-page-menu', 'container' => false, 'items_wrap' => '<div class="menu clear-float"><ul id="%1$s">%3$s</ul></div>', 'fallback_cb' => 'qualia_no_menu_assigned', 'depth' => -1));
								} else {
									wp_nav_menu(array('theme_location' => 'main-menu', 'container' => false, 'items_wrap' => '<div class="menu clear-float"><ul id="%1$s">%3$s</ul></div>', 'fallback_cb' => 'qualia_no_menu_assigned'));
								} ?>
							</nav>

							<?php if (!empty($header_widgets)) : ?>
							<div id="header-widgets" class="header-widgets">
								<div class="menu clear-float">
									<ul>
										<?php echo $header_widgets; ?>
									</ul>
								</div>
							</div>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</header>
			
			<div id="header-spacer" class="spacer header-spacer color-palette-<?php echo $header_color_set; ?>"></div>

			<?php // Sub Header
			if ( $enable_sub_header and !(is_home('post') && is_front_page()) ) :

			$style = qualia_build_inline_style(array(
				(!empty($sub_header_image)) ? "background-image: url($sub_header_image);" : "",
				(!empty($sub_header_image_position)) ? "background-position: $sub_header_image_position;" : "",
				(!empty($sub_header_image_attachment)) ? "background-attachment: $sub_header_image_attachment;" : "",
				(!empty($sub_header_image_repeat)) ? "background-repeat: $sub_header_image_repeat;" : "",
				(!empty($sub_header_image_size)) ? "background-size: $sub_header_image_size;" : "",
			)); ?>

			<div id="sub-header"<?php echo qualia_build_class(array("sub-header", "section", "color-palette-{$sub_header_color_set}", "mode-$sub_header_mode", "separator-{$sub_header_separator}")); echo $style; ?>>
				<div class="section-inner">
					<?php echo qualia_spacer(array('size' => $sub_header_top_spacing)); ?>

					<div class="wrapper">
						<div class="title">
							<?php $wc_exists = class_exists( 'woocommerce' ); ?>
							
							<?php if (is_404()) : ?>
							<h1><?php echo qualia_option('404_title', __('Page Not Found', 'qualia_td')); ?></h1>

							<?php elseif ( $wc_exists && is_shop() ) : ?> 
							<h1><?php echo qualia_woocommerce_option('product_archive_title'); ?></h1>

							<?php elseif( $wc_exists && is_product_category() ) : ?>
							<h1><?php printf(qualia_woocommerce_option('product_category_title', __('Products Under: %s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif( $wc_exists && is_product_tag() ) : ?>
							<h1><?php printf(qualia_woocommerce_option('product_tag_title', __('Products Tagged: %s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif (is_home('post') && get_option('show_on_front') == 'page') : // post index is a page ?> 
							<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>

							<?php elseif (is_search()) : ?>
							<h1><?php global $wp_query; printf(qualia_option('search_result_title', __('%s Search Results for: %s', 'qualia_td')), $wp_query->found_posts, get_search_query()); ?></h1>
							
							<?php elseif (is_post_type_archive('portfolio')) : ?>
							<h1><?php echo qualia_vp_pf_option('qualia_home_title', __('Our Portfolios', 'qualia_td')); ?></h1>

							<?php elseif (is_tax('portfolio_category')) : ?>
							<h1><?php printf(qualia_vp_pf_option('qualia_category_title', __('Our Portfolios: %s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif (is_tax('portfolio_tag')) : ?>
							<h1><?php printf(qualia_vp_pf_option('qualia_tag_title', __('Our Portfolio Tagged Under: %s', 'qualia_td')), get_queried_object()->name); ?></h1>
							
							<?php elseif (is_author()) : ?>
							<h1><?php printf(qualia_vp_pf_option('author_archive_title', __('Blog Posts by %s', 'qualia_td')), get_queried_object()->display_name); ?></h1>

							<?php elseif (is_category()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_category_archive_title', __('%s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif (is_tag()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_tag_archive_title', __('Blog Posts Tagged Under: %s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif (is_tax()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_taxonomy_archive_title', __('Blog : %s', 'qualia_td')), get_queried_object()->name); ?></h1>

							<?php elseif (is_year()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_taxonomy_archive_title', __('%s', 'qualia_td')), get_the_date('Y')); ?></h1>

							<?php elseif (is_month()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_taxonomy_archive_title', __('Blog Posts on %s', 'qualia_td')), get_the_date('F Y')); ?></h1>

							<?php elseif (is_day()) : ?>
							<h1><?php printf(qualia_vp_pf_option('post_taxonomy_archive_title', __('Blog Posts on %s', 'qualia_td')), get_the_date()); ?></h1>

							<?php else : ?>
							<h1><?php the_title(); ?></h1>
							<?php endif; ?>
						</div>
						<?php if ($enable_breadcrumb) : ?>
						<?php qualia_render_breadcrumb(); ?>
						<?php endif; ?>
					</div>

					<?php echo qualia_spacer(array('size' => $sub_header_bottom_spacing)); ?>
				</div>
			</div>
			<?php endif; ?>