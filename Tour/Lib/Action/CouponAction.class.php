<?php

class CouponAction extends Action {
	// 获取优惠券信息
	public function getInfo($data = 0) {
		if (empty($data)) $data = $_POST;
		if ($data['ajax'] == 1) $ajax = true;
		else $ajax = false;
		$code = $data['code'];
		$line_id = $data['line_id'];
		if (strlen($code) == 6) {
			$agent = D('Agent')->rByCode($code);
			if (empty($agent)) {
				if ($ajax) $this->ajaxReturn(array(error => '1'));
				else return;
			}
			$data = array();
			$data['used'] = 0;
			$data['code'] = $code;
			$data['price'] = D('LineContent')->rYouhui($line_id);
			if ($ajax) $this->ajaxReturn($data);
			else return $data;
			die();
		}

		$coupon = D('Coupon')->rByCode($this->_post('code'));
		if (empty($coupon)) $this->ajaxReturn(array(error => '1'));

		// 按类型处理
		// 1：分销优惠券（直接减去价格）
		if ($coupon['type_id'] == 1) {
			if ($coupon['line_id'] != $this->_post('line_id')) $this->ajaxReturn(array(error => '1'));
			$this->ajaxReturn($coupon);
		}
	}
	
	// 获取优惠券列表
	public function getList() {
		isLogin();
		if ($_SESSION['group_id'] != 3 && $_SESSION['group_id'] != 4 && $_SESSION['group_id'] != 5) $this->error('您无权生成优惠码');
		$couponList = D('Coupon')->rList();
		foreach($couponList as $key => $item) {
			$couponList[$key]['used_time'] = intToTime($couponList[$key]['used_time']);
		}
		$this->ajaxReturn($couponList);
	}
	
	// 新增优惠券
	public function create() {
		isLogin();
		if ($_SESSION['group_id'] != 3 && $_SESSION['group_id'] != 4 && $_SESSION['group_id'] != 5) $this->error('您无权生成优惠码');
		
		$highPrice = D('Line')->rPrice($this->_post('line_id'));
		$lowPrice = D('LineContent')->rFenxiao($this->_post('line_id'), $_SESSION['group_id']-2);
		$price = (int)$this->_post('price');
		if ($price <= 0) $this->error('优惠价格必须是正数');
		if ($price > $highPrice - $lowPrice) $this->error('此线路优惠价格不能超过'.($highPrice - $lowPrice).'元');

		$tot = (int)$this->_post('num');
		if ($tot > 50) $tot = 50;
		while (1) {
			$data =array();
			$codeList = $this->getCode($tot);
			foreach($codeList as $item) {
				$data[] = array();
				$cnt = count($data)-1;
				$data[$cnt]['type_id'] = (int)$this->_post('type_id');
				$data[$cnt]['line_id'] = (int)$this->_post('line_id');
				$data[$cnt]['price'] = (int)$this->_post('price');
				$data[$cnt]['author_id'] = $_SESSION['id'];
				$data[$cnt]['generate_time'] = getTime();
				$data[$cnt]['code'] = $item;
			}
			$ret = D('Coupon')->cList($data);
			if($ret) break;
		}
		$this->assign('codeList', $codeList);
		$this->display('Fenxiao:couponCreateSucceed');
	}
	
	// 获取优惠代码
	private function getCode($tot) {
		$code = array();
 		for ($i = 0; $i < $tot; $i++) {
			$s = '';
			for ($j = 0; $j < 4; $j++) $s .= chr(ord('A')+rand(0, 25));
			$s .= '-';
			for ($j = 0; $j < 4; $j++) $s .= chr(ord('A')+rand(0, 25));
			$s .= '-';
			for ($j = 0; $j < 4; $j++) $s .= chr(ord('A')+rand(0, 25));
			$code[] = $s;
		}
		//$code[] = 'CPAB-FLOW-YQBE';
		return $code;
	}
}