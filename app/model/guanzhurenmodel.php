<?php
namespace Model;
use Framework\Model;

class GuanzhurenModel extends Model
{
	//这是模型了
	
	//前台查询当前用户是否关注此文章
	public function CXdqwzGZR($BgzYH)
	{
		$username = $_SESSION['username'];
		$result = $this->where("username = '$BgzYH' AND gusername = '$username'")->select();
		//var_dump($result);
		return $result;
	}


	//前台查询当前用户取消关注
	public function quxiaoGZ($username , $gusername)
	{
		$result = $this->where("username = '$username' AND gusername = '$gusername'")->delete();
		// var_dump($result);die;
		return $result;
	}


	//用户关注
	public function gzcr($data)
	{
		$result = $this->add($data);
		//var_dump($result);die;
		return $result;
	}


	//查询我的关注
	public function wdgzhuren($username)
	{

		$result = $this->where("gusername = '$username'")->select();
		//var_dump($result);die;
		return $result;
	}

}