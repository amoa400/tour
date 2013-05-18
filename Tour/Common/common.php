<?php
// 加密字符串
function encrypt( $s ) {
	return md5( sha1( $s ) );
}
	
// 获取时间
function getTime() {
	return time();
}

// 转换成时间
function intToTime($time) {
	return date('Y-m-d H:i:s', $time);
}

// 转换成时间
function timeToInt($time) {
	return strtotime($time);
}

// 前台过滤
function html( $s ) {
	return htmlspecialchars( $s );
}
	
// 获取日期
function getCntDate() {
	return date('Y-m-d', getTime());
}
	
// 元素是否在集合里
function isIn( $data, $arr ) {
	foreach( $arr as $a ) {
		if ( $data == $a ) return true;
	}
	return false;
}
	
// 检车变量是否是日期
function isDate($date, $format) {
	$unixTime = strtotime($date);
	$checkDate = date($format, $unixTime);
	if($checkDate == $date)
		return $date;
	else
		return 0;
}

// 检车是否登录
function isLogin() {
	if (empty($_SESSION['login'])) {
		redirect(U('User/login'));
		return false;
	}
	return true;
}

// 景点上传图片返回编号
$point_photo_ret_id = 0;
function getPointPhotoId() {
	global $point_photo_ret_id;
	$point_photo_ret_id++;
	return $point_photo_ret_id;
}

// 将br转换成\n
function br2nl($text) {    
    return preg_replace('/<br\\s*?\/??>/i', '', $text);   
}

// 递归创建目录
function recursiveMkdir($path, $mode = 0775){
	if (!file_exists($path)) {
		recursiveMkdir(dirname($path), $mode);
		mkdir($path, $mode);
	}
}