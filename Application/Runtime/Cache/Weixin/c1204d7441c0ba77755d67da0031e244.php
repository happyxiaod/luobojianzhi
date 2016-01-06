<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>萝卜兼职-找回密码</title>
    <!--
Coder by Niltor
Email:admin@niltor.net-->
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://lib.geethin.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/luobo/Public/default/css/gt-mobile.css"/>
<link rel="stylesheet" href="/luobo/Public/default/css/gt.weixin.css"/>
<script src="http://lib.geethin.com/jquery/jquery1.10.2.min.js"></script>
<script src="http://lib.geethin.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/luobo/Public/default/js/geethin.js"></script>
<script src="/luobo/Public/default/js/gtcheck.js"></script>
<script src="/luobo/Public/default/js/gt.weixin.js"></script>
<script>
    var APP_PATH = "/luobo/weixin.php";
    var MOD_PATH = "/luobo/weixin.php";
    var CON_PATH = "/luobo/weixin.php/Mobile";
    var SEL_PATH = "/luobo/weixin.php/Mobile/pageFindPwd";
    var ACT_PATH = "/luobo/weixin.php/Mobile/pageFindPwd";
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
                找回密码
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <!-- 主体内容 -->
    <div class="middle row">
        <div class="gtlyout">

            

            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    手机号
                </div>
                <div class="col-xs-9">
                    <input class="form-control gttv" type="text" name="phone"/>
                </div>
            </div>
            
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                    <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                        图形验证
                    </div>
                    <div class="col-xs-5">
                        <input class="form-control gttv" type="text" id="input_res" name="res" placeholder="请输入计算结果" />
                    </div>
                    <div class="col-xs-4" style="padding:0">
                        <img src="/luobo/weixin.php/Mobile/getValidate"  border="1" onclick= this.src="/luobo/weixin.php/Mobile/getValidate/"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。">
                    </div>
            </div>
            
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    验证码
                </div>
                <div class="col-xs-5">
                    <input class="form-control gttv" type="text" name="phonecaptcha"/>
                </div>
                <div class="col-xs-4" style="padding:0">
                    <button class="btn gtbtn" id="getCaptcha">
                        获取验证码
                    </button>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="text-center" style="margin-top: 10px">

                <button class="btn gtbtn btn-lg input-lg" id="check"
                        style="width:94%">验证手机号码</button>
            </div>
        </div>
    </div>
    <!-- 底部内容 -->
    <div class="footer row">
        <div class="text-center footer" style="margin-top: 15px">
    <div>
        <a href="/luobo/weixin.php/Mobile/login" class="footer-btn">登录</a>
        &nbsp;
      <a href="/luobo/weixin.php/Mobile/reg" class="footer-btn">注册</a>
       <!--  <a href="/luobo/index.php/Home/Index/pageReg" class="footer-btn">注册</a> -->
        &nbsp;
        城市:
        <span class="">
            <a href="/luobo/weixin.php/Mobile/choseArea"><?php echo (session('city')); ?></a>
        </span>
    </div>
    <!--底部导航-->
    <div class="text-center footer-nav" style="margin-top: 8px">
        <a href="/luobo/weixin.php/Jobs/pageJobs">首页</a>
        <a href="/luobo/weixin.php/Mobile/myCenter">我的</a>
        <a href="/luobo/weixin.php/Mobile/download">下载APP</a>
        <a href="/luobo/weixin.php/Mobile/about">关于我们</a>
    </div>

    <div class="">
        <img src="/luobo/Public/default/images/footer.png" width="100%"/>
    </div>

</div>
    </div>
</div>
</body>
</html>
<script>
    var time=60;
    var intervalId;
    $(document).ready(function () {
        $('#getCaptcha').on('click', '', function (event) {
            event.preventDefault();
            doneCaptcha();
        });


        $("#check").on('click', '', function (event) {
            event.preventDefault();
            var captcha=$("input[name='phonecaptcha']").val();
            var phone = $("input[name='phone']").val();
            console.log(captcha + phone);
            $.post(MOD_PATH + "/Mobile/checkPhone",{phonecaptcha:captcha,phone:phone},function(data){
                console.log(data);
                dealReturn(data);
            });

        });
    });

    function doneCaptcha() {
         var data = {"state": 1};
        var input_res =$("#input_res").val();
    if (input_res) {
        phone=$("input[name='phone']").val();
        var reg = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
        if (reg.test(phone)) {
            //alert("号码正确~");
        } else {
            alert("手机号码有误!");
            return;
        }
    
        }else{
            alert("请输入图形验证码");
            return;
        }


         $.post(MOD_PATH+'/Mobile/checkWxCode2',{input_res:input_res},function(data){
                
            if (data =="1") {
                   //改变相关样式
                $("input[name='phone']").attr("readonly", "readonly");

                $("#getCaptcha").attr("disabled", "disabled");
                $("#getCaptcha").css({"background": "gray"});

               $.post(MOD_PATH+'/Mobile/getCaptcha_ok',{"phone":phone},function(data){
                });
                //重新发送提示
                intervalId=setInterval(reGetCaptcha,1000);       

            }else{
                alert("图形验证码不正确");
                return;
            }

            })
    }

    function reGetCaptcha() {
        var btnCaptcha = $("#getCaptcha");
        btnCaptcha.html("重新发送"+time+"秒");
        time--;
        if(time<0) {
            clearInterval(intervalId);
            $("input[name='phonecaptcha']").removeAttr("readonly");
            btnCaptcha.removeAttr("disabled", "disabled");
            btnCaptcha.css({"background": "#F3994F"});
            btnCaptcha.html("获取手机验证码");
            time=60;
        }
    }
</script>