<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/jquery_cmhello.js"></script>
	<?php if ( is_home() ){ ?>
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/jquery.cycle2.min.js"></script>
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/jquery.cycle2.center.min.js"></script>
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/home.js"></script>
	<?php } ?>
	<script type="text/javascript">HcmsLazyload("<?=bloginfo('template_url')?>/images/space.gif");</script>
	<!--[if IE 6]>
	<link href="<?php bloginfo('template_url'); ?>/ie6.css" rel="stylesheet" type="text/css" />
	<script src="http://letskillie6.googlecode.com/svn/trunk/letskillie6.zh_CN.pack.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/PNG.js"></script>
	<script>DD_belatedPNG.fix('.png_bg');</script>
	<![endif]-->
	<title><?php if (is_home() ) {?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } else {?><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> <?php } ?></title>
	<?php if (is_home())
	{
	$description = get_option('swt_description');
	$keywords = get_option('swt_keywords');
	}
	elseif (is_category())
	{
	$description = category_description();
	$keywords = single_cat_title('', false);
	}
	elseif (is_tag())
	{
	$description = tag_description();
    $keywords = single_tag_title('', false);
	}
	elseif (is_single())
	{
     if ($post->post_excerpt) {$description = $post->post_excerpt;}
	 else {$description = substr(strip_tags($post->post_content),0,240);}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
	}
	?>
	<meta name="keywords" content="<?php echo $keywords ?>" />
	<meta name="description" content="<?php echo $description?>" />
	<link rel="icon" type="image/x-icon" href="<?=get_stylesheet_directory_uri()?>/images/favicon.png"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?=get_stylesheet_directory_uri()?>/images/favicon.png"/>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body>
	<div id="header" class="png_bg">
		<div id="header_inner">
			<strong class="logo">
			<a href="<?php bloginfo('url'); ?>" class="png_bg" title="<?php bloginfo('name'); ?>"><img src="<?=bloginfo('template_url')?>/images/logo.png"></a>
			</strong>
			<div class="header_bg png_bg"></div>
			<div class="toplinks">
				<div id="toplinks">
					<div>
						<a href="<?=bloginfo('home')?>/wp-login.php" target="_blank"><?php _e("[:zh]登录[:en]login"); ?></a>
					</div>
					<div>
						<?=qtranxf_generateLanguageSelectCode('both', 'language_switcher')?>
					</div>
					<div>
						<a href="http://www.sysu.edu.cn/" target="_blank"><?php _e("[:zh]中山大学[:en]SYSU"); ?></a>
					</div>
				</div>
				<div id="top_nav">
					<form name="formsearch" method="get" action="<?php bloginfo('home'); ?>">
						<div class="form clearfix">
							<label for="s" ></label>
							<input type="text" name="s" class="search-keyword" placeholder="<?php _e("[:zh]请输入关键字进行搜索[:en]Search Keywords"); ?>" />
							<button type="submit" class="select_class" onmouseout="this.className='select_class'" onmouseover="this.className='select_over'" /><?php _e("[:zh]搜索[:en]search"); ?></button>
						</div>
					</form>
				</div>
			</div>
			<?php wp_nav_menu('container_id=navmenu'); ?>
			<div class="clearfix"></div>
		</div>
	</div>