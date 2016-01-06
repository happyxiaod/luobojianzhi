<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
    var CON_PATH = "/weixin.php/Mobile";
    var SEL_PATH = "/weixin.php/Mobile/login.html";
    var ACT_PATH = "/weixin.php/Mobile/login";
</script>
    <title>登录</title>
</head>
<body>
<div class="container-fluid">
    <!--actionbar-->
    <div class="row">
        <div class="actionbar-back">
    <div class="col-xs-1 text-left" style="padding-left:8px">
        <a href="">
            <span class="glyphicon glyphicon-menu-left"></span>
        </a>
    </div>
    <div class="col-xs-10 text-center actionbar-title">
        <?php echo ($title); ?> 登录
    </div>
    <div class="col-xs-1 text-right">
        <?php echo ($else); ?>
    </div>
</div>

    </div>
    <!--头像-->
    <div class="row text-center" style="height:200px;padding-top:40px">
        <img class="headpic-lg" src="/Public/default/images/headpic_default.png"/>
    </div>
    <!--登录-->
    <div class="row">
        <form id="form-login">
            <div class="login-row row text-left"
                 style="line-height: 48px;margin-bottom:8px;font-family:Microsoft YaHei">
                <div class="col-xs-4" style="padding:0;padding-left:4px">
                    <input type="radio" value="seeker" name="type" checked="checked"/>
                    <span class="login-type">求职者</span>

                </div>
                <div class="col-xs-4" style="padding:0">
                    <input type="radio" value="company" name="type"/>
                    <span class="login-type">企业机构</span>

                </div>
                <div class="col-xs-4" style="padding:0">
                    <input type="radio" value="school" name="type"/>
                    <span class="login-type">学校机构</span>

                </div>
            </div>
            <div class="login-row row">
                <div class="col-xs-1 text-center" style="padding:0">
                    <span class="glyphicon glyphicon-user login-ico"></span>
                </div>
                <div class="col-xs-11" style="padding:0 4px">
                    <input class="login-input" type="text" id="username" name="username"
                           style="border: none"/>
                </div>
            </div>
            <div class="login-row row">
                <div class="col-xs-1 text-center" style="padding:0">
                    <span class="glyphicon glyphicon-lock login-ico"></span>
                </div>
                <div class="col-xs-11" style="padding:0 4px">
                    <input class="login-input" type="password" id="password" name="password"
                           style="border: none"/>
                </div>
            </div>
            <!--忘记密码-->
            <div class="text-right" style="padding-right:8px;margin-top:12px">
                <a href="/weixin.php/Mobile/pageFindPwd" style="color:#888">忘记密码</a>
            </div>
            <!--登录按钮-->

            <div class="text-center curs-pt" style="margin:4px 0">
                <img src="/Public/default/images/login_login.png" id="dologin" style="width:94%;height:48px"/>
            </div>
        </form>
    </div>
    <div class="row text-right" style="padding-right:8px">
            <span>
                <a href="/weixin.php/Mobile/reg" class="cl-orange">立即注册</a>
            </span>
    </div>


    <!--底部-->
    <div class="row">
        <div class="text-center footer" style="margin-top: 15px">
    <div>
        <a href="/weixin.php/Mobile/login" class="footer-btn">登录</a>
        &nbsp;
      <a href="/weixin.php/Mobile/reg" class="footer-btn">注册</a>
       <!--  <a href="/index.php/Home/Index/pageReg" class="footer-btn">注册</a> -->
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

</div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#dologin').click(function () {
            event.preventDefault();
            var name1 = $("#username").val();
            /*document.getElementsById("username").value;*/
            var pwd1 = $("#password").val();
            /*document.getElementsById("password").value;*/
            /*            var name1 = document.getElementsByName("username").value;
             var pwd1 = document.getElementsByName("password").value;*/
            if (name1 =='' || pwd1 == '') {
                alert("用户名，密码不能为空");
            } else {
                var params = $('#form-login').serialize();
                dologin(params);
            }
        });


        function dologin(param) {
            $.post('/weixin.php/Mobile/dologin',param, function (data) {
                dealReturn(data)
            });
        }
    });

</script>