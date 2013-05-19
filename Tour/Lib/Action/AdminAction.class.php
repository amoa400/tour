<?php

class AdminAction extends Action {
	// 管理登陆
	public function login() {
		isLogin();
		if ($_SESSION['id'] != 1) $this->error('无权访问');
		$this->redirect('home');		
	}
	
	// 管理首页
	public function home() {
		$this->assign('pageTitle', '管理首页');
		$this->display();
	}
	
	// 新增线路
	public function cLine() {
		$id = $_GET['id'];
		if (!empty($id)) {
			$line = D('Line')->rAll($id);
			$line['price_include'] = br2nl($line['price_include']);
			$line['price_not_include'] = br2nl($line['price_not_include']);
			$line['precaution'] = br2nl($line['precaution']);
			$line['shopping'] = br2nl($line['shopping']);
			$this->assign('line', $line);
		}
	
		// 获取景点类型
		$pointTypeList = D('PointType')->rList();
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取标签类型
		$lineTagList = D('LineTag')->rList();
		$this->assign('lineTagList', $lineTagList);
		
		// 获取省份城市
		$provinceList = D('Province')->rList();
		foreach($provinceList as $id => $item) {
			$provinceList[$id]['cityList'] = D('City')->rList($item['id']);
		}
		$this->assign('provinceList', $provinceList);
		
		// 获取有哪些景点
		$pointList = D('Point')->rList();
		$this->assign('pointList', $pointList);
		$this->assign('pageTitle', '编辑线路');
			
		$this->display();
	}
	
	// 新增线路处理
	public function cLineDo() {
		if (empty($_POST['id']) && empty($_FILES['photo']['name'])) $this->error('未上传图片');
		// 处理参数
		$point_id = ',';
		foreach($_POST['point_id'] as $item) {
			$point_id .= $item.',';
		}
		$_POST['point_id'] = $point_id;
		$point_type_id = ',';
		foreach($_POST['point_type_id'] as $item) {
			$point_type_id .= $item.',';
		}
		$_POST['point_type_id'] = $point_type_id;
		$tag_id = ',';
		foreach($_POST['tag_id'] as $item) {
			$tag_id .= $item.',';
		}
		$_POST['tag_id'] = $tag_id;
		$to_city_id = ';';
		foreach($_POST['to_city_id'] as $item) {
			$to_city_id .= $item;
		}
		$_POST['to_city_id'] = $to_city_id;
		foreach($_POST['insurance_id'] as $item) {
			$insurance_id .= $item.',';
		}
		$_POST['insurance_id'] = $insurance_id;
		$_POST['price_include'] = nl2br($_POST['price_include']);
		$_POST['price_not_include'] = nl2br($_POST['price_not_include']);
		$_POST['precaution'] = nl2br($_POST['precaution']);
		$_POST['shopping'] = nl2br($_POST['shopping']);
		if (empty($_POST['insurance_id'])) $_POST['insurance_id'] = '';
		if (!empty($_POST['id'])) {
			D('Line')->u();
			D('LineContent')->u();
			$id = (int)$_POST['id'];
		}
		else {
			$id = D('Line')->c();
			if (!$id) $this->error('创建失败');
			$_POST['id'] = $id;
			$ret = D('LineContent')->c();
			if (!$ret) $this->error('创建失败');
			D('Province')->countChange($_POST['to_province_id']);
			D('City')->countChange($_POST['to_province_id'], $_POST['to_city_id']);
		}
		
		// 存照片
		if (!empty($_FILES['photo']['name'])) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 1048576 ;
			$upload->allowExts  = array( 'jpg' );
			$upload->savePath =  './images/line/photo/';
			$upload->saveRule = $id;
			if( !$upload->upload() ) {
				$this->error($upload->getErrorMsg());
			}
		}

		$this->redirect('Admin/cLine2?id='.$id);
	}
	
	// 新增线路，第2步
	public function cLine2() {
		$id = $this->_get('id');
		$line = D('Line')->r($id);
		for($i = 1; $i <= $line['duration']; $i++) {
			$line['day'][$i] = D('LineDay')->r($line['id'], $i);
			//dump($line['day'][$i]);
		}
		$this->assign('line', $line);
		$this->assign('pageTitle', '编辑线路');
		$this->display();
	}
	
	// 新增线路，第2步，处理
	public function cLine2Do() {
		$count = (int)$this->_post('count');
		$id = $this->_post('line_id');
		for ($i = 0; $i < $count; $i++) {
			$data = array();
			$data['id'] = ($i+1);
			$data['line_id'] = $id;
			$data['desc'] = $_POST['desc'][$i];
			$data['city'] = $_POST['city'][$i];
			$data['vehicle'] = $_POST['vehicle'][$i];
			$data['stay'] = $_POST['stay'][$i];
			$data['breakfast'] = $_POST['breakfast'][$i];
			$data['lunch'] = $_POST['lunch'][$i];
			$data['dinner'] = $_POST['dinner'][$i];
			D('LineDay')->c($data);
			D('LineDay')->u($data);
		}
		$line = D('Line')->r($id);
		if ($line['type_id'] == 1)
			$this->redirect('Admin/cLine3?id='.$id);
		else
			$this->redirect('Admin/cLineSucceed?id='.$id);
	}
	
	// 新增线路，第3步
	public function cLine3() {
		$id = $this->_get('id');
		$line = D('Line')->r($id);
		$line['schedule'] = D('LineSchedule')->rByLineIdDate($id, date('Y-m-d', getTime()));
		$this->assign('line', $line);
		$this->assign('pageTitle', '编辑线路');
		$this->display();
	}
	
	// 新增线路，第3步，处理
	public function cLine3Do() {
		$id = $this->_post('line_id');
		$count = count($_POST['date']);
		$data = array();
		
		D('LineSchedule')->dByDate($id, date('Y-m-d', getTime()));
		$maxId = D('LineSchedule')->rMaxId($id);
		for($i = 0; $i <= $count-1; $i++) {
			if (empty($_POST['date'][$i]) || empty($_POST['datePrice'][$i]) || empty($_POST['limit'][$i])) continue;

			$data[] = array();
			$tot = count($data);
			$data[$tot-1]['id'] = ($maxId+$i+1);
			$data[$tot-1]['line_id'] = $id;
			$data[$tot-1]['date'] = $_POST['date'][$i];
			$data[$tot-1]['price'] = $_POST['datePrice'][$i];
			$data[$tot-1]['limit'] = $_POST['limit'][$i];
		}
		
		D('LineSchedule')->cMulti($data);
		$this->redirect('Admin/cLine4?id='.$id);
	}
	
	// 新增线路，第4步
	public function cLine4() {
		$id = $this->_get('id');
		$line = D('Line')->r($id);
		$this->assign('line', $line);
		$this->display();
	}
	
	// 新增线路，第4步，处理
	public function cLine4Do() {
		$id = $this->_post('line_id');
		$_POST['id'] = 1;
		D('RegularBus')->c();
		$this->redirect('Admin/cLineSucceed?id='.$id);
	}

	// 新增线路，成功
	public function cLineSucceed() {
		$id = $this->_get('id');
		$line = D('Line')->r($id);
		$this->assign('line', $line);
		$this->display();
	}
	
	// 修改线路
	public function editLine() {
		$this->assign('pageTitle', '修改线路');
		$this->display();
	}
	
	// 查看线路列表
	public function showLine() {
		$lineList = D('Line')->rListAll();
		$this->assign('lineList', $lineList);
		$this->assign('pageTitle', '线路列表');
		$this->display();
	}
	
	// 新增景点
	public function cPoint() {
		// 获取景点信息
		$id = (int)$this->_get('id');
		$point = D('Point')->r($id);
		$this->assign('point', $point);
		// 获取景点类型
		$pointTypeList = D('PointType')->rList();
		$typeList = split(',', $point['subject_id']);
		foreach($typeList as $item) {
			if (empty($item)) continue;
			$pointTypeList[$item-1]['selected'] = 1;
		}
		$this->assign('pointTypeList', $pointTypeList);
		// 获取省份城市
		$provinceList = D('Province')->rList();
		foreach($provinceList as $id => $item) {
			$provinceList[$id]['cityList'] = D('City')->rList($item['id']);
		}
		$this->assign('provinceList', $provinceList);
		$this->assign('pageTitle', '编辑景点');
		
		$this->display();
	}
	
	// 新增景点处理
	public function cPointDo() {
		// 处理参数
		$_POST['subject_id'] = '';
		foreach($_POST['subject'] as $item) {
			$_POST['subject_id'] .= ','.$item;
		}
		$_POST['subject_id'] .= ',';
		$_POST['desc'] = stripslashes($_POST['desc']);
		$_POST['desc2'] = stripslashes($_POST['desc2']);
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			D('Point')->u();
		}
		else {
			$id = D('Point')->c();
			if (!$id) $this->error('创建失败');
		}
		$count = count($_POST['photo_desc']);
		for ($i = 1; $i <= $count; $i++) {
			if (empty($_POST['photo_desc'][$i-1])) continue;
			$data['id'] = $i;
			$data['point_id'] = $id;
			$data['desc'] = $_POST['photo_desc'][$i-1];
			D('PointPhoto')->c($data);
			D('PointPhoto')->u($data);
		}
		if (!empty($_FILES['photo']['name'][0])) {
			// 存照片
			mkdir('./images/point/photo/'.$_POST['province_id']);
			mkdir('./images/point/photo/'.$_POST['province_id'].'/'.$_POST['city_id']);
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 1048576 ;
			$upload->allowExts  = array( 'jpg' );
			$upload->savePath = './images/point/photo/'.$_POST['province_id'].'/'.$_POST['city_id'].'/'.$id.'/';
			$upload->saveRule = 'getPointPhotoId';
			if( !$upload->upload() ) {
				$this->error($upload->getErrorMsg());
			}
		}
		$this->success('创建成功！');
	}
	
	// 修改景点
	public function editPoint() {
		$this->assign('pageTitle', '修改景点');
		$this->display();
	}
	
	// 查看景点列表
	public function showPoint() {
		$pointList = D('Point')->rListAll();
		$this->assign('pointList', $pointList);
		$this->assign('pageTitle', '线路列表');
		$this->display();
	}
	
	// 修改订单2
	public function cOrder() {
		$id = $_GET['id'];
		$order = D('Order')->r($id);
		
		if ($order['type'] != 4) {
			if ($order['type'] == 2) 
				$order['team'] = D('OrderTeam')->r($id);
			
			// 获取班车列表
			$busList = D('RegularBus')->rList($order['line_id']);
			$this->assign('busList', $busList);
		}
		
		// 获取学校列表
		$schoolList = D('School')->rList();
		$this->assign('schoolList', $schoolList);

		$this->assign('order', $order);
		$this->assign('pageTitle', '编辑订单');
		if ($order['type'] != 4) $this->display();
		else  $this->display('../Tour/Tpl/Admin/cOrderTicket.html');
	}
	
	// 修改订单
	public function cOrderDo() {
		$data = $_POST;
		if ($data['privilege_di'] == 'on') $data['privilege_di'] = 1;
		if ($data['surrounding_departrue'] == 'on') $data['surrounding_departrue'] = 1;
		D('Order')->u($data);
		
		if ($data['type'] != 4 && (int)$data['price'] == 0 && (int)$data['line_price'] != 0)
			$data['price'] = A('Order')->calPrice($data['id']);
		if ($data['type'] == 4 && $data['price'] == 0)
			$data['price'] = A('Order')->calPriceTicket($data['id']);
		D('Order')->u($data);
		
		$this->redirect('Admin/cOrder2?id='.$data['id']);
	}
	
	// 修改订单2
	public function cOrder2() {
		$id = $_GET['id'];
		
		// 获取订单信息
		$order = D('Order')->r($id);
		$this->assign('order', $order);
		
		// 获取保险列表
		$insuranceList = D('Insurance')->rList();
		foreach($insuranceList as $idd => $item) {
			$tmp = D('OrderInsurance')->r($id, $item['id']);
			if (!empty($tmp))
				$insuranceList[$idd]['count'] = $tmp['count'];
			else
				$insuranceList[$idd]['count'] = 0;
		}
		$this->assign('insuranceList', $insuranceList);
		
		// 获取游客信息
		$touristList = D('OrderTourist')->rListByOrderId($id);
		$this->assign('touristList', $touristList);
		
		// 获取门票信息
		if ($order['type'] == 4) {
			$ticketList = D('OrderTicket')->rByOrderId($id);
			$this->assign('ticketList', $ticketList);
		}

		$this->assign('pageTitle', '编辑订单');
		if ($order['type'] != 4) $this->display();
		else $this->display('../Tour/Tpl/Admin/cOrderTicket2.html');
	}
	
	// 修改订单2
	public function cOrder2Do() {
		$id = $this->_post('id');
		$order = D('Order')->r($id);

		// 修改保险
		D('OrderInsurance')->dByOrderId($id);
		foreach ($_POST['insurance'] as $idd => $item) {
			if ($item == 0) continue;
			$data = array();
			$data['order_id'] = $id;
			$data['insurance_id'] = $idd+1;
			$data['count'] = $item;
			D('OrderInsurance')->c($data);
		}
		// 修改游客
		D('OrderTourist')->dByOrderId($id);
		$tot = 0;
		foreach ($_POST['t_name'] as $idd => $item) {
			$tot++;
			$data = array();
			$data['order_id'] = $id;
			$data['tourist_id'] = $tot;
			$data['name'] = $_POST['t_name'][$idd];
			$data['phone'] = $_POST['t_phone'][$idd];
			$data['card'] = $_POST['t_card'][$idd];
			$data['ticket_id'] = $_POST['t_ticket_id'][$idd];
			D('OrderTourist')->c($data);
		}
		// 修改门票
		D('OrderTicket')->dByOrderId($id);
		$cnt = 0;
		foreach ($_POST['ticket_id'] as $item) {
			$data = array();
			$data['order_id'] = $id;
			$data['ticket_id'] = $_POST['ticket_id'][$cnt];
			$data['count'] = $_POST['count'][$cnt];
			$data['unit_price'] = $_POST['unit_price'][$cnt];
			D('OrderTicket')->c($data);
			$cnt++;
		}
		// 修改总价格
		$data = array();
		$data['id'] = $id;
		if ($order['type'] == 4) $data['price'] = A('Order')->calPriceTicket($data['id']);
		else $data['price'] = A('Order')->calPrice($data['id']);
		D('Order')->u($data);
		$this->success('修改成功！', U('Order/show?id='.$id));
	}
	
	// 修改订单 
	public function editOrder() {
		$this->assign('pageTitle', '修改订单');
		$this->display();
	}
	
	// 查看订单列表
	public function showOrder() {
		$page = $this->_get('page');
		if (empty($page)) $page = 1;
		$orderCount = D('Order')->rCount(1);
		$orderList = D('Order')->rList(1, $page, 10);
		foreach($orderList as $key => $item) {
			$orderList[$key] = A('Order')->format($item);
		}
		$totPage = ceil($orderCount/10);
		$this->assign('orderList', $orderList);
		$this->assign('orderCount', $orderCount);
		$this->assign('cntPage', $page);
		$this->assign('totPage', $totPage);
		$this->assign('pageTitle', '订单列表（第'.$page.'页）');
		$this->display();
	}

	// 新增一级代理
	public function cAgent() {
		$email = $this->_get('email');
		if (!empty($email)) $user = D('User')->rByEmail($email);
		$id = $this->_get('id');
		if (!empty($id)) $user = D('User')->r($id);
		if (!empty($user)) {
			$agent = D('Agent')->r($user['id']);
			$father = D('User')->r($agent['father_id']);
			$this->assign('user', $user);
			$this->assign('agent', $agent);
			$this->assign('father', $father);
		}
		// 获取学校列表
		$schoolList = D('School')->rList();
		$this->assign('schoolList', $schoolList);
		$this->assign('pageTitle', '编辑代理');
		$this->display();
	}
	
	// 新增代理（处理）
	public function cAgentDo() {
		$user = D('User')->rByEmail($this->_post('email'));
		if (empty($user)) $this->error('不存在该用户');
		
		$data = $_POST;
		if (empty($data['id'])) {
			while (1) {
				$code = '';
				for ($i = 0; $i < 6; $i++) {
					$code .= chr(ord('A')+rand(0, 25));
				}
				$agent2 = D('Agent')->rByCode($code);
				if (empty($agent2)) break;
			}
			$data['user_id'] = $user['id'];
			if ($data['type_id'] != 1) {
				$father = D('User')->rByEmail($this->_post('father_email'));
				$data['father_id'] = $father['id'];
			}
			$data['code'] = $code;
			$data['time'] = getTime();
			D('Agent')->c($data);
			
			$data = array();
			$data['id'] = $user['id'];
			$data['group_id'] = 3;
			D('User')->u($data);
		}
		else {
			$data['user_id'] = $data['id'];
			if ($data['type_id'] != 1) {
				$father = D('User')->rByEmail($this->_post('father_email'));
				$data['father_id'] = $father['id'];
			}
			D('Agent')->u($data);
		}
		
		// 存照片
		if (!empty($_FILES['card']['name'])) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 1048576*2;
			$upload->allowExts = array('jpg');
			$upload->uploadReplace = true;
			$upload->savePath = './images/agent/photo/';
			$upload->saveRule = $user['id'];
			if( !$upload->upload() ) {
				$this->error($upload->getErrorMsg());
			}
		}

		$this->success('创建成功！');
	}
	
	// 修改代理
	public function editAgent() {
		$schoolList = D('School')->rList();
		$this->assign('schoolList', $schoolList);
		$this->assign('pageTitle', '修改代理');
		$this->display();
	}
	
	// 显示代理
	public function showAgent() {
		$schoolList = D('School')->rList();
		$agentList = D('Agent')->rList(0, 1, 1000); // TODO
		foreach($agentList as $id => $item) {
			foreach($schoolList as $school) {
				if ($item['school_id'] == $school['id']) {
					$agentList[$id]['school'] = $school['name'];
					break;
				}
			}
			$agentList[$id]['time'] = intToTime($item['time']);
		}
		$this->assign('agentList', $agentList);
		$this->assign('pageTitle', '代理列表');
		$this->display();
	}
	
	// 新增门票
	public function cTicket() {
		$pointList = D('Point')->rListAll();
		$id = $this->_get('id');
		if (!empty($id)) {
			$ticket = D('Ticket')->r($id);
			$pointTicket = D('PointTicket')->rList($id);
			foreach($pointList as $key => $item) {
				foreach($pointTicket as $item2) {
					if ($item['id'] == $item2['point_id']) {
						$pointList[$key]['selected'] = 1;
						break;
					}
				}
			}
		}
		$this->assign('pointList', $pointList);
		$this->assign('ticket', $ticket);
		$this->assign('pageTitle', '编辑门票');
		$this->display();
	}
	
	// 新增门票（处理）
	public function cTicketDo() {
		$data = $_POST;
		if ($data['identity'] == 'on') $data['identity'] = 1;
		else $data['identity'] = 0;
		if (empty($data['id'])) {
			$id = D('Ticket')->c($data);
		}
		else {
			D('Ticket')->u($data);
			$id = $data['id'];
		}
		D('PointTicket')->dByTicketId($id);
		foreach($_POST['point'] as $item) {
			$data = array();
			$data['point_id'] = $item;
			$data['ticket_id'] = $id;
			$data['show_id'] = 9999;
			D('PointTicket')->c($data);
		}
		// 存照片
		if (!empty($_FILES['photo']['name'])) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 1048576*2;
			$upload->allowExts = array('jpg');
			$upload->uploadReplace = true;
			$upload->savePath = './images/ticket/photo/';
			$upload->saveRule = $id;
			if( !$upload->upload() ) {
				$this->error($upload->getErrorMsg());
			}
		}
		$this->redirect('Admin/cTicket2?id='.$id);
	}
	
	// 新增门票2
	public function cTicket2() {
		$id = $this->_get('id');
		$ticket = D('Ticket')->r($id);
		$ticket['schedule'] = D('TicketSchedule')->rList($id);
		foreach($ticket['schedule'] as $key => $item) {
			$ticket['schedule'][$key]['deadline'] = intToTime($item['deadline']);
		}
		$this->assign('ticket', $ticket);
		$this->assign('pageTitle', '编辑门票');
		$this->display();
	}
	
	// 新增门票2
	public function cTicket2Do() {
		$id = $this->_post('ticket_id');
		$count = count($_POST['date']);
		$data = array();		

		D('TicketSchedule')->dByDate($id, date('Y-m-d', getTime()));
		$maxId = D('TicketSchedule')->rMaxId($id);
		for($i = 0; $i <= $count-1; $i++) {
			if (empty($_POST['date'][$i]) || empty($_POST['datePrice'][$i])) continue;

			$data[] = array();
			$tot = count($data);
			$data[$tot-1]['id'] = ($maxId+$i+1);
			$data[$tot-1]['ticket_id'] = $id;
			$data[$tot-1]['date'] = $_POST['date'][$i];
			$data[$tot-1]['price'] = $_POST['datePrice'][$i];
			$data[$tot-1]['deadline'] = timeToInt($_POST['deadline'][$i]);
		}
		D('TicketSchedule')->cMulti($data);
		$this->success('创建成功！');
	}
	
	// 修改门票
	public function editTicket() {
		$this->assign('pageTitle', '修改门票');
		$this->display();
	}
	
	// 显示门票
	public function showTicket() {
		$ticketList = D('Ticket')->rAllList();
		$this->assign('ticketList', $ticketList);
		$this->assign('pageTitle', '门票列表');
		$this->display();
	}
}