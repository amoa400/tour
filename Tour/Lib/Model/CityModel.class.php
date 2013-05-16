<?php

class CityModel extends Model {
	// 获取城市信息
    public function r($province_id = 0, $city_id = 0){
		$sql = array('province_id' => (int)$province_id, 'id' => (int)$city_id);
		$city = $this->where($sql)->find();
		return $city;
    }
	
	// 获取城市姓名
    public function rName($province_id = 0, $city_id = 0){
		$sql = array('province_id' => (int)$province_id, 'id' => (int)$city_id);
		if (empty($province_id) || empty($city_id)) return false;
		$city = $this->field('name')->where($sql)->find();
		return $city['name'];
    }
	
	// 获取城市列表
	public function rList($province_id = 0) {
		$sql = array();
		if ((int)$province_id != 0)
			$sql['province_id'] = (int)$province_id;
		$cityList = $this->where($sql)->order('`count` DESC')->select();
		return $cityList;
	}

	// 获取城市信息（通过名字）
    public function rByName($name = ''){
		$sql = array('name' => $name);
 		$province = $this->where($sql)->find();
		return $province;
    }
	
	// 城市线路数修改
	public function countChange($province_id, $city_id, $value = 1, $type = 1) {
		$sql = array('province_id' => $province_id, 'id' => $city_id);
		if ($type == 1)
			$this->where($sql)->setInc('count', $value);
		else 
			$this->where($sql)->setDec('count', $value);
	}
}