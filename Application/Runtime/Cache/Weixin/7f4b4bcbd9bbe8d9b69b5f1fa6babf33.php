<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>设置</title>
    <!--
Coder by Niltor
Email:admin@niltor.net-->
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://lib.geethin.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/default/css/gt-mobile.css"/>
<link rel="stylesheet" href="/Public/default/css/gt.weixin.css"/>
<script src="http://lib.geethin.com/jquery/jquery1.10.2.min.js"></script>
<script src="http://lib.geethin.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.weixin.js"></script>
<script>
    var APP_PATH = "/weixin.php";
    var MOD_PATH = "/weixin.php";
    var CON_PATH = "/weixin.php/Setting";
    var SEL_PATH = "/weixin.php/Setting/setting";
    var ACT_PATH = "/weixin.php/Setting/setting";
</script>

</head>
<body>
    <div class="container-fluid">
        <!--头部标题-->
        <div class="row">
            <div class="actionbar-back">
                <div class="col-xs-1 text-left" style="padding-left:8px">
                    <a href="javascript:" onclick="javascript:history.back(-1)">
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </a>
                </div>
                <div class="col-xs-10 text-center actionbar-title">
                    设置
                </div>
                <div class="col-xs-1 text-right">
                </div>
            </div>
        </div>
        <!--内容-->
        <div class="row" style="margin-top:8px">
            <div class="gtlyout" style="height:48px;line-height: 40px">
                <div class="col-xs-2">
                    <img src="/Public/default/images/appsetting1.png" width="32px"/>
                </div>
                <div class="col-xs-10 curs-pt" id="updatepwd">
                    <span class="text-normal ">修改密码</span>
                </div>
            </div>
            <div class="gtlyout" style="height:48px;line-height: 40px">
                <div class="col-xs-2">
                    <img src="/Public/default/images/appsetting2.png" width="32px"/>
                </div>
                <div class="col-xs-10 curs-pt" id="feedback">
                    <span class="text-normal ">意见反馈</span>
                </div>
            </div>
            <div class="gtlyout" style="height:48px;line-height: 40px">
                <div class="col-xs-2">
                    <img src="/Public/default/images/appsetting3.png" width="32px"/>
                </div>
                <div class="col-xs-10 curs-pt" id="about">
                    <span class="text-normal ">关于我们</span>
                </div>
            </div>
            <div class="gt-rowdivide" style="height:16px"></div>
            <div class="text-center">
                <a href="/weixin.php/Mobile/logout">
                    <img src="/Public/default/images/appsetting5.png" style="width:94%;height:48px"/>
                </a>
            </div>


        </div>
        <!--底部内容 -->
        <div class="row">
            <div class="text-center footer" style="margin-top: 15px">
    <div>
        <a href="/weixin.php/Mobile/login" class="footer-btn">登录</a>
        &nbsp;
        <a href="/weixin.php/Mobile/reg" class="footer-btn">注册</a>
        &nbsp;
        城市:
        <span class="">
            <a href="/weixin.php/Mobile/choseArea"><?php echo (session('city')); ?></a>
        </span>
    </div>
    <!--底部导航-->
    <div class="text-center footer-nav" style="margin-top: 8px">
        <a href="/weixin.php/Jobs/pageJobs">首页</a>
        <a href="/weixin.php/Mobile/myCenter">我的</a>
        <a href="/weixin.php/Mobile/download">下载APP</a>
        <a href="/weixin.php/Mobile/about">关于我们</a>
    </div>

    <div class="">
        <img src="/Public/default/images/footer.png" width="100%"/>
    </div>

</div>'

        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#updatepwd').on('click', '', function (event) {
            event.preventDefault();
            location.href='/weixin.php/Setting/updatepwd';
        });
        $('#feedback').on('click', '', function (event) {
            event.preventDefault();
            location.href='/weixin.php/Setting/feedback';
        });
        $('#about').on('click', '', function (event) {
            event.preventDefault();
            location.href='/weixin.php/Mobile/about';
        });
        $('#update').on('click', '', function (event) {
            event.preventDefault();
//            location.href='/weixin.php/Setting/update';
        });
    });
</script>