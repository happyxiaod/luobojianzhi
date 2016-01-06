$(document).ready(function() {

	/*首页轮播图*/
	var speed=5000;
	var $key=0;
	setInterval(autoPlay,speed);
	function autoPlay(){
		$key++;
		if($key==$(".index-job-t-l ul li").size()){
			$key=0;
		}
		$(".index-job-t-l ul li").eq($key).addClass('cur').siblings().removeClass('cur');
	}
});