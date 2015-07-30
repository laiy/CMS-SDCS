<?php

/**
 * Here is the place to put your own defined function that serve as
 * datasource to field with multiple options.
 */

/**
 * ================================================================
 * HELPER FUNCTIONS
 * ================================================================
 */

function qualia_separate_fonts($string) {
	$arr = explode(",", $string);
	foreach ($arr as $font) {
		$font = '"' . trim($font) . '"';
	}
	return implode(", ", $arr);
}

function _qualia_get_embed_font_style() {
	$fonts = func_get_args();

	$ret = array();
	foreach ($fonts as $font) {

		$font = (array) $font;

		if (in_array($font[0], VP_Util_Array::deep_values(vp_get_gwf_family(), 'value'))) {
			// GWF
			$gwf = new VP_Site_GoogleWebFont();
			$gwf->add($font[0], $font[1], $font[2], $font[3]);
			$links = $gwf->get_font_links();
			$link = reset($links);
			$ret[] = "@import url('{$link}');";

		} else if (in_array($font[0], qualia_get_custom_font())) {
			// custom fonts
			$i = array_search($font[0], array(
				'custom_font_1_name',
				'custom_font_2_name',
				'custom_font_3_name',
			));

			$src = array();
			$eot = qualia_option("custom_font_{$i}_file_eot");
			if (!empty($eot)) $src[] = "url('$eot?#iefix') format('embedded-opentype')";
			$woff = qualia_option("custom_font_{$i}_file_woff");
			if (!empty($woff)) $src[] = "url('$woff') format('woff')";
			$ttf = qualia_option("custom_font_{$i}_file_ttf");
			if (!empty($ttf)) $src[] = "url('$ttf') format('truetype')";
			$svg = qualia_option("custom_font_{$i}_file_svg");
			if (!empty($svg)) $src[] = "url('$svg?#svgFontName') format('svg')";

			$string = '';
			$string .= "// CUSTOM FONT $i" . "\n";
			$string .= "@font-face { ";
			$string .= "font-family: '$font[0]'; ";
			$string .= "src: " . implode(", ", $src) . "; }" . "\n";

			$ret[] = $string;
		}
	}
	return $ret;
}

/**
 * ================================================================
 * POOL
 * ================================================================
 */

function qualia_get_regular_font() {
	return array(
		'Helvetica, Arial',
		'Verdana, Geneva',
		'Tahoma, Geneva',
		'Georgia'
	);
}

function qualia_get_custom_font() {
	$custom = array();
	for ($i = 1; $i <= 3; $i++) {
		$name = qualia_option('custom_font_' . $i . '_name');
		if (!empty($name)) {
			$custom[] = $name;
		}
	}
	return $custom;
}

function qualia_get_font_properties() {
	return array(
		'font_face', 'font_style', 'font_weight', 'font_subset', 'font_transform', 'font_size', 'line_height', 'letter_spacing'
	);
}

function qualia_get_color_properties() {
	return array('background', 'base', 'subtle', 'text', 'strong', 'accent');
}

function qualia_get_color_standard_properties() {
	return array('black', 'white', 'info', 'warning', 'success', 'error', 'normal');
}



/**
 * ================================================================
 * DATA SOURCES
 * ================================================================
 */

VP_Security::instance()->whitelist_function('qualia_get_social_medias');
function qualia_get_social_medias() {
	$socmed = array(
		array('value' => 'behance', 'label' => 'Behance'),
		array('value' => 'blogger', 'label' => 'Blogger'),
		array('value' => 'delicious', 'label' => 'Delicious'),
		array('value' => 'deviantart', 'label' => 'DeviantArt'),
		array('value' => 'digg', 'label' => 'Digg'),
		array('value' => 'dribbble', 'label' => 'Dribbble'),
		array('value' => 'dropbox', 'label' => 'Dropbox'),
		array('value' => 'email', 'label' => 'Email'),
		array('value' => 'facebook', 'label' => 'Facebook'),
		array('value' => 'flickr', 'label' => 'Flickr'),
		array('value' => 'forrst', 'label' => 'Forrst'),
		array('value' => 'foursquare', 'label' => 'Foursquare'),
		array('value' => 'github', 'label' => 'Github'),
		array('value' => 'googleplus', 'label' => 'Google+'),
		array('value' => 'instagram', 'label' => 'Instagram'),
		array('value' => 'lastfm', 'label' => 'Last.FM'),
		array('value' => 'linkedin', 'label' => 'LinkedIn'),
		array('value' => 'myspace', 'label' => 'MySpace'),
		array('value' => 'pinterest', 'label' => 'Pinterest'),
		array('value' => 'reddit', 'label' => 'Reddit'),
		array('value' => 'rss', 'label' => 'RSS'),
		array('value' => 'skype', 'label' => 'Skype'),
		array('value' => 'soundcloud', 'label' => 'SoundCloud'),
		array('value' => 'stumbleupon', 'label' => 'StumbleUpon'),
		array('value' => 'tumblr', 'label' => 'Tumblr'),
		array('value' => 'twitter', 'label' => 'Twitter'),
		array('value' => 'vimeo', 'label' => 'Vimeo'),
		array('value' => 'wordpress', 'label' => 'WordPress'),
		array('value' => 'xing', 'label' => 'Xing'),
		array('value' => 'yahoo', 'label' => 'Yahoo'),
		array('value' => 'youtube', 'label' => 'Youtube'),
	);
	return $socmed;
}

VP_Security::instance()->whitelist_function('qualia_source_background_image_package');
function qualia_source_background_image_package() {
	$images = glob(QUALIA_IMAGES_DIR . 'patterns_thumb/{*.jpg,*.jpeg,*.gif,*.png}', GLOB_BRACE);
	$ret = array();

	foreach ($images as $image) {
		$file = pathinfo($image);
		$ret[$file['filename']] = array(
			'label' => $file['filename'],
			'value' => $file['filename'],
			'img' => QUALIA_IMAGES . 'patterns_thumb/' . $file['basename'],
		);
	}

	return $ret;
}

VP_Security::instance()->whitelist_function('qualia_source_body_layout');
function qualia_source_body_layout() {
	return array(
		array('label' => __('Wide', 'qualia_td'), 'value' => 'wide', 'img' => QUALIA_IMAGES . 'body-layouts/wide.jpg'),
		array('label' => __('Boxed', 'qualia_td'), 'value' => 'boxed', 'img' => QUALIA_IMAGES . 'body-layouts/boxed.jpg'),
		array('label' => __('Boxed Spaced', 'qualia_td'), 'value' => 'boxed-spaced', 'img' => QUALIA_IMAGES . 'body-layouts/boxed-spaced.jpg'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_reponsive_breakpoints');
function qualia_source_reponsive_breakpoints() {
	return array(
		array('label' => __('Wide Screen', 'qualia_td'), 'value' => 'wide-screen'),
		array('label' => __('Tablet', 'qualia_td'), 'value' => 'tablet'),
		array('label' => __('Mobile', 'qualia_td'), 'value' => 'mobile'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_body_background_image_mode');
function qualia_source_body_background_image_mode() {
	return array(
		array('label' => __('No Background Image', 'qualia_td'), 'value' => ''),
		array('label' => __('Pre Defined Image', 'qualia_td'), 'value' => 'package'),
		array('label' => __('Custom Image', 'qualia_td'), 'value' => 'custom'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_section_separator_style');
function qualia_source_section_separator_style() {
	return array(
		array('label' => __('single line', 'qualia_td'), 'value' => 'single-border'),
		array('label' => __('pressed shadow', 'qualia_td'), 'value' => 'pressed-shadow'),
		array('label' => __('triangle in', 'qualia_td'), 'value' => 'triangle-in'),
		array('label' => __('triangle out', 'qualia_td'), 'value' => 'triangle-out'),
		array('label' => __('gradient', 'qualia_td'), 'value' => 'gradient'),
		array('label' => __('none', 'qualia_td'), 'value' => 'none'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_header_attachment');
function qualia_source_header_attachment() {
	return array(
		array('label' => __('normal', 'qualia_td'), 'value' => 'normal'),
		array('label' => __('absolute', 'qualia_td'), 'value' => 'absolute'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_header_mode');
function qualia_source_header_mode() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => 'default'),
		array('label' => __('nav on left', 'qualia_td'), 'value' => 'nav-on-left'),
		array('label' => __('centered logo', 'qualia_td'), 'value' => 'centered-logo'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_sub_header_mode');
function qualia_source_sub_header_mode() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => 'default'),
		array('label' => __('centered', 'qualia_td'), 'value' => 'centered'),
		array('label' => __('side by side', 'qualia_td'), 'value' => 'side-by-side'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_blog_mode');
function qualia_source_blog_mode() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => 'default'),
		array('label' => __('timeline', 'qualia_td'), 'value' => 'timeline'),
		array('label' => __('masonry', 'qualia_td'), 'value' => 'masonry'),
		array('label' => __('mini', 'qualia_td'), 'value' => 'mini'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_blog_pagination');
function qualia_source_blog_pagination() {
	return array(
		array('label' => __('disabled', 'qualia_td'), 'value' => 'disabled'),
		array('label' => __('page', 'qualia_td'), 'value' => 'page'),
		array('label' => __('load more', 'qualia_td'), 'value' => 'load-more'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_portfolio_pagination');
function qualia_source_portfolio_pagination() {
	return array(
		array('label' => __('disabled', 'qualia_td'), 'value' => 'disabled'),
		array('label' => __('page', 'qualia_td'), 'value' => 'page'),
		array('label' => __('load more', 'qualia_td'), 'value' => 'load-more'),
		array('label' => __('carousel', 'qualia_td'), 'value' => 'carousel'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_search_result_pagination');
function qualia_source_search_result_pagination() {
	return array(
		array('label' => __('disabled', 'qualia_td'), 'value' => 'disabled'),
		array('label' => __('page', 'qualia_td'), 'value' => 'page'),
		array('label' => __('load more', 'qualia_td'), 'value' => 'load-more'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_portfolio_single_detail');
function qualia_source_portfolio_single_detail() {
	return array(
		array('label' => __('left', 'qualia_td'), 'value' => 'left'),
		array('label' => __('right', 'qualia_td'), 'value' => 'right'),
		array('label' => __('bottom', 'qualia_td'), 'value' => 'bottom'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_portfolio_single_image');
function qualia_source_portfolio_single_image() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => 'default'),
		array('label' => __('slider', 'qualia_td'), 'value' => 'slider'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_portfolio_mode');
function qualia_source_portfolio_mode() {
	return array(
		array('label' => __('default', 'qualia_td'), 'value' => 'default'),
		array('label' => __('invisible', 'qualia_td'), 'value' => 'invisible'),
		array('label' => __('overlay', 'qualia_td'), 'value' => 'overlay'),
		array('label' => __('flip', 'qualia_td'), 'value' => 'flip'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_sidebar_position');
function qualia_source_sidebar_position() {
	return array(
		array('label' => __('no sidebar', 'qualia_td'), 'value' => ''),
		array('label' => __('left', 'qualia_td'), 'value' => 'left'),
		array('label' => __('right', 'qualia_td'), 'value' => 'right'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_sidebar_name');
function qualia_source_sidebar_name() {
	global $wp_registered_sidebars;

	$ret = array();
	foreach ($wp_registered_sidebars as $key => $sidebar) {
		$ret[] = array('label' => __($sidebar['name'], 'qualia_td'), 'value' => $sidebar['id']);
	}
	return $ret;
}

VP_Security::instance()->whitelist_function('qualia_source_regular_font');
function qualia_source_regular_font() {
	$ret = array();

	foreach (qualia_get_regular_font() as $font) {
		$ret[] = array('label' => sprintf(__('Standard : %s', 'qualia_td'), $font), 'value' => $font);
	}
	return $ret;
}

VP_Security::instance()->whitelist_function('qualia_source_custom_font');
function qualia_source_custom_font() {
	$ret = array();

	foreach (qualia_get_custom_font() as $font) {
		$ret[] = array('label' => sprintf(__('Custom : %s', 'qualia_td'), $font), 'value' => $font);
	}
	return $ret;
}

VP_Security::instance()->whitelist_function('qualia_source_color_palette');
function qualia_source_color_palette() {
	$ret = array();

	for ($i = 1; $i <= 10; $i++) {
		$ret[] = array('label' => sprintf(__('Color %s', 'qualia_td'), $i), 'value' => $i);
	}
	return $ret;
}

VP_Security::instance()->whitelist_function('qualia_source_typography_style');
function qualia_source_typography_style() {
	return array(
		array('label' => __('Compact', 'qualia_td'), 'value' => 'compact'),
		array('label' => __('Background Fill Background', 'qualia_td'), 'value' => 'fill-background'),
		array('label' => __('Background Fill Subtle', 'qualia_td'), 'value' => 'fill-subtle'),
		array('label' => __('Background Fill Text', 'qualia_td'), 'value' => 'fill-text'),
		array('label' => __('Background Fill Accent', 'qualia_td'), 'value' => 'fill-accent'),
		array('label' => __('Border Bottom Accent', 'qualia_td'), 'value' => 'border-bottom-accent'),
		array('label' => __('Border Bottom Accent Bold', 'qualia_td'), 'value' => 'border-bottom-accent-bold'),
		array('label' => __('Border Bottom Subtle', 'qualia_td'), 'value' => 'border-bottom-subtle'),
		array('label' => __('Border Bottom Subtle Bold', 'qualia_td'), 'value' => 'border-bottom-subtle-bold'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_text_transform');
function qualia_source_text_transform() {
	return array(
		array('label' => __('none', 'qualia_td'), 'value' => 'none'),
		array('label' => __('capitalize', 'qualia_td'), 'value' => 'capitalize'),
		array('label' => __('uppercase', 'qualia_td'), 'value' => 'uppercase'),
		array('label' => __('lowercase', 'qualia_td'), 'value' => 'lowercase'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_background_position');
function qualia_source_background_position() {
	return array(
		array('label' => __('left top', 'qualia_td'), 'value' => 'left top'),
		array('label' => __('left center', 'qualia_td'), 'value' => 'left center'),
		array('label' => __('left bottom', 'qualia_td'), 'value' => 'left bottom'),
		array('label' => __('center top', 'qualia_td'), 'value' => 'center top'),
		array('label' => __('center center', 'qualia_td'), 'value' => 'center center'),
		array('label' => __('center bottom', 'qualia_td'), 'value' => 'center bottom'),
		array('label' => __('right top', 'qualia_td'), 'value' => 'right top'),
		array('label' => __('right center', 'qualia_td'), 'value' => 'right center'),
		array('label' => __('right bottom', 'qualia_td'), 'value' => 'right bottom'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_background_attachment');
function qualia_source_background_attachment() {
	return array(
		array('label' => __('scroll', 'qualia_td'), 'value' => 'scroll'),
		array('label' => __('fixed', 'qualia_td'), 'value' => 'fixed'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_background_repeat');
function qualia_source_background_repeat() {
	return array(
		array('label' => __('repeat', 'qualia_td'), 'value' => 'repeat'),
		array('label' => __('repeat-x', 'qualia_td'), 'value' => 'repeat-x'),
		array('label' => __('repeat-y', 'qualia_td'), 'value' => 'repeat-y'),
		array('label' => __('no-repeat', 'qualia_td'), 'value' => 'no-repeat'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_background_size');
function qualia_source_background_size() {
	return array(
		array('label' => __('auto', 'qualia_td'), 'value' => 'auto'),
		array('label' => __('cover', 'qualia_td'), 'value' => 'cover'),
		array('label' => __('contain', 'qualia_td'), 'value' => 'contain'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_binding_regular_font_weight');
function qualia_source_binding_regular_font_weight($value) {
	return array(
		array('label' => __('normal', 'qualia_td'), 'value' => 'normal'),
		array('label' => __('bold', 'qualia_td'), 'value' => 'bold'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_binding_regular_font_style');
function qualia_source_binding_regular_font_style($value) {
	return array(
		array('label' => __('normal', 'qualia_td'), 'value' => 'normal'),
		array('label' => __('italic', 'qualia_td'), 'value' => 'italic'),
	);
}

VP_Security::instance()->whitelist_function('qualia_source_binding_font_weight');
function qualia_source_binding_font_weight($value) {
	if (!in_array($value, array_merge(qualia_get_regular_font(), qualia_get_custom_font()) )) return vp_get_gwf_weight($value); // GWF
	else return qualia_source_binding_regular_font_weight($value); // regular font
}

VP_Security::instance()->whitelist_function('qualia_source_binding_font_style');
function qualia_source_binding_font_style($value) {
	if (!in_array($value, array_merge(qualia_get_regular_font(), qualia_get_custom_font()) )) return vp_get_gwf_style($value); // GWF
	else return qualia_source_binding_regular_font_style($value); // regular font
}

VP_Security::instance()->whitelist_function('qualia_source_revslider');
function qualia_source_revslider() {

	if (!class_exists('RevSlider')) return array();

	$rs = new RevSlider();
	$ret = array();
	foreach ($rs->getArrSliders() as $slider ) {
		$ret[] = array('label' => $slider->getTitle(), 'value' => $slider->getAlias());
	}

	return $ret;
}

/**
 * ================================================================
 * BINDING VALUE
 * ================================================================
 */


VP_Security::instance()->whitelist_function('qualia_bind_body_typography_preview');
function qualia_bind_body_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));

	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset)
	);
	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_body_typography_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_text'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_text'); ?>;
		padding: <?php qualia_rempx(1); ?>;
	}

	<?php echo "#qualia_bind_body_typography_preview *"; ?> {
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
	}
	</style>
	<div id="<?php echo "qualia_bind_body_typography_preview"; ?>">
		<p>
			Nulla purus lectus, malesuada id aliquam lacinia, dignissim in sem. Maecenas sem turpis, lacinia luctus urna eu, pulvinar ornare dolor. Etiam eu felis non diam fermentum pharetra a vel tortor. Donec eu ultrices magna, sit amet venenatis sem. Proin nec odio egestas, venenatis leo id, dapibus ligula.
		</p>
		<p>
			Ut molestie quis felis ac blandit. Sed sed cursus ante. Quisque dapibus condimentum tortor, fermentum rhoncus orci sodales eu. Proin sodales aliquet feugiat. Aenean sit amet dictum quam. Phasellus viverra nibh nec ante vehicula accumsan. Suspendisse placerat ipsum quis mattis ullamcorper. Sed sed convallis nunc. Suspendisse sit amet felis est. Sed dui sapien, gravida sed aliquam eget, commodo quis lacus. Maecenas egestas libero ante, vitae ullamcorper sapien pretium tempor. Morbi id semper tellus, ut ultrices tortor.
		</p>
	</div>
	<?php return ob_get_clean();
}

VP_Security::instance()->whitelist_function('qualia_bind_nav_typography_preview');
function qualia_bind_nav_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));
 
	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset)
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_nav_typography_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_strong'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_strong'); ?>;
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
		padding: <?php qualia_rempx(1); ?>;
	}
	<?php echo "#qualia_bind_nav_typography_preview ul"; ?> {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	<?php echo "#qualia_bind_nav_typography_preview ul li"; ?> {
		display: inline-block;
		padding: 10px 15px;
		margin-bottom: 0;
	}
	</style>
	<div id="<?php echo "qualia_bind_nav_typography_preview"; ?>">
		<ul>
			<li><span>Home</span></li>
			<li><span>Profile</span></li>
			<li><span>Services</span></li>
			<li><span>Contact Us</span></li>
		</ul>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_button_typography_preview');
function qualia_bind_button_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));
 
	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset),
		array(qualia_option('button_font_face'), qualia_option('button_font_style'), qualia_option('button_font_weight'), qualia_option('button_font_subset'))
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_button_typography_preview"; ?> {
		padding: <?php qualia_rempx(1); ?>;
	}

	<?php echo "#qualia_bind_button_typography_preview ._button"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_accent'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_accent'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_base'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_base'); ?>;
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
		border: 0;
		border-radius: 3px;
		display: inline-block;
		padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		-ms-transition: all 0.5s ease;
		transition: all 0.5s ease;
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		backface-visibility: hidden;
		-webkit-box-shadow: inset 0 -0.<?php qualia_rempx(2); ?> rgba(0,0,0,0.1);
		box-shadow: inset 0 -0.<?php qualia_rempx(2); ?> rgba(0,0,0,0.1);
	}
	</style>
	<div id="<?php echo "qualia_bind_button_typography_preview"; ?>">
		<span class="_button"><?php _e('This is Small Button', 'qualia_td'); ?></span>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_blockquote_typography_preview');
function qualia_bind_blockquote_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));
 
	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset)
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_blockquote_typography_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_text'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_text'); ?>;
		margin: <?php qualia_rempx(1); ?> 0;
		min-height: <?php qualia_rempx(1.8); ?>;
		padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(1); ?> 4rem;
		position: relative;
	}
	<?php echo "#qualia_bind_blockquote_typography_preview"; ?> * {
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
	}
	<?php echo "#qualia_bind_blockquote_typography_preview p"; ?> {
		margin: 0 0 <?php qualia_rempx(2); ?>;
	}
	<?php echo "#qualia_bind_blockquote_typography_preview p:last-child"; ?> {
		margin-bottom: 0;
	}
	<?php echo "#qualia_bind_blockquote_typography_preview:before"; ?> {
		content: '\f10d';
		font-family: 'FontAwesome';
		font-size: <?php qualia_rempx(1.8); ?>;
		font-style: normal;
		width: <?php qualia_rempx(2); ?>;
		height: <?php qualia_rempx(2); ?>;
		line-height: <?php qualia_rempx(2); ?>;
		text-align: center;
		left: 0;
		margin: <?php qualia_rempx(1); ?> 0 0 <?php qualia_rempx(1); ?>;
		position: absolute;
		top: 0;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
		filter: alpha(opacity=30);
		opacity: 0.3;
	}
	</style>
	<div id="<?php echo "qualia_bind_blockquote_typography_preview"; ?>">
		<p>
			Ut molestie quis felis ac blandit. Sed sed cursus ante. Quisque dapibus condimentum tortor, fermentum rhoncus orci sodales eu. Proin sodales aliquet feugiat. Aenean sit amet dictum quam. Phasellus viverra nibh nec ante vehicula accumsan. Suspendisse placerat ipsum quis mattis ullamcorper. Sed sed convallis nunc. Suspendisse sit amet felis est. Sed dui sapien, gravida sed aliquam eget, commodo quis lacus. Maecenas egestas libero ante, vitae ullamcorper sapien pretium tempor. Morbi id semper tellus, ut ultrices tortor.
		</p>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_h1_typography_preview');
function qualia_bind_h1_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(1, $font_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_h2_typography_preview');
function qualia_bind_h2_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(2, $font_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_h3_typography_preview');
function qualia_bind_h3_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(3, $font_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_h4_typography_preview');
function qualia_bind_h4_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(4, $font_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_h5_typography_preview');
function qualia_bind_h5_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(5, $font_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_h6_typography_preview');
function qualia_bind_h6_typography_preview($font_data) {
	return qualia_bind_heading_typography_preview(6, $font_data);
}


VP_Security::instance()->whitelist_function('qualia_bind_heading_typography_preview');
function qualia_bind_heading_typography_preview($level, $font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));

	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset),
		array(qualia_option('body_font_face'), qualia_option('body_font_style'), qualia_option('body_font_weight'), qualia_option('body_font_subset'))
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_h{$level}_typography_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		padding: <?php qualia_rempx(1); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_text'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_text'); ?>;
	}
	<?php echo "#qualia_bind_h{$level}_typography_preview"; ?> * {
		font-family: <?php echo qualia_separate_fonts(qualia_option('body_font_face')); ?>;
		font-style: <?php echo qualia_option('body_font_style'); ?>;
		font-weight: <?php echo qualia_option('body_font_weight'); ?>;
		text-transform: <?php echo qualia_option('body_font_transform'); ?>;
		font-size: <?php echo qualia_option('body_font_size'); ?>px;
		line-height: <?php echo qualia_option('body_line_height'); ?>px;
		letter-spacing: <?php echo qualia_option('body_letter_spacing'); ?>px;
	}
	<?php echo "#qualia_bind_h{$level}_typography_preview h{$level}"; ?> {
		margin: <?php qualia_rempx(2); ?> 0 <?php qualia_rempx(1); ?>;
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_strong'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_strong'); ?>;
	}
	</style>
	<div id="<?php echo "qualia_bind_h{$level}_typography_preview"; ?>">
		<<?php echo "h{$level}"; ?>>
			<?php _e("This is the preview of Heading $level Typography", 'qualia_td'); ?>
		</<?php echo "h$level"; ?>>
		<p>
			Nulla purus lectus, malesuada id aliquam lacinia, dignissim in sem. Maecenas sem turpis, lacinia luctus urna eu, pulvinar ornare dolor. Etiam eu felis non diam fermentum pharetra a vel tortor. Donec eu ultrices magna, sit amet venenatis sem. Proin nec odio egestas, venenatis leo id, dapibus ligula.
		</p>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_title_typography_preview');
function qualia_bind_title_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));

	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset)
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_title_typography_preview"; ?> {
		padding: <?php qualia_rempx(1); ?>;
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_text'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_text'); ?>;
	}

	<?php echo "#qualia_bind_title_typography_preview h1"; ?> {
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
	}
	</style>
	<div id="<?php echo "qualia_bind_title_typography_preview"; ?>">
		<h1><?php _e('Sub Header Title Preview', 'qualia_td'); ?></h1>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_divider_typography_preview');
function qualia_bind_divider_typography_preview($font_data) {
	// populate font data
	extract(array_combine(qualia_get_font_properties(), json_decode(stripslashes_deep($font_data))));

	$embed_font = _qualia_get_embed_font_style(
		array($font_face, $font_style, $font_weight, $font_subset)
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_divider_typography_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse(qualia_option('color_1_background'), 'hex'); ?>;
		background-color: <?php echo qualia_option('color_1_background'); ?>;
		color: <?php echo Qualia_Color::parse(qualia_option('color_1_text'), 'hex'); ?>;
		color: <?php echo qualia_option('color_1_text'); ?>;
		font-family: <?php echo qualia_separate_fonts($font_face); ?>;
		font-style: <?php echo $font_style; ?>;
		font-weight: <?php echo $font_weight; ?>;
		text-transform: <?php echo $font_transform; ?>;
		font-size: <?php echo $font_size; ?>px;
		line-height: <?php echo $line_height; ?>px;
		letter-spacing: <?php echo $letter_spacing; ?>px;
		margin: 0;
		padding: <?php qualia_rempx(1); ?>;
	}
	<?php echo "#qualia_bind_divider_typography_preview ._inner"; ?> {
		display: table;
		width: 100%;
		margin: <?php qualia_rempx(2); ?> 0;
	}
	<?php echo "#qualia_bind_divider_typography_preview span"; ?> {
		display: table-cell;
		vertical-align: middle;
		width: 0%;
		white-space: nowrap;
	}
	<?php echo "#qualia_bind_divider_typography_preview hr"; ?> {
		border-color: <?php echo Qualia_Color::parse(qualia_option('color_1_subtle'), 'hex'); ?>;
		border-color: <?php echo qualia_option('color_1_subtle'); ?>;
		background-color: transparent;
		border-style: solid;
		border-width: 1px 0;
		height: <?php qualia_rempx(0.5); ?>;
		margin: 0 !important;
	}
	</style>
	<div id="<?php echo "qualia_bind_divider_typography_preview"; ?>">
		<div class="_inner">
			<span style="width: 50%;"><hr/></span>
			<span><?php _e(' &nbsp; Divider Title Preview &nbsp; ', 'qualia_td'); ?></span>
			<span style="width: 50%;"><hr/></span>
		</div>
	</div>
	<?php return ob_get_clean();
}


VP_Security::instance()->whitelist_function('qualia_bind_color_standard_preview');
function qualia_bind_color_standard_preview($color_data) {
	// populate color data
	extract(array_combine(qualia_get_color_standard_properties(), json_decode(stripslashes_deep($color_data))));

	ob_start(); ?>
	<style type="text/css">

	<?php echo "#qualia_bind_color_standard_preview label"; ?> {
		width: 60px;
		margin: 2px;
		display: inline-block;
		text-align: center;
	}
	<?php echo "#qualia_bind_color_standard_preview label span"; ?> {
		display: block;
		border-radius: 50%;
		width: 60px;
		height: 60px;
		box-shadow: inset 0 0 0 1px rgba(0,0,0,0.1);
	}
	<?php echo "#qualia_bind_color_standard_preview label.black span"; ?> {
		background-color: <?php echo Qualia_Color::parse($black, 'hex'); ?>;
		background-color: <?php echo $black; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.white span"; ?> {
		background-color: <?php echo Qualia_Color::parse($white, 'hex'); ?>;
		background-color: <?php echo $white; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.info span"; ?> {
		background-color: <?php echo Qualia_Color::parse($info, 'hex'); ?>;
		background-color: <?php echo $info; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.warning span"; ?> {
		background-color: <?php echo Qualia_Color::parse($warning, 'hex'); ?>;
		background-color: <?php echo $warning; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.success span"; ?> {
		background-color: <?php echo Qualia_Color::parse($success, 'hex'); ?>;
		background-color: <?php echo $success; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.error span"; ?> {
		background-color: <?php echo Qualia_Color::parse($error, 'hex'); ?>;
		background-color: <?php echo $error; ?>
	}
	<?php echo "#qualia_bind_color_standard_preview label.normal span"; ?> {
		background-color: <?php echo Qualia_Color::parse($normal, 'hex'); ?>;
		background-color: <?php echo $normal; ?>
	}
	</style>
	<div id="<?php echo "qualia_bind_color_standard_preview"; ?>">
		<label class="black"><span></span><?php _e('black' , 'qualia_td'); ?></label>
		<label class="white"><span></span><?php _e('white' , 'qualia_td'); ?></label>
		<label class="info"><span></span><?php _e('info' , 'qualia_td'); ?></label>
		<label class="warning"><span></span><?php _e('warning' , 'qualia_td'); ?></label>
		<label class="success"><span></span><?php _e('success' , 'qualia_td'); ?></label>
		<label class="error"><span></span><?php _e('error' , 'qualia_td'); ?></label>
		<label class="normal"><span></span><?php _e('normal' , 'qualia_td'); ?></label>
	</div>
	<?php return ob_get_clean();
}

VP_Security::instance()->whitelist_function('qualia_bind_color_1_preview');
function qualia_bind_color_1_preview($color_data) {
	return qualia_bind_color_preview(1, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_2_preview');
function qualia_bind_color_2_preview($color_data) {
	return qualia_bind_color_preview(2, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_3_preview');
function qualia_bind_color_3_preview($color_data) {
	return qualia_bind_color_preview(3, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_4_preview');
function qualia_bind_color_4_preview($color_data) {
	return qualia_bind_color_preview(4, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_5_preview');
function qualia_bind_color_5_preview($color_data) {
	return qualia_bind_color_preview(5, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_6_preview');
function qualia_bind_color_6_preview($color_data) {
	return qualia_bind_color_preview(6, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_7_preview');
function qualia_bind_color_7_preview($color_data) {
	return qualia_bind_color_preview(7, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_8_preview');
function qualia_bind_color_8_preview($color_data) {
	return qualia_bind_color_preview(8, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_9_preview');
function qualia_bind_color_9_preview($color_data) {
	return qualia_bind_color_preview(9, $color_data);
}

VP_Security::instance()->whitelist_function('qualia_bind_color_10_preview');
function qualia_bind_color_10_preview($color_data) {
	return qualia_bind_color_preview(10, $color_data);
}

function qualia_bind_color_preview($level, $color_data) {
	// populate color data
	extract(array_combine(qualia_get_color_properties(), json_decode(stripslashes_deep($color_data))));

	$embed_font = _qualia_get_embed_font_style(
		array(qualia_option('body_font_face'), qualia_option('body_font_style'), qualia_option('body_font_weight'), qualia_option('body_font_subset')),
		array(qualia_option('h3_font_face'), qualia_option('h3_font_style'), qualia_option('h3_font_weight'), qualia_option('h3_font_subset'))
	);

	ob_start(); ?>
	<style type="text/css">
	<?php echo join("\n", $embed_font); ?>

	<?php echo "#qualia_bind_color_{$level}_preview"; ?> {
		background-color: <?php echo Qualia_Color::parse($background, 'hex'); ?>;
		background-color: <?php echo $background; ?>;
		color: <?php echo Qualia_Color::parse($text, 'hex'); ?>;
		color: <?php echo $text; ?>;
		font-family: <?php echo qualia_separate_fonts(qualia_option('body_font_face')); ?>;
		font-style: <?php echo qualia_option('body_font_style'); ?>;
		font-weight: <?php echo qualia_option('body_font_weight'); ?>;
		text-transform: <?php echo qualia_option('body_font_transform'); ?>;
		font-size: <?php echo qualia_option('body_font_size'); ?>px;
		line-height: <?php echo qualia_option('body_line_height'); ?>px;
		letter-spacing: <?php echo qualia_option('body_letter_spacing'); ?>px;
		padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(2); ?>;
	}
	<?php echo "#qualia_bind_color_{$level}_preview a"; ?> {
		color: <?php echo Qualia_Color::parse($accent, 'hex'); ?>;
		color: <?php echo $accent; ?>;
		text-decoration: none;
		font-weight: bold;
	}
	<?php echo "#qualia_bind_color_{$level}_preview hr"; ?> {
		background-color: <?php echo Qualia_Color::parse($subtle, 'hex'); ?>;
		background-color: <?php echo $subtle; ?>;
		border: none;
		height: 1px;
		margin: <?php qualia_rempx(1); ?> 0;
	}
	<?php echo "#qualia_bind_color_{$level}_preview h3"; ?> {
		color: <?php echo Qualia_Color::parse($strong, 'hex'); ?>;
		color: <?php echo $strong; ?>;
		font-family: <?php echo qualia_separate_fonts(qualia_option('h3_font_face')); ?>;
		font-style: <?php echo qualia_option('h3_font_style'); ?>;
		font-weight: <?php echo qualia_option('h3_font_weight'); ?>;
		text-transform: <?php echo qualia_option('h3_font_transform'); ?>;
		font-size: <?php echo qualia_option('h3_font_size'); ?>px;
		line-height: <?php echo qualia_option('h3_line_height'); ?>px;
		letter-spacing: <?php echo qualia_option('h3_letter_spacing'); ?>px;
	}
	<?php echo "#qualia_bind_color_{$level}_preview ._input"; ?> {
		background-color: <?php echo Qualia_Color::parse($base, 'hex'); ?>;
		background-color: <?php echo $base; ?>;
		color: <?php echo Qualia_Color::parse($text, 'hex'); ?>;
		color: <?php echo $text; ?>;
		display: inline-block;
		vertical-align: middle;
		height: <?php qualia_rempx(2); ?>;
		line-height: <?php qualia_rempx(2); ?>;
		box-shadow: inset 0 <?php qualia_rempx(0.125); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
		padding: 0 0.6rem;
		border-radius: 3px;
		border-style: solid;
		border-width: 1px;
		border-color: <?php echo Qualia_Color::parse($subtle, 'hex'); ?>;
		border-color: <?php echo $subtle; ?>;
	}
	<?php echo "#qualia_bind_color_{$level}_preview ._button"; ?> {
		background-color: <?php echo Qualia_Color::parse($accent, 'hex'); ?>;
		background-color: <?php echo $accent; ?>;
		color: #ffffff;
		margin-left: 10px;
		height: <?php qualia_rempx(2); ?>;
		line-height: <?php qualia_rempx(2); ?>;
		padding: 0 <?php qualia_rempx(1); ?>;
		cursor: pointer;
		border: 0;
		border-radius: 3px;
		display: inline-block;
		vertical-align: middle;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		-ms-transition: all 0.5s ease;
		transition: all 0.5s ease;
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		box-shadow: inset 0 <?php qualia_rempx(-0.2); ?> rgba(0,0,0,0.1), 0 <?php qualia_rempx(0.125); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.2);
		background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.15), rgba(255,255,255,0));
		background-image: -moz-linear-gradient(top, rgba(255,255,255,0.15), rgba(255,255,255,0));
		background-image: -o-linear-gradient(top, rgba(255,255,255,0.15), rgba(255,255,255,0));
		background-image: -ms-linear-gradient(top, rgba(255,255,255,0.15), rgba(255,255,255,0));
		background-image: linear-gradient(top, rgba(255,255,255,0.15), rgba(255,255,255,0));
	}
	</style>
	<div id="<?php echo "qualia_bind_color_{$level}_preview"; ?>">
		<h3><?php _e("This is Strong Color For Headings", 'qualia_td'); ?></h3>
		<hr/>
		<p>This is Text Color. Nulla purus lectus, malesuada id aliquam lacinia, dignissim in sem. Maecenas sem turpis, lacinia luctus urna eu, pulvinar ornare dolor. <a href="#">This is accent color</a>, Etiam eu felis non diam fermentum pharetra a vel tortor.</p>
		<p><span class="_input">Form Input Using Base Color</span><span class="_button">Example Button</span></p>
	</div>
	<?php return ob_get_clean();
}

/**
 * ================================================================
 * FIELD DEPENDENCIES
 * ================================================================
 */


VP_Security::instance()->whitelist_function('qualia_dep_body_background_image_mode_package');
function qualia_dep_body_background_image_mode_package($value) {
	if ($value == 'package') return true;
	return false;
}

VP_Security::instance()->whitelist_function('qualia_dep_body_background_image_mode_custom');
function qualia_dep_body_background_image_mode_custom($value) {
	if ($value == 'custom') return true;
	return false;
}

VP_Security::instance()->whitelist_function('qualia_dep_absolute_background_color');
function qualia_dep_absolute_background_color($is_override, $attachment) {
	if ($is_override && $attachment == 'absolute') return true;
	return false;
}

VP_Security::instance()->whitelist_function('qualia_dep_post_format_url');
function qualia_dep_post_format_url() { return qualia_dep_post_format('format_url'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_link_url');
function qualia_dep_post_format_link_url() { return qualia_dep_post_format('format_link_url'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_quote_source_url');
function qualia_dep_post_format_quote_source_url() { return qualia_dep_post_format('format_quote_source_url'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_quote_source_name');
function qualia_dep_post_format_quote_source_name() { return qualia_dep_post_format('format_quote_source_name'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_image');
function qualia_dep_post_format_image() { return qualia_dep_post_format('format_image'); }


VP_Security::instance()->whitelist_function('qualia_dep_post_format_video_embed');
function qualia_dep_post_format_video_embed() { return qualia_dep_post_format('format_video_embed'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_video_embed_external');
function qualia_dep_post_format_video_embed_external($value) {
	if ($value === 'external') return true; return false;
}

VP_Security::instance()->whitelist_function('qualia_dep_post_format_video_embed_internal');
function qualia_dep_post_format_video_embed_internal($value) {
	if ($value === 'internal') return true; return false;
}


VP_Security::instance()->whitelist_function('qualia_dep_post_format_audio_embed');
function qualia_dep_post_format_audio_embed() { return qualia_dep_post_format('format_audio_embed'); }

VP_Security::instance()->whitelist_function('qualia_dep_post_format_audio_embed_external');
function qualia_dep_post_format_audio_embed_external($value) {
	if ($value === 'external') return true; return false;
}

VP_Security::instance()->whitelist_function('qualia_dep_post_format_audio_embed_internal');
function qualia_dep_post_format_audio_embed_internal($value) {
	if ($value === 'internal') return true; return false;
}


VP_Security::instance()->whitelist_function('qualia_dep_post_format');
function qualia_dep_post_format($field) {
	global $post;

	switch (get_post_format($post) . '-' . $field) {
		case 'link-format_link_url':
		case 'quote-format_quote_source_url':
		case 'quote-format_quote_source_name':
		case 'image-format_url':
		case 'image-format_image':
		case 'audio-format_audio_embed':
		case 'video-format_video_embed':
			return true;
			break;
		
		default:
			return false;
			break;
	}

	return false;

}


/**
 * ================================================================
 * VALUE BINDING
 * ================================================================
 */


VP_Security::instance()->whitelist_function('qualia_value_binding_header_absolute_background_color');
function qualia_value_binding_header_absolute_background_color($color_set) {
	return qualia_option('color_' . $color_set . '_background');
}