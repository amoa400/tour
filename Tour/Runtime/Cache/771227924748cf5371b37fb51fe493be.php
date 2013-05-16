<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="__NAME__" />
	<title><?php if (!empty($headTitle)) echo $headTitle.'__'; ?>__NAME____同学，去玩吧！专注大学生旅行</title>

	<link href="__ROOT__/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/global.css" rel="stylesheet" type="text/css">
	<script src="__ROOT__/js/jquery.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/jquery.lazyload.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/global.js" type="text/javascript" ></script>
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?fe46971a02721794ec231cdfa11caedb";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
	
</head>

<body>

	<div id="header">

		<div class="header_top">
			<div class="content main_container">
				<?php if (empty($_SESSION['login'])) { ?>
				<ul class="left">
					<li class="first_li">您好，欢迎来到__NAME__</li>
					<li>|</li>
					<li><a href="<?php echo U('User/login') ?>">登录</a></li>
					<li>|</li>
					<li><a href="<?php echo U('User/register') ?>">免费注册</a></li>
				</ul>
				<?php } ?>
				
				<ul class="right">
					<?php if (!empty($_SESSION['login'])) { ?>
					<li class="first_li"><?php echo ($_SESSION["name"]); ?><i class="icon icon_user"></i>&nbsp;&nbsp;[<a href="<?php echo U('User/logout') ?>">登出</a>]</li>
					<li>|</li>
					<?php } ?>
					<?php if ($_SESSION['group_id'] == 3 || $_SESSION['group_id'] == 4 || $_SESSION['group_id'] == 5) { ?>
					<li><a href="<?php echo U('Fenxiao/home') ?>">我的分销平台</a></li>
					<li>|</li>
					<?php } ?>
					<li><a href="<?php echo U('User/home') ?>">我的__NAME2__<!--<i class="icon-drop-down"></i>--></a></li>
					<!--<li>|</li>
					<li><a href="#">联系客服</a></li>
					<li>|</li>
					<li><a href="#"><i class="icon-suitcase"></i>&nbsp;旅行箱&nbsp;<span class="cart">0</span>&nbsp;件</a></li>-->
					<li>|</li>
					<li><a href="http://page.renren.com/601509075" target="_blank"><i class="icon-renren"></i>&nbsp;+__NAME2__人人</a></li>
					<!--<li>|</li>
					<li><a href="#"><i class="icon-weibo"></i>&nbsp;+__NAME2__微博</a></li>-->
				</ul>
			</div>
		</div>
		<div class="clear"></div>

</div>

<link href="__ROOT__/css/order.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="__ROOT__/js/order.js" charset="utf-8"></script>

<div id="order" class="main_container">
	
	<div class="order_header">
		<div class="logo"><a href="<?php echo U('Index/index'); ?>"><img src="__ROOT__/images/logo.png"></a></div>
		<div class="contact">021-5160-2963</div>
		<div class="clear"></div>
	</div>
	
	<div class="navi">
		<ul>
			<li>填写订单</li>
			<li>填写出游人</li>
			<li>核对订单</li>
			<li>签约付款</li>
			<li>预定成功</li>
		</ul>
	</div>
	


<style>
	#order .navi {display:none;}
</style>
	
<div class="detail succeed">
	<div class="head">
		<div class="pic"><img src="__ROOT__/images/order/succeed.png"></div>
		<div class="text"><span>您的订单已提交，我们将会尽快处理。</span><br>请确保联系人电话处于正常状态，我们将有专属客服与您取得联系，协商团队出游细节。</div>
		<div class="clear"></div>
	</div>

	<div class="content">
	
		<ul>
			<li>出游景点：<?php echo ($order["team"]["destination"]); ?></li>
			<li>出发日期：<?php echo ($order["departure_date"]); ?></li>
			<li>出游人数：<?php echo ($order["people_count"]); ?></li>
		</ul>
		
	</div>
	
	<div class="foot">
		<i class="icon-list-alt"></i>&nbsp;<a href="<?php echo U('User/order') ?>">我的订单中心</a>（可查看订单详情）<br><br>
		<i class="icon-list-alt"></i>&nbsp;<a href="__ROOT__">返回首页</a><br><br>
		<!--分享-->
		<div class="jiathis_style">
			<span class="jiathis_txt">告诉大家我要去玩咯：</span>
			<a class="jiathis_button_renren">人人网</a>
			<a class="jiathis_button_tsina">新浪微博</a>
			<a class="jiathis_button_qzone">QQ空间</a>
			<a class="jiathis_button_tqq">腾讯微博</a>
			<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
		</div>
	</div>
	
	<script>
		var jiathis_config = {
			url:"__ROOT__",
			title:"我要去这里玩咯...",
			summary:"<?php echo ($order["team"]["destination"]); ?>...__NAME___大学生专属旅游网站",
			pic:"__ROOT__/images/logo.png",
		}
	</script>
	<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1356957111629175" charset="utf-8"></script>

	<div class="clear"></div>
</div>

<script>

</script>
	
	
	<div class="clear"></div>
</div>

</div>

<div class="clear"></div>

<div style="text-align:center;margin-top:10px;">
	Copyright © 2012-2013 __NAME__<br><br><br>
</div>

</body>

</html>