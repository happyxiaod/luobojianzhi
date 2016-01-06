<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>我的借款</title>
	<!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/Public/new/css/base.css"/>
<link rel="stylesheet" href="/Public/new/css/user2.css"/>
<script src="/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Home";
    var CON_PATH = "/index.php/Home/User";
    var SEL_PATH = "/index.php/Home/User/pageMyloan1";
    var ACT_PATH = "/index.php/Home/User/pageMyloan1";
</script>

</head>
<body>
    <!-- 头部内容 -->
        
<div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock">
                <h1><a href="/index.php/Home/Index"><img src="/Public/new/images/logo.png"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <ul class="nav">
                    <li class="<?php echo $index?'current':'';?>"><a href="/index.php/Home">首页</a></li>
                    <li class="<?php echo $jobsList?'current':'';?>"><a href="/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                     <!-- <li class="<?php echo $taitor?'current':'';?>"><a href="/index.php/Home/Jobs/pageTailor">量身定制</a></li> -->
                <?php if($_SESSION['user']['type']== 'seeker'): ?><li class="<?php echo $pageMyloan1?'current':'';?>"><a href="/index.php/Home/User/pageMyloan1">我要借款</a></li>
                <?php else: ?>
                   <li class="<?php echo $pageMyloan1?'current':'';?>"><a href="/index.php/Home/Loan/startLoan">我要借款</a></li><?php endif; ?>
                   <!-- <li class="<?php echo $practice?'current':'';?>"><a href="/index.php/Home/Jobs/pagePractice">实习</a></li>
                   <li class="<?php echo $serve?'current':'';?>"><a href="/index.php/Home/Jobs/pageServe">服务</a></li>  -->
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="javascript:void(0);">人个中心</a>
                            <ul>
                                    <li><a href="/index.php/Home/User/pageResume">我的简历</a></li>
                                    <li><a href="/index.php/Home/User/pageUserApply">我的申请</a></li>
                                    <li><a href="/index.php/Home/User/pageCollect">我的收藏</a></li>
                                    <li><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/index.php/Home/User/pageEditMyCenter">编辑简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/index.php/Home/User/pageMyCenter">企业中心</a>
                            <ul>
                                    <li><a href="/index.php/Home/Company/pageManage">数据中心</a></li>
                                    <li><a href="/index.php/Home/Company/pagePost">职位管理</a></li>
                                    <li><a href="/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                                    <li><a href="/index.php/Home/Company/pageProve">企业信息</a></li>
                                    <li><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/index.php/Home/Company/pagePostJob">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['type']== 'school'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/User/pageMyCenter">学校中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['adminname']== 'luobo'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Manage/Index/index">进入后台</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageReg">注册</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageLogin">登录</a></li>
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
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Jobs/pageJobsLists?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->

  <!-- 侧栏工具条 -->
    <div class="toolbar">
    <a href="" herf="javascript:;" class="toolbar-iterm toolbar-iterm-weixin">
        <span class="toolbar-layer"></span>
    </a>
    <a href="tencent://Message/?Uin=909106725&websiteName=luobojianzhi.com&Menu=yes" class="toolbar-iterm toolbar-iterm-feedback"></a>
    <a href="" herf="javascript:;" class="toolbar-iterm toolbar-iterm-app">
        <span class="toolbar-layer"></span>
    </a>
    <a href="" id="backTop" herf="javascript:;" class="toolbar-iterm toolbar-iterm-top"></a>
    </div>
    <!-- 侧栏工具条end -->
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
            <style>
        .btn_feed_submit {
    cursor: pointer;
    padding: 1px 30px;
     margin-top: 80px;
    border-radius: 5px;
    background-color: #ed7312;
    color: #fff;
    font-size: 16px;
}
    </style>

    <div id="person">
        <!-- 个人中心start -->
        <!-- <div class="per_t">
            <div class="per_nav">
                <a href="">首页</a> > <a href="">个人管理中心</a>
            </div>
            <div class="per_dal">
                <img src="images/review.jpg" alt="" width="130" height="130" />
                <div>
                    <span>马云</span>
                    <p>山东大学（威海）</p>
                    <a href="">修改头像</a>
                </div>
            </div>
        </div> -->
        <div class="per_b clearfix">
            <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="per_nav">
                <li id="pageResume"><a href="/index.php/Home/User/pageResume">我的简历</a></li>
                <li id="pageUserApply"><a href="/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li id="pageWallet"><a href="/index.php/Home/User/pageWallet">我的钱包</a></li>
                <li id="pageMyloan"><a href="/index.php/Home/User/pageMyloan1">我的借款</a></li>
                <li id="pageBill"><a href="/index.php/Home/User/pageBill">我的账单</a></li>
                <li id="Authentication"><a href="/index.php/Home/User/pageAuthentication">信用认证</a></li>
                <li id="pageCollect"><a href="/index.php/Home/User/pageCollect">我的收藏</a></li>
                <!-- <li><a href="/index.php/Home/User/pageMsg">消息</a></li> -->
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li id="pageManage"><a href="/index.php/Home/Company/pageManage">管理中心</a></li>
                <li id="pagePost"><a href="/index.php/Home/Company/pagePost">职位管理</a></li>
                <li id="pageCompanyApply"><a href="/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                <li id="pageProve"><a href="/index.php/Home/Company/pageProve">企业信息</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li id="pagePost"> <a href="/index.php/Home/Company/pagePost">我的发布</a></li>
                <li id="pageCompanyApply" ><a href="/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li id="pageProve" ><a href="/index.php/Home/Company/pageProve">认证信息</a></li>
                <li id="pageFeedback"><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
            <div class="per_r_dal">             
                <h4 class="font-orange">我的借款</h4>
                <div class="sucess">
                    <!-- <span style="margin-top:20px;">我要借款</span> -->
                    <div class="sucess_dal" style="width:280px;">
                        <div><span>订单号</span>234467</div>
                        <div><span>资金用途</span>旅游</div>
                        <div><span>借款</span><b>2000.00</b></div>
                        <div><span>分期月数</span>6个月</div>
                        <div><span>每月应还</span><b>2110.00</b></div>
                         <a href="/index.php/Home/User/pageContract" class="btn_feed_submit" style="width: 50px float:left;">下一步</a>
                    </div>

                </div>
             

            </div>
        </div>
        <!-- 个人中心end -->
    </div>
    <!-- 底部内容 -->
        
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/index.php/Home/Article/aboutUs">关于捷城</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=AboutRadish">萝卜兼职</a></dd>
                <dd><a href="/index.php/Home/Feed/pageFeedback">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="/index.php/Home/Article/index?nav=Question">常见问题</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Service">企业服务</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
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
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
        </div>
    </div>

</body>
</html>
<script>
	jQuery(document).ready(function($) {
		bindClick();
        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pageMyloan").removeClass("cur").addClass("cur");
        $(".lend_txt textarea").val("请认真填写您要借贷分期的用途，便于您的申请尽快通过");
    $(".lend_txt textarea").click(function(event) {
        $(this).val("");
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
    //资金用途
     $(".lend_way li").click(function(event) {
        var info=$(this);
        selectInfo(info);
    });
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
</script>