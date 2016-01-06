<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查看简历</title>
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
    var CON_PATH = "/weixin.php/Company";
    var SEL_PATH = "/weixin.php/Company/dealResume?id=9268";
    var ACT_PATH = "/weixin.php/Company/dealResume";
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
                查看简历
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="gt-rowdivide" style="height:8px">
        </div>
        <div class="gtlyout" style="line-height: 36px;">
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="padding:0 4px">
                    姓名：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["realname"]); ?>
                </div>
            </div>

            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    性别：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["sex"]); ?>
                </div>
            </div>

            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    城市：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["area"]); ?>
                </div>
            </div>

            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    学校：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["school"]); ?>
                </div>
            </div>

            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    年级：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["schoolyear"]); ?>
                </div>
            </div>
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    手机：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["phone"]); ?>
                </div>
            </div>
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    ＱＱ：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["qq"]); ?>
                </div>
            </div>
        </div>

        <div class="gtlyout">
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    理想职位：
                </div>
                <div class="col-xs-9">
                    <?php echo ($seeker["aimposition"]); ?>
                </div>
            </div>
        </div>
        <div class="gtlyout">
            <div class="col-xs-12" style="margin-top: 8px;padding:0">
                <div class="col-xs-3 text-right" style="line-height: 36px;padding:0 4px">
                    自我介绍：
                </div>
                <div class="col-xs-9">
                </div>
            </div>
            <div class="col-xs-12">
                <?php echo ($seeker["intro"]); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="gttab text-center">
            <input type="hidden" value="<?php echo ($seeker["id"]); ?>" id="uid"/>
            <div class="col-xs-6 gtbtn" id="noagree" style="background: white;border:1px solid orange;padding:0 2px">
                <span class="text-lg cl-orange">
                    未通过
                </span>
            </div>

            <div class="col-xs-6 gtbtn" id="agree" style="border-right:2px solid #b27926;padding:0 2px">
                <span class="text-lg">
                    通过
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#noagree").on('click', '', function (event) {
            event.preventDefault();
            var uid = $(this).siblings("#uid").val();
            $.post(MOD_PATH+'/Company/agreeApply',
                    {
                        'uid':uid,
                        'state':0
                    },function(data) {
                        dealReturn(data);
                    })
        });
        $("#agree").on('click', '', function (event) {
            event.preventDefault();
            var uid = $(this).siblings("#uid").val();
            $.post(MOD_PATH+'/Company/agreeApply',
                    {
                        'uid':uid,
                        'state':1
                    },function(data) {
                        dealReturn(data);
                    })
        });
    });
</script>