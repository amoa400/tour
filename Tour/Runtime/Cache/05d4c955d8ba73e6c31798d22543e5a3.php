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
<link href="__ROOT__/css/productIndex.css" rel="stylesheet" media="screen">

<div id="index" class="main_container">

	<div class="left_panel">
	
		<!--产品分类 班级-->
		<?php if ($product['type'] == '班级') { ?>
		<div class="product">
			<div class="border">
			<div class="border2">
			
				<div class="product_title"><?php echo ($product["name"]); ?>导航</div>
				
				<div class="item">
					<div class="title"><a href="javascript:void(0);">按天数分</a></div>
					<div class="content">
						<ul>
							<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=1') ?>" target="_blank">一日游</a></li>
							<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=2') ?>" target="_blank">二日游</a></li>
							<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=3') ?>" target="_blank">三日游</a></li>
							<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=4') ?>" target="_blank">四至六日</a></li>
							<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=8') ?>" target="_blank">七日及以上</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>

				<!--按主题分-->
				<div class="item">
					<div class="title"><a href="javascript:void(0);" target="_blank">按主题分</a></div>
					<div class="content">
						<ul>
							<?php foreach($pointTypeList as $item) { ?>
							<li><a href="<?php echo U('Line/search?t=7&line_type=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
	
				<!--按标签分-->
				<div class="item">
					<div class="title"><a href="javascript:void(0);" target="_blank">按特色分</a></div>
					<div class="content">
						<ul>
							<?php foreach($tagList as $item) { ?>
							<li><a href="<?php echo U('Line/search?t=8&line_type=1&tag='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				
				<!--周边游-->
				<div class="item">
					<div class="title"><a href="<?php echo U('Line/search?t=6&line_type=1&z=1') ?>" target="_blank">周边游</a></div>
					<div class="content">
						<ul>
							<?php foreach($provinceZB as $item) { ?>
							<li><a href="<?php echo U('Line/search?t=6&line_type=1&province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?>旅游</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>

				<!--国内游-->
				<div class="item">
					<div class="title"><a href="<?php echo U('Line/search?t=6&line_type=1&z=2') ?>" target="_blank">国内游</a></div>
					<div class="content">
						<ul>
							<?php foreach($provinceGN as $item) { ?>
							<li><a href="<?php echo U('Line/search?t=6&line_type=1&province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?>旅游</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				
			</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if ($product['type'] == '周边') { ?>
		<!--产品分类 周边-->
		<div class="product">
			<div class="border">
			<div class="border2">
			
				<div class="product_title"><?php echo ($product["name"]); ?>导航</div>

				<div class="item">
					<div class="title"><a href="javascript:void(0);">按区域分</a></div>
					<div class="content">
						<ul>
							<li><a href="<?php echo U('Line/search?province=3') ?>" target="_blank">江苏旅游</a></li>
							<li><a href="<?php echo U('Line/search?province=2') ?>" target="_blank">浙江旅游</a></li>
							<li><a href="<?php echo U('Line/search?province=1') ?>" target="_blank">上海旅游</a></li>
							<li><a href="<?php echo U('Line/search?province=4') ?>" target="_blank">安徽旅游</a></li>
							<li><a href="<?php echo U('Line/search?province=6') ?>" target="_blank">江西旅游</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="item">
					<div class="title"><a href="javascript:void(0);">按天数分</a></div>
					<div class="content">
						<ul>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=1') ?>" target="_blank">一日游</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=2') ?>" target="_blank">二日游</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=3') ?>" target="_blank">三日游</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=7') ?>" target="_blank">多日游</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				
				<!--按类型分-->
				<?php foreach($pointTypeList as $item) { ?>
				<div class="item">
					<div class="title"><a href="<?php echo U('Line/search?z=1&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></div>
					<div class="content">
						<ul>
							<?php foreach($item['point'] as $item2) { ?>
							<li><a href="<?php echo U('Line/search?t=2&point='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>
			</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if ($product['type'] == '国内' || $product['type'] == '出境') { ?>
		<!--产品分类 国内 出境-->
		<div class="product">
			<div class="border">
			<div class="border2">
			
				<div class="product_title"><?php echo ($product["name"]); ?>导航</div>
				
				<!--按主题分-->
				<div class="item">
					<div class="title"><a href="javascript:void(0);" target="_blank">按主题分</a></div>
					<div class="content">
						<ul>
							<?php foreach($pointTypeList as $item) { ?>
							<li><a href="<?php echo U('Line/search?z='.$product['z'].'&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>				
				
				<!--按省份分-->
				<?php foreach($provinceList as $item) { ?>
				<div class="item">
					<div class="title"><a href="<?php echo U('Line/search?province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?>旅游</a></div>
					<div class="content">
						<ul>
							<?php foreach($item['point'] as $item2) { ?>
							<li><a href="<?php echo U('Line/search?t=2&point='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>

			</div>
			</div>
		</div>
		<?php } ?>
		
		<div class="hot">
			<div class="title">热门线路</div>
			<?php  $rank = 0; foreach($hotList as $item) { $rank++; ?>
			<div class="item">
				<span class="rank"><?php echo ($rank); ?></span>
				<span class="ct">
					<span class="name"><a href="<?php echo U('Line/show?id='.$item['id']) ?>" target="_blank"><<?php echo ($item["name"]); ?>><?php echo ($item["character"]); ?></a></span>
					<span class="price">¥<?php echo ($item["price"]); ?>起</span>
					<span class="count">共<?php echo ($item["sell_count"]); ?>人出游</span>
				</span>
			</div>
			<?php } ?>
		</div>

		<div class="team">
			<a href="<?php echo U('Page/team') ?>" target="_blank"><img src="__ROOT__/images/index/team_order.png"/></a>
		</div>
	</div>

	<!--幻灯广告-->
	<div class="ad">
		<?php  $cnt = 0; foreach($recommendList as $item) { $cnt++; ?>
		<div id="ad<?php echo ($cnt); ?>" class="img"><a href="<?php echo U('Line/show?id='.$item['id']); ?>" target="_blank"><img src="__ROOT__/images/line/productIndex/<?php echo ($product["typeAbb"]); ?>/ad<?php echo ($cnt); ?>.jpg"/></a></div>
		<?php } ?>
		
		<div class="nav">
			<ul>
				<?php  $cnt = 0; foreach($recommendList as $item) { $cnt++; ?>
				<a href="<?php echo U('Line/show?id='.$item['id']); ?>" target="_blank"><li id="adli<?php echo ($cnt); ?>" onmouseover="showAd(<?php echo ($cnt); ?>)"  <?php if ($cnt == 1) { ?>style="border:0;"class="hover"<?php } ?> onmouseout="startAd()"><?php echo ($item["name"]); ?></li></a>
				<?php } ?>
			</ul>
		</div>

	</div>
	
	<!--特价产品-->
	<div class="special">
		<div class="special_title"><i class="icon_speical"></i>&nbsp;<?php echo ($product["type"]); ?>特价旅游&nbsp;&nbsp;<span>超级实惠，全网最低！</span></div>
		<div class="special_content">
			<ul>
				<?php foreach($specialList as $item) { ?>
				<li>
					<div class="img"><a href="<?php echo U('Line/show?id='.$item['id']) ?>" target="_blank"><img src="__ROOT__/images/line/photo/<?php echo ($item["id"]); ?>.jpg"/></a></div>
					<div class="title"><a href="<?php echo U('Line/show?id='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></div>
					<div class="price_cnt"><span><?php echo ($item["price"]); ?>元</span>起</div>
					
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>

	<!--推荐产品-->
	<div id="search" class="recommend">
		<div class="title"><i class="icon_subject"></i>&nbsp;<?php echo ($product["type"]); ?>游主题推荐&nbsp;&nbsp;<span>吃喝玩乐，一网打尽</span></div>
		<div class="navi">
			<ul>
				<?php
 $flag = false; foreach($pointTypeList as $item) { ?>
				<li id="type<?php echo ($item["id"]); ?>" <?php if (!$flag) { ?>class="selected" style="margin-left:0;"<?php } ?> onclick="getTLine(<?php echo ($product["z"]); ?>, <?php echo ($item["id"]); ?>)">
					<?php echo ($item["name"]); ?>
				</li>
				<?php  $flag = true; } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="content result">
		</div>
	</div>

		
	<div id="itemTemplate" style="display:none;">
		<div class="item">
			<div class="pic"><a href="<?php echo U('Line/show?id='.'@@line.id') ?>" target="_blank"><img class="lazy" src="__ROOT__/images/line/photo/@@line.id.jpg"/></a></div>
			<div class="info">
				<ul>
					<li style="margin-top:0;"><a href="<?php echo U('Line/show?id='.'@@line.id') ?>" target="_blank"><span class="info_name"><@@line.name><span class="info_ad">@@line.character</span></a></li>
					<li><span class="info_character">主题：@@line.point_type</span></li>
					<li>
						<span class="info_item" style="margin-left:0;">编号：@@line.id</span>
						<span class="info_item">满意度：<span class="info_satisfaction">@@line.satisfaction%</span></span>
						<span class="info_item info_sell">@@line.sell_count人出游&nbsp;/&nbsp;@@line.comment_count条点评</span>
					</li>
					<li class="schedule">团期：@@line.schedule&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo U('Line/show?id='.'@@line.id'.'&calendar=1') ?>" target="_blank">更多团期</a></span>
					</li>
				</ul>
			</div>
				
			<div class="price">
				<div class="top">网订优惠</div>
				<div class="price_num"><span>@@line.price</span>元起</div>
				<div class="privilege"><i class="icon icon_di"></i><span class="droptip" data-placement="bottom" title="网上预订即享5元抵扣券优惠">@@line.di_price元</span>&nbsp;&nbsp;<i class="icon icon_song"></i><span class="droptip" data-placement="bottom" title="网上预订即送20元抵扣券">@@line.song_price元</span></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
</div>

<script>
	var getTLinePostUrl = '<?php echo U('Line/getTypeLineList') ?>';
	var typeUrl = new Array();
	<?php
 foreach($pointTypeList as $item) { if ($product['z'] != 4) { ?>
				typeUrl[<?php echo ($item["id"]); ?>] = '__ROOT__<?php echo U('Line/search?z='.$product['z'].'&t=1&point_type='.$item['id']) ?>';
	<?php  } else { ?>
				typeUrl[<?php echo ($item["id"]); ?>] = '__ROOT__<?php echo U('Line/search?t=7&line_type=1&point_type='.$item['id']) ?>';
	<?php	 } } ?>
</script>
<script type="text/javascript" src="__ROOT__/js/index.js" charset="utf-8"></script>
<script>
$(document).ready(function(){
	getTLine(<?php echo ($product["z"]); ?>, 1);
});
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