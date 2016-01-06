<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>地区管理</title>
    <link rel="stylesheet" href="https://gtlib.b0.upaiyun.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/default/css/gt.manage.css">
<link rel="stylesheet" href="/Public/default/css/gt.manage2.css">
<script src="https://gtlib.b0.upaiyun.com/jquery/jquery1.10.2.min.js"></script>
<script src="https://gtlib.b0.upaiyun.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gt.manage.js"></script>
<script>
    var APP_PATH = "/index.php";
    var MOD_PATH = "/index.php/Manage";
    var CON_PATH = "/index.php/Manage/Setting";
    var SEL_PATH = "/index.php/Manage/Setting/pageRegionAdd";
    var ACT_PATH = "/index.php/Manage/Setting/pageRegionAdd";
</script>
</head>
<body>
<div class="container-fluid">
    <!-- 头部内容 -->
    <div class="header">
        <!--
<div class="row fragbox">
	&lt;!&ndash; TODO a标签地址 &ndash;&gt;
	<div class="pull-right mtop2">
		<span class="pull-right">
			<a href="/index.php/User/User/doLogout" style="color:red">退出系统</a>
			&nbsp;&nbsp;
		</span>
		<span class="pull-right">
			<a href="" style="color:#72C5F0">修改密码</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
		</span>
		<span class="pull-right" style="color:#72C5F0">
			<span class="glyphicon glyphicon-user" style="color:#C0C0C0"></span>
			&nbsp;
			你好! <?php echo ($_SESSION['user']['adminname']); ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
		</span>
	</div>
</div>-->

<div class="row" style="background: #c3e7ff;">
    <div class="row" style="margin-top:36px;margin-bottom:16px;padding-left:30px;padding-right:30px">
        <!--头部-->
        <div class="col-md-10" style="font-family: 'Microsoft YaHei'">
            <span style="color:#335fb7;font-size:20px">萝卜兼职后台管理系统</span>
            <img src="/Public/default/images/admin_user.png" width="16px"
                 style="margin-left:30px;">
            <span style="font-size: 15px;">欢迎您！<?php echo ($_SESSION['user']['adminname']); ?></span>
            <img src="/Public/default/images/admin_time.png" width="17px"
                 style="margin-left:30px">
            <span style="font-size: 15px;"><?php echo (session('datetime')); ?></span>


        </div>
        <div class="col-md-2 text-right">
            <a href="/index.php/User/User/doLogout">
                <img src="/Public/default/images/admin_logout.png" width="22px">
            </a>
        </div>
    </div>

    <!--导航-->
    <div class="row" id="daohang">
        <ul id="nav">
            <li>
                <a href="/index.php/Manage/Index/index"><span class="glyphicon glyphicon-home"></span>
                    首页</a>
            </li>
            <li><a href="/index.php/Manage/Member/pageSeeker">
                <span class="glyphicon glyphicon-user"></span>
                会员管理</a></li>

            <li><a href="/index.php/Manage/Audit/pageSeeker">
                <span class="glyphicon glyphicon-list"></span>
                资料审核</a></li>

            <li><a href="/index.php/Manage/Position/pageSeeker">
                <span class="glyphicon glyphicon-list-alt"></span>

                职位信息</a></li>
            <li><a href="/index.php/Manage/Setting/pageScroll">
                <span class="glyphicon glyphicon-cog"></span>

                网站设置</a></li>
            <li><a href="/index.php/Manage/Feedback/pageFeedback">
                <span class="glyphicon glyphicon-comment"></span>

                意见反馈</a></li>
        </ul>
    </div>
</div>
    </div>
    <!-- 主体内容 -->
    <div class="middle row">
        <div class="row ">
    <!-- 左边主要导航 -->
    <div class="mainnav col-md-2" style="padding: 0;border-right:1px solid #ddd;border-bottom:1px solid #ddd">
    <div class="col-md-12 text-center"
         style="height:36px;background:#f4f4f4;border-right:1px solid #ddd;border-bottom:1px solid #ddd;line-height: 36px">
        <img src="/Public/default/images/admin_arrow.png" width="20px">
        &nbsp;&nbsp;<?php echo ($currentnav); ?>
    </div>

    <?php if(($currentnav) == "会员管理"): ?><br><br>
        <div class="nav-one">个人会员</div>
        <li class="nav-two" id="navMemberSeeker">
            <a href="/index.php/Manage/Member/pageSeeker" class="nav-a">注册用户</a>
        </li>
        <li class="nav-two" id="navCheckedSeeker">
            <a href="/index.php/Manage/Member/pageCheckedSeeker" class="nav-a">认证用户</a>
        </li>
        <div class="nav-one">企业会员</div>
        <li class="nav-two" id="navMemberCompany">
            <a href="/index.php/Manage/Member/pageCompany" class="nav-a">注册企业</a>
        </li>
        <li class="nav-two" id="navCheckedCompany">
            <a href="/index.php/Manage/Member/pageCheckedCompany" class="nav-a">认证企业</a>

        </li>

        <li class="nav-two" id="navMemberSchool">
            <a href="/index.php/Manage/Member/pageSchool" class="nav-a">学校会员</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "资料审核"): ?><li class="nav-two" id="navAuditSeeker">
            <a href="/index.php/Manage/Audit/pageSeeker" class="nav-a">个人资料审核</a>
        </li>
        <li class="nav-two" id="navAuditCompany">
            <a href="/index.php/Manage/Audit/pageCompany" class="nav-a">企业资料审核</a>
        </li>
        <li class="nav-two" id="navAuditSchool">
            <a href="/index.php/Manage/Audit/pageSchool" class="nav-a">校园机构资料审核</a>
        </li>
        <li class="nav-two" id="navAuditNotpass">
            <a href="/index.php/Manage/Audit/pageNotpass" class="nav-a">未通过审核</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "职位信息"): ?><li class="nav-two" id="navPositionSeeker">
            <a href="/index.php/Manage/Position/pageSeeker" class="nav-a">个人信息</a>
        </li>
        <li class="nav-two" id="navPositionCompany">
            <a href="/index.php/Manage/Position/pageCompany" class="nav-a">企业信息</a>
        </li>
        <li class="nav-two" id="navPositionSchool">
            <a href="/index.php/Manage/Position/pageSchool" class="nav-a">校园机构信息</a>
        </li><?php endif; ?>

    <?php if(($currentnav) == "网站设置"): ?><li class="nav-two" id="navSettingScroll">
            <a href="/index.php/Manage/Setting/pageScroll" class="nav-a">轮播图设置</a>
        </li>
        <li class="nav-two" id="navSettingJobType">
            <a href="/index.php/Manage/Setting/pageJobType" class="nav-a">兼职分类管理</a>
        </li>
        <li class="nav-two" id="navSettingAddSchool">
            <a href="/index.php/Manage/Setting/pageAddSchool" class="nav-a">添加学校分类</a>
        </li>
        <li class="nav-two" id="navSettingRegion">
            <a href="/index.php/Manage/Setting/pageRegionProvince" class="nav-a">地区管理</a>
        </li><?php endif; ?>


    <?php if(($currentnav) == "意见反馈"): ?><li class="nav-two" id="navFeedback">
            <a href="/index.php/Manage/Feedback/pageFeedback" class="nav-a">意见反馈</a>
        </li><?php endif; ?>


</div>
    <!-- 内容 -->
    <div class="content col-md-10">
        <!-- 导航菜单内容显示 -->
        <div class="row" style="background:#f4f4f4;height:36px;line-height:36px;border-bottom:1px solid #ddd">

			<span class="mleft2">
				地区管理 > 添加
			</span>
        </div>
        <div class="fragbox">
            <div style="margin-top:10px">
                <div class="pull-left">
                    <a href="/index.php/Manage/Setting/pageRegionProvince" class="btn btn-primary">省</a>
                    <a href="/index.php/Manage/Setting/pageRegionCity" class="btn btn-primary">市</a>
                    <a href="/index.php/Manage/Setting/pageRegionCounty" class="btn btn-primary">区（县）</a>
                    <a href="/index.php/Manage/Setting/pageRegionAdd" class="btn btn-success">添加</a>
                </div>
            </div>
            <!-- 右边具体内容 -->
            <div class="row middle-content fragbox" style="margin-top: 70px;">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            添加省
                        </div>
                        <div class="panel-body form-inline" gt-model="addProvince">
                            <div>
                                <span gt-islabel="名称全拼"></span>
                                <input class="form-control" type="text" gt-isparam="spell"  placeholder="名称全拼" style="margin-bottom: 10px;"/>
                            </div>
                            <div>
                                <span gt-islabel="省名称"></span>
                                <input class="form-control" type="text" gt-isparam="name" placeholder="省名称"/>
                                <button class="btn btn-active" name="addProvince">添加</button>
                            </div>


                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            添加市
                        </div>
                        <div class="panel-body form-inline" gt-model="addCity">
                            <div>
                                <span gt-islabel="所属省份"></span>
                                <select class="form-control" gt-isparam="pid" style="margin-bottom: 10px;">
                                    <option value="请选择">请选择</option>
                                    <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>

                            <div>
                                <span gt-islabel="名称全拼"></span>
                                <input class="form-control" type="text" gt-isparam="spell" placeholder="名称全拼" style="margin-bottom: 10px;"/>
                            </div>

                            <div>
                                <span gt-islabel="市名称"></span>
                                <input class="form-control" type="text" gt-isparam="name" placeholder="市名称"/>
                                <button class="btn btn-active" name="addCity">添加</button>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            添加区（县）
                        </div>
                        <div class="panel-body form-inline" gt-model="addCounty">
                            <div class="pull-left">
                                <span gt-islabel="所属省份"></span>
                                <select class="form-control" gt-isparam="pid" style="margin-bottom: 10px;" id="choseprovince">
                                    <option value="请选择">请选择</option>
                                    <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="pull-left">
                                <span gt-islabel="所属市"></span>
                                <select class="form-control" id="cityBox" gt-isparam="cid" style="margin-bottom: 10px;">
                                    <option value="请选择">请选择</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <span gt-islabel="名称全拼"></span>
                                <input class="form-control" type="text" gt-isparam="spell"  placeholder="名称全拼" style="margin-bottom: 10px;"/>

                            </div>
                            <div>
                                <span gt-islabel="区(县)名称"></span>
                                <input class="form-control" type="text" gt-isparam="name"  placeholder="区(县)名称"/>
                                <button class="btn btn-active" name="addCounty">添加</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    </div>
    <!-- 底部内容 -->
    <div class="footer">
        
    </div>
</div>
</body>
</html>
<script>
    jQuery(document).ready(function($) {
        bindClick();
        $("#navSettingRegion").addClass("nav-two-active"); //更改导航样式

        //添加省按钮绑定
        $("button[name='addProvince']").on('click', '', function (event) {
            event.preventDefault();
            addProvince();
        });
        //添加市按钮绑定
        $("button[name='addCity']").on('click', '', function (event) {
            event.preventDefault();
            addCity();
        });
        //添加区（县）按钮绑定
        $("button[name='addCounty']").on('click', '', function (event) {
            event.preventDefault();
            addCounty();
        });

        $("#choseprovince").change('',function(data) {
            loadCityList($(this),"");
        });
    });

    //添加省
    function addProvince() {
        data = M("addProvince");

        value = /^[A-Za-z]+$/; //判断是否为字母的正则表达式

        //判断是否为字母
        if (value.test(data['spell'])) {
            //截取首字母，并转换为大写
            data['first'] = data['spell'].substr(0,1).toUpperCase();
        } else {
            alert("名称全拼格式不正确！");
            return;
        }

        //console.log(data);
        post("/index.php/Manage/Setting/addProvince", data);
    }

    //添加市
    function addCity() {
        data = M("addCity");

        if(data['state'] == 0) {
            return;
        }

        if(data["pid"] == "请选择") {
            alert("请选择所属省份");
            return;
        }

        value = /^[A-Za-z]+$/; //判断是否为字母的正则表达式

        //判断是否为字母
        if (value.test(data['spell'])) {
            //截取首字母，并转换为大写
            data['first'] = data['spell'].substr(0,1).toUpperCase();
        } else {
            alert("名称全拼格式不正确！");
            return;
        }

        post("/index.php/Manage/Setting/addCity", data);
    }

    //添加区（县）
    function addCounty() {
        data = M("addCounty");

        if(data['state'] == 0) {
            return;
        }

        if(data["pid"] == "请选择") {
            alert("请选择所属省份");
            return;
        }
        if(data["cid"] == "请选择") {
            alert("请选择所属城市");
            return;
        }

        value = /^[A-Za-z]+$/; //判断是否为字母的正则表达式

        //判断是否为字母
        if (value.test(data['spell'])) {
            //截取首字母，并转换为大写
            data['first'] = data['spell'].substr(0,1).toUpperCase();
        } else {
            alert("名称全拼格式不正确！");
            return;
        }

        post("/index.php/Manage/Setting/addCounty", data);
    }
</script>