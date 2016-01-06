<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择发布时间</title>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <link rel="stylesheet" type="text/css" href="/Public/newWeixin/base.css">
    <link rel="stylesheet" type="text/css" href="/Public/newWeixin/swopCity.css">
</head>
<body>
    <header>
        <a href="" class="demo-icon return">&#xe801;</a>
        <span>发布时间</span>
    </header>

    <section>
        <div>
            <ul>
                <li><a href="/weixin.php/Jobs/pageJobs?time=day">今天<b><?php echo ($daycount); ?></b></a></li>
                <li><a href="/weixin.php/Jobs/pageJobs?time=three">三天内<b><?php echo ($threecount); ?></b></a></li>
                <li><a href="/weixin.php/Jobs/pageJobs?time=week">一周内<b><?php echo ($weekcount); ?></b></a></li>
                <li><a href="/weixin.php/Jobs/pageJobs?time=month">一个月内<b><?php echo ($monthcount); ?></b></a></li>
            </ul>
        </div>
    </section>
</body>
</html>