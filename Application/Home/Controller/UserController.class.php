<?php
/*
Geethin Tech!code by NilTor on 2015/03/08
Email:admin@geethin.com
intro:用户中心相关
*/
namespace Home\Controller;

use Think\Controller;

/**
 * Class UserController
 *
 * @package Home\Controller
 */
class UserController extends BaseController
{
    static $user;//当前登录用户session
    static $db;//对应数据库表
    static $p;//分页需要属性
    static $limit;

    /**初始化方法，默认的属性值
     *
     */
    public function _initialize()
    {
        parent::_initialize();
        self::$user = session("user");

        //如果是用户登录
        if (self::$user['type'] == "seeker") {
            self::$db = M('user_seeker');
        } //公司企业登录
        elseif (self::$user['type'] == "company") {
            self::$db = M('user_company');
        } //学校机构登录
        elseif (self::$user['type'] == "school") {
            self::$db = M('user_school');
        }
        //判断账号审核状态
        if(self::$user['state'] != 1){
            if(self::$user['state'] == 2){
                //$this->error("您的信息目前正在审核中，请耐心等待！");
            }
            if(self::$user['state'] == 0){
                $this->error("您的信息未通过审核！");
            }
        }
        self::$p = I('get.p', I('post.p', 1));
        self::$limit = I('get.limit', I('post.limit', 10));
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

    /**默认主页方法
     */
    public function index()
    {
        $this->display();
    }

    /**TODO 用户、企业等登录后
     *
     */
    public function pageMyCenter()
    {
        switch (self::$user['type']) {
            case "company":
                $this->redirect("Home/Company/pageProve");
                break;
            case "school":
                $this->redirect("Home/Company/pageProve");
                break;
            default:
                $where['id'] = self::$user['id'];
                $re = self::$db->where($where)->find();
                $this->assign("user", $re);
                break;
        }
        $this->display();
    }

        //获取学校列表
    public function getSchoolByCity()
    {   
        $id=I('post.city');
        if (!empty($id)) {
            $city=M("city")->where("id=$id")->field("name")->find();
            $db = M('schools');
            $where['city'] = $city['name'];
            $re = $db->where($where)->field("school")->select();
            if ($re) {
                $this->ajaxReturn($re);
            } else {
                $this->ajaxReturn("failed");
            }
        }
    }

    public function pageEditMyCenter() {
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        switch (self::$user['type']) {
            case "company":
                $this->redirect("Home/Company/pageProve");
                break;
            case "school":
                $this->redirect("Home/Company/pageProve");
                break;
            default:
                $where['id'] = self::$user['id'];
                $reg_user=M('user_seeker');
                $re = $reg_user->where($where)->find();
                $map['cname']=$re['city'];
                $countyList=M("county")->where($map)->field('name')->select();
                $this->assign("countyList", $countyList);
                $this->assign("user", $re);
                break;
        }
        $this->display();
    }

    //注册成功之后添加简历
    public function pageAddMyCenter() {
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        switch (self::$user['type']) {
            case "company":
                $this->redirect("Home/Company/pageProve");
                break;
            case "school":
                $this->redirect("Home/Company/pageProve");
                break;
            default:
                $where['id'] = self::$user['id'];
                $reg_user=M('user_seeker');
                $re = $reg_user->where($where)->find();
                $map['cname']=$re['city'];
                $countyList=M("county")->where($map)->field('name')->select();
                $this->assign("countyList", $countyList);
                $this->assign("user", $re);
                break;
        }
        $this->display();
    }

    //更新用户数据
    public function updateUser()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        $type = self::$user['type'];
        $db = M();
        switch ($type) {
            case "seeker":
                $db = M('user_seeker');
                break;
            case "company":
                $db = M('user_company');
                break;
            case "school":
                $db = M('user_school');
                break;
        }
        // 处理区域地址等其他字段
        $params['area'] = $params['province'] . $params['city'] . $params['county'];
        $params['idobverse']=$_SESSION['imgurls']['idobverse'];
        $params['idreverse']=$_SESSION['imgurls']['idreverse']; 
        if(empty($params['area'])) {
            unset($params['area']);
        }
        // 更新
        if ($db->save($params)) {
            $this->success("修改成功");
        } else {
            $this->error("修改失败，未作出修改");
        }
    }

    //用户申请的职位的列表
    public function pageUserApply()
    {
       
        $state=I("get.state",2);
        $id = self::$user['id'];
        $re = M()->table("jobs_apply as apply, jobs")
            ->field("jobs.id,jobs.level1,jobs.view, jobs.title,jobs.price,jobs.area, apply.state, jobs.date")
            ->where("apply.uid = $id AND apply.jobid = jobs.id AND apply.state=$state")
            ->order("apply.createtime desc")
            ->page(self::$p, self::$limit)
            ->select();
        $this->assign("applylist", $re);
        $count = M()->table("jobs_apply as apply, jobs")
            ->field("jobs.title, jobs.area, jobs.date")
            ->where("apply.uid = $id AND apply.jobid = jobs.id")
            ->count();
        $this->setPage($count);
        $this->display();
    }

    //显示收藏的职位信息
    public function pageCollect()
    {
        
        $id = self::$user['id'];
        $re = M()->table("jobs_collection as collection, jobs")
            ->field("jobs.id,jobs.level1,jobs.title, jobs.area, jobs.date")
            ->where("collection.uid = $id AND collection.jobid = jobs.id")
            ->order("collection.createtime desc")
            ->page(self::$p, self::$limit)
            ->select();
        $this->assign("collectlist", $re);
        $count = M()->table("jobs_collection as collection, jobs")
            ->field("jobs.id, jobs.title, jobs.area, jobs.date")
            ->where("collection.uid = $id AND collection.jobid = jobs.id")
            ->count();
        $this->setPage($count);
        $this->display();
    }

    //显示我的简历信息
    public function pageResume()
    {
        $where['id'] = self::$user['id'];
        $re = self::$db->where($where)->find();
        $this->assign("user", $re);

        //TODO 获取其他信息
        $this->display();
    }

    public function viewResume()
    {
        $where['id'] = I('get.id');
        $re =  M('user_seeker')->where($where)->find();
        $this->assign("user", $re);
        //TODO 获取其他信息
        $this->display();
    }

    public function pageMsg()
    {
        self::$db = M('msg');
        $where['recieverid'] = self::$user['id'];
        $where['recievertype'] = self::$user['type'];
        $re = self::$db->where($where)->order("createtime desc")->page(self::$p, self::$limit)->select();
        $this->assign("msglist", $re);
        $count = self::$db->where($where)->count();
        $this->setPage($count);
        $this->display();
    }


    /**删除一条或多条消息
     *
     */
    public function delMsg()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        self::$db = M('msg');
        if (is_array($params)) {
            $where = 'id in(' . implode(',', $params) . ')';
        } else {
            $where = 'id=' . $params;
        }
        $re = self::$db->where($where)->delete();

        if ($re) {
            $this->success("删除成功", U('pageMsg'));
        } else {
            $this->error("删除失败");
        }
    }
    //删除我的申请
    public function delapply(){
        $db = M("jobs_apply");
        $where['jobid'] =I("post.jobid");
        $re = $db->where($where)->delete();
        if ($re) {
            $this->ajaxReturn("删除成功");
        } else {
            $this->ajaxReturn("删除失败");
        }

    }

    //删除我的收藏
    public function delcollect(){
        $db = M("jobs_collection");
        $where['jobid'] =I("post.jobid");
        $re = $db->where($where)->delete();
        if ($re) {
            $this->ajaxReturn("删除成功");
        } else {
            $this->ajaxReturn("删除失败");
        }

    }

    public function pageSafety()
    {
        $where['id'] = self::$user['id'];
        $user = self::$db->where($where)->find();
        $user['phone'] = substr_replace($user['phone'], "****", 3, 4);
        $this->assign("user",$user);
        $this->display();
    }

    //修改密码
    public function updateUserPwd()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        $where['id'] = self::$user['id'];
        $where['password'] = md5($params['oldPwd']);
        $re = self::$db->where($where)->find();
        if($re){
            $data['id'] = self::$user['id'];
            $data['password'] =md5($params['newPwd']);
            $re = self::$db->save($data);
            if($re){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->error("原密码错误");
        }
    }

    //修改手机
    public function updateUserPhone()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        //验证手机号是否被注册
        $phone = $params['phone'];
        $re = self::$db->where("phone = $phone")->find();
        if($re) {
            $this->error("该手机号已注册！");
        }
        unset($phone, $re);

        $where['id'] = self::$user['id'];
        $where['phone'] = $params['oldphone'];
        $re = self::$db->where($where)->find();

        if ($params['chaptcha'] != session("captcha") || $params['phone'] != session('captchaPhone')) {
            $this->error("验证码错误");
        }

        if($re){
            $data['id'] = self::$user['id'];
            $data['phone'] = $params['phone'];
            $re = self::$db->save($data);
            if($re){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->error("原号码错误");
        }
    }
    //修改邮箱
    public function updateUserEmail()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        $where['id'] = self::$user['id'];
        $where['email'] = $params['oldemail'];
        $re = self::$db->where($where)->find();

        if($re){
            $data['id'] = self::$user['id'];
            $data['email'] = $params['newemail'];
            $re = self::$db->save($data);
            if($re){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->error("原邮箱错误");
        }
    }

    //修改证件照
    public function updateUserId()
    {
        $json = $_POST['params'];
        $params = json_decode($json, TRUE);
        $where['id'] = self::$user['id'];
        $where['password'] = $params['oldpwd'];
        $re = self::$db->where($where)->find();

        if($re){
            $data['id'] = self::$user['id'];
            $data['password'] = $params['newpwd'];
            $re = self::$db->save($where);
            if($re){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->error("原密码错误");
        }
    }
        //我的账单
    public function pageBill()
    {

        //TODO 获取其他信息
        $this->display();
    }
    //信用认证
    public function pageAuthentication()
    {
        //TODO 认证信息
        $this->display();
    }

       public function pageContract()
    {
        //TODO 合同
        $this->display();
    }

       public function pageFinishInfo()
    {
        //TODO 完善信息
        $this->display();
    }

       public function pageUploadCertificates()
    {
        //TODO 上传证件
        $this->display();
    }

       public function finishInfo()
    {
        //TODO 验证学籍信息并跳转
        $this->success("保存学籍信息成功",U('pageAuthentication'));
    }
       public function pageMyloan1()
    {
        //TODO 验证学籍信息并跳转
      $this->assign('pageMyloan1',true);
      $this->display();
    }

}