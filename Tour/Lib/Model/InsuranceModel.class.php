<?php

class InsuranceModel extends Model {
	// 获取保险信息
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$insurance = $this->where($sql)->find();
		return $insurance;
    }

	// 获取保险信息列表
	public function rListByString($s = '') {
		$map['id'] = array('in', $s);
		$insuranceList = $this->where($map)->select();
		return $insuranceList;
	}
	
	// 获取保险列表
	public function rList() {
		$insuranceList = $this->order('`id` ASC')->select();
		return $insuranceList;
	}
}