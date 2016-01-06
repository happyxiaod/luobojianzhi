<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>证件上传</title>
    <!--
Coder by Niltor
Email:admin@niltor.net-->
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://lib.geethin.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/luoboNew/Public/default/css/gt-mobile.css"/>
<link rel="stylesheet" href="/luoboNew/Public/default/css/gt.weixin.css"/>
<script src="http://lib.geethin.com/jquery/jquery1.10.2.min.js"></script>
<script src="http://lib.geethin.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/luoboNew/Public/default/js/geethin.js"></script>
<script src="/luoboNew/Public/default/js/gtcheck.js"></script>
<script src="/luoboNew/Public/default/js/gt.weixin.js"></script>
<script>
    var APP_PATH = "/luoboNew/weixin.php";
    var MOD_PATH = "/luoboNew/weixin.php";
    var CON_PATH = "/luoboNew/weixin.php/Company";
    var SEL_PATH = "/luoboNew/weixin.php/Company/uploadCredentials";
    var ACT_PATH = "/luoboNew/weixin.php/Company/uploadCredentials";
</script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="actionbar-back">
            <div class="col-xs-1 text-left" style="padding-left:8px   background:url('/luoboNew/Public/default/images/companyBG') no-repeat;width:90%;height:90%;"  >
                <a href="javascript:" onclick="javascript:history.back(-1)">
                    <span class="glyphicon glyphicon-menu-left"></span>
                </a>
            </div>
            <div class="col-xs-10 text-center actionbar-title">
                证件上传
            </div>
            <div class="col-xs-1 text-right">
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 8px">
        <div class="gtlyout text-center" style="padding:16px 4px">
            <div class="col-xs-7">
                <img class="credentail-upload curs-pt" src="<?php echo ($credentialpic); ?>" id="credentialpic"/>
                <input type="file" name="credentialpic" accept="image/*"/>
            </div>
            <div class="col-xs-5" style="padding-top: 30px">
                <span class="text-danger">*法人身份证照</span>
                <br/>
                <span class="text-danger">*点击图片区域即可上传</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 8px">
        <div class="gtlyout text-center" style="padding:16px 4px">
            <div class="col-xs-7">
                <img class="credentail-upload curs-pt" src="<?php echo ($orgauth); ?>" id="orgauth"/>
                <input type="file" name="orgauth" accept="image/*"/>
            </div>
            <div class="col-xs-5" style="padding-top: 30px">
                <span class="text-danger">*企业营业执照</span>
                 <br/>
                <span class="text-danger">*点击图片区域即可上传</span>
            </div>
        </div>
    </div>
   <span id="saveupload" style="border:1px solid orange;border-radius: 3px;color:#666;margin-left:130px;">
  返回</span> 


    <div class="row">
        <div class="text-center footer" style="margin-top: 15px">
    <div>
        <a href="/luoboNew/weixin.php/Mobile/login" class="footer-btn">登录</a>
        &nbsp;
      <a href="/luoboNew/weixin.php/Mobile/reg" class="footer-btn">注册</a>
       <!--  <a href="/luoboNew/index.php/Home/Index/pageReg" class="footer-btn">注册</a> -->
        &nbsp;
        城市:
        <span class="">
            <a href="/luoboNew/weixin.php/Mobile/choseArea"><?php echo (session('city')); ?></a>
        </span>
    </div>
    <!--底部导航-->
    <div class="text-center footer-nav" style="margin-top: 8px">
        <a href="/luoboNew/weixin.php/Jobs/pageJobs">首页</a>
        <a href="/luoboNew/weixin.php/Mobile/myCenter">我的</a>
        <a href="/luoboNew/weixin.php/Mobile/download">下载APP</a>
        <a href="/luoboNew/weixin.php/Mobile/about">关于我们</a>
    </div>

    <div class="">
        <img src="/luoboNew/Public/default/images/footer.png" width="100%"/>
    </div>

</div>
    </div>
</div>
</body>
</html>

<script>

    var img;//图片上传数据
    $(document).ready(function () {
        $("input[name='credentialpic']").hide();
        $("#credentialpic").on('click', '', function (event) {
            event.preventDefault();
            $("input[name='credentialpic']").click();

        });
         $("#orgauth").on('click', '', function (event) {
            event.preventDefault();
            $("input[name='orgauth']").click();

        });
        //选择图片并显示预览图并上传
        $("input[name='credentialpic']").on('change', '', function (event) {
            event.preventDefault();
            var files = this.files;
            var file = files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                img=this.result;
                $("#credentialpic").attr('src',this.result);
                postfile(MOD_PATH + '/Mobile/uploadFile',file,"idobverse");
            };
        });

         $("input[name='orgauth']").on('change', '', function (event) {
            event.preventDefault();
            var files = this.files;
            var file = files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                img=this.result;
                $("#orgauth").attr('src',this.result);
                postfile(MOD_PATH + '/Mobile/uploadFile',file,"orgauth");
            };
        });

          $("#saveupload").on('click', '', function (event) {
            event.preventDefault();
            window.history.back(-1);
        });

    });
</script>