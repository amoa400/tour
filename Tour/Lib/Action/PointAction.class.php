<?php

class PointAction extends Action {
    public function show(){
		$point = D('Point')->rByList($this->_get('id'));
		$point = $point[0];
		$point['province'] = D('Province')->rName($point['province_id']);
		$point['city'] = D('City')->rName($point['province_id'], $point['city_id']);
		$point['subject'] = D('PointSubject')->rName($point['subject_id']);
		$point['desc'] = str_replace('\r\n', '', $point['desc']);
		$point['desc'] = str_replace('\r', '', $point['desc']);
		$point['desc'] = str_replace(PHP_EOL, '', $point['desc']);
		$point['desc'] = htmlspecialchars($point['desc']);
		$point['desc'] = mb_substr($point['desc'], 0, 56, 'utf-8').'...';
		
		$pointSubjectList = D('PointType')->rList();
		$subjectList = split(',', $point['subject_id']);
		foreach($subjectList as $item) {
			if (empty($item)) continue;
			$point['subject'][] = $pointSubjectList[$item-1];
		}
		
		$ticketList = D('PointTicket')->rAll($this->_get('id'));
		foreach($ticketList as $id => $item) {
			if ($item['pay_type_id'] == 1)
				$ticketList[$id]['pay_type'] = '在线支付';
		}
		$this->assign('point', $point);
		$this->assign('headTitle', $point['name']);
		$this->assign('ticketList', $ticketList);
		$this->display();
    }
}