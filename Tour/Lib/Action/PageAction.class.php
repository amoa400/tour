<?php

class PageAction extends Action {

	public function team() {
		$this->assign('headTitle', '团队出游');
		$this->display();
	}
	
	public function zuche() {
		$this->assign('headTitle', '租车');
		$this->display();
	}
	
	public function shaokao() {
		$this->assign('headTitle', '买烧烤食材');
		$this->display();
	}
	
	public function jiudian() {
		$this->assign('headTitle', '订酒店');
		$this->display();
	}
	
	public function qianzheng() {
		$this->assign('headTitle', '办理签证');
		$this->display();
	}
	
	public function app() {
		$this->assign('headTitle', '手机758');
		$this->display();
	}
	
	public function about() {
		$this->assign('headTitle', '关于我们');
		$this->display();
	}
	
	public function join() {
		$this->assign('headTitle', '加入我们');
		$this->display();
	}
	
	public function contact() {
		$this->assign('headTitle', '联系我们');
		$this->display();
	}
	
	public function mianze() {
		$this->assign('headTitle', '免责声明');
		$this->display();
	}
	
	public function tousu() {
		$this->assign('headTitle', '投诉建议');
		$this->display();
	}
}