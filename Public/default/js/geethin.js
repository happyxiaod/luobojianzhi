/*
* jquery version>1.10
* need html5 support
* */

//获取模型数据,返回一个数组
function M(model, self) {
    var tip = false;//判断是否有错误提示
    var modvalues = {"state": 1};//模型数据对象
    var gtmod = $("[gt-model='" + model + "']");//绑定gt-model对象
    if (arguments[1]) {
        gtmod = self.parentsUntil("[gt-model='" + model + "']").parent();
    }
    var params = gtmod.find("[gt-isparam]");

    params.each(function (index, el) {
        //如果是radio控件
        if ($(this).is("input[type='radio']") && !$(this).is(":checked")) {
            return true;
        }
        key = $(this).attr("gt-isparam");
        value = $(this).val();
        //如果字段为空
        if (value == "" || value == null) {
            //获取html内容
            value = $.trim($(this).html());
            if (value == "" || value == null) {
                var isvalid = $(this).attr("gt-isvalid");

                if (!tip && isvalid!="no") {
                    modvalues['state'] = 0;
                    alert($(this).siblings('[gt-islabel]').attr('gt-islabel') + "不可为空");
                    tip = true;

                } else {

                }
            }else{
                modvalues[key] = value;
            }
        } else {
            modvalues[key] = value;
        }

    });
    return modvalues;
}




//获取模型数据,返回一个数组(做了一点修改，所以复制了一份)
function M2(model, self) {
    var tip = false;//判断是否有错误提示
    var modvalues = {"state": 1};//模型数据对象
    var gtmod = $("[gt-model='" + model + "']");//绑定gt-model对象
    if (arguments[1]) {
        gtmod = self.parentsUntil("[gt-model='" + model + "']").parent();
    }
    var params = gtmod.find("[gt-isparam]");

    params.each(function (index, el) {
        //如果是radio控件
        if ($(this).is("input[type='radio']") && !$(this).is(":checked")) {
            return true;
        }
        key = $(this).attr("gt-isparam");
        value = $(this).val();
        //如果字段为空
        if (value == "" || value == null) {
            //获取html内容
            value = $.trim($(this).html());
            if (value == "" || value == null) {
                var isvalid = $(this).attr("gt-isvalid");

                if (!tip && isvalid!="no") {
                    modvalues['state'] = 0;
                    alert($(this).attr('gt-islabel2') + "不可为空");
                    tip = true;

                } else {

                }
            }else{
                modvalues[key] = value;
            }
        } else {
            modvalues[key] = value;
        }

    });
    return modvalues;
}


//获取模型数据,返回一个数组把验证字段为空删掉了
function M3(model, self) {
    var tip = false;//判断是否有错误提示
    var modvalues = {"state": 1};//模型数据对象
    var gtmod = $("[gt-model='" + model + "']");//绑定gt-model对象
    if (arguments[1]) {
        gtmod = self.parentsUntil("[gt-model='" + model + "']").parent();
    }
    var params = gtmod.find("[gt-isparam]");

    params.each(function (index, el) {
        //如果是radio控件
        if ($(this).is("input[type='radio']") && !$(this).is(":checked")) {
            return true;
        }
        key = $(this).attr("gt-isparam");
        value = $(this).val();
        //如果字段为空
        if (value == "" || value == null) {
            //获取html内容
            value = $.trim($(this).html());
            if (value == "" || value == null) {
                var isvalid = $(this).attr("gt-isvalid");
            }else{
                modvalues[key] = value;
            }
        } else {
            modvalues[key] = value;
        }

    });
    return modvalues;
}

//统一使用ajax post 提交json数据
function post(url, params) {
    //有字段为空时，不发送请求
    if (params == null) return;
    if (params['state'] == 0) {
        return;
    } else {
        //删除该字段，为避免与后台字段冲突
        delete(params['state']);
    }
    var json;
    if ($.isPlainObject(params) || $.isArray(params)) {
        json = JSON.stringify(params);
    } else {
        json = params;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: {'params': json},
        complete: function (xhr, textStatus) {

        },
        success: function (data, textStatus, xhr) {
            dealReturn(data);
        },
        error: function (xhr, textStatus, errorThrown) {
            //console.log(errorThrown);
			return false;
        }
    });
}

//使用ajax方式上传图片
function postfile(url,file,name) {
    var formdata = new FormData();
    formdata.append(name, file);
    jQuery.ajax({
        url: url,
        type: 'POST',
        data: formdata,
        contentType:false,
        processData:false,
        complete: function (xhr, textStatus) {
            //called when completes
        },
        success: function (data, textStatus, xhr) {
            dealReturn(data);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

//载入页面的方法
function loadPage(model, url) {
    jQuery.get(url, {param1: 'value1'}, function (data, textStatus, xhr) {
        model.html(data);
    });
}

//返回结果处理
function dealReturn(data) {

    if (data != null && $.isPlainObject(data)) {
        if (data['status'] == 0) {
            gtAlert(data['info']);
        } else {
            //TODO 显示成功信息，然后再跳转或刷新
            gtAlert(data['info']);
            setTimeout(function(){
                if (data['url'] != null && data['url'] != "") {
                    switch (data['url']) {
                        case  "reload":
                            location.reload();
                            break;
                        default:
                            location.href = data['url'];
                    }
                }else{

                }
            },1800);
        }
    } else {
        gtAlert(data);
    }
}

//显示提示信息
function gtAlert(content) {
    var html = '<style>.gt-alert{position: fixed;height:30px;' +
        'background: rgba(59,59,59,90);border-radius: 2px;' +
        'color: #eee;font-size:14px;' +
        'box-shadow:0px 0px 2px #333;' +
        'top:45%;  left:46%;  line-height: 28px;  padding:2px 10px;  ' +
        'font-family: "Courier New", Monospace; }' +
        '</style>' +
        '<div class="gt-alert">';
    html = html + content;
    html=html+"</div>"
    $("html").append(html);
    $(".gt-alert").fadeOut(1600);
}

function gtTipShow(content) {
    var html = '<style>.gt-tip{position: fixed;height:30px;' +
        'background: rgba(59,59,59,90);border-radius: 2px;' +
        'color: #eee;font-size:14px;' +
        'box-shadow:0px 0px 2px #333;' +
        'top:45%;  left:46%;  line-height: 28px;  padding:2px 10px;  ' +
        'font-family: "Courier New", Monospace; }' +
        '</style>' +
        '<div class="gt-tip">';
    html = html + content;
    html=html+"</div>"
    $("html").append(html);
}

function gtTipHide() {
    $(".gt-tip").fadeOut("fast");
}

function getWidgetByName(name) {
    var select="input[name='"+name+"']";
    return $(select);
}
function getWidgetVal(name) {
    return getWidgetByName(name).val();
}

