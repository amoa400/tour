<?php

class LineModel extends Model {

	// 创建新线路
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 更新线路
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$line = $this->save( $data );
		return $line;
	}

	// 获取线路
    public function r($id = 0){
		$sql = array('id' => (int)$id);
		$line = $this->where($sql)->find();
		return $line;
    }
	
	// 获取线路全部信息
    public function rAll($id = 0){
		$sql = array('tour_line.id' => (int)$id);
		$line = $this->join('`tour_line_content` ON `tour_line_content`.id = `tour_line`.id')->where($sql)->find();
		$sql = array('line_id' => $id);
		$line['day'] = D('LineDay')->where($sql)->order('`id` ASC')->select();
		$itemList = D('LineItem')->where($sql)->order('`line_day_id` ASC, `id` ASC')->select();
		foreach($line['day'] as $id => $item) {
			$line['day'][$id]['item'] = array();
			foreach($itemList as $item2) {
				if ($item2['line_day_id'] == $item['id'])
					$line['day'][$id]['item'][] = $item2;
			}
		}
		return $line;
    }
	
	// 获取所有线路
	public function rListAll() {
		$lineList = $this->select();
		return $lineList;
	}
	
	// 获取线路价格
	public function rPrice($id = 0) {
		$sql = array('id' => (int)$id);
		$price = $this->field('price')->where($sql)->find();
		$price = $price['price'];
		return $price;
	}

	// 获取线路列表
    public function rList2($type_id = 0, $from_province_id = 0, $from_city_id = 0, $to_province_id = 0, $to_city_id = 0, $count = false){
		$sql = array();
		$sql['type_id'] = (int)$type_id;
		$sql['from_province_id'] = (int)$from_province_id;
		$sql['from_city_id'] = (int)$from_city_id;
		if ($to_province_id != 0)
			$sql['to_province_id'] = (int)$to_province_id;
		if ($to_city_id != 0)
			$sql['to_city_id'] = (int)$to_city_id;
		if ($count)
			$lineList = $this->field('`id`, `duration`, `point_type_id`')->where($sql)->order('`id` DESC')->select();
		else
			$lineList = $this->where($sql)->order('`id` DESC')->select();
		return $lineList;
    }
	
	// 获取线路列表
    public function rList($para = array(), $limit = 10){
		$sql = array();
		$sql['type_id'] = (int)$para['type_id'];
		$sql['from_province_id'] = (int)$para['from_province_id'];
		$sql['from_city_id'] = (int)$para['from_city_id'];
		if (!empty($para['z'])) {
			if ($para['z'] != 3) {
				if ($para['z'] == 1) $provinceList = A('Line')->zhoubian;
				else $provinceList = A('Line')->guonei;
				$s = '';
				foreach($provinceList as $item) {
					$s .= ';'.(int)$item.',|';
				}
				$s .= 't';
				$sql['to_city_id'] = array('EXP', 'REGEXP \''.$s.'\'');
			}
			else {
				$provinceList = array_merge(A('Line')->zhoubian, A('Line')->guonei);
				$s = '';
				foreach($provinceList as $item) {
					$s .= ';'.(int)$item.',|';
				}
				$s .= 't';
				$sql['to_city_id'] = array('EXP', 'NOT REGEXP \''.$s.'\'');
			}
		}
		if (!empty($para['to_province_id'])) {
			if (empty($para['to_city_id']))
				$sql['to_city_id'] = array('LIKE', '%;'.(int)$para['to_province_id'].',%');
			else
				$sql['to_city_id'] = array('LIKE', '%;'.(int)$para['to_province_id'].','.(int)$para['to_city_id'].';%');
		}
		switch($para['duration_id']) {
			case '1': $sql['duration'] = 1; break;
			case '2': $sql['duration'] = 2; break;
			case '3': $sql['duration'] = 3; break;
			case '4': $sql['duration'] = array('BETWEEN', '4,6');  break;
			case '5': $sql['duration'] = array('BETWEEN', '7,9'); break;
			case '6': $sql['duration'] = array('EGT', 10); break;
			case '7': $sql['duration'] = array('EGT', 4); break;
			case '8': $sql['duration'] = array('EGT', 7); break;
		}
		if (!empty($para['point_type_id'])) {
			if (empty($para['point_type_id_t'])) 
				$sql['point_type_id'] = array('LIKE', '%,'.(int)$para['point_type_id'].',%');
			else
				$sql['point_type_id'] = array('EXP', 'REGEXP \'^,'.(int)$para['point_type_id'].',\'');
		}
		if (!empty($para['point_id']))
			$sql['point_id'] = array('LIKE', '%,'.(int)$para['point_id'].',%');
		if (!empty($para['tag_id'])) {
			$sql['tag_id'] = array('LIKE', '%,'.(int)$para['tag_id'].',%');
		}
		if ($para['order_id'] == 7) {
			if (!empty($para['begin_price']) && !empty($para['end_price']))
				$sql['price'] = array('BETWEEN', (int)$para['begin_price'].','.(int)$para['end_price']);
			else
			if (!empty($para['begin_price']))
				$sql['price'] = array('EGT', (int)$para['begin_price']);
			else
			if (!empty($para['end_price']))
				$sql['price'] = array('ELT', (int)$para['end_price']);
		}
		switch($para['order_id']) {
			case '1': $order = '`price` ASC'; break;
			case '2': $order = '`sell_count` DESC'; break;
			case '3': $order = '`comment_count` DESC'; break;
			case '4': $order = '`satisfaction` DESC';  break;
			case '5': $order = '`price` ASC'; break;
			case '6': $order = '`price` DESC'; break;
			case '7': $order = '`recommend` DESC, `id` DESC'; break;
			default: $order = '`recommend` DESC, `id` DESC'; break;
		}

		$para['begin_date'] = isDate($para['begin_date'], 'Y-m-d');
		$para['end_date'] = isDate($para['end_date'], 'Y-m-d');
		if (!empty($para['begin_date']) && !empty($para['end_date'])) {
			$sql['LS.line_id'] = array('NEQ', 'NULL');
			$lineList['count'] = $this->field('COUNT(1) AS count')->join('(SELECT DISTINCT `line_id` FROM `tour_line_schedule` WHERE `date`>=\''.$para['begin_date'].'\' AND `date`<=\''.$para['end_date'].'\') AS LS ON `tour_line`.id = `LS`.line_id')->where($sql)->select();
			$lineList['data'] = $this->join('(SELECT DISTINCT `line_id` FROM `tour_line_schedule` WHERE `date`>=\''.$para['begin_date'].'\' AND `date`<=\''.$para['end_date'].'\') AS LS ON `tour_line`.id = `LS`.line_id')->where($sql)->page((int)$para['page'].','.$limit)->order($order)->select();
		}
		else {
			$lineList['count'] = $this->field('COUNT(1) AS count')->where($sql)->select();
			$lineList['data'] = $this->where($sql)->page((int)$para['page'].','.$limit)->order($order)->select();
		}

		return $lineList;
    }
	
	// 获取线路列表3
	public function rList3($page = 1, $limit = 10) {
		$lineList = $this->join('`tour_line_content` ON `tour_line_content`.id = `tour_line`.id')->page($page)->limit($limit)->order('`tour_line`.`id` ASC')->select();
		return $lineList;
		
	}
	
	// 获取所有线路
	public function rAllList() {
		$lineList = $this->select();
		return $lineList;
	}
	
	// 获取线路数量
	public function rCount() {
		$count = $this->field('COUNT(1) AS `count`')->find();
		return $count['count'];
	}
}