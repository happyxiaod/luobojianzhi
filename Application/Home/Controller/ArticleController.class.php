<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/4/17
 * Time: 14:18
 */

namespace Home\Controller;
use Think\Controller;

/**
 * Class ArticleController
 *
 * @package Home\Controller
 */
class ArticleController extends Controller{

    public function _initialize()
    {
        //验证是否为管理员登陆
        if(session('user')['adminname'] == "radish") {
            session("user", null);
        }
    }

    public function index()
    {
        $nav = I('get.nav',"AboutRadish");
        $nav = "page" . $nav;
        $this->assign("tplname", $nav);
        $this->display();
    }
     public function aboutUs()
    {
        $this->display();
    }
    public function action() {
        
    }
}