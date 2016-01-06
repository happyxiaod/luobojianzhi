<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑职位</title>
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
    var SEL_PATH = "/weixin.php/Company/editJob?id=788";
    var ACT_PATH = "/weixin.php/Company/editJob";
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
                编辑职位
            </div>
            <div class="col-xs-1 text-right">

            </div>
        </div>
    </div>
    <div class="row">
        <form action="" id="form-job">
            <div class="gtlyout" style="line-height: 36px">
                <input type="hidden" name="id" value="<?php echo ($job["id"]); ?>"/>

                <div class="col-xs-3 text-right" style="padding:0">
                    行业分类:
                </div>
                <div class="col-xs-9">

                    <select name="level1" id="choselevel1" class="form-control">
                        <option value="">选择行业</option>
                        <?php if(is_array($level1)): $i = 0; $__LIST__ = $level1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"
                            <?php if($job['level1']==$vo['name']){ echo('selected="selected"'); } ?>
                            ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    职业岗位:
                </div>
                <div class="col-xs-9">
                    <select name="level2" id="choselevel2" class="form-control">
                        <option value="<?php echo ($job["level2"]); ?>"><?php echo ($job["level2"]); ?></option>

                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    职位名称:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="text" name="title" value="<?php echo ($job["title"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    详细地址:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="text" name="address" value="<?php echo ($job["address"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    薪资待遇:
                </div>
                <div class="col-xs-4" style="padding-right:0">
                    <input class="form-control" type="text" name="price" value="<?php echo ($job["price"]); ?>"/>
                </div>
                <div class="col-xs-4" style="padding-left:0">
                    <select name="pricetype" class="form-control">
                        <option value="元/时"
                        <?php if($job['pricetype']=="元/时"){ echo('selected="selected"'); } ?>
                        >元/时</option>
                        <option value="元/天"
                        <?php if($job['pricetype']=="元/天"){ echo('selected="selected"'); } ?>
                        >元/天</option>
                        <option value="元/月"
                        <?php if($job['pricetype']=="元/月"){ echo('selected="selected"'); } ?>
                        >元/月</option>
                        <option value="元/次、件"
                        <?php if($job['pricetype']=="元/次、件"){ echo('selected="selected"'); } ?>
                        >元/次、件</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    结算方式:
                </div>
                <div class="col-xs-9">
                    <select name="paytype" class="form-control">
                        <option value="日结"
                        <?php if($job['paytype']=="日结"){ echo('selected="selected"'); } ?>
                        >日结</option>
                        <option value="周结"
                        <?php if($job['paytype']=="周结"){ echo('selected="selected"'); } ?>
                        >周结</option>
                        <option value="月结"
                        <?php if($job['paytype']=="月结"){ echo('selected="selected"'); } ?>
                        >月结</option>
                        <option value="按量(次)结"
                        <?php if($job['paytype']=="按量(次)结"){ echo('selected="selected"'); } ?>
                        >按量(次)结</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    招聘人数:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="number" name="number" value="<?php echo ($job["number"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    工作日期:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" name="workdate" value="<?php echo ($job["workdate"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    工作时间:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" name="worktime" value="<?php echo ($job["worktime"]); ?>"/>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-3 text-right" style="padding:0">
                    截止日期:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="date" name="endtime" value="<?php echo (substr($job["endtime"],0,10)); ?>"/>
                </div>
                <div class="clearfix"></div>

            </div>

            <div class="gt-rowdivide">
            </div>

            <div class="gtlyout">
                <div class="col-xs-12">
                <span class="cl-orange">
                    职位描述：
                </span>
                </div>

                <div class="clearfix"></div>

                <div class="col-xs-12">
                    <textarea class="form-control" name="intro" rows="8"><?php echo ($job["intro"]); ?></textarea>
                </div>
            </div>

            <div class="gtlyout" style="line-height: 36px">
                <div class="col-xs-3 text-right" style="padding:0">
                    联系人:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="text" name="contacter" value="<?php echo ($job["contacter"]); ?>"/>
                </div>
                <div class="clearfix"></div>

                <div class="col-xs-3 text-right" style="padding:0">
                    联系电话:
                </div>
                <div class="col-xs-9">
                    <input class="form-control" type="text" name="phone" value="<?php echo ($job["phone"]); ?>"/>
                </div>
                <div class="clearfix"></div>

            </div>
        </form>
        <div class="gt-rowdivide"></div>
        <div class="text-center">
            <button class="btn btn-warning form-control btn-lg input-lg"
                    style="width:98%" id="editjob"/>
            修改</button>

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
        $("#choselevel1").on('change', '', function (event) {
            event.preventDefault();
            var id = $(this).val();
            $.post(MOD_PATH + "/Company/getLevel2", {'id': id}, function (data) {
                var str = "";
                for (var i = 0; i < data.length; i++) {
                    str += '<option value="' + data[i]['name'] + '">' + data[i]['name'] + '</option>';
                }
                $("#choselevel2").html(str);
                console.log(data);
            })
        });

        $("#editjob").on('click', '', function (event) {
            event.preventDefault();
            var params = $("#form-job").serialize();
            console.log(params);
            $.post(MOD_PATH + "/Company/doUpdateJob", params, function (data) {
                dealReturn(data);
            })
        });

    });
</script>