<?php
namespace Controller;
use Framework\Model;
use Controller\Controller;
use Model\UserModel;
use Model\DianzanModel;

class DianzanController extends Controller
{
	public $user;
	public $dianzan;
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		$this->dianzan = new DianzanModel();
		
	}

	//对文章点赞
	public function dianzan()
	{
		if (empty($_SESSION['username'])) {
			$this->error('请登陆','http://localhost/my_bk/index.php?m=details&a=details',3);
		} else {
			//var_dump($_GET);
			$data['id'] = $_GET['id'];
			$data['uid'] = $_GET['uid'];
			$data['username'] = $_SESSION['username'];
			//var_dump($data);
			$result = $this->dianzan->dianzansql($data);
			if ($result) {
				$this->error('点赞成功','http://localhost/my_bk/index.php?m=details&a=details',1);
				//$this->success();
			} else {
				$this->success('点赞失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}
	}

	//取消点赞
	public function QXdianzan()
	{
		$dzid = $_GET['dzid'];
		//echo $dzid;
		$result = $this->dianzan->QXdianzansql($dzid);
		if ($result) {
			$this->error('取消点赞成功','http://localhost/my_bk/index.php?m=details&a=details',1);
			//$this->success();
		} else {
			$this->success('取消点赞失败','http://localhost/my_bk/index.php?m=details&a=details',3);
			//echo $this->error();
			die;
		}
	}
}