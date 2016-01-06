<?php
namespace Weixin\Controller;

use Think\Controller;

/**
 * Class JobsController
 *
 * @package Weixin\Controller
 */
class JobsController extends Controller
{
    private $Data;    //数据库操作对象
    private $p;        //分页，当前页数
    private $limit;    //分页，每页个数
    private $user;    //当前操作用户
    private $openid;

    public function _initialize()
    {
        $this->p     = I('get.p', 1);
        $this->limit = I('get.limit', 20);
        //获取openid
        $openid = session("openid");
        if ($openid == NULL || $openid == "") {
            $this->openid = I('get.openid');
            session("openid", I('get.openid'));
        } else {
            $this->openid = $openid;
        }
        //设置当前用户
        $db              = M('user_seeker');
        $where['openid'] = $this->openid;
        $re              = $db->where($where)->find();
        if ($re) {
            $this->user = $re;
        } else {
            $this->user = NULL;

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
        $json   = $_POST['params'];
        $params = json_decode($json, TRUE);
        return $params;
    }

    public function index()
    {
        $this->pageTypes();

    }

    protected function addJobs()
    {
        $params = $this->getParams();
        /*需要处理
            $params['']=;
            $params['']=;
            $params['']=;
        */
        if ($this->$Data->addData($params)) {
            echo "添加成功";
        } else {
            $this->error("添加失败");
        }
    }

    protected function saveJobs()
    {
        $params = $this->getParams();
        /*需要处理
            $params['']=;
            $params['']=;
            $params['']=;
        */
        if ($this->$Data->updateData($params)) {
            $this->success("保存成功");
        } else {
            $this->error("保存失败");
        }
    }

    protected function delJobs()
    {
        $params = $this->getParams();
        if ($this->$Data->delDataById($params['id'])) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

    //获取一条数据
    protected function getJobs()
    {
        $params = $this->getParams();
        $re     = $this->$Data->getDataByCon($params);
        if ($re) {
            $this->success($re);
        } else {
            $this->error("getJobs:failed");
        }
    }

    protected function getJobss()
    {
        $params = $this->getParams();
        $re     = $this->$Data->getDatasByCon($params);
        if ($re) {
            $this->success($re);
        } else {
            $this->error("getJobs:failed");
        }
    }


    public function pageTypes()
    {
        $db       = M('job_level1');
        $level1   = $db->select();
        $db       = M('job_level2');
        $level2   = $db->select();
        $typelist = array ();
        foreach ($level2 as $key => $value) {
            $where['level2'] = $value["name"];
            $db1             = M("jobs");
            $number          = $db1->where($where)->count();
            $value['number'] = $number;
            $typelist[]      = $value;
        }

        $this->assign("firsttypes", $level1);
        $this->assign("secondtypes", $typelist);
        $this->display("pageTypes");
    }

    //兼职列表
    public function pageJobs()
    {

        $p     = I('get.p', $this->p);//分页，页数
        $limit = I('get.limit', $this->limit);//个数

        //查询轮播图
        $db = M("config");
        $re = $db->where("type='scroll'")->order("`key`")->find();
        $this->assign("scrollimg", $re['value']);
        $this->assign("scrollLink", $re['else']);

        $this->getLocation();
        //构造查询的条件
        $level2         = I('get.l2', session('level2'));//职业
        $level1         = I('get.l1', session('level1'));//行业
        $area           = I('get.area', session('city'));//城市
        $county         = I('get.county');//县区
        $where['jobs.state'] = array ('neq', 3);

        if ($level1 != 'all') {
            if (!empty($level1)) {
                $where['jobs.level1'] = $level1;
                session('level1', $level1);
            }
            if (!empty($level2)) {
                $where['jobs.level2'] = $level2;
                session('level2', $level2);
            }
        } else {
            session('level1', NULL);
            session('level2', NULL);
        }
        if (!empty($area)) {
            $where['jobs.city'] = $area;
            session('city', $area);
        }
        if (!empty($county)) {
            $where['jobs.county'] = $county;
        }
        $db = M();
        $re =
            $db->table('jobs, user_company as company')
               ->field("jobs.id,jobs.level2,jobs.price,jobs.title,jobs.area,jobs.date,jobs.pricetype,jobs.state")
               ->where("jobs.uid=company.id")->where($where)->order("jobs.date desc,jobs.id desc,jobs.state")
               ->page($p, $limit)->select();

        $count =
            $db->table('jobs, user_company as company')
               ->field("jobs.id,jobs.level2,jobs.price,jobs.title,jobs.area,jobs.date,jobs.pricetype")
               ->where("jobs.uid=company.id")->where($where)->order("jobs.date desc,jobs.title,jobs.state")->count();
        $this->setPage($count);
        $this->assign("joblist", $re);
        $this->display();
    }

    //兼职详情页
    public function pageJobDetail()
    {
       $nowCity = I("get.nowCity");
        if (empty($nowCity)){
            $nowCity = session('nowCity');
            $this->assign('nowCity', $nowCity);
        }else{
            session('nowCity', $nowCity);
            $this->assign('nowCity', $nowCity);
        }
        $jobid=I("get.id");
        $where['id'] = I("get.id");

        $commentsList=M()->table('job_comments,user_seeker')->field('user_seeker.username,user_seeker.headpic,job_comments.content')->where("jobid=$jobid AND job_comments.sid=user_seeker.id")->order('addtime desc')->limit('2')->select();
         $this->assign("commentsList", $commentsList);
        $db = M("Jobs");
        //更新阅读数量
        $db->where($where)->setInc('view');
        $re = $db->order('view desc')->where($where)->find();
        $uid=$re['uid'];
        $company=M('user_company')->find($uid);
        $this->assign('company',$company);
        

        if ($re) {
            $this->assign("job", $re);
        } else {

        }
        $this->display();
    }

    public function fragAddJobs()
    {
        $params = $this->getParams();

    }
          public function jobComment()
    {   
        if(!empty(I("post.message"))){
        $data['jobid'] = I("post.jobid");
        $data['content']=I("post.message");
        $data['companyid']=I("post.companyid");
        $data['sid']=$_SESSION['user']['id'];
        $data['addtime']=time();
        $db = M("job_comments");
        if( $db->add($data)){
            $this->success("发表评论成功");
        }else{
            $this->error("评论失败",U('Home/Index/pageLogin'));
            /*echo "留言失败";*/
        }
        }else{
           $this->error("评论不能为空"); 
        }
    }

    public function fragSaveJobs()
    {
        $db = M('');
        /*  多表查询示例
        $re=$db->table('')
                ->field('')
                ->where('')
                ->select();*/
        $where[''] = $this->user[''];
        $re        = $db->where($where)->select();
        if ($re) {
            $this->assign("", $re);
            /*分页需求
            $count=$db->where($where)->count();
            $this->setPage($count);*/
        }
        $this->display();
    }

    public function fragJobsInfo()
    {
        $db = M('');

        $where[''] = $this->user[''];
        $re        = $db->where($where)->select();
        if ($re) {
            $this->assign("", $re);
            /*分页需求
            $count=$db->where($where)->count();
            $this->setPage($count);*/
        }
        $this->display();
    }

    public function fragListJobs()
    {
        $db        = M('');
        $re        = $db->table('')->field('')->where('')->select();
        $where[''] = "";
        $re        = $db->where($where)->select();
        if ($re) {
            $this->assign("", $re);

            $count = $db->where($where)->count();
            $this->setPage($count);
        }
        $this->display();;
    }


    public function isBind()
    {
        if ($this->user == NULL) {
            $this->error("您还未绑定账号", U("UserCenter/pageBind", "openid=" . $this->openid));
        }
    }

    //定位
    public function getLocation()
    {
        $location = session('city');
        if (empty($location)) {
            $location = taobaoIP(getIPaddress());
            session('city', $location);
        }
    }

    //查询轮播图内容
    public function scrolllist()
    {
        $db = M("config");
        $re = $db->where("type='scroll'")->order("`key`")->select();
        $this->ajaxReturn($re);
    }

}

?>