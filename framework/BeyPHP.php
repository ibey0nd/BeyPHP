<?php
	$currentdir = dirname(__FILE__);
	include_once($currentdir.'/include.list.php');
	foreach($paths as $path){
		include_once($currentdir.'/'.$path);
	}
	class BeyPHP{
		public static $controller;
		public static $method;
		private static $config;
		private static function init_db(){
			DB::init('mysql', self::$config['dbconfig']);
		}
		private static function init_view(){
			VIEW::init('Smarty', self::$config['viewconfig']);
		}
		private static function init_controllor(){
			self::$controller = isset($_GET['c'])?daddslashes($_GET['c']):'index';
		}
		private static function init_method(){
			self::$method = isset($_GET['m'])?daddslashes($_GET['m']):'index';
		}
		public static function run($config){
			/**
			 * 进行初始化数据库DB,显示层VIEW
			 */
			self::$config = $config;
			self::init_db();
			self::init_view();
			self::init_controllor();
			self::init_method();
			/**
			 * 通过url传递的参数进行单入口的调用
			 */
			C(self::$controller, self::$method);
			
			
			
		}
	}
?>