//javascript Document
function chinaz(){
	this.init();
}
chinaz.prototype = {
	constructor: chinaz,
	init: function(){		
		this._initBackTop();
	},	
	_initBackTop: function(){
		var $backTop = this.$backTop = $('<div class="cbbfixed">'+
						'<a class="gotop cbbtn">'+
							'<span class="up-icon"></span>'+
						'</a>'+
						'<a class="kefu cbbtn"">'+
							'<span class="kefu-icon"></span><div></div>'+
						'</a>'+
						'<a class="yijian cbbtn"">'+
							'<span class="yijian-icon"></span><div></div>'+
						'</a>'+
						'<a class="cweixin cbbtn"">'+
							'<span class="weixin-icon"></span><div></div>'+
						'</a>'+
					'</div>');
		$('body').append($backTop);
		
		$backTop.click(function(){
			$("html, body").animate({
				scrollTop: 0
			}, 120);
		});

		var timmer = null;
		$(window).bind("scroll",function() {
            var d = $(document).scrollTop(),
            e = $(window).height();
//            0 < d ? $backTop.css("bottom", "10px") : $backTop.css("bottom", "-90px");
			clearTimeout(timmer);
			timmer = setTimeout(function() {
                clearTimeout(timmer)
            },100);
	   });
	}
	
}
var chinaz = new chinaz();