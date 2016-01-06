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
    var SEL_PATH = "/";
    var ACT_PATH = "/index.php/Home/Index/index";
</script>
<style type="text/css">
	h3 {
    font-size: 18px;
    color: #333;
    margin-top: 30px;
    margin-bottom: 10px;
    font-weight: normal;
}
#buttons { position: absolute; height: 10px; width: 100px; z-index: 5; bottom: 10px; left: 45%;}
#buttons span { cursor: pointer; float: left; width: 10px; height: 10px; border-radius: 50%; background: #333; margin-right: 5px;}
#buttons .on {  background: orangered;}
.arrow { cursor: pointer;  display: none;line-height: 39px; text-align: center; font-size: 20px; font-weight: bold; width: 40px; height: 40px;  position: absolute; z-index: 2; background-color: RGBA(0,0,0,.1); color: #fff;}
.arrow:hover { background-color: RGBA(0,0,0,.4);}
#scrollBox:hover .arrow { display: block;}
#prev { left: 20px; top: 100px;}
#next { right: 20px;top: 100px;}
.login-index-after{
    margin-top: 30px;

}
.login-index-after img{
    margin:0 auto;
    padding-bottom: 15px;
}	
.login a {
    width: 100px;
    height: 30px;
    line-height: 30px;
    margin:0 auto;
    text-align: center;
    background-color: #009e96;
    display: block;
    font-size: 16px;
    color: #fff;
    border-radius: 5px;
    font-weight: bold;

}
#main .hot-money span:nth-child(1) {
    padding-top: 12px;
    line-height: 19px;
}

</style>
</head>
<body>
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
		<div id="index-job-nav">
        <!-- 主页分类导航start -->
        <div class="left">
            <ul>
                <?php if(is_array($level1list)): $i = 0; $__LIST__ = $level1list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <h4><a href="/index.php/Home/Jobs/pageJobsLists?l1=<?php echo ($vo["name"]); ?>">
                    <?php echo ($vo["name"]); ?>
                </a></h4>
                    <div class="index-job-content">
                        
                    <?php if(is_array($level2list)): $i = 0; $__LIST__ = $level2list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><ul>
                        <li>
                        <?php if(($vo["id"]) == $vo2["fid"]): ?><a href="/index.php/Home/Jobs/pageJobsLists?l2=<?php echo ($vo2["name"]); ?>"><?php echo ($vo2["name"]); ?></a><?php endif; ?>
                        </li>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </div>
                    <a href="/index.php/Home/Jobs/pageJobsLists"><div class="box_sj_show"></div></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li>
                    <h4><a href="/index.php/Home/Jobs/pageJobsLists">其它</a></h4>
                    <div class="index-job-content">
                        <ul>
                            <li><a href="/index.php/Home/Jobs/pageJobsLists">...</a></li>
                        </ul>
                    </div>
                </li
            </ul>
        </div>
        <!-- 主页分类导航end -->

        <!-- 分类导航右侧start -->
        <div class="right">
            <div class="index-job-t" >
                <div class="index-job-t-l" id="scrollBox" >
                    <a href="<?php echo ($scrollLink); ?>" target="_blank">
                        <img class="index-scroll-img" id="scroll" link="<?php echo ($scrollLink); ?>" src="/Uploads/<?php echo ($scrollimg); ?>"/>
                    </a>
                    <!-- <div id="buttons">
                    <span index="1" class="on"></span>
                    <span index="2"></span>
                    <span index="3"></span>
                    <span index="4"></span>
                    <span index="5"></span>
                    </div> -->
                <a href="javascript:;" id="prev" class="arrow">&lt;</a>
                <a href="javascript:;" id="next" class="arrow">&gt;</a>
                </div>
                

                <div class="index-job-t-r" gt-model="userLogin">
                   <?php if($_SESSION['user']){?>
                   <div class="login-index-after">
                    <img src="/Public/new/images/appsetting3.png" alt="头像">
                    <?php if($_SESSION['user']['username']!= ''): ?><span style=" height:20px; line-height:20px; text-align:center; display:block;">{$Think.session.user.username}</span>
                    <?php elseif($_SESSION['user']['realname']!= ''): ?>
                    <span style=" height:20px; line-height:20px; text-align:center; display:block;"><?php echo ($_SESSION['user']['realname']); ?></span>
                    <?php else: ?>
                    <span style=" height:20px; line-height:20px; text-align:center; display:block;"><?php echo ($_SESSION['user']['phone']); ?></span><?php endif; ?>
                    <div class="login">
                    <!-- <input type="button" gt-btn-click="login" id="loginBtn" value="切换账号"> -->
                    <a href="/index.php/User/user/dologout">切换账号</a>
                    </div>
                    </div>
                   <?php }else{ ?>
                    <div class="login-user-jg">
                        <input type="radio" name="type" id="login-radio01" value="seeker" gt-isparam="type" checked /><label for="login-radio01">求职者</label>
                        <input type="radio" name="type" id="login-radio02" gt-isparam="type" value="company" /><label for="login-radio02">企业或机构</label>
                        <input type="radio" name="type" id="login-radio03" gt-isparam="type"value="school" /><label for="login-radio03">学校机构</label>
                    </div>
                    <div class="index-login">
                        <div class="user">
                             <input type="hidden" gt-islabel="用户名"/>
                            <input type="text" gt-isparam="username" id="usernameInput" placeholder="用户名或手机号" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30" onkeydown="if(event.keyCode==13)loginBtn.click()"/>
                        </div>
                        <div class="password">
                             <input type="hidden" gt-islabel="密码"/>
                            <input type="password" gt-isparam="password" id="passwordInput" placeholder="密码" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30" onkeydown="if(event.keyCode==13)loginBtn.click()"/>
                        </div>
                        <div class="jl_login clearfix">
                            <label for="login_mem">记住密码</label><input type="checkbox" name="" id="login_mem" />
                        </div>
                        <div class="login">
                            <input type="button" gt-btn-click="login" id="loginBtn" value="登录" />
                            <!-- <a href="javascript:" gt-btn-click="login" id="loginBtn" style="width: 100%;">登录</a> -->
                        </div>
                        <div class="login-other">
                            <a href="/index.php/Home/Index/pageFindPwd">忘记密码</a>
                            <a href="/index.php/Home/Index/pageReg">立即注册</a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="index-job-b">
                <ul>
                    <li>
                        <div class="sub-l">
                            <img src="/Public/new/images/index-top01.jpg" alt="" />
                        </div>                      
                        <div>
                            <h3>标志设计</h3>
                            <p>十万专业Logo设计师，为您的企业量身</p>
                            <div>
                                <a href="">立即体验</a>
                                <i>
                                    <em></em>
                                    <span></span>
                                </i>    
                            </div>
                            
                        </div>
                    </li>
                    <li>
                        <div class="sub-l">
                            <img src="/Public/new/images/index-top02.jpg" alt="" />
                        </div>                  
                        <div>
                            <h3>法律服务</h3>
                            <p>十万专业Logo设计师，为您的企业量身</p>
                            <div>
                                <a href="">立即体验</a>
                                <i>
                                    <em></em>
                                    <span></span>
                                </i>    
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sub-l">
                            <img src="/Public/new/images/index-top03.jpg" alt="" />
                        </div>                  
                        <div>
                            <h3>网站制作</h3>
                            <p>十万专业Logo设计师，为您的企业量身</p>
                            <div>
                                <a href="">立即体验</a>
                                <i>
                                    <em></em>
                                    <span></span>
                                </i>    
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="sub-l">
                            <img src="/Public/new/images/index-top04.jpg" alt="" />
                        </div>                  
                        <div>
                            <h3>VI设计</h3>
                            <p>十万专业Logo设计师，为您的企业量身</p>
                            <div>
                                <a href="">立即体验</a>
                                <i>
                                    <em></em>
                                    <span></span>
                                </i>    
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 分类导航右侧end -->
    </div>
    <!-- 主页end -->

    <!-- 主页main start -->
    <div id="main" class="clearfix">
        <div class="f_left">
            <div class="top">
                <h3>热门兼职</h3>
                <div class="more">
                    <a href="/index.php/Home/Jobs/pageJobsLists?host=host">更多</a>
                    
                    <i>
                        <em></em>
                        <span></span>
                    </i>    
                </div>
            </div>
            <ul>
            <?php if(is_array($hotJobs)): $i = 0; $__LIST__ = $hotJobs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <span class="color-class<?php echo ($vo["colorId"]); ?>"><?php echo ($vo["level2"]); ?></span>
                    <div class="job-hot">
                         <a href="/index.php/Home/Jobs/pageJobsDetails?id=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["subtitle"]); ?></a>
                        <span><?php echo ($vo["city"]); echo ($vo["county"]); ?></span>
                        <span><?php echo ($vo["date"]); ?></span>
                    </div>
                    <div class="hot-icon">
                        <i></i>
                    </div>
                    <div class="hot-money"> 
                        <span><?php echo ($vo["price"]); ?> <?php echo ($vo["pricetype"]); ?></span>
                        <span>浏览量: <?php echo ((isset($vo["view"]) && ($vo["view"] !== ""))?($vo["view"]):"0"); ?></span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <div class="f_right">
            <div class="top">
                <h3>最新兼职</h3>
                <div class="more">
                    <a href="/index.php/Home/Jobs/pageJobsLists">更多</a>
                    <i>
                        <em></em>
                        <span></span>
                    </i>    
                </div>
            </div>
            <ul>
                <?php if(is_array($lateJobs)): $i = 0; $__LIST__ = $lateJobs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <span class="color-class<?php echo ($vo["colorId"]); ?>"><?php echo ($vo["level2"]); ?></span>
                    <div class="job-hot">
                         <a href="/index.php/Home/Jobs/pageJobsDetails?id=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["subtitle"]); ?></a>
                        <span><?php echo ($vo["city"]); echo ($vo["county"]); ?></span>
                        <span><?php echo ($vo["date"]); ?></span>
                    </div>
                    <div class="new-icon">
                        <i></i>
                    </div>
                    <div class="hot-money"> 
                        <span><?php echo ($vo["price"]); ?> <?php echo ($vo["pricetype"]); ?></span>
                        <span>浏览量: <?php echo ((isset($vo["view"]) && ($vo["view"] !== ""))?($vo["view"]):"0"); ?></span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?> 
            </ul>
        </div>

        <div class="f_left">
           <!--  <div class="top">
               <h3>热门实习</h3>
               <div class="more">
                   <a href="/index.php/Home/Jobs/pageJobsLists">更多</a>
                   <i>
                       <em></em>
                       <span></span>
                   </i>    
               </div>
           </div>
           <ul>
               <li>
                   <span class="color-class9">开发</span>
                   <div class="job-hot">
                       <a href="">美团直销地面销售人员</a>
                       <span>区域：高新区</span>
                       <span>2015.10.30</span>
                   </div>
                   <div class="hot-icon">
                       <i></i><i></i>
                   </div>
                   <div class="hot-money"> 
                       <span>15元/小时</span>
                       <span>浏览次数：1234</span>
                   </div>
               </li>
               <li>
                   <span class="color-class8">传单</span>
                   <div class="job-hot">
                       <a href="">美团直销地面销售人员</a>
                       <span>区域：高新区</span>
                       <span>2015.10.30</span>
                   </div>
                   <div class="hot-icon">
                       <i></i><i></i>
                   </div>
                   <div class="hot-money"> 
                       <span>15元/小时</span>
                       <span>浏览次数：1234</span>
                   </div>
               </li>
               <li>
                   <span class="color-class3">服务员</span>
                   <div class="job-hot">
                       <a href="">美团直销地面销售人员</a>
                       <span>区域：高新区</span>
                       <span>2015.10.30</span>
                   </div>
                   <div class="hot-icon">
                       <i></i><i></i>
                   </div>
                   <div class="hot-money"> 
                       <span>15元/小时</span>
                       <span>浏览次数：1234</span>
                   </div>
               </li>
               <li>
                   <span class="color-class4">礼仪</span>
                   <div class="job-hot">
                       <a href="">美团直销地面销售人员</a>
                       <span>区域：高新区</span>
                       <span>2015.10.30</span>
                   </div>
                   <div class="hot-icon">
                       <i></i><i></i>
                   </div>
                   <div class="hot-money"> 
                       <span>15元/小时</span>
                       <span>浏览次数：1234</span>
                   </div>
               </li>
           </ul> -->
        </div>
        <div class="f_right">
            <!-- <div class="top">
                <h3>最新实习</h3>
                <div class="more">
                    <a href="/index.php/Home/Jobs/pageJobsLists">更多</a>
                    <i>
                        <em></em>
                        <span></span>
                    </i>    
                </div>
            </div>
            <ul>
                <li>
                    <span class="color-class1">开发</span>
                    <div class="job-hot">
                        <a href="">美团直销地面销售人员</a>
                        <span>区域：高新区</span>
                        <span>2015.10.30</span>
                    </div>
                    <div class="hot-money"> 
                        <span>15元/小时</span>
                        <span>浏览次数：1234</span>
                    </div>
                </li>
                <li>
                    <span class="color-class2">传单</span>
                    <div class="job-hot">
                        <a href="">美团直销地面销售人员</a>
                        <span>区域：高新区</span>
                        <span>2015.10.30</span>
                    </div>
                    <div class="hot-money"> 
                        <span>15元/小时</span>
                        <span>浏览次数：1234</span>
                    </div>
                </li>
                <li>
                    <span class="color-class3">服务员</span>
                    <div class="job-hot">
                        <a href="">美团直销地面销售人员</a>
                        <span>区域：高新区</span>
                        <span>2015.10.30</span>
                    </div>
                    <div class="hot-money"> 
                        <span>15元/小时</span>
                        <span>浏览次数：1234</span>
                    </div>
                </li>
                <li>
                    <span class="color-class4">礼仪</span>
                    <div class="job-hot">
                        <a href="">美团直销地面销售人员</a>
                        <span>区域：高新区</span>
                        <span>2015.10.30</span>
                    </div>
                    <div class="hot-money"> 
                        <span>15元/小时</span>
                        <span>浏览次数：1234</span>
                    </div>
                </li>
            </ul> -->
        </div>
    </div>
    <!-- 主页main end -->
   <!--  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
   <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
   
   优质企业start
   <div id="company" class="clearfix">
       <h3>优质企业</h3>
       <ul>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
           <li>
               <a href="">
                   <img src="/Public/new/images/company-demo.jpg" alt="" />
                   <span>阿里巴巴</span>
               </a>
           </li>
       </ul>
   </div> -->
    <!-- 优质企业end -->
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

</body>
</html>
<script>
	var i = 1;
	var scrolllist;
	jQuery(document).ready(function() {
//        isMobile();
		bindClick();
		doScroll();

		//判断有没有职位
		val = $("#infoList").html();
		val = $.trim(val);
		if(val == "" || val == null) {
			$("#infoList").html("<div style='text-align: center;'>该地区暂时没有职位信息</div>");
		}
	});

	//定时调用切换轮播图方法
	function doScroll() {
		jQuery.ajax({
			url: CON_PATH + "/scrolllist",
			success: function (data, textStatus, xhr) {
				scrolllist = data;
				//如果有一张以上的图片则掉用切换轮播图方法
				if(scrolllist.length > 1) {
					setInterval(scroll, 8000);
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
        sc.fadeOut("slow",function(){
            sc.attr("src", "/Uploads/"+scrolllist[i]['value']);
			sc.parent().attr("href", scrolllist[i]['else']);
            sc.fadeIn("slow",function(){
                i++;
            });
        });
	}

	function scrollNext() {
        var sc = $("#scroll");
        if(i >= 4) {
            i = 0;
        }
        sc.fadeOut("slow",function(){
            sc.attr("src", "/Uploads/"+scrolllist[i]['value']);
			sc.parent().attr("href", scrolllist[i]['else']);
             sc.fadeIn("slow",function(){
                i++;
            });

        });
	}

	function scrollPrev() {
        var sc = $("#scroll");
        if(i < 0) {
            i = 3
        }
        sc.fadeOut("slow",function(){
            sc.attr("src", "/Uploads/"+scrolllist[i]['value']);
			sc.parent().attr("href", scrolllist[i]['else']);
             sc.fadeIn("slow",function(){
                i--;
            });

        });
	}
	$('#prev').on('click',function(){
		scrollPrev();
	})

	$('#next').on('click',function(){
		scrollNext();
	})

    //判断是否使用手机访问
    function isMobile() {
        var sUserAgent = navigator.userAgent.toLowerCase();
        var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
        var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
        var bIsMidp = sUserAgent.match(/midp/i) == "midp";
        var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
        var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
        var bIsAndroid = sUserAgent.match(/android/i) == "android";
        var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
        var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
        if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
            location.href=APP_PATH+"/Weixin/Jobs/pageJobs"
        }else{

        }
    }
   $(document).ready(function() {
        //在账号密码输入框按回车，就触发登陆按钮的click事件
        $("#usernameInput, #passwordInput").keydown(function(e) {
            if(e.keyCode==13){
                $("#loginBtn").click();
            }
        });
    });

</script>