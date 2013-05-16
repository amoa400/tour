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
					<li <?php if ($headTitle == '班级游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/banji') ?>"><span>班级游</span></a></li>
					<li <?php if ($headTitle == '周边游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/zhoubian') ?>"><span>周边游</span></a></li>
					<li <?php if ($headTitle == '国内游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/guonei') ?>"><span>国内游</span></a></li>
					<li <?php if ($headTitle == '出境游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/chujing') ?>"><span>出境游</span></a></li>
					<li <?php if ($headTitle == '景点门票') { ?>class="on"<?php } ?>><a href="<?php echo U('Ticket/index') ?>"><span>景点门票</span></a></li>
					<li <?php if ($headTitle == '租车') { ?>class="on"<?php } ?>><a href="<?php echo U('Page/zuche') ?>"><span>租车</span></a></li>
					<!--<li <?php if ($headTitle == '乐园游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=5') ?>"><span>乐园游</span></a></li>
					<li <?php if ($headTitle == '古迹游') { ?>class="on"<?php } ?>><a href="<?php echo U('Line/search?t=1&point_type=6') ?>"><span>古迹游</span></a></li>-->
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
<link href="__ROOT__/css/page/team.css" rel="stylesheet" media="screen">

<div id="team" class="main_container wallpaper2">
	<div class="head">
		<img src="__ROOT__/images/page/team/flow.png">&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn" target="_blank" href="<?php echo U('Order/order') ?>">&nbsp;</a>
		<br>
	</div>
	<div class="succeed">
		<div class="title"><img src="__ROOT__/images/page/team/succeed.png"></div>
		<div class="content">
			<div class="item" style="margin-left:0;margin-top:0;">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed1.jpg"></li>
					<li>团队名称：某高校学生会</li>
					<li>游览景点：天目湖、南山竹海、御水温泉</li>
					<li>出游日期：2013-03-22 ~ 2013-03-23</li>
					<li>游览人数：87人</li>
				</ul>
			</div>
			<div class="item" style="margin-top:0;">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed2.jpg"></li>
					<li>团队名称：某部门暑期社会实践</li>
					<li>游览景点：横店影视城、梦幻谷</li>
					<li>出游日期：2012-07-09 ~ 2012-07-11</li>
					<li>游览人数：14人</li>
				</ul>
			</div>
			<div class="item" style="margin-top:0;">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed3.jpg"></li>
					<li>团队名称：某班级春游</li>
					<li>游览景点：常州恐龙园</li>
					<li>出游日期：2013-04-04 ~ 2013-04-05</li>
					<li>游览人数：22人</li>
				</ul>
			</div>
			<div class="item" style="margin-left:0;">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed4.jpg"></li>
					<li>团队名称：某班级毕业旅行</li>
					<li>游览景点：厦门、鼓浪屿、永定土楼</li>
					<li>出游日期：2013-03-04 ~ 2013-04-06</li>
					<li>游览人数：17人</li>
				</ul>
			</div>
			<div class="item">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed5.jpg"></li>
					<li>团队名称：某组织会议接待</li>
					<li>游览景点：张家界、凤凰古城</li>
					<li>出游日期：2012-08-15 ~ 2013-08-17</li>
					<li>游览人数：24人</li>
				</ul>
			</div>
			<div class="item">
				<ul>
					<li style="margin:0;"><img src="__ROOT__/images/page/team/succeed6.jpg"></li>
					<li>团队名称：某团队暑期出国游</li>
					<li>游览景点：济州岛、首尔</li>
					<li>出游日期：2013-07-21 ~ 2013-07-25</li>
					<li>游览人数：8人</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>
	
</div>


	</div>

	<div class="clear"></div>
	<div id="footer">
		<div class="helper">
			<div class="main_container">
				<ul>
					<li style="border:0;">
						<span class="title">游客中心</span>
						<span>&nbsp;&nbsp;<a href="#">免费注册</a></span>
						<span>&nbsp;&nbsp;<a href="#">订单查询</a></span>
						<span>&nbsp;&nbsp;<a href="#">订阅__NAME2__优惠信息</a></span>
					</li>
					<li>
						<span class="title">预订帮助</span>
						<span>&nbsp;&nbsp;<a href="#">预订常见问题</a></span>
						<span>&nbsp;&nbsp;<a href="#">付款与安全</a></span>
						<span>&nbsp;&nbsp;<a href="#">其它注意事项</a></span>
					</li>
					<li>
						<a href="__ROOT__"><img src="__ROOT__/images/footer/logo.png"/></a>
					</li>
					<li>
						<span class="title">企业服务</span>
						<span>&nbsp;&nbsp;<a href="#">旅行社加盟</a></span>
						<span>&nbsp;&nbsp;<a href="#">营销合作</a></span>
						<span>&nbsp;&nbsp;<a href="#">旅游同业社区</a></span>
					</li>
					<li style="width:147px;">
						<span class="title">关注我们</span>
						<span>&nbsp;&nbsp;<a href="#"><i class="icon-renren"></i>&nbsp;__NAME2__人人主页</a></span>
						<span>&nbsp;&nbsp;<a href="#"><i class="icon-weibo"></i>&nbsp;__NAME2__新浪微博</a></span>
						<span>&nbsp;&nbsp;<a href="#"><i class="icon-weixin"></i>&nbsp;扫描微信二维码</a></span>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="link main_container">
			<ul>
				<li><a href="#">关于__NAME2__</a></li>
				<li class="divide">|</li>
				<li><a href="#">加入__NAME2__</a></li>
				<li class="divide">|</li>
				<li><a href="#">免责声明</a></li>
				<li class="divide">|</li>
				<li><a href="#">联系__NAME2__</a></li>
				<li class="divide">|</li>
				<li><a href="#">建议与投诉</a></li>
				<li class="divide">|</li>
				<li><a href="#">旅行社加盟</a></li>
			</ul>
		</div>
		<div class="clear"></div>
		
		<div class="certificate main_container">
			<ul>
				<li style="margin-left:0;"><a href="#"><img src="__ROOT__/images/footer/certificate1.png"></a></li>
				<li><a href="#"><img src="__ROOT__/images/footer/certificate2.png"></a></li>
				<li><a href="#"><img src="__ROOT__/images/footer/certificate3.png"></a></li>
				<li><a href="#"><img src="__ROOT__/images/footer/certificate4.png"></a></li>
				<li><a href="#"><img src="__ROOT__/images/footer/certificate5.png"></a></li>
				<li><a href="#"><img src="__ROOT__/images/footer/certificate6.png"></a></li>
			</ul>
		</div>
		<div class="clear"></div>
		
		<div class="copyright main_container">
			Copyright 2013 __NAME__ tx758.com 沪ICP备12038216号
		</div>
		
	</div>
	
</body>

<script>
	$('.droptip').tooltip('hide');
	$("img.lazy").lazyload();
</script>

</html>