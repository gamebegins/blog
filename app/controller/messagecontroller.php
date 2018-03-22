<?php
namespace Controller;
use Controller\Controller;
use Model\MessageModel;
use Model\UserModel;
use Framework\Page;
use Framework\Verify;
use Framework\Ucpaas;
use Framework\Upload;
class MessageController extends Controller
{
	public $message;
	public $user;

	public function __construct()
	{
		parent::__construct();
		
		$this->message = new MessageModel();
		$this->user = new UserModel();
		
	}


	public function message()
	{
		if (!empty($_SESSION['username'])) {
			//查询个人信息
			$data['username'] = $_SESSION['username'];
			$data1 = $this->user->doFind1($data);
			//var_dump($result);die;
			$this->assign('data1' , $data1);


			//分页是所有文章总数
			$count = $this->message->CXLY1();
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


			//查询留言信息
			$data3 = $this->message->CXLY($offset);
			$this->assign('data3' , $data3);

			//查询博主信息
			$data4 = $this->user->bzXX();
			$this->assign('data4' , $data4);
		}
			
		$this->assign('title' , '【陈江】— 个人博客');
		

		$this->display();
		
	}

	public function liuyan()
	{
		//echo "1111";
		$data2['mcontent'] = $_POST['liuyan'];
		$data2['mtime'] = date('Y-m-d' , time());
		$data2['uid'] = $_POST['uid'];
		$data2['username'] = $_SESSION['username'];
		//var_dump($data2);
		$result = $this->message->doLiuyan($data2);
		if ($result) {
			$this->success('留言成功','http://localhost/my_bk/index.php?m=message&a=message',3);
			//$this->success();
		} else {
			$this->success('留言失败','http://localhost/my_bk/index.php?m=message&a=message',3);
			//echo $this->error();
			die;
		}
	}

	public function shanchu()
	{
		$mid = $_GET['mid'];
		$result = $this->message->doShanchu($mid);
		if ($result) {
			$this->success('删除成功','http://localhost/my_bk/index.php?m=message&a=message',3);
			//$this->success();
		} else {
			$this->success('删除失败','http://localhost/my_bk/index.php?m=message&a=message',3);
			//echo $this->error();
			die;
		}
	}
}