<?php

class UserAction extends Action {
	// 用户中心首页
	public function home() {
		isLogin();
		
		$user = D('User')->r($_SESSION['id']);
		$user['school'] = D('School')->rName($_SESSION['school_id']);
		$orderList = D('Order')->rList($_SESSION['id']);
		foreach($orderList as $id => $item) {
			$orderList[$id] = A('Order')->format($item);
		}
		$this->assign('user', $user);
		$this->assign('orderList', $orderList);
		$this->assign('headTitle', '用户中心');
		$this->display();
	}
	
	// 我的订单
	public function order() {
		isLogin();
		
		$page = (int)$this->_get('page');
		if (empty($page)) $page = 1;
		$orderCount = D('Order')->rCount($_SESSION['id']);
		$totPage = ceil($orderCount / 10);
		$orderList = D('Order')->rList($_SESSION['id'], $page);
		foreach($orderList as $id => $item) {
			$orderList[$id] = A('Order')->format($item);
		}
		$this->assign('orderList', $orderList);
		$this->assign('orderCount', $orderCount);
		$this->assign('cntPage', $page);
		$this->assign('totPage', $totPage);
		$this->assign('headTitle', '我的订单__用户中心');
		$this->display();
	}
	
	// 个人资料
	public function info() {
		isLogin();
		
		$user = D('User')->r($_SESSION['id']);
		$schoolList = D('School')->rList();
		$this->assign('user', $user);
		$this->assign('schoolList', $schoolList);
		$this->assign('headTitle', '个人资料__用户中心');
		$this->display();
	}
	
	// 密码
	public function password() {
		$this->assign('headTitle', '修改密码__用户中心');
		$this->display();
	}
	
	// 修改个人资料
	public function updateInfo() {
		isLogin();
		if ($_SESSION['id'] != $this->_post('id')) $this->error('不能修改他人资料');
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['nickname'] = (string)$this->_post('nickname');
		$data['school_id'] = (int)$this->_post('school_id');
		$data['phone'] = (string)$this->_post('phone');
		$data['name'] = (string)$this->_post('name');
		$ret = D('User')->u($data);
		if (!$ret) $this->error('修改失败');
		$this->loginSuccess($_SESSION['phone']);
		$this->success('更新成功');
	}
	
	// 修改个人密码
	public function updatePassword() {
		isLogin();
		if ($_SESSION['id'] != $this->_post('id')) $this->error('不能修改他人密码');
		$user = D('User')->r($_SESSION['id']);
		if ($user['password'] != encrypt($this->_post('oldPass'))) $this->error('原密码不正确');
		if ($this->_post('newPass') != $this->_post('rePass')) $this->error('两次密码不一样');
		if (strlen($this->_post('newPass')) < 6 || strlen($this->_post('newPass')) > 20) $this->error('密码长度不正确，6-20');
		
		$data = array();
		$data['id'] = (int)$this->_post('id');
		$data['password'] = encrypt($this->_post('newPass'));
		dump($data);
		D('User')->u($data);
		$this->success('密码修改成功');
	}

    // 注册页面
	public function register(){
		$schoolList = D('School')->rList();
		$this->assign('schoolList', $schoolList);
		$this->assign('headTitle', '用户注册');
		$this->display();
    }
	// 处理注册
	public function registerDo(){
		$maxId = D('User')->rMaxId();
		$_POST['nickname'] = 'user'.($maxId+1234);
		$msg = D('User')->c();
		if ($msg == 'OK') {
			$this->loginSuccess($_POST['email']);
			$this->success('注册成功', U('Index/index'));
		}
		else
			$this->error('注册失败，'.$msg);
    }
	// 登录页面
	public function login() {
		if (!empty($_SESSION['login'])) {
			$this->success('登录成功', U('Index/index'));
			die();
		}
		$this->assign('headTitle', '用户登录');
		$this->display();
	}
	// 处理登录
	public function loginDo() {		
		if (empty($_POST['email'])) $this->error('登录失败，用户名不正确');
		if (empty($_POST['password'])) $this->error('登录失败，密码不正确');
		$user = D('User')->rByEmail($this->_post('email'));
		if (encrypt($_POST['password']) != $user['password']) $this->error('登录失败，密码不正确');
		$this->loginSuccess($_POST['email']);
		if ($_POST['keep'] == 'on') {
			cookie('email', $_POST['email'], 86400*14);
			cookie('password', $_POST['password'], 86400*14);
		}
		$this->success('登录成功', U('Index/index'));
	}
	
	// 处理登录成功后的数据
	public function loginSuccess($email = 0) {
		if (empty($email)) return;
		$_SESSION['login'] = 1;
		$user = D('User')->rByEmail($email);
		$_SESSION['id'] = $user['id'];
		$_SESSION['name'] = $user['nickname'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['school_id'] = $user['school_id'];
		$_SESSION['group_id'] = $user['group_id'];
	}
	// 登出
	public function logout() {
		unset($_SESSION['login']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['school_id']);
		unset($_SESSION['group_id']);
		cookie('email', null);
		cookie('password', null);
		$this->success('登出成功', U('Index/index'));
	}
}