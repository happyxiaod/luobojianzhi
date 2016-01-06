<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <!--
Coder by Niltor
Email:admin@niltor.net-->
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://lib.geethin.com/bootstrap3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/default/css/gt-mobile.css"/>
<link rel="stylesheet" href="/Public/default/css/gt.weixin.css"/>
<script src="http://lib.geethin.com/jquery/jquery1.10.2.min.js"></script>
<script src="http://lib.geethin.com/bootstrap3.3/js/bootstrap.min.js"></script>
<script src="/Public/default/js/geethin.js"></script>
<script src="/Public/default/js/gtcheck.js"></script>
<script src="/Public/default/js/gt.weixin.js"></script>
<script>
    var APP_PATH = "/weixin.php";
    var MOD_PATH = "/weixin.php";
    var CON_PATH = "/weixin.php/Mobile";
    var SEL_PATH = "/weixin.php/Mobile/map?address=%E7%A6%8F%E5%B1%B1%E5%8C%BA%E7%BE%8E%E8%BF%8E%E7%BE%8E%E5%AE%B6";
    var ACT_PATH = "/weixin.php/Mobile/map";
</script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="actionbar-back">
                <div class="col-xs-1 text-left" style="padding-left:8px">
                    <a href="javascript:" onclick="javascript:history.back(-1)">
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </a>
                </div>
                <div class="col-xs-10 text-center actionbar-title">
                    地图查看
                </div>
                <div class="col-xs-1 text-right">

                </div>
            </div>
        </div>
        <div class="row">
            <div id="bdmap" style="width:100%;height:400px;">
            </div>
        </div>

    </div>
</body>
</html>

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
    var address = '<?php echo ($address); ?>';
    address = $.trim(address);
    console.log(address);
    // 将地址解析结果显示在地图上,并调整地图视野
    myGeo.getPoint(address, function (point) {
        if (point) {
            map.centerAndZoom(point, 16);
            map.addOverlay(new BMap.Marker(point));
        } else {
            alert("您选择地址没有解析到结果!");
        }
    }, "威海市");

</script>