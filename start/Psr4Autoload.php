<?php
class Psr4Autoload
{
	public $namespaces = array();
	public function register()
	{
		spl_autoload_register(array($this , 'loadClass'));
	}
	
	
	public function loadClass($className)
	{
		//截取命名空间
		//截取真实的类名
		
		$pos = strrpos($className , '\\');
		
		$namespace = substr($className , 0 , $pos+1);
		
		$realClassName = substr($className , $pos+1);
		
		//像包含迈进一步
		$this->mapLoad($namespace , $realClassName);
	}
	
	//mapload 处理两种情况
	public function mapLoad($namespace , $realClassName)
	{
		//分两种情况
		//
		
		if (isset($this->namespaces[$namespace]) == false) {
			$path = $namespace . $realClassName . '.php';
			$path = str_replace('\\' , '/' , $path);
			$file = strtolower($path);
			
			$this->requireFile($file);
		} else {
			foreach ($this->namespaces[$namespace] as $path) {
				$file = strtolower($path .'/'. $realClassName . '.php');
				
				$this->requireFile($file);
			}
		}
	}
	
	//添加命名空间保存到一个数组里面去
	
	public function addNamesapce($namespace , $path)
	{
		$this->namespaces[$namespace][] = $path;
	}
	
	//执行包含
	
	public function requireFile($path)
	{
		
		if (file_exists($path)) {
			include $path;
			return true;
		} else {
			return false;
		}
		
	}
	
}	
	