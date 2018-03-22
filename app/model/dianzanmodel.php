<?php
namespace Model;
use Framework\Model;

class DianzanModel extends Model
{
	//这是模型了
	
	public function dianzansql($data)
	{
		$result = $this->add($data);
		
		return $result;
	}

	//查看是否对现看的文章点赞
	public function CkanShifodz($id , $username)
	{
		//var_dump($data6);
		$result = $this->where("id = $id AND username = '$username'")->select();
		
		return $result;
	}

	//取消对现看文章的点赞
	public function QXdianzansql($dzid)
	{
		$result = $this->where("dzid = $dzid")->delete();
		
		return $result;
	}


	//被点赞的总数
	public function BeiZanzongshu($id)
	{
		$result = $this->where("id = $id")->count1();
		//var_dump($result);
		
		return $result;
	}
}