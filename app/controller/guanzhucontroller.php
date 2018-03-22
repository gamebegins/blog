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

class GuanzhuController extends Controller
{
	public $user;
	public $category;
	public $details;
	public $dianzan;
	public $guanzhu;
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		$this->category = new CategoryModel();
		$this->details = new DetailsModel();
		$this->dianzan = new DianzanModel();
		$this->guanzhu = new GuanzhuModel();
		
	}


	public function yonghuguanzhu()
	{
		if ($_GET['SC'] == '收藏') {
			$data['id'] = $_GET['id'];
			$data['username'] = $_SESSION['username'];
			//echo $username;
			$result = $this->guanzhu->shoucangwz($data);
			//var_dump($result);die;
			if ($result) {
				$this->error('收藏成功','http://localhost/my_bk/index.php?m=details&a=details',1);
				//$this->success();
			} else {
				$this->success('收藏失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}else{
			//var_dump($_GET);
			$id = $_GET['id'];
			$username = $_SESSION['username'];
			//echo $username;
			$result = $this->guanzhu->shoucang($id , $username);
			//var_dump($result);die;
			if ($result) {
				$this->error('取消收藏成功','http://localhost/my_bk/index.php?m=details&a=details',1);
				//$this->success();
			} else {
				$this->success('取消收藏失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}
			
	}

	


}