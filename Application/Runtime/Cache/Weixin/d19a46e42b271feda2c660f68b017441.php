<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>筛选兼职</title>
    <!--
Coder by Niltor
Email:admin@niltor.net-->
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/Public/new/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/default/css/gt-mobile.css"/>
<link rel="stylesheet" href="/Public/default/css/gt.weixin.css"/>
<script src="/Public/new/js/jquery.js"></script>
<script src="/Public/new/js/bootstrap.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.weixin.js"></script>
<script>
    var APP_PATH = "/weixin.php";
    var MOD_PATH = "/weixin.php";
    var CON_PATH = "/weixin.php/Mobile";
    var SEL_PATH = "/weixin.php/Mobile/choseOther";
    var ACT_PATH = "/weixin.php/Mobile/choseOther";
</script>
</head>
<body>
<div class="container-fluid">
    <div class="middle row">
        <div class="gtlyout bg-lightgray" style="padding:0">

            <!--二级分类-->
            <?php if(is_array($countys)): $i = 0; $__LIST__ = $countys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" value="<?php echo ($vo2["name"]); ?>"/>

                <div class="gtlv-single">
                    <div class="gttv">
                        <a href="pageJobs?county=<?php echo ($vo2["name"]); ?>"><?php echo ($vo["name"]); ?>
                        </a>
                        <!--<span class="badge pull-right"
                              style="margin-top:15px;background: #e07a00;margin-right:8px;">
                            <?php echo ($vo["number"]); ?>
                        </span>-->
                    </div>

                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>

</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $(".gtlv-single").on('click', '', function (event) {
            event.preventDefault();
            var name = $(this).find("a").html();
            name = $.trim(name);
            console.log(name);
            location.href = MOD_PATH + "/Jobs/pageJobs?county=" + name;
        });
    });
</script>