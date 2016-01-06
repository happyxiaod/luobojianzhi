<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>工作申请</title>
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
    var SEL_PATH = "/index.php/Home/Company/pageCompanyApply";
    var ACT_PATH = "/index.php/Home/Company/pageCompanyApply";
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
        <!--简历管理-->
<style>
 .apply{
  line-height:30px;
  height:30px;
  width:50px;
  color:#ffffff;
cursor: pointer;
  font-size:16px;
  font-weight:bold;
  font-family:Arial;
  border:0px solid #dcdcdc;
  -webkit-border-top-left-radius:3px;
  -moz-border-radius-topleft:3px;
  border-top-left-radius:3px;
  -webkit-border-top-right-radius:3px;
  -moz-border-radius-topright:3px;
  border-top-right-radius:3px;
  -webkit-border-bottom-left-radius:3px;
  -moz-border-radius-bottomleft:3px;
  border-bottom-left-radius:3px;
  -webkit-border-bottom-right-radius:3px;
  -moz-border-radius-bottomright:3px;
  border-bottom-right-radius:3px;
  -moz-box-shadow: inset 0px 0px 0px 0px #ffffff;
  -webkit-box-shadow: inset 0px 0px 0px 0px #ffffff;
  box-shadow: inset 0px 0px 0px 0px #ffffff;
  text-align:center;
  display:inline-block;
  text-decoration:none;
}
.applyYes:hover{
  background-color:#1c9439;
}
.applyYes{
  background-color:#3ba354;
}

.applyNo:hover{
  background-color:#fb2b16;
}
.applyNo{
  background-color:#fd1901;
}
</style>
<div id="person">
        <!-- 个人中心start -->
        <div class="per_t">
            <div class="per_nav">
 <a href="/index.php/Home/Company/pageCompanyApply/pageManage">首页</a> > <a href="/index.php/Home/Company/pageCompanyApply"><?php echo ($top_nav); ?></a>
</div>
<div class="per_dal">
    <img class="reg-id-img" src="/Uploads/<?php echo ($user["logo"]); ?>" width="130" height="130" />
    <div>
    <span><?php echo ($user["companyname"]); ?></span>
    <p><?php echo ($user["companytype"]); ?></p>
    <!-- <a href="">修改头像</a> -->
    <p><?php echo ($user["intro"]); ?></p>
    </div>
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
                <h4 class="normal">
                    <a href="#" class="cur">所有简历</a>
                    <a href="?state=2">待处理</a>
                    <a href="?state=1">已通过</a>
                    <a href="?state=0">已拒绝</a>
                </h4>
                <div>
                    <div class="per_work per_work_cur">
                        <table class="manage">
                            <tr>
                                <th width="150">职位名称</th>
                                <th width="120">申请人</th>
                                <th width="220">学校</th>
                                <th width="120">申请时间</th>
                                <th width="120">个人简历</th>
                                <th>操作</th>
                            </tr>
                        <?php if(is_array($applylist)): $i = 0; $__LIST__ = $applylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["title"]); ?></td>
                                <td><?php echo ($vo["realname"]); ?></td>
                                <td><?php echo ($vo["school"]); ?></td>
                                <td><?php echo ($vo["createtime"]); ?></td>
                                <td><a href="/index.php/Home/User/viewResume?id=<?php echo ($vo["uid"]); ?>" style="background:url();padding:5px;color: #fff;background-color: #ed7612;">查看简历</a>
                                <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id"/>
                                <input type="hidden" value="<?php echo ($vo["phone"]); ?>" name="phone"/>
                                <input type="hidden" value="<?php echo ($vo["realname"]); ?>" name="realname"/>
                                <input type="hidden" value="<?php echo ($vo["jobid"]); ?>" name="jobid"/>
                                </td>
                            <?php if($vo["state"] == 2): ?><td>
                                <span class="apply applyYes"  style="margin-right: 10px;">确认</span>
                                <span class="apply applyNo"  style="margin-right: 10px; ">拒绝</span>
                            </td>
                                <?php elseif($vo["state"] == 1): ?>
                            <td><span style="color: green">已确认</span></td>
                                <?php elseif($vo["state"] == 0): ?>
                            <td><span style="color: red">已拒绝</span></td><?php endif; ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
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
<script>
    var ids = [];
    var boxs = $(".list-box").find("input[type='checkbox']");
    jQuery(document).ready(function ($) {
        bindClick();
        choseAllMsg();
        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pageCompanyApply").removeClass("cur").addClass("cur");

        $(".list-operate-btn").on('click', '', function (event) {
            event.preventDefault();
            if (ids.length>0){
                post("deljob", ids);
            } else {
                alert("未选中任何选项!");
            }
        });
    });
            //点击确认事件
        $(".applyYes").on('click', '', function (event) {
            event.preventDefault();
            var id = $(this).parent().prev().children("input").eq(0).val();
            var jobid = $(this).parent().prev().children("input").eq(3).val();
            var seekerphone = $(this).parent().prev().children("input").eq(1).val();
            var seekername = $(this).parent().prev().children("input").eq(2).val();
            jQuery.ajax({
                url: '/index.php/Home/Company/applyYes',
                type: 'POST',
                data: {'id': id,"seekername":seekername,"seekerphone":seekerphone,'jobid':jobid},
                complete: function (xhr, textStatus) {
                    //called when complete
                },
                success: function (data, textStatus, xhr) {
                    dealReturn(data);
                },
                error: function (xhr, textStatus, errorThrown) {

                }
            });
        });

        //点击拒绝事件
        $(".applyNo").on('click', '', function (event) {
            event.preventDefault();
           var data={};
            data['id'] = $(this).parent().prev().children("input").eq(0).val();
            post(CON_PATH + "/applyNo", data);
        });

    function choseAllMsg() {
        $("#choseAllMsg").on('click', '', function () {
            if ($(this).is(":checked")) {
                ids.splice(0, ids.length);
                boxs.prop("checked", true);
                boxs.each(function () {
                    var id = $(this).siblings("input[type='hidden']").val();
                    ids.push(id);
                });

            } else {
                boxs.prop("checked", false);
                ids.splice(0, ids.length);
            }
        });
        boxs.on('click', function (event) {
            var id = $(this).siblings("input[type='hidden']").val();
            if ($(this).is(":checked")) {
                ids.push(id);

            }else{
                $("#choseAllMsg").prop("checked",false);
                for (i=0; i<=ids.length; i++) {
                    if (ids[i] == id) {
                        ids.splice(i, 1);
                    }
                }

            }
        });
    }
</script>