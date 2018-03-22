<?php
namespace Model;
use Framework\Model;

class UserModel extends Model
{
	//这是模型了
	
	public function doAdd($data)
	{
		//var_dump($data);
		
		$result = $this->add($data);
		
		return $result;
		
	}
	
	public function doFind($data)
	{
		$result = $this->where("username='{$data['username']}' and password='{$data['password']}'")->select();
		
		return $result;
	}

	//	查询个人信息
	public function doFind1($data)
	{
		//echo "333";
		$result = $this->where("username='{$data['username']}'")->select();
		//var_dump($result);die;
		return $result;
	}

	public function doPDYHM($data)
	{
		$result = $this->where("username='{$_POST['username']}'")->select();
		return $result;
	}

	public function doXGgrxx($data)
	{
		$result = $this->where("username='{$_SESSION['username']}'")->update($data);
		//var_dump($result);
		return $result;
	}

	//博主信息
	public function bzXX()
	{
		$result = $this->where("admin=1")->select();
		return $result;
	}

	//后台
	
	//查询所有用户信息
	public function doCx($offset)
	{
		$result = $this->limit($offset)->select();
		return $result;
	}

	//查询所有用户信息总数
	public function doCx1()
	{
		$result = $this->count1();
		return $result;
	}

	//后台删除用户
	public function SYH($str)
	{
		$result = $this->where("uid in ($str)")->delete();
		return $result;
	}
}