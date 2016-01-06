<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/Public/new/css/<?php echo IMPORT_CSS;?>.css"/>
<link rel="stylesheet" href="/Public/new/css/base.css"/>
<script src="/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Home";
    var CON_PATH = "/index.php/Home/Index";
    var SEL_PATH = "/index.php/Home/Index/pageLogin.html";
    var ACT_PATH = "/index.php/Home/Index/pageLogin";
</script>
</head>
<body>
<div class="container-fluid">
    <div>
        <div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock ablock1">
                <h1><a href="/index.php/Home"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <div class="header-pt">
                    最靠谱的大学生兼职平台 <br>
                    www.luobojianzhi.com
                </div>
                <div class="header-nav pull-right">
                    <!--登录前-->
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageReg">注册</a></li>
                    </ul>
                </div>
            </div>
        </div>
</div>
    <!-- 头end -->

<!-- 登录start -->
    <div id="login">
        <div class="login" gt-model="userLogin">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <div class="login-panel-border">
                    <div class="login-panel" >
                        <!--用户登录类型选择-->
                        <div class="row login-type input-chose">
                            <input type="radio" name="type" value="seeker" gt-isparam="type" checked="checked">
                            <span style="margin-right:15px;">求职者</span>
                            <input type="radio" name="type" value="company" gt-isparam="type">
                            <span style="margin-right:15px;">企业或机构</span>
                            <input type="radio" name="type" value="school" gt-isparam="type">
                            <span>学校机构</span>
                        </div>


                        <div class="row login-content">
                            <!--登录框-->
                            <div class="row login-input">
                                <span class="login-input-ico">
                                   <span class="glyphicon glyphicon-user">&#xe815;</span>
                                </span>
                                <input type="hidden" gt-islabel="用户名"/>
                                <input class="login-input-text" gt-isparam="username" id="usernameInput" type="text">
                            </div>

                            <div class="row login-input">
                                <span class="login-input-ico">
                                   <span class="glyphicon glyphicon-lock">&#xe80e;</span>
                                </span>
                                <input type="hidden" gt-islabel="密码"/>
                                <input class="login-input-text" gt-isparam="password" id="passwordInput" type="password">
                            </div>
                            <!--忘记密码-->
                            <div class="row text-right">
                                <a href="pageFindPwd">忘记密码</a>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                            <a href="javascript:" class="btn" gt-btn-click="login" id="loginBtn" style="width: 100%;">登录</a>
                            </div>
                            <div class="row text-right " style="margin-top: 10px">
                                <a href="pageReg.html">立即注册</a><!--&nbsp;&nbsp;
                            <input type="checkbox"/>
                            <span>记住密码</span>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 登录end -->

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


</div>
</body>
</html>
<script>
    $(document).ready(function() {
        bindClick();

        //在账号密码输入框按回车，就触发登陆按钮的click事件
        $("#usernameInput, #passwordInput").keydown(function(e) {
            if(e.keyCode==13){
                $("#loginBtn").click();
            }
        });
    });
</script>