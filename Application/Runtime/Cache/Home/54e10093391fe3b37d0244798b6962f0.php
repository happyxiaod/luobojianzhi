<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	
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
    var SEL_PATH = "/index.php/Home/Index/pageReg";
    var ACT_PATH = "/index.php/Home/Index/pageReg";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 主体内容 -->
        <!--注册 -->
<div id="header">
        <div class="top-line"></div>
        <div class="container">
            <div class="ablock ablock1">
                <h1><a href="/index.php/Home"></a></h1>
                <div class="chose-city">
                    <span>青岛市</span>
                    <a href="/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
                <div class="header-pt">
                    最靠谱的大学生兼职平台 <br>
                    www.luobojianzhi.com
                </div>
                <div class="header-nav pull-right">
                    <!--登录前-->
                    <ul class="login-before">
                        <li><a href="/index.php/Home/Article/index">关于我们</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="">手机端</a></li>
                        <div class="nav-dlmt"></div>
                        <li><a href="/index.php/Home/Index/pageReg">注册</a></li>
                    </ul>
                </div>
            </div>
        </div>
</div>


    <!-- 找回密码start -->
    <div class="middle">
        <div class="find_pwd">
            <div class="ablock2">
                <div class="row" style="width:84%;margin: 0 auto">
                    <div class="reg-title text-center">
                        免费注册
                    </div>
                </div>
                <div class="reg-content" gt-model="userReg">
                    <div class="reg-type input-chose">
                        <input type="radio" value="seeker" name="type"  gt-isparam="type" checked="checked">
                        <span>求职者</span>
                        <input type="radio" value="company" name="type" gt-isparam="type">
                        <span>企业或机构</span>
                        <input type="radio" value="school" name="type" gt-isparam="type">
                        <span>学校机构</span>
                    </div>
                    <div class="reg_all">
                        <!-- 求职者start --> 
                        <div class="cur">
                            <div class="reg-other">
                                <span class="label-text">
                                    选中学校
                                </span>
                                <div class="right">
                                    <div class="input-group spinner">
                                        <span type="text" class="spinner-content" gt-isparam="province">选择省份</span>
                                        <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon">
                                            &#xe81d;
                                        </span>
                                        <ul class="dropdown-menu">
                                            <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="spinner-option select-province">
                                             <span loadid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></span>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="input-group spinner">
                                        <span type="text" class="spinner-content" gt-isparam="city">选择城市</span>
                                        <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon">
                                            &#xe81d;
                                        </span>
                                        <ul class="dropdown-menu" id="cityList">
                                            
                                        </ul>
                                    </div>                          
                                    <div class="input-group spinner">
                                        <span type="text" class="spinner-content" gt-isparam="school">选择学校</span>
                                        <span class="input-group-addon glyphicon glyphicon-triangle-bottom demo-icon">
                                             &#xe81d;
                                        </span>
                                        <ul class="dropdown-menu" id="schoollist">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="reg-other">
                                <span class="label-text">
                                    手机号
                                </span>
                                <div class="right">
                                    <input class="edit-text" gt-isparam="phone" gt-check="phone" placeholder="手机号">
                                </div>
                            </div>
                            <label  id="phoneWrong"></label>
                            <div class="reg-other">
                                <span class="label-text">
                                    图形验证
                                </span>
                                <div class="right">
                                    <input class="edit-text" type="text" id="input_res" type="text" name="res"  placeholder="请输入计算结果"/>
                                </div>
                                  <img src="/index.php/Home/Index/getValidate"  border="1" onclick= this.src="/index.php/Home/Index/getValidate/"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。">
                            </div>
                            <div class="reg-other">
                                <span class="label-text">
                                    验证码
                                </span>
                                <div class="right">
                                    <input type="hidden" gt-islabel="验证码"/>
                                    <input class="edit-text" type="text" gt-isparam="phonecaptcha" placeholder="验证码">
                                </div>
                                <button class="btn-captcha" gt-btn-click="getphonecaptcha">获取手机验证码</button>
                            </div>
                            <div class="reg-other">
                                <span class="label-text">
                                    密码
                                </span>
                                <div class="right">
                                    <input type="hidden" gt-islabel="密码"/>
                                    <input class="edit-text" type="password" gt-isparam="password" placeholder="密码">
                                </div>
                            </div>
                            <div class="reg-other">
                                <span class="label-text">
                                    确认密码
                                </span>
                                <div class="right">
                                    <input type="hidden" gt-islabel="确认密码"/>
                                    <input class="edit-text" type="password" gt-isparam="repassword" placeholder="确认密码">
                                </div>
                            </div>
                            <label id="passwordWrong"></label>
                            <div class="reg-other">
                                <input type="checkbox" gt-isparam="agree" value="no"/>我已阅读<a href="javascript:protocol();" class="font-blue">《萝卜兼职协议条款》</a>
                            </div>
                            <button class="btn btn_reg" gt-btn-click="userReg" >立即注册</button>
                        </div>
                        <!-- 求职者end -->              
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 找回密码end -->

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
        bindCheck();


 $("input[gt-isparam='repassword']").blur(function(){
    p1= $("input[gt-isparam='password']").val();
    p2= $("input[gt-isparam='repassword']").val();
    checkNotPassword(p1,p2);
 });
//        选择登录类型
        $("input[type='radio']").delegate('','click', function (event) {
            event.preventDefault();
            var value = $(this).val();
            switch (value) {
                case "seeker":
                    location.href = "/index.php/Home/Index/pageReg?type=seeker";
                    break;
                case "school":
                    location.href = "/index.php/Home/Index/pageReg?type=school";
                    break;
                case "company":
                    location.href = "/index.php/Home/Index/pageReg?type=company";
                    break;
            }
        });
        //是否选择同意条款
        $("input[gt-isparam='agree']").on('click', '', function (event) {
            if($(this).is(":checked")) {
                $(this).val("yes");
            } else {
                $(this).val("no");
            }
        });

        //获取城市列表
        $(".select-province").on('click', '', function (event) {
            event.preventDefault();

            var province = $(this).find("span").attr("loadid");

            province = $.trim(province);

            $.post(CON_PATH + "/getCityByProvince", {province: province}, function (data) {
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option select-city'><span>" + value['name'];
                        str += "</span></li>";
                    });
                    $("#cityList").html(str);
                } else {
                    $("#cityList").html("");
                    dealReturn("暂无城市信息");
                }
            });
        });

        //获取学校列表
        $("body").on('click', '.select-city', function (event) {
            event.preventDefault();

            var city = $(this).find("span").html();

            city = $.trim(city);
            city = city.replace("市", "");

            $.post(CON_PATH + "/getSchoolByCity", {city: city}, function (data) {
                //console.log(data);
                if (data != "failed") {
                    var str = "";
                    $.each(data, function (key, value) {
                        str += "<li class='spinner-option'><span>" + value['school'];
                        str += "</span></li>";
                    });
                    $("#schoollist").html(str);
                } else {
                    $("#schoollist").html("");
                    dealReturn("该城市暂无学校信息");
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

    });


</script>