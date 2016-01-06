<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/7/3
 * Time: 13:58
 */

namespace Weixin\Controller;


use Think\Controller;

class CompanyController extends Controller
{
    private $p;        //分页，当前页数
    private $limit;    //分页，每页个数
    private $user;

    public function _initialize()
    {
        $this->user   = session('user');
        $this->p      = I('get.p', I('post.p', 1));
        $this->$limit = I('get.limit', I('post.limit', 10));

        if (empty($this->user)) {
            $this->error("请先登录", U('Mobile/login'));
        } else {
        }
    }

    public function checkReg()
    {
        if (empty($this->user['companyname'])) {
            $this->error("你需要先补全信息", U('Company/companyInfo'));
        } else {
            if ($this->user['state'] == '2') {
                session('user', NULL);
                $this->error("企业信息审核中，请耐心等待", U('Mobile/login'));

            }
        }
    }

    public function companyCenter()
    {
        $this->checkReg();
        $user = session('user');
        if ($user['headpic'] == NULL) {
            //TODO 如果头像为空，则设置一个默认头像路径
        } else {
            //构造完整路径
        }
        $this->assign("headpic", $user['headpic']);
        $this->display();
    }

    /**设置分页
     *
     * @param $count int 总数
     * @return void assign
     */
    public function setPage($count)
    {
        $page = gtPage($count, $this->limit, $this->p);
        $this->assign("pagelist", $page);
        $this->assign("curtpage", $this->p);
    }


    public function jobState()
    {
        $this->checkReg();
        $company              = session('user');
        $db                   = M('jobs_apply');
        $where['companyname'] = $company['companyname'];

        //$applylist = $db->where($where)->field("id,jobid,createtime")->group("jobid")->select();
        $applylist =
            M()->table('jobs_apply as apply,jobs')->where($where)->where('apply.jobid=jobs.id')
               ->field('jobs.level2,jobs.area,jobs.date,apply.jobid,apply.companyname,apply.createtime')
               ->order('createtime desc')->group('jobid')->page($this->p, $this->limit)->select();
        $count     =
            M()->table('jobs_apply as apply,jobs')->where($where)->where('apply.jobid=jobs.id')
               ->field('jobs.level2,jobs.area,jobs.date,apply.jobid,apply.companyname')->group('jobid')->count();
        for ($i = 0; $i < count($applylist); $i++) {
            //查人数
            unset($where);
            $where['jobid']          = $applylist[$i]['jobid'];
            $applylist[$i]['number'] = $db->where($where)->count();
            unset($where);
            $where['id']            = $applylist[$i]['jobid'];
            $applylist[$i]['title'] = M('jobs')->where($where)->getField("title");
        }
        $this->setPage($count);
        $this->assign("applylist", $applylist);
        $this->display();
    }

    public function postRecord()
    {
        $this->checkReg();
        $company      = session('user');
        $where['uid'] = $company['id'];
        $re           = M('jobs')->where($where)->page($this->p, $this->limit)->order('date desc')->select();
        $count        = M('jobs')->where($where)->count();
        $this->setPage($count);
        $this->assign('list', $re);
        $this->display();
    }

    public function postJob()
    {
        $this->checkReg();
        //获取一级分类
        $level1 = M('job_level1')->order('sort')->select();
        $this->assign("level1", $level1);
        $this->display();
    }

    public function companyInfo()
    {
        $company = session('user');
        $this->assign('company', $company);
        //查询省份
        $db       = M('province');
        $province = $db->select();

        $this->assign('province', $province);
        $this->display();
    }

    //更新企业信息
    public function doUpdateCompanyInfo()
    {
        $company     = session('user');
        $where['id'] = $company['id'];
        $save        = I('post.');
        //查询省名称
        $pid              = $save['province'];
        $pname            = M('province')->where("id=$pid")->getField('name');
        $save['province'] = $pname;

        $db = M('user_company');
        $re = $db->where($where)->save($save);
        if ($re) {
            //更新session
            $newcompany = M('user_company')->where($where)->find();
            session('user', $newcompany);
            $this->success('信息修改成功', 'companyCenter');
        } else {
            $this->error('信息修改失败');
        }
    }

    //发布职位
    public function doPostJob()
    {

        $params = I('post.');
        if (hasNull($params)) {
            $this->error("内容不可为空，请填写完整");
        }
        //是否已经发布相同的职位
        $where['level1'] = $params['level1'];
        $where['level2'] = $params['level2'];
        $where['title']  = $params['title'];
        $user            = session("user");
        $where['name']   = $user['companyname'];
        $re              = M('jobs')->where($where)->find();
        if ($re) {
            $this->error("您已经发布了类似的信息！");
        }
        unset($re);
        //处理区域等相关字段

        $lid                = $params['level1'];
        $level1             = M('job_level1')->where("id=$lid")->getField('name');
        $params['level1']   = $level1;
        $params['city']     = $user['city'];
        $params['province'] = $user['province'];
        $params['county']   = $user['county'];
        $params['area']     = $params['province'] . $params['city'] . $params['county'];
        $params['date']     = date("Y-m-d");
        $params['uid']      = $user['id'];
        $params['name']     = $user['companyname'];
        $db                 = M('jobs');
        $re                 = $db->add($params);
        if ($re) {
            $this->success("发布成功", "reload");
        } else {
            $this->error("发布失败");
        }
    }

    //获取岗位分类
    public function getLevel2()
    {
        $id = I('post.id');
        $re = M('job_level2')->where("fid=$id")->select();
        if ($re) {
            $this->ajaxReturn($re);
        } else {
            $this->error("获取岗位分类失败");
        }
    }


    //删除职位 TODO 改写成下架
    public function doDelJob()
    {
        $id          = I('post.id');
        $where['id'] = $id;
        $re          = M('jobs')->where($where)->delete();
        if ($re) {
            $this->success("删除成功", 'reload');
        } else {
            $this->error('删除失败');
        }
    }

    //编辑职位
    public function editJob()
    {
        $this->checkReg();
        //获取一级分类
        $level1 = M('job_level1')->order('sort')->select();
        $this->assign("level1", $level1);

        $where['id'] = I('get.id');
        $re          = M('jobs')->where($where)->find();
        $this->assign('job', $re);
        $this->display();
    }

    //编辑职位
    public function doUpdateJob()
    {
        $params = I('post.');
        if (hasNull($params)) {
            $this->error("内容不可为空，请填写完整");
        }
        //是否已经发布相同的职位
        $where['level1'] = $params['level1'];
        $where['level2'] = $params['level2'];
        $where['title']  = $params['title'];
        $user            = session("user");
        $where['name']   = $user['companyname'];
        $re              = M('jobs')->where($where)->find();
        if ($re) {
            $this->error("您已经发布了类似的信息！");
        }
        unset($re);
        //处理区域等相关字段

        $lid                = $params['level1'];
        $level1             = M('job_level1')->where("id=$lid")->getField('name');
        $params['level1']   = $level1;
        $params['city']     = $user['city'];
        $params['province'] = $user['province'];
        $params['county']   = $user['county'];
        $params['area']     = $params['province'] . $params['city'] . $params['county'];
        $params['date']     = date("Y-m-d");
        $params['uid']      = $user['id'];
        $params['name']     = $user['companyname'];
        $db                 = M('jobs');
        $re                 = $db->save($params);
        if ($re) {
            $this->success("修改成功", "postRecord");
        } else {
            $this->error("修改失败");
        }
    }


    //职位申请者列表
    public function jobSeeker()
    {
        $this->checkReg();
        $id = I("get.id");
        if ($id != NULL && $id != "" && $id != FALSE) {
            session("jobid", $id);
        } else {
            $id = session("jobid");
        }
        $list =
            M()->table("jobs_apply as apply, user_seeker as seeker")
               ->field("seeker.id, seeker.phone, seeker.realname, seeker.school, apply.id as applyid,apply.state, apply.createtime")
               ->where("apply.jobid = $id AND apply.uid = seeker.id")->order("createtime desc")->select();
        $this->assign("list", $list);
        $this->display();
    }

    public function dealResume()
    {
        $where['id'] = I('get.id');
        $re          = M('user_seeker')->where($where)->find();
        $this->assign('seeker', $re);
        $this->display();
    }


    //通过或不通过申请
    public function agreeApply()
    {
        $params         = I('post.');
        $where['uid']   = $params['uid'];
        $where['jobid'] = session('jobid');
        $save['state']  = $params['state'];
        $re             = M('jobs_apply')->where($where)->save($save);
        if ($re) {
            $this->success("操作成功");
        } else {
            $this->success("你已进行过该操作");
        }
    }

    //关闭职位
    public function closeJob()
    {
        $where['id']   = I('post.id');
        $save['state'] = 3;
        $re            = M('jobs')->where($where)->save($save);
        if ($re) {
            $this->success('关闭成功', 'reload');
        } else {
            $this->failed('关闭失败');
        }
    }

    //上传证件
    public function uploadCredentials()
    {
        $user = session('user');
        $id=$user['id'];
        $c_pic=M('user_company')->field('orgauth,idobverse')->find($id);
        if (empty($c_pic['idobverse'])) {
            $credentialpic = __ROOT__."/Public/default/images/default-companyid.png";

        } else {
            $credentialpic = __ROOT__ . '/Uploads/' . $c_pic['idobverse'];

        }
        if (empty($c_pic['orgauth'])) {
            $orgauth = __ROOT__."/Public/default/images/default-companyid.png";

        } else {
            $orgauth = __ROOT__ . '/Uploads/' . $c_pic['orgauth'];

        }
        $this->assign("credentialpic", $credentialpic);
         $this->assign("orgauth", $orgauth);
        $this->display();
    }
}