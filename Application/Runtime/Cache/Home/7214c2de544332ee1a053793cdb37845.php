<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>萝卜兼职，最靠谱的大学生兼职平台</title>
	<!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/Public/new/css/base.css"/>
<link rel="stylesheet" href="/Public/new/css/main.css"/>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.home.js"></script>
<script src="/Public/default/js/jquery1.10.2.min.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Home";
    var CON_PATH = "/index.php/Home/Jobs";
    var SEL_PATH = "/index.php/Home/Jobs/pageJobsLists";
    var ACT_PATH = "/index.php/Home/Jobs/pageJobsLists";
</script>
	<style>
	</style>
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
		<style type="text/css">
	.list_hot .hot-money span{line-height:normal;padding-top:23px;}
</style>
<?php
function getparam($k) { $param = $_GET; if(isset($_GET[$k])) unset($param[$k]); $param[$k] = ''; return http_build_query($param); } ?>
<div id="assort">
		<h2>兼职分类</h2>
		<div class="assort_class">
			<div class="trades">
				<span>行业</span>
				<a href="/index.php/Home/Jobs/pageJobsLists" class="assort_all">全部</a>
				<ul>
					<?php if(is_array($job_level1)): $i = 0; $__LIST__ = $job_level1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $param = getparam('l1');?>
				<li class="current"><a href="?<?php echo $param; echo ($vo["name"]); ?>" <?php if($vo['name']==$_GET['l1']){echo'style="color:#ed7612"';}?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="add">
				<span>地区</span>
				<a href="/index.php/Home/Jobs/pageJobsLists" class="assort_all">全部</a>
				<ul>
					<?php if(is_array($countyList)): $i = 0; $__LIST__ = $countyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $param = getparam('county');?>
					<li><a href="?<?php echo $param; echo ($vo["name"]); ?>" <?php if($vo['name']==$_GET['county']){echo'style="color:#ed7612"';}?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="time">
				<span>时间</span>
				<a href="/index.php/Home/Jobs/pageJobsLists" class="assort_all" >全部</a>
				<tr>
				<?php $param = getparam('time');?>
				<ul>
					<li><a href="?<?php echo $param;?>day" <?php if($_GET['time']=='day'){echo'style="color:#ed7612"';}?>>今天</a></li>
					<li><a href="?<?php echo $param;?>week" <?php if($_GET['time']=='week'){echo'style="color:#ed7612"';}?>>本周</a></li>
					<li><a href="?<?php echo $param;?>month"<?php if($_GET['time']=='month'){echo'style="color:#ed7612"';}?> >本月</a></li>
					<li><a href="?<?php echo $param;?>year" <?php if($_GET['time']=='year'){echo'style="color:#ed7612"';}?>>今年</a></li>
				</ul>
				</tr>
			</div>
		</div>
	</div>
	<!-- 兼职分类end -->

	<!-- 兼职分类列表start -->
	<div id="sortList">
		<div class="sort_hot">
			<a href="/index.php/Home/Jobs/pageJobsLists?host=host">热门</a>
			<a href="pageJobsLists" >最新</a>
			<span>共<?php echo ($count); ?>个职位</span>
		</div>
		<div class="work">
			<ul class="list_hot">
			<?php if(is_array($commonJobLists)): $i = 0; $__LIST__ = $commonJobLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<span class="color-class<?php echo ($vo["colorId"]); ?>"><?php echo ($vo["level2"]); ?></span>
					<div class="job_show">
						<a href="/index.php/Home/Jobs/pageJobsDetails?id=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["subtitle"]); ?></a>
						<span><?php echo ($vo["city"]); echo ($vo["county"]); ?></span>
						<span>发布时间：<?php echo ($vo["date"]); ?></span>
						<span>浏览次数：<?php echo ((isset($vo["view"]) && ($vo["view"] !== ""))?($vo["view"]):"0"); ?></span>
					</div>
					<div class="hot-icon">
						<i></i><i></i>
					</div>
					<div class="hot-money">	
						<span><?php echo ($vo["price"]); ?> <?php echo ($vo["pricetype"]); ?></span>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>	
		</div>		
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
	<!-- 兼职分类列表end -->

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
<script type="text/javascript">
	bindClick();
</script>