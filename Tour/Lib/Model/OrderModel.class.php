<?php

class OrderModel extends Model {
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
	
	// 获取订单信息
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$order = $this->where($sql)->find();
		return $order;
    }
	
	// 获取最后一个订单
	public function rLast() {
		$sql['status'] = array('IN', '4,6,7');
		$order = $this->where($sql)->order('`id` DESC')->find();
		return $order;
	}
	
	// 更新订单信息
	public function u($data = 0) {
		if (empty($data)) return;
		$order = $this->save( $data );
		return $order;
	}
	
	// 获取订单创建者编号
	public function rUid($id = 0) {
		$sql = array('id' => (int)$id);
		$order = $this->field('user_id')->where($sql)->find();
		return $order['user_id'];
	}
	
	// 获取订单信息（列表）
	public function rList($user_id = 0, $page = 1, $limit = 10) {
		$sql = array();
		if ($user_id != 1)
			$sql['user_id'] = (int)$user_id;
		$sql['status'] = array('NEQ', 1);
		$orderList = $this->where($sql)->page($page)->limit($limit)->order('`id` DESC')->select();
		return $orderList;
	}
	
	// 获取订单数量
	public function rCount($user_id = 0) {
		$sql = array();
		if ($user_id != 1)
			$sql['user_id'] = (int)$user_id;
		$sql['status'] = array('NEQ', 1);
		$count = $this->field('count(1) AS count')->where($sql)->find();
		return $count['count'];
	}
	
	// 删除订单
	public function d($id = 0) {
		$order = $this->delete((int)$id);
		return $order;
	}
}