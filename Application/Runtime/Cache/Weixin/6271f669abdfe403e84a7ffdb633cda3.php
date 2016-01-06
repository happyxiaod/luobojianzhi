<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($job["title"]); ?></title>
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
    var CON_PATH = "/weixin.php/Jobs";
    var SEL_PATH = "/weixin.php/Jobs/pageJobDetail?id=1512";
    var ACT_PATH = "/weixin.php/Jobs/pageJobDetail";
</script>
</head>
<body>
<div class="container-fluid">
    <div class="header row">
        <div class="actionbar-back">
            <div class="col-xs-2 text-left" style="padding-left:8px">
                <a href="javascript:" onclick="javascript:history.back(-1)">
                    <span class="glyphicon glyphicon-menu-left"></span>
                </a>
            </div>
            <div class="col-xs-8 text-center actionbar-title">
                职位详情
            </div>
            <div class="col-xs-2 text-right" style="font-size: 18px">
                <!--MOB SHARE BEGIN-->
                <div class="-mob-share-open curs-pt">
                    <span class="glyphicon glyphicon-share"></span>
                </div>
                <div class="-mob-share-ui" style="display: none">
                    <ul class="-mob-share-list">
                        <li class="-mob-share-weixin"><p>微信</p></li>
                        <li class="-mob-share-weibo"><p>新浪微博</p></li>
                        <li class="-mob-share-tencentweibo"><p>腾讯微博</p></li>
                        <li class="-mob-share-qzone"><p>QQ空间</p></li>
                        <!--<li class="-mob-share-qq"><p>QQ好友</p></li>-->
                        <li class="-mob-share-douban"><p>豆瓣</p></li>
                        <li class="-mob-share-renren"><p>人人网</p></li>
                        <!--<li class="-mob-share-kaixin"><p>开心网</p></li>
                        <li class="-mob-share-facebook"><p>Facebook</p></li>
                        <li class="-mob-share-twitter"><p>Twitter</p></li>-->
                    </ul>
                    <div class="-mob-share-close">取消</div>
                </div>
                <div class="-mob-share-ui-bg"></div>
                <script id="-mob-share" src="http://f1.webshare.mob.com/code/mob-share.js?appkey=92985f34d553"></script>
                <!--MOB SHARE END-->
            </div>
        </div>
    </div>
    <div class="middle row">
        <div class="gtlyout bg-lightgray" style="padding:0">
    <div class="gt-rowdivide"></div>

    <div class="gtlyout" style="padding:4px 8px">

        <span class="text-normal">
            <?php echo ($job["title"]); ?>
        </span>
        <br/>
        <span><?php echo ($job["date"]); ?></span> &nbsp;
        <span>浏览量:<?php echo ($job["view"]); ?></span>
        <br/>
        <span class="text-normal">
            <?php echo ($job["level2"]); ?>
        </span>
        <span class="cl-orange" style="font-size:16px">
            <?php echo ($job["price"]); ?><small class="cl-lightgray"><?php echo ($job["pricetype"]); ?></small>
        </span>
        <span class="text-normal cl-orange"></span>
    </div>
    <div class="gt-rowdivide" style="height:2px"></div>
    <div class="gtlyout" style="padding:4px 8px">
        <div class="pull-left">
            <span class=" cl-orange">
                <?php echo ($job["name"]); ?>
            </span>
        </div>
        <div class="pull-right">
            <span class="text-normal cl-orange glyphicon glyphicon-menu-right"></span>
        </div>

    </div>
    <div class="gt-rowdivide" style="height:8px"></div>


    <!--    &lt;!&ndash;标题&ndash;&gt;
        <div class="gtlyout">
            <div class="">
                <span class="text-lg text-bold">
                    <?php echo ($job["title"]); ?>
                </span>
            </div>
            <div class="text-small cl-lightgray">
                <span><?php echo ($job["date"]); ?></span> &nbsp;
                <span><?php echo ($job["area"]); ?></span> &nbsp;
                <span>浏览量:<?php echo ($job["view"]); ?></span>

            </div>
        </div>-->
    <!--兼职基本信息-->
    <div class="gtlyout">
        <div class="gtlyout">
            <span class="cl-orange glyphicon glyphicon-user">
            </span>
            <span class="">
                招聘人数:<?php echo ($job["number"]); ?>
            </span>
        </div>

        <div class="gt-rowdivide" style="height:1px"></div>

        <div class="gtlyout cl-orange">
            <span class="glyphicon glyphicon-time">
            </span>
            <span>
                时间
            </span>
            <br/>
            <span class="glyphicon glyphicon-time" style="color:white">
            </span>
            <span class="" style="color:black;">
                工作日期：<?php echo ($job["workdate"]); ?>
            </span>
            <br/>
            <span class="glyphicon glyphicon-time" style="color:white">
            </span>
            <span class="" style="color:black;">
                工作时间：<?php echo ($job["worktime"]); ?>
            </span>
        </div>
    </div>
    <div class="gt-rowdivide" style="height: 8px;"></div>
    <!--工作地点-->
    <div class="gtlyout" style="overflow: hidden;line-height: 2em">
        <div class="col-xs-10" style="padding:0">
            <span class="cl-orange glyphicon glyphicon-map-marker"></span>
            <span class="">工作地点:<?php echo ($job["address"]); ?></span>
        </div>
        <div class="col-xs-2" style="padding:0">
            <span>
                <a href="/weixin.php/Mobile/map?address=<?php echo ($job["address"]); ?>" class="cl-orange">
                    地图<span class="glyphicon glyphicon-play cl-orange"></span>
                </a>
            </span>
        </div>

    </div>

    <div class="gt-rowdivide" style="height: 8px;"></div>

    <!--职位描述-->
    <div class="gtlyout" style="padding:4px 8px">
        <!--TODO 数据表结构-->
        <div class="cl-orange ">
            <span class="glyphicon glyphicon-list-alt"></span>
            职位描述
        </div>
        <!--TODO 分类
                <div class="">
                    兼职要求：
                </div>
                <div class="">
                    工作内容：
                </div>-->
        <div class="mul-text">
        </div>
        <textarea id="job-intro"><?php echo ($job["intro"]); ?></textarea>
    </div>
    <div class="gt-rowdivide"></div>
    <!--联系方式-->
    <div class="gtlyout">
        <div class="gtlyout">
            <span class=" cl-orange glyphicon glyphicon-time"></span>
            <span class="">
                报名截止:<?php echo ($job["endtime"]); ?>
            </span>

        </div>


        <div class="gtlyout">
            <span class="cl-orange glyphicon glyphicon-earphone"></span>
            <span class="">联系电话:<?php echo ($job["phone"]); ?>
                <span class="cl-orange">
                    <?php echo ($job["contacter"]); ?>
                </span>
            </span>

        </div>

    </div>
    <div class="gt-rowdivide" style="height:48px;"></div>

</div>
<div class="gttab text-center">
    <div class="col-xs-3 gtbtn" id="collection" style="background: white;border:1px solid orange;padding:0 2px">
        <span class="text-normal cl-orange">
            <a href="" class="cl-orange"
               style="text-decoration: none;">
                <span class="glyphicon glyphicon-star-empty"></span>
                收藏
            </a>
        </span>
    </div>

    <div class="col-xs-5 gtbtn" id="call" style="background: white;border:1px solid orange;padding:0 2px">
        <span class="text-normal">
            <a href="tel:<?php echo ($job["phone"]); ?>" class="cl-orange"
               style="text-decoration:none;">
                <span class="glyphicon glyphicon-earphone"></span>
                拨打电话
            </a>
        </span>
    </div>

    <div class="col-xs-4 gtbtn" id="applyPosition" style="border-right:2px solid #b27926;padding:0 2px">
        <a href="javascript:"
           style="color:white;text-decoration: none">
            <span class="text-normal">
                立即申请
            </span>
        </a>

    </div>
</div>

<script>
    $(document).ready(function () {
        var regN = /[\n]/g;
        $("#job-intro").hide();
        var intro = $("#job-intro").html();
        intro = intro.replace(regN, "<br/>");
        $(".mul-text").html(intro);

        $("#applyPosition").on('click', '', function (event) {
            event.preventDefault();
            $.get(MOD_PATH + "/Seeker/applyJob",
                    {
                        "jobid": "<?php echo ($job["id"]); ?>",
                        "title": "<?php echo ($job["title"]); ?>",
                        "companyname": "<?php echo ($job["name"]); ?>",
                        "phone": "<?php echo ($job["phone"]); ?>"
                    },
                    function (data) {
                        if (data['status'] == 0) {
                            alert(data['info']);
                        } else {
                            alert(data['info']);
                        }
                        if (data['url'] != null && data['url'] != "") {
                            location.href = data['url'];
                        }

                        console.log(data);
                    });
        });

        $("#collection").on('click', '', function (event) {
            event.preventDefault();
            $.get(MOD_PATH + '/Seeker/collect',
                    {
                        'jobid': "<?php echo ($job["id"]); ?>"
                    },
                    function (data) {
                        dealReturn(data);
                    })
        });
    });


</script>
    </div>
    <div class="footer row">
        
    </div>
</div>
</body>
</html>