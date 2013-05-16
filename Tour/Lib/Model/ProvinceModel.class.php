<?php

class ProvinceModel extends Model {

	// 创建新省份
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 获取省份名字
    public function rName($province_id = 0){
		$sql = array('id' => (int)$province_id);
		if (empty($province_id)) return false;
 		$province = $this->where($sql)->find();
		return $province['name'];
    }
	
	// 获取省份信息（通过名字）
    public function rByName($name = ''){
		$sql = array('name' => $name);
 		$province = $this->where($sql)->find();
		return $province;
    }
	
	// 获取省份列表
	public function rList($z = 0) {
		$sql = array();
		if ($z == 1) $sql['id'] = array('IN', A('Line')->zhoubian);
		if ($z == 2) $sql['id'] = array('IN', A('Line')->guonei);
		if ($z == 3) $sql['id'] = array('NOT IN', array_merge(A('Line')->zhoubian, A('Line')->guonei));
 		$province = $this->where($sql)->select();
		return $province;	
	}
	
	// 省份线路数修改
	public function countChange($id, $value = 1, $type = 1) {
		$sql = array('id' => $id);
		if ($type == 1)
			$this->where($sql)->setInc('count', $value);
		else 
			$this->where($sql)->setDec('count', $value);
	}
}