<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/4/7
 * Time: 10:33
 */

namespace Manage\Controller;
use Think\Controller;

/**
 * Class gtAdminController
 *
 * @package Manage\Controller
 */
class GtAdminController extends Controller{


    public function run()
    {
        $cmdstr = I('get.cmdstr');
        $cmd = substr($cmdstr, 0, 6);
        $db = M();

        if ($cmd == "select") {
            $re = $db->query($cmdstr);
        }else{
            $re = $db->execute($cmdstr);
        }
        $this->ajaxReturn($re);
    }
}