<?php

class LineDayModel extends Model {

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
		$sql = array('line_id' => (int)$data['line_id'], 'id' => (int)$data['id']);
		$line = $this->where($sql)->save($data);
		return $line;
	}

	
	// 获取线路
    public function r($line_id = 0, $id = 0){
		$sql = array('line_id' => (int)$line_id, 'id' => (int)$id);
		$line = $this->where($sql)->find();
		return $line;
    }

}