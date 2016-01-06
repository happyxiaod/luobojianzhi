<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>申请记录</title>
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
    var SEL_PATH = "/weixin.php/Seeker/applyRecord";
    var ACT_PATH = "/weixin.php/Seeker/applyRecord";
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
                申请记录
            </div>
            <div class="col-xs-1 text-right">
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(is_array($applylist)): $i = 0; $__LIST__ = $applylist;if( count($__LIST__)==0 ) : echo "该类别暂时没有职位信息！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="gtlv-auto">
                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                <!--左边-->
                <div class="wx-circle pull-left text-center" style="width:20%;padding:0">
                    <?php echo ($vo["level2"]); ?>
                </div>

                <div class="pull-right" style="width:80%;padding:0;">
                    <!--第一行内容-->
                    <div>
                        <div class="col-xs-9" style="overflow: hidden; white-space:nowrap;">
                            <div class="text-bold">
                                <a href="/weixin.php/Jobs/pageJobDetail?id=<?php echo ($vo["jobid"]); ?>"
                                        style="color:#000000">
                                    <?php echo ($vo["title"]); ?>
                                </a>

                            </div>
                        </div>
                        <!--右半部分-->
                        <div class="col-xs-3" style="padding:0;overflow: hidden; white-space:nowrap;">
                            <div class="text-right" >
                                <!--TODO 根据状态变化背景图片-->
                                <?php if($vo['state']==2){ echo('<span class="text-warning text-normal">待处理</span>'); }else if($vo['state']==0){ echo('<span class="text-danger text-normal">已拒绝</span>'); }else{ echo('<span class="text-success text-normal">已通过</span>'); } ?>
                            </div>
                        </div>
                    </div>
                    <!--第二行内容-->
                    <div>
                        <div class="col-xs-8" style="overflow: hidden; white-space:nowrap;">
                            <div class="gt-cls cl-lightgray" style="font-size: 12px; margin: 5px 0;">
                                <img src="/Public/default/images/area.png" alt="" width="10px" style="margin: -3px 3px 0 0;"/>
                                &nbsp;<?php echo ($vo["area"]); ?>
                            </div>
                            <div class="gt-cls cl-lightgray" style="font-size: 12px;margin: 5px 0;">
                                <img src="/Public/default/images/date.png" alt="" width="10px" style="margin: -2px 3px 0 0;"/>
                                &nbsp;<?php echo ($vo["date"]); ?>
                            </div>
                        </div>

                        <!--右半部分-->
                        <div class="col-xs-4 text-right" style="padding:0;overflow: hidden; white-space:nowrap;">
                            <div class="cl-orange text-bold text-right" style="margin-top:12px">
                                <input type="hidden" value="<?php echo ($vo["id"]); ?>" id="applyid"/>
                                <?php if($vo['state']==2){ echo('<span style="border:1px solid orange;border-radius: 3px;padding:1px 4px" class="cancelApply">取消报名</span>'); } ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div><?php endforeach; endif; else: echo "该类别暂时没有职位信息！" ;endif; ?>
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
        setCircle();
        $(".cancelApply").on('click', '', function (event) {
            event.preventDefault();
            var id = $(this).siblings("#applyid").val();
            $.post(MOD_PATH+'/Seeker/cancelApply',{'id':id},function(data) {
                dealReturn(data);
            });
        });
    });

    //设置列表最前面那列的圆颜色方法
    function setCircle() {
        var colour = ["#E4007F", "#00A0E9", "#F39800", "#996C33"];
        $(".wx-circle").each(function () {
            var index = Math.floor(Math.random() * colour.length);
            back = colour[index];
            $(this).attr("style", "border:1px solid" + back + ";color:" + back);
        })
    }

</script>