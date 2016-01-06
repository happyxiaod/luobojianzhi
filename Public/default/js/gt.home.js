function bindClick() {
    // 按钮点击事件
    $(document).on('click', "[gt-btn-click]", function (event) {
        event.preventDefault();
        value = $(this).attr("gt-btn-click");
        switch (value) {
            case "goindex":
                location.href = APP_PATH + '/Home/Index/index';
                break;
            case 'login':
                post(APP_PATH + '/User/User/doLogin', M("userLogin"));
                break;
            case 'getphonecaptcha':
                doneCaptcha();
                break;
            case 'userReg':
                userReg();
                break;
            case 'detailReg':
                detailReg();
                break;
            //搜索兼职
            case 'searchjobs':
                searchjobs($(this));
                break;
            case 'editMyInfo':
                editMyInfo($(this));
                break;
            case 'addMyInfo':
                addMyInfo($(this));
                break;
            case 'editMyCenter':
                editMyCenter($(this));
                break;
            case 'feedback':
                feedback($(this));
                break;
            case 'editUserPwd':
                loadPage($("#user-safety-content"), "fragSafetyPwd");
                break;
            case 'editUserPhone':
                loadPage($("#user-safety-content"), "fragSafetyPhone");
                break;
            case 'editUserEmail':
                loadPage($("#user-safety-content"), "fragSafetyEmail");
                break;
            case 'editUserId':
                loadPage($("#user-safety-content"), "fragSafetyId");
                break;
            case 'editCompanyPwd':
                loadPage($("#company-safety-content"), "fragSafetyPwd");
                break;
            case 'editCompanyPhone':
                loadPage($("#company-safety-content"), "fragSafetyPhone");
                break;
            case 'editCompanyEmail':
                loadPage($("#company-safety-content"), "fragSafetyEmail");
                break;
            case 'editCompanyId':
                loadPage($("#company-safety-content"), "fragSafetyId");
                break;
            case 'confirmModifyJob':
                saveJob("update");
                break;
            case 'postJob':
                saveJob("add");
                break;
            case 'btn-page':
                url = $(this).attr("url");
                loadPage($(".loadTablePage"), url);
                break;
            case 'saveProve':
                saveProve();
                break;
            case 'finishInfo':
                finishInfo();
                break;
            default:
                break;
        }
    });
    // 菜单点击事件
    $(document).on('click', "[gt-menu-click]", function (event) {
        event.preventDefault();
        value = $(this).attr("gt-menu-click");
        switch (value) {
            case '':

                break;
            default:
                break;
        }
    });
    // 块级元素点击事件
    $(document).on('click', "[gt-block-click]", function (event) {
        event.preventDefault();
        value = $(this).attr("gt-block-click");
        switch (value) {
            case '':

                break;
            case '':

                break;
            default:
                break;
        }
    });
}

var time=60;
var intervalId;
//处理验证码
function doneCaptcha() {
    var data = {"state": 1};
    data = M3('userReg');
     if(data['province'] == "选择省份") {
            alert("请选择省份");
            return;
        }
        if(data['city'] == "选择城市") {
            alert("请选择城市");
            return;
        }
        if(data['county'] == "选择区（县）") {
            alert("请选择区（县）");
            return;
        }
    //先判断是否手机号正确性

    data['phone'] = $("input[gt-isparam='phone']").val();
    var reg = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
    
    var input_res =$("#input_res").val();
    data['input_res'] =$("#input_res").val();  
    if (data['input_res']) {
            if (reg.test(data['phone'])) {
            //alert("号码正确~");
            } else {
                alert("手机号码有误!");
                return;
            }
        }else{
            alert("请输入图形验证码");
            return;
        }
        post(APP_PATH + '/User/User/beforeGetCaptcha', data);
     $.get(APP_PATH + '/User/User/checkCode',{input_res:input_res},function(txt){
        if(txt == "1")
            {
                data['captchaType'] = $("#captchaType").val();
                //改变相关样式
                $("input[gt-isparam='phone']").attr("readonly", "readonly");
                var btnCaptcha = $("button[gt-btn-click='getphonecaptcha']");
                btnCaptcha.attr("disabled", "disabled");
                btnCaptcha.css({"background": "gray"});
                //请求发送验证码
                post(APP_PATH + '/User/User/getCaptcha_good', data);
                //重新发送提示
                intervalId=setInterval(reGetCaptcha,1000);               
            }
        else {
            alert('图形验证结果不正确');
            return;
            }
        });
}

function reGetCaptcha() {
    var btnCaptcha = $("button[gt-btn-click='getphonecaptcha']");
    btnCaptcha.html("重新发送"+time+"秒");
    time--;
    if(time<0) {
        clearInterval(intervalId);
        $("input[gt-isparam='phone']").removeAttr("readonly");
        btnCaptcha.removeAttr("disabled", "disabled");
        btnCaptcha.css({"background": "#F3994F"});
        btnCaptcha.html("获取手机验证码");
        time=60;
    }
}

function userReg() {
    var data = M('userReg');
    if (data['state'] != 0) {
        //先判断是否手机号正确性
        var reg = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
        if (reg.test(data['phone'])) {

        } else {
            alert("手机号码有误!");
            return;
        }
        if (data['password'] != data['repassword']) {
            alert("再次密码不一样");
            return;
        }
        var regEmail=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
        if(data['companyemail']!=null && !regEmail.test(data['companyemail'])) {
            alert("邮箱格式错误");
            return;
        }

        if(data['province'] == "选择省份") {
            alert("请选择省份");
            return;
        }

        if(data['city'] == "选择城市") {
            alert("请选择城市");
            return;
        }

        if(data['county'] == "选择区（县）") {
            alert("请选择区（县）");
            return;
        }

        //是否同意条款
        if (data['agree'] == "no") {
            alert("请确定已经阅读兼职协议条款");
            return;
        }
    }
    delete(data['repassword']);
    //数据传给后台
    post(APP_PATH + '/User/User/doRegBase', data);
}

function detailReg() {
    var data = M('detailReg');
    if (data['state'] != 0) {
        //TODO 验证各种字段
        var regEmail=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
        if(data['email']!=null && !regEmail.test(data['email'])) {
            alert("邮箱格式错误");
            return;
        }
        var reg = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
        if (data['contacterphone']!=null && !reg.test(data['contacterphone'])) {
            alert("联系人手机号码有误!");
            return;
        }
        if (data['userType'] == "user") {
            if(data['sex'] != "男" && data['sex'] != "女") {
                alert("请选择性别");
                return;
            }

            if(data['education'] == "选择学历") {
                alert("请选择学历");
                return;
            }

            if(data['schoolyear'] == "选择年份") {
                alert("请选择年份");
                return;
            }

            if(data['province'] == "选择省份") {
                alert("请选择省份");
                return;
            }

            if(data['city'] == "选择城市") {
                alert("请选择城市");
                return;
            }

            if(data['address'] == "选择地区") {
                alert("请选择地区");
                return;
            }

            if(data['school'] == "选择学校") {
                alert("请选择学校");
                return;
            }
        }
        delete(data['userType']);

        //是否同意条款
        if (data['agree'] == "no") {
            alert("请确定已经阅读兼职协议条款");
            return;
        }
    }
    post(APP_PATH + "/User/User/doReg", data);
}

//搜索兼职
function searchjobs(o) {
    var value = o.siblings("input").val();
    if (value == null || value == "") {
        alert("你并未输入任何关键词");
        return;
    }
    location.href = MOD_PATH + '/Jobs/pageJobsLists?keyword=' + value;
}
//用户中心，编辑信息
function editMyInfo(o) {
    // 更新用户数据
    data = M3("userInfo");
    post(CON_PATH + "/updateUser", data);
}

function addMyInfo(o) {
    // 添加用户数据
    data = M("userInfo");
    post(CON_PATH + "/updateUser", data);
}
function editMyCenter(o){
    data = M("userInfo");
    post(CON_PATH + "/updateUser", data);
}

function bindSpinner() {
    $(".spinner").on('click', ".spinner-option", function (event) {
        event.preventDefault();
        var value = $(this).find("span").html();
        value = $.trim(value);
        $(this).parent().siblings(".spinner-content").html(value);
    });
}
//反馈
function feedback(o) {
    var params=M('feedback');
    post(MOD_PATH + '/Feed/addFeed',params);
}

function saveJob(type) {
    var job = M('job');

    if(job['level1'] == "选择分类") {
        alert("分类不可为空");
    } else if(job['level2'] == "选择职位") {
        alert("职位不可为空");
    } else if(job["province"] == "选择省份") {
        alert("省份不可为空");
    } else if(job['city'] == "选择城市") {
        alert("城市不可为空");
    } else if (job['district'] == "选择地区") {
        alert("地区不可为空");
    } else if(job['county'] == "选择区（县）") {
        alert("地区不可为空");
    }  else if(job['pricetype'] == "单位") {
        alert("单位不可为空");
    }  else if(job['paytype'] == "结算方式") {
        alert("结算方式不可为空");
    } 

    else {
        var verify = new Array();
        verify['phone'] = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
        verify['email'] = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
        verify['number'] = /^[0-9]*$/;
        if(!verify['phone'].test(job['phone'])) {
            alert("手机号格式错误");
            return;
        }
/*        if(!verify['email'].test(job['email'])) {
            alert("邮箱格式错误");
            return;
        }*/
        if(!verify['number'].test(job['number'])) {
            alert("人数请输入数字");
            return;
        }
/*        if(!verify['number'].test(job['price'])) {
            alert("工资请输入数字");
            return;
        }*/
        if(type=="add"){
            post(APP_PATH + "/Home/Company/addJob",job);

        }else if(type=="update"){
            post(APP_PATH + "/Home/Company/saveJob", job);
        }
    }

}

//保存企业认证信息
function saveProve() {
    data = M("saveProve");
    post(CON_PATH + "/saveProve", data);
}


//保存个人借贷认证信息
function finishInfo() {
  post(CON_PATH + "/finishInfo", "ok");
}
//显示协议条款
function protocol() {
    $.get("protocol",function(data){
        $("html").append(data);
        var ptc = $(".protocal");
        var width = $(document).width();
        if(width>ptc.width()) {
            var px=(width-ptc.width())/2;
        }
        console.log(px);
        ptc.css("left", px);
    });
}
  function move(){
        $('html,body').animate({
            scrollTop:0
        },800);
    }

 function checkPosition(pos){
        if ($(window).scrollTop() > pos) {
            $('#backTop').fadeIn();
        }else{
            $('#backTop').fadeOut();
        }
    }

$(document).ready(function() {
    //右侧工具栏
     checkPosition($(window).height());
    $('#backTop').on('click',move);
    $(window).on('scroll',function(){
        checkPosition($(window).height());
    });
    /*下拉列表*/
    $(".input-group .glyphicon-triangle-bottom").click(function(event) {
        $(".dropdown-menu").stop().slideUp();
        $(this).next('ul').stop().slideToggle();
    });
    $(".spinner-content").click(function(event) {
        $(".dropdown-menu").stop().slideUp();
        $(this).next().next('ul').stop().slideToggle();
    });
    /*选中*/
    $(".dropdown-menu li").click(function(event) {
        $(this).parent().prev().prev().text($(this).html());
        $(this).parent().hide();
    });
    /*点击任意地方关闭下拉*/
    $('html,body').click(function(e){
        e = e || window.event;
        if ($(e.target).is($(".glyphicon-triangle-bottom"))||$(e.target).is($(".dropdown-menu li"))||$(e.target).is($(".spinner-content")))
        {
            return;
        }
        else{
            $(".dropdown-menu").stop().slideUp();
        }
    });
   
    
});


