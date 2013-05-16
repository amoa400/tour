<?php

class OrderTouristModel extends Model {
	// 获取订单游客信息
    public function r($order_id = 0, $tourist_id = 0){
		$sql = array('order_id' => (int)$order_id, 'tourist_id' => (int)$tourist_id);
		$ot = $this->where($sql)->find();
		return $ot;
    }
	
	// 获取订单游客信息（通过订单编号）
    public function rListByOrderId($order_id = 0){
		$sql = array('order_id' => (int)$order_id);
		$otList = $this->where($sql)->select();
		return $otList;
    }
	
	// 新增订单游客信息
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			if ($ret) return 'OK';
			else return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 删除订单游客信息（通过订单编号）
	public function dByOrderId($order_id = 0) {
		$sql = array('order_id' => (int)$order_id);
		$ret = $this->where($sql)->delete();
		return $ret;
	}
	
}