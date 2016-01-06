<?php
namespace Manage\Controller;
use Think\Controller;
class BaseController extends Controller {


    public function _initialize()
    {
       	$user = session("user");
        $datetime = date("Y年m月d日 星期N H:i:s");
        session('datetime', $datetime);
        if (empty($user)) {
            $this->error("请先登录", U("Index/login"));
        } elseif ($user['adminname'] != "luobo") {
            $this->error("您无权登录", U("Index/login"));
        }
    }
}