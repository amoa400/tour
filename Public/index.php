<?php
	session_start();
	define( 'APP_NAME', 'Tour' );
	define( 'APP_PATH', '../Tour/' );
	define( 'APP_DEBUG', TRUE );
	require '../ThinkPHP/ThinkPHP.php';
	
	$_SESSION['province_id'] = 1;
	$_SESSION['city_id'] = 1;

	if ($_SESSION['login'] != 1 && !empty($_COOKIE['email']) && !empty($_COOKIE['password'])) {
		$user = D('User')->rByEmail($_COOKIE['email']);
		if (encrypt($_COOKIE['password']) == $user['password']) {
			A('User')->loginSuccess($_COOKIE['email']);
		}
		else {
			cookie('email', null);
			cookie('password', null);
		}
	}