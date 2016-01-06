<?php
namespace Manage\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {   
        $user = session("user");
        $datetime = date("Y年m月d日 星期N H:i:s");
        session('datetime', $datetime);
        if (empty($user)) {
            $this->error("请先登录", U("Index/login"));
        } elseif ($user['adminname'] != "luobo") {
            $this->error("您无权登录", U("Index/login"));
        }

        $this->getInfo();
        $this->display();
    }

    //获取基本统计信息
    public function getInfo()
    {
        $info = session('info');
        //if (empty($info)) {
        $info                  = array ();
        $info['membertotal']   = M('user_seeker')->count();
        $info['checkedmember'] = M('user_seeker')->where('state=1')->count();
        $info['nocheckmember'] = $info['membertotal'] - $info['checkedmember'];
        $date                  = date("Y-m-d");
        $info['newmember']     = M('user_seeker')->where("createtime >'$date'")->count();

        $info['companytotal']   = M('user_company')->count();
        $info['checkedcompany'] = M('user_company')->where('state=1')->count();
        $info['nocheckcompany'] = $info['companytotal'] - $info['checkedcompany'];
        $info['newcompany']     = M('user_company')->where("createtime >'$date'")->count();

        $info['jobstotal']   = M('jobs')->count();
        $info['levelnumber'] = M('job_level2')->count();
        $info['applyjobs']   = M('jobs_apply')->group('jobid')->count();
        $info['newjobs']     = M('jobs')->where("date=$date")->count();

        $info['schools']           = M('schools')->count();
        $info['applynumber']       = M('jobs_apply')->count();
        $info['acceptapplynumber'] = M('jobs_apply')->where('state=1')->count();
        session('info', $info);

        $UserCount=array(rand(10,100),rand(10,100),rand(10,100),rand(10,100));
        $this->assign('UserCount', $UserCount);
    }


    public function login()
    {
        $this->display();
    }

    public function doLogin()
    {
        $data = I("post.");
        $where['adminname'] = $data['username'];
        $where['adminpwd']  = $data['password'];
        $db                 = M('setting');
        $re                 = $db->where($where)->find();
        if ($re) {
            session("user", $re);
            $this->success("登录成功", "index");
        } else {
            $this->error("你没有权限登录");
        }
    }
}