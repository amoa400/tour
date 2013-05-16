<?php

class SchoolModel extends Model {
	// 获取学校名字
    public function rName($id = 0){
		$sql = array('id' => (int)$id);
 		$school = $this->where($sql)->find();
		return $school['name'];
    }
	
	// 获取学校列表
	public function rList() {
		$schoolList = $this->select();
		return $schoolList;
	}

}