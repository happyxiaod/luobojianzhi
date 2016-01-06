<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>企业资料审核</title>
	<link rel="stylesheet" href="https://gtlib.b0.upaiyun.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/luoboNew/Public/default/css/gt.manage.css">
<link rel="stylesheet" href="/luoboNew/Public/default/css/gt.manage2.css">
<script src="https://gtlib.b0.upaiyun.com/jquery/jquery1.10.2.min.js"></script>
<script src="https://gtlib.b0.upaiyun.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/luoboNew/Public/default/js/geethin.js"></script>
<script src="/luoboNew/Public/default/js/gt.manage.js"></script>
<script>
    var APP_PATH = "/luoboNew/manage.php";
    var MOD_PATH = "/luoboNew/manage.php";
    var CON_PATH = "/luoboNew/manage.php/Audit";
    var SEL_PATH = "/luoboNew/manage.php/Audit/pageCompany";
    var ACT_PATH = "/luoboNew/manage.php/Audit/pageCompany";
</script>	
</head>
<body>
	<div class="container-fluid">
		<!-- 头部内容 -->
		<div class="header">
			
<?php if($_SESSION['user']['adminname']== 'luobo'): ?><div class="row" style="background: #c3e7ff;">
    <div class="row" style="margin-top:36px;margin-bottom:16px;padding-left:30px;padding-right:30px">
        <!--头部-->
        <div class="col-md-10" style="font-family: 'Microsoft YaHei'">
            <span style="color:#335fb7;font-size:20px">萝卜兼职后台管理系统</span>
            <img src="/luoboNew/Public/default/images/admin_user.png" width="16px"
                 style="margin-left:30px;">
            <span style="font-size: 15px;">欢迎您！<?php echo ($_SESSION['user']['adminname']); ?></span>
            <img src="/luoboNew/Public/default/images/admin_time.png" width="17px"
                 style="margin-left:30px">
            <span style="font-size: 15px;"><?php echo (session('datetime')); ?></span>


        </div>
        <div class="col-md-2 text-right">
            <a href="/luoboNew/index.php/User/User/doLogout">
                <img src="/luoboNew/Public/default/images/admin_logout.png" width="22px">
            </a>
        </div>
    </div>

    <!--导航-->
    <div class="row" id="daohang">
        <ul id="nav">
            <li>
                <a href="/luoboNew/manage.php/Index/index"><span class="glyphicon glyphicon-home"></span>
                    首页</a>
            </li>
            <li><a href="/luoboNew/manage.php/Member/pageSeeker">
                <span class="glyphicon glyphicon-user"></span>
                会员管理</a></li>

            <li><a href="/luoboNew/manage.php/Audit/pageSeeker">
                <span class="glyphicon glyphicon-list"></span>
                资料审核</a></li>

            <li><a href="/luoboNew/manage.php/Position/pageSeeker">
                <span class="glyphicon glyphicon-list-alt"></span>

                职位信息</a></li>
            <li><a href="/luoboNew/manage.php/Setting/pageScroll">
                <span class="glyphicon glyphicon-cog"></span>

                网站设置</a></li>
            <li><a href="/luoboNew/manage.php/Feedback/pageFeedback">
                <span class="glyphicon glyphicon-comment"></span>

                意见反馈</a></li>
            <li><a href="/luoboNew/manage.php/Weixin/weal">
                <span class="glyphicon glyphicon-comment"></span>

                微信活动</a></li>
        </ul>
    </div>
</div><?php endif; ?>
		</div>
		<!-- 主体内容 -->
		<div class="middle row">
			<div class="row ">
	<!-- 左边主要导航 -->
	<div class="mainnav col-md-2" style="padding: 0;border-right:1px solid #ddd;border-bottom:1px solid #ddd">
    <div class="col-md-12 text-center"
         style="height:36px;background:#f4f4f4;border-right:1px solid #ddd;border-bottom:1px solid #ddd;line-height: 36px">
        <img src="/luoboNew/Public/default/images/admin_arrow.png" width="20px">
        &nbsp;&nbsp;<?php echo ($currentnav); ?>
    </div>

    <?php if(($currentnav) == "会员管理"): ?><br><br>
        <div class="nav-one">个人会员</div>
        <li class="nav-two" id="navMemberSeeker">
            <a href="/luoboNew/manage.php/Member/pageSeeker" class="nav-a">注册用户</a>
        </li>
        <li class="nav-two" id="navCheckedSeeker">
            <a href="/luoboNew/manage.php/Member/pageCheckedSeeker" class="nav-a">认证用户</a>
        </li>
          <li class="nav-two" id="navNotCheckedSeeker">
            <a href="/luoboNew/manage.php/Member/pageNotCheckedSeeker" class="nav-a">未审用户</a>
        </li>
        <div class="nav-one">企业会员</div>
        <li class="nav-two" id="navMemberCompany">
            <a href="/luoboNew/manage.php/Member/pageCompany" class="nav-a">注册企业</a>
        </li>
        <li class="nav-two" id="navCheckedCompany">
            <a href="/luoboNew/manage.php/Member/pageCheckedCompany" class="nav-a">认证企业</a>

        </li>

        <li class="nav-two" id="navMemberSchool">
            <a href="/luoboNew/manage.php/Member/pageSchool" class="nav-a">学校会员</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "资料审核"): ?><li class="nav-two" id="navAuditSeeker">
            <a href="/luoboNew/manage.php/Audit/pageSeeker" class="nav-a">个人资料审核</a>
        </li>
        <li class="nav-two" id="navAuditCompany">
            <a href="/luoboNew/manage.php/Audit/pageCompany" class="nav-a">企业资料审核</a>
        </li>
        <li class="nav-two" id="navAuditSchool">
            <a href="/luoboNew/manage.php/Audit/pageSchool" class="nav-a">校园机构资料审核</a>
        </li>
        <li class="nav-two" id="navAuditNotpass">
            <a href="/luoboNew/manage.php/Audit/pageNotpass" class="nav-a">未通过审核</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "职位信息"): ?><li class="nav-two" id="navPositionSeeker">
            <a href="/luoboNew/manage.php/Position/pageSeeker" class="nav-a">个人信息</a>
        </li>
        <li class="nav-two" id="navPositionCompany">
            <a href="/luoboNew/manage.php/Position/pageCompany" class="nav-a">企业信息</a>
        </li>
        <li class="nav-two" id="navPositionSchool">
            <a href="/luoboNew/manage.php/Position/pageSchool" class="nav-a">校园机构信息</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "网站设置"): ?><li class="nav-two" id="navSettingScroll">
            <a href="/luoboNew/manage.php/Setting/pageScroll" class="nav-a">轮播图设置</a>
        </li>
        <li class="nav-two" id="navSettingJobType">
            <a href="/luoboNew/manage.php/Setting/pageJobType" class="nav-a">兼职分类管理</a>
        </li>
        <li class="nav-two" id="navSettingAddSchool">
            <a href="/luoboNew/manage.php/Setting/pageAddSchool" class="nav-a">添加学校分类</a>
        </li>
        <li class="nav-two" id="navSettingRegion">
            <a href="/luoboNew/manage.php/Setting/pageRegionProvince" class="nav-a">地区管理</a>
        </li><?php endif; ?>


    <?php if(($currentnav) == "意见反馈"): ?><li class="nav-two" id="navFeedback">
            <a href="/luoboNew/manage.php/Feedback/pageFeedback" class="nav-a">意见反馈</a>
        </li><?php endif; ?>
    <?php if(($currentnav) == "微信活动"): ?><li class="nav-two" id="navWeixinActivity">
            <a href="/luoboNew/manage.php/Weixin/weal" class="nav-a">福利派送</a>
        </li>
        <li class="nav-two" id="navWeixinActivity">
            <a href="/luoboNew/manage.php/Weixin/weal?state=1" class="nav-a">已派送用户(1)</a>
        </li>
        <li class="nav-two" id="navWeixinActivity">
            <a href="/luoboNew/manage.php/Weixin/weal?state=2" class="nav-a">未派送(2)</a>
        </li><?php endif; ?>


</div>
	<!-- 内容 -->
	<div class="content col-md-10">
		<!-- 导航菜单内容显示 -->
		<div class="row" style="background:#f4f4f4;height:36px;line-height:36px;border-bottom:1px solid #ddd">

		<!-- TODO 换成当前的导航菜单内容-->
			<span class="mleft2">
				审核 > 审核企业
			</span>
		</div>
		<!-- 右边具体内容 -->
		<div class="row fragbox">
			<div class="col-md-10">
				<table class="table text-center mtop1">
					<thead>
					<tr>
						<th class="text-center">企业名称</th>
						<th class="text-center">手机号</th>
						<th class="text-center">提交时间</th>
						<th class="text-center">上传材料</th>
						<th class="text-center">审核</th>
						<th class="text-center">查看</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($userCompanyList)): $i = 0; $__LIST__ = $userCompanyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["companyname"]); ?></td>
							<td><?php echo ($vo["phone"]); ?></td>
							<td><?php echo ($vo["createtime"]); ?></td>
							<td>
								<?php if(!empty($vo['idobverse'])){ echo('
									<button class="audit-thumbnail" gt-btn-click="audit-thumbnail"
											popup-src="/luoboNew/Uploads/'.$vo['idobverse'].'">证件照
									</button>
									'); } if(!empty($vo['orgauth'])){ echo('
									<button class="audit-thumbnail" gt-btn-click="audit-thumbnail"
											popup-src="/luoboNew/Uploads/'.$vo['orgauth'].'">营业执照
									</button>
									'); } ?>
							</td>
							<td>
								<input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id"/>
								<button class="btn btn-success btn-sm" gt-btn-click="audit-company-pass">通过</button>
								<button class="btn btn-danger btn-sm" gt-btn-click="audit-company-notpass">未通过</button>
							</td>
							<td>
								<a href="/luoboNew/manage.php/Audit/pageCompanyInfo?id=<?php echo ($vo["id"]); ?>" target="_blank" class="btn btn-primary btn-sm">查看详情</a>
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
                        <a href="<?php echo ($vo["url"]); ?>" class="pageBtn" id="pageActiveBtn" value="<?php echo ($vo["value"]); ?>" style="color:red"><?php echo ($vo["value"]); ?></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo ($vo["url"]); ?>" class="pageBtn" value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["value"]); ?></a>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li style="display: none;"><a href="javascript:" id="pageNextBtn">>></a></li>
            <li style="display: none;">
                &nbsp;&nbsp;&nbsp;共<span id="pageAllNumber"></span>页&nbsp;&nbsp;跳转到第&nbsp;
                <input type="text" id="pageGoNumber" style="width: 30px; padding: 0; margin-top: -1px;"/>&nbsp;页
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
                window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
            });

            //绑定下十页事件
            $("#pageNextBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage + 10;
                if(number > allNumber) {
                    number = allNumber;
                }
                window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
            });

            //绑定Go按钮事件
            $("#pageGoBtn").on('click', '', function (event) {
                event.preventDefault();
                number = $("#pageGoNumber").val();
                if(number >= 1 && number <= allNumber) {
                    window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
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
            <!--显示缩略图-->
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
		</div>
	</div>
</div>

		</div>
		<!-- 底部内容 -->
		<div class="footer">
			
		</div>
	</div>
</body>
</html>
<script>
	jQuery(document).ready(function($) {
		bindClick();
		$("#navAuditCompany").addClass("nav-two-active"); //更改导航样式
	});
</script>