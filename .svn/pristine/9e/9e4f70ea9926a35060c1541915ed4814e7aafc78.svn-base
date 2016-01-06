function bindClick() {
    // 按钮点击事件
    $(document).on('click', "[gt-btn-click]", function (event) {
        event.preventDefault();
        value = $(this).attr("gt-btn-click");
        switch (value) {
            case 'frag-notpass-seeker':
                loadRightData($(this), CON_PATH + "/fragNotpassSeeker");
                break;
            case 'frag-notpass-company':
                loadRightData($(this), CON_PATH + "/fragNotpassCompany");
                break;
            case 'frag-notpass-school':
                loadRightData($(this), CON_PATH + "/fragNotpassSchool");
                break;
            case 'frag-feedback-seeker':
                loadRightData($(this), CON_PATH + "/fragFeedbackSeeker");
                break;
            case 'frag-feedback-company':
                loadRightData($(this), CON_PATH + "/fragFeedbackCompany");
                break;
            case 'frag-feedback-school':
                loadRightData($(this), CON_PATH + "/fragFeedbackSchool");
                break;
            case 'frag-seeker-deliver-list':
                loadRightData($(this), CON_PATH + "/fragSeekerDeliverList");
                break;
            case 'frag-seeker-succeed-list':
                loadRightData($(this), CON_PATH + "/fragSeekerSucceedList");
                break;
            case 'frag-company-publish-list':
                loadRightData($(this), CON_PATH + "/fragCompanyPublishList");
                break;
            case 'frag-company-recruit-list':
                loadRightData($(this), CON_PATH + "/fragCompanyRecruitList");
                break;
            case 'frag-company-report-list':
                loadRightData($(this), CON_PATH + "/fragCompanyReportList");
                break;
            case 'frag-school-publish-list':
                loadRightData($(this), CON_PATH + "/fragSchoolPublishList");
                break;
            case 'frag-school-recruit-list':
                loadRightData($(this), CON_PATH + "/fragSchoolRecruitList");
                break;
            case 'hide-imgbox':
                hideImgbox();
                break;
            case 'audit-thumbnail':
                popupImg($(this));
                break;
             case 'searchCompany'://搜索公司名称
                searchCompany($(this));
                break;
            case 'del-member-seeker':
            if(confirm('您确定删除次会员吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/delSeekerById", id, "alertAndReload");}
                break;
            case 'del-member-company':
            if(confirm('您确定删除此公司吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/delCompanyById", id, "alertAndReload");}
                break;
            case 'del-member-school':
            if(confirm('您确定删除此学校吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/delSchoolById", id, "alertAndReload");}
                break;
            case 'audit-seeker-pass':
            if(confirm('您确定审核通过吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/passSeekerById", id, "alertAndReload");}
                break;
            case 'weal-send':
            if(confirm('您确定发送福利吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/passWealById", id, "alertAndReload");}
                break;
            case 'audit-seeker-notpass':
            if(confirm('您确定不通过此会员吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/notpassSeekerById", id, "alertAndReload");}
                break;
            case 'audit-company-pass':
               if(confirm('您确定审核通过吗？')){
                id = $(this).parent().find("input[name='id']").val();
                 postId(CON_PATH + "/passCompanyById", id, "alertAndReload");
               }
               /* var d = new Date();
                var approvetime = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                postId(CON_PATH + "/passCompanyById",{id:id,time:approvetime},"alertAndReload")*/
                break;
            case 'audit-company-notpass':
             if(confirm('您确定不通过此公司吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/notpassCompanyById", id, "alertAndReload");
            }
                break;
            case 'audit-school-pass':
            if(confirm('您确定通过此学校吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/passSchoolById", id, "alertAndReload");}
                break;
            case 'audit-school-notpass':
            if(confirm('您确定不通过此学校吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/notpassSchoolById", id, "alertAndReload");}
                break;
            case 'fragAddScroll':
                loadPage($(".middle-content"), CON_PATH + "/fragAddScroll");
                break;
            case 'delScroll':
            if(confirm('您确定不通过此学校吗？')){
                id = $(this).parent().find("input[name='id']").val();
                postId(CON_PATH + "/delScroll", id, "alertAndReload");}
                break;
            case 'searchRegion':
                searchRegion($(this));
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
            case 'loadCityList':
                loadCityList($(this), "");
                break;
            case 'loadCityList1':
                loadCityList($(this), "1");
                break;
            case 'loadCityList2':
                loadCityList($(this), "2");
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
            case 'frag-seeker-deliver':
                loadPositionFrag($(this), CON_PATH + "/fragSeekerDeliver");
                break;
            case 'frag-seeker-succeed':
                loadPositionFrag($(this), CON_PATH + "/fragSeekerSucceed");
                break;
            case 'frag-company-publish':
                loadPositionFrag($(this), CON_PATH + "/fragCompanyPublish");
                break;
            case 'frag-company-recruit':
                loadPositionFrag($(this), CON_PATH + "/fragCompanyRecruit");
                break;
            case 'frag-company-report':
                loadPositionFrag($(this), CON_PATH + "/fragCompanyReport");
                break;
            case 'frag-school-publish':
                loadPositionFrag($(this), CON_PATH + "/fragSchoolPublish");
                break;
            case 'frag-school-recruit':
                loadPositionFrag($(this), CON_PATH + "/fragSchoolRecruit");
                break;
            case 'feedback-dialog':
                var id = $(this).find("#id").val();
                loadPage($(".middle-content"), CON_PATH + "/fragFeedbackDialog?uid="+id);
                break;
            case '':
                break;
            default:
                break;
        }
    });
    $(document).on('hover', '[gt-block-click]', function (event) {
        event.preventDefault();
        $(this).css({
            cursor:"pointer",
            background:"#bbbbbb100"
        });
    });
}

//向后台传一个id
function postId(path, id, type) {
    jQuery.ajax({
        url: path,
        type: 'POST',
        data: {'id': id},
        complete: function (xhr, textStatus) {

        },
        success: function (data, textStatus, xhr) {
            if (type = "alertAndReload") {
                //alert(data);
                location.reload();
            }
        },
        error: function (xhr, textStatus, errorThrown) {

        }
    });
}

//加载职位信息内容
function loadPositionFrag(div, path) {
    id = div.find("input[name='id']").val();
    name = div.find("td[name='name']").html();
    name = $.trim(name);
    jQuery.ajax({
        url: path,
        type: 'POST',
        data: {'id': id, 'name': name},
        complete: function (xhr, textStatus) {
            //called when complete
        },
        success: function (data, textStatus, xhr) {
            $(".middle-content").html(data);
            $("button[name='name']").html(name);
        },
        error: function (xhr, textStatus, errorThrown) {

        }
    });
}

// 加载右侧数据列表
function loadRightData(btn, path) {
    $(".load-right-data").removeClass('btn-orange');
    $(".load-right-data").addClass('btn-gray');
    btn.removeClass('btn-gray');
    btn.addClass('btn-orange');
    loadPage($(".load-table-page"), path);
}

// 弹出图片框
function popupImg(btn) {
    var src = btn.attr("popup-src");
    if(src == null || src == "") {
        alert("暂时没有图片！");
    } else {
        $("#img-thumbnail").attr({ src: src, onerror: "popupImgError()"});
        gtTipShow("正在加载图片...");
    }
}

function setThumbPos() {
    gtTipHide();
    var box = $(".imgbox");
    //获取窗口的宽和高
    var winh = $(document).height();
    var winw = $(document).width();
    var boxh = box.height();
    var boxw = box.width();
    var px = (winw - boxw) / 2;
    var py = (winh - boxh) / 2;

    box.css({
        top:py,
        left:px
    });

    $(".lucency").show();
    box.show();

}

//加载图片失败处理
function popupImgError() {
    gtTipHide();
    alert("加载图片失败!");
}

// 隐藏图片框
function hideImgbox() {
    $("#img-thumbnail").removeAttr("onerror").attr("src", "");
    $(".lucency").hide();
    $(".imgbox").hide();
}

//加载城市列表
function loadCityList(th, type) {
    pid = th.val();
    jQuery.ajax({
        url: CON_PATH + '/fragCityList' + type,
        type: 'POST',
        data: {'pid': pid},
        complete: function (xhr, textStatus) {
            //called when complete
        },
        success: function (data, textStatus, xhr) {
            $("#cityBox").html(data);
        },
        error: function (xhr, textStatus, errorThrown) {
            
        }
    });
}

//筛选地区
function searchRegion(btn) {
    keyword = btn.siblings("input[name='keyword']").val();
    pid = btn.siblings("select[name='pid']").val();
    if(pid == "不限" || typeof(pid) == "undefined") {
        pid = "";
    }
    cid = btn.siblings("select[name='cid']").val();
    if(cid == "不限" || cid == "请选择" || typeof(cid) == "undefined") {
        cid = "";
    }
    location.href = ACT_PATH + '?keyword=' + keyword + '&pid=' + pid + '&cid=' + cid;
}
//搜索公司名称
function searchCompany(o) {
    var value = o.parent().siblings("input").val();
    if (value == null || value == "") {
        alert("你并未输入任何关键词");
        return;
    }
    loadPage($(".load-table-page"), CON_PATH+"/fragCompanyPublishList?keyword="+value);

}

