<?php
namespace Model;
use Framework\Model;

class MoodlistModel extends Model
{
	//	查询个人信息
	public function doFind1($data)
	{
		//echo "333";
		$result = $this->where("username='{$data['username']}'")->order('dtime desc')->select();
		//var_dump($result);
		return $result;
	}

	//查询所有说说
	public function ChaSs($offset)
	{
		$result = $this->limit($offset)->where('FHK=0 AND SFSC=0')->order('dtime desc')->select();
		//var_dump($result);
		return $result;
	}

	//查询所有说说总数
	public function ChaSs1()
	{
		$result = $this->where('FHK=0 AND SFSC=0')->count1();
		//var_dump($result);
		return $result;
	}

	//发表说说
	public function doFbss($data)
	{
		// var_dump($data);
		$result = $this->add($data);
		return $result;
	}

	//查询当前说说
	public function doDQss($data)
	{
		$result = $this->where("did = $data")->select();
		return $result;
	}

	//查询当前说说回复总数
	public function doDQssHF1($data)
	{
		$result = $this->where("FHK = $data")->count1();
		return $result;
	}

	//查询当前说说
	public function doDQssHF($data , $offset)
	{
		$result = $this->limit($offset)->where("FHK = $data")->select();
		return $result;
	}

	//删除回复说说
	public function doShanchu($did)
	{
		$result = $this->where("did=$did")->delete();
		return $result;
	}

}