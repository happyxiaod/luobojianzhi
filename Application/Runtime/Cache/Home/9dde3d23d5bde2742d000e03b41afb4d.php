<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>兼职页</title>
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
    var SEL_PATH = "/index.php/Home/Jobs/pageJobsDetails?id=1542";
    var ACT_PATH = "/index.php/Home/Jobs/pageJobsDetails";
</script>
    
    <style type="text/css">
        .row span {line-height: auto; }
        .mask{margin:0;padding:0;border:none;width:100%;height:100%;background:#333;opacity:0.6;filter:alpha(opacity=60);z-index:9999;position:fixed;top:0;left:0;display:none;}
        #reportBox{position:absolute;left:40%;top:60%;background:white;width:426px;height:282px;border:3px solid #444;border-radius:7px;z-index:10000;display:none;}
        #reportBox strong {background:#f7f7f7;padding:0px 30%;line-height:50px;height:50px;font-weight:bold;color:#666;font-size:20px;}
        .close_btn{font-family:arial;font-size:30px;font-weight:700;color:#999;text-decoration:none;float:right;padding-right:4px;}

        #reportBox  input {
    cursor: pointer;
    padding: 5px 30px;
    background-color: #ed7612;
    color: #fff;
    border-radius: 5px;
    font-size: 16px;
    display: block;
    margin: 32px auto 0;
}
    .pl_in{
        width: 400px;
        margin:0px auto;
    height: 26px;
    line-height: 26px;
    }

    .pl_in a {
    color: #ed7612;
    margin-left: 50px
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
        <script>

var maxstrlen=100;

function Q(s){return document.getElementById(s);}

function checkWord(c){

len=maxstrlen;

var str = c.value;

myLen=getStrleng(str);

var wck=Q("wordCheck");

if(myLen>len*2){

c.value=str.substring(0,i+1);

}

else{

wck.innerHTML = Math.floor((len*2-myLen)/2);

}

}

function getStrleng(str){

myLen =0;

i=0;

for(;(i<str.length)&&(myLen<=maxstrlen*2);i++){

if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)

myLen++;

else

myLen+=2;

}

return myLen;

}

</script>
<div id="quarter">
        <h2> <?php echo ($jobDetails["title"]); ?></h2>
        <div class="row clearfix">
            <div class="pull-left">
                <span>兼职类型：<b class="font-orange"><?php echo ($jobDetails["level1"]); ?> <?php echo ($jobDetails["level2"]); ?></b></span>
            </div>
            <div class="pull-right">
                <span>地区：<?php echo ($jobDetails["area"]); ?></span>
                <span>发布时间：<?php echo ($jobDetails["date"]); ?></span>
                <!--TODO 填写阅读数-->
                <span>阅读：<?php echo ($jobDetails["view"]); ?></span>
            </div>
        </div>
        <div class="row map clearfix">
            <div class="pull-left">
                <p>
                    发布机构：<span style="color: #0A83FF"><?php echo ($jobDetails["name"]); ?></span>
                </p>
                <p>
                    招聘人数：<span><?php echo ($jobDetails["number"]); ?></span>
                </p>
                <p>
                    工资待遇：<span><?php echo ($jobDetails["price"]); ?> <?php echo ($jobDetails["pricetype"]); ?></span>
                </p>
                <p>
                    详细地址：<span id="mapaddress"><?php echo ($jobDetails["address"]); ?></span>
                </p>
                <input type="button" id="sendApply" value="发送申请" />
            </div>
            <div class="pull-right">
                 <div id="bdmap" style="width:100%;height:220px;border:1px solid #bbb;border-radius: 3px;">
            </div>
            </div>
        </div>
        <div class="row">
            <h3>职位描述：</h3>
            <div class="mul-text">
                <p id="job-intro"><?php echo ($jobDetails["intro"]); ?></p>
               <!--  <textarea id="job-intro"><?php echo ($jobDetails["intro"]); ?></textarea> -->
            </div>
        </div>
        <div class="row">
            <h3>企业简介：</h3>
            <div class="company">
                <p><?php echo ($company["companyname"]); ?></p>
                <p><?php echo ($company["companytype"]); ?></p>
                <p><?php echo ($company["contacterphone"]); ?></p>
                <p><?php echo ($company["province"]); echo ($company["city"]); echo ($company["county"]); echo ($company["address"]); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="contact">
                <p>联系人：<?php echo ($jobDetails["contacter"]); ?></p>
                <p>联系电话：<?php echo ($jobDetails["phone"]); ?> <a href="/index.php/Home/Index/pageLogin" class="font-blue" ></a></p>
                <p class="font-orange">提示：凡收取费用，需缴纳押金的企业均有欺诈嫌疑，请您警惕！
                </br>
                联系时请说是在萝卜兼职上看到的兼职信息，谢谢</p>
            </div>
        </div>

        <div class="row">
            <div class="share bdsharebuttonbox" data-tag="share_2">
                <a href="" id="collect" jobid="<?php echo ($jobDetails["id"]); ?>" style="height: 39px">收藏</a>
                <a class="bds_more" data-cmd="more" style="height: 39px">分享</a>
                <a href="#"  style="height: 39px" id="complaint">举报</a>
            </div>
        </div>
    </div>
    <!-- 岗位信息end -->

    <!-- 评论start -->
    <div id="review">
        <ul>
        <?php if(is_array($commentsList)): $i = 0; $__LIST__ = $commentsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cl): $mod = ($i % 2 );++$i;?><li>
                <b>评论：</b>
                <div class="review_in">
    <?php if( $cl["headpic"] == '' ): ?><img src="/Public/new/images/about_inso1.png" alt="默认头像" />
    <?php else: ?>
    <img src="<?php echo ($cl["headpic"]); ?>" alt="" /><?php endif; ?>

                    
                    <div>
                        <span class="font-orange"><?php echo ($cl["username"]); ?></span>
                        <p><?php echo ($cl["content"]); ?></p>
                    </div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    <?php if($_SESSION['user']!= ''): ?><strong>你的评论</strong>
         还可以输入<span style="font-family: Georgia; font-size: 21px;" id="wordCheck">100</span>个字符
        <div class="review_pl"> 
             <form name="myform" method="post" action="/index.php/Home/Jobs/jobComment" >  
                 <textarea name="message"  rows="6" onKeyUp="javascript:checkWord(this);" onMouseDown="javascript:checkWord(this);" name="content"></textarea>
                  <input type="hidden" name="jobid" value="<?php echo ($jobDetails["id"]); ?>"> </input>
                  <input type="hidden" name="companyid" value="<?php echo ($company["id"]); ?>"> </input>
                 <input type="submit" value="提交"/>      
            </form> 
        </div>
    <?php else: ?>
        <div class="pl_in">
                登陆后可以进行评论<a href="/index.php/Home/Index/pageLogin">立即登录</a><a href="/index.php/Home/Index/pageReg">立即注册</a>
        </div><?php endif; ?>
    </div>


    <div id="reportBox"> 
    
            <strong>举报信窗口</strong><a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="closeBtn">×</a>
    
        <form name="Report" method="post" action="/index.php/Home/Jobs/jobReport" >  
                 <textarea  rows="6" cols="58"  name="reportContent"  placeholder="填写举报原因"></textarea>
                  <input type="hidden" name="jobid" value="<?php echo ($jobDetails["id"]); ?>"> </input> 
                  <input type="hidden" name="jobtitle" value="<?php echo ($jobDetails["title"]); ?>"> </input>
                  <input type="hidden" name="jobinfo" value="<?php echo ($jobDetails["info"]); ?>"> </input>
                  <input type="hidden" name="companyid" value="<?php echo ($company["id"]); ?>"> </input>
                 <input type="submit" value="提交"/>      
        </form> 
    </div>
    
    <!-- 评论end -->
    

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=P5AXQi2Q4I1wGcSGdIYZMPOG"></script>
<!--百度地图相关-->
<script type="text/javascript">
    var map = new BMap.Map("bdmap");    // 创建Map实例
    var point = new BMap.Point(122.09395837, 37.52878708);//威海
    map.centerAndZoom(point, 14);
    //    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

    // 创建地址解析器实例
    var myGeo = new BMap.Geocoder();
    var address = $("#mapaddress").html();
    address = $.trim(address);
    // 将地址解析结果显示在地图上,并调整地图视野
    myGeo.getPoint(address, function (point) {
        if (point) {
            map.centerAndZoom(point, 16);
            map.addOverlay(new BMap.Marker(point));
        } else {
            alert("您选择地址没有解析到结果!");
        }
    }, "威海市");

    var regN=/[\n]/g;
    $("#job-intro").hide();
    var intro = $("#job-intro").html();
    intro=intro.replace(regN,"<br/>");
    $(".mul-text").html(intro);
        //弹出举报
        $('#complaint').on('click',function(){
            jQuery.ajax({
                url: '/index.php/Home/Jobs/checklogin',
                type: 'GET',
                complete: function (xhr, textStatus) {
                   
                },
                success: function (data, textStatus, xhr) {
                   if (data['status']==0) {
                    gtAlert(data['info']);
                   }else{
                    $("body").append("<div id='mask'></div>");
                    $("#mask").addClass("mask").fadeIn("slow");
                    $("#reportBox").fadeIn("slow");
                   }

                },
                error: function (xhr, textStatus, errorThrown) {  
                }
            });

        });

       //关闭
        $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
            $("#reportBox").fadeOut("fast");
            $("#mask").css({ display: 'none' });
        });

        

      

</script>


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
	jQuery(document).ready(function($) {
		bindClick();

        //发送申请
        $("#sendApply").on('click', '', function (event) {
            event.preventDefault();
            var jobid = "<?php echo ($jobDetails["id"]); ?>";
            var companyname = "<?php echo ($jobDetails["name"]); ?>";
            var title = "<?php echo ($jobDetails["title"]); ?>";
            var companyphone="<?php echo ($jobDetails["phone"]); ?>";
            var companyid="<?php echo ($jobDetails["uid"]); ?>";
            jQuery.ajax({
                url: '/index.php/Home/Jobs/sendApply',
                type: 'POST',
                data: {"jobid":jobid, "companyname":companyname,"title":title,"companyphone":companyphone,"companyid":companyid},
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

        //收藏
        $("#collect").on('click', '', function (event) {
            event.preventDefault();
            jobid = $(this).attr("jobid");
            jQuery.ajax({
                url: '/index.php/Home/Jobs/collect',
                type: 'POST',
                data: {'jobid': jobid},
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
	});

            //百度分享
     window._bd_share_config = {
        common : {
            bdText : '发现一个靠谱的大学生兼职平台，小伙伴们都来瞧一瞧吧！',  
            bdDesc : '萝卜兼职',    
            bdUrl : 'http://www.luobojianzhi.com',  
            bdPic : 'http://www.luobojianzhi.com/Public/new/images/banner01.jpg',
        },
        share : [{
            "tag" : "share_2",
            "bdSize" : 50
        }],
        slide : [{     
            bdImg : 0,
            bdPos : "right",
            bdTop : 100
        }],
        image : [{
            viewType : 'list',
            viewPos : 'top',
            viewColor : 'black',
            viewSize : '20',
            viewList : ['qzone','tsina','huaban','tqq','renren']
        }],
        selectShare : [{
            "bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
        }]
    }
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>