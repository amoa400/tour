<?php

class TicketScheduleModel extends Model {
	protected $fields = array(
		'id', 'ticket_id', 'date', 'price', 'point_id'
	);
	// 获取价目表
	public function rList($ticket_id = 0) {
		$sql = array();
		$sql['ticket_id'] = $ticket_id;
		$sql['date'] = array('EGT', getCntDate());
		$scheduleList = $this->where($sql)->select();
		return $scheduleList;
	}
	
	// 获取价目表
	public function rList2($point_id = 0, $date = '') {
		$sql = array();
		$sql['point_id'] = $point_id;
		$sql['date'] = $date;
		$scheduleList = $this->join('`tour_point_ticket` ON `tour_point_ticket`.`ticket_id` = `tour_ticket_schedule`.`ticket_id`')->where($sql)->order('`show_id` ASC')->select();
		return $scheduleList;
	}
	
	// 获取日程
	public function r($ticket_id = 0, $date = 0) {
		$sql = array();
		$sql['ticket_id'] = $ticket_id;
		$sql['date'] = $date;
		$schedule = $this->where($sql)->find();
		return $schedule;
	}
	
	// 获取价格
	public function rPrice($ticket_id = 0, $date = 0) {
		$sql = array();
		$sql['ticket_id'] = $ticket_id;
		$sql['date'] = $date;
		$schedule = $this->where($sql)->find();
		return $schedule['price'];
	}
	
	// 删除行程信息（通过日期）
	public function dByDate($ticket_id = 0, $date = 0) {
		$sql = array();
		$sql['ticket_id'] = (int)$ticket_id;
		$sql['date'] = array('EGT', $date);
		$this->where($sql)->delete();
	}

	// 获取行程最大编号
    public function rMaxId($ticket_id = 0){
		$sql = array('ticket_id' => (int)$ticket_id);
		$maxId = $this->field('MAX(id) AS maxId')->where($sql)->find();
		return $maxId['maxId'];
    }
	
	// 创建新行程（多重数据）
	public function cMulti($data = 0) {
		if (empty($data)) $data = $_POST;
		$flag = false;
		$sql = 'INSERT INTO `tour_ticket_schedule` (`id`, `ticket_id`, `date`, `price`, `deadline`) VALUES';
		foreach($data as $item) {
			if ($flag) $sql .= ',';
			else $flag = true;
			$sql .= '(';
			$sql .= "'$item[id]',";
			$sql .= "'$item[ticket_id]',";
			$sql .= "'$item[date]',";
			$sql .= "'$item[price]',";
			$sql .= "'$item[deadline]'";
			$sql .= ')';
		}
		$sql .= ';';
		$this->query($sql);
	}
}