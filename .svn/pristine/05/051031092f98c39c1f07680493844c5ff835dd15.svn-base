<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/7/3
 * Time: 13:59
 */

namespace Weixin\Controller;


use Think\Controller;

class SettingController extends Controller
{

    public function _initialize()
    {
        $user = session('user');
        if (empty($user)) {
            $this->error("请先登录",U('Mobile/login'));
        }
    }

    public function updatepwd()
    {
        $this->display();
    }

    //获取城市列表 by pid
    public function getCitys()
    {
        $db           = M('city');
        $pid          = I('post.pid');
        $where['pid'] = $pid;

        $re = $db->field('id,name')->where($where)->select();
        if ($re) {
            $this->ajaxReturn($re);
        }
    }

    //获取区县
    public function getCountys()
    {
        $cname = I('post.cityname');
        $where['name']=$cname;
        $cid = M('city')->where($where)->getField('id');
        unset($where);
        $where['cid'] = $cid;
        $data = M('county')->where($where)->select();
        if ($data) {
            $this->ajaxReturn($data);
        }
    }

    //修改密码
    public function doUpdatePwd()
    {
        $db = M();
        //TODO 修改密码
        $user              = session('user');
        $where['password'] = md5(I('post.oldpwd'));
        $where['id']       = $user['id'];
        $save['password']  = md5(I('post.newpwd'));

        switch ($user['type']) {
            case 'seeker':
                $db = M('user_seeker');
                break;
            case 'company':
                $db = M('user_company');
                break;
            case 'school':
                $db = M('user_school');
                break;
        }
        $re = $db->where($where)->save($save);
        if ($re) {
            $this->success('密码修改成功,需要重新登录!',U('Mobile/logout'));
        } else {
            $this->error('密码修改失败');
        }

    }

    //意见反馈
    public function feedback()
    {
        $this->display();
    }

    public function doFeedBack()
    {
        $user = session('user');
        $add['uid'] = $user['id'];
        $add['utype']=$user['type'];
        $add['date'] = date("Y-m-d");
        $add['time']=date("H:i:s");
        $add['state']=0;
        $add['content']=I('post.content');
        $db = M('feedback');
        $re = $db->add($add);
        if ($re) {
            $this->success("反馈成功");
        }else{
            $this->error('信息提交失败,请稍候重试！');
        }
    }

    //获取学校
    public function getSchools()
    {
        $db            = M('schools');
        $cityname      = I('post.cityname');
        $where['city'] = $cityname;

        $re = $db->field('id,school')->where($where)->select();
        if ($re) {
            $this->ajaxReturn($re);
        }
    }
}