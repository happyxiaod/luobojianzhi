<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" href="https://gtlib.b0.upaiyun.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/default/css/gt.manage.css">
<link rel="stylesheet" href="/Public/default/css/gt.manage2.css">
<script src="https://gtlib.b0.upaiyun.com/jquery/jquery1.10.2.min.js"></script>
<script src="https://gtlib.b0.upaiyun.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gt.manage.js"></script>
<script>
    var APP_PATH = "/manage.php";
    var MOD_PATH = "/manage.php";
    var CON_PATH = "/manage.php/Index";
    var SEL_PATH = "/manage.php/Index/index";
    var ACT_PATH = "/manage.php/Index/index";
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
            <img src="/Public/default/images/admin_user.png" width="16px"
                 style="margin-left:30px;">
            <span style="font-size: 15px;">欢迎您！<?php echo ($_SESSION['user']['adminname']); ?></span>
            <img src="/Public/default/images/admin_time.png" width="17px"
                 style="margin-left:30px">
            <span style="font-size: 15px;"><?php echo (session('datetime')); ?></span>


        </div>
        <div class="col-md-2 text-right">
            <a href="/index.php/User/User/doLogout">
                <img src="/Public/default/images/admin_logout.png" width="22px">
            </a>
        </div>
    </div>

    <!--导航-->
    <div class="row" id="daohang">
        <ul id="nav">
            <li>
                <a href="/manage.php/Index/index"><span class="glyphicon glyphicon-home"></span>
                    首页</a>
            </li>
            <li><a href="/manage.php/Member/pageSeeker">
                <span class="glyphicon glyphicon-user"></span>
                会员管理</a></li>

            <li><a href="/manage.php/Audit/pageSeeker">
                <span class="glyphicon glyphicon-list"></span>
                资料审核</a></li>

            <li><a href="/manage.php/Position/pageSeeker">
                <span class="glyphicon glyphicon-list-alt"></span>

                职位信息</a></li>
            <li><a href="/manage.php/Setting/pageScroll">
                <span class="glyphicon glyphicon-cog"></span>

                网站设置</a></li>
            <li><a href="/manage.php/Feedback/pageFeedback">
                <span class="glyphicon glyphicon-comment"></span>

                意见反馈</a></li>
            <li><a href="/manage.php/Weixin/weal">
                <span class="glyphicon glyphicon-comment"></span>

                微信活动</a></li>
        </ul>
    </div>
</div><?php endif; ?>
		</div>
		<!-- 主体内容 -->
		<div class="middle row">
			<div class="row">
    <!-- 左边主要导航 -->
    <div class="mainnav col-md-2" style="padding: 0;border-right:1px solid #ddd;border-bottom:1px solid #ddd">
    <span class="nav-one">会员管理</span>
    <li class="nav-two" id="navMemberSeeker">
        <a href="/manage.php/Member/pageSeeker" class="nav-a">注册用户</a>
    </li>
    <li class="nav-two" id="navMemberSeeker">
        <a href="/manage.php/Member/pageNotCheckedSeeker" class="nav-a">待审用户</a>
    </li>
    <li class="nav-two" id="navMemberCheckedSeeker">
        <a href="/manage.php/Member/pageCheckedSeeker" class="nav-a">认证用户</a>
    </li>
    <li class="nav-two" id="navMemberCompany">
        <a href="/manage.php/Member/pageCompany" class="nav-a">企业会员</a>
    </li>
    <li class="nav-two" id="navMemberSchool">
        <a href="/manage.php/Member/pageSchool" class="nav-a">学校机构会员</a>
    </li>

    <span class="nav-one">资料审核 </span>

    <li class="nav-two" id="navAuditSeeker">
        <a href="/manage.php/Audit/pageSeeker" class="nav-a">个人资料审核</a>
    </li>
    <li class="nav-two" id="navAuditCompany">
        <a href="/manage.php/Audit/pageCompany" class="nav-a">企业资料审核</a>
    </li>
    <li class="nav-two" id="navAuditSchool">
        <a href="/manage.php/Audit/pageSchool" class="nav-a">校园机构资料审核</a>
    </li>
    <li class="nav-two" id="navAuditNotpass">
        <a href="/manage.php/Audit/pageNotpass" class="nav-a">未通过审核</a>
    </li>

    <span class="nav-one">职位信息</span>

    <li class="nav-two" id="navPositionSeeker">
        <a href="/manage.php/Position/pageSeeker" class="nav-a">个人信息</a>
    </li>
    <li class="nav-two" id="navPositionCompany">
        <a href="/manage.php/Position/pageCompany" class="nav-a">企业信息</a>
    </li>
    <li class="nav-two" id="navPositionSchool">
        <a href="/manage.php/Position/pageSchool" class="nav-a">校园机构信息</a>
    </li>

    <span class="nav-one">网站设置</span>

    <li class="nav-two" id="navSettingScroll">
        <a href="/manage.php/Setting/pageScroll" class="nav-a">轮播图设置</a>
    </li>
    <li class="nav-two" id="navSettingJobType">
        <a href="/manage.php/Setting/pageJobType" class="nav-a">兼职分类管理</a>
    </li>
    <li class="nav-two" id="navSettingAddSchool">
        <a href="/manage.php/Setting/pageAddSchool" class="nav-a">添加学校分类</a>
    </li>
    <li class="nav-two" id="navSettingRegion">
        <a href="/manage.php/Setting/pageRegionProvince" class="nav-a">地区管理</a>
    </li>

    <span class="nav-one">意见反馈</span>

    <li class="nav-two" id="navFeedback">
        <a href="/manage.php/Feedback/pageFeedback" class="nav-a">意见反馈</a>
    </li>
    <span class="nav-one">微信活动</span>
    <li class="nav-two" id="navWeixinActivity">
        <a href="/manage.php/Weixin/weal" class="nav-a">福利派送</a>
    </li>

</div>
    <!-- 内容 -->
    <div class="content col-md-10">
        <!-- 导航菜单内容显示 -->
        <div class="row" style="background:#f4f4f4;height:36px;line-height:36px;border-bottom:1px solid #ddd">

        <!-- TODO 换成当前的导航菜单内容-->
			<span class="mleft2">

			</span>
        </div>
        <!-- 右边具体内容 -->
        <div class="row fragbox">
            <div class="text-center">
                <h2 style="color:#8D96D1;margin-top: 20px">
                    欢 迎 进 入 后 台 管 理 系 统
                </h2>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">会员统计</div>
                    <ul>
                        <li>会员总数:<?php echo ($_SESSION['info']['membertotal']); ?></li>
                        <li>待审会员:<?php echo ($_SESSION['info']['nocheckmember']); ?></li>
                        <li>认证会员:<?php echo ($_SESSION['info']['checkedmember']); ?></li>
                        <li>今日新增会员：<?php echo ($_SESSION['info']['newmember']); ?></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">企业统计</div>
                    <ul>
                        <li>
                            企业总数：<?php echo ($_SESSION['info']['companytotal']); ?>
                        </li>
                        <li>待审企业：<?php echo ($_SESSION['info']['nocheckcompany']); ?></li>
                        <li>认证企业：<?php echo ($_SESSION['info']['checkedcompany']); ?></li>
                        <li>今日新增企业:<?php echo ($_SESSION['info']['newcompany']); ?></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">兼职统计</div>
                    <ul>
                        <li>
                            职位类别个数:<?php echo ($_SESSION['info']['levelnumber']); ?>
                        </li>
                        <li>
                            已发职位总数:<?php echo ($_SESSION['info']['jobstotal']); ?>
                        </li>
                        <li>被申请职位数:<?php echo ($_SESSION['info']['applyjobs']); ?></li>
                        <li>今日新增职位数:<?php echo ($_SESSION['info']['newjobs']); ?></li>
                    </ul>
                </div>

            </div>

            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">其他统计</div>
                    <ul>
                        <li>
                            共有院校:<?php echo ($_SESSION['info']['schools']); ?>
                        </li>
                        <li>已发出申请数:<?php echo ($_SESSION['info']['applynumber']); ?></li>
                        <li>已接受申请数:<?php echo ($_SESSION['info']['acceptapplynumber']); ?></li>
                        产生交易额
                        等等
                    </ul>
                </div>

            </div>
        </div>
         <!--测试图表-->

            <h2 style="color:#8D96D1;margin-top: 20px">
                    会员统计
            </h2>
<!-- ECharts单文件引入 -->
    <!-- <script src="http://echarts.baidu.com/build/dist/echarts.js"></script> -->
    <script src="/Public/Echarts/echarts.js"></script>
    <script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: '/Public/Echarts'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
                
                var option = {
                    tooltip: {
                        show: true
                    },
                    legend: {
                        data:['注册量']
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : ["会员总数","待审会员","认证会员","今日新增"]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            "name":"销量",
                            "type":"bar",
                            "data":[<?php echo ($_SESSION['info']['membertotal']); ?>,<?php echo ($_SESSION['info']['nocheckmember']); ?>,<?php echo ($_SESSION['info']['checkedmember']); ?>,<?php echo ($_SESSION['info']['newmember']); ?>]
                        }
                    ]
                };
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
                   
            

    <!--测试图表-->
<div id="main" style="width:600px;height:400px"></div>
            
    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>
		</div>
		<!-- 底部内容 -->
		<div class="footer">
			
		</div>
	</div>
</body>
</html>