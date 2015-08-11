<!-- //底部模板 -->
<div id="footer" class="clearfix">
    <div id="links_bar">
		<a href="<?=get_category_link(get_cat_ID('信息资源'))?>"><?php _e("[:zh]信息资源[:en]Resources"); ?></a> |
        <a href="<?=get_category_link(get_cat_ID('联系我们'))?>"><?php _e("[:zh]联系我们[:en]Contact Us"); ?></a> |
        <a href="<?=get_category_link(get_cat_ID('表格下载'))?>"><?php _e("[:zh]表格下载[:en]Tables Download"); ?></a> |
		<strong><a href="javascript:void(0);"><?php _e("[:zh]更多链接[:en]Links"); ?></a></strong>
		<select>
			<option value="0"><?php _e('[:zh]校内导航[:en]Navigation'); ?></option>
			<option value="http://jwc.sysu.edu.cn"><?php _e('[:zh]教务处[:en]Dean\'s Office'); ?></option>
			<option value="http://xsc2000.sysu.edu.cn"><?php _e('[:zh]学生处[:en]Student Affair Office'); ?></option>
			<option value="http://library.sysu.edu.cn"><?php _e('[:zh]图书馆[:en]SYSU Libraries'); ?></option>
			<option value="http://admission.sysu.edu.cn"><?php _e('[:zh]招生办[:en]Admissions'); ?></option>
		</select>
		<select>
			<option value="0"><?php _e('[:zh]校外链接[:en]Others'); ?></option>
		</select>
		<select>
			<option value="0"><?php _e('[:zh]推荐网站[:en]Recommended'); ?></option>
			<option value="http://myspace.sysu.edu.cn"><?php _e('[:zh]5D空间[:en]5D Space'); ?></option>
			<option value="http://ceremony.sysu.edu.cn"><?php _e('[:zh]中山大学学位授予仪式[:en]Ceremony'); ?></option>
		</select>
    </div>
    <div id="footer_copyright">
		<p><?php _e("[:zh]2012 中山大学移动信息工程学院 版权所有[:en]2012 School of Mobile Information Engineering Copy Right"); ?></p>
		<p><?php _e("[:zh]地址：广东省珠海市唐家湾中山大学珠海校区行政楼五楼 中山大学移动信息工程学院[:en]Address: School of Mobile Information Engineering, 5th floor of Administrative Building, Sun Yet-sen University Zhuhai Campus Tang Jia Bay, Zhu Hai, Guang Dong."); ?></p>
		<p><?php _e("[:zh]E-mail：smiea@mail.sysu.edu.cn 电话/传真：(+86756) 3668567 邮编：519082[:en]E-mail：smiea@mail.sysu.edu.cn Tel/Fax：(+86756) 3668567 Post Code：519082"); ?></p>
    </div>
	<?php wp_footer(); ?>
</div>
</body>
</html>
