<?php

class AgentModel extends Model {

	// 创建代理
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 更新代理
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$agent = $this->save( $data );
		return $agent;
	}

	// 获取代理
    public function r($user_id = 0){
		$sql = array('user_id' => (int)$user_id);
		$agent = $this->where($sql)->find();
		return $agent;
    }
	
	// 获取代理（通过代码）
    public function rByCode($code = 0){
		$sql = array('code' => $code);
		$agent = $this->where($sql)->find();
		return $agent;
    }

	// 获取代理列表
    public function rList($father_id = 0, $page = 1, $limit = 10){
		if ($father_id != 0)
			$sql = array('father_id' => (int)$father_id);
		$agentList = $this->where($sql)->page($page)->limit($limit)->order('`time` DESC')->select();
		return $agentList;
    }
	
	// 获取代理数量
	public function rCount($father_id = 0) {
		$sql = array('father_id' => (int)$father_id);
		$count = $this->field('COUNT(1) AS `count`')->where($sql)->find();
		return $count['count'];
	}
	
	// 增加收益数值
	public function incMoney($user_id = 0, $money = 0, $fatherMoney = 0) {
		$user_id = (int)$user_id;
		$res = $this->query("UPDATE `tour_agent` SET `earned_money`=`earned_money`+'$money', `history_money`=`history_money`+'$money', `father_money`=`father_money`+'$fatherMoney' WHERE `user_id`='$user_id';");
	}
}