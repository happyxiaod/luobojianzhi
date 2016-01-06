<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>申请者</title>
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
    var SEL_PATH = "/weixin.php/Company/jobSeeker?id=685";
    var ACT_PATH = "/weixin.php/Company/jobSeeker";
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
                职位申请者
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="gtlyout">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="gtlv-auto">
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    <!--左边-->
                    <div class="pull-left" style="max-width: 68%; overflow: hidden; white-space:nowrap;">
                        <div class="text-normal text-bold">
                            <?php echo ($vo["realname"]); ?>
                        </div>
                        <div class="gt-cls " style="font-size: 12px; margin: 5px 0;">
                            <span class="glyphicon glyphicon-home"></span>
                            <?php echo ($vo["school"]); ?>
                        </div>
                        <div class="gt-cls cl-orange" style="font-size: 12px;margin: 5px 0;">
                            <span class="glyphicon glyphicon-phone"></span>
                            <?php echo ($vo["phone"]); ?>
                        </div>
                    </div>

                    <!--右半部分-->
                    <div class="pull-right text-center" style="max-width: 30%; overflow: hidden; white-space:nowrap;margin-top: 16px;">
                        <!--TODO 根据状态显示不同内容-->
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id"/>
                        <?php switch($vo['state']){ case 0: echo('<span class="text-danger"
                                            style="border:1px solid;padding:1px 4px;border-radius: 2px">已拒绝</span>'); break; case 1: echo('<span class="text-success"
                                            style="border:1px solid;padding:1px 4px;border-radius: 2px">已通过</span>'); break; case 2: echo('<a class="text-warning dealResume"
                                            style="border:1px solid #e68f3d;padding:0 4px;border-radius: 2px">查看简历</a>'); break; }; ?>

                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
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

</div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $(".dealResume").on('click', '', function (event) {
            event.preventDefault();
            var id = $(this).siblings("input[name='id']").val();
            location.href=MOD_PATH+'/Company/dealResume?id='+id;
        });
    });
</script>