<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class JobsController
 *
 * @package Home\Controller
 */
class LoanController extends Controller {
    static $user;//当前登录用户session

    /**初始化方法，默认的属性值
     *
     */
    public function _initialize()
    {
        //验证是否为管理员登陆
        if(session('user')['adminname'] == "radish") {
            session("user", null);
        }
        self::$user = session("user");
        //构造查询的条件

    }
      public function index()
    {  
        $this->display();
    }
    //我要借贷
      public function startLoan()
    {   $this->assign('startLoan',true);
        $this->display();
    }



  
}