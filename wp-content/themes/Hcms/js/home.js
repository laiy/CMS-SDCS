$(document).ready(function() {
    // 首页图片滚动
    $('#slider') .cycle({
        fx: 'fade',
        //pager:'#slider_pager',
        speed:700,
        pause:true,
        prev:'#prev',
        next:'#next'
    });

    // 首页新闻滚动
    /*
    var scroller = $("#news_scroller");
    var isPause = false;

    scroller.hover(function(){
        isPause = true;     // 鼠标悬停时暂停
    },function(){
        isPause = false;    // 鼠标离开时继续
    });

    scroller.css("top", 0);
    scroller.css("position", "absolute");
    timer = setInterval(function(){
        if(isPause) return;
        var top = parseInt(scroller.css("top"));
        var firstNew = $("#news_scroller p").first();
        if(top != -parseInt(firstNew.outerHeight()))        // 当第一条完全消失的时候将其移到末尾并重置滚动位置
            scroller.css("top", top - 1 + "px");
        else {
            // 把第一条新闻放到最后，并重置滚动位置
            firstNew.remove();
            scroller.append(firstNew);
            scroller.css("top", 0);
        }
    }, 100);
    */
});