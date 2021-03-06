<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>萝卜福利</title>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <link rel="stylesheet" type="text/css" href="/luoboNew/Public/default/new_wx/css/base.css">
    <link rel="stylesheet" type="text/css" href="/luoboNew/Public/default/new_wx/css/weal.css">
    <script type="text/javascript" src="/luoboNew/Public/default/new_wx/js/jquery.js"></script>
    <script type="text/javascript" src="/luoboNew/Public/default/new_wx/js/public.js"></script>
    <script type="text/javascript" src="/luoboNew/Public/default/new_wx/js/calendar5.js"></script>
    <script type="text/javascript">
    var APP_PATH = "/luoboNew/weixin.php";
    var MOD_PATH = "/luoboNew/weixin.php";
    var CON_PATH = "/luoboNew/weixin.php/Mobile";
    var SEL_PATH = "/luoboNew/weixin.php/Mobile/weal";
    var ACT_PATH = "/luoboNew/weixin.php/Mobile/weal";
    </script>
    <style type="text/css">
        .styled-select select {
               background: transparent;
               width: 100%;
               padding: 5px;
               font-size: 16px;
               border: 1px solid #ccc;
               height: 40px;
               margin-bottom:5px;
               background-color:#fff;
               -webkit-appearance: none; /*for chrome*/
                overflow: hidden;
               /*  background: url(../images/icon.png) no-repeat right #ddd; */
            }
       
    </style>
</head>
<body>  
    <header>
        <a href="" class="demo-icon return">&#xe801;</a>
        <span>萝卜福利</span>
    </header>

    <section>
        <div class="title">
            <h2>福利派送</h2>
            <p>请各位小伙伴认真填写、核实清楚自己的收件地址哦！我们会定
时向支持萝卜的小伙伴送去问候和惊吓！<b></b><b></b></p>    
        </div>

        <div class="main">
        <form action="/luoboNew/weixin.php/Mobile/doWeal" method="post" id="form-reg">
            <div>
                <p>1.你注册萝卜兼职平台的手机号？<b></b></p>
                <input type="text" name="phone" id="telphone" required autofocus>
            </div>
            <div>
                <p>2.你的生日是哪天？<b></b></p>
                <input type="date" name="birthday" class="calendar_input" required />
                <b></b> 
            </div>
            <div>
                <p>3.不知道可否知道你的名字？（收件人）</p>
                <input type="text" name="realname" id="" required>
            </div>
            <div>
                <p>4.萝卜的礼物要砸向哪里？（收件地址）<b></b></p>

                    <div class="styled-select">
                        <select name="province">
                                    <option value="">请选择省</option>
                                    <?php if(is_array($provinces)): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                         <select name="city"  id="cityList">
                                <option value="">城市</option>
                        </select>
                        <select name="county"  id="countyList">
                                <option value="">区</option>
                        </select>
                    </div>
                <input type="text" name="address" id="" placeholder="街道详细地址" required>
            </div>          
            <div>
                <p>5.收件邮编<b></b></p>
                <input type="text" name="zipcode" id="">
            </div>  
            <input type="submit" value="提交" class="button" required>   
        </form> 
        </div>
        
    </section>
</body>
</html>
<script type="text/javascript">
        //选择省事件
        $("select[name='province']").on('change','',function() {
            var pid=$(this).val();
            jQuery.ajax({
                url: CON_PATH+'/getCityByProvince',
                type: 'POST',
                dataType: '',
                data: {'province': pid},
                complete: function (xhr, textStatus) {
                    //called when complete
                    getSchool();
                },
                success: function (data, textStatus, xhr) {
                    if (data != "failed") {
                        var str = "";
                        $.each(data, function (key, value) {
                            str += "<option value='" + value['id']+"'>";
                            str += value['name']+"</option>";
                        });
                        $("#cityList").html(str);


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

        $("select[name='city']").on('change','',function() {
            getCounty();
        });

        $("#telphone").blur(function(){
            var num=$(this).val();
            if(!(/^1[1|3|4|5|7|8][0-9]\d{4,8}$/.test(num))){ 
                alert("请输入正确的手机号"); 
                $(this).focus(); 
                return false; 
            } 
        });
    function getCounty() {
        var cityId= $("#cityList").val();

        $.post(CON_PATH+"/getCountyByCity", {city: cityId}, function (data) {
            console.log(data);
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