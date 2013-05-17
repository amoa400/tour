<?php
return array(
	
	// 数据库
	'DB_HOST'	=> 	'168.63.149.21',// 数据库地址
	'DB_NAME'	=>	'tour', 	// 数据库名称
	'DB_USER'	=>	'root',		// 数据库用户名
	'DB_PWD'	=>	'loveA400',			// 数据库密码
	'DB_PORT'	=>	'3306',		// 数据库端口
	'DB_PREFIX' => 	'tour_',	// 数据库前缀
	
	// 数据库
	'DB_HOST'	=> 	'localhost',// 数据库地址
	'DB_NAME'	=>	'tour2', 	// 数据库名称
	'DB_USER'	=>	'root',		// 数据库用户名
	'DB_PWD'	=>	'',			// 数据库密码
	'DB_PORT'	=>	'3306',		// 数据库端口
	'DB_PREFIX' => 	'tour_',	// 数据库前缀
	
	// 模版
	'TMPL_L_DELIM'	=>	'<{',	// 模版变量前缀
	'TMPL_R_DELIM'	=>	'}>',	// 模版变量后缀

	'TMPL_PARSE_STRING' => array(
		'__ROOT__' => 'http://xiaoqs.com',				// 网站地址
		'__ROOT2__' => 'http://xiaoqs.com',
//		'__ROOT__' => 'http://127.0.0.1/Tour/Public/',	// 网站地址
		'__NAME__' => '758大学生旅行网',					// 网站名字 jingjingt.com
		'__NAME2__' => '758旅行',						// 网站名字缩写	jingjingt.com
		'__NAME3__' => '758',						// 网站名字缩写	jingjingt.com
	),
	
	'URL_MODEL' => '2',	// 路由模式
	
	'SHOW_PAGE_TRACE' => true,	// 显示调试信息
	
	'TMPL_ACTION_ERROR' => 'Page:dispatch', 	// 错误页面
	'TMPL_ACTION_SUCCESS' => 'Page:dispatch', 	// 成功页面
	
	// 静态缓存
	'HTML_CACHE_ON' 	=> false,	// 开关
	'HTML_CACHE_TIME'	=> 86400,	// 缓存默认时间
	'HTML_CACHE_RULES' 	=> array (
		'Index:index' => array('Index/index'),
	),
	
);
?>