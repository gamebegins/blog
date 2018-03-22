<?php
namespace Model;
use Framework\Model;

class DetailsModel extends Model
{
	//这是模型了


	public function Csy($offset)
	{
		$result = $this->limit($offset)->where('first = 1 AND isdel = 0 AND isdisplay = 0')->order('addtime desc')->select();
		
		return $result;
	}

	//一个分类的文章
	public function Csyd($data , $offset)
	{
		$result = $this->limit($offset)->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND classid = $data")->order('addtime desc')->select();
		
		return $result;
	}

	//一个文章
	public function Csydr($data)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND id = $data")->select();
		
		return $result;
	}


	//查询回帖
	public function CsydeHT($data , $offset)
	{
		$result = $this->limit($offset)->where("first = 0 AND isdel = 0 AND isdisplay = 0 AND tid = $data")->order('addtime desc')->select();
		//var_dump($result);
		return $result;
	}



	//回复文章
	public function HFwz($data)
	{
		$result = $this->add($data);
		//var_dump($result);
		return $result;
	}



	//增加浏览量
	public function ZJliulan($id , $data)
	{
		$result = $this->where("id = $id")->update($data);
		//var_dump($result);
		return $result;
	}


	//删除自己的文章修改字段isdisplay为1
	public function shanchu($id)
	{
		//echo $id;
		$data['isdisplay'] = 1;
		$result = $this->where("id = $id")->update($data);
		return $result;
	}


	
	//所有文章的总数
	public function SouYouwzZs()
	{
		$result = $this->where('first = 1 AND isdel = 0 AND isdisplay = 0')->count1();
		//var_dump($result);
		
		return $result;
	}


	//classid文章的总数
	public function SouYouwzZsDange	($data)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND classid = $data")->count1();
		//var_dump($result);
		
		return $result;
	}


	//查询回帖总数
	public function CsydeHT1($data)
	{
		$result = $this->where("first = 0 AND isdel = 0 AND isdisplay = 0 AND tid = $data")->count1();
		//var_dump($result);
		return $result;
	}


	//查询所有文章按浏览量倒序找5个热门
	public function CsyRM()
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0")->limit('0 , 3')->order('liulan desc')->select();
		//var_dump($result);
		return $result;
	}


	//查询所有文章按时间倒序找4个最新
	public function CsyZX()
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0")->limit('0 , 4')->order('addtime desc')->select();
		//var_dump($result);
		return $result;
	}

	//收藏的文章
	public function shoucangwangzhang($str , $offset)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND id in ($str)")->limit($offset)->order('addtime desc')->select();
		//var_dump($result);
		return $result;
	}

	//收藏的文章总数
	public function shoucangwangzhang1($str)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND id in ($str)")->count1();
		//var_dump($result);
		return $result;
	}

	//关注的人
	public function guanzhuren($str , $offset)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND username in ($str)")->limit($offset)->order('addtime desc')->select();
		//var_dump($result);
		return $result;
	}

	//关注的人总数
	public function guanzhuren1($str)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND username in ($str)")->count1();
		//var_dump($result);
		return $result;
	}


	//搜索
	public function sousuo($data , $offset)
	{
		$result = $this->limit($offset)->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND title like '%$data%'")->order('addtime desc')->select();
		return $result;
	}

	//搜索的总数
	public function sousuo1($data)
	{
		$result = $this->where("first = 1 AND isdel = 0 AND isdisplay = 0 AND title like '%$data%'")->order('addtime desc')->count1();
		return $result;
	}


	//后台查询所有文章总数
	public function CXSYWZ1()
	{
		$result = $this->where("first = 1")->count1();
		return $result;
	}


	//后台查询所有文章
	public function CXSYWZ($offset)
	{
		$result = $this->limit($offset)->where("first = 1")->select();
		return $result;
	}


	//后台修改文章是否显示
	public function XGxianshi($id , $data)
	{
		$result = $this->where("id in ($id)")->update($data);
		return $result;
	}

	//后台删除自己的文章
	public function HTshanchu($id)
	{
		//echo $id;
		$result = $this->where("id in ($id)")->delete();
		return $result;
	}



	//后台查询所有文章的回复总数
	public function CXSYWZHF1()
	{
		$result = $this->where("first = 0")->count1();
		return $result;
	}


	//后台查询所有文章的回复
	public function CXSYWZHF($offset)
	{
		$result = $this->limit($offset)->where("first = 0")->select();
		return $result;
	}


}