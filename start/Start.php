<?php
class Start
{
	static $loader;
	
	static public function run()
	{
		session_start();
		include 'start/Psr4Autoload.php';
		//我把数据库的配置文件拿过来
		$GLOBALS['config'] = include 'config/config.php';
		self::$loader = new Psr4Autoload();
		
		self::$loader->register();
		
		
		
		
		$namespaces = include 'config/namespace.php';
		
		self::addNamespaces($namespaces);
		//var_dump($namespaces);
	}
	
	static public function addNamespaces($namespaces)
	{
		//var_dump($namespaces);
		
		foreach ($namespaces as $path => $namespace) {
			self::$loader->addNamesapce($namespace , $path);
		}
	}
	
	
	static public function route()
	{
		$_GET['m'] = isset($_GET['m']) ? $_GET['m'] : 'Index';
		$_GET['a'] = isset($_GET['a']) ? $_GET['a'] : 'index';
		$_GET['m'] = ucfirst($_GET['m']);

		$controller = 'Controller\\' . $_GET['m'] . 'Controller';
		//var_dump($controller , $_GET['a']);
		$controller = new $controller();

	

		//$controller->$_GET['a']();
		call_user_func(array($controller , $_GET['a']));
	}
}
