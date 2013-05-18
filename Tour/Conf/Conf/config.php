<?php
return array(

	// 鏁版嵁搴&#65533;
	'DB_HOST'	=> 	'168.63.149.21',// 数据库地址
	'DB_NAME'	=>	'tour', 	// 数据库名称
	'DB_USER'	=>	'root',		// 数据库用户名
	'DB_PWD'	=>	'loveA400',			// 数据库密码
	'DB_PORT'	=>	'3306',		// 数据库端口
	'DB_PREFIX' => 	'tour_',	// 数据库前缀
	
	// 妯＄増
	'TMPL_L_DELIM'	=>	'<{',	// 妯＄増鍙橀噺鍓嶇紑
	'TMPL_R_DELIM'	=>	'}>',	// 妯＄増鍙橀噺鍚庣紑

	'TMPL_PARSE_STRING' => array(
		'__ROOT__' => 'http://www.tx758.com',				// 缃戠珯鍦板潃
		'__ROOT2__' => 'http://www.tx758.com',
//		'__ROOT__' => 'http://127.0.0.1/Tour/Public/',	// 缃戠珯鍦板潃
		'__NAME__' => '758旅行网',					// 缃戠珯鍚嶅瓧 jingjingt.com
		'__NAME2__' => '758旅行',						// 缃戠珯鍚嶅瓧缂╁啓	jingjingt.com
		'__NAME3__' => '758',						// 缃戠珯鍚嶅瓧缂╁啓	jingjingt.com
	),
	
	'URL_MODEL' => '2',	// 璺敱妯″紡
	
	//'SHOW_PAGE_TRACE' => true,	// 鏄剧ず璋冭瘯淇℃伅
	
	'TMPL_ACTION_ERROR' => 'Page:dispatch', 	// 閿欒椤甸潰
	'TMPL_ACTION_SUCCESS' => 'Page:dispatch', 	// 鎴愬姛椤甸潰
	
	
	// 静态缓存
	'PAGE_CACHE' => true,
	
	// INCLUDE文件分割
	'TAGLIB_BEGIN' => '<',
	'TAGLIB_END'   => '>',
	
);
?>