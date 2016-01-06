<?php
namespace Manage\Controller;
use Think\Controller;
Class FeedbackController extends BaseController {
	public function _initialize()
	{
		$this->assign('currentnav', '意见反馈');
	}
	public function fragFeedbackSeeker() {
		$p = I("get.p", 1);
		$this->assign("curtpage", $p);
		$limit = I("get.limit", 10);
		$db = M();
		$list = $db->table("user_seeker as seeker, feedback")
			->field("seeker.id, seeker.realname, seeker.school, seeker.phone")
			->where("feedback.uid = seeker.id AND feedback.utype = 'seeker'")
			->group("feedback.uid")
			->order("date desc")
			->page($p, $limit)
			->select();
		$this->assign("list", $list);
		$count = $db->table("user_seeker as seeker, feedback")
			->field("seeker.id, seeker.realname, seeker.school, seeker.phone")
			->where("feedback.uid = seeker.id AND feedback.utype = 'seeker'")
			->group("feedback.uid")
			->count();
		$pagelist = gtPage($count, $limit, $p);
		$this->assign("pagelist", $pagelist);
		$this->display();
	}

	public function fragFeedbackCompany() {
		$p = I("get.p", 1);
		$this->assign("curtpage", $p);
		$limit = I("get.limit", 10);
		$db = M();
		$list = $db->table("user_company as company, feedback")
			->field("company.id, company.companyname, company.area, company.phone")
			->where("feedback.uid = company.id AND feedback.utype = 'company'")
			->group("feedback.uid")
			->order("date desc")
			->page($p, $limit)
			->select();
		$this->assign("list", $list);
		$count = $db->table("user_company as company, feedback")
			->field("company.id, company.companyname, company.area, company.phone")
			->where("feedback.uid = company.id AND feedback.utype = 'company'")
			->group("feedback.uid")
			->count();
		$pagelist = gtPage($count, $limit, $p);
		$this->assign("pagelist", $pagelist);
		$this->display();
	}

	public function fragFeedbackSchool() {
		$p = I("get.p", 1);
		$this->assign("curtpage", $p);
		$limit = I("get.limit", 10);
		$db = M();
		$list = $db->table("user_school as school, feedback")
			->field("school.id, school.schoolname, school.area, school.phone")
			->where("feedback.uid = school.id AND feedback.utype = 'school'")
			->group("feedback.uid")
			->order("date desc")
			->page($p, $limit)
			->select();
		$this->assign("list", $list);
		$count = $db->table("user_school as school, feedback")
			->field("school.id, school.schoolname, school.area, school.phone")
			->where("feedback.uid = school.id AND feedback.utype = 'school'")
			->group("feedback.uid")
			->count();
		$pagelist = gtPage($count, $limit, $p);
		$this->assign("pagelist", $pagelist);
		$this->display();
	}

	public function fragFeedbackDialog() {
        $where['uid'] = I('get.uid');

        $data = M('feedback')->where($where)->select();
        $this->assign('feedback', $data);

		$this->display();
	}
}