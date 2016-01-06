<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>萝卜兼职，最靠谱的大学生兼职平台</title>
    
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/Public/new/css/<?php echo IMPORT_CSS;?>.css"/>
<link rel="stylesheet" href="/Public/new/css/base.css"/>
<script src="/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Home";
    var CON_PATH = "/index.php/Home/Index";
    var SEL_PATH = "/index.php/Home/Index/pageSwopCity";
    var ACT_PATH = "/index.php/Home/Index/pageSwopCity";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
        
<div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock">
                <h1><a href="/index.php/Home/Index"><img src="/Public/new/images/logo.png"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <ul class="nav">
                    <li class="<?php echo $index?'current':'';?>"><a href="/index.php/Home">首页</a></li>
                    <li class="<?php echo $jobsList?'current':'';?>"><a href="/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                     <!-- <li class="<?php echo $taitor?'current':'';?>"><a href="/index.php/Home/Jobs/pageTailor">量身定制</a></li> -->
                   <li class="<?php echo $pageMyloan1?'current':'';?>"><a href="/index.php/Home/User/pageMyloan1">我要借款</a></li>
                   <!-- <li class="<?php echo $practice?'current':'';?>"><a href="/index.php/Home/Jobs/pagePractice">实习</a></li>
                   <li class="<?php echo $serve?'current':'';?>"><a href="/index.php/Home/Jobs/pageServe">服务</a></li>  -->
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="javascript:void(0);">人个中心</a>
                            <ul>
                                    <li><a href="/index.php/Home/User/pageResume">我的简历</a></li>
                                    <li><a href="/index.php/Home/User/pageUserApply">我的申请</a></li>
                                    <li><a href="/index.php/Home/User/pageCollect">我的收藏</a></li>
                                    <li><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/index.php/Home/User/pageEditMyCenter">编辑简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/index.php/Home/User/pageMyCenter">企业中心</a>
                            <ul>
                                    <li><a href="/index.php/Home/Company/pageManage">数据中心</a></li>
                                    <li><a href="/index.php/Home/Company/pagePost">职位管理</a></li>
                                    <li><a href="/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                                    <li><a href="/index.php/Home/Company/pageProve">企业信息</a></li>
                                    <li><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/index.php/Home/Company/pagePostJob">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['type']== 'school'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/User/pageMyCenter">学校中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['adminname']== 'luobo'): ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Manage/Index/index">进入后台</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageReg">注册</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageLogin">登录</a></li>
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
                <input id="txtSearchKey" name="txtSearchKey"  type="text"  class="required BC_input_focus validationBinded BC_Input_error" placeholder="输入关键词" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30" onkeydown="if(event.keyCode==13)searchjobsBtn.click()">
                <input id="searchjobsBtn" type="button"  name="searchjobsBtn" gt-btn-click="searchjobs" class="New_btn btn_i i1 YH btn_submit BC_validation" value="搜索">
            </div>
            <div class="search_hot">
                <ul>
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Jobs/pageJobsLists?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->

  <!-- 侧栏工具条 -->
    <div class="toolbar">
    <a href="" herf="javascript:;" class="toolbar-iterm toolbar-iterm-weixin">
        <span class="toolbar-layer"></span>
    </a>
    <a href="tencent://Message/?Uin=909106725&websiteName=luobojianzhi.com&Menu=yes" class="toolbar-iterm toolbar-iterm-feedback"></a>
    <a href="" herf="javascript:;" class="toolbar-iterm toolbar-iterm-app">
        <span class="toolbar-layer"></span>
    </a>
    <a href="" id="backTop" herf="javascript:;" class="toolbar-iterm toolbar-iterm-top"></a>
    </div>
    <!-- 侧栏工具条end -->
<script type="text/javascript">
    $(document).ready(function(){
     $("#header .nav li").click(function(event) {
         $(this).addClass('current');
            });
            /*个人中心鼠标滑动下拉*/
            $(".header-nav .login-before .person").hover(function() {
                $(this).children('ul').stop().slideToggle();
            });
    });
</script>
    <!-- 主体内容 -->
            <div class="middle">        
        <div class="find_pwd">
            <div class="ablock2 row" style="min-height: 600px; padding: 30px 50px;">
                <div class="clearfix">
                    <div class="add_sel">
                        <span class="label-text">
                            按省份选择
                        </span>
                        <div class="right">
                            <!--省-->
                            <div class="input-group spinner">
                                <span type="text" class="spinner-content" gt-isparam="province">选择省份</span>
                             <span class="input-group-addon glyphicon glyphicon-triangle-bottom">&#xe81d;</span>
                                <ul class="dropdown-menu">
                                    <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="spinner-option select-province">
                                            <span loadid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></span>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                            <!--市-->
                            <div class="input-group spinner">
                                <span type="text" class="spinner-content" 
                                gt-isparam="city">选择城市</span>
                                <span class="input-group-addon glyphicon glyphicon-triangle-bottom">&#xe81d;</span>
                                <ul class="dropdown-menu" id="cityList">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="pull-left">
                            <input class="edit-text" type="text" id="keyword" placeholder="请输入城市中文或拼音">
                        </div>
                        <div class="pull-left" style="margin-left: 10px;">
                            <button class="btn btn-active" id="seekCity">搜索</button>
                        </div>
                    </div>  
                </div>
                    <div class="job_show" id="seekResult"  style="display: none;" ></div>
                <div class="city clearfix" style="width:100%; margin: 30px auto 0 auto">
                    <span>常用城市：</span>
                    <div >
                     <?php if(is_array($oftenCityList)): $i = 0; $__LIST__ = $oftenCityList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="font-blue" href="/index.php/Home/Index/index/index?nowCity=<?php echo ($vo["name"]); ?>" style="margin: 10px;"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                
                <div class="city city_eng" style="width:100%; margin: 20px auto 0 auto">
                    <span>
                        按首字母选择城市：
                    </span>
                    <div class="city_dal">
                        <?php if(is_array($cityList)): $i = 0; $__LIST__ = $cityList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="font-block">
                                <div class="col-md-1"><?php echo ($key); ?></div>
                                    <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a class="font-blue" href="/index.php/Home/Index/index/index?nowCity=<?php echo ($vo2["name"]); ?>" style="margin: 10px;"><?php echo ($vo2["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部内容 -->
        
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/index.php/Home/Article/aboutUs">关于捷城</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=AboutRadish">萝卜兼职</a></dd>
                <dd><a href="/index.php/Home/Feed/pageFeedback">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="/index.php/Home/Article/index?nav=Question">常见问题</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Service">企业服务</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>关注我们</dt>
                <dd><a href="">官方微信</a></dd>
                <dd><a href="http://weibo.com/luobojianzhi">新浪微博</a></dd>
                <dd><a href="">腾讯微博</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>400-886-3334</dt>
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
        </div>
    </div>

</div>
</body>
</html>
<script>
    jQuery(document).ready(function() {
        bindClick();

        //获取城市列表
        $(".select-province").on('click', '', function (event) {
            event.preventDefault();

            var province = $(this).find("span").attr("loadid");

            province = $.trim(province);

            $.post(CON_PATH + "/getCityByProvince", {province: province}, function (data) {
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option select-city'><a href='"+ CON_PATH +"/index/index?nowCity=" + value['name'] + "'>" + value['name'];
                        str += "</a></li>";
                    });
                    $("#cityList").html(str);
                } else {
                    $("#cityList").html("");
                    dealReturn("获取城市列表失败");
                }
            });
        });

        //地区选择
        $(".dropdown-menu").delegate('.spinner-option','click', function (event) {
            var value = $(this).find("span").html();
            value = $.trim(value);
            console.log(value);
            $(this).parent().siblings(".spinner-content").html(value);
        });

        //搜索城市
        $("#seekCity").on('click', '', function (event) {
            event.preventDefault();
            keyword = $("#keyword").val();
           // alert(keyword);
            keyword = $.trim(keyword);
            if(keyword == null || keyword == "") {
                alert("请输入关键词!");
                return;
            }
            jQuery.ajax({
                url: CON_PATH + '/seekCity',
                type: 'POST',
                data: {'keyword': keyword},
                complete: function (xhr, textStatus) {
                    //called when complete
                },
                success: function (data, textStatus, xhr) {
                    if(data != "failed") {
                        var str = "";
                        $.each(data, function (key, value) {
                            str += "<a href='"+ CON_PATH +"/index/index?nowCity=" + value['name'] + "' style='margin: 10px;'>" + value['name'];
                            str += "</a>";
                        });
                        $("#seekResult").attr("style", "display:block;width:100%; margin: 30px auto 0 auto").html(str);
                    } else {
                        alert("找不到该城市，换个关键词试试");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    
                }
            });
        });
    });
</script>