<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>信息等待</title>
    <link rel="stylesheet" type="text/css" href="/Public/new/css/base.css">
    <style type="text/css">
        .action{width:1200px;margin:0 auto;min-height:400px;padding-top:200px;}
        .action img{margin:0 auto 10px;}
        .action a:hover{color:#337ab7;text-decoration:underline;}
        .action b{color:#ed7312;font-size:22px}
        .action-msg {font-size: 18px;color: #555;}
        .action-msg p{margin:0 0 10px;}
    </style>
</head>
<body>

    <!-- 头start -->
   
<?php if($_SESSION['user']['adminname']== 'luobo'): ?><div class="row" style="background: #c3e7ff;">
    <div class="row" style="margin-top:36px;margin-bottom:16px;padding-left:30px;padding-right:30px">
        <!--头部-->
        <div class="col-md-10" style="font-family: 'Microsoft YaHei'">
            <span style="color:#335fb7;font-size:20px">萝卜兼职后台管理系统</span>
            <img src="/Public/default/images/admin_user.png" width="16px"
                 style="margin-left:30px;">
            <span style="font-size: 15px;">欢迎您！<?php echo ($_SESSION['user']['adminname']); ?></span>
            <img src="/Public/default/images/admin_time.png" width="17px"
                 style="margin-left:30px">
            <span style="font-size: 15px;"><?php echo (session('datetime')); ?></span>


        </div>
        <div class="col-md-2 text-right">
            <a href="/index.php/User/User/doLogout">
                <img src="/Public/default/images/admin_logout.png" width="22px">
            </a>
        </div>
    </div>

    <!--导航-->
    <div class="row" id="daohang">
        <ul id="nav">
            <li>
                <a href="/manage.php/Index/index"><span class="glyphicon glyphicon-home"></span>
                    首页</a>
            </li>
            <li><a href="/manage.php/Member/pageSeeker">
                <span class="glyphicon glyphicon-user"></span>
                会员管理</a></li>

            <li><a href="/manage.php/Audit/pageSeeker">
                <span class="glyphicon glyphicon-list"></span>
                资料审核</a></li>

            <li><a href="/manage.php/Position/pageSeeker">
                <span class="glyphicon glyphicon-list-alt"></span>

                职位信息</a></li>
            <li><a href="/manage.php/Setting/pageScroll">
                <span class="glyphicon glyphicon-cog"></span>

                网站设置</a></li>
            <li><a href="/manage.php/Feedback/pageFeedback">
                <span class="glyphicon glyphicon-comment"></span>

                意见反馈</a></li>
            <li><a href="/manage.php/Weixin/weal">
                <span class="glyphicon glyphicon-comment"></span>

                微信活动</a></li>
        </ul>
    </div>
</div><?php endif; ?>
    <!-- 头end -->
    <!-- 主体内容 -->
    <div class="action">
        <div class="row text-center">
            <img height="300px" width="300px" src="/Public/new/images/action.png" alt=""/>

                <div class="action-msg">
                    <?php if(isset($message)) {?>

                    <p class="success"><?php echo($message); ?></p>
                    <?php }else{?>

                    <p class="error"><?php echo($error); ?></p>
                    <?php }?>
                </div>
                <p class="action-jump">
                    <b id="wait" style="color:#e07a00;font-size:22px"><?php echo($waitSecond); ?></b>
                    <br/> <br/>
                    不想等待, <a id="href" href="<?php echo($jumpUrl); ?>">
                    点此直接跳转</a>
                </p>
        </div>
        <br/><br/><br/>
    </div> 
</body>
</html>
<script type="text/javascript">
    (function () {
        var wait = document.getElementById('wait'), href = document.getElementById('href').href;
        var interval = setInterval(function () {
            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(interval);
            }
        }, 1000);
    })();
</script>