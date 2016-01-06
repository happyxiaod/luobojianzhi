<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>认证信息</title>
	<!--
Code by NilTor
Email:admin@geethin.com
-->
<meta name="renderer" content="webkit">
<meta name="baidu-site-verification" content="ID4hXOITos" />
<meta name="keywords" content="萝卜兼职，大学生兼职平台，靠谱兼职，luobojianzhi">
<meta name="description" content="萝卜兼职，做最靠谱的大学生兼职平台">
<link rel="stylesheet" href="/luobofinal/Public/new/css/base.css"/>
<link rel="stylesheet" href="/luobofinal/Public/new/css/user.css"/>
<script src="/luobofinal/Public/default/js/jquery1.10.2.min.js"></script>
<script src="/luobofinal/Public/default/js/geethin.js"></script>
<script src="/luobofinal/Public/default/js/gtcheck.js"></script>
<script src="/luobofinal/Public/default/js/gt.home.js"></script>
<script>
    var APP_PATH = "/luobofinal/index.php";
    var MOD_PATH = "/luobofinal/index.php/Home";
    var CON_PATH = "/luobofinal/index.php/Home/Company";
    var SEL_PATH = "/luobofinal/index.php/Home/company/pageprove";
    var ACT_PATH = "/luobofinal/index.php/Home/Company/pageprove";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
        <div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock">
                <h1><a href="/luobofinal/index.php/Home/Index"><img src="/luobofinal/Public/new/images/logo.png"></a></h1>
                <div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/luobofinal/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <ul class="nav">
                    <li class="current"><a href="/luobofinal/index.php/Home">首页</a></li>
                    <li><a href="/luobofinal/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
                    <li><a href="/luobofinal/index.php/Home/Jobs/pageTailor">量身定制</a></li>
                    <li><a href="/luobofinal/index.php/Home/Jobs/pageLoan">我要借贷</a></li>
                    <li><a href="/luobofinal/index.php/Home/Jobs/pagePractice">实习</a></li>
                    <li><a href="/luobofinal/index.php/Home/Jobs/pageServe">服务</a></li>
                </ul>
                <div class="col-md-6">
                    <div class="header-nav pull-right">
                        <!--登录前-->

                    <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="login-before" >
                        <li><a href="/luobofinal/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/luobofinal/index.php/Home/User/pageMyCenter">人个中心</a>
                            <ul>
                                    <li><a href="/luobofinal/index.php/Home/User/pageResume">我的简历</a></li>
                                    <li><a href="/luobofinal/index.php/Home/User/pageUserApply">我的申请</a></li>
                                    <li><a href="/luobofinal/index.php/Home/User/pageCollect">我的收藏</a></li>
                                    <li><a href="/luobofinal/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luobofinal/index.php/User/User/doLogout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luobofinal/index.php/Home/User/pageEditMyCenter">编辑简历</a></li>
                        </ul>

                    <?php elseif($_SESSION['user']['type']== 'company'): ?>
                    <ul class="login-before">
                        <li><a href="/luobofinal/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li class="person"><a href="/luobofinal/index.php/Home/User/pageMyCenter">企业中心</a>
                            <ul>
                                    <li><a href="/luobofinal/index.php/Home/Company/pageManage">数据中心</a></li>
                                    <li><a href="/luobofinal/index.php/Home/Company/pagePost">职位管理</a></li>
                                    <li><a href="/luobofinal/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                                    <li><a href="/luobofinal/index.php/Home/Company/pageProve">企业信息</a></li>
                                    <li><a href="/luobofinal/index.php/Home/User/pageSafety">安全中心</a></li>
                                    <li><a href="/luobofinal/index.php/User/User/doLogout">退出</a></li>
                            </ul>

                        </li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="/luobofinal/index.php/Home/Company/pagePostJob">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['type']== 'school'): ?>
                    <ul class="login-before">
                        <li><a href="/luobofinal/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/Home/User/pageMyCenter">学校中心</a></li>
                    </ul>
                        <ul class="login-after">
                            <li><a href="">发布兼职</a></li>
                        </ul>
                    <?php elseif($_SESSION['user']['adminname']== 'admin'): ?>
                    <ul class="login-before">
                        <li><a href="/luobofinal/index.php/Home/Feed/pageFeedback">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/User/User/doLogout">退出</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/Manage/Index/index">进入后台</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="login-before">
                        <li><a href="/luobofinal/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/Home/Index/pageReg">注册</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/luobofinal/index.php/Home/Index/pageLogin">登录</a></li>
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
                <?php if(is_array($level2RandomList)): $i = 0; $__LIST__ = $level2RandomList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/luobofinal/index.php/Home/Company/pageprove?l2=<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 搜索end -->
    <!-- 主体内容 -->
            <div id="person">
        <!-- 个人中心start -->
        <div class="per_t">
            <div class="per_nav">
 <a href="/luobofinal/index.php/Home/Company/pageprove/pageManage">首页</a> > <a href="/luobofinal/index.php/Home/company/pageprove"><?php echo ($top_nav); ?></a>
</div>
<div class="per_dal">
    <img class="reg-id-img" src="/luobofinal/Uploads/<?php echo ($user["logo"]); ?>" width="130" height="130" />
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
                <li id="pageResume" ><a href="/luobofinal/index.php/Home/User/pageResume">我的简历</a></li>
                <li id="pageUserApply"><a href="/luobofinal/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li id="pageCollect"><a href="/luobofinal/index.php/Home/User/pageCollect">我的收藏</a></li>
                <!-- <li><a href="/luobofinal/index.php/Home/User/pageMsg">消息</a></li> -->
                <li><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/luobofinal/index.php/Home/User/pageSafety">安全保护</a></li>
                <li id="pageFeedback"><a href="/luobofinal/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li id="pageManage"><a href="/luobofinal/index.php/Home/Company/pageManage">管理中心</a></li>
                <li id="pageCompanyApply"><a href="/luobofinal/index.php/Home/Company/pagePost">职位管理</a></li>
                <li id="ResumeManage"><a href="/luobofinal/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                <li id="pageProve"><a href="/luobofinal/index.php/Home/Company/pageProve">企业信息</a></li>
                <li id="pageSafety"><a href="/luobofinal/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/luobofinal/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li id="pagePost"> <a href="/luobofinal/index.php/Home/Company/pagePost">我的发布</a></li>
                <li id="pageCompanyApply" ><a href="/luobofinal/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li id="pageProve" ><a href="/luobofinal/index.php/Home/Company/pageProve">认证信息</a></li>
                <li id="pageFeedback"><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/luobofinal/index.php/Home/User/pageSafety">安全保护</a></li>
                <li id="pageFeedback"><a href="/luobofinal/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
            <div class="per_r_dal">
                <h4 class="font-orange">企业信息</h4>
                <div class="per_cont" gt-model="saveProve">
                    <div>
                        <span class="label_text">单位名称</span>
                        <input type="hidden" gt-islabel="单位名称"/>
                        <input type="text" id="companyname" gt-isparam="companyname" value="<?php echo ($user["companyname"]); ?>"/>
                        <s>*</s>
                    </div>
                    <label id="companynameWrong"></label> 
                    <div>
                        <span class="label_text">营业执照编号</span>
                        <input type="hidden" gt-islabel="营业执照编号"/>
                        <input type="text"  gt-isparam="buslicense" value="<?php echo ($user["buslicense"]); ?>"/>
                    </div>
                    <label id="buslicenseWrong"></label>
                    <div class="per_company" style="overflow:hidden;height:auto;">
                        <span class="label_text">证件上传</span>
                        <div class="person_r">
                            <div class="papers">公司logo</div>
                            <img class="reg-id-img" id="pic_logo" src="/luobofinal/Uploads/<?php echo ($user["logo"]); ?>" />
                            <input type="hidden" gt-islabel="公司logo"/>
                            <input type="file" gt-isparam="logo"/>              
                        </div>
                        <div class="person_r">
                            <div class="papers">营业执照</div>
                            <img  class="reg-id-img" id="pic_orgauth" src="/luobofinal/Uploads/<?php echo ($user["orgauth"]); ?>" />
                            <input type="hidden" gt-islabel="营业执照"/>
                            <input type="file" gt-isparam="orgauth"/>           
                        </div>  
                        <div class="person_r">
                            <div class="papers">负责人身份证</div>
                            <img  class="reg-id-img" id="pic_idobverse" src="/luobofinal/Uploads/<?php echo ($user["idobverse"]); ?>" />
                            <input type="hidden" gt-islabel="负责人身份证"/>
                            <input type="file" gt-isparam="idobverse"/>           
                        </div>
                        <s class="ml10">*</s>
                    </div>
                       <label for="" id="uploadWrong" class="wrong"></label>
                    <div>
                        <span class="label_text">企业类型</span>
                        <div class="input-group spinner">
                            <select name="" gt-isparam="companytype"  style="width:100%">
                                <option value="<?php echo $user['companytype']?$user['companytype']:'请选择';?>"><?php echo $user['companytype']?$user['companytype']:'请选择';?></option>
                                <option value="外资（欧美）">外资（欧美）</option>
                                <option value="外资（非欧美）">外资（非欧美）</option>
                                <option value="合资">合资</option>
                                <option value="国企">国企</option>
                                <option value="上市公司">上市公司</option>
                                <option value="创业公司">创业公司</option>
                                <option value="外企代表处">外企代表处</option>
                                <option value="政府机关">政府机关</option>
                                <option value="事业单位">事业单位</option>
                                <option value="非盈利机构">非盈利机构</option>
                            </select>
                        </div>
                        <s class="ml0">*</s>
                    </div>
                    <div>
                        <span class="label_text">企业规模</span>
                        <div class="input-group spinner">
                             <select name="" gt-isparam="companyscale"  style="width:100%">
                                <option value="<?php echo $user['companyscale']?$user['companyscale']:'请选择';?>"><?php echo $user['companyscale']?$user['companyscale']:'请选择';?></option>
                                <option value="少于50人">少于50人</option>
                                <option value="50-150人">50-150人</option>
                                <option value="500-1000人">500-1000人</option>
                                <option value="1000-5000人">1000-5000人</option>
                                <option value="5000-10000人">5000-10000人</option>
                                <option value="10000人以上">10000人以上</option>
                            </select>
                        </div>
                        <s class="ml0">*</s>
                    </div>
                    <div style="overflow:hidden;height:auto;">
                        <span class="label_text">企业简介</span>
                        <input type="hidden" gt-islabel="企业简介"/>
                        <textarea cols="30" rows="10"  gt-isparam="intro"><?php echo ($user["intro"]); ?></textarea>
                    </div>
                    <div>
                        <span class="label_text">联系人</span>
                        <input type="hidden" gt-islabel="联系人"/>
                        <input type="text"  gt-isparam="contacter" value="<?php echo ($user["contacter"]); ?>"/>
                        <s>*</s>
                    </div>
                    <div>
                        <span class="label_text">联系电话</span>
                        <input type="hidden" gt-islabel="联系电话"/>
                        <input type="text"  gt-isparam="contacterphone" gt-check="phone" value="<?php echo ($user["contacterphone"]); ?>"/>
                        <s>*</s>
                    </div>
                    <label  id="phoneWrong"></label>
                    <div>
                        <span class="label_text">企业详细地址</span>
                        <input type="hidden" gt-islabel="企业详细地址"/>
                        <input type="text"  gt-isparam="address" value="<?php echo ($user["address"]); ?>"/>
                        <s>*</s>
                    </div>
                    <div class="company_tk">
                        <input type="checkbox" name="" id="" />我已阅读<a href="" class="font-blue">《萝卜兼职协议条款》</a>
                    </div>
                    <input type="button" value="立即确认" class="btn_save" id="saveProve"/>
                </div>
            </div>
        </div>
        <!-- 个人中心end -->
    </div>
<script>

    $("#saveProve").on('click', '', function (event) {
        event.preventDefault();
        data = M3("saveProve");
        if(data['companytype'] == "请选择") {
            alert("请选择企业类型");
            return;
        }
        if(data['companyscale'] == "请选择") {
            alert("请选择企业规模");
            return;
        }
         if(data['companyname'] == "") {
            alert("请填写单位名称");
            return;
        }
         if(data['buslicense'] == ''||data['buslicense']==null) {
            alert("请填写营业执照");
            return;
        }
         if(data['contacterphone'] == ''||data['contacterphone']==null) {
            alert("请填写企业负责人电话");
            return;
        }
         if(data['contacter'] == ''||data['contacter']==null) {
            alert("请填写企业负责人姓名");
            return;
        }
          if(data['address'] == ''||data['address']==null) {
            alert("请填写企业详细地址");
            return;
        }
        checkPicture();

    });

    $("select[name='city']").change(function(){
        getCounty();
    });

 //判断图片src是否为空
    function checkPicture(){
        pic_logo=$("#pic_logo").attr('src');
        pic_orgauth=$("#pic_orgauth").attr('src');
        pic_idobverse=$("#pic_idobverse").attr('src');
        checkPictureSrc();
        if (!checkPictureSrc(pic_idobverse)) {
         $("#uploadWrong").html("请上传负责人身份证"); 
         alert("请上传负责人身份证");
         return false;
        }else if(!checkPictureSrc(pic_orgauth)){
         $("#uploadWrong").html("请上传营业执照"); 
         alert("请上传营业执照");
         return false;
        }else if (!checkPictureSrc(pic_logo)) {
         $("#uploadWrong").html("请上传公司logo"); 
         alert("请上传公司logo");
         return false;
        }else{
         post(CON_PATH + "/saveProve", data);
        }
     }


</script>
    <!-- 底部内容 -->
        
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
</body>
</html>
<script>
	jQuery(document).ready(function($) {

        $(".input-group .glyphicon-triangle-bottom").click(function(event) {
            $(".dropdown-menu").stop().slideUp();
            $(this).next('ul').stop().slideToggle();
        });
        $(".spinner-content").click(function(event) {
            $(".dropdown-menu").stop().slideUp();
            $(this).next().next('ul').stop().slideToggle();
        });

		bindClick();
        bindCheck();
        bindSpinner();

        //修改左侧导航栏样式使导航栏的橙色样式对应当前页面
        $("#pageProve").removeClass("nav-normal").addClass("nav-active");

        $("input[gt-isparam='companyname']").blur(function(){
            nameStr=$(this).val();
            if(verfifyContactName(nameStr)){
                $(this).removeClass("error");
                $("#companynameWrong").removeClass("wrong");
                $("#companynameWrong").html("");
            }else{
               $(this).addClass("error"); 
               $("#companynameWrong").addClass("wrong");
               $("#companynameWrong").html("请输入中文、数字、或英文");
            }
        });
         $("input[gt-isparam='buslicense']").blur(function(){
            nameStr=$(this).val();
            if(verfifyContactName(nameStr)){
                $(this).removeClass("error");
                $("#buslicenseWrong").removeClass("wrong");
                $("#buslicenseWrong").html("");
            }else{
               $(this).addClass("error"); 
               $("#buslicenseWrong").addClass("wrong");
               $("#buslicenseWrong").html("请输入营业执照编号");
            }
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
                $("#uploadWrong").html("");
            }else{
                $("#uploadWrong").html("请选择图片类型上传");
                //alert("请选择图片进行上传");
            }
        });
        

	});
</script>