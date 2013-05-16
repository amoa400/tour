<?php

class UserModel extends Model {
	protected $_map = array(
		'school' => 'school_id',
    );
	
	protected $_validate = array(
		array( 'email', 'email', '邮箱不正确', 1 ),
		array( 'email', '1,30', '邮箱不正确', 1, 'length' ),
		array( 'email', '', '邮箱已被使用', 1, 'unique' ),
		array( 'password', 'require', '密码不正确', 1 ),
		array( 'password', '6,20', '密码不正确', 1, 'length' ),
		array( 'school_id', 'number', '学校不正确' ),
		array( 'phone', '', '手机号已被使用', 2, 'unique' ),
		array( 'phone', 'require', '手机号不正确', 2 ),
		array( 'phone', '11', '手机号不正确', 2, 'length' ),
		array( 'phone', 'number', '手机号不正确', 2 ),
		//array( 'name', '1,7', '姓名不正确', 2, 'length' ),
	);
	
	protected $_auto = array ( 
		array('password', 'encrypt', 3, 'function'),
	);

	// 新增用户
	public function c($data = 0) {
		if (empty($data)) $data = $_POST;
		if ( $this->create( $data ) ) {
			$ret = $this->add();
			if ($ret) return 'OK';
			else return $ret;
		} else {
			return $this->getError();
		}
	}
	
	// 查询用户
	public function r($id = 0) {
		$sql = array('id' => (int)$id);
		$user = $this->where($sql)->find();
		return $user;
	}
	
	// 通过手机查询用户
	public function rByPhone($phone = 0) {
		if (!is_numeric($phone)) return 0;
		$sql = array('phone' => $phone);
		$user = $this->where($sql)->find();
		return $user;
	}
	
	// 通过邮箱查询用户
	public function rByEmail($email = 0) {
		$sql = array('email' => $email);
		$user = $this->where($sql)->find();
		return $user;
	}
	
	// 更新用户信息
	public function u($data = 0) {
		if (empty($data)) $data = $_POST;
		$user = $this->save($data);
		return $user;
	}
	
	// 获取用户总量
	public function rCount() {
		$count = $this->field('count(1) AS count')->find();
		return $count['count'];
	}
	
	// 获取用户最大ID
	public function rMaxId() {
		$user = $this->field('id')->order('`id` DESC')->find();
		return $user['id'];
	}
}

