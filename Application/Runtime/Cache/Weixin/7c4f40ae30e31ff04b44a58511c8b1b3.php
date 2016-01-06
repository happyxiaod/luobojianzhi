<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的简历</title>
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
    var CON_PATH = "/weixin.php/Seeker";
    var SEL_PATH = "/weixin.php/Seeker/myResume";
    var ACT_PATH = "/weixin.php/Seeker/myResume";
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
                我的简历
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 8px">
        <form action="" method="post" id="form-resume">
            <div class="gtlyout" style="padding:16px 4px">
                <div class="col-xs-2 text-right" style="padding:0;margin-top: 10px;">
                    头像:
                </div>
                <div class="col-xs-7">
                    <img class="head-resume" src="<?php echo ($user["headpic"]); ?>"/>
                </div>
                <div class="col-xs-3" style="margin-top: 10px">
                    <a href="/weixin.php/Mobile/uploadhead">
                    <span class="cl-orange">
                        修改
                    </span>
                    </a>
                </div>
            </div>

            <div class="gtlyout" style="line-height: 36px">
                <div class="col-xs-3 text-right" style="padding:0">
                    姓名:
                </div>
                <div class="col-xs-9">
                    <input class="form-control gttv" type="text" name="realname" value="<?php echo ($user["realname"]); ?>"
                            placeholder="请补全姓名"/>

                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    性别:
                </div>
                <div class="col-xs-9">
                    <input type="radio" name="sex" value="男"
                    <?php if($user['sex']!="女") { echo("checked='checked'");}?>
                    />&nbsp;男
                    &nbsp;
                    <input type="radio" name="sex" value="女"
                    <?php if($user['sex']=="女") { echo("checked='checked'");}?>
                    />&nbsp;女
                </div>
            </div>

            <div class="gtlyout" style="line-height: 36px;">
                <div class="col-xs-3 text-right" style="padding:0">
                    城市:
                </div>
                <div class="col-xs-4" style="padding-right:0">
                    <select class="form-control" name="province" id="province"
                            style="border-radius: 1px">
                        <option value="">选择省</option>

                        <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--TODO 判定选中-->
                            <option value="<?php echo ($vo["id"]); ?>"
                                <?php if($user['province']==$vo['name']){ echo('selected="selected"'); } ?>
                                    ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="col-xs-4" style="padding-right:0">
                    <select class="form-control" name="city" id="city"
                            style="border-radius: 1px">

                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    学校:
                </div>
                <div class="col-xs-9">
                    <select class="form-control" name="school" id="school"
                            style="border-radius: 1px">
                        <option value="">选择学校</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    年级:
                </div>
                <div class="col-xs-9">
                    <select class="form-control" name="schoolyear" id="schoolyear"
                            style="border-radius: 1px">
                            <?php if(is_array($year_arr)): foreach($year_arr as $key=>$year): if($year == $user['schoolyear']): ?><option value="<?php echo ($year); ?>"selected><?php echo ($year); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($year); ?>"><?php echo ($year); ?></option><?php endif; endforeach; endif; ?>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    手机:
                </div>
                <div class="col-xs-9">
                    <!--<input class="form-control gttv" type="text"/>-->
                    <?php echo ($user["phone"]); ?>

                </div>

                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    QQ:
                </div>
                <div class="col-xs-9">
                    <input class="form-control gttv" type="text" name="qq" value="<?php echo ($user["qq"]); ?>"/>
                </div>

            </div>

            <div class="gtlyout" style="line-height: 36px;">
                <div class="col-xs-3 text-right" style="padding:0">
                    理想职位:
                </div>
                <div class="col-xs-9">
                    <input class="form-control gttv" type="text"
                            value="<?php echo ($user["aimposition"]); ?>" name="aimposition"/>
                </div>
                <div class="clearfix">
                </div>
                <!--证件上传-->
                <div class="col-xs-3 text-right" style="padding:0">
                    证件上传:
                </div>
                <div class="col-xs-9 text-right">
                    <a href="/weixin.php/Seeker/uploadCredentials">
                        <span class="cl-orange">
                            点击上传
                        </span>
                    </a>
                </div>

                <div class="clearfix">
                </div>

                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    <span class="cl-orange">自我介绍:</span>
                </div>
                <div class="col-xs-9"></div>
                <div class="clearfix"></div>
                <div class="col-xs-12" style="padding:0 8px">
                    <textarea class="form-control" name="intro"><?php echo ($user["intro"]); ?></textarea>
                </div>
            </div>
            <div class="gt-rowdivide"></div>
            <div class="text-center">
                <button class="btn btn-warning form-control btn-lg input-lg"
                        style="width:96%" id="updateresume">确定</button>
                <!--<img src="/Public/default/images/apply1.png" width="98%" height="48px"/>-->
            </div>

        </form>

    </div>
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
        initData();
        updateCity($("#province").val(),true);

        $("#province").change(function() {
            var pid=$(this).val();
            updateCity(pid,true);
        });

        $("#city").change(function() {
            var cityname=$(this).val();
            updateSchool(cityname);
        });


        $("#updateresume").on('click', '', function (event) {
            event.preventDefault();
            var params = $("#form-resume").serialize();
            $.post(MOD_PATH+'/Seeker/doUpdateResume',params,function(data) {
                dealReturn(data);
            });
        });
    });

    //初始化数据
    function initData(){
        var schoolyear = "<?php echo ($user["schoolyear"]); ?>";
        $("#schoolyear").find("option").each(function () {
            if($(this).val()==schoolyear) {
                $(this).attr("selected");
            }
        });

    }
    //更新城市
    function updateCity(pid,isSchool) {
        $.post(MOD_PATH+'/Setting/getCitys',{"pid":pid},function(data){
            var str = "";
            for (i = 0;  i < data.length;i++) {
                if(data[i]['name']=="<?php echo ($user["city"]); ?>") {
                    str+='<option value="'+data[i]['name']+'" selected="selected">'+data[i]['name']+'</option>';
                }else{
                    str+='<option value="'+data[i]['name']+'">'+data[i]['name']+'</option>';

                }
            }
            $("#city").html(str);
            if(isSchool) {
                updateSchool($("#city").val());
            }

        })
    }

    //更新学校
    function updateSchool(cityname) {
        $.post(MOD_PATH+'/Setting/getSchools',{"cityname":cityname},function(data){

            var str = "";
            for (i = 0;  i < data.length;i++) {
                if(data[i]['school']=="<?php echo ($user["school"]); ?>") {
                    str+='<option value="'+data[i]['school']+'" selected="selected">'+data[i]['school']+'</option>';
                }else{
                    str+='<option value="'+data[i]['school']+'">'+data[i]['school']+'</option>';
                }
            }
            $("#school").html(str);
            console.log(data);
        })
    }

</script>