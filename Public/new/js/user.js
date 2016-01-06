$(document).ready(function() {
	/*我的申请隔行变色*/
	$(".per_work li").each(function(index, el) {
		var index=$(this).index();
		if(index%2==0){
			$(this).css("background-color","#fff");
		}
		else{
			$(this).css("background-color","#eee");
		}
	});	

	$("table tr").each(function(index, el) {
		var index=$(this).index();
		if(index%2==0){
			$(this).children().css("background-color","#fff");
		}
		else{
			$(this).children().css("background-color","#eee");
		}
	});


	/*我的申请tab切换*/
	$(".per_r_dal .normal a").click(function(event) {
		var index=$(this).index();
		$(this).addClass('cur').siblings('a').removeClass('cur');
		$(this).parent().next().children().eq(index).addClass('per_work_cur').siblings().removeClass('per_work_cur');
	});


});