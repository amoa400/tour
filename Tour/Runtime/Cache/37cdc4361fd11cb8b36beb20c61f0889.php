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

		
		<div class="header_main">
			<div class="content main_container">
				<div class="logo">
					<a href="__ROOT2__"><img src="__ROOT__/images/logo.png"/></a>
				</div>
				<div class="city">
					<!--
					<h5>上海出发</h5>
					<a href="#" class="change_city">切换城市<i class="icon-drop-down"></i></a>-->
				</div>
				<div class="ad">
					<a href="__ROOT2__"><img src="__ROOT__/images/header/ad.png"/></a>
				</div>
			</div>
		</div>

		<div class="header_nav">
			<div class="content main_container">
				<ul>
					<li style="margin-left:8px;" <?php if ($headTitle == '') { ?>class="on"<?php } ?>><a href="__ROOT2__"><span>首页</span></a></li>
					<li <?php if ($headTitle == '班级游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=3&line_type=1') ?>"><span>班级游</span></a></li>
					<li <?php if ($headTitle == '城市游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=1') ?>"><span>城市游</span></a></li>
					<li <?php if ($headTitle == '古镇游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=2') ?>"><span>古镇游</span></a></li>
					<li <?php if ($headTitle == '山水游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=3') ?>"><span>山水游</span></a></li>
					<li <?php if ($headTitle == '温泉游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=4') ?>"><span>温泉游</span></a></li>
					<li <?php if ($headTitle == '乐园游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=5') ?>"><span>乐园游</span></a></li>
					<li <?php if ($headTitle == '古迹游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=6') ?>"><span>古迹游</span></a></li>
					<!--<li <?php if ($headTitle == '会议接待') { ?>class="on"<?php } ?>><a href="#"><span>会议接待</span></a></li>
					<li <?php if ($headTitle == '租车') { ?>class="on"<?php } ?>><a href="#"><span>租车</span></a></li>
					-->
					<!--
					<li><a href="#"><span>本地游</span></a></li>
					<li><a href="#"><span>周边游</span></a></li>
					<li><a href="#"><span>国内游</span><a/></li>
					<li><a href="#"><span>出境游</span></a></li>
					<li><a href="#"><span>联谊游</span></a></li>
					<li><a href="#"><span>酒店</span></a></li>
					<li><a href="#"><span>租车</span></a></li>
					<li><a href="#"><span>道具</span></a></li>
					<li><a href="#"><span>烧烤食材</span></a></li>
					<li><a href="#"><span>景点介绍</span></a></li>
					<li><a href="#"><span>出游攻略</span></a></li>
					-->
				</ul>
				<div class="kefu">
					<i class="icon-headphones icon-white"></i><span>&nbsp;客服：021-5160-2963</span>
				</div>
			</div>
			<div class="bg"></div>
		</div>
		
		
	</div>
	
	<div class="wallpaper">



<link href="__ROOT__/css/page/page.css" rel="stylesheet" media="screen">

<div id="team" class="main_container wallpaper2" style="height:350px;">
	
	<div style="margin:0 auto;width:500px;margin-top:70px;">
		<div style="float:left;height:150px;">
			<?php if (!empty($message)) { ?>
			<img src="__ROOT__/images/success.png">
			<?php } else { ?>
			<img src="__ROOT__/images/error.png">
			<?php } ?>
		</div>
		<div style="float:left;font-size:20px;padding-top:50px;margin-left:20px;">
			<?php if (!empty($message)) { ?>
			<span style="font-weight:bold;"><?php echo ($message); ?></span><br>
			<?php } else { ?>
			<span style="font-weight:bold;"><?php echo ($error); ?></span><br>
			<?php } ?>
			<span style="font-weight:bold;"><a id="href" href="<?php echo($jumpUrl); ?>">页面自动将在<b id="wait"><?php echo($waitSecond); ?></b>秒后跳转</a></span>
		</div>
	</div>
	
</div>

</div>
</body>

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>

</html>