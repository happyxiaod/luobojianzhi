<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的发布</title>
    <!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/Public/new/css/base.css"/>
<link rel="stylesheet" href="/Public/new/css/user.css"/>
<script src="/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Home";
    var CON_PATH = "/index.php/Home/Company";
    var SEL_PATH = "/index.php/Home/Company/pagePostJob";
    var ACT_PATH = "/index.php/Home/Company/pagePostJob";
</script>
    <script src="/Public/default/js/datetimepicker.min.js"></script>
    <script src="/Public/default/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=P5AXQi2Q4I1wGcSGdIYZMPOG"></script>
<style type="text/css">
    .per_r_dal .add {
    height: auto;
    }
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
                <?php if($_SESSION['user']['type']== 'seeker'): ?><li class="<?php echo $pageMyloan1?'current':'';?>"><a href="/index.php/Home/User/pageMyloan1">我要借款</a></li>
                <?php else: ?>
                   <li class="<?php echo $pageMyloan1?'current':'';?>"><a href="/index.php/Home/Loan/startLoan">我要借款</a></li><?php endif; ?>
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
        <div id="person">
        <!-- 个人中心start -->
        <div class="per_t">
            <div class="per_nav">
                <a href="">首页</a> > <a href="">企业管理中心</a>
            </div>
            <div class="per_dal">
                
            </div>
        </div> 
        <div class="per_b clearfix">
            <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="per_nav">
                <li id="pageResume"><a href="/index.php/Home/User/pageResume">我的简历</a></li>
                <li id="pageUserApply"><a href="/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li id="pageWallet"><a href="/index.php/Home/User/pageWallet">我的钱包</a></li>
                <li id="pageMyloan"><a href="/index.php/Home/User/pageMyloan1">我的借款</a></li>
                <li id="pageBill"><a href="/index.php/Home/User/pageBill">我的账单</a></li>
                <li id="Authentication"><a href="/index.php/Home/User/pageAuthentication">信用认证</a></li>
                <li id="pageCollect"><a href="/index.php/Home/User/pageCollect">我的收藏</a></li>
                <!-- <li><a href="/index.php/Home/User/pageMsg">消息</a></li> -->
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li id="pageManage"><a href="/index.php/Home/Company/pageManage">管理中心</a></li>
                <li id="pagePost"><a href="/index.php/Home/Company/pagePost">职位管理</a></li>
                <li id="pageCompanyApply"><a href="/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                <li id="pageProve"><a href="/index.php/Home/Company/pageProve">企业信息</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li id="pagePost"> <a href="/index.php/Home/Company/pagePost">我的发布</a></li>
                <li id="pageCompanyApply" ><a href="/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li id="pageProve" ><a href="/index.php/Home/Company/pageProve">认证信息</a></li>
                <li id="pageFeedback"><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
            <div class="per_r_dal">
                <h4 class="font-orange">
                    发布兼职
                    <a href="" class="return">返回</a>
                </h4>
            
                <div class="per_cont" gt-model="job">
                    <div>
                        <span class="label_text">兼职标题</span>
                        <input type="hidden" gt-islabel="兼职标题"/>
                       <!--  <input type="text" class="error" gt-isparam="title"/> -->
                        <input type="text"gt-isparam="title"/>
                    </div>
                    <!-- <label for="user_name" class="wrong">兼职标题填写有误</label> -->
                    <div>
                        <span class="label_text">兼职类别</span>
                        <div class="input-group spinner">
                            <select name="level1" gt-isparam="level1"  style="width:100%">
                                <!-- <option value="<?php echo $level1list['name']?$level1list['name']:'选择分类';?>"><?php echo $level1list['name']?$level1list['name']:'选择分类';?></option> -->
                                 <option>选择分类</option>
                                <?php if(is_array($level1list)): $i = 0; $__LIST__ = $level1list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="input-group spinner">
                        <select name="" gt-isparam="level2" id="level2ListBox" style="width:100%">
                                <option>选择职位</option>
                        </select>

                        </div>
                    </div>
                    <div class="add">
                        <span class="label_text">工作地点</span>
                        <div class="input-group spinner">             
                            <select name="province" gt-isparam="province"  style="width:100%">
                                    <option value="">请选择省</option>
                                    <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" loadid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="input-group spinner">                         
                            <select name="city" gt-isparam="city" id="cityList" class="select-city" style="width:100%">
                                <option value="">选择城市</option>  
                            </select>
                        </div>
                        <div class="input-group spinner">
                            <select name="" gt-isparam="county" id="countyList" style="width:100%">
                                <option value="">选择地区</option>
                            </select>
                        </div> 
                        <input type="hidden" gt-islabel="详细地址"/>                         
                        <input type="text" name="" gt-isparam="address" placeholder="请输入详细地址" />
                        <div id="bdmap" style="height:220px;width:600px;margin-left:180px; border-radius: 3px;
                            border:1px solid #aaa">

                        </div>
                      <!-- <img src="/Public/new/images/company_add.jpg" alt="" /> -->
                    </div>
                    <div>
                        <span class="label_text">开始时间</span>
                        <input type="hidden" gt-islabel="开始时间"/>
                        <input type="date"  class="calendar_input" gt-isparam="starttime" placeholder="请输入日期：2015-04-01" gt-check="date" />
                    </div>
                    <div>
                        <span class="label_text">截止时间</span>
                        <input type="hidden" gt-islabel="截止时间"/>
                       <!--  <input type="date" class="calendar_input error" gt-isparam="endtime" placeholder="请输入日期：2015-04-01" gt-check="date" />    -->
                        <input type="date" class="calendar_input" gt-isparam="endtime" placeholder="请输入日期：2015-04-01" gt-check="date" />   
                    </div>
                    <!-- <label for="" class="wrong">截止日期不能大于开始日期</label> -->
                    <div>
                        <span class="label_text">联系人</span>
                        <input type="hidden" gt-islabel="联系人"/>
                        <input type="text"  gt-isparam="contacter"/>
                    </div>
                    <div>
                        <span class="label_text">联系电话</span>
                        <input type="hidden" gt-islabel="联系电话"/>
                        <input type="text" gt-isparam="phone" gt-check="phone"/>
                    </div>
                    <!-- <label for="tel" class="wrong">手机号码输入有误</label> -->
                    <div>
                        <span class="label_text">招聘人数</span>
                         <input type="hidden" gt-islabel="招聘人数"/>
                        <input type="text"  gt-isparam="number" gt-check="number"/>
                    </div>
                    <div>
                        <span class="label_text">工资待遇</span>
                        <input type="hidden" gt-islabel="工资待遇"/>
                       <!--  <input type="text" class="width130 error" gt-isparam="price"/> -->
                         <input type="text" class="width130" gt-isparam="price"/>
                        <div class="input-group spinner">
                            <select name="pricetype" gt-isparam="pricetype"  style="width:100%">
                                    <option value="单位">单位</option>
                                    <option value="元/小时">元/时</option>
                                    <option value="元/天">元/天</option>
                                    <option value="元/月">元/月</option>
                            </select>
                        </div>
                        <div class="input-group spinner">
                             <select name="paytype" gt-isparam="paytype"  style="width:100%">
                                    <option value="结算方式">结算方式</option>
                                    <option value="日结">日结</option>
                                    <option value="周结">周结</option>
                                    <option value="月结">月结</option>
                                    <option value="按量(次)结">按量(次)结</option>
                            </select>
                        </div>
                    </div>
                    <!-- <label for="" class="wrong">工资只能是数字</label> -->
                    <div style="overflow:hidden;height:auto;">
                        <span class="label_text">职位描述</span>
                        <input type="hidden" gt-islabel="职位描述"/>
                        <textarea rows="4" cols="30" rows="10" gt-isparam="intro"></textarea>
                    </div>
                    <input type="button" value="确定发布" class="btn_save" gt-btn-click="postJob"/>
                </div>
            </div>
        </div>
        <!-- 个人中心end -->
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


<script type="text/javascript">
    jQuery(document).ready(function () {
        bdmap();
        bindClick();
        bindCheck();
        bindSpinner();
        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pagePost").removeClass("nav-normal").addClass("nav-active");
        //选择职位分类事件
        $("select[name='level1']").on('change', '', function (event) {
            id = $(this).val();
            jQuery.ajax({
                url: CON_PATH + "/option_fragLevel2List",
                type: 'POST',
                data: {'id': id},
                complete: function (xhr, textStatus) {
                    //called when complete
                },
                success: function (data, textStatus, xhr) {

                    if (data != "failed") {
                        var str = "";
                        $.each(data, function (key, value) {
                            str += "<option value='" + value['id']+"'>";
                            str += value['name']+"</option>";
                        });
                        $("#level2ListBox").html(str);


                    } else {
                        $("#level2ListBox").html("");
                        dealReturn("暂无职位信息信息");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {

                }
            });
        });

      

    });

    $('#form_date').datetimepicker({
        format: 'yyyy-mm-dd',
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2
    });

    function bdmap() {
        var map = new BMap.Map("bdmap");    // 创建Map实例
        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        var geoc = new BMap.Geocoder();
        var point;
        var nowCity="<?php echo (session('nowCity')); ?>";
        map.centerAndZoom(nowCity);

        //鼠标点击后定位
        map.addEventListener("click", function (e) {
            var pt = e.point;
            var mk = new BMap.Marker(pt);
            map.clearOverlays();
            map.addOverlay(mk);
            map.panTo(pt);

            geoc.getLocation(pt, function (rs) {
                var addComp = rs.addressComponents;
                $("[gt-isparam='address']").val(addComp.province + addComp.city + addComp.district + addComp.street
                + addComp.streetNumber);

            });
        });
    }

     //选择省事件
        $("select[name='province']").on('change','',function() {
            var pname=$(this).val();
            jQuery.ajax({
                url: MOD_PATH + "/Index/getCityByProvinceName",
                type: 'POST',
                dataType: '',
                data: {'province': pname},
                complete: function (xhr, textStatus) {
                    //called when complete
                    //getSchool();
                },
                success: function (data, textStatus, xhr) {
                    if (data != "failed") {
                        var str = "";
                        $.each(data, function (key, value) {
                            str += "<option value='" + value['id']+"'>";
                            str += value['name']+"</option>";
                        });
                        $("#cityList").html(str);
                        getCounty();

                    } else {
                        $("#cityList").html("");
                        dealReturn("暂无城市信息");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("获取城市列表失败");
                }
            });

        });

 //获取区县列表

    $("select[name='city']").on('change','',function() {
            getCounty();
    });

     function getCounty() {
        var cityId= $("#cityList").val();

        $.post(MOD_PATH + "/Index/getCountyByCity", {city: cityId}, function (data) {

            if (data != "failed") {
                var str = "";
                $.each(data, function (key, value) {
                    str += "<option value='" + value['name']+"'>";
                    str += value['name']+"</option>";
                });
                $("#countyList").html(str);
            } else {
                $("#countyList").html("");
                dealReturn("该城市暂地区信息");
            }
        });

    }

  

</script>