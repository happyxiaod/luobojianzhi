/**
 * Created by NilTor on 2015/4/3.
 * 表单字段验证
 */

var valis = new Array();

valis['phone'] = /^0?1[3|4|5|8|7][0-9]\d{8}$/;
valis['email'] = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
valis['zh-cn'] = /^[\u0391-\uFFE5]+$/;
valis['qq'] = /[1-9][0-9]{4,}/;
valis['idcard'] = /\d{15}|\d{18}/;
valis['date'] =  /^(\d{4})-(\d{2})-(\d{2})$/;
valis['number'] = /^[0-9]*$/;

function bindCheck() {
    var fields=$("[gt-check]");
    fields.each(function () {
        var checktype=$(this).attr("gt-check");
      gtCheck($(this), checktype);
    });
}

function gtCheck(o,type) {
    var inputWrong=$("#phoneWrong");
    o.blur(function () {
        var val = o.val();
        var re=valis[type].test(val);
        if(re){
            inputWrong.removeClass("wrong");
            inputWrong.html('');
            o.css({
                color: "",
                border:"1px solid #ccc",
                'font-weight':""

            });
        }else{
            inputWrong.addClass("wrong");
            inputWrong.html('手机号输入有误');
            o.css({
                color:"red",
                border:"1px solid red",
                'font-weight':600
            });
        }
    });
}

function gtCheckQQ(qqNum) {

    var inputWrong=$("#qqWrong");
        var re=valis['qq'].test(qqNum);
        if(re){
            inputWrong.removeClass("wrong");
            inputWrong.html('');
            o.css({
                color: "",
                border:"1px solid #ccc",
                'font-weight':""
            });
        }else{
            inputWrong.addClass("wrong");
            inputWrong.html('QQ号输入有误');
            o.css({
                color:"red",
                border:"1px solid red",
                'font-weight':600
            });
        }

}

/**
 * 
 * 两次密码验证函数
 */
 function checkNotPassword(p1,p2){
     var passWrong=$("#passwordWrong");
    if (p1==p2) {
        passWrong.removeClass("wrong");
        passWrong.html('');
            o.css({
                color: "",
                border:"1px solid #ccc",
                'font-weight':""

            });
    }else{
         passWrong.addClass("wrong");
            passWrong.html('两次密码不一致');
            o.css({
                color:"red",
                border:"1px solid red",
                'font-weight':600
            });
    }

 }
//验证用户姓名企业名称
  function verfifyContactName(nameStr){

   if(nameStr == null || nameStr ==""){

              return false;
             }else {
              var reg = /^[\u4e00-\u9fa5a-z][\u4e00-\u9fa5a-z0-9_]*$/i;
              var name_Flag = reg.test(nameStr);
              if(name_Flag){
               return true;
              }else{
               return false;
              }
             }
}

//验证图片src是否为ROOT_PATH+/Uploads/ 部署的服务器需要改路径
  function checkPictureSrc(nameStr){
   if(nameStr =='/luobofinal/Uploads/'){
    return false;
   }else{
    return true;
   }

}




                   

