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
}