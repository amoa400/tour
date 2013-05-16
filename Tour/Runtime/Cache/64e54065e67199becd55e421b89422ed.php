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



<link href="__ROOT__/css/index.css" rel="stylesheet" media="screen">

<div id="index" class="main_container">

	<div class="left_panel">
		<!--产品分类-->
		<div class="product">
			<div class="border">
			<div class="border2">
			
				<div class="product_title">旅游产品分类</div>
				
				<div class="product_ad" onmouseover="showDetail(0)" onmouseout="hideDetail(0)">
					<a href="#"><img class="lazy" src="__ROOT__/images/index/ad/productad1.jpg"></a><br><br>
					<a href="#"><img class="lazy" src="__ROOT__/images/index/ad/productad2.jpg"></a><br><br>
					<a href="#"><img class="lazy" src="__ROOT__/images/index/ad/productad3.jpg"></a><br><br>
				</div>
				
				<!--班级游-->
				<div class="item" onmouseover="showDetail(5)" onmouseout="hideDetail(5)">
					<div class="title">
						<i class="icon icon_lianyi"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Line/banji') ?>" target="_blank">班级游</a></span>
						<i class="icon_arrow"></i>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Page/team') ?>" target="_blank">独立成团</a></li>
							<li><a href="<?php echo U('Page/team') ?>" target="_blank">自由定制</a></li>
							<li><a href="<?php echo U('Page/team') ?>" target="_blank">专属顾问</a></li>
						</ul>
					</div>
					<div id="block5" class="block"></div>
					<div class="clear"></div>
				</div>
				<!--班级游细节-->
				<div id="detail5" class="detail" onmouseover="showDetail(5)" onmouseout="hideDetail(5)">
					<div class="border">
					<div class="border2">
					<div class="content">
						<div style="margin-bottom:5px;">
							<img src="__ROOT__/images/page/team/flow.png"/>
						</div>
						
						<div class="item2" style="border:0;">
							<div class="tt"><a href="javascript:void(0)">按天数分</a></div>
							<ul>
								<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=1') ?>" target="_blank">一日游</a></li>
								<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=2') ?>" target="_blank">二日游</a></li>
								<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=3') ?>" target="_blank">三日游</a></li>
								<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=4') ?>" target="_blank">四至六日</a></li>
								<li><a href="<?php echo U('Line/search?t=5&line_type=1&duration=8') ?>" target="_blank">七日及以上</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="item2">
							<div class="tt"><a href="javascript:void(0)">按主题分</a></div>
							<ul>
								<?php foreach($banji['pointTypeList'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?t=7&line_type=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="item2">
							<div class="tt"><a href="javascript:void(0)">按特色分</a></div>
							<ul>
								<?php foreach($banji['tagList'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?t=7&line_type=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?t=6&line_type=1&z=1') ?>" target="_blank">周边游</a></div>
							<ul>
								<?php foreach($banji['provinceZB'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?t=6&line_type=1&province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?t=6&line_type=1&z=2') ?>" target="_blank">国内游</a></div>
							<ul>
								<?php foreach($banji['provinceGN'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?t=6&line_type=1&province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					</div>
					</div>
				</div>
				
				<!--周边游-->
				<div class="item" onmouseover="showDetail(1)" onmouseout="hideDetail(1)">
					<div class="title">
						<i class="icon icon_zhoubian"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Line/zhoubian') ?>" target="_blank">周边游</a></span>
						<i class="icon_arrow"></i>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Line/search?z=1&t=1&point_type=1') ?>" target="_blank">山水</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=1&point_type=2') ?>" target="_blank">古镇</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=1') ?>" target="_blank">一日游</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=2') ?>" target="_blank">二日游</a></li>
							<li><a href="<?php echo U('Line/search?z=1&t=4&duration=3') ?>" target="_blank">三日游</a></li>
						</ul>
					</div>
					<div id="block1" class="block"></div>
					<div class="clear"></div>
				</div>
				<!--周边游细节-->
				<div id="detail1" class="detail"  onmouseover="showDetail(1)" onmouseout="hideDetail(1)">
					<div class="border">
					<div class="border2">
					<div class="content">
						<div class="item2" style="border:0;">
							<div class="tt"><a href="javascript:void(0)">按区域分</a></div>
							<ul>
								<li><a href="<?php echo U('Line/search?province=3') ?>" target="_blank">江苏</a></li>
								<li><a href="<?php echo U('Line/search?province=2') ?>" target="_blank">浙江</a></li>
								<li><a href="<?php echo U('Line/search?province=1') ?>" target="_blank">上海</a></li>
								<li><a href="<?php echo U('Line/search?province=4') ?>" target="_blank">安徽</a></li>
								<li><a href="<?php echo U('Line/search?province=6') ?>" target="_blank">江西</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="item2">
							<div class="tt"><a href="javascript:void(0)">按天数分</a></div>
							<ul>
								<li><a href="<?php echo U('Line/search?z=1&t=4&duration=1') ?>" target="_blank">一日游</a></li>
								<li><a href="<?php echo U('Line/search?z=1&t=4&duration=2') ?>" target="_blank">二日游</a></li>
								<li><a href="<?php echo U('Line/search?z=1&t=4&duration=3') ?>" target="_blank">三日游</a></li>
								<li><a href="<?php echo U('Line/search?z=1&t=4&duration=7') ?>" target="_blank">多日游</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<?php  foreach($zhoubian['pointTypeList'] as $item) { if (!isIn($item['id'], array(1,2,3,4,5,7,9))) continue; ?>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?z=1&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></div>
							<ul>
								<?php foreach($item['point'] as $item2) { ?>
								<li><a href="<?php echo U('Line/search?t=2&point='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<?php } ?>
						
						<div class="item2">
							<div class="tt"><a href="javascript:void(0)">其他主题</a></div>
							<ul>
								<?php  foreach($zhoubian['pointTypeList'] as $item) { if (isIn($item['id'], array(1,2,3,4,5,7,9))) continue; ?>
								<li><a href="<?php echo U('Line/search?z=1&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>

					</div>
					</div>
					</div>
				</div>
				
				<div class="item" onmouseover="showDetail(2)" onmouseout="hideDetail(2)">
					<div class="title">
						<i class="icon icon_guonei"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Line/search?province=2') ?>" target="_blank">国内游</a></span>
						<i class="icon_arrow"></i>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Line/search?t=2&point=8') ?>" target="_blank">厦门</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=11') ?>" target="_blank">海南</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=13') ?>" target="_blank">云南</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=22') ?>" target="_blank">桂林</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=9') ?>" target="_blank">北京</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=9') ?>" target="_blank">湖南</a></li>
						</ul>
					</div>
					<div id="block2" class="block"></div>
					<div class="clear"></div>
				</div>
				<!--国内游细节-->
				<div id="detail2" class="detail"  onmouseover="showDetail(2)" onmouseout="hideDetail(2)">
					<div class="border">
					<div class="border2">
					<div class="content">
						<div class="item2" style="border:0;">
							<div class="tt"><a href="javascript:void(0)">按主题分</a></div>
							<ul>
								<?php foreach($guonei['pointTypeList'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?z=2&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<!--按省份分-->
						<?php foreach($guonei['provinceList'] as $item) { ?>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></div>
							<ul>
								<?php foreach($item['point'] as $item2) { ?>
								<li><a href="<?php echo U('Line/search?t=2&point='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<?php } ?>
					</div>
					</div>
					</div>
				</div>
				
				<!--出境游-->
				<div class="item" onmouseover="showDetail(3)" onmouseout="hideDetail(3)">
					<div class="title">
						<i class="icon icon_chujing"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Line/search?province=1') ?>" target="_blank">出境游</a></span>
						<i class="icon_arrow"></i>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Line/search?t=2&point=15') ?>" target="_blank">泰国</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=16') ?>" target="_blank">欧洲</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=17') ?>" target="_blank">美国</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=18') ?>" target="_blank">香港</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=18') ?>" target="_blank">台湾</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=18') ?>" target="_blank">游学</a></li>
						</ul>
					</div>
					<div id="block3" class="block"></div>
					<div class="clear"></div>
				</div>
				<!--出境游细节-->
				<div id="detail3" class="detail"  onmouseover="showDetail(3)" onmouseout="hideDetail(3)">
					<div class="border">
					<div class="border2">
					<div class="content">
						<div class="item2" style="border:0;">
							<div class="tt"><a href="javascript:void(0)">按主题分</a></div>
							<ul>
								<?php foreach($chujing['pointTypeList'] as $item) { ?>
								<li><a href="<?php echo U('Line/search?z=3&t=1&point_type='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<!--按省份分-->
						<?php foreach($chujing['provinceList'] as $item) { ?>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></div>
							<ul>
								<?php foreach($item['point'] as $item2) { ?>
								<li><a href="<?php echo U('Line/search?t=2&point='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<?php } ?>
					</div>
					</div>
					</div>
				</div>
				
				 <!--景点门票-->
				<div class="item" onmouseover="showDetail(4)" onmouseout="hideDetail(4)">
					<div class="title">
						<i class="icon icon_menpiao"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Line/search?province=4') ?>" target="_blank">景点门票</a></span>
						<i class="icon_arrow"></i>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Line/search?t=2&point=25') ?>" target="_blank">上海欢乐谷</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=25') ?>" target="_blank">常州恐龙园</a></li>
							<li><a href="<?php echo U('Line/search?t=2&point=25') ?>" target="_blank">苏州乐园</a></li>
						</ul>
					</div>
					<div id="block4" class="block"></div>
					<div class="clear"></div>
				</div>
				<!--景点门票细节-->
				<div id="detail4" class="detail"  onmouseover="showDetail(4)" onmouseout="hideDetail(4)">
					<div class="border">
					<div class="border2">
					<div class="content">
						<div class="item2" style="border:0;">
							<div class="tt"><a href="javascript:void(0)">按主题分</a></div>
							<ul>
								<?php foreach($menpiao['pointTypeList'] as $item) { ?>
								<li><a href="<?php echo U('Ticket/search?subject='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<?php foreach($menpiao['provinceZB'] as $item) { ?>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Ticket/search?province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?>景点</a></div>
							<ul>
								<?php foreach($item['point'] as $item2) { ?>
								<li><a href="<?php echo U('Point/show?id='.$item2['id']) ?>" target="_blank"><?php echo ($item2["name_abb"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
						<?php } ?>
						<div class="item2">
							<div class="tt"><a href="<?php echo U('Line/search?t=6&line_type=1&z=2') ?>" target="_blank">其他省份</a></div>
							<ul>
								<?php foreach($banji['provinceGN'] as $item) { ?>
								<li><a href="<?php echo U('Ticket/search?province='.$item['id']) ?>" target="_blank"><?php echo ($item["name"]); ?></a></li>
								<?php } ?>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					</div>
					</div>
				</div>
				
				<div class="item"  onmouseover="showDetail(6)" onmouseout="hideDetail(6)">
					<div class="title">
						<i class="icon icon_bendi"></i>&nbsp;
						<span class="text"><a href="<?php echo U('Page/zuche') ?>" target="_blank">租车</a></span>
					</div>
					<div class="content">
						<!--
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Page/shaokao') ?>" target="_blank">买烧烤食材</a></li>
							<li><a href="<?php echo U('Page/zuche') ?>" target="_blank">租车</a></li>
							<li><a href="<?php echo U('Page/jiudian') ?>" target="_blank">订酒店</a></li>
							<li><a href="<?php echo U('Page/menpiao') ?>" target="_blank">买门票</a></li>
						</ul>
						-->
						出游租车，经济实惠，安全保证！
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="item"  onmouseover="showDetail(6)" onmouseout="hideDetail(6)" style="border-bottom:0;">
					<div class="title">
						<i class="icon icon_zizhu"></i>&nbsp;
						<span class="text"><a href="javascript:void(0)">其他产品</a></span>
					</div>
					<div class="content">
						<ul>
							<li style="margin-left:0;"><a href="<?php echo U('Page/shaokao') ?>" target="_blank">买烧烤食材</a></li>
							<li><a href="<?php echo U('Page/jiudian') ?>" target="_blank">订酒店</a></li>
							<li><a href="<?php echo U('Page/qianzheng') ?>" target="_blank">办理签证</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			
			</div>
			</div>
		</div>

		<!--
		<div class="team">
			<img src="__ROOT__/images/index/team_order.png"/>
		</div>
		-->
		
		<!--为什么选择__NAME2__-->
		<div class="assurance">
			<span class="title">为什么选择__NAME2__</span>
			<ul>
				<li style="margin-top:10px;"><i class="icon icon_1"></i>&nbsp;大学生专属旅行网站</li>
				<li><i class="icon icon_2"></i>&nbsp;高性价比服务</li>
				<li><i class="icon icon_3"></i>&nbsp;旅游产品丰富</li>
				<li><i class="icon icon_4"></i>&nbsp;服务众多学生老师出游</li>
				<li><i class="icon icon_5"></i>&nbsp;服务众多班级社团组织出游</li>
				<li><i class="icon icon_6"></i>&nbsp;上海60余所高校全覆盖</li>
			</ul>
		</div>
	</div>

	<!--幻灯广告-->
	<div class="ad">
		<div id="ad1" class="img"><a href="<?php echo U('Line/show?id=1056'); ?>" target="_blank"><img src="__ROOT__/images/index/ad/ad1.jpg"/></a></div>
		<div id="ad2" class="img" style="display:none;"><a href="<?php echo U('Line/show?id=1057'); ?>" target="_blank"><img src="__ROOT__/images/index/ad/ad2.jpg"/></a></div>
		<div id="ad3" class="img" style="display:none;"><a href="<?php echo U('Line/show?id=1018'); ?>" target="_blank"><img src="__ROOT__/images/index/ad/ad3.jpg"/></a></div>
		<div id="ad4" class="img" style="display:none;"><a href="<?php echo U('Line/show?id=1061'); ?>" target="_blank"><img src="__ROOT__/images/index/ad/ad4.jpg"/></a></div>
		<div class="nav">
			<ul>
				<a href="<?php echo U('Line/show?id=1056'); ?>" target="_blank"><li id="adli1" onmouseover="showAd(1)"  style="border:0;" onmouseout="startAd()" class="hover">天目山-南山竹海 沉醉自然</li></a>
				<a href="<?php echo U('Line/show?id=1057'); ?>" target="_blank"><li id="adli2" onmouseover="showAd(2)" onmouseout="startAd()">常州春秋乐园 露营、篝火！</li></a>
				<a href="<?php echo U('Line/show?id=1018'); ?>" target="_blank"><li id="adli3" onmouseover="showAd(3)" onmouseout="startAd()">千岛湖 心灵的绿洲</li></a>
				<a href="<?php echo U('Line/show?id=1061'); ?>" target="_blank"><li id="adli4" onmouseover="showAd(4)" onmouseout="startAd()">浪漫厦门 毕业旅行！</li></a>
			</ul>
		</div>
	</div>
	
	<!--特价产品-->
	<!--
	<div class="special">
		<div class="special_title"><i class="icon_speical"></i>&nbsp;特价旅游&nbsp;<span>超实惠，专为大学生定制！</span></div>
		<div class="special_content">
			<ul>
				<li>
					<div class="img"><img src="__ROOT__/images/index/special/1.jpg"/></div>
					<div class="title">鼋头渚 浪漫樱花</div>
					<div class="price_cnt"><span>108</span>起</div>
					<div class="price_origin">原价:222</div>
				</li>
				<li>
					<div class="img"><img src="__ROOT__/images/index/special/2.jpg"/></div>
					<div class="title">张家界+凤凰古城</div>
					<div class="price_cnt"><span>1779</span>起</div>
					<div class="price_origin">原价:2479</div>
				</li>
				<li>
					<div class="img"><img src="__ROOT__/images/index/special/3.jpg"/></div>
					<div class="title">普吉岛4晚6日</div>
					<div class="price_cnt"><span>3499</span>起</div>
					<div class="price_origin">原价:4699</div>
				</li>
			</ul>
		</div>
	</div>-->
	
	<!--推荐产品-->
	<div class="recommend">
		<div class="title"><i class="icon_recommend"></i>&nbsp;推荐产品&nbsp;<span>专为大学生定制！</span></div>
		<div class="content">
			<ul>
				<li style="margin-top:0;"><a href="<?php echo U('Line/show?id=1046');?>" target="_blank"><span class="red">[五一]</span><span class="blue">	<横店品质二日游></span>&nbsp;二日穿越千年，游东方好莱坞</a><span class="price"><span class="price_num">380</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1054');?>" target="_blank"><span class="blue"><纪龙山素质拓展二日游></span>&nbsp;素质拓展之旅，闯雷阵，穿电网</a><span class="price"><span class="price_num">400</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1045');?>" target="_blank"><span class="red">[纯玩]</span><span class="blue"><苏州乐园欢乐世界一日游></span>&nbsp;纯玩！精彩刺激，趣味无穷</a><span class="price"><span class="price_num">158</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1003');?>" target="_blank"><span class="blue"><span class="red">[特价]</span><苏州园林一日游—盘门线></span>&nbsp;特价体验，天天发班</a><span class="price"><span class="price_num">99</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1004');?>" target="_blank"><span class="blue"><无锡太湖游船+影视城一日游></span>&nbsp;太湖名胜，出游好去处</a><span class="price"><span class="price_num">140</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1017');?>" target="_blank"><span class="blue"><杭州乌镇二日游></span>&nbsp;观品园林，漫步水乡，亲临西湖</a><span class="price"><span class="price_num">380</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1055');?>" target="_blank"><span class="blue"><雁荡山二日游></span>&nbsp;大龙湫，小龙湫，灵峰日景，灵峰夜景</a><span class="price"><span class="price_num">410</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1008');?>" target="_blank"><span class="blue"><西塘古镇一日游></span>&nbsp;沉醉夜色西塘，感受慢节奏生活</a><span class="price"><span class="price_num">140</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1018');?>" target="_blank"><span class="blue"><杭州千岛湖二日游></span>&nbsp;汽车往返，特价之旅</a><span class="price"><span class="price_num">480</span>元起</span></li>
				<li><a href="<?php echo U('Line/show?id=1048');?>" target="_blank"><span class="red">[超值]</span><span class="blue"><黄山三日游></span>&nbsp;含黄山门票，一天自由安排</a><span class="price"><span class="price_num">590</span>元起</span></li>
			</ul>
		</div>
	</div>

	<!--网站信息-->
	<div class="info">
		<div class="register"><a href="<?php echo U('User/register') ?>"><img src="__ROOT__/images/index/info_register.png"/></a></div>
		<div class="data">
			<div class="satisfied"><?php echo ($constList["satisfaction"]); ?>%&nbsp;<span>客户满意度</span></div>
			<div class="tot divide">
				<ul>
					<li style="margin-top:0;">已经累计服务&nbsp;<span><?php echo ($constList["sell_count"]); ?></span>&nbsp;人次出游</li>
					<li>已经累计拥有&nbsp;<span>11</span>&nbsp;个出游城市</li>
					<li>已经累计覆盖&nbsp;<span>61</span>&nbsp;所上海高校</li>
				</ul>
			</div>
			<div class="realtime divide">
				<span class="name"><?php echo ($lastOrder["user"]["nickname"]); ?></span><?php if (!empty($lastOrder['user']['school'])) { ?> 来自<span class="school"><?php echo ($lastOrder["user"]["school"]); ?></span><?php } ?><br><?php echo ($lastOrder["time"]); ?>前预订了&nbsp;<span class="pro"><a href="<?php echo U('Line/show?id='.$lastOrder['line_id']) ?>" target=_blank"><?php echo ($lastOrder["line_name"]); ?></a></span>
			</div>
		</div>
		<div class="app">
			<a href="<?php echo U('Page/app') ?>" target="_blank"><img src="__ROOT__/images/index/info_app.png"></a>
		</div>
	</div>
	
	
</div>

<script type="text/javascript" src="__ROOT__/js/index.js" charset="utf-8"></script>

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