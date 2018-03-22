<?php
namespace Model;
use Framework\Model;

class CategoryModel extends Model
{
	//这是模型了


	public function cxBK()
	{
		$result = $this->table('category')->order('orderby desc')->select();
		return $result;
	}


	public function Cbkxx($cid)
	{
		//var_dump($cid);
		$result = $this->where("cid = $cid")->select();
		return $result;
	}


	//后台

	//查询板块信息总数
	public function CXBKXX1()
	{
		$result = $this->order('orderby desc')->count1();
		return $result;
	}


	//查询板块信息
	public function CXBKXX($offset)
	{
		$result = $this->limit($offset)->order('orderby desc')->select();
		return $result;
	}



	//后台删除板块
	public function SCbankuai($cid)
	{
		//var_dump($cid);
		$result = $this->where("cid in ($cid)")->delete();
		return $result;
	}


	//后台添加板块
	public function HTtianjiaBK($data)
	{
		//var_dump($data);
		$result = $this->add($data);
		return $result;
	}

	

}