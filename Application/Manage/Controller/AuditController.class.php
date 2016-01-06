<?php
namespace Manage\Controller;
use Think\Controller;
class AuditController extends BaseController {
    public function _initialize()
    {
        $this->assign('currentnav', '资料审核');
    }
    public function index(){
        $this->display();
    }

    //注册用户，需要补全信息，并审核的
    public function pageSeeker() {
        $where['state'] = 2;
        $where['realname']=array('NEQ',"");
        $this->assignPage("user_seeker", $where, "userSeekerList","createtime desc");
    }

    public function pageCompany() {

        $where['state'] = 2;
        $where['companyname']=array('NEQ',"");
        $this->assignPage("user_company", $where, "userCompanyList","createtime desc");
    }

    public function pageSchool() {
        $where['state'] = 2;
        $where['schoolname']=array('NEQ',"");
        $this->assignPage("user_school", $where, "userSchoolList","createtime desc");
    }

    public function pageSeekerInfo() {
        $id = I("get.id");
        $db = M("user_seeker");
        $re = $db->where("id = $id")->find();
        $this->assign("info", $re);
        $this->display();
    }

     public function pageWealInfo() {
        $id = I("get.id");
        $db = M("weal");
        $re = $db->where("id = $id")->find();
        $this->assign("info", $re);
        $this->display();
    }

    public function pageCompanyInfo() {
        $id = I("get.id");
        $db = M("user_company");
        $re = $db->where("id = $id")->find();
        $this->assign("info", $re);
        $this->display();
    }

    public function pageSchoolInfo() {
        $id = I("get.id");
        $db = M("user_school");
        $re = $db->where("id = $id")->find();
        $this->assign("info", $re);
        $this->display();
    }

    public function fragNotpassSeeker() {
        $where['state'] = 0;
        $this->assignPage("user_seeker", $where, "userSeekerList","createtime desc");
    }

    public function fragNotpassCompany() {
        $where['state'] = 0;
        $this->assignPage("user_company", $where, "userCompanyList","createtime desc");
    }

    public function fragNotpassSchool() {
        $where['state'] = 0;
        $this->assignPage("user_school", $where, "userSchoolList","createtime desc");
    }

    public function assignPage($table, $where = "", $variateName = "list", $order = "") {
        $db = M($table);
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->where($where)->order($order)->page($p, $limit)->select();
        $this->assign($variateName, $list);
        $count = $db->where($where)->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function passSeekerById() {
        $db = M("user_seeker");
        $where['id'] = I("post.id");
        $data['state'] = 1;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }
    //批量审核用户
    public function passByIds() {
        $db = M("user_seeker");
        $json     = $_POST['params'];
        $params   = json_decode($json, TRUE);

         if (is_array($params)) {
            $where = 'id in(' . implode(',', $params) . ')';
        } else {
            $where = 'id=' . $params;
        }
        $data['state'] = 1;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }

     public function passWealById() {
        $db = M("weal");
        $where['id'] = I("post.id");
        $data['state'] = 1;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }
    //批量拒绝用户
    public function notpassSeekerById() {
        $db = M("user_seeker");
        $json     = $_POST['params'];
        $params   = json_decode($json, TRUE);

         if (is_array($params)) {
            $where = 'id in(' . implode(',', $params) . ')';
        } else {
            $where = 'id=' . $params;
        }
        $data['state'] = 0;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }


    public function notpassSeekerByIds() {
        $db = M("user_seeker");
        $where['id'] = I("post.id");
        $data['state'] = 0;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }

    public function passCompanyById() {
        $db = M("user_company");
        $where['id'] = I("post.id");
        $data['state'] = 1;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }

    public function notpassCompanyById() {
        $db = M("user_company");
        $where['id'] = I("post.id");
        $data['state'] = 0;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }

    public function passSchoolById() {
        $db = M("user_school");
        $where['id'] = I("post.id");
        $data['state'] = 1;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }

    public function notpassSchoolById() {
        $db = M("user_school");
        $where['id'] = I("post.id");
        $data['state'] = 0;
        $re = $db->where($where)->save($data);
        if($re) {
            $this->ajaxReturn("设置成功");
        } else {
            $this->ajaxReturn("设置失败");
        }
    }
}