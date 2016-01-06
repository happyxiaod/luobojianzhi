<?php
namespace Weixin\Controller;

use Think\Controller;
use Com\Wechat;

/**
 * Class IndexController
 * 微信消息接口入口
 * 所有发送到微信的消息都会推送到该操作
 * 所以，微信公众平台后台填写的api地址则为该操作的访问地址
 *
 * @package Home\Controller
 */
class IndexController extends Controller
{
    static    $WX;
    static    $token  = 'PaMxiA1FE6n1woPvj6aD';
    protected $appid  = "wx996b17f54b321bee";
    protected $appkey = "aa37cd699d7076a53ea51e14f7491659";

    public function _initialize()
    {
        self::$WX = new Wechat(self::$token);
    }

    public function index()
    {
        //微信后台填写的TOKEN
        /* 加载微信SDK */

        /* 获取请求信息 */
        $data = self::$WX->request();
        if ($data && is_array($data)) {
            /**
             * 你可以在这里分析数据，决定要返回给用户什么样的信息
             * 接受到的信息类型有9种，分别使用下面九个常量标识
             * Wechat::MSG_TYPE_TEXT       //文本消息
             * Wechat::MSG_TYPE_IMAGE      //图片消息
             * Wechat::MSG_TYPE_VOICE      //音频消息
             * Wechat::MSG_TYPE_VIDEO      //视频消息
             * Wechat::MSG_TYPE_MUSIC      //音乐消息
             * Wechat::MSG_TYPE_NEWS       //图文消息（推送过来的应该不存在这种类型，但是可以给用户回复该类型消息）
             * Wechat::MSG_TYPE_LOCATION   //位置消息
             * Wechat::MSG_TYPE_LINK       //连接消息
             * Wechat::MSG_TYPE_EVENT      //事件消息
             *
             * 事件消息又分为下面五种
             * Wechat::MSG_EVENT_SUBSCRIBE          //订阅
             * Wechat::MSG_EVENT_SCAN               //二维码扫描
             * Wechat::MSG_EVENT_LOCATION           //报告位置
             * Wechat::MSG_EVENT_CLICK              //菜单点击
             * Wechat::MSG_EVENT_MASSSENDJOBFINISH  //群发消息成功
             */
            $this->reply($data);

            /**
             * 响应当前请求还有以下方法可以只使用
             * 具体参数格式说明请参考文档
             *
             * $wechat->replyText($text); //回复文本消息
             * $wechat->replyImage($media_id); //回复图片消息
             * $wechat->replyVoice($media_id); //回复音频消息
             * $wechat->replyVideo($media_id, $title, $discription); //回复视频消息
             * $wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id); //回复音乐消息
             * $wechat->replyNews($news, $news1, $news2, $news3); //回复多条图文消息
             * $wechat->replyNewsOnce($title, $discription, $url, $picurl); //回复单条图文消息
             *
             */
        }
    }
    //回复内容
    /**
     * @param $data
     */
    public function reply($data)
    {

        $event   = $data['Event'];
        $msgtype = $data['MsgType'];
        $openid  = $data['FromUserName'];

        $fcontent = "";
        foreach ($data as $key => $value) {
            $fcontent .= "$key:" . "$value;" . "\r\n";

        }
        //消息回复
        switch ($msgtype) {
            case 'text':
                $msg = $data['Content'];
                switch ($msg) {
                    case '1':
                        self::$WX->replyText('分享以下链接http://mp.weixin.qq.com/s?__biz=MzA4OTM1ODc5Nw==&mid=206224570&idx=1&sn=e8007f82220a1b1f55357f6201dcf1ef#rd
至朋友圈，截图发送给萝卜兼职负责人
添加负责人微信号：gaogesnail');
                        break;


                }
                break;
        }

        //事件回复
        switch ($event) {
            case "subscribe":
                self::$WX->replyText("欢迎关注萝卜小助手！");
                break;
            case "VIEW":
                //TODO 只有不常点击的链接缓存openid，其他使用构造回复内容的方式。
                S("openid", $openid, 1);
                break;
            case "CLICK":
                switch ($data['EventKey']) {
                    case "jobs":
                        self::$WX->replyNewsOnce("周边兼职", "萝卜小助手为您推荐，点击查看附近兼职信息！",
                                                 "http://www.luobojianzhi.com/weixin.php/Jobs/pageJobs");
                        break;
                    case "jobsapply":
                        self::$WX->replyNewsOnce("投递状态", "兼职用户查看您申请的职位是否被接受;企业用户查看哪些用户申请了职位。",
                                                 "http://www.luobojianzhi.com/weixin.php/Seeker/applyRecord");
                        break;
                }
                break;
        }
    }

}
