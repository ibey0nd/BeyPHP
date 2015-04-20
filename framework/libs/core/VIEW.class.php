<?php
class VIEW {
	public static $view;
	public static function init($viewtype, $config) {
		self::$view = new $viewtype ();
		/*
		 * $smarty = new Smarty();
		 * $smarty->left_delimiter=$config["left_delimiter"];
		 * $smarty->right_delimiter=$config["right_delimiter"];
		 * $smarty->template_dir=$config["template_dir"];ַ
		 * $smarty->compile_dir=$config["compile_dir"];
		 * $smarty->cache_dir=$config["cache_dir"];
		 */
		/**
		 * 采用配置的方法来初始化smarty引擎,同样达到上面设置的效果
		 */
		foreach ( $config as $key => $value ) {
			self::$view->$key = $value;
		}
	}
	/**
	 * 给视图赋值
	 *
	 * @param unknown $data        	
	 */
	public static function assign($data) {
		foreach ( $data as $key => $value ) {
			self::$view->assign ( $key, $value );
		}
	}
	
	/**
	 * 显示到视图
	 *
	 * @param unknown $template        	
	 */
	public static function display($template) {
		self::$view->display ( $template );
	}
	
	/**
	 * 显示提示信息
	 * @param unknown $msg
	 */
	public static function showMsg($msg) {
		echo ('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>'.$msg.' </p></div>');
	}
	
	/**
	 * 输出提示信息并跳到指定页面
	 * @param 提示信息 $msg
	 * @param 页面跳转等待时间 $waitSecond
	 * @param 跳转到的页面 $url
	 */
	public static function success($msg,$waitSecond=3,$url=NULL){
		self::$view->assign("message",$msg);
		$jUrl = is_null($url) ? $_SERVER['HTTP_REFERER'] : $url;
		self::$view->assign("jumpUrl",$jUrl);
		VIEW::$view->assign("waitSecond",$waitSecond);
		//使用绝对路径加载模板
 		self::$view->display("framework/libs/view/success.html");
		
	}
	
	
	
}