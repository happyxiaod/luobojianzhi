<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {

    public function _initialize()
    {
        //验证是否为管理员登陆
        if(session('user')['adminname'] == "radish") {
            session("user", null);
        }
    }

    public function index(){
        $this->display();
    }
    public function session(){
       var_dump($_SESSION);
    }
}