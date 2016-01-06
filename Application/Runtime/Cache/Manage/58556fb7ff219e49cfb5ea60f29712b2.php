<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>管理登录</title>
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
    var SEL_PATH = "/manage.php/Index/login.html";
    var ACT_PATH = "/manage.php/Index/login";
</script>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="background: #FF9A22;height:90px;">
        <div class="container" style="margin:0 auto 0 auto;">
            <div class="col-md-1"></div>
            <div class="col-md-5" style="padding: 0;">
                <img src="/Public/default/images/manage_login.png" style="margin-top: 7px;"/>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <div class="container" style="margin:110px auto 0 auto;">
            <div class="col-md-1"></div>
            <div class="col-md-10 login-title">
                后台登陆
            </div>
        </div>
        <div class="container-fluid" style="margin:90px auto 0 auto;">
            <div class="col-md-1"></div>
            <div class="col-md-5" style="padding-left: 0;">
                <!-- 登录表单 -->
                <form action="/manage.php/Index/doLogin" method="post">
                    <div class="login-row">
                        <div class="pull-left login-icon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>

                        <input class="login-input input-lg" name="username" type="text" placeholder="用户名">
                    </div>
                    <div class="login-row">
                        <div class="pull-left login-icon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>

                        <input class="login-input input-lg" name="password" type="password" placeholder="密码">
                    </div>
                    <input class="login-btn btn-lg" type="submit" value="登录" style="margin-top: 10px;">
                    <!--<div class="login-box">
                        <input type="checkbox">
                        &nbsp;
                        记住密码
                        &nbsp;
                    </div>-->

                    <!-- <p class="mtop1 ">
                        <span>还没有账号?</span>
                        <a href="/manage.php/Index/register">点此注册</a>
                    </p> -->

                </form>
            </div>
            <div class="col-md-5 text-center" style="padding-right: 0;">
                <img src="/Public/default/images/login_logo.jpg" width="90%" class="pull-right">
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<div class="login-bottom">
    Copyright 2015 luobojianzhi.com
</div>
</body>
</html>