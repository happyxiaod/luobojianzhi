<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>兼职-列表</title>
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
    var SEL_PATH = "/weixin.php/Jobs/pageJobs";
    var ACT_PATH = "/weixin.php/Jobs/pageJobs";
</script>
    <style>

.glyphicon{
    font-size: 20px;
}
.search{
        line-height: normal;
}

 .search input {
    width: 160px;
    height: 35px;
    line-height: 35px;
    border: 1px solid #eb7312;
    font-size: 16px;
    padding-left: 5px;
}
 .search span {
  margin-left:-35px; 

}

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="header row">
        <div class="actionbar-back">
            <div class="col-xs-3 text-left" style="padding-left:8px">
                <a href="/weixin.php/Mobile/choseArea" style="font-size:18px">
                    <?php echo (session('city')); ?>
                </a>
            </div>
            <div class="col-xs-7 text-center actionbar-title">
               <!--  <span style="font-weight: bold">萝卜兼职</span> -->
               <span class="search">
                    <input id="weixinSearch" type="text" name="" id="" placeHolder="搜索">
                    <span class="glyphicon glyphicon-search" onclick="searchjobs()"></span>
                </span>
            </div>
            <div class="col-xs-2text-right" >
                <a href="/weixin.php/Mobile/myCenter">
                    <span class="glyphicon glyphicon-user" style="font-size:17px"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:1px">
        <style>
    .jobstate-green{
        background: url("/Public/default/images/jobsstate1.png") no-repeat;
        background-size:100% 100%;
    }
    .jobstate-red{
        background: url("/Public/default/images/jobsstate2.png") no-repeat;
        background-size:100% 100%;
    }
    .jobstate-orange{
        background: url("/Public/default/images/jobsstate3.png") no-repeat;
        background-size:100% 100%;
    }
</style>

<!--轮播图-->
<div style="height:100px;">
    <a href="<?php echo ($scrollLink); ?>" target="_blank">
        <img class="scroll-img" id="scroll" link="<?php echo ($scrollLink); ?>" src="/Uploads/<?php echo ($scrollimg); ?>"/>
    </a>
</div>

<div>
    <div class="wx-jobs-top" id="choseOther">区域
        <span class="glyphicon glyphicon-menu-down"></span>
    </div>
    <div class="wx-jobs-top" id="wxTypesBtn">分类
        <span class="glyphicon glyphicon-menu-down"></span>
    </div>
    <div class="wx-jobs-top" id="choseDate">时间
        <span class="glyphicon glyphicon-menu-down"></span>
    </div>
</div>
<div class="clearfix"></div>
<?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "暂无职位信息！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="gtlv-auto">
        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
        <!--左边-->
        <div class="wx-circle pull-left text-center" style="width:100px;padding:0;">
            <?php echo ($vo["level2"]); ?>
        </div>

        <div class="pull-right" style="min-width:83%;max-width:85%;padding:0;">
            <!--第一行内容-->
            <div style="width:100%">
                <div class="col-xs-9" style="overflow: hidden; white-space:nowrap;">
                    <div style="font-family: Microsoft YaHei;font-size: 16px">
                        <?php echo (mb_substr($vo["title"],0,10,'utf-8')); ?>
                    </div>
                </div>
                <!--右半部分-->
                <div class="col-xs-3" style="padding:0;overflow: hidden; white-space:nowrap;">
                    <div class="text-right pull-right" style="margin-top:5px;height:20px;width:56px;margin-left:2px;">
                        <!--TODO 根据状态变化背景图片-->
                        <?php if($vo.state==0){ echo('<div class="jobs-state jobstate-green">报名中</div>'); }else if($vo.state==2){ echo('<span class="jobs-state jobstate-orange">已过期</span>'); }else if($vo.state==1){ echo('<span class="jobs-state jobstate-red">已报满</span>'); } ?>
                    </div>
                </div>
            </div>
            <!--第二行内容-->
            <div>
                <div class="col-xs-8" style="overflow: hidden; white-space:nowrap;">
                    <div class="gt-cls cl-lightgray" style="font-size: 12px;">
                        <img src="/Public/default/images/area.png" alt="" width="10px" style="margin: -3px 3px 0 0;"/>
                        &nbsp;<?php echo ($vo["area"]); ?>
                    </div>
                    <div class="gt-cls cl-lightgray" style="font-size: 12px;">
                        <img src="/Public/default/images/date.png" alt="" width="10px" style="margin: -2px 3px 0 0;"/>
                        &nbsp;<?php echo ($vo["date"]); ?>
                    </div>
                </div>

                <!--右半部分-->
                <div class="col-xs-4 text-right" style="padding:0;overflow: hidden; white-space:nowrap;">
                    <div class="cl-orange text-bold" style="margin-top:10px">
                        <?php echo ($vo["price"]); ?>
                        <small class="cl-lightgray"><?php echo ($vo["pricetype"]); ?></small>
                    </div>

                </div>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "暂无职位信息！" ;endif; ?>
<div class="clearfix"></div>
<!--分页-->
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
<script>

    var i = 1;
    var scrolllist;
    $(document).ready(function () {
        doScroll();
        setCircle();
        $(".gtlv-auto").on('click', '', function (event) {
            event.preventDefault();
            var id = $(this).find("input[type='hidden']").val();
//            location.href = CON_PATH + "/pageJobDetail?id=" + id + "#mp.weixin.qq.com";
            location.href = CON_PATH + "/pageJobDetail?id=" + id;
        });
        $("#wxTypesBtn").on('click', '', function (event) {
            event.preventDefault();
            location.href = MOD_PATH + "/Mobile/choseType";
        });
        $("#choseArea").on('click', '', function (event) {
            event.preventDefault();
            location.href = MOD_PATH + "/Mobile/choseArea";
        });
        $("#choseOther").on('click', '', function (event) {
            event.preventDefault();
            location.href = MOD_PATH + "/Mobile/choseOther";
        });
        $("#choseDate").on('click', '', function (event) {
            event.preventDefault();
            location.href = MOD_PATH + "/Mobile/choseDate";
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
    //定时调用切换轮播图方法
    function doScroll() {
        jQuery.ajax({
            url: CON_PATH + "/scrolllist",
            success: function (data, textStatus, xhr) {
                scrolllist = data;
                //如果有一张以上的图片则掉用切换轮播图方法
                if(scrolllist.length > 1) {
                    setInterval(scroll, 5000);
                }
            }
        });
    }
    //切换轮播图方法
    function scroll() {
        var sc = $("#scroll");
        if(i >= scrolllist.length) {
            i = 0;
        }
        sc.fadeIn("slow",function(){
            sc.attr("src", "/Uploads/"+scrolllist[i]['value']);
            sc.parent().attr("href", scrolllist[i]['else']);
            console.log(i+"=>"+scrolllist[i]['value']);
            sc.fadeIn("slow",function(){
                i++;
            });
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
       <!--  <a href="/index.php/Home/Index/pageReg" class="footer-btn">注册</a> -->
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
    function searchjobs() {

    var value = $("#weixinSearch").val();
    if (value == null || value == "") {
        alert("你并未输入任何关键词");
        return;
    }
    location.href = MOD_PATH + '/Jobs/pageJobs?keyword=' + value;
}
</script>