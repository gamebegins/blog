<?php
//这是一个基础的控制器
namespace Controller;
use Framework\Tpl;

class Controller extends Tpl
{
	public function __construct()
	{
		parent::__construct($GLOBALS['config']['TPL_CACHE_DIR'],$GLOBALS['config']['TPL_DIR'],$GLOBALS['config']['TPL_LIFETIME']);
	}
	
	public function display($filePath = null , $isExcute = true)
	{
		if (is_null($filePath)) {
			$filePath = $_GET['m'] . '/' . $_GET['a'] . '.html';
		}
		
		parent::display($filePath , $isExcute);
	}
	
	
	public function success($msg = null , $url = null , $time = 3)
	{
		if (is_null($url)) {
			$url = $_SERVER['HTTP_REFERER'];
		} 
		$this->assign('title' , '成功页面');
		$this->assign('msg' , $msg);
		$this->assign('url' , $url);
		$this->assign('time' , $time);
		
		$this->display('success.html');
	}
	public function error($msg = null , $url = null , $time = 3)
	{
		
		$url = $_SERVER['HTTP_REFERER'];
		
		$this->assign('title' , '失败页面');
		$this->assign('msg' , $msg);
		$this->assign('url' , $url);
		$this->assign('time' , $time);
		
		$this->display('error.html');
	}
	
	
}