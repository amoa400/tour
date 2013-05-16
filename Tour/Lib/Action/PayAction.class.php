<?php

class PayAction extends Action {
	// 支付
	public function pay() {
		return;
		isLogin();
		$order_id = (int)$this->_post('order_id');
		A('Order')->check_permission($order_id);
		
		//TODO
		echo '虚拟支付页面<br><br><br>';
		$order = D('Order')->r($order_id);
		$data = array();
		$data['id'] = $order_id;
		$data['payed_money'] = $order['payed_money']+(int)$this->_post('money');
		D('Order')->u($data);
		echo '支付成功！<br>支付金额：'.$this->_post('money');
	}
	
}