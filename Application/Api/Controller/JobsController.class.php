<?php
namespace Api\Controller;

use Think\Controller;

class JobsController extends BaseController
{

    private $db;    //当前操作用户

    public function _initialize()
    {
        parent::_initialize();
        $this->db = M('jobs');
    }

    public function index()
    {

    }
    
  
    public function addJob()
    {
        $must   = array ("title", "uid", "level2", "name", "contacter", "phone");
        $no     = array ("id");
        $params = haskey($this->params, $must, $no);
        if ($params == NULL) {
            $re = $this->db->add($this->params);
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    public function saveJob()
    {
        $must   = array ("id");
        $no     = array ("uid");
        $params = haskey($this->params, $must, $no);
        if ($params == NULL) {
            $re = $this->db->save($this->params);
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    public function delJob()
    {
        $must   = array ("id");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = $this->db->save($this->params);
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //获取一条数据
    public function getJobById()
    {
        $must   = array ("id");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = $this->db->where($this->params)->find();
            if ($re) {
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //获取兼职分类列表10条
    public function getJobTypeList()
    {
        $this->db = M('job_level1');
        $re       = $this->db->order('sort,id')->limit(10)->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }

    }

    //获取全部兼职分类信息
    public function getAllJobTypeList()
    {
        $this->db = M('job_level1');
        $re       = $this->db->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }
    }

    //获取全部兼职二级分类信息
    public function getSecondType()
    {
        $must   = array ("fid");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $this->db = M('job_level2');
            $re       = $this->db->where($this->params)->select();
            if ($re) {
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        }

    }

    //根据参数条件获取兼职信息
    public function searchJobs()
    {
        $keyword                                      = $this->params['keyword'];
        $city                                         = $this->params['city'];
        $where['city']                                = $city;
        $where['title|name|address|contacter|level2'] = array ('like', array ('%' . $keyword . '%'));
        //TODO 构造查询条件
        $re = $this->db->where($where)->order('date desc')->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }
    }

    //根据字段查询兼职信息
    public function getJobsByField()
    {
        $params = $this->params;
        $re     = $this->db->where($params)->order("date desc")->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }
    }

    //热门职位
    public function getHotJobs()
    {
        $limit = isset($this->params['limit']) ? $this->params['limit'] : 12;
        $limit = $limit <= 0 ? 1 : $limit;
        $limit = $limit >= 50 ? 50 : $limit;
        $re    = $this->db->limit($limit)->order('view desc')->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }

    }

    //获取当前用户发布的兼职信息
    public function getJobsByOwner()
    {
        $must   = array ("uid");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = $this->db->where($this->params)->select();
            if ($re) {
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //根据类型获取兼职信息
    public function getJobsByType()
    {
        /*$must = array ("level2");
        $params = haskey($this->params, $must);*/

        $re = $this->db->where($this->params)->order('date desc')->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }

    }

    public function getJobs()
    {
        $limit = isset($this->params['limit']) ? $this->params['limit'] : 12;
        $p     = isset($this->params['p']) ? $this->params['p'] : 1;
        $limit = $limit <= 0 ? 1 : $limit;

        $re = $this->db->page($p, $limit)->order('date desc')->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }
    }


    //申请职位
    public function applyJob()
    {
        $must   = array ('uid', 'jobid');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            //先判断是否已经申请过
            $data = M('jobs_apply')->where($this->params)->find();
            if ($data) {
                $this->failed("applied");
            }
            //查询职位和用户相关信息
            $jobid = $this->params['jobid'];
            $uid   = $this->params['uid'];
            $job   = M('jobs')->where("id=$jobid")->find();
            $user  = M('user_seeker')->where("id=$uid")->find();


            $add['uid']         = $this->params['uid'];
            $add['jobid']       = $this->params['jobid'];
            $add['companyname'] = $job['name'];
            $add['createtime']  = date('Y-m-d H:i:s');
            $add['state']       = 2;

            $re = M('jobs_apply')->add($add);
            if ($re) {
                //发送短信
                sendAplMsgToCop($job['phone'], $job['name'], $job['title'], $user['realname'], $user['phone']);
                $this->success('apply success');
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //收藏职位
    public function collectJob()
    {
        $must   = array ('uid', 'jobid');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            //先判断是否已经申请过
            $data = M('jobs_collection')->where($this->params)->find();
            if ($data) {
                $this->failed("collected");
            }
            $params            = $this->params;
            $add['uid']        = $params['uid'];
            $add['jobid']      = $params['jobid'];
            $add['createtime'] = date('Y-m-d H:i:s');
            $re                = M('jobs_collection')->add($add);
            if ($re) {
                $this->success('collected success');
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //取消申请
    public function delApply()
    {
        $must   = array ('id');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = M('jobs_apply')->where($this->params)->delete();
            if ($re) {
                $this->success("success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //取消收藏
    public function delCollect()
    {
        $must   = array ('id');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = M('jobs_collection')->where($this->params)->delete();
            if ($re) {
                $this->success("success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    public function pageTailor()
    {
        echo "量身定制页";
    }

    public function pageLoan()
    {
        echo "借贷页";
    }
    public function pagePractice()
    {
        echo "实习";
    }

    public function pageServe()
    {
        echo "服务";
    }

}

?>
