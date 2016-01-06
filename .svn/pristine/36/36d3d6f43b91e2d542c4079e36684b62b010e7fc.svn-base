<?php
namespace Api\Controller;
use Think\Controller;
class SchoolController extends BaseController {
	private $table="School";//数据库表名
	private $Data;	//数据库操作对象
	private $p;		//分页，当前页数
	private $limit;	//分页，每页个数
	private $user;	//当前操作用户

	public function _initialize(){
        parent::_initialize();

        $this->user=session("user");
		$this->Data=A("BaseData/Data",$this->table);
		$this->p = I('get.p', 1);
        $this->limit = I('get.limit', 10);
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
    public function getParams(){
    	$json = $_POST['params'];
        $params = json_decode($json, TRUE);
        return $params;
    }

    public function index(){
        $this->display("pageSchool");
    }

	protected function addSchool(){
		$params=$this->getParams();
		/*需要处理
			$params['']=;
			$params['']=;
			$params['']=;
		*/
        if($this->$Data->addData($params)){
        	$this->success("添加成功");
        }else{
        	$this->error("添加失败");
        }
	}

	protected function saveSchool(){
        $params=$this->getParams();
		/*需要处理
			$params['']=;
			$params['']=;
			$params['']=;
		*/
        if($this->$Data->updateData($params)){
        	$this->success("保存成功");
        }else{
        	$this->error("保存失败");
        }
	}

	protected function delSchool(){
		$params=$this->getParams();
		if($this->$Data->delDataById($params['id'])){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}

	//获取一条数据
	protected function getSchool(){
		$params=$this->getParams();
		$re=$this->$Data->getDataByCon($params);
		if($re){
			$this->success($re);
		}else{
			$this->error("getSchool:failed");
		}
	}

	protected function getSchools(){
		$params=$this->getParams();
		$re=$this->$Data->getDatasByCon($params);
		if($re){
			$this->success($re);
		}else{
			$this->error("getSchool:failed");
		}
	}


    public function pageSchool(){
        $db=M('');
        /*  多表查询示例
        $re=$db->table('')
                ->field('')
                ->where('')
                ->select();*/
        $where['']="";
        $re=$db->where($where)->select();
        if($re){
            $this->assign("",$re);
            /*分页需求
            $count=$db->where($where)->count();
            $this->setPage($count);*/
        }
        $this->display();
    }

	public function fragAddSchool(){
        $params=$this->getParams();

	}
	public function fragSaveSchool(){
        $db=M('');
        /*  多表查询示例
        $re=$db->table('')
                ->field('')
                ->where('')
                ->select();*/
        $where['']=$this->user[''];
        $re=$db->where($where)->select();
        if($re){
            $this->assign("",$re);
            /*分页需求
            $count=$db->where($where)->count();
            $this->setPage($count);*/
        }
        $this->display();
	}

	public function fragSchoolInfo(){
	    $db=M('');

        $where['']=$this->user[''];
        $re=$db->where($where)->select();
        if($re){
            $this->assign("",$re);
            /*分页需求
            $count=$db->where($where)->count();
            $this->setPage($count);*/
        }
        $this->display();
	}

	public function fragListSchool(){
        $db=M('');
        $re=$db->table('')
                ->field('')
                ->where('')
                ->select();
        $where['']=;
        $re=$db->where($where)->select();
        if($re){
            $this->assign("",$re);

            $count=$db->where($where)->count();
            $this->setPage($count);
        }
        $this->display();;
	}
}
?>