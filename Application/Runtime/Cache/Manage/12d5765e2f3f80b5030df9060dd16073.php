<?php if (!defined('THINK_PATH')) exit();?><table class="table text-center mtop1">
	<thead>
	<tr>
		<th class="text-center">校园机构名称</th>
		<th class="text-center">手机号</th>
		<th class="text-center">提交时间</th>
		<th class="text-center">审核</th>
		<th class="text-center">查看</th>
	</tr>
	</thead>
	<tbody>
	<?php if(is_array($userSchoolList)): $i = 0; $__LIST__ = $userSchoolList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["username"]); ?></td>
			<td><?php echo ($vo["phone"]); ?></td>
			<td><?php echo ($vo["createtime"]); ?></td>
			<td>
				<input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id"/>
				<button class="btn btn-success btn-sm" gt-btn-click="audit-school-pass">通过</button>
			</td>
			<td>
				<a href="/manage.php/Audit/pageSchoolInfo?id=<?php echo ($vo["id"]); ?>" target="_blank" class="btn btn-primary btn-sm">查看详情</a>
			</td>
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
<style>
    .lucency {
        top: 0;
        left: 0;
        position: fixed;
        z-index: 1;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: #9B9393;
        display: none;
    }
    .imgbox {
        display: none;
        position: fixed;
        border: 1px solid gray;
        max-width: 500px;
        z-index: 2;
        padding: 3px;
        background: #E2E2E2;
    }
    #img-thumbnail{
        width:100%;
        height:100%;
    }
</style>
<!-- 半透明层 -->
<div class="lucency"></div>
<!-- 图片框 -->
<div class="imgbox">
    <div>
        <button class="btn-link pull-right" gt-btn-click="hide-imgbox">
            <span class="glyphicon glyphicon-remove"></span>
        </button>
    </div>
    <img id="img-thumbnail" onload="setThumbPos()">
</div>