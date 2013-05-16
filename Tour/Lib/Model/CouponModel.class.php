<?php

class CouponModel extends Model {

	// 创建优惠码
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 创建优惠码（多个）
	public function cList($data = 0) {
		if (empty($data)) $data = $_POST;
		if ($this->create($data)) {
			$ret = $this->addAll($data);
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 更新优惠码
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$coupon = $this->save( $data );
		return $coupon;
	}

	// 获取优惠码
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$coupon = $this->where($sql)->find();
		return $coupon;
    }
	
	// 获取优惠码列表
	public function rList($data = 0) {
		if (empty($data)) $data = $_POST;
		$sql = array('author_id' => $_SESSION['id'], 'type_id' => (int)$data['type_id'], 'line_id' => (int)$data['line_id'], 'price' => (int)$data['price'], 'generate_time' => (int)$data['generate_time']);
		$couponList = $this->where($sql)->order('`used` ASC')->select();
		return $couponList;
	}
	
	// 获取优惠券（通过代码）
	public function rByCode($code = 0) {
		$sql = array('code' => $code);
		$coupon = $this->where($sql)->find();
		return $coupon;
	}
	
	// 获取优惠券种类列表（通过分组）
	public function rListByGroup() {
		$sql = array('author_id' => $_SESSION['id']);
		$couponList = $this->field('COUNT(1) AS `count`,`type_id`,`line_id`,`price`,`generate_time`')->where($sql)->group('`author_id`,`type_id`,`line_id`,`price`,`generate_time`')->order('`id` DESC')->select();
		return $couponList;
	}
}