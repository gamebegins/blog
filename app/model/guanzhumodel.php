<?php
namespace Model;
use Framework\Model;

class GuanzhuModel extends Model
{
	//这是模型了
	
	//前台查询当前用户是否关注此文章
	public function CXdqwzGZ($id)
	{
		$username = $_SESSION['username'];
		$result = $this->where("id = $id AND username = '$username'")->select();
		//var_dump($result);
		return $result;
	}


	//前台查询当前用户取消收藏此文章
	public function shoucang($id , $username)
	{
		$result = $this->where("id = $id AND username = '$username'")->delete();
		//var_dump($result);
		return $result;
	}


	//前台查询当前用户收藏此文章
	public function shoucangwz($data)
	{
		$result = $this->add($data);
		//var_dump($result);
		return $result;
	}


	//查询我的关注
	public function wdgzhu($username)
	{

		$result = $this->where("username = '$username'")->select();
		return $result;
	}

}