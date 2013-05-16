<?php

class LineScheduleModel extends Model {
	// 创建新行程
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	// 创建新行程（多重数据）
	public function cMulti($data = 0) {
		if (empty($data)) $data = $_POST;
		$flag = false;
		$sql = 'INSERT INTO `tour_line_schedule` (`id`, `line_id`, `date`, `tot`, `price`, `limit`) VALUES';
		foreach($data as $item) {
			if ($flag) $sql .= ',';
			else $flag = true;
			$sql .= '(';
			$sql .= "'$item[id]',";
			$sql .= "'$item[line_id]',";
			$sql .= "'$item[date]',";
			$sql .= "'0',";
			$sql .= "'$item[price]',";
			$sql .= "'$item[limit]'";
			$sql .= ')';
		}
		$sql .= ';';
		$this->query($sql);
	}

	// 获取行程信息
    public function r($line_id = 0, $id = 0){
		$sql = array('line_id' => (int)$line_id, 'id' => (int)$id);
		$schedule = $this->where($sql)->find();
		return $schedule;
    }
	// 获取行程信息（通过线路编号、日期）
    public function rByLineIdDate($line_id = 0, $date = 0, $limit = 0){
		$line_id = (int)$line_id;
		$date = isDate($date, 'Y-m-d');
		if (empty($line_id) || empty($date)) return;
		$sql['line_id'] = $line_id;
		$sql['date'] = array('EGT', $date);
		
		if (empty($limit)) 
			$LineScheduleList = $this->where($sql)->select();
		else
			$LineScheduleList = $this->where($sql)->limit($limit)->select();
		return $LineScheduleList;
    }
	
	// 删除行程信息（通过日期）
	public function dByDate($line_id = 0, $date = 0) {
		$sql = array();
		$sql['line_id'] = (int)$line_id;
		$sql['date'] = array('EGT', $date);
		$this->where($sql)->delete();
	}
	
	// 获取行程最大编号
    public function rMaxId($line_id = 0){
		$sql = array('line_id' => (int)$line_id);
		$maxId = $this->field('MAX(id) AS maxId')->where($sql)->find();
		return $maxId['maxId'];
    }
}