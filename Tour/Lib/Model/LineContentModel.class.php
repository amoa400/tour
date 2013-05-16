<?php

class LineContentModel extends Model {

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
	
	// 获取分销价格
	public function rFenxiao($id = 0) {
		$sql = array('id' => (int)$id);
		$price = $this->field('fenxiao_price1, fenxiao_price2, fenxiao_price3, fenxiao_youhui')->where($sql)->find();
		return $price;
	}
	
	// 获取分销优惠价
	public function rYouhui($id = 0) {
		$sql = array('id' => (int)$id);
		$price = $this->field('fenxiao_youhui')->where($sql)->find();
		$price = $price['fenxiao_youhui'];
		return $price;
	}
}