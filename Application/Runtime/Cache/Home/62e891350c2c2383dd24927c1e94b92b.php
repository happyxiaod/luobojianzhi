<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑信息</title>
    <!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/luoboNew/Public/new/css/base.css"/>
<link rel="stylesheet" href="/luoboNew/Public/new/css/user.css"/>
<script src="/luoboNew/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/luoboNew/Public/default/js/geethin.js"></script>
<script src="/luoboNew/Public/default/js/gtcheck.js"></script>
<script src="/luoboNew/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/luoboNew/index.php";
    var MOD_PATH = "/luoboNew/index.php/Home";
    var CON_PATH = "/luoboNew/index.php/Home/User";
    var SEL_PATH = "/luoboNew/index.php/Home/User/pageAddMyCenter.html";
    var ACT_PATH = "/luoboNew/index.php/Home/User/pageAddMyCenter";
</script>

</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
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
                    <li class="<?php echo $index?'current':'';?>"><a href="/luoboNew/index.php/Home">首页</a></li>
                    <li class="<?php echo $jobsList?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                    <li class="<?php echo $taitor?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageTailor">量身定制</a></li>
                    <li class="<?php echo $startLoan?'current':'';?>"><a href="/luoboNew/index.php/Home/Loan/startLoan">我要借贷</a></li>
                    <li class="<?php echo $practice?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pagePractice">实习</a></li>
                    <li class="<?php echo $serve?'current':'';?>"><a href="/luoboNew/index.php/Home/Jobs/pageServe">服务</a></li>
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="javascript:void(0);">人个中心</a>
                            <ul>
                                    <li><a href="/luoboNew/index.php/Home/User/pageResume">我的简历</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageUserApply">我的申请</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageCollect">我的收藏</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luoboNew/index.php/Home/User/pageEditMyCenter">编辑简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/luoboNew/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/luoboNew/index.php/Home/User/pageMyCenter">企业中心</a>
                            <ul>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageManage">数据中心</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pagePost">职位管理</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                                    <li><a href="/luoboNew/index.php/Home/Company/pageProve">企业信息</a></li>
                                    <li><a href="/luoboNew/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luoboNew/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luoboNew/index.php/Home/Company/pagePostJob">发布兼职</a></li>
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
                    <?php elseif($_SESSION['user']['adminname']== 'luobo'): ?>
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
                <input id="txtSearchKey" name="txtSearchKey"  type="text"  class="required BC_input_focus validationBinded BC_Input_error" placeholder="输入关键词" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,30})$]" maxlength="30" onkeydown="if(event.keyCode==13)searchjobsBtn.click()">
                <input id="searchjobsBtn" type="button"  name="searchjobsBtn" gt-btn-click="searchjobs" class="New_btn btn_i i1 YH btn_submit BC_validation" value="搜索">
            </div>
            <div class="search_hot">
                <ul>
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/luoboNew/index.php/Home/Jobs/pageJobsLists?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->
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
        <div id="person">
        <!-- 个人中心start -->

        <div class="per_b clearfix">
            <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="per_nav">
                <li id="pageResume"><a href="/luoboNew/index.php/Home/User/pageResume">我的简历</a></li>
                <li id="pageUserApply"><a href="/luoboNew/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li id="pageCollect"><a href="/luoboNew/index.php/Home/User/pageCollect">我的收藏</a></li>
                <!-- <li><a href="/luoboNew/index.php/Home/User/pageMsg">消息</a></li> -->
               <!--  <li id="pageWallet"><a href="/luoboNew/index.php/Home/User/pageWallet">我的钱包</a></li>
               <li id="pageMyloan"><a href="/luoboNew/index.php/Home/User/pageMyloan">我的借款</a></li>
               <li id="pageBill"><a href="/luoboNew/index.php/Home/User/pageBill">我的账单</a></li>
               <li id="Authentication"><a href="/luoboNew/index.php/Home/User/pageAuthentication">信用认证</a></li> -->
                <li id="pageSafety"><a href="/luoboNew/index.php/Home/User/pageSafety">安全保护</a></li>
                <li id="pageFeedback"><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li id="pageManage"><a href="/luoboNew/index.php/Home/Company/pageManage">管理中心</a></li>
                <li id="pageCompanyApply"><a href="/luoboNew/index.php/Home/Company/pagePost">职位管理</a></li>
                <li id="ResumeManage"><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                <li id="pageProve"><a href="/luoboNew/index.php/Home/Company/pageProve">企业信息</a></li>
                <li id="pageSafety"><a href="/luoboNew/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li id="pagePost"> <a href="/luoboNew/index.php/Home/Company/pagePost">我的发布</a></li>
                <li id="pageCompanyApply" ><a href="/luoboNew/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li id="pageProve" ><a href="/luoboNew/index.php/Home/Company/pageProve">认证信息</a></li>
                <li id="pageFeedback"><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/luoboNew/index.php/Home/User/pageSafety">安全保护</a></li>
                <li id="pageFeedback"><a href="/luoboNew/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
            <div class="per_r_dal">
                <h4 class="font-orange">简历信息</h4>
                <div class="per_cont" gt-model="userInfo">
                    <div>
                    <input type="hidden" value="<?php echo ($user["id"]); ?>" gt-isparam="id"/>
                        <span class="label_text">姓名</span>
                        <input type="hidden" gt-islabel="姓名"/>
                        <input  type="text" value="<?php echo ($user["realname"]); ?>" gt-isparam="realname" />
                    </div>
                    <label id="realnamewrong"></label>
                    <div>
                        <span class="label_text">性别</span>
                        <input type="hidden" gt-islabel="性别" id="sex"/>
                        <input type="radio" name="sex" gt-isparam="sex" value="男"><label for="boy">男</label>
                        <input type="radio" name="sex" gt-isparam="sex" value="女"><label for="girl">女</label>
                    </div>
                    <div>
                        <span class="label_text">所在地</span>
                        <div class="input-group spinner">
                            <!-- <span type="text" class="spinner-content" gt-isparam="province">省份</span> -->
                            <span type="text" class="spinner-content" gt-isparam="province"><?php echo ($user["province"]); ?></span>
                            <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon" >
                                &#xe81d;
                            </span>
                            <ul class="dropdown-menu">
                                <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="spinner-option select-province">
                                        <span loadid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></span>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="input-group spinner">
                           
                            <span type="text" class="spinner-content" gt-isparam="city"><?php echo ($user["city"]); ?></span>
                            <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon" >
                                &#xe81d;
                            </span>
                            <ul class="dropdown-menu" id="cityList">
                            </ul>
                        </div>
                        <div class="input-group spinner">
                            <span type="text" class="spinner-content" gt-islabel="地区" gt-isparam="county">选择地区</span>
                            <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon" >
                                 &#xe81d;
                            </span>
                            <ul class="dropdown-menu" id="countyList">
                            <?php if(is_array($countyList)): $i = 0; $__LIST__ = $countyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cl): $mod = ($i % 2 );++$i;?><li><?php echo ($cl["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                           </ul>
                        </div>
                    </div>
                    <div>
                        <span class="label_text">所在学校</span>
                        <div class="input-group spinner">
                            <span type="text" class="spinner-content" gt-isparam="school"><?php echo ($user["school"]); ?></span>
                            <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon" >
                                 &#xe81d;
                            </span>
                            <ul class="dropdown-menu" id="schoollist">
                                <?php if(is_array($schoolList)): $i = 0; $__LIST__ = $schoolList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="spinner-option select-school">
                                        <span loadid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></span>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <span class="label_text">入学年份</span>
                        <div class="input-group spinner">
                            <span type="text" class="spinner-content" gt-islabel="入学时间">选择入学时间</span>
                            <span type="text" class="spinner-content" gt-isparam="schoolyear"><?php echo ($user["schoolyear"]); ?></span>
                            <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon">
                                 &#xe81d;
                            </span>
                            <ul class="dropdown-menu">
                                <li>2007年</li>
                                <li>2008年</li>
                                <li>2009年</li>
                                <li>2010年</li>
                                <li>2011年</li>
                                <li>2012年</li>
                                <li>2013年</li>
                                <li>2014年</li>
                                <li>2015年</li>
                                <li>其他</li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <span class="label_text">手机号码</span>
                        <input type="hidden" gt-islabel="手机号"/>
                        <input  type="text" gt-isparam="phone" gt-check="phone" placeholder="手机号" value="<?php echo ($user["phone"]); ?>">
                    </div>
                   <label  id="phoneWrong"></label>
                    <div>
                        <span class="label_text">QQ号码</span>
                        <input  type="text" gt-isparam="qq"placeholder="QQ号" value="<?php echo ($user["qq"]); ?>">
                    </div>
                     <label  id="qqWrong"></label>
                    <div style="overflow:hidden;height:auto;">
                        <span class="label_text">证件上传</span>
                        <div class="person_r">
                            <div class="papers">正面</div>
                            <img class="reg-id-img" src="/luoboNew/Uploads/<?php echo ($user["idobverse"]); ?>" alt="" />
                            <input type="hidden" gt-islabel="证件正面"/>
                            <input type="file" gt-isparam="idobverse"/>         
                        </div>
                        <div class="person_r">
                            <div class="papers">背面</div>
                            <img class="reg-id-img" src="/luoboNew/Uploads/<?php echo ($user["idreverse"]); ?>" alt="" />
                            <input type="hidden" gt-islabel="证件背面"/>
                            <input type="file" gt-isparam="idreverse"/>           
                        </div>
                        <span class="font-orange tip-msg">身份证或学生证</span>
                    </div>
                    <!-- <label for="" class="wrong">请上传图片</label> -->                   
                    <div style="overflow:hidden;height:auto;">
                        <span class="label_text">自我评价</span>
                        <input type="hidden" gt-islabel="自我评价"/>
                        <textarea name="" id="" cols="30" rows="10" gt-isparam="intro" vali="custom[^([\u4E00-\u9FA5A-Za-z\s]{2,200})$]" maxlength="200"><?php echo ($user["intro"]); ?></textarea>
                    </div>
                    <div class="company_tk">
                        <input type="checkbox" name="" id="" />我已阅读<a href="" class="font-blue">《萝卜兼职协议条款》</a>
                    </div>
                    <input type="button" value="立即确认" class="btn_save" gt-btn-click="addMyInfo"/>
                </div>
            </div>
        </div>
        <!-- 个人中心end -->
    </div>


    <!-- 底部内容 -->
        <head>
<link href="/luoboNew/Public/default/css/gt.home.css" />
</head>
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/aboutUs">关于捷城</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=AboutRadish">企业动态</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=FeedBack">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Question">常见问题</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Service">企业服务</a></dd>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
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
                <dt>0631-5666168</dt>
                <dd><a href="/luoboNew/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
        </div>
    </div>

</div>
</body>
</html>
<script>
    jQuery(document).ready(function($) {
        bindClick();
        bindCheck();
        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pageMyCenter").removeClass("nav-normal").addClass("nav-active");
        
         $("input[gt-isparam='realname']").blur(function(){
            nameStr=$(this).val();
            if(verfifyContactName(nameStr)){
                $(this).removeClass("error");
                $("#realnamewrong").removeClass("wrong");
                $("#realnamewrong").html("");
            }else{
               $(this).addClass("error"); 
               $("#realnamewrong").addClass("wrong");
               $("#realnamewrong").html("请输入中文、数字、或英文");
            }
        });
         $("input[gt-isparam='qq']").blur(function(){
            var qq=$(this).val();
            gtCheckQQ(qq);
         })

        //设置当前性别
        sex = $("#sex").val();
        $("input[name='sex']").each(function(e) {
            if($(this).val() == sex) {
                $(this).attr("checked", "checked");
            }
        });

        //获取城市列表
        $(".select-province").on('click', '', function (event) {
            event.preventDefault();
            var province = $(this).find("span").attr("loadid");
            province = $.trim(province);
            $.post(MOD_PATH + "/Index/getCityByProvince", {province: province}, function (data) {
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option select-city'><span loadid='" + value['id'] + "'>" + value['name'];
                        str += "</span></li>";
                    });
                    $("#cityList").html(str);
                } else {
                    $("#cityList").html("");
                    dealReturn("获取城市列表失败");
                }
            });
        });

        //获取区县列表和学校列表
        $("body").on('click', '.select-city', function (event) {
            event.preventDefault();
            var city = $(this).find("span").attr("loadid");
            city = $.trim(city);
            $.post(MOD_PATH + "/Index/getCountyByCity", {city: city}, function (data) {
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option'><span>" + value['name'];
                        str += "</span></li>";
                    });
                    $("#countyList").html(str);
                } else {
                    $("#countyList").html("");
                    dealReturn("获取区（县）列表失败");
                }
            });

            $.post(CON_PATH + "/getSchoolByCity", {city: city}, function (data) {
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option'><span>" + value['school'];
                        str += "</span></li>";
                    });
                    $("#schoollist").html(str);
                } else {
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option'><span>先选择省</span></li>";                     
                    });
                    $("#schoollist").html(str);
                    dealReturn("该城市暂无学校信息");
                }
            });
            
        });
        //地区选择
        $(".dropdown-menu").delegate('.spinner-option','click', function (event) {
            var city=$("sapn[gt-isparam='city']").val();
            var value = $(this).find("span").html();
            value = $.trim(value);
            $(this).parent().siblings(".spinner-content").html(value);
        });

         $("input[type='file']").on("change", function(){
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
        var name=$(this).attr("gt-isparam");
        // 判断是否为图片类型
        if (/^image/.test( files[0].type)){
            var img = $(this).siblings(".reg-id-img");
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
                img.attr("src", this.result);
            };
            //ajax提交图片
            postfile(APP_PATH + '/User/User/uploadFile',files[0],name);
        }else{
            alert("请选择图片进行上传");
        }
    });

    });
</script>