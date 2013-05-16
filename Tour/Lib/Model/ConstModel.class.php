<?php

class ConstModel extends Model {
	// 更新常量
	public function u($name = 0, $value = 0) {
		$data = array();
		$data['name'] = $name;
		$data['value'] = $value;
		$order = $this->save( $data );
		return $order;
	}
	
	// 获取常量
	public function r($name = 0) {
		$sql['name'] = $name;
		$const = $this->where($sql)->find();
		return $const['value'];
	}
	
	// 获取常量列表
	public function rList($name = 0) {
		$sql['NAME'] = array('IN', $name);
		$constList = $this->where($sql)->select();
		return $constList;
	}
}