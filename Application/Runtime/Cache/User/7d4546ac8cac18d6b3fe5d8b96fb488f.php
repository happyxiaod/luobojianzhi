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