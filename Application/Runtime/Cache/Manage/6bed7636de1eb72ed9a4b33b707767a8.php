<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>微信福利用户信息详情</title>
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
    var SEL_PATH = "/luoboNew/manage.php/Audit/pageWealInfo?id=22130";
    var ACT_PATH = "/luoboNew/manage.php/Audit/pageWealInfo";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
    <div class="header">
        <!--
<div class="row fragbox">
	&lt;!&ndash; TODO a标签地址 &ndash;&gt;
	<div class="pull-right mtop2">
		<span class="pull-right">
			<a href="/luoboNew/index.php/User/User/doLogout" style="color:red">退出系统</a>
			&nbsp;&nbsp;
		</span>
		<span class="pull-right">
			<a href="" style="color:#72C5F0">修改密码</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
		</span>
		<span class="pull-right" style="color:#72C5F0">
			<span class="glyphicon glyphicon-user" style="color:#C0C0C0"></span>
			&nbsp;
			你好! <?php echo ($_SESSION['user']['adminname']); ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
		</span>
	</div>
</div>-->

<div class="row" style="background: #c3e7ff;">
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
</div>
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
            <a href="/luoboNew/manage.php/Weixin/weal?state=1" class="nav-a">已派送用户</a>
        </li>
        <li class="nav-two" id="navWeixinActivity">
            <a href="/luoboNew/manage.php/Weixin/weal?state=2" class="nav-a">未派送</a>
        </li><?php endif; ?>


</div>
    <!-- 内容 -->
    <div class="content col-md-10">
        <!-- 导航菜单内容显示 -->
        <div class="row" style="background:#f4f4f4;height:36px;line-height:36px;border-bottom:1px solid #ddd">

        <!-- TODO 换成当前的导航菜单内容-->
			<span class="mleft2">
				查看微信福利用户信息
			</span>
        </div>
        <!-- 右边具体内容 -->
        <div class="row fragbox">
            <div class="seeker-info-box">
                
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        真实姓名：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["realname"]); ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        生日：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["birthday"]); ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        手机号：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["phone"]); ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        所在地：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["address"]); ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        邮箱：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["email"]); ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 text-right seeker-info-left">
                        提交时间：
                    </div>
                    <div class="col-md-10">
                        <?php echo ($info["createtime"]); ?>
                    </div>
                </div>
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
        $("#navAuditSeeker").addClass("nav-two-active"); //更改导航样式
    });
</script>