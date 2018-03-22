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

class IndexController extends Controller
{
	public $user;
	public $category;
	public $details;
	public $dianzan;
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		$this->category = new CategoryModel();
		$this->details = new DetailsModel();
		$this->dianzan = new DianzanModel();
	}




	public function index()
	{

		if (!empty($_SESSION['username'])) {
			$data['username'] = $_SESSION['username'];
			$data1 = $this->user->doFind1($data);
			//var_dump($result);die;
			$this->assign('data1' , $data1);

		}

		//热门文章
		$data3 = $this->details->CsyRM();
		//var_dump($data3);
		$this->assign('data3' , $data3);


		//最新文章
		$data4 = $this->details->CsyZX();
		//var_dump($data3);
		$this->assign('data4' , $data4);


		//查询所有板块
		$data2 = $this->category->cxBK();
		$this->assign('data2' , $data2);
		//var_dump($data2);die;

		$this->assign('title' , '【陈江】— 个人博客');
		

		$this->display();
		
	}


	//后台
	public function admin()
	{
		if (empty($_SESSION['username'])) {
			$this->success('请重新登陆','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		} else {
			$this->assign('title' , '【陈江】— 个人博客后台管理');
			$this->display();
		}
		
	}


	//后台板块管理
	public function column()
	{
		//所有文章总数
		$count = $this->category->CXBKXX1();
		//var_dump($count);
		$total = $count[0]['count'];
		$num = 5;
		$page = new Page($total , $num);
		$url = $page->rander();
		//每页显示数
		$this->assign('num' , $num);
		//总数
		$this->assign('total' , $total);
		//分页
		$this->assign('url' , $url);
		$offset = $page->getOffset();

		$data = $this->category->CXBKXX($offset);
		//var_dump($data);
		$this->assign('data' , $data);


		$this->assign('title' , '【陈江】— 个人博客后台管理');
		$this->display();
	}

	//后台删除板块
	public function shanchubankuai()
	{
		//var_dump($_GET);
		$cid = $_GET['cid'];
		$result = $this->category->SCbankuai($cid);
		if ($result) {
			$this->success('删除成功','http://localhost/my_bk/index.php?m=index&a=column',3);
			//$this->success();
		} else {
			$this->error('删除失败','http://localhost/my_bk/index.php?m=index&a=column',3);
			//echo $this->error();
			die;
		}
	}

	//后台添加板块
	public function tianjiabankuai()
	{
		//var_dump($_POST);
		$data['classname'] = $_POST['classname'];
		$data['orderby'] = $_POST['orderby'];
		$data['isdisplay'] = $_POST['isdisplay'];
		$result = $this->category->HTtianjiaBK($data);
		if ($result) {
			$this->success('添加成功','http://localhost/my_bk/index.php?m=index&a=column',3);
			//$this->success();
		} else {
			$this->error('添加失败','http://localhost/my_bk/index.php?m=index&a=column',3);
			//echo $this->error();
			die;
		}
	}
}