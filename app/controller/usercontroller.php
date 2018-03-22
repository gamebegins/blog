<?php
namespace Controller;
use Controller\Controller;
use Model\UserModel;
use Framework\Page;
use Framework\Verify;
use Framework\Ucpaas;
use Framework\Upload;
use Framework\Email;

class UserController extends Controller
{
	public $user;
	public $yzm;
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new UserModel();
		
	}
	
	
	
	public function doRegister()
	{
		//var_dump($_SESSION);
		//检测验证码是否一致
		if (strtolower($_POST['yzm']) != strtolower($_SESSION['verify'])) {
			$this->error('验证码不一致','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}
		
		//判断短信验证码是否获取到
		$a = $_SESSION['dx'];
		$b = $_POST['duanxin'];
		if ($a != $b) {
			$this->error('短信验证码不正确','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}

		//判断用户名是否规范
		$strLen = mb_strlen($_POST['username']);
		$strLen1 = mb_strlen($_POST['password']);
		$minLen = 3;
		$maxLen = 12;
		if ($strLen < $minLen || $strLen > $maxLen) {
			$this->error('用户名长度为3~12','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}
		//判断密码长度和类型（不能全为数字）
		if ($strLen1 <= $minLen || $strLen1 >= $maxLen) {
			$this->error('密码长度为3~12','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}else if(is_numeric($_POST['password'])){
			$this->error('密码不符合要求','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}

		//检测邮箱格式
		$pattern='/^[\w-]+@([a-zA-Z0-9-]+\.)+((com)|(cn)|(net)|(edu))$/i';
		if (!preg_match($pattern, $_POST['Email'])) {
			$this->error('邮箱格式不正确','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}

		//检测俩次密码是否一致
		if ($_POST['rpwd'] != $_POST['password']) {
			$this->error('俩次密码不一致','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}

		//判断用户名是否存在
		$result = $this->user->doPDYHM($_POST['username']);
		if (empty($result)) {
			//$this->success('登录成功','http://localhost/my_bk/index.php?m=index&a=index',3);
		} else {
			$this->error('用户名已存在','http://localhost/my_bk/index.php?m=index&a=index',3);
			die;
		}
		
		
		$data['admin'] = 0;
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['register_time'] = date('Y-m-d H:i:s' , time());
		$data['lastlogin_time'] = date('Y-m-d H:i:s' , time());
		$data['phone'] = $_POST['phone'];
		$data['email'] = $_POST['Email'];
		
		$result = $this->user->doAdd($data);
		
		if ($result) {
			$_SESSION['username'] = $_POST['username'];
			$this->success('注册成功','http://localhost/my_bk/index.php?m=index&a=index',3);
			//$this->success();
		} else {
			$this->success('注册失败','http://localhost/my_bk/index.php?m=index&a=index',3);
			//echo $this->error();
		}
	}
	
	
	
	
	
	public function doLogin()
	{
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		
		$result = $this->user->doFind($data);
		
		if ($result) {
			$_SESSION['username'] = $_POST['username'];
			$this->success('登录成功','http://localhost/my_bk/index.php?m=index&a=index',3);
		} else {
			$this->error('账号或密码错误','http://localhost/my_bk/index.php?m=index&a=index',3);
		}
	}


	public function tuichu()
	{
		$_SESSION = [];
		session_destroy();
		$this->success('退出成功','http://localhost/my_bk/index.php?m=index&a=index',1);
	}


	public function yzm()
	{

		$v = new Verify();

		$v->getImg();

		
	}

	//短信验证
	public function duanxi()
	{
		//echo "1111111111";
		$phone=$_POST['phone'];
		//$dx=new Ucpaas();
		$str='0123456789';
		$str1=str_shuffle($str);
		$str2=substr($str1,1,4);
		$_SESSION['dx']=$str2;
		$options['accountsid']='95d70b1917844333ad3b0a5b7a8e9638';
		$options['token']='748c054532366585c9655b244f4ee0d4';
		$ucpass = new Ucpaas($options);
		$appId = "d0e3ecd04fc1402390e65416b11d7ba4";
		$to = $phone;
		$templateId = "185137";
		$param=$str2;
		echo $ucpass->templateSMS($appId,$to,$templateId,$param);

	}
	//邮箱验证
	public function doEmail()
	{
		$mail = new Email();
		$mail->setServer("smtp.chenjiangjiang.cn", "postmaster@chenjiangjiang.cn", "DingMiaoMiao1995614"); //设置smtp服务器
		$mail->setFrom("postmaster@chenjiangjiang.cn"); //设置发件人 
		$phone=$_POST['phone'];
		$mail->setReceiver($phone); //设置收件人，多个收件人，调用多次
		// $mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
		// $mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
		$_SESSION['neirong']=$neirong = "忘记密码";
		$mail->setMailInfo("title", $neirong);// 设置邮件主题、内容
		$mail->sendMail(); //发送
	}



	public function geren()
	{
		if (!empty($_SESSION['username'])) {
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


	public function XGGRxinxi()
	{
		//var_dump($_POST);

		$a = $_POST;
		foreach ($a as $key => $value) {
			if (!empty($value)) {
				$data[$key] = $value;
			}
		}
		$result = $this->user->doXGgrxx($data);
		//var_dump($result);
		if ($result) {
			$_SESSION['username'] = $_POST['username'];
			$this->success('修改成功','http://localhost/my_bk/index.php?m=user&a=geren',1);
		} else {
			$this->error('修改失败','http://localhost/my_bk/index.php?m=user&a=geren',3);
		}
	}

	public function XGGRmima()
	{
		//var_dump($_POST);
		$strLen1 = mb_strlen($_POST['password']);
		$minLen = 3;
		$maxLen = 12;
		//判断密码长度和类型（不能全为数字）
		if ($strLen1 <= $minLen || $strLen1 >= $maxLen) {
			$this->error('密码长度为3~12','http://localhost/my_bk/index.php?m=user&a=geren',3);
			die;
		}else if(is_numeric($_POST['password'])){
			$this->error('新密码不符合要求','http://localhost/my_bk/index.php?m=user&a=geren',3);
			die;
		}

		//检测俩次密码是否一致
		if ($_POST['rpwd'] != $_POST['password']) {
			$this->error('俩次密码不一致','http://localhost/my_bk/index.php?m=user&a=geren',3);
			die;
		}




		$data['username'] = $_SESSION['username'];
		$data1 = $this->user->doFind1($data);
		//var_dump($data1);
		//var_dump(md5($_POST['Ymima']));
		//判断是否与原密码一致
		if ($data1[0]['password'] == md5($_POST['Ymima'])) {
			$data2['password'] = md5($_POST['password']);
			$result = $this->user->doXGgrxx($data2);
			if ($result) {
				$_SESSION = [];
				session_destroy();
				$this->success('修改成功,重新登陆','http://localhost/my_bk/index.php?m=index&a=index',3);
			} else {
				$this->error('修改失败','http://localhost/my_bk/index.php?m=user&a=geren',3);
				die;
			}
		} else {
			$this->success('密码不正确','http://localhost/my_bk/index.php?m=user&a=geren',1);
			die;
		}
		
	}


	public function XGGRtouxiang()
	{	

		//var_dump($_FILES);
		$up = new Upload(['path'=>'upload/touxiang']);

		$a = $up->up('tx');
		if (!$a) {
			$b = $up->getErrorInfo();
			$this->error($b,'http://localhost/my_bk/index.php?m=user&a=geren',1);
			die;
		} else {
			$data3['picture'] = $a;
			$result = $this->user->doXGgrxx($data3);
			$this->success('上传成功','http://localhost/my_bk/index.php?m=user&a=geren',1);
		}
	}


	//后台修改密码
	public function pass()
	{
		if (!empty($_SESSION['username'])) {
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




	//后台修改密码
	public function XGGLYmima()
	{
		var_dump($_POST);
		$strLen1 = mb_strlen($_POST['password']);
		$minLen = 3;
		$maxLen = 12;
		//判断密码长度和类型（不能全为数字）
		if ($strLen1 <= $minLen || $strLen1 >= $maxLen) {
			$this->error('密码长度为3~12','http://localhost/my_bk/index.php?m=user&a=pass',3);
			die;
		}else if(is_numeric($_POST['password'])){
			$this->error('新密码不符合要求','http://localhost/my_bk/index.php?m=user&a=pass',3);
			die;
		}
		//检测俩次密码是否一致
		if ($_POST['rpwd'] != $_POST['password']) {
			$this->error('俩次密码不一致','http://localhost/my_bk/index.php?m=user&a=pass',3);
			die;
		}
		$data['username'] = $_SESSION['username'];
		$data1 = $this->user->doFind1($data);
		//var_dump($data1);
		//var_dump(md5($_POST['Ymima']));
		//判断是否与原密码一致
		if ($data1[0]['password'] == md5($_POST['Ymima'])) {
			$data2['password'] = md5($_POST['password']);
			$result = $this->user->doXGgrxx($data2);
			if ($result) {
				$_SESSION = [];
				session_destroy();
				$this->success('修改成功,重新登陆','http://localhost/my_bk/index.php',3);
			} else {
				$this->error('修改失败','http://localhost/my_bk/index.php?m=user&a=pass',3);
				die;
			}
		} else {
			$this->success('密码不正确','http://localhost/my_bk/index.php?m=user&a=pass',1);
			die;
		}
		
	}



	//后台用户管理
	public function book()
	{
		//所有文章总数
		$count = $this->user->doCx1();
		$total = $count[0]['count'];
		$num = 2;
		$page = new Page($total , $num);
		$url = $page->rander();
		//每页显示数
		$this->assign('num' , $num);
		//总数
		$this->assign('total' , $total);
		//分页
		$this->assign('url' , $url);
		$offset = $page->getOffset();

		$data = $this->user->doCx($offset);
		$this->assign('data' , $data);
		$this->display();
		
	}

	//后台删除用户
	public function shanchu()
	{
		if (!empty($_GET)) {
			//var_dump($_GET);die;
			$str = '';
			$uid = $_GET['uid'];
			foreach ($uid as $key => $value) {
				$str .= '\''.$value.'\',';
			}
			$str = rtrim($str , ',');
			var_dump($str);
			$result = $this->user->SYH($str);
			if ($result) {
				$this->success('删除成功','http://localhost/my_bk/index.php?m=user&a=geren',1);
			} else {
				$this->error('删除失败','http://localhost/my_bk/index.php?m=user&a=geren',3);
			}
		}
	}
	
}






