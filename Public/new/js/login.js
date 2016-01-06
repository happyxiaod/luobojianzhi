$(document).ready(function() {
	$(".input-chose span").click(function(event) {
		$(this).prev().trigger('click');
		var index=$(this).index();
		if (index==1) {
			index=0;
		} 
		else if(index==3){
			index=1;
		}
		else if(index==5){
			index=2;
		}
		$(this).parent().next().children().eq(index).addClass('cur').siblings().removeClass('cur');
	});

	$(".input-chose input").click(function(event) {
		var index=$(this).index();
		if (index==0) {
			index=0;
		} 
		else if(index==2){
			index=1;
		}
		else if(index==3){
			index=2;
		}
		$(this).parent().next().children().eq(index).addClass('cur').siblings().removeClass('cur');
	});
});