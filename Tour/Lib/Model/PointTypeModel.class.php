<?php

class PointTypeModel extends Model {
	// 获取景点类型列表
    public function rList(){
		$pointTypeList = $this->select();
		return $pointTypeList;
    }
}