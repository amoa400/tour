<?php

class PointPhotoModel extends Model {
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
	
	// 更新线路
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$sql = array('point_id' => (int)$data['point_id'], 'id' => (int)$data['id']);
		$point = $this->where($sql)->save( $data );
		return $point;
	}
}