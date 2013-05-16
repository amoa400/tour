<?php

class PointTicketModel extends Model {
	// 创建
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}

	// 获取门票
	public function r($id = 0) {
		$sql = array('ticket_id' => (int)$id);
		$ticket = $this->where($sql)->find();
		return $ticket;
	}

	// 获取门票列表
	public function rList($id = 0) {
		$sql = array('ticket_id' => (int)$id);
		$ticketList = $this->where($sql)->select();
		return $ticketList;
	}

	// 查询所有门票
	public function rAll($id = 0) {
		$sql = array('point_id' => (int)$id);
		$ticketList = $this->join('`tour_ticket` ON `tour_ticket`.`id`=`tour_point_ticket`.`ticket_id`')->where($sql)->order('`tour_point_ticket`.`show_id` ASC')->select();
		return $ticketList;
	}
	
	// 删除门票
	public function dByTicketId($id = 0) {
		$sql = array('ticket_id' => (int)$id);
		$this->where($sql)->delete();
	}
}