<?php

class OrderInsuranceModel extends Model {
	// 获取订单保险信息
    public function r($order_id = 0, $insurance_id = 0){
		$sql = array('order_id' => (int)$order_id, 'insurance_id' => (int)$insurance_id);
		$oi = $this->where($sql)->find();
		return $oi;
    }
	
	// 获取订单保险信息（通过订单编号）
    public function rListByOrderId($order_id = 0, $join = false){
		$sql = array('order_id' => (int)$order_id);
		if (!$join)
			$oiList = $this->where($sql)->select();
		else 
			$oiList = $this->join('`tour_insurance` ON `insurance_id`=`id`')->where($sql)->select();
		return $oiList;
    }
	
	// 新增订单保险信息
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
	
	// 删除订单保险信息（通过订单编号）
	public function dByOrderId($order_id = 0) {
		$sql = array('order_id' => (int)$order_id);
		$ret = $this->where($sql)->delete();
		return $ret;
	}
	
}