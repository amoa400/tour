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



<link href="__ROOT__/css/user.css" rel="stylesheet" media="screen">

<div id="user" class="main_container wallpaper2">

	<!--左方区域-->
	<div class="left_area">
		<div class="head"><a href="<?php echo U('User/home') ?>"><i class="icon icon_home"></i>&nbsp;会员中心</a></div>
		<ul>
			<li class="title">交易管理</li>
			<li><a href="<?php echo U('User/order') ?>">我的订单</a></li>
			<li class="title">账户管理</li>
			<li><a href="<?php echo U('User/info') ?>">个人资料</a></li>
			<li><a href="<?php echo U('User/password') ?>">修改密码</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	

	
	<!--右方区域-->
	<div class="right_area">
		<!--会员信息-->
		<div class="info">
			<div class="photo">
				<img src="__ROOT__/images/user/photo.jpg"/>
				<span><a href="<?php echo U('User/info') ?>">编辑个人资料</a></span>
			</div>
			<div class="other">
				<div class="item">
					<span style="font-size:14px"><?php echo $_SESSION['name'] ?></span>，<span style="color:#999999">欢迎您！</span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon icon_user"></i>
				</div>
				<div class="item">所在学校：<?php if ($user['school_id'] == 0) { ?>其他<?php } else { echo ($user["school"]); } ?></div>
				<div class="item">抵用券余额：¥<?php echo ($user["gold"]); ?></div>
				<div class="item">会员积分：<?php echo ($user["point"]); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<!--近期订单-->
		<div class="order">
			<div class="title">近期订单</div>
			<table>
				<tr style="background:#e9e9e9;font-weight:bold;">
					<td width="10%">订单编号</td>
					<td width="40%">产品信息</td>
					<td width="10%">订单金额</td>
					<td width="10%">订单状态</td>
					<td width="10%">下单时间</td>
					<td width="20%">操作</td>
				</tr>
				<?php if (empty($orderList)) { ?>
				<tr>
					<td colspan="6">暂无订单，赶紧去预定吧！</td>
				</tr>
				<?php } else { ?>
				<?php foreach($orderList AS $order) { ?>
				<tr>
					<td><a href="<?php echo U('Order/show?id='.$order['id']) ?>" target="_blank"><?php echo ($order["id"]); ?></a></td>
					<?php if (!empty($order['line_id'])) { ?>
					<?php if ($order['type'] == 4) { ?>
					<td><a href="<?php echo U('Point/show?id='.$order['line_id']); ?>" target="_blank"><?php echo ($order["line_name"]); ?>&nbsp;×&nbsp;<?php echo ($order["people_count"]); ?>人</a></td>
					<?php } else { ?>
					<td><a href="<?php echo U('Line/show?id='.$order['line_id']); ?>" target="_blank"><?php echo ($order["line_name"]); ?>&nbsp;×&nbsp;<?php echo ($order["people_count"]); ?>人</a></td>
					<?php } ?>
					<?php } else { ?>
					<td><a href="javascript:void(0)"><?php echo ($order["line_name"]); ?>&nbsp;×&nbsp;<?php echo ($order["people_count"]); ?>人</a></td>
					<?php } ?>
					<?php if ($order['price'] != 0) { ?>
					<td class="price">¥<?php echo ($order["price"]); ?></td>
					<?php } else { ?>
					<td class="price">待定</td>
					<?php } ?>
					<td><?php echo ($order["status_name"]); ?></td>
					<td class="time"><?php echo ($order["submit_time"]); ?></td>
					<td>
						<?php if ($order['status'] == 3) { ?>
							<a href="<?php echo U('Order/pay?id='.$order['id']) ?>" target="_blank"><strong>立即付款</strong></a><br>
						<?php } ?>
						<?php if ($order['status'] == 1) { ?>
							<?php if ($order['type'] == 1) { ?>
							<a href="<?php echo U('Order/step1?id='.$order['id']) ?>" target="_blank">修改订单</a><br>
							<?php } else { ?>
							<a href="<?php echo U('Order/teamStep1?id='.$order['id']) ?>" target="_blank">修改订单</a><br>
							<?php } ?>
						<?php } ?>
						<a href="<?php echo U('Order/show?id='.$order['id']); ?>" target="_blank">查看详情</a><br>
						<?php if ($order['status'] == 2 || $order['status'] == 3) { ?>
							<a href="javascript:void(0)" onclick="confirmDel('<?php echo U('Order/remove?id='.$order['id']) ?>', '<?php echo ($order["id"]); ?>', '<?php echo ($order["line_name"]); ?>')">取消订单</a><br>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
				<?php } ?>
			</table>
			<br>
		</div>
		
		<div class="clear"></div>
	</div>
	
	<div class="clear"></div>
	
</div>

<script type="text/javascript" src="__ROOT__/js/user.js" charset="utf-8"></script>


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