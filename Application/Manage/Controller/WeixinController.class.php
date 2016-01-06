<?php
namespace Manage\Controller;

use Think\Controller;

class WeixinController extends BaseController
{

    public function _initialize()
    {
        $this->assign('currentnav', '微信活动');
    }
   /* public function activity()
    {
        $this->display();
    }*/



    public function weal()
    {

        $where                   = array ();
        $params                  = I('get.params');
        if (I('get.state')) {
          $where['state']=I('get.state');
        }
        $where['phone|realname'] = array ('like', '%' . $params . '%');
        $citylist = M('city')->select();
        $stateList = array('1' => "已派送",'2'=>"未派送" );
        $this->assign('stateList', $stateList);
        $this->assign('citylist', $citylist);
        $this->assignPage("weal", $where, "userWealList", "id desc,createtime desc");
    }

    //导出成表格
    public function exportExcel()
    {   

        $type = I('get.params');
        //首行数据
        $firstrow = array (
                           "真实姓名",
                           "省",
                           "市",
                           "区",
                           "街道地址",
                           "手机",
                           "提交时间",
                           "生日",
                           "状态",
                           "生日",
                           "邮编"
        );
        switch ($type) {
            case 'all':
                $data = M('weal')->field('realname,province,city,county,address,phone,
        createtime,state,birthday,zipcode')->select();
                 export($data, '微信福利用户表', 'weal', $firstrow);
                break;
        }

    }

    //认证用户，信息审核通过的
    public function pageCheckedSeeker()
    {
        $school                  = session('school');
        $where                   = array ();
        $params                  = I('get.params');
        $where['phone|realname'] = array ('like', '%' . $params . '%');
        if (!empty($school)) {
            $where['school'] = $school;

        }
        $citylist = M('city')->select();
        $this->assign('citylist', $citylist);
        $where['state'] = 1;
        $this->assignPage("user_seeker", $where, "userSeekerList","createtime desc");
    }

    //未审核的用户
    public function pageNotCheckedSeeker()
    {
        $school                  = session('school');
        $where                   = array ();
        $params                  = I('get.params');
        $where['phone|realname'] = array ('like', '%' . $params . '%');
        if (!empty($school)) {
            $where['school'] = $school;

        }
        $citylist = M('city')->select();
        $this->assign('citylist', $citylist);
        $where['state'] = 2;
        $this->assignPage("user_seeker", $where, "notUserSeekerList","createtime desc");
    }

    //认证用户，信息审核通过的
    public function pageCheckedCompany()
    {
        $city = session('companycity');
        $where = array ();

        if (!empty($city)) {
            $where['city']=$city;
        }
        $citylist = M('city')->select();
        $this->assign('citylist', $citylist);
        $where['state'] = 1;
        $this->assignPage("user_company", $where, "userCompanyList","createtime desc");
    }

    public function pageCompany()
    {
        $city = session('companycity');
        $where = array ();
        $params                  = I('get.params');
        $where['phone|companyname'] = array ('like', '%' . $params . '%');
        if (!empty($city)) {
            $where['city']=$city;
        }
        $citylist = M('city')->select();
        $this->assign('citylist', $citylist);
        $this->assignPage("user_company", $where, "userCompanyList","createtime desc");
    }

    public function pageSchool()
    {
        $where['state'] = 1;
        $this->assignPage("user_school", $where, "userSchoolList","createtime desc");
    }

    public function delSeekerById()
    {
        $db          = M("user_seeker");
        $where['id'] = I('post.id');
        $re          = $db->where($where)->delete();
        if ($re) {
            $this->ajaxReturn("删除成功");
        } else {
            $this->ajaxReturn("删除失败");
        }
    }

    public function passWealById()
    {
        $db          = M("weal");
        $where['id'] = I('post.id');
        $data['state'] = 1;
        $re          = $db->where($where)->save($data);
    }

    public function delCompanyById()
    {
        $db          = M("user_company");
        $where['id'] = I('post.id');
        $re          = $db->where($where)->delete();
        if ($re) {
            $this->ajaxReturn("删除成功");
        } else {
            $this->ajaxReturn("删除失败");
        }
    }

    public function delSchoolById()
    {
        $db          = M("user_school");
        $where['id'] = I('post.id');
        $re          = $db->where($where)->delete();
        if ($re) {
            $this->ajaxReturn("删除成功");
        } else {
            $this->ajaxReturn("删除失败");
        }
    }

    public function assignPage($table, $where = "", $variateName = "list", $order = "")
    {
        $db = M($table);
        $p  = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list  = $db->where($where)->order($order)->page($p, $limit)->select();
        $this->assign($variateName, $list);
        $count    = $db->where($where)->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function getSchools()
    {
        $where['city'] = I('post.city');
        $re            = M('schools')->where($where)->select();
        if ($re) {
            $this->ajaxReturn($re);
        } else {
            $this->ajaxReturn('error');
        }

    }

    public function setSchool()
    {
        session('school', I('get.school'));
    }

    public function setCompanyCity()
    {
        $city=I('get.city');
        if ($city == 'null') {
            session('companycity', NULL);
        }else{
            session('companycity', $city);

        }
    }
}



