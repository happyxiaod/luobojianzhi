<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/3/23
 * Time: 10:34
 */

namespace Manage\Controller;


/**
 * Class SettingController
 *
 * @package Manage\Controller
 */
class SettingController extends BaseController
{
    protected $params;

    public function _initialize()
    {
        parent::_initialize();
        $json = $_POST['params'];
        $this->params = json_decode($json, TRUE);

        $this->assign('currentnav', '网站设置');

    }

    public function pageJobType()
    {
        $db = M('');
        $re = $db->table('job_level1 as l1,job_level2 as l2')->field("l1.name as l1,l2.fid,l2.id,l2.name")
            ->where("l1.id=l2.fid")->order("l2.fid")->select();
        $this->assign("levellist", $re);
        $this->display();

    }


    public function pageAddSchool()
    {
        //获取省份
        $db = M("province");
        $list = $db->select();
        $this->assign("provinceList", $list);

        $db = M('schools');
        $p = I("get.p", 1);
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->page($p, $limit)->select();
        $this->assign("schoollist", $list);
        $count = $db->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }
    //添加学校
    public function addSchool()
    {
        $db = M('schools');
        $where['city'] = $this->params['city'];
        $where['school'] = $this->params['school'];
        $where['province'] = $this->params['province'];
        $re = $db->where($where)->find();
        if($re) {
            $this->error("该学校已经存在");
        }
        $re = $db->add($this->params);
        if ($re) {
            $this->success("添加成功","reload");
        }else{
            $this->error("添加失败");
        }
    }
    //删除学校
    public function delSchool()
    {
        $where['id']=$this->params;
        $db = M('schools');
        $re = $db->where($where)->delete();
        if ($re) {
            $this->success("删除成功", "reload");
        } else {
            $this->error("删除失败");
        }
    }



    public function fragAddLevel1()
    {
        $this->display();
    }

    public function fragAddLevel2()
    {

        $db = M('job_level1');
        $re = $db->select();
        if ($re) {
            $this->assign("level1list", $re);
        }

        $this->display();

    }

    public function addLevel1()
    {
        $db = M('job_level1');

        $where['name'] = $this->params['name'];
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该分类已存在，无需重复添加");
        }
        $re = $db->add($this->params);
        if ($re) {
            $this->success("添加成功");

        } else {
            $this->error("添加失败");
        }
    }

    public function addLevel2()
    {
        $db = M('job_level2');
        $where['name'] = $this->params['name'];
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该分类已存在，无需重复添加");
        }
        $re = $db->add($this->params);
        if ($re) {
            $this->success("添加成功");

        } else {
            $this->error("添加失败");
        }
    }


    public function delLevel2()
    {
        $db = M('job_level2');
        $where['id'] = I("post.params");
        $re = $db->where($where)->delete();
        if ($re) {
            $this->success("删除成功", "reload");
        } else {

            $this->error("删除失败");
        }
    }

    public function pageScroll() {
        $db = M("config");
        $re = $db->where("type='scroll'")->order("`key`")->select();
        $this->assign("scrolllist", $re);
        $this->display();
    }

    //通过id删除轮播图
    public function delScroll() {
        $where['id'] = I("post.id");
        $db = M("config");
        $re = $db->where($where)->delete();
        if($re) {
            $this->ajaxReturn("删除成功!");
        }else {
            $this->ajaxReturn("删除失败!");
        }
    }

    //添加轮播图
    public function addScroll()
    {
        $upload = new \Think\Upload();
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->maxSize = 2*1024*1024;
        $upload->rootPath = "./Uploads/";
        $upload->savePath = "scroll/";


        $upload->autoSub = false;
        $info = $upload->uploadOne($_FILES['img']);
        if(!$info) {
            $this->error($upload->getError());
        }

        $data['value'] = $info['savepath'].$info['savename'];
        $data['key'] = I("post.order");
        $data['else'] = I("post.link");

        $data['type'] = "scroll";
        $db = M("config");
        if($db->add($data)) {
            $this->success("添加成功!");
        }else{
            $this->error("缩略图添加失败！");

        }
    }

    public function pageRegionAdd() {
        //获取省份
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);
        $this->display();
    }

    public function fragCityList() {
        $db = M('city');
        $where = I("post.");
        $re = $db->where($where)->select();
        $this->assign("cityList", $re);
        $this->display();
    }

    public function fragCityList1() {
        $db = M('city');
        $where = I("post.");
        $re = $db->where($where)->select();
        $this->assign("cityList", $re);
        $this->display();
    }

    public function fragCityList2() {
        $db = M('city');
        $where = I("post.");
        $re = $db->where($where)->select();
        $this->assign("cityList", $re);
        $this->display();
    }

    public function pageRegionProvince() {
        //筛选
        $db = M("province");
        $p = I("get.p", 1);
        $keyword = I('get.keyword');
        $where = array ();
        if (!empty($keyword)) {
            $where['name|spell'] = array ('LIKE', "%" .  $keyword . "%");
        }
        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = $db->where($where)->page($p, $limit)->select();
        $this->assign("provinceList", $list);
        $count = $db->where($where)->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function pageRegionCity() {
        //获取省份
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        //筛选
        $db = M("city");
        $p = I("get.p", 1);
        $keyword = I('get.keyword');
        $pid = I('get.pid');
        $where = array ();
        if (!empty($keyword)) {
            $where['city.name|city.spell'] = array ('LIKE', "%" .  $keyword . "%");
        }
        if(!empty($pid)) {
            $where['city.pid'] = $pid;
        }

        $often = I("get.often");
        if(!empty($often)) {
            $where['city.often'] = $often;
        }

        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = M()->table("city, province")
            ->field("city.name, city.id, city.often, province.name as pname")
            ->where("city.pid = province.id")
            ->where($where)
            ->page($p, $limit)
            ->select();

        $this->assign("cityList", $list);
        $count = $db->where($where)->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    public function pageRegionCounty() {
        //获取省份
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        //筛选
        $db = M("county");
        $p = I("get.p", 1);
        $keyword = I('get.keyword');
        $pid = I('get.pid');
        $cid = I('get.cid');
        $where = array ();
        if (!empty($keyword)) {
            $where['county.name|county.spell'] = array ('LIKE', "%" .  $keyword . "%");
        }
        if(!empty($pid)) {
            $where['county.pid'] = $pid;
        }
        if(!empty($cid)) {
            $where['county.cid'] = $cid;
        }

        $this->assign("curtpage", $p);
        $limit = I("get.limit", 10);
        $list = M()->table("county, city, province")
            ->field("county.name, county.id, province.name as pname, city.name as cname")
            ->where("county.pid = province.id AND county.cid = city.id")
            ->where($where)
            ->page($p, $limit)
            ->select();
        $this->assign("countyList", $list);
        $count = $db->where($where)->count();
        $pagelist = gtPage($count, $limit, $p);
        $this->assign("pagelist", $pagelist);
        $this->display();
    }

    //添加省
    public function addProvince() {
        $db = M("province");
        $where['name'] = $this->params['name'];
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该省份已存在，无需重复添加");
        }
        $re = $db->add($this->params);
        if ($re) {
            $this->success("添加成功", "reload");

        } else {
            $this->error("添加失败");
        }
    }

    //添加市
    public function addCity() {
        $db = M("city");
        $where['name'] = $this->params['name'];
        $where['pid'] = $this->params['pid'];
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该市已存在，无需重复添加");
        }
        $re = $db->add($this->params);
        if ($re) {
            //同时更新json文件，供移动端调用
            $cityInfo=array();
            $topcitys = M('city')->field('id,pid,name as city,spell as pinyin')->where('often=1')->select();
            $citys = M('city')->field('id,pid,name as city,spell as pinyin')->select();
            $cityInfo['topCitys']=$topcitys;
            $cityInfo['citys']=$citys;
            $data = json_encode($cityInfo);
            $re1=file_put_contents(APP_PATH.'../Uploads/json/citylist.json',$data);
            if ($re1) {
                $this->success("添加成功");
            }else{
                $this->error("城市列表json数据更新失败");
            }

        } else {
            $this->error("添加失败");
        }
    }

    //添加区（县）
    public function addCounty() {
        $db = M("county");
        $where['name'] = $this->params['name'];
        $where['cid'] = $this->params['cid'];
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该区（县）已存在，无需重复添加");
        }
        $re = $db->add($this->params);
        if ($re) {
            $this->success("添加成功");

        } else {
            $this->error("添加失败");
        }
    }

    //设置为常用城市
    public function setOftenCity() {
        $db = M("city");
        $where['id'] = I("post.id");
        $re = $db->where($where)->setField("often", 1);
        if($re) {
            $this->ajaxReturn("设置成功");
        }else {
            $this->ajaxReturn("设置失败");
        }
    }

    //取消常用城市
    public function cancelOftenCity() {
        $db = M("city");
        $where['id'] = I("post.id");
        $re = $db->where($where)->setField("often", 0);
        if($re) {
            $this->ajaxReturn("取消成功");
        }else {
            $this->ajaxReturn("取消失败");
        }
    }

    //删除省
    public function delProvince() {
        $id = I("post.id");
        $db = M('city');
        $re = $db->where("pid=$id")->find();
        if($re) {
            $this->ajaxReturn("该省下还有市未被删除");
        } else {
            $db = M('province');
            $re = $db->where("id=$id")->delete();
            if($re) {
                $this->ajaxReturn("删除成功");
            }else{
                $this->ajaxReturn("删除失败");
            }
        }
    }

    //删除市
    public function delCity() {
        $id = I("post.id");
        $db = M('county');
        $re = $db->where("cid=$id")->find();
        if($re) {
            $this->ajaxReturn("该市下还有区（县）未被删除");
        } else {
            $db = M('city');
            $re = $db->where("id=$id")->delete();
            if($re) {
                $this->ajaxReturn("删除成功");
            }else{
                $this->ajaxReturn("删除失败");
            }
        }
    }

    //删除区（县）
    public function delCounty() {
        $db = M("county");
        $where['id'] = I("post.id");
        $re = $db->where($where)->delete();
        if($re) {
            $this->ajaxReturn("删除成功");
        }else{
            $this->ajaxReturn("删除失败");
        }
    }

    public function pageSaveProvince() {
        $db = M('province');
        $where['id'] = I("get.id");
        $re = $db->where($where)->find();
        $this->assign("provinceInfo", $re);
        $this->display();
    }

    public function pageSaveCity() {
        //获取省份
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        $db = M('city');
        $where['id'] = I("get.id");
        $re = $db->where($where)->find();
        $this->assign("cityInfo", $re);
        $this->display();
    }

    public function pageSaveCounty() {
        //获取省份
        $db = M("province");
        $re = $db->select();
        $this->assign("provinceList", $re);

        //获取区县
        $db = M('county');
        $where['id'] = I("get.id");
        $re = $db->where($where)->find();
        $this->assign("countyInfo", $re);

        //获取市
        $db = M("city");
        unset($where);
        $where['pid'] = $re['pid'];
        $re = $db->where($where)->select();
        $this->assign("cityList", $re);
        $this->display();
    }

    //修改省
    public function saveProvince() {
        $db = M("province");
        $where['name'] = $this->params['name'];
        $where['id'] = array('NEQ',$this->params['id']);
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该省份已存在");
        }
        $re = $db->save($this->params);
        if ($re) {
            $this->success("修改成功");

        } else {
            $this->error("修改失败！未作出任何修改");
        }
    }

    //修改市
    public function saveCity() {
        $db = M("city");
        $where['name'] = $this->params['name'];
        $where['pid'] = $this->params['pid'];
        $where['id'] = array('NEQ',$this->params['id']);
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该市已存在");
        }
        $re = $db->save($this->params);
        if ($re) {
            $this->success("修改成功");

        } else {
            $this->error("修改失败！未作出任何修改");
        }
    }

    //修改区（县）
    public function saveCounty() {
        $db = M("county");
        $where['name'] = $this->params['name'];
        $where['cid'] = $this->params['cid'];
        $where['id'] = array('NEQ',$this->params['id']);
        $re = $db->where($where)->find();
        if ($re) {
            $this->error("该区（县）已存在");
        }
        $re = $db->save($this->params);
        if ($re) {
            $this->success("修改成功");

        } else {
            $this->error("添加失败！未作出任何修改");
        }
    }
}