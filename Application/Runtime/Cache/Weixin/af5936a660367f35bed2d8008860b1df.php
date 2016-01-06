<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>企业信息</title>
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
    var SEL_PATH = "/luoboNew/weixin.php/Company/companyInfo";
    var ACT_PATH = "/luoboNew/weixin.php/Company/companyInfo";
</script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="actionbar-back">
            <div class="col-xs-1 text-left" style="padding-left:8px">
                <a href="javascript:" onclick="javascript:history.back(-1)">
                    <span class="glyphicon glyphicon-menu-left"></span>
                </a>
            </div>
            <div class="col-xs-10 text-center actionbar-title">
                企业信息
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 8px">
        <div class="gtlyout" style="padding:16px 4px">
            <div class="col-xs-2 text-right" style="padding:0;margin-top: 10px;">
                头像:
            </div>

            <div class="col-xs-7" style="background:url('companyBG.jpg') no-repeat;width:100%;height:100%;">
                <img class="head-resume" src="<?php echo ($_SESSION['user']['headpic']); ?>"/>
            </div>
            <div class="col-xs-3" style="margin-top: 10px">
                <a href="/luoboNew/weixin.php/Mobile/uploadhead">
                    <span class="cl-orange">
                        修改
                    </span>
                    <span class=""></span>
                </a>
            </div>
        </div>
        <div class="gtlyout" style="line-height: 36px;">
            <form action="" id="form-company">
                <div class="col-xs-3 text-right" style="padding:0">
                    企业名称:
                </div>
                <div class="col-xs-9" style="padding-left:0">
                    <input class="form-control" type="text" name="companyname" value="<?php echo ($company["companyname"]); ?>"/>

                </div>

                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    城市:
                </div>
                <div class="col-xs-3" style="padding:0 1px">
                    <select class="form-control" name="province" id="province"
                            style="border-radius: 1px">
                        <option value="">省份</option>
                        <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--TODO 判定选中-->
                            <option value="<?php echo ($vo["id"]); ?>"
                            <?php if($company['province']==$vo['name']){ echo('selected="selected"'); } ?>
                                    ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="col-xs-3" style="padding:0 1px">
                    <select class="form-control" name="city" id="city"
                            style="border-radius: 1px">

                        <!--<option value="<?php echo ($company["city"]); ?>"><?php echo ($company["city"]); ?></option>-->
                        <option value="<?php echo ($company["city"]); ?>"
                                ><?php echo ($company["city"]); ?></option>
                    </select>
                </div>
                <div class="col-xs-3" style="padding-left:0">
                    <select class="form-control" name="county" id="county"
                            style="border-radius: 1px">
                        <option value="<?php echo ($company["county"]); ?>">区县</option>
                    </select>
                </div>
                <div class="clearfix"></div>

                <div class="col-xs-3 text-right" style="padding:0">
                    详细地址:
                </div>
                <div class="col-xs-9" style="padding-left:0">
                    <input class="form-control " type="text" name="address" value="<?php echo ($company["address"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    企业类型:
                </div>
                <div class="col-xs-9" style="padding-left:0">

                    <input class="form-control" name="companytype" type="text" value="<?php echo ($company["companytype"]); ?>"/>

                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    联系方式:
                </div>
                <div class="col-xs-9" style="padding-left:0">
                    <input class="form-control " type="text" value="<?php echo ($company["phone"]); ?>" name="phone"/>
                </div>
                <div class="clearfix"></div>
                <!--证件上传-->
                <div class="col-xs-3 text-right" style="padding:0">
                    证件信息:
                </div>
                <div class="col-xs-9 text-right">
                    <a href="/luoboNew/weixin.php/Company/uploadCredentials">
                        <span class="cl-orange">
                            查看/修改
                        </span>
                    </a>
                </div>

                <div class="clearfix">
                </div>


                <div class="col-xs-3 text-right" style="padding:0">
                    <span class="cl-orange">企业简介:</span>
                </div>
                <div class="col-xs-9"></div>
                <div class="clearfix"></div>
                <div class="col-xs-12">
                    <textarea class="form-control" name="intro" rows="4"><?php echo ($company["intro"]); ?></textarea>
                </div>
            </form>
        </div>
        <div class="gt-rowdivide"></div>
        <div class="text-center">
            <img src="/luoboNew/Public/default/images/apply1.png" width="90%" height="48px"
                    id="updatecompanyinfo"/>
        </div>
    </div>
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
    $(document).ready(function () {
        getCity($("#province").val());
        $("#province").change(function () {
            var pid = $(this).val();
            getCity(pid);
        });

        $("#city").change(function() {
            getCounty();
        });
        $("#updatecompanyinfo").on('click', '', function (event) {
            event.preventDefault();
            var params=$("#form-company").serialize();
            $.post(MOD_PATH+'/Company/doUpdateCompanyInfo',params,function(data) {
                dealReturn(data);
            });

        });

    });
    //更新城市
    function getCity(pid) {
        $.post(MOD_PATH+'/Setting/getCitys',{"pid":pid},function(data){
            var str = "";
            for (i = 0;  i < data.length;i++) {
                if(data[i]['name']=="<?php echo ($company["city"]); ?>")
                {
                    str+='<option value="'+data[i]['name']+'" selected="selected">'+data[i]['name']+'</option>';
                }else{
                    str+='<option value="'+data[i]['name']+'">'+data[i]['name']+'</option>';
                }
            }
            $("#city").html(str);

            getCounty();
            console.log(data);
        })
    }

    //更新区县
    function getCounty() {
        var cityname = $("#city").val();
        $.post(MOD_PATH+'/Setting/getCountys',{"cityname":cityname},function(data){
            var str = "";
            for (i = 0;  i < data.length;i++) {
                if(data[i]['name']=="<?php echo ($company["county"]); ?>")
                {
                    str+='<option value="'+data[i]['name']+'" selected="selected">'+data[i]['name']+'</option>';
                }else{
                    str+='<option value="'+data[i]['name']+'">'+data[i]['name']+'</option>';
                }
            }
            $("#county").html(str);
            console.log(data);
        })
    }
</script>