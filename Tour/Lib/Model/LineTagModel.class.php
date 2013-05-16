<?php

class LineTagModel extends Model {
	// 获取景点类型列表
    public function rList(){
		$tagList = $this->order('`show_id` ASC')->select();
		return $tagList;
    }
}