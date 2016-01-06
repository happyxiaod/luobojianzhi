$(document).ready(function() {
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