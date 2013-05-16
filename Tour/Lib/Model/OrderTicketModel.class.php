<?php

class OrderTicketModel extends Model {
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
	
	// 通过订单编号获取信息
	public function rByOrderId($order_id = 0) {
		$sql = array();
		$sql['order_id'] = $order_id;
		$ticketList = $this->join('`tour_ticket` ON `tour_ticket`.`id`=`tour_order_ticket`.`ticket_id`')->where($sql)->select();
		return $ticketList;
	}
	
	// 通过订单编号获取信息
	public function dByOrderId($order_id = 0) {
		$sql = array();
		$sql['order_id'] = $order_id;
		$this->where($sql)->delete();
	}
}