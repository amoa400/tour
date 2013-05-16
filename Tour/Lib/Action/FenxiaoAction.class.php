<?php

class FenxiaoAction extends Action {
	// 分销平台首页
	public function home() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');
		
		$user = D('User')->r($_SESSION['id']);
		$user['school'] = D('School')->rName($_SESSION['school_id']);
		$agent = D('Agent')->r($_SESSION['id']);
		$incomeList = D('AgentIncome')->rList($_SESSION['id']);
		foreach($incomeList as $key => $item) {
			if($item['status'] == 1)
				$incomeList[$key]['status'] = '已确认';
			if($item['status'] == 2)
				$incomeList[$key]['status'] = '已完成';
			if($item['type_id'] == 1)
				$incomeList[$key]['type'] = '线路售卖';
			if($item['type_id'] == 99)
				$incomeList[$key]['type'] = '代理反馈';
			$incomeList[$key]['author'] = D('Agent')->r($item['author_id']);
			$incomeList[$key]['time'] = intToTime($item['time']);
		}
		$this->assign('incomeList', $incomeList);
		$this->assign('user', $user);
		$this->assign('agent', $agent);
		$this->assign('orderList', $orderList);
		$this->assign('headTitle', '分销平台');
		$this->display();
	}
	
	// 线路列表
	public  function lineList() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');

		$page = (int)$this->_get('page');
		if (empty($page)) $page = 1;
		$lineCount = D('Line')->rCount();
		$totPage = ceil($lineCount / 10);
		$lineList = D('Line')->rList3($page);
		foreach($lineList as $key => $item) {
			$lineList[$key] = A('Line')->format($item);
 		}
		$agent = D('Agent')->r($_SESSION['id']);
		$this->assign('agent', $agent);
		$this->assign('lineList', $lineList);
		$this->assign('lineCount', $lineCount);
		$this->assign('cntPage', $page);
		$this->assign('totPage', $totPage);
		$this->assign('headTitle', '线路列表__分销平台');
		$this->display();	
	}

/*
	// 优惠券列表
	public function couponList() {
		isLogin();
		if ($_SESSION['group_id'] != 3 && $_SESSION['group_id'] != 4 && $_SESSION['group_id'] != 5) $this->error('无权访问');
		
		$page = (int)$this->_get('page');
		if (empty($page)) $page = 1;
		$couponList = D('Coupon')->rListByGroup();
		$couponCount = count($couponList);
		$totPage = ceil($couponCount / 10);
		$tmpList = array();
		for ($i = ($page-1)*10; $i < $page*10; $i++) {
			if ($i >= $couponCount) break;
			if ($couponList[$i]['type_id'] == 1)
				$couponList[$i]['type'] = '线路优惠';
			$couponList[$i]['time'] = intToTime($couponList[$i]['generate_time']);
			$tmpList[] = $couponList[$i];
		}
		$couponList = $tmpList;

		$this->assign('couponList', $couponList);
		$this->assign('couponCount', $couponCount);
		$this->assign('cntPage', $page);
		$this->assign('totPage', $totPage);
		$this->assign('headTitle', '优惠券列表__分销平台');
		$this->display();		
	}
	
	// 生成优惠券
	public function couponCreate() {
		isLogin();
		if ($_SESSION['group_id'] != 3 && $_SESSION['group_id'] != 4 && $_SESSION['group_id'] != 5) $this->error('无权访问');
		$line_id = $this->_get('line_id');
		if (!empty($line_id)) {
			$line = D('Line')->rAll($line_id);
			$agentPrice = $line['fenxiao_price'.($_SESSION['group_id']-2)];
			$gap = $line['price']-$agentPrice;
			$this->assign('line', $line);
			$this->assign('gap', $gap);
			$this->assign('agentPrice', $agentPrice);
		}
		$this->assign('headTitle', '生成优惠券__分销平台');
		$this->display();		
	}
*/
	
	// 代理列表
	public function agentList() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');
		$page = (int)$this->_get('page');
		if (empty($page)) $page = 1;
		$agentCount = D('Agent')->rCount($_SESSION['id']);
		$totPage = ceil($agentCount / 10);
		$agentList = D('Agent')->rList($_SESSION['id'], $page);
		foreach($agentList as $key => $item) {
			//$agentList[$key]['info'] = D('User')->r($item['user_id']);
			$agentList[$key]['time'] = intToTime($item['time']);
 		}
		$agent = D('Agent')->r($_SESSION['id']);
		if ($agent['type_id'] == 3) $this->error('无权访问');
		$this->assign('agent', $agent);
		$this->assign('agentList', $agentList);
		$this->assign('agentCount', $agentCount);
		$this->assign('cntPage', $page);
		$this->assign('totPage', $totPage);
		$this->assign('headTitle', '代理列表__分销平台');
		$this->display();	
	}
	
	// 新增代理
	public function agentCreate() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');
		$agent = D('Agent')->r($_SESSION['id']);
		if ($agent['type_id'] == 3) $this->error('无权访问');
		$schoolList = D('School')->rList();
		$this->assign('agent', $agent);
		$this->assign('schoolList', $schoolList);
		$this->assign('headTitle', '新增代理__分销平台');
		$this->display();	
	}
	
	// 新增代理处理
	public function agentCreateDo() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');
		$agent = D('Agent')->r($_SESSION['id']);
		if ($agent['type_id'] == 3) $this->error('无权访问');
		$user = D('User')->rByEmail($this->_post('email'));
		if (empty($user)) $this->error('不存在该用户');
		if ($user['group_id'] != 1) $this->error('该用户不是普通类型用户');		
		$agent = D('Agent')->r($user['id']);
		if (!empty($agent)) $this->error('该用户已经是一名代理');
		if (empty($_POST['email'])) $this->error('电子邮箱不能为空');
		if (empty($_POST['name'])) $this->error('真实姓名不能为空');
		if (empty($_POST['phone'])) $this->error('联系方式不能为空');
		if (empty($_POST['school_id'])) $this->error('所在学校不能为空');
		if (empty($_POST['grade'])) $this->error('入学年份不能为空');
		if (empty($_FILES['card']['name'])) $this->error('证件照片不能为空');
		
		// 存照片
		if (!empty($_FILES['card']['name'])) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 1048576*2;
			$upload->allowExts = array('jpg');
			$upload->savePath = './images/agent/photo/';
			$upload->saveRule = $user['id'];
			if( !$upload->upload() ) {
				$this->error($upload->getErrorMsg());
			}
		}
		
		while (1) {
			$code = '';
			for ($i = 0; $i < 6; $i++) {
				$code .= chr(ord('A')+rand(0, 25));
			}
			$agent2 = D('Agent')->rByCode($code);
			if (empty($agent2)) break;
		}
		$father = D('Agent')->r($_SESSION['id']);
		$data = $_POST;
		$data['user_id'] = $user['id'];
		$data['father_id'] = $_SESSION['id'];
		$data['type_id'] = $father['type_id']+1;
		$data['code'] = $code;
		$data['time'] = getTime();
		D('Agent')->c($data);

		$url = U('Fenxiao/agentVerify?id='.$id.'&fid='.$_SESSION['id']);
		$this->assign('url', $url);
		$this->assign('headTitle', '新增代理__分销平台');
		$this->assign('agent', $father);
		$this->display();
	}
	
	// 代理显示
	public function agentShow() {
		isLogin();
		if ($_SESSION['group_id'] != 3) $this->error('无权访问');
		$father = D('Agent')->r($_SESSION['id']);
		$agent = D('Agent')->r($this->_get('id'));
		if ($agent['user_id'] != $_SESSION['id'] && $agent['father_id'] != $father['user_id'] ) $this->error('无权访问');
		$agent['info'] = D('User')->r($this->_get('id'));
		$schoolList = D('School')->rList();
		$agent['school'] = $schoolList[$agent['school_id']-1]['name'];
		$agent['time'] = intToTime($agent['time']);
		$this->assign('agent', $father);
		$this->assign('agent2', $agent);
		$this->assign('headTitle', '代理详细信息__分销平台');
		$this->display();	
	}

	// 新代理确认
	public function agentVerify() {
		isLogin();
		if ($_SESSION['group_id'] == 3) $this->error('无权访问');
		$id = (int)$this->_get('id');
		$fid = (int)$this->_get('fid');
		if ($id != $_SESSION['id']) $this->error('无权访问');
		$agent = D('Agent')->r($id);
		if (empty($agent) || $agent['father_id'] != $fid) $this->error('无权访问');
		$father = D('User')->r($fid);
		$this->assign('father', $father);
		$this->assign('agent', $agent);
		$this->assign('headTitle', '确认代理__分销平台');
		$this->display();	
	}
	
	// 新代理确认处理
	public function agentVerifyDo() {
		isLogin();
		if ($_SESSION['group_id'] == 3) $this->error('无权访问');
		$id = (int)$this->_post('user_id');
		$fid = (int)$this->_post('father_id');
		if ($id != $_SESSION['id']) $this->error('无权访问');
		$agent = D('Agent')->r($id);
		if (empty($agent) || $agent['father_id'] != $fid) $this->error('无权访问');
		$father = D('User')->r($fid);
		$data['id'] = $id;
		$data['group_id'] = 3;
		D('User')->u($data);
		$_SESSION['group_id'] = $data['group_id'];
		$this->success('确认成功！', U('Fenxiao/home'));
	}
}