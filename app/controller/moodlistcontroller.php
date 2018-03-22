<?php
namespace Controller;
use Controller\Controller;
use Model\MessageModel;
use Model\UserModel;
use Model\MoodlistModel;
use Framework\Page;
use Framework\Verify;
use Framework\Ucpaas;
use Framework\Upload;
class MoodlistController extends Controller
{
	public $user;
	public $moodlist;

	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		$this->moodlist = new MoodlistModel();
		
	}


	public function Moodlist()
	{
		if (!empty($_SESSION['username'])) {
			//查询个人信息
			$data['username'] = $_SESSION['username'];
			$data1 = $this->user->doFind1($data);
			//var_dump($result);die;
			$this->assign('data1' , $data1);

			

		}

		//分页是所有文章总数
		$count = $this->moodlist->ChaSs1();
		$total = $count[0]['count'];
		//var_dump($total);
		$num = 18;
		$page = new Page($total , $num);
		$url = $page->rander();
		//每页显示数
		$this->assign('num' , $num);
		//总数
		$this->assign('total' , $total);
		//分页
		$this->assign('url' , $url);
		$offset = $page->getOffset();

		//查询说说表
		$data2 = $this->moodlist->ChaSs($offset);
		//var_dump($data2);die;
		$this->assign('data2' , $data2);
		

		$this->assign('title' , '【陈江】— 个人博客');
		

		$this->display();
	}

	//查询说说表
	public function Fabiaoss()
	{
		if (!empty($_SESSION['username'])) {
			//查询个人信息
			$data['username'] = $_SESSION['username'];
			$data1 = $this->user->doFind1($data);
			//var_dump($result);die;
			$this->assign('title' , '【陈江】— 个人博客');
			$this->assign('data1' , $data1);

		} else{
			$this->assign('title' , '【陈江】— 个人博客');
		}

		$this->display();
	}

	//发表说说
	public function shuoshuo()
	{
		// var_dump($_POST);
		// var_dump($_FILES);
		if (!empty($_SESSION['username'])) {
			$data2['dcontent'] = $_POST['dcontent'];
			$data2['dtime'] = date('Y-m-d H:i:s' , time());
			$data2['uid'] = $_POST['uid'];
			$data2['username'] = $_SESSION['username'];
			// var_dump($data2);

			$up = new Upload(['path'=>'upload/shuoshuo']);
			$a = $up->up('tx');
			if (!$a) {
				$b = $up->getErrorInfo();
				$this->error($b,'http://localhost/my_bk/index.php?m=moodlist&a=moodlist',2);
				die;
			} else {
				$data2['SStupian'] = $a;
				$data2['FHK'] = 0;
				$data2['SFSC'] = 0;
				$result = $this->moodlist->doFbss($data2);
				//$this->success('上传成功','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',1);
				if ($result) {
					$this->success('发表成功','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',1);
				} else {
					$this->error('发表失败','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
				}
			}
		} else {
			$this->error('请先登录','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
		}
	}

	//看说说
	public function kanss()
	{
		if (!empty($_SESSION['username'])) {
		$data['username'] = $_SESSION['username'];
		$data1 = $this->user->doFind1($data);
		//var_dump($data1);
		$this->assign('data1' , $data1);

		
		}

		//查询当前说说
		$did = $_GET['did'];
		$data2 = $this->moodlist->doDQss($did);
		//var_dump($data2);die;
		$this->assign('data2' , $data2);


		//分页是所有文章总数
		$count = $this->moodlist->doDQssHF1($did);
		$total = $count[0]['count'];
		//var_dump($total);
		$num = 3;
		$page = new Page($total , $num);
		$url = $page->rander();
		//每页显示数
		$this->assign('num' , $num);
		//总数
		$this->assign('total' , $total);
		//分页
		$this->assign('url' , $url);
		$offset = $page->getOffset();



		//查询当前说说的回复
		$data3 = $this->moodlist->doDQssHF($did , $offset);
		//var_dump($data3);die;
		$this->assign('data3' , $data3);

		$this->assign('title' , '【陈江】— 个人博客');

		$this->display();
	}

	public function HFss()
	{
		if (empty($_SESSION['username'])) {
			$this->error('请先登录','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
		} else {
			$data['dcontent'] = $_POST['dcontent'];
			$data['dtime'] = date('Y-m-d H:i:s' , time());
			$data['uid'] = $_POST['uid'];
			$data['username'] = $_SESSION['username'];
			$data['FHK'] = $_POST['did'];
			$data['SFSC'] = 0;
			//var_dump($data);
			$result = $this->moodlist->doFbss($data);
			if ($result) {
					$this->success('回复成功','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',1);
				} else {
					$this->error('回复失败','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
				}
		}
	}

	public function shanchu()
	{
		$mid = $_GET['did'];
		$result = $this->moodlist->doShanchu($mid);
		if ($result) {
			$this->success('删除成功','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
			//$this->success();
		} else {
			$this->success('删除失败','http://localhost/my_bk/index.php?m=moodlist&a=moodlist',3);
			//echo $this->error();
			die;
		}
	}
}