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

		<?php if (empty($_GET['t'])) { ?>
		<?php if (empty($form['province'])) { ?>
		>&nbsp;&nbsp;<a href="#">线路搜索</a>
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
		
		<?php if ($_GET['t'] == 3 || $_GET['t'] == 5) { ?>
		>&nbsp;&nbsp;<a href="<?php echo U('Line/search?t=3&line_type=1') ?>">班级游</a>
		<?php } ?>

	</div>

	<!--左面板-->
	<div class="left_area">
		<!--同城旅游产品推荐-->
		<!--
		<div class="panel" style="margin-top:0;">
			<div class="title">搜索结果分类</div>
			<div class="content point_list">
				<ul>
					<?php foreach($line['point_in_city'] as $point) { ?>
					<li><a href="#" title="<?php echo ($point['name_abb']); ?>(<?php echo ($point['count']); ?>)"><?php echo ($point['name_display']); ?>(<?php echo ($point['count']); ?>)</a></li>
					<?php } ?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		-->
		
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

		<?php if ($_GET['t'] == 3) { ?>
		<!--团队头-->
		<div class="team">
			<img src="__ROOT__/images/page/team/flow.png">&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn" target="_blank" href="<?php echo U('Order/order') ?>">&nbsp;</a>
		</div>
		<?php } ?>

		<!--搜索条件-->
		<div class="filter">
			<div class="head">
				<?php $flag = false; ?>
				<?php if (empty($_GET['t'])) { ?>
				<span>
					上海<?php if (empty($cntCity)) {?>出发<?php } else { ?>到<?php echo ($cntCity); ?>旅游<?php } ?>
				</span>
				<?php $flag =true; } ?>
				<?php if ($_GET['t'] == 1) { ?>
				<span>
					上海出发<?php echo $pointTypeList[$form['point_type']-1]['name'] ?>游
				</span>
				<?php $flag =true; } ?>
				<?php if ($_GET['t'] == 2) { ?>
				<span>
					上海到<?php echo ($point["name"]); ?>旅游
				</span>
				<?php $flag =true; } ?>
				<?php if ($_GET['t'] == 3) { ?>
				<span>
					班级游
				</span>
				<?php $flag =true; } ?>
				<?php if (!$flag) { ?>
				<span><?php echo ($headTitle); ?></span>
				<?php } ?>
			</div>
			
			<div class="filter_border">
			
			<div class="title">
				<ul>
					<?php if ($filter['showType']) { ?><li>产品类型：</li><?php } ?>
					<?php if ($filter['showTime']) { ?><li>出游时间：</li><?php } ?>
					<?php if ($filter['showDuration']) { ?><li>行程天数：</li><?php } ?>
					<?php if ($filter['showProvince']) { ?><li>目的省份：</li><?php } ?>
					<?php if ($filter['showCity']) { ?><li>目的城市：</li><?php } ?>
					<?php if ($filter['showPointType']) { ?><li>主题推荐：</li><?php } ?>
					<?php if ($filter['showHotPoint']) { ?><li>热门景点：</li><?php } ?>
					<li></li>
				</ul>
			</div>
			
			<div  class="itemList">
				
				<!--产品类型-->
				<?php if ($filter['showType']) { ?>
				<div class="item">
					<ul>
						<li id="line_type_0" class="c_line_type selected" onclick="line_type_change(0)">跟团游</li>
						<li id="line_type_1" class="c_line_type" onclick="line_type_change(1)">团队游</li>
						<!--<li id="line_type_2" class="c_line_type" onclick="line_type_change(2)">自助游</li>-->
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
				<!--出游时间-->
				<?php if ($filter['showTime']) { ?>
				<div class="item date">
					<ul>
						<li>
							<input id="begin_date" value="yyyy-mm-dd">
							<div class="date_icon" onclick="$('#begin_date').focus()"><i class="icon icon_date"></i></div>
						</li>
						<li>—</li>
						<li>
							<input id="end_date" value="yyyy-mm-dd">
							<div class="date_icon" onclick="$('#end_date').focus()"><i class="icon icon_date"></i></div>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>

				<!--行程天数-->
				<?php if ($filter['showDuration']) { ?>
				<div class="item">
					<ul>
						<li id="duration_0" class="c_duration selected" onclick="duration_change(0)">不限</li>
						<li id="duration_1" class="c_duration" onclick="duration_change(1)">1天</li>
						<li id="duration_2" class="c_duration" onclick="duration_change(2)">2天</li>
						<li id="duration_3" class="c_duration" onclick="duration_change(3)">3天</li>
						<li id="duration_4" class="c_duration" onclick="duration_change(4)">4-6天</li>
						<li id="duration_5" class="c_duration" onclick="duration_change(5)">7-9天</li>
						<li id="duration_6" class="c_duration" onclick="duration_change(6)">10天及以上</li>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>

				<!--目的省份-->
				<?php if ($filter['showProvince']) { ?>
				<div class="item">
					<ul>
						<li id="province_0" class="c_province selected" onclick="province_change(0)">不限</li>
						<?php foreach($provinceList as $province) { ?>
								<li id="province_<?php echo ($province["id"]); ?>" class="c_province" onclick="province_change(<?php echo (int)$province['id'] ?>)"><?php echo ($province["name"]); ?></li>
						<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
				<!--目的城市-->
				<?php if ($filter['showCity']) { ?>
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
				
				<!--景点类型-->
				<?php if ($filter['showPointType']) { ?>
				<div class="item">
					<ul>
						<li id="point_type_0" class="c_point_type selected" onclick="point_type_change(0)">不限</li>
						<?php foreach($pointTypeList as $pointType) {?>
							<li id="point_type_<?php echo ($pointType["id"]); ?>" class="c_point_type" onclick="point_type_change(<?php echo ($pointType["id"]); ?>)"><?php echo ($pointType["name"]); ?></li>
						<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
				<!--热门景点-->
				<?php if ($filter['showHotPoint']) { ?>
				<div class="item">
					<ul>
						<li id="point_0" class="c_point selected" onclick="point_change(0)">不限</li>
						<?php foreach($pointList as $point) { ?>
								<li id="point_<?php echo ($point["id"]); ?>" class="c_point" onclick="point_change(<?php echo ($point["id"]); ?>)"><?php echo ($point['name']); ?></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
	
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
					<li class="price_between"><input id="begin_price" onclick="show_price_submit()"/>&nbsp;-&nbsp;<input id="end_price" onclick="show_price_submit()"/>&nbsp;&nbsp;<a href="#" id="price_between_submit" class="hidden" onclick="price_between_change()">确定</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			
			<div class="clear"></div>
			</div>
			
			<!--隐藏表单-->
			<div class="hidden">
				<form id="s_form" action="<?php echo U('Line/search'); ?>" method="get">
					<input id="s_line_type" name="line_type">
					<input id="s_duration" name="duration">
					<input id="s_province" name="province">
					<input id="s_city" name="city">
					<input id="s_point_type" name="point_type">
					<input id="s_point" name="point">
					<input id="s_sort" name="sort">
					<input id="s_begin_date" name="begin_date">
					<input id="s_end_date" name="end_date">
					<input id="s_begin_price" name="begin_price">
					<input id="s_end_price" name="end_price">
					<input id="s_page" name="page">
					<input id="s_t" name="t">
					<input id="s_z" name="z">
					<input id="s_tag" name="tag">
				</form>
			</div>
			
		</div>
		
		<!--搜索结果-->
		<div class="result">
			<?php foreach($lineList as $line) { ?>
			<div class="item">
				<div class="pic"><a href="<?php echo U('Line/show?id='.$line['id']) ?>" target="_blank"><img class="lazy" src="__ROOT__/images/line/photo/<?php echo ($line["id"]); ?>.jpg"/></a></div>
				<div class="info">
					<ul>
						<li style="margin-top:0;"><a href="<?php echo U('Line/show?id='.$line['id']) ?>" target="_blank"><span class="info_name"><<?php echo ($line["name"]); ?>><span class="info_ad"><?php echo ($line["character"]); ?></span></a></li>
						<?php if ($_GET['t'] != 9999) { ?>
						<li><span class="info_character">主题：<?php $flag = false; foreach($line['point_type'] as $type) { if ($flag) echo '、'; echo ($type["name"]); $flag = true; } ?></span></li>
						<?php } else { ?>
						<li>
							<span class="info_item info_tag" style="margin-left:0;">
								<i>
									<?php $flag = false; foreach($line['point_type'] as $type) { if ($flag) echo '、'; echo ($type["name"]); $flag = true; } ?>
								</i>
							</span>
						</li>
						<?php } ?>
						<li>
							<!--
							<span class="info_item info_tag" style="margin-left:0;">
								<i>
									<?php $flag = false; foreach($line['point_type'] as $type) { if ($flag) echo '、'; echo ($type["name"]); ?>游<?php $flag = true; } ?>
								</i>
							</span>
							-->
							<span class="info_item" style="margin-left:0;">编号：<?php echo ($line["id"]); ?></span>
							<span class="info_item">满意度：<span class="info_satisfaction"><?php echo ($line["satisfaction"]); ?>%</span></span>
							<span class="info_item info_sell"><?php echo ($line["sell_count"]); ?>人出游&nbsp;/&nbsp;<?php echo ($line["comment_count"]); ?>条点评</span>
						</li>
						<?php if ($_GET['line_type'] == 0) { ?>
						<li class="schedule">团期：<?php $flag = false; foreach($line['schedule'] as $schedule) { if ($flag) echo '、'; ?><span><?php echo ($schedule["date2"]); ?></span><?php $flag = true; } ?>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo U('Line/show?id='.$line['id'].'&calendar=1') ?>" target="_blank">更多团期</a></span>
						</li>
						<?php } else { ?>
						<li class="schedule">团期：根据您的定制，每天均可发团，接受线路调整，路线定制&nbsp;&nbsp;&nbsp;&nbsp;</span>
						</li>
						<?php } ?>
					</ul>
				</div>
				
				<div class="price">
					<div class="top">网订优惠</div>
					<div class="price_num"><span><?php echo ($line["price"]); ?></span>元起</div>
					<div class="privilege"><i class="icon icon_di"></i><span class="droptip" data-placement="bottom" title="网上预订即享5元抵扣券优惠"><?php echo ($line["di_price"]); ?>元</span>&nbsp;&nbsp;<i class="icon icon_song"></i><span  class="droptip" data-placement="bottom" title="网上预订即送20元抵扣券"><?php echo $line['di_price']*4 ?>元</span></div>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
			<!--无结果时-->
			<?php if (empty($lineList)) { ?>
			<div class="item" style="text-align:center;font-size:14px;line-height:100px;">
				暂无相应路线，请重新设定搜索条件
			</div>
			<?php } ?>
			<!--分页-->
			<div class="pagination">
				<span>共有<?php echo ($lineCount); ?>条线路&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
					<?php for($i = $form['page']+1; $i <= $form['page']+3; $i++) { if ($i > $linePage) break; ?>
					<li onclick="goto_page('<?php echo ($i); ?>')"><a href="#"><?php echo ($i); ?></a></li>
					<?php } ?>
					<?php if ($form['page'] < $linePage-4) { ?>
					<li class="disable"><a>...</a></li>
					<?php } ?>
					<?php if ($form['page'] <= $linePage-4) { ?>
					<li onclick="goto_page('<?php echo ($linePage); ?>')"><a href="#"><?php echo ($linePage); ?></a></li>
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
	<?php if (!empty($_GET['t'])) { ?>
		form['t'] = <?php echo $_GET['t'] ?>;
	<?php } ?>
	<?php if (!empty($_GET['z'])) { ?>
		form['z'] = <?php echo $_GET['z'] ?>;
	<?php } ?>
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