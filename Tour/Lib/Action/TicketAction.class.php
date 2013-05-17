<?php

class TicketAction extends Action {
	
	private $pointSubjectList;
	
	// 首页
	public function index() {
		// 获取景点首页广告
		$ticketAdList = array();
		$ticketAdS = D('Const')->r('ticket_ad');
		$ticketAdA = split(';', $ticketAdS);
		foreach($ticketAdA as $item) {
			if (empty($item)) continue;
			$s = split(',', $item);
			$ticketAdList[] = array();
			$cnt = count($ticketAdList);
			$ticketAdList[$cnt-1]['id'] = $s[0];
			$ticketAdList[$cnt-1]['name'] = $s[1];
			$ticketAdList[$cnt-1]['desc'] = $s[2];
		}
		$this->assign('ticketAdList', $ticketAdList);
		
		// 获取景点类型
		$pointTypeList = D('PointType')->rList();
		$ticketList = D('Ticket')->rRec2List();
		foreach($ticketList as $item) {
			foreach($pointTypeList as $key => $item2) {
				if (count($pointTypeList[$key]['ticket']) >= 5) continue;
				if (strstr($item['subject_id'], ','.$item2['id'].',')) {
					$pointTypeList[$key]['ticket'][] = $item;
					break;
				}
			}
		}
		$this->assign('pointTypeList', $pointTypeList);
		
		// 获取打折门票（实际上就是推荐门票）
		$recList = D('Ticket')->rRecList();
		foreach($recList as $key => $item) {
			$pointTicket = D('PointTicket')->r($item['id']);
			$recList[$key]['point_id'] = $pointTicket['point_id'];
		}
		$this->assign('recList', $recList);
		
		// 获取热卖列表
		$hotList = D('Ticket')->rHotList();
		foreach($hotList as $key => $item) {
			$pointTicket = D('PointTicket')->r($item['id']);
			$hotList[$key]['point_id'] = $pointTicket['point_id'];
		}
		$this->assign('hotList', $hotList);
		
		$this->assign('headTitle', '景点门票');
		$this->display();
	}
	
	// 显示门票
	public function show() {
		$id = $this->_get('id');
		$point = D('PointTicket')->r($id);
		$this->redirect('Point/show?id='.$point['point_id']);
	}
	
	// 获取价目表
	public function getSchedule() {
		$id = $this->_post('ticket_id');
		$schedule = D('TicketSchedule')->rList($id);
		// 判断是否过了截止日期
		$cntTime = getTime();
		$schedule2 = array();
		foreach($schedule as $item) {
			if ($item['deadline'] < $cntTime) continue;
			$schedule2[] = $item;
		}
		$this->ajaxReturn($schedule2);
	}
	
	// 获取某日价目表
	public function getSchedule2() {
		$point_id = $this->_post('point_id');
		$date = $this->_post('date');
		$schedule = D('TicketSchedule')->rList2($point_id, $date);
		foreach($schedule as $key => $item) {
			$schedule[$key]['ticket'] = D('Ticket')->r($item['ticket_id']);;
		}
		// 判断是否过了截止日期
		$cntTime = getTime();
		$schedule2 = array();
		foreach($schedule as $item) {
			if ($item['deadline'] < $cntTime) continue;
			$schedule2[] = $item;
		}	
		$this->ajaxReturn($schedule2);
	}
	
	// 门票搜索（返回线路数量）
	public function searchNum($s = '') {
		if (empty($s)) die();
		// 分解参数
		$data = array();
		$arr = split('&', $s);
		foreach($arr as $item) {
			$para = split('=', $item);
			$data[$para[0]] = $para[1];
		}
		$data['only_count'] = 1;
		$num = $this->search($data);
		return $num;
	}
	
	// 搜索
	public function search($data = array()) {
		if (!empty($data)) $_GET = $data;
		// 参数赋值
		$keyword = $this->_get('k');
		$data = array();
		$data['province_id'] = $this->_get('province');
		$data['city_id'] = $this->_get('city');
		$data['subject_id'] = $this->_get('subject');
		$data['sort'] = $this->_get('sort');
		$data['only_count'] = $this->_get('only_count');
		$page = $this->_get('page');
		if (empty($page)) $page = 1;

		// 按关键词搜索
		if (!empty($keyword)) {
			$flag = true;
			// 查看是否为某个城市
			$keyword2 = str_replace('省', '', $keyword);
			$keyword2 = str_replace('市', '', $keyword);
			if ($flag) {
				$province = D('Province')->rByName($keyword2);
				if (!empty($province)) {
					$data['province_id'] = $province['id'];
					$data['city_id'] = 0;
					$flag = false;
				}
			}
			if ($flag) {
				$city = D('City')->rByName($keyword2);
				if (!empty($city)) {
					$data['province_id'] = $city['province_id'];
					$data['city_id'] = $city['id'];
					$flag = false;
				}
			}
			// 查询某个景点
			if ($flag) {
				$data['name'] = $keyword;
			}
		}
		
		// 是否只获取数量
		if ($data['only_count']) {
			$count = (int)D('Point')->search($data);
			return $count;
		}

		$pointList = D('Point')->search($data, $page);
		$pointCount = $pointList['count']['count'];
		$pointList = $pointList['data'];
		foreach($pointList as $key => $item) {
			$pointList[$key] = $this->format($item);
		}
		$this->pointSubjectList = D('PointType')->rList();
		
		$form = array();
		$form['province'] = $data['province_id'];
		$form['province_name'] = D('Province')->rName($form['province']);
		$form['city'] = $data['city_id'];
		$form['city_name'] = D('City')->rName($form['province'], $form['city']);
		$form['subject'] = $data['subject_id'];
		$form['sort'] = $data['sort'];
		$form['page'] = $page;
		$form['k'] = $keyword;
		if (!empty($form['province']) && empty($form['city'])) {
			$cityList = D('City')->rList($form['province']);
			$this->assign('cityList', $cityList);
		}
		
		$pointPage = ceil($pointCount/10);

		$this->assign('pointList', $pointList);
		$this->assign('pointCount', $pointCount);
		$this->assign('subjectList', $this->pointSubjectList);
		$this->assign('form', $form);
		$this->assign('pointPage', $pointPage);
		$this->assign('headTitle', '门票搜索');
		$this->display();
	}
	
	public function format($point = 0) {
		// 主题
		$point['province'] = D('Province')->rName($point['province_id']);
		$point['city'] = D('City')->rName($point['province_id'], $point['city_id']);
		// 景点主题
		if (empty($this->pointSubjectList)) $this->pointSubjectList = D('PointSubject')->rList();
		$subjectList = split(',', $point['subject_id']);
		foreach($subjectList as $item) {
			if (empty($item)) continue;
			$point['subject'][] = $this->pointSubjectList[$item-1];
		}
		// 获取门票
		$point['ticket'] = D('PointTicket')->rAll($point['id']);
		return $point;
	}
	
}