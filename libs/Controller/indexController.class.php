<?php
/**
 * 测试的类
 * @author Administrator
 *
 */
class indexController {
	
	function test() {
		$data = array("title"=>"题目","content"=>"日了狗了");
		VIEW::assign($data);
		VIEW::success("提示信息",5,"http://127.0.0.2");
	}

	
	
}