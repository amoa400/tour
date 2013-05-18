<?php

class PointModel extends Model {
	// 创建新景点
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 获取景点信息
	public function r($id = 0) {
		$sql = array('id' => (int)$id);
		$point = $this->where($sql)->find();
		return $point;
	}
	
	// 更新线路
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$line = $this->save( $data );
		return $line;
	}
	
	// 获取景点信息（通过列表）
    public function rByList($pointIDList = 0){
		$map['id'] = array('in', $pointIDList);
		$pointList = $this->where($map)->select();
		$map = array();
		$map['point_id'] = array('in', $pointIDList);
		$photoList = D('PointPhoto')->where($map)->order('`point_id` ASC, `id` ASC')->select();
		foreach($pointList as $id => $item) {
			$pointList[$id]['photo'] = array();
			foreach($photoList as $photo) {
				if ($photo['point_id'] == $item['id'])
					$pointList[$id]['photo'][] = $photo;
			}
		}
		return $pointList;
    }
	
	// 获取景点信息（通过城市）
    public function rByCity($province_id = 0, $city_id = 0){
		$sql = array('province_id' => (int)$province_id, 'city_id' => (int)$city_id);
		$pointList = $this->field('`id`, `name_abb`, `count`')->where($sql)->order('`count` DESC')->select();
		return $pointList;
    }
	
	// 获取景点信息（通过字符串）
	public function rByString($s = 0, $photo = false) {
		$sql['id'] = array('IN', $s);
		$pointList = $this->where($sql)->select();
		if ($photo) {
			$sql = array();
			$sql['point_id'] = array('IN', $s);
			$photoList = D('PointPhoto')->where($sql)->order('`point_id` ASC, `id` ASC')->select();
			foreach($pointList as $id => $item) {
				$pointList[$id]['photo'] = array();
				foreach($photoList as $photo) {
					if ($photo['point_id'] == $item['id'])
						$pointList[$id]['photo'][] = $photo;
				}
			}
		}
		return $pointList;
	}

	// 获取景点列表
    public function rList($province_id = 0, $city_id = 0){
		$sql = array();
		if ((int)$province_id != 0 )
			$sql['province_id'] = (int)$province_id;
		if ((int)$city_id != 0 )
			$sql['city_id'] = (int)$city_id;
		$pointList = $this->where($sql)->order('`count` DESC')->select();
		return $pointList;
    }
	
	// 获取景点列表（通过省份列表）
	public function rListByProvinceList($provinceList = 0, $field = 'all', $order = 'none') {
		if ($provinceList == 'chujing') 
			 $map['province_id'] = array('NOT in', array_merge(A('Line')->zhoubian, A('Line')->guonei));
		else 
			$map['province_id'] = array('in', $provinceList);
		
		$pointList = $this->where($map);
		if ($field != 'all') $pointList = $pointList->field($field);
		if ($order != 'none') $pointList = $pointList->order($order);
		$pointList = $pointList->select();
		return $pointList;
	}
	
	// 获取景点列表
	public function rListAll() {
		$pointList = $this->select();
		return $pointList;
	}
	
	// 搜索景点
	public function search($data = 0, $page = 1, $limit = 10) {
		$sql = array();
		if (!empty($data['province_id'])) 
			$sql['province_id'] = (int)$data['province_id'];
		if (!empty($data['city_id'])) 
			$sql['city_id'] = (int)$data['city_id'];
		if (!empty($data['subject_id'])) 
			$sql['subject_id'] = array('LIKE', '%,'.$data['subject_id'].',%');
		if (!empty($data['name']))
			$sql['name'] = array('LIKE', '%'.$data['name'].'%');
		$sql['price'] = array('NEQ', 0);
		if ($data['sort'] == 0) $order = '`id` ASC'; 
		if ($data['sort'] == 2) $order = '`sell_count` DESC'; 
		if ($data['sort'] == 3) $order = '`comment_count` DESC'; 
		if ($data['sort'] == 4) $order = '`satisfaction` DESC'; 
		if ($data['sort'] == 5) $order = '`price` ASC'; 
		if ($data['sort'] == 6) $order = '`price` DESC'; 
		$pointList['count'] = $this->field('COUNT(1) AS count')->where($sql)->find();
		if ($data['only_count']) return $pointList['count']['count'];
		$pointList['data'] = $this->where($sql)->order($order)->page($page)->limit($limit)->select();
		return $pointList;
	}
}