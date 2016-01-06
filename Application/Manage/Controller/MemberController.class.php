<?php
namespace Manage\Controller;

use Think\Controller;

class MemberController extends BaseController
{

    public function _initialize()
    {
        $this->assign('currentnav', '会员管理');
    }

    public function pageSeeker()
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
        $this->assignPage("user_seeker", $where, "userSeekerList", "id desc,createtime desc");
    }

    //导出成表格
    public function exportExcel()
    {   

        $type = I('get.params');
        $m=I('get.month');
        $y=date("Y");
        $startMonth= mktime(0, 0, 0, $m, 1, $y);
        $endMonth=getMonthLastDay($y,$m);
        //首行数据
        $firstrow = array ("id",
                           "用户名",
                           "真实姓名",
                           "地区",
                           "学校",
                           "邮箱",
                           "手机号码",
                           "创建时间",
                           "状态",
                           "qq",
                           "学历",
                           "省份",
                           "城市",
                           "区县"
        );
        switch ($type) {
            case 'all':
           
           if (empty($m)) {
                $data = M('user_seeker')->field('id,username,realname,area,school,email,phone,
        createtime,state,qq,education,province,city,county')->order('createtime desc')->limit('5000')->select();
                export($data, '注册用户数据表', 'user_seeker',$firstrow);
           }else{
             $data = M('user_seeker')->field('id,username,realname,area,school,email,phone,
        createtime,state,qq,education,province,city,county')->order('createtime desc')->
                where("UNIX_TIMESTAMP(createtime)>=$startMonth AND UNIX_TIMESTAMP(createtime)<$endMonth")->select();
                export($data, $m.'月份注册用户数据表', 'user_seeker',$firstrow);
           }
                break;
            case 'check':
            if (empty($m)) {
                $data = M('user_seeker')->field('id,username,realname,area,school,email,phone,
        createtime,state,qq,education,province,city,county')->order('createtime desc')->where('state=1')->limit('5000')->select();
                export($data, '认证用户表数据', 'user_seeker',$firstrow);
           }else{
           $data = M('user_seeker')->field('id,username,realname,area,school,email,phone,
        createtime,state,qq,education,province,city,county')->where("UNIX_TIMESTAMP(createtime)>=$startMonth AND UNIX_TIMESTAMP(createtime)<$endMonth AND state=1")->select();
                export($data, $m.'月份认证用户表数据', 'user_seeker', $firstrow);
           }   
                break;
            case 'company':
                $firstrow = array ('id',
                                   '用户名',
                                   '公司名',
                                   '地址',
                                   '营业执照号码',
                                   '公司邮箱',
                                   '电话',
                                   '联系人',
                                   '联系人手机号',
                                   '公司类型',
                                   '注册时间'
                );
                $data     = M('user_company')->field('id,username,companyname,address,buslicense,
                    companyemail,phone,contacter,contacterphone,companytype,createtime')->select();
                export($data, '萝卜兼职企业表数据', 'user_company', $firstrow);
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