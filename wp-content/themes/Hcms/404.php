<?php get_header(); ?>

<div id="wrapper" class="clearfix">

	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php bloginfo('home'); ?>" title="<?php _e('[:zh]回到首页[:en]Back to homepage'); ?>">home</a></strong>
		<a>404</a>
		</div>
	</div>
 	<div id="art_container clearfix">
 		<div id="art_main1" class="art_white_bg fl">
            <div class="art_title clearfix">
				<h1><?php _e('[:zh]404 找不到该页面[:en]HTTP 404: Not Found'); ?></h1>
			</div>
			<div class="article_content">
							<strong><?php _e('[:zh]请继续你的操作：[:en]You can choose to:'); ?></strong>
							<p><a href="<?php bloginfo('home'); ?>"><?php _e('[:zh]返回首页[:en]Homepage'); ?></a></p>
							<p><a href="javascript:history.back();"><?php _e('[:zh]返回前一页[:en]Last viewed page'); ?></a></p>
			</div><!--正文-->
		</div><!--内容-->
	</div>
		<div class="clear"></div>
</div>

<?php get_footer(); ?>