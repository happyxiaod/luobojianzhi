<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/3/7
 * Time: 17:57
 */


/**
 * 分页方法，生成前面分页需要的模板内容
 *
 * @param string $count 总数
 * @param string $limit 每页个数
 * @param int    $p     当前页数
 * @param string $prev
 * @param string $nextv
 * @return array 返回page,二维数组
 */
function gtPage($count, $limit, $p = 1, $prev = "上一页", $nextv = "下一页")
{
    $page = array ();
    if ($count == 0) {
        return $page;
    }
    $self = __SELF__;
    if ($pos = strpos($self, "&p=")) {
        $self = substr(__SELF__, 0, $pos);
    }

    if (!strpos($self, "?")) {
        $self .= "?";
    }

    //计算页数
    if ($count % $limit == 0) {
        $number = $count / $limit;
    } else {
        $number = floor($count / $limit) + 1;
    }
    //处理前一页和下一页

    $pre['value']  = $prev;
    $next['value'] = $nextv;
    if ($p <= 1) {
        $pre['url'] = $self . "&p=" . "1";
    } else {
        $pre['url'] = $self . "&p=" . ($p - 1);
    }
    if ($p >= $number) {
        $next['url'] = $self . "&p=" . $number;
    } else {
        $next['url'] = $self . "&p=" . ($p + 1);

    }

    if ($count > $limit) {
        $page[] = $pre;
    }

    for ($i = 1; $i <= $number; $i++) {
        $row['url']   = $self . "&p=" . $i;
        $row['value'] = $i;
        $row['p']     = $p;
        $page[]       = $row;
    }
    if ($count > $limit) {
        $page[] = $next;
    }
    return $page;
}

/**
 * 发送验证码
 *
 * @param $phone        string 手机号
 * @param $phonecaptcha string 验证码
 * @param $captchaType  string 验证类型
 * @return bool|string
 */
function sendCaptcha($phone, $phonecaptcha, $captchaType = '')
{
    $tempid = "MB-2014051104";
    //根据验证类型更换模板id
    /*switch($captchaType) {
        case 'findPwd':
            $tempid = "";
            break;
        case 'savePhone':
            $tempid = "";
            break;
        case '':

            break;
        default:
            break;
    }*/

    $url               = "http://222.185.228.25:8000/msm/sdk/http/sendsmsutf8.jsp";
    $params            = array ("username" => 'JSMB260387', "scode" => '715870', "tempid" => "$tempid");
    $params['mobile']  = $phone;
    $params['content'] = "@1@=" . $phonecaptcha;

    $postdata = http_build_query($params);
    $options  = array ('http' => array ('method'  => 'POST',
                                        'header'  => 'Content-type:application/x-www-form-urlencoded',
                                        'content' => $postdata,
                                        'timeout' => 15 * 60 // 超时时间（单位:s）
    )
    );
    $context  = stream_context_create($options);
    $result   = file_get_contents($url, FALSE, $context);
    return $result;
}

//向企业发送用户申请的短信
function sendAplMsgToCop($phone, $cop, $title, $username, $userphone)
{

    $url               = "http://222.185.228.25:8000/msm/sdk/http/sendsmsutf8.jsp";
    $params            = array ("username" => 'JSMB260387', "scode" => '715870', "tempid" => "MB-2015040723");
    $params['mobile']  = $phone;
    $params['content'] = "@1@=" . $cop . ",@2@=" . $title . ",@3@=" . $username . ",@4@=" . $userphone;

    $postdata = http_build_query($params);
    $options  = array ('http' => array ('method'  => 'POST',
                                        'header'  => 'Content-type:application/x-www-form-urlencoded',
                                        'content' => $postdata,
                                        'timeout' => 15 * 60 // 超时时间（单位:s）
    )
    );
    $context  = stream_context_create($options);
    $result   = file_get_contents($url, FALSE, $context);
    return $result;
}

//向用户发送企业同意的短信
function sendAgrMsgToUser($phone, $cop, $title, $username, $copphone)
{

    $url               = "http://222.185.228.25:8000/msm/sdk/http/sendsmsutf8.jsp";
    $params            = array ("username" => 'JSMB260387', "scode" => '715870', "tempid" => "MB-2015040749");
    $params['mobile']  = $phone;
    $params['content'] = "@1@=" . $username . ",@2@=" . $cop . ",@3@=" . $title . ",@4@=" . $copphone;

    $postdata = http_build_query($params);
    $options  = array ('http' => array ('method'  => 'POST',
                                        'header'  => 'Content-type:application/x-www-form-urlencoded',
                                        'content' => $postdata,
                                        'timeout' => 15 * 60 // 超时时间（单位:s）
    )
    );
    $context  = stream_context_create($options);
    $result   = file_get_contents($url, FALSE, $context);
    return $result;
}

/**
 * 判断是否键存在，并不为空值
 *
 * @param $must  array 需要存在的键
 * @param $no    array 不能存在的键
 * @param $array array
 * @return string null
 */
function haskey($array, $must = array (), $no = array ())
{
    $re = NULL;
    foreach ($must as $value) {
        if ($array[$value] == "" || $array[$value] == NULL) {
            $re .= $value . " is necessary;";
        }
    }
    foreach ($no as $value) {
        if (array_key_exists($no, $array)) {
            $re .= $value . " is refused;";
        }
    }
    if ($re != NULL) {
        $result['info']  = $re;
        $result['state'] = "0";
        $result          = json_encode($result);
        return $result;
    } else {
        return NULL;
    }
}

function getIPaddress()
{
    $IPaddress = '';
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
        } else {
            if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
    }
    return $IPaddress;
}

function taobaoIP($clientIP)
{
    $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip=' . $clientIP;
    $IPinfo   = json_decode(file_get_contents($taobaoIP));
    //$province = $IPinfo->data->region;
    $city = $IPinfo->data->city;
    if (empty($city)) {
        $data = '威海市';
    } else {
        $data = $city;
    }
    return $data;
}

//判断数组中是否有空值
function hasNull($arr)
{
    foreach ($arr as $key => $value) {
        if (empty($value)) {
            return TRUE;
        }
    }
    return FALSE;
}

/**
 * 是否移动端访问访问
 *
 * @return bool
 */
function isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return TRUE;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? TRUE : FALSE;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array ('nokia',
                                 'sony',
                                 'ericsson',
                                 'mot',
                                 'samsung',
                                 'htc',
                                 'sgh',
                                 'lg',
                                 'sharp',
                                 'sie-',
                                 'philips',
                                 'panasonic',
                                 'alcatel',
                                 'lenovo',
                                 'iphone',
                                 'ipod',
                                 'blackberry',
                                 'meizu',
                                 'android',
                                 'netfront',
                                 'symbian',
                                 'ucweb',
                                 'windowsce',
                                 'palm',
                                 'operamini',
                                 'operamobi',
                                 'openwave',
                                 'nexusone',
                                 'cldc',
                                 'midp',
                                 'wap',
                                 'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return TRUE;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE) && (strpos($_SERVER['HTTP_ACCEPT'],
            'text/html') === FALSE || (strpos($_SERVER['HTTP_ACCEPT'],
            'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'],
               'text/html')))
        ) {
            return TRUE;
        }
    }
    return FALSE;
}


//导出Excel表格
function export($data, $excelFileName, $sheetTitle, $firstrow)
{

    /* 实例化类 */
    import('Vendor.phpExcel.PHPExcel');
    $objPHPExcel = new PHPExcel();

    /* 设置输出的excel文件为2007兼容格式 */
    //$objWriter=new PHPExcel_Writer_Excel5($objPHPExcel);//非2007格式
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

    $csvWriter = new PHPExcel_Writer_CSV($objPHPExcel);
    /* 设置当前的sheet */
    $objPHPExcel->setActiveSheetIndex(0);

    $objActSheet = $objPHPExcel->getActiveSheet();

    /*设置宽度*/
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);


    /* sheet标题 */
    $objActSheet->setTitle($sheetTitle);
    $j = 'A';
    foreach ($firstrow as $value) {
        $objActSheet->setCellValue($j . '1', $value);
        $j++;
    }

    $i = 2;
    foreach ($data as $value) {
        /* excel文件内容 */
        $j = 'A';
        foreach ($value as $value2) {
            //            $value2=iconv("gbk","utf-8",$value2);
            $objActSheet->setCellValue($j . $i, $value2);
            $j++;
        }
        $i++;
    }


    /* 生成到浏览器，提供下载 */
    ob_end_clean();  //清空缓存
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-Disposition:attachment;filename="' . $excelFileName . '.xlsx"');
    header("Content-Transfer-Encoding:binary");
    $objWriter->save('php://output');
}

function exportCSV($data, $excelFileName, $sheetTitle, $firstrow)
{

    /* 实例化类 */
    import('Vendor.phpExcel.PHPExcel');
    $objPHPExcel = new PHPExcel();

    /* 设置输出的excel文件为2007兼容格式 */
    //$objWriter=new PHPExcel_Writer_Excel5($objPHPExcel);//非2007格式

    $csvWriter = new PHPExcel_Writer_CSV($objPHPExcel, 'CSV');
    /* 设置当前的sheet */
    $objPHPExcel->setActiveSheetIndex(0);

    $objActSheet = $objPHPExcel->getActiveSheet();

    /*设置宽度*/
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);


    /* sheet标题 */
    $objActSheet->setTitle($sheetTitle);
    $j = 'A';
    foreach ($firstrow as $value) {
        $objActSheet->setCellValue($j . '1', $value);
        $j++;
    }

    $i = 2;
    foreach ($data as $value) {
        /* excel文件内容 */
        $j = 'A';
        foreach ($value as $value2) {
            //            $value2=iconv("gbk","utf-8",$value2);
            $objActSheet->setCellValue($j . $i, $value2);
            $j++;
        }
        $i++;
    }


    /* 生成到浏览器，提供下载 */
    ob_end_clean();  //清空缓存
    header("Pragma: public");
    header("Expires: 0");
    header('Content-Type: application/vnd.ms-excel;charset=gbk');
    header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-Disposition:attachment;filename="' . $excelFileName . '.csv"');
    header("Content-Transfer-Encoding:binary");
    $csvWriter->save('php://output');
}

function exportCSVFile($data, $excelFileName, $firstrow)
{
    $content = "";

    foreach ($firstrow as $value) {
        $content .= $value . ',';
    }
    substr($content, 0, count($content) - 1);
    $content .= "\r\n";

    foreach ($data as $row) {
        foreach ($row as $value) {
            $content .= $value . ',';
        }
        substr($content, 0, count($content) - 1);

        $content .= "\r\n";
    }

    $file = APP_PATH . '../Public/export/' . $excelFileName . ".csv";
    $re   = file_put_contents($file, $content);
    if ($re) {
        header("Location: http://www.luobojianzhi.com/Public/export/".$excelFileName.".csv");
    }

}



function CalculationValidate(){
     session_start();
      $w=100;
      $h=30;
      $img = imagecreate($w,$h);
      $gray = imagecolorallocate($img,255,255,255);
      $black = imagecolorallocate($img,rand(0,200),rand(0,200),rand(0,200));
      $red = imagecolorallocate($img, 255, 0, 0);
      $white = imagecolorallocate($img, 255, 255, 255);
      $green = imagecolorallocate($img, 0, 255, 0);
      $blue = imagecolorallocate($img, 0, 0, 255);
      imagefilledrectangle($img, 0, 0, $w, $h, $black);
     
     
      for($i = 0;$i < 80;$i++){
        imagesetpixel($img, rand(0,$w), rand(0,$h), $gray);
      }

      $num1 = rand(1,99);
      $num2 = rand(1,99);
      $res=0;
      $code=rand(0,1);
       switch ($code) {
        case 0:
          $res=$num1+$num2;
          $symbol="+";
          break;
        case 1:
          $res=$num1-$num2;
          $symbol="-";
          break;
        default:
          # code...
          break;
        }
      imagestring($img, 5, 5, rand(1,10), $num1, $red);
      imagestring($img,5,30,rand(1,10),$symbol, $white);
      imagestring($img,5,45,rand(1,10),$num2, $green);
      imagestring($img,5,65,rand(1,10),"=", $blue);
      imagestring($img,5,80,rand(1,10),"?", $red);
      
      $_SESSION['res']=$res;
    
      header("content-type:image/png");
      imagepng($img);
      imagedestroy($img);
}

//获取月份的最后一天
function getMonthLastDay($year, $month){
    $t = mktime(0, 0, 0, $month + 1, 1, $year);
    $t = $t - 60 * 60 * 24;
    return $t;
}