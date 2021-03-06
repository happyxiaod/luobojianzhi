<?php
namespace Api\Controller;

use Think\Controller;

/**
 * Class UserController
 *
 * @package Api\Controller
 */
class UserController extends BaseController
{
    private $db;

    public function _initialize()
    {
        parent::_initialize();
        $this->db = M("user_seeker");
    }

    public function doLogin()
    {
        $type = $this->params['type'];
        switch ($type) {
            case "seeker":
                $this->db = M('user_seeker');
                break;
            case "company":
                $this->db = M('user_company');
                break;
            case "school":
                $this->db = M('user_school');
                break;
            default:
                $this->failed("type error");
        }
        $where['username']  = $this->params['username'];
        $where['password']  = $this->params['password'];
        $where1['phone']    = $this->params['username'];
        $where1['password'] = $this->params['password'];

        $re  = $this->db->where($where)->find();
        $re1 = $this->db->where($where1)->find();
        if ($re) {
            $this->success($re);
        } else {
            if ($re1) {
                $this->success($re1);

            } else {
                $this->failed("login");
            }
        }
    }

    public function addUser()
    {
        $must = array ("username", "password");
        $no   = array ("id");

        $params = haskey($this->params, $must, $no);
        if ($params == NULL) {
            $re = $this->db->add($this->params);
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        } else {
            $this->failed($params);
        }
    }

    public function doReg()
    {
        $must  = array ("phone", "password");
        $check = haskey($this->params, $must);
        if ($check == NULL) {
            $params  = $this->params;
            $db      = M();
            $captcha = $params['phonecaptcha'];
            //验证码是否正确
            if ($captcha == session('captcha')) {
                //          正确后，跳转
                //session('captcha',null); //清空验证码
                switch ($params['type']) {
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
                //判断用户名及手机是否存在
                $where['phone'] = $params['phone'];
                $re             = $db->where($where)->find();
                if ($re) {
                    $this->error("该用户名或手机号已注册");
                } else {
                    //TODO 其他注册字段
                    unset($params['type']);
                    $params['createtime'] = date("Y-m-d H:i:s");
                    $params['password']   = md5($params['password']);
                    $params['state']      = 2;
                    if ($db->add($params)) {

                        $this->success('注册成功');
                    } else {
                        $this->error($db->getLastSql());
                    }
                }

            } else {
                $this->error("手机验证码错误");
            }
        }

    }


    public function saveUser()
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
        } else {
            $this->failed($params);
        }
    }

    public function delUser()
    {
        $must   = array ("id");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = $this->db->where($this->params)->delete();
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        } else {
            $this->failed($params);
        }
    }

    //获取一条数据
    public function getUser()
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
        } else {
            $this->failed($params);
        }
    }


    public function changePwd()
    {
        $must = array ("id,oldpwd,newpwd");

        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = $this->db->save($this->params);
            if ($re) {
                $this->success(__FUNCTION__ . ":success");
            } else {
                $this->failed(__FUNCTION__);
            }
        } else {
            $this->failed($params);
        }
    }

    public function getUsers()
    {

    }

    /**
     * 我的收藏
     */
    public function getMyCollectJobs()
    {
        $must   = array ("uid");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = M('jobs_collection')->where($this->params)->select();
            if ($re) {
                for ($i = 0; $i < count($re); $i++) {
                    $where['id']       = $re[$i]['jobid'];
                    $jobinfo           = M('jobs')->where($where)->find();
                    $re[$i]['jobinfo'] = $jobinfo;
                }
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    /**
     * 我的简历
     */
    public function getMyResume()
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
        } else {
            $this->failed($params);
        }
    }

    /**
     * 我的申请记录
     */
    public function getMyApplyJobs()
    {
        $must   = array ("uid");
        $params = haskey($this->params, $must);
        if ($params == NULL) {

            $re = M('jobs_apply')->where($this->params)->select();
            if ($re) {
                for ($i = 0; $i < count($re); $i++) {
                    $where['id']       = $re[$i]['jobid'];
                    $jobinfo           = M('jobs')->where($where)->find();
                    $re[$i]['jobinfo'] = $jobinfo;
                }
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    /**
     * 获取验证码
     */
    public function getPhoneCaptcha()
    {
        $phone  = "";
        $must   = array ("phone");
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $phone  = $this->params['phone'];
            $str    = "0123456789";
            $result = "";
            for ($i = 0; $i < 6; $i++) {
                $num[$i] = rand(0, 9);
                $result .= $str[$num[$i]];
            }
            session("captcha", $result);
            //调用第三方接口完成短信的发送
            sendCaptcha($phone, $result);
            $this->success($result);
        } else {

        }
    }

    public function uploadHeadPic()
    {
        $where['id']      = I('post.id');
        $upload           = new \Think\Upload();// 实例化上传类
        $upload->maxSize  = 2097152;
        $upload->exts     = array ('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = './Uploads/';
        $upload->savePath = 'headpic/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->uploadOne($_FILES['headpic']);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $save['headpic'] = __ROOT__ . '/Uploads/' . $info['savepath'] . $info['savename'];
            $re              = M('user_seeker')->where($where)->save($save);
            if ($re) {
                $this->success("success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //反馈内容
    public function feedback()
    {
        $must   = array ('content');
        $params = haskey($this->params, $must);
        if ($params == NULL) {

            $add['date']    = date("Y-m-d");
            $add['time']    = date("H:i:s");
            $add['state']   = 2;
            $add['content'] = $this->params['content'];
            $add['uid']     = $this->params['uid'];
            $add['utype']   = $this->params['utype'];

            $re = M('feedback')->add($add);
            if ($re) {
                $this->success("success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }

    //获取所有城市
    public function getCitys()
    {
        $re = M('city')->select();
        if ($re) {
            $this->success($re);
        } else {
            $this->failed(__FUNCTION__);
        }
    }

    //获取城市的所有学校
    public function getSchoolsByCity()
    {
        $must   = array ('city');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $re = M('schools')->where($this->params)->select();
            if ($re) {
                $this->success($re);
            } else {
                $this->failed(__FUNCTION__);
            }
        } else {
            $this->failed(__FUNCTION__);
        }
    }

    //判断手机号是否存在
    public function phoneExist()
    {
        $must=array('phone');
        $params = haskey($this->params, $must);
        if ($params == NULL) {
            $where['phone'] = $this->params['phone'];
            $resault = array ();
            $re             = M("user_seeker")->where($where)->find();
            if ($re) {
                $resault['type'] = "seeker";
                $resault['id']   = $re['id'];

            } else {
                $re1 = M("user_company")->where($where)->find();
                if ($re1) {
                    $resault['type'] = "company";
                    $resault['id']   = $re1['id'];


                } else {
                    $this->error("该手机号不存在");
                }
            }
            $this->success($resault);
        } else {
            $this->failed(__FUNCTION__);
        }
    }
    //设置新密码
    public function setPassword()
    {
        $type = $this->params['type'];
        $db   = M();
        switch ($type) {
            case "seeker":
                $db = M("user_seeker");
                break;
            case "company":
                $db = M("user_company");
                break;
        }

        $id = $this->params['id'];
        if ($id != NULL && $id != "") {
            $where['id']      = $id;
            $save['password'] = md5($this->params['password']);
            $re               = $db->where($where)->save($save);
            if ($re) {
                $this->success("success");
            } else {
                $this->failed(__FUNCTION__);
            }
        }
    }
}

?>
