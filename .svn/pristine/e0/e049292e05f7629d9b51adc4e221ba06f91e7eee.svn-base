<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/4/1
 * Time: 16:12
 */

namespace Weixin\Controller;

use Think\Controller;
use Com\WechatAuth;

/**
 * Class WXBaseController
 *
 * @package Weixin\Controller
 */
class WXBaseController extends Controller
{
    static    $WX;
    protected $appid  = "wx996b17f54b321bee";
    protected $appkey = "aa37cd699d7076a53ea51e14f7491659";


    public function _initialize()
    {
        $token = S('apptoken');
        self::$WX = new WechatAuth($this->appid, $this->appkey, $token);
        if (!$token) {
            $token = self::$WX->getAccessToken();
            if ($token && is_array($token)) {
                S('apptoken', $token['access_token'], 7200);//2小时过期
            }
        }
    }

    public function index()
    {
        $this->display();

    }

    public function pageReg()
    {
        $this->display();
    }

    public function pageBindWX()
    {
        $this->display();
    }


    public function setMenu()
    {
        $data = array ();
        $topmenu = array ("type" => "view",
                          "name" => "周边兼职",
                          "url"  => "http://www.luobojianzhi.com/weixin.php/Jobs/pageJobs"
        );
        $data[] = $topmenu;
        $secondmenu = array ("type" => "view",
                             "name" => "投递状态",
                             "url"  => "http://www.luobojianzhi.com/weixin.php/Seeker/applyRecord"
        );


        $data[] = $secondmenu;

        $thirdMenu = array ("name"       => "我的",
                            "sub_button" => array (/*array ("type" => "view",
                                                          "name" => "注册绑定",
                                                          "url"  => "http://www.luobojianzhi.com/weixin.php/UserCenter/pageBind"
                                                   ),*/
                                                   array ("type" => "view",
                                                          "name" => "管理中心",
                                                          "url"  => "http://www.luobojianzhi.com/weixin.php/Mobile/myCenter"
                                                   ),
                                                   array ("type" => "view",
                                                          "name" => "意见反馈",
                                                          "url"  => "http://www.luobojianzhi.com/weixin.php/Setting/feedback"
                                                   ),
                            )
        );
        $data[] = $thirdMenu;
        $re = self::$WX->menuCreate($data);
        dump($re);
    }

    //注册
    public function reg()
    {
        $params = I('post.');

    }

    //绑定
    public function bindWX()
    {
        $params = I('post.');
        $where['phone'] = $params['phone'];
        $where['password'] = md5($params['password']);
        if ($params['type'] == "seeker") {
            $db = M('user_seeker');
        } elseif ($params['type'] == "company") {
            $db = M('user_company');
        } else {
            $db = M('user_school');
        }

        $save['openid'] = S('openid');
        $re = $db->where($where)->save($save);
        if ($re) {

        }

    }
}