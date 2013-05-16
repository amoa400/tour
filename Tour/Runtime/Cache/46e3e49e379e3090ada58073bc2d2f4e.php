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



<link href="__ROOT__/css/point.css" rel="stylesheet" media="screen">
<link href="__ROOT__/css/fullcalendar.css" rel="stylesheet" media="screen">
<link href="__ROOT__/css/fullcalendar.print.css" rel="stylesheet" media="screen">
<script>
	var loadingPic = '__ROOT__/images/point/loading.gif';
	var postUrl = '__ROOT__/<?php echo U('Ticket/getSchedule') ?>';
	var postUrl2 = "__ROOT__/<?php echo U('Ticket/getSchedule2') ?>";
	var point_id = <?php echo ($point["id"]); ?>;
</script>

<div id="point" class="main_container wallpaper2">

	<div class="path">
		&nbsp;&nbsp;<a href="<?php echo U('Index/index') ?>">__NAME__</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="<?php echo U('Ticket/index') ?>">景点门票</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="<?php echo U('Ticket/search?province='.$point['province_id']) ?>"><?php echo ($point["province"]); ?></a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="<?php echo U('Ticket/search?province='.$point['province_id'].'&city='.$point['city_id']) ?>"><?php echo ($point["city"]); ?></a>&nbsp;&nbsp;>&nbsp;&nbsp;<?php echo ($point["name"]); ?>
	</div>
	
	<!--景区信息-->
	<div class="info">
		<!--轮播广告-->
		<div id="myCarousel" class="carousel slide pic">
			<div class="carousel-inner">
				<?php  $flag = false; foreach ($point['photo'] as $photo) { ?>
					<div class="item <?php if (!$flag) echo 'active'; ?>">
						<img src="__ROOT__/images/point/photo/<?php echo ($point["province_id"]); ?>/<?php echo ($point["city_id"]); ?>/<?php echo ($point["id"]); ?>/<?php echo ($photo["id"]); ?>.jpg">
						<div class="carousel-caption"><?php echo ($photo["desc"]); ?></div>
					</div>
				<?php  $flag = true; } ?>
            </div>
			<!--
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
			-->
		</div>
		
		<!--基本信息-->
		<div class="content">
			<div class="name"><?php echo ($point["name"]); ?></div>
			<div class="item">
				<span>所属地区：</span>
				<?php echo ($point["province"]); ?>-<?php echo ($point["city"]); ?>
			</div>
			<div class="item">
				<span>景区地址：</span>
				<?php echo ($point["address"]); ?>
			</div>
			<!--
			<div class="item">
				<span>景区电话：</span>
				<?php echo ($point["phone"]); ?>
			</div>
			-->
			<div class="item">
				<span>开放时间：</span>
				<?php echo ($point["time"]); ?>
			</div>
			<div class="item">
				<span>景区主题：</span>
				<?php foreach($point['subject'] as $item) { ?> 
				<?php echo ($item["name"]); ?>&nbsp;
				<?php } ?>
			</div>
			<div class="navi">
				<span><a href="#desc">景区简介</a></span>
				<span><a href="#comment">游客点评</a></span>
				<span><a href="#traffic">交通信息</a></span>
				<span><a href="#">收藏景点</a></span>
			</div>
		</div>
	</div>
	
	<!--左面板-->
	<div class="left_panel">
		<!--搜索-->
		<div class="panel so">
			<div class="title">景区门票搜索</div>
			<div class="content">
				<strong>城市/景点</strong><br>
				<input class="text"/><br>
				<input type="submit" value=""/>
			</div>
		</div>
		
		<!--热门景区-->
		<div class="panel hot">
			<div class="title">热门景区推荐</div>
			<div class="content">
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
				<span><a href="#"><strong>·</strong> 上海滨海森林公园</a></span>
			</div>
		</div>
	</div>
	
	<!--右面板-->
	<div class="right_panel">
		<!--打折门票-->
		<div class="panel ticket">
			<div class="title"><span>打折门票</span></div>
			<div class="content" style="padding-left:5px;">
				<table style="width:100%">
					<tr style="font-weight:bold;">
						<td width="40%" class="name">门票类型</td>
						<td width="10%">市场价</td>
						<td width="10%">优惠价</td>
						<td width="10%">点评奖金</td>
						<td width="15%">支付方式</td>
						<td width="15%"></td>
					</tr>
					
					<?php foreach($ticketList as $ticket) { ?>
						<tr>
							
							<td class="name"><a href="javascript:void(0)" onclick="inverseDetail(<?php echo ($ticket["id"]); ?>)"><?php echo ($ticket["name"]); ?></a><a name="detail_<?php echo ($ticket["id"]); ?>"></a></td>
							<td class="origin_price">¥<?php echo ($ticket["origin_price"]); ?></td>
							<td class="price2">¥<?php echo ($ticket["price"]); ?></td>
							<td class="price">¥<?php echo ($ticket["comment_price"]); ?></td>
							<td><?php echo ($ticket["pay_type"]); ?></td>
							<td><input type="button"  onclick="inverseDetail(<?php echo ($ticket["id"]); ?>)"></td>
						</tr>

						<tr id="detail<?php echo ($ticket["id"]); ?>" style="display:none;">
							<td colspan="6">
								<div class="detail">
									<ul>
										<li><strong><?php echo ($ticket["name"]); ?></strong></li>
										<li>
											<strong>预定须知：</strong><br>
											<?php echo ($ticket["desc"]); ?>
										</li>
										<li class="calendarLi">
											<div id="calendarDiv" class="calendar">
												<div id="tt<?php echo ($ticket["id"]); ?>" class="tt">
													出行价格表
												</div>
												<div id='calendar<?php echo ($ticket["id"]); ?>' style="z-index:999;">
												</div>
											</div>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		
		<!--景区简介-->
		<div class="panel desc">
			<a name="desc"></a>
			<div class="title"><span>景区简介</span></div>
			<div class="content">
				<?php echo ($point["desc2"]); ?>
			</div>
		</div>
		
		<!--游客点评-->
		<div class="panel comment">
			<a name="comment"></a>
			<div class="title"><span>游客点评</span></div>
			<div class="content">
				暂无
			</div>
		</div>
		
		<!--交通信息-->
		<div class="panel traffic">
			<a name="traffic"></a>
			<div class="title"><span>交通信息</span></div>
			<div class="content">
	
				<div id="allmap" style="overflow:hidden;zoom:1;position:relative;width:750px;height:300px;">	
					<div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
					<div id="showPanelBtn" style="position:absolute;font-size:14px;top:50%;margin-top:-95px;right:0px;width:20px;padding:10px 10px;color:#999;cursor:pointer;text-align:center;height:170px;background:rgba(255,255,255,0.9);-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;font-family:'微软雅黑';font-weight:bold;">显示详细路线<br/>&lt;</div>
					<div id="panelWrap" style="width:0px;position:absolute;top:0px;right:0px;height:100%;overflow:auto;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;">
						<div style="width:20px;height:200px;margin:-100px 0 0 -10px;color:#999;position:absolute;opacity:0.5;top:50%;left:50%;">请输入您的出发地点</div>
						<div id="panel" style="position:absolute;"></div>
					</div>
				</div>
	
			</div>
		</div>
		
	</div>
	
	<!--显示订单-->
	<div id="orderDiv" class="order">
		<div class="title">
			开始预订
			<i class='icon icon_close' onclick="hideOrder()"></i>
		</div>
		<div class="content">
			<form action="<?php echo U('Order/ticketOrder') ?>" method="post">
			<input id="date" name="date" value="" style="display:none;">
			<input name="point_id" value="<?php echo ($point["id"]); ?>" style="display:none;">
			<div class="item">
				<span class="tt">您选择的游玩日期：</span>
				<span class="ct date">2013-05-14</span>
			</div>
			<div id="itemList">
				<div class="item">
					<span class="tt">加载中...</span>
				</div>
			</div>
		</div>
		<div class="next">
			<input class="submit" type="submit" value="">
		</div>
		</form>
	</div>

	<div class="clear"></div>
	
	<div class="to_top" onclick="toTop()">
	</div>
</div>

<div id='grey'></div>

<script type="text/javascript" src="__ROOT__/js/point.js" charset="utf-8"></script>
<script type="text/javascript" src='__ROOT__/js/fullcalendar.min.js'></script>
<script type="text/javascript" src='__ROOT__/js/bootstrap-carousel.js'></script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1356957111629175" charset="utf-8"></script>


<!--广告轮转-->
<script>
	$('.carousel').carousel();
</script>

<!--百度地图-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=28E1eda9857d3080c348b5b4b2bd6608"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
<script>
    var map = new BMap.Map('map');
    var poi = new BMap.Point(116.307852,40.057031);
    map.centerAndZoom(poi, 16);
    map.enableScrollWheelZoom();
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint("<?php echo ($point["name"]); ?>", function(point){
		if (point) {
			var poi = new BMap.Point(point.lng,point.lat);
			map.centerAndZoom(poi, 16);
			map.enableScrollWheelZoom();
			
			var content = "<?php echo ($point["desc"]); ?>";

			//创建检索信息窗口对象
			var searchInfoWindow = null;
			searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
					title  : "<?php echo ($point["name"]); ?>",      //标题
					width  : 100,             //宽度
					height : 50,              //高度
					panel  : "panel",         //检索结果面板
					enableAutoPan : true,     //自动平移
					searchTypes   :[
						BMAPLIB_TAB_TO_HERE,  //到这里去
						BMAPLIB_TAB_FROM_HERE, //从这里出发
						BMAPLIB_TAB_SEARCH   //周边检索
					]
				});
			var marker = new BMap.Marker(poi); //创建marker对象
			marker.enableDragging(); //marker可拖拽
			marker.addEventListener("click", function(e){
				searchInfoWindow.open(marker);
			})
			map.addOverlay(marker); //在地图中添加marker
			searchInfoWindow.open(marker); //在marker上打开检索信息串口
				//map.addOverlay(new BMap.Marker(point));
		}
	}, "<?php echo ($point["city"]); ?>");

    function $$(id){
     	  return document.getElementById(id);
    }

    var isPanelShow = false;
    //显示结果面板动作
    $$("showPanelBtn").onclick = function(){
        if (isPanelShow == false) {
            isPanelShow = true;
            $$("showPanelBtn").style.right = "200px";
            $$("panelWrap").style.width = "200px";
            $$("map").style.marginRight = "200px";
            $$("showPanelBtn").innerHTML = "隐藏详细路线<br/>>";
        } else {
            isPanelShow = false;
            $$("showPanelBtn").style.right = "0px";
            $$("panelWrap").style.width = "0px";
            $$("map").style.marginRight = "0px";
            $$("showPanelBtn").innerHTML = "显示详细路线<br/><";
        }
    }
</script>

<!--跳到头部-->
<script>
	function toTop() {
		$("html,body").animate({scrollTop:$("body").offset().top},500);
	}

	$(window).scroll(function() { 
		var top = $(window).scrollTop();
		if (top > 10) {
			$(".to_top").css('display', 'block');
		}
		else {
			$(".to_top").css('display', 'none');
		}
	}); 
	
	<?php if (!empty($_GET['ticket_id'])) { ?>
	inverseDetail(<?php echo $_GET['ticket_id']; ?>);
	<?php } ?>
</script>

<script>
	var jiathis_config = {
		url:"__ROOT__<?php echo U('Line/show?id='.$line['id']); ?>",
		title:"[<?php echo ($line["name"]); ?>]<?php echo ($line["character"]); ?>",
		summary:"<?php echo str_replace(chr(13).chr(10), '', $line['introduction']); ?>",
		pic:"__ROOT__/images/line/photo/<?php echo ($line["id"]); ?>.jpg",
	}
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