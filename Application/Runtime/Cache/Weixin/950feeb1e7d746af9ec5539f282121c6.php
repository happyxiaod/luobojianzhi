<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的收藏</title>
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
    var SEL_PATH = "/weixin.php/Seeker/myCollect";
    var ACT_PATH = "/weixin.php/Seeker/myCollect";
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
                我的收藏
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="gtlyout" style="padding:0; padding-top: 5px;">
            <?php if(is_array($collectlist)): $i = 0; $__LIST__ = $collectlist;if( count($__LIST__)==0 ) : echo "该类别暂时没有职位信息！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="gtlv-auto">
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>

                    <div class="pull-left" style="max-width: 58%; overflow: hidden; white-space:nowrap;">
                        <div class="text-normal text-bold">

                            <!--TODO 是否推荐-->
                            <!--<span style="color:red;font-size:14px;">荐</span>-->
                            <a href="/weixin.php/Jobs/pageJobDetail?id=<?php echo ($vo["id"]); ?>"
                                    style="color:black">
                                <?php echo (mb_substr($vo["title"],0,10,'utf-8')); ?>
                            </a>


                        </div>
                        <div class="gt-cls cl-lightgray" style="font-size: 12px; margin: 5px 0;">
                            <img src="/Public/default/images/area.png" alt="" width="10px"
                                 style="margin: -3px 3px 0 0;"/>
                            &nbsp;<?php echo ($vo["area"]); ?>
                        </div>
                        <div class="gt-cls cl-lightgray" style="font-size: 12px;margin: 5px 0;">
                            <img src="/Public/default/images/date.png" alt="" width="10px"
                                 style="margin: -2px 3px 0 0;"/>
                            &nbsp;<?php echo ($vo["date"]); ?>
                        </div>
                    </div>

                    <!--右半部分-->
                    <div class="pull-right" style="max-width: 40%; overflow: hidden; white-space:nowrap;">
                        <div class="text-right" style="margin-bottom: 15px">
                            <!--TODO 根据状态变化背景图片-->
                            <?php if($vo.state==0){ echo('<span class="jobs-state">报名中</span>'); }else if($vo.state==2){ echo('<span class="jobs-state">已过期</span>'); }else{ echo('<span class="jobs-state">已报满</span>'); } ?>
                        </div>

                        <div class="cl-orange text-normal">
                            <?php echo ($vo["price"]); ?>
                        </div>

                    </div>
                </div><?php endforeach; endif; else: echo "该类别暂时没有职位信息！" ;endif; ?>
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