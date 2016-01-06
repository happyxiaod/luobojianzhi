$(document).ready(function() {
	/*点击导航*/
	$("#header .nav li").click(function(event) {
		$(this).addClass('current').siblings().removeClass('current');
	});

	/*个人中心鼠标滑动下拉*/
	$(".header-nav .login-before .person").hover(function() {
		$(this).children('ul').stop().slideToggle();
	});

	/*下拉列表*/
	$(".input-group .glyphicon-triangle-bottom").click(function(event) {
		$(".dropdown-menu").stop().slideUp();
		$(this).next('ul').stop().slideToggle();
	});
	$(".spinner-content").click(function(event) {
		$(".dropdown-menu").stop().slideUp();
		$(this).next().next('ul').stop().slideToggle();
	});
	/*选中*/
	$(".dropdown-menu li").click(function(event) {
		$(this).parent().prev().prev().text($(this).html());
		$(this).parent().hide();
	});
	/*点击任意地方关闭下拉*/
	$('html,body').click(function(e){
        e = e || window.event;
        if ($(e.target).is($(".glyphicon-triangle-bottom"))||$(e.target).is($(".dropdown-menu li"))||$(e.target).is($(".spinner-content")))
        {
        	return;
        }
        else{
        	$(".dropdown-menu").stop().slideUp();
        }
    });
});