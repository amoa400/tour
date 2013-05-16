<?php

class OrderAction extends Action {
	// 显示订单
	public function show() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		$order = D('Order')->r($id);
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['bus'] = D('RegularBus')->r($order['line_id'], $order['bus_id']);
		$order['insurance'] = D('OrderInsurance')->rListByOrderId($id, true);
		$order['tourist'] = D('OrderTourist')->rListByOrderId($id);
		if ($order['type'] == 2) 
			$order['team'] = D('OrderTeam')->r($id);
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (empty($coupon) || $coupon['used'] != 0) unset($data['coupon']);
			else $order['coupon'] = $coupon;
		}
		if ($order['type'] == 4) {
			$order['ticketList'] = D('OrderTicket')->rByOrderId($id);
			foreach($order['tourist'] as $key => $item) {
				foreach($order['ticketList'] as $item2) {
					if ($item['ticket_id'] == $item2['ticket_id']) {
						$order['tourist'][$key]['ticket_name'] = $item2['name'];
						break;
					}
				}
			}
		}
		
		$order = $this->format($order);
		$this->assign('order', $order);
		$this->assign('headTitle', '订单详情__编号'.$id);
		$this->display();
	}
	
	// 删除订单
	public function remove() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		$order = D('Order')->r($id);
		if ($order['status'] != 1 && $order['status'] != 2 && $order['status'] != 3) $this->error('无法取消订单');
		// 优惠券
		if (!empty($order['coupon'])) {
		}
		D('Order')->d($id);
		$this->success('成功取消订单');
	}

	// 0、预定订单
	public function order() {
		isLogin();
		
		$line = D('Line')->r($this->_post('id'));
		if ($line['type_id'] == 1) {
			$id = (int)$this->_post('id');
			$departure_date = $this->_post('departure_date');
			if (empty($id) || empty($departure_date))
				$this->error('参数错误');
			$data = array();
			$data['type'] = 1;
			$data['status'] = 1;
			$data['submit_time'] = getTime();
			$data['user_id'] = (int)$_SESSION['id'];
			$data['line_id'] = $id;
			$data['school_id'] = (int)$_SESSION['school_id'];
			$data['line_name'] = '<'.$line['name'].'>'.$line['character'];
			$data['from_province_id'] = 1;
			$data['from_city_id'] = 1;
			$schedule = D('LineSchedule')->r($data['line_id'], $departure_date);
			$data['departure_date'] = $schedule['date'];
			$data['return_date'] = Date('Y-m-d', strtotime($schedule['date'])+($line['duration']-1)*86400);
			$data['line_price'] = $schedule['price'];
			$data['people_count'] = (int)$this->_post('people_count');
			$id = D('Order')->c($data);
			$this->redirect('Order/step1?id='.$id);
		}
		else {
			$data = array();
			$data['type'] = 2;
			$data['status'] = 1;
			$data['submit_time'] = getTime();
			$data['user_id'] = (int)$_SESSION['id'];
			$data['line_id'] = (int)$this->_post('id');
			$data['school_id'] = (int)$_SESSION['school_id'];
			$data['line_name'] = '<'.$line['name'].'>'.$line['character'];
			if (empty($data['line_id'])) {
				$data['line_name'] = '未填写';
			}
			$data['from_province_id'] = 1;
			$data['from_city_id'] = 1;
			$id = D('Order')->c($data);
			$data2 = array();
			$data2['id'] = $id;
			$data2['destination'] = '<'.$line['name'].'>'.$line['character'];
			if (empty($data['line_id'])) {
				$data2['destination'] = '';
			}
			$data2['duration'] = (int)$line['duration'];
			D('OrderTeam')->c($data2);
			$this->redirect('Order/teamStep1?id='.$id);
		}
	}
	
	// 1、填写订单
	public function step1() {
		$this->check_permission($this->_get('id'));

		$id = $this->_get('id');
	
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法修改订单');
 		$order['busList'] = D('RegularBus')->rList($order['line_id']);
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['insurance'] = D('Insurance')->rListByString($order['line']['insurance_id']);
		foreach($order['insurance'] as $idd => $item) {
			$tmp = D('OrderInsurance')->r($id, $item['id']);
			$order['insurance'][$idd]['count'] = $tmp['count'];
		}
		$order = $this->format($order);
		
		$this->assign('order', $order);
		$this->assign('headTitle', '填写订单__产品预订');
		$this->display();
	}
	
	// 1、提交第一步
	public function step1Do() {
		$this->check_permission($this->_post('id'));

		// 参数赋值
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['bus_id'] = (int)$this->_post('bus_id');
		$data['privilege_di'] = $this->_post('privilege_di');
		$data['surrounding_departrue']  = $this->_post('surrounding_departrue');
		$data['coupon'] = $this->_post('coupon');
		
		if (empty($data['bus_id'])) $this->error('请选择上车地点');
		if (!empty($data['privilege_di']))
			$data['privilege_di'] = 1;
		else
			$data['privilege_di'] = 0;
		if (!empty($data['surrounding_departrue']))
			$data['surrounding_departrue'] = 1;
		else
			$data['surrounding_departrue'] = 0;
			
		$order = D('Order')->r($data['id']);
		if ($order['status'] != 1) $this->error('无法修改订单');

		// 删除所有保险
		D('OrderInsurance')->dByOrderId($data['id']);
		foreach($_POST AS $id => $item) {
			// 插入保险
			if (!strstr($id, 'insurance')) continue;
			$insuranceId = split('_', $id);
			$insuranceId = (int)$insuranceId[1];
			$data2 = array();
			$data2['order_id'] = $data['id'];
			$data2['insurance_id'] = $insuranceId;
			$data2['count'] = (int)$item;
			if ($data2['count'] != 0) D('OrderInsurance')->c($data2);
		}
		// 是否使用了优惠券
		if (!empty($data['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $data['coupon'], 'line_id' => $order['line_id']));
			if (empty($coupon) || $coupon['used'] != 0) unset($data['coupon']);
		}
		$order = D('Order')->u($data);
		
		// 更新总费用
		$data2 = array();
		$data2['id'] = $data['id'];
		$data2['price'] = $this->calPrice($data2['id']);
		$order = D('Order')->u($data2);

		$this->redirect('Order/step2?id='.$this->_post('id'));
	}

	// 2、填写联系人
	public function step2() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法修改订单');
		$otList = D('OrderTourist')->rListByOrderId($id);
		$this->assign('order', $order);
		$this->assign('otList', $otList);
		$this->assign('headTitle', '填写出游人__产品预订');
		$this->display();
	}
	
	// 2、提交第二步
	public function step2Do() {
		$this->check_permission($this->_post('id'));
		
		$order = D('Order')->r($this->_post('id'));
		if ($order['status'] != 1) $this->error('无法修改订单');
		
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['contact_name'] = (string)$this->_post('contact_name');
		$data['contact_phone'] = (string)$this->_post('contact_phone');
		$data['contact_phone2'] = (string)$this->_post('contact_phone2');
		$data['contact_email'] = (string)$this->_post('contact_email');
		D('Order')->u($data);
		
		$count = (int)$this->_post('count');;
		$touristName = $this->_post('tourist_name');
		$touristCard = $this->_post('tourist_card');
		$touristPhone = $this->_post('tourist_phone');
		D('OrderTourist')->dByOrderId($data['id']);
		for($i = 0; $i < $count; $i++) {
			$data2 = array();
			$data2['order_id'] = $data['id'];
			$data2['tourist_id'] = $i+1;
			$data2['name'] = $touristName[$i];
			$data2['card'] = $touristCard[$i];
			$data2['phone'] = $touristPhone[$i];
			D('OrderTourist')->c($data2);
		}

		$this->redirect('Order/step3?id='.$this->_post('id'));
	}
	
	// 3、核对订单
	public function step3() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法再次提交订单');
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['bus'] = D('RegularBus')->r($order['line_id'], $order['bus_id']);
		$order['insurance'] = D('OrderInsurance')->rListByOrderId($id, true);
		$otList = D('OrderTourist')->rListByOrderId($id);
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (empty($coupon) || $coupon['used'] != 0) unset($data['coupon']);
			else $order['coupon'] = $coupon;
		}
		$order = $this->format($order);
		
		$this->assign('order', $order);
		$this->assign('otList', $otList);
		$this->assign('headTitle', '核对订单__产品预订');
		$this->display();
	}
	
	// 3、核对订单
	public function step3Do() {
		$this->check_permission($this->_get('id'));
		$id = (int)$this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法再次提交订单');
		
		// 处理优惠券
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (!empty($coupon) && $coupon['used'] == 0) {
				// 利润计算
				$priceOrigin = D('Line')->rPrice($order['line_id']);
				$price = D('LineContent')->rFenxiao($order['line_id']);
				$agent = D('Agent')->rByCode($order['coupon']);
				$author_id = $agent['user_id'];
				// 个人利润
				$data = array();
				$data['user_id'] = $agent['user_id'];
				$data['type_id'] = 1;
				$data['order_id'] = $order['id'];
				$data['status'] = 1;
				$data['author_id'] = $author_id;
				$data['time'] = getTime();
				if ($agent['type_id'] == 1)
					$data['income'] = ($priceOrigin - $price['fenxiao_price1'] - $price['fenxiao_youhui'])*$order['people_count'];
				if ($agent['type_id'] == 2)
					$data['income'] = ($priceOrigin - $price['fenxiao_price2'] - $price['fenxiao_youhui'])*$order['people_count'];
				if ($agent['type_id'] == 3)
					$data['income'] = ($priceOrigin - $price['fenxiao_price3'] - $price['fenxiao_youhui'])*$order['people_count'];
				D('AgentIncome')->c($data);
				// 二级代理利润
				if ($agent['type_id'] == 3){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price3'] - $price['fenxiao_price2'])*$order['people_count'];
					$agent = D('Agent')->r($agent['father_id']);
					D('AgentIncome')->c($data);
				}
				// 一代理利润
				if ($agent['type_id'] == 2){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price2'] - $price['fenxiao_price1'])*$order['people_count'];
					D('AgentIncome')->c($data);
				}
			}
		}
		
		$data = array();
		$data['id'] = $id;
		$data['status'] = 3;
		D('Order')->u($data);

		$this->redirect('Order/pay?id='.$id);
	}
	
	// 4、签约付款
	public function pay() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 3) $this->error('无法支付此订单');
		$order['need_pay'] = $order['price']-$order['payed_money'];
		if ($order['need_pay'] < 0) $order['need_pay'] = 0;
		$this->assign('order', $order);
		$this->assign('headTitle', '签约付款__产品预订');
		$this->display();
	}
	
	// 4、签约付款
	public function payDo() {
		$this->check_permission($this->_post('id'));
		$id = $this->_post('id');
		$order = D('Order')->r($id);
		if ($order['status'] != 3) $this->error('无法支付此订单');
		D('OrderPay')->c();
		$data = array();
		$data['id'] = $id;
		$data['status'] = 6;
		D('Order')->u($data);
		$this->redirect('Order/succeed?id='.$id);
	}
	
	// 付款完成
	public function payDone() {
		$this->check_permission($this->_get('id'));
		$order = D('order')->r($this->_get('id'));
		if ($order['status'] != 3) $this->error('无法支付此订单');
		if ((int)$order['payed_money'] >= (int)$order['price']) {
			$data = array();
			$data['id'] = (int)$this->_get('id');
			$data['status'] = 4;
			D('Order')->u($data);
			// 处理优惠券
			if (!empty($order['coupon'])) {
				$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
				if (!empty($coupon) && $coupon['used'] == 0) {
					$data = array();
					$data['status'] = 2;
					D('AgentIncome')->uByOrder($data, $this->_get('id'));
					$incomeList = D('AgentIncome')->rByOrder($this->_get('id'));
					foreach($incomeList as $item) {
						$agent = D('Agent')->r($item['user_id']);
						$fatherMoney = 0;
						foreach($incomeList as $item2) {
							if ($agent['father_id'] == $item2['user_id']) $fatherMoney = $item2['income'];
						}
						D('Agent')->incMoney($item['user_id'], $item['income'], $fatherMoney);
					}
				}
			}
			$this->redirect('Order/succeed?id='.$this->_get('id'));
		} else {
			$this->redirect('Order/pay?id='.$this->_get('id'));
		}
	}
	
	// 5、预定成功
	public function succeed() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 4 && $order['status'] != 6) $this->error('无权访问');
		$order['line'] = D('Line')->rAll($order['line_id']);
		if ($order['type'] == 4) {
			$order['ticketList'] = D('OrderTicket')->rByOrderId($id);
			$this->assign('order', $order);
			$this->assign('headTitle', '预订成功__产品预订');
			$this->display('../Tour/Tpl/Order/ticketSucceed.html');
		}
		else {
			$this->assign('order', $order);
			$this->assign('headTitle', '预订成功__产品预订');
			$this->display();
		}
	}
	
	// 团队 1、填写出游信息
	public function teamStep1() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法修改订单');
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['team'] = D('OrderTeam')->r($id);
		$order = $this->format($order);
		
		$this->assign('order', $order);
		$this->assign('otList', $otList);
		$this->assign('headTitle', '填写出游信息__产品预订');
		$this->display();
	}
	
	// 团队 1、填写出游信息
	public function teamStep1Do() {
		$this->check_permission($this->_post('id'));
		
		$order = D('Order')->r((int)$this->_post('id'));
		if ($order['status'] != 1) $this->error('无法再次提交订单');

		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['status'] = 2;
		$data['line_name'] = (string)$this->_post('destination');
		$data['departure_date'] = (string)$this->_post('departure_date');
		$data['people_count'] = (int)$this->_post('people_count');
		$data['contact_name'] = (string)$this->_post('contact_name');
		$data['contact_phone'] = (string)$this->_post('contact_phone');
		$data['contact_phone2'] = (string)$this->_post('string');
		$data['contact_email'] = (string)$this->_post('contact_email');
		$data['coupon'] = (string)$this->_post('coupon');
		$data['requirement'] = (string)$this->_post('requirement');
		if ($this->_post('privilege_di') == 'on') $data['privilege_di'] = 1;
		else  $data['privilege_di'] = 0;
		D('Order')->u($data);
		
		$data2 = array();
		$data2['id'] = (int)$this->_post('id');
		$data2['price'] = (int)$this->_post('price');
		$data2['requirement'] = (string)$this->_post('requirement');
		$data2['destination'] = (string)$this->_post('destination');
		$data2['duration'] = (string)$this->_post('duration');
		D('OrderTeam')->u($data2);
		
		// 处理优惠券
		if (!empty($data['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $data['coupon'], 'line_id' => $order['line_id']));
			if (!empty($coupon) && $coupon['used'] == 0) {
				// 利润计算
				$people_count = $data['people_count'];
				$priceOrigin = D('Line')->rPrice($order['line_id']);
				$price = D('LineContent')->rFenxiao($order['line_id']);
				$agent = D('Agent')->rByCode($data['coupon']);
				$author_id = $agent['user_id'];
				// 个人利润
				$data = array();
				$data['user_id'] = $agent['user_id'];
				$data['type_id'] = 1;
				$data['order_id'] = $order['id'];
				$data['status'] = 1;
				$data['author_id'] = $author_id;
				$data['time'] = getTime();
				if ($agent['type_id'] == 1)
					$data['income'] = ($priceOrigin - $price['fenxiao_price1'] - $price['fenxiao_youhui'])*$people_count;
				if ($agent['type_id'] == 2)
					$data['income'] = ($priceOrigin - $price['fenxiao_price2'] - $price['fenxiao_youhui'])*$people_count;
				if ($agent['type_id'] == 3)
					$data['income'] = ($priceOrigin - $price['fenxiao_price3'] - $price['fenxiao_youhui'])*$people_count;
				D('AgentIncome')->c($data);
				// 二级代理利润
				if ($agent['type_id'] == 3){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price3'] - $price['fenxiao_price2'])*$people_count;
					$agent = D('Agent')->r($agent['father_id']);
					D('AgentIncome')->c($data);
				}
				// 一代理利润
				if ($agent['type_id'] == 2){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price2'] - $price['fenxiao_price1'])*$people_count;
					D('AgentIncome')->c($data);
				}
			}
		}
		
		$this->redirect('Order/succeedTeam?id='.$this->_post('id'));
	}
	
	// 团队预定成功
	public function succeedTeam() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['team'] = D('OrderTeam')->r($id);
		$this->assign('order', $order);
		$this->assign('headTitle', '预订成功__产品预订');
		$this->display();
	}
	
	// 门票订单
	public function ticketOrder() {
		//$id = (int)$this->_post('id');
		//$departure_date = $this->_post('departure_date');
		$point = D('Point')->r($this->_post('point_id'));
		$ticketTot = 0;
		$ticketList = array();
		foreach($_POST AS $key => $item) {
			if (!strstr($key, 'ticket')) continue;
			if ($item == 0) continue;
			$tmp = split('_', $key);
			$ticketList[] = array();
			$count = count($ticketList);
			$ticketList[$count-1]['id'] = $tmp[1];
			$ticketList[$count-1]['count'] = $item;
			$ticketTot += $item;
		}

		$data = array();
		$data['type'] = 4;
		$data['status'] = 1;
		$data['submit_time'] = getTime();
		$data['user_id'] = (int)$_SESSION['id'];
		$data['school_id'] = (int)$_SESSION['school_id'];
		$data['line_id'] = $point['id'];
		$data['line_name'] = $point['name'].'门票';
		$data['departure_date'] = $this->_post('date');
		$data['people_count'] = $ticketTot;
		$id = D('Order')->c($data);
		
		foreach($ticketList as $ticket) {
			$data = array();
			$data['order_id'] = $id;
			$data['ticket_id'] = $ticket['id'];
			$data['count'] = $ticket['count'];
			$price = D('TicketSchedule')->rPrice($ticket['id'], $this->_post('date'));
			$data['unit_price'] = $price;
			D('OrderTicket')->c($data);
		}
		$this->redirect('Order/ticketStep1?id='.$id);
	}
	
	// 门票、填写订单
	public function ticketStep1() {
		$this->check_permission($this->_get('id'));

		$id = $this->_get('id');
	
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法修改订单');
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['insurance'] = D('Insurance')->rListByString('1');
		foreach($order['insurance'] as $idd => $item) {
			$tmp = D('OrderInsurance')->r($id, $item['id']);
			$order['insurance'][$idd]['count'] = $tmp['count'];
		}
		$order['ticketList'] = D('OrderTicket')->rByOrderId($id);
		$order = $this->format($order);

		$this->assign('order', $order);
		$this->assign('headTitle', '填写订单__产品预订');
		$this->display();
	}
	
	// 门票、提交第一步
	public function ticketStep1Do() {
		$this->check_permission($this->_post('id'));

		// 参数赋值
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['coupon'] = $this->_post('coupon');
			
		$order = D('Order')->r($data['id']);
		if ($order['status'] != 1) $this->error('无法修改订单');

		// 删除所有保险
		D('OrderInsurance')->dByOrderId($data['id']);
		foreach($_POST AS $id => $item) {
			// 插入保险
			if (!strstr($id, 'insurance')) continue;
			$insuranceId = split('_', $id);
			$insuranceId = (int)$insuranceId[1];
			$data2 = array();
			$data2['order_id'] = $data['id'];
			$data2['insurance_id'] = $insuranceId;
			$data2['count'] = (int)$item;
			if ($data2['count'] != 0) D('OrderInsurance')->c($data2);
		}
		// 是否使用了优惠券
		if (!empty($data['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $data['coupon'], 'line_id' => $order['line_id']));
			if (empty($coupon) || $coupon['used'] != 0) unset($data['coupon']);
		}
		$order = D('Order')->u($data);
		
		// 更新总费用
		$data2 = array();
		$data2['id'] = $data['id'];
		$data2['price'] = $this->calPriceTicket($data2['id']);
		$order = D('Order')->u($data2);

		$this->redirect('Order/ticketStep2?id='.$this->_post('id'));
	}
	
	// 门票、2、填写联系人
	public function ticketStep2() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法修改订单');
		$orderTicket = D('OrderTicket')->rByOrderId($id);
		$otList = D('OrderTourist')->rListByOrderId($id);
		$otList2 = array();
		foreach($orderTicket as $item) {
			if ($item['identity'] == 1) {
				$otList2['ticket_id'][$item['ticket_id']] = $item['ticket_id'];
				$otList2['name'][$item['ticket_id']] = $item['name'];
				$otList2['count'][$item['ticket_id']] = $item['count'];
				$otList2['tourist'][$item['ticket_id']] = array();
				foreach($otList as $item2) {
					if ($item2['ticket_id'] == $item['ticket_id'])
						$otList2['tourist'][$item['ticket_id']][] = $item2;
				}
			}
		}
		$this->assign('order', $order);
		$this->assign('otList', $otList2);
		$this->assign('headTitle', '填写出游人__产品预订');
		$this->display();
	}
	
	// 门票、2、提交第二步
	public function ticketStep2Do() {
		$this->check_permission($this->_post('id'));
		
		$order = D('Order')->r($this->_post('id'));
		if ($order['status'] != 1) $this->error('无法修改订单');
		
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['contact_name'] = (string)$this->_post('contact_name');
		$data['contact_phone'] = (string)$this->_post('contact_phone');
		$data['contact_phone2'] = (string)$this->_post('contact_phone2');
		$data['contact_email'] = (string)$this->_post('contact_email');
		D('Order')->u($data);
		
		D('OrderTourist')->dByOrderId($data['id']);
		$orderTicket = D('OrderTicket')->rByOrderId($this->_post('id'));
		$tot = 0;
		foreach($orderTicket as $item) {
			$count = count($this->_post('tourist_name_'.$item['ticket_id']));
			for($i = 0; $i < $count; $i++) {
				$data2 = array();
				$data2['order_id'] = $data['id'];
				$data2['tourist_id'] = $tot+1;
				$data2['name'] = $_POST['tourist_name_'.$item['ticket_id']][$i];
				$data2['card'] = $_POST['tourist_card_'.$item['ticket_id']][$i];
				$data2['phone'] = $_POST['tourist_phone_'.$item['ticket_id']][$i];
				$data2['ticket_id'] = $item['ticket_id'];
				D('OrderTourist')->c($data2);
				$tot++;
				dump($data2);
			}
		}

		$this->redirect('Order/ticketStep3?id='.$this->_post('id'));
	}
	
	// 门票、3、核对订单
	public function ticketStep3() {
		$this->check_permission($this->_get('id'));
		$id = $this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法再次提交订单');
		$order['line'] = D('Line')->rAll($order['line_id']);
		$order['insurance'] = D('OrderInsurance')->rListByOrderId($id, true);
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (empty($coupon) || $coupon['used'] != 0) unset($data['coupon']);
			else $order['coupon'] = $coupon;
		}
		$order['ticketList'] = D('OrderTicket')->rByOrderId($id);
		$order = $this->format($order);
		
		$this->assign('order', $order);
		$this->assign('headTitle', '核对订单__产品预订');
		$this->display();
	}
	
	// 门票、3、核对订单
	public function ticketStep3Do() {
		$this->check_permission($this->_get('id'));
		$id = (int)$this->_get('id');
		
		$order = D('Order')->r($id);
		if ($order['status'] != 1) $this->error('无法再次提交订单');
		
		// 核对是否过了截止日期
		$cntTime = getTime();
		$orderTicket = D('OrderTicket')->rByOrderId($id);
		foreach($orderTicket as $item) {
			$schedule = D('TicketSchedule')->r($item['ticket_id'], $order['departure_date']);
			if ($cntTime > $schedule['deadline']) $this->error('无法预订['.$item['name'].']');
		}
		
		// 处理优惠券
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (!empty($coupon) && $coupon['used'] == 0) {
				// 利润计算
				$priceOrigin = D('Line')->rPrice($order['line_id']);
				$price = D('LineContent')->rFenxiao($order['line_id']);
				$agent = D('Agent')->rByCode($order['coupon']);
				$author_id = $agent['user_id'];
				// 个人利润
				$data = array();
				$data['user_id'] = $agent['user_id'];
				$data['type_id'] = 1;
				$data['order_id'] = $order['id'];
				$data['status'] = 1;
				$data['author_id'] = $author_id;
				$data['time'] = getTime();
				if ($agent['type_id'] == 1)
					$data['income'] = ($priceOrigin - $price['fenxiao_price1'] - $price['fenxiao_youhui'])*$order['people_count'];
				if ($agent['type_id'] == 2)
					$data['income'] = ($priceOrigin - $price['fenxiao_price2'] - $price['fenxiao_youhui'])*$order['people_count'];
				if ($agent['type_id'] == 3)
					$data['income'] = ($priceOrigin - $price['fenxiao_price3'] - $price['fenxiao_youhui'])*$order['people_count'];
				D('AgentIncome')->c($data);
				// 二级代理利润
				if ($agent['type_id'] == 3){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price3'] - $price['fenxiao_price2'])*$order['people_count'];
					$agent = D('Agent')->r($agent['father_id']);
					D('AgentIncome')->c($data);
				}
				// 一代理利润
				if ($agent['type_id'] == 2){
					$data = array();
					$data['user_id'] = $agent['father_id'];
					$data['type_id'] = 99;
					$data['order_id'] = $order['id'];
					$data['status'] = 1;
					$data['author_id'] = $author_id;
					$data['time'] = getTime();
					$data['income'] = ($price['fenxiao_price2'] - $price['fenxiao_price1'])*$order['people_count'];
					D('AgentIncome')->c($data);
				}
			}
		}
		
		$data = array();
		$data['id'] = $id;
		$data['status'] = 3;
		D('Order')->u($data);

		$this->redirect('Order/pay?id='.$id);
	}
	
	// 格式化数据
	public function format($order) {
		// TODO
		$order['from_city'] = '上海';
		$order['submit_time'] = intToTime($order['submit_time']);
		if ($order['status'] == 1) $order['status_name'] = '待提交'; else 
		if ($order['status'] == 2) $order['status_name'] = '待处理'; else
		if ($order['status'] == 3) $order['status_name'] = '待付款'; else
		if ($order['status'] == 4) $order['status_name'] = '已付款'; else
		if ($order['status'] == 5) $order['status_name'] = '订单取消'; else
		if ($order['status'] == 6) $order['status_name'] = '已预定'; else
		if ($order['status'] == 7) $order['status_name'] = '成功出游';
		else $order['status_name'] = '未知';
		if ($order['type'] == 1) $order['type_name'] = '跟团游'; else
		if ($order['type'] == 2) $order['type_name'] = '团队游'; else
		if ($order['type'] == 3) $order['type_name'] = '自助游'; else
		if ($order['type'] == 4) $order['type_name'] = '门票';
		else $order['type_name'] = '未知';
		
		// 格式化班车信息
		if (!empty($order['busList'])) {
			foreach($order['busList'] as $id => $item) {
				$timeLen = strlen($item['departure_time']);
				$order['busList'][$id]['departure_time'][$timeLen-1] = '';
				$order['busList'][$id]['departure_time'][$timeLen-2] = '';
				$order['busList'][$id]['departure_time'][$timeLen-3] = '';
			}
		}
		
		// 格式化上车地点
		if (!empty($order['bus'])) {
			$len = strlen($order['bus']['departure_time']);
			$order['bus']['departure_time'][$len-3] = '';
			$order['bus']['departure_time'][$len-2] = '';
			$order['bus']['departure_time'][$len-1] = '';
		}
		
		return $order;
	}
	
	// 检查权限
	public function check_permission($id = 0) {
		isLogin();
		$user_id = D('Order')->rUid($id);
		if ($user_id != $_SESSION['id']) $this->error('无权访问');
	}
	
	// 计算一个订单的总费用
	public function calPrice($id = 0) {
		// 计算总价格
		$price = 0;
		// 旅游团费
		$order = D('Order')->r($id);
		$line = D('Line')->r($order['line_id']);
		$price += $order['people_count']*$order['line_price'];
		// 保险费用
		$insuranceList = D('OrderInsurance')->rListByOrderId($id);
		foreach($insuranceList AS $item) {
			$insurance = D('Insurance')->r($item['insurance_id']);
			$price += $item['count']*$insurance['price'];
		}
		// 优惠费用
		if ($order['privilege_di'] == 1) $price -= $line['di_price']*$order['people_count'];
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (!empty($coupon) && $coupon['used'] == 0) 
				$price -= $coupon['price']*$order['people_count'];
		}
		return $price;
	}
	// 计算一个订单的总费用（门票）
	public function calPriceTicket($id = 0) {
		// 计算总价格
		$price = 0;
		// 门票费用
		$order = D('Order')->r($id);
		$ticketList = D('OrderTicket')->rByOrderId($id);
		foreach($ticketList as $item) {
			$price += $item['count']*$item['unit_price'];
		}
		// 保险费用
		$insuranceList = D('OrderInsurance')->rListByOrderId($id);
		foreach($insuranceList AS $item) {
			$insurance = D('Insurance')->r($item['insurance_id']);
			$price += $item['count']*$insurance['price'];
		}
		// 优惠费用
		if (!empty($order['coupon'])) {
			$coupon = A('Coupon')->getInfo(array('code' => $order['coupon'], 'line_id' => $order['line_id']));
			if (!empty($coupon) && $coupon['used'] == 0) 
				$price -= $coupon['price']*$order['people_count'];
		}
		return $price;
	}
}