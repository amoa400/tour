<?php

class TicketModel extends Model {
	// 创建新门票
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 更新门票
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$line = $this->save( $data );
		return $line;
	}
	
	// 获取门票信息
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$ticket = $this->where($sql)->find();
		return $ticket;
    }
	
	// 获取门票列表
	public function rRecList() {
		$ticketList = $this->field('`id`, `name`, `ad`, `comment_price`, `price`')->order('`show_id` DESC')->limit(10)->select();
		return $ticketList;
	}
	
	// 获取门票列表
	public function rRec2List() {
		$ticketList = $this->field('`tour_ticket`.`name`, `tour_point`.`subject_id`, `tour_ticket`.`price`, `tour_point_ticket`.`point_id`, `tour_point_ticket`.`ticket_id`')->join('`tour_point_ticket` ON `tour_ticket`.`id`=`tour_point_ticket`.`ticket_id`')->join('`tour_point` ON `tour_point_ticket`.`point_id`=`tour_point`.`id`')->order('`tour_ticket`.`show_id` DESC')->select();
		return $ticketList;
	}
	
	// 获取门票列表
	public function rHotList() {
		$ticketList = $this->field('`id`, `name`, `ad`, `comment_price`, `price`')->order('`sell_count` DESC')->limit(10)->select();
		return $ticketList;
	}
	
	// 获取门票列表
	public function rAllList() {
		$ticketList = $this->order('`id` ASC')->select();
		return $ticketList;
	}
}