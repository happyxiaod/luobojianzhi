<?php
namespace Api\Controller;
use Think\Controller;

/**
 * Class MsgController
 *
 * @package Api\Controller
 */
class MsgController extends BaseController {
    private $db;

    public function _initialize()
    {
        parent::_initialize();

        $this->db = M('msg');
    }

    //获取我未读的消息
    public function getMyMsgs()
    {
        $must = array ("receiverid");
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

    public function getMsgById()
    {
        $must = array ("id");
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
}
?>