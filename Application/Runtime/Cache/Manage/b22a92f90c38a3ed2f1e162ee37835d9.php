<?php if (!defined('THINK_PATH')) exit();?><div class="col-md-3">
	<button name="name" class="btn btn-orange form-control mtop2"></button>
</div>
<div class="col-md-8">
	<table class="table text-center mtop1 table-bordered">
		<thead>
			<tr>
				<th class="text-center">职位</th>
				<th class="text-center">发布时间</th>
				<th class="text-center">薪资</th>
				<th class="text-center">招聘人数</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["level2"]); ?></td>
					<td><?php echo ($vo["date"]); ?></td>
					<td><?php echo ($vo["price"]); ?></td>
					<td><?php echo ($vo["number"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<!--分页-->
<div class="ablock" style="height:80px">
    <div style="float:right; margin-right: 50px;">
        <ul class="pagedivide">
            <li style="display: none;"><a href="javascript:" id="pageUpBtn"><<</a></li>
            <?php if(is_array($pagelist)): $i = 0; $__LIST__ = $pagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["value"] == $curtpage): ?><li>
                        <a href="javascript:" url="<?php echo ($vo["url"]); ?>" class="pageBtn" id="pageActiveBtn" value="<?php echo ($vo["value"]); ?>" style="color:red"><?php echo ($vo["value"]); ?></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="javascript:" url="<?php echo ($vo["url"]); ?>" class="pageBtn" value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["value"]); ?></a>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li style="display: none;"><a href="javascript:" id="pageNextBtn">>></a></li>
            <li style="display: none;">
                &nbsp;&nbsp;&nbsp;共<span id="pageAllNumber"></span>页&nbsp;&nbsp;跳转到第&nbsp;
                <input type="text" id="pageGoNumber" style="width: 30px; height: 100%; padding: 0; margin-top: -1px;"/>&nbsp;页
                &nbsp;<a href="javascript:" id="pageGoBtn">Go</a>
            </li>
        </ul>
    </div>
</div>
<script>
    var allNumber = 0;
    var activePage;
    var i;
    var j;
    $(document).ready(function () {
        //绑定分页点击事件
        $(".pageBtn").on('click', '', function (event) {
            event.preventDefault();
            url = $(this).attr("url");
            loadPage($(".load-table-page"), url);
        });

        //获取总分页页数
        $(".pageBtn").each(function(e) {
            val = $(this).attr("value");
            //console.log(val);
            if(val != "上一页" && val != "下一页") {
                allNumber++;
            }
        });
        //console.log(allNumber);

        //如果分页大于十页
        if(allNumber > 10) {
            //填写全部页数为多少
            $("#pageAllNumber").html(allNumber);

            //获取当前分页页数
            activePage = $("#pageActiveBtn").attr("value");
            activePage = Number(activePage);
            //console.log(activePage);

            //初始化i和j
            if(activePage%10 == 0) {
                i = activePage - 9;
                j = activePage;
            } else {
                number = activePage/10;
                number = parseInt(number);
                number *= 10;
                i = number + 1;
                j = number + 10;
            }
            //console.log(i);
            //console.log(j);

            //绑定上十页事件
            $("#pageUpBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage - 10;
                if(number < 1) {
                    number = 1;
                }
                url = $(".pageBtn[value='"+ number +"']").attr("url");
                loadPage($(".load-table-page"), url);
            });

            //绑定下十页事件
            $("#pageNextBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage + 10;
                if(number > allNumber) {
                    number = allNumber;
                }
                url = $(".pageBtn[value='"+ number +"']").attr("url");
                loadPage($(".load-table-page"), url);
            });

            //绑定Go按钮事件
            $("#pageGoBtn").on('click', '', function (event) {
                event.preventDefault();
                number = $("#pageGoNumber").val();
                if(number >= 1 && number <= allNumber) {
                    url = $(".pageBtn[value='"+ number +"']").attr("url");
                    loadPage($(".load-table-page"), url);
                } else {
                    alert("您输入的页数不存在！");
                }
            });

            //绑定在输入后按回车键事件
            $("#pageGoNumber").bind("keypress", function(event){
                if(event.keyCode == "13") {
                    event.preventDefault();
                    $("#pageGoBtn").click();
                }
            });

            //显示当前的十个分页
            showPageBtn();

            //显示上十页，下十页，和跳转到第几页
            $("#pageUpBtn, #pageNextBtn, #pageGoBtn").parent().show();
        }
    });

    //显示当前的十个分页
    function showPageBtn() {
        //console.log(i);
        //console.log(j);
        $(".pageBtn").each(function(e) {
            number = $(this).attr("value");
            if(number == "上一页" || number == "下一页") {
                return true;
            }
            if(number >= i && number <= j) {
                $(this).parent().show();
            } else {
                $(this).parent().hide();
            }
        });
    }
</script>
</div>