<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/3/14
 * Time: 17:22
 */

namespace Api\Controller;


/**
 * Class IndexController
 *
 * @package Api\Controller
 */
class IndexController extends BaseController{

    private $db;

    public function _initialize()
    {
        parent::_initialize();
        $this->db = M('config');
    }

    //获取轮播图
    public function getCarousels()
    {
        $must = array ("type");
        $params = haskey($this->params, $must);
        $where['type']="scrool";
        if ($params == NULL) {
            $re = $this->db->where($this->params)->order('`key`')->field("key,value,type")->select();
            if ($re) {
                $this->success($re);
            }else{
                $this->failed(__FUNCTION__);
            }
        }
    }

    //获取区县
    public function getCountys()
    {
        $must = array ("cid");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $where['cid'] = $this->params['cid'];
            $data = M('county')->where($where)->select();
            if ($data) {
                $this->success($data);
            }else{
                $this->failed(__FUNCTION__);
            }
        }

    }

    //获取职位，city
    public function getJobByCity()
    {
        $must = array ("city");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $where['city'] = $this->params['city'];
            $p = $this->params['p'];
            $limit = $this->params['limit'];
            if (empty($p)) {
                $p=1;
            }
            if (empty($limit)) {
                $limit=12;
            }
            $data = M('jobs')->where($where)->order('date desc')->page($p,$limit)->select();
            if ($data) {
                $this->success($data);
            }else{
                $this->failed(__FUNCTION__);
            }
        }

    }

    //获取职位，county & level2
    public function getJobByCounty()
    {
        $must = array ('county','level2');
        $params = haskey($this->params, $must);
        if ($params == NULL) {


            $where['county'] = $this->params['county'];
            $where['level2'] = $this->params['level2'];

            $data = M('jobs')->where($where)->select();
            if ($data) {
                $this->success($data);
            }else{
                $this->failed(__FUNCTION__);
            }
        }
    }

}
