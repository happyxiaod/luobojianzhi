<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>萝卜兼职-文章中心</title>
    <!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/luoboNew/Public/new/css/base.css"/>
<link rel="stylesheet" href="/luoboNew/Public/new/css/user.css"/>
<script src="/luoboNew/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/luoboNew/Public/default/js/geethin.js"></script>
<script src="/luoboNew/Public/default/js/gtcheck.js"></script>
<script src="/luoboNew/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/luoboNew/index.php";
    var MOD_PATH = "/luoboNew/index.php/Home";
    var CON_PATH = "/luoboNew/index.php/Home/Article";
    var SEL_PATH = "/luoboNew/index.php/Home/Article/index/?nav=avtivity";
    var ACT_PATH = "/luoboNew/index.php/Home/Article/index";
</script>
    <style type="text/css">
        .per_b .per_about li{text-align: center;}
        .per_b .per_about li a{background: none;padding-left:0;}
        .pre{padding:20px 10px;width:100%;}
        .pre strong{margin-bottom:5px;font-weight:bold;display:block;}
        .pre p{margin-bottom:15px;}
        .new_nav{
            background: #fd8901;font-weight:bold;} 
    </style>
</head>
<body>
    <!-- 头部内容 -->
        <div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock">
                <h1><a href="/luoboNew/index.php/Home/Index"><img src="/luoboNew/Public/new/images/logo.png"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/luoboNew/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <ul class="nav">
                    <li class="<?php echo $index?'current':'';?>"><a href="/luoboNew/index.php/Home">首页</a></li>
                    <li class="<?php echo $jobsList?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                    <li class="<?php echo $taitor?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageTailor">量身定制</a></li>
                    <li class="<?php echo $startLoan?'current':'';?>"><a href="/luoboNew/index.php/Home/Loan/startLoan">我要借贷</a></li>
                    <li class="<?php echo $practice?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pagePractice">实习</a></li>
                    <li class="<?php echo $serve?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageServe">服务</a></li>
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="javascript:void(0);">人个中心</a>
                            <ul>
                                    <li><a href="/luoboNew/index.php/Home/User/pageResume">我的简历</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageUserApply">我的申请</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageCollect">我的收藏</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luoboNew/index.php/Home/User/pageEditMyCenter">编辑简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/luoboNew/index.php/Home/User/pageMyCenter">企业中心</a>
                            <ul>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageManage">数据中心</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pagePost">职位管理</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageProve">企业信息</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luoboNew/index.php/Home/Company/pagePostJob">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['type']== 'school'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/User/pageMyCenter">学校中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['adminname']== 'luobo'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Manage/Index/index">进入后台</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/Index/pageReg">注册</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/Index/pageLogin">登录</a></li>
                    </ul><?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 头end -->
     
    <!-- 搜索start -->
    <div id="search">
        <div class="search">
            <div class="search_in">
                <input id="txtSearchKey" name="txtSearchKey"  type="text"  class="required BC_input_focus validationBinded BC_Input_error" placeholder="输入关键词" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30" onkeydown="if(event.keyCode==13)searchjobsBtn.click()">
                <input id="searchjobsBtn" type="button"  name="searchjobsBtn" gt-btn-click="searchjobs" class="New_btn btn_i i1 YH btn_submit BC_validation" value="搜索">
            </div>
            <div class="search_hot">
                <ul>
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/luoboNew/index.php/Home/Jobs/pageJobsLists?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->
<script type="text/javascript">
    $(document).ready(function(){
     $("#header .nav li").click(function(event) {
         $(this).addClass('current');
            });
            /*个人中心鼠标滑动下拉*/
            $(".header-nav .login-before .person").hover(function() {
                $(this).children('ul').stop().slideToggle();
            });
    });

    </script>
    <!-- 主体内容 -->
        
    <!-- 底部内容 -->
        
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/aboutUs">关于捷城</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=AboutRadish">企业动态</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=FeedBack">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Question">常见问题</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Service">企业服务</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>关注我们</dt>
                <dd><a href="">官方微信</a></dd>
                <dd><a href="http://weibo.com/luobojianzhi">新浪微博</a></dd>
                <dd><a href="">腾讯微博</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>400-886-3334</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
        </div>
    </div>

</body>
</html>