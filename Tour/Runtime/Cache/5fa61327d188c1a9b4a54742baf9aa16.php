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



<link href="__ROOT__/css/search.css" rel="stylesheet" media="screen">
<link href="__ROOT__/css/jquery-ui-1.10.2.datepicker.min.css" rel="stylesheet" media="screen">

<div id="search" class="main_container wallpaper2">

	<div class="path">
		&nbsp;&nbsp;<a href="<?php echo U('Index/index') ?>">__NAME__</a>&nbsp;
		>&nbsp;&nbsp;<a href="<?php echo U('Ticket/index') ?>">景点门票</a>
		>&nbsp;&nbsp;<a href="#">门票搜索</a>	
		<?php if (!empty($_GET['k'])) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Ticket/search?k='.$_GET['k']) ?>"><?php echo $_GET['k']; ?></a>
		<?php } else { ?>
			<?php if (!empty($form['province'])) { ?>
			>&nbsp;&nbsp;<a href="<?php echo U('Point/search?province='.$form['province']) ?>"><?php echo ($form["province_name"]); ?></a>&nbsp;
			<?php } ?>
			<?php if (!empty($form['province']) && !empty($form['city'])) { ?>
			>&nbsp;&nbsp;<a href="<?php echo U('Point/search?province='.$form['province'].'&city='.$form['city']) ?>"><?php echo ($form["city_name"]); ?></a>
			<?php } ?>
		<?php } ?>
		
		<!--
		<?php if (empty($_GET['t'])) { ?>
		<?php if (empty($form['province'])) { ?>
		>&nbsp;&nbsp;<a href="#">门票搜索</a>
		<?php } ?>
		<?php if (!empty($form['province'])) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?province='.$form['province']) ?>"><?php echo ($cntProvince); ?>旅游</a>&nbsp;
		<?php } ?>
		<?php if (!empty($form['province']) && !empty($form['city'])) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?province='.$form['province'].'&city='.$form['city']) ?>"><?php echo ($cntCity); ?>旅游</a>
		<?php } ?>
		<?php } ?>
		
		<?php if ($_GET['t'] == 1) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?t=1&point_type='.$_GET['point_type']) ?>"><?php echo $pointTypeList[$form['point_type']-1]['name'] ?>游</a>
		<?php } ?>
		
		<?php if ($_GET['t'] == 2) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?t=2&point='.$_GET['point']) ?>"><?php echo ($point["name"]); ?></a>
		<?php } ?>
		
		<?php if ($_GET['t'] == 3) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?t=3&line_type=1') ?>">班级游</a>
		<?php } ?>
		-->

	</div>

	<!--左面板-->
	<div class="left_area">		
		<!--游记攻略-->
		<div class="panel" style="margin-top:0;">
			<div class="title"><?php echo ($cntCity); ?>游记攻略</div>
			<div class="content note_list">
				<!--<ul>
					<?php foreach($line['point_in_city'] as $point) { ?>
					<li><a href="#" title="<?php echo ($point['name_abb']); ?>(<?php echo ($point['count']); ?>)"><?php echo ($point['name_display']); ?>(<?php echo ($point['count']); ?>)</a></li>
					<?php } ?>
				</ul>-->
				暂无
				<div class="clear"></div>
			</div>
		</div>
		
		<!--同城旅游产品推荐-->
		<div class="panel">
			<div class="title">相关产品推荐</div>
			<div class="content note_list">
				<!--<ul>
					<?php foreach($line['point_in_city'] as $point) { ?>
					<li><a href="#" title="<?php echo ($point['name_abb']); ?>(<?php echo ($point['count']); ?>)"><?php echo ($point['name_display']); ?>(<?php echo ($point['count']); ?>)</a></li>
					<?php } ?>
				</ul>-->
				暂无
				<div class="clear"></div>
			</div>
		</div>
	</div>
		
	<!--右面板-->
	<div class="right_area">
		
		<div class="search input-append">
			<form action="<?php echo U('Ticket/search'); ?>" method="get">
			<input name="k" class="span2" placeholder="城市/景点" type="text" value="<?php echo $_GET['k']; ?>">
			<input class="btn" type="submit" value="" onclick="keyword_change()">
			</form>
		</div>

		<!--搜索条件-->
		<div class="filter">
			<div class="head" style="border-bottom:2px solid #4e9700;">
			</div>
			
			<div class="filter_border">
			
			<div class="title">
				<ul>
					<?php if (!empty($form['province'])) { ?>
					<li>目的城市：</li>
					<?php } ?>
					<li>景点主题：</li>
					<li></li>
				</ul>
			</div>
			
			<div  class="itemList">
			
				<!--目的城市-->
				<?php if (!empty($form['province']) && empty($form['city'])) { ?>
				<div class="item">
					<ul>
						<li id="destination_<?php echo (int)$form['province'] ?>_0" class="c_destnation selected" onclick="destination_change(<?php echo (int)$form['province'] ?>, 0)">不限</li>
						<?php foreach($cityList as $city) { ?>
							<li id="destination_<?php echo ($city["province_id"]); ?>_<?php echo ($city["id"]); ?>" class="c_destnation" onclick="destination_change(<?php echo ($city["province_id"]); ?>, <?php echo ($city["id"]); ?>)"><?php echo ($city["name"]); ?></li>
						<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
				<?php if (!empty($form['province']) && !empty($form['city'])) { ?>
				<div class="item">
					<ul>
						<li class="selected"><?php echo ($form['city_name']); ?></li>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
				<!--景点主题-->
				<div class="item">
					<ul>
						<li id="point_subject_0" class="c_point_subject selected" onclick="point_subject_change(0)">不限</li>
						<?php foreach($subjectList as $subject) {?>
							<li id="point_subject_<?php echo ($subject["id"]); ?>" class="c_point_subject" onclick="point_subject_change(<?php echo ($subject["id"]); ?>)"><?php echo ($subject["name"]); ?></li>
						<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
				
			</div>
			
			<div class="clear"></div>
			
			<div class="foot">
				<ul>
					<li id="sort_0" class="selected" onclick="sort_change(0)" style="margin:0;">推荐</li>
					<!--<li id="sort_1" onclick="sort_change(1)">特价</li>-->
					<li id="sort_2" onclick="sort_change(2)">销量&nbsp;<i id="sort_icon_2" class="icon icon_arrow_down"></i></li>
					<li id="sort_3" onclick="sort_change(3)">点评&nbsp;<i id="sort_icon_3" class="icon icon_arrow_down"></i></li>
					<li id="sort_4" onclick="sort_change(4)">满意&nbsp;<i id="sort_icon_4" class="icon icon_arrow_down"></i></li>
					<li id="sort_5" onclick="sort_change(5)">价格&nbsp;<i id="sort_icon_5" class="icon icon_arrow_top_down"></i></li>
				</ul>
				<div class="clear"></div>
			</div>
			
			<div class="clear"></div>
			</div>
			
			<!--隐藏表单-->
			<div class="hidden">
				<form id="s_form" action="<?php echo U('Ticket/search'); ?>" method="get">
					<input id="s_province" name="province">
					<input id="s_city" name="city">
					<input id="s_sort" name="sort">
					<input id="s_page" name="page">
					<input id="s_subject" name="subject">
					<input id="s_keyword" name="k">
				</form>
			</div>
			
		</div>
		
		<!--搜索结果-->
		<div class="result">
			<?php foreach($pointList as $point) { ?>
			<div class="item" style="height:auto;">
				<div class="pic">
					<a href="<?php echo U('Point/show?id='.$point['id']) ?>" target="_blank"><img class="lazy" src="__ROOT__/images/point/photo/<?php echo ($point["province_id"]); ?>/<?php echo ($point["city_id"]); ?>/<?php echo ($point["id"]); ?>/1.jpg"/></a>
				</div>
				<div class="info">
					<ul>
						<li style="margin-top:0;">
							<a href="<?php echo U('Point/show?id='.$point['id']) ?>" target="_blank">
								<span class="info_name"><?php echo ($point["name"]); ?>&nbsp;</span>
								<span class="info_city">[ <?php echo ($point["province"]); ?> - <?php echo ($point["city"]); ?> ]</span>
							</a>
						</li>
						<li>
							<span class="info_character">
								主题：
								<?php  $flag = false; foreach($point['subject'] as $subject) { if ($flag) echo '、'; echo $subject['name']; $flag = true; } ?>
							</span>
						</li>
						<li>
							地址：<?php echo ($point["address"]); ?>
						</li>
						<li>
							<span class="info_item" style="margin-left:0;">编号：<?php echo ($point["id"]); ?></span>
							<span class="info_item">满意度：<span class="info_satisfaction"><?php echo ($point["satisfaction"]); ?>%</span></span>
							<span class="info_item info_sell"><?php echo ($point["sell_count"]); ?>人出游&nbsp;/&nbsp;<?php echo ($point["comment_count"]); ?>条点评</span>
						</li>

					</ul>
				</div>
				
				<div class="price">
					<div class="top">网订优惠</div>
					<?php if (!empty($point['ticket'])) { ?>
					<div class="price_num">
						<span><?php echo ($point["price"]); ?></span>元起
					</div>
					<?php } else { ?>
					<div class="price_num">
						<span>暂无门票</span>
					</div>
					<?php } ?>
					<div class="privilege">
						超值低价，点评有奖
					</div>
				</div>
				<div class="clear"></div>
				
				<?php if (!empty($point['ticket'])) { ?>
				<div class="ticket">
					<table>
						<tr>
							<td width="40%" class="title tt">门票类型</td>
							<td width="10%" class="title">市场价</td>
							<td width="10%" class="title">优惠价</td>
							<td width="10%" class="title">点评奖金</td>
							<td width="15%" class="title">支付方式</td>
							<td width="15%" class="title"></td>
						</tr>
						<?php foreach($point['ticket'] as $ticket) { ?>
						<tr>
							<td class="tt"><a href="<?php echo U('Point/show?id='.$point['id'].'&ticket_id='.$ticket['id'].'#detail_'.$ticket['id']) ?>" target="_blank"><?php echo ($ticket["name"]); ?></a></td>
							<td class="origin_price">¥<?php echo ($ticket["origin_price"]); ?></td>
							<td class="price2">¥<?php echo ($ticket["price"]); ?></td>
							<td class="price3">¥<?php echo ($ticket["comment_price"]); ?></td>
							<td>网上支付</td>
							<td><a href="<?php echo U('Point/show?id='.$point['id'].'&ticket_id='.$ticket['id'].'#detail_'.$ticket['id']) ?>" target="_blank"><span class="order"></span></a></td>
						</tr>
						<?php } ?>
						<?php ?>
					</table>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<!--无结果时-->
			<?php if (empty($pointList)) { ?>
			<div class="item" style="text-align:center;font-size:14px;line-height:100px;">
				暂无相应景点门票，请重新设定搜索条件
			</div>
			<?php } ?>
			<!--分页-->
			<div class="pagination">
				<span>共有<?php echo ($pointCount); ?>类门票&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<ul>
					<?php if (empty($form['page'])) $form['page'] = 1; ?>
					<?php if ($form['page'] >= 5) { ?>
					<li onclick="goto_page('1')"><a href="#">1</a></li>
					<?php } ?>
					<?php if ($form['page'] > 5) { ?>
					<li class="disable"><a>...</a></li>
					<?php } ?>
					<?php for($i = $form['page']-3; $i < $form['page']; $i++) { if ($i <= 0) continue; ?>
					<li onclick="goto_page('<?php echo ($i); ?>')"><a href="#"><?php echo ($i); ?></a></li>
					<?php } ?>
					<li class="active"><a href="#")"><?php echo ($form["page"]); ?></a></li>
					<?php for($i = $form['page']+1; $i <= $form['page']+3; $i++) { if ($i > $pointPage) break; ?>
					<li onclick="goto_page('<?php echo ($i); ?>')"><a href="#"><?php echo ($i); ?></a></li>
					<?php } ?>
					<?php if ($form['page'] < $pointPage-4) { ?>
					<li class="disable"><a>...</a></li>
					<?php } ?>
					<?php if ($form['page'] <= $pointPage-4) { ?>
					<li onclick="goto_page('<?php echo ($pointPage); ?>')"><a href="#"><?php echo ($pointPage); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
			
	</div>
	<div class="clear"></div>
	
</div>



<script type="text/javascript" src="__ROOT__/js/search.js" charset="utf-8"></script>
<script type="text/javascript" src="__ROOT__/js/jquery-ui-1.10.2.datepicker.min.js" charset="utf-8"></script>

<!--表单赋值-->
<script>
	<?php  foreach($form as $id => $item) { if (empty($item)) continue; ?>
			form['<?php echo ($id); ?>'] = '<?php echo ($item); ?>';
	<?php  } ?>
	reset();
</script>

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