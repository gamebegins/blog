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

class DetailsController extends Controller
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

	public function details()
	{
		//查询所有板块
		$data2 = $this->category->cxBK();
		$this->assign('data2' , $data2);

		//var_dump($_GET);
		if (empty($_GET['cid'])) {

			//所有文章总数
			$count = $this->details->SouYouwzZs();
			$total = $count[0]['count'];
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


			//获取所有帖子
			$data = $this->details->Csy($offset);
			//var_dump($data);
			$this->assign('data' , $data);
			

			$this->assign('title' , '【陈江】— 个人博客');
			
		} else {
			//echo "11111";
			$cid = $_GET['cid'];
			if ($cid == '我的收藏') {
				$str = '';
				$username = $_SESSION['username'];
				$data2 = $this->guanzhu->wdgzhu($username);
				foreach ($data2 as $key => $val) {
					$str .= $val['id'] . ',';
				}
				$str = rtrim($str , ',');
				//echo "1111";
				//var_dump($str);die;
				//所有文章总数
				$count = $this->details->shoucangwangzhang1($str);
				$total = $count[0]['count'];
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
				//var_dump($_GET);
				// $this->assign('cid' , $_GET['cid']);
				// $this->assign('classname' , $_GET['classname']);
				//echo $cid;
				//获取所有帖子
				$data = $this->details->shoucangwangzhang($str , $offset);
				//var_dump($data);
				$this->assign('data' , $data);
				$this->assign('title' , '【陈江】— 个人博客');

			} elseif ($cid == '我的关注') {
				$str = '';
				$username = $_SESSION['username'];
				$data2 = $this->guanzhuren->wdgzhuren($username);
				//var_dump($data2[0]['username']);
				// var_dump($data2);die;
				foreach ($data2 as $key => $val) {
					//echo $val['username'];
					// $str .= 'username = ' .'\''. $val['username'] .'\''. ' AND ';
					$str .= '\''.$val['username'] .'\''. ',';
					// $str .= "username = $val['username'] " . ' AND ';
				}
				$str = rtrim($str , ',');
				//echo "1111";
				// var_dump($str);
				//所有文章总数
				$count = $this->details->guanzhuren1($str);
				// var_dump($count);die;
				$total = $count[0]['count'];
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
				//var_dump($_GET);
				// $this->assign('cid' , $_GET['cid']);
				// $this->assign('classname' , $_GET['classname']);
				//echo $cid;
				//获取所有帖子
				$data = $this->details->guanzhuren($str , $offset);
				// var_dump($data);die;
				$this->assign('data' , $data);
				$this->assign('title' , '【陈江】— 个人博客');
			} else {
				//所有文章总数
				$count = $this->details->SouYouwzZsDange($cid);
				$total = $count[0]['count'];
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
				//var_dump($_GET);
				$this->assign('cid' , $_GET['cid']);
				$this->assign('classname' , $_GET['classname']);
				//echo $cid;
				//获取所有帖子
				$data = $this->details->Csyd($cid , $offset);
				//var_dump($data);
				$this->assign('data' , $data);
				$this->assign('title' , '【陈江】— 个人博客');
			}
			
		}

		$this->display();
	}

	public function view()
	{
		//查询文章
		$id = $_GET['id'];
		$data = $this->details->Csydr($id);
		//var_dump($data);
		$this->assign('data' , $data);

		if (!empty($_SESSION['username'])) {
			//查看自己是否对这篇文章点赞
			$id = $_GET['id'];
			$username = $_SESSION['username'];
			$data6 = $this->dianzan->CkanShifodz($id , $username);
			//var_dump($data6);
			$this->assign('data6' , $data6);

			//查询是否收藏
			$data8 = $this->guanzhu->CXdqwzGZ($id , $username);
			//var_dump($data8);
			if (empty($data8)) {
				$this->assign('GZ' , '收藏');
			} else {
				$this->assign('GZ' , '取消收藏');
			}

			$BgzYH = $data[0]['username'];
			//查询是否关注
			$data9 = $this->guanzhuren->CXdqwzGZR($BgzYH);
			//var_dump($data9);die;
			if (empty($data9)) {
				$this->assign('GZR' , '关注');
			} else {
				$this->assign('GZR' , '取消关注');
			}

			//查询被赞总数
			$data7 = $this->dianzan->BeiZanzongshu($id);
			//var_dump($data7);
			$this->assign('data7' , $data7);
		}

		


		//分页是所有文章总数
		$count = $this->details->CsydeHT1($id);
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

		

		//增加该文章的浏览量
		//echo $id;
		$data5['liulan'] = $data[0]['liulan']+1;
		//var_dump($data5);
		$data5 = $this->details->ZJliulan($id , $data5);
		

		//查询所有板块
		$data2 = $this->category->cxBK();
		$this->assign('data2' , $data2);

		

		//查询该帖子所在板块
		$cid = $_GET['cid'];
		$data4 = $this->category->Cbkxx($cid);
		//var_dump($data4);
		$this->assign('data4' , $data4);

		//查询回帖
		$id = $_GET['id'];
		$data3 = $this->details->CsydeHT($id , $offset);
		$this->assign('data3' , $data3);
		//var_dump($data3);
		$this->assign('title' , '【陈江】— 个人博客');
		$this->display();
	}

	//回复文章
	public function HFwz()
	{
	
		if (empty($_SESSION['username'])) {
			$this->error('请登陆','http://localhost/my_bk/index.php?m=details&a=details',3);
		} else {

			//查询文章
			$id = $_POST['tid'];
			//echo $id;
			$data1 = $this->details->Csydr($id);
			$this->assign('data' , $data1);

			// 增加该文章的回复数
			$data5['huifu'] = $data1[0]['huifu']+1;
			$data5 = $this->details->ZJliulan($id , $data5);

			//var_dump($_POST);
			$data['content'] = $_POST['content'];
			$data['first'] = 0;
			$data['tid'] = $_POST['tid'];
			$data['uid'] = $_POST['uid'];
			$data['username'] = $_SESSION['username'];
			$data['addtime'] = date('Y-m-d H:i:s' , time());
			$data['classid'] = $_POST['classid'];
			//var_dump($data);
			$result = $this->details->HFwz($data);
			if ($result) {
				$this->success('回复成功','http://localhost/my_bk/index.php?m=details&a=details',3);
				//$this->success();
			} else {
				$this->success('回复失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
		}
	}

	//页面
	public function fabiaowz()
	{
		//var_dump($_GET);
		if (empty($_SESSION['username'])) {
			$this->success('请先登陆','http://localhost/my_bk/index.php?m=details&a=details',3);
		}
		$this->assign('classid' , $_GET['classid']);
		$this->assign('classname' , $_GET['classname']);
		$this->assign('title' , '【陈江】— 个人博客');

		//查询个人信息
		$data['username'] = $_SESSION['username'];
		$data1 = $this->user->doFind1($data);
		$this->assign('data1' , $data1);

		$this->display();
	}

	//存SQL
	public function FBwz()
	{
		//var_dump($_POST);
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['first'] = 1;
		$data['uid'] = $_POST['uid'];
		$data['username'] = $_SESSION['username'];
		$data['addtime'] = date('Y-m-d H:i:s' , time());
		$data['classid'] = $_POST['classid'];
		//var_dump($data);
		

		$up = new Upload(['path'=>'upload/wenzhang']);

		$a = $up->up('tx');
		if (!$a) {
			$b = $up->getErrorInfo();
			//$this->error($b,'http://localhost/my_bk/index.php?m=user&a=geren',1);
			die;
		} else {
			$data['pic'] = $a;
			$result = $this->details->HFwz($data);
			if ($result) {
				$this->success('发表成功','http://localhost/my_bk/index.php?m=details&a=details',3);
				//$this->success();
			} else {
				$this->error('发表失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
			
		}

		
	}

	//删除自己发的文章修改isdisplay为1
	public function shanchu()
	{
		//var_dump($_GET);
		$id = $_GET['id'];
		$result = $this->details->shanchu($id);
		if ($result) {
				$this->success('删除成功','http://localhost/my_bk/index.php?m=details&a=details',3);
				//$this->success();
			} else {
				$this->error('删除失败','http://localhost/my_bk/index.php?m=details&a=details',3);
				//echo $this->error();
				die;
			}
	}

	//搜索
	public function sousuo()
	{
		if (empty($_SESSION['username'])) {
			//查询个人信息
			$data['username'] = $_SESSION['username'];
			$data1 = $this->user->doFind1($data);
			$this->assign('data1' , $data1);

			
		}
		//搜索
		$sousuo = $_POST['sousuo'];

		//分页是所有文章总数
		$count = $this->details->sousuo1($sousuo);
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


		//var_dump($_POST);
		
		$data = $this->details->sousuo($sousuo , $offset);
		$this->assign('data' , $data);

		//查询所有板块
		$data2 = $this->category->cxBK();
		$this->assign('data2' , $data2);

		$this->assign('title' , '【陈江】— 个人博客');
		$this->display();
	}

	//后台

	//后台文章管理查询所有
	public function adv()
	{
		//所有文章总数
		$count = $this->details->CXSYWZ1();
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

		$data = $this->details->CXSYWZ($offset);
		//var_dump($data);
		$this->assign('data' , $data);
		$this->assign('title' , '【陈江】— 个人博客');
		$this->display();
	}

	//后台文章屏蔽或解除屏蔽
	public function QTpingbi()
	{
		//var_dump($_GET);
		$id = $_GET['id'];
		$data['isdisplay'] = 1;
		//var_dump($data);
		$data = $this->details->XGxianshi($id , $data);
		if ($data) {
			$this->success('修改成功','http://localhost/my_bk/index.php?m=details&a=details',3);
			//$this->success();
		} else {
			$this->error('修改失败','http://localhost/my_bk/index.php?m=details&a=details',5);
			//echo $this->error();
			die;
		}
	}


	//后台文章屏蔽或解除屏蔽
	public function pingbi()
	{
		//var_dump($_GET);
		$id = $_GET['id'];
		if ($_GET['isdisplay'] == 0) {
			$data['isdisplay'] = 1;
		} else {
			$data['isdisplay'] = 0;
		}
		//var_dump($data);
		$data = $this->details->XGxianshi($id , $data);
		if ($data) {
			$this->success('修改成功','http://localhost/my_bk/index.php?m=details&a=adv',3);
			//$this->success();
		} else {
			$this->error('修改失败','http://localhost/my_bk/index.php?m=details&a=adv',5);
			//echo $this->error();
			die;
		}
	}

	//后台删除自己发的文章
	public function shanchuwenzhang()
	{
		//var_dump($_GET);die;
		$id = $_GET['id'];
		$h = $_GET['h'];
		$result = $this->details->HTshanchu($id);
		if ($result) {
			if (empty($h)) {
				$this->success('删除成功','http://localhost/my_bk/index.php?m=details&a=adv',3);
			}else {
				$this->success('删除失败','http://localhost/my_bk/index.php?m=details&a=huifu',3);
				//$this->success();
			}
				
		} else {
			if (empty($h)) {
				$this->success('删除成功','http://localhost/my_bk/index.php?m=details&a=adv',3);
				die;
			}else {
				$this->success('删除失败','http://localhost/my_bk/index.php?m=details&a=huifu',3);
				//$this->success();
				die;
			}
		}
	}



	//后台文章的回复管理查询所有
	public function huifu()
	{
		//所有文章总数
		$count = $this->details->CXSYWZHF1();
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

		$data = $this->details->CXSYWZHF($offset);
		//var_dump($data);
		$this->assign('data' , $data);
		$this->assign('title' , '【陈江】— 个人博客');
		$this->display();
	}

}