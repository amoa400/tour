<?php

class RegularBusModel extends Model {
	// 创建新班车
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 获取班车信息
    public function r($line_id = 0, $id = 0){
		$sql = array('line_id' => (int)$line_id, 'id' => (int)$id);
		$bus = $this->where($sql)->find();
		return $bus;
    }
	// 获取班车信息（列表）
    public function rList($line_id = 0){
		$sql = array('line_id' => (int)$line_id);
		$busList = $this->where($sql)->select();
		return $busList;
    }

}