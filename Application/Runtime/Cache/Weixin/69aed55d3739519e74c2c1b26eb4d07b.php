<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>萝卜兼职-设置新密码</title>
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
    var SEL_PATH = "/weixin.php/Mobile/pageFindPwd2/id/16272/type/seeker.html";
    var ACT_PATH = "/weixin.php/Mobile/pageFindPwd2";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
    <div class="header row">
        <div class="actionbar-back">
            <div class="col-xs-1 text-left" style="padding-left:8px">
                <a href="javascript:" onclick="javascript:history.back(-1)">
                    <span class="glyphicon glyphicon-menu-left"></span>
                </a>
            </div>
            <div class="col-xs-10 text-center actionbar-title">
                设置新密码
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <!-- 主体内容 -->
    <div class="middle row">
        <div class="gtlyout">
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 2px">
                    新的密码
                </div>
                <div class="col-xs-9" style="padding-left:0">
                    <input class="form-control gttv" type="text" name="password"/>
                </div>
            </div>
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 2px">
                    确认密码
                </div>
                <div class="col-xs-9" style="padding-left:0">
                    <input class="form-control gttv" type="text" name="repassword"/>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="text-center" style="margin-top: 10px">

                <button class="btn gtbtn btn-lg input-lg" id="checkpassword"
                        style="width:94%">更改密码</button>
            </div>
        </div>
    </div>
    <!-- 底部内容 -->
    <div class="footer row">
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

</div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#checkpassword").on('click', '', function (event) {
            event.preventDefault();
            var password = $("input[name='password']").val();
            var repassword = $("input[name='repassword']").val();

            if(password != repassword) {
                alert("两次密码不一致");
            }else{
                $.post(MOD_PATH+"/Mobile/setPassword?type=<?php echo ($type); ?>&id=<?php echo ($id); ?>",{password:password},function(data){
                    dealReturn(data);
                });
            }
        });
    });
</script>