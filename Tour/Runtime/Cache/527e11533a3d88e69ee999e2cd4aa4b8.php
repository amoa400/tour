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



<link href="__ROOT__/css/order_show.css" rel="stylesheet" media="screen">

<div id="order" class="main_container wallpaper2">

	<div class="left_area">
		<div class="head">
			<div class="title">订单详情</div>
			<div class="content">
				<span style="margin:0;">订单编号：<?php echo ($order["id"]); ?></span>
				<span>下单时间：<?php echo ($order["submit_time"]); ?></span>
				<span>订单状态：<?php echo ($order["status_name"]); ?></span>
			</div>
			<div class="content">
				订单金额：<strong><?php if ($order['price'] == 0) echo '待定'; else { ?>¥<?php echo ($order["price"]); } ?></strong>
			</div>
		</div>
		
		<!--产品信息-->
		<div class="item">
			<div class="title">产品信息</div>
			<div class="content">
				<?php if ($order['type'] == 4) { ?>
				<table>
					<tr class="tt">
						<td width="15%">产品类型</td>
						<td width="50%">产品名称</td>
						<td width="15%">游玩日期</td>
						<td width="10%">数量</td>
						<td width="10%">小计</td>
					</tr>
					<?php foreach($order['ticketList'] as $item) { ?>
					<tr>
						<td><?php echo ($order["type_name"]); ?></td>
						<td><a href="<?php echo U('Point/show?id='.$order['line_id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></td>
						<td><?php echo ($order["departure_date"]); ?></td>
						<td><?php echo ($item["count"]); ?>&nbsp;张</td>
						<td class="price">¥<?php echo $item['count']*$item['unit_price'] ?></td>
					</tr>
					<?php } ?>
				</table>
				<?php } else { ?>
				<table>
					<tr class="tt">
						<td width="15%">产品类型</td>
						<td width="50%">产品名称</td>
						<td width="15%">出发日期</td>
						<td width="10%">出游人数</td>
						<td width="10%">小计</td>
					</tr>
					<tr>
						<td><?php echo ($order["type_name"]); ?></td>
						<?php if (!empty($order['line_id'])) { ?>
						<td><a href="<?php echo U('Line/show?id='.$order['line_id']) ?>" target="_blank"><?php echo ($order["line_name"]); ?></a></td>
						<?php } else { ?>
						<td><?php echo ($order["line_name"]); ?></td>
						<?php } ?>
						<td><?php echo ($order["departure_date"]); ?></td>
						<td><?php echo ($order["people_count"]); ?>&nbsp;成人</td>
						<?php if ($order['type'] == 1) { ?>
						<td class="price">¥<?php echo $order['people_count']*$order['line_price'] ?></td>
						<?php } else { ?>
						<td class="price">
							<?php if ($order['line_price'] == 0) echo '待定'; else { ?>
							¥<?php echo ($order["line_price"]); ?>
							<?php } ?>
						</td>
						<?php } ?>
					</tr>
				</table>
				<?php } ?>
			</div>
		</div>
		
		<!--附加项目-->
		<div class="item">
			<div class="title">附加项目</div>
			<div class="content">
				<table>
					<tr class="tt">
						<td width="60%">项目名称</td>
						<td width="10%">单价</td>
						<td width="10%">单位</td>
						<td width="10%">份数</td>
						<td width="10%">小计</td>
					</tr>
					
					<?php $flag = false; ?>
					
					<!--保险-->
					<?php foreach($order['insurance'] as $item) { if($item['count'] == 0) continue; $flag = true; ?>
					<tr>
						<td><?php echo ($item["name"]); ?></td>
						<td>¥<?php echo ($item["price"]); ?></td>
						<td>人</td>
						<td><?php echo ($item["count"]); ?></td>
						<td class="price">¥<?php echo $item['price']*$item['count'] ?></td>
					</tr>
					<?php } ?>
					
					<!--抵用券-->
					<?php if ($order['privilege_di']) { $flag = true; ?>
					<tr>
						<td>抵用券</td>
						<td>-&nbsp;¥<?php echo ($order["line"]["di_price"]); ?></td>
						<td>份</td>
						<td><?php echo ($order["people_count"]); ?></td>
						<td class="price">-&nbsp;¥<?php echo $order['people_count']*$order['line']['di_price'] ?></td>
					</tr>
					<?php } ?>
					
					<!--优惠券-->
					<?php if (!empty($order['coupon'])) { $flag = true; ?>
					<tr>
						<td>优惠券(<?php echo ($order["coupon"]["code"]); ?>)</td>
						<td>-&nbsp;¥<?php echo ($order["coupon"]["price"]); ?></td>
						<td>份</td>
						<td><?php echo ($order["people_count"]); ?></td>
						<td class="price">-&nbsp;¥<?php echo $order['people_count']*$order['coupon']['price'] ?></td>
					</tr>
					<?php } ?>
					
					<!--无附加项目-->
					<?php if (!$flag) { ?>
					<tr>
						<td colspan="5">暂无附加项目</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		
		<!--上车地点-->
		<?php if (!empty($order['bus'])) { ?>
		<div class="item">
			<div class="title">上车地点</div>
			<div class="content"><?php echo ($order["bus"]["departure_time"]); ?>&nbsp;&nbsp;<?php echo ($order["bus"]["departure_location"]); ?>&nbsp;（<?php echo ($order["bus"]["remark"]); ?>）<br>
			返程地点：<?php echo ($order["bus"]["return_location"]); ?><br>
			<?php if ($order['surrounding_departrue'] == 1) { ?>
				特色服务：学校周边上车（当您所在学校及周边学校报名人数足够时，您可以选择在您的学校附近地区上车）
			<?php } ?>
			</div>
		</div>
		<?php } ?>
		
		<!--游客信息-->
		<?php if ($order['type'] == 1) { ?>
		<div class="item">
			<div class="title">游客信息</div>
			<div class="content">
				<table style="width:60%">
					<tr class="tt">
						<td width="30%">姓名</td>
						<td width="40%">身份证</td>
						<td width="30%">手机</td>
					</tr>
					<?php $flag = false; ?>
					<?php foreach($order['tourist'] as $item) { $flag = true; ?>
					<tr>
						<td><?php echo ($item["name"]); ?></td>
						<td><?php if (empty($item['card'])) echo '----'; else { echo ($item["card"]); } ?></td>
						<td><?php if (empty($item['phone'])) echo '----'; else { echo ($item["phone"]); } ?></td>
					</tr>
					<?php } ?>
					
					<!--无游客-->
					<?php if (!$flag) { ?>
					<tr>
						<td colspan="5">暂无游客</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<?php } ?>
	
		<?php if (!empty($order['tourist']) && $order['type'] == 4) { ?>
		<div class="item">
			<div class="title">游客信息</div>
			<div class="content">
				<table style="width:90%">
					<tr class="tt">
						<td width="20%">姓名</td>
						<td width="22%">身份证</td>
						<td width="18%">手机</td>
						<td width="30%">门票</td>
					</tr>
					<?php $flag = false; ?>
					<?php foreach($order['tourist'] as $item) { $flag = true; ?>
					<tr>
						<td><?php echo ($item["name"]); ?></td>
						<td><?php if (empty($item['card'])) echo '----'; else { echo ($item["card"]); } ?></td>
						<td><?php if (empty($item['phone'])) echo '----'; else { echo ($item["phone"]); } ?></td>
						<td><?php echo ($item["ticket_name"]); ?></td>
					</tr>
					<?php } ?>
					
					<!--无游客-->
					<?php if (!$flag) { ?>
					<tr>
						<td colspan="5">暂无游客</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<?php } ?>
		
	</div>
	
	<div class="right_area">
		<div class="item2">
			<div class="title">联系人信息</div>
			<div class="content">
				<ul>
					<li><span class="tt">姓名：</span><?php echo ($order["contact_name"]); ?></li>
					<li><span class="tt">电话：</span><?php echo ($order["contact_phone"]); ?></li>
					<?php if (!empty($order['contact_phone2'])) { ?>
					<li><span class="tt">电话：</span><?php echo ($order["contact_phone2"]); ?></li>
					<?php } ?>
					<li><span class="tt">邮箱：</span><?php echo ($order["contact_email"]); ?></li>
				</ul>
			</div>
		</div>
		
		<div class="item2">
			<div class="title">注意事项</div>
			<div class="content">
				<ul>
					<li><span class="tt">1、</span>请确保联系人和出游人的电话处于正常状态，没有关机、停机等，以便于我们联系您。</li>
					<li><span class="tt">2、</span>旅游途中有任何问题，可以联系我们的客服，我们将竭诚为您服务。</li>
				</ul>
			</div>
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