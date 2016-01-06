<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/3/3 0003
 * Time: 20:44
 */

namespace Home\Controller;


use Think\Controller;

/**
 * Class BaseController
 *
 * @package Home\Controller
 */
class BaseController extends Controller{

    public function _initialize()
    {
        //验证是否为管理员登陆
        if(session('user')['adminname'] == "radish") {
            session("user", null);
        }
        $user = session("user");
        if (empty($user)) {
            $this->error("请先登录", U("Index/pageLogin"));
        }

        //定位城市
        $nowCity = session("nowCity");
        if(empty($nowCity)) {
            $nowCity = "威海";
            session("nowCity", $nowCity);
            $ip = get_client_ip();
            if($ip != "0.0.0.0"){
                $data = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip);
                $data = json_decode($data, TRUE);
                if($data['code'] == 0) {
                    $db = M("city");
                    $city = str_replace("市", "", $data['data']['city']);
                    $where['name'] = array('like', "%" . $city . "%");
                    $re = $db->where($where)->find();
                    if($re) {
                        $nowCity = $re['name'];
                        session("nowCity", $nowCity);
                    }
                }
            }
        }
        $this->assign("nowCity", $nowCity);
        // 随机查询6个职业分类作为热门搜索内容
        

    }
}