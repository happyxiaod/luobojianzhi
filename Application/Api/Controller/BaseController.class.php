<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/3/14
 * Time: 16:07
 */
namespace Api\Controller;

use Think\Controller;


/**
 * Class BaseController
 *
 * @package Api\Controller
 */
class BaseController extends Controller
{
    protected $token;
    protected $params;
    const TOKEN = "luobo";

    protected $re = array ("state" => "", "info" => "",);//返回集

    public function _initialize()
    {
        //$this->token = I('get.token', "");
        $this->token = I('post.token', "");
        if ($this->token != self::TOKEN) {
            $this->failed("token error");
        }

        $params = $_POST['params'];
        //$params = $_GET['params'];
        $this->params = json_decode($params, TRUE);
/*        if ($this->params == "" || empty($this->params)) {
            $this->failed("empty params");
        }*/
    }

    public function success($info)
    {
        $this->re['state'] = "1";
        $this->re['info'] = $info;
        $this->ajaxReturn($this->re);
    }

    public function failed($info)
    {
        $this->re['state'] = "0";
        $this->re['info'] = $info." failed";
        $this->ajaxReturn($this->re);
    }

}