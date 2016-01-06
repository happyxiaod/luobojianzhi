$(document).ready(function() {
	$(".lend_txt textarea").val("请认真填写您要借贷分期的用途，便于您的申请尽快通过");
	$(".lend_txt textarea").click(function(event) {
		$(this).val("");
	});
	/*点击任意地方*/
	$('html,body').click(function(e){
        e = e || window.event;
        if ($(e.target).is($(".lend_txt textarea")))
        {
        	return;
        }
        else{
        	if($(".lend_txt textarea").val()=="")
        		$(".lend_txt textarea").val("请认真填写您要借贷分期的用途，便于您的申请尽快通过");
        }
    });

	//借款
    $(".lend_money li").click(function(event) {
    	var info=$(this);
    	selectInfo(info);
    });

    //分期
    $(".stages li").click(function(event) {
    	var info=$(this);
    	selectInfo(info);
    });

    function selectInfo(info){    	
    	if(info.attr("class")!=undefined&&info.attr("class")!=""){
	    	if(info.attr("class").indexOf("cur")>-1){
	    		info.removeClass('cur');
	    	}
	    }
	    else{
	    	info.addClass('cur').siblings().removeClass('cur');
	    }   
    }

});