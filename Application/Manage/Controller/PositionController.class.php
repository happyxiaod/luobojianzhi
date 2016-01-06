<?php
namespace Manage\Controller;
use Think\Controller;
class PositionController extends BaseController {
    public function _initialize()
    {
        $this->assign('currentnav', '职位信息');
    }
    public function index(){
        $this->display();
    }

    public function fragSeekerDeliverList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_seeker as seeker, jobs_apply as apply")
            ->field("seeker.id, seeker.realname, seeker.school, seeker.phone")
            ->where("seeker.id = apply.uid")
            ->group("apply.uid")
            ->order("apply.createtime desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_seeker as seeker, jobs_apply as apply")
            ->where("seeker.id = apply.uid")
            ->field("count(distinct apply.uid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSeekerSucceedList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_seeker as seeker, jobs_apply as apply")
            ->field("seeker.id, seeker.realname, seeker.school, seeker.phone")
            ->where("seeker.id = apply.uid AND apply.state = 1")
            ->group("apply.uid")
            ->order("apply.createtime desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_seeker as seeker, jobs_apply as apply")
            ->where("seeker.id = apply.uid AND apply.state = 1")
            ->field("count(distinct apply.uid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragCompanyPublishList() {
        $p = I("get.p", 1);
        $search=I("get.keyword");
        if (!empty($search)) {
            $map['company.companyname|company.phone']=array ('LIKE',"%".$search."%");
        }
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_company as company, jobs")
            ->field("company.id, company.companyname, company.area, company.phone")
            ->where("company.id = jobs.uid AND company.companyname = jobs.name")->where($map)
            ->group("company.id")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_company as company, jobs")
            ->where("company.id = jobs.uid AND company.companyname = jobs.name")
            ->field("count(distinct company.id) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragCompanyRecruitList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_company as company, jobs, jobs_apply as apply")
            ->field("company.id, company.companyname, company.area, company.phone")
            ->where("company.id = jobs.uid AND company.companyname = jobs.name AND apply.jobid = jobs.id AND apply.state = 1")
            ->group("apply.jobid")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_company as company, jobs, jobs_apply as apply")
            ->where("company.id = jobs.uid AND company.companyname = jobs.name AND apply.jobid = jobs.id AND apply.state = 1")
            ->field("count(distinct apply.jobid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

     public function fragCompanyReportList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_company as company, job_complaints")
            ->field("company.id, company.companyname, company.area, company.phone")
            ->where("company.id = job_complaints.companyid")
            ->group("job_complaints.jobid")
            ->order("job_complaints.reporttime desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_company as company, job_complaints")
            ->where("company.id = job_complaints.companyid")
            ->field("count(distinct job_complaints.jobid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSchoolPublishList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_school as school, jobs")
            ->field("school.id, school.schoolname, school.area, school.phone")
            ->where("school.id = jobs.uid AND school.schoolname = jobs.name")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_school as school, jobs")
            ->where("school.id = jobs.uid AND school.schoolname = jobs.name")
            ->field("count(distinct school.id) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSchoolRecruitList() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $list = $db->table("user_school as school, jobs, jobs_apply as apply")
            ->field("school.id, school.schoolname, school.area, school.phone")
            ->where("school.id = jobs.uid AND school.schoolname = jobs.name AND apply.jobid = jobs.id AND apply.state = 1")
            ->group("apply.jobid")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("user_school as school, jobs, jobs_apply as apply")
            ->where("school.id = jobs.uid AND school.schoolname = jobs.name AND apply.jobid = jobs.id AND apply.state = 1")
            ->field("count(distinct apply.jobid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSeekerDeliver() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $id = I("post.id");
        $list = $db->table("jobs_apply as apply, jobs")
            ->field("jobs.name, jobs.level2, apply.createtime")
            ->where("jobs.id = apply.jobid AND apply.uid = $id")
            ->order("apply.createtime desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("jobs_apply as apply, jobs")
            ->where("jobs.id = apply.jobid AND apply.uid = $id")
            ->field("count(distinct jobs.id) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSeekerSucceed() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $id = I("post.id");
        $list = $db->table("jobs_apply as apply, jobs")
            ->field("jobs.name, jobs.level2, jobs.date")
            ->where("jobs.id = apply.jobid AND apply.state = 1 AND apply.uid = $id")
            ->order("apply.createtime desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("jobs_apply as apply, jobs")
            ->field("jobs.name, jobs.level2, jobs.date")
            ->where("jobs.id = apply.jobid AND apply.state = 1 AND apply.uid = $id")
            ->count();
        $count = $db->table("jobs_apply as apply, jobs")
            ->where("jobs.id = apply.jobid AND apply.state = 1 AND apply.uid = $id")
            ->field("count(distinct jobs.id) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragCompanyPublish() {
        $where['uid'] = I("post.id");
        $where['name'] = I("post.name");
        $db = M("jobs");
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->where($where)->order("date desc")->page($p, $limit)->select();
        $this->assign("list", $list);
        $count = $db->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragCompanyReport() {
        $where['companyid'] = I("post.id");
        $db = M("job_complaints");
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->where($where)->order("date reporttime")->page($p, $limit)->select();
        $list = $db->select();
        //var_dump($list);exit();
        $this->assign("list", $list);
        $count = $db->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragCompanyRecruit() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $uid = I("post.id");
        $name = I("post.name");
        $list = $db->table("jobs_apply as apply, jobs")
            ->field("jobs.level2, jobs.date, jobs.price, jobs.number")
            ->where("jobs.uid = $uid AND jobs.name = '$name' AND jobs.id = apply.jobid AND apply.state = 1")
            ->group("apply.jobid")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("jobs_apply as apply, jobs")
            ->where("jobs.uid = $uid AND jobs.name = '$name' AND jobs.id = apply.jobid AND apply.state = 1")
            ->field("count(distinct apply.jobid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSchoolPublish() {
        $where['uid'] = I("post.id");
        $where['name'] = I("post.name");
        $db = M("jobs");
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->where($where)->order("date desc")->page($p, $limit)->select();
        $this->assign("list", $list);
        $count = $db->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function fragSchoolRecruit() {
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $db = M();
        $uid = I("post.id");
        $name = I("post.name");
        $list = $db->table("jobs_apply as apply, jobs")
            ->field("jobs.level2, jobs.date, jobs.price, jobs.number")
            ->where("jobs.uid = $uid AND jobs.name = '$name' AND jobs.id = apply.jobid AND apply.state = 1")
            ->group("apply.jobid")
            ->order("jobs.date desc")
            ->page($p, $limit)
            ->select();
        $this->assign("list", $list);
        $count = $db->table("jobs_apply as apply, jobs")
            ->where("jobs.uid = $uid AND jobs.name = '$name' AND jobs.id = apply.jobid AND apply.state = 1")
            ->field("count(distinct apply.jobid) as count")
            ->find();
        $count = $count['count'];
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

   
}