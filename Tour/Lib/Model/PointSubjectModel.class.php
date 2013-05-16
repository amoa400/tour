<?php

class PointSubjectModel extends Model {
	// 获取景点类型列表
    public function rList(){
		$pointTypeList = $this->select();
		return $pointTypeList;
    }
	
    public function rName($subject_id = 0){
		$sql = array('id' => (int)$subject_id);
		if (empty($subject_id)) return false;
 		$subject = $this->where($sql)->find();
		return $subject['name'];
    }
}