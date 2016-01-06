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
    var CON_PATH = "/luoboNew/weixin.php/Mobile";
    var SEL_PATH = "/luoboNew/weixin.php/Mobile/reg";
    var ACT_PATH = "/luoboNew/weixin.php/Mobile/reg";
</script>
    <title>注册</title>
</head>
<body>
<div class="container-fluid">
    <!--头部-->
    <div class="row">
        <div class="actionbar-back">
            <div class="col-xs-1 text-left" style="padding-left:8px">
                <a href="javascript:" onclick="javascript:history.back(-1)">
                    <span class="glyphicon glyphicon-menu-left"></span>
                </a>
            </div>
            <div class="col-xs-10 text-center actionbar-title">
                注册
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>

    <!--注册表单-->
    <div class="row">
        <div class="gt-rowdivide" style="height:8px">
        </div>
        <form action="/luoboNew/weixin.php/Mobile/doReg" method="post" id="form-reg">
            <!--类型选择-->
            <div class="gtlyout">
                <div class="col-xs-4 text-center" style="padding:0;padding-left:4px">
                    <input type="radio" value="seeker" name="type" checked="checked"/>
                    <span class="login-type">求职者</span>
                </div>

                <div class="col-xs-4 text-center" style="padding:0">
                    <input type="radio" value="company" name="type"/>
                    <span class="login-type">企业机构</span>

                </div>
                <div class="col-xs-4 text-center" style="padding:0">
                    <input type="radio" value="school" name="type"/>
                    <span class="login-type">学校机构</span>
                </div>
            </div>

            <div class="gt-rowdivide" style="height:8px"></div>
            <div class="gtlyout">
                <div class="choseschool">
                    <div class="col-xs-12" style="margin-top: 8px;padding:0">
                        <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                            所在学校
                        </div>
                        <div class="col-xs-4">
                            <select name="province" class="form-control gttv" >
                                <option value="">省</option>
                                <?php if(is_array($provinces)): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>

                        </div>
                        <div class="col-xs-5">
                            <select name="city" class="form-control gttv" id="cityList">
                                <option value="">城市</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top: 8px;padding:0">
                        <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">

                        </div>
                        <div class="col-xs-9">
                            <select name=school class="form-control gttv" id="schoolList">
                                <option value="">学校</option>
                            </select>
                        </div>
                    </div>
                </div>

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
                        <input class="form-control gttv" type="text" id="input_res" name="res" placeholder="请输入" />
                    </div>
                    <div class="col-xs-4" style="padding:0">
                    <!--thinkphp 自带验证码-->
                        <img src="/luoboNew/weixin.php/Mobile/getThinkCode"  border="1" onclick= this.src="/luoboNew/weixin.php/Mobile/getThinkCode/"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。"/>
                        <!--算数验证码-->
                       <!--  <img src="/luoboNew/weixin.php/Mobile/getValidate"  border="1" onclick= this.src="/luoboNew/weixin.php/Mobile/getValidate/"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。"> -->
                        
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


                <div class="col-xs-12" style="margin-top: 8px;padding:0">
                    <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                        密码
                    </div>
                    <div class="col-xs-9">
                        <input class="form-control gttv" type="password" name="password"/>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 8px;padding:0">
                    <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                        确认密码
                    </div>
                    <div class="col-xs-9">
                        <input class="form-control gttv" type="password" name="repassword"/>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 8px;padding:0">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-9">
                        <input type="checkbox" name="agree" value="yes"/>
                        <a href="/luoboNew/weixin.php/Mobile/agreement"> 我已同意《萝卜兼职协议条款》
                        </a>
                    </div>
                </div>
            </div>
            <div class="gtlyout text-center" style="margin-top:-6px;padding:16px 4px;margin-bottom: 16px">
                <img class="curs-pt" src="/luoboNew/Public/default/images/apply1.png" id="doReg"
                     style="width:94%;height: 48px"/>
            </div>
        </form>
    </div>
    <!--底部-->
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
    var time=60;
    var intervalId;
    $(document).ready(function () {
        //判定是否为求职者注册，显示学校内容
        var type = $("input[name='type']").val();
        $("input[name='type']").on('change','',function() {
            type=$(this).val();

            switch (type) {
                case 'seeker':
                    $(".choseschool").show();
                    break;
                default:
                    $(".choseschool").hide();
            }
        });
        //验证码
        $('#getCaptcha').on('click', '', function (event) {
            event.preventDefault();
            doneCaptcha();
        });
        
        //点击注册
        $('#doReg').on('click', '', function (event) {
            event.preventDefault();
            params=$("#form-reg").serialize();
            $.post(MOD_PATH+'/Mobile/doReg',params,function(data){
                dealReturn(data);
            })
        });

        //选择省事件
        $("select[name='province']").on('change','',function() {
            var pid=$(this).val();
            jQuery.ajax({
                url: CON_PATH+'/getCityByProvince',
                type: 'POST',
                dataType: '',
                data: {'province': pid},
                complete: function (xhr, textStatus) {
                    //called when complete
                    getSchool();
                },
                success: function (data, textStatus, xhr) {
                    if (data != "failed") {
                        var str = "";
                        $.each(data, function (key, value) {
                            str += "<option value='" + value['name']+"'>";
                            str += value['name']+"</option>";
                        });
                        $("#cityList").html(str);


                    } else {
                        $("#cityList").html("");
                        dealReturn("暂无城市信息");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("获取城市列表失败");
                }
            });

        });

        //选择市事件
        $("select[name='city']").on('change','',function() {
            getSchool();
        });

    });


    function getSchool() {
        var city = $("#cityList").val();
        city = $.trim(city);
        city = city.replace("市", "");
        $.post(CON_PATH+"/getSchoolByCity", {city: city}, function (data) {
            console.log(data);
            if (data != "failed") {
                var str = "";
                $.each(data, function (key, value) {
                    str += "<option value='" + value['school']+"'>";
                    str += value['school']+"</option>";
                });
                $("#schoolList").html(str);
            } else {
                $("#schoolList").html("");
                dealReturn("该城市暂无学校信息");
            }
        });

    }

    function doneCaptcha() {
        var data = {"state": 1};
        var input_res =$("#input_res").val();
        var phone=$("input[name='phone']").val();
    if (input_res) {
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
        $.post(MOD_PATH+'/Mobile/checkWxCode',{input_res:input_res,phone:phone},function(data){
            dealReturn(data);

        $("input[name='phone']").attr("readonly", "readonly");
         $("#getCaptcha").attr("disabled", "disabled");
         $("#getCaptcha").css({"background": "gray"}); 
         intervalId=setInterval(reGetCaptcha,1000); 
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