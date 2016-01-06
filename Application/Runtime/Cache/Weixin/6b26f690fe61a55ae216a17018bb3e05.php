<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>发布记录</title>
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
    var SEL_PATH = "/weixin.php/Company/postRecord?&p=";
    var ACT_PATH = "/weixin.php/Company/postRecord";
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
                发布记录
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
                    <div class="wx-circle pull-left text-center">
                        <?php echo ($vo["level2"]); ?>
                    </div>
                    <div class="pull-left jobtitle"
                         style="max-width: 75%; overflow: hidden; white-space:nowrap;margin-left:10px">
                        <div class="text-normal text-bold">
                            <?php echo (mb_substr($vo["title"],0,10,'utf-8')); ?>
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
                    <div class="pull-right"
                         style="max-width: 20%; margin-top: 8px;">
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                        <a href="/weixin.php/Company/editJob?id=<?php echo ($vo["id"]); ?>" class="text-warning"
                           style="padding:0 4px;border:1px solid orange;">
                            编辑</a>
                        <br/>

                        <div style="height:8px"></div>
                        <?php if(($vo["state"]) != "3"): ?><a href="javascript:" id="closejob" class="text-danger"
                               style="padding:0 4px;border:1px solid red;">
                                关闭</a>
                            <?php else: ?>
                            已关闭<?php endif; ?>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div style="height:80px;">
    <ul class="pagedivide text-center" style="margin:0 auto;width:100%">
        <li style="display: none;"><a href="javascript:" id="pageUpBtn"><<</a></li>
        <?php if(is_array($pagelist)): $i = 0; $__LIST__ = $pagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["value"] == $curtpage): ?><li>
                    <a href="<?php echo ($vo["url"]); ?>" class="pageBtn" id="pageActiveBtn" value="<?php echo ($vo["value"]); ?>" style="color:red"><?php echo ($vo["value"]); ?></a>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo ($vo["url"]); ?>" class="pageBtn" value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["value"]); ?></a>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <li style="display: none;"><a href="javascript:" id="pageNextBtn">>></a></li>

        <li style="display: none;">
            <br/>
            共<span id="pageAllNumber"></span>页&nbsp;&nbsp;跳转到第&nbsp;
            <input type="text" id="pageGoNumber" style="width: 30px; padding: 0; margin-top: -1px;"/>&nbsp;页
            &nbsp;<a href="javascript:" id="pageGoBtn">Go</a>
        </li>
    </ul>
</div>
<script>
    var allNumber = 0;
    var activePage;
    var i;
    var j;
    $(document).ready(function () {
        //获取总分页页数
        $(".pageBtn").each(function (e) {
            val = $(this).attr("value");
            //console.log(val);
            if (val != "上一页" && val != "下一页") {
                allNumber++;
            }
        });
        //console.log(allNumber);

        //如果分页大于十页
        if (allNumber > 10) {
            //填写全部页数为多少
            $("#pageAllNumber").html(allNumber);

            //获取当前分页页数
            activePage = $("#pageActiveBtn").attr("value");
            activePage = Number(activePage);
            //console.log(activePage);

            //初始化i和j
            if (activePage % 10 == 0) {
                i = activePage - 9;
                j = activePage;
            } else {
                number = activePage / 10;
                number = parseInt(number);
                number *= 10;
                i = number + 1;
                j = number + 10;
            }
            //console.log(i);
            //console.log(j);

            //绑定上十页事件
            $("#pageUpBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage - 10;
                if (number < 1) {
                    number = 1;
                }
                window.location.href = $(".pageBtn[value='" + number + "']").attr("href");
            });

            //绑定下十页事件
            $("#pageNextBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage + 10;
                if (number > allNumber) {
                    number = allNumber;
                }
                window.location.href = $(".pageBtn[value='" + number + "']").attr("href");
            });

            //绑定Go按钮事件
            $("#pageGoBtn").on('click', '', function (event) {
                event.preventDefault();
                number = $("#pageGoNumber").val();
                if (number >= 1 && number <= allNumber) {
                    window.location.href = $(".pageBtn[value='" + number + "']").attr("href");
                } else {
                    alert("您输入的页数不存在！");
                }
            });

            //绑定在输入后按回车键事件
            $("#pageGoNumber").bind("keypress", function (event) {
                if (event.keyCode == "13") {
                    event.preventDefault();
                    $("#pageGoBtn").click();
                }
            });

            //显示当前的十个分页
            showPageBtn();

            //显示上十页，下十页，和跳转到第几页
            $("#pageUpBtn, #pageNextBtn, #pageGoBtn").parent().show();
        }
    });

    //显示当前的十个分页
    function showPageBtn() {
        //console.log(i);
        //console.log(j);
        $(".pageBtn").each(function (e) {
            number = $(this).attr("value");
            if (number == "上一页" || number == "下一页") {
                return true;
            }
            if (number >= i && number <= j) {
                $(this).parent().show();
            } else {
                $(this).parent().hide();
            }
        });
    }
</script>
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
        $(".jobtitle").on('click', '', function (event) {
            var id = $(this).siblings("input[type='hidden']").val();
//            location.href = CON_PATH + "/pageJobDetail?id=" + id + "#mp.weixin.qq.com";
            location.href = MOD_PATH + "/Jobs/pageJobDetail?id=" + id;
        });

        $("#closejob").on('click', '', function (event) {
            event.preventDefault();
            var id = $(this).siblings("input[type='hidden']").val();
            $.post(MOD_PATH + "/Company/closeJob", {'id': id}, function (data) {
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
            $(this).attr("style", "border:1px solid " + back + ";color:" + back);
        })
    }
</script>