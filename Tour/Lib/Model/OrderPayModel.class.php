<?php

class OrderPayModel extends Model {
	// 新增订单
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	// 更新订单信息
	public function u($data = 0) {
		if (empty($data)) return;
		$order = $this->save( $data );
		return $order;
	}
	
	// 获取订单信息
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$order = $this->where($sql)->find();
		return $order;
    }

	// 删除订单
	public function d($id = 0) {
		$order = $this->delete((int)$id);
		return $order;
	}
}