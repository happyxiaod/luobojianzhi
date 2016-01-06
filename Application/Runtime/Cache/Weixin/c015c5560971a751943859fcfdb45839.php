<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>意见反馈</title>
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
    var CON_PATH = "/weixin.php/Setting";
    var SEL_PATH = "/weixin.php/Setting/feedback";
    var ACT_PATH = "/weixin.php/Setting/feedback";
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
                意见反馈
            </div>
            <div class="col-xs-1 text-right">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="gtlyout cl-lightgray">
            <form action="/weixin.php/Setting/doFeedBack" method="post">
                <label>你的建议是对我们最大的支持：</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
                <div class="gt-rowdivide"></div>
                <input type="submit" class="btn btn-warning form-control input-lg btn-lg" value="提交反馈"/>
            </form>
        </div>

    </div>
    <div class="row">

    </div>
    
</div>
</body>
</html>
<script>
    
</script>