<?php get_header(); ?>
	<div id="wrapper" class="clearfix">
		<div id="breadcrumbs" class="con_box clearfix">
			<div class="bcrumbs"><strong><a href="<?php bloginfo('home'); ?>" title="<?php _e('[:zh]回到首页[:en]Back to homepage'); ?>">home</a></strong>
				<a>
				<?php
					global $query_string;			// 获取查询字符串
					// s=keyword1+keyword2+...
					$queryArr = explode('=', $query_string);	// 分离变量名和参数
					$query_args = '';
					if(count($queryArr) > 1)
						$query_args = htmlentities(urldecode($queryArr[1]));		// url解码并过滤参数
					if($query_args != '')
						_e("[:zh]与 \"{$query_args}\" 有关的文章[:en]Posts about \"{$query_args}\"");
					else
						_e('[:zh]有关的文章[:en]Posts');
				?>
				</a>
			</div>
		</div><!-- //search -->
 		<div id="art_container clearfix">
 			<div id="art_main" class="fl">
				<?php include(TEMPLATEPATH . '/includes/title_list.php'); ?>
            </div><!--内容-->
		</div>
	</div>
<?php get_footer(); ?>