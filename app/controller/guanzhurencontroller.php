<?php
namespace Controller;
use Framework\Model;
use Controller\Controller;
use Model\UserModel;
use Framework\Page;
use Model\CategoryModel;
use Model\DetailsModel;
use Framework\Ucpaas;
use Framework\Upload;
use Model\DianzanModel;
use Model\GuanzhuModel;
use Model\GuanzhurenModel;

class GuanzhurenController extends Controller
{
	public $user;
	public $category;
	public $details;
	public $dianzan;
	public $guanzhu;
	public $guanzhuren;
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		$this->category = new CategoryModel();
		$this->details = new DetailsModel();
		$this->dianzan = new DianzanModel();
		$this->guanzhu = new GuanzhuModel();
		$this->guanzhuren = new GuanzhurenModel();
		
	}


	public function yonghuguanzhuren()
	{
		if ($_GET['SC'] == '关注') {
			$data['username'] = $_GET['bgzr'];
			$data['gusername'] = $_SESSION['username'];
			//echo $username;
			// var_dump($data);die;
			$result = $this->guanzhuren->gzcr($data);
			// var_dump($result);die;
			if ($result) {
				$this->error('关注成功','http://localhost/my_bk/index.php?m=details&a=details',1);
				//$this->success();
			} else {
				$this->success('关注失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}else{
			//var_dump($_GET);
			$username = $_GET['bgzr'];
			$gusername = $_SESSION['username'];
			//echo $username;
			$result = $this->guanzhuren->quxiaoGZ($username , $gusername);
			//var_dump($result);die;
			if ($result) {
				$this->error('取消关注成功','http://localhost/my_bk/index.php?m=details&a=details',1);
				//$this->success();
			} else {
				$this->success('取消关注失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}
			
	}

	


}