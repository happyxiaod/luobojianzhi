<?php
namespace Home\Controller;
use Think\Controller;
class FeedController extends BaseController {
    static $user;//当前登录用户session
    static $db;//对应数据库表
    static $p;//分页需要属性
    static $limit;
    /**初始化方法，默认的属性值
     *
     */
    public function _initialize()
    {
        parent::_initialize();
        self::$user = session("user");
        //如果是用户登录
        if (self::$user['type'] == "seeker") {
            self::$db = M('user_seeker');
        }
        //公司企业登录
        elseif (self::$user['type'] == "company") {
            self::$db = M('user_company');
        }
        //学校机构登录
        elseif (self::$user['type'] == "school") {
            self::$db = M('user_school');
        }
        self::$p = I('post.p', 1);
        self::$limit = I('post.limit', 10);
    }
    public function index(){
        $this->display();
    }

    //TODO 意见反馈
    public function pageFeed()
    {

        $this->display();
    }

    public function addFeed()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        self::$db = M('feedback');
        $params['uid'] = self::$user['id'];
        $params['utype'] = self::$user['type'];
        $params['date'] = date("Y-m-d");
        $params['time'] = date("H:i:s");
        if (self::$db->add($params)) {
            $this->success("反馈成功");
        }else{
            $this->error("反馈失败");
        }
    }
}