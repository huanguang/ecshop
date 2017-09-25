$(document).ready(function(){
	var tabWidth = $('.tab_img').width();
	var tabUl = $('.tab_list');;
	var tabBtn = $('.tab_btn li');
	var tabSum = tabUl.find('li').length
	var time = 4000;                          // 自动滚动时间 
	var cc = setInterval(tabRight,time)
	var i = 0;
	$('.tab_left').click(function(){
		if( i == 0 ){i = tabSum ;}
		i--;
		addClass();
	});
	$('.tab_right').click(function(){
		tabRight()
	});
	function tabRight(){
		i++;
		if( i == tabSum ){ i = 0 ;}
		addClass();
	};
	tabBtn.mouseover(function(){
		i = tabBtn.index($(this));
		addClass();
	});
	function addClass(){
		clearInterval(cc)
		tabUl.stop().animate({'marginLeft':- tabWidth * i },200)
		tabBtn.removeClass('tab_btnIn').eq(i).addClass('tab_btnIn')
		cc = setInterval(tabRight,time);
	};
	
	$(".pro_time").each(function(){
		var year = $(this).attr("yyear");
		var month = $(this).attr("ymonth")-1;
		var day = $(this).attr("yday");
		var hour = $(this).attr("yhour");
		var minute = $(this).attr("yminute");
		var leaveTime = new Date(year,month,day,hour,minute).getTime() - new Date().getTime();
		
		var _timer = createTimer(leaveTime,$(this).find(".leaveTime"));
		setInterval(_timer,1000);
	});

});
$(function(){	
	$(window).scroll(function(){
		if($(window).scrollTop()>300){
			$(".float").fadeIn("slow");
		}else{
			$(".float").fadeOut("slow");
		}
	})
})
function _evt_go2Top(){$('html, body').animate({scrollTop: 0}, 200);};

function createTimer(leaveTime, $timer){
	if (leaveTime <= 0) return;
		
	leaveTime = Math.floor(leaveTime/1000);
		
	return function() {
		if(leaveTime < 0) return;
		var leaveDays = Math.floor(leaveTime/86400); //天
		var leaveHours = Math.floor((leaveTime/3600)%24); //时  
		var leaveMinutes = Math.floor(leaveTime/60%60); //分  
		var leaveSeconds = leaveTime%60; //秒
		
		leaveTime -= 1;
		$timer.html(leaveDays+"天"+leaveHours+"小时"+leaveMinutes+"分钟"+leaveSeconds+"秒");
	}
};

function addFavorite(title, url) {
		try {
			window.external.addFavorite(url, title);
		}
		catch (e) {
			try {
				window.sidebar.addPanel(title, url, "");
			}
			catch (e) {
				alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
			}
		}
}/*  |xGv00|385a45254c31dab00b3d23e37348a218 */