<?php
namespace Weixin\Controller;

use Think\Controller;

/**
 * Class JobsApplyController
 *
 * @package Weixin\Controller
 */
class JobsApplyController extends Controller
{

    private $p;        //分页，当前页数
    private $limit;    //分页，每页个数
    private $user;    //当前操作用户
    private $openid;

    public function _initialize()
    {
        //获取openid
        $openid = session("openid");
        if ($openid == NULL || $openid == "") {
            $this->openid = I('get.openid');
            session("openid", I('get.openid'));
        } else {
            $this->openid = $openid;
        }
        //设置当前用户
        $db = M('user_seeker');
        $where['openid'] = $this->openid;
        $re = $db->where($where)->find();
        if ($re) {
            $this->user = $re;
            $this->user['type'] = "seeker";
        } else {
            $db1 = M('user_company');
            $where['openid'] = $this->openid;
            $re1 = $db1->where($where)->find();
            if ($re1) {
                $this->user = $re1;
                $this->user['type'] = "company";
            } else {
                $this->user = NULL;

            }

        }


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

    /**获取post json数据
     *
     * @return array $params
     */
    public function getParams()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        return $params;
    }

    public function index()
    {
        $this->display("pageJobsApply");
    }

    //企业查看职位申请信息
    public function pageJobsApply()
    {
        $type = "";
        switch ($this->user['type']) {
            case "seeker":
                $type = "contJobsApply";
                $where['apply.uid'] = $this->user['id'];

                $re = M("")->table("jobs_apply as apply,jobs")
                           ->field("apply.createtime,apply.state,apply.companyname,jobs.title,jobs.area,jobs.id")
                           ->where($where)->where("apply.jobid=jobs.id")->select();
                $this->assign("applylist", $re);
                break;
            case "company":
                $type = "contJobsApplyCompany";

                $where['companyname'] = $this->user['companyname'];
                $applylist = M("jobs_apply")->where($where)->field("id,jobid,createtime")->group("jobid")
                                      ->limit(50)->select();
                for ($i = 0; $i < count($applylist); $i++) {
                    //查人数
                    unset($where);
                    $where['jobid'] = $applylist[$i]['jobid'];
                    $applylist[$i]['number'] = M("jobs_apply")->where($where)->count();
                    unset($where);
                    $where['id'] = $applylist[$i]['jobid'];
                    $applylist[$i]['title'] = M('jobs')->where($where)->getField("title");
                    $applylist[$i]['date'] = M('jobs')->where($where)->getField("date");
                }
                $this->assign("applylist", $applylist);
                break;
        }
        $this->assign("contName", $type);
        $this->display();
    }

    //职位申请人信息
    public function pageApplyList()
    {
        $id = I("get.id");
        $list = M()->table("jobs_apply as apply, user_seeker as seeker")
                   ->field("seeker.id, seeker.phone, seeker.realname, seeker.school, apply.id as applyid, apply.state, apply.createtime")
                   ->where("apply.jobid = $id AND apply.uid = seeker.id")->order("createtime desc")
                   ->limit(50)->select();
        $this->assign("list", $list);
        $this->display();
    }

    //企业通过或拒绝用户的兼职申请
    public function acceptApply()
    {
        //TODO 同意之后发送短信或进行提醒
        $where['id'] = I('get.id');
        $save['state']=1;
        $re = M("jobs_apply")->where($where)->save($save);
        if ($re) {
            $this->success("操作成功");
        }
    }

    public function refuseApply()
    {
        $where['id'] = I('get.id');
        $save['state']=0;
        $re = M("jobs_apply")->where($where)->save($save);
        if ($re) {
            $this->success("操作成功");
        }
    }

}

?>