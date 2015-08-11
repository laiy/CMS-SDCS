// 底部下拉框链接跳转
$(document).ready(function(){
	$("#links_bar select").change(function(){
		if($(this).val() != "0")
		{
			window.open($(this).val());
			$(this).val(0);
		}
		return false;
	});
});

// menu
$(document).ready(function(){
	$("#navmenu ul li:has(ul)").hover(function() {
		$(this).children("a").css({color:"#fff","text-shadow":"1px 1px 1px rgb(0,0,0)"});
		if($(this).find("li").length > 0){
			$(this).children("ul").stop(true, true).slideDown(100);
		}
	},function() {
		$(this).children("a").css({color:"#FFFFFF","text-shadow":"none"});
		$(this).children("ul").stop(true, true).slideUp("fast");
	});
});

$(document).ready(function() {
	getsiteID = $('div.site_nav1, div.site_nav2').attr('id');
	$('div.site_nav dl a').each(function() {
		getNavClass = $(this).attr('class');
		if (getNavClass == getsiteID) {
			$('div.site_nav dl a').removeClass('cur');
			$(this).addClass('cur');
		}
	});

	// 鼠标在文章链接上时的动画效果
	$('div.hot_box a.title, div.index_art li a, ul.index_resourse_list a').hover(function(){
		$(this).stop(true, true);		// 消除冗余动画
		$(this).animate({paddingLeft: "20px"},300);
	},function(){
		$(this).animate({paddingLeft: "15px"},300);
	});

	//hotbox
	$("div.tip_trigger a.img").hover(function(){
		$(this).parent('div.tip_trigger').css({'background':'#e23a0a','z-index':'1000'});
		$('#h_coolsite .block').show();
		tip = $(this).siblings('.tip');
		tip.show();
	}, function() {
		$(this).parent('div.tip_trigger').css({'background':'none','z-index':'0'});
		$('#h_coolsite .block').hide();
		tip.hide();
	})
});

//set_avatar
$(document).ready(function(){
	$('#respond').hover(function() {
		$(this).find('.set_avatar').stop(true,true).fadeIn();
	},function() {
		$(this).find('.set_avatar').stop(true,true).fadeOut();
	});
});

//lazyload
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(5($){$.J.L=5(r){8 1={d:0,A:0,b:"h",v:"N",3:4};6(r){$.D(1,r)}8 m=9;6("h"==1.b){$(1.3).p("h",5(b){8 C=0;m.t(5(){6(!$.k(9,1)&&!$.l(9,1)){$(9).z("o")}j{6(C++>1.A){g B}}});8 w=$.M(m,5(f){g!f.e});m=$(w)})}g 9.t(5(){8 2=9;$(2).c("s",$(2).c("i"));6("h"!=1.b||$.k(2,1)||$.l(2,1)){6(1.u){$(2).c("i",1.u)}j{$(2).K("i")}2.e=B}j{2.e=x}$(2).T("o",5(){6(!9.e){$("<V />").p("X",5(){$(2).Y().c("i",$(2).c("s"))[1.v](1.Z);2.e=x}).c("i",$(2).c("s"))}});6("h"!=1.b){$(2).p(1.b,5(b){6(!2.e){$(2).z("o")}})}})};$.k=5(f,1){6(1.3===E||1.3===4){8 7=$(4).F()+$(4).O()}j{8 7=$(1.3).n().G+$(1.3).F()}g 7<=$(f).n().G-1.d};$.l=5(f,1){6(1.3===E||1.3===4){8 7=$(4).I()+$(4).U()}j{8 7=$(1.3).n().q+$(1.3).I()}g 7<=$(f).n().q-1.d};$.D($.P[\':\'],{"Q-H-7":"$.k(a, {d : 0, 3: 4})","R-H-7":"!$.k(a, {d : 0, 3: 4})","S-y-7":"$.l(a, {d : 0, 3: 4})","q-y-7":"!$.l(a, {d : 0, 3: 4})"})})(W);',62,62,'|settings|self|container|window|function|if|fold|var|this||event|attr|threshold|loaded|element|return|scroll|src|else|belowthefold|rightoffold|elements|offset|appear|bind|left|options|original|each|placeholder|effect|temp|true|of|trigger|failurelimit|false|counter|extend|undefined|height|top|the|width|fn|removeAttr|lazyload|grep|show|scrollTop|expr|below|above|right|one|scrollLeft|img|jQuery|load|hide|effectspeed'.split('|'),0,{}));
function HcmsLazyload(templateUrl) {
	if(window.XMLHttpRequest){
		$(function() {
			$("img").not("#respond_box img").lazyload({placeholder: templateUrl,effect: "fadeIn"});
		});
	}
}

/*
//tab
$(document).ready(function(){
	$('.com_cont:not(:first)').hide();
	$('#new_art').show();$("ul.sj_nav li a").click(function () {
		var content_show = $(this).attr("title");
		$("ul.sj_nav li a").removeClass("active");
		$(this).addClass("active");
		$('.com_cont').hide();
		$("#"+content_show).show();
		return false;
	});
});

//updown
jQuery(document).ready(function($) {
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
	$("#shang").mouseover(function() {
		up();
	}).mouseout(function() {
		clearTimeout(fq);
	}).click(function() {
		$body.animate({scrollTop: 0},400);
	});
	$("#xia").mouseover(function() {
		dn();
	}).mouseout(function() {
		clearTimeout(fq);
	}).click(function() {
		$body.animate({scrollTop: $(document).height()},400);
	});
	$("#comt").click(function() {
		$body.animate({scrollTop: $("#comments").offset().top},400);
	});
});

function up() {
	$wd = $(window);
	$wd.scrollTop($wd.scrollTop() - 1);
	fq = setTimeout("up()", 50);
};
function dn() {
	$wd = $(window);
	$wd.scrollTop($wd.scrollTop() + 1);
	fq = setTimeout("dn()", 50);
};
*/
