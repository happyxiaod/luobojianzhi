<?php
namespace Weixin\Controller;

use Think\Controller;

/**
 * Class UserCenterController
 *
 * @package Weixin\Controller
 */
class SeekerController extends Controller
{
    static  $p;        //分页,当前页数
    static  $limit;    //分页,每页个数
    private $openid;
    static  $user;

    public function _initialize()
    {
        self::$user  = session('user');
        self::$p     = I('get.p', I('post.p', 1));
        self::$limit = I('get.limit', I('post.limit', 10));

        if (empty(self::$user)) {
            $this->error("请先登录", U('Mobile/login'));
        } else {
        }
    }


    public function checkReg()
    {
        if (empty(self::$user['realname'])) {
            $this->error("你需要先补全信息", U('Seeker/myResume'));
        } else {
            /*if (self::$user['state'] == 2) {
                session('user', NULL);
                $this->error("耐心等待,信息通过审核后可投递岗位", U('Mobile/login'));
            }*/
        }
    }

    /**设置分页
     *
     * @param $count int 总数
     * @return void assign
     */
    public function setPage($count)
    {
        $page = gtPage($count, self::$limit, self::$p);
        $this->assign("pagelist", $page);
        $this->assign("curtpage", self::$p);
    }

    public function index()
    {
        $this->display("pageUserCenter");
    }


    //注册绑定页面
    public function pageBind()
    {

        $sign   = NULL;
        $openid = I('get.openid');
        if ($openid == NULL || $openid == "") {
            $openid = S("openid");
            S("openid", NULL);
        }
        $where['openid'] = $openid;
        $db              = M("user_seeker");
        if ($openid != NULL && $openid != "") {
            $re = $db->where($where)->find();
            if ($re) {
                $sign = "该微信已与" . $re['realname'] . "绑定!";
            } else {
                $db1 = M("user_company");
                $re1 = $db1->where($where)->find();
                if ($re1) {
                    $sign = "该微信已与" . $re1['companyname'] . "绑定!";
                } else {

                }
            }
        }

        $this->assign("openid", $openid);
        $this->assign("sign", $sign);
        $this->display();
    }

    //绑定
    public function doBind()
    {
        $db   = M("");
        $type = I('post.type');
        if ($type == "seeker") {
            $db = M("user_seeker");
        } elseif ($type == "company") {
            $db = M("user_company");
        }

        $where["phone"]    = I('post.username');
        $where["password"] = md5(I('post.password'));
        $re                = $db->where($where)->find();
        if ($re) {
            //TODO 得到openid
            if ($re['openid'] != NULL && $re['openid'] != "") {
                $this->error("该账号已经绑定！");
            }
            $save['openid'] = I('post.openid');
            $re1            = $db->where($where)->save($save);
            if ($re1) {
                $this->success("绑定成功", U("pageUserCenter", "openid=" . $this->openid));
            } else {
                $this->success("绑定失败");
            }

        } else {
            $this->error("用户验证失败");
        }

    }

    public function seekerCenter()
    {
        $this->checkReg();
        $user = session('user');
        if ($user['headpic'] == NULL) {
            //如果头像为空,则设置一个默认头像路径
        }
        $this->assign("headpic", $user['headpic']);
        $this->display();
    }

    public function pageResume()
    {
        $this->display();
    }

    //反馈
    public function pageFeedBack()
    {
        $this->display();
    }

    public function feedBack()
    {
        $this->checkReg();
        $save['content'] = I('post.content');
        $where['openid'] = $this->openid;
        $re              = M("user_seeker")->where($where)->find();
        if ($re) {
            $save['utype'] = "seeker";
            $save['uid']   = $re['id'];
        }
        $re = M("user_company")->where($where)->find();
        if ($re) {
            $save['utype'] = "company";
            $save['uid']   = $re['id'];

        }

        $save['state'] = 2;
        $save['date']  = date("Y-m-d");
        $save['time']  = date("H:i:s");
        $re            = M("feedback")->add($save);
        if ($re) {
            $this->success("反馈成功");
        } else {
            $this->error("反馈失败");
        }
    }

    //收藏
    public function collect()
    {
        //判断是否登陆
        if (empty(self::$user)) {
            $this->error("请登录后再进行操作", U('Mobile/login'));
        }
        //判断用户类型
        if (self::$user['type'] != "seeker") {
            $this->error("企业或学校不能收藏职位！", '', 2);
        }
        $data['uid']   = self::$user['id'];
        $data['jobid'] = I("get.jobid");
        $re            = M("jobs_collection")->where($data)->find();
        if ($re) {
            $this->error("您已经收藏过该职位！", '', 2);
        }
        $data['createtime'] = date('Y-m-d H:i:s', time());
        $re                 = M("jobs_collection")->add($data);
        if ($re) {
            $this->success("收藏成功");
        } else {
            $this->error("收藏失败");
        }
    }

    //申请职位
    public function sendApply()
    {
        //判断是否登陆
        if (empty(self::$user)) {
            $this->error("请登录后再进行操作！");
        } else {
            if (self::$user['state'] == '2') {
                session('user', NULL);
                $this->error("耐心等待,信息通过审核后可投递岗位", U('Mobile/login'));
            }
        }

        //判断用户类型
        if (self::$user['type'] != "seeker") {
            $this->error("企业或学校不能申请职位！");
        }
        $data['uid']   = self::$user['id'];
        $data['jobid'] = I("get.jobid");
        $re            = M("jobs_apply")->where($data)->find();
        if ($re) {
            $this->error("您已经申请过该职位！");
        }
        $data['companyname'] = I("post.companyname");
        $data['createtime']  = date('Y-m-d H:i:s', time());
        $data['state']       = 2;
        $re                  = M("jobs_apply")->add($data);
        if ($re) {
            //发送短信通知
            sendAplMsgToCop(I('post.companyphone'), I('post.companyname'), I('post.title'), self::$user['realname'],
                            self::$user['phone']);
            $this->success("申请成功");
        } else {
            $this->error("申请失败");
        }
    }

    //显示、修改简历
    public function myResume()
    {  
        $year_arr=array("2009级","2010级","2011级","2012级","2013级","2014级","2015级","2016级");
        $this->assign('year_arr',$year_arr);
        $user = session('user');
        $this->assign('user', $user);
        //查询省份
        $db       = M('province');
        $province = $db->select();
        $this->assign('province', $province);

        $this->display();
    }

    //更新简历
    public function doUpdateResume()
    {
        $user        = session('user');
        $where['id'] = $user['id'];
        $save        = I('post.');
        //查询省名称
        $pid              = $save['province'];
        $pname            = M('province')->where("id=$pid")->getField('name');
        $save['province'] = $pname;

        $db = M('user_seeker');
        $re = $db->where($where)->save($save);
        if ($re) {
            //更新session
            $newuser = M('user_seeker')->where($where)->find();
            session('user', $newuser);
            $this->success('信息修改成功', 'seekerCenter');
        } else {
            $this->error('信息修改失败');
        }

    }

    //申请记录
    public function applyRecord()
    {
        $this->checkReg();

        $id = self::$user['id'];
        $re =
            M()->table("jobs_apply as apply, jobs")
               ->field("apply.id,apply.jobid,jobs.level2, jobs.title, jobs.area, apply.state, jobs.date")
               ->where("apply.uid = $id AND apply.jobid = jobs.id")->order("apply.createtime desc")
               ->page(self::$p, self::$limit)->select();
        $this->assign("applylist", $re);
        $count =
            M()->table("jobs_apply as apply, jobs")->field("jobs.title, jobs.area, jobs.date")
               ->where("apply.uid = $id AND apply.jobid = jobs.id")->count();
        $this->setPage($count);
        $this->display();
    }

    //我的收藏
    public function myCollect()
    {
        $this->checkReg();

        $id = self::$user['id'];
        $re =
            M()->table("jobs_collection as collection, jobs")
               ->field("jobs.id, jobs.title, jobs.area, jobs.date,jobs.price")
               ->where("collection.uid = $id AND collection.jobid = jobs.id")->order("collection.createtime desc")
               ->page(self::$p, self::$limit)->select();
        $this->assign("collectlist", $re);
        $count =
            M()->table("jobs_collection as collection, jobs")->field("jobs.id, jobs.title, jobs.area, jobs.date")
               ->where("collection.uid = $id AND collection.jobid = jobs.id")->count();
        $this->setPage($count);
        $this->display();
    }

    //取消报名
    public function cancelApply()
    {
        $where['id'] = I('post.id');

        $db = M('jobs_apply');
        $re = $db->where($where)->delete();

        if ($re) {
            $this->success("取消报名成功", 'seekerCenter');
        } else {
            $this->error("取消失败", 'reload');
        }
    }

    //申请职位
    public function applyJob()
    {
        $add['jobid'] = I('get.jobid');
        $add['uid']   = self::$user['id'];
        //判断是否登陆
        if (empty(self::$user)) {
            $this->error("请登录后再进行操作！");
        } else {
            if (self::$user['state'] == '2') {
                $this->error("耐心等待,信息通过审核后可投递岗位");
            }
        }

        if (self::$user['type'] != 'seeker') {
            $this->error("企业用户不可申请职位！");
        }

        $re = M("jobs_apply")->where($add)->find();
        if ($re) {
            $this->error("你已经申请过该职位");
        } else {
            $add['companyname'] = I('get.companyname');
            $add['createtime']  = date("Y-m-d H:i:s");
            $add['state']       = 2;
            $re                 = M("jobs_apply")->add($add);
            if ($re) {
                //发送短信
                sendAplMsgToCop(I('get.phone'), I('get.companyname'), I('get.title'), self::$user['realname'],
                                self::$user['phone']);
                $this->success("申请成功");
            } else {

                $this->error("申请失败");
            }
        }

    }

    //上传证件
    public function uploadCredentials()
    {
        $user = session('user');
        if (empty($user['idobverse'])) {
            $credentialpic = __ROOT__ . "/Public/default/images/default-userid.jpg";
        } else {
            $credentialpic = __ROOT__ . '/Uploads/ids/' . $user['idobverse'];

        }
        $this->assign("credentialpic", $credentialpic);
        $this->display();
    }
}

?>