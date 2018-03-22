<?php
namespace Model;
use Framework\Model;

class MessageModel extends Model
{
	//	查询个人信息
	public function doFind1($data)
	{
		//echo "333";
		$result = $this->where("username='{$data['username']}'")->select();
		//var_dump($result);
		return $result;
	}

	public function doLiuyan($data)
	{
		$result = $this->add($data);
		//var_dump($result);
		return $result;
	}

	//查询留言信息
	public function CXLY($offset)
	{
		$result = $this->limit($offset)->order('mtime desc')->select();
		return $result;
	}

	//查询留言信息总数
	public function CXLY1()
	{
		$result = $this->count1();
		return $result;
	}

	//删除留言
	public function doShanchu($mid)
	{
		$result = $this->where("mid=$mid")->delete();
		return $result;
	}
}