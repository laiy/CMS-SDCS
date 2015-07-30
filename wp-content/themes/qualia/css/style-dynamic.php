<?php include(get_template_directory() . '/variables.php');
extract($qualia);

$qualia_n_color_set = 10; ?>
/**
 * Custom Fonts
 * =============================================================
 */
<?php for ($i = 1; $i <= 3; $i++) :
	if (empty($custom_font_name[$i])) continue;

	$src = array();
	if (!empty($custom_font_file_eot[$i])) $src[] = "url('$custom_font_file_eot[$i]?#iefix') format('embedded-opentype')";
	if (!empty($custom_font_file_woff[$i])) $src[] = "url('$custom_font_file_woff[$i]') format('woff')";
	if (!empty($custom_font_file_ttf[$i])) $src[] = "url('$custom_font_file_ttf[$i]') format('truetype')";
	if (!empty($custom_font_file_svg[$i])) $src[] = "url('$custom_font_file_svg[$i]?#svgFontName') format('svg')";

	echo "/* CUSTOM FONT $i */" . "\n";
	echo '@font-face { ';
	echo "font-family: '$custom_font_name[$i]'; ";
	echo "src: " . implode(", ", $src) . "; }" . "\n";
endfor; ?>
/**
 * Color in Typography
 * =============================================================
 */
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	echo ".color-palette-$j,";
	echo ".vp-box.color-palette-$j {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_background[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo "h1,h2,h3,h4,h5,h6,.vp-divider,";
	echo ".color-palette-$j h1,.color-palette-$j h2,.color-palette-$j h3,.color-palette-$j h4,.color-palette-$j h5,.color-palette-$j h6,.color-palette-$j .vp-divider,";
	echo ".vp-box.color-palette-$j h1,.vp-box.color-palette-$j h2,.vp-box.color-palette-$j h3,.vp-box.color-palette-$j h4,.vp-box.color-palette-$j h5,.vp-box.color-palette-$j h6,.vp-box.color-palette-$j .vp-divider {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo "a,";
	echo ".color-palette-$j a,";
	echo ".vp-box.color-palette-$j a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo "a:hover,a:focus,";
	echo ".color-palette-$j a:hover,.color-palette-$j a:focus,";
	echo ".vp-box.color-palette-$j a:hover,.vp-box.color-palette-$j a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo "p a,";
	echo ".color-palette-$j p a,";
	echo ".vp-box.color-palette-$j p a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo "p a:hover,p a:focus,";
	echo ".color-palette-$j p a:hover,.color-palette-$j p a:focus,";
	echo ".vp-box.color-palette-$j p a:hover,.vp-box.color-palette-$j p a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * WordPress Core (Modified)
 * =============================================================
 */
.alignnone {
	/*margin: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?> 0*/
}
.aligncenter {
	margin: <?php qualia_rempx(0.5); ?> auto;
}
.alignright {
	margin: <?php qualia_rempx(0.5); ?> 0 <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?>;
}
.alignleft {
	margin: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?> 0;
}
.wp-caption {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.75); ?>;
}
.wp-caption p.wp-caption-text {
	font-size: <?php qualia_rempx(0.9); ?>;
	line-height: <?php echo 0.9 * $line_height['body']; ?>px;
	margin: <?php qualia_rempx(0.5); ?> 0;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".wp-caption,";
	echo ".color-palette-$j .wp-caption,";
	echo ".vp-box.color-palette-$j .wp-caption {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".wp-caption,";
	echo ".color-palette-$j .wp-caption,";
	echo ".vp-box.color-palette-$j .wp-caption {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
.gallery-caption {}
/**
 * General
 * =============================================================
 */
html {
	font-size: <?php echo $font_size['body']; ?>px;
}
body {
	background-color: <?php echo Qualia_Color::parse(qualia_option('body_background_color'), 'hex'); ?>;
	background-color: <?php echo qualia_option('body_background_color'); ?>;
	background-repeat: repeat;
	background-position: center center;
	color: <?php echo Qualia_Color::parse($color_text[1], 'hex'); ?>;
	color: <?php echo $color_text[1]; ?>;
	font-family: <?php echo $font_face['body']; ?>;
	font-size: <?php echo $font_size['body']; ?>px;
	font-style: <?php echo $font_style['body']; ?>;
	font-weight: <?php echo $font_weight['body']; ?>;
	text-transform: <?php echo $text_transform['body']; ?>;
	letter-spacing: <?php echo $letter_spacing['body']; ?>px;
	line-height: <?php echo $line_height['body']; ?>px;
}
body .doc {
	background-color: <?php echo Qualia_Color::parse($color_background[1], 'hex'); ?>;
	background-color: <?php echo $color_background[1]; ?>;
}
blockquote {
	font-family: <?php echo $font_face['blockquote']; ?>;
	font-size: <?php echo $font_size['blockquote']; ?>px;
	font-style: <?php echo $font_style['blockquote']; ?>;
	font-weight: <?php echo $font_weight['blockquote']; ?>;
	text-transform: <?php echo $text_transform['blockquote']; ?>;
	letter-spacing: <?php echo $letter_spacing['blockquote']; ?>px;
	line-height: <?php echo $line_height['blockquote']; ?>px;
}
cite {
	font-size: <?php qualia_rempx(0.85); ?>;
}
p,table,ul,ol,address {
	margin: 0 0 <?php qualia_rempx(1); ?>;
}
ul,ol {
	padding-left: <?php qualia_rempx(2.142857142857143); ?>;
}
h1,h2,h3,h4,h5,h6 {
	margin: <?php qualia_rempx(2); ?> 0 <?php qualia_rempx(1); ?>;
}
blockquote {
	margin: <?php qualia_rempx(1); ?> 0;
	min-height: <?php qualia_rempx(1.8); ?>;
	padding: 0 0 0 <?php qualia_rempx(3.5); ?>;
}
blockquote:before {
	font-size: <?php qualia_rempx(1.8); ?>;
	width: <?php qualia_rempx(2); ?>;
	height: <?php qualia_rempx(2); ?>;
	line-height: <?php qualia_rempx(2); ?>;
	margin-left: <?php qualia_rempx(0.5); ?>;
}
<?php $arr = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
foreach ($arr as $i) :
	
	echo "$i,.$i {" . "\n";
	echo "\t" . "font-family: $font_face[$i];" . "\n";
	echo "\t" . "font-size: $font_size[$i]px;" . "\n";
	echo "\t" . "font-weight: $font_weight[$i];" . "\n";
	echo "\t" . "text-transform: $text_transform[$i];" . "\n";
	echo "\t" . "letter-spacing: $letter_spacing[$i]px;" . "\n";
	echo "\t" . "line-height: $line_height[$i]px;" . "\n";
	echo "}" . "\n";

endforeach; ?>
/**
 * Form
 * =============================================================
 */
input,select,textarea {
	font-family: <?php echo $font_face['button']; ?>;
	font-size: <?php echo $font_size['button']; ?>px;
	font-style: <?php echo $font_style['body']; ?>;
	font-weight: <?php echo $font_weight['body']; ?>;
	text-transform: <?php echo $text_transform['body']; ?>;
	letter-spacing: <?php echo $letter_spacing['body']; ?>px;
	line-height: <?php echo $line_height['button']; ?>px;
	border-radius: <?php qualia_rempx(0.25); ?>;
	box-shadow: inset 0 <?php qualia_rempx(0.125); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
}
input,select,textarea {
	padding: <?php echo 0.4 * $font_size['body'] - 2; ?>px <?php qualia_rempx(0.6); ?>;
}
input.vp-input-medium,textarea.vp-input-medium,select.vp-input-medium {
	padding: <?php echo 0.7 * $font_size['body'] - 2; ?>px <?php qualia_rempx(1); ?>;
}
input.vp-input-large,textarea.vp-input-large,select.vp-input-large {
	padding: <?php echo 1 * $font_size['body'] - 2; ?>px <?php qualia_rempx(1.6); ?>;
}
input,select {
	min-height: <?php echo $line_height['button'] + (2 * 0.4 * $font_size['body']); ?>px;
	min-height: <?php echo $line_height['button']; ?>px\0/; /* IE8 fix */
}
input.vp-input-medium,select.vp-input-medium,textarea.vp-input-medium {
	font-size: <?php echo 1.2 * $font_size['body']; ?>px;
	line-height: <?php echo 1.1 * $line_height['button']; ?>px;
	min-height: <?php echo 1.1 * $line_height['button'] + (2 * 0.7 * $font_size['body']); ?>px;
	min-height: <?php echo 1.1 * $line_height['button']; ?>px\0/; /* IE8 fix */
}
input.vp-input-large,select.vp-input-large,textarea.vp-input-large {
	font-size: <?php echo 1.3 * $font_size['body']; ?>px;
	line-height: <?php echo 1.2 * $line_height['button']; ?>px;
	min-height: <?php echo 1.2 * $line_height['button'] + (2 * 1 * $font_size['body']); ?>px;
	min-height: <?php echo 1.2 * $line_height['button']; ?>px\0/; /* IE8 fix */
}
label {
	padding-bottom: <?php qualia_rempx(0.25); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo "input,textarea,select,";
	echo ".color-palette-$j input,.color-palette-$j textarea,.color-palette-$j select,";
	echo ".vp-box.color-palette-$j input,.vp-box.color-palette-$j textarea,.vp-box.color-palette-$j select {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Layout
 * =============================================================
 */
.grids {
	margin-left: <?php qualia_rempx(-0.75); ?>;
	margin-right: <?php qualia_rempx(-0.75); ?>;
}
.grid-1,.grid-2,.grid-3,.grid-4,.grid-5,.grid-6,.grid-7,.grid-8,.grid-9,.grid-10,.grid-11,.grid-12 {
	padding: 0 <?php qualia_rempx(0.75); ?>;
}
.box {
	padding: <?php qualia_rempx(2); ?>;
	margin-bottom: <?php qualia_rempx(2); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".box,";
	echo ".color-palette-$j .box {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".required,";
	echo ".color-palette-$j .required {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Section
 * =============================================================
 */
.section.separator-pressed-shadow .section-inner:before {
	height: <?php qualia_rempx(0.75); ?>;
}
.section.separator-pressed-shadow .section-inner:after {
	height: <?php qualia_rempx(0.5); ?>;
}
.section.separator-triangle-in .section-inner:before,.section.separator-triangle-in .section-inner:after {
	margin-top: <?php qualia_rempx(-1.5); ?>;
}
.section.separator-triangle-in .section-inner:before {
	border-width: 0 <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?> 0;
}
.section.separator-triangle-in .section-inner:after {
	border-width: 0 0 <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?>;
}
.section.separator-triangle-out .section-inner:before {
	margin-top: <?php qualia_rempx(-1.5); ?>;
	margin-left: <?php qualia_rempx(-1.5); ?>;
	border-width: 0 <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?> <?php qualia_rempx(1.5); ?>;
}
.section.separator-gradient .section-inner:before {
	height: <?php qualia_rempx(5); ?>;
	margin-top: <?php qualia_rempx(-5); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".section.separator-single-border .section-inner,";
	echo ".color-palette-$j.section.separator-single-border .section-inner {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".section.separator-triangle-in .section-inner:before,.section.separator-triangle-in .section-inner:after,";
	echo ".color-palette-$j.section.separator-triangle-in .section-inner:before,.color-palette-$j.section.separator-triangle-in .section-inner:after {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_background[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".section.separator-triangle-out .section-inner:before,";
	echo ".color-palette-$j.section.separator-triangle-out .section-inner:before {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_background[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".section.separator-gradient .section-inner:before,";
	echo ".color-palette-$j.section.separator-gradient .section-inner:before {" . "\n";
	echo "\t" . "background-image: -webkit-linear-gradient(top, $color_background[$j], " . Qualia_Color::percentage_alpha($color_background[$j], -0.4) . " 1px, " . Qualia_Color::percentage_alpha($color_background[$j], -0.15) . " 40%, " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " 65%, $color_background[$j]);" . "\n";
	echo "\t" . "background-image: -moz-linear-gradient(top, $color_background[$j], " . Qualia_Color::percentage_alpha($color_background[$j], -0.4) . " 1px, " . Qualia_Color::percentage_alpha($color_background[$j], -0.15) . " 40%, " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " 65%, $color_background[$j]);" . "\n";
	echo "\t" . "background-image: -o-linear-gradient(top, $color_background[$j], " . Qualia_Color::percentage_alpha($color_background[$j], -0.4) . " 1px, " . Qualia_Color::percentage_alpha($color_background[$j], -0.15) . " 40%, " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " 65%, $color_background[$j]);" . "\n";
	echo "\t" . "background-image: -ms-linear-gradient(top, $color_background[$j], " . Qualia_Color::percentage_alpha($color_background[$j], -0.4) . " 1px, " . Qualia_Color::percentage_alpha($color_background[$j], -0.15) . " 40%, " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " 65%, $color_background[$j]);" . "\n";
	echo "\t" . "background-image: linear-gradient(top, $color_background[$j], " . Qualia_Color::percentage_alpha($color_background[$j], -0.4) . " 1px, " . Qualia_Color::percentage_alpha($color_background[$j], -0.15) . " 40%, " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " 65%, $color_background[$j]);" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Others
 * =============================================================
 */
.social-links a {
	font-size: <?php qualia_rempx(1.2); ?>;
	line-height: <?php qualia_rempx(2.5); ?>;
	width: <?php qualia_rempx(2.5); ?>;
	height: <?php qualia_rempx(2.5); ?>;
}
.sep {
	padding: <?php qualia_rempx(0.3); ?>;
}
/**
 * Body Background
 * =============================================================
 */
<?php $patterns = qualia_source_background_image_package();

foreach ($patterns as $key => $pattern) : ?>
.background-image-package-<?php echo $key; ?> {
	background-image: url('<?php echo $pattern['img']; ?>');
}
<?php endforeach; ?>
/**
 * Top Header
 * =============================================================
 */
.top-header {
	font-size: <?php qualia_rempx(0.9); ?>;
	line-height: <?php echo floor(0.9 * $line_height['body']); ?>px;
}
.top-header .top-header-text p {
	padding: <?php qualia_rempx(0.5); ?> 0;
}
.top-header .top-header-nav a {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.75); ?>;
}
.top-header .top-header-nav,.top-header .top-header-social {
	margin-left: <?php qualia_rempx(0.75); ?>;
}
.top-header .top-header-nav .sub-menu {
	padding: <?php qualia_rempx(0.25); ?> 0;
}
.top-header .top-header-nav .sub-menu a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(0.75); ?>;
}
.top-header .top-header-nav .sub-menu .sub-menu {
	margin-top: <?php echo -1 * (0.25 * $font_size['body'] + 1); ?>px;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".top-header .top-header-nav .sub-menu,";
	echo ".color-palette-$j.top-header .top-header-nav .sub-menu {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_background[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Header
 * =============================================================
 */
.header-spacer {
	padding-top: <?php echo qualia_option('header_height'); ?>px;
}
.header.mode-centered-logo + .header-spacer {
	padding-top: <?php echo qualia_option('header_height') + qualia_option('header_floating_height'); ?>px;
}
.header .logo,.nav,.nav-responsive-toggle {
	height: <?php echo qualia_option('header_height'); ?>px;
	line-height: <?php echo qualia_option('header_height'); ?>px;
}
.header.mode-centered-logo .logo {
	height: <?php echo qualia_option('header_height'); ?>px;
	line-height: <?php echo qualia_option('header_height'); ?>px;
}
.header.mode-centered-logo .nav,.header.mode-centered-logo .nav-responsive-toggle {
	height: <?php echo qualia_option('header_floating_height'); ?>px;
	line-height: <?php echo qualia_option('header_floating_height'); ?>px;
}
.header.floating .logo,.header.floating .nav,.header.floating .nav-responsive-toggle {
	height: <?php echo qualia_option('header_floating_height'); ?>px;
	line-height: <?php echo qualia_option('header_floating_height'); ?>px;
}
.page-template-page-template-one-page-php .header-spacer {
	padding-top: <?php echo qualia_option('one_page_header_height'); ?>px;
}
.page-template-page-template-one-page-php .header .logo,.page-template-page-template-one-page-php .nav,.page-template-page-template-one-page-php .nav-responsive-toggle {
	height: <?php echo qualia_option('one_page_header_height'); ?>px;
	line-height: <?php echo qualia_option('one_page_header_height'); ?>px;
}
.page-template-page-template-one-page-php .header.floating .logo,.page-template-page-template-one-page-php .header.floating .nav,.header.floating .nav-responsive-toggle {
	height: <?php echo qualia_option('one_page_header_floating_height'); ?>px;
	line-height: <?php echo qualia_option('one_page_header_floating_height'); ?>px;
}
.header .logo {
	margin-right: <?php qualia_rempx(1); ?>;
}
.header .logo img {
	padding: <?php qualia_rempx(1.5); ?> 0;
}
.header.mode-centered-logo .logo img {
	padding: <?php qualia_rempx(1.5); ?> 0 <?php qualia_rempx(1); ?>;
}
.header.floating .logo img {
	padding: <?php qualia_rempx(0.75); ?> 0;
}
.nav .menu > ul > li > a {
	max-height: <?php echo qualia_option('header_height'); ?>px
}
.header.floating .nav .menu > ul > li > a {
	max-height: <?php echo qualia_option('header_floating_height'); ?>px
}
.page-template-page-template-one-page-php .nav .menu > ul > li > a {
	max-height: <?php echo qualia_option('one_page_header_height'); ?>px
}
.page-template-page-template-one-page-php .header.floating .nav .menu > ul > li > a {
	max-height: <?php echo qualia_option('one_page_header_floating_height'); ?>px
}
.nav .menu > ul > li > a,.nav .menu li.menu-mega > ul > li > a {
	font-family: <?php echo $font_face['nav']; ?>;
	font-size: <?php echo $font_size['nav']; ?>px;
	font-style: <?php echo $font_style['nav']; ?>;
	font-weight: <?php echo $font_weight['nav']; ?>;
	text-transform: <?php echo $text_transform['nav']; ?>;
	letter-spacing: <?php echo $letter_spacing['nav']; ?>px;
	line-height: <?php echo $line_height['nav']; ?>px;
}
.nav .menu li.menu-button {
	margin: 0 <?php qualia_rempx(1); ?>;
}
.nav .menu li.socmed a {
	padding: <?php qualia_rempx(0.2); ?> <?php qualia_rempx(0.4); ?>;
	margin-top: <?php qualia_rempx(-0.4); ?>;
}
.nav .menu .socmed > a {
	font-size: <?php echo $line_height['nav']; ?>px !important;
	line-height: <?php echo $line_height['nav']; ?>px;
}
.nav a {
	line-height: <?php echo $line_height['body']; ?>px;
}
.nav .menu > ul > li > a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.page-template-page-template-one-page-php .nav a {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.nav .menu .sub-menu {
	padding: <?php qualia_rempx(0.4); ?> 0;
}
.nav .menu .sub-menu > li {
	line-height: <?php qualia_rempx(1); ?>;
}
.nav .menu .sub-menu > li > a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(2); ?> <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.nav .menu > ul > li > .sub-menu {
	margin-top: <?php qualia_rempx(1); ?>;
}
.nav .menu .sub-menu > li > .sub-menu {
	margin-top: <?php echo -1 * ( (3 * floor(0.4 * $font_size['body'])) + $line_height['body'] + 3 ); ?>px;
	margin-left: <?php qualia_rempx(-1); ?>;
}
.nav .menu .sub-menu li.menu-has-children > a:after {
	margin: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.3); ?> 0;
}
.nav .menu > ul > li.menu-mega > .sub-menu {
	padding: <?php qualia_rempx(2); ?> <?php qualia_rempx(1); ?>;
}
.nav .menu > ul > li.menu-mega > .sub-menu > li {
	padding: 0 <?php qualia_rempx(1); ?>;
}
.nav .menu > ul > li.menu-mega > .sub-menu a {
	padding: <?php qualia_rempx(0.2); ?> 0;
}
.nav .menu > ul > li.menu-mega > .sub-menu > li > a {
	padding-bottom: <?php qualia_rempx(0.5); ?>;
	margin-bottom: <?php qualia_rempx(0.5); ?>;
}
.nav .menu > ul > li.menu-mega > .sub-menu > li .sub-menu .sub-menu {
	padding: 0 0 0 <?php qualia_rempx(1.5); ?>;
}
.nav-responsive-toggle {
	font-size: <?php qualia_rempx(2); ?>;
	width: <?php qualia_rempx(3); ?>;
	margin-left: <?php qualia_rempx(1); ?>;
}
@-webkit-keyframes qualia-animation-floating-header {
	0%   { margin-top: -<?php echo qualia_option('header_floating_height'); ?>px; }
	100% { margin-top: 0; }
}
@-moz-keyframes qualia-animation-floating-header {
	0%   { margin-top: -<?php echo qualia_option('header_floating_height'); ?>px; }
	100% { margin-top: 0; }
}
@-ms-keyframes qualia-animation-floating-header {
	0%   { margin-top: -<?php echo qualia_option('header_floating_height'); ?>px; }
	100% { margin-top: 0; }
}
@-o-keyframes qualia-animation-floating-header {
	0%   { margin-top: -<?php echo qualia_option('header_floating_height'); ?>px; }
	100% { margin-top: 0; }
}
@keyframes qualia-animation-floating-header {
	0%   { margin-top: -<?php echo qualia_option('header_floating_height'); ?>px; }
	100% { margin-top: 0; }
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".nav .menu .sub-menu,";
	echo ".color-palette-$j .nav .menu .sub-menu {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_background[$j], 'hex'), -0.05) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_accent[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".header.floating,";
	echo ".color-palette-$j.header.floating {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_background[$j], 'hex'), -0.05) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . ";" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".header.header-absolute.floating,";
	echo ".color-palette-$j.header.header-absolute.floating {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_background[$j], 'hex'), -0.05) . " !important;" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_background[$j], -0.05) . " !important;" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".nav .menu li.menu-mega > ul > li > a,";
	echo ".color-palette-$j .nav .menu li.menu-mega > ul > li > a {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".page-template-page-template-one-page-php .nav .menu li.menu-current-item a,";
	echo ".page-template-page-template-one-page-php .color-palette-$j .nav .menu li.menu-current-item a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_base[$j] !important;" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Sub Header
 * =============================================================
 */
.sub-header.mode-default .title,.sub-header.mode-centered .title {
	margin-bottom: <?php qualia_rempx(0.75); ?>;
}
.sub-header .title h1 {
	font-family: <?php echo $font_face['title']; ?>;
	font-size: <?php echo $font_size['title']; ?>px;
	font-style: <?php echo $font_style['title']; ?>;
	font-weight: <?php echo $font_weight['title']; ?>;
	text-transform: <?php echo $text_transform['title']; ?>;
	letter-spacing: <?php echo $letter_spacing['title']; ?>px;
	line-height: <?php echo $line_height['title']; ?>px;
}
.sub-header .breadcrumb {
	font-size: <?php qualia_rempx(0.9); ?>;
}
.sub-header .breadcrumb li {
	padding-left: <?php qualia_rempx(0.8); ?>;
	margin-left: <?php qualia_rempx(0.3); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".sub-header .breadcrumb,";
	echo ".color-palette-$j.sub-header .breadcrumb {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".sub-header .breadcrumb a:hover,.sub-header .breadcrumb a:focus,";
	echo ".color-palette-$j.sub-header .breadcrumb a:hover,.color-palette-$j.sub-header .breadcrumb a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Content
 * =============================================================
 */
.aside.left {
	padding-right: <?php qualia_rempx(1.5); ?>;
}
.aside.right {
	padding-left: <?php qualia_rempx(1.5); ?>;
}
/**
 * Widget
 * =============================================================
 */
.widget {
	margin-bottom: <?php qualia_rempx(4); ?>;
}
.header-widget {
	padding: <?php qualia_rempx(1.5); ?> !important;
}
.sidebar .widget .widget-title,.vp-sidebar .widget .widget-title {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
	margin-bottom: <?php qualia_rempx(1.5); ?>;
}
.sidebar .widget .widget-title:after,.vp-sidebar .widget .widget-title:after {
	left: <?php qualia_rempx(2); ?>;
	border-width: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.5); ?> 0;
}
/* sidebar list */
.widget > .widget-menu-list,.widget_archive > ul,.widget_categories > ul,.widget_nav_menu > div > ul,.widget_meta > ul,.widget_recent_comments > ul,.widget_recent_entries > ul,.widget_rss > ul {
	padding-bottom: <?php qualia_rempx(0.5); ?>;
}
.widget .widget-menu-list li,.widget_archive ul li,.widget_categories ul li,.widget_nav_menu ul li,.widget_meta ul li,.widget_recent_comments ul li,.widget_recent_entries ul li {
	margin-top: <?php qualia_rempx(0.5); ?>;
	padding: <?php qualia_rempx(0.5); ?> 0 0 <?php qualia_rempx(2.142857142857143); ?>;
}
.widget .widget-menu-list li:before,.widget_archive ul li:before,.widget_categories ul li:before,.widget_nav_menu ul li:before,.widget_meta ul li:before,.widget_recent_comments ul li:before,.widget_recent_entries ul li:before {
	width: <?php qualia_rempx(2.142857142857143); ?>;
}
/* Post List */
.widget .widget-post-list,.widget.woocommerce .product_list_widget {
	margin: <?php qualia_rempx(2); ?> 0;
}
.widget .widget-post-list li,.widget.woocommerce .product_list_widget li {
	padding-left: <?php qualia_rempx(5); ?>;
	min-height: <?php qualia_rempx(4); ?>;
	margin: <?php qualia_rempx(1); ?> 0;
}
.widget .widget-post-list li .widget-post-list-item-title {
	margin: 0 0 <?php qualia_rempx(0.25); ?>;
}
.widget .widget-post-list li .widget-post-list-item-image {
	font-size: <?php qualia_rempx(1.5); ?>;
	line-height: <?php qualia_rempx(4); ?>;
	height: <?php qualia_rempx(4); ?>;
	width: <?php qualia_rempx(4); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.widget .widget-post-list li .widget-post-list-item-image img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
/* rss */
.widget_rss > ul > li {
	border-radius: <?php qualia_rempx(0.25); ?>;
	box-shadow: 0 <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.025);
	padding: <?php qualia_rempx(1.5); ?> <?php qualia_rempx(2); ?> <?php qualia_rempx(1); ?>;
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.widget_rss .rss-date {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.widget_rss cite {
	margin-top: <?php qualia_rempx(0.5); ?>;
}
.widget_rss ul .rsswidget {
	font-family: <?php echo $font_face['h6']; ?>;
	font-size: <?php echo $font_size['h6']; ?>px;
	font-style: <?php echo $font_style['h6']; ?>;
	font-weight: <?php echo $font_weight['h6']; ?>;
	text-transform: <?php echo $text_transform['h6']; ?>;
	letter-spacing: <?php echo $letter_spacing['h6']; ?>px;
	line-height: <?php echo $line_height['h6']; ?>px;
}
.widget_rss .rssSummary,.widget_rss .rss-date,.widget_rss cite {
	font-size: <?php qualia_rempx(0.9); ?>;
	line-height: <?php echo 0.9 * $line_height['body']; ?>px;
}
/* tag cloud */
.widget_tag_cloud .tagcloud a, .tags a {
	border-radius: <?php qualia_rempx(0.25); ?>;
	font-size: <?php qualia_rempx(0.85); ?> !important;
	margin: 0 <?php qualia_rempx(0.3); ?> <?php qualia_rempx(0.5); ?> 0;
	padding: <?php qualia_rempx(0.2); ?> <?php qualia_rempx(0.5); ?>;
}
/* search */
.widget_search form {
	padding-right: <?php qualia_rempx(3); ?>;
}
/* calendar */
.widget_calendar table caption {
	margin-bottom: <?php qualia_rempx(0.5); ?>;
	padding: 0 <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.5); ?>;
}
.widget_calendar table td,.widget_calendar table th {
	font-size: <?php qualia_rempx(0.85); ?>;
	line-height: <?php qualia_rempx(1.2); ?>;
	padding: <?php qualia_rempx(0.5); ?>;
}
.widget_calendar table tfoot #next,.widget_calendar table tfoot #prev {
	padding: <?php qualia_rempx(0.2); ?> <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.5); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".widget .widget-menu-list li,.widget_archive ul li,.widget_categories ul li,.widget_nav_menu ul li,.widget_meta ul li,.widget_recent_comments ul li,.widget_recent_entries ul li,.widget_rss ul li,";
	echo ".color-palette-$j .widget .widget-menu-list li,.color-palette-$j .widget_archive ul li,.color-palette-$j .widget_categories ul li,.color-palette-$j .widget_nav_menu ul li,.color-palette-$j .widget_meta ul li,.color-palette-$j .widget_recent_comments ul li,.color-palette-$j .widget_recent_entries ul li,.color-palette-$j .widget_rss ul li,";
	echo ".vp-box.color-palette-$j .widget .widget-menu-list li,.vp-box.color-palette-$j .widget_archive ul li,.vp-box.color-palette-$j .widget_categories ul li,.vp-box.color-palette-$j .widget_nav_menu ul li,.vp-box.color-palette-$j .widget_meta ul li,.vp-box.color-palette-$j .widget_recent_comments ul li,.vp-box.color-palette-$j .widget_recent_entries ul li,.vp-box.color-palette-$j .widget_rss ul li {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget > .widget-menu-list,.widget_archive > ul,.widget_categories > ul,.widget_nav_menu > div > ul,.widget_meta > ul,.widget_recent_comments > ul,.widget_recent_entries > ul,.widget_rss > ul,";
	echo ".color-palette-$j .widget > .widget-menu-list,.color-palette-$j .widget_archive > ul,.color-palette-$j .widget_categories > ul,.color-palette-$j .widget_nav_menu > div > ul,.color-palette-$j .widget_meta > ul,.color-palette-$j .widget_recent_comments > ul,.color-palette-$j .widget_recent_entries > ul,.color-palette-$j .widget_rss > ul,";
	echo ".vp-box.color-palette-$j .widget > .widget-menu-list,.vp-box.color-palette-$j .widget_archive > ul,.vp-box.color-palette-$j .widget_categories > ul,.vp-box.color-palette-$j .widget_nav_menu > div > ul,.vp-box.color-palette-$j .widget_meta > ul,.vp-box.color-palette-$j .widget_recent_comments > ul,.vp-box.color-palette-$j .widget_recent_entries > ul,.vp-box.color-palette-$j .widget_rss > ul {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget .widget-post-list li .widget-post-list-item-image,";
	echo ".color-palette-$j .widget .widget-post-list li .widget-post-list-item-image,";
	echo ".vp-box.color-palette-$j .widget .widget-post-list li .widget-post-list-item-image {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') .  ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') .  ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".sidebar .widget .widget-title,.vp-sidebar .widget .widget-title,";
	echo ".color-palette-$j .sidebar .widget .widget-title,.color-palette-$j .vp-sidebar .widget .widget-title,";
	echo ".vp-box.color-palette-$j .sidebar .widget .widget-title,.vp-box.color-palette-$j .vp-sidebar .widget .widget-title {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".sidebar .widget .widget-title:after,.vp-sidebar .widget .widget-title:after,";
	echo ".color-palette-$j .sidebar .widget .widget-title:after,.color-palette-$j .vp-sidebar .widget .widget-title:after,";
	echo ".vp-box.color-palette-$j .sidebar .widget .widget-title:after,.vp-box.color-palette-$j .vp-sidebar .widget .widget-title:after {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget_rss > ul > li,";
	echo ".color-palette-$j .widget_rss > ul > li,";
	echo ".vp-box.color-palette-$j .widget_rss > ul > li {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget_tag_cloud .tagcloud a,.tags a,";
	echo ".color-palette-$j .widget_tag_cloud .tagcloud a,.color-palette-$j .tags a,";
	echo ".vp-box.color-palette-$j .widget_tag_cloud .tagcloud a,.vp-box.color-palette-$j .tags a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget_calendar table caption,";
	echo ".color-palette-$j .widget_calendar table caption,";
	echo ".vp-box.color-palette-$j .widget_calendar table caption {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget_calendar table tbody td,";
	echo ".color-palette-$j .widget_calendar table tbody td,";
	echo ".vp-box.color-palette-$j .widget_calendar table tbody td {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_background[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Footer
 * =============================================================
 */
.footer .widget {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.footer .widget > h5 {
	margin-bottom: <?php qualia_rempx(2); ?>;
	font-family: <?php echo $font_face['nav']; ?>;
	font-size: <?php echo $font_size['nav']; ?>px;
	font-style: <?php echo $font_style['nav']; ?>;
	font-weight: <?php echo $font_weight['nav']; ?>;
	text-transform: <?php echo $text_transform['nav']; ?>;
	letter-spacing: <?php echo $letter_spacing['nav']; ?>px;
	line-height: <?php echo $line_height['nav']; ?>px;
}
/**
 * Copyright
 * =============================================================
 */
.copyright .copyright-text p {
	padding: <?php qualia_rempx(0.5); ?> 0;
}
.copyright .copyright-nav a {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.75); ?>;
}
.copyright .copyright-nav,.copyright .copyright-social {
	margin-left: <?php qualia_rempx(0.75); ?>;
}
.copyright .copyright-nav,.copyright .copyright-social {
	margin-left: <?php qualia_rempx(0.75); ?>;
}
.copyright .copyright-nav .sub-menu {
	padding: <?php qualia_rempx(0.25); ?> 0;
}
.copyright .copyright-nav .sub-menu a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(0.75); ?>;
}
.copyright .copyright-nav .sub-menu .sub-menu {
	margin-bottom: <?php echo -1 * (0.25 * $font_size['body'] + 1); ?>px;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".copyright .copyright-nav .sub-menu,";
	echo ".color-palette-$j.copyright .copyright-nav .sub-menu {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_background[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_background[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Blog Post
 * =============================================================
 */
.post.format-quote .post-content .source {
	padding-left: <?php qualia_rempx(3.5); ?>;
}
.post.format-quote .post-content .source a {
	padding: 0 <?php qualia_rempx(1.5); ?>;
}
.post.format-link .post-content .source i {
	margin-right: <?php qualia_rempx(0.8); ?>;
}
.post .post-content {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
/**
 * Blog Index / Archive
 * =============================================================
 */
.blog-archive .post .post-core .post-title {
	margin: 0 0 <?php qualia_rempx(1); ?>;
}
.blog-archive .post .post-meta {
	margin: <?php qualia_rempx(1); ?> 0 0;
}
/* default */
.blog-archive.mode-default .post.sticky .post-core {
	padding-top: <?php qualia_rempx(2); ?>;
}
.blog-archive.mode-default .post {
	padding: <?php qualia_rempx(3); ?> <?php qualia_rempx(2); ?>;
}
.blog-archive.mode-default .post .post-image {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-default .post .post-image img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-default .post.format-quote .post-content {
	border-radius: <?php qualia_rempx(0.25); ?>;
	padding: <?php qualia_rempx(1); ?>;
}
.blog-archive.mode-default .post.sticky {
	border-radius: <?php qualia_rempx(0.25); ?>;
	margin: <?php qualia_rempx(1); ?> 0;
	padding: <?php qualia_rempx(2); ?>;
	box-shadow: 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
	background-image: -webkit-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -moz-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -o-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -ms-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
}
.blog-archive.mode-default .post .post-image {
	max-width: <?php qualia_rempx(20); ?>;
	margin-right: <?php qualia_rempx(2); ?>;
}
.blog-archive.mode-default .blog-pagination,.blog-archive.mode-masonry .blog-pagination {
	padding: <?php qualia_rempx(2); ?> 0;
}
/* mini */
.blog-archive.mode-mini .post {
	padding: <?php qualia_rempx(0.8); ?> 0;
}
.blog-archive.mode-mini .post .post-wrapper {
	padding-left: <?php qualia_rempx(7); ?>;
	min-height: <?php qualia_rempx(6); ?>;
}
.blog-archive.mode-mini .post .post-image {
	font-size: <?php qualia_rempx(3); ?>;
	width: <?php qualia_rempx(6); ?>;
	height: <?php qualia_rempx(6); ?>;
	line-height: <?php qualia_rempx(6); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-mini .post .post-image img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-mini .post .post-title {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
	font-family: <?php echo $font_face['h3']; ?>;
	font-size: <?php echo $font_size['h3']; ?>px;
	font-style: <?php echo $font_style['h3']; ?>;
	font-weight: <?php echo $font_weight['h3']; ?>;
	text-transform: <?php echo $text_transform['h3']; ?>;
	letter-spacing: <?php echo $letter_spacing['h3']; ?>px;
	line-height: <?php echo $line_height['h3']; ?>px;
}
/* Timeline and Masonry */
.blog-archive.mode-timeline {
	margin: <?php qualia_rempx(4.2); ?> auto;
	padding-top: <?php qualia_rempx(6); ?>;
}
.blog-archive.mode-timeline .post {
	margin-bottom: <?php qualia_rempx(6); ?>;
}
.blog-archive.mode-timeline .post,.blog-archive.mode-masonry .post {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-timeline .post-wrapper,.blog-archive.mode-masonry .post-wrapper {
	border-radius: <?php qualia_rempx(0.25); ?>;
	box-shadow: 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
	background-image: -webkit-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -moz-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -o-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -ms-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
}
.blog-archive.mode-timeline .post .post-image img,.blog-archive.mode-masonry .post .post-image img {
	border-radius: <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> 0 0
}
.blog-archive.mode-timeline .post .post-core,.blog-archive.mode-masonry .post .post-core {
	padding: <?php qualia_rempx(1.5); ?> <?php qualia_rempx(2); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-timeline .post .has-thumbnail .post-core,.blog-archive.mode-masonry .post .has-thumbnail .post-core {
	border-radius: 0 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?>;
}
.blog-archive.mode-timeline .prev.pagination,.blog-archive.mode-timeline .begin.pagination {
	top: <?php qualia_rempx(-4.2); ?>;
}
.blog-archive.mode-timeline .next.pagination,.blog-archive.mode-timeline .end.pagination, .blog-archive.mode-timeline .load-more.pagination {
	bottom: <?php qualia_rempx(-4.2); ?>;
}
.blog-archive.mode-timeline .pagination > a,.blog-archive.mode-timeline .pagination > span {
	height: <?php qualia_rempx(4); ?>;
	width: <?php qualia_rempx(4); ?>;
	line-height: <?php qualia_rempx(4); ?>;
	font-size: <?php qualia_rempx(2); ?>;
}
.blog-archive.mode-masonry.pagination-page .blog-pagination {
	padding: <?php qualia_rempx(1); ?> 0;
}
.blog-archive.mode-masonry .post .post-core:before,.blog-archive.mode-masonry .post .post-core:after,
.blog-archive.mode-timeline .post .post-core:before,.blog-archive.mode-timeline .post .post-core:after {
	top: <?php qualia_rempx(3); ?>;
}
.blog-archive.mode-masonry .post.format-quote .post-content blockquote,.blog-archive.mode-timeline .post.format-quote .post-content blockquote {
	padding: <?php qualia_rempx(3); ?> 0 0 0;
}
.blog-archive.mode-masonry .post.format-quote .post-content blockquote:before,.blog-archive.mode-timeline .post.format-quote .post-content blockquote:before {
	margin: 0 0 0 <?php qualia_rempx(-1); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".blog-archive .post.sticky > .ribbon span,";
	echo ".color-palette-$j .blog-archive .post.sticky > .ribbon span,";
	echo ".vp-box.color-palette-$j .blog-archive .post.sticky > .ribbon span {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -moz-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -o-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -ms-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive .post.sticky > .ribbon span:before,.blog-archive .post.sticky > .ribbon span:after,";
	echo ".color-palette-$j .blog-archive .post.sticky > .ribbon span:before,.color-palette-$j .blog-archive .post.sticky > .ribbon span:after,";
	echo ".vp-box.color-palette-$j .blog-archive .post.sticky > .ribbon span:before,.vp-box.color-palette-$j .blog-archive .post.sticky > .ribbon span:after {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_lightness($color_accent[$j], -0.2), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_lightness($color_accent[$j], -0.2) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-default .post,";
	echo ".color-palette-$j .blog-archive.mode-default .post,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-default .post {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-default .post.sticky,";
	echo ".color-palette-$j .blog-archive.mode-default .post.sticky,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-default .post.sticky {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-mini .post .post-image,";
	echo ".color-palette-$j .blog-archive.mode-mini .post .post-image,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-mini .post .post-image {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') .  ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') .  ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-timeline:before,";
	echo ".color-palette-$j .blog-archive.mode-timeline:before,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-timeline:before {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-timeline .pagination > a,";
	echo ".color-palette-$j .blog-archive.mode-timeline .pagination > a,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-timeline .pagination > a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_strong[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-timeline .pagination > span,";
	echo ".color-palette-$j .blog-archive.mode-timeline .pagination > span,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-timeline .pagination > span {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-masonry.pagination-page .blog-pagination,";
	echo ".color-palette-$j .blog-archive.mode-masonry.pagination-page .blog-pagination,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-masonry.pagination-page .blog-pagination {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-timeline .post .post-wrapper,.blog-archive.mode-masonry .post .post-wrapper,";
	echo ".color-palette-$j .blog-archive.mode-timeline .post .post-wrapper,.color-palette-$j .blog-archive.mode-masonry .post .post-wrapper,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-timeline .post .post-wrapper,.vp-box.color-palette-$j .blog-archive.mode-masonry .post .post-wrapper {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".blog-archive.mode-timeline .post .post-core,.blog-archive.mode-masonry .post .post-core,";
	echo ".color-palette-$j .blog-archive.mode-timeline .post .post-core,.color-palette-$j .blog-archive.mode-masonry .post .post-core,";
	echo ".vp-box.color-palette-$j .blog-archive.mode-timeline .post .post-core,.vp-box.color-palette-$j .blog-archive.mode-masonry .post .post-core {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Blog Single
 * =============================================================
 */
.blog-single .post .post-image {
	border-radius: <?php qualia_rempx(0.25); ?>;
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.blog-single .post .post-image img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-single .post-tags {
	margin: <?php qualia_rempx(2); ?> 0;
}
.blog-single .post-tags label {
	margin-right: <?php qualia_rempx(1); ?>;
}
.blog-single .post .post-pagination .wp-link-pages {
	padding: <?php qualia_rempx(1); ?> 0;
}
.blog-single .post .post-pagination .wp-link-pages a {
	margin: 0 <?php qualia_rempx(1); ?>;
}
.blog-single .post .post-meta {
	padding: <?php qualia_rempx(1); ?>;
	margin-top: <?php qualia_rempx(3); ?>;
}
.blog-single .post-author {
	min-height: <?php qualia_rempx(6); ?>;
	padding-left: <?php qualia_rempx(7.5); ?>;
	margin-top: <?php qualia_rempx(3); ?>;
}
.blog-single .post-author h3 {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
}
.blog-single .post-author .gravatar {
	height: <?php qualia_rempx(6); ?>;
	width: <?php qualia_rempx(6); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.blog-single .post-author .gravatar img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".blog-single .post .post-meta,";
	echo ".color-palette-$j .blog-single .post .post-meta {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".blog-single .post .post-pagination a,";
	echo ".color-palette-$j .blog-single .post .post-pagination a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".blog-single .post-author h3 a,";
	echo ".color-palette-$j .blog-single .post-author h3 a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".blog-single .post-author h3 a:hover,";
	echo ".color-palette-$j .blog-single .post-author h3 a:hover {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".blog-single .post .post-pagination a:hover,.blog-single .post .post-pagination a:focus,";
	echo ".color-palette-$j .blog-single .post .post-pagination a:hover,.color-palette-$j .blog-single .post .post-pagination a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Portfolio Archive
 * =============================================================
 */
.portfolio-archive .portfolio-isotope {
	margin-left: -<?php echo qualia_vp_pf_option('qualia_grid_gap', 0) / 2; ?>px;
	margin-right: -<?php echo qualia_vp_pf_option('qualia_grid_gap', 0) / 2; ?>px;
}
.portfolio-archive.pagination-page .portfolio-isotope,.portfolio-archive.pagination-wp-pagenavi .portfolio-isotope,.portfolio-archive.pagination-load-more .portfolio-isotope {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.portfolio-archive.with-filters .portfolio-isotope {
	margin-top: <?php qualia_rempx(2); ?>;
}
.portfolio-archive .portfolio-filters li a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
.portfolio-archive.pagination-page .portfolio-pagination a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
.portfolio-archive .portfolio-isotope .portfolio {
	padding: <?php echo qualia_vp_pf_option('qualia_grid_gap', 0) / 2; ?>px;
}
.portfolio-archive .portfolio .info {
	padding: <?php qualia_rempx(1); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".portfolio-archive .portfolio-filters,";
	echo ".color-palette-$j .portfolio-archive .portfolio-filters,";
	echo ".vp-box.color-palette-$j .portfolio-archive .portfolio-filters {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".portfolio-archive.pagination-page .portfolio-pagination,";
	echo ".color-palette-$j .portfolio-archive.pagination-page .portfolio-pagination,";
	echo ".vp-box.color-palette-$j .portfolio-archive.pagination-page .portfolio-pagination {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".portfolio-archive .portfolio-filters li.active,";
	echo ".color-palette-$j .portfolio-archive .portfolio-filters li.active,";
	echo ".vp-box.color-palette-$j .portfolio-archive .portfolio-filters li.active {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".portfolio-archive.mode-default .portfolio-loop .portfolio .info,";
	echo ".color-palette-$j .portfolio-archive.mode-default .portfolio-loop .portfolio .info,";
	echo ".vp-box.color-palette-$j .portfolio-archive.mode-default .portfolio-loop .portfolio .info {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".portfolio-archive .portfolio-loop .portfolio .info,";
	echo ".color-palette-$j .portfolio-archive .portfolio-loop .portfolio .info,";
	echo ".vp-box.color-palette-$j .portfolio-archive .portfolio-loop .portfolio .info {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".portfolio-archive.mode-default .portfolio-loop .portfolio .info h5,";
	echo ".color-palette-$j .portfolio-archive.mode-default .portfolio-loop .portfolio .info h5,";
	echo ".vp-box.color-palette-$j .portfolio-archive.mode-default .portfolio-loop .portfolio .info h5 {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".portfolio-archive .portfolio-loop .portfolio .info h5,";
	echo ".color-palette-$j .portfolio-archive .portfolio-loop .portfolio .info h5,";
	echo ".vp-box.color-palette-$j .portfolio-archive .portfolio-loop .portfolio .info h5 {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".portfolio-archive.mode-overlay .portfolio-loop .portfolio .info,";
	echo ".color-palette-$j .portfolio-archive.mode-overlay .portfolio-loop .portfolio .info,";
	echo ".vp-box.color-palette-$j .portfolio-archive.mode-overlay .portfolio-loop .portfolio .info {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_accent[$j], -0.1), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_accent[$j], -0.1). ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Portfolio Single
 * =============================================================
 */
.portfolio-single .main {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.portfolio-single .portfolio-pagination {
	margin-top: <?php qualia_rempx(3); ?>;
}
.portfolio-single .portfolio-pagination a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
.portfolio-single .portfolio-tags {
	margin: <?php qualia_rempx(2); ?> 0;
}
.portfolio-single .portfolio-tags label {
	margin-right: <?php qualia_rempx(1); ?>;
}
.portfolio-single .info > ul > li {
	padding: <?php qualia_rempx(0.8); ?> 0;
}
.portfolio-single .info > ul > li .value {
	padding-left: <?php qualia_rempx(2); ?>;
}
.portfolio-single .portfolio.images-default .images > ul > li {
	margin-top: <?php qualia_rempx(2); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".portfolio-single .portfolio-pagination,";
	echo ".color-palette-$j .portfolio-single .portfolio-pagination {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".portfolio-single .info > ul > li,";
	echo ".color-palette-$j .portfolio-single .info > ul > li {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Search Result
 * =============================================================
 */
.search-form {
	border-radius: <?php qualia_rempx(0.25); ?>;
	padding: <?php qualia_rempx(2); ?>;
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.search-form h4 {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
}
.search-form .search-form-inner {
	padding-right: <?php qualia_rempx(9); ?>;
}
.search-result .search-result-loop .search-result-item {
	padding: <?php qualia_rempx(1); ?> 0;
}
.search-result .search-result-pagination a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :
	
	if ($j == 1) echo ".search-form,";
	echo ".color-palette-$j .search-form,";
	echo ".vp-box.color-palette-$j .search-form {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".search-result .search-result-loop .search-result-item,";
	echo ".color-palette-$j .search-result .search-result-loop .search-result-item,";
	echo ".vp-box.color-palette-$j .search-result .search-result-loop .search-result-item {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".search-result .search-result-pagination,";
	echo ".color-palette-$j .search-result .search-result-pagination,";
	echo ".vp-box.color-palette-$j .search-result .search-result-pagination {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * Comments
 * =============================================================
 */
.comments-list, .comments-respond {
	margin-top: <?php qualia_rempx(3); ?>;
}
.comments-list li {
	padding: <?php qualia_rempx(1.5); ?> 0 <?php qualia_rempx(0.5); ?> <?php qualia_rempx(5.5); ?>;
	min-height: <?php qualia_rempx(4); ?>;
}
.comments-list li.bypostauthor h5 span {
	border-radius: <?php qualia_rempx(0.25); ?>;
	padding: <?php qualia_rempx(0.1); ?> <?php qualia_rempx(0.5); ?>;
	margin-left: <?php qualia_rempx(0.25); ?>;
	font-size: <?php qualia_rempx(0.85); ?>;
}
.comments-list li .gravatar {
	width: <?php qualia_rempx(4); ?>;
	margin-top: <?php qualia_rempx(1.5); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.comments-list li .gravatar img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.comments-list li .comment-meta {
	margin: <?php qualia_rempx(1); ?> 0;
}
.comments-list h5 {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
}
#respond {
	padding: <?php qualia_rempx(2); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
#respond h3 {
	margin: 0 0 <?php qualia_rempx(1); ?> 0;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".comments-list li,";
	echo ".color-palette-$j .comments-list li {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".comments-list li.bypostauthor h5 span,";
	echo ".color-palette-$j .comments-list li.bypostauthor h5 span {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".comments-respond,";
	echo ".color-palette-$j .comments-respond {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/**
 * 404
 * =============================================================
 */
.error-404 {
	padding: <?php qualia_rempx(3); ?> 0 <?php qualia_rempx(5); ?>;
}
/**
 * Shortcodes
 * =============================================================
 */
/* Colors */
<?php foreach (array('transparent', 'inherit', 'white', 'black', 'info', 'warning', 'success', 'error') as $value) :

	echo ".vp-color-$value,.menu-button-color-$value > a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse(${"color_$value"}, 'hex') . " !important;" . "\n";
	echo "\t" . "color: " . ${"color_$value"} . " !important;" . "\n";
	echo "}" . "\n";

	echo ".vp-background-$value,.menu-button-background-$value > a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(${"color_$value"}, 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: " . ${"color_$value"} . " !important;" . "\n";
	echo "}" . "\n";

	echo ".vp-border-$value,.menu-button-border-$value > a {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse(${"color_$value"}, 'hex') . " !important;" . "\n";
	echo "\t" . "border-color: " . ${"color_$value"} . " !important;" . "\n";
	echo "}" . "\n";

endforeach;

for ($j = 1; $j <= $qualia_n_color_set; $j++) : foreach (array('background', 'base', 'subtle', 'text', 'accent', 'strong') as $value) :

	if ($j == 1) echo ".vp-color-$value,.menu-button-color-$value > a,";
	echo ".color-palette-$j .vp-color-$value,.color-palette-$j .menu-button-color-$value a,";
	echo ".vp-box.color-palette-$j .vp-color-$value,.vp-box.color-palette-$j .menu-button-color-$value > a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse(${"color_$value"}[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: " . ${"color_$value"}[$j] . " !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-background-$value,.menu-button-background-$value > a,";
	echo ".color-palette-$j .vp-background-$value,.color-palette-$j .menu-button-background-$value > a,";
	echo ".vp-box.color-palette-$j .vp-background-$value,.vp-box.color-palette-$j .menu-button-background-$value > a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(${"color_$value"}[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: " . ${"color_$value"}[$j] . " !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-border-$value,.menu-button-border-$value > a,";
	echo ".color-palette-$j .vp-border-$value,.color-palette-$j .menu-button-border-$value > a,";
	echo ".vp-box.color-palette-$j .vp-border-$value,.vp-box.color-palette-$j .menu-button-border-$value > a {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse(${"color_$value"}[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "border-color: " . ${"color_$value"}[$j] . " !important;" . "\n";
	echo "}" . "\n";

endforeach; endfor; ?>
/* Box */
.vp-box {
	padding: <?php qualia_rempx(2); ?>;
	margin: <?php qualia_rempx(1); ?> 0;
}
/* Divider */
.vp-divider {
	margin: <?php qualia_rempx(2); ?> 0;
	font-family: <?php echo $font_face['divider']; ?>;
	font-style: <?php echo $font_style['divider']; ?>;
	font-weight: <?php echo $font_weight['divider']; ?>;
	text-transform: <?php echo $text_transform['divider']; ?>;
	font-size: <?php echo $font_size['divider']; ?>px;
	line-height: <?php echo $line_height['divider']; ?>px;
	letter-spacing: <?php echo $letter_spacing['divider']; ?>px;
}
.vp-divider.vp-mode-double hr,.vp-divider.vp-mode-double-dashed hr,.vp-divider.vp-mode-double-dotted hr,.vp-divider.vp-mode-bold hr {
	height: <?php qualia_rempx(0.5); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-divider hr,";
	echo ".color-palette-$j .vp-divider hr,";
	echo ".vp-box.color-palette-$j .vp-divider hr {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-divider.vp-mode-bold hr,";
	echo ".color-palette-$j .vp-divider.vp-mode-bold hr,";
	echo ".vp-box.color-palette-$j .vp-divider.vp-mode-bold hr {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Accordion */
.vp-accordion.vp-mode-default .vp-accordion-pane {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.vp-accordion.vp-mode-default .vp-accordion-pane {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
	background-image: -webkit-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -moz-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -o-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: -ms-linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	background-image: linear-gradient(bottom, rgba(0,0,0,0.025), rgba(0,0,0,0) <?php qualia_rempx(3); ?>);
	box-shadow: 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
}
.vp-accordion.vp-mode-default .vp-accordion-pane .vp-accordion-pane-heading {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.vp-accordion .vp-accordion-pane .vp-accordion-pane-heading a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(0.8); ?> <?php qualia_rempx(3); ?>;
}
.vp-accordion .vp-accordion-pane .vp-accordion-pane-heading a > i {
	font-size: <?php qualia_rempx(0.8); ?>;
	margin: <?php qualia_rempx(0.8); ?> 0 0 <?php qualia_rempx(1); ?>;
}
.vp-accordion .vp-accordion-pane .vp-accordion-pane-core {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(2); ?> <?php qualia_rempx(3); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-accordion.vp-mode-default .vp-accordion-pane,";
	echo ".color-palette-$j .vp-accordion.vp-mode-default .vp-accordion-pane,";
	echo ".vp-box.color-palette-$j .vp-accordion.vp-mode-default .vp-accordion-pane {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-accordion .vp-accordion-pane .vp-accordion-pane-heading a,";
	echo ".color-palette-$j .vp-accordion .vp-accordion-pane .vp-accordion-pane-heading a,";
	echo ".vp-box.color-palette-$j .vp-accordion .vp-accordion-pane .vp-accordion-pane-heading a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_strong[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-accordion.vp-mode-outline,";
	echo ".color-palette-$j .vp-accordion.vp-mode-outline,";
	echo ".vp-box.color-palette-$j .vp-accordion.vp-mode-outline {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-accordion.vp-mode-outline .vp-accordion-pane,";
	echo ".color-palette-$j .vp-accordion.vp-mode-outline .vp-accordion-pane,";
	echo ".vp-box.color-palette-$j .vp-accordion.vp-mode-outline .vp-accordion-pane {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Tabs */
.vp-tabs .vp-tabs-nav .vp-tabs-nav-item a {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
.vp-tabs .vp-tabs-nav .vp-tabs-nav-item a i {
	margin-right: <?php qualia_rempx(0.5); ?>;
	width: <?php qualia_rempx(1.5); ?>;
}
.vp-tabs.vp-mode-default .vp-tabs-panels {
	padding: <?php qualia_rempx(2); ?>;
}
.vp-tabs.vp-mode-outline.vp-tabs-nav-position-left .vp-tabs-panels {
	padding: 0 <?php qualia_rempx(2); ?>;
}
.vp-tabs.vp-mode-outline.vp-tabs-nav-position-top .vp-tabs-panels {
	padding: <?php qualia_rempx(2); ?> 0;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-tabs.vp-mode-default .vp-tabs-nav li.vp-active a,";
	echo ".color-palette-$j .vp-tabs.vp-mode-default .vp-tabs-nav li.vp-active a,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-default .vp-tabs-nav li.vp-active a {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs .vp-tabs-nav li a,";
	echo ".color-palette-$j .vp-tabs .vp-tabs-nav li a,";
	echo ".vp-box.color-palette-$j .vp-tabs .vp-tabs-nav li a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_strong[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs .vp-tabs-nav li a:hover,";
	echo ".color-palette-$j .vp-tabs .vp-tabs-nav li a:hover,";
	echo ".vp-box.color-palette-$j .vp-tabs .vp-tabs-nav li a:hover {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_accent[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs .vp-tabs-nav li.vp-active a:hover,";
	echo ".color-palette-$j .vp-tabs .vp-tabs-nav li.vp-active a:hover,";
	echo ".vp-box.color-palette-$j .vp-tabs .vp-tabs-nav li.vp-active a:hover {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_strong[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs.vp-mode-outline .vp-tabs-nav li,";
	echo ".color-palette-$j .vp-tabs.vp-mode-outline .vp-tabs-nav li,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-outline .vp-tabs-nav li {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs.vp-mode-default.vp-tabs-nav-position-top .vp-tabs-nav li.vp-active,";
	echo ".color-palette-$j .vp-tabs.vp-mode-default.vp-tabs-nav-position-top .vp-tabs-nav li.vp-active,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-default.vp-tabs-nav-position-top .vp-tabs-nav li.vp-active {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs.vp-mode-default.vp-tabs-nav-position-left .vp-tabs-nav li.vp-active,";
	echo ".color-palette-$j .vp-tabs.vp-mode-default.vp-tabs-nav-position-left .vp-tabs-nav li.vp-active,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-default.vp-tabs-nav-position-left .vp-tabs-nav li.vp-active {" . "\n";
	echo "\t" . "border-left-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-left-color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs.vp-mode-default .vp-tabs-panels,";
	echo ".color-palette-$j .vp-tabs.vp-mode-default .vp-tabs-panels,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-default .vp-tabs-panels {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-tabs.vp-mode-outline .vp-tabs-panels,";
	echo ".color-palette-$j .vp-tabs.vp-mode-outline .vp-tabs-panels,";
	echo ".vp-box.color-palette-$j .vp-tabs.vp-mode-outline .vp-tabs-panels {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Blog */
/* Google Maps */
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-google-maps .vp-map-info,";
	echo ".color-palette-$j .vp-google-maps .vp-map-info,";
	echo ".vp-box.color-palette-$j .vp-google-maps .vp-map-info {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_background[$j], -0.1), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_background[$j], -0.1) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Point Block */
.vp-point-block.vp-mode-default {
	padding: <?php qualia_rempx(1); ?> 0 <?php qualia_rempx(1); ?> <?php qualia_rempx(4); ?>;
}
.vp-point-block.vp-mode-default .vp-point-block-image {
	width: <?php qualia_rempx(3); ?>;
	height: <?php qualia_rempx(3); ?>;
	margin-top: <?php qualia_rempx(0.75); ?>;
}
.vp-point-block .vp-point-block-image i {
	font-size: <?php qualia_rempx(2.5); ?>;
}
.vp-point-block.vp-mode-centered .vp-point-block-image i {
	font-size: <?php qualia_rempx(3); ?>;
}
.vp-point-block.vp-mode-centered .vp-point-block-image,.vp-point-block.vp-mode-centered-circled .vp-point-block-image {
	margin-bottom: <?php qualia_rempx(1.5); ?>;
}
.vp-point-block.vp-mode-centered-circled .vp-point-block-image i {
	width: <?php qualia_rempx(6); ?>;
	height: <?php qualia_rempx(6); ?>;
	line-height: <?php qualia_rempx(6); ?>;
	border-width: <?php qualia_rempx(0.2); ?>
}
.vp-point-block .vp-point-block-title {
	margin-bottom: <?php qualia_rempx(1.25); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-point-block.vp-mode-centered-circled .vp-point-block-image i,";
	echo ".color-palette-$j .vp-point-block.vp-mode-centered-circled .vp-point-block-image i,";
	echo ".vp-box.color-palette-$j .vp-point-block.vp-mode-centered-circled .vp-point-block-image i {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_accent[$j], -0.75), 'hex') . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::percentage_alpha($color_accent[$j], -0.75) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-point-block.vp-mode-centered-circled:hover .vp-point-block-image i,";
	echo ".color-palette-$j .vp-point-block.vp-mode-centered-circled:hover .vp-point-block-image i,";
	echo ".vp-box.color-palette-$j .vp-point-block.vp-mode-centered-circled:hover .vp-point-block-image i {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_accent[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_base[$j] !important;" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Pricing Table */
.vp-pricing-table .vp-pricing-column {
	padding: <?php qualia_rempx(2); ?>;
}
.vp-pricing-table .vp-pricing-column.vp-featured {
	box-shadow: 0 0 <?php qualia_rempx(0.5); ?> rgba(0,0,0,0.1);
	margin-top: <?php qualia_rempx(-2); ?>;
	padding: <?php qualia_rempx(4); ?> <?php qualia_rempx(2); ?> <?php qualia_rempx(4); ?>;
}
.vp-pricing-table .vp-pricing-column.vp-featured:hover {
	box-shadow: 0 0 <?php qualia_rempx(1); ?> rgba(0,0,0,0.2);
}
.vp-pricing-table .vp-pricing-column-name {
	font-size: <?php qualia_rempx(1); ?>;
	line-height: <?php qualia_rempx(1); ?>;
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.vp-pricing-table .vp-pricing-column-price {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.vp-pricing-table .vp-pricing-column-price-currency {
	margin-top: <?php qualia_rempx(1); ?>;
	font-size: <?php qualia_rempx(1.5); ?>;
	line-height: <?php qualia_rempx(1.5); ?>;
}
.vp-pricing-table .vp-pricing-column-price-nominal {
	font-size: <?php qualia_rempx(4); ?>;
	line-height: <?php qualia_rempx(4); ?>;
}
.vp-pricing-table .vp-pricing-column-price-period {
	font-size: <?php qualia_rempx(0.85); ?>;
}
.vp-pricing-table .vp-pricing-column-accent {
	margin-bottom: <?php qualia_rempx(2); ?>;
	height: <?php qualia_rempx(0.5); ?>;
}
.vp-pricing-table .vp-pricing-column-details {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.vp-pricing-table .vp-pricing-column-details li {
	padding: <?php qualia_rempx(0.3); ?> 0;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-pricing-table .vp-pricing-column,";
	echo ".color-palette-$j .vp-pricing-table .vp-pricing-column,";
	echo ".vp-box.color-palette-$j .vp-pricing-table .vp-pricing-column {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-pricing-table .vp-pricing-column-name,.vp-pricing-table .vp-pricing-column-price,";
	echo ".color-palette-$j .vp-pricing-table .vp-pricing-column-name,.color-palette-$j .vp-pricing-table .vp-pricing-column-price,";
	echo ".vp-box.color-palette-$j .vp-pricing-table .vp-pricing-column-name,.vp-box.color-palette-$j .vp-pricing-table .vp-pricing-column-price {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-pricing-table .vp-pricing-column-featured span,";
	echo ".color-palette-$j .vp-pricing-table .vp-pricing-column-featured span,";
	echo ".vp-box.color-palette-$j .vp-pricing-table .vp-pricing-column-featured span {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -moz-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -o-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -ms-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-pricing-table .vp-pricing-column-featured span:before,.vp-pricing-table .vp-pricing-column-featured span:after,";
	echo ".color-palette-$j .vp-pricing-table .vp-pricing-column-featured span:before,.color-palette-$j .vp-pricing-table .vp-pricing-column-featured span:after,";
	echo ".vp-box.color-palette-$j .vp-pricing-table .vp-pricing-column-featured span:before,.color-palette-$j .vp-pricing-table .vp-pricing-column-featured span:after {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_lightness($color_accent[$j], -0.2), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_lightness($color_accent[$j], -0.2) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Progress Bar */
.vp-progress-bar {
	margin: <?php qualia_rempx(0.3); ?> 0;
}
.vp-progress-bar.vp-featured .vp-progress-bar-thumb {
	-webkit-background-size: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>;
	-moz-background-size: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>;
	background-size: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>;
}
@-webkit-keyframes qualia-animation-featured-progress-bar {
	0%   { background-position: 0 0; }
	100% { background-position: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>; }
}
@-moz-keyframes qualia-animation-featured-progress-bar {
	0%   { background-position: 0 0; }
	100% { background-position: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>; }
}
@-ms-keyframes qualia-animation-featured-progress-bar {
	0%   { background-position: 0 0; }
	100% { background-position: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>; }
}
@-o-keyframes qualia-animation-featured-progress-bar {
	0%   { background-position: 0 0; }
	100% { background-position: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>; }
}
@keyframes qualia-animation-featured-progress-bar {
	0%   { background-position: 0 0; }
	100% { background-position: <?php qualia_rempx(3); ?> <?php qualia_rempx(3); ?>; }
}
.vp-progress-bar .vp-progress-bar-track {
	min-height: <?php qualia_rempx(1); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.vp-progress-bar .vp-progress-bar-thumb {
	min-height: <?php qualia_rempx(1); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
/* Progress Ring */
.vp-progress-ring .vp-progress-ring-caption {
	font-size: <?php qualia_rempx(0.9); ?>;
	line-height: <?php qualia_rempx(1.2); ?>;
	margin-top: <?php qualia_rempx(1); ?>;
}
/* Counter */
.vp-counter {
	margin: <?php qualia_rempx(1); ?> 0;
}
.vp-counter-number {
	font-size: <?php qualia_rempx(4); ?>;
}
.vp-counter-caption {
	margin-top: <?php qualia_rempx(0.5); ?>;
}
/* Table */
.vp-table > table caption {
	font-size: <?php qualia_rempx(0.9); ?> !important;
	line-height: <?php qualia_rempx(1.2); ?> !important;
	margin: <?php qualia_rempx(1); ?> 0 !important;
}
.vp-table > table th,.vp-table > table td {
	padding: <?php qualia_rempx(0.8); ?> <?php qualia_rempx(1); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-table > table th,";
	echo ".color-palette-$j .vp-table > table th,";
	echo ".vp-box.color-palette-$j .vp-table > table th {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_strong[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";
	if ($j == 1) echo ".vp-table > table > tbody > tr:nth-child(even),";

	echo ".color-palette-$j .vp-table > table > tbody > tr:nth-child(even),";
	echo ".vp-box.color-palette-$j .vp-table > table > tbody > tr:nth-child(even) {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".vp-table.vp-mode-row-with-border > table > tbody > tr,";
	echo ".color-palette-$j .vp-table.vp-mode-row-with-border > table > tbody > tr,";
	echo ".vp-box.color-palette-$j .vp-table.vp-mode-row-with-border > table > tbody > tr {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Testimonial */
.vp-testimonial {
	padding: <?php qualia_rempx(1); ?> 0 <?php qualia_rempx(1); ?> <?php qualia_rempx(6); ?>;
	min-height: <?php qualia_rempx(5); ?>;
}
.vp-testimonial .vp-testimonial-photo {
	margin-top: <?php qualia_rempx(1); ?>;
	width: <?php qualia_rempx(5); ?>;
	height: <?php qualia_rempx(5); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.vp-testimonial .vp-testimonial-content {
	margin-bottom: <?php qualia_rempx(1); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
/* Alert */
.vp-alert {
	border-radius: <?php qualia_rempx(0.25); ?>;
	padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(3); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(4); ?>;
	min-height: <?php qualia_rempx(3); ?>;
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.vp-alert p,.vp-alert ul,.vp-alert ol {
	margin-bottom: 0;
}
.vp-alert .vp-alert-icon {
	font-size: <?php qualia_rempx(2); ?>;
	line-height: <?php qualia_rempx(2); ?>;
	margin: <?php qualia_rempx(0.9); ?> 0 0 <?php qualia_rempx(0.9); ?>;
	width: <?php qualia_rempx(2); ?>;
}
.vp-alert .vp-alert-close {
	margin: <?php qualia_rempx(1); ?> <?php qualia_rempx(0.5); ?> 0 0;
	width: <?php qualia_rempx(1.5); ?>;
}
.vp-alert a {
	color: <?php echo Qualia_Color::parse($color_black, 'hex'); ?>;
	color: <?php echo $color_black; ?>;
}
<?php foreach (array('normal', 'info', 'warning', 'success', 'error') as $value) :

	echo ".vp-alert-$value {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::set_lightness(${"color_$value"}, 0.85), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::set_lightness(${"color_$value"}, 0.85) . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse(Qualia_Color::set_lightness(${"color_$value"}, 0.75), 'hex') . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::set_lightness(${"color_$value"}, 0.75) . ";" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse(${"color_$value"}, 'hex') . ";" . "\n";
	echo "\t" . "color: ${"color_$value"};" . "\n";
	echo "}" . "\n";

	echo ".vp-alert-$value a:hover, .vp-alert-$value a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse(${"color_$value"}, 'hex') . ";" . "\n";
	echo "\t" . "color: ${"color_$value"};" . "\n";
	echo "}" . "\n";

endforeach; ?>
/* Button */
.vp-button,[type="submit"],.nav .menu li.menu-button > a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
	box-shadow: inset 0 <?php qualia_rempx(-0.2); ?> rgba(0,0,0,0.1), 0 <?php qualia_rempx(0.125); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.1);
	font-family: <?php echo $font_face['button']; ?>;
	font-style: <?php echo $font_style['button']; ?>;
	font-weight: <?php echo $font_weight['button']; ?>;
	text-transform: <?php echo $text_transform['button']; ?>;
	font-size: <?php echo $font_size['button']; ?>px;
	letter-spacing: <?php echo $letter_spacing['button']; ?>px;
	line-height: <?php echo $line_height['button']; ?>px;
	min-height: <?php echo $line_height['button'] + (2 * 0.4 * $font_size['body']); ?>px;
	min-height: <?php echo $line_height['button']; ?>px\0/; /* IE8 fix */
}
.vp-button.vp-button-medium,[type="submit"].vp-button-medium,.nav .menu li.menu-button.vp-button-medium > a {
	font-size: <?php echo 1.2 * $font_size['button']; ?>px;
	line-height: <?php echo 1.1 * $line_height['button']; ?>px;
	padding: <?php qualia_rempx(0.7); ?> <?php qualia_rempx(1.4); ?>;
	min-height: <?php echo 1.1 * $line_height['button'] + (2 * 0.7 * $font_size['body']); ?>px;
	min-height: <?php echo 1.1 * $line_height['button']; ?>px\0/; /* IE8 fix */
}
.vp-button.vp-button-large,[type="submit"].vp-button-large,.nav .menu li.menu-button.vp-button-large > a {
	font-size: <?php echo 1.3 * $font_size['button']; ?>px;
	line-height: <?php echo 1.2 * $line_height['button']; ?>px;
	padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(2); ?>;
	min-height: <?php echo 1.2 * $line_height['button'] + (2 * 1 * $font_size['body']); ?>px;
	min-height: <?php echo 1.2 * $line_height['button']; ?>px\0/; /* IE8 fix */
}
.vp-button.vp-mode-outline,[type="submit"].vp-mode-outline,.nav .menu li.menu-button.vp-mode-outline > a {
	padding: <?php echo 0.4 * $font_size['body'] - 2; ?>px <?php qualia_rempx(1); ?>;
}
.vp-button.vp-mode-outline.vp-button-medium, [type="submit"].vp-mode-outline.vp-button-medium, .nav .menu li.menu-button.vp-mode-outline.vp-button-medium > a {
	padding: <?php echo 0.7 * $font_size['body'] - 2; ?>px <?php qualia_rempx(1.4); ?>;
}
.vp-button.vp-mode-outline.vp-button-large, [type="submit"].vp-mode-outline.vp-button-large, .nav .menu li.menu-button.vp-mode-outline.vp-button-large > a {
	padding: <?php echo 1 * $font_size['body'] - 2; ?>px <?php qualia_rempx(2); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-button,[type=\"submit\"],.nav .menu li.menu-button > a,";
	echo ".color-palette-$j .vp-button,.color-palette-$j [type=\"submit\"],.color-palette-$j .nav .menu li.menu-button > a,";
	echo ".vp-box.color-palette-$j .vp-button,.vp-box.color-palette-$j [type=\"submit\"],.vp-box.color-palette-$j .nav .menu li.menu-button > a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_strong[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".nav .menu li.menu-button > a:hover,.nav .menu li.menu-button > a:focus,";
	echo ".color-palette-$j .nav .menu li.menu-button > a:hover,.color-palette-$j .nav .menu li.menu-button > a:focus,";
	echo ".vp-box.color-palette-$j .nav .menu li.menu-button > a:hover,.vp-box.color-palette-$j .nav .menu li.menu-button > a:focus {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Dropcap */
.vp-dropcap {
	font-size: <?php echo 3 * $line_height['body']; ?>px;
	line-height: <?php echo 3 * $line_height['body']; ?>px;
	margin: 0 <?php qualia_rempx(0.8); ?> 0 <?php qualia_rempx(0.2); ?>;
}
/* Font Awesome */
/* Highlight */
/* Icon List */
.vp-icon-list.vp-mode-separated .vp-icon-list-item,.vp-icon-list.vp-mode-separated-with-border .vp-icon-list-item {
	padding-top: <?php qualia_rempx(0.75); ?>;
	padding-bottom: <?php qualia_rempx(0.75); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".vp-icon-list.vp-mode-separated-with-border .vp-icon-list-item,";
	echo ".color-palette-$j .vp-icon-list.vp-mode-separated-with-border .vp-icon-list-item,";
	echo ".vp-box.color-palette-$j .vp-icon-list.vp-mode-separated-with-border .vp-icon-list-item {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Shout & Meta */
.vp-shout {
	font-family: <?php echo $font_face['body']; ?>;
	font-size: <?php qualia_rempx(1.4); ?>;
	line-height: <?php echo 1.2 * $line_height['body']; ?>px;
}
.vp-meta {
	font-family: <?php echo $font_face['body']; ?>;
	font-size: <?php qualia_rempx(0.85); ?>;
	line-height: <?php echo 0.85 * $line_height['body']; ?>px;
}
/* Shout */
/**
 * Plugin
 * =============================================================
 */
/* Font Awesome */
.fa-1x {
	font-size: <?php qualia_rempx(1); ?>;
}
.fa-2x {
	font-size: <?php qualia_rempx(2); ?>;
}
.fa-3x {
	font-size: <?php qualia_rempx(3); ?>;
}
.fa-4x {
	font-size: <?php qualia_rempx(4); ?>;
}
.fa-5x {
	font-size: <?php qualia_rempx(5); ?>;
}
/* Media Element */
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".mejs-container .mejs-controls .mejs-time-rail .mejs-time-loaded,";
	echo ".color-palette-$j .mejs-container .mejs-controls .mejs-time-rail .mejs-time-loaded,";
	echo ".vp-box.color-palette-$j .mejs-container .mejs-controls .mejs-time-rail .mejs-time-loaded {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_white, 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: $color_white !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".mejs-container .mejs-controls .mejs-time-rail .mejs-time-current,";
	echo ".color-palette-$j .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current,";
	echo ".vp-box.color-palette-$j .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: $color_accent[$j] !important;" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Mono Social Icons */
a.socmed:before {
	margin-right: <?php qualia_rempx(0.3); ?>;
}
/* WP Pagenavi */
.wp-pagenavi > * {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(0.6); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".wp-pagenavi a,.wp-pagenavi span,";
	echo ".color-palette-$j .wp-pagenavi a,.color-palette-$j .wp-pagenavi span,";
	echo ".vp-box.color-palette-$j .wp-pagenavi a,.vp-box.color-palette-$j .wp-pagenavi span {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".wp-pagenavi .pages,";
	echo ".color-palette-$j .wp-pagenavi .pages,";
	echo ".vp-box.color-palette-$j .wp-pagenavi .pages {" . "\n";
	echo "\t" . "color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_text[$j], 'hex'), -0.5) . ";" . "\n";
	echo "\t" . "color: " . Qualia_Color::percentage_alpha($color_text[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".wp-pagenavi .current,";
	echo ".color-palette-$j .wp-pagenavi .current,";
	echo ".vp-box.color-palette-$j .wp-pagenavi .current {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* WP PageNavi */
.wp-pagenavi > * {
	border-radius: expression(this.nextSibling == null ? '0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> 0' : '0');
}
.wp-pagenavi > *:first-child {
	border-radius: <?php qualia_rempx(0.25); ?> 0 0 <?php qualia_rempx(0.25); ?>;
}
.wp-pagenavi > *:last-child {
	border-radius: 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> 0;
}
/* Flexslider */
.flexslider .flex-control-paging li a {
	width: <?php qualia_rempx(1); ?>;
	height: <?php qualia_rempx(1); ?>;
	margin: 0 <?php qualia_rempx(0.25); ?>;
}
.flexslider .flex-direction-nav .flex-next {
	margin-right: <?php qualia_rempx(0.5); ?>;
}
.flexslider .flex-direction-nav .flex-prev {
	margin-left: <?php qualia_rempx(0.5); ?>;
}
.flexslider .flex-direction-nav a {
	height: <?php qualia_rempx(3); ?>;
	width: <?php qualia_rempx(3); ?>;
	padding: <?php qualia_rempx(0.8); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
	margin: <?php qualia_rempx(-1.5); ?>;
}
.flexslider .flex-direction-nav a:before {
	width: <?php qualia_rempx(1.4); ?>;
	font-size: <?php qualia_rempx(1.4); ?>;
	line-height: <?php qualia_rempx(1.4); ?>;
}
.flexslider .flex-control-nav {
	margin-bottom: <?php qualia_rempx(0.5); ?>;
}
.flexslider .flex-control-thumbs {
	margin: 0 -<?php qualia_rempx(0.25); ?>;
}
.flexslider .flex-control-thumbs li {
	padding: <?php qualia_rempx(0.25); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".flexslider .flex-control-paging li a,";
	echo ".color-palette-$j .flexslider .flex-control-paging li a,";
	echo ".vp-box.color-palette-$j .flexslider .flex-control-paging li a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".flexslider .flex-control-paging li a.flex-active,";
	echo ".color-palette-$j .flexslider .flex-control-paging li a.flex-active,";
	echo ".vp-box.color-palette-$j .flexslider .flex-control-paging li a.flex-active {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_white, 'hex'), -0.25) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_white, -0.25) . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".flexslider .flex-direction-nav a,";
	echo ".color-palette-$j .flexslider .flex-direction-nav a,";
	echo ".vp-box.color-palette-$j .flexslider .flex-direction-nav a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Revolution Slider */
.rev_slider_wrapper .tp-bullets.simplebullets .bullet {
	width: <?php qualia_rempx(1); ?>;
	height: <?php qualia_rempx(1); ?>;
	margin: 0 <?php qualia_rempx(0.25); ?>;
}
.rev_slider_wrapper .tp-bullets.tp-thumbs .bullet img {
	margin: 0 <?php qualia_rempx(0.25); ?>;
}
.rev_slider_wrapper .tparrows {
	height: <?php qualia_rempx(3); ?>;
	width: <?php qualia_rempx(3); ?>;
	padding: <?php qualia_rempx(0.8); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.rev_slider_wrapper .tparrows:before {
	width: <?php qualia_rempx(1.4); ?>;
	font-size: <?php qualia_rempx(1.4); ?>;
	line-height: <?php qualia_rempx(1.4); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".rev_slider_wrapper .tp-bullets.simplebullets .bullet,";
	echo ".color-palette-$j .rev_slider_wrapper .tp-bullets.simplebullets .bullet,";
	echo ".vp-box.color-palette-$j .rev_slider_wrapper .tp-bullets.simplebullets .bullet {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".rev_slider_wrapper .tp-bullets.simplebullets .bullet.selected,";
	echo ".color-palette-$j .rev_slider_wrapper .tp-bullets.simplebullets .bullet.selected,";
	echo ".vp-box.color-palette-$j .rev_slider_wrapper .tp-bullets.simplebullets .bullet.selected {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_white, 'hex'), -0.25) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_white, -0.25) . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".rev_slider_wrapper .tparrows,";
	echo ".color-palette-$j .rev_slider_wrapper .tparrows,";
	echo ".vp-box.color-palette-$j .rev_slider_wrapper .tparrows {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha(Qualia_Color::parse($color_black, 'hex'), -0.1) . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_black, -0.1) . ";" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Swipe Slider Navigation */
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".swiper-left, .swiper-right,";
	echo ".color-palette-$j .swiper-left, .color-palette-$j .swiper-right,";
	echo ".vp-box.color-palette-$j .swiper-left, .vp-box.color-palette-$j .swiper-right {" . "\n";
	echo "\t" . "background-color: $color_accent[$j]" . "\n";
	echo "}" . "\n";

endfor; ?>

/* WooCommerce */
.woocommerce .customer_details dd {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.woocommerce .login input[id="rememberme"] {
	margin-left: <?php qualia_rempx(1); ?>;
}
.header-cart-link {
	padding-left: <?php qualia_rempx(4); ?> !important;
}
.header-cart-link .cart-icon {
	font-size: <?php qualia_rempx(0.9); ?>;
	height: <?php qualia_rempx(1.8); ?>;
	width: <?php qualia_rempx(1.8); ?>;
	line-height: <?php echo 1.8 * $font_size['body'] - 4; ?>px;
	margin: <?php qualia_rempx(-0.9); ?> 0 0 <?php qualia_rempx(1.75); ?>;
}
.csstransforms .header-cart-link .cart-icon {
	font-size: <?php qualia_rempx(1.5); ?>;
	height: <?php qualia_rempx(3); ?>;
	width: <?php qualia_rempx(3); ?>;
	line-height: <?php echo 3 * $font_size['body'] - 6; ?>px;
	margin: <?php qualia_rempx(-1.5); ?> 0 0 <?php qualia_rempx(1); ?>;
}
.header-cart-link .cart-icon b {
	width: <?php qualia_rempx(0.9); ?>;
	height: <?php qualia_rempx(0.45); ?>;
	margin-left: <?php qualia_rempx(-0.45); ?>;
}
.csstransforms .header-cart-link .cart-icon b {
	width: <?php qualia_rempx(1.5); ?>;
	height: <?php qualia_rempx(0.75); ?>;
	margin-left: <?php qualia_rempx(-0.75); ?>;
}
.header-cart {
	width: <?php qualia_rempx(20); ?>;
}
.header-search {
	width: <?php qualia_rempx(20); ?>;
}
.header-cart .cart-list {
	margin-top: <?php qualia_rempx(-1); ?> !important;
}
.product .price del {
	font-size: <?php qualia_rempx(1); ?>;
}
.product-archive .page-description {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.product-archive .woocommerce-before-loop {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.products {
	margin-left: <?php qualia_rempx(-0.75); ?>;
	margin-right: <?php qualia_rempx(-0.75); ?>;
}
.products .product {
	padding: 0 <?php qualia_rempx(0.75); ?>;
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.products .product .price {
	font-size: <?php qualia_rempx(1.5); ?>;
}
.products .product .price del {
	font-size: <?php qualia_rempx(1); ?>;
}
.products .product .price .call-for-price {
	font-size: <?php qualia_rempx(1.25); ?>;
}
.products .product h5 {
	margin: <?php qualia_rempx(0.5); ?> 0 0;
}
.products .product .product-image .actions {
	margin-bottom: <?php qualia_rempx(-3); ?>;
}
.products .product.product-category .product-image .actions {
	margin-bottom: <?php qualia_rempx(1.5); ?> !important;
	padding: <?php qualia_rempx(1); ?>;
}
.products .product.product-category .product-image .actions h4 {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
}
.products .product .product-image .actions .add-to-cart > a {
	padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(3); ?>;
	line-height: <?php qualia_rempx(1); ?>;
}
.products .product .product-image .actions .add-to-cart > i {
	padding: <?php qualia_rempx(0.5); ?> 0;
	font-size: <?php qualia_rempx(2); ?>;
}
.products .product .product-image .actions .add-to-cart a.added:after {
	width: <?php qualia_rempx(3); ?>;
	font-size: <?php qualia_rempx(2); ?>;
}
.products .product .product-image .actions .add-to-cart i {
	margin-right: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .images {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.product-single .product .images.mode-default li {
	margin-bottom: <?php qualia_rempx(2); ?>;
}
.product-single .product .images .woocommerce-main-image {
	margin-bottom: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .images .thumbnails {
	margin-left: <?php qualia_rempx(-0.25); ?>;
	margin-right: <?php qualia_rempx(-0.25); ?>;
}
.product-single .product .images .thumbnails .zoom {
	padding-left: <?php qualia_rempx(0.25); ?>;
	padding-right: <?php qualia_rempx(0.25); ?>;
	margin-bottom: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .product-summary {
	padding-left: <?php qualia_rempx(1.5); ?>;
}
.product-single .product .product-summary .price {
	font-size: <?php qualia_rempx(2); ?>;
	line-height: <?php qualia_rempx(2); ?>;
}
.product-single .product .price {
	margin-right: <?php qualia_rempx(1); ?>;
}
.product-single .product .woocommerce-product-rating .star-rating {
	font-size: <?php qualia_rempx(1.2); ?>;
	line-height: <?php qualia_rempx(1.2); ?>;
	height: <?php qualia_rempx(1.2); ?>;
}
.product-single .product .woocommerce-product-rating .woocommerce-review-link {
	margin-left: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .product-short-description {
	margin-top: <?php qualia_rempx(1); ?>;
}
.product-single .product .cart,.product-single .product .product-information,.product-single .product .product_meta {
	margin-top: <?php qualia_rempx(2); ?>;
}
.product-single .product .cart .quantity,.shopping-cart .quantity {
	margin-right: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .cart .quantity .minus,.shopping-cart .quantity .minus {
	border-radius: <?php qualia_rempx(0.25); ?> 0 0 <?php qualia_rempx(0.25); ?>;
}
.product-single .product .cart .quantity .plus,.shopping-cart .quantity .plus {
	border-radius: 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> 0;
}
.product-single .product .cart .variations {
	margin: 0 0 <?php qualia_rempx(1); ?>;
}
.product-single .product .cart .variations .label {
	padding: <?php qualia_rempx(0.25); ?> <?php qualia_rempx(1.5); ?> 0 0;
}
.product-single .product .cart .single_variation_wrap .single_variation {
	margin-right: <?php qualia_rempx(1); ?>;
}
.product-single .product .cart .variations li .value .reset-variations {
	margin-left: <?php qualia_rempx(0.5); ?>;
}
.product-single .product .related,.product-single .product .product-upsells {
	margin-top: <?php qualia_rempx(3); ?>;
}
.product-single .reviews-list li {
	padding-left: <?php qualia_rempx(4); ?>;
	margin-bottom: <?php qualia_rempx(1.5); ?>;
}
.product-single .reviews-list li .gravatar {
	width: <?php qualia_rempx(3); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.product-single .reviews-list li .gravatar img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.product-single .reviews-list li .star-rating {
	margin-top: <?php qualia_rempx(0.25); ?>;
}
.product-single .reviews-list li h6,.product-single .reviews-list li p {
	margin: 0 0 <?php qualia_rempx(0.5); ?>;
}
.product-single .reviews-respond .stars {
	font-size: <?php qualia_rempx(1.25); ?>;
	margin: <?php qualia_rempx(0.25); ?> 0 0 <?php qualia_rempx(1); ?> !important;
}
.shopping-cart .cross-sells {
	margin-top: <?php qualia_rempx(4); ?>;
}
.shopping-cart .cart-shipping-and-totals {
	margin-top: <?php qualia_rempx(3); ?>;
}
.shopping-cart .cart-table tr .product-thumbnail a {
	width: <?php qualia_rempx(5); ?>;
}
.shopping-cart .cart-totals tr th {
	padding: 0 <?php qualia_rempx(0.5); ?> <?php qualia_rempx(0.75); ?> 0;
}
.shopping-cart .cart-totals tr td {
	padding: 0 0 <?php qualia_rempx(0.75); ?> <?php qualia_rempx(0.5); ?>;
}
.shopping-cart .cart-totals .order-total th,.shopping-cart .cart-totals .order-total td {
	padding-top: <?php qualia_rempx(0.75); ?>;
}
.my-account-not-logged-in .login input[type="submit"] {
	margin-right: <?php qualia_rempx(1.5); ?>;
}
.my-account .my-account-menus .profile {
	padding: <?php qualia_rempx(1); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(2); ?> <?php qualia_rempx(6); ?>;
	min-height: <?php qualia_rempx(7); ?>;
}
.my-account .my-account-menus .profile .gravatar {
	margin: <?php qualia_rempx(1); ?> 0 0 <?php qualia_rempx(1); ?>;
	width: <?php qualia_rempx(4); ?>;
	height: <?php qualia_rempx(4); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.my-account .my-account-menus .profile .gravatar img {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.order-checkout .checkout_coupon,.order-checkout .login {
	margin-top: <?php qualia_rempx(1); ?>;
}
.order-checkout .login .input-text {
	max-width: <?php qualia_rempx(25); ?>;
}
.order-checkout .payment-methods li {
	margin-bottom: <?php qualia_rempx(0.5); ?>;
}
.order-checkout .payment-methods li > input {
	margin: 0 <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1); ?> 0;
}
.order-checkout .payment-methods li > div {
	padding-bottom: <?php qualia_rempx(1); ?>;
}
.order-checkout .payment-methods li > label > img {
	margin-left: <?php qualia_rempx(0.5); ?>
}
.order-checkout #payment {
	margin-top: <?php qualia_rempx(2); ?>;
}
.order-tracking .notes li {
	margin: <?php qualia_rempx(1); ?>;
}
.widget.woocommerce .product_list_widget {
	margin: <?php qualia_rempx(2); ?> 0;
}
.widget.woocommerce .product_list_widget li {
	padding-left: <?php qualia_rempx(5); ?>;
	min-height: <?php qualia_rempx(4); ?>;
	margin: <?php qualia_rempx(1); ?> 0;
}
.widget.woocommerce .product_list_widget li a img {
	max-height: <?php qualia_rempx(4); ?>;
	max-width: <?php qualia_rempx(4); ?>;
	border-radius: <?php qualia_rempx(0.25); ?>;
}
.widget.woocommerce .product_list_widget li del {
	font-size: <?php qualia_rempx(0.8); ?>;
}
.widget_shopping_cart * {
	line-height: <?php echo $line_height['body']; ?>px;
}
.widget_shopping_cart .cart-list {
	margin-bottom: <?php qualia_rempx(1); ?> !important;
}
.widget_shopping_cart .variation {
	margin-right: <?php qualia_rempx(0.25); ?>;
	padding-right: <?php qualia_rempx(0.75); ?>;
}
.widget_shopping_cart .total {
	padding: <?php qualia_rempx(0.5); ?> <?php qualia_rempx(1); ?>;
}
.widget_price_filter .price_slider {
	height: <?php qualia_rempx(0.8); ?>;
	border-radius: <?php qualia_rempx(0.5); ?>;
	margin: <?php qualia_rempx(2); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(1.5); ?>;
}
.widget_price_filter .price_slider .ui-slider-range {
	height: <?php qualia_rempx(0.8); ?>;
	border-radius: <?php qualia_rempx(0.5); ?>;
}
.widget_price_filter .price_slider .ui-slider-handle {
	height: <?php qualia_rempx(1.5); ?>;
	width: <?php qualia_rempx(1.5); ?>;
	margin-top: <?php qualia_rempx(-0.35); ?>;
	margin-left: <?php qualia_rempx(-0.75); ?>;
}
.widget_price_filter .price_label {
	padding: <?php qualia_rempx(0.25); ?> 0;
}
.widget_product_categories > ul {
	padding-bottom: <?php qualia_rempx(0.5); ?>;
}
.widget_product_categories li {
	margin-top: <?php qualia_rempx(0.5); ?>;
	padding: <?php qualia_rempx(0.5); ?> 0 0 <?php qualia_rempx(2.142857142857143); ?>;
}
.widget_product_categories li:before {
	width: <?php qualia_rempx(2.142857142857143); ?>;
}
.widget_product_search form {
	padding-right: <?php qualia_rempx(6); ?>;
}
.widget_product_tag_cloud .tagcloud a {
	border-radius: <?php qualia_rempx(0.25); ?>;
	font-size: <?php qualia_rempx(0.85); ?> !important;
	margin: 0 <?php qualia_rempx(0.3); ?> <?php qualia_rempx(0.5); ?> 0;
	padding: <?php qualia_rempx(0.2); ?> <?php qualia_rempx(0.5); ?>;
}
.widget_recent_reviews .star-rating,.widget_top_rated_products .star-rating {
	margin-right: <?php qualia_rempx(0.75); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".header-cart-link .cart-icon,";
	echo ".color-palette-$j .header-cart-link .cart-icon {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_strong[$j] !important;" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "border-color: $color_strong[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".header-cart-link .cart-icon b,";
	echo ".color-palette-$j .header-cart-link .cart-icon b {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".star-rating,";
	echo ".color-palette-$j .star-rating,";
	echo ".vp-box.color-palette-$j .star-rating {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".star-rating span,";
	echo ".color-palette-$j .star-rating span,";
	echo ".vp-box.color-palette-$j .star-rating span {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product .ribbon span,";
	echo ".color-palette-$j .product .ribbon span,";
	echo ".vp-box.color-palette-$j .product .ribbon span {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -moz-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -o-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: -ms-linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "\t" . "background-image: linear-gradient(top, rgba(255,255,255,0.1), rgba(255,255,255,0));" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product .price del,";
	echo ".color-palette-$j .product .price del,";
	echo ".vp-box.color-palette-$j .product .price del {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product .price,";
	echo ".color-palette-$j .product .price,";
	echo ".vp-box.color-palette-$j .product .price {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".products .product .product-image .actions,";
	echo ".color-palette-$j .products .product .product-image .actions,";
	echo ".vp-box.color-palette-$j .products .product .product-image .actions {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_black, -0.2), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_black, -0.2) . ";" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".products .product.product-category .product-image .actions h4,";
	echo ".color-palette-$j .products .product.product-category .product-image .actions h4,";
	echo ".vp-box.color-palette-$j .products .product.product-category .product-image .actions h4 {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".products .product .product-image .actions .add-to-cart a,";
	echo ".color-palette-$j .products .product .product-image .actions .add-to-cart a,";
	echo ".vp-box.color-palette-$j .products .product .product-image .actions .add-to-cart a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".products .product .product-image .actions .add-to-cart .icon-added,";
	echo ".color-palette-$j .products .product .product-image .actions .add-to-cart .icon-added,";
	echo ".vp-box.color-palette-$j .products .product .product-image .actions .add-to-cart .icon-added {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".products .product .product-image .actions .add-to-cart .icon-loading,";
	echo ".color-palette-$j .products .product .product-image .actions .add-to-cart .icon-loading,";
	echo ".vp-box.color-palette-$j .products .product .product-image .actions .add-to-cart .icon-loading {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_white, 'hex') . ";" . "\n";
	echo "\t" . "color: $color_white;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product .ribbon span:before,.product .ribbon span:after,";
	echo ".color-palette-$j .product .ribbon span:before,.color-palette-$j .product .ribbon span:after,";
	echo ".vp-box.color-palette-$j .product .ribbon span:before,.vp-box.color-palette-$j .product .ribbon span:after {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_lightness($color_accent[$j], -0.2), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_lightness($color_accent[$j], -0.2) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product-single .reviews-respond,";
	echo ".color-palette-$j .product-single .reviews-respond {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product-single .reviews-respond .stars > span,";
	echo ".color-palette-$j .product-single .reviews-respond .stars > span {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_subtle[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product-single .reviews-respond .stars a.active,";
	echo ".color-palette-$j .product-single .reviews-respond .stars a.active {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_text[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".product-single .reviews-respond .stars a,";
	echo ".color-palette-$j .product-single .reviews-respond .stars a {" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "color: $color_strong[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".shopping-cart .cart tfoot th,";
	echo ".color-palette-$j .shopping-cart .cart tfoot th {";
	echo "\t" . "background-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".order-checkout .shop_table tbody th,";
	echo ".color-palette-$j .order-checkout .shop_table tbody th {";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".order-checkout .shop_table tfoot th,.order-checkout .shop_table tfoot td,";
	echo ".color-palette-$j .order-checkout .shop_table tfoot th,.color-palette-$j .order-checkout .shop_table tfoot td {";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".order-checkout .shop_table tfoot tr,";
	echo ".color-palette-$j .order-checkout .shop_table tfoot tr {";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".my-account .shop_table tbody th,";
	echo ".color-palette-$j .my-account .shop_table tbody th {";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".my-account .shop_table tfoot th,.my-account .shop_table tfoot td,";
	echo ".color-palette-$j .my-account .shop_table tfoot th,.color-palette-$j .my-account .shop_table tfoot td {";
	echo "\t" . "color: " . Qualia_Color::parse($color_text[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_text[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".my-account .shop_table tfoot tr,";
	echo ".color-palette-$j .my-account .shop_table tfoot tr {";
	echo "\t" . "border-top-color: " . Qualia_Color::parse(Qualia_Color::percentage_alpha($color_subtle[$j], -0.5), 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::percentage_alpha($color_subtle[$j], -0.5) . ";" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".shopping-cart .cart-totals th,";
	echo ".color-palette-$j .shopping-cart .cart-totals th {";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".shopping-cart .cart-totals .order-total,.shopping-cart .cart-totals .heading,";
	echo ".color-palette-$j .shopping-cart .cart-totals .order-total,.color-palette-$j .shopping-cart .cart-totals .heading {";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_shopping_cart .total,";
	echo ".color-palette-$j .widget_shopping_cart .total {";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_strong[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_strong[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_price_filter .price_slider,";
	echo ".color-palette-$j .widget_price_filter .price_slider {";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_price_filter .price_slider .ui-slider-range,";
	echo ".color-palette-$j .widget_price_filter .price_slider .ui-slider-range {";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_price_filter .price_slider .ui-slider-handle,";
	echo ".color-palette-$j .widget_price_filter .price_slider .ui-slider-handle {";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_price_filter .price_slider .ui-slider-handle,";
	echo ".color-palette-$j .widget_price_filter .price_slider .ui-slider-handle {";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_product_categories li,";
	echo ".color-palette-$j .widget_product_categories li,";
	echo ".vp-box.color-palette-$j .widget_product_categories li {" . "\n";
	echo "\t" . "border-top-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-top-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".widget_product_categories ul,";
	echo ".color-palette-$j .widget_product_categories ul,";
	echo ".vp-box.color-palette-$j .widget_product_categories ul {" . "\n";
	echo "\t" . "border-bottom-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-bottom-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";
	
	if ($j == 1) echo ".widget_product_tag_cloud .tagcloud a,";
	echo ".color-palette-$j .widget_product_tag_cloud .tagcloud a,";
	echo ".vp-box.color-palette-$j .widget_product_tag_cloud .tagcloud a {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_text[$j];" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* Chozen */
.chosen-container .chosen-single,.chosen-container .chosen-drop {
	border-radius: <?php qualia_rempx(0.25); ?>;
	font-family: <?php echo $font_face['button']; ?>;
	font-size: <?php echo $font_size['button']; ?>px;
	font-style: <?php echo $font_style['body']; ?>;
	font-weight: <?php echo $font_weight['body']; ?>;
	text-transform: <?php echo $text_transform['body']; ?>;
	letter-spacing: <?php echo $letter_spacing['body']; ?>px;
	line-height: <?php echo $line_height['button']; ?>px;
}
.chosen-container .chosen-single {
	border-radius: <?php qualia_rempx(0.25); ?>;
	box-shadow: 0 <?php qualia_rempx(0.125); ?> <?php qualia_rempx(0.25); ?> rgba(0,0,0,0.05);
	padding: <?php echo 0.4 * $font_size['body'] - 2; ?>px <?php qualia_rempx(2); ?> <?php echo 0.4 * $font_size['body'] - 2; ?>px <?php qualia_rempx(0.6); ?>;
	min-height: <?php echo $line_height['button'] + (2 * 0.4 * $font_size['body']); ?>px;
	min-height: <?php echo $line_height['button']; ?>px\0/; /* IE8 fix */
}
.chosen-container .chosen-single.chosen-single-with-drop {
	border-radius: <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?> 0 0;
}
.chosen-container .chosen-drop {
	border-radius: 0 0 <?php qualia_rempx(0.25); ?> <?php qualia_rempx(0.25); ?>;
}
.chosen-container .chosen-single span {
	line-height: <?php echo $line_height['button']; ?>px;
}
.chosen-container .chosen-single div {
	width: <?php qualia_rempx(2); ?>;	
}
.chosen-container .chosen-single div b:before {
	font-size: <?php qualia_rempx(1); ?>;	
}
.chosen-container .chosen-search input {
	border-radius: <?php qualia_rempx(0.25); ?>;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".chosen-container .chosen-single,.chosen-container .chosen-drop,.chosen-container-single .chosen-search input,";
	echo ".color-palette-$j .chosen-container .chosen-single,.color-palette-$j .chosen-container .chosen-drop,.color-palette-$j .chosen-container-single .chosen-search input,";
	echo ".vp-box.color-palette-$j .chosen-container .chosen-single,.vp-box.color-palette-$j .chosen-container .chosen-drop,.vp-box.color-palette-$j .chosen-container-single .chosen-search input {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_base[$j];" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".chosen-container .chosen-results li:hover,.chosen-container .chosen-results li.result-selected,";
	echo ".color-palette-$j .chosen-container .chosen-results li:hover,.color-palette-$j .chosen-container .chosen-results li.result-selected,";
	echo ".vp-box.color-palette-$j .chosen-container .chosen-results li:hover,.vp-box.color-palette-$j .chosen-container .chosen-results li.result-selected {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_accent[$j], 'hex') . ";" . "\n";
	echo "\t" . "background-color: $color_accent[$j];" . "\n";
	echo "\t" . "color: " . Qualia_Color::parse($color_base[$j], 'hex') . ";" . "\n";
	echo "\t" . "color: $color_base[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
/* WPML */
.menu-item-language img.iclflag {
	margin: <?php qualia_rempx(-0.125); ?> <?php qualia_rempx(0.75); ?> 0 0 !important;
}
/* jPreloader */
<?php $one_page_preloader_color_set = qualia_option('one_page_preloader_color_set', 1); ?>
#jpreOverlay {
	background-color: <?php echo Qualia_Color::parse( $color_background[$one_page_preloader_color_set], 'hex' ); ?>;
	background-color: <?php echo $color_background[$one_page_preloader_color_set]; ?>;
}
#jpreBar {
	background-color: <?php echo Qualia_Color::parse( $color_accent[$one_page_preloader_color_set], 'hex' ); ?>;
	background-color: <?php echo $color_accent[$one_page_preloader_color_set]; ?>;
}
#jprePercentage {
	background-color: <?php echo Qualia_Color::parse( $color_subtle[$one_page_preloader_color_set], 'hex' ); ?>;
	background-color: <?php echo $color_subtle[$one_page_preloader_color_set]; ?>;
}
<?php echo $color_accent[qualia_option('one_page_preloader_color_set')]; ?>

<?php if (qualia_option('enable_responsive')) : ?>
/**
 * Media Queries
 * =============================================================
 */
/* Wide Screen */
@media (min-width: 1200px) {
.breakpoint-wide-screen .grids {
	margin-left: <?php qualia_rempx(-1); ?>;
	margin-right: <?php qualia_rempx(-1); ?>;
}
.breakpoint-wide-screen .grid-1,.grid-2,.grid-3,.grid-4,.grid-5,.grid-6,.grid-7,.grid-8,.grid-9,.grid-10,.grid-11,.grid-12 {
	float: left;
	padding: 0 <?php qualia_rempx(1); ?>;
	min-height: 1px;
}
.breakpoint-wide-screen .aside.left {
	padding-right: <?php qualia_rempx(2); ?>;
}
.breakpoint-wide-screen .aside.right {
	padding-left: <?php qualia_rempx(2); ?>;
}
.breakpoint-wide-screen .products .product {
	padding: 0 <?php qualia_rempx(1); ?>;
}
.breakpoint-wide-screen .products {
	margin-left: <?php qualia_rempx(-1); ?>;
	margin-right: <?php qualia_rempx(-1); ?>;
}
}
/* Tablet */
@media (min-width: 768px) and (max-width: 999px) {
.breakpoint-tablet .top-header-text,.breakpoint-tablet .top-header-nav,.breakpoint-tablet .top-header-social {
	margin: <?php qualia_rempx(0.25); ?> auto;
}
.breakpoint-tablet .header {
	min-height: <?php echo qualia_option('header_height'); ?>px;
}
.breakpoint-tablet .header.header-absolute + .section {
	margin-top: -<?php echo qualia_option('header_height'); ?>px;
}
.breakpoint-tablet .main-nav {
	margin-bottom: <?php qualia_rempx(3); ?>;
}
.breakpoint-tablet .nav .menu li.socmed a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.breakpoint-tablet .page-template-page-template-one-page-php .header {
	min-height: <?php echo qualia_option('one_page_header_height'); ?>px;
}
.breakpoint-tablet .page-template-page-template-one-page-php .header.header-absolute + .section {
	margin-top: -<?php echo qualia_option('one_page_header_height'); ?>px;
}
.breakpoint-tablet .nav .menu li {
	line-height: <?php echo $line_height['body']; ?>px !important;
}
.breakpoint-tablet .nav .menu .sub-menu a:before {
	padding-left: <?php qualia_rempx(2); ?>;
}
.breakpoint-tablet .nav .menu .sub-menu .sub-menu a:before {
	padding-left: <?php qualia_rempx(4); ?>;
}
.breakpoint-tablet .nav .menu .sub-menu .sub-menu .sub-menu a:before {
	padding-left: <?php qualia_rempx(6); ?>;
}
.breakpoint-tablet .nav .menu > ul > li.menu-mega > .sub-menu a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.breakpoint-tablet .nav .menu > ul > li.menu-mega > .sub-menu > li > a {
	padding-bottom: <?php qualia_rempx(0.4); ?>;
}
.breakpoint-tablet .header-search-toggle {
	margin-left: <?php qualia_rempx(1); ?>;
}
.breakpoint-tablet .copyright-text, .breakpoint-tablet .copyright-nav, .breakpoint-tablet .copyright-social {
	margin: <?php qualia_rempx(0.5); ?> auto;
}
.breakpoint-tablet .main,.breakpoint-tablet .aside {
	padding-bottom: <?php qualia_rempx(3); ?> !important;
}
.breakpoint-tablet .blog-archive.mode-default .post .post-image {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.breakpoint-tablet .blog-archive.mode-timeline {
	padding-top: <?php qualia_rempx(4); ?>;
}
.breakpoint-tablet .blog-archive.mode-timeline .post {
	margin-bottom: <?php qualia_rempx(4); ?>;
}
.breakpoint-tablet .vp-pricing-table .vp-pricing-column {
	margin-top: <?php qualia_rempx(2); ?>;
}
.breakpoint-tablet .vp-pricing-table .vp-pricing-column.vp-featured {
	padding: <?php qualia_rempx(2); ?>;
}
.breakpoint-tablet .vp-testimonial .vp-testimonial-photo {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.breakpoint-tablet .nav .menu > ul > li > a,.breakpoint-tablet .nav .menu li.menu-mega > ul > li > a {
	font-family: <?php echo $font_face['body']; ?>;
	font-size: <?php echo $font_size['body']; ?>px;
	font-style: <?php echo $font_style['body']; ?>;
	font-weight: <?php echo $font_weight['body']; ?>;
	text-transform: <?php echo $text_transform['body']; ?>;
	letter-spacing: <?php echo $letter_spacing['body']; ?>px;
	line-height: <?php echo $line_height['body']; ?>px;
}
.breakpoint-tablet .nav .menu li.menu-button > a {
	font-family: <?php echo $font_face['button']; ?>;
	font-style: <?php echo $font_style['button']; ?>;
	font-weight: <?php echo $font_weight['button']; ?>;
	text-transform: <?php echo $text_transform['button']; ?>;
	font-size: <?php echo $font_size['button']; ?>px;
	letter-spacing: <?php echo $letter_spacing['button']; ?>px;
	line-height: <?php echo $line_height['button']; ?>px;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".breakpoint-tablet .header,";
	echo ".breakpoint-tablet .color-palette-$j.header,";
	echo ".breakpoint-tablet .vp-box.color-palette-$j.header {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_background[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: $color_background[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".breakpoint-tablet .nav a,";
	echo ".breakpoint-tablet .color-palette-$j .nav a,";
	echo ".breakpoint-tablet .vp-box.color-palette-$j .nav a {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
}
/* Mobile */
@media (max-width: 767px) {
.breakpoint-mobile .top-header-text,.breakpoint-mobile .top-header-nav,.breakpoint-mobile .top-header-social {
	margin: <?php qualia_rempx(0.25); ?> auto;
}
.breakpoint-mobile .header {
	min-height: <?php echo qualia_option('header_height'); ?>px;
}
.breakpoint-mobile .header.header-absolute + .section {
	margin-top: -<?php echo qualia_option('header_height'); ?>px;
}
.breakpoint-mobile .page-template-page-template-one-page-php .header {
	min-height: <?php echo qualia_option('one_page_header_height'); ?>px;
}
.breakpoint-mobile .page-template-page-template-one-page-php .header.header-absolute + .section {
	margin-top: -<?php echo qualia_option('one_page_header_height'); ?>px;
}
.breakpoint-mobile .main-nav {
	margin-bottom: <?php qualia_rempx(3); ?>;
}
.breakpoint-mobile .nav .menu li.socmed a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.breakpoint-mobile .nav .menu li {
	line-height: <?php echo $line_height['body']; ?>px !important;
}
.breakpoint-mobile .nav .menu .sub-menu > li > a:before {
	padding-left: <?php qualia_rempx(2); ?>;
}
.breakpoint-mobile .nav .menu .sub-menu .sub-menu a:before {
	padding-left: <?php qualia_rempx(4); ?>;
}
.breakpoint-mobile .nav .menu .sub-menu .sub-menu .sub-menu a:before {
	padding-left: <?php qualia_rempx(6); ?>;
}
.breakpoint-mobile .nav .menu > ul > li.menu-mega > .sub-menu a {
	padding: <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?> <?php qualia_rempx(0.4); ?> <?php qualia_rempx(1); ?>;
}
.breakpoint-mobile .nav .menu > ul > li.menu-mega > .sub-menu > li > a {
	padding-bottom: <?php qualia_rempx(0.4); ?>;
}
.breakpoint-mobile .header-search-toggle {
	margin-left: <?php qualia_rempx(1); ?>;
}
.breakpoint-mobile .copyright-text, .breakpoint-mobile .copyright-nav, .breakpoint-mobile .copyright-social {
	margin: <?php qualia_rempx(0.5); ?> auto;
}
.breakpoint-mobile .main,.breakpoint-mobile .aside {
	padding-bottom: <?php qualia_rempx(3); ?> !important;
}
.breakpoint-mobile .blog-archive.mode-default .post .post-image {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.breakpoint-mobile .blog-archive.mode-timeline {
	padding-top: <?php qualia_rempx(4); ?>;
}
.breakpoint-mobile .blog-archive.mode-timeline .post {
	margin-bottom: <?php qualia_rempx(4); ?>;
}
.breakpoint-mobile .vp-pricing-table .vp-pricing-column {
	margin-top: <?php qualia_rempx(2); ?>;
}
.breakpoint-mobile .vp-pricing-table .vp-pricing-column.vp-featured {
	padding: <?php qualia_rempx(2); ?>;
}
.breakpoint-mobile .vp-testimonial .vp-testimonial-photo {
	margin-bottom: <?php qualia_rempx(1); ?>;
}
.breakpoint-mobile .nav .menu > ul > li > a,.breakpoint-mobile .nav .menu li.menu-mega > ul > li > a {
	font-family: <?php echo $font_face['body']; ?>;
	font-size: <?php echo $font_size['body']; ?>px;
	font-style: <?php echo $font_style['body']; ?>;
	font-weight: <?php echo $font_weight['body']; ?>;
	text-transform: <?php echo $text_transform['body']; ?>;
	letter-spacing: <?php echo $letter_spacing['body']; ?>px;
	line-height: <?php echo $line_height['body']; ?>px;
}
.breakpoint-mobile .nav .menu li.menu-button > a {
	font-family: <?php echo $font_face['button']; ?>;
	font-style: <?php echo $font_style['button']; ?>;
	font-weight: <?php echo $font_weight['button']; ?>;
	text-transform: <?php echo $text_transform['button']; ?>;
	font-size: <?php echo $font_size['button']; ?>px;
	letter-spacing: <?php echo $letter_spacing['button']; ?>px;
	line-height: <?php echo $line_height['button']; ?>px;
}
<?php for ($j = 1; $j <= $qualia_n_color_set; $j++) :

	if ($j == 1) echo ".breakpoint-mobile .header,";
	echo ".breakpoint-mobile .color-palette-$j.header,";
	echo ".breakpoint-mobile .vp-box.color-palette-$j.header {" . "\n";
	echo "\t" . "background-color: " . Qualia_Color::parse($color_background[$j], 'hex') . " !important;" . "\n";
	echo "\t" . "background-color: $color_background[$j] !important;" . "\n";
	echo "}" . "\n";

	if ($j == 1) echo ".breakpoint-mobile .nav a,";
	echo ".breakpoint-mobile .color-palette-$j .nav a,";
	echo ".breakpoint-mobile .vp-box.color-palette-$j .nav a {" . "\n";
	echo "\t" . "border-color: " . Qualia_Color::parse($color_subtle[$j], 'hex') . ";" . "\n";
	echo "\t" . "border-color: $color_subtle[$j];" . "\n";
	echo "}" . "\n";

endfor; ?>
.breakpoint-mobile .search-form .search-form-inner {
	padding-right: <?php qualia_rempx(4); ?>;
}
}
<?php endif; ?>