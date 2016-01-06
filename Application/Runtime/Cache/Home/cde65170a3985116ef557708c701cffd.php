<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>消息</title>
    <!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/luoboNew/Public/new/css/<?php echo IMPORT_CSS;?>.css"/>
<link rel="stylesheet" href="/luoboNew/Public/new/css/base.css"/>
<script src="/luoboNew/Public/default/js/geethin.js"></script>
<script src="/luoboNew/Public/default/js/gtcheck.js"></script>
<script src="/luoboNew/Public/default/js/gt.home.js"></script>
<!-- <script src="/luoboNew/Public/new/js/public.js"></script>
<script src="/luoboNew/Public/new/js/index.js"></script> -->
<script src="/luoboNew/Public/default/js/jquery1.10.2.min.js"></script>
<script>
    var APP_PATH = "/luoboNew/index.php";
    var MOD_PATH = "/luoboNew/index.php/Home";
    var CON_PATH = "/luoboNew/index.php/Home/User";
    var SEL_PATH = "/luoboNew/index.php/Home/User/pageMsg";
    var ACT_PATH = "/luoboNew/index.php/Home/User/pageMsg";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
    <div class="header row">
        <div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock">
                <h1><a href="/luoboNew/index.php/Home/Index"><img src="/luoboNew/Public/new/images/logo.png"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/luoboNew/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <ul class="nav">
                    <li class="current"><a href="/luoboNew/index.php/Home">首页</a></li>
                    <li><a href="/luoboNew/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                    <li><a href="/luoboNew/index.php/Home/Jobs/pageTailor">量身定制</a></li>
                    <li><a href="/luoboNew/index.php/Home/Jobs/pageLoan">我要借贷</a></li>
                    <li><a href="/luoboNew/index.php/Home/Jobs/pagePractice">实习</a></li>
                    <li><a href="/luoboNew/index.php/Home/Jobs/pageServe">服务</a></li>
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/User/pageMyCenter">人个中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/User/pageMyCenter">企业中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['type']== 'school'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/User/pageMyCenter">学校中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['adminname']== 'admin'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Manage/Index/index">进入后台</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/Index/pageReg">注册</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/Home/Index/pageLogin">登录</a></li>
                    </ul><?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 头end -->
     
    <!-- 搜索start -->
    <div id="search">
        <div class="search">
            <div class="search_in">
                <input id="txtSearchKey" type="text" value="" class="required BC_input_focus validationBinded BC_Input_error" placeholder="输入关键词" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30">
                <input id="btnSearch" type="button"  name="searchjobsBtn" gt-btn-click="searchjobs" class="New_btn btn_i i1 YH btn_submit BC_validation" value="搜索">
            </div>
            <div class="search_hot">
                <ul>
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/luoboNew/index.php/Home/User/pageMsg?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->
    </div>
    <!-- 主体内容 -->
    <div class="middle row">
        <!--TODO 消息页面的选择与管理-->
<!--消息-->
<div class = "container">
    <div class="ablock row" style="padding-top:25px; padding-bottom:100px">
        <div class="col-md-2">
            <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="per_nav">
                <li><a href="/luoboNew/index.php/Home/User/pageMyCenter">我的简历</a></li>
                <li class="cur"><a href="/luoboNew/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li><a href="/luoboNew/index.php/Home/User/pageCollect">我的收藏</a></li>
                <li><a href="/luoboNew/index.php/Home/User/pageMsg">消息</a></li>
                <li><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                
                <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全保护</a></li>
                <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li> <a href="/luoboNew/index.php/Home/Company/pagePost">我的发布</a></li>
                <li class="cur"><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li><a href="/luoboNew/index.php/Home/Company/pageProve">认证信息</a></li>
                <li><a href="/luoboNew/index.php/Home/User/pageMsg">消息</a></li>
                <li><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全保护</a></li>
                <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li> <a href="/luoboNew/index.php/Home/Company/pagePost">我的发布</a></li>
                <li class="cur"><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li><a href="/luoboNew/index.php/Home/Company/pageProve">认证信息</a></li>
               
                <li><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全保护</a></li>
                <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
        </div>
        <div class="col-md-10" style="padding-right:45px; padding-left:45px;">
            <div class="input-chose" style="margin-left:20px;margin-bottom: 5px;">
                <input type="checkbox" id="choseAllMsg"/>
                <span>全选</span>
                <button class="list-operate-btn">删除</button>
            </div>
            <div class="list-box">

                <?php if(is_array($msglist)): $i = 0; $__LIST__ = $msglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-row">
                        <div class="list-checkbox">
                            <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                            <input type="checkbox"/>
                        </div>
                        <div class="list-span">
                            <img src="/luoboNew/Public/default/images/12.png" alt="" height="18"/>
                        </div>
                        <a href="/luoboNew/index.php/Home/Msg/pageReplyMsg" class="pull-left list-p-blue">
                            <?php echo ($vo["poster"]); ?>
                        </a>
                        <div class="pull-right list-p-gray">
                            <?php echo ($vo["createtime"]); ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <!--分页-->
        <!--分页-->

<div class="page" style="height:80px">
    <div style="float:right; margin-right: 50px;">
        <ul class="pagedivide">
            <li style="display: none;"><a href="javascript:" id="pageUpBtn"><<</a></li>
            <?php if(is_array($pagelist)): $i = 0; $__LIST__ = $pagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["value"] == $curtpage): ?><li class="cur">
                        <a href="<?php echo ($vo["url"]); ?>" class="pageBtn cur" id="pageActiveBtn" value="<?php echo ($vo["value"]); ?>" ><?php echo ($vo["value"]); ?></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo ($vo["url"]); ?>" class="pageBtn" value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["value"]); ?></a>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li style="display: none;"><a href="javascript:" id="pageNextBtn">>></a></li>
            <li style="display: none;">
                &nbsp;&nbsp;&nbsp;共<span id="pageAllNumber"></span>页&nbsp;&nbsp;跳转到第&nbsp;
                <input type="text" id="pageGoNumber" style="width: 30px; border: 1px solid #ccc; padding: 0;vertical-align: text-top;"/>&nbsp;页
                &nbsp;<a href="javascript:" id="pageGoBtn" style="display:inline-block;background-color: #eb7312;padding:3px 10px;color:#fff;">Go</a>
            </li>
        </ul>
    </div>
</div>

<script>
    var allNumber = 0;
    var activePage;
    var i;
    var j;
    $(document).ready(function () {
        //获取总分页页数
        $(".pageBtn").each(function(e) {
            val = $(this).attr("value");
            //console.log(val);
            if(val != "上一页" && val != "下一页") {
                allNumber++;
            }
        });
        //console.log(allNumber);

        //如果分页大于十页
        if(allNumber > 10) {
            //填写全部页数为多少
            $("#pageAllNumber").html(allNumber);

            //获取当前分页页数
            activePage = $("#pageActiveBtn").attr("value");
            activePage = Number(activePage);
            //console.log(activePage);

            //初始化i和j
            if(activePage%10 == 0) {
                i = activePage - 9;
                j = activePage;
            } else {
                number = activePage/10;
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
                if(number < 1) {
                    number = 1;
                }
                window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
            });

            //绑定下十页事件
            $("#pageNextBtn").on('click', '', function (event) {
                event.preventDefault();
                number = activePage + 10;
                if(number > allNumber) {
                    number = allNumber;
                }
                window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
            });

            //绑定Go按钮事件
            $("#pageGoBtn").on('click', '', function (event) {
                event.preventDefault();
                number = $("#pageGoNumber").val();
                if(number >= 1 && number <= allNumber) {
                    window.location.href = $(".pageBtn[value='"+ number +"']").attr("href");
                } else {
                    alert("您输入的页数不存在！");
                }
            });

            //绑定在输入后按回车键事件
            $("#pageGoNumber").bind("keypress", function(event){
                if(event.keyCode == "13") {
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
        $(".pageBtn").each(function(e) {
            number = $(this).attr("value");
            if(number == "上一页" || number == "下一页") {
                return true;
            }
            if(number >= i && number <= j) {
                $(this).parent().show();
            } else {
                $(this).parent().hide();
            }
        });
    }
</script>
    </div>
</div>
    </div>
    <!-- 底部内容 -->
    <div class="footer row">
        
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="">关于捷城</a></dd>
                <dd><a href="">企业动态</a></dd>
                <dd><a href="">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="">常见问题</a></dd>
                <dd><a href="">企业服务</a></dd>
                <dd><a href="">联系我们</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>关注我们</dt>
                <dd><a href="">官方微信</a></dd>
                <dd><a href="">新浪微博</a></dd>
                <dd><a href="">腾讯微博</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>0631-5666168</dt>
                <dd><a href="">联系我们</a></dd>
            </dl>
        </div>
    </div>

    </div>
</div>
</body>
</html>
<script>
    var ids = [];
    var boxs = $(".list-box").find("input[type='checkbox']");
    jQuery(document).ready(function ($) {
        bindClick();
        choseAllMsg();
        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pageMsg").removeClass("nav-normal").addClass("nav-active");

        $(".list-operate-btn").on('click', '', function (event) {
            event.preventDefault();
            if (ids.length>0){
                post("delMsg", ids);
            }

        });
    });

    function choseAllMsg() {
        $("#choseAllMsg").on('click', '', function () {
            if ($(this).is(":checked")) {
                boxs.prop("checked", true);
                boxs.each(function () {
                    var id = $(this).siblings("input[type='hidden']").val();
                    ids.push(id);
                });
                console.log(ids);
            } else {
                boxs.prop("checked", false);
                ids.splice(0, ids.length);
            }
        });
        boxs.on('click', function (event) {
            if ($(this).is(":checked")) {
                var id = $(this).siblings("input[type='hidden']").val();
                ids.push(id);
                console.log(ids);
            }else{

            }
        });

    }
</script>