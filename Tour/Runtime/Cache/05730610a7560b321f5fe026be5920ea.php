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



<link href="__ROOT__/css/ticket.css" rel="stylesheet" media="screen">

<div id="ticket" class="main_container">
	<div class="ad">
		<!--广告图片-->
		<?php  $cnt = 0; foreach($ticketAdList as $item) { $cnt++; ?>
		<a href="<?php echo U('Point/show?id='.$item['id']) ?>" target="_blank"><img id="img<?php echo ($cnt); ?>" class="img" <?php if ($cnt != 1) {?> style="display:none" <?php } ?> src="__ROOT__/images/ticket/indexAd/ad<?php echo ($cnt); ?>.jpg"></a>
		<?php } ?>
		
		<!--搜索框-->
		<div class="so">
			<div class="content">
				<div class="title"><i class="icon icon_title"></i>&nbsp;打折门票</div>
				<div class="so2">
					<form action="<?php echo U('Ticket/search') ?>" method="get">
					<span>城市/景点&nbsp;&nbsp;</span>	
					<input name="k" type="text">
					<span>&nbsp;</span>
					<input type="submit" value="">
					</form>
				</div>
				<div class="rec">
					<span>重点推荐</span>
					<div>
						<a href="#">上海欢乐谷</a>&nbsp;
						<a href="#">常州中华恐龙园</a>&nbsp;
						<a href="#">春秋乐园</a>&nbsp;<br>
						<a href="#">横店影视城</a>&nbsp;
						<a href="#">溪口风景区</a>&nbsp;
						<a href="#">西塘</a>&nbsp;
						<a href="#">周庄</a>&nbsp;
					</div>
				</div>
			</div>
			<div class="border"></div>
		</div>

		<!--导航-->
		<div class="navi">
			<?php  $cnt = 0; foreach($ticketAdList as $item) { $cnt++; ?>
			<div class="item" onmouseover="adShow(<?php echo ($cnt); ?>)" onmouseout="startAd()" <?php if ($cnt == 1) { ?> style="margin-top:0;" <?php } ?>>
				<div id="title<?php echo ($cnt); ?>" class="title <?php if ($cnt == 1) { ?>title_focus<?php } ?>"><?php echo ($item["name"]); ?></div>
				<div id="desc<?php echo ($cnt); ?>" class="desc  <?php if ($cnt == 1) { ?>desc_focus<?php } ?>"><?php echo ($item["desc"]); ?></div>
				<div id="bg<?php echo ($cnt); ?>" class="bg <?php if ($cnt == 1) { ?>bg_focus<?php } ?>"></div>
			</div>
			<?php } ?>
		</div>
		
	</div>
	
	<div class="left_panel">
		<!--主题推荐-->
		<div class="subject panel">
			<div class="title">主题推荐</div>
			<div class="content">
				<ul>
					<?php foreach($pointTypeList as $item) { ?>
					<li><a href="<?php echo U('Ticket/search?subject='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
					<?php } ?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		
		<!--热卖排行-->
		<div class="hot panel">
			<div class="title">热卖排行（TOP10）</div>
			<div class="content">
				<?php  $cnt = 0; foreach($hotList as $item) { $cnt++; ?>
				<div class="item">
					<span class="rank"><?php echo ($cnt); ?></span>
					<span class="name"><a href="<?php echo U('Point/show?id='.$item['point_id'].'&ticket_id='.$item['id'].'#detail'.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></span>
					<span class="price">¥<?php echo ($item["price"]); ?>起</span>
				</div>
				<?php } ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<div class="right_panel">
		<!--打折门票精选-->
		<div class="rec panel">
			<div class="title">打折门票精选</div>
			<div class="content">
				<?php
 $cnt = 0; foreach($recList as $item) { $cnt++; ?>
				<div class="item" style="<?php if ($cnt%2==1) { ?>margin-left:0;<?php } if ($cnt <= 2) { ?>margin-top:0;<?php } ?>">
					<div class="pic"><a href="<?php echo U('Point/show?id='.$item['point_id'].'&ticket_id='.$item['id'].'#detail'.$item['id']) ?>" target="_blank"><img src="__ROOT__/images/ticket/photo/<?php echo ($item["id"]); ?>.jpg"></a></div>
					<div class="ct">
						<a href="<?php echo U('Point/show?id='.$item['point_id'].'&ticket_id='.$item['id'].'#detail'.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a>
						<span class="desc"><?php echo ($item["ad"]); ?></span>
						<span class="other">点评奖金：<font class="price2">¥<?php echo ($item["comment_price"]); ?></font></span>
						<span class="price">¥<?php echo ($item["price"]); ?>起</span>
					</div>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="more">
					<a href="#">查看更多门票>></a>
				</div>
			</div>
		</div>
	
		<!--小广告-->
		<div class="ad2">
			<a href="#"><img src="http://s3.lvjs.com.cn/opi/off-0426-tianmuhu-740x80.jpg"></img></a>
		</div>
		
		<!--特色游玩主题-->
		<div class="rec2 panel">
			<div class="title">特色游玩主题</div>
			<div class="content">
				<?php  $cnt = 0; foreach($pointTypeList as $item) { $cnt++; ?>
				<div class="item" style="<?php if ($cnt%3==1) { ?>margin-left:0;<?php } if ($cnt <= 3) { ?>margin-top:0;<?php } ?>">
					<div class="tt"><?php echo ($item["name"]); ?></div>
					<?php foreach($item['ticket'] as $item2) { ?>
					<div class="it">
						<span class="name"><a href="<?php echo U('Point/show?id='.$item2['point_id'].'&ticket_id='.$item2['ticket_id'].'#detail'.$item2['ticket_id']) ?>" target="_blank"><?php echo ($item2["name"]); ?></a></span><span class="price">¥<?php echo ($item2["price"]); ?>起</span>
					</div>
					<?php } ?>
					<?php for ($i = 0; $i<5-count($item['ticket']); $i++) { ?>				
					<div class="it">
						<span class="name">敬请期待</span><span class="price">¥0起</span>
					</div>
					<?php } ?>
				</div>
				<?php } ?>

				<div class="clear"></div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="__ROOT__/js/ticket.js" charset="utf-8"></script>

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